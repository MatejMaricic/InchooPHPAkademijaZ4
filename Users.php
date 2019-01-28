<?php

class Users
{
    protected $employeeStorage;

    public function __construct()
    {
       $this->employeeStorage = EmployeesStorage::getInstance() ;
    }

    public function validateString($data){
        return ( !isset( $data ) || ctype_alpha(str_replace(' ', '', $data)) === false ) ? false : true;
    }

    public function validateInput( $data, $key ){

        if($key === 'name'){
            return $this->validateString( $data );
        } elseif($key === 'lastname'){
            return $this->validateString( $data );
        }
        return true;

    }



}