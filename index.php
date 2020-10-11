<?php
   session_start();
   include_once 'db.php';
   include_once 'user.php';

   $con = new DBConnector();
   $pdo = $con->connectToDB();
   if(isset($_SESSION['user_email'])){
      //$row=$user->getUser($pdo,$_SESSION['user_email']);
      $stmt = $pdo->prepare("SELECT * FROM user_table WHERE user_email=?");
      $stmt->execute([$_SESSION['user_email']]);
      $row = $stmt->fetch();
      $_SESSION['user_name']=$row["user_name"];
      $_SESSION['user_city']=$row['user_city'];
      $_SESSION['user_image']=$row['user_image'];

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="js/scripts.js"></script>
  </head>
  <body>
    <img width="240px" height="240px" src="assets/<?php echo $_SESSION['user_image']; ?>" id="pic" /><br>
    <hr>
    <p id="fname">Name: <?php if(isset($_SESSION['user_name'])){ echo $_SESSION['user_name'];} ?></p>
    <p id="email">Email: <?php if(isset($_SESSION['user_email'])){ echo $_SESSION['user_email'];} ?></p>
    <p id="city">City: <?php if(isset($_SESSION['user_city'])){ echo $_SESSION['user_city'];} ?></p>
    <p id="password"><?php if(isset($_SESSION['user_password'])){ echo $_SESSION['user_password'];} ?></p>

    <form class="">
      <input type="password" name="oldpw" id="oldpw" placeholder="Current Password">
      <input type="password" name="newpw" id="newpw" placeholder="New Password">
      <button type="button" name="button" onclick="changepw()">Change Password</button>
    </form>
    <p><a href="login.php" onclick="confirm('Are you sure you want to logout?')"><button type="button" name="button">Logout</button></a></p>
   <script type="text/javascript">
  /*  var dataImage = localStorage.getItem('photo');
    var sEmail = localStorage.getItem('email');
    var sPassword = localStorage.getItem('password');
    var sCity = localStorage.getItem('city');
    var sFname = localStorage.getItem('fname');
    picImg = document.getElementById('pic');
    picImg.src = "data:image/png;base64," + dataImage;
    document.getElementById('fname').innerHTML="Name: "+sFname;
    document.getElementById('email').innerHTML="Email: "+sEmail;
    document.getElementById('city').innerHTML="City: "+sCity;
    document.getElementById('password').innerHTML="Password: "+sPassword;*/
    </script>

<?php }else {
  $_SESSION['err']="Session expired. Login again";
  header("location:login.php");
} ?>

  </body>
</html>
