<?php


$servername = "remotemysql.com";
$database = "TRlgHsgbF7";
$username = "TRlgHsgbF7";
$password = "vaGK9Qe8mC";
// Создаем соединение
$conn = mysqli_connect($servername, $username, $password, $database);


$sql = "SELECT * FROM `news`";

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



