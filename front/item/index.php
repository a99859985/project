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
          echo "<a class=p-2 text-dark href=# style='color: #000000'>購物中心</a>";
          echo "<a class=p-2 text-dark href='../recycle/checkrecycle.php' style='color: #000000'>回收中心</a>";
        ?>
      </nav>
      

    </div>

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-3">購物中心</h1>
      <p class="lead">I recycle system.</p>
    </div>
<div class="container" >
<?php

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
	$name	= @$_POST['name'];
	$price1	= @$_POST['price1'];
	$price2	= @$_POST['price2'];
	$info	= @$_POST['info'];
	
	$sql  = "Select * From member";
	$result = mysqli_query($conn,$sql);
	$id = NULL;
	$name = NULL;

	while($row = mysqli_fetch_row($result)){
	    
		if($member_username==$row[1] && $member_password==$row[2] && $row[5]!=1 ){
		   $id   = $row[0];
		   echo "<font size=5>你好，  ".$row[1]."<br>";
		   echo "<font size=5>你擁有<br>現金:&nbsp" .$row[3].  "<br>點數:&nbsp" .$row[4]."<br>";
		   break;
		}
    
	}
  if($member_username){}
  else{
      echo"<form name=form method=post action=../../check.php>";
      echo "<font size=10 style='color:red'>登入才可購物!! &nbsp&nbsp&nbsp</font>";
      echo "<button size=10 href=# style=font-size:20pt;width:150px;height:50px>登入去 &raquo</button>";
      echo "</from><br>";
  }
	
	mysqli_query($conn,"SET NAMES UTF8");

	$sql = "Select * From item";
	$result = mysqli_query($conn,$sql);

	
	
	echo "<form name=form method=post action=>";
	echo "<font size=4>按條件搜尋：</font><br>";
	echo "<input type=hidden name=id value=$id>";
	echo "<font size=5>名稱：</font><input type=text	name=name	value='$name'	maxlength=10  >&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "<font size=5>介紹：</font><input type=text	name=info	value='$info'	maxlength=100 ><br>";
	echo "<font size=5>價格：</font><input type=text	name=price1	value='$price1'	maxlength=10  >";
	echo "<font size=5>&nbsp;&nbsp;&nbsp;&nbsp;至&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	 </font><input type=text	name=price2	value='$price2'	maxlength=10  >";
	echo "<font size=5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font>";
	echo "<button name=submit type=submit />送出</button>";
	echo "</form><br>";

	
	

	echo"<div class=row>";
	while($row = mysqli_fetch_row($result)){
		if( ($name	== NULL || ($name	!= NULL && strpos($row[1],$name)	!== false)) &&
			($price1== NULL || ($price1	!= NULL && $row[2]>=$price1			!== false)) &&
			($price2== NULL || ($price2	!= NULL && $row[2]<=$price2			!== false)) &&
			($info	== NULL || ($info	!= NULL && strpos($row[3],$info)	!== false)) ){
			if($row[5]==1){//已下架
				continue;
			}
		
      	echo"<div class=col-lg-4>";
      	if($row[4]){
			$timestamp = time();
        	echo"<img class=rounded-circle src=/images/$row[4]?$timestamp image width=140 height=140>";
    	}
    	else{
			echo"<img class=rounded-circle src=../../noimg.png image width=140 height=140>";
		}
        echo"<h2>$row[0] $row[1]</h2>";
        echo"<p>價格: $row[2]<br>介紹: $row[3]<br></p>";
        if($member_username){
        	$buy=$row[0];
    		echo "<form name=form method=post action=checkorder.php>";
    		echo "<input type=hidden name=id value=$id>";
    		echo "<input type=hidden name=buy value=$buy>";	
        echo"<p><button  href=# role=button>購買 &raquo;</button></p>";
        echo "</form>";
    		}
		
       
     	echo"</div>";
 		}
     } 
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