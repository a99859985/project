<?php

  include 'config.php';

  $return = "";

  if(isset($_POST['username']) && isset($_POST['password'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM member WHERE  member_username = '$username'";

    $result = mysqli_query($conn,$sql);

    if($row = mysqli_fetch_row($result)){
      $return = "register_used";
    }
    elseif($username=="" || $password==""){
      $return = "null";
    }
    else{
      $sql = "INSERT INTO `member` (`member_id`, `member_username`, `member_password`) VALUES (NULL, '$username', '$password')";
      $result = mysqli_query($conn,$sql);
      $sql = "SELECT * FROM member WHERE  member_username = '$username'";
      $result = mysqli_query($conn,$sql);
      if($row = mysqli_fetch_row($result)){
        $return = "register_true";
      }
    }
  }
  echo $return;

?>