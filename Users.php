<?php

class Users
{
    protected $employeeStorage;

    public function __construct()
    {
        $this->employeeStorage = EmployeesStorage::getInstance() ;
    }



    public function validateInput( $data, $key ){

        if($key === 'name'){
            return $this->validateString( $data );
        } elseif($key === 'lastname'){
            return $this->validateString( $data );
        } elseif ($key === 'birth'){
            return $this->validateDate( $data );
        } elseif ($key === 'gender'){
            return $this->validateGender($data);
        } elseif ($key === 'income'){
            return $this->validateNumber($data);
        }
        return true;

    }


    public function validateString($data){
        return ( !isset( $data ) || ctype_alpha(str_replace(' ', '', $data)) === false ) ? false : true;
    }

    public function validateDate($date){
        $format = 'd.m.Y';
        return $date == date($format, strtotime($date));
    }

    public function validateGender($gender){
        return (isset($gender) && in_array($gender, array('M','Ž','Z'))) ? true : false;
    }

    public function validateNumber($number){
        return (is_numeric($number)) ? true : false;
    }

    public function displayAllEmployees()
    {

        echo "\e[32m";
        echo "************ PREDGLED ZAPOSLENIKA ************\n\n";

        $mask = "|%5.5s |%-15s | %-15s | %-15s| %-15s| %-15s\n";
        printf($mask, 'ID', 'Ime', 'Prezime', 'Datum rođenja', 'Spol', 'Primanja');

        foreach($this->employeeStorage->getEmployees() as $key => $singleUser)
        {
            printf($mask, $key, $singleUser['name'], $singleUser['lastname'],  $singleUser['birth'], $singleUser['gender'], $singleUser['income']);
        }
        echo "\e[0m";
    }

    public function displayOneEmployees($id)
    {

        $singleUser = $this->employeeStorage->getEmployee($id);

        echo "\e[32m";
        echo "********** PREGLED ".$singleUser['name']." ". $singleUser['lastname']."***********\n\n";
        echo "Ime: ".$singleUser['name']."\n";
        echo "Prezime: ". $singleUser['lastname']."\n";
        echo "Datum rođenja: ". $singleUser['birth']."\n";
        echo "Spol: ". $singleUser['gender']."\n";
        echo "Primanja: ". $singleUser['income']."\n";

        echo "\e[0m";
    }





}