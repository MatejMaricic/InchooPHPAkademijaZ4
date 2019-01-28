<?php

class UserAction extends Users {




    public function addUser()
    {


            foreach ($this->employeeStorage->getEmployeeScheme() as $key => $singleUser) {


                $userInput = readline("$singleUser : ");
                $validate = $this->validateInput($userInput, $key);
                var_dump($validate);

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

            $this->employeeStorage->setEmployees($data);




    }




    public function addMultipleUsers()
    {
        $this->addUser();

        while (true)
        {
            echo "Želite li unjeti novog zaposlenika? da/ne ";
        if (readline() !== 'da'){
            break;
        }else
        {
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

        foreach($this->employeeStorage->getEmployees() as $key => $singleuser)
        {

            echo $key  . ". " . $singleuser['name'] . " " . $singleuser['lastname'] . " " . $singleuser['birth'] . " " . $singleuser['gender'] . " " . $singleuser['income'] . "\n";
        }


            $id = readline("Unesite broj ispred zaposlenika kojeg želite izbrisati : ");

            $this->employeeStorage->deleteEmployee($id);


    }

    public function editUser()
    {
        foreach($this->employeeStorage->getEmployees() as $key => $singleuser)
        {

            echo $key  . ". " . $singleuser['name'] . " " . $singleuser['lastname'] . " " . $singleuser['birth'] . " " . $singleuser['gender'] . " " . $singleuser['income'] . "\n";
        }

        $id = readline("Unesite broj ispred zaposlenika čije podatke želite izmjeniti: ");
        $this->employeeStorage->editEmployee($id);

    }


}
