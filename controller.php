<?php
    session_start();
    include_once 'user.php';
    include_once 'db.php';

    $con = new DBConnector();
    $pdo = $con->connectToDB();

    $event = $_POST['event'];
    if($event == "register"){
        //register
        $user_email = $_POST['email'];
        $user_name = $_POST['fname'];
        $user_password = $_POST['password'];
        $user_city = $_POST['city'];
        $user_image=$_FILES['photo'];
        $user = new User($user_email, $user_password);
        $user->setImage($user_image);
        $user->setName($user_name);
        $user->setCity($user_city);

        if($user->register($pdo)=="success"){
          //session_start();
          $_SESSION['err']="Account Created. Fill this form to login";
          header("location:login.php");
        } else{

          $_SESSION['err']="Failed! User exists or details provided are incorrect";
          header("location:register.php");
        }
        }else {
        //login
        $user_email = $_POST['email'];
        $user_password = $_POST['password'];
        $user = new User($user_email, $user_password);

        if($user->login($pdo)=="success"){
          //session_start();
          $_SESSION['user_email']=$user_email;
          $_SESSION['user_password']=$user_password;
          header("location:index.php");
        } else {
          //session_start();
          $_SESSION['err']="Invalid credentials";
          header("location:login.php");
        }
    }
?>
