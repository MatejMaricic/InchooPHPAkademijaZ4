<?php

// class for all CRED actions
//extends Users to get access to storage and validators
class UserAction extends Users {



    // fills array with data based on employeeScheme(found in EmployeesStorage)


    public function addUser()
    {

        foreach ($this->employeeStorage->getEmployeeScheme() as $key => $singleUser) {

            $userInput = readline("$singleUser : ");
            $validate = $this->validateInput($userInput, $key);    // Each input is sent for validation using validateInput method

            while (!$validate)   // loop that forces user to enter valid input
            {
                $userInput = readline("Unesite ispravan format : ");
                $validate = $this->validateInput($userInput, $key);

            }
            if ($key === 'income'){
                $userInput = number_format((float)$userInput, 2, '.', ''); // formats income input so it always has 2 decimal points
            }

            $data[$key] = $userInput;

        }

        $this->employeeStorage->setEmployee( $data );      // After every input is validated data is stored using setEmployee method

        echo "\033[32m". "## Novi zaposlenik ". $data['name']." ". $data['lastname']." je dodan! \n\n"."\033[0m";


    }

    // does same action as addUser but gives user a choice to enter multiple users one after another
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

    // Displays all employees and sends user input ($id) to deleteEmployee method in storage which deletes chosen employee
    public function deleteUser()
    {

        $this->displayAllEmployees();
        $id = readline("Unesite broj ispred zaposlenika kojeg želite izbrisati :");
        $check = readline("Jeste li sigurni? da/ne: ");

        if ($check === 'da'){
            $this->employeeStorage->deleteEmployee($id);
        }

    }

    // Lists all employees, user picks which employee needs to be edited
    public function editUser()
    {

        $this->displayAllEmployees();
        $new_data = [];
        $id = readline("Unesite broj ispred zaposlenika čije podatke želite izmjeniti: ");

        $this->displayOneEmployees( $id);

        foreach ( $this->employeeStorage->getEmployeeScheme() as $key => $singleUser) {         //input is same as addUser method

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
        $this->employeeStorage->updateEmployee($id, $new_data);  //sends both id and data to updateEmployee so the chosen employee can be updated with new data

        echo "\033[32m". "## Izmjene za ". $new_data['name']." ". $new_data['lastname']." su upisane! \n\n"."\033[0m";

    }


}