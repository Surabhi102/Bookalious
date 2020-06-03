<?php
include ("connect.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
  
        $username = $_POST["username"];
        $password = $_POST["password"];

        $sql = "select username,password from admin where username='$username' and password='$password' ";
        $result = mysqli_query($link,$sql);

        if(mysqli_num_rows($result)>0){
            header("location:index.html");
        }
    
    
}


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

<form action="" method="POST" class="form">
<label >Username</label>
<input type="text" name="username" >
<br><br>
<label >Password</label>
<input type="password" name="password" ><br> <br>
<input type="submit" value="Submit">
</form>

</body>
</html>