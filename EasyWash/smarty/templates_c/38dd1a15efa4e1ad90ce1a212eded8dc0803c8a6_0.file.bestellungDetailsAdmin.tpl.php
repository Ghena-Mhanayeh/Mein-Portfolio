<?php
/* Smarty version 4.2.0, created on 2025-08-20 00:12:58
  from '/var/www/html/iksy06/EasyWash/smarty/templates/bestellungDetailsAdmin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_68a5130ad55cc7_62961162',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '38dd1a15efa4e1ad90ce1a212eded8dc0803c8a6' => 
    array (
      0 => '/var/www/html/iksy06/EasyWash/smarty/templates/bestellungDetailsAdmin.tpl',
      1 => 1751480349,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_68a5130ad55cc7_62961162 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="de">
<head>
<meta charset="UTF-8">
<title>Bestelldetails</title>
<link
	href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
	rel="stylesheet">
<link rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="stylesheet" href="css/style.css">
</head>
<body style="padding-top: 100px;">

	<?php $_smarty_tpl->_subTemplateRender("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	<div class="container my-5">
		<h2 class="mb-4">📦 Bestellpositionen zur Bestellung #<?php echo $_smarty_tpl->tpl_vars['bestellung_id']->value;?>
</h2>

		<?php if ((isset($_smarty_tpl->tpl_vars['meldung']->value))) {?>
		<div class="alert alert-info"><?php echo $_smarty_tpl->tpl_vars['meldung']->value;?>
</div>
		<?php } else { ?> <?php if ((isset($_smarty_tpl->tpl_vars['positionen']->value)) && count($_smarty_tpl->tpl_vars['positionen']->value) > 0) {?>
		<!-- Tabelle mit Positionen -->
		<div class="table-responsive">
			<table class="table table-striped table-bordered align-middle">
				<thead class="table-light">
					<tr>
						<th>Service</th>
						<th>Details</th>
						<th>Preis</th>
					</tr>
				</thead>
				<tbody>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['positionen']->value, 'position');
$_smarty_tpl->tpl_vars['position']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['position']->value) {
$_smarty_tpl->tpl_vars['position']->do_else = false;
?>
					<tr>
						<td><?php echo $_smarty_tpl->tpl_vars['position']->value['service_name'];?>
</td>
						<td><?php if ((isset($_smarty_tpl->tpl_vars['position']->value['details_array']))) {?>
							<ul class="mb-0 ps-3">
								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['position']->value['details_array'], 'value', false, 'key');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
								<li><strong><?php echo $_smarty_tpl->tpl_vars['key']->value;?>
:</strong> <?php echo $_smarty_tpl->tpl_vars['value']->value;?>
</li> <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
							</ul> <?php } else { ?> <em>Keine Details verfügbar</em> <?php }?>
						</td>
						<td><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['position']->value['preis']);?>
 €</td>
					</tr>
					<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
				</tbody>
			</table>
		</div>
		<?php } else { ?>
		<div class="alert alert-info">Keine Positionen für diese Bestellung
			gefunden.</div>
		<?php }?> <?php }?> <a href="bestellungenSuchen.php"
			class="btn btn-secondary mt-3"> <i class="fa-solid fa-arrow-left"></i>
			Zurück zur Übersicht
		</a>
	</div>

	<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	<?php echo '<script'; ?>

		src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
