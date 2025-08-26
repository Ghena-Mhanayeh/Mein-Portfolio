<?php
session_start();
require_once ("./includes/startTemplate.inc.php");
require_once ("./klassen/WaschsalonDaten.inc.php");
require_once ("./klassen/DbFunctions.inc.php");
require_once ("./klassen/PreisBerechnen.inc.php");
require_once ("./klassen/Preise.inc.php");
require_once ("./klassen/Sicherheit.inc.php");

$warenkorb = $_SESSION['warenkorb'] ?? [];
$smarty->assign('warenkorb', $warenkorb);
$smarty->assign('warenkorb_anzahl', count($warenkorb));

$form_moebeltyp = '';
$form_anzahl = '';
$form_termin_datum = '';
$form_termin_uhrzeit = '';
// Initiales Setup
$PHP_SELF = $_SERVER['PHP_SELF'];
$REQUEST_METHOD = $_SERVER['REQUEST_METHOD'];
$link = DbFunctions::connectWithDatabase();
$ueberschrift = "Easy Wash";
$smarty->assign("ueberschrift", $ueberschrift);

// Benutzer-Login prüfen
if (! isset($_SESSION['vorname']) || ! isset($_SESSION['nachname'])) {
    header("Location: login.php");
    exit();
}

$ausgabe = ""; // Standard initialisieren
$moebelListe = WaschsalonDaten::holeMoebel($link); // Immer laden, sonst später undefiniert

$moebelHash = [];

// Die Schleife weist jedem Möbeltyp den passenden Preis zu, ohne die ursprüngliche Liste zu verändern.
foreach ($moebelListe as $moebel_id => $moebel_name) {
    $preis = match ($moebel_name) {
        'Matratze' => MATRATZE,
        'Sessel' => SESSEL,
        'Gardinen' => GARDINEN,
        'Ecksofa' => ECKSOFA,
        '2-Sitzer Sofa' => ZWEI_SITZER_SOFA,
        '3-Sitzer Sofa' => DREI_SITZER_SOFA,
        default => 0
    };

    $moebelHash[$moebel_id] = [
        'name' => $moebel_name,
        'preis' => number_format($preis, 2, ',', '') . ' €'
    ];
}

// CSRF-Token initialisieren (auch für POST notwendig!)
if (! isset($_SESSION["csrfToken"])) {
    $_SESSION["csrfToken"] = bin2hex(random_bytes(64));
}
$smarty->assign('csrfToken', $_SESSION["csrfToken"]);
$smarty->assign('PHP_SELF', $PHP_SELF);
$smarty->assign('moebelHash', $moebelHash);

