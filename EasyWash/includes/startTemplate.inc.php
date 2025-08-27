<?php
// //zeigt immer auf dein Projekt-Root EasyWash, egal wo das Projekt liegt.
// $ROOT_DIR = dirname(__DIR__);
// require_once ("$ROOT_DIR/klassen/smarty/libs/Smarty.class.php");
// require_once ("$ROOT_DIR/klassen/SmartyEscaped.inc.php");

// $smarty = new SmartyEscaped();


// $smarty->setTemplateDir("$ROOT_DIR/smarty/templates/");
// $smarty->setCompileDir("$ROOT_DIR/smarty/templates_c/");
// $smarty->setConfigDir("$ROOT_DIR/smarty/configs/");
// $smarty->setCacheDir("$ROOT_DIR/smarty/cache/");

// $smarty->assign('ist_admin', isset($_SESSION['ist_admin']) && $_SESSION['ist_admin'] === true);

$ROOT_DIR = dirname(__DIR__);

// Composer-Autoload statt eigener Smarty-Kopie
require_once "$ROOT_DIR/vendor/autoload.php";

// Deine erweiterte Klasse (null-safe Escaping)
require_once "$ROOT_DIR/klassen/SmartyEscaped.inc.php";

// Jetzt kommt Smarty aus vendor/smarty/smarty (4.x)
$smarty = new SmartyEscaped();

// Verzeichnisse bleiben deine eigenen
$smarty->setTemplateDir("$ROOT_DIR/smarty/templates/");
$smarty->setCompileDir("$ROOT_DIR/smarty/templates_c/");
$smarty->setConfigDir("$ROOT_DIR/smarty/configs/");
$smarty->setCacheDir("$ROOT_DIR/smarty/cache/");

// (Optional) Version prüfen – landet in den Logs
if (class_exists('Smarty')) {
    error_log('Smarty version: ' . Smarty::SMARTY_VERSION);
}

$smarty->assign('ist_admin', isset($_SESSION['ist_admin']) && $_SESSION['ist_admin'] === true);

?>