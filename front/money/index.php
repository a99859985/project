<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Blog Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href="blog.css" rel="stylesheet">
  </head>

  <body style="background-image: url('../../bg.png')";>
  <?php
  $member_username  = @$_COOKIE["member_username"];
  $member_password = @$_COOKIE["member_password"];

  //$id = $_POST['id'];
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
  $id = NULL;
  $name = NULL;
  while($row = mysqli_fetch_row($result)){
    
    if($member_username==$row[1] && $member_password==$row[2] && $row[5]!=1 ){
      $id   = $row[0];
      $name = $row[1];
      $money= $row[3];
      $point= $row[4];
      break;
    }
  }
  ?>
  <div class="view" style="background-size: cover; background-position: center center; ">
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-info border-bottom shadow-sm">
      <h5 class="my-0 mr-md-auto font-weight-normal">I recycle system</h5>
      <nav class="my-2 my-md-0 mr-md-3">
        <?php
      
          echo "<a href='../../index.php' class=p-2 text-dark style='color: #000000'>首頁</a>";
          echo "<a class=p-2 text-dark href='../modify/membercenter.php' style='color: #000000'>會員中心</a>";
          echo "<a class=p-2 text-dark href=../item/index.php style='color: #000000'>購物中心</a>";
          echo "<a class=p-2 text-dark href=../recycle/checkrecycle.php style='color: #000000'>回收中心</a>";
        ?>
      </nav>
    </div>
    <div class="container">
     
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-4">儲值中心</h1>
      <p class="lead">I recycle system.</p>
    </div>

      <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">

        <div class="col-md-6 px-0">
          <?php
          echo"<h1 class=display-4 font-italic style=color:yellow>您好!<br></h1>";
          echo"<h1 class=display-4 font-italic>&nbsp&nbsp&nbsp&nbsp&nbsp$row[1]<br></h1>";
          echo"<p class=lead my-3>您現在擁有:</p>";
          echo"<p class=lead mb-0><a  class=text-white font-weight-bold>現金: $money<br>點數:  $point<br></a></p>";

          ?>
         
        </div>
      </div>

      <div class="row mb-2">
        <div class="col-md-6">
          <div class="card flex-md-row mb-4 shadow-sm h-md-250">
            <div class="card-body d-flex flex-column align-items-start" style="background-color:gray;">
              
              <h3 class="mb-0">
                <a style="color:white">我想加現金</a>
              </h3>
              <div style="color:white">add money</div>
              <p style="color:white">增加 現金</p>
              <?php
                echo "<form name=M1 method=post action=addmoney.php><input type=hidden name=id value=$id><input type=hidden name=money value=$money>";
                echo "<button href='#' onclick=Moneyy() style'color:red'>+100</button></form>";
              ?>
            </div>
            
          </div>
        </div>
        <div class="col-md-6">
          <div class="card flex-md-row mb-4 shadow-sm h-md-250">
            <div class="card-body d-flex flex-column align-items-start" style="background-color:gray;">
              <h3 class="mb-0">
                <a style="color:white">我想加點數</a>
              </h3>
              <div style="color:white">add point</div>
              <p style="color:white">增加 點數</p>
              <?php
                echo "<form name=P1 method=post action=addpoint.php><input type=hidden name=id value=$id><input type=hidden name=point value=$point>";
                echo "<button href='#' onclick=Pointt() style'color:red'>+100</button></form>";
              ?>
            </div>
            
          </div>
        </div>
      </div>
      
    </div>
            

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
      function Moneyy(){
        document.forms["M1"].submit();
      }
      function Pointt(){
      document.forms["P1"].submit();
      }
    </script>
  </body>
</html>
