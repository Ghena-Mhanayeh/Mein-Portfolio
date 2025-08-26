<?php
session_start();
require_once("./klassen/DbFunctions.inc.php");
require_once("./klassen/WaschsalonDaten.inc.php");
require_once("./klassen/Sicherheit.inc.php");


$link = DbFunctions::connectWithDatabase();

// Sicherstellen, dass Benutzer eingeloggt ist
if (empty($_SESSION['kunde_id'])) {
    die("Nicht erlaubt.");
}
$kunde_id_session = (int)$_SESSION['kunde_id'];

// Bestell-ID prüfen und absichern
$bestellung_id = $_GET['bestellung_id'] ?? null;

if (!$bestellung_id || !Sicherheit::isCorrectNumericalString($bestellung_id)) {
    die("Ungültige Bestellnummer.");
}

$bestellung_id = (int)$bestellung_id;

// Bestellung aus DB laden 
$bestellung = WaschsalonDaten::holeBestellungNachId($link, $bestellung_id);

//wenn die Bestellung nicht im DB gibt
if($bestellung == null){
    die("Die gesuchte Bestellung ist nicht vorhanden");
}

//prüfen, ob die Bestellung zum Benutzer gehört
if ($bestellung['kunde_id'] != $kunde_id_session) {
    die("Zugriff verweigert.");
}

if (!$bestellung) {
    die("Bestellung nicht gefunden.");
}


// Bestelldatum laden für Dateinamen
$datum = WaschsalonDaten::holeBestelldatum($link, $bestellung_id);

if (!$datum) {
    die("Kein Bestelldatum gefunden.");
}

// Dateinamen korrekt zusammensetzen
$datum_formatiert = date("Y-m-d", strtotime($datum));
$dateiname = "PDFRechnung/Rechnung_K{$kunde_id_session}_B{$bestellung_id}_$datum_formatiert.pdf";


// Prüfen, ob die PDF existiert
if (!file_exists($dateiname)) {
    die("Rechnung nicht gefunden.");
}

// PDF anzeigen
header('Content-Type: application/pdf');
header('Content-Disposition: inline; filename="' . basename($dateiname) . '"');
header('Content-Length: ' . filesize($dateiname));
readfile($dateiname);
exit;