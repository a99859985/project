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

	$sql = "Select * From member";
	$result = mysqli_query($conn,$sql);

	echo "<table border=1>";
	echo "<tr>";
	echo "<td><center><font size=5>修改	</font></center></td>";
	echo "<td><center><font size=5>ID	</font></center></td>";
	echo "<td><center><font size=5>帳號	</font></center></td>";
	echo "<td><center><font size=5>密碼	</font></center></td>";
	echo "<td><center><font size=5>姓名	</font></center></td>";
	echo "<td><center><font size=5>性別	</font></center></td>";
	echo "<td><center><font size=5>電話	</font></center></td>";
	echo "<td><center><font size=5>地址	</font></center></td>";
	echo "<td><center><font size=5>email</font></center></td>";
	echo "<td><center><font size=5>是否停用</font></center></td>";
	echo "</tr>";

	echo "<form name=form method=post action=modifyid.php>";
	while($row = mysqli_fetch_row($result)){
		echo "<tr>";
		echo "<td><center><button name=id type = submit value=$row[0]>修改</button></center></td>";
		echo "<td><font size=5>".$row[0]."</font></td>";
		echo "<td><font size=5>".$row[1]."</font></td>";
		echo "<td><font size=5>".$row[2]."</font></td>";
		echo "<td><font size=5>".$row[3]."</font></td>";
		echo "<td><font size=5>".$row[4]."</font></td>";
		echo "<td><font size=5>".$row[5]."</font></td>";
		echo "<td><font size=5>".$row[6]."</font></td>";
		echo "<td><font size=5>".$row[7]."</font></td>";
		if($row[8]==1){
			echo "<td><font size=5 color=red>已停用</font></td>";
		}
		else{
			echo "<td><font size=5 color=green>使用中</font></td>";
		}
		echo "</tr>";
	}
	echo "</table>";
	echo "</form>";
	echo "<button onclick=history.go(-1);>回上一頁</button>";
	mysqli_close($conn);
?>
</body>
</html>