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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
input[type=text], input[type=password],input[type=email],input[type=file] {
  background: linear-gradient(#1f2124,#27292c);
  border: 1px solid #222;
  border-radius: .3em;
  box-shadow: 0 1px 0 rgba(255,255,255,0.1);
  color: #FFF;
  font-size: 13px;
  margin-bottom: 20px;
  padding: 8px 5px;
  width: 80%;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 85%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
</style>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="js/scripts.js"></script>
  </head>
  <body>
    <h2 style="text-align:left;margin-left:12px;">Profile</h2>

<div style="float:left;margin-left:12px;" class="card">
  <img src="assets/<?php echo $_SESSION['user_image']; ?>" alt="profile" style="width:100%">
  <h1><?php if(isset($_SESSION['user_name'])){ echo $_SESSION['user_name'];} ?></h1>
  <p class="title"><?php if(isset($_SESSION['user_email'])){ echo $_SESSION['user_email'];} ?></p>
  <p><?php if(isset($_SESSION['user_city'])){ echo $_SESSION['user_city'];} ?></p>
  <div style="margin: 24px 0;">
    <a href="#"><i class="fa fa-dribbble"></i></a>
    <a href="#"><i class="fa fa-twitter"></i></a>
    <a href="#"><i class="fa fa-linkedin"></i></a>
    <a href="#"><i class="fa fa-facebook"></i></a>
  </div>
  <p><a href="logout.php" onclick="confirm('Are you sure you want to logout?')"><button type="button" name="button">Sign Out</button></a></p>
</div>

  <div style="float:left;margin-left:12px;" class="card">
    <hr>
    <form class="">
      <input type="password" name="oldpw" id="oldpw" placeholder="Current Password">
      <input type="password" name="newpw" id="newpw" placeholder="New Password">
      <p><button type="button" name="button" onclick="changepw()">Change Password</button></p>
    </form>
    </div>
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
