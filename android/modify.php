<?php

  include 'config.php';

  $return = "";

  if(isset($_POST['id']) ){

      $id = $_POST['id'];
      $password = $_POST['password'];

      $return = "modify_fasle";

      if($password = $_POST['password']){
          $sql = "UPDATE `member` SET `member_password` = '$password' WHERE `member`.`member_id` = $id";
          mysqli_query($conn,$sql);
          $return = "modify_true";
      }
  }
  echo $return;
?> 