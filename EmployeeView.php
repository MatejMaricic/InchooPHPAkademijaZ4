<?php

class EmployeeView extends Users
{

    public function ListAllEmployees()
    {

       foreach($this->employeeStorage->getEmployees() as $key => $singleUser)
       {
           echo $key . ". " . $singleUser['name'] . " " . $singleUser['lastname'] . " " . $singleUser['birth'] . " " . $singleUser['gender'] . " " . $singleUser['income'] . "\n";
       }
    }

}