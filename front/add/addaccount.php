<html>
<head>
	<title>會員註冊</title>
	<meta name="Author" content="P.H.Peng">
	<link rev="made" href="mailto:U0424012@smail.nuu.edu.tw">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<style type="text/css">
	</style>
</head>
<body background="/bg.png">
<font size="6"><center>會員註冊</center></font>
<hr>
<?php

	$db_server	=	"localhost";
	$db_name	=	"project";
	$db_user	=	"Ben";
	$db_passwd	=	"99859985";


	if(@$conn=mysqli_connect($db_server,$db_user,$db_passwd)){
		#echo "連接成功<br>";
	}
	else{
		die("連接失敗<br>");
	}
	
	if(@mysqli_select_db($conn,$db_name)){
		#echo "資料庫使用成功<br>";
	}
	else{
		die("無法使用資料庫<br>");
	}

	$member_username	=	$_POST['member_username'];
	$member_password	=	$_POST['member_password'];
	$member_password_confirm	=	$_POST['password_confirm'];

	mysqli_query($conn,"SET NAMES UTF8");

	if($member_password==$member_password_confirm){
		$adduser = "INSERT INTO `member` (`member_id`, `member_username`, `member_password`,`member_point`,`member_money`, `member_disable`)
					VALUES (NULL,'$member_username','$member_password',0,0,0)";

		if(strlen($member_password)>=6){
			$sql = "Select * From member";
			$result = mysqli_query($conn,$sql);
			while($row = mysqli_fetch_row($result)){
				if($row[1] == $member_username){
		        	$used = 1;
				}
				else{
					$used = 0;
				}
			}
			if($used==1){
				echo "<script>var msg = '帳號已使用';window.alert(msg);</script>";
		        echo"<meta content='0.1; url=../../logout.php' http-equiv='refresh'>";
			}
			else{
				if(mysqli_query($conn,$adduser)){
					echo "<script>var msg = '會員註冊成功';window.alert(msg);</script>";
				    echo"<meta content='0.1; url=../../logout.php' http-equiv='refresh'>";
				}
				else{
					echo "<script>var msg = '會員註冊失敗';window.alert(msg);</script>";
				    echo"<meta content='0.1; url=../../logout.php' http-equiv='refresh'>";
				}
			}
		}
		else{
			echo "<script>var msg = '密碼最少需要6個字';window.alert(msg);</script>";
	        echo "<meta content='0.1; url=../../logout.php' http-equiv='refresh'>";
		}
	}
	else{
		echo "<script>var msg = '確認密碼錯誤';window.alert(msg);</script>";
        echo"<meta content='0.1; url=../../logout.php' http-equiv='refresh'>";
	}

	

	mysqli_close($conn);

?>
</body>
</html>
