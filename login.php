<?php
	session_start();

	?>


	<?php require_once("includes/connection.php"); ?>
	<?php include("includes/header.php"); ?>
	<?php

	if(isset($_SESSION["session_username"])){

	header("Location: ajax/site.html");
	}

	if(isset($_POST["login"])){

	if(!empty($_POST['username']) && !empty($_POST['password'])) {
	$username=htmlspecialchars($_POST['username']);
	$password=htmlspecialchars($_POST['password']);
	$n1=mysqli_connect("remotemysql.com","TRlgHsgbF7","vaGK9Qe8mC","TRlgHsgbF7");
$query =mysqli_query($n1, "SELECT * FROM usertbl WHERE username='".$username."' AND password='".$password."'");
	$numrows=mysqli_num_rows($query);
	if($numrows!=0)
 {
while($row=mysqli_fetch_assoc($query))
 {
	$dbusername=$row['username'];
  $dbpassword=$row['password'];
 }
  if($username == $dbusername && $password == $dbpassword)
 {
	// старое место расположения
	//  session_start();
	 $_SESSION['session_username']=$username;



   header("Location: ajax/site.html");
	}
	} else {
	//  $message = "Invalid username or password!";

$message = "Invalid username or password!";
 }
	} else {
    $message = "All fields are required!";
	}
	}




	?>
<?php include("includes/header.php"); ?>
<?php require_once("includes/connection.php"); ?>
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
</style>


<?php if (!empty($message)) {echo "<p class='error'>" . "MESSAGE: ". $message . "</p>";} ?>
	<body>
<div class="container mlogin">
<div id="login">
<h1>Login</h1>
<form action="" id="loginform" method="post"name="loginform">
<p><label for="user_login">User name<br>
<input class="input" id="username" name="username"size="20"
type="text" value=""></label></p>
<p><label for="user_pass">Password<br>
 <input class="input" id="password" name="password"size="20"
  type="password" value=""></label></p>
	<p class="submit"><input class="button" name="login"type= "submit" value="Log In"></p>
	<p class="regtext">Non registered?<a href= "register.php">Registration</a>!</p>
   </form>
 </div>
  </div>
<	</body>
<?php include("includes/footer.php"); ?>
