<?php 

require_once 'config/Config.php';

$sess = new MySession();
$sess->sessVer();

ob_start();

if(isset($_GET['logout'])){

    $sess2 = new MySession();
    $sess2->sessEnd();

}
?>
<!DOCTYPE html>

    <head>
        
        <meta charset="UTF-8">
        <title>Aplikacja Artura</title>
        <link rel="stylesheet" href="style/bootstrap.min.css">
        <link rel="stylesheet" href="style/style.css">
        <script src="scripts/jquery-3.2.0.min.js"></script>
        <script src="scripts/indexlog.js"></script>
        
    </head>
    <body>
        
        <?php
            
        $polacz = new DbConnect();
        $id_user = $_SESSION['id_user'];
        
        if(isset($_GET['action']) && $_GET['action'] == 'del' && !empty($_GET['id'])){
                
            $usun_id = (int)$_GET['id'];
            $delete_contact = new Contact ();
            $delete_contact->delContact($id_user, $usun_id);

        }
        
        if (isset($_POST['zapisz'])){

            $nazwisko = htmlentities($_POST['nazwisko']);
            $imie = htmlentities($_POST['imie']);
            $miejscowosc = htmlentities($_POST['miejscowosc']);
            $ulica = htmlentities($_POST['ulica']);
            $nr_domu = htmlentities($_POST['nr_domu']);
            $nr_mieszkania = htmlentities($_POST['nr_mieszkania']);
            $kod_pocztowy = htmlentities($_POST['kod_pocztowy']);
            $poczta = htmlentities($_POST['poczta']);
            $mail = htmlentities($_POST['mail']);
            $data = date('Y-m-d');

            $walidacja = new Validate;
            $walidacja->weryfikacjaMaila($mail, 'mail');

            $id_modyf = $_POST['idKontakt'];

            if($walidacja->liczError == 0){
                
                if(!isset($_POST['idKontakt'])){
                    
                $insertContact = new Contact();
                $insertContact->insertContact($id_user,$nazwisko, $imie,$miejscowosc,$ulica,$nr_domu,$nr_mieszkania,$kod_pocztowy,$poczta, $mail, $data);

                } else {

                    $data2 = date('Y-m-d');
                    $modifyContact = new Contact();
                    $modifyContact->modifyContact ($id_user,$nazwisko, $imie,$miejscowosc,$ulica,$nr_domu,$nr_mieszkania,$kod_pocztowy,$poczta, $mail, $data2, $id_modyf);
                }

            }
            unset($walidacja);
        }   
        
        $style = '';  
        $valueNazwisko='';
        $valueImie = '';
        $valueMiejscowosc = '';
        $valueUlica = '';
        $valueNrDomou = '';
        $valueNrMieszkania = '';
        $valueKodPocztowy = '';
        $valuePoczta = '';
        $valueMail = '';
        $inputHidden = '';
        
        if (isset($_GET['action']) && $_GET['action'] == 'mod' && !empty(trim($_GET['id']))){
            
            $id_mod = (int)$_GET['id'];
            $inputHidden = '<input type="hidden" name="idKontakt" value="'.$id_mod.'">';
            
            echo '<script>';
            ?>
        
        $(function(){
        
              $('#modal').css('display', 'block').hide().fadeIn(1000);
              $('#dod').css('display', 'block').hide().fadeIn(2000);

        });
             
        <?php    
       echo '</script>';

            $zapytanie_mod = "SELECT * FROM `kontakty` WHERE `id_kontakt`= '$id_mod'";
            $wynik_mod = $polacz->db->query($zapytanie_mod);
            $row_mod = $wynik_mod->fetch_object();
            
            $valueNazwisko = $row_mod->nazwisko;
            $valueImie = $row_mod->imie;
            $valueMiejscowosc = $row_mod->miejscowosc;
            $valueUlica = $row_mod->ulica;
            $valueNrDomou = $row_mod->nr_domu;
            $valueNrMieszkania = $row_mod->nr_mieszkania;
            $valueKodPocztowy = $row_mod->kod_pocztowy;
            $valuePoczta = $row_mod->poczta;
            $valueMail = $row_mod->mail;
  
        }
        
        ?>
        
        <div id="modal">
            
            <form method="post">
                
                <div id="dod" style="<?php echo $style ?>">
                    
                    <div class="form-group">
                        
                        <label for="nazwisko">Nazwisko</label>
                        <input name="nazwisko" id="nazwisko" class="form-control" value="<?php echo $valueNazwisko ?>">
                        
                        <label for="imie">Imię</label>
                        <input name="imie" id="imie" class="form-control" value="<?php echo $valueImie ?>">
                        
                        <label for="miejscowosc">Miejscowość</label>
                        <input name="miejscowosc" id="miejscowosc" class="form-control" value="<?php echo $valueMiejscowosc ?>">
                        
                        <label for="ulica">Ulica</label>
                        <input name="ulica" id="ulica" class="form-control" value="<?php echo $valueUlica ?>">
                        
                        <label for="nr_domu">Nr domu</label>
                        <input name="nr_domu" id="nr_domu" class="form-control" value="<?php echo $valueNrDomou ?>">
                        
                        <label for="nr_mieszkania">Nr mieszkania</label>
                        <input name="nr_mieszkania" id="nr_mieszkania" class="form-control" value="<?php echo $valueNrMieszkania ?>">
                        
                        <label for="kod_pocztowy">Kod pocztowy</label>
                        <input name="kod_pocztowy" id="kod_pocztowy" class="form-control" value="<?php echo $valueKodPocztowy ?>">
                        
                        <label for="poczta">Poczta</label>
                        <input name="poczta" id="poczta" class="form-control" value="<?php echo $valuePoczta ?>">
                        
                        <label for="mail">Mail</label>
                        <input name="mail" id="mail" class="form-control" value="<?php echo $valueMail ?>">
 
                    </div>
                    <?php echo $inputHidden ?>
                    <input type="submit" name="zapisz" id="zapisz" class="btn btn-primary" value="Zapisz">
                    <input type="submit" name="anuluj" id="anuluj" class="btn btn-danger" value="Anuluj">
                    
                </div>
                
            </form>
            
        </div>
        
        <form>
            <span><?php $wynik_0 = '' ?></span>
            <a href="#" id="dodaj" class="btn btn-primary">Dodaj</a>
            <a href="indexlog.php?logout=yes" class="btn btn-danger" style="float:right; margin-right: 20px" onclick="return confirm('Czy chcesz się wylogować?')"> Wyloguj </a>
            <a href="indexlog.php" id="czysc" class="btn btn-info" style="float: right; margin-right: 20px">Czyść zapytanie</a>
            <input type="submit" name="szukaj" value="Szukaj" class="btn btn-default" style="margin-right: 20px; float: right;">
            <input name="pattern" id="pattern" class="form-control" style="width:200px; float: right; margin-right: 20px">
        </form>
            
        <table class="table table-striped">
            
            <thead>
                          
            <tr>
                <th>L.p.</th>
                <th>Nazwisko</th>
                <th>Imię</th>
                <th>Miejscowość</th>
                <th>Ulica</th>
                <th>Nr domu</th>
                <th>Nr mieszkania</th>
                <th>Kod pocztowy</th>
                <th>Poczta</th>
                <th>Mail</th>
                <th>Akcja</th>
            </tr>
            </thead>
            
            <?php

            $zapytanie =  "SELECT `id_kontakt`, `id_user`, `nazwisko`, `imie`, `miejscowosc`, `ulica`, `nr_domu`, `nr_mieszkania`, `kod_pocztowy`, `poczta`, `mail`, `data` FROM `kontakty` WHERE `id_user`=$id_user";

            if (isset($_GET['pattern']) && !empty(trim($_GET['pattern']))){
                
                $pattern = htmlentities($_GET['pattern']);
                $zapytanie .= " AND (`nazwisko` LIKE \"%$pattern%\" || `imie` LIKE \"%$pattern%\")";
                
            } 
            
            $wynik = $polacz->db->query($zapytanie);
            $lp=0;
            while ($wiersz = $wynik->fetch_object()){
                $lp++;
                echo "
                    <tr>
                    
                        <td>$lp</td>
                        <td>$wiersz->nazwisko</td>
                        <td>$wiersz->imie</td>
                        <td>$wiersz->miejscowosc</td>
                        <td>$wiersz->ulica</td>    
                        <td>$wiersz->nr_domu</td>    
                        <td>$wiersz->nr_mieszkania</td>
                        <td>$wiersz->kod_pocztowy</td>   
                        <td>$wiersz->poczta</td>
                        <td>$wiersz->mail</td>
                        <td><a href=\"?action=del&id=$wiersz->id_kontakt\" class=\"btn btn-sm btn-danger\" onclick=\"return confirm('Czy chcesz usunąć?')\">Usuń</a>
                            <a href=\"?action=mod&id=$wiersz->id_kontakt\" class=\"btn btn-sm btn-success\" id=\"modyfikacja\" >Modyfikuj</a></td>    

                    </tr>
                        ";
            }

            ?>

        </table>
        
        <?php 
        
            if($lp==0){
                echo 'brak rekordów';
            }
            
            ob_end_flush();
        ?>

    </body>
    
</html>