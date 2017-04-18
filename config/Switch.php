<?php

$page = 'start';
$title = 'Logowanie do aplikacji';
    
if(isset($_GET['page'])){
    $page = $_GET['page'];
    

    switch ($page){

        case('zaloz_konto'):

             $page = 'zaloz_konto';
             $title = 'Załóż konto';
             break;

        case('nie_pamietam'):

             $page = 'nie_pamietam';
             $title = 'Przypomnienie hasła';
             break;

         case('powitalna');
             
             $page = 'powitalna';
             $title = 'Strona powitalna';
             break;
         
         default:

            $page = 'start';   
    }
}