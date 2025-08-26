<?php
require_once("./klassen/phpqrcode/qrlib.php");
// „Ich benötige die Bibliothek phpqrcode, um in meinem Easy Wash Projekt automatisiert QR-Codes zu generieren, 
// die Kunden für ihre Bestellungen nutzen können. Sie ermöglicht es mir, 
// QR-Codes direkt in PHP ohne externe Dienste zu erstellen und als Bild im Browser oder für Rechnungen anzuzeigen.“


require_once("./klassen/DbFunctions.inc.php");
require_once("./klassen/WaschsalonDaten.inc.php");

$link = DbFunctions::connectWithDatabase();

// Prüfen ob bestellung_id vorhanden ist
$bestellung_id = $_GET['bestellung_id'] ?? null;
if (!$bestellung_id || !is_numeric($bestellung_id)) {
    http_response_code(400);
    exit("Ungültige Bestellnummer.");
}

// Hole Bestell- und Kundendaten
$bestellung = WaschsalonDaten::holeBestellungNachId($link, $bestellung_id);
if (!$bestellung) {
    http_response_code(404);
    exit("Bestellung nicht gefunden.");
}

$kunde = WaschsalonDaten::holeKundenDetails($link, $bestellung['kunde_id']);
$positionen = WaschsalonDaten::holePositionenZuBestellung($link, $bestellung_id);
$gesamt = number_format(array_sum(array_column($positionen, 'preis')), 2, ',', '.');

// Inhalt des QR-Codes (nur Text)
$inhalt = "Bestellung #$bestellung_id\n"
. "Name: {$kunde['vorname']} {$kunde['nachname']}\n"
. "Summe: {$gesamt} €";

// Header setzen und QR-Code direkt ausgeben
header('Content-Type: image/png');
QRcode::png($inhalt, false, QR_ECLEVEL_L, 5);
exit;