<?php

class WaschsalonDaten
{

    public static function gibKundeEin($link, $nachname, $vorname, $email, $passwort, $token, $telefonnummer)
    {
        $passwortNeu = password_hash($passwort, PASSWORD_DEFAULT);

        $query = "INSERT INTO Kunde (nachname, vorname, email, passwort, token, telefonnummer)
              VALUES ('$nachname', '$vorname', '$email', '$passwortNeu', '$token', '$telefonnummer')";

        DbFunctions::executeQuery($link, $query);
    }

    public static function gibAdresseEin($link, $kunde_id, $strasse, $plz, $stadt, $land, $adresszusatz)
    {
        $query = "INSERT INTO Adresse (kunde_id, strasse, plz, stadt,land, adresszusatz)
              VALUES ('$kunde_id', '$strasse', '$plz', '$stadt', '$land', '$adresszusatz')";
        DbFunctions::executeQuery($link, $query);
    }

    public static function holePasswortVonEmail($link, $email)
    {
        $query = "select passwort from Kunde where email='$email'";
        return DbFunctions::getFirstFieldOfResult($link, $query);
    }

    // Verifizierung
    public static function holeEmailUndToken($link, $email, $token)
    {
        $query = "select * from Kunde where email='$email' AND token ='$token'";
        return DbFunctions::getFirstFieldOfResult($link, $query);
    }

    // Kunde aktivieren indem aktiv auf 1 gesetzt wird, und dabei der einmalige Token auf Null setzen, damit es nicht erneut benutzt werden kann
    
    public static function aktualisiereKunde($link, $email)
    {
        $query = "UPDATE Kunde SET aktiv = 1, token = NULL WHERE email = '$email'";
        DbFunctions::executeQuery($link, $query);
    }

    public static function holeEmails($link)
    {
        $query = "select kunde_id, email from Kunde";
        return DbFunctions::getHash($link, $query);
    }

    public static function holeNutzerDatenByEmail($link, $email)
    {
        $email = DbFunctions::escape($link, $email);
        $query = "SELECT kunde_id, passwort, vorname, nachname, ist_admin, ist_gesperrt, telefonnummer
              FROM Kunde WHERE email = '$email'";
        return DbFunctions::getHashFromFirstRow($link, $query);
    }

    public static function holeMoebel($link)
    {
        $query = "select moebel_id, moebel_name from Moebel";
        return DbFunctions::getHash($link, $query);
    }

    public static function holeFarbe($link)
    {
        $query = "Select farbe_id, farbe_name
                from Farbe";
        return DbFunctions::getHash($link, $query);
    }

    public static function aktualisiereKundendaten($link, $kunde_id, $vorname, $nachname, $email, $telefonnummer)
    {
        $kunde_id = DbFunctions::escape($link, $kunde_id);
        $vorname = DbFunctions::escape($link, $vorname);
        $nachname = DbFunctions::escape($link, $nachname);
        $email = DbFunctions::escape($link, $email);
        $telefonnummer = DbFunctions::escape($link, $telefonnummer);

        $query = "UPDATE Kunde
              SET vorname = '$vorname',
                  nachname = '$nachname',
                  email = '$email',
                  telefonnummer = '$telefonnummer'
              WHERE kunde_id = '$kunde_id'";

        return DbFunctions::executeQuery($link, $query);
    }

    public static function aktualisierePasswort($link, $kunde_id, $neues_gehashtes_passwort)
    {
        $kunde_id = DbFunctions::escape($link, $kunde_id);
        $neues_gehashtes_passwort = DbFunctions::escape($link, $neues_gehashtes_passwort);

        $query = "UPDATE Kunde
              SET passwort = '$neues_gehashtes_passwort'
              WHERE kunde_id = '$kunde_id'";

        DbFunctions::executeQuery($link, $query);
    }

    public static function aktualisiereAdresse($link, $kunde_id, $strasse_mit_hausnummer, $plz, $stadt, $land, $adresszusatz)
    {
        $kunde_id = DbFunctions::escape($link, $kunde_id);
        $strasse_mit_hausnummer = DbFunctions::escape($link, $strasse_mit_hausnummer);
        $plz = DbFunctions::escape($link, $plz);
        $stadt = DbFunctions::escape($link, $stadt);
        $land = DbFunctions::escape($link, $land);
        $adresszusatz = DbFunctions::escape($link, $adresszusatz);

        $query = "
        UPDATE Adresse
        SET strasse = '$strasse_mit_hausnummer',
            plz = '$plz',
            stadt = '$stadt',
            land = '$land',
            adresszusatz = '$adresszusatz'
        WHERE kunde_id = '$kunde_id'
    ";

        DbFunctions::executeQuery($link, $query);
    }

