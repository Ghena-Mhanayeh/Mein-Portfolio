<!DOCTYPE html>
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

	{include file="navbar.tpl"}

	<div class="container my-5">
		<h2 class="mb-4">📦 Bestellpositionen zur Bestellung #{$bestellung_id}</h2>

		{if isset($meldung)}
		<div class="alert alert-info">{$meldung}</div>
		{else} {if isset($positionen) && $positionen|@count > 0}
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
					{foreach $positionen as $position}
					<tr>
						<td>{$position.service_name}</td>
						<td>{if isset($position.details_array)}
							<ul class="mb-0 ps-3">
								{foreach $position.details_array as $key => $value}
								<li><strong>{$key}:</strong> {$value}</li> {/foreach}
							</ul> {else} <em>Keine Details verfügbar</em> {/if}
						</td>
						<td>{$position.preis|string_format:"%.2f"} €</td>
					</tr>
					{/foreach}
				</tbody>
			</table>
		</div>
		{else}
		<div class="alert alert-info">Keine Positionen für diese Bestellung
			gefunden.</div>
		{/if} {/if} <a href="bestellungenSuchen.php"
			class="btn btn-secondary mt-3"> <i class="fa-solid fa-arrow-left"></i>
			Zurück zur Übersicht
		</a>
	</div>

	{include file="footer.tpl"}

	<script
		src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
