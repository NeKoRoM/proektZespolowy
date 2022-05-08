<?php

$group = $_GET['news_group'];



$servername = "remotemysql.com";
$database = "TRlgHsgbF7";
$username = "TRlgHsgbF7";
$password = "vaGK9Qe8mC";
// Создаем соединение
$conn = mysqli_connect($servername, $username, $password, $database);










$query = "DELETE FROM `groups` WHERE `groups`.`id` = ".$group."";

$result = mysqli_query($conn,$query)
or die(mysqli_error($conn));
 
mysqli_close($conn);




?>