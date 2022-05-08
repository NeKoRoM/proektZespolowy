<?php include("includes/header.php"); ?>
<?php require_once("includes/connection.php"); ?>
<div style="display: flex; flex-direction: row; flex-wrap: nowrap; justify-content: space-between;">
    <div class="container mregister">
        <!-- ADD THE USER TO GROUP -->
        <h1>Add user to group</h1>

        <div id="login">
            <form action="admin.php" id="adminform" method="post" name="adminform">
                <select name="news_group" style="width: 100%;
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
                        <input class="input" id="news_name" name="news_name" size="200" type="text" value=""></label>
                </p>

                <p><label for="user_pass">News text<br>
                        <textarea class="input" id="news_text" name="news_text" size="200" type="text" value=""
                            style="height: 100px;text-align: top; ">

</textarea>

                    </label></p>


                <p class="submit"><input class="button" id="news_send" name="news_send" type="submit"
                        value="Wpish nowosć"></p>
            </form>
        </div>
    </div>

    <!-- ADD THE USER TO GROUP -->
    <div class="container mregister">
        <h1>Add news</h1>

        <div id="login">



            <form action="admin.php" id="adminform" method="post" name="adminform">
                <select name="news_group" style="width: 100%;
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
                        <input class="input" id="news_name" name="news_name" size="200" type="text" value=""></label>
                </p>

                <p><label for="user_pass">News text<br>
                        <textarea class="input" id="news_text" name="news_text" size="200" type="text" value=""
                            style="height: 100px;text-align: top; ">

</textarea>

                    </label></p>


                <p class="submit"><input class="button" id="news_send" name="news_send" type="submit"
                        value="Wpish nowosć"></p>

            </form>
        </div>
    </div>
    <!-- REMOVE NEWS -->
    <div class="container mregister">
        <h1>Remove news</h1>

        <div id="login">
            <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
                <select name='id' style="width: 100%;
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
                    <?php  $conn = new mysqli('remotemysql.com', 'TRlgHsgbF7', 'vaGK9Qe8mC', 'TRlgHsgbF7') 
                    or die ('Cannot connect to db');
                    $result = $conn->query("select id, news_name from news");
                    while ($row = $result->fetch_assoc()) {
                            unset($id, $name);
                            $id = $row['id'];
                            $name = $row['news_name'];
                            echo '<option value="' . $id . '">' . $name . '</option>';
                            }
            ?>
                    <input style="margin: 0.25em;" class="button" type="submit" name="Delete" value="Usuń">
                    <input style="margin: 0.25em;" class="button" type="submit" name="Reload" value="Pobierz listę">
            </form>
        </div>
    </div>
</div>
<!-- END OF FORMS -->
</div>
<!-- END OF FORMS -->
<div style="display: flex; justify-content: center;">
    <button style="cursor: pointer; margin: 15px;" class="button" onclick="window.location.href = 'ajax/site.html';">
        <p><i class="fa fa-lock w3-xxlarge w3-text-light-grey"></i></p>
        <p style="font-size: 1.25rem;">Strona główna</p>
    </button>

</div>

<?php include("includes/footer.php"); ?>
<!-- ADD NEWS QUERY -->
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

<?php if (!empty($message)) {echo "<p class='error'>" . "Cool! ". $message . "</p>";} ?>

<!-- REMOVE THE NEWS QUERY-->
<?php
    if (isset($_POST['Delete'])) {
    $id = $_POST['id'];
    $result = mysqli_query($conn, "DELETE FROM news where id = '$id'");
if($result){
    $message_delete = "News '" . $id . "' successfully Removed";
    }
    else {  
    $message_delete = "Failed to delete the news";
    }
    }
?>
<?php
if (!empty($message_delete)) {echo "<p class='error'>" . "WHAT WAS THE REASON?! ". $message_delete . "</p>";}
?>