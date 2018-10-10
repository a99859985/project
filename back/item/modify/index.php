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

	$sql = "Select * From item";
	$result = mysqli_query($conn,$sql);

	$name	= @$_POST['name'];
	$price1	= @$_POST['price1'];
	$price2	= @$_POST['price2'];
	$info	= @$_POST['info'];
	$id		= @$_POST['id'];

	echo "<form name=form method=post action=>";
	echo "<font size=4>按條件搜尋: </font><br>";
	echo "<input type=hidden name=id value=$id>";
	echo "<font size=3>名稱: </font><input type=text	name=name	value='$name'	maxlength=10  >&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<font size=3>介紹: </font><input type=text	name=info	value='$info'	maxlength=100 ><br>";
	echo "<font size=3>價格: </font><input type=text	name=price1	value='$price1'	maxlength=10  >";
	echo "<font size=3>至	 </font><input type=text	name=price2	value='$price2'	maxlength=10  ><br>";
	echo "<button name=submit type=submit />送出</button>";
	echo "</form>";

	echo "<table border=1>";
	echo "<tr>";
	echo "<td><center><font size=5>修改	</font></center></td>";
	echo "<td><center><font size=5>商品編號	</font></center></td>";
	echo "<td><center><font size=5>商品名稱	</font></center></td>";
	echo "<td><center><font size=5>商品圖片	</font></center></td>";
	echo "<td><center><font size=5>商品價格	</font></center></td>";
	echo "<td><center><font size=5>商品介紹	</font></center></td>";
	echo "<td><center><font size=5>是否下架	</font></center></td>";
	echo "</tr>";

	echo "<form name=form method=post action=modifyid.php>";
	while($row = mysqli_fetch_row($result)){
		if( ($name	== NULL || ($name	!= NULL && strpos($row[1],$name)	!== false)) &&
			($price1== NULL || ($price1	!= NULL && $row[2]>=$price1			!== false)) &&
			($price2== NULL || ($price2	!= NULL && $row[2]<=$price2			!== false)) &&
			($info	== NULL || ($info	!= NULL && strpos($row[3],$info)	!== false)) ){
			echo "<tr>";
			echo "<td><center><button name=id type = submit value=$row[0]>修改</button></center></td>";
			echo "<td><center><font size=5>".$row[0]."</font></center></td>";
			echo "<td><center><font size=5>".$row[1]."</font></center></td>";
			if($row[4]){
				$timestamp = time();
				echo "<td><center><img src=/images/$row[4]?$timestamp height='100' width='100'>​</center></td>";
			}
			else{
				echo"<td><center>本商品無圖片</center></td>";
			}
			echo "<td><center><font size=5>".$row[2]."</font></center></td>";
			echo "<td><center><font size=5>".$row[3]."</font></center></td>";
			if($row[5]==1){//已下架
				echo "<td><center><font size=5 color=red>已下架</font></center></td>";
			}
			else{
				echo "<td><center><font size=5 color=green>販售中</font></center></td>";
			}
			echo "</tr>";
		}
		
	}
	echo "</table>";
	echo "</form>";
	echo "<button onclick=history.go(-1);>回上一頁</button>";
	mysqli_close($conn);
?>
</body>
</html>