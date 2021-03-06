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
          echo "<a  href='../../../index.php' class=p-2 text-dark style='color: #000000'>首頁</a>";
          echo "<a class=p-2 text-dark href='../modify/membercenter.php'  style='color:#000000'>會員中心</a>";
          echo "<a class=p-2 text-dark href=../item/index.php style='color: #000000'>購物中心</a>";
          echo "<a class=p-2 text-dark href='../recycle/checkrecycle.php' style='color: #000000'>回收中心</a>";
        ?>
      </nav>
      

    </div>

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-3">查詢訂單</h1>
      <p class="lead">I recycle system.</p>
    </div>

    <div class="container" >
<?php

	$member_username  = @$_COOKIE["member_username"];
	$member_password = @$_COOKIE["member_password"];

	if(!$member_username){
		die("權限錯誤<br>");
	}
	else{
		
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

	$sql = "Select * From order_form";
	$result = mysqli_query($conn,$sql);

	$id = $_POST['id'];

	echo "<center>";
	echo "<table border=3>";
	echo "<tr>";
	echo "<td><center><font size=5>訂單編號	</font></center></td>";
	echo "<td><center><font size=5>會員編號	</font></center></td>";
	echo "<td><center><font size=5>會員名稱	</font></center></td>";
	echo "<td><center><font size=5>商品編號	</font></center></td>";
	echo "<td><center><font size=5>商品名稱	</font></center></td>";
	echo "<td><center><font size=5>商品單價	</font></center></td>";
	echo "<td><center><font size=5>付款方式	</font></center></td>";
	echo "<td><center><font size=5>訂購時間	</font></center></td>";

	

	echo "</tr>";

	$temp = 0;

	echo "<form name=form method=post action=modifyid.php>";
	while($row = mysqli_fetch_row($result)){

		if($id==$row[1]){
			echo "<tr>";
			if($temp!=$row[0]){
				if($row[6] != $row[7]){
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
			//echo "<td><center><font size=5>";
			
			echo "</font></center></td>";
			if($row[6]==0){
				echo "<td><center><font size=5>現金</font></center></td>";
			}
			elseif ($row[6]==1) {
				echo "<td><center><font size=5>點數</font></center></td>";
			}
			echo "<td><center><font size=5>".$row[7]."</font></center></td>";
			echo "</tr>";
			$temp = $row[0];
		}
	}
	echo "</table>";
	echo "</center>";
	echo "</form>";
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

    function membercenter(){
    document.forms["MyForm1"].submit();
    }
    function Order(){
      document.forms["MyForm2"].submit();
    }
    function Item(){
      document.forms["MyForm3"].submit();
    }
    function recycle(){
      document.forms["MyForm4"].submit();
    }
    function out(){
      document.forms["MyForm5"].submit();
      $id=NULL;
    }
    </script>
  </body>
</html>