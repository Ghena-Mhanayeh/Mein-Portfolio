<!-- FIXIERTE Navbar -->
<nav
	class="navbar bg-light shadow-sm px-4 py-2 position-fixed top-0 start-0 w-100 z-3"
	style="height: 80px;">
	<div
		class="container-fluid d-flex justify-content-between align-items-center">
		<!-- ✅ Logo links -->
		<a href="startSeite.php" class="d-inline-block"> <img
			src="images/Logo.png" alt="Easy Wash Logo"
			style="height: 75px; width: auto;">
		</a>

		<!-- Benutzername, Warenkorb, Menü -->
		<div class="d-flex align-items-center">
			<!-- Benutzername -->
			<span class="fw-semibold me-3"> <i class="fa-solid fa-user me-1"></i>
				{$vorname} {$nachname}
			</span>

			<!-- 🛒 Warenkorb-Button mit Badge -->
			<button class="btn btn-outline-primary btn-sm me-2 position-relative"
				type="button" data-bs-toggle="offcanvas"
				data-bs-target="#offcanvasWarenkorb"
				aria-controls="offcanvasWarenkorb">
				<i class="fa-solid fa-cart-shopping"></i> {if
				isset($warenkorb_anzahl) && $warenkorb_anzahl > 0} <span
					class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">{$warenkorb_anzahl}</span>
				{/if}
			</button>

			<!-- Adminbutton -->
			{if $ist_admin} <a href="adminDashboard.php"
				class="btn btn-danger btn-sm me-2"> <i
				class="fa-solid fa-screwdriver-wrench me-1"></i> Adminbereich
			</a> <a href="bestellungenSuchen.php"
				class="btn btn-primary btn-sm me-2"> <i
				class="fa-solid fa-magnifying-glass me-1"></i> Bestellungen Suchen
			</a> {/if}

			<!-- Menü-Button -->
			<button id="menu-toggle" class="btn btn-outline-primary btn-sm">
				<i class="fa-solid fa-bars"></i> Menü
			</button>
			<!-- Menü Dropdown -->
			<div id="dashboard-menu"
				class="dropdown-menu shadow mt-2 end-0 rounded-3"
				style="display: none; position: fixed; top: 80px; right: 1rem;">
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
		{if isset($warenkorb) && $warenkorb|@count > 0}
		<ul class="list-group mb-3">
			{foreach $warenkorb as $index => $eintrag}
			<li class="list-group-item rounded-3 mb-2 shadow-sm">
				<div class="d-flex justify-content-between align-items-start">
					<div>
						<strong class="d-block mb-1">{$eintrag.service}</strong> {foreach
						$eintrag.details as $feld => $wert} <small
							class="d-block text-muted"> {if $feld == 'Wunschtermin'} {$feld}:
							{$wert|date_format:"%d.%m.%Y"} {else} {$feld}: {$wert} {/if} </small>

						{/foreach} <strong class="d-block mt-2">Preis:
							{$eintrag.preis|string_format:"%.2f"} €</strong>
					</div>
					<form method="post" action="warenkorbLöschen.php">
						<input type="hidden" name="aktion" value="entfernen"> <input
							type="hidden" name="index" value="{$index}">
						<button type="submit" class="btn btn-sm btn-outline-danger"
							title="Entfernen">
							<i class="fa-solid fa-xmark"></i>
						</button>
					</form>
				</div>
			</li> {/foreach}
		</ul>

		<form method="post" action="zahlung.php">
			{assign var="hat_wunschdatum_service" value=false} {foreach
			$warenkorb as $eintrag} {if $eintrag.service == "Kleidung" ||
			$eintrag.service == "Teppich"} {assign var="hat_wunschdatum_service"
			value=true} {break} {/if} {/foreach} {if $hat_wunschdatum_service}
			<div class="alert alert-secondary">
				<span class="d-block text-decoration-underline fw-semibold"
					role="button" data-bs-toggle="collapse" href="#wunschdatumCollapse"
					aria-expanded="false" aria-controls="wunschdatumCollapse"
					style="cursor: pointer;"> 📅 Lieferung/Abholung Termin hinzufügen <span
					class="text-danger">*</span>
					<div class="collapse mt-2" id="wunschdatumCollapse">
						<div class="card card-body bg-light border-0 shadow-sm rounded-2">
							<label for="wunschdatum_global" class="form-label small">Gewünschtes
								Datum:</label> <input type="date" class="form-control-sm"
								id="serviceWunschDatum" name="serviceWunschDatum"
								value="{$serviceWunschDatum|default:''}"
								min="{$smarty.now|date_format:'%Y-%m-%d'}">

						</div>
					</div>
			
			</div>
			{/if} <input type="hidden" name="csrfToken" value="{$csrfToken}">

			{assign var="lieferung_erforderlich" value=false} {foreach $warenkorb
			as $eintrag} {if (isset($eintrag.details.Lieferung) &&
			$eintrag.details.Lieferung == 'Ja') ||
			(isset($eintrag.details.Liefern) && $eintrag.details.Liefern == 'Ja')
			|| $eintrag.service == 'Möbel'} {assign var="lieferung_erforderlich"
			value=true} {/if} {/foreach} {if $lieferung_erforderlich}
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
							<label class="form-label small">Straße</label> <input type="text"
								class="form-control-sm " style="display:block;" name="liefer_strasse">
						</div>
						<div class="mb-2">
							<label class="form-label small">Adresszusatz</label> <input type="text"
								class="form-control-sm" style="display:block;" name="liefer_adresszusatz">
						</div>

						<div class="mb-2">
							<label class="form-label small">PLZ</label> <input type="text"
								class="form-control-sm" style="display:block;" name="liefer_plz">
						</div>


						<div class="mb-2">
							<label class="form-label small">Stadt</label> {literal} <input
								type="text" class="form-control-sm" style="display:block;" name="liefer_stadt"
								pattern="^[A-Za-zäöüßÄÖÜ\s-]{2,}$"
								title="Bitte einen gültigen Ortsnamen eingeben" required>
							{/literal}
						</div>

						<div class="mb-2">
							<label class="form-label small">Land</label> <input type="text"
								class="form-control-sm" style="max-width:300px; display:block;" name="liefer_land" value="Deutschland">
						</div>
					</div>
				</div>
			</div>
			{/if}

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
		{else}
		<div class="text-center text-muted">
			<p>🛒 Dein Warenkorb ist leer.</p>
		</div>
		{/if}
	</div>
</div>


<!-- JS für Dropdown-Menü -->
<script>
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
</script>

<!-- Bootstrap JS -->
<script
	src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

