<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Registrieren</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
</head>

<body class="bg-light">
  <div class="container my-5">
    <div class="card shadow rounded-4 mx-auto" style="max-width: 700px;">
      <div class="card-body p-4 p-md-5">
        <!-- Logo + Titel -->
        <div class="text-center mb-4">
          <a href="index.php">
            <img src="images/Logo.png" alt="Easy Wash Logo" class="img-fluid mb-3" style="max-width:150px;">
          </a>
          <h3 class="fw-normal m-0">Jetzt registrieren</h3>
        </div>

        {if isset($fehler)}
          <div class="alert alert-danger">{$fehler}</div>
        {/if}

        <form action="registrieren.php" method="POST">
          <input type="hidden" name="csrfToken" value="{$csrfToken}">

          <div class="row g-4">
            <!-- Persönliche Daten -->
            <div class="col-12 col-lg-6" style="padding: 30px;">
              <h5 class="mb-3">Persönliche Daten</h5>

              <div class="mb-3">
                <label class="form-label">Vorname</label>
                <input type="text" class="form-control" name="vorname"
                       value="{$form_vorname|default:''}" required
                       pattern="{$namePattern nofilter}"
                       title="Nur Buchstaben, Leerzeichen und Bindestriche sind erlaubt">
              </div>

              <div class="mb-3">
                <label class="form-label">Nachname</label>
                <input type="text" class="form-control" name="nachname"
                       value="{$form_nachname|default:''}" required
                       pattern="{$namePattern nofilter}"
                       title="Nur Buchstaben, Leerzeichen und Bindestriche sind erlaubt">
              </div>

              <div class="mb-3">
                <label class="form-label">E‑Mail</label>
                <input type="email" class="form-control" name="email"
                       value="{$form_email|default:''}" required
                       pattern="{$emailPattern nofilter}"
                       title="Bitte gib eine gültige E‑Mail‑Adresse ein.">
              </div>

              <div class="mb-3">
                <label class="form-label">Telefonnummer</label>
                <input type="text" class="form-control" name="telefonnummer" maxlength="20"
                       value="{$form_telefonnummer|default:''}" required
                       pattern="{$phonePattern nofilter}"
                       title="keine gültige Telefonnummer">
              </div>

              <div class="mb-3 position-relative">
                <label class="form-label">Passwort</label>
                <input type="password" class="form-control" id="passwort" name="passwort" required
                       pattern="{$passwortPattern nofilter}"
                       title="Mindestens 8 Zeichen, 1 Groß-, 1 Kleinbuchstabe, 1 Zahl, 1 Sonderzeichen.">
                <i class="fa fa-eye position-absolute" style="top: 42px; right: 20px; cursor: pointer;" onclick="togglePassword('passwort', this)"></i>
              </div>

              <div class="mb-3 position-relative">
                <label class="form-label">Passwort wiederholen</label>
                <input type="password" class="form-control" id="passwortWiederholt" name="passwortWiederholt" required>
                <i class="fa fa-eye position-absolute" style="top: 42px; right: 20px; cursor: pointer;" onclick="togglePassword('passwortWiederholt', this)"></i>
              </div>
            </div>

            <!-- Rechnungsadresse -->
            <div class="col-12 col-lg-6" style="padding: 30px;">
              <h5 class="mb-3">Rechnungsadresse</h5>

              <div class="mb-3">
                <label class="form-label">Straße und Hausnummer</label>
                <input type="text" class="form-control" name="strasse"
                       value="{$form_strasse|default:''}" required>
              </div>

              <div class="mb-3">
                <label class="form-label">Adresszusatz (optional)</label>
                <input type="text" class="form-control" name="adresszusatz"
                       value="{$form_adresszusatz|default:''}">
              </div>

              <div class="mb-3">
                <label class="form-label">PLZ</label>
                <input type="text" class="form-control" name="plz" minlength="5" maxlength="5"
                       value="{$form_plz|default:''}" required
                       pattern="{$plzPattern nofilter}"
                       title="Die Postleitzahl muss 5 Ziffern haben.">
              </div>

              <div class="mb-3">
                <label class="form-label">Stadt</label>
                <input type="text" class="form-control" name="stadt"
                       value="{$form_stadt|default:''}" required>
              </div>

              <div class="mb-3">
                <label class="form-label">Land</label>
                <input type="text" class="form-control" name="land"
                       value="{$form_land|default:'Deutschland'}" required>
              </div>
            </div>
          </div>

          <!-- Submit -->
          <div class="text-center mt-4">
            <button type="submit" name="registrieren" class="btn btn-primary px-5 py-2 w-100 w-lg-auto">
              Registrieren
            </button>
          </div>
        </form>

        <p class="mt-3 text-center mb-0">
          Bereits registriert? <a href="login.php">Zum Login</a>
        </p>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function togglePassword(fieldId, icon) {
      const field = document.getElementById(fieldId);
      if (field.type === "password") {
        field.type = "text";
        icon.classList.replace("fa-eye", "fa-eye-slash");
      } else {
        field.type = "password";
        icon.classList.replace("fa-eye-slash", "fa-eye");
      }
    }
  </script>
  {include file="footer.tpl"}
</body>
</html>


