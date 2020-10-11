<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/styles.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="js/scripts.js"></script>
  </head>
  <body>
    <div class="background-wrap">
      <div class="background"></div>
    </div>
    <form id="accesspanel" enctype="multipart/form-data" method="post" action="contoller.php">
      <h1 id="litheader">Register</h1>
      <div class="inset">
        <p>
          <input type="text" name="fname" id="fname" placeholder="Name">
        </p>
        <p>
          <input type="email" name="email" id="email" placeholder="Email address">
        </p>
        <p>
          <input type="text" name="city" id="city" placeholder="City of Residence">
        </p>

        <p>
          <label for="photo" class="btn">Profile Photo</label><br>
          <input type="file" name="photo" id="bannerImg">
          <div id="res"></div>
          <div style="display:none"><img src="" id="tableBanner" /></div>
        </p>
        <p>
          <input type="password" name="password" id="password" placeholder="Password">
        </p>
        <input class="loginLoginValue" type="hidden" name="service" value="register" />
      </div>
      <p class="p-container">
        <button type="button" name="button" onclick="store()">Register</button>
        <p name="Login" id="go" value="Register"></p>
      </p>
      <p class="p-container">Registered? Login <a href="login.html">here</a></p>
    </form>
  </body>
</html>
