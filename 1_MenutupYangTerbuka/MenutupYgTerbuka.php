<?php

class MenutupYgTerbuka {

    private $container;
    private $opener = array("(","{","[");
    private $closer = array(")","}","]");
    private $sentences = "hh{fffff(jjjj]dddd(dsksksk)}";

    function run(){
        $this->lookingForPattern();
    }

    function lookingForPattern (){
        for ($i<=0; $i<=2; $i++)
        {
            $openerMatched = preg_match_all("/\\".$this->opener[$i]."/",$this->sentences,$match) . "\n";
            $closerMatched = preg_match_all("/\\".$this->closer[$i]."/",$this->sentences,$match) . "\n";
        }

    }

    function comparingMatchedPattern (){

    }

}

$MenutupYgTerbuka = new MenutupYgTerbuka();
$MenutupYgTerbuka->run();


// Algoritma
// Looping by opener, count_total_opener
// Looping by closer, count_total_closer
// If count_total_opener == count_total_closer return 1
// compare with and


?>
