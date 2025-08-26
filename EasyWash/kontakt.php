<?php
session_start();

require_once ("includes/startTemplate.inc.php");
// Überschrift für die Seite setzen (wird im Template kontakt.tpl verwendet)
$smarty->assign('ueberschrift', 'Kontakt');
// Kontakt-Template anzeigen
$smarty->display('kontakt.tpl');

exit();