<?php

class AdaMalamKaskus
{

    protected $ember = array();

    public function hitungJumlahPolindrom()
    {
        $pencacah = 0;
        $handle = @fopen("input.3", "r");
        if ($handle) {
            while (($buffer = fgets($handle, 4096)) !== false) {
                if ($pencacah != 0) {
                    echo "Case #" . $pencacah . ": " . $this->hitungPolindrom($buffer) . "\n";
                    echo $buffer . "\n";
                }
                $pencacah++;
            }
            if (!feof($handle)) {
                echo "Waduh: Gagal membaca baris\n";
            }
            fclose($handle);
        }
    }

    private function hitungPolindrom($kalimat)
    {
        $kata = explode(" ", $kalimat);
        $jumlahPolindrom = 0;
        foreach ($kata as $value) {
            if ($this->isPolindrom($this->bersihkanKata($value))) {
                $jumlahPolindrom++;
            }
        }
        return $jumlahPolindrom;
    }

    private function isPolindrom($kata)
    {
        if ($kata == "")
            return false;

        if ($kata == strrev($kata)) {
            return true;
        } else {
            return false;
        }
    }

    private function bersihkanKata($kata)
    {
        return preg_replace("/[0-9,\n\r]/", "", $kata);
    }

}
$AdaMalamKaskus = new AdaMalamKaskus();
$AdaMalamKaskus->hitungJumlahPolindrom();
?>