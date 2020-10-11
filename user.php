<?php
  Interface Account {
    public function register ($pdo);
    public function login($pdo);
    public function changePassword($pdo);
    public function logout ($pdo);
  }

  class User implements Account
  {
    protected $user_name,$user_email,$user_city,$user_image,$user_password;
    function __construct($user_name,$user_email,$user_city,$user_image,$user_password)
    {

    }

    function __construct($user_name,$user_email,$user_city,$user_image,$user_password)
    {

    }
    public function register ($pdo,$user_name,$user_email,$user_city,$user_image,$user_password){
      //read image attributes
        $file_name=$user_image['name'];
        $file_temp_location=$user_image['tmp_name'];
        //read file extension
        $file_type=substr($file_name,strpos($file_name,'.'),strlen($file_name));
        $file_path="assets/";
        $new_name=time().$file_type;
        if(move_uploaded_file($file_temp_location,$file_path.$new_name)){
          try {
            $stmt=$pdo->prepare("INSERT INTO company (user_name,user_email,user_city,user_image,user_password)VALUES (?,?,?,?,?)");
            $stmt->execute([$user_name,$user_email,$user_city,$new_name,$user_password]);
            $stmt = null;
            return "Account has been created.";
          } catch (PDOException $e) {
            return $e->getMessage();
          }
        } else{
          return "Image not uploaded. Try again"
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
