<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Benutzerkonto</title>
  <link rel="icon" type="image/png" href="images/Logo.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="/css/style.css">
</head>
<body style="display: flex; flex-direction: column; min-height: 100vh; padding-top: 100px;">

  {include file="navbar.tpl"}

  <div class="main-content">
    <div class="container mt-3">
      <h3 class="text-center mb-4">Benutzerkonto Verwalten</h3>

      {* Fehleranzeige *}
      {if isset($fehler)}
        <div class="alert alert-danger text-center">
          {$fehler}
        </div>
      {/if}

      <form method="post" action="benutzerkonto.php">
        <input type="hidden" name="kunde_id" value="{$kunde_id}">

        <div class="mb-3">
          <label class="form-label">Kundennummer</label>
          <input type="text" class="form-control" value="{$kunde_id}" disabled>
        </div>

        <div class="row mb-3">
          <div class="col-md-6">
            <label class="form-label">Name</label>
            <input type="text" name="nachname" class="form-control" value="{$nachname}">
          </div>
          <div class="col-md-6">
            <label class="form-label">Vorname</label>
            <input type="text" name="vorname" class="form-control" value="{$vorname}">
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-6">
            <label class="form-label">E-Mail</label>
            <input type="email" name="email" class="form-control" value="{$email}">
          </div>
          <div class="col-md-6">
            <label class="form-label">Telefonnummer</label>
            <input type="text" name="telefonnummer" class="form-control" value="{$telefonnummer}">
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-6 position-relative">
            <label class="form-label">Passwort</label>
            <input type="password" name="neues_passwort" id="neues_passwort" class="form-control"
              pattern="{$passwortPattern nofilter}"
              title="Mindestens 8 Zeichen, 1 Großbuchstabe, 1 Kleinbuchstabe, 1 Zahl und 1 Sonderzeichen.">
            <i class="fa fa-eye position-absolute" style="top: 42px; right: 20px; cursor: pointer;"
               onclick="togglePassword('neues_passwort', this)"></i>
          </div>
          <div class="col-md-6 position-relative">
            <label class="form-label">Passwort wiederholen</label>
            <input type="password" name="neues_passwort_wiederholen" id="neues_passwort_wiederholen" class="form-control">
            <i class="fa fa-eye position-absolute" style="top: 42px; right: 20px; cursor: pointer;"
               onclick="togglePassword('neues_passwort_wiederholen', this)"></i>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-6">
            <label class="form-label">Straße</label>
            <input type="text" name="strasse" class="form-control" value="{$strasse}">
          </div>
          <div class="col-md-6">
            <label class="form-label">Hausnummer</label>
            <input type="text" name="hausnummer" class="form-control" value="{$hausnummer}">
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-6">
            <label class="form-label">Stadt</label>
            <input type="text" name="stadt" class="form-control" value="{$stadt}">
          </div>
          <div class="col-md-6">
            <label class="form-label">PLZ</label>
            <input type="text" name="plz" class="form-control" value="{$plz}">
          </div>
        </div>

        <div class="row mb-4">
          <div class="col-md-6">
            <label class="form-label">Land</label>
            <input type="text" name="land" class="form-control" value="{$land}">
          </div>
          <div class="col-md-6">
            <label class="form-label">Adresszusatz (optional)</label>
            <input type="text" name="adresszusatz" class="form-control" value="{$adresszusatz}">
          </div>
        </div>

        <div class="text-center">
          <button type="submit" name="speichern" class="btn btn-primary">Speichern</button>
        </div>
      </form>
    </div>
  </div>

  {include file="footer.tpl"}

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function togglePassword(fieldId, icon) {
      const field = document.getElementById(fieldId);
      if (field.type === "password") {
        field.type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
      } else {
        field.type = "password";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
      }
    }
  </script>

</body>
</html>
