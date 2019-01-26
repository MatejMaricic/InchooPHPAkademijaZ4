<?php

require 'Statistika.php';

while( true ) {

    printMenu();
    $choice = 0;
    $choice = trim( fgets(STDIN) );

    if( $choice == 6 ) {

        break;
    }

    // Act based on user choice
    switch( $choice ) {

        case 1:
            {

            }

        case 2:
            {
                break;
            }
        case 3:
            {
                break;
            }
        case 4:
            {
                break;
            }
        case 5:
            {

                $printstat = new Statistika();
                $printstat ->printStatMenu();
            }

    }
}

function printMenu() {
    echo "\n";
    echo "************ Zaposlenici ******************\n";
    echo "1 - Pregled Zaposlenika\n";
    echo "2 - Unos novog Zaposlenika\n";
    echo "3 - Promjena podataka postojećem zaposleniku\n";
    echo "4 - Brisanje Zaposlenika\n";
    echo "5 - Statistika\n";
    echo "6 - Izlaz\n";

    echo "Izaberite opciju upisom broja od 1 do 6 ::";
}




