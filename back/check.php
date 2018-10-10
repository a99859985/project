		<html>
<head>
	<title>身分確認</title>
	<meta name="Author" content="P.H.Peng">
	<link rev="made" href="mailto:U0424012@smail.nuu.edu.tw">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<style type="text/css">
	</style>
</head>
<body background="/bg.png">
<font size="6"><center>身分確認</center></font>
<hr>
<?php 
	$control_account  = @$_COOKIE["control_account"];
	$control_password = @$_COOKIE["control_password"];
	if(@$control_account=="Ben" && @$control_password=="99859985"){
		header("Location:index.php");
	}
?>
<form name="form" method="post" action="index.php">
	<center>
	<table>
		<tr><LI><font size="3">帳號:</font><input type="text"	  name="control_account"  maxlength="30" required="required"></LI></tr><br>
		<tr><LI><font size="3">密碼:</font><input type="password" name="control_password" maxlength="30" required="required"></LI></tr><br>
		<tr><button name="submit" type="submit" />送出</button></tr>
	</table>
	</center>
</form>
<hr>
	<center><table>
		<tr><td><center>專題成員:  U0424012 彭稟皓 、 U0424011 彭稟皓 、U0424041 徐代晏 、U0424043 徐宏昌 </center></td></tr>
		<tr><td><center>指導教授:  江緣貴 教授</center></td></tr>
		<tr><td><center>國立聯合大學 資訊工程學系, Computer Science and Information Engineering, National United University</center></td></tr>
	</table></center>
</body>
</html>