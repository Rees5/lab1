<?php
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
        echo $user->register($pdo);
    }else {
        //login
        $user_email = $_POST['username'];
        $user_password = $_POST['password'];
        $user = new User($user_email, $user_password);
        echo $user->login($pdo);
    }
?>
