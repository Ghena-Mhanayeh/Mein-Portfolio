<?php
session_start();

require_once ("./includes/startTemplate.inc.php");
require_once ("./klassen/DbFunctions.inc.php");
require_once ("./klassen/WaschsalonDaten.inc.php");
require_once("./klassen/Sicherheit.inc.php"); // Eingabeabsicherung
require_once("./klassen/TCPDF/tcpdf.php"); // PDF-Generierung


$link = DbFunctions::connectWithDatabase();


// Zugriffsschutz: Nur eingeloggte Benutzer

if (! isset($_SESSION['kunde_id'])) {
    header("Location: login.php");
    exit();
}
// CSRF-Schutz
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || ! isset($_POST['csrfToken']) || $_POST['csrfToken'] !== $_SESSION['csrfToken']) {
    die("Ungültiger CSRF-Token.");
    
}

// Prüfen, ob Warenkorb existiert
if (! isset($_SESSION['warenkorb']) || empty($_SESSION['warenkorb'])) {
    die("Dein Warenkorb ist leer.");
}

// Lieferadresse speichern und absichern
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['lieferadresse'] = [
        'strasse' => Sicherheit::sanitizeString($_POST['liefer_strasse'] ?? ''),
        'adresszusatz' => Sicherheit::sanitizeString($_POST['liefer_adresszusatz'] ?? ''),
        'plz' => Sicherheit::isValidPLZ($_POST['liefer_plz'] ?? '') ? $_POST['liefer_plz'] : '',
        'stadt' => Sicherheit::sanitizeString($_POST['liefer_stadt'] ?? ''),
        'land' => Sicherheit::sanitizeString($_POST['liefer_land'] ?? '')
    ];
}


// Wunschtermin speichern und validieren
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['serviceWunschDatum']) && ! empty($_POST['serviceWunschDatum'])) {
        $_SESSION['serviceWunschDatum'] = $_POST['serviceWunschDatum'];
    }
}

// Bestellung speichern
$kunde_id = $_SESSION['kunde_id'];
$bestellt_am = date("Y-m-d H:i:s");
$status = 'offen';
$serviceWunschDatum = $_SESSION['serviceWunschDatum'] ?? null;

// Datum in korrektes Format umwandeln
if ($serviceWunschDatum) {
    $dateObj = DateTime::createFromFormat('Y-m-d', $serviceWunschDatum);
    $serviceWunschDatum = $dateObj ? $dateObj->format('Y-m-d') : null;
}


$bestellung_id = WaschsalonDaten::fuegeBestellungEin($link, $kunde_id, $bestellt_am, $status, $serviceWunschDatum);

// Bestellpositionen speichern
foreach ($_SESSION['warenkorb'] as $eintrag) {
    $service_name = $eintrag['service'];
    $details_array = $eintrag['details'];
    $preis = $eintrag['preis'];

    $service_id = WaschsalonDaten::holeServiceIdNachName($link, $service_name);
    if (! $service_id) {
        $service_id = 1; // Fallback
    }
    $details = json_encode($details_array);
    WaschsalonDaten::fuegeBestellpositionEin($link, $bestellung_id, $service_id, $details, $preis);
}

// Termin speichern (falls vorhanden im Warenkorb)
foreach ($_SESSION['warenkorb'] as $eintrag) {
    if (isset($eintrag['details']['Wunschtermin'], $eintrag['details']['Wunschzeit'])) {
        $moebelWunschDatum = $eintrag['details']['Wunschtermin'];
        $moebelWunschUhrzeit = $eintrag['details']['Wunschzeit'];
        WaschsalonDaten::fuegeTerminEin($link, $kunde_id, $bestellung_id, $moebelWunschDatum, $moebelWunschUhrzeit);
        break;// nur einmal speichern
    }
}

// PDF generieren und speichern
$kunde = WaschsalonDaten::holeKundenDetails($link, $kunde_id);
$positionen = WaschsalonDaten::holePositionenZuBestellung($link, $bestellung_id);

