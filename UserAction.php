<?php

class UserAction  {

    private $userStorage;


    public function __construct($employeeStorageInstance)
    {
        $this->userStorage = $employeeStorageInstance;


    }



    public function addUser()
    {


            foreach ($this->userStorage->getEmployeeScheme() as $key => $singleUser) {


                $data[$key] = readline("$singleUser : ");

            }

            $this->userStorage->setEmployees($data);




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
        print_r($this->userStorage->getEmployees());
    }

    public function deleteUser()

    {

        foreach($this->userStorage->getEmployees() as $key => $singleuser)
        {

            echo $key  . ". " . $singleuser['name'] . " " . $singleuser['lastname'] . " " . $singleuser['birth'] . " " . $singleuser['gender'] . " " . $singleuser['income'] . "\n";
        }


            $delete = readline("Unesite broj ispred zaposlenika kojeg želite izbrisati : ");

            $this->userStorage->deleteEmployee($delete);


    }


}
