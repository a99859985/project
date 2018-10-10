<html>
<head>
	<title>前端首頁</title>
	<meta name="Author" content="P.H.Peng">
	<link rev="made" href="mailto:U0424012@smail.nuu.edu.tw">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<style type="text/css">
	</style>
</head>
<body background="/bg.png">

<font size="6"><center>前端首頁</center></font>
<hr>
	<center><table style="line-height:40px;" border="0">
	<UL>
		
<?php 

	if(@$_POST['member_username']){//防止重複
		$member_username  = @$_POST['member_username'];
		$member_password = @$_POST['member_password'];
		setcookie("member_username",$member_username,time()+3600);
		setcookie("member_password",$member_password,time()+3600);
		header('Location: index.php');
	}
	else{
		$member_username = @$_COOKIE["member_username"];
		$member_password = @$_COOKIE["member_password"];
	}


	$member_username = @$_COOKIE["member_username"];
	$member_password = @$_COOKIE["member_password"];

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

	$sql	= "Select * From member";
	$result	= mysqli_query($conn,$sql);
	$id		= NULL;
	$name	= NULL;

	while($row = mysqli_fetch_row($result)){
		
		if($member_username==$row[1] && $member_password==$row[2] && $row[5]!=1 ){
			$id   = $row[0];
			$name = $row[1];
			break;
		}
	}

	if($id){//登入成功
		echo "<tr><td><font size=5 color=red>歡迎!</font>&nbsp;&nbsp;&nbsp;&nbsp;";
		echo "<font size=5>$name</font>&nbsp;&nbsp;&nbsp;&nbsp;";
		
		echo "<tr><td><center><a href=logout.php>登出</center></font></td></tr>";
		echo "<form name=MyForm method=post action=modify/index.php><input type=hidden name=id value=$id>";
		echo "<tr><td><LI><font size=5><a href='#' onclick=Modify()>修改會員資料</a></font></LI></td></tr></form>";
		echo "<form name=MyForm3 method=post action=item/index.php><input type=hidden name=id value=$id>";
		echo "<tr><td><LI><font size=5><a href='#' onclick=Item()>瀏覽商品</a></font></LI></td></tr></form>";
		echo "<form name=MyForm2 method=post action=order/index.php><input type=hidden name=id value=$id>";
		echo "<tr><td><LI><font size=5><a href='#' onclick=Order()>訂單查詢</a></font></LI></td></tr></form>";

	}
	else{
		if(@$_COOKIE["member_username"]){
			echo "<script>var msg = '登入失敗';window.alert(msg);</script>";
			setcookie("member_username","",time()-3600);
			setcookie("member_password","",time()-3600);
			echo "<meta http-equiv=refresh content=0.1>";
		}
		echo "<tr><td><LI><font size=5><a href=check.html>會員登入</a></font></LI></td></tr>";
		echo "<tr><td><LI><font size=5><a href=add>會員註冊</a></font></LI></td></tr>";
		echo "<tr><td><LI><font size=5><a href=item> 瀏覽商品</a></font></LI></td></tr>";
	}
	echo "</UL></table></center><br>";
	
	mysqli_close($conn);
?>

<hr>
	<center><table>
		<tr><td><center>專題成員:  U0424012 彭稟皓 、 U0424011 彭稟皓 、U0424041 徐代晏 、U0424043 徐宏昌 </center></td></tr>
		<tr><td><center>指導教授:  江緣貴 教授</center></td></tr>
		<tr><td><center>國立聯合大學 資訊工程學系, Computer Science and Information Engineering, National United University</center></td></tr>
	</table></center>
</body>
</html>

<script>
    function Modify(){
		document.forms["MyForm"].submit();
	}
	function Order(){
		document.forms["MyForm2"].submit();
	}
	function Item(){
		document.forms["MyForm3"].submit();
	}
</script>
