
<?php include("includes/header.php"); ?>
<body class="index" style="text-align: center">
<style>
.button-admin {
	border: solid 1px #da7c0c;
	background: #f78d1d;
	background: -webkit-gradient(linear, left top, leftbottom, from(#faa51a), to(#f47a20));
	background: -moz-linear-gradient(top, #faa51a, #f47a20);
	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#faa51a', endColorstr='#f47a20');
	color: #fff;
	padding: 7px 12px;
	-webkit-border-radius: 4px;	
    cursor: pointer;
    margin: 5px;
}
</style>
<div>
        <label style="font-family:fantasy; font-size: 100px; text-align: center; color: #ffa64d; text-shadow: orange 0 0 4px;"  for="user_pass">ITNews</label>
    </div>
<div style="display: flex; flex-direction: column;" >
    <form action="login.php">
        <div>
            <input name="login"type= "submit" value="Log in" class="button-admin">
        </div>
    </form>
    <form action="ajax/site.html">
        <div>
            <input name="login"type= "submit" value="Main page" class="button-admin">
        </div>
    </form>    
    <form action="login/index.html">
        <div>
            <input name="login"type= "submit" value="Admin Panel" class="button-admin">
        </div>
    </form> 
</div>
</body>
<?php include("includes/footer.php"); ?>
