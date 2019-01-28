<?php

class UserAction extends Users {




    public function addUser()
    {

        foreach ($this->employeeStorage->getEmployeeScheme() as $key => $singleUser) {

            $userInput = readline("$singleUser : ");
            $validate = $this->validateInput($userInput, $key);

            while (!$validate)
            {
                $userInput = readline("Unesite ispravan format : ");
                $validate = $this->validateInput($userInput, $key);

            }
            if ($key === 'income'){
                $userInput = number_format((float)$userInput, 2, '.', '');
            }

            $data[$key] = $userInput;

        }

        $this->employeeStorage->setEmployee( $data );
        echo "\033[32m". "## Novi zaposlenik ". $data['name']." ". $data['lastname']." je dodan! \n\n"."\033[0m";


    }


    public function addMultipleUsers() {
        $this->addUser();

        while ( true ) {
            echo "\033[32m"."Želite li unjeti novog zaposlenika? da/ne "."\033[0m";
            if ( readline() !== 'da' ) {
                break;
            } else {
                $this->addUser();

            }

        }
    }

    public function getUser()
    {
        print_r($this->employeeStorage->getEmployees());
    }

    public function deleteUser()
    {

        $this->displayAllEmployees();
        $id = readline("Unesite broj ispred zaposlenika kojeg želite izbrisati :");
        $this->employeeStorage->deleteEmployee($id);
    }

    public function editUser()
    {

        $this->displayAllEmployees();
        $new_data = [];
        $id = readline("Unesite broj ispred zaposlenika čije podatke želite izmjeniti: ");

        $this->displayOneEmployees( $id);

        foreach ( $this->employeeStorage->getEmployeeScheme() as $key => $singleUser) {

            $userInput = readline("$singleUser : ");
            $validate = $this->validateInput($userInput, $key);

            while (!$validate)
            {
                $userInput = readline("Unesite ispravan format : ");
                $validate = $this->validateInput($userInput, $key);

            }
            if ($key === 'income'){
                $userInput = number_format((float)$userInput, 2, '.', '');
            }

            $new_data[$key] = $userInput;

        }
        $this->employeeStorage->updateEmployee($id, $new_data);

        echo "\033[32m". "## Izmjene za ". $new_data['name']." ". $new_data['lastname']." su upisane! \n\n"."\033[0m";

    }


}