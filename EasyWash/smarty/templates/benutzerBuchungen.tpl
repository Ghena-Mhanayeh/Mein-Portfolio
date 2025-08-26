<!DOCTYPE html>
<html lang="de">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bestellungen Historie</title>
<link rel="icon" type="image/png" href="images/Logo.png">
<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<!-- Eigene Styles -->
<link rel="stylesheet" href="css/style.css">
</head>

<body class="d-flex flex-column min-vh-100">

	<!-- Navigation -->
    {include file="navbar.tpl"}

    <main class="main-content flex-grow-1">
        <div class="container text-center" style="padding-top: 100px;">
            <h2 class="mb-5">Deine Bestellungen</h2>
        </div>

        {if $bestellungen|@count > 0}
        <div class="container mb-5">
            <ul class="list-group">
                {foreach from=$bestellungen item=bestellung}
                <li class="list-group-item">
                    <strong>🧺 Bestellung #{$bestellung.bestellung_id|escape}</strong><br> <!-- Smarty Escaping hinzugefügt -->
                    <small class="text-muted">{$bestellung.datum_formatiert|escape}</small><br>   <!-- Smarty Escaping hinzugefügt -->
                    <a class="btn btn-sm btn-outline-primary mt-2"
                       href="pdfRechnung.php?bestellung_id={$bestellung.bestellung_id|escape:'url'}"> <!-- URL-Parameter mit |escape:'url' für sichere Übergabe an pdfRechnung.php. -->
                        📄 Rechnung ansehen
                    </a>
                    </a>
                </li>
                {/foreach}
            </ul>
        </div>
        {else}
        <p class="text-center mb-5">Du hast noch keine Bestellungen.</p>
        {/if}

        <div class="text-center mb-5 pb-5">
            <a href="startSeite.php" class="btn btn-primary">
                Zur Startseite
            </a>
        </div>
    </main>

    {include file="footer.tpl"}

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>