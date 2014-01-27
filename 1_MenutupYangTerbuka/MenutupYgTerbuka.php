<?php

class MenutupYgTerbuka {

    private $opener = array("(","{","[");
    private $closer = array(")","}","]");
    private $matched = 0;

    public function run()
    {
        $counter = 0;
        try {
        	$handle = @fopen("../kodenesia_input/01.in", "r");
            while (($buffer = fgets($handle, 4096)) !== false) {
                if ($counter != 0) {
                    echo $this->lookingForPattern($buffer);
                }
                $counter++;
            }
            fclose($handle);
         } catch (Exception $ex) {
         	echo $ex->getMessage();
         }
    }

    function lookingForPattern ($string){
        for ($i=0; $i<=2; $i++)
        {
            $openerMatched = preg_match_all("/\\".$this->opener[$i]."/",$string,$match) . "\n";
            $closerMatched = preg_match_all("/\\".$this->closer[$i]."/",$string,$match) . "\n";
            if ($openerMatched != 0){
                $isMatched = $openerMatched - $closerMatched;
                $this->isAllMatched($isMatched);
            }
        }
        if ($this->matched == 0)
        {
            return "YA";
        } else {
            return "TIDAK";
        }
    }

    function isAllMatched ($subTotal){
        $this->matched = $this->matched - $subTotal;
    }

}

$MenutupYgTerbuka = new MenutupYgTerbuka();
$MenutupYgTerbuka->run();


?>
