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
                       $this->totalIncome();
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

    public function employeeAge($id)
    {
        $today = new DateTime('NOW');
        $person = $this->employeeStorage->getEmployee($id);

                $employeeDate = new DateTime($person['birth']);
                $employeeDiff = $today->diff($employeeDate);
                $employeeAge = $employeeDiff->y;

            return $employeeAge;

    }



    public function totalIncome()
    {
        $total_under_20_income = 0;
        $total_under_30_income = 0;
        $total_under_40_income = 0;
        $total_over_40_income = 0;

        foreach ($this->employeeStorage->getEmployees() as $key => $value)
        {
            $age = $this->employeeAge($key);
            if ($age < 20){

                $total_under_20_income += $value['income'];

            }elseif ($age >=20 || $age <30){

                $total_under_30_income += $value['income'];
            }elseif ($age >=30 || $age <40){

                $total_under_40_income += $value['income'];
            }elseif ($age >40){

                $total_over_40_income += $value['income'];
            }

        }
        echo "\033[32m". "UKUPNA PRIMANJA ZAPOSLENIKA PO DOBNIM SKUPINAMA \n\n"."\033[0m";

        echo "\033[32m". "## Zaposlenici mlađi od 20: $total_under_20_income kn \n\n"."\033[0m";
        echo "\033[32m". "## Zaposlenici mlađi od 30: $total_under_30_income kn \n\n"."\033[0m";
        echo "\033[32m". "## Zaposlenici mlađi od 40: $total_under_40_income kn \n\n"."\033[0m";
        echo "\033[32m". "## Zaposlenici stariji od 40: $total_over_40_income kn \n\n"."\033[0m";




    }
}

