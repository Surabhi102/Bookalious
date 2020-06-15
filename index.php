<?php
include("connect.php");
$sql = "SELECT `categoryname` FROM `category`";
$result = mysqli_query($link,$sql);
$num = mysqli_num_rows($result);
$sql1 = "SELECT `name`, `image`, `price` FROM `book`";
$result1 = mysqli_query($link,$sql1);
$num1 = mysqli_num_rows($result1);

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="canonical" href="https://getbootstrap.com/docs/3.4/examples/starter-template/">

    <title>Bookalious</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">

    
  </head>

  <body>
<!--/.navigation bar  -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand  em-text" href="#">Bookalious</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
<!--/.drop down  -->
<li>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Category <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Science fiction</a></li>
              <li><a href="#">text book</a></li>
              <li><a href="#">fiction</a></li>
            </ul>
          </li>

            <li><a href="#">Contact</a></li>
            </ul>
<!--/.search  -->
            <form class="navbar-form navbar-left" role="search">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
              </div>
              <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
              </button>
            </form>
            <!--/.nav to right  -->
            <ul class="nav navbar-nav navbar-right">
              <li><a class="glyphicon glyphicon-shopping-cart" href="#"></a></li>
              <li><a class="glyphicon glyphicon-user" href="#"></a></li>
  
            </ul>
        
        </div><!--/.nav-collapse -->
      </div>
    </nav>
<!--/Jumbotron -->
    <div class="jumbotron index">
      <div class="container">
      <h1>Buy and <span style="color:blue">  Sell</span>  your books here!!!</h1>
    </div>
  </div>

<div class="container">
  <div class="col-md-4">
    <div class="panel panel-default">
    <div class="panel-heading">Categories</div>
    <div class="panel-body">
      <ul class="list-group">
        <?php
          if($num>0){
            while($category= mysqli_fetch_array($result))
            {
            ?> 
            <li class="list-group-item"><a href="#">
              <?php echo $category['categoryname']; ?>
            </a> 
            </li>
            <?php
            }
          }
          ?>
      </ul>
    </div>
    </div>
  </div>

  <div class="col-md-8">
    <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Latest Release</h3>
    </div>
    <div class="panel-body">
      <div class="row">
        <?php
          if($num1>0){
            while($book = mysqli_fetch_array($result1))
            {
            ?> 
            <div class="col-md-4 game">
            <a href="#">
              <img src="images/<?php echo $book['image']; ?>" />
            </a>
            <div class="game-title">
            <?php echo $book['name']; ?>
            </div>
            <div><?php echo $book['price']; ?> </div>
            <div class="game-add">
              <button class="btn btn-primary" type="submit">Add To Cart</button>
            </div>
            </div>
          <?php
            }
          }
          ?>
          
      </div>
    </div>
  </div>

  </div>
</div>
   







  









    <!-- Bootstrap core JavaScript
    ================================================== -->
    
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>
