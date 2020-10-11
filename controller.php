<?php
    include_once 'user.php';
    include_once 'db.php';

    $con = new DBConnector();
    $pdo = $con->connectToDB();

    $event = $_POST['event'];
    if($event == "register"){
        //register
        $user_email = $_POST['email'];
        $username = $_POST['fname'];
        $password = $_POST['password'];
        $user_city = $_POST['city'];
        $image=$_FILES['photo'];
        $user = new User($user_name,$user_email,$user_city,$user_image,$user_password);
        echo $user->register($pdo);
    }else {
        //login
        $user_email = $_POST['username'];
        $user_password = $_POST['password'];
        $user = new User($user_email, $user_password);
        echo $user->login($pdo);
    }
?>