    public static function fuegeBestellungEin($link, $kunde_id, $bestellt_am, $status, $serviceWunschDatum = null)
    {
        $kunde_id = DbFunctions::escape($link, $kunde_id);
        $bestellt_am = DbFunctions::escape($link, $bestellt_am);
        $status = DbFunctions::escape($link, $status);
        $serviceWunschDatum = $serviceWunschDatum ? "'" . DbFunctions::escape($link, $serviceWunschDatum) . "'" : "NULL";

        $query = "INSERT INTO Bestellungen (kunde_id, bestellt_am, status, wunschdatum)
              VALUES ('$kunde_id', '$bestellt_am', '$status', $serviceWunschDatum)";
        DbFunctions::executeQuery($link, $query);
        return mysqli_insert_id($link);
    }

    public static function fuegeBestellpositionEin($link, $bestellung_id, $service_id, $details, $preis)
    {
        $details = DbFunctions::escape($link, $details);

        $query = "INSERT INTO Bestellpositionen (bestellung_id, service_id, details, preis)
              VALUES ('$bestellung_id', '$service_id', '$details', '$preis')";

        DbFunctions::executeQuery($link, $query);
    }

    public static function holeServiceIdNachName($link, $service_name)
    {
        $service_name = DbFunctions::escape($link, $service_name);
        $query = "SELECT service_id FROM Services WHERE name = '$service_name' LIMIT 1";
        $result = mysqli_query($link, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            return $row['service_id'];
        }

        return false; // nicht gefunden
    }

    // kunden Daten für den PDF Rechnung
    public static function holeKundenDetails($link, $kunde_id)
    {
        $kunde_id = DbFunctions::escape($link, $kunde_id);
        $query = "
        SELECT k.vorname, k.nachname,k.telefonnummer ,a.strasse, a.plz, a.stadt, a.land, a.adresszusatz 
        FROM Kunde k
        LEFT JOIN Adresse a ON k.kunde_id = a.kunde_id
        WHERE k.kunde_id = '$kunde_id'
        LIMIT 1
    ";
        return DbFunctions::getHashFromFirstRow($link, $query);
    }

    // Holt alle Positionen einer Bestellung für PDF
    public static function holePositionenZuBestellung($link, $bestellung_id)
    {
        $bestellung_id = DbFunctions::escape($link, $bestellung_id);
        $query = "
        SELECT s.name AS service_name, p.details, p.preis
        FROM Bestellpositionen p
        JOIN Services s ON s.service_id = p.service_id
        WHERE p.bestellung_id = '$bestellung_id'
    ";
        return DbFunctions::getAllAsAssoc($link, $query);
    }

    // Holt eine Bestellung anhand der ID
    public static function holeBestelldatum($link, $bestellung_id)
    {
        $bestellung_id = DbFunctions::escape($link, $bestellung_id);
        $query = "SELECT bestellt_am FROM Bestellungen WHERE bestellung_id = '$bestellung_id' LIMIT 1";
        return DbFunctions::getFirstFieldOfResult($link, $query);
    }

    // Holt eine Bestellung anhand der ID
    public static function holeBestellungNachId($link, $bestellung_id)
    {
        $bestellung_id = DbFunctions::escape($link, $bestellung_id);
        $query = "SELECT * FROM Bestellungen WHERE bestellung_id = '$bestellung_id'";
        return DbFunctions::getHashFromFirstRow($link, $query);
    }

    // um alle Besetllungs ansehen in der Menu unter Buchungen ansehen
    public static function holeAlleBestellungenVonKunde($link, $kunde_id)
    {
        $kunde_id = DbFunctions::escape($link, $kunde_id);
        $query = "
        SELECT bestellung_id, bestellt_am
        FROM Bestellungen
        WHERE kunde_id = '$kunde_id'
        ORDER BY bestellt_am DESC
    ";
        return DbFunctions::getAllAsAssoc($link, $query); // wichtig!
    }

    public static function sperreKunde($link, $kunde_id)
    {
        $kunde_id = DbFunctions::escape($link, $kunde_id);

        $query = "UPDATE Kunde
              SET ist_gesperrt = 1
              WHERE kunde_id = '$kunde_id'";

        DbFunctions::executeQuery($link, $query);
    }
    
    //prüfen, ob Kunde existiert für die sperrung und entperrung (Admin)
    
    public static function kundeExistiert($link, $kunde_id) {
        $kunde_id = DbFunctions::escape($link, $kunde_id);
        $query = "SELECT COUNT(*) FROM Kunde WHERE kunde_id = '$kunde_id'";
        return DbFunctions::getFirstFieldOfResult($link, $query);
    }
    
    public static function entsperreKunde($link, $kunde_id)
    {
        $kunde_id = DbFunctions::escape($link, $kunde_id);

        $query = "UPDATE Kunde
              SET ist_gesperrt = 0
              WHERE kunde_id = '$kunde_id'";

        DbFunctions::executeQuery($link, $query);
    }

