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

    <form id="accesspanel" method="post" action="contoller.php">
      <h1 id="litheader">Login</h1>
      <div class="inset">
        <p>
          <input type="text" name="email" id="email" placeholder="Email address">
        </p>
        <p>
          <input type="password" name="password" id="password" placeholder="Password">
        </p>
        <div style="text-align: center;">
          <div class="checkboxouter">
            <input type="checkbox" name="rememberme" id="remember" value="Remember">
            <label class="checkbox"></label>
          </div>
          <label for="remember">Remember me</label>
        </div>
        <input class="loginLoginValue" type="hidden" name="service" value="login" />
      </div>

      <p class="p-container">
        <input type="submit" name="Login" id="go" value="Login" onclick="check()"><br>

      </p>
      <p class="p-container">New? Register <a href="register.php">here</a></p>
    </form>
  </body>
</html>
