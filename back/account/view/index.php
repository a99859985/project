<html>
<head>
	<title>查詢會員</title>
	<meta name="Author" content="P.H.Peng">
	<link rev="made" href="mailto:U0424012@smail.nuu.edu.tw">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<style type="text/css">
	</style>
</head>
<body background="/bg.png">
<font size="6"><center>查詢會員</center></font>
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

	$sql = "Select * From member";
	$result = mysqli_query($conn,$sql);

	$member_username	= @$_POST['account'];
	$member_password	= @$_POST['password'];
	$member_money		= @$_POST['money'];
	$member_point		= @$_POST['point'];
	
	
	echo "<form name=form method=post action=>";
	echo "<font size=4>按條件搜尋: </font><br>";
	echo "<font size=3>帳號: </font><input type=text		 name=account	value='$member_username'	maxlength=30  >&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<font size=3>密碼: </font><input type=password	 name=password	value='$member_password'	maxlength=30  >&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<font size=3>現金: </font><input type=text		 name=money		value='$member_money'		maxlength=30  >&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<font size=3>點數: </font><input type=text		 name=point		value='$member_point'		maxlength=10  >&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<button name=submit type=submit />送出</button>";
	echo "</form>";

	echo "<table border=1>";
	echo "<tr>";
	echo "<td><center><font size=5>ID	</font></center></td>";
	echo "<td><center><font size=5>帳號	</font></center></td>";
	echo "<td><center><font size=5>密碼	</font></center></td>";
	echo "<td><center><font size=5>現金	</font></center></td>";
	echo "<td><center><font size=5>點數	</font></center></td>";
	echo "<td><center><font size=5>是否停用</font></center></td>";
	echo "</tr>";

	while($row = mysqli_fetch_row($result)){
		if( ($member_username	== NULL || ($member_username	!= NULL && strpos($row[1],$member_username)	!== false)) &&
			($member_password	== NULL || ($member_password	!= NULL && strpos($row[2],$member_password)!== false)) &&
			($member_money	== NULL || ($member_money	!= NULL && strpos($row[3],$member_money)	!== false)) &&
			($member_point		== NULL || ($member_point	!= NULL && strpos($row[4],$member_point)		!== false)) ){
			echo "<tr>";
			echo "<td><font size=5>".$row[0]."</font></td>";
			echo "<td><font size=5>".$row[1]."</font></td>";
			echo "<td><font size=5>".$row[2]."</font></td>";
			echo "<td><font size=5>".$row[3]."</font></td>";
			echo "<td><font size=5>".$row[4]."</font></td>";
			if($row[5]==1){
				echo "<td><font size=5 color=red>已停用</font></td>";
			}
			else{
				echo "<td><font size=5 color=green>使用中</font></td>";
			}
			echo "</tr>";
		}
		
	}
	echo "</table>";
	echo "<button onclick=history.go(-1);>回上一頁</button>";
	mysqli_close($conn);
?>
</body>
</html>