<html>
<head>
	<title>購物車</title>
	<meta name="Author" content="P.H.Peng">
	<link rev="made" href="mailto:U0424012@smail.nuu.edu.tw">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8;">
	<style type="text/css">
	</style>
</head>
<body background="/bg.png">
<font size="6"><center>購物車</center></font>
<hr>
<?php
	$member_account  = @$_COOKIE["member_account"];
	$member_password = @$_COOKIE["member_password"];

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

	$sql = "SELECT MAX(item_id) FROM item";//取得id
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_row($result);
	$amount = $row[0];

	for($i=1;$i<=$amount;$i++){
		$buy = "buy_".$i;
		if( $buy = @$_POST[$buy]){
			${"buy_".$i} = $buy;

		}
	}

	echo "<table border=1>";
	echo "<tr>";
	echo "<td><center><font size=5>編號	</font></center></td>";
	echo "<td><center><font size=5>名稱	</font></center></td>";
	echo "<td><center><font size=5>圖片	</font></center></td>";
	echo "<td><center><font size=5>單價	</font></center></td>";
	echo "<td><center><font size=5>數量	</font></center></td>";
	echo "<td><center><font size=5>餅皮	</font></center></td>";
	echo "<td><center><font size=5>起司加量(+80)</font></center></td>";
	echo "</tr>";

	$sql = "Select * From item";
	$result = mysqli_query($conn,$sql);

	$id		= $_POST['id'];

	echo "<form name=form method=post action=checkorder.php>";
	echo "<input type=hidden name=id value=$id>";

	while($row = mysqli_fetch_row($result)){
		if( @${"buy_".$row[0]} ){
			++$amount;
			echo "<tr>";
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
			echo "<td><center><font size=5>".${'buy_'.$row[0]}."</font></center></td>";
			echo "<td><center><font size=5><select name=kind_$row[0]>
				<option value=0>鬆厚</option>
				<option value=1>薄脆</option>
				<option value=2>芝心(+80)</option></select></font></center></td>";
			echo "<td><center><font size=5><input type=checkbox name=cheese_$row[0]></font></center></td>";
			echo "<input type=hidden name=buy_$row[0] value=${'buy_'.$row[0]}>";
			echo "</tr>";
		}
	}

	echo "</table>";

	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

	echo "<button type=submit onclick=Check(event) style=font-size:20pt;width:160px;height:50px>送出資料</button>";
	echo "</form>";
	
	echo "<br><button onclick=history.go(-1);>回上一頁</button>";
	mysqli_close($conn);

?>
<hr>
	<center><table>
		<tr><td><center>彭稟皓 (Ping-Hao Peng)</center></td></tr>
		<tr><td><center>國立聯合大學 資訊工程學系, Computer Science and Information Engineering, National United University</center></td></tr>
		<tr><td><center>Email：<a href="mailto:U0424012@smail.nuu.edu.tw">U0424012@smail.nuu.edu.tw</center></a></td></tr>
	</table></center>
</body>
</html>