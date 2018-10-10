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
	echo "<td><center><font size=5>餅皮種類	</font></center></td>";
	echo "<td><center><font size=5>起司加量	</font></center></td>";
	echo "<td><center><font size=5>訂購數量	</font></center></td>";
	echo "<td><center><font size=5>小計		</font></center></td>";
	echo "<td><center><font size=5>總金額	</font></center></td>";
	echo "<td><center><font size=5>備註		</font></center></td>";
	echo "<td><center><font size=5>送貨方式	</font></center></td>";
	echo "<td><center><font size=5>訂購時間	</font></center></td>";
	echo "<td><center><font size=5>訂單狀況	</font></center></td>";
	echo "<td><center><font size=5>修改	</font></center></td>";
	echo "</tr>";

	$temp = 0;

	echo "<form name=form method=post action=modifyid.php>";
	while($row = mysqli_fetch_row($result)){
		echo "<tr>";
		if($temp!=$row[0]){
			if($temp+1 == $row[0] && $row[7] != $row[8]){
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
		echo "<td><center><font size=5>";
		if($row[11]==1){
			echo "薄脆餅皮";
		}
		elseif($row[11]==2){
			echo "芝心餅皮(+80)";
		}
		else{
			echo "鬆厚餅皮";
		}
		echo "</font></center></td>";
		echo "<td><center><font size=5>";
		if($row[12]==1){
			echo "起司加量(+80)";
		}
		else{
			echo "無加量";
		}
		echo "<td><center><font size=5>".$row[6]."</font></center></td>";
		echo "<td><center><font size=5>".$row[7]."</font></center></td>";
		if($temp!=$row[0]){
			if($row[7] != $row[8]){
				echo "<td style=border-bottom-style:NONE><center><font size=5>".$row[8]."</font></center></td>";
				echo "<td style=border-bottom-style:NONE><center><font size=5>".$row[13]."</font></center></td>";
				if($row[14]==0){
					echo "<td style=border-bottom-style:NONE><center><font size=5>外帶</font></center></td>";
				}
				else{
					echo "<td style=border-bottom-style:NONE><center><font size=5>外送</font></center></td>";
				}
				echo "<td style=border-bottom-style:NONE><center><font size=5>".$row[9]."</font></center></td>";
				if($row[10]==0){
					echo "<td style=border-bottom-style:NONE><center><font size=5>處理中</font></center></td>";
				}
				elseif($row[10]==1){
					echo "<td style=border-bottom-style:NONE><center><font size=5>烘烤中</font></center></td>";
				}
				elseif($row[10]==2){
					echo "<td style=border-bottom-style:NONE><center><font size=5>已完成</font></center></td>";
				}
				else{
					echo "<td style=border-bottom-style:NONE><center><font size=5>外送中</font></center></td>";
				}
				echo "<td style=border-bottom-style:NONE><center><button name=id type = submit value=$row[0]>修改</button></center></td>";
			}
			else{
				echo "<td><center><font size=5>".$row[8]."</font></center></td>";
				echo "<td><center><font size=5>".$row[13]."</font></center></td>";
				if($row[14]==0){
					echo "<td><center><font size=5>外帶</font></center></td>";
				}
				else{
					echo "<td><center><font size=5>外送</font></center></td>";
				}
				echo "<td><center><font size=5>".$row[9]."</font></center></td>";
				if($row[10]==0){
					echo "<td><center><font size=5>處理中</font></center></td>";
				}
				elseif($row[10]==1){
					echo "<td><center><font size=5>烘烤中</font></center></td>";
				}
				elseif($row[10]==2){
					echo "<td><center><font size=5>已完成</font></center></td>";
				}
				else{
					echo "<td><center><font size=5>外送中</font></center></td>";
				}
				echo "<td><center><button name=id type = submit value=$row[0]>修改</button></center></td>";
			}
		}
		else{
			if($temp == $row[0]){
				echo "<td style=border-top-style:NONE;border-bottom-style:NONE></td>";
				echo "<td style=border-top-style:NONE;border-bottom-style:NONE></td>";
				echo "<td style=border-top-style:NONE;border-bottom-style:NONE></td>";
				echo "<td style=border-top-style:NONE;border-bottom-style:NONE></td>";
				echo "<td style=border-top-style:NONE;border-bottom-style:NONE></td>";
				echo "<td style=border-top-style:NONE;border-bottom-style:NONE></td>";
			}
			else{
				echo "<td style=border-top-style:NONE></td>";
				echo "<td style=border-top-style:NONE></td>";
				echo "<td style=border-top-style:NONE></td>";
				echo "<td style=border-top-style:NONE></td>";
				echo "<td style=border-top-style:NONE></td>";
				echo "<td style=border-top-style:NONE></td>";
			}
		}

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