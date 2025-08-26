<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <title>Zahlungsmethode</title>
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

  <div class="container" style="max-width: 700px; margin-top: 120px;">
   
    <h3 class="mb-4 text-center">💳 Wähle deine Zahlungsmethode</h3>

    <form method="post" action="bestellen.php">
  <input type="hidden" name="csrfToken" value="{$csrfToken}">
  
            <!-- Lieferadresse versteckt übergeben -->
  <input type="hidden" name="liefer_strasse" value="{$lieferadresse.strasse|default:''}">
  <input type="hidden" name="liefer_adresszusatz" value="{$lieferadresse.adresszusatz|default:''}">
  <input type="hidden" name="liefer_plz" value="{$lieferadresse.plz|default:''}">
  <input type="hidden" name="liefer_stadt" value="{$lieferadresse.stadt|default:''}">
  <input type="hidden" name="liefer_land" value="{$lieferadresse.land|default:''}">

  <!-- Zahlungsarten -->
  <div class="form-check bg-light border rounded p-3 mb-3">
    <input class="form-check-input" type="radio" name="zahlungsmethode" id="paypal" value="PayPal" required>
    <label class="form-check-label fs-5" for="paypal">
      <i class="fa-brands fa-paypal me-2"></i>PayPal
    </label>
  </div>

      <div class="form-check bg-light border rounded p-3 mb-3">
        <input class="form-check-input" type="radio" name="zahlungsmethode" id="klarna" value="Klarna">
        <label class="form-check-label fs-5" for="klarna">
          <i class="fa-brands fa-kickstarter-k me-2"></i>Klarna
        </label>
      </div>

      <div class="form-check bg-light border rounded p-3 mb-3">
        <input class="form-check-input" type="radio" name="zahlungsmethode" id="ueberweisung" value="Überweisung">
        <label class="form-check-label fs-5" for="ueberweisung">
          <i class="fa-solid fa-building-columns me-2"></i>Überweisung
        </label>
      </div>

      <div class="form-check bg-light border rounded p-3 mb-4">
        <input class="form-check-input" type="radio" name="zahlungsmethode" id="kreditkarte" value="Kreditkarte">
        <label class="form-check-label fs-5" for="kreditkarte">
          <i class="fa-regular fa-credit-card me-2"></i>Kreditkarte
        </label>
      </div>

      <div class="d-grid">
        <button type="submit" class="btn btn-primary btn-lg">
          Bestellung abschließen <i class="fa-solid fa-paper-plane ms-2"></i>
        </button>
      </div>
    </form>
  </div>

  {include file="footer.tpl"}

</body>
</html>
