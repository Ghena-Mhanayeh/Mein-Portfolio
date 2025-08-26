<?php
session_start();
// KOmmentieren
require_once ("./includes/startTemplate.inc.php");
require_once ("./klassen/WaschsalonDaten.inc.php");
require_once ("./klassen/DbFunctions.inc.php");
require_once ("./klassen/PreisBerechnen.inc.php");
require_once ("./klassen/Preise.inc.php");
require_once("./klassen/Sicherheit.inc.php");

$link = DbFunctions::connectWithDatabase();


// ✅ Benutzerprüfung
if (empty($_SESSION['kunde_id']) || empty($_SESSION['vorname']) || empty($_SESSION['nachname'])) {
    header("Location: login.php");
    exit();
}

// CSRF-Token initialisieren (auch für POST notwendig!)
if (! isset($_SESSION["csrfToken"])) {
    $_SESSION["csrfToken"] = bin2hex(random_bytes(64));
}
$PHP_SELF = $_SERVER['PHP_SELF'];
$smarty->assign('csrfToken', $_SESSION["csrfToken"]);
$smarty->assign('PHP_SELF', $PHP_SELF);

// ✅ Warenkorb initialisieren
$warenkorb = $_SESSION['warenkorb'] ?? [];
$smarty->assign('warenkorb', $warenkorb);
$smarty->assign('warenkorb_anzahl', count($warenkorb));


$farben = WaschsalonDaten::holeFarbe($link); // Immer laden, sonst später undefiniert
$farbehash = [];
foreach ($farben as $farbe_id => $farbe_name) {
    $preis = match ($farbe_name) {
        'Weiß' => aufschlag_weiss,
        'Schwarz' => aufschlag_schwarz,
        'Mix' => aufschlag_mix,
        default => 0
    };

    $farbehash[$farbe_id] = [
        'name' => $farbe_name,
        'preis' => $preis
    ];
}
$smarty->assign('farbehash', $farbehash);

// ✅ Formularwerte vorbereiten
$form_kg = '';
$form_farbe = '';
$form_bugeln = '';
$form_liefern = '';
$ausgabe = ""; // Standard initialisieren

$REQUEST_METHOD = $_SERVER['REQUEST_METHOD'];
// ✅ Formularverarbeitung
if ($REQUEST_METHOD === "POST") {
    // CSRF-Check
    if (! isset($_POST["csrfToken"]) || $_POST["csrfToken"] !== $_SESSION["csrfToken"]) {
        unset($_SESSION["csrfToken"]);
        die("CSRF Token ungültig!");
    }
    
    

// $warenkorb = $_SESSION['warenkorb'] ?? [];


    if (! isset($_SESSION['warenkorb'])) {
        $_SESSION['warenkorb'] = [];
    }

    // Formularverarbeitung
    $kg = Sicherheit::isNumericalMin($_POST['kg'] ?? '', 0.1) ? floatval($_POST['kg']) : 0;  //Konvertiert einen String in eine Fließkommazahl, um mit Mengen oder Preisen zu rechnen.
    $farbekategorie = $_POST['farbekategorie'] ?? '';
    $farbe = Sicherheit::isCorrectNumericalString($farbekategorie) ? intval($farbekategorie) : 0;  // Konvertiert einen String in eine Ganzzahl, um sicher als Array-Index oder ID zu verwenden.
    $farbeText = $farbehash[$farbe]['name'] ?? "Unbekannt";
    $bugeln = isset($_POST['bügeln']) && $_POST['bügeln'] === 'Ja';
    $lieferJa = isset($_POST['liefern']) && $_POST['liefern'] === 'Ja';
        
    // Lieferflag setzen
    if ($lieferJa) {
        $_SESSION['lieferung_erforderlich'] = true;
    }
    
    // Preis berechnen
    $preis = PreisBerechnen::berechneKleidungPreis($kg ,$farbe,$bugeln,$lieferJa);

    // Formularfelder für Refill im Template
    $form_kg = htmlspecialchars((string)$kg);
    $form_farbe = htmlspecialchars((string)$farbekategorie);
    $form_bugeln = $bugeln ? 'Ja' : 'Nein';
    $form_liefern = $lieferJa ? 'Ja' : 'Nein';

    // Preis berechnene button 
    if (isset($_POST['preis_berechnen'])) {
        if ($kg > 0 && isset($farbehash[$farbekategorie])) {
            $ausgabe = "Sie haben {$kg} kg {$farbeText} Wäsche gewählt.";

            if ($bugeln) {
                $ausgabe .= " Mit Bügelservice.";
            }

            if ($lieferJa) {
                $ausgabe .= " Mit Lieferung.";
            }

            $ausgabe .= " Der Preis beträgt " . number_format($preis, 2, '.', '') . "€";
        } else {
            $ausgabe = "Ungültige Auswahl.";
        }
    } 
    
    // In den Warenkorb legen + Weiterleitung (wenn der Button geklickt wird)
    elseif (isset($_POST['in_warenkorb_legen'])) {
        $item = [
            'service' => 'Kleidung',
            'details' => [
                'Kg' => $kg,
                'Farbe' => $farbeText,
                'Bügeln' => $bugeln ? 'Ja' : 'Nein',
                'Liefern' => $lieferJa ? 'Ja' : 'Nein'
            ],
            'preis' => number_format($preis, 2, '.', '')
        ];

        $_SESSION['warenkorb'][] = $item;
        header("Location: startSeite.php");
        exit();
    }
}


// ✅ Preise formatieren und an Smarty übergeben
function formatEuro($wert)
{
    return number_format($wert, 2, ',', '') . ' €';
}

// Preise an Smarty übergeben
$smarty->assign('GRUNDPREIS_KLEIDUNG', formatEuro(GRUNDPREIS_KLEIDUNG));
$smarty->assign('aufschlag_weiss', formatEuro(aufschlag_weiss));
$smarty->assign('aufschlag_schwarz', formatEuro(aufschlag_schwarz));
$smarty->assign('aufschlag_mix', formatEuro(aufschlag_mix));
$smarty->assign('bugelnPreis', formatEuro(bugelnPreis));
$smarty->assign('LIEFERKOSTEN_KLEIDUNG', formatEuro(LIEFERKOSTEN_KLEIDUNG));

// Smarty-Variablen setzen
$smarty->assign("vorname", Sicherheit::sanitizeString($_SESSION['vorname'] ?? ''));
$smarty->assign("nachname", Sicherheit::sanitizeString($_SESSION['nachname'] ?? ''));
$smarty->assign("ausgabe", $ausgabe);

$smarty->assign("form_kg", $form_kg);
$smarty->assign("form_farbe", $form_farbe);
$smarty->assign("form_bugeln", $form_bugeln);
$smarty->assign("form_liefern", $form_liefern);

$smarty->assign('warenkorb', $warenkorb);

// Adminstatus setzen
$smarty->assign('ist_admin', isset($_SESSION['ist_admin']) && $_SESSION['ist_admin'] === true);

// Template anzeigen
$smarty->display("kleidung.tpl");
exit();