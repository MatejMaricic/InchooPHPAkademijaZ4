<?php

class EmployeeView extends Users
{

    public function ListAllEmployees()
    {

       foreach($this->employeeStorage->getEmployees() as $key => $singleuser)
       {
           echo $key . ". " . $singleuser['name'] . " " . $singleuser['lastname'] . " " . $singleuser['birth'] . " " . $singleuser['gender'] . " " . $singleuser['income'] . "\n";
       }
    }

}