<html>
<head>
	<title>修改商品</title>
	<meta name="Author" content="P.H.Peng">
	<link rev="made" href="mailto:U0424012@smail.nuu.edu.tw">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<style type="text/css">
	</style>
</head>
<body background="/bg.png">
<font size="6"><center>修改商品</center></font>
<hr>
<?php

	$control_account  = @$_COOKIE["control_account"];
	$control_password = @$_COOKIE["control_password"];

	if( $control_account=="Ben" && $control_password=="99859985"){

	}
	else{
		die("權限錯誤<br>");
	}
	
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
	
	$id			=	$_POST['id'];
	$name		=	$_POST['name'];
	$price		=	$_POST['price'];
	$info		=	$_POST['info'];
	$status		=	$_POST['status'];

	$sql = "UPDATE `item` SET `item_name`='$name', `item_price`='$price', `item_info`='$info', `item_status`='$status' 
	WHERE `item`.`item_id`=$id";


	if(mysqli_query($conn,$sql)){
		echo "修改商品成功<br>";
		echo "<button onclick=history.go(-2);>回上一頁</button>";
	}
	else{
		echo "修改商品失敗<br>";
		echo "<button onclick=history.go(-2);>回上一頁</button>";
		die();
	}

	mysqli_close($conn);
?>
</body>
</html>