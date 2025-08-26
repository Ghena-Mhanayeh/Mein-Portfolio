<?php 
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['aktion'] === 'entfernen' && isset($_POST['index'])) {
        $index = (int) $_POST['index'];
        if (isset($_SESSION['warenkorb'][$index])) {
            unset($_SESSION['warenkorb'][$index]);
            $_SESSION['warenkorb'] = array_values($_SESSION['warenkorb']); // neu indexieren
        }
    } elseif ($_POST['aktion'] === 'leeren') {
        unset($_SESSION['warenkorb']);
    }
}

header("Location: startSeite.php"); // Zurück zur Hauptseite
exit();
// <?php
// session_start();

// require_once("./klassen/Sicherheit.inc.php"); // Eingabesicherung

// // ✅ Nur POST-Anfragen verarbeiten
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
//     // Aktion prüfen
//     $aktion = $_POST['aktion'] ?? '';
    
//     if ($aktion === 'entfernen') {
//         // ✅ Index prüfen und absichern
//         $index_raw = $_POST['index'] ?? '';
//         $index = Sicherheit::isCorrectNumericalString($index_raw) ? (int)$index_raw : -1;
        
//         if ($index >= 0 && isset($_SESSION['warenkorb'][$index])) {
//             unset($_SESSION['warenkorb'][$index]);
            
//             // ✅ Array neu indexieren, damit es keine Lücken gibt
//             $_SESSION['warenkorb'] = array_values($_SESSION['warenkorb']);
//         }
        
//     } elseif ($aktion === 'leeren') {
//         // ✅ Warenkorb vollständig leeren
//         unset($_SESSION['warenkorb']);
//     }
// }

// // ✅ Nach Abschluss zurück zur Startseite
// header("Location: startSeite.php");
// exit;