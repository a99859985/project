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

	$sql = "SELECT * FROM member where id= $id";

	$result = mysqli_query($conn,$sql);

	$row = mysqli_fetch_row($result);

	echo "<form name=form method=post action=modifyaccount.php>";
	echo "<center>";
	echo "<table>";
	echo "<input type=hidden name=id value=$id>";
	echo "<tr><LI><font size=3>帳號:</font><input type=text		name=account	value=$row[1] disabled=disabled></LI></tr><br>";
	echo "<tr><LI><font size=3>密碼:</font><input type=password	name=password	value=$row[2] maxlength=30 required=required></LI></tr><br>";
	echo "<tr><LI><font size=3>姓名:</font><input type=text		name=name		value=$row[3] maxlength=30 required=required></LI></tr><br>";
	echo "<tr><LI><font size=3>姓別:</font>";
	if($row[4]=="男"){
		echo "<input type=radio name=sex value=男	disabled=disabled	checked=checked	><font size=3>男</font>";
		echo "<input type=radio	name=sex value=女	disabled=disabled					><font size=3>女</font>";
	}
	else{
		echo "<input type=radio name=sex value=男	disabled=disabled					><font size=3>男</font>";
		echo "<input type=radio	name=sex value=女	disabled=disabled	checked=checked	><font size=3>女</font>";
	}
	echo "</LI></tr><br>";
	echo "<tr><LI><font size=3>電話:</font><input type=text		name=phone		value=$row[5] maxlength=10 required=required></LI></tr><br>";
	if($row[6]==NULL){
		echo "<tr><LI><font size=3>地址:</font><input type=text	name=address	maxlength=100 ></LI></tr><br>";
	}
	else{
		echo "<tr><LI><font size=3>地址:</font><input type=text	name=address	maxlength=100 value=$row[6]></LI></tr><br>";
	}
	if($row[7]==NULL){
		echo "<tr><LI><font size=3>信箱:</font><input type=text	name=email		maxlength=100 ></LI></tr><br>";
	}
	else{
		echo "<tr><LI><font size=3>信箱:</font><input type=text	name=email		maxlength=100 value=$row[7]></LI></tr><br>";
	}
	if($row[8]==0){
		echo "<input type=radio name=status value=0	checked=checked	><font size=3>啟用</font>";
		echo "<input type=radio	name=status value=1					><font size=3>停用</font>";
	}
	else{
		echo "<input type=radio name=status value=0					><font size=3>啟用</font>";
		echo "<input type=radio	name=status value=1	checked=checked	><font size=3>停用</font>";
	}
	echo "</LI></tr><br><br>";
	echo "<tr><button name=submit type=submit />送出</button></tr>";
	echo "</table>";
	echo "</form>";
	echo "</center>";

	echo "<center><button onclick=history.go(-1);>回上一頁</button></center>";

	mysqli_close($conn);
?>
</body>
</html>