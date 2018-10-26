<html>
<head>
	<title>上傳圖片</title>
	<meta name="Author" content="P.H.Peng">
	<link rev="made" href="mailto:U0424012@smail.nuu.edu.tw">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<style type="text/css">
	</style>
</head>
<body background="/bg.png">
<font size="6"><center>上傳圖片</center></font>
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

	if	($_FILES["image"]["error"]){
		echo "檔案上傳錯誤<br>";
		echo "<button onclick=history.go(-2);>回上一頁</button>";
		die();
	}
	else{
		$ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);//取得副檔名
		if($ext == "png" || $ext == "jpg" || $ext == "jpeg"){
			echo "圖片上傳成功<br>";
		}
		else{
			echo "副檔名錯誤<br>";
			echo "<button onclick=history.go(-2);>回上一頁</button>";
			die();
		}
	}

	$id = $_POST['id'];

	move_uploaded_file($_FILES["image"]["tmp_name"],"D:/xampp/htdocs/images/".$id.".".$ext);

	$ext = $id.".".$ext;

	$sql = "UPDATE `item` SET `item_img`='$ext' WHERE `item`.`item_id`=$id";

	mysqli_query($conn,$sql);

	echo "<button onclick=history.go(-2);>回上一頁</button>";

	mysqli_close($conn);
?>

</body>
</html>