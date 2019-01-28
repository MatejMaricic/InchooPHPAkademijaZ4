<?php

class EmployeesStorage
{

    protected static $instance = null;

    protected $employees = [];
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

    public function removeEmployee($id)
    {
        unset($this->employees[$id]);
    }

    public function getEmployeeScheme()
    {
        return $this->employeeScheme;
    }

    public function deleteEmployee($id)
    {
        unset($this->employees[$id]);
    }

    public function updateEmployee($id, $data){
        $this->employees[$id] = $data;
    }


}