<?php

require_once 'config/Config.php';

?>

<!DOCTYPE html>

    <head>
        
        <meta charset="UTF-8">
        <title>Potwierdzenie rejestracji</title>
        <link rel="stylesheet" href="style/style.css">
        <link rel="stylesheet" href="style/bootstrap.min.css">
        <title>Odzyskiwanie hasła</title>
        
    </head>
    <body>

        
    <div class="container">

        <div class="row">

            <div class="col-md-offset-5 col-md-3">

                <div class="form-signin">

                <h2 class="form-signin-heading">Przypomnij hasło</h2>    



                <form method="post">
				
				                <?php

                if(isset($_GET['mail'])){

                    $mail = htmlentities($_GET['mail']);
                    $sec = htmlentities($_GET['sec']);

                    $polacz = new DbConnect();
                    $zapytanie1 = "SELECT `security` FROM `users` WHERE `mail` = '$mail'";
                    $wynik2 = $polacz->db->query($zapytanie1);
                    $pobrane = $wynik2->fetch_object();

                    if($sec != $pobrane->security){

                        echo 'Coś kobinujesz ...';
                        exit();
                    }
                    echo "Podaj nowe hasło dla adresu $mail";

                    if(isset($_POST['wyslij'])){

                        $haslo = htmlentities($_POST['haslo']);
                        $haslo2 = htmlentities($_POST['haslo2']);
                        $haslosha1 = sha1(htmlentities($_POST['haslo']));

                        $walidacja = new Validate();
                        $walidacja->weryfikacjaHasla($haslo, 'haslo');
                        $walidacja->takieSame($haslo, 'haslo', $haslo2, 'haslo2');
                        $walidacja->weryfikacjaMaila($mail, 'mail');

                        if($walidacja->liczError == 0){

                            $zapytanie2 = "UPDATE `users` SET `password`='$haslosha1' `security`='' WHERE `mail` = '$mail'";                   
                            $polacz = new DbConnect();
                            $wynik = $polacz->db->query($zapytanie2);

                            $kiedy = date("Y-m-d H:i:s");
                            $mailChangeCong = new SendMail(E_MAIL_ADMIN);
                            $message = "Twoje hasło zostało zmienione.<br>Data zmiany hasła: $kiedy<br>Wszystkiego dobrego!<br>";
                            $mailChangeCong->send($mail, 'Potwierdzenie zmiany hasła', $message);

                            header('Location:index.php');
                            exit();

                        }
                        unset($walidacja);
                    }

                }    


                ?>

                    <input type="password" name="haslo" class="form-control" placeholder="Podaj nowe hasło"><br>
                    <input type="password" name="haslo2" class="form-control" placeholder="Powtórz nowe hasło"><br>
                    <input type="submit" name="wyslij" value="Wyslij" class="btn btn-lg btn-primary btn-block">

                </form>
                        <hr>
                <div class="wrapper">
                    <a href="index.php"> Przejdź do strony logowania</a>
                </div>

                </div>
            </div>
        </div>
    </div>
            

    </body>
</html>