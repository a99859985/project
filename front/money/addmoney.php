<html>
<head>
	<title>儲值</title>
	<meta name="Author" content="P.H.Peng">
	<link rev="made" href="mailto:U0424012@smail.nuu.edu.tw">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<style type="text/css">
	</style>
</head>
<body background="/bg.png">
<font size="6"><center>儲值</center></font>
<hr>
<?php

	$member_username  = @$_COOKIE["member_username"];
  	$member_password = @$_COOKIE["member_password"];
/*
	if( $control_account=="Ben" && $control_password=="99859985"){

	}
	else{
		die("權限錯誤<br>");
	}*/
	
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
	$member_money		=	$_POST['money'];

	$member_money=$member_money+100;

	$sql = "UPDATE `member` SET   `member_money`='$member_money'
	 WHERE `member`.`member_id`=$member_id";


	if(mysqli_query($conn,$sql)){
		echo "<script>var msg = '儲值成功';window.alert(msg);</script>";
        echo"<meta content='0.1; url=../modify/membercenter.php' http-equiv='refresh'>";
	}
	else{
		echo "<script>var msg = '儲值失敗';window.alert(msg);</script>";
        echo"<meta content='0.1; url=../modify/membercenter.php' http-equiv='refresh'>";
		
	}

	mysqli_close($conn);
?>
</body>
</html>