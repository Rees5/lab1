<?php
  Interface Account {
    public function register ($pdo);
    public function login($pdo);
    public function changePassword($pdo);
    public function logout ($pdo);
  }

  class User implements Account
  {

    function __construct()
    {

    }
    public function register ($pdo,$user_name,$user_email,$user_city,$user_image,$user_password){
      try {
      $stmt=$pdo->prepare("INSERT INTO company (user_name,user_email,user_city,user_image,user_password)VALUES (?,?,?,?,?)");
      $stmt->execute([$user_name,$user_email,$user_city,$user_image,$user_password]);
      $stmt = null;
      return "Account has been created.";
    } catch (PDOException $e) {
      return $e->getMessage();
    }
    }
    public function login($pdo,$user_name,$user_password){

    }
    public function changePassword($pdo,$user_password,$new_user_password){

    }
    public function logout ($pdo){

    }
  }

 ?>
