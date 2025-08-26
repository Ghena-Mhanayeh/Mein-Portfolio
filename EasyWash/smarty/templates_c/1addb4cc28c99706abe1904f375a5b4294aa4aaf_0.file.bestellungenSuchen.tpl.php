<?php
/* Smarty version 4.2.0, created on 2025-08-20 00:12:34
  from '/var/www/html/iksy06/EasyWash/smarty/templates/bestellungenSuchen.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_68a512f2d51d00_44346372',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1addb4cc28c99706abe1904f375a5b4294aa4aaf' => 
    array (
      0 => '/var/www/html/iksy06/EasyWash/smarty/templates/bestellungenSuchen.tpl',
      1 => 1755648751,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_68a512f2d51d00_44346372 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/iksy06/EasyWash/klassen/smarty/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<!DOCTYPE html>
<html lang="de">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bestellungen suchen</title>
<link
	href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
	rel="stylesheet">
<link rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="stylesheet" href="/css/style.css">
</head>
<body
	style="display: flex; flex-direction: column; min-height: 100vh; padding-top: 100px;">

	<?php $_smarty_tpl->_subTemplateRender("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	<main class="container mb-5">
		<h1 class="mb-4">📦 Bestellungen durchsuchen</h1>

		<?php if ((isset($_smarty_tpl->tpl_vars['meldung']->value)) && $_smarty_tpl->tpl_vars['meldung']->value != '') {?>
		<div class="alert alert-warning text-center"><?php echo $_smarty_tpl->tpl_vars['meldung']->value;?>
</div>
		<?php }?>
		<!-- 🔍 Filterformular -->
		<form method="post" class="row g-3 mb-4">
			<input type="hidden" name="csrfToken" value="<?php echo $_smarty_tpl->tpl_vars['csrfToken']->value;?>
">
			<div class="col-md-3">
				<label for="bestellung_id" class="form-label">Bestellung-ID</label>
				<input type="number" class="form-control" name="bestellung_id"
					id="bestellung_id" min="1" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['filter']->value['bestellung_id'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
			</div>
			<div class="col-md-3">
				<label for="kunde_id" class="form-label">Kunden-ID</label> <input
					type="number" class="form-control" name="kunde_id" id="kunde_id"
					min="1" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['filter']->value['kunde_id'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
			</div>
			<div class="col-md-3">
				<label for="status" class="form-label">Status</label> <select
					class="form-select" name="status" id="status">
					<option value="">-- Alle --</option>
					<option value="offen" <?php if ($_smarty_tpl->tpl_vars['filter']->value['status'] == 'offen') {?>selected<?php }?>>Offen</option>
					<option value="abgeschlossen" <?php if ($_smarty_tpl->tpl_vars['filter']->value['status'] == 'abgeschlossen') {?>selected<?php }?>>Abgeschlossen</option>
				</select>
			</div>
			<div class="col-md-3">
				<label for="bezahlt" class="form-label">Bezahlt</label> <select
					class="form-select" name="bezahlt" id="bezahlt">
					<option value="">-- Alle --</option>
					<option value="Ja" <?php if ($_smarty_tpl->tpl_vars['filter']->value['bezahlt'] == 'Ja') {?>selected<?php }?>>Ja</option>
					<option value="Nein" <?php if ($_smarty_tpl->tpl_vars['filter']->value['bezahlt'] == 'Nein') {?>selected<?php }?>>Nein</option>
				</select>
			</div>
			<div class="col-12 text-end">
				<button type="submit" class="btn btn-primary">
					<i class="fa-solid fa-search me-1"></i> Suchen
				</button>
			</div>
		</form>

		<!-- 📋 Tabelle mit Ergebnissen -->
		<?php if ((isset($_smarty_tpl->tpl_vars['ergebnisse']->value)) && count($_smarty_tpl->tpl_vars['ergebnisse']->value) > 0) {?>
		<div class="table-responsive">
			<table class="table table-striped table-bordered align-middle">
				<thead class="table-light">
					<tr>
						<th>Bestellung-ID</th>
						<th>Kunde-ID</th>
						<th>Termin-ID</th>
						<th>Vorname</th>
						<th>Nachname</th>
						<th>Telefon</th>
						<th>Bestellt am</th>
						<th>Wunschdatum</th>
						<th>Status</th>
						<th>Bezahlt</th>
					</tr>
				</thead>
				<tbody>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ergebnisse']->value, 'eintrag');
$_smarty_tpl->tpl_vars['eintrag']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['eintrag']->value) {
$_smarty_tpl->tpl_vars['eintrag']->do_else = false;
?>
					<tr>
						<td><?php echo $_smarty_tpl->tpl_vars['eintrag']->value['bestellung_id'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['eintrag']->value['kunde_id'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['eintrag']->value['termin_id'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['eintrag']->value['vorname'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['eintrag']->value['nachname'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['eintrag']->value['telefonnummer'];?>
</td>
						<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['eintrag']->value['bestellt_am'],"%d.%m.%Y %H:%M");?>
</td>
						<td><?php if ($_smarty_tpl->tpl_vars['eintrag']->value['wunschdatum']) {
echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['eintrag']->value['wunschdatum'],"%d.%m.%Y");
} else { ?>-<?php }?></td>
						<td><?php echo $_smarty_tpl->tpl_vars['eintrag']->value['status'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['eintrag']->value['bezahlt'];?>
</td>
						<td><a
							href="bestellungDetailsAdmin.php?id=<?php echo $_smarty_tpl->tpl_vars['eintrag']->value['bestellung_id'];?>
"
							class="btn btn-sm btn-outline-info"> 📄 Details </a></td>
					</tr>
					<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
				</tbody>
			</table>
		</div>
		<?php } else { ?>
		<div class="alert alert-info">Keine Bestellungen gefunden.</div>
		<?php }?>
	</main>

	<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	<?php echo '<script'; ?>

		src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
