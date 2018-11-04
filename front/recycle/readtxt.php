<html>
<head>
	<title>智慧回收系統</title>
	<meta name="Author" content="P.H.Peng">
	<link rev="made" href="mailto:U0424012@smail.nuu.edu.tw">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<style type="text/css">
	</style>
</head>
<body background="/bg.png">
<font size="6"><center>讀檔</center></font>
<hr>
<?php
//$myfile = fopen("../../recycling/result1.txt", "r") or die("Unable to open file!");
$myfile = fopen("http://120.105.129.165/recycling/return1.txt", "r") or die("Unable to open file!");
$txt= fgets($myfile);
if($txt=='0')
{
	echo "<script>var msg = '回收錯誤';window.alert(msg);</script>";
}
else if($txt=='1')
{
	echo "<script>var msg = '塑膠類回收成功';window.alert(msg);</script>";
}
else if($txt=='2')
{
	echo "<script>var msg = '玻璃類回收成功';window.alert(msg);</script>";
}
else if($txt=='3')
{
	echo "<script>var msg = '紙類回收成功';window.alert(msg);</script>";
}
else if($txt=='4')
{
	echo "<script>var msg = '金屬類回收成功';window.alert(msg);</script>";
}
else if($txt=='5')
{
	echo "<script>var msg = '回收失敗';window.alert(msg);</script>";
}

echo"<meta content='0.1; url=checkrecycle.php' http-equiv='refresh'>";
fclose($myfile);

?>

</body>
</html>