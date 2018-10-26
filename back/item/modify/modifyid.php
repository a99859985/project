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

	$sql = "SELECT * FROM item where item_id= $id";

	$result = mysqli_query($conn,$sql);

	$row = mysqli_fetch_row($result);

	echo "<center>";
	echo "<form name=form method=post action=modifyitem.php>";
	echo "<input type=hidden name=id value=$id>";
	echo "<LI><font size=3>名稱:</font><input type=text		name=name	value=$row[1] required=required></LI><br>";
	echo "<LI><font size=3>價格:</font><input type=text		name=price	value=$row[2] maxlength=30 required=required></LI><br>";
	echo "<LI><font size=3>介紹:</font><textarea  type=textarea   name=info maxlength=100 rows=5 cols=30 >$row[3]</textarea></LI><br>";
	if($row[5]==0){
		echo "<input type=radio name=status value=0	checked=checked	><font size=3>上架</font>";
		echo "<input type=radio	name=status value=1					><font size=3>下架</font>";
	}
	else{
		echo "<input type=radio name=status value=0					><font size=3>上架</font>";
		echo "<input type=radio	name=status value=1	checked=checked	><font size=3>下架</font>";
	}
	echo "</LI><br><br>";
	echo "<button name=submit type=submit />送出</button>";
	echo "</form><br>";

	echo "<center>";
	echo "<form name=form2 method=post action=modifyimageid.php>";
	echo "<button name=id type=submit value=$id>重新上傳圖片</button>";
	echo "</form>";

	echo "<form name=form3 method=post action=delimage.php>";
	echo "<button name=id type=submit value=$id onclick=Check(event)>刪除圖片</button>";
	echo "</form>";
	echo "</center>";

	echo "<center><button onclick=history.go(-1);>回上一頁</button></center>";

	mysqli_close($conn);
?>
</body>
</html>
<script>
	function Check(event){
		if(!confirm("您確定要刪除圖片嗎?")){
			event.preventDefault();
		}
	}
</script>