<!DOCTYPE html>
<html lang="de">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Preisliste</title>
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
			{if isset($smarty.session.email)} <a href="startSeite.php"> {else} <a
				href="index.php"> {/if} <img src="images/Logo.png"
					alt="Easy Wash Logo" style="height: 100px; width: auto;">
			</a>
		
		</div>
	</div>

	<!-- Inhalt -->
	<main class="flex-grow-1">
		<div class="container mt-5">
			<h2 class="text-center mb-4"
				style="color: #008ddc; font-weight: 900; text-transform: uppercase;">
				Preisliste</h2>
			<div class="mx-auto" style="max-width: 800px; font-size: 1.1rem;">

				<h4 class="mt-4">Teppichreinigung</h4>
				<ul>
					<li>{$TEPPICH_PREIS_PRO_M2} pro m<sup>2</sup></li>
					<li>+ Lieferung: {$LIEFERKOSTEN_TEPPICHE} (optional)</li>
					<li>+ Tiefreinigung: {$reinigungskosten} (optional)</li>
				</ul>

				<h4 class="mt-4">Kleidungsreinigung</h4>
				<ul>
					<li>Grundpreis: {$GRUNDPREIS_KLEIDUNG} pro kg</li>
					<li>+ Aufschlag weiß: {$aufschlag_weiss}</li>
					<li>+ Aufschlag schwarz: {$aufschlag_schwarz}</li>
					<li>+ Aufschlag mix: {$aufschlag_mix}</li>
					<li>+ Bügeln: {$bugelnPreis} pro kg</li>
					<li>+ Lieferung:{$LIEFERKOSTEN_KLEIDUNG} (optional)</li>
				</ul>

				<h4 class="mt-4">Möbelreinigung</h4>
				<ul>
					<li>Matratze: {$MATRATZE}</li>
					<li>Sessel: {$SESSEL}</li>
					<li>Gardine: {$GARDINEN}</li>
					<li>Ecksofa: {$ECKSOFA}</li>
					<li>Zwei-Sitzer Sofa: {$ZWEI_SITZER_SOFA}</li>
					<li>Drei-Sitzer Sofa: {$DREI_SITZER_SOFA}</li>
				</ul>

			</div>
		</div>
	</main>

	{include file="footer.tpl"}

	<script
		src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
