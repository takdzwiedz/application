<?php

require_once 'config/Config.php';

?>

<!DOCTYPE html>

    <head>
        <meta charset="UTF-8">
        <title>Potwierdzenie rejestracji</title>
        <link rel="stylesheet" href="style/style.css">
        <link rel="stylesheet" href="style/bootstrap.min.css">
        
    </head>
    <body>
        <div id="modal">
        <div id="wiadomosc" class="alert alert-danger" style="width: 30%; margin:150px auto;"></div>
        </div>    

            <div id="divForm">

        
            <?php

            $mail = htmlentities($_GET['mail']);
            $sec = htmlentities($_GET['sec']);
            $zapytanie="SELECT `id_user` FROM `users` WHERE `mail`='$mail' AND `security`='$sec'AND `aktywne`=0";
            $account = new Account();
            $account->confAccount($zapytanie, $mail);

            ?>
        
            </div>
    </body>
</html>
