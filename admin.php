<?php include("includes/header.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php  $conn = new mysqli('remotemysql.com', 'TRlgHsgbF7', 'vaGK9Qe8mC', 'TRlgHsgbF7') 
                    or die ('Cannot connect to db');?>
<?php  $db = new mysqli('remotemysql.com', 'TRlgHsgbF7', 'vaGK9Qe8mC', 'TRlgHsgbF7') 
                    or die ('Cannot connect to db');?>
<div style="display: flex; flex-direction: row; flex-wrap: nowrap; justify-content: space-between;">
    <div class="container mregister" style="background-color: #f7e6a6 ;">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <h1 style="background-color:#fbe697 ">Add user to group</h1>
        <script type="text/javascript">
            $("document").ready(function () {
                $("#send").click(function () {
                    var dane = $("#userGroup").serialize();
                    //alert(dane);
                    $.ajax({
                        url: 'insertUG.php',
                        method: 'get',
                        dataType: 'html',
                        data: dane,
                        success: function (data) {
                            //alert(data);
                        }
                    });
                });
                $("#delete").click(function () {

                    var dane = $("#userGroup").serialize();
                    //alert(dane);

                    $.ajax({
                        url: 'UGdelete.php',
                        method: 'get',
                        dataType: 'html',
                        data: dane,
                        success: function (data) {
                            //alert(data);
                        }
                    });
                });
                var ids = [];
                var idsg = [];
                var idug = [];
                getNews();
                setInterval(function () {
                    getNews();
                }, 10000)

                function getNews() {


                    $.ajax({
                        url: 'getUser.php',
                        /* Куда отправить запрос */
                        method: 'get',
                        /* Метод запроса (post или get) */
                        dataType: 'html',
                        /* Тип данных в ответе (xml, json, script, html). */
                        success: function (data) {
                            /* функция которая будет выполнена после успешного запроса.  */
                            data = jQuery.parseJSON(data);

                            $.each(data, function (i, item) {


                                if (jQuery.inArray(item.id, ids) == -1 && typeof item.id !==
                                    'undefined') {
                                    ids.push(item.id);

                                    $("#suser").prepend("  <option value=\"" + item.id +
                                        "\">" + item.username + "</option>");

                                }
                                if (jQuery.inArray(item.gid, idsg) == -1 && typeof item
                                    .gid !== 'undefined') {
                                    idsg.push(item.gid);

                                    $("#sgroup").prepend("  <option value=\"" + item.gid +
                                        "\">" + item.group_name + "</option>");
                                    $("#group").prepend("  <option value=\"" + item.gid +
                                        "\">" + item.group_name + "</option>");
                                }
                                if (jQuery.inArray(item.ugid, idug) == -1 && typeof item
                                    .ugid !== 'undefined') {
                                    idug.push(item.ugid);

                                    $("#container").prepend("<p>" + item.group_nameL + "|" +
                                        item.usernameL +
                                        " <br> ------------------------------------------------------------------------------------------      </p>"
                                    );
                                }
                            });
                        }
                    })
                }
            });
        </script>
        <div id="container" class="w3-row-padding" style="text-align:center; font-size: 12px;   "></div>

        <!-- ADD THE USER TO GROUP -->

        <div id="login">
            <form action="admin.php" id="userGroup" method="post" name="adminform">
                <select id="suser" name="news_user" style="width: 100%;
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
                </select>
                <select id="sgroup" name="news_group" style="width: 100%;
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
                </select>
                <p class="submit"><input style="margin: 0.50em;" class="button" id="delete" name="news_send"
                        type="submit" value="Usuń"></p>

                <p class="submit"><input style="margin: 0.50em;" class="button" id="news_send" name="news_send"
                        type="submit" value="Dodaj do grupy"></p>
            </form>
        </div>
    </div>

    <!-- ADD NEWS -->
    <div class="container mregister" style="background-color: #f7e6a6 ;">
        <h1 style="background-color:#fbe697">Add news</h1>

        <div id="login">
            <form action="admin.php" id="adminform" method="post" name="adminform">
                <select id="group" name="groups" style="width: 100%;
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
                </select>
                <p><label for="user_pass">News name<br>
                        <input class="input" id="news_name" name="news_name" size="200" type="text" value=""></label>
                </p>

                <p><label for="user_pass">News text<br>
                        <textarea class="input" id="news_text" name="news_text" size="200" type="text" value=""
                            style="height: 100px;text-align: top; "></textarea></label></p>


                <p class="submit"><input style="margin: 0.50em;" class="button" id="news_send" name="news_send"
                        type="submit" value="Dodaj nowosć">
                </p>
                <p class="submit"><input style="margin: 0.50em;" class="button" id="news_catch" name="news_catch"
                        type="submit" value="Pobierz liste"></p>
            </form>
        </div>
    </div>
    <!-- REMOVE NEWS -->
    <div class="container mregister" style="background-color: #f7e6a6 ;">
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
                    <?php
                    $result = $conn->query("select id, news_name from news");
                    while ($row = $result->fetch_assoc()) {
                            unset($id, $name);
                            $id = $row['id'];
                            $name = $row['news_name'];
                            echo '<option value="' . $id . '">' . $name . '</option>';
                            }
            ?>
                </select>
                <input style="margin: 0.50em;" class="button" type="submit" name="Delete" value="Usuń">
                <input style="margin: 0.50em;" class="button" type="submit" name="Reload" value="Pobierz listę">
            </form>
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




<!-- ADD NEWS QUERY -->
<?php

if(isset($_POST["news_send"])){
if(!empty($_POST['news_text']) && !empty($_POST['news_name'])) {
$news_text= htmlspecialchars($_POST['news_text']);
$news_name=htmlspecialchars($_POST['news_name']);
$group=htmlspecialchars($_POST['groups']);

$n1=mysqli_connect("remotemysql.com","TRlgHsgbF7","vaGK9Qe8mC","TRlgHsgbF7");
$query=mysqli_query($n1,"SELECT * FROM news WHERE news_name='".$news_name."'");
$numrows=mysqli_num_rows($query);
if($numrows==0)
{
$sql="INSERT INTO news
(news_text, news_name)
VALUES('".$news_text."','".$news_name."')";

mysqli_query($n1,"INSERT INTO groups_news
(id_groups, id_news)
VALUES('".$group."','select id from news where news_name='$news_name''')");
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
    mysqli_query($conn, "DELETE FROM groups_news where id_news = '$id'");
    $result =  mysqli_query($conn, "DELETE FROM news where id = '$id'");
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

<?php include("includes/footer.php"); ?>