if ($REQUEST_METHOD === "POST") {

    // CSRF-Check
    if (! isset($_POST["csrfToken"]) || $_POST["csrfToken"] !== $_SESSION["csrfToken"]) {
        unset($_SESSION["csrfToken"]);
        die("CSRF Token ungültig!");
    }

    if (! isset($_SESSION['warenkorb'])) {
        $_SESSION['warenkorb'] = [];
    }
    $moebelWunschDatum = $_POST['termin_datum'] ?? '';
    $moebelWunschUhrzeit = $_POST['termin_uhrzeit'] ?? '';

    // Formularverarbeitung
    if (isset($_POST['moebeltyp'], $_POST['anzahl'])) {
        $moebelTyp = $_POST['moebeltyp'];
        $anzahl = $_POST['anzahl'];

        // Sicherheitsvalidierung
        if (! Sicherheit::isCorrectNumericalString($moebelTyp) || ! isset($moebelHash[$moebelTyp])) {
            $fehler = "Ungültiger Möbeltyp.";
        } elseif (! Sicherheit::isNumericalMin($anzahl, 1)) {
            $fehler = "Die Anzahl muss mindestens 1 betragen.";
        } else {
            $moebelTyp = (int) $moebelTyp;
            $anzahl = (int) $anzahl;

            // 📝 Diese zwei Zeilen sorgen dafür, dass die Eingaben wieder im Formular erscheinen
            $form_moebeltyp = $moebelTyp;
            $form_anzahl = $anzahl;
            $form_termin_datum = $moebelWunschDatum;
            $form_termin_uhrzeit = $moebelWunschUhrzeit;

            $preis = PreisBerechnen::berechneMoebelPreis($moebelTyp, $anzahl);

            if (isset($_POST['preis_berechnen'])) {
                if ($moebelTyp && $anzahl > 0 && isset($moebelHash[$moebelTyp])) {
                    $ausgabe = "Sie haben {$anzahl} × {$moebelHash[$moebelTyp]['name']} gewählt. Der Preis beträgt " . number_format($preis, 2, '.', '') . " €";
                } else {
                    $ausgabe = "Ungültige Auswahl.";
                }
            } // In den Warenkorb legen + Weiterleitung (wenn der Button geklickt wird)
            if (isset($_POST['preis_berechnen'])) {
                if ($moebelTyp && $anzahl > 0 && isset($moebelHash[$moebelTyp])) {
                    $ausgabe = "Sie haben {$anzahl} × {$moebelHash[$moebelTyp]['name']} gewählt. Der Preis beträgt " . number_format($preis, 2, '.', '') . " €";
                } else {
                    $ausgabe = "Ungültige Auswahl.";
                }
            } elseif (isset($_POST['in_warenkorb_legen'])) {
                // bevor in der Warenkorb legen soll der wunschtermin geprüft ob schon reserviert
                if (! empty($moebelWunschDatum) && ! empty($moebelWunschUhrzeit)) {
                    if (! WaschsalonDaten::istTerminVerfuegbar($link, $moebelWunschDatum, $moebelWunschUhrzeit)) {
                        echo "<script>alert('Der gewählte Termin ist bereits reserviert. Bitte wählen Sie einen anderen Termin.'); window.history.back();</script>";
                        exit();
                    }
                }

                $item = [
                    'service' => 'Möbel',
                    'details' => [
                        'Möbeltyp' => $moebelHash[$moebelTyp]['name'],
                        'Anzahl' => $anzahl,
                        'Lieferung' => 'Ja',
                        'Wunschtermin' => $moebelWunschDatum,
                        'Wunschzeit' => $moebelWunschUhrzeit
                    ],
                    'preis' => number_format($preis, 2, '.', '')
                ];
                $_SESSION['warenkorb'][] = $item;
                $_SESSION['lieferung_erforderlich'] = true;
                header("Location: startSeite.php");
                exit();
            }
        }
    }
}

$smarty->assign("vorname", $_SESSION['vorname']);
$smarty->assign("nachname", $_SESSION['nachname']);
$smarty->assign('ausgabe', $ausgabe);
$smarty->assign('form_moebeltyp', $form_moebeltyp);
$smarty->assign('form_anzahl', $form_anzahl);
$smarty->assign('form_termin_datum', $form_termin_datum);
$smarty->assign('form_termin_uhrzeit', $form_termin_uhrzeit);

function formatEuro($wert)
{
    return number_format($wert, 2, ',', '') . ' €';
}

$smarty->assign('MATRATZE', formatEuro(MATRATZE));
$smarty->assign('SESSEL', formatEuro(SESSEL));
$smarty->assign('GARDINEN', formatEuro(GARDINEN));
$smarty->assign('ECKSOFA', formatEuro(ECKSOFA));
$smarty->assign('ZWEI_SITZER_SOFA', formatEuro(ZWEI_SITZER_SOFA));
$smarty->assign('DREI_SITZER_SOFA', formatEuro(DREI_SITZER_SOFA));
$smarty->assign('fehler', $fehler ?? '');
$smarty->assign('ist_admin', isset($_SESSION['ist_admin']) && $_SESSION['ist_admin'] === true);




$smarty->display("moebel.tpl");
exit();

?>