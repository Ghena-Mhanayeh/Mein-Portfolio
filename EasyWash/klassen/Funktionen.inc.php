<?php 
class Funktionen{
    
    public static function bereitsRegestriert($email, $emailHash)
    {
        foreach ($emailHash as $e) {
            // $e ist hier ein Array wie ['email' => '...']
            if (strtolower($e) === strtolower($email)) { // Fallunterscheidung sicher
                return true;
            }
        }
        return false;
    }
    
    public static function formWerteZeigen($smarty) {
        
        global $form_vorname, $form_nachname, $form_email, $form_telefonnummer,
        $form_strasse, $form_adresszusatz, $form_plz, $form_stadt, $form_land;
        
        $smarty->assign("form_vorname", $form_vorname);
        $smarty->assign("form_nachname", $form_nachname);
        $smarty->assign("form_email", $form_email);
        $smarty->assign("form_telefonnummer", $form_telefonnummer);
        $smarty->assign("form_strasse", $form_strasse);
        $smarty->assign("form_adresszusatz", $form_adresszusatz);
        $smarty->assign("form_plz", $form_plz);
        $smarty->assign("form_stadt", $form_stadt);
        $smarty->assign("form_land", $form_land);
        
        
    }
    
    
}

?>