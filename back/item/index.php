<html>
<head>
	<title>商品管理</title>
	<meta name="Author" content="P.H.Peng">
	<link rev="made" href="mailto:U0424012@smail.nuu.edu.tw">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<style type="text/css">
	</style>
</head>
<body background="/bg.png">
<font size="6"><center>商品管理</center></font>
<hr>
<?php 

	$control_account  = @$_COOKIE["control_account"];
	$control_password = @$_COOKIE["control_password"];

	if( $control_account=="Ben" && $control_password=="99859985"){

	}
	else{
		die("權限錯誤<br>");
	}

	echo "<center><table style=line-height:40px; border=0>";
	echo "<UL>";
	echo"<tr><td><LI><font size=5><a href=add>新增商品</a></font></LI></td></tr>";
	echo"<tr><td><LI><font size=5><a href=modify>修改商品</a></font></LI></td></tr>";
	echo "</UL>";
	echo "</table></center>";
	echo "<center><button onclick=history.go(-1);>回上一頁</button></center>";

 ?>
<hr>
	<center><table>
		<tr><td><center>彭稟皓 (Ping-Hao Peng)</center></td></tr>
		<tr><td><center>國立聯合大學 資訊工程學系, Computer Science and Information Engineering, National United University</center></td></tr>
		<tr><td><center>Email：<a href="mailto:U0424012@smail.nuu.edu.tw">U0424012@smail.nuu.edu.tw</center></a></td></tr>
	</table></center>
</body>
</html>