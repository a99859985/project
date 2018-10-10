<?php

  include 'config.php';

  $return = "";

  if(isset($_POST['id'])){

    $return = "buy_history_false";

    $id  = $_POST['id'];

    $sql = "SELECT * FROM `order_form` WHERE `order_member_id` = '$id' ";

    $result = mysqli_query($conn,$sql);

    while($row = mysqli_fetch_row($result)){
        $return = $return."buy_history_true$row[0]+$row[2]+$row[4]+$row[5]+$row[6]+$row[7]+";
    }

  }
  echo $return;
?>