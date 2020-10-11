<?php
  Interface Account {
    public function register ($pdo);
    public function login($pdo);
    public function changePassword($pdo);
    public function logout ($pdo);
  }

  class User implements Account
  {

    function __construct(argument)
    {

    }
    public function register ($pdo){

    }
    public function login($pdo){
      
    }
    public function changePassword($pdo){

    }
    public function logout ($pdo){

    }
  }

 ?>
