<?php
session_start();
require_once ("./includes/startTemplate.inc.php"); // Smarty vorbereiten
require_once ("./klassen/WaschsalonDaten.inc.php");
require_once ("./klassen/DbFunctions.inc.php");

$warenkorb = $_SESSION['warenkorb'] ?? [];
$smarty->assign('warenkorb', $warenkorb);
$smarty->assign('warenkorb_anzahl', count($warenkorb));


$PHP_SELF = $_SERVER['PHP_SELF'];
$REQUEST_METHOD = $_SERVER['REQUEST_METHOD'];
$link = DbFunctions::connectWithDatabase();
$ueberschrift = "Easy Wash";
$smarty->assign("ueberschrift", $ueberschrift);

$warenkorb = $_SESSION['warenkorb'] ?? [];

// Sicherstellen, dass Benutzer eingeloggt ist
if (! isset($_SESSION['vorname']) || ! isset($_SESSION['nachname'])) {
    header("Location: login.php");
    exit();
}
// CSRF-Token initialisieren (auch für POST notwendig!)
if (! isset($_SESSION["csrfToken"])) {
    $_SESSION["csrfToken"] = bin2hex(random_bytes(64));
}
$smarty->assign('csrfToken', $_SESSION["csrfToken"]);
$smarty->assign('PHP_SELF', $PHP_SELF);

if ($REQUEST_METHOD === "POST") {

    // CSRF-Check
    if (! isset($_POST["csrfToken"]) || $_POST["csrfToken"] !== $_SESSION["csrfToken"]) {
        unset($_SESSION["csrfToken"]);
        die("CSRF Token ungültig!");
    }
}

// Smarty-Variablen zuweisen
$smarty->assign("vorname", $_SESSION['vorname']);
$smarty->assign("nachname", $_SESSION['nachname']);
$smarty->assign('warenkorb', $warenkorb);
$smarty->assign('lieferung_erforderlich', isset($_SESSION['lieferung_erforderlich']) && $_SESSION['lieferung_erforderlich']);

$smarty->assign('ist_admin', isset($_SESSION['ist_admin']) && $_SESSION['ist_admin'] === true);

// Template anzeigen
$smarty->display("startSeite.tpl");
exit(); // Wichtig, um sicherzugehen, dass danach kein Code mehr ausgeführt wird