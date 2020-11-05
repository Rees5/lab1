<?php
  Interface Account {
    public function register ($pdo);
    public function login($pdo);
    public function changePassword($pdo,$user_password,$new_user_password);
    public function logout ($pdo);
  }

  class User implements Account
  {
    protected $user_name;
    protected $user_email;
    protected $user_city;
    protected $user_image;
    protected $user_password;

    //default constructor
    function __construct($user_email,$user_password)
    {
       $this->user_email=$user_email;
       $this->user_password=$user_password;
    }
    //setters
    public function setCity($user_city){
      $this->user_city=$user_city;
    }
    public function setName($user_name){
        $this->user_name=$user_name;
    }
    public function setImage($user_image){
      $this->user_image=$user_image;
    }
    //getters
    public function getUser($pdo,$user_email){
      try{
        $stmt = $pdo->prepare("SELECT * FROM user_table WHERE user_email=?");
        $stmt->execute([$user_email]);
        $row = $stmt->fetch();
        $row;
      } catch (PDOException $e) {
        return $e->getMessage();
      }
    }
    public function register ($pdo){
      //hash password
      $passwordHash = password_hash($this->user_password,PASSWORD_DEFAULT);
      //read image attributes
        $file_name=$this->user_image['name'];
        $file_temp_location=$this->user_image['tmp_name'];
        //read file extension
        $file_type=substr($file_name,strpos($file_name,'.'),strlen($file_name));
        $file_path="assets/";
        $new_name=time().$file_type;
        if(move_uploaded_file($file_temp_location,$file_path.$new_name)){
          try {
            $stmt=$pdo->prepare("INSERT INTO user_table (user_name,user_email,user_city,user_image,user_password)VALUES (?,?,?,?,?)");
            $stmt->execute([$this->user_name,$this->user_email,$this->user_city,$new_name,$passwordHash]);
            $stmt = null;
            return "success";
          } catch (PDOException $e) {
            return $e->getMessage();
          }
        } else{
          return "Image not uploaded. Try again";
        }

    }
    public function login($pdo){
      try {
                $stmt = $pdo->prepare("SELECT * FROM user_table WHERE user_email=?");
                $stmt->execute([$this->user_email]);
                $row = $stmt->fetch();
                if($row == null){
                	return "Account does not exist";
                }
                if (password_verify($this->user_password,$row['user_password'])){
                	return "success";
                }
                return "Your username or password is not correct";
            } catch (PDOException $e) {
            	return $e->getMessage();
            }

    }
    public function changePassword($pdo,$user_password,$new_user_password){

    }
    public function logout ($pdo){

    }
  }

 ?>
