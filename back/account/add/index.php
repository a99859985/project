<html>
<head>
	<title>新增會員</title>
	<meta name="Author" content="P.H.Peng">
	<link rev="made" href="mailto:U0424012@smail.nuu.edu.tw">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<style type="text/css">
	</style>
</head>
<body background="/bg.png">
<font size="6"><center>新增會員</center></font>
<hr>
<?php 

	$control_account  = @$_COOKIE["control_account"];
	$control_password = @$_COOKIE["control_password"];

	if( $control_account=="Ben" && $control_password=="99859985"){

	}
	else{
		die("權限錯誤<br>");
	}
?>
<form name="form" method="post" action="addaccount.php">
	<center>
	<table>
		<tr><LI><font size="3">帳號:</font><input type="text"		name="account"	maxlength="30"	required="required"></LI></tr><br>
		<tr><LI><font size="3">密碼:</font><input type="password"	name="password"	maxlength="30"	required="required"></LI></tr><br>
		<tr><LI><font size="3">姓名:</font><input type="text"		name="name"		maxlength="30"	required="required"></LI></tr><br>
		<tr><LI><font size="3">姓別:</font>
		<input type="radio" name="sex" value="男" required="required"><font size="3">男</font>
		<input type="radio"	name="sex" value="女" required="required"><font size="3">女</font>
		</LI></tr><br>
		<tr><LI><font size="3">電話:</font><input type="text"		name="phone"	maxlength="10"	required="required"></LI></tr><br>
		<tr><LI><font size="3">地址:</font><input type="text"		name="address"	maxlength="100"	></LI></tr><br>
		<tr><LI><font size="3">信箱:</font><input type="text"		name="email"	maxlength="50"	></LI></tr><br>
		<tr><button name="submit" type="submit" />送出</button></tr>
	</table>
	<button onclick=history.go(-1);>回上一頁</button>
	</center>

</form>
</body>
</html>