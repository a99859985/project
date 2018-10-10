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
	
	$member_id			=	$_POST['id'];
	$member_password	=	$_POST['password'];
	$member_point		=	$_POST['point'];
	$member_money		=	$_POST['money'];
	$member_disable		=	$_POST['disable'];

	$sql = "UPDATE `member` SET `member_password`='$member_password', `member_point`='$member_point', `member_money`='$member_money'
	, `member_disable`='$member_disable' WHERE `member`.`member_id`=$member_id";


	if(mysqli_query($conn,$sql)){
		echo "修改會員資料成功<br>";
		echo "<button onclick=history.go(-2);>回上一頁</button>";
	}
	else{
		echo "修改會員資料失敗<br>";
		echo "<button onclick=history.go(-2);>回上一頁</button>";
		die();
	}

	mysqli_close($conn);
?>
</body>
</html>