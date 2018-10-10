<html>
<head>
	<title>新增商品</title>
	<meta name="Author" content="P.H.Peng">
	<link rev="made" href="mailto:U0424012@smail.nuu.edu.tw">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<style type="text/css">
	</style>
</head>
<body background="/bg.png">
<font size="6"><center>新增商品</center></font>
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
<form name="form" method="post" action="additem.php" enctype="multipart/form-data">
	<center>
	<table>
		<tr><LI><font size="3">名稱:</font><input 	  type="text"		name="name"	 maxlength="10"	required="required"></LI></tr><br>
		<tr><LI><font size="3">價格:</font><input 	  type="text"		name="price" maxlength="10"	required="required"></LI></tr><br>
		<tr><LI><font size="3">介紹:</font><textarea  type="textarea"   name="info"  maxlength="100" rows="5" cols="30"></textarea></LI></tr><br>
		<tr><LI><font size="3">上傳圖片:</font><input type="file"		name="image" accept=".jpg,.jpeg,.png"></LI></tr><br>
		<tr><button name="submit" type="submit" />送出</button></tr>
	</table>
	</center>
	<center><button onclick=history.go(-1);>回上一頁</button></center>
</form>
</body>
</html>