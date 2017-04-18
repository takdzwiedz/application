<?php

define('E_MAIL_ADMIN','admin@example.com');
define('SERVER','localhost');
define('USER','');
define('PASSWORD','');
define('DB','');
define('WITRYNA','http://localhost/aplikacja/');

function __autoload($className){ // funkcja zaczytuje klasy zaczytuje pliki 

    require 'class/'.$className.'.php';
    
}
