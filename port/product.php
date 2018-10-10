<?php

  include 'config.php';

  $return = "";

  $sql = "SELECT * FROM `item`";

  $result = mysqli_query($conn,$sql);

  while($row = mysqli_fetch_row($result)){
    if($row[5]=="1"){
      continue;
    }
    $return = $return."item_true$row[0]+$row[1]+$row[2]+$row[4]+";
  }

  echo $return;

?>