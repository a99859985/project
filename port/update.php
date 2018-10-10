<?php

  include 'config.php';

  $return = "";

  if(isset($_POST['id']) ){

    $id = $_POST['id'];

    if($money = @$_POST['money']){
      $sql = "UPDATE `member` SET `member_money` = '$money' WHERE `member`.`member_id` = $id";
      mysqli_query($conn,$sql);
    }
    if($point = @$_POST['point']){
      $sql = "UPDATE `member` SET `member_point` = '$point' WHERE `member`.`member_id` = $id";
      mysqli_query($conn,$sql);
    }
    
    $sql = "SELECT * FROM `member` WHERE `member_id` = '$id'";

    $result = mysqli_query($conn,$sql);
    
    if($row = mysqli_fetch_row($result)){
      $return = "update_true+$row[3]+$row[4]"; 
    }
  }
  echo $return;

?>