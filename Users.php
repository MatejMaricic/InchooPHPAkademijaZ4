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
        return (isset($gender) && in_array($gender, array('M','Ž','m','ž', 'Z','z'))) ? true : false;
    }

    public function validateNumber($number){
        return (is_numeric($number)) ? true : false;
    }





}