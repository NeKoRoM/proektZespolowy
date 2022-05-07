<?php include("includes/header.php"); ?>

<body class="index" style="text-align: center">
    <div>
        <label
            style="font-family:fantasy; font-size: 100px; text-align: center; color: #ffa64d; text-shadow: orange 0 0 4px;"
            for="user_pass">ITNews</label>
    </div>
    <div style="display: flex; flex-direction: column; ">
        <form action="login.php">
            <div>
                <input class="button" name="login" type="submit" value="Log in">
            </div>
        </form>
        <form action="ajax/site.html">
            <div>
                <input class="button" name="login" type="submit" value="Main page">
            </div>
        </form>
        <form action="login/index.html">
            <div>
                <input class="button" name="login" type="submit" value="Admin Panel">
            </div>
        </form>
    </div>
</body>
<?php include("includes/footer.php"); ?>