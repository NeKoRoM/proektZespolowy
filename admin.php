<?php include("includes/header.php"); ?>
<?php require_once("includes/connection.php"); ?>
<div class="container mregister">
<div id="login">
 <h1>Admin Panel</h1>
 


<form action="admin.php" id="adminform" method="post"name="adminform">
<select name="news_group"  style="width: 100%;
  min-width: 15ch;
  max-width: 30ch;
  border: 1px solid var(--select-border);
  border-radius: 0.25em;
  padding: 0.25em 0.5em;
  font-size: 1.25rem;
  cursor: pointer;
  line-height: 1.1;
  background-color: #fff;
  background-image: linear-gradient(to top, #f9f9f9, #fff 33%);">
  <option value="Informatyka">Informatyka</option>
  <option value="Obsluga">Obsluga</option>
</select>


<p><label for="user_pass">News name<br>
<input class="input" id="news_name" name="news_name"size="200" type="text" value=""></label></p>

<p><label for="user_pass">News text<br>
<textarea class="input" id="news_text" name="news_text"size="200" type="text" value="" style="height: 100px;text-align: top; ">

</textarea>

</label></p>


<p class="submit"><input class="button" id="news_send" name= "news_send" type="submit" value="Wpish nowosć" ></p>
<p class="submit"><input class="button" id="news_catch" name= "news_catch" type="submit" value="Pobierz liste" ></p>

    
 </form>
</div>
</div>
<?php include("includes/footer.php"); ?>

<?php  if(isset($_POST["news_catch"])) {
$n1=mysqli_connect("remotemysql.com","TRlgHsgbF7","vaGK9Qe8mC","TRlgHsgbF7");
$catch=mysqli_query($n1,"SELECT username FROM usertbl");
if($result = mysqli_query($n1, $catch)){
     
    $rowsCount = mysqli_num_rows($result); // количество полученных строк
    echo "<p>Catch object: $rowsCount</p>";
    echo "<table><tr><th>username</th></tr>";
    foreach($result as $row){
        echo "<tr>";
            echo "<td>" . $row["username"] . "</td>";
                  echo "</tr>";
    }
    echo "</table>";
    mysqli_free_result($result);
} else{
    echo "Ошибка: " . mysqli_error($conn);
}
mysqli_close($conn);
}
?>







<?php
	
	if(isset($_POST["news_send"])){
if(!empty($_POST['news_text']) && !empty($_POST['news_name'])) {
$news_text= htmlspecialchars($_POST['news_text']);
$news_name=htmlspecialchars($_POST['news_name']);

$n1=mysqli_connect("remotemysql.com","TRlgHsgbF7","vaGK9Qe8mC","TRlgHsgbF7");
$query=mysqli_query($n1,"SELECT * FROM news WHERE news_name='".$news_name."'");
$numrows=mysqli_num_rows($query);
if($numrows==0)
{
$sql="INSERT INTO news
(news_text, news_name)
VALUES('".$news_text."','".$news_name."')";
$result=mysqli_query($n1,$sql);
if($result){
$message = "News Successfully Added";
}
else {
$message = "Failed to insert data information! SQL query:".$sql;

}
}
else {
$message = "That news_name already exists! Please try another one!";
}
}
else {
$message = "All fields are required!";
}
}
?>

<?php if (!empty($message)) {echo "<p class='error'>" . "MESSAGE: ". $message . "</p>";} ?>