<?php
/*
 * autor: @takdzwiedz
 * 
 * Klasa pobierająca mejle z formu
 */

class Mailing extends DbConnect {

    function showMail ($temat,$tresc, $kopia, $ukrytaKopia){

    $laduj = "SELECT `mail` FROM `uzytkownicy`";
    $pal = $this->db->query($laduj);
    while ($mail = $pal->fetch_object()){

            $nowy = new sendMail(E_MAIL_ADMIN, $kopia, $ukrytaKopia);
            $nowy->send($mail->mail, $temat, $tresc);
            sleep(2);    
        }      
    }
}
