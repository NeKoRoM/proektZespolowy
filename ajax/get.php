<?php


$servername = "remotemysql.com";
$database = "TRlgHsgbF7";
$username = "TRlgHsgbF7";
$password = "vaGK9Qe8mC";
// Создаем соединение
$conn = mysqli_connect($servername, $username, $password, $database);










$sql = "    SELECT news.id, `news_name`, `news_text` FROM `groups` 
    JOIN groups_news ON groups.id = groups_news.id_groups 
    JOIN news ON groups_news.id_news = news.id 
    WHERE group_name IN (SELECT `group_name` FROM `groups` 
                           JOIN user_groups ON groups.id = user_groups.id_group
                       
                       WHERE user_groups.id_usertbl IN (SELECT `id` FROM `usertbl` WHERE username = '".$_COOKIE["name"]."'))";

$result = mysqli_query($conn,$sql)
or die(mysqli_error($conn));
 


$news = array();

while($row = $result->fetch_assoc()) {

$news[] = $row;
}
//$news = array_reverse($news);


echo json_encode($news);
mysqli_close($conn);



?>