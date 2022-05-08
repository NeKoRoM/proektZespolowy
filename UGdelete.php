<?php

$group = $_GET['news_group'];
$user = $_GET['news_user'];


$servername = "remotemysql.com";
$database = "TRlgHsgbF7";
$username = "TRlgHsgbF7";
$password = "vaGK9Qe8mC";
// Создаем соединение
$conn = mysqli_connect($servername, $username, $password, $database);










$query = "DELETE FROM `user_groups` WHERE `user_groups`.`id_usertbl` = ".$user." AND `user_groups`.`id_group` = ".$group."";

$result = mysqli_query($conn,$query)
or die(mysqli_error($conn));
 
mysqli_close($conn);




?>