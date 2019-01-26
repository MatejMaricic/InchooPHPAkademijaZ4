<?php

class AppManagement
{
    public function __construct()
    {
        $userAction = new UserAction();
        $listAllEmployees = new EmployeeView();


        while( true ) {

            $this->printMenu();
            $choice = trim( fgets(STDIN) );

            if( $choice == 6 ) {

                break;
            }

// Act based on user choice
            switch( $choice ) {

                case 1:
                    {
                       $listAllEmployees->ListAllEmployees();
                        echo "Za povratak u izbornik upišite da ";
                        if (readline() === 'da'){
                            break;
                        }
                    }

                case 2:
                    {

                        echo "Želite li unijeti više zaposlenika? da/ne ";
                        if (readline() !== 'da'){
                            $userAction -> addUser();
                        }else
                        {
                            $userAction -> addMultipleUsers();
                        }
                        $userAction ->getUser();


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

                        $printstat = new Statistics();
                        $printstat ->printStatMenu();
                    }

            }
        }

}

    public function printMenu()
    {
        echo "\n";
        echo "************ Zaposlenici ******************\n";
        echo "1 - Pregled Zaposlenika\n";
        echo "2 - Unos novog Zaposlenika\n";
        echo "3 - Promjena podataka postojećem zaposleniku\n";
        echo "4 - Brisanje Zaposlenika\n";
        echo "5 - Statistika\n";
        echo "6 - Izlaz iz aplikacije\n";

        echo "Izaberite opciju upisom broja od 1 do 6 ::";
    }
}