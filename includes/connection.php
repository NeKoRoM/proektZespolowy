<?php
require("constants.php");
$link = mysqli_connect("$host", "$username", "$password")or die("cannot connect server ");
mysqli_select_db($link,"$db_name")or die("cannot select DB");
?>