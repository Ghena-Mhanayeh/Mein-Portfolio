<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <title>Bestellungsbestätigung</title>
<link rel="icon" type="image/png" href="images/Logo.png">
<link
	href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
	rel="stylesheet">
<link rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="stylesheet" href="css/style.css">
</head>
<body>
 {include file="navbar.tpl"} 

<div class="container" style="margin-top: 120px; max-width: 700px;">



    <div class="card shadow-sm p-4 rounded-4 text-center">
        <h2 class="mb-3">🎉 Bestellung erfolgreich!</h2>
        <p class="fs-5 mb-2">Vielen Dank für deine Bestellung, <strong>{$vorname|escape}</strong>!</p>
        <p class="fs-6 mb-4">Deine Bestellnummer: <strong>#{$bestellung_id|escape}</strong></p>

        

        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <a href="pdfRechnung.php?bestellung_id={$bestellung_id|escape:'url'}" class="btn btn-outline-primary">
                📄 Rechnung als PDF anzeigen
            </a>
            <a href="startSeite.php" class="btn btn-primary">
                Zur Startseite
            </a>
        </div>
        <!-- ✅ QR-Code anzeigen -->
     <div class="my-4">
            <p class="mb-2">📱 Scanne diesen QR-Code, um deine Bestellung anzuzeigen:</p>
            <img src="qrCodeErstellenBild.php?bestellung_id={$bestellung_id|escape:'url'}" 
                 alt="QR-Code" 
                 class="img-fluid rounded-3 border shadow-sm"
                 style="max-width: 200px;">
        </div>
    </div>

</div>

{include file="footer.tpl"}

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>