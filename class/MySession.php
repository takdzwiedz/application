<?php

class MySession {
    
    function __construct() {
        session_start();
    }
    
    function sessStart($login, $haslo){
        
        $polacz = new DbConnect();
        
        $zapytanie = "SELECT `id_user`, `login`, `aktywne`  FROM `users` WHERE `login` = '$login' AND `password` = '$haslo' AND `aktywne`= 1";
        $wynik = $polacz->db->query($zapytanie);
        $wynik2 = $wynik->fetch_object(); //fetch objectpomaga dobrać się do ...

        if ($wynik->num_rows==1){
            
            if (isset($_POST['zapamietaj'])&& $_POST['zapamietaj']=='tak'){
            
//            tworzenie ciastka
//            setcookie (nazwa, wartosc, data ważnosci)
  
            setcookie('login', $login, time()+(60*60*24*7));
            } else {
                setcookie('login', $login, time()-120);
            }
            
            // Do zmiennej globalnej, która jest tablicą mogę przypisać co chcę
            
            $_SESSION['identyfikator_sesji'] = session_id();
            $_SESSION['id_user'] = $wynik2->id_user;
            $_SESSION['login'] = $wynik2->login; //Bezpieczeniej jest pobrać login z bazy danych
            $_SESSION['klient'] = $_SERVER['HTTP_USER_AGENT'];
            $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
            
            header('Location:indexlog.php');
            exit();
            
        } else {
            
            header('Location:index.php?logowanie=no');
            
            exit();
        }
        
    }
    
    function sessVer () {
        
        if(!isset($_SESSION['id_user']) 
        || $_SESSION['identyfikator_sesji'] != session_id() 
        || $_SESSION['ip'] != $_SERVER['REMOTE_ADDR']
        || $_SESSION['klient'] != $_SERVER['HTTP_USER_AGENT'])
        {
        header('Location:index.php');
        exit();
        }
        
    }
    
    function sessEnd () {

        $_SESSION[] = array();
        session_regenerate_id(); //Tak bezpieczniej. Gdyby było na początku sesji, to przy każdym "cofnij" tworzyłoby nową sesję.
        session_destroy();
        header('Location:index.php');
        exit();
        }

    
}
