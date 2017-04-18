<?php

class Account extends DbConnect {
    
    
    function addAccount($zapytanie, $zapytanie_weryfikacja, $zapytanie_mail){
        
        $spr = $this->db->query($zapytanie_weryfikacja);
        $spr2 = $this->db->query($zapytanie_mail);
        
        $this->istnieje = 0;
             
        if($spr->num_rows != 0) {
            $this ->istnieje++;
            echo 'Taki login istnieje<br>';
        }
        
        if($spr2->num_rows != 0) {
            $this ->istnieje++;
            echo 'Taki mail istnieje<br>';
        }
        
        if($this ->istnieje == 0) {
            $this->db->query($zapytanie);
        }

    }
    
    function confAccount($zapytanie, $mail){
        
        $wynik = $this->db->query($zapytanie);
        if($wynik->num_rows==1){
            $zapytanie_update = "UPDATE `users` SET `aktywne` = 1 WHERE `mail`='$mail'";
            $potwierdzenie = $this->db->query($zapytanie_update);
            if($potwierdzenie){
                echo "Dzięki za potwierdzenie założenia konta w moim serwisie. ";
                echo '<br><a href="index.php"> Przejdź do logowania</a>';
            }else{
                echo 'Błąd potwiedzenia. Skontaktuj się z nami';
            }
        } else {
            echo 'Konto zostało już potwierdzone lub niewłaściwe dane potwierdzenia.';
        }
    }
    
    function modAccount(){
        
        
        
    }
    
    function changePassAccount($zapytanie, $mail, $sec){
        
        $wynik = $this->db->query($zapytanie);
        
        if($wynik->num_rows == 1){
            
            $mail_change_pass = new SendMail(E_MAIL_ADMIN);
            $message = "<a href=\"".WITRYNA."odzyskanie_hasla.php?mail=$mail&sec=$sec\"> Kliknij link, aby zmienić hasło </a>";
            $mail_change_pass->mail($mail, 'Odzyskiwanie hasła', $message);
                    
        } else {
            
            echo 'W mojej bazie nie ma takiego maila';
            
        }
    }
    
    function delAccount(){
        

    }
}