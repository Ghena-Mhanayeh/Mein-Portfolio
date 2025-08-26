<?php

require_once ("./klassen/Preise.inc.php");

class PreisBerechnen
{

    
    public static function berechneMoebelPreis($moebelTyp, $anzahl){
        
//         DEFINE('MATRATZE', 15);
//         DEFINE('SESSEL', 10);
//         DEFINE('GARDINE', 10);
//         DEFINE('ECKSOFA', 25);
//         DEFINE('ZWEI_SITZER_SOFA', 20);
//         DEFINE('DREI_SITZER_SOFA', 25);
        
        $preis = null;
        
        if($moebelTyp == 1){
            $preis = MATRATZE * $anzahl;
        } elseif ($moebelTyp == 2){
            $preis = SESSEL * $anzahl;
        }elseif ($moebelTyp == 3){
            $preis = GARDINEN * $anzahl;
        }elseif ($moebelTyp == 4){
            $preis = ECKSOFA * $anzahl;
        }elseif ($moebelTyp == 5){
            $preis = ZWEI_SITZER_SOFA * $anzahl;
        }elseif ($moebelTyp == 6){
            $preis = DREI_SITZER_SOFA * $anzahl;
        }
           
        return $preis;    
        
    }
    
   // public static function berechneKleidungPreis($preisbasis ,$kg ,$farbe,$bugeln,$lieferung){
      public static function berechneKleidungPreis($kg ,$farbe,$bugeln,$lieferung){
//         DEFINE('preisbasis', 2.5);

//         DEFINE('aufschlag_weiss', 2);
//         DEFINE('aufschlag_schwarz', 1);
//         DEFINE('aufschlag_mix', 1.5);
//         DEFINE('bugelnPreis', 1.5);
//         DEFINE('lieferkosten', 4.90);
      
        if($farbe == 1){
            $preisfarbe = aufschlag_weiss;
        } elseif ($farbe == 2){
            $preisfarbe = aufschlag_schwarz;
        }elseif ($farbe == 3){
            $preisfarbe = aufschlag_mix;
        }else {
            $preisfarbe = 0; // Fallback
        }
       
        $preis = (GRUNDPREIS_KLEIDUNG * $kg) + $preisfarbe;
        
        if($bugeln){
            
            $preis += ($kg*bugelnPreis);
        }
        
        if($lieferung){
            $preis += LIEFERKOSTEN_KLEIDUNG;
        }
        
        return $preis;
        
    }
    
    public static function berechneTeppichFlaeche($breite, $laenge)
    {
        $flaeche = $breite * $laenge;
        return $flaeche;
    }
    
    
    public static function berechneTeppichPreis($flaeche,$lieferung,$tiefreinigung)
    {
//         DEFINE('TEPPICH_PREIS_PRO_M2', 10.0); // Grundpreis je m²
//         DEFINE('lieferkosten', 6);
//         DEFINE('reinigungskosten', 3);
        
        $preis= $flaeche * TEPPICH_PREIS_PRO_M2;
        
        if($tiefreinigung){
            $preis += reinigungskosten;
        }
        
        if($lieferung){
            $preis += LIEFERKOSTEN_TEPPICHE;
        }
        
        return $preis;
    }
    
    


  
}
?>