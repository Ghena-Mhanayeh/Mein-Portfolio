<?php
/* Smarty version 4.2.0, created on 2025-07-02 21:38:35
  from '/var/www/html/iksy05/EasyWash/EasyWash/smarty/templates/kleidung.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_6865a6db361ea5_72308805',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e4ae7a97c89815f5e3e364c15cd8d534f3409f15' => 
    array (
      0 => '/var/www/html/iksy05/EasyWash/EasyWash/smarty/templates/kleidung.tpl',
      1 => 1751413661,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6865a6db361ea5_72308805 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="de">
<head>
<meta charset="UTF-8">
<title>Kleidung Service</title>
<link rel="icon" type="image/png" href="images/Logo.png">
<link
	href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
	rel="stylesheet">
<link rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="stylesheet" href="css/style.css">
</head>
<body>

	<?php $_smarty_tpl->_subTemplateRender("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	<div class="container" style="max-width: 600px; margin-top: 120px;">
		<div class="text-center mb-3">
			<img src="images/Logo.png" alt="Easy Wash Logo" width="100">
		</div>

		<h3 class="mb-4 text-center">Kleidung – Service buchen</h3>

		<?php if ($_smarty_tpl->tpl_vars['ausgabe']->value) {?>
		<div class="alert alert-info"><?php echo $_smarty_tpl->tpl_vars['ausgabe']->value;?>
</div>
		<?php }?>

		<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['PHP_SELF']->value;?>
" class="mb-4">
			<input type="hidden" name="csrfToken" value="<?php echo $_smarty_tpl->tpl_vars['csrfToken']->value;?>
">

			<!-- KG-Anzahl -->
			<div class="mb-3">
				<label class="form-label">Kg Anzahl (<?php echo $_smarty_tpl->tpl_vars['GRUNDPREIS_KLEIDUNG']->value;?>
) </label>
				<input type="number" class="form-control" name="kg" id="kg" min="1"
					max="20" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['form_kg']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required>
			</div>

			<!-- Farbkategorie -->
			<div class="mb-3">
				<label for="farbekategorie" class="form-label">Farbe:</label> <select
					name="farbekategorie" id="farbekategorie" required
					class="form-select">
					<option value="">-- Bitte wählen --</option> <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['farbehash']->value, 'farbe', false, 'farbe_id');
$_smarty_tpl->tpl_vars['farbe']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['farbe_id']->value => $_smarty_tpl->tpl_vars['farbe']->value) {
$_smarty_tpl->tpl_vars['farbe']->do_else = false;
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['farbe_id']->value;?>
"
						<?php if ($_smarty_tpl->tpl_vars['form_farbe']->value == $_smarty_tpl->tpl_vars['farbe_id']->value) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['farbe']->value['name'];?>

						(+<?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['farbe']->value['preis']);?>
 €)</option> <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
				</select>
			</div>

			<!-- Bügeln -->
			<div class="mb-3">
				<label class="form-label">Bügeln? (<?php echo $_smarty_tpl->tpl_vars['bugelnPreis']->value;?>
)</label><br>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="bügeln"
						value="Ja" required <?php if ($_smarty_tpl->tpl_vars['form_bugeln']->value == 'Ja') {?>checked<?php }?>> <label
						class="form-check-label">ja</label>
				</div>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="bügeln"
						value="Nein" <?php if ($_smarty_tpl->tpl_vars['form_bugeln']->value == 'Nein') {?>checked<?php }?>> <label
						class="form-check-label">Nein</label>
				</div>
			</div>

			<!-- Liefern lassen -->
			<div class="mb-3">
				<label class="form-label">Liefern lassen? (<?php echo $_smarty_tpl->tpl_vars['LIEFERKOSTEN_KLEIDUNG']->value;?>
)</label><br>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="liefern"
						id="lieferJa" value="Ja" required <?php if ($_smarty_tpl->tpl_vars['form_liefern']->value == 'Ja') {?>checked<?php }?>>
					<label class="form-check-label" for="lieferJa">Ja</label>
				</div>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="liefern"
						id="lieferNein" value="Nein" <?php if ($_smarty_tpl->tpl_vars['form_liefern']->value == 'Nein') {?>checked<?php }?>>
					<label class="form-check-label" for="lieferNein">Nein</label>
				</div>
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

<!-- Bootstrap JS -->
<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>

</body>
</html><?php }
}
