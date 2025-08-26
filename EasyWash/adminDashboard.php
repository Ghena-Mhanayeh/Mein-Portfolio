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

// CSRF-Token initialisieren
if (!isset($_SESSION["csrfToken"])) {
    $_SESSION["csrfToken"] = bin2hex(random_bytes(64));
}
$smarty->assign('csrfToken', $_SESSION["csrfToken"]);

// Wenn das Formular gesendet wurde (per POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // 🔒 CSRF-Token prüfen
    if (!isset($_POST["csrfToken"]) || $_POST["csrfToken"] !== $_SESSION["csrfToken"]) {
        unset($_SESSION["csrfToken"]);
        die("CSRF Token ungültig!");
    }

    // Kunde sperren
    if (isset($_POST['sperren'])) {
        $id = $_POST['gesperrteKunde_id'];
        if (!Sicherheit::isNumericalMin($id, 1)) {
            $smarty->assign('meldung', "Ungültige Kunden-ID.");
        } elseif (!WaschsalonDaten::kundeExistiert($link, $id)) {
            $smarty->assign('meldung', "Kunde mit der ID $id wurde nicht gefunden.");
        } else {
            WaschsalonDaten::sperreKunde($link, $id);
            $smarty->assign('meldung', "Kunde mit der ID $id wurde erfolgreich gesperrt.");
        }
    }

    // Kunde entsperren
    if (isset($_POST['entsperren'])) {
        $id = $_POST['entsperrteKunde_id'];
        if (!Sicherheit::isNumericalMin($id, 1)) {
            $smarty->assign('meldung', "Ungültige Kunden-ID.");
        } elseif (!WaschsalonDaten::kundeExistiert($link, $id)) {
            $smarty->assign('meldung', "Kunde mit der ID $id wurde nicht gefunden.");
        } else {
            WaschsalonDaten::entsperreKunde($link, $id);
            $smarty->assign('meldung', "Kunde mit ID $id wurde erfolgreich entsperrt.");
        }
    }

    // Bestellung bezahlt
    if (isset($_POST['bezahlt'])) {
        $id = $_POST['bezahlte_bestellung_id'];
        if (!Sicherheit::isNumericalMin($id, 1)) {
            $smarty->assign('meldung', "Ungültige Bestell-ID.");
        } elseif (!WaschsalonDaten::bestellungExistiert($link, $id)) {
            $smarty->assign('meldung', "Bestellung mit ID $id wurde nicht gefunden.");
        } else {
            WaschsalonDaten::setzeBestellungBezahlt($link, $id);
            $smarty->assign('meldung', "Bestellung $id wurde als bezahlt markiert.");
        }
    }

    // Bestellung abschließen
    if (isset($_POST['Bestellung_abschliessen'])) {
        $id = $_POST['bestellung_id_abschliessen'];
        if (!Sicherheit::isNumericalMin($id, 1)) {
            $smarty->assign('meldung', "Ungültige Bestell-ID.");
        } elseif (!WaschsalonDaten::bestellungExistiert($link, $id)) {
            $smarty->assign('meldung', "Bestellung $id wurde nicht gefunden.");
        } else {
            WaschsalonDaten::setzeBestellungAbgeschlossen($link, $id);
            $smarty->assign('meldung', "Bestellung $id wurde abgeschlossen.");
        }
    }
    
    //Termin absagen
    
    // Termin absagen
    if (isset($_POST['TerminAbsagen'])) {
        $id = $_POST['abgesagte_Termin_id'];
        if (!Sicherheit::isNumericalMin($id, 1)) {
            $smarty->assign('meldung', "Ungültige Termin-ID.");
        } elseif (!WaschsalonDaten::terminExistiert($link, $id)) {
            $smarty->assign('meldung', "Termin $id wurde nicht gefunden.");
        } else {
            WaschsalonDaten::sageTerminAb($link, $id);
            $smarty->assign('meldung', "Termin $id wurde abgesagt.");
        }
    }
}

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

$smarty->display("adminDashboard.tpl");
$smarty->assign('ist_admin', isset($_SESSION['ist_admin']) && $_SESSION['ist_admin'] === true);

exit();
?>