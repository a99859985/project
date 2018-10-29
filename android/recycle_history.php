<?php

  include 'config.php';

  $return = "";

  if(isset($_POST['id'])){

    $return = "recycle_history_false";

    $id  = $_POST['id'];

    $sql = "SELECT * FROM `recycle_form` WHERE `recycle_member_id` = '$id' ";

    $result = mysqli_query($conn,$sql);

    while($row = mysqli_fetch_row($result)){
        $return = $return."recycle_history_true$row[0]+$row[2]+$row[3]+";
    }

  }
  echo $return;
?>