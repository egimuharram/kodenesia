<?php

class PesanRahasia
{
    protected $baskom;
    protected $hasilTerjemah = "";
    protected $kamus = array("a" => "n", "b" => "o", "c" => "p", "d" => "q",
                             "e" => "r", "f" => "s", "g" => "t", "h" => "u",
                             "i" => "v", "j" => "w", "k" => "x", "l" => "y",
                             "m" => "z");

    public function bacaSandi()
    {
        $pencacah = 0;
        $handle = @fopen("input.8", "r");
        if ($handle) {
            while (($buffer = fgets($handle, 4096)) !== false) {
                if ($pencacah != 0) {
                    // Terjemahkan Baris 
		    $this->baskom = str_split($buffer);
                    foreach ($this->baskom as $key => $value) {
                        $this->hasilTerjemah .= $this->terjemahkan($value);
                    }
                    echo $pencacah . "). " . $this->hasilTerjemah;
                    $this->hasilTerjemah = "";
                }
                $pencacah++;
            }
            if (!feof($handle)) {
                echo "Waduh: Gagal membaca baris\n";
            }
            fclose($handle);
        }
    }

    private function terjemahkan($karakter)
    {
        if (array_key_exists($karakter, $this->kamus)) {
            return $this->kamus[$karakter];
        } else {
            if ($kunci = array_search($karakter, $this->kamus)) {
                return $kunci;
            } else {
                return $karakter;
            }
        }
    }

}
$PesanRahasia = new PesanRahasia();
$PesanRahasia->bacaSandi();
?>
