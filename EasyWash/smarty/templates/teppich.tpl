<!DOCTYPE html>
<html lang="de">
<head>
<meta charset="UTF-8">
<title>Teppich Service</title>
<link rel="icon" type="image/png" href="images/Logo.png">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="stylesheet" href="/css/style.css">
</head>
<body>

  {include file="navbar.tpl"}

  <div class="container" style="max-width: 600px; margin-top: 120px;">
    <div class="text-center mb-3">
      <img src="images/Logo.png" alt="Easy Wash Logo" width="100">
    </div>

    <h3 class="mb-4 text-center">Teppich – Service buchen</h3>

    {if isset($fehler)}
      <div class="alert alert-danger text-center">
        {$fehler}
      </div>
    {/if}

    {if $ausgabe}
    <div class="alert alert-info text-center">{$ausgabe}</div>
    {/if}

    <form method="post" action="{$PHP_SELF}">
      <input type="hidden" name="csrfToken" value="{$csrfToken}">

      <!-- Breite -->
      <div class="mb-3">
        <label class="form-label">Breite in Meter ({$TEPPICH_PREIS_PRO_M2} pro m<sup>2</sup>)</label>
        <input type="number" step="0.1" class="form-control" name="breite" min="0.1" required value="{$form_breite|default:''}">
      </div>

      <!-- Länge -->
      <div class="mb-3">
        <label class="form-label">Länge in Meter</label>
        <input type="number" step="0.1" class="form-control" name="laenge" min="0.1" required value="{$form_laenge|default:''}">
      </div>

      <!-- Tiefreinigung -->
      <div class="mb-3">
        <label class="form-label">Tiefreinigung? ({$reinigungskosten})</label><br>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="tiefreinigung" value="Ja" required {if $form_tiefreinigung=='Ja'}checked{/if}>
          <label class="form-check-label">Ja</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="tiefreinigung" value="Nein" {if $form_tiefreinigung=='Nein'}checked{/if}>
          <label class="form-check-label">Nein</label>
        </div>
      </div>

      <!-- Liefern lassen -->
      <div class="mb-3">
        <label class="form-label">Liefern lassen? ({$LIEFERKOSTEN_TEPPICHE})</label><br>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="liefern" id="lieferJa" value="Ja" required {if $form_lieferung=='Ja'}checked{/if}>
          <label class="form-check-label" for="lieferJa">Ja</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="liefern" id="lieferNein" value="Nein" {if $form_lieferung=='Nein'}checked{/if}>
          <label class="form-check-label" for="lieferNein">Nein</label>
        </div>
      </div>

      <!-- Buttons -->
      <div class="d-grid gap-3 mt-4">
        <button type="submit" name="preis_berechnen" class="btn btn-primary">
          Preis berechnen <i class="fa-solid fa-calculator ms-2"></i>
        </button>
        <button type="submit" name="in_warenkorb_legen" class="btn btn-primary">
          In den Warenkorb legen <i class="fa-solid fa-cart-plus ms-2"></i>
        </button>
      </div>
    </form>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const lieferJa = document.getElementById('lieferJa');
      const lieferNein = document.getElementById('lieferNein');
      const adresseBlock = document.getElementById('lieferadresse');

      function toggleAdresse() {
        adresseBlock.style.display = lieferJa && lieferJa.checked ? 'block' : 'none';
      }

      if (lieferJa && lieferNein) {
        lieferJa.addEventListener('change', toggleAdresse);
        lieferNein.addEventListener('change', toggleAdresse);
        toggleAdresse();
      }
    });
  </script>

  {include file="footer.tpl"}
</body>
</html>
