<?php

class UrutanTerpanjang {

    function __construct(){

        $row = array(1,3,2,8,7,1,12,13,99,43,44);

        sort($row);
        $rowLength = count($row) - 1;
        $counter = 0;

        for ($i=0; $i<$rowLength; $i++){
        print "<pre>";
        print_r($row);
        echo $row[$i+1] . " " . $row[$i];
            if ($this->isConsecutive($row[$i+1], $row[$i])) {
                $counter++;
            } else {
                $group[] = $counter+1;
                $counter = 0;
            }


        }
        print_r($group);
        print " max is -> " . max($group);
    }

    function isConsecutive($num2,$num1){
        if ($num2 - $num1 == 1){
            return true;
        } else {
            return false;
        }
    }

}

$urut = new UrutanTerpanjang;


?>
