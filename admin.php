<?php include("includes/header.php"); ?>
<?php require_once("includes/connection.php"); ?>
<div class="container admin">
<div id="login">
 <h1>Admin Panel</h1>
 
<form action="admin.php" id="adminform" method="post"name="adminform">
<p><label for="user_pass">News name<br>
<input class="input" id="news_name" name="news_name"size="200" type="text" value=""></label></p>

<p><label for="user_pass">News text<br>
<input class="input" id="news_text" name="news_text"size="200" type="text" value=""></label></p>




<p class="submit"><input class="button" id="news_send" name= "news_send" type="submit" value="Wpish nowosć"></p>

    
 </form>
</div>
</div>
<?php include("includes/footer.php"); ?>
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
VALUES('".$news_text."', '".$news_name."')";
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