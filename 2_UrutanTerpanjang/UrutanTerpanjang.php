<?php

class UrutanTerpanjang {

    public function run()
    {
        $counter = 1;
        $handle = fopen("../kodenesia_input/02.in", "r");
        while (($buffer = fgets($handle,4096)) !== false) {
            echo "h#". $counter . ": " . $this->findMaxConsecutive(explode(" ",$buffer)) . "\n";
            $counter++;
        }
        fclose($handle);
    }

    function findMaxConsecutive($row){

        sort($row);
        $rowLength = count($row) - 1;
        $counter = 0;
        $group = array(0=>0);

        for ($i=0; $i<$rowLength; $i++){
            if ($this->isConsecutive($row[$i+1], $row[$i])) {
                $counter++;
            } else {
                $group[] = $counter+1;
                $counter = 0;
            }
        }
        print "<pre>"; print_r($row);
        return $this->getMaxConsecutiveInWholeGroup($group);
    }

    function isConsecutive($num2,$num1){
        if ($num2 - $num1 == 1){
            return true;
        } else {
            return false;
        }
    }

    function getMaxConsecutiveInWholeGroup($group) {
        return max($group);
    }

}

$UrutanTerpanjang = new UrutanTerpanjang;
$UrutanTerpanjang->run();

?>
