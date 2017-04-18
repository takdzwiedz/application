<?php

require_once 'config/Config.php';

?>

<div id="modal">
<div id="wiadomosc" class="alert alert-danger" style="width: 30%; margin:150px auto;"></div>
</div>    

    <div id="divForm">
    
        <?php

        if(isset($_POST['zapisz'])){

            $login = htmlentities($_POST['login']);
            $haslo = htmlentities($_POST['haslo']);
            $haslo2 = htmlentities($_POST['haslo2']);
            $mail = htmlentities($_POST['mail']);
            $haslosha1 = sha1($_POST['haslo']);
            $sec = sha1(uniqid());
            $data = date("Y-m-d H:i:s");

            $weryfikacja_zk = new Validate();
            $weryfikacja_zk->minIloscZnakow($login, 'login', 4);
            $weryfikacja_zk->weryfikacjaHasla($haslo, 'haslo');
            $weryfikacja_zk->takieSame($haslo, 'haslo', $haslo2, 'haslo2');
            $weryfikacja_zk->weryfikacjaMaila($mail, 'mail');

            if(!isset($_POST['regulamin'])){
                $weryfikacja_zk->isChecked('regulamin');
            }

            if($weryfikacja_zk->liczError == 0){

                $zapytanie = "INSERT INTO `users`(`id_user`, `login`, `password`, `mail`, `is_admin`, `aktywne`, `security`, `data_dodania`) VALUES (NULL, '$login', '$haslosha1', '$mail',0,0,'$sec','$data')";
                $zapytanie_weryfikacja = "SELECT `id_user` FROM `users` WHERE `login`='$login'";
                $zapytanie_mail = "SELECT `id_user` FROM `users` WHERE `mail`='$mail'";
                $account = new Account();
                $account->addAccount($zapytanie, $zapytanie_weryfikacja, $zapytanie_mail);
                if($account->istnieje==0){
                    $e_mail = new SendMail(E_MAIL_ADMIN);
                    $message = "<a href=\"".WITRYNA."potwierdzenie.php?mail=$mail&sec=$sec\"> Kliknij link, aby aktywować </a>";
                    $e_mail->send($mail, 'Aktywacja konta', $message);
                    echo 'Na Twoją skrzynkę przesłaliśmy link do aktywacji konta';
                }
            }

            unset($weryfikacja_zk);

        }

        ?>

        <form method="post" id="MyForm">

            <h2 class="form-signin-heading">Załóż konto</h2><br>

            <input class="form-control" name="login" id="login" value="<?php if(isset($_POST['login'])){echo $_POST['login'];} ?>" placeholder="Podaj login"><span id="loginSpan"></span><br>
            <input class="form-control" type="password" name="haslo" value="<?php if(isset($_POST['haslo'])){echo $_POST['haslo'];} ?>" placeholder="Podaj hasło"><br>
            <input class="form-control" type="password" name="haslo2" value="<?php if(isset($_POST['haslo2'])){echo $_POST['haslo2'];} ?>" placeholder="Powtórz hasło"><br>
            <input class="form-control" name="mail" id="mail" value="<?php if(isset($_POST['mail'])){echo $_POST['mail'];} ?>" placeholder="Podaj adres e-mail"><span id="mailSpan"></span><br>
            <input type="checkbox" name="regulamin" value="zgoda"> Zaakceptuj regulamin<br><br>
            <input class="btn btn-lg btn-primary btn-block" type="submit" name="zapisz" value="Zapisz">

        </form>

        <hr>    
        <a href="index.php" class="text-center"> Przejdź do strony logowania</a>

            
    </div>
</div>

    


