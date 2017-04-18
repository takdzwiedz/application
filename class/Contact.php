<?php

class Contact extends DbConnect {

    
    function insertContact ($id_user,$nazwisko, $imie,$miejscowosc,$ulica,$nr_domu,$nr_mieszkania,$kod_pocztowy,$poczta, $mail, $data) {
        
        $zapytanie2 = "INSERT INTO `kontakty`(`id_user`,`nazwisko`, `imie`, `miejscowosc`, `ulica`, `nr_domu`, `nr_mieszkania`, `kod_pocztowy`, `poczta`, `mail`, `data`) VALUES ('$id_user','$nazwisko','$imie','$miejscowosc','$ulica','$nr_domu','$nr_mieszkania','$kod_pocztowy','$poczta', '$mail', '$data') ";
        $wynik2 = $this->db->query($zapytanie2);
        header('Location: indexlog.php');
        exit();
        
    }
    
    function modifyContact ($id_user,$nazwisko, $imie,$miejscowosc,$ulica,$nr_domu,$nr_mieszkania,$kod_pocztowy,$poczta, $mail, $data2, $id_modyf) {
        
        $zapytanie2 = "UPDATE `kontakty` SET `nazwisko`= '$nazwisko', `imie`='$imie', `miejscowosc`='$miejscowosc', `ulica`='$ulica', `nr_domu`='$nr_domu', `nr_mieszkania`='$nr_mieszkania', `kod_pocztowy`='$kod_pocztowy', `poczta`='$poczta', `mail`='$mail', `data`='$data2' WHERE `id_kontakt` = $id_modyf";
        $wynik2 = $this->db->query($zapytanie2);
        header('Location: indexlog.php');
        exit();
    }
    
    function delContact($id_user, $usun_id){
        
        $zapytanie_usun_kontakt = "DELETE FROM `kontakty` WHERE `id_kontakt` = '$usun_id' AND `id_user`='$id_user'";
        $wynik = $this->db->query($zapytanie_usun_kontakt);
        header('Location: indexlog.php');
        exit();
    }
    

}