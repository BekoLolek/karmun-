<?php
session_start();
include 'connection.php';
if($_SESSION["connection"] == "down"){
	header("Location:serverdown.php");
}
$username = $_POST['user'];
$password = $_POST['pass'];
$username = stripcslashes($username);
$password = stripcslashes($password);
$result = mysqli_query($connection,"select * from Everything where username = '$username' and password= '$password'");
$row = mysqli_fetch_array($result);
$error = "";
$success = "";
$_SESSION["id"]=$row['id'];
if(isset($_POST['Submit'])){
 
   
 if($row['username'] == "AdminNews" && $row['password'] == $password && ($username != "" && $password != ""))
 {
header("Location:admin.php");
$_SESSION["usern"]="AdminNews";

 }
 elseif ($row['username'] == "Admin" && $row['password'] == $password && ($username != "" && $password != "")){
    $error = "";
    $success = "Welcome ".$row['username'];
    header("Location:refreshing.php");
    $_SESSION["usern"]="Admin";
  }
elseif ($row['username'] == $username && $row['password'] == $password && ($username != "" && $password != "")){
    $error = "";
    $success = "Welcome ".$row['username'];
    header("Location:process.php");
    $_SESSION["usern"]=$row['username'];
  }
 
else{
  $error = "Invalid Username or Password!";
  $success = "";
}
if($row['username'] == "Chair" && $row['password'] == $password && ($username != "" && $password != ""))
 {
header("Location:chair.php");
 }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="indexstyle.css">

  </head>
  <body>
    <div id="transbox">
      <div id="login-box"> 
        <div id="Incorrect">
        <p class="error"><?php echo $error; ?></p><p class="success"><?php echo $success; ?></p>
        </div>
        <form method="POST">
        <h1>Login</h1> 
        <div id="textbox">
          <i class="fas fa-user"></i>
        
         
          <input type="text" id="user" name="user" placeholder="Username" />
      
      </div>
      <div id="textbox">
        <i class="fas fa-lock"></i>
        
         
          <input type="password" id="pass" name="pass" placeholder="Password" />
      </div>

       
          <label></label>
          <input type="Submit" id="btn" name="Submit" value="LOGIN" />
      
        </form>
    </div>
  </div>
  </body>
</html>