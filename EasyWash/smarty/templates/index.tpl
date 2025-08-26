<!DOCTYPE html>
<html lang="de">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Easy Wash</title>
<link rel="icon" type="image/png" href="images/Logo.png">
<link
	href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
	rel="stylesheet">
<link rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="stylesheet" href="/css/style.css">
</head>
<body>
	<div class="container mt-3">
		<nav
			class="navbar bg-light shadow-sm px-4 py-2 position-fixed top-0 start-0 w-100 z-3"
			style="height: 80px;">
			<!-- Logo links -->
			<img src="images/Logo.png" alt="Easy Wash Logo"
				style="height: 75px; width: auto;">

			<!-- Buttons rechts -->
			<div>
				<a href="login.php" class="btn btn-outline-primary me-2">Login</a> <a
					href="registrieren.php" class="btn btn-primary">Registrieren</a>
			</div>
		</nav>

		<!-- Hauptinhalt zentriert -->
		<div class="text-center mt-5">
			<h1
				style="font-size: 3rem; font-weight: 900; color: #008ddc; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 1rem; padding-top: 88px;">
				Easy Wash</h1>
			<p class="lead mb-4">Dein erster und bester digitaler Waschsalon.</p>

			<div class="px-3 px-md-5 mb-4"
				style="font-size: 1.25rem; width: 70%; margin: auto;">
				<p>Unsere Dienstleistung ermöglicht es Ihnen, wertvolle Zeit zu
					sparen. Wir holen Ihre Artikel auf Wunsch direkt bei Ihnen ab und
					liefern sie nach der Reinigung bequem wieder zurück.</p>
				<p>
					<i class="fa fa-arrow-right text-primary me-2"></i> Alternativ
					können Sie Ihre Kleidung, Teppiche oder Möbelbezüge auch selbst
					bringen und abholen, ganz, wie es Ihnen passt.
				</p>
				<p>Gerade für Studierende ohne eigene Waschmaschine oder mit wenig
					Zeit im Alltag ist unser Service ideal: Sie müssen sich um nichts
					kümmern.</p>
				<p class="mt-4"
					style="font-size: 1.5rem; font-weight: bold; color: #1976d2;">Wir
					übernehmen die komplette Reinigung für Sie.</p>
			</div>

			<p class="fw-semibold">Wir bieten Ihnen:</p>
			<ul class="list-unstyled mb-5">
				<li><i class="fa fa-check text-success me-2"></i>
					Kleidung-Waschdienstleistung</li>
				<li><i class="fa fa-check text-success me-2"></i> Möbelreinigung</li>
				<li><i class="fa fa-check text-success me-2"></i> Teppichreinigung</li>
			</ul>

			<!-- Bilder -->
			<div class="row g-4 justify-content-center mb-5">
				<div class="col-md-4">
					<img src="images/kleidung.jpeg" class="img-fluid rounded shadow"
						alt="Kleidung"
						style="height: 250px; width: 100%; object-fit: cover;">
					<div class="text-center mt-2">Kleidung</div>
				</div>
				<div class="col-md-4">
					<img src="images/möbel.jpeg" class="img-fluid rounded shadow"
						alt="Möbel" style="height: 250px; width: 100%; object-fit: cover;">
					<div class="text-center mt-2">Möbel</div>
				</div>
				<div class="col-md-4">
					<img src="images/teppich.jpeg" class="img-fluid rounded shadow"
						alt="Teppich"
						style="height: 250px; width: 100%; object-fit: cover;">
					<div class="text-center mt-2">Teppich</div>
				</div>
			</div>
		</div>

		{include file="footer.tpl"}

		<script
			src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
