<?php
session_start();
require_once("./includes/startTemplate.inc.php");
require_once("./klassen/DbFunctions.inc.php");
require_once("./klassen/WaschsalonDaten.inc.php");
require_once("./klassen/Sicherheit.inc.php");  

// ✅ Sicherstellen, dass Benutzer eingeloggt istsen
if (!isset($_SESSION['kunde_id'])) {
    die("Nicht eingeloggt.");
}

// ✅ Bestellung-ID absichern (aus GET)
$bestellung_id = $_GET['bestellung_id'] ?? null;

// Prüfen, ob Bestellung-ID gesetzt und numerisch ist
if (!$bestellung_id || !Sicherheit::isCorrectNumericalString($bestellung_id)) {
    die("Ungültige Bestellnummer.");
}

$link = DbFunctions::connectWithDatabase();
// ✅ Bestellung anhand der ID abrufen
$bestellung = WaschsalonDaten::holeBestellungNachId($link, $bestellung_id);

// Sicherstellen, dass Bestellung existiert und dem eingeloggten Benutzer gehört
if (!$bestellung || $bestellung['kunde_id'] != $_SESSION['kunde_id']) {
    die("Ungültiger Zugriff.");
}

// ✅ Gesamtpreis berechnen aus allen Positionen dieser Bestellung
$positionen = WaschsalonDaten::holePositionenZuBestellung($link, $bestellung_id);
$gesamtpreis = 0;
foreach ($positionen as $pos) {
    if (isset($pos['preis']) && is_numeric($pos['preis'])) {
        $gesamtpreis += $pos['preis'];
    }
}

// Optional: Gesamtpreis in Session speichern
$_SESSION['letzte_bestellsumme'] = $gesamtpreis;

// ✅ Smarty-Variablen sicher übergeben
$smarty->assign("bestellung_id", Sicherheit::sanitizeString($bestellung_id));
$smarty->assign("vorname", Sicherheit::sanitizeString($_SESSION['vorname'] ?? ''));
$smarty->assign("nachname", Sicherheit::sanitizeString($_SESSION['nachname'] ?? ''));
$smarty->assign("gesamt", number_format($gesamtpreis, 2, '.', ''));

// Template anzeigen
$smarty->display("bestellBestaetigung.tpl");
exit();