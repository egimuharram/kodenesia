<?php

class MenutupYgTerbuka {

    private $opener = array("(","{","[");
    private $closer = array(")","}","]");

    public function run()
    {
        $counter = 1;
        try {
        	$handle = @fopen("../kodenesia_input/01.in", "r");
            while (($buffer = fgets($handle, 4096)) !== false) {
                if ($counter != 0) {
                    echo "h#". $counter . ": " . $this->lookingForPattern($buffer) . "\n";
                }
                $counter++;
            }
            fclose($handle);
         } catch (Exception $ex) {
         	echo $ex->getMessage();
         }
    }

    function lookingForPattern ( $string ) {
        $openerMatched = 0;
        $closerMatched = 0;
        for ( $i= 0; $i<=2; $i++ )
        {
            $openerMatched += preg_match_all("/".preg_quote($this->opener[$i],"/")."/",$string,$match);
            $closerMatched += preg_match_all("/".preg_quote($this->closer[$i],"/")."/",$string,$match);
        }

        if (($openerMatched - $closerMatched) == 0) {
            return "Ya";
        } else {
            return "Tidak";
        }
    }
}

$MenutupYgTerbuka = new MenutupYgTerbuka();
$MenutupYgTerbuka->run();

?>
