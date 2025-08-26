<?php
session_start();

require_once("./includes/startTemplate.inc.php"); // Smarty vorbereiten
require_once("./klassen/WaschsalonDaten.inc.php"); // Datenbankabfrage für Benutzer
require_once("./klassen/Sicherheit.inc.php");     // Sicherheits- und Validierungsfunktionen
require_once("./klassen/DbFunctions.inc.php");     // Datenbankverbindung
require_once("./klassen/TCPDF/tcpdf.php");         // PDF-Erstellung (nicht direkt genutzt)
require_once("./klassen/SVGGraph/autoloader.php"); // Diagrammerstellung (nicht direkt genutzt)

$PHP_SELF = $_SERVER['PHP_SELF'];
$REQUEST_METHOD = $_SERVER['REQUEST_METHOD'];
$link = DbFunctions::connectWithDatabase();
$ueberschrift = "Easy Wash";
$smarty->assign("ueberschrift", $ueberschrift);

// Fehler- und E-Mail-Werte aus der Session auslesen
$fehler = $_SESSION['login_error'] ?? null;
$email = $_SESSION['email_input'] ?? '';
unset($_SESSION['login_error'], $_SESSION['email_input']);
// An Smarty übergeben, damit Formular wieder korrekt angezeigt wird
$smarty->assign('fehler', $fehler);
$smarty->assign('email', $email);

// CSRF-Token generieren (für GET oder nach Fehlversuch)
if (!isset($_SESSION["csrfToken"])) {
    $_SESSION["csrfToken"] = bin2hex(random_bytes(64));
}
$smarty->assign('csrfToken', $_SESSION['csrfToken']);
$smarty->assign('PHP_SELF', $PHP_SELF);

// POST: Login-Verarbeitung
if ($REQUEST_METHOD === "POST") {
    if (!isset($_POST["csrfToken"]) || $_POST["csrfToken"] !== $_SESSION["csrfToken"]) {
        unset($_SESSION["csrfToken"]);
        die("CSRF Token ungültig!");
    }
    
    $email = trim($_POST['email']);
    $passwort = trim($_POST['passwort']);
    
    // E-Mail validieren
    if (!Sicherheit::isValidEmail($email)) {
        $_SESSION['login_error'] = Sicherheit::$fehlermeldung;
        $_SESSION['email_input'] = $email;
        header("Location: login.php");
        exit();
    }
    
    // Passwort validieren
    if (!Sicherheit::istNotEmpty($passwort)) {
        $_SESSION['login_error'] = Sicherheit::$fehlermeldung;
        $_SESSION['email_input'] = $email;
        header("Location: login.php");
        exit();
    }
    
    // Prüfen ob Nutzer existiert und Passwort korrekt ist
    if (isset($_POST['login'])) {
        $nutzerDaten = WaschsalonDaten::holeNutzerDatenByEmail($link, $email);
        // Passwortvergleich mit Hash
        if ($nutzerDaten && password_verify($passwort, $nutzerDaten['passwort'])) {
            $_SESSION['kunde_id'] = $nutzerDaten['kunde_id'];
            $_SESSION['vorname'] = $nutzerDaten['vorname'];
            $_SESSION['nachname'] = $nutzerDaten['nachname'];
            $_SESSION['email'] = $email;
            $_SESSION['ist_admin'] = ($nutzerDaten['ist_admin'] == 1);
            // Prüfen ob Nutzerkonto gesperrt ist
            if ($nutzerDaten['ist_gesperrt'] == 1) {
                $_SESSION['login_error'] = '🚫 Dein Konto wurde gesperrt. Bitte kontaktiere den Support.';
                $_SESSION['email_input'] = $email;
                header("Location: login.php");
                exit();
            }
            // Weiterleitung zur Startseite bei erfolgreichem Login
            header("Location: startSeite.php");
            exit();
        } else {
            // Unspezifische Fehlermeldung bei falschen Login-Daten
            $_SESSION['login_error'] = 'E-Mail oder Passwort ist falsch.';
            $_SESSION['email_input'] = $email;
            header("Location: login.php");
            exit();
        }
    }
}

// Anzeige
$smarty->display('login.tpl');
exit();
