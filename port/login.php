<?php

  include 'config.php';

  $return = "";

  if(isset($_POST['username']) && isset($_POST['password'])){

    $return = "login_false";

    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username=="" || $password==""){
      $return = "null";
    }

    $sql = "SELECT * FROM `member` WHERE `member_username` = '$username' AND `member_password` = '$password'";

    $result = mysqli_query($conn,$sql);

    if($row = mysqli_fetch_row($result)){
      $return = "login_true+$row[0]"; 
    }
  }
  echo $return;

?>