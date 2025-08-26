<?php
/* Smarty version 4.2.0, created on 2025-07-02 15:24:42
  from '/var/www/html/iksy06/EasyWash/EasyWash/smarty/templates/adminDashboard.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.0',
  'unifunc' => 'content_68654f3abe1ec0_13439044',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '036e65a58c2e668044c730a9b39c79637aae5008' => 
    array (
      0 => '/var/www/html/iksy06/EasyWash/EasyWash/smarty/templates/adminDashboard.tpl',
      1 => 1751469875,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_68654f3abe1ec0_13439044 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="de">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin Dashboard</title>
<link
	href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
	rel="stylesheet">
<link rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="stylesheet" href="css/style.css">
</head>
<body
	style="display: flex; flex-direction: column; min-height: 100vh; padding-top: 100px;">

	<?php $_smarty_tpl->_subTemplateRender("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	<div class="main-content">
		<div class="container mt-5">
			<h3 class="text-center mb-4">🔧 Adminbereich</h3>
			<p class="text-center text-muted">Verwalte Nutzer und Bestellungen
				zentral.</p>



			<div class="row justify-content-center gy-4 gx-5">
				<div class="row justify-content-center gy-4 gx-5">

					<?php if ((isset($_smarty_tpl->tpl_vars['meldung']->value))) {?>
					<div class="alert alert-info text-center"><?php echo $_smarty_tpl->tpl_vars['meldung']->value;?>
</div>
					<?php }?>
					<!-- Bestellung abschließen -->
					<div class="col-12 col-lg-8">
						<div class="card shadow-sm border-0">
							<div class="card-body">
								<h5 class="card-title">📦 Bestellung abschließen</h5>
								<form method="post" action="adminDashboard.php">
									<input type="hidden" name="csrfToken" value="<?php echo $_smarty_tpl->tpl_vars['csrfToken']->value;?>
">
									<div class="mb-3">
										<label for="bestellung_id_abschliessen" class="form-label">Bestellungs-ID</label>
										<input type="number" name="bestellung_id_abschliessen"
											id="bestellung_id_abschliessen" class="form-control" required>
									</div>
									<button type="submit" name="Bestellung_abschliessen"
										class="btn btn-primary w-100">Bestellung abschließen</button>
								</form>
							</div>
						</div>
					</div>


					<!-- Bestellung als bezahlt -->
					<div class="col-12 col-lg-8">
						<div class="card shadow-sm border-0">
							<div class="card-body">
								<h5 class="card-title">💳 Bestellung als bezahlt markieren</h5>
								<form method="post" action="adminDashboard.php">
									<input type="hidden" name="csrfToken" value="<?php echo $_smarty_tpl->tpl_vars['csrfToken']->value;?>
">
									<div class="mb-3">
										<label for="bestellung_id" class="form-label">Bestellungs-ID</label>
										<input type="number" name="bezahlte_bestellung_id"
											id="bestellung_id" class="form-control" required>
									</div>
									<button type="submit" name="bezahlt"
										class="btn btn-primary w-100">Als bezahlt markieren</button>
								</form>
							</div>
						</div>
					</div>

					<!-- Termin absagen -->
					<div class="col-12 col-lg-8">
						<div class="card shadow-sm border-0">
							<div class="card-body">
								<h5 class="card-title">🗓️❌ Möbelreinigung Termin absagen</h5>
								<form method="post" action="adminDashboard.php">
									<input type="hidden" name="csrfToken" value="<?php echo $_smarty_tpl->tpl_vars['csrfToken']->value;?>
">
									<div class="mb-3">
										<label for="termin_id" class="form-label">Termin-ID</label> <input
											type="number" name="abgesagte_Termin_id" id="Termin_id"
											class="form-control" required>
									</div>
									<button type="submit" name="TerminAbsagen"
										class="btn btn-primary w-100">Termin absagen</button>
								</form>
							</div>
						</div>
					</div>

					<!-- Nutzer sperren -->
					<div class="col-12 col-lg-8">
						<div class="card shadow-sm border-0">
							<div class="card-body">
								<h5 class="card-title">🔓 Nutzer sperren</h5>
								<form method="post" action="adminDashboard.php">
									<input type="hidden" name="csrfToken" value="<?php echo $_smarty_tpl->tpl_vars['csrfToken']->value;?>
">
									<div class="mb-3">
										<label for="gesperrteKunde_id" class="form-label">Kunden-ID</label>
										<input type="number" name="gesperrteKunde_id"
											id="gesperrteKunde_id" class="form-control" required>
									</div>
									<button type="submit" name="sperren"
										class="btn btn-primary w-100">Sperren</button>
								</form>
							</div>
						</div>
					</div>

					<!-- Nutzer entsperren -->
					<div class="col-12 col-lg-8">
						<div class="card shadow-sm border-0 mt-4">
							<div class="card-body">
								<h5 class="card-title">👥 Nutzer entsperren</h5>
								<form method="post" action="adminDashboard.php">
									<input type="hidden" name="csrfToken" value="<?php echo $_smarty_tpl->tpl_vars['csrfToken']->value;?>
">
									<div class="mb-3">
										<label for="entsperrteKunde_id" class="form-label">Kunden-ID</label>
										<input type="number" name="entsperrteKunde_id"
											id="entsperrteKunde_id" class="form-control" required>
									</div>
									<button type="submit" name="entsperren"
										class="btn btn-primary w-100">Entsperren</button>
								</form>
							</div>
						</div>
					</div>

				</div>

				<?php if ((isset($_smarty_tpl->tpl_vars['erfolg']->value))) {?>
				<div class="alert alert-success mt-4 text-center"><?php echo $_smarty_tpl->tpl_vars['erfolg']->value;?>
</div>
				<?php }?>
			</div>
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
