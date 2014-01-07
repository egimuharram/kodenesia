<?
/**
 * Untuk optimasi - pada seksi pencetakan "FizzBuzz",
 * kita bisa langsung mengganti denominator modulus menggunakan angka 15.
 */
class FizzBuzz {

    var $angka_maksimum = 100;

    function cetak(){

        for ($i=1; $i <=$this->angka_maksimum; $i++){
            switch ($i) {
                case ($i % 3 == 0 && $i % 5 ==0):
                    echo $i . " FizzBuzz\n";
                    break;

                case ($i % 3 == 0):
                    echo $i . " Fizz\n";
                    break;

                case ($i % 5 == 0):
                    echo $i . " Buzz\n";
                    break;

                default:
                    echo $i . "\n";
                    break;
            }
        }
    }
}

$FizzBuzz = new FizzBuzz();
$FizzBuzz->cetak();

?>
