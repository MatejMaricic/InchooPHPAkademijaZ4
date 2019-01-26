<?php

class Employees
{
    private $id;
    private $name;
    private $lastname;
    private $birth;
    private $gender;
    private $income;
    protected $employees=[];
    protected $employeeList= ['name' => 'Name', 'lastname' => 'Lastname', 'birth' => 'Birth', 'gender' => 'Gender', 'income' => 'Income'];


    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;
    }


    public function getName()
    {
        return $this->name;
    }


    public function setName($name)
    {
        $this->name = $name;
    }


    public function getLastname()
    {
        return $this->lastname;
    }


    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }


    public function getBirth()
    {
        return $this->birth;
    }


    public function setBirth($birth)
    {
        $this->birth = $birth;
    }


    public function getIncome()
    {
        return $this->income;
    }


    public function setIncome($income)
    {
        $this->income = $income;
    }


    public function getGender()
    {
        return $this->gender;
    }


    public function setGender($gender)
    {
        $this->gender = $gender;
    }



}


