<?php

$group = $_GET['group_nameL'];



$servername = "remotemysql.com";
$database = "TRlgHsgbF7";
$username = "TRlgHsgbF7";
$password = "vaGK9Qe8mC";
// Создаем соединение
$conn = mysqli_connect($servername, $username, $password, $database);










$query = "INSERT INTO `groups` (`id`, `group_name`) VALUES (NULL, '".$group."')";


$result = mysqli_query($conn,$query)
or die(mysqli_error($conn));
 
mysqli_close($conn);




?>
