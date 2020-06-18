
<?php

include("connect.php");
$sql = "SELECT `categoryname` FROM `category`";
$result = mysqli_query($link,$sql);
$num = mysqli_num_rows($result);
$sql2 = "SELECT `categoryname` FROM `category`";
$result2 = mysqli_query($link,$sql2);
$num2 = mysqli_num_rows($result2);
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
               <!--/. drop down with icon  -->
              <li><a class="glyphicon glyphicon-shopping-cart" title="cart" href="cart.php">
              <span class="badge abc">3</span></a></li><!--/.badge   -->

              <!--/. drop down with icon  -->

              <?php
              session_start();
                if(isset($_SESSION["loggedin"]))
                {
                  ?>
                  <!-- Dropdown before logging in-->
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                  <i class="glyphicon glyphicon-user"></i> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="#">Notification</a></li>
                      <li><a href="#">Purchase History</a></li>
                      <li><a href="#">Account</a></li>
                      <li role="separator" class="divider"></li>
                      <li><a href="#">Help</a></li>
                      <li><a href="user_logout.php">Logout</a></li>
                    </ul>
              </li>

                <?php }
                 else { ?> <!-- Dropdown after logging in-->
                  <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                  <i class="glyphicon glyphicon-user"></i> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="signup.php">Signup</a></li>
                      <li><a href="user_login.php">Login</a></li>
                    </ul>
              </li>
                <?php } ?>

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
<!--/Display the books -->
<div class="container">
  <div class="col-md-4">
    <div class="panel panel-default">
    <div class="panel-heading">Categories</div>
    <div class="panel-body">
      <ul class="list-group">
        <?php
          if($num2>0){
            while($category2= mysqli_fetch_array($result2))
            {
            ?> 
            <li class="list-group-item"><a href="#">
              <?php echo $category2['categoryname']; ?>
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
        <!-- to display the books -->
        <?php
          if($num1>0){
            while($book = mysqli_fetch_array($result1))
            {
            ?> 
            <form action="insertcart.php" method="post">
            <div class="col-md-6 game">
            <a href="#">
              <img class="image" src="images/<?php echo $book['image']; ?>" />
            </a>
            <div class="name">
            <?php echo $book['name']; ?>
            <input type="hidden"  name="name"value="<?php echo $book['name']; ?>">
            </div>
            <div >
            <input class="form-control" type="number" name="quantity" value=1>
            </div>
            <div class="price">&#8377;<?php echo $book['price']; ?> </div>
            <input type="hidden" name="price" value="<?php echo $book['price']; ?>">
            <div class="game-add">
              <button class="btn btn-primary" name="add" type="submit">Add To Cart</button>
            </div>
            </div> 
            </form>
          <?php
            }
          }
          ?>
          
      </div>
    </div>
  </div>

  </div>
</div>
   
<footer class="footer">
<div class="container">

<p>Author: Hege Refsnes<br>
  <a href="mailto:hege@example.com">hege@example.com</a></p>
</div>


</footer>






  









    <!-- Bootstrap core JavaScript
    ================================================== -->
    
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>
