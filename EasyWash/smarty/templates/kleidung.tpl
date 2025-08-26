<!DOCTYPE html>
<html lang="de">
<head>
<meta charset="UTF-8">
<title>Kleidung Service</title>
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

	<div class="container" style="max-width: 600px; margin-top: 120px;">
		<div class="text-center mb-3">
			<img src="images/Logo.png" alt="Easy Wash Logo" width="100">
		</div>

		<h3 class="mb-4 text-center">Kleidung – Service buchen</h3>

		{if $ausgabe}
		<div class="alert alert-info">{$ausgabe}</div>
		{/if}

		<form method="post" action="{$PHP_SELF}" class="mb-4">
			<input type="hidden" name="csrfToken" value="{$csrfToken}">

			<!-- KG-Anzahl -->
			<div class="mb-3">
				<label class="form-label">Kg Anzahl ({$GRUNDPREIS_KLEIDUNG}) </label>
				<input type="number" class="form-control" name="kg" id="kg" min="1"
					max="20" value="{$form_kg|default:''}" required>
			</div>

			<!-- Farbkategorie -->
			<div class="mb-3">
				<label for="farbekategorie" class="form-label">Farbe:</label> <select
					name="farbekategorie" id="farbekategorie" required
					class="form-select">
					<option value="">-- Bitte wählen --</option> {foreach
					from=$farbehash key=farbe_id item=farbe}
					<option value="{$farbe_id}"
						{if $form_farbe==$farbe_id}selected{/if}>{$farbe.name}
						(+{$farbe.preis|string_format:"%.2f"} €)</option> {/foreach}
				</select>
			</div>

			<!-- Bügeln -->
			<div class="mb-3">
				<label class="form-label">Bügeln? ({$bugelnPreis})</label><br>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="bügeln"
						value="Ja" required {if $form_bugeln=='Ja'}checked{/if}> <label
						class="form-check-label">ja</label>
				</div>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="bügeln"
						value="Nein" {if $form_bugeln=='Nein'}checked{/if}> <label
						class="form-check-label">Nein</label>
				</div>
			</div>

			<!-- Liefern lassen -->
			<div class="mb-3">
				<label class="form-label">Liefern lassen? ({$LIEFERKOSTEN_KLEIDUNG})</label><br>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="liefern"
						id="lieferJa" value="Ja" required {if $form_liefern=='Ja'}checked{/if}>
					<label class="form-check-label" for="lieferJa">Ja</label>
				</div>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="liefern"
						id="lieferNein" value="Nein" {if $form_liefern=='Nein'}checked{/if}>
					<label class="form-check-label" for="lieferNein">Nein</label>
				</div>
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

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>