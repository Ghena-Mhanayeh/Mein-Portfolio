<?php
session_start();

// Die Template-Initialisierung und die Datenbankfunktionen werden eingebunden
require_once ("./includes/startTemplate.inc.php");
require_once ("./klassen/DbFunctions.inc.php");

// Zugriff nur mit aktiver Benutzersitzung (Vorname, Nachname, Kunden-ID)/prüfen ob der benutzer angemeldet ist oder nicht
// Sonst automatische Weiterleitung zum Login
if (! isset($_SESSION['vorname']) || ! isset($_SESSION['nachname']) || ! isset($_SESSION['kunde_id'])) {
    header("Location: login.php");
    exit();
}
// /CSRF-Schutz vorbereiten, falls noch kein Token existiert
if (! isset($_SESSION["csrfToken"])) {
    $_SESSION["csrfToken"] = bin2hex(random_bytes(64));
}

// /Lieferadresse & Wunschdatum aus dem POST-Request übernehmen (nur wenn das Formular abgeschickt wurde)
    $_SESSION['lieferadresse'] = [
        'strasse' => $_POST['liefer_strasse'] ?? '',
        'adresszusatz' => $_POST['liefer_adresszusatz'] ?? '',
        'plz' => $_POST['liefer_plz'] ?? '',
        'stadt' => $_POST['liefer_stadt'] ?? '',
        'land' => $_POST['liefer_land'] ?? ''
    ];
    // /Wunschtermin speichern, falls gesetzt
    if (isset($_POST['serviceWunschDatum'])) {
        $_SESSION['serviceWunschDatum'] = $_POST['serviceWunschDatum'];
    }


// /Warenkorb laden – wenn leer, zurück zur Startseite
$warenkorb = $_SESSION['warenkorb'] ?? [];
if (empty($warenkorb)) {
    header("Location: startSeite.php");
    exit();
}

// /Daten an Smarty übergeben für die Darstellung im Template
$smarty->assign("csrfToken", $_SESSION["csrfToken"]);
$smarty->assign("vorname", $_SESSION["vorname"]);
$smarty->assign("nachname", $_SESSION["nachname"]);
$smarty->assign("warenkorb", $warenkorb);
$smarty->assign("lieferadresse", $_SESSION["lieferadresse"]);
$smarty->assign("warenkorb_anzahl", count($warenkorb));
$smarty->assign("serviceWunschDatum", $_SESSION['serviceWunschDatum'] ?? '');

$smarty->display("zahlung.tpl");
exit();