$pdf = new TCPDF();
$pdf->AddPage();
$pdf->SetFont('Helvetica', 'B', 16);
$pdf->Cell(0, 10, 'Rechnung – Easy Wash', 0, 1, 'L');
$pdf->Image('images/Logo.png', 150, 10, 40);
$pdf->Ln(10);


$pdf->SetFont('Helvetica', 'B', 12);
$pdf->Cell(0, 6, "Rechnungsadresse:", 0, 1);
// Inhalt normal
$pdf->SetFont('Helvetica', '', 10);
$rechnungsText = "{$kunde['vorname']} {$kunde['nachname']}\n{$kunde['strasse']}";
if (! empty($kunde['adresszusatz'])) {
    $rechnungsText .= ", {$kunde['adresszusatz']}";
}
$rechnungsText .= "\n{$kunde['plz']} {$kunde['stadt']}\n{$kunde['land']}";
$rechnungsText .= "\nTel: {$kunde['telefonnummer']}";
$pdf->MultiCell(0, 5, $rechnungsText, 0, 'L');

// Lieferadresse, falls vorhanden
if (! empty($_SESSION['lieferadresse']['strasse'])) {
    $liefer = $_SESSION['lieferadresse'];
    $pdf->Ln(6);
    $pdf->SetFont('Helvetica', 'B', 12);
    $pdf->Cell(0, 6, "Lieferadresse:", 0, 1);
    $pdf->SetFont('Helvetica', '', 10);
    $lieferText = $liefer['strasse'];
    if (! empty($liefer['adresszusatz'])) {
        $lieferText .= ", " . $liefer['adresszusatz'];
    }
    $lieferText .= "\n{$liefer['plz']} {$liefer['stadt']}\n{$liefer['land']}";
    $pdf->MultiCell(0, 5, $lieferText, 0, 'L');
}

// Bestellinfos
$pdf->Ln(5);
$pdf->Cell(0, 6, "Bestellnummer: #$bestellung_id", 0, 1);
$pdf->Cell(0, 6, "Datum: " . date("d.m.Y"), 0, 1);
$pdf->Ln(8);
$pdf->SetFont('Helvetica', 'B', 12);
$pdf->Cell(0, 6, "Bestellte Leistungen", 0, 1);
$pdf->Ln(3);

// Positionen einfügen
foreach ($positionen as $pos) {
    $details = json_decode($pos['details'], true);

    $pdf->SetFont('Helvetica', 'B', 11);
    $pdf->Cell(0, 6, $pos['service_name'], 0, 1);
    $pdf->SetFont('Helvetica', '', 10);

    $lieferungJa = false;
    //Wunschtermin für Möbel 
    foreach ($details as $feld => $wert) {
        if (($feld == 'Liefern' || $feld == 'Lieferung') && $wert == 'Ja') {
            $lieferungJa = true;
        }
        
        if ($feld == 'Wunschtermin' && ! empty($wert)) {
            $dateObj = DateTime::createFromFormat('Y-m-d', $wert);
            if ($dateObj) {
                $wert = $dateObj->format('d.m.Y');
            }
        }
        $pdf->Cell(0, 5, "$feld: $wert", 0, 1);
    }

    // Abhol- und LieferTermin für Kleidung & Teppich korrekt anzeigen
    $serviceName = strtolower($pos['service_name']);
    if (($serviceName == 'kleidung' || $serviceName == 'teppich') && ! empty($serviceWunschDatum)) {
        $pdf->SetFont('Helvetica', '', 10);
        $terminText = $lieferungJa ? "Liefertermin für diesen Service: " : "Abholtermin für diesen Service: ";
        $terminText .= date("d.m.Y", strtotime(str_replace('/', '-', $serviceWunschDatum)));
        $pdf->Cell(0, 6, $terminText, 0, 1);
    }

    $pdf->Cell(0, 6, "Preis: " . number_format($pos['preis'], 2, '.', '') . " €", 0, 1);
    $pdf->Ln(3);
}

