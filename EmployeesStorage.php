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


    public function setEmployees($employees)
    {
        $this->employees[] = $employees;
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

    public function editEmployee($id)
    {
        echo $id . " " . $this->employees[$id]['name'] . " " .  $this->employees[$id]['lastname'] . " " . $this->employees[$id]['birth'] . " " . $this->employees[$id]['gender'] . " " . $this->employees[$id]['income'];
        unset($this->employees[$id]);


        foreach ($this->getEmployeeScheme() as $key => $singleUser) {


            $new_data[$key] = readline("$singleUser : ");

        }
        $this->employees[$id] = $new_data;
    }


}