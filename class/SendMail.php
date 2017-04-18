<?php
/*
 * autor: @takdzwiedz
 * 
 * Klasa wysyłąjaca mejle
 */


class SendMail {
            
    private $from, $Cc, $Bcc, $headers, $to, $subject, $message, $htmlCodeStart, $htmlCodeEnd;

    function __construct($from, $Cc='', $Bcc='', $html='yes') {  //przypisuję domyślną wartość html

        //Inicjalizacja zmiennych 

        $this->from=$from;
        $this->Cc=$Cc;
        $this->Bcc=$Bcc;

        $this->headers=''; // tworzymy je, żeby się nadpisywały przypadkiem, zabezpieczamy się
        $this->htmlCodeStart='';
        $this->htmlCodeEnd='';

        if($html=='yes'){
            $this->htmlCodeStart='
                    <html>
                    <head>
                        <meta charset="UTF-8">
                    </head>
                    <body>
                    ';
            $this->htmlCodeEnd='
                    </body>
                    </html>
                    ';          

        $this->headers="MIME-Version:1.0\r\n"; //Specjalny tryb do interpretacji HTML w programach pocztowych
        $this->headers.="Content-type:text/html; charset=UTF-8\r\n"; //Standard wymagany przez programy pocztowe
        }

        $this->headers.="From:$this->from\r\n";

        // Jeżeli jest Cc to wyświetl nagłówek;

        if($this->Cc!=''){
            $this->headers.="Cc:$this->Cc\r\n";
        }               

        // Jeżeli jest Bcc to wyświetl odpowiedni nagłówek;

        if($this->Bcc!=''){
            $this->headers.="Bcc:$this->Bcc\r\n";
        }

    }

    function send($to, $subject, $message){

        $this->to=$to;
//                $this->Cc=$Cc;
//                $this->Bcc=$Bcc;
        $this->subject=$subject;
        $this->message=$message;

        $this->message=$this->htmlCodeStart;
        $this->message.=$message;
        $this->message.=$this->htmlCodeEnd;

        $wyslij = mail($this->to, $this->subject, $this->message, $this->headers);
    }
}
