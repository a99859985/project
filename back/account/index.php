<html>
<head>
	<title>會員管理</title>
	<meta name="Author" content="P.H.Peng">
	<link rev="made" href="mailto:U0424012@smail.nuu.edu.tw">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<style type="text/css">
	</style>
</head>
<body background="/bg.png">
<font size="6"><center>會員管理</center></font>
<hr>
<?php

	$control_account  = @$_COOKIE["control_account"];
	$control_password = @$_COOKIE["control_password"];

	if( $control_account=="Ben" && $control_password=="99859985"){

	}
	else{
		die("權限錯誤<br>");
	}
?>
	<center><table style="line-height:40px;" border="0">
	<UL>
		<tr><td><LI><font size="5"><a href="view">	查詢會員</a></font></LI></td></tr>
		<tr><td><LI><font size="5"><a href="modify">修改會員資料</a></font></LI></td></tr>
		<tr><td><LI><font size="5"><a href="add">	新增會員</a></font></LI></td></tr>
	</UL>
	</table></center>
	<center><button onclick=history.go(-1);>回上一頁</button></center>
	<br>
<hr>
	<center><table>
		<tr><td><center>專題成員:  U0424012 彭稟皓 、 U0424011 彭稟皓 、U0424041 徐代晏 、U0424043 徐宏昌 </center></td></tr>
		<tr><td><center>指導教授:  江緣貴 教授</center></td></tr>
		<tr><td><center>國立聯合大學 資訊工程學系, Computer Science and Information Engineering, National United University</center></td></tr>
	</table></center>
</body>
</html>
