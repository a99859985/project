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
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="pricing.css" rel="stylesheet">
  </head>


  <body style="background-image: url('bg.png'); ">
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

  $sql  = "Select * From member";
  $result = mysqli_query($conn,$sql);
  $id   = NULL;
  $name = NULL;

  while($row = mysqli_fetch_row($result)){
    
    if($member_username==$row[1] && $member_password==$row[2] && $row[5]!=1 ){
      $id   = $row[0];
      $name = $row[1];
      break;
    }
  }
?>
  <div class="view" style="  background-size: cover; background-position: center center; ">
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-info border-bottom shadow-sm">
      <h5 class="my-0 mr-md-auto font-weight-normal">I recycle system</h5>
      <nav class="my-2 my-md-0 mr-md-3">
        <?php
        if($id){
          
          echo "<a  href='#' class=p-2 text-dark style='color: #000000'>首頁</a>";
          echo "<input type=hidden name=id value=$id><a class=p-2 text-dark href='front/modify/membercenter.php'  style='color:#000000'>會員中心</a>";
          echo "<a class=p-2 text-dark href=front/item/index.php style='color: #000000'>購物中心</a>";
          echo "<a class=p-2 text-dark href='front/recycle/checkrecycle.php' style='color: #000000'>回收中心</a>";
          
        }
        else{
          if(@$_COOKIE["member_username"]){
              echo "<script>var msg = '登入失敗';window.alert(msg);</script>";
              setcookie("member_username","",time()-3600);
              setcookie("member_password","",time()-3600);
              echo "<meta http-equiv=refresh content=0.1>";
            }
          echo "<a  href='#' class=p-2 text-dark style='color: #000000'>首頁</a>";
          echo "<a class=p-2 text-dark href=check.php style='color: #000000'>會員中心</a>";
          echo "<a class=p-2 text-dark href=front/item/index.php style='color: #000000'>購物中心</a>";
          echo "<a class=p-2 text-dark href='front/recycle/checkrecycle.php' style='color: #000000'>回收中心</a>";
        }
        ?>
      </nav>

      <?php 
      if($id){
        echo "<tr><td><font size=5 color=#fff000>歡迎! </font>&nbsp;&nbsp;&nbsp;&nbsp;";
        echo "<font size=5>$name</font>&nbsp;&nbsp;&nbsp;&nbsp;";
        echo "<form name=MyForm5 method=post action=logout.php>";
        echo "<input type=hidden name=id value=$id>";
        echo "<button type=submit href='logout.php' style=font-size:18pt;width:70px;height:40px>登出</button>";
        echo "</form>";
      }
      else{
        echo "<form name=form method=post action=check.php>";
        echo "<input type=hidden name=id value=$id>";
        echo "<button type=submit onclick=Check(event) style=font-size:18pt;width:70px;height:40px>登錄</button>";
        echo "</form>";
      }
      ?>
      

    </div>

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-3">智慧回收系統</h1>
      <p class="lead">I recycle system.</p>
    </div>

    <div class="container" >
      <div class="card-deck mb-3 text-center">

        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="recycle.jpg" alt="Card image cap">
            <div class="card-body" style="background-color:gray;">
                <h1 class="card-title"  style="color:white">回收系統</h1>
                <h5 class="card-text">回收賺點數</h5>
                <a href="front/recycle/checkrecycle.php" class="btn btn-info btn-lg">回收去!!</a>
            </div>
        </div> 
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="buy.jpg" alt="Card image cap">
            <div class="card-body" style="background-color:gray; ">
                <h1 class="card-title" style="color:white">購物系統</h1>
                <h5 class="card-text">點數換商品</h5>
                <a href="front/item/index.php" class="btn btn-info btn-lg">購物去!!</a>
            </div>
        </div> 
        
        
      </div>

      <footer class="pt-4 my-md-5 pt-md-5 border-top">
        <div class="row">
          <div class="col-12 col-md">
            <img class="mb-2" src="../../assets/brand/bootstrap-solid.svg" alt="" width="24" height="24">
            <small class="d-block mb-3 text-muted" >&copy; 2018</small>
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
              <li><a class="text-muted" href='#'>江緣貴 教授</a></li>
              
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
<?php mysqli_close($conn);?>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="js/vendor/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/vendor/holder.min.js"></script>
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
