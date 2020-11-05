<?php include('../config.php');session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    if(isset($_GET['q'])){
      $id=$_GET['q'];
      $typ=$_GET['typ'];
      if($typ=='disp'){
        $sql="update orders set status='In Transit' where order_no='".$id."'";
      } elseif($typ=='done'){
        $sql="update orders set status='Delivered',shippedOn='".date('Y-m-d H:i:s')."' where order_no='".$id."'";
      } else if($typ=='place'){
        $sql="update orders set status='Placed' where order_no='".$id."'";
        unset($_SESSION['shopping_cart']);
      }
      updateData($sql);
      if(isset($_SESSION['role'])){
      if($_SESSION['role']=='1'){
              header("location: orderpage.php");
      }else if($_SESSION['role']=='2'){
              header("location: myorders.php");
      }
      exit;
      }
    }
     ?>
  </body>
</html>
