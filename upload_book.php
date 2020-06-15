<?php

include("connect.php");
$sql = "SELECT `categoryname` FROM `category`";
$result = mysqli_query($link,$sql);
$msg = "";
$err="";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST["name"];
    $category = $_POST["category"];
    $author = $_POST["author"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $image = $_FILES["image"]["name"];
    $target="images/".basename($image);

    $sql = "INSERT INTO `book`(`name`, `image`, `categoryname`, `authorname`, `description`, `price`) 
    VALUES ('$name','$image','$category','$author','$description','$price')";
    mysqli_query($link,$sql);
    if(mysqli_num_rows($result)>0){ //
        $err = "Inserted successfully";
    }
    else{
        $err = "cannot insert";
    }
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
    }else{
        $msg = "Failed to upload image";
    }

}




?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.css" rel="stylesheet">

    <title>uploadBook</title>
    <style>
         .wrapper{
           margin-left :400px;
           width: 350px;
           padding: 20px; }
         
    </style>
</head>
<body>
    <h1 style="text-align:center">Insert Book</h1>
<div class="container">
<div class="wrapper">
     <?php echo $err; ?> 
    
    <form  method="post" enctype="multipart/form-data">
    <div class="form-group">
    <label for="">Name</label>
    <input class="form-control" type="text" name="name" id="" required>
    <div>
    <div class="form-group">
    <label for="">Category</label>
    <select name="category" class="form-control">
        <?php
        while($row = mysqli_fetch_assoc($result)){
         $cat_name = $row["categoryname"];
            echo "<option value='$cat_name'> $cat_name </option>";
        }
        ?>
    </select>
    <div>
    <div class="form-group">
    <label for="">Author</label>
    <input class="form-control" type="text" name="author" id="" >
    <div>
    <div class="form-group">
    <label for="">Description</label>
    <textarea class="form-control" name="description" id="text" cols="40" rows="4"></textarea>
    <div>
    <div class="form-group">
    <label for="">Price</label>
    <input class="form-control" type="number" name="price" id="" >
    <div>
    <div class="form-group">
    <label for="">Upload the image</label>
    <input class="form-control" type="file" name="image">
    <div>
    <div class="form-group">
        <input  class="btn btn-primary" type="submit" value="Upload"> 
         <input  class="btn btn-primary" type="reset" value="Reset">
    <div>
</div>
</div>
<?php echo "<script type='text/javascript'>alert('$msg');</script>"; ?>
</form>





<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.js"></script>
</body>
</html>