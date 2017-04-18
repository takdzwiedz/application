<?php

require_once 'config/Config.php';

$login = $_POST['login'];
$haslo = $_POST['haslo'];

$val = new Validate();
$val->puste($login, 'Login');
$val->puste($haslo, 'Haslo'); 

?>