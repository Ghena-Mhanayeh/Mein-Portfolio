<?php
/* Smarty version 4.2.0, created on 2025-07-02 15:30:19
  from '/var/www/html/iksy06/EasyWash/EasyWash/smarty/templates/navbar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_6865508b9384b0_66780011',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b2d9fdf775ba4b84bb1b9b962b083e8c8e239f18' => 
    array (
      0 => '/var/www/html/iksy06/EasyWash/EasyWash/smarty/templates/navbar.tpl',
      1 => 1751448362,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6865508b9384b0_66780011 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/var/www/html/iksy06/EasyWash/EasyWash/klassen/smarty/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<!-- FIXIERTE Navbar -->
<nav
	class="navbar bg-light shadow-sm px-4 py-2 position-fixed top-0 start-0 w-100 z-3"
	style="height: 80px;">
	<div
		class="container-fluid d-flex justify-content-between align-items-center">
		<!-- ✅ Logo links -->
		<a href="startSeite.php" class="d-inline-block"> <img
			src="images/Logo.png" alt="Easy Wash Logo"
			style="height: 70px; width: auto;">
		</a>

		<!-- Benutzername, Warenkorb, Menü -->
		<div class="d-flex align-items-center">
			<!-- Benutzername -->
			<span class="fw-semibold me-3"> <i class="fa-solid fa-user me-1"></i>
				<?php echo $_smarty_tpl->tpl_vars['vorname']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['nachname']->value;?>

			</span>

			<!-- 🛒 Warenkorb-Button mit Badge -->
			<button class="btn btn-outline-primary btn-sm me-2 position-relative"
				type="button" data-bs-toggle="offcanvas"
				data-bs-target="#offcanvasWarenkorb"
				aria-controls="offcanvasWarenkorb">
				<i class="fa-solid fa-cart-shopping"></i> <?php if ((isset($_smarty_tpl->tpl_vars['warenkorb_anzahl']->value)) && $_smarty_tpl->tpl_vars['warenkorb_anzahl']->value > 0) {?> <span
					class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"><?php echo $_smarty_tpl->tpl_vars['warenkorb_anzahl']->value;?>
</span>
				<?php }?>
			</button>

			<!-- Adminbutton -->
			<?php if ($_smarty_tpl->tpl_vars['ist_admin']->value) {?> <a href="adminDashboard.php"
				class="btn btn-danger btn-sm me-2"> <i
				class="fa-solid fa-screwdriver-wrench me-1"></i> Adminbereich
			</a> <a href="bestellungenSuchen.php"
				class="btn btn-primary btn-sm me-2"> <i
				class="fa-solid fa-magnifying-glass me-1"></i> Bestellungen Suchen
			</a> <?php }?>

			<!-- Menü-Button -->
			<button id="menu-toggle" class="btn btn-outline-primary btn-sm">
				<i class="fa-solid fa-bars"></i> Menü
			</button>
		</div>
	</div>
</nav>

<!-- ✅ Offcanvas-Warenkorb -->
<div class="offcanvas offcanvas-end" tabindex="-1"
	id="offcanvasWarenkorb" aria-labelledby="offcanvasWarenkorbLabel">
	<div class="offcanvas-header border-bottom">
		<h5 class="offcanvas-title" id="offcanvasWarenkorbLabel">🛒 Dein
			Warenkorb</h5>
		<button type="button" class="btn-close" data-bs-dismiss="offcanvas"
			aria-label="Schließen"></button>
	</div>
	<div class="offcanvas-body">
		<?php if ((isset($_smarty_tpl->tpl_vars['warenkorb']->value)) && count($_smarty_tpl->tpl_vars['warenkorb']->value) > 0) {?>
		<ul class="list-group mb-3">
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['warenkorb']->value, 'eintrag', false, 'index');
$_smarty_tpl->tpl_vars['eintrag']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['index']->value => $_smarty_tpl->tpl_vars['eintrag']->value) {
$_smarty_tpl->tpl_vars['eintrag']->do_else = false;
?>
			<li class="list-group-item rounded-3 mb-2 shadow-sm">
				<div class="d-flex justify-content-between align-items-start">
					<div>
						<strong class="d-block mb-1"><?php echo $_smarty_tpl->tpl_vars['eintrag']->value['service'];?>
</strong> <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['eintrag']->value['details'], 'wert', false, 'feld');
$_smarty_tpl->tpl_vars['wert']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['feld']->value => $_smarty_tpl->tpl_vars['wert']->value) {
$_smarty_tpl->tpl_vars['wert']->do_else = false;
?> <small
							class="d-block text-muted"> <?php if ($_smarty_tpl->tpl_vars['feld']->value == 'Wunschtermin') {?> <?php echo $_smarty_tpl->tpl_vars['feld']->value;?>
:
							<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['wert']->value,"%d.%m.%Y");?>
 <?php } else { ?> <?php echo $_smarty_tpl->tpl_vars['feld']->value;?>
: <?php echo $_smarty_tpl->tpl_vars['wert']->value;?>
 <?php }?> </small>

						<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?> <strong class="d-block mt-2">Preis:
							<?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['eintrag']->value['preis']);?>
 €</strong>
					</div>
					<form method="post" action="warenkorbLöschen.php">
						<input type="hidden" name="aktion" value="entfernen"> <input
							type="hidden" name="index" value="<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
">
						<button type="submit" class="btn btn-sm btn-outline-danger"
							title="Entfernen">
							<i class="fa-solid fa-xmark"></i>
						</button>
					</form>
				</div>
			</li> <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</ul>

		<form method="post" action="zahlung.php">
			<?php $_smarty_tpl->_assignInScope('hat_wunschdatum_service', false);?> <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['warenkorb']->value, 'eintrag');
$_smarty_tpl->tpl_vars['eintrag']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['eintrag']->value) {
$_smarty_tpl->tpl_vars['eintrag']->do_else = false;
?> <?php if ($_smarty_tpl->tpl_vars['eintrag']->value['service'] == "Kleidung" || $_smarty_tpl->tpl_vars['eintrag']->value['service'] == "Teppich") {?> <?php $_smarty_tpl->_assignInScope('hat_wunschdatum_service', true);?> <?php break 1;?> <?php }?> <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?> <?php if ($_smarty_tpl->tpl_vars['hat_wunschdatum_service']->value) {?>
			<div class="alert alert-secondary">
				<span class="d-block text-decoration-underline fw-semibold"
					role="button" data-bs-toggle="collapse" href="#wunschdatumCollapse"
					aria-expanded="false" aria-controls="wunschdatumCollapse"
					style="cursor: pointer;"> 📅 Lieferung/Abholung Termin hinzufügen <span
					class="text-danger">*</span>
					<div class="collapse mt-3" id="wunschdatumCollapse">
						<div class="card card-body bg-light border-0 shadow-sm rounded-3">
							<label for="wunschdatum_global" class="form-label">Gewünschtes
								Datum:</label> <input type="date" class="form-control"
								id="serviceWunschDatum" name="serviceWunschDatum"
								value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['serviceWunschDatum']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
"
								min="<?php echo smarty_modifier_date_format(time(),'%Y-%m-%d');?>
">

						</div>
					</div>
			
			</div>
			<?php }?> <input type="hidden" name="csrfToken" value="<?php echo $_smarty_tpl->tpl_vars['csrfToken']->value;?>
">

			<?php $_smarty_tpl->_assignInScope('lieferung_erforderlich', false);?> <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['warenkorb']->value, 'eintrag');
$_smarty_tpl->tpl_vars['eintrag']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['eintrag']->value) {
$_smarty_tpl->tpl_vars['eintrag']->do_else = false;
?> <?php if (((isset($_smarty_tpl->tpl_vars['eintrag']->value['details']['Lieferung'])) && $_smarty_tpl->tpl_vars['eintrag']->value['details']['Lieferung'] == 'Ja') || ((isset($_smarty_tpl->tpl_vars['eintrag']->value['details']['Liefern'])) && $_smarty_tpl->tpl_vars['eintrag']->value['details']['Liefern'] == 'Ja') || $_smarty_tpl->tpl_vars['eintrag']->value['service'] == 'Möbel') {?> <?php $_smarty_tpl->_assignInScope('lieferung_erforderlich', true);?> <?php }?> <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?> <?php if ($_smarty_tpl->tpl_vars['lieferung_erforderlich']->value) {?>
			<div class="alert alert-secondary">
				<span class="d-block text-decoration-underline fw-semibold"
					role="button" data-bs-toggle="collapse"
					href="#lieferadresseCollapse" aria-expanded="false"
					aria-controls="lieferadresseCollapse" style="cursor: pointer;"> 📌
					Lieferadresse hinzufügen <span class="text-danger">*</span>
				</span>
				<div class="collapse mt-3" id="lieferadresseCollapse">
					<div class="card card-body bg-light border-0 shadow-sm rounded-3">
						<div class="mb-2">
							<label class="form-label">Straße</label> <input type="text"
								class="form-control" name="liefer_strasse" >
						</div>
						<div class="mb-2">
							<label class="form-label">Adresszusatz</label> <input type="text"
								class="form-control" name="liefer_adresszusatz">
						</div>

						<div class="mb-2">
							<label class="form-label">PLZ</label> <input type="text"
								class="form-control" name="liefer_plz">
						</div>


						<div class="mb-2">
							<label class="form-label">Stadt</label>  <input
								type="text" class="form-control" name="liefer_stadt"
								pattern="^[A-Za-zäöüßÄÖÜ\s-]{2,}$"
								title="Bitte einen gültigen Ortsnamen eingeben" required>
							
						</div>

						<div class="mb-2">
							<label class="form-label">Land</label> <input type="text"
								class="form-control" name="liefer_land" value="Deutschland">
						</div>
					</div>
				</div>
			</div>
			<?php }?>

			<button type="submit" class="btn btn-primary w-100 mb-2">
				Weiter zur Zahlung <i class="fa-solid fa-check ms-2"></i>
			</button>

		</form>

		<form method="post" action="warenkorbLöschen.php">
			<input type="hidden" name="aktion" value="leeren">
			<button type="submit" class="btn btn-outline-danger w-100">
				Warenkorb leeren <i class="fa-solid fa-trash ms-2"></i>
			</button>
		</form>
		<?php } else { ?>
		<div class="text-center text-muted">
			<p>🛒 Dein Warenkorb ist leer.</p>
		</div>
		<?php }?>
	</div>
</div>

<!-- Menü Dropdown -->
<div id="dashboard-menu"
	class="dropdown-menu shadow mt-2 end-0 rounded-3"
	style="display: none; position: absolute; top: 80px; right: 1rem;">
	<a class="dropdown-item" href="benutzerBuchungen.php"> <i
		class="fa-solid fa-clipboard-list me-2"></i> Buchungen ansehen
	</a> <a class="dropdown-item" href="benutzerkonto.php"> <i
		class="fa-solid fa-users me-2"></i> Benutzerkonto
	</a>
	<div class="dropdown-divider"></div>
	<a class="dropdown-item text-danger" href="logout.php"> <i
		class="fa-solid fa-right-from-bracket me-2"></i> Abmelden
	</a>
</div>

<!-- JS für Dropdown-Menü -->
<?php echo '<script'; ?>
>
	const menuToggle = document.getElementById('menu-toggle');
	const dashboardMenu = document.getElementById('dashboard-menu');

	menuToggle.addEventListener('click', () => {
		dashboardMenu.style.display = dashboardMenu.style.display === 'block' ? 'none' : 'block';
	});

	document.addEventListener('click', function (event) {
		if (!menuToggle.contains(event.target) && !dashboardMenu.contains(event.target)) {
			dashboardMenu.style.display = 'none';
		}
	});
<?php echo '</script'; ?>
>

<!-- Bootstrap JS -->
<?php echo '<script'; ?>

	src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>

<?php }
}
