<?php

class EmployeeView
{
    private $userStorage;

    public function __construct($employeeStorageInstance)
    {
        $this->userStorage = $employeeStorageInstance;

    }

    public function ListAllEmployees()
    {

       foreach($this->userStorage->getEmployees() as $key => $singleuser)
       {
           echo $key . ". " . $singleuser['name'] . " " . $singleuser['lastname'] . " " . $singleuser['birth'] . " " . $singleuser['gender'] . " " . $singleuser['income'] . "\n";
       }
    }

}