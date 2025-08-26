<?php

require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__); // Root = Ordner mit .env
$dotenv->safeLoad(); // lädt .env, ohne Exception wenn sie fehlt

if (!getenv('DB_HOST') && getenv('DATABASE_URL')) {
    $p = parse_url(getenv('DATABASE_URL'));
    if ($p) {
        putenv('DB_HOST=' . ($p['host'] ?? '127.0.0.1'));
        putenv('DB_PORT=' . ($p['port'] ?? '3306'));
        putenv('DB_NAME=' . ltrim($p['path'] ?? '/easywash', '/'));
        putenv('DB_USER=' . ($p['user'] ?? 'root'));
        putenv('DB_PASSWORD=' . ($p['pass'] ?? ''));
    }
}


function envv($key, $default = null) {
    $val = getenv($key);
    return ($val === false || $val === null || $val === '') ? $default : $val;
}

// Konstanten aus ENV (mit Fallbacks)
define('APP_ENV',     envv('APP_ENV', 'production'));
define('APP_DEBUG',   filter_var(envv('APP_DEBUG', 'false'), FILTER_VALIDATE_BOOLEAN));
define('BASE_URL',    envv('BASE_URL', ''));

define('DB_HOST',     envv('DB_HOST', '127.0.0.1'));
define('DB_PORT', (int)envv('DB_PORT', 3306));
define('DB_NAME',     envv('DB_NAME', 'easywash'));
define('DB_USER',     envv('DB_USER', 'root'));
define('DB_PASS',     envv('DB_PASSWORD', ''));

// PHP-Fehleranzeige je nach Debug
error_reporting(APP_DEBUG ? E_ALL : 0);
ini_set('display_errors', APP_DEBUG ? '1' : '0');
    
class DbFunctions {
    
   
    public static function connectWithDatabase() {
        $link = mysqli_init();
        
        // TLS erzwingen (wie --ssl-mode=REQUIRED)
        if (defined('MYSQLI_OPT_SSL_MODE') && defined('MYSQLI_CLIENT_SSL_REQUIRED')) {
            mysqli_options($link, MYSQLI_OPT_SSL_MODE, MYSQLI_CLIENT_SSL_REQUIRED);
        }
        
        mysqli_options($link, MYSQLI_OPT_CONNECT_TIMEOUT, 5);
        
        if (!mysqli_real_connect($link, DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT)) {
            throw new RuntimeException('DB-Verbindung fehlgeschlagen: ' . mysqli_connect_error());
        }
        mysqli_set_charset($link, 'utf8mb4');
        return $link;
    }
    
    
    
    public static function getAssociativeResultArray($link, $query) {
        $result = DbFunctions::executeQuery($link, $query);
        if ($result == null || mysqli_num_rows($result) == 0) {
            return null;
        }
        $rows = mysqli_num_rows($result);
        for($i = 0; $i < $rows; $i++) {
            $resultArray [$i] = mysqli_fetch_assoc($result);
        }
        mysqli_free_result($result);
        return ($resultArray);
    }
    
    public static function getHashFromFirstRow($link, $query) {
        $resultArray = DbFunctions::getAssociativeResultArray($link, $query);
        if (is_null($resultArray)) {
            return null;
        }
        return ($resultArray [0]);
    }
    
    public static function getHash($link, $query)
    {
        $result=self::executeQuery($link, $query);
        $countRows=mysqli_num_rows($result);
        if ($countRows==0)
        {
            return null;
        }
        $fieldList=array();
        for ($i=0; $i<$countRows; $i++)
        {
            $row=mysqli_fetch_row($result);
            $fieldList[$row[0]]=$row[1];
        }
        mysqli_free_result($result);
        return $fieldList;
    }
    //„Die Funktion getAllAsAssoc wird verwendet, um SQL-Abfragen effizient auszuführen und alle Ergebnisse als Array von assoziativen Arrays zurückzugeben, 
    //sodass wir ganze Tabellen leicht weiterverarbeiten können. Sie hilft uns dabei, 
    //Bestellungen, Positionen oder beliebige Listen aus der Datenbank übersichtlich auszulesen.“
    public static function getAllAsAssoc($link, $query)
    {
        $result = mysqli_query($link, $query);
        if (!$result) {
            return [];
        }
        
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        
        return $data;
    }
    
    public static function executeQuery($link, $query) {
        $result = mysqli_query($link, $query);
        if ($result === false) {
            return null;
        }
        return $result;
    }
    
    
    public static function getErrorNumber($link)
    {
        return (mysqli_errno($link));
    }
    
    public static function getErrorText($link)
    {
        return (mysqli_error($link));
    }
    /*
     * Wenn magic_qotes_gpc konfiguriert ist, werden Anführungszeichen mit Backslashes geschützt Allerdings ist die mysqli_real_escape_string noch sicherer, daher werden die Backslashes in diesem Fall wieder entfernt, damit immer die o.g. Funktion aufgerufen werden kann.
     */
    public static function escape($link, $str) {
        if (ini_get('magic_quotes_gpc')) {
            $str = stripslashes($str);
        }
        return mysqli_real_escape_string($link, $str);
    }
    
    public static function getFirstFieldOfResult($link, $query)
    {
        $result=self::executeQuery($link, $query);
        if (mysqli_num_rows($result)==0)
        {
            return null;
        }
        $row=mysqli_fetch_row($result);
        mysqli_free_result($result);
        return ($row[0]);
    }
}
?>