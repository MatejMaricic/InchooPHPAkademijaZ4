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

                       $this->totalIncome(); break;


                case 4:

                      $this->average_by_gender();   break;



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

    public function employeeGender($id)
    {
        $person = $this->employeeStorage->getEmployee($id);
        $employeeGender = $person['gender'];

        return $employeeGender;

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

            }elseif ($age >=20 && $age <30){

                $total_under_30_income += $value['income'];
            }elseif ($age >=30 && $age <40){

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
    public function average_by_gender()
    {
        $m = 0;
        $f = 0;
        $male_income = 0;
        $female_income = 0;
        foreach ($this->employeeStorage->getEmployees() as $key =>$value)
        {
            $gender = $this->employeeGender($key);

            if ($gender === 'M'){

                $male_income += $value['income'];
                $m++;
            }elseif ($gender === 'Ž' || $gender === 'Z'){

                $female_income += $value['income'];
                $f++;
            }

        }
        $average_male = $male_income/$m;
        $average_female = $female_income/$f;
        $difference = abs($average_female - $average_male);

        echo "\033[32m". "PROSJEČNA PRIMANJA \n\n"."\033[0m";
        echo "\033[32m". "## Prosječna primanja kod žena: $average_female kn \n\n"."\033[0m";
        echo "\033[32m". "## Prosječna primanja kod muškaraca: $average_male kn \n\n"."\033[0m";
        echo "\033[32m". "## Razlika u prosječnim primanjima između žena i muškaraca: $difference kn \n\n"."\033[0m";

    }


}

