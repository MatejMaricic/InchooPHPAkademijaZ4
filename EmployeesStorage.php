<?php

// singleton class that serves as storage for all employees, has getters and setters for properties and simple delete and update methods
class EmployeesStorage
{

    protected static $instance = null;

    protected $employees = []; // all employees are stored here
    protected $employeeScheme = ['name' => 'Ime:', 'lastname' => 'Prezime:', 'birth' => 'Datum Rođenja (dd. MM. YYYY):', 'gender' => 'Spol (M/Ž):', 'income' => 'Mjesečna primanja (koristiti . za decimalan broj): '];


    public static function getInstance()
    {
        if (!isset(self::$instance)) {

            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getEmployees()
    {
        return $this->employees;
    }


    public function setEmployee($employee)
    {
        $this->employees[] = $employee;
        return $employee;
    }

    public function getEmployee($id)
    {
        return $this->employees[$id];
    }


    public function getEmployeeScheme()
    {
        return $this->employeeScheme;
    }

    public function deleteEmployee($id)  // deletes employee based on id sent by deleteUser method in UserAction class
    {
        unset($this->employees[$id]);
    }

    public function updateEmployee($id, $data) // updates employee based on id and new employee data sent by editUser method in UserAction class
    {
        $this->employees[$id] = $data;
    }


}