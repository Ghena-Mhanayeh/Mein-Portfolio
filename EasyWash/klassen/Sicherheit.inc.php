<?php
class Sicherheit {
    
    static function isCorrectNumericalString($str) {
        return is_numeric($str);
    }
    
    static function istNotEmpty($str) {
        return $str != '';
    }
    
    static function isNumericalInBoundary($str, $min, $max) {
        return is_numeric($str) && floatval($str) >= $min && floatval($str) <= $max;
    }
    
    static function isNumericalMin($str, $min) {
        return is_numeric($str) && floatval($str) >= $min;
    }
    
    // E-Mail auf korrektes Format prüfen
    static function isValidEmail($str) {
        return filter_var($str, FILTER_VALIDATE_EMAIL) !== false;
    }
    
    // Passwortanforderungen prüfen: mindestens 8 Zeichen, 1 Groß-, 1 Kleinbuchstabe, 1 Zahl, 1 Sonderzeichen
    static function isValidPassword($str) {
        return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/', $str);
    }
    
    // Postleitzahl prüfen (genau 5 Ziffern)
    static function isValidPLZ($str) {
        return preg_match('/^\d{5}$/', $str);
    }
    
    // Hausnummer prüfen (z. B. 12, 12a, 5b etc.)
    static function isValidHausnummer($str) {
        return preg_match('/^[0-9]+[a-zA-Z]?$/', $str);
    }
    
    // Telefonnummer validieren: z. B. +491234567890 oder 0123456789
    static function isValidTelefonnummer($str) {
        return preg_match('/^(\+49|0)[1-9][0-9]{7,14}$/', $str);
    }
    
    // XSS-Schutz: HTML-Escaping für Ausgaben
    static function escapeHTML($str) {
        return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
    }
    
    // Strings säubern: trimmen, Tags entfernen, Whitespace normalisieren
    static function sanitizeString($str) {
        $str = trim($str);
        $str = strip_tags($str);
        $str = preg_replace('/\s+/', ' ', $str);
        return $str;
    }
    
    static function isCorrectEtwas($str) {
        return in_array($str, ['etwas1', 'etwas2', 'etwas3']);
    }
    
    public static function isValidName($input) {
        return preg_match('/^[A-Za-zÄÖÜäöüß -]+$/u', $input);
    }
    
    
    
    public static function isValidPhone($input) {
        return preg_match('/^\+?[0-9\- ]{6,20}$/', $input);
    }
    
    
    
}
?>