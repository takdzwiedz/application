<?php
    
require_once 'config/Config.php';
require_once 'config/Switch.php';

?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link href="signin.css" rel="stylesheet">
        <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="style/style.css">
        <link rel="stylesheet" href="style/bootstrap.css">
        <link rel="stylesheet" href="style/bootstrap-theme.min.css">
        <link rel="stylesheet" href="style/bootstrap-theme.css">
        <link rel="stylesheet" href="style/bootstrap.min.css">
        <script src="scripts/jquery-3.2.0.min.js"></script>
        <script src="scripts/script.js"></script>  
        <script src="scripts/sprawdz.js"></script>    
        <script src="scripts/przypomnij_mail.js"></script>
        <script src="scripts/script_mail.js"></script>
        <title><?php $title; ?></title>
    </head>
    <body>
        
        <?php
        require_once "page/$page.php";
        ?>
        
    </body>
</html>
