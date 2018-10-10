<html>
<head>
	<title>上傳圖片</title>
	<meta name="Author" content="P.H.Peng">
	<link rev="made" href="mailto:U0424012@smail.nuu.edu.tw">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<style type="text/css">
	</style>
</head>
<body background="/bg.png">
<font size="6"><center>上傳圖片</center></font>
<hr>
<?php

	$control_account  = @$_COOKIE["control_account"];
	$control_password = @$_COOKIE["control_password"];

	if( $control_account=="Ben" && $control_password=="99859985"){

	}
	else{
		die("權限錯誤<br>");
	}

	$id = $_POST['id'];

	echo "<form name=form method=post action=modifyimage.php enctype=multipart/form-data>";
	echo "<center>";
	echo "<input type=hidden name=id value=$id>";
	echo "<font size=3>上傳圖片:</font><input type=file name=image accept='.jpg,.jpeg,.png'><br><br>";
	echo "<button name=submit type=submit>送出</button>";
	echo "</center>";
	echo "</form>";
?>
</body>
</html>