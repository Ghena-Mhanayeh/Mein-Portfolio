<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <title>Verifizierung</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100 bg-light">

  <!-- Hauptinhalt mit flexiblem Platz -->
  <main class="flex-grow-1 d-flex align-items-center justify-content-center">
    <div class="card shadow p-4" style="max-width: 500px;">
      <h4 class="mb-3">Konto verifizieren</h4>
      <p>Bitte klicke auf den folgenden Link, um dein Konto zu aktivieren:</p>
      <a href="{$verifizierungsLink}" class="btn btn-success mb-3">Konto aktivieren</a>
      <p class="text-muted" style="font-size: 0.9em;">
        Hinweis: Du musst diesen Schritt nur einmal machen. Danach kannst du dich einloggen.
      </p>
    </div>
  </main>

  <!-- Footer bleibt unten -->
  {include file="footer.tpl"}

</body>
</html>