// Das ist der Endpreis inkl. MwSt
$brutto = array_sum(array_column($positionen, 'preis')); 
$mwstSatz = 0.19;
$netto = $brutto / (1 + $mwstSatz);
$mwst = $brutto - $netto;
$pdf->SetFont('Helvetica', 'B', 11);
$pdf->Ln(5);
$pdf->Cell(0, 6, "Zwischensumme (netto): " . number_format($netto, 2, '.', '') . " €", 0, 1);
$pdf->Cell(0, 6, "zzgl. 19 % MwSt: " . number_format($mwst, 2, '.', '') . " €", 0, 1);
$pdf->Cell(0, 6, "Gesamtsumme (brutto): " . number_format($brutto, 2, '.', '') . " €", 0, 1);

$pdf->SetFont('Helvetica', 'I', 14);
$pdf->Ln(8);
$pdf->Cell(0, 5, "Vielen Dank für deine Bestellung bei Easy Wash.", 0, 1, 'L');

// entweder die Lieferadresse (wenn vorhanden) oder alternativ die Rechnungsadresse im QR-Code erscheint:
$qrText = "Rechnung – Easy Wash\n";
$qrText .= "Bestellnummer: #$bestellung_id\n";
$qrText .= "Name: {$kunde['vorname']} {$kunde['nachname']}\n";

if (! empty($_SESSION['lieferadresse']['strasse'])) {
    $liefer = $_SESSION['lieferadresse'];
    $qrText .= "Lieferadresse: {$liefer['strasse']}";
    if (! empty($liefer['adresszusatz'])) {
        $qrText .= ", {$liefer['adresszusatz']}";
    }
    $qrText .= ", {$liefer['plz']} {$liefer['stadt']}\n";
    $qrText .= "{$liefer['land']}\n";
} else {
    $qrText .= "Rechnungsadresse: {$kunde['strasse']}";
    if (! empty($kunde['adresszusatz'])) {
        $qrText .= ", {$kunde['adresszusatz']}";
    }
    $qrText .= ", {$kunde['plz']} {$kunde['stadt']}\n";
    $qrText .= "{$kunde['land']}\n";
}

$qrText .= "Bestellt am: " . date("d.m.Y") . "\n";
$qrText .= "Gesamtsumme: " . number_format($brutto, 2, '.', '') . " €\n";
$qrText .= "inkl. 19 % MwSt.";

$style = [
    'border' => 0,
    'vpadding' => 'auto',
    'hpadding' => 'auto',
    'fgcolor' => [
        0,
        0,
        0
    ],
    'bgcolor' => false,
    'module_width' => 1,
    'module_height' => 1
];
$pdf->Ln(10);
$pdf->write2DBarcode($qrText, 'QRCODE,H', 150, 220, 40, 40, $style, 'N');


// Projekt-Root stabil ermitteln
$ROOT_DIR = __DIR__;

// PDFRechnung-Verzeichnis definieren
$pdfVerzeichnis = $ROOT_DIR . "/PDFRechnung";

// Ordner erstellen, falls nicht vorhanden
if (!is_dir($pdfVerzeichnis)) {
    mkdir($pdfVerzeichnis, 0755, true);
}

$heute = date("Y-m-d");
$filename = "$pdfVerzeichnis/Rechnung_K{$kunde_id}_B{$bestellung_id}_$heute.pdf";
$pdf->Output($filename, 'F');

// Warenkorb leeren
// Nach der PDF-Erzeugung die Lieferadresse löschen
// Nach der PDF-Erzeugung die Abhol-LieferTermin löschen
unset($_SESSION['warenkorb'], $_SESSION['lieferadresse'], $_SESSION['wunschdatum_global']);

// Weiterleitung zur Bestätigung
// echo "DEBUG: PDF erfolgreich generiert – Weiterleitung zu Bestätigung<br>";
// echo "Bestellung-ID: $bestellung_id<br>";
header("Location: bestellBestaetigung.php?bestellung_id=$bestellung_id");
exit();