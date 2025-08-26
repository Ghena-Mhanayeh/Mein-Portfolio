<?php
//zeigt immer auf dein Projekt-Root EasyWash, egal wo das Projekt liegt.
$ROOT_DIR = dirname(__DIR__);
require_once ("$ROOT_DIR/klassen/smarty/libs/Smarty.class.php");
require_once ("$ROOT_DIR/klassen/SmartyEscaped.inc.php");

$smarty = new SmartyEscaped();


$smarty->setTemplateDir("$ROOT_DIR/smarty/templates/");
$smarty->setCompileDir("$ROOT_DIR/smarty/templates_c/");
$smarty->setConfigDir("$ROOT_DIR/smarty/configs/");
$smarty->setCacheDir("$ROOT_DIR/smarty/cache/");

$smarty->assign('ist_admin', isset($_SESSION['ist_admin']) && $_SESSION['ist_admin'] === true);
?>