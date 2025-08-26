<?php
session_start();
require_once ("./includes/startTemplate.inc.php");
require_once ("./klassen/WaschsalonDaten.inc.php");
require_once ("./klassen/DbFunctions.inc.php");
require_once ("./klassen/Sicherheit.inc.php");

// Prüfen, ob Benutzer eingeloggt ist und ob er ein Admin ist
if (! isset($_SESSION['email'])|| $_SESSION['ist_admin']==false) {
    header("Location: login.php");
    exit();
}

// Datenbankverbindung herstellen
$link = DbFunctions::connectWithDatabase();
$email = $_SESSION['email'];

// CSRF-Token generieren
if (! isset($_SESSION["csrfToken"])) {
    $_SESSION["csrfToken"] = bin2hex(random_bytes(64));
}
$smarty->assign("csrfToken", $_SESSION["csrfToken"]);

$filter = [
    'bestellung_id' => $_POST['bestellung_id'] ?? '',
    'kunde_id' => $_POST['kunde_id'] ?? '',
    'status' => $_POST['status'] ?? '',
    'bezahlt' => $_POST['bezahlt'] ?? ''
];


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // 🔐 CSRF-Schutz
    if (! isset($_POST['csrfToken']) || $_POST['csrfToken'] !== $_SESSION['csrfToken']) {
        die("CSRF-Token ungültig!");
    }

    // Eingaben holen
    $bestellung_id = trim($_POST['bestellung_id'] ?? '');
    $kunde_id = trim($_POST['kunde_id'] ?? '');
    $status = trim($_POST['status'] ?? '');
    $bezahlt = trim($_POST['bezahlt'] ?? '');

    // Validierung
    if ($bestellung_id === '' || Sicherheit::isCorrectNumericalString($bestellung_id)) {
        $filter['bestellung_id'] = $bestellung_id;
    } else {
        $meldung = "Ungültige Bestellung-ID.";
    }

    if ($kunde_id === '' || Sicherheit::isCorrectNumericalString($kunde_id)) {
        $filter['kunde_id'] = $kunde_id;
    } else {
        $meldung = "Ungültige Kunden-ID.";
    }
    $filter['status'] = $status;
    $filter['bezahlt'] = $bezahlt;
}

$ergebnisse = WaschsalonDaten::sucheBestellungen($link, $filter);

$smarty->assign('ergebnisse', $ergebnisse);

// Nutzerdaten aus der DB holen
$nutzerDaten = WaschsalonDaten::holeNutzerDatenByEmail($link, $email);

// Fallback: leere Werte, falls nichts gefunden
if (! $nutzerDaten) {
    $nutzerDaten = [
        'kunde_id' => '',
        'nachname' => '',
        'vorname' => ''
    ];
}

// Werte ins Template übertragen

$smarty->assign("kunde_id", $nutzerDaten['kunde_id']);
$smarty->assign("nachname", $nutzerDaten['nachname']);
$smarty->assign("vorname", $nutzerDaten['vorname']);
$smarty->assign("email", $email);
$smarty->assign("filter", $filter); // nach dem Absenden
if (isset($meldung)) {
    $smarty->assign('meldung', $meldung);
}
$smarty->display("bestellungenSuchen.tpl");
$smarty->assign('ist_admin', isset($_SESSION['ist_admin']) && $_SESSION['ist_admin'] === true);

exit();
?>