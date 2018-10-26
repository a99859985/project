<html>
<head>
	<title>修改訂單</title>
	<meta name="Author" content="P.H.Peng">
	<link rev="made" href="mailto:U0424012@smail.nuu.edu.tw">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<style type="text/css">
	</style>
</head>
<body background="/bg.png">
<font size="6"><center>修改訂單</center></font>
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

	$sql = "Select * From order_form";
	$result = mysqli_query($conn,$sql);


	echo "<table border=2>";
	echo "<tr>";
	echo "<td><center><font size=5>訂單編號	</font></center></td>";
	echo "<td><center><font size=5>會員編號	</font></center></td>";
	echo "<td><center><font size=5>會員名稱	</font></center></td>";
	echo "<td><center><font size=5>商品編號	</font></center></td>";
	echo "<td><center><font size=5>商品名稱	</font></center></td>";
	echo "<td><center><font size=5>商品單價	</font></center></td>";
	echo "<td><center><font size=5>購買方式		</font></center></td>";
	echo "<td><center><font size=5>訂購時間	</font></center></td>";
	echo "</tr>";

	$temp = 0;

	echo "<form name=form method=post action=modifyid.php>";
	while($row = mysqli_fetch_row($result)){
		echo "<tr>";
		if($temp!=$row[0]){
			if($temp+1 == $row[0] ){
				echo "<td style=border-bottom-style:NONE><center><font size=5>".$row[0]."</font></center></td>";
				echo "<td style=border-bottom-style:NONE><center><font size=5>".$row[1]."</font></center></td>";
				echo "<td style=border-bottom-style:NONE><center><font size=5>".$row[2]."</font></center></td>";
			}
			else{
				echo "<td><center><font size=5>".$row[0]."</font></center></td>";
				echo "<td><center><font size=5>".$row[1]."</font></center></td>";
				echo "<td><center><font size=5>".$row[2]."</font></center></td>";
			}
		}
		else{
			if($temp == $row[0]){
				echo "<td style=border-top-style:NONE;border-bottom-style:NONE></td>";
				echo "<td style=border-top-style:NONE;border-bottom-style:NONE></td>";
				echo "<td style=border-top-style:NONE;border-bottom-style:NONE></td>";
			}
			else{
				echo "<td style=border-top-style:NONE></td>";
				echo "<td style=border-top-style:NONE></td>";
				echo "<td style=border-top-style:NONE></td>";
			}
		}
		echo "<td><center><font size=5>".$row[3]."</font></center></td>";
		echo "<td><center><font size=5>".$row[4]."</font></center></td>";
		echo "<td><center><font size=5>".$row[5]."</font></center></td>";
		if($row[6]=="0"){
			echo "<td><center><font size=5>現金</font></center></td>";
		}
		else{
			echo "<td><center><font size=5>點數</font></center></td>";
		}
		echo "<td><center><font size=5>".$row[7]."</font></center></td>";
		echo "</tr>";
		$temp = $row[0];
	}
	echo "</table>";
	echo "</form>";
	echo "<button onclick=history.go(-1);>回上一頁</button>";
	mysqli_close($conn);
?>
</body>
</html>