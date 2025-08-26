<?php
session_start();

require_once ("./includes/startTemplate.inc.php"); // Smarty vorbereiten
// Standardwerte setzen, wenn noch keine Benutzerdaten vorhanden sind
// $vorname und $nachname auf null setzen, damit sie im Template immer existieren
// verhindert Smarty-Fehler bei Ausdrücken wie {if $vorname} in index.tpl
$smarty->assign('vorname', null);

$smarty->assign('nachname', null);
// Startseite (index.tpl) anzeigen
$smarty->display("index.tpl");

exit();