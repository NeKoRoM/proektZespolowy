<?php

$group = $_GET['groups'];
$news_name = $_GET['news_name'];
$news_text= $_GET['news_text'];



$servername = "remotemysql.com";
$database = "TRlgHsgbF7";
$username = "TRlgHsgbF7";
$password = "vaGK9Qe8mC";
// Создаем соединение
$conn = mysqli_connect($servername, $username, $password, $database);










$query = "INSERT INTO `news` ( `news_name`, `news_text`) VALUES ( '".$news_name."', '".$news_text."')";


$result = mysqli_query($conn,$query)
or die(mysqli_error($conn));





$query = "INSERT INTO `groups_news` ( `id_groups`, `id_news`) VALUES ( '".$group."', (SELECT `id` FROM `news` WHERE news.news_name = '".$news_name."' AND news.news_text = '".$news_text."' ))";


$result = mysqli_query($conn,$query)
or die(mysqli_error($conn));

echo $group,$news_name ,$news_text;
 
mysqli_close($conn);




?>
