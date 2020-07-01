<?php
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: examples/dashboard.html");
    exit;
}
 
// Include config file
require_once "config/config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

if(isset($_POST["commit"])){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
		$sql = "SELECT id FROM user WHERE username = '$username' and password = '$password'";
       
         
        $result = mysqli_query($db,$sql);
	
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	  	
     // $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
      
         $_SESSION['login_user'] = $username;
         
         header("location: examples/dashboard.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
     // Close connection
    mysqli_close($db);
    }
    
  

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="css/login.css" rel="stylesheet" />

</head>
<body>
<div class="login">
  <h1>Login to Web App</h1>
  <form method="post" action="">
    <p><input type="text" name="username" value="" placeholder="Username or Email"></p>
    <p><input type="password" name="password" value="" placeholder="Password"></p>
  
    <p class="submit"><input type="submit" name="commit" value="Login"></p>
	<span class="help-block"><?php echo $error; ?></span>
  </form>
</div>

</body>
</html>