<!DOCTYPE html>
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

	{include file="navbar.tpl"}

	<div class="main-content">
		<div class="container mt-5">
			<h3 class="text-center mb-4">🔧 Adminbereich</h3>
			<p class="text-center text-muted">Verwalte Nutzer und Bestellungen
				zentral.</p>



			<div class="row justify-content-center gy-4 gx-5">
				<div class="row justify-content-center gy-4 gx-5">

					{if isset($meldung)}
					<div class="alert alert-info text-center">{$meldung}</div>
					{/if}
					<!-- Bestellung abschließen -->
					<div class="col-12 col-lg-8">
						<div class="card shadow-sm border-0">
							<div class="card-body">
								<h5 class="card-title">📦 Bestellung abschließen</h5>
								<form method="post" action="adminDashboard.php">
									<input type="hidden" name="csrfToken" value="{$csrfToken}">
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
									<input type="hidden" name="csrfToken" value="{$csrfToken}">
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
									<input type="hidden" name="csrfToken" value="{$csrfToken}">
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
									<input type="hidden" name="csrfToken" value="{$csrfToken}">
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
									<input type="hidden" name="csrfToken" value="{$csrfToken}">
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

				{if isset($erfolg)}
				<div class="alert alert-success mt-4 text-center">{$erfolg}</div>
				{/if}
			</div>
		</div>

		{include file="footer.tpl"}
		<script
			src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
