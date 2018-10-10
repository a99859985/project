<html>
<head>
	<title>修改會員資料</title>
	<meta name="Author" content="P.H.Peng">
	<link rev="made" href="mailto:U0424012@smail.nuu.edu.tw">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<style type="text/css">
	</style>
</head>
<body background="/bg.png">
<font size="6"><center>修改會員資料</center></font>
<hr>
<?php

	$member_account  = @$_COOKIE["member_account"];
	$member_password = @$_COOKIE["member_password"];

	if(!$member_account){
		die("權限錯誤<br>");
	}
	else{
		
	}
	
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
	
	$id			=	$_POST['id'];
	$password	=	$_POST['password'];
	$name		=	$_POST['name'];
	$phone		=	$_POST['phone'];
	$address	= 	$_POST['address'];
	$email		=	$_POST['email'];

	$sql = "UPDATE `member` SET `password`='$password', `name`='$name',
	`phone`='$phone', `address`='$address', `email`='$email' WHERE `member`.`id`=$id";


	if(mysqli_query($conn,$sql)){
		echo "修改會員資料成功<br>";
	}
	else{
		die("修改會員資料失敗<br>");
	}

	mysqli_close($conn);
?>
</body>
</html>