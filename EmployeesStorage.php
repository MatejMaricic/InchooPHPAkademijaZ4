<?php

class EmployeesStorage
{

    protected static $instance = null;

    protected $employees = [];
    protected $employeeScheme = ['name' => 'Ime:', 'lastname' => 'Prezime:', 'birth' => 'Datum Rođenja (dd. MM. YYYY):', 'gender' => 'Spol (M/Ž):', 'income' => 'Mjesečna primanja:'];


    public function deleteEmployee($delete)
    {
        foreach ($this->employees as $key=>$value)
        {
            if ($key == $delete){
                unset($this->employees[$delete]);
            }

        }
    }


    public function getEmployees()
    {
        return $this->employees;
    }


    public function setEmployees($employees)
    {
        $this->employees[] = $employees;
    }


    public function getEmployeeScheme()
    {
        return $this->employeeScheme;
    }


    public function setEmployeeScheme($employeeScheme)
    {
        $this->employeeScheme = $employeeScheme;
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {

            self::$instance = new self();
        }
        return self::$instance;
    }

}