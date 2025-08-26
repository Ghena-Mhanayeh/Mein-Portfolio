<?php
session_start();
require_once ("./includes/startTemplate.inc.php");
require_once ("./klassen/WaschsalonDaten.inc.php");
require_once ("./klassen/DbFunctions.inc.php");
require_once("./klassen/Sicherheit.inc.php");

// Prüfen, ob Benutzer eingeloggt ist und ob er ein Admin ist
if (! isset($_SESSION['email'])|| $_SESSION['ist_admin']==false) {
    header("Location: login.php");
    exit();
}

// Datenbankverbindung herstellen
$link = DbFunctions::connectWithDatabase();
$email = $_SESSION['email'];

// ✅ Bestellung-ID aus GET prüfen
if (
    !isset($_GET['id']) ||
    !Sicherheit::isCorrectNumericalString($_GET['id']) || // Zuerst prüfen: ist es eine Zahl?
    !Sicherheit::isNumericalMin($_GET['id'], 1)            // Dann: ist sie größer gleich 1?
    ) {
        // Fehlermeldung anzeigen
        $smarty->assign("meldung", "Ungültige Bestell-ID.");
        $smarty->assign("vorname", $_SESSION['vorname'] ?? '');
        $smarty->assign("nachname", $_SESSION['nachname'] ?? '');
        $smarty->assign("email", $_SESSION['email'] ?? '');
        $smarty->assign("kunde_id", $_SESSION['kunde_id'] ?? '');
        $smarty->assign("ist_admin", true);
        $smarty->assign("positionen", []);
        $smarty->assign("bestellung_id", null);
        
        $smarty->display("bestellungDetailsAdmin.tpl");
        exit();
    }
    
$bestellung_id = (int) $_GET['id'];


// 🔧 Positionen laden
$positionen = WaschsalonDaten::holePositionenZuBestellung($link, $bestellung_id);

// ➕ Hier Details-JSON decodieren
foreach ($positionen as &$position) {
    $decoded = json_decode($position['details'], true);
    $position['details_array'] = is_array($decoded) ? $decoded : [];
}
unset($position); 

$nutzerDaten = WaschsalonDaten::holeNutzerDatenByEmail($link, $email);

// Fallback: leere Werte, falls nichts gefunden
if (! $nutzerDaten) {
    $nutzerDaten = [
        'kunde_id' => '',
        'nachname' => '',
        'vorname' => ''
    ];
}


// 📦 Smarty-Zuweisungen
$smarty->assign("kunde_id", $nutzerDaten['kunde_id']);
$smarty->assign("nachname", $nutzerDaten['nachname']);
$smarty->assign("vorname", $nutzerDaten['vorname']);
$smarty->assign("email", $email);


$smarty->assign("positionen", $positionen);
$smarty->assign("bestellung_id", $bestellung_id);
$smarty->assign("ist_admin", true);

$smarty->display("bestellungDetailsAdmin.tpl");
exit();
