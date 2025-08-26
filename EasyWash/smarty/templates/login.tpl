<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login</title>
  <link rel="icon" type="image/png" href="images/Logo.png" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="/css/style.css" />
</head>

<body class="bg-light">
  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-12 col-md-6 col-lg-4">
        <div class="card shadow rounded-4">
          <div class="card-body p-4 p-md-5">

            <!-- Logo + Titel -->
            <div class="text-center mb-4">
              <a href="index.php">
                <img src="images/Logo.png" alt="Easy Wash Logo" class="img-fluid mb-3" style="max-width:150px;">
              </a>
              <h3 class="fw-normal m-0">Login bei Easy Wash</h3>
            </div>

            {* Fehlermeldung *}
            {if isset($fehler) && $fehler}
              <div class="alert alert-danger text-center">{$fehler}</div>
            {/if}

            <form action="{$PHP_SELF}" method="POST" novalidate>
              <input type="hidden" name="csrfToken" value="{$csrfToken}">

              <div class="mb-3">
                <label for="email" class="form-label">E‑Mail‑Adresse</label>
                <input
                  type="email"
                  class="form-control "
                  name="email"
                  id="email"
                  placeholder="E‑Mail"
                  value="{$email|default:''|escape}"
                  required>
              </div>

              <div class="mb-3 position-relative">
                <label for="passwort" class="form-label">Passwort</label>
                <input
                  type="password"
                  class="form-control pe-5"
                  name="passwort"
                  id="passwort"
                  placeholder="Passwort"
                  required>
                <i class="fa fa-eye position-absolute end-0 me-3"
                   style="cursor:pointer; top:60%;" onclick="togglePassword('passwort', this)"></i>
              </div>

              <button type="submit" name="login" class="btn btn-primary w-100 py-2">Anmelden</button>
            </form>

            <p class="mt-3 text-center mb-0">
              Noch kein Konto? <a href="registrieren.php">Jetzt registrieren</a>
            </p>

          </div>
        </div>
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
