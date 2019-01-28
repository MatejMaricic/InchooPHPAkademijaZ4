<?php

class Statistics extends Users
{

    public function printStatMenu()
    {


        while (true) {

            $this->statMenu();
            $choice = trim(fgets(STDIN));

            if ($choice == 5) {

                break;

            }

            switch ($choice) {

                case 1:

                    $this->ageSum();

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


    public function statMenu()
    {
        echo "************ Statistika ******************\n";
        echo "1 - Ukupna starost\n";
        echo "2 - Prosječna starost\n";
        echo "3 - Ukupna primanja\n";
        echo "4 - Prosječna primanja\n";
        echo "5 - Glavni izbornik\n";


        echo "Izaberite opciju upisom broja od 1 do 5 ::";

    }

    public function ageSum()
    {
        $yearSum = 0;
        $today = new DateTime('NOW');

       foreach ($this->employeeStorage->getEmployees() as $key =>$value){
          if ($key = 'birth')
          {
           $employeeDate = new DateTime($value['birth']) ;
           $employeeDiff = $today->diff($employeeDate);
           $employeeYear = $employeeDiff->y;


          }

           $yearSum += $employeeYear;

    }

        echo "\033[32m". "## Ukupna starost svih zaposlenika je  $yearSum  godina \n\n"."\033[0m";
        echo "\033[32m". "## Ukupna starost svih zaposlenika (godine mjeseci i dani) je   \n\n"."\033[0m";
    }


}

