<?php
/*
 * autor: @takdzwiedz
 * 
 * Klasa tworządca formularz
 */
        
        
class Form {

    function __construct($method='get') {
        $action = $_SERVER['PHP_SELF'];
        echo "<div style=\"display: flex; justify-content: center;align-items: center;height: 95vh;\">\n\n       <form action=\"$action\" method=\"$method\" style=\"background-color:lightgreen; width:300px\">\n\n       <fieldset>\n\n";
    }

    function addInput ($type, $name, $label, $others=''){
        echo "          <input type= \"$type\" name=\"$name\" id=\"$name\" $others> $label<br>\n";
    }

    function addTextarea($tytuł, $name, $others=''){
        echo "          <span style=\"font-weight:bold\">$tytuł</span><br>\n           <textarea name=\"$name\"$others></textarea><br>\n";

    }

    function __destruct() { 
        echo "\n       </fieldset>\n\n   </form>\n\n  </div>\n";
    }

}

