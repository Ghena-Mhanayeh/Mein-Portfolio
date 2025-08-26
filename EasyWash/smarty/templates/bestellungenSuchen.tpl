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

	{include file="navbar.tpl"}

	<main class="container mb-5">
		<h1 class="mb-4">📦 Bestellungen durchsuchen</h1>

		{if isset($meldung) && $meldung neq ''}
		<div class="alert alert-warning text-center">{$meldung}</div>
		{/if}
		<!-- 🔍 Filterformular -->
		<form method="post" class="row g-3 mb-4">
			<input type="hidden" name="csrfToken" value="{$csrfToken}">
			<div class="col-md-3">
				<label for="bestellung_id" class="form-label">Bestellung-ID</label>
				<input type="number" class="form-control" name="bestellung_id"
					id="bestellung_id" min="1" value="{$filter.bestellung_id|default:''}">
			</div>
			<div class="col-md-3">
				<label for="kunde_id" class="form-label">Kunden-ID</label> <input
					type="number" class="form-control" name="kunde_id" id="kunde_id"
					min="1" value="{$filter.kunde_id|default:''}">
			</div>
			<div class="col-md-3">
				<label for="status" class="form-label">Status</label> <select
					class="form-select" name="status" id="status">
					<option value="">-- Alle --</option>
					<option value="offen" {if $filter.status=='offen'}selected{/if}>Offen</option>
					<option value="abgeschlossen" {if $filter.status=='abgeschlossen'}selected{/if}>Abgeschlossen</option>
				</select>
			</div>
			<div class="col-md-3">
				<label for="bezahlt" class="form-label">Bezahlt</label> <select
					class="form-select" name="bezahlt" id="bezahlt">
					<option value="">-- Alle --</option>
					<option value="Ja" {if $filter.bezahlt=='Ja'}selected{/if}>Ja</option>
					<option value="Nein" {if $filter.bezahlt=='Nein'}selected{/if}>Nein</option>
				</select>
			</div>
			<div class="col-12 text-end">
				<button type="submit" class="btn btn-primary">
					<i class="fa-solid fa-search me-1"></i> Suchen
				</button>
			</div>
		</form>

		<!-- 📋 Tabelle mit Ergebnissen -->
		{if isset($ergebnisse) && $ergebnisse|@count > 0}
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
					{foreach $ergebnisse as $eintrag}
					<tr>
						<td>{$eintrag.bestellung_id}</td>
						<td>{$eintrag.kunde_id}</td>
						<td>{$eintrag.termin_id}</td>
						<td>{$eintrag.vorname}</td>
						<td>{$eintrag.nachname}</td>
						<td>{$eintrag.telefonnummer}</td>
						<td>{$eintrag.bestellt_am|date_format:"%d.%m.%Y %H:%M"}</td>
						<td>{if
							$eintrag.wunschdatum}{$eintrag.wunschdatum|date_format:"%d.%m.%Y"}{else}-{/if}</td>
						<td>{$eintrag.status}</td>
						<td>{$eintrag.bezahlt}</td>
						<td><a
							href="bestellungDetailsAdmin.php?id={$eintrag.bestellung_id}"
							class="btn btn-sm btn-outline-info"> 📄 Details </a></td>
					</tr>
					{/foreach}
				</tbody>
			</table>
		</div>
		{else}
		<div class="alert alert-info">Keine Bestellungen gefunden.</div>
		{/if}
	</main>

	{include file="footer.tpl"}

	<script
		src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
