<?php


$servername = "remotemysql.com";
$database = "TRlgHsgbF7";
$username = "TRlgHsgbF7";
$password = "vaGK9Qe8mC";
// Создаем соединение
$conn = mysqli_connect($servername, $username, $password, $database);

$sql = " SELECT * FROM `mail` ";

$result = mysqli_query($conn,$sql)
or die(mysqli_error($conn));
 


$mail = array();

while($row = $result->fetch_assoc()) {

$mail[] = $row;
}
//$news = array_reverse($news);


echo json_encode($mail);
mysqli_close($conn);



?>



