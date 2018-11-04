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

  <div class="view" style="  background-size: cover; background-position: center center; ">
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-info border-bottom shadow-sm">
      <h5 class="my-0 mr-md-auto font-weight-normal">I recycle system</h5>
      <nav class="my-2 my-md-0 mr-md-3">
        <?php
          echo "<a  href='index.php' class=p-2 text-dark style='color: #000000'>首頁</a>";
          echo "<a class=p-2 text-dark href=check.php style='color: #000000'>會員中心</a>";
          echo "<a class=p-2 text-dark href=front/item/index.php style='color: #000000'>購物中心</a>";
          echo "<a class=p-2 text-dark href=front/recycle/checkrecycle.php style='color: #000000'>回收中心</a>";
        ?>
      </nav>
    </div>

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h3 class="display-3">會員註冊</h3>
    </div>

    <div class="container" >
      <form name="form" method="post" action="front/add/addaccount.php">
      <div class="card-deck mb-3 text-center">
        
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="text" name="member_username"  class="form-control" maxlength="30" placeholder="帳號" required autofocus required="required">
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="member_password"  class="form-control" maxlength="30" placeholder="密碼" required="required">
      <input type="password" name="password_confirm"  class="form-control" maxlength="30" placeholder="再次確認密碼" required="required">
      
      <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">註冊</button>

      </div>
      </form>

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
     
    </script>
  </body>
</html>
