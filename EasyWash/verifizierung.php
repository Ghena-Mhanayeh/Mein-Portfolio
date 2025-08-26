<?php
require_once("includes/startTemplate.inc.php");
require_once("klassen/DbFunctions.inc.php");
require_once("klassen/WaschsalonDaten.inc.php");

$link = DbFunctions::connectWithDatabase();

$email = $_GET['email'] ?? '';
$token = $_GET['token'] ?? '';

if ($email && $token) {
    $gefunden = WaschsalonDaten::holeEmailundToken($link, $email, $token);
    
    if ($gefunden) {
        // Benutzer existiert mit passendem Token → aktivieren
        WaschsalonDaten::aktualisiereKunde($link, $email);
        
        echo "<div style='text-align:center; font-family:sans-serif; padding-top:50px;'>
                <h2>Konto erfolgreich aktiviert ✅</h2>
                <p><a href='login.php'>Jetzt einloggen</a></p>
              </div>";
    } else {
        // Kein Treffer → Token ungültig oder abgelaufen
        echo "<div style='text-align:center; font-family:sans-serif; padding-top:50px;'>
                <h2>Ungültiger oder abgelaufener Link ❌</h2>
                <p>Bitte registriere dich erneut.</p>
              </div>";
    }
} else {
    // E-Mail oder Token sind formal ungültig
    echo "<div style='text-align:center; font-family:sans-serif; padding-top:50px;'>
            <h2>Fehlende Parameter ❌</h2>
            <p>Ungültiger Zugriff.</p>
          </div>";
}
?>

