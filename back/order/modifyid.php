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
	
	$id	=	$_POST['id'];

	$sql = "SELECT * FROM item where item_id= $id";

	$result = mysqli_query($conn,$sql);

	$row = mysqli_fetch_row($result);

	echo "<form name=form method=post action=modifyorder.php>";
	echo "<center>";
	echo "<input type=hidden name=id value=$id>";

	echo "<select name=status>";
	echo "<option value=0>處理中</option>";
	echo "<option value=1>烘烤中</option>";
	echo "<option value=2>已完成</option>";
	echo "<option value=3>外送中</option>";
	echo "</select>";

	echo "<button name=submit type=submit />送出</button>";

	echo "</form><br>";


	mysqli_close($conn);
?>
</body>
</html>
