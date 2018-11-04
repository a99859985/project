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

	$member_username = @$_COOKIE["member_username"];
	$member_password = @$_COOKIE["member_password"];

	if(!$member_username){
		die("權限錯誤<br>");
	}
	else{
		
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
	$member_password	=	$_POST['member_password'];
	$member_passwordconfirm	=	$_POST['member_passwordconfirm'];
	if(strlen($member_password)>=6){
		if ($member_password==$member_passwordconfirm){
			$sql = "UPDATE `member` SET `member_password`='$member_password' WHERE `member`.`member_id`=$member_id";
			if(mysqli_query($conn,$sql)){
				echo "<script>var msg = '修改會員資料成功';window.alert(msg);</script>";   
	            echo"<meta content='0.1; url=../../logout.php' http-equiv='refresh'>";
			}
			else{
				echo "<script>var msg = '修改會員資料失敗';window.alert(msg);</script>";
	            echo"<meta content='0.1; url=../../logout.php' http-equiv='refresh'>";
			}
		}
		else{
			echo "<script>var msg = '密碼確認失敗';window.alert(msg);</script>";
	        echo"<meta content='0.1; url=../../logout.php' http-equiv='refresh'>";
		}
	}
	else{
		echo "<script>var msg = '密碼最少需要6個字';window.alert(msg);</script>";
	    echo"<meta content='0.1; url=../../logout.php' http-equiv='refresh'>";
	}

	mysqli_close($conn);
?>
</body>
</html>