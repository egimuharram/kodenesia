class FizzBuzz {

    public static void main (String[] args){

        int i;
        for ( i=1; i<=100; i++ ) {
            if ( i % 3 == 0 && i % 5 == 0 ) {
              cetak( i, "Fizz Buzz" );
            } else if ( i % 5 == 0) {
              cetak( i, "Buzz" );
            } else  if ( i % 3 == 0 ) {
              cetak( i,  "Fizz" );
            } else {
              cetak(i);
            }
        }

    }

    static void cetak(int i, String suffix){
        System.out.println(i + " " + suffix);
    }

    // Overloading methods
    // Dalam satu class bisa ada > 1 methods dengan nama sama dengan
    // jumlah parameter yang berbeda-beda.
    //
    // Salah satu pemanfaatannya ya ini. Ngasih default parameter.
    // Yang mana kalau di php tinggal gini aja:
    // cetak($i, $suffix = "Neither Fizz Nor Buzz");
    static void cetak(int i){
        cetak(i,"Neither Fizz Nor Buzz");
    }

}
