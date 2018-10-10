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

	$account	= @$_POST['account'];
	$password	= @$_POST['password'];
	$name		= @$_POST['name'];
	$sex		= @$_POST['sex'];
	$phone		= @$_POST['phone'];
	$address	= @$_POST['address'];
	$email		= @$_POST['email'];
	
	echo "<form name=form method=post action=>";
	echo "<font size=4>按條件搜尋: </font><br>";
	echo "<font size=3>帳號: </font><input type=text		name=account	value='$account'	maxlength=30  >&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<font size=3>密碼: </font><input type=password	name=password	value='$password'	maxlength=30  >&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<font size=3>姓名: </font><input type=text		name=name		value='$name'		maxlength=30  >&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<font size=3>姓別:</font>";
	echo "<input type=radio name=sex value=男 ><font size=3>男</font>";
	echo "<input type=radio	name=sex value=女 ><font size=3>女</font>&nbsp;&nbsp;&nbsp;&nbsp;<br>";
	echo "<font size=3>電話: </font><input type=text		name=phone		value='$phone'		maxlength=10  >&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<font size=3>地址: </font><input type=text		name=address	value='$address'	maxlength=100 >&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<font size=3>信箱: </font><input type=text		name=email		value='$email'		maxlength=50  ><br>";
	echo "<button name=submit type=submit />送出</button>";
	echo "</form>";

	echo "<table border=1>";
	echo "<tr>";
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

	while($row = mysqli_fetch_row($result)){
		if( ($account	== NULL || ($account	!= NULL && strpos($row[1],$account)	!== false)) &&
			($password	== NULL || ($password	!= NULL && strpos($row[2],$password)!== false)) &&
			($name		== NULL || ($name		!= NULL && strpos($row[3],$name)	!== false)) &&
			($sex		== NULL || ($sex		!= NULL && strpos($row[4],$sex)		!== false)) &&
			($phone		== NULL || ($phone		!= NULL && strpos($row[5],$phone)	!== false)) &&
			($address	== NULL || ($address	!= NULL && strpos($row[6],$address)	!== false)) &&
			($email		== NULL || ($email		!= NULL && strpos($row[7],$email)	!== false)) ){
			echo "<tr>";
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
		
	}
	echo "</table>";
	echo "<button onclick=history.go(-1);>回上一頁</button>";
	mysqli_close($conn);
?>
</body>
</html>