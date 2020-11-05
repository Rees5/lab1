<?php
  require_once '../../config.php';
  $link=connect();
  if(!isset($_SESSION)) {session_start();}
  date_default_timezone_set('Africa/Nairobi');
echo "dgt1";
if(isset($_SESSION['user_email'])){
  if(isset($_SESSION['shopping_cart'])){
    echo "dgt";
    $mail=$_SESSION['user_email'];
    //serialize cart
    $cart2 = serialize($_SESSION['shopping_cart']);
    if(isset($_SESSION['stercart'])){
      $cart=$_SESSION['stercart'];

    } else{
      $cart = serialize($_SESSION['shopping_cart']);
    }
    $sql1="select * from order_table where product_array='".$cart ."' and customer_id='".$mail."'";
    echo $sql1;
    $results = mysqli_query($link, $sql1);
    if(mysqli_num_rows($results) < 1){
      $sql="insert into  order_table(product_array,customer_id,status,shippedBy,shippedOn,date) values('".$cart2."','".$mail."','Placed','','','".date('Y-m-d H:i:s')."')";
    } else{
      if(isset($_SESSION['stercart'])){
      $sql="update order_table set product_array='".$cart2."',status='Placed' where product_array='".$_SESSION['stercart']."' and customer_id='".$mail."' and status='inorder'";
    }
    }
    echo $sql;
    if(!empty($sql)){
    if(setData($sql)=="success"){
      unset($_SESSION['shopping_cart']);
      unset($_SESSION['stercart']);
      echo '<script>alert("Order Placed!");location.replace("../myorders.php");</script>';

    } else{
      echo '<script>alert("Failed! '.mysqli_error($link).'");location.replace("index.php");</script>';
    }
  }


  } else{
    echo '<script>alert("No Products in cart!")</script>';
    //header("location:index.php");
  }
}
  else {
    echo "You are not logged in";
  }
  ?>
