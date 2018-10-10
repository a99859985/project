<?php

  include 'config.php';

  $return = "";

  if(isset($_POST['id'])){
    

    $id = $_POST['id'];

    $sql = "SELECT * FROM `member` WHERE `member_id` = '$id'";

    $result = mysqli_query($conn,$sql);

    if($row = mysqli_fetch_row($result)){
      $return = "data_true+$row[1]+$row[3]+$row[4]";
    }
  }
  echo $return;

?>