<!DOCTYPE html>
<html lang="de">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Kontakt</title>
<link rel="icon" type="image/png" href="images/Logo.png">
<link
	href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
	rel="stylesheet">
<link rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="stylesheet" href="css/style.css">
</head>
<body class="d-flex flex-column min-vh-100">

	<!-- Logo -->
	<div class="container mt-3">
  <div class="d-flex justify-content-between align-items-center mb-3">
    {if isset($smarty.session.email)}
      <a href="startSeite.php">
        <img src="images/Logo.png" alt="Easy Wash Logo" style="height: 100px; width: auto;">
      </a>
    {else}
      <a href="index.php">
        <img src="images/Logo.png" alt="Easy Wash Logo" style="height: 100px; width: auto;">
      </a>
    {/if}
  </div>
</div>
	<!-- Inhalt -->
	<main class="flex-grow-1">
		<div class="container mt-5">
			<h2 class="text-center mb-4"
				style="color: #008ddc; font-weight: 900; text-transform: uppercase;">
				Kontakt</h2>
			<div class="mx-auto" style="max-width: 700px; font-size: 1.1rem;">

				<p>
					Du hast Fragen zu unseren Dienstleistungen oder möchtest uns
					Feedback geben?<br> Dann erreichst du uns über folgende Wege:
				</p>

				<p>
					<strong>Schreib uns gern:</strong>
				</p>

				<p>
					<i class="fa fa-envelope text-danger me-2"></i> support@easywash.de<br>
					<i class="fa fa-phone text-primary me-2"></i> 01234 / 56789
				</p>

				<p>Wir freuen uns auf deine Nachricht und antworten in der Regel
					innerhalb von 24 Stunden.</p>

			</div>
		</div>
	</main>

	{include file="footer.tpl"}

	<script
		src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
