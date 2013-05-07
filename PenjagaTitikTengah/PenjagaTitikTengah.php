<?php

class PenjagaTitikTengah
{

    private $POLA_3x3 = array(1, 4, 3, 2);
    private $median = 0;
    private $pola = array();
    private $total8Angka = 0;

    public function cariJumlahAngkaDiSekelilingMedian()
    {
        $pencacah = 0;
        $handle = @fopen("input.7", "r");
        try {
            while (($N = fgets($handle, 4096)) !== false) {
                if ($pencacah != 0) {
                    $this->median = $this->tentukanMedian($N);
                    $this->pola = $this->cariPolanya($N);
                    $this->jumlahkanDelapanAngkaDiSekelilingnya();
                }
                $pencacah++;
            }
        } catch (Exception $exc) {
            echo "Waduh: Gagal membaca baris\n";
            echo $exc->getTraceAsString();
        }
    }

    private function tentukanMedian($N)
    {
        return round($N * $N / 2);
    }

    private function cariPolanya($N)
    {
        $selisih = $N - 3;
        return array(1, $selisih + $this->POLA_3x3[1], $selisih + $this->POLA_3x3[2], $selisih + $this->POLA_3x3[3]);
    }

    private function jumlahkanDelapanAngkaDiSekelilingnya()
    { 
        foreach ($this->pola as $key => $value) {
            // Empat Angka Pertama
            $this->total8Angka += $this->median - $value;
            // Empat Angka Kedua
            $this->total8Angka += $this->median + $value;
        }
        echo $this->total8Angka . "\n";
    }

}
$PenjagaTitikTengah = new PenjagaTitikTengah();
$PenjagaTitikTengah->cariJumlahAngkaDiSekelilingMedian();
?>