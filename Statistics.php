<?php

class Statistics
{

    public function printStatMenu()
    {


        while (true) {
            echo "************ Statistics ******************\n";
            echo "1 - Ukupna starost\n";
            echo "2 - Prosječna starost\n";
            echo "3 - Ukupna primanja\n";
            echo "4 - Prosječna primanja\n";
            echo "5 - Glavni izbornik\n";


            echo "Izaberite opciju upisom broja od 1 do 5 ::";

            $choice = 0;
            $choice = trim(fgets(STDIN));

            if ($choice == 5) {

                break;

            }
        }
        switch ($choice) {

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


        }
    }


}

