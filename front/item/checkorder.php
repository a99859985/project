<html>
<head>
	<title>確認訂單</title>
	<meta name="Author" content="P.H.Peng">
	<link rev="made" href="mailto:U0424012@smail.nuu.edu.tw">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8;">
	<style type="text/css">
	</style>
</head>
<body background="/bg.png">
<font size="6"><center>確認訂單</center></font>
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
		$kind = "kind_".$i;
		if( $kind = @$_POST[$kind]){
			${"kind_".$i} = $kind;
		}
		$cheese = "cheese_".$i;
		if( $cheese = @$_POST[$cheese]){
			${"cheese_".$i} = $cheese;
		}
	}

	echo "<table border=1>";
	echo "<tr>";
	echo "<td><center><font size=5>編號	</font></center></td>";
	echo "<td><center><font size=5>名稱	</font></center></td>";
	echo "<td><center><font size=5>圖片	</font></center></td>";
	echo "<td><center><font size=5>單價	</font></center></td>";
	echo "<td><center><font size=5>餅皮	</font></center></td>";
	echo "<td><center><font size=5>起司加量	</font></center></td>";
	echo "<td><center><font size=5>數量	</font></center></td>";
	echo "<td><center><font size=5>小計	</font></center></td>";
	echo "</tr>";

	$sql = "Select * From item";
	$result = mysqli_query($conn,$sql);

	$id		= $_POST['id'];
	$total	= 0;
	$amount = 0;

	echo "<form name=form method=post action=order.php>";
	echo "<input type=hidden name=id value=$id>";

	while($row = mysqli_fetch_row($result)){
		if( @${"buy_".$row[0]} ){
			++$amount;
			echo "<tr>";
			echo "<td><center><font size=5>".$row[0]."</font></center></td>";
			echo "<input type=hidden name=item_id_$amount value=$row[0]>";
			echo "<td><center><font size=5>".$row[1]."</font></center></td>";
			echo "<input type=hidden name=item_name_$amount value=$row[1]>";
			if($row[4]){
				$timestamp = time();
				echo "<td><center><img src=/images/$row[4]?$timestamp height='100' width='100'>​</center></td>";
			}
			else{
				echo"<td><center>本商品無圖片</center></td>";
			}
			echo "<td><center><font size=5>".$row[2]."</font></center></td>";
			echo "<input type=hidden name=price_$amount value=$row[2]>";
			echo "<td><center><font size=5>";
			if(@${'kind_'.$row[0]}==1){
				$kind = 1;
				echo "薄脆餅皮";
			}
			elseif(@${'kind_'.$row[0]}==2){
				$kind = 2;
				echo "芝心餅皮<br>";
				echo "+80";
			}
			else{
				$kind = 0;
				echo "鬆厚餅皮";
			}
			echo "</font></center></td>";
			echo "<input type=hidden name=kind_$amount value=$kind>";
			echo "<td><center><font size=5>";
			if(@${'cheese_'.$row[0]}){
				$cheese = 1;
				echo "起司加量<br>";
				echo "+80";
			}
			else{
				$cheese = 0;
				echo "無加量";
			}
			echo "</font></center></td>";
			echo "<input type=hidden name=cheese_$amount value=$cheese>";
			echo "<td><center><font size=5>".${'buy_'.$row[0]}."</font></center></td>";
			echo "<input type=hidden name=quantity_$amount value=${'buy_'.$row[0]}>";
			$subtotal = ${'buy_'.$row[0]}*$row[2];
			if(@${'kind_'.$row[0]}==2){
				$subtotal+=80*${'buy_'.$row[0]};
			}
			if(@${'cheese_'.$row[0]}){
				$subtotal+=80*${'buy_'.$row[0]};
			}
			echo "<td><center><font size=5>".$subtotal."</font></center></td>";
			echo "<input type=hidden name=subtotal_$amount value=$subtotal>";	
			echo "</tr>";
			$total += $subtotal;
		}
	}

	echo "</table>";
	echo "<font size=5>備註:</font><br>";
	echo "<textarea  type=textarea   name=note  maxlength=200 rows=5 cols=30></textarea><br>";
	echo "<input type=radio name=way value=0><font size=5>外帶</font>";
	echo "<input type=radio name=way value=1><font size=5>外送</font><br>";
	echo "<font size=6>總金額:".$total."</font>";
	echo "<input type=hidden name=total value=$total>";
	echo "<input type=hidden name=amount value=$amount>";

	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

	echo "<button type=submit onclick=Check(event) style=font-size:20pt;width:150px;height:50px>確認購買</button>";
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
<script>
	function Check(event){
		if(!confirm("您確定要送出訂單嗎?")){
			event.preventDefault();
		}
	}
</script>