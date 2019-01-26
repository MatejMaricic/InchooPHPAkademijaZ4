<?php

class UserAction extends Employees {



    public function addUser(){


            foreach ($this->employeeList as $key => $singleUser) {


                $data[$key] = readline("$singleUser : ");

            }
            $this->employees[] = $data;



    }


    public function addMultipleUsers()
    {
        $this->addUser();

        while (true)
        {
            echo "Želite li unjeti novog zaposlenika? da/ne ";
        if (readline() !== 'da'){
            break;
        }else
        {
            $this->addUser();

        }

        }
    }
    public function getUser(){
        print_r($this->employees);
    }


}
