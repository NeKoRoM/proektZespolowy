<?php include("includes/header.php"); ?>
<?php require_once("includes/connection.php"); ?>
<div class="container mregister">
  <link rel="stylesheet" href="w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    body,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
      font-family: "Raleway", sans-serif
    }
  </style>
  <div id="login">
    <h1 style="background-color:#ffeecc ;">Rejestracja</h1>


      <body>
        <form action="register.php" id="registerform" method="post" name="registerform">
          <h><label for="user_login" style="background-color:#fbe697 ;">Full name<br></label>
              <input id="full_name" name="full_name" size="32" type="text" value=""></p>
            <p><label for="user_pass" style="background-color:#fbe697 ;">E-mail<br></label>
                <input class="input" id="email" name="email" size="32" type="email" value=""></p>
            <p><label for="user_pass" style="background-color:#fbe697 ;">Name<br></label>
                <input class="input" id="username" name="username" size="20" type="text" value=""></p>
            <p><label for="user_pass" style="background-color:#fbe697 ;">Password<br></label>
                <input class="input" id="password" name="password" size="32" type="password" value=""></p>
            <p class="submit"><input class="button" id="register" name="register" type="submit"
                value="Zarejestrować się">
            </p>
            <p class="regtext">Already registered?</p>
            <div><a href="login.php">Log in</a></div>
      </body>
      </form>
  </div>
</div>
<?php include("includes/footer.php"); ?>
<?php

    if(isset($_POST["register"])){
if(!empty($_POST['full_name']) && !empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password'])) {
$full_name= htmlspecialchars($_POST['full_name']);
$email=htmlspecialchars($_POST['email']);
$username=htmlspecialchars($_POST['username']);
$password=htmlspecialchars($_POST['password']);
$n1=mysqli_connect("remotemysql.com","TRlgHsgbF7","vaGK9Qe8mC","TRlgHsgbF7");
$query=mysqli_query($n1,"SELECT * FROM usertbl WHERE username='".$username."'");
$numrows=mysqli_num_rows($query);
if($numrows==0)
{
$sql="INSERT INTO usertbl
(full_name, email, username,password)
VALUES('".$full_name."','".$email."', '".$username."', '".$password."')";
$result=mysqli_query($n1,$sql);
if($result){
$message = "Account Successfully Created";
}
else {
$message = "Failed to insert data information! SQL query:".$sql;

}
}
else {
$message = "That username already exists! Please try another one!";
}
}
else {
$message = "All fields are required!";
}
}
?>

<?php if (!empty($message)) {echo "<p class='error'>" . "MESSAGE: ". $message . "</p>";} ?>
