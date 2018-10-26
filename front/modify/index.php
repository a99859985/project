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

	$member_username  = @$_COOKIE["member_username"];
	$member_password = @$_COOKIE["member_password"];

	if($member_username){

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
	$id	=	$_POST['id'];

	$sql = "SELECT * FROM member where member_id= $id";
	
	$result = mysqli_query($conn,$sql);

	$row = mysqli_fetch_row($result);

	echo "<form name=form method=post action=modifyaccount.php>";
	echo "<center>";
	echo "<table>";
	echo "<input type=hidden name=id value=$id>";
	echo "<tr><LI><font size=3>帳號:</font><input type=text		name=member_username	value=$row[1]   disabled=disabled  ></LI></tr><br>";
	echo "<tr><LI><font size=3>密碼:</font><input type=text	name=member_password	 value=$row[2]     maxlength=30 required=required></LI></tr><br>";
	echo "<tr><LI><font size=3>密碼確認:</font><input type=text	name=member_passwordconfirm	 value=''   maxlength=30 required=required></LI></tr><br>";
	echo "<tr><button name=submit type=submit />送出</button></tr>";
	echo "</table>";
	echo "</center>";
	echo "</form>";

	mysqli_close($conn);
?>
</body>
</html>