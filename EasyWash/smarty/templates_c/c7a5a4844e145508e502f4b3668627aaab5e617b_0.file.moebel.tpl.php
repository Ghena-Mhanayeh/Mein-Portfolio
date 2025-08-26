<?php
/* Smarty version 4.2.0, created on 2025-08-21 23:02:12
  from '/var/www/html/iksy06/EasyWash/smarty/templates/moebel.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_68a7a5744dd385_99570191',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c7a5a4844e145508e502f4b3668627aaab5e617b' => 
    array (
      0 => '/var/www/html/iksy06/EasyWash/smarty/templates/moebel.tpl',
      1 => 1755647479,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_68a7a5744dd385_99570191 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/iksy06/EasyWash/klassen/smarty/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<!DOCTYPE html>
<html lang="de">
<head>
<meta charset="UTF-8">
<title>Möbel Service</title>
<link rel="icon" type="image/png" href="images/Logo.png">
<link
	href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
	rel="stylesheet">
<link rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="stylesheet" href="/css/style.css">
</head>
<body>

	<?php $_smarty_tpl->_subTemplateRender("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	<!-- Hauptinhalt mit leichtem Abstand zur Navbar -->
	<div class="container pt-4" style="max-width: 600px;">

		<!-- Logo zentriert ohne zusätzlichen margin-top -->
		<div class="text-center mb-3"
			style="max-width: 600px; padding-top: 100px;">
			<img src="images/Logo.png" alt="Easy Wash Logo" width="100">
		</div>

		<h3 class="mb-4 text-center">Möbel – Service buchen</h3>

		<?php if ($_smarty_tpl->tpl_vars['ausgabe']->value) {?>
		<div class="alert alert-info"><?php echo $_smarty_tpl->tpl_vars['ausgabe']->value;?>
</div>
		<?php }?> <?php if ($_smarty_tpl->tpl_vars['fehler']->value) {?>
		<div class="alert alert-danger text-center"><?php echo $_smarty_tpl->tpl_vars['fehler']->value;?>
</div>
		<?php }?>

		<form method="post" class="mb-4">
			<input type="hidden" name="csrfToken" value="<?php echo $_smarty_tpl->tpl_vars['csrfToken']->value;?>
">

			<div class="mb-3">
				<label for="moebeltyp" class="form-label">Möbeltyp:</label> <select
					name="moebeltyp" id="moebeltyp" required class="form-select">
					<option value="">-- Bitte wählen --</option> <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['moebelHash']->value, 'moebel', false, 'moebel_id');
$_smarty_tpl->tpl_vars['moebel']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['moebel_id']->value => $_smarty_tpl->tpl_vars['moebel']->value) {
$_smarty_tpl->tpl_vars['moebel']->do_else = false;
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['moebel_id']->value;?>
"
						<?php if ($_smarty_tpl->tpl_vars['form_moebeltyp']->value == $_smarty_tpl->tpl_vars['moebel_id']->value) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['moebel']->value['name'];?>

						(<?php echo $_smarty_tpl->tpl_vars['moebel']->value['preis'];?>
)</option> <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
				</select>
			</div>

			<div class="mb-3">
				<label for="anzahl" class="form-label">Anzahl:</label> <input
					type="number" name="anzahl" id="anzahl" class="form-control"
					min="1" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['form_anzahl']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required>
			</div>
			<p class="mb-4">🛎️ Bitte Wählen Sie den Tag und die Uhrzeit, wann
				wir Ihre Möbel reinigen sollen:</p>
			<div class="mb-3">
				<label for="termin_datum" class="form-label">📅 Wunschtag</label> <input
					<input type="date" class="form-control" id="termin_datum" name="termin_datum" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['termin_datum']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" 
						min="<?php echo smarty_modifier_date_format(time(),'%Y-%m-%d');?>
" required>
			</div>

			<div class="mb-3">
				<label for="termin_uhrzeit" class="form-label">🕒 Wunschzeit </label> <select
					id="termin_uhrzeit" name="termin_uhrzeit" class="form-select"
					required>
					<option value="">Bitte wählen</option>
					<option value="09:00" <?php if ($_smarty_tpl->tpl_vars['form_termin_uhrzeit']->value == '09:00') {?>selected<?php }?> >09:00</option>
					<option value="16:00" <?php if ($_smarty_tpl->tpl_vars['form_termin_uhrzeit']->value == '16:00') {?>selected<?php }?>>16:00</option>
				</select>
			</div>


			<!-- Preis berechnen -->
			<div class="d-grid mt-2">
				<button type="submit" name="preis_berechnen" class="btn btn-primary">
					Preis berechnen <i class="fa-solid fa-calculator ms-2"></i>
				</button>
			</div>

			<!-- In den Warenkorb legen -->
			<div class="d-grid mt-4">
				<button type="submit" name="in_warenkorb_legen"
					class="btn btn-primary">
					In den Warenkorb legen <i class="fa-solid fa-cart-plus ms-2"></i>
				</button>
			</div>
		</form>

	</div>
	<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</body>
</html><?php }
}
