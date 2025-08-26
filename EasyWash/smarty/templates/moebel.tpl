<!DOCTYPE html>
<html lang="de">
<head>
<meta charset="UTF-8">
<title>Möbel Service</title>
<link rel="icon" type="image/png" href="images/Logo.png">
<link
	href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
	rel="stylesheet">
<link rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="stylesheet" href="/css/style.css">
</head>
<body>

	{include file="navbar.tpl"}

	<!-- Hauptinhalt mit leichtem Abstand zur Navbar -->
	<div class="container pt-4" style="max-width: 600px;">

		<!-- Logo zentriert ohne zusätzlichen margin-top -->
		<div class="text-center mb-3"
			style="max-width: 600px; padding-top: 100px;">
			<img src="images/Logo.png" alt="Easy Wash Logo" width="100">
		</div>

		<h3 class="mb-4 text-center">Möbel – Service buchen</h3>

		{if $ausgabe}
		<div class="alert alert-info">{$ausgabe}</div>
		{/if} {if $fehler}
		<div class="alert alert-danger text-center">{$fehler}</div>
		{/if}

		<form method="post" class="mb-4">
			<input type="hidden" name="csrfToken" value="{$csrfToken}">

			<div class="mb-3">
				<label for="moebeltyp" class="form-label">Möbeltyp:</label> <select
					name="moebeltyp" id="moebeltyp" required class="form-select">
					<option value="">-- Bitte wählen --</option> {foreach
					from=$moebelHash key=moebel_id item=moebel}
					<option value="{$moebel_id}"
						{if $form_moebeltyp==$moebel_id}selected{/if}>{$moebel.name}
						({$moebel.preis})</option> {/foreach}
				</select>
			</div>

			<div class="mb-3">
				<label for="anzahl" class="form-label">Anzahl:</label> <input
					type="number" name="anzahl" id="anzahl" class="form-control"
					min="1" value="{$form_anzahl|default:''}" required>
			</div>
			<p class="mb-4">🛎️ Bitte Wählen Sie den Tag und die Uhrzeit, wann
				wir Ihre Möbel reinigen sollen:</p>
			<div class="mb-3">
				<label for="termin_datum" class="form-label">📅 Wunschtag</label> <input
					<input type="date" class="form-control" id="termin_datum" name="termin_datum" value="{$termin_datum|default:''}" 
						min="{$smarty.now|date_format:'%Y-%m-%d'}" required>
			</div>

			<div class="mb-3">
				<label for="termin_uhrzeit" class="form-label">🕒 Wunschzeit </label> <select
					id="termin_uhrzeit" name="termin_uhrzeit" class="form-select"
					required>
					<option value="">Bitte wählen</option>
					<option value="09:00" {if $form_termin_uhrzeit == '09:00'}selected{/if} >09:00</option>
					<option value="16:00" {if $form_termin_uhrzeit == '16:00'}selected{/if}>16:00</option>
				</select>
			</div>


			<!-- Preis berechnen -->
			<div class="d-grid mt-2">
				<button type="submit" name="preis_berechnen" class="btn btn-primary">
					Preis berechnen <i class="fa-solid fa-calculator ms-2"></i>
				</button>
			</div>

			<!-- In den Warenkorb legen -->
			<div class="d-grid mt-4">
				<button type="submit" name="in_warenkorb_legen"
					class="btn btn-primary">
					In den Warenkorb legen <i class="fa-solid fa-cart-plus ms-2"></i>
				</button>
			</div>
		</form>

	</div>
	{include file="footer.tpl"}
</body>
</html>