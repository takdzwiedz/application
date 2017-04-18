<?php

require_once 'config/Config.php';

?>

<div id="modal">
<div id="wiadomosc" class="alert alert-danger" style="width: 30%; margin:200px auto; text-align: center"></div>
</div> 

<div id="divForm">  

    <form method="post" id="MyForm">

        <h2 class="form-signin-heading">Przypomnij hasło</h2><br>
        
        <br><span style="text-align: center;">
        <?php

        if(isset($_POST['mail'])) {

            $mail = htmlentities($_POST['mail']);
            $weryfikacja_maila = new Validate();
            $weryfikacja_maila->weryfikacjaMaila($mail, 'mail');

            if($weryfikacja_maila->liczError == 0){

                $polacz = new DbConnect();
                $zapytanie = "SELECT `mail` FROM `users` WHERE `mail`= '$mail'";
                $wynik = $polacz->db->query($zapytanie);

                if($wynik->num_rows == 1){

                    $sec = sha1(uniqid());
                    $zapytanie1 = "UPDATE `users` set `security`='$sec' where `mail`='$mail'";
                    $modyfikuj = $polacz->db->query($zapytanie1);

                    if($modyfikuj){
                        $mail_change_pass = new SendMail(E_MAIL_ADMIN);
                        $message = "<a href=\"".WITRYNA."odzyskanie_hasla.php?mail=$mail&sec=$sec\"> Kliknij na link, aby zmienić hasło </a>";
                        $mail_change_pass->send($mail, 'Odzyskiwanie hasła', $message);
                        echo 'Na twój e-mail wysłałem link do wygenerowania nowego hasła';
                        exit();
                    }

                } else {

                    echo '<span class="error">W mojej bazie nie ma takiego maila</span>';

                }

            }

        }

        unset($weryfikacja_maila);

        ?>
        </span><br>
        <input name="mail" id="mail" class="form-control" placeholder="Podaj mail"><br>
        <input type="submit" name="przypomnij" id="przypomnij" value="Przypomnij" class="btn btn-lg btn-primary btn-block">

    </form>
    <hr>
    <a href="index.php"> Przejdź do strony logowania</a>

    
</div>
