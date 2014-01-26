<?php

class MenutupYgTerbuka {

    private $container;
    private $opener = array("(","{","[");
    private $closer = array(")","}","]");
    private $sentences = "hh{fffffj[jj]jdddd(dsksksk)}";
    private $matched = 0;

    function run(){
        $this->lookingForPattern();
    }

    function lookingForPattern (){
        for ($i=0; $i<=2; $i++)
        {
            $openerMatched = preg_match_all("/\\".$this->opener[$i]."/",$this->sentences,$match) . "\n";
            $closerMatched = preg_match_all("/\\".$this->closer[$i]."/",$this->sentences,$match) . "\n";
            if ($openerMatched != 0){
                $isMatched = $openerMatched - $closerMatched;
                $this->isAllMatched($isMatched);
            }
        }
        if ($this->matched == 0)
        {
            echo "h#1 YA";
        } else {
            echo "h#2 TIDAK";
        }
    }

    function isAllMatched ($subTotal){
        $this->matched = $this->matched - $subTotal;
    }

}

$MenutupYgTerbuka = new MenutupYgTerbuka();
$MenutupYgTerbuka->run();


?>
