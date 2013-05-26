<?php
/**
* Algoritma 
* 1. Buat array berisi kamus ROT13  
* 2. Baca baris input.8
* 3. Pecah baris ke dalam potongan karakter
* 4. Cocokkan karakter pada kolom "key" array, jika ketemu ambil "value" dari "key" tersebut
* 5. Cocokkan karakter pada kolom "value" array, jika ketemu ambil "key"-nya   
* 6. Jika langkah 4 dan 5 tidak memberikan hasil, biarkan karakter tersebut apa adanya
* 7. Gabungkan hasil pada langkah 4,5, dan 6 hingga membentuk kalimat yg 
     sudah ter-decrypt. Cetak ke layar !
* 8. Kembali ke langkah 2, terus ulangi hingga baris terakhir selesai dibaca
**/

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
        try { 
        	$handle = @fopen("input.8", "r");
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
            fclose($handle);
         } catch (Exception $ex) {
         	echo $ex->getMessage();
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
