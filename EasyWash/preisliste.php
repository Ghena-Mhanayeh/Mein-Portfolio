<?php
session_start();
require_once ("includes/startTemplate.inc.php");
require_once ("./klassen/Preise.inc.php");


$smarty->assign('ueberschrift', 'Preisliste');


function formatEuro($wert) {
    return number_format($wert, 2, ',', '') . ' €';
}



//Die Preise werden von Preise.inc.php geholt damit die Preise dynamisch im Template angezeigt oder berechnet werden können

// Möbelpreise an Smarty übergeben
$smarty->assign('MATRATZE', formatEuro(MATRATZE));
$smarty->assign('SESSEL', formatEuro(SESSEL));
$smarty->assign('GARDINEN', formatEuro(GARDINEN));
$smarty->assign('ECKSOFA', formatEuro(ECKSOFA));
$smarty->assign('ZWEI_SITZER_SOFA', formatEuro(ZWEI_SITZER_SOFA));
$smarty->assign('DREI_SITZER_SOFA', formatEuro(DREI_SITZER_SOFA));

// Kleidungspreise übergeben
$smarty->assign('GRUNDPREIS_KLEIDUNG', formatEuro(GRUNDPREIS_KLEIDUNG));
$smarty->assign('aufschlag_weiss', formatEuro(aufschlag_weiss));
$smarty->assign('aufschlag_schwarz', formatEuro(aufschlag_schwarz));
$smarty->assign('aufschlag_mix', formatEuro(aufschlag_mix));
$smarty->assign('bugelnPreis', formatEuro(bugelnPreis));
$smarty->assign('LIEFERKOSTEN_KLEIDUNG', formatEuro(LIEFERKOSTEN_KLEIDUNG));

// Teppichpreise übergeben
$smarty->assign('TEPPICH_PREIS_PRO_M2', formatEuro(TEPPICH_PREIS_PRO_M2));
$smarty->assign('LIEFERKOSTEN_TEPPICHE', formatEuro(LIEFERKOSTEN_TEPPICHE));
$smarty->assign('reinigungskosten', formatEuro(reinigungskosten));


$smarty->display('preisliste.tpl');
exit();
?>