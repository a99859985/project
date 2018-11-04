<html>
<head>
	<title>後端首頁</title>
	<meta name="Author" content="P.H.Peng">
	<link rev="made" href="mailto:U0424012@smail.nuu.edu.tw">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<style type="text/css">
	</style>
</head>
<body background="/bg.png">
<font size="6"><center>後端首頁</center></font>
<hr>
<?php 
	
	if(@$_POST['control_account']){
        $control_account  = @$_POST['control_account'];
        $control_password = @$_POST['control_password'];
        setcookie("control_account",$control_account,time()+3600);
        setcookie("control_password",$control_password,time()+3600);
        header('Location: index.php');
	}
	else{
		$control_account  = @$_COOKIE["control_account"];
		$control_password = @$_COOKIE["control_password"];
	}

	if( $control_account=="Ben" && $control_password=="99859985"){
		
	}
	else{
		die("權限錯誤<br>");
	}

	echo "<center><table style=line-height:40px; border=0>";
	echo "<UL>";
	echo"<tr><td><LI><font size=5><a href=account>會員管理</a></font></LI></td></tr>";
	echo"<tr><td><LI><font size=5><a href=item>商品管理</a></font></LI></td></tr>";
	echo"<tr><td><LI><font size=5><a href=order>訂單管理</a></font></LI></td></tr>";
	echo"<tr><td><LI><font size=5><a href=recycle>回收管理</a></font></LI></td></tr>";
	echo"<tr><td><center><a href=logout.php>登出</a></center></td></tr>";
	echo "</UL>";
	echo "</table></center>";
	


 ?>
<hr>
	<center><table>
		<tr><td><center>專題成員:  U0424012 彭稟皓 、 U0424011 林豐禾 、U0424041 徐代晏 、U0424043 徐宏昌 </center></td></tr>
		<tr><td><center>指導教授:  江緣貴 教授</center></td></tr>
		<tr><td><center>國立聯合大學 資訊工程學系, Computer Science and Information Engineering, National United University</center></td></tr>
	</table></center>
</body>
</html>