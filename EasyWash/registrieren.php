<?php
session_start();
require_once ("./includes/startTemplate.inc.php");
require_once ("./klassen/WaschsalonDaten.inc.php");
require_once ("./klassen/Funktionen.inc.php");
require_once ("./klassen/Sicherheit.inc.php");
require_once ("./klassen/DbFunctions.inc.php");
require_once ("./klassen/TCPDF/tcpdf.php");
require_once ("./klassen/SVGGraph/autoloader.php");

$PHP_SELF = $_SERVER['PHP_SELF'];
$REQUEST_METHOD = $_SERVER['REQUEST_METHOD'];
$link = DbFunctions::connectWithDatabase();
$ueberschrift = "Easy Wash";
$smarty->assign("ueberschrift", $ueberschrift);
$smarty->assign('passwortPattern', '^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$');
$smarty->assign('namePattern',  '^[A-Za-zÄÖÜäöüß \-]+$');    
$smarty->assign('phonePattern', '^\+?[0-9\- ]{6,20}$'); 
$smarty->assign('plzPattern', '^\d{5}$');  
$smarty->assign('emailPattern', '.+@.+\..+'); 

$form_vorname = '';
$form_nachname = '';
$form_email = '';
$form_telefonnummer = '';
$form_strasse = '';
$form_adresszusatz = '';
$form_plz = '';
$form_stadt = '';
$form_land = 'Deutschland';

if (! ($REQUEST_METHOD == "POST")) {

    if (! isset($_SESSION["csrfToken"])) {
        $_SESSION["csrfToken"] = bin2hex(random_bytes(64));
    }
    
    $smarty->assign('PHP_SELF', $PHP_SELF);
  
} else {
    if (! isset($_POST["csrfToken"]) || ! isset($_SESSION["csrfToken"]) || $_POST["csrfToken"] != $_SESSION["csrfToken"]) {
        unset($_SESSION["csrfToken"]);
        die("CSRF Token ungültig!");
    }
    
    
    // Werte aus dem Formular holen
    $vorname = trim($_POST['vorname']);
    $nachname = trim($_POST['nachname']);
    $email = trim($_POST['email']);
    $passwort = trim($_POST['passwort']);
    $passwortWiederholt = trim($_POST['passwortWiederholt']);
    $telefonnummer = trim($_POST['telefonnummer']);
    $strasse = trim($_POST['strasse']);
    $adresszusatz = trim($_POST['adresszusatz']);
    $plz = trim($_POST['plz']);
    $stadt = trim($_POST['stadt']);
    $land = trim($_POST['land']);
    $registrieren = $_POST['registrieren'];
    $verifizierungsToken = bin2hex(random_bytes(32));
    
    $form_vorname = $vorname;
    $form_nachname = $nachname;
    $form_email = $email;
    $form_telefonnummer = $telefonnummer;
    $form_strasse = $strasse;
    $form_adresszusatz = $adresszusatz;
    $form_plz = $plz;
    $form_stadt = $stadt;
    $form_land = $land;
    
    // Validierung mit Sicherheit-Klasse
    if (
        !Sicherheit::isValidName($vorname) ||
        !Sicherheit::isValidName($nachname) ||
        !Sicherheit::isValidEmail($email) ||
        !Sicherheit::isValidPhone($telefonnummer) ||
        !Sicherheit::isValidPLZ($plz) ||
        empty($strasse) ||
        empty($stadt) ||
        empty($land)
        ) {
            $smarty->assign('fehler', 'Bitte überprüfe deine Eingaben. Es wurden ungültige Werte erkannt.');
            Funktionen::formWerteZeigen($smarty);
            $smarty->assign('csrfToken', $_SESSION['csrfToken']);
            $smarty->display('registrieren.tpl');
            exit();
        }
        
    
    if (isset($_POST['registrieren'])) {
        $emailHash = WaschsalonDaten::holeEmails($link);
        $bereitsRegestriert = Funktionen::bereitsRegestriert($email, $emailHash);

        if ($bereitsRegestriert) {
            $smarty->assign('fehler', 'Diese E-Mail ist bereits registriert.');
            Funktionen::formWerteZeigen($smarty);
            $smarty->assign('csrfToken', $_SESSION['csrfToken']);
            $smarty->display('registrieren.tpl');
            exit();
        } else {
            if ($passwort !== $passwortWiederholt) {
                $smarty->assign('fehler', 'Die Passwörter stimmen nicht überein.');
                Funktionen::formWerteZeigen($smarty);
                $smarty->assign('csrfToken', $_SESSION['csrfToken']);
                $smarty->display('registrieren.tpl');
                exit();
            } else {

                WaschsalonDaten::gibKundeEin($link, $nachname, $vorname, $email, $passwort, $verifizierungsToken, $telefonnummer);
                
                //Kunde_id holen
                
                $kundeDatenHash=WaschsalonDaten::holeNutzerDatenByEmail($link, $email);
                $kunde_id = $kundeDatenHash['kunde_id'];
                
                WaschsalonDaten::gibAdresseEin($link, $kunde_id, $strasse, $plz, $stadt, $land, $adresszusatz);
                
                $verifizierungsLink = "verifizierung.php?email=" . urlencode($email) . "&token=" . urlencode($verifizierungsToken);
                $smarty->assign('verifizierungsLink', $verifizierungsLink);
                $smarty->display('verifizierung.tpl');
                exit();
            }
        }
    }
}



$smarty->assign('csrfToken', $_SESSION['csrfToken']);

$smarty->assign('ist_admin', isset($_SESSION['ist_admin']) && $_SESSION['ist_admin'] === true);

$smarty->display('registrieren.tpl');
?>