<?php

  include 'config.php';

  $return = "";

  if(isset($_POST['member_id']) && isset($_POST['item_id']) && isset($_POST['pay_way']) ){

    $return = "buy_false";

    $member_id  = $_POST['member_id'];
    $item_id    = $_POST['item_id'];
    $pay_way    = $_POST['pay_way'];

    $member = "";
    $item   = "";
	$money  = 0;
    $point  = 0;
    $price  = 0;

    $sql = "SELECT * FROM `member` WHERE `member_id` = '$member_id' ";

    $result = mysqli_query($conn,$sql);

    if($row = mysqli_fetch_row($result)){
    	$member = $row[1];
        $money  = $row[3];
        $point  = $row[4];
    }
    
    mysqli_query($conn,"set names 'UTF8'");

    $sql = "SELECT * FROM `item` WHERE `item_id` = '$item_id' ";

    $result = mysqli_query($conn,$sql);

    if($row = mysqli_fetch_row($result)){
    	$item  = $row[1];
        $price = $row[2];
    }

    if($pay_way == 0){
    	if($money >= $price){
    		$money -= $price;
    		
            $sql = "UPDATE `member` SET `member_money`='$money' WHERE `member`.`member_id`=$member_id";
            mysqli_query($conn,$sql);

            $sql = "INSERT INTO `order_form` (`order_id`, `order_member_id`, `order_member`, `order_item_id`,
            `order_item`, `order_price`, `order_way`, `order_time`) VALUES ( NULL, '$member_id', '$member',
            '$item_id', '$item', '$price', '$pay_way', NULL)";
            mysqli_query($conn,$sql);

            $return = "buy_true";
    	}
    }
    else if($pay_way == 1){
        if($point >= $price){
    		$point -= $price;
            $sql = "UPDATE `member` SET `member_point`='$point' WHERE `member`.`member_id`=$member_id";
            mysqli_query($conn,$sql);

            $sql = "INSERT INTO `order_form` (`order_id`, `order_member_id`, `order_member`, `order_item_id`,
            `order_item`, `order_price`, `order_way`, `order_time`) VALUES ( NULL, '$member_id', '$member',
            '$item_id', '$item', '$price', '$pay_way', NULL)";
            mysqli_query($conn,$sql);

            $return = "buy_true";
    	}
    }

  }
  echo $return;
?>