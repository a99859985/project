<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>智慧回收系統</title>
    
    <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="pricing.css" rel="stylesheet">
</head>
<body style="background-image: url('../../../bg.png'); ">

<div class="view" style="  background-size: cover; background-position: center center; ">
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-info border-bottom shadow-sm">
      <h5 class="my-0 mr-md-auto font-weight-normal">I recycle system</h5>
      <nav class="my-2 my-md-0 mr-md-3">
      	<?php        
          $member_username  = @$_COOKIE["member_username"];
          $member_password = @$_COOKIE["member_password"];

          $db_server = "localhost";
          $db_name   = "project";
          $db_user   = "Ben";
          $db_passwd = "99859985";
          echo "<a  href='../../../index.php' class=p-2 text-dark style='color: #000000'>首頁</a>";
          if($member_username){
          echo "<a class=p-2 text-dark href='../modify/membercenter.php'  style='color:#000000'>會員中心</a>";
          }
          else{
            echo "<a class=p-2 text-dark href='../../check.php'  style='color:#000000'>會員中心</a>";
          }
          echo "<a class=p-2 text-dark href=index.php style='color: #000000'>購物中心</a>";
          echo "<a class=p-2 text-dark href='../recycle/checkrecycle.php' style='color: #000000'>回收中心</a>";
        ?>
      </nav>
      

    </div>

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-5">確認購買</h1>
      <p class="lead">I recycle system.</p>
    </div>    
	<div class="container marketing">
<?php

	$member_username  = @$_COOKIE["member_username"];
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
	
	$id		= $_POST['id'];
	$buy = $_POST['buy'];
	$sql = "SELECT * FROM member where member_id= $id";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_row($result);
       echo "<form name=form method=post action=order.php>";
		echo "<input type=hidden name=id value=$id>";
       echo"<div class=row>";
          echo"<div class=col-lg-4>";
            echo"<h2>你好，  $row[1] <br></h2>";
            echo"<h2>你擁有<br>現金:&nbsp $row[3]  <br>點數: &nbsp $row[4]<br></h2>";
          echo"</div>";
       	$sql = "Select * From item";
		$result = mysqli_query($conn,$sql);

		$sql = "SELECT MAX(item_id) FROM item where item_id=$buy";//取得id
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_row($result);
		$amount = $row[0];
		$sql = "Select * From item";
		$result = mysqli_query($conn,$sql);

		
		$total	= 0;
		$amount = 0;
	
	while($row = mysqli_fetch_row($result)){
		if($row[0]==$buy ){
			++$amount;
          echo"<div class=col-lg-4>";
            if($row[4]){
			$timestamp = time();
        	echo"<img class=rounded-circle src=/images/$row[4]?$timestamp image width=140 height=140>";
	    	}
	    	else{
			echo"<img class=rounded-circle src=../../noimg.jpg image width=140 height=140>";
			}
			
            echo"<h2>$row[0]. $row[1]</h2>";
            echo "<input type=hidden name=item_id_$amount value=$row[0]>";
			echo "<input type=hidden name=item_name_$amount value=$row[1]>";
            echo"<p>價格: $row[2]<br>介紹: $row[3]<br></p>";
            echo "<input type=hidden name=price_$amount value=$row[2]>";
            $ONE=1;
			//echo "<p>數量: $ONE<br></p>";
			echo "<input type=hidden name=quantity_$amount value=$ONE>";
			$subtotal = 1*$row[2];
			//echo "<p>小計: $subtotal<br></p>";
			echo "<input type=hidden name=subtotal_$amount value=$subtotal>";
            $total += 1*$subtotal;
          echo"</div>";
          }
    }
    	echo"<div class=col-lg-4>";
    	echo "<font size=5>付款方式:</font><br>";
		echo "<input type=radio name=way value=0 checked='true' ><font size=5>現金</font>";
		echo "<input type=radio name=way value=1  ><font size=5>點數</font><br>";
		echo "<font size=6>總金額:".$total."</font>";
		echo "<form name=form method=post action=order.php>";
		echo "<input type=hidden name=id value=$id>";
		echo "<input type=hidden name=total value=$total>";
		echo "<input type=hidden name=amount value=$amount>";
		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		echo "<button type=submit onclick=Check(event) style=font-size:20pt;width:150px;height:50px>確認購買</button>";
		echo "</form>";
    	echo"</div>";
    echo"</div>";
	mysqli_close($conn);
?>






<footer class="pt-4 my-md-5 pt-md-5 border-top">
        <div class="row">
          <div class="col-12 col-md">
            <img class="mb-2" src="../../assets/brand/bootstrap-solid.svg" alt="" width="24" height="24">
            <small class="d-block mb-3 text-muted">&copy; 2018</small>
          </div>
          <div class="col-6 col-md">
            <h3>專題成員</h3>
            <ul class="list-unstyled text-small">
              <li><a class="text-muted" >U0424011 林豐禾</a></li>
              <li><a class="text-muted" >U0424012 彭稟皓</a></li>
              <li><a class="text-muted" >U0424041 徐代晏</a></li>
              <li><a class="text-muted" >U0424043 徐宏昌</a></li>
              
            </ul>
          </div>
          <div class="col-6 col-md">
            <h3>指導教授</h3>
            <ul class="list-unstyled text-small">
              <li><a class="text-muted" >江緣貴 教授</a></li>
              
            </ul>
          </div>
          <div class="col-6 col-md">
            <h3>國立聯合大學</h3>
            <ul class="list-unstyled text-small">
              <li><a class="text-muted" >資訊工程系</a></li>
              <li><a class="text-muted" >Computer Science and Information Engineering, National United University</a></li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
</div>
      </div>
</div>
<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../js/vendor/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/vendor/holder.min.js"></script>
    <script>
      Holder.addTheme('thumb', {
        bg: '#55595c',
        fg: '#eceeef',
        text: 'Thumbnail'
      });

    
    
    </script>
  </body>
</html>
<script>
	function Check(event){
		if(!confirm("您確定要購買嗎?")){
			event.preventDefault();
		}
	}
</script>