
<?php include("includes/header.php"); ?>
<body class="index">
    <div class="index-div">
        <label style="font-family:fantasy; font-size: 100px; text-align: center; color: #ffa64d; text-shadow: orange 0 0 4px;"  for="user_pass">ITNews</label>
    </div>
    <form action="login.php" class="index-form">
        <div class="submit">
            <input class="button" name="login"type= "submit" value="Log in">
        </div>
    </form>
    <form action="ajax/site.html" class="index-form">
        <div class="submit">
            <input class="button" name="login"type= "submit" value="Main page">
        </div>
    </form>
    <div class="regtext" class="index-form">
        <a href= "login/index.html">Admin page</a>
    </div>
</body>
<?php include("includes/footer.php"); ?>