    public static function setzeBestellungAbgeschlossen($link, $bestellung_id)
    {
        $bestellung_id = DbFunctions::escape($link, $bestellung_id);

        $query = "UPDATE Bestellungen
              SET status = 'abgeschlossen'
              WHERE bestellung_id = '$bestellung_id'";

        DbFunctions::executeQuery($link, $query);
    }

    //prüfen, ob die Bestellung schon gibt (Admin)
    
    public static function bestellungExistiert($link, $bestellung_id) {
        $bestellung_id = DbFunctions::escape($link, $bestellung_id);
        $query = "SELECT COUNT(*) FROM Bestellungen WHERE bestellung_id = '$bestellung_id'";
        return DbFunctions::getFirstFieldOfResult($link, $query);
    }
    
    public static function setzeBestellungBezahlt($link, $bestellung_id)
    {
        $bestellung_id = DbFunctions::escape($link, $bestellung_id);

        $query = "UPDATE Bestellungen
              SET bezahlt = 'Ja'
              WHERE bestellung_id = '$bestellung_id'";

        DbFunctions::executeQuery($link, $query);
    }

    //Prüfen, ob der Termin schon gibt (Admin)
    public static function terminExistiert($link, $termin_id) {
        $termin_id = DbFunctions::escape($link, $termin_id);
        $query = "SELECT COUNT(*) FROM Termin WHERE termin_id = '$termin_id'";
        return DbFunctions::getFirstFieldOfResult($link, $query);
    }
    
    public static function sageTerminAb($link, $termin_id)
    {
        $termin_id = DbFunctions::escape($link, $termin_id);

        $query = "UPDATE Termin
              SET status = 'frei'
              WHERE termin_id = '$termin_id'";

        DbFunctions::executeQuery($link, $query);
    }

    // Fügt einen Termin ein
    public static function fuegeTerminEin($link, $kunde_id, $bestellung_id, $datum, $uhrzeit)
    {
        $stmt = mysqli_prepare($link, "
        INSERT INTO Termin (kunde_id, bestellung_id, datum, uhrzeit)
        VALUES (?, ?, ?, ?)
    ");
        if (! $stmt) {
            die("Fehler bei der Vorbereitung der Termin-Einfügung: " . mysqli_error($link));
        }

        mysqli_stmt_bind_param($stmt, "iiss", $kunde_id, $bestellung_id, $datum, $uhrzeit);

        if (! mysqli_stmt_execute($stmt)) {
            die("Fehler beim Einfügen des Termins: " . mysqli_stmt_error($stmt));
        }

        mysqli_stmt_close($stmt);
    }

    // Prüft, ob ein Termin zu Datum und Uhrzeit verfügbar ist
    public static function istTerminVerfuegbar($link, $datum, $uhrzeit)
    {
        $stmt = mysqli_prepare($link, "
        SELECT COUNT(*) FROM Termin
        WHERE datum = ? AND uhrzeit = ?
    ");
        if (! $stmt) {
            die("Fehler bei der Vorbereitung der Termin-Prüfung: " . mysqli_error($link));
        }

        mysqli_stmt_bind_param($stmt, "ss", $datum, $uhrzeit);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $anzahl);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        return $anzahl == 0; // true = verfügbar, false = belegt
    }
    
    //hier wird mit Hilfe der filer-Array die passende Query erstellt, um die richtige Daten aufzurufen
    
    public static function sucheBestellungen($link, $filter = [])
    {
        $bedingungen = [];

        if (! empty($filter['bestellung_id'])) {
            $id = mysqli_real_escape_string($link, $filter['bestellung_id']);
            $bedingungen[] = "b.bestellung_id = '$id'";
        }

        if (! empty($filter['kunde_id'])) {
            $id = mysqli_real_escape_string($link, $filter['kunde_id']);
            $bedingungen[] = "b.kunde_id = '$id'";
        }

        if (! empty($filter['status'])) {
            $status = mysqli_real_escape_string($link, $filter['status']);
            $bedingungen[] = "b.status = '$status'";
        }

        if (! empty($filter['bezahlt'])) {
            $bezahlt = mysqli_real_escape_string($link, $filter['bezahlt']);
            $bedingungen[] = "b.bezahlt = '$bezahlt'";
        }

        $where = count($bedingungen) > 0 ? "WHERE " . implode(" AND ", $bedingungen) : "";

        $query = "
            SELECT b.bestellung_id, b.kunde_id, b.bestellt_am, b.wunschdatum, b.status, b.bezahlt,
                   k.vorname, k.nachname, k.telefonnummer,
                   t.termin_id
            FROM Bestellungen b
            JOIN Kunde k ON b.kunde_id = k.kunde_id
            LEFT JOIN Termin t ON b.bestellung_id = t.bestellung_id
            $where
            ORDER BY b.bestellt_am DESC
";

        return DbFunctions::getAllAsAssoc($link, $query);
    }
}
?>