<?php
/*  $server="localhost";
  $uname="root";
  $pwd="";
  $db="food_web";
  $link= mysqli_connect($server,$uname,$pwd,$db);
  if(!$link){
    die("ERROR: Could not connect. " . mysqli_connect_error());
  } else{
    echo "Connected Successfully";
  }*/
  $connect = new PDO("mysql:host=localhost;dbname=lab1", "root", "");
  function connect(){
    $server="localhost";
    $uname="root";
    $pwd="";
    $db="lab1";
    $link= mysqli_connect($server,$uname,$pwd,$db) or
    die("ERROR: Could not connect. " . mysqli_connect_error());;
    return $link;
  }
  function setData($sql){
    $link=connect();
    if(mysqli_query($link,$sql)){
      $x="success";
    } else {
      $x= "Error: ".mysqli_error($link);
    }
    return $x;
  }
  function getData($sql){
    $link=connect();
    $data=mysqli_query($link,$sql);
    if($data){
      return $data;
    } else {
      echo "Error: ".mysqli_error($link);
    }
  }
  function updateData($sql){
    $link=connect();
    if(mysqli_query($link,$sql)){
      echo "Success";
      echo '<script>alert("Record Updated!");</script>';
    } else {
      echo "Error: ".mysqli_error($link);
    }
  }
  function deleteData($sql){
    $link=connect();
    if(mysqli_query($link,$sql)){
      echo "Success";
      echo '<script>alert("Record Deleted!");</script>';
    } else {
      echo "Error: ".mysqli_error($link);
    }
  }
  ?>
