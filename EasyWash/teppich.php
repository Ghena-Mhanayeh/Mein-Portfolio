<?php
session_start();

require_once("./includes/startTemplate.inc.php"); // Smarty-Initialisierung
require_once("./klassen/PreisBerechnen.inc.php"); // Berechnung der Fläche und des Preises
require_once("./klassen/Preise.inc.php");         // Preis-Konstanten
require_once("./klassen/Sicherheit.inc.php");     // Sicherheits- und Validierungsmethoden

// Konstante Wertebereiche für Eingaben (zur besseren Wartbarkeit)
define('TEPPICH_MIN_WERT', 0.1);
define('TEPPICH_MAX_WERT', 100);

// Warenkorb aus Session laden und an Smarty übergeben
$warenkorb = $_SESSION['warenkorb'] ?? [];
$smarty->assign("warenkorb", $warenkorb);
$smarty->assign("warenkorb_anzahl", count($warenkorb));

// Vorbereitungen für das Formular
$PHP_SELF = $_SERVER['PHP_SELF'];
$REQUEST_METHOD = $_SERVER['REQUEST_METHOD'];
$ausgabe = "";

$form_breite = '';
$form_laenge = '';
$form_lieferung = '';
$form_tiefreinigung = '';

// Benutzerprüfung: Nur mit aktiver Benutzersitzung aufrufbar
if (!isset($_SESSION['vorname']) || !isset($_SESSION['nachname'])) {
    header("Location: login.php");
    exit();
}

// CSRF-Schutz vorbereiten, falls noch kein Token existiert
if (!isset($_SESSION["csrfToken"])) {
    $_SESSION["csrfToken"] = bin2hex(random_bytes(64));
}
$smarty->assign('csrfToken', $_SESSION["csrfToken"]);
$smarty->assign('PHP_SELF', $PHP_SELF);

// Formularverarbeitung
if ($REQUEST_METHOD === "POST") {
    
    // CSRF-Token prüfen (Schutz gegen Cross-Site Request Forgery)
    if (!isset($_POST["csrfToken"]) || $_POST["csrfToken"] !== $_SESSION["csrfToken"]) {
        unset($_SESSION["csrfToken"]);
        die("CSRF-Token ungültig!");
    }
    
    // Eingabewerte aus dem Formular holen
    $breite = floatval($_POST['breite']);
    $laenge = floatval($_POST['laenge']);
    $lieferung = ($_POST['liefern'] ?? 'Nein') === 'Ja';
    $tiefreinigung = ($_POST['tiefreinigung'] ?? 'Nein') === 'Ja';
    
    // Formularwerte für die spätere Anzeige im Template speichern
    $form_breite = $breite;
    $form_laenge = $laenge;
    $form_lieferung = $lieferung ? 'Ja' : 'Nein';
    $form_tiefreinigung = $tiefreinigung ? 'Ja' : 'Nein';
    
    // Validierungsblock mit Sicherheitsklasse
    $valid = true;
    
    if (!Sicherheit::isNumericalInBoundary($breite, TEPPICH_MIN_WERT, TEPPICH_MAX_WERT)) {
        $smarty->assign('fehler', 'Die Breite muss eine gültige Zahl größer als 0 sein.');
        $valid = false;
    }
    
    if (!Sicherheit::isNumericalInBoundary($laenge, TEPPICH_MIN_WERT, TEPPICH_MAX_WERT)) {
        $smarty->assign('fehler', 'Die Länge muss eine gültige Zahl größer als 0 sein.');
        $valid = false;
    }
    
    if (!Sicherheit::istNotEmpty($_POST['tiefreinigung'] ?? '')) {
        $smarty->assign('fehler', 'Bitte wählen Sie aus, ob eine Tiefreinigung gewünscht ist.');
        $valid = false;
    }
    
    if (!Sicherheit::istNotEmpty($_POST['liefern'] ?? '')) {
        $smarty->assign('fehler', 'Bitte wählen Sie aus, ob geliefert werden soll.');
        $valid = false;
    }
    
    // Wenn alles gültig ist: Berechnung oder Hinzufügen zum Warenkorb
    if ($valid) {
        
        $flaeche = PreisBerechnen::berechneTeppichFlaeche($breite, $laenge);
        $preis = PreisBerechnen::berechneTeppichPreis($flaeche, $lieferung, $tiefreinigung);
        
        if (isset($_POST['preis_berechnen'])) {
            $ausgabe  = "Sie haben einen Teppich mit {$breite} m Breit × {$laenge} m Lang gewählt.";
            if ($lieferung) {
                $ausgabe .= " Mit Lieferung";
            }
            if ($tiefreinigung) {
                $ausgabe .= " und mit Tiefreinigung.";
            }
            $ausgabe .= " Der Preis beträgt " . number_format($preis, 2, ',', '') . " €.";
        }
        
        elseif (isset($_POST['in_warenkorb_legen'])) {
            $item = [
                'service' => 'Teppich',
                'details' => [
                    'Breite' => "{$breite} m",
                    'Länge' => "{$laenge} m",
                    'Lieferung' => $lieferung ? 'Ja' : 'Nein',
                    'Tiefreinigung' => $tiefreinigung ? 'Ja' : 'Nein'
                        ],
                        'preis' => number_format($preis, 2, '.', '') // für interne Weiterverarbeitung
                        ];
            
            $_SESSION['warenkorb'][] = $item;
            
            // Wenn Lieferung gewünscht dann später Adresseingabe vorbereiten
            if ($lieferung) {
                $_SESSION['lieferung_erforderlich'] = true;
            }
            
            header("Location: startSeite.php");
            exit();
        }
    }
}

// Smarty-Variablen vorbereiten für das Template
$smarty->assign("vorname", $_SESSION['vorname']);
$smarty->assign("nachname", $_SESSION['nachname']);
$smarty->assign("ausgabe", $ausgabe);
$smarty->assign("warenkorb", $warenkorb);

$smarty->assign("form_breite", $form_breite);
$smarty->assign("form_laenge", $form_laenge);
$smarty->assign("form_lieferung", $form_lieferung);
$smarty->assign("form_tiefreinigung", $form_tiefreinigung);

// Preis-Konstanten formatieren
function formatEuro($wert)
{
    return number_format($wert, 2, ',', '') . ' €';
}
$smarty->assign('TEPPICH_PREIS_PRO_M2', formatEuro(TEPPICH_PREIS_PRO_M2));
$smarty->assign('LIEFERKOSTEN_TEPPICHE', formatEuro(LIEFERKOSTEN_TEPPICHE));
$smarty->assign('reinigungskosten', formatEuro(reinigungskosten));

// Adminstatus setzen
$smarty->assign('ist_admin', isset($_SESSION['ist_admin']) && $_SESSION['ist_admin'] === true);

// Template anzeigen
$smarty->display("teppich.tpl");
exit();
