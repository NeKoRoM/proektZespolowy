<?php


$servername = "remotemysql.com";
$database = "TRlgHsgbF7";
$username = "TRlgHsgbF7";
$password = "vaGK9Qe8mC";
// Создаем соединение
$conn = mysqli_connect($servername, $username, $password, $database);










$sql = "SELECT `id`, `username` FROM usertbl";

$result = mysqli_query($conn,$sql)
or die(mysqli_error($conn));
 



$news = array();

while($row = $result->fetch_assoc()) {

$news[] = $row;
}

$sql = "SELECT `id` AS `gid` , `group_name` FROM `groups`";

$result = mysqli_query($conn,$sql)
or die(mysqli_error($conn));

while($row = $result->fetch_assoc()) {

$news[] = $row;
}

$sql = "SELECT user_groups.id AS `ugid`,`username` AS `usernameL` ,`group_name`As `group_nameL`
FROM `usertbl`
JOIN `user_groups` ON usertbl.id = user_groups.id_usertbl
JOIN `groups` ON user_groups.id_group = groups.id
ORDER BY group_name";

$result = mysqli_query($conn,$sql)
or die(mysqli_error($conn));

while($row = $result->fetch_assoc()) {

$news[] = $row;
}




//$news = array_reverse($news);


echo json_encode($news);
mysqli_close($conn);



?>