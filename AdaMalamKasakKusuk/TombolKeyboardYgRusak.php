<?php

class TombolKeyboardYgRusak
{

    protected $ember = array();

    public function bersihkanDuplikasi()
    {
        $pencacah = 0;
        $handle = @fopen("input.5", "r");
        if ($handle) {
            while (($buffer = fgets($handle, 4096)) !== false) {
                if ($pencacah != 0) {
                    echo "Sebelum: " . $buffer . "Sesudah: " .
                    $this->hapusDuplikatKarakterDiSebelahnya(str_split($buffer)) . "\n";
                }
                $pencacah++;
            }
            if (!feof($handle)) {
                echo "Waduh: Gagal membaca baris\n";
            }
            fclose($handle);
        }
    }

    private function hapusDuplikatKarakterDiSebelahnya($larik)
    {
        $lebarLarik = count($larik);
        for ($g = 0; $g < $lebarLarik - 1; $g++) {
            if ($larik[$g] == $larik[$g + 1]) {
                // Tampung karakter yang sama dalam sebuah ember
                $this->ember[] = $g + 1;
            }
        }

        // Tinggal kita buang deh isi ember tersebut
        foreach ($this->ember as $value) {
            unset($larik[$value]);
        }
        $this->ember = array();
        return implode($larik);
    }

}
$Keyboard = new TombolKeyboardYgRusak();
$Keyboard->bersihkanDuplikasi();
?>