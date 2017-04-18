<?php

require_once 'config/Config.php';

if(isset($_GET['login'])){
    
    $login = htmlentities($_GET['login']);

    $zapytanie = "SELECT `id_user` FROM `users` WHERE `login`='$login'";

} else {

    $mail = htmlentities($_GET['mail']);
  
    $zapytanie = "SELECT `id_user` FROM `users` WHERE `mail`='$mail'";

}

$baza = new DbConnect();

$wynik = $baza->db->query($zapytanie);

if($wynik->num_rows ==1 ){
    echo 'TAK';
} else {
    echo 'NIE';
}
