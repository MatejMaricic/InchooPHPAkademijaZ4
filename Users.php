<?php

class Users
{
    protected $employeeStorage;

    public function __construct()
    {
       $this->employeeStorage = EmployeesStorage::getInstance() ;
    }




}