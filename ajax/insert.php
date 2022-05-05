<?php

$title = $_GET['title'];
$text = $_GET['text'];
$servername = "localhost";
$database = "ajax";
$username = "root";
$password = "root";
// Создаем соединение
$conn = mysqli_connect($servername, $username, $password, $database);


$query = "INSERT INTO news (title, text)".
"VALUES('$title','$text')";

$result = mysqli_query($conn,$query)
or die(mysqli_error($conn));
 
mysqli_close($conn);



?>
