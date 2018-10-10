<html>
<head>
	<title>成立訂單</title>
	<meta name="Author" content="P.H.Peng">
	<link rev="made" href="mailto:U0424012@smail.nuu.edu.tw">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<style type="text/css">
	</style>
</head>
<body background="/bg.png">
<font size="6"><center>成立訂單</center></font>
<hr>
<?php

	$member_account  = @$_COOKIE["member_account"];
	$member_password = @$_COOKIE["member_password"];
	
	$db_server = "localhost";
	$db_name   = "pizza";
	$db_user   = "Ben";
	$db_passwd = "99859985";

	if(@$conn=mysqli_connect($db_server,$db_user,$db_passwd)){
		#echo "資料庫連線成功<br>";
	}
	else{
		die("資料庫連線失敗<br>");
	}

	if(@mysqli_select_db($conn,$db_name)){
		#echo "資料庫使用成功<br>";
	}
	else{
		die("無法使用資料庫<br>");
	}

	mysqli_query($conn,"SET NAMES UTF8");
	
	$id = $_POST['id'];

	$sql = "Select * From member";
	$result = mysqli_query($conn,$sql);
	while($row = mysqli_fetch_row($result)){
		if($id==$row[0]){
			$name = $row[3];
			break;
		}
	}

	$total	=	$_POST['total'];
	$note	=	$_POST['note'];
	$way	=	$_POST['way'];

	$sql = "SELECT MAX(order_id) FROM order_form";//取得id
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_row($result);
	$order_id = $row[0]+1;

	$amount = $_POST['amount'];

	for($i=1;$i<=$amount;++$i){

		$item_id_temp = "item_id_".$i;
		$item_id	=	$_POST[$item_id_temp];

		$item_name_temp = "item_name_".$i;
		$item_name	=	$_POST[$item_name_temp];

		$price_temp = "price_".$i;
		$price	=	$_POST[$price_temp];

		$quantity_temp = "quantity_".$i;
		$quantity	=	$_POST[$quantity_temp];

		$subtotal_temp = "subtotal_".$i;
		$subtotal	=	$_POST[$subtotal_temp];

		$kind_temp	= "kind_".$i;
		$kind		=	$_POST[$kind_temp];

		$cheese_temp = "cheese_".$i;
		$cheese		=	$_POST[$cheese_temp];

		$addorder = "INSERT INTO `order_form` (`order_id`, `order_member_id`, `order_member_name`,
		 `order_item_id`, `order_item_name`, `order_item_price`, `order_quantity`, `order_subtotal`, `order_total`,
		  `order_time`, `order_status`, `order_kind`, `order_cheese`, `order_note`, `order_way`) 
		  VALUES ('$order_id', '$id', '$name', '$item_id', '$item_name', '$price', '$quantity', '$subtotal', '$total',NULL, '0', '$kind', '$cheese', '$note', '$way')";

		if(mysqli_query($conn,$addorder)){
			
		}
		else{
			die("訂購失敗<br>");
		}

	}
	echo "訂購成功<br>";
	echo "<button onclick=history.go(-2);>回上一頁</button>";

	mysqli_close($conn);
?>
</body>
</html>