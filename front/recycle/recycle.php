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
      while($myfile = fopen("../../recycling/recycle.txt", "r") )
      {
        $txt= fgets($myfile);
        if ($txt=='1')
        {
          echo"<meta content='13; url=readtxt.php' http-equiv='refresh'>";
          fclose($myfile);
          break;
        }
        else{fclose($myfile);}
      }
      //echo"<meta content='13; url=readtxt.php' http-equiv='refresh'>";
  ?>
  </nav>
  </div>

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-3">回收中，請稍候......</h1>
      <p class="lead">I recycle system.</p>
    </div>

    <div class="container" >


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
</body>
</html>
