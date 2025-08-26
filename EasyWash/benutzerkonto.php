<?php
session_start();
require_once("./includes/startTemplate.inc.php");
require_once("./klassen/WaschsalonDaten.inc.php");
require_once("./klassen/DbFunctions.inc.php");
require_once("./klassen/Sicherheit.inc.php");

$smarty->assign('passwortPattern', '^(?=.*[a-z])(?=.*[A-Z])(?=.*\\d)(?=.*[\\W_]).{8,}$');
// prüfen ob der Benutzer angemeldet ist oder nicht
// sonst automatische Weiterleitung zum Login
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}
// Verbindung zur Datenbank aufbauen
$link = DbFunctions::connectWithDatabase();
$email = $_SESSION['email'];
// prüfen, ob das Formular abgesendet wurde
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Werte aus dem Formular holen (nicht geescaped, Validierung erfolgt manuell)
    $kunde_id = $_POST['kunde_id'];
    $vorname = $_POST['vorname'];
    $nachname = $_POST['nachname'];
    $email_neu = $_POST['email'];
    $telefonnummer = $_POST['telefonnummer'];
    
    // Straße und Hausnummer zu einer vollständigen Adresse zusammensetzen
    $strasse = trim($_POST['strasse']);
    $hausnummer = trim($_POST['hausnummer']);
    $komplette_strasse = $strasse . ' ' . $hausnummer;
    
    $plz = $_POST['plz'];
    $stadt = $_POST['stadt'];
    $land = $_POST['land'];
    $adresszusatz = $_POST['adresszusatz'];
    
    $neues_passwort = $_POST['neues_passwort'] ?? '';
    $neues_passwort_wiederholen = $_POST['neues_passwort_wiederholen'] ?? '';
    
    $valid = true;
    // Benutzereingaben validieren
    if (!Sicherheit::istNotEmpty($vorname) || !Sicherheit::istNotEmpty($nachname)) {
        $smarty->assign('fehler', 'Vor- und Nachname dürfen nicht leer sein.');
        $valid = false;
    }
    if (!Sicherheit::isValidEmail($email_neu)) {
        $smarty->assign('fehler', 'Ungültige E-Mail-Adresse.');
        $valid = false;
    }
    if (!Sicherheit::isCorrectNumericalString($telefonnummer)) {
        $smarty->assign('fehler', 'Telefonnummer darf nur Zahlen enthalten.');
        $valid = false;
    }
    if (!Sicherheit::istNotEmpty($strasse) || !Sicherheit::isValidHausnummer($hausnummer)) {
        $smarty->assign('fehler', 'Ungültige Straße oder Hausnummer.');
        $valid = false;
    }
    if (!Sicherheit::isValidPLZ($plz)) {
        $smarty->assign('fehler', 'Ungültige Postleitzahl.');
        $valid = false;
    }
    
    if (!empty($neues_passwort)) {
        if (!Sicherheit::isValidPassword($neues_passwort)) {
            $smarty->assign('fehler', 'Das Passwort erfüllt nicht die Sicherheitsanforderungen.');
            $valid = false;
        } elseif ($neues_passwort !== $neues_passwort_wiederholen) {
            $smarty->assign('fehler', 'Die Passwörter stimmen nicht überein.');
            $valid = false;
        }
    }
    // wenn alles gültig ist → Änderungen speichern
    if ($valid) {
        WaschsalonDaten::aktualisiereKundendaten($link, $kunde_id, $vorname, $nachname, $email_neu, $telefonnummer);
        WaschsalonDaten::aktualisiereAdresse($link, $kunde_id, $komplette_strasse, $plz, $stadt, $land, $adresszusatz);
        
        if (!empty($neues_passwort)) {
            $gehasht = password_hash($neues_passwort, PASSWORD_DEFAULT);
            WaschsalonDaten::aktualisierePasswort($link, $kunde_id, $gehasht);
        }
        // neue E-Mail in Session übernehmen
        $_SESSION['email'] = $email_neu;
        header("Location: benutzerkonto.php?update=1");
        exit();
    }
}
// Daten des Benutzers aus der Datenbank laden (zur Anzeige im Formular)
$nutzerDaten = WaschsalonDaten::holeNutzerDatenByEmail($link, $email);
$adresse = WaschsalonDaten::holeKundenDetails($link, $nutzerDaten['kunde_id']);
// Straße in Straße und Hausnummer aufteilen
$volle_strasse = $adresse['strasse'] ?? '';
preg_match('/^(.+?)\s+(\S+)$/u', trim($volle_strasse), $matches);
$strasse = $matches[1] ?? $volle_strasse;
$hausnummer = $matches[2] ?? '';
// Werte für das Formular vorbereiten
$smarty->assign("kunde_id", $nutzerDaten['kunde_id']);
$smarty->assign("nachname", $nutzerDaten['nachname']);
$smarty->assign("vorname", $nutzerDaten['vorname']);
$smarty->assign("email", $email);
$smarty->assign("telefonnummer", $nutzerDaten['telefonnummer'] ?? '');
$smarty->assign("strasse", $strasse);
$smarty->assign("hausnummer", $hausnummer);
$smarty->assign("plz", $adresse['plz'] ?? '');
$smarty->assign("stadt", $adresse['stadt'] ?? '');
$smarty->assign("land", $adresse['land'] ?? '');
$smarty->assign("adresszusatz", $adresse['adresszusatz'] ?? '');
$smarty->assign("ist_admin", isset($_SESSION['ist_admin']) && $_SESSION['ist_admin'] === true);
// Benutzerkonto-Template anzeigen
$smarty->display("benutzerkonto.tpl");
exit();