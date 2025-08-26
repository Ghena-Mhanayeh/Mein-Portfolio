<?php
session_start();

require_once ("includes/startTemplate.inc.php");
// Überschrift für das Impressum im Template setzen
$smarty->assign('ueberschrift', 'Impressum');
// Template anzeigen
$smarty->display('impressum.tpl');
exit();