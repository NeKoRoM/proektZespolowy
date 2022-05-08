<?php

$group = $_GET['news_group'];
$user = $_GET['news_user'];


$servername = "remotemysql.com";
$database = "TRlgHsgbF7";
$username = "TRlgHsgbF7";
$password = "vaGK9Qe8mC";
// Создаем соединение
$conn = mysqli_connect($servername, $username, $password, $database);










$query = "INSERT INTO `user_groups` (`id`, `id_usertbl`, `id_group`) VALUES (NULL, '".$user."', '".$group."')";

$result = mysqli_query($conn,$query)
or die(mysqli_error($conn));
 
mysqli_close($conn);




?>
