<?php
session_start();
require_once("./includes/startTemplate.inc.php");
require_once("./klassen/DbFunctions.inc.php");
require_once("./klassen/WaschsalonDaten.inc.php");
require_once("./klassen/Sicherheit.inc.php");   


$link = DbFunctions::connectWithDatabase();

// Sicherstellen, dass Benutzer eingeloggt ist
if (empty($_SESSION['kunde_id']) || empty($_SESSION['vorname']) || empty($_SESSION['nachname'])) {
    header("Location: login.php");
    exit();
}

// Benutzer-ID aus Session absichern
$kunde_id = Sicherheit::isCorrectNumericalString($_SESSION['kunde_id']) ? $_SESSION['kunde_id'] : die("Ungültige Kundennummer.");


// Warenkorb aus der Session laden, falls vorhanden
$warenkorb = $_SESSION['warenkorb'] ?? [];
$smarty->assign('warenkorb', $warenkorb);
$smarty->assign('warenkorb_anzahl', count($warenkorb));

// Hole alle Bestellungen des Benutzers
$bestellungen = WaschsalonDaten::holeAlleBestellungenVonKunde($link, $kunde_id);


// Fehlerbehandlung: Falls keine Bestellung geladen werden kann
if (!is_array($bestellungen)) {
    echo "<pre>Fehler beim Laden der Bestellungen:</pre>";
    var_dump($bestellungen);
    exit;
}

// Formatiere das Bestelldatum für die Anzeige im Template
foreach ($bestellungen as &$b) {
    $b['datum_formatiert'] = date("d.m.Y H:i", strtotime($b['bestellt_am']));
}

$smarty->assign('bestellungen', $bestellungen);
$smarty->assign("vorname", Sicherheit::sanitizeString($_SESSION['vorname']));
$smarty->assign("nachname", Sicherheit::sanitizeString($_SESSION['nachname']));
$smarty->assign('kunde_id', $kunde_id);

$smarty->display('benutzerBuchungen.tpl');