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
	$db_name   = "project";
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
			$name = $row[1];
			$money= $row[3];
			$point= $row[4];
			break;
		}
	}

	$total	=	$_POST['total'];
	$way	=	$_POST['way'];
	$sql = "SELECT MAX(order_id) FROM order_form";//取得id
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_row($result);
	$order_id = $row[0]+1;

	$amount = $_POST['amount'];
	//echo "$id $total $way $amount";
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
		if($way==0 && $money<$price){
			echo "<script>var msg = '很抱歉，您的現金不足';window.alert(msg);</script>";
        	echo"<meta content='0.1; url=index.php' http-equiv='refresh'>";
		}
		elseif ($way==1 && $point<$price) {
			echo "<script>var msg = '很抱歉，您的點數不足';window.alert(msg);</script>";
        		echo"<meta content='0.1; url=index.php' http-equiv='refresh'>";
		}
		else{
			if ($way==0){
				$money=$money-$price;
				$pay = "UPDATE `member` SET `member_money`='$money' WHERE `member`.`member_id`=$id";
			}
			elseif ($way==1) {
				$point=$point-$price;
				$pay = "UPDATE `member` SET `member_point`='$point' WHERE `member`.`member_id`=$id";
			}
			$addorder = "INSERT INTO `order_form` (`order_id`, `order_member_id`, `order_member`,
			 `order_item_id`, `order_item`, `order_price`, `order_way`,`order_time`) 
			  VALUES ('$order_id', '$id', '$name', '$item_id', '$item_name', '$price', '$way',NULL)";

			if(mysqli_query($conn,$addorder) && mysqli_query($conn,$pay)){
				echo "<script>var msg = '訂購成功';window.alert(msg);</script>";
        		echo"<meta content='0.1; url=index.php' http-equiv='refresh'>";
			}
			else{
				echo "<script>var msg = '購買失敗';window.alert(msg);</script>";
        		echo"<meta content='0.1; url=index.php' http-equiv='refresh'>";
			}
		}

	}
	

	mysqli_close($conn);
?>
</body>
</html>