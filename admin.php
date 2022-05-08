<?php include("includes/header.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php  $conn = new mysqli('remotemysql.com', 'TRlgHsgbF7', 'vaGK9Qe8mC', 'TRlgHsgbF7')
                    or die ('Cannot connect to db');?>
<?php  $db = new mysqli('remotemysql.com', 'TRlgHsgbF7', 'vaGK9Qe8mC', 'TRlgHsgbF7')
                    or die ('Cannot connect to db');?>
                    <body style="background-color:#ffefd4">
<div style="display: flex; flex-direction: row; flex-wrap: nowrap; justify-content: space-between;">
    <div class="container mregister" style="background-color: #f2ce79 ;">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <h1 style="background-color:#fbe697 ">Dodaj użytkownika do grupy</h1>


          <script type="text/javascript">
            $("document").ready(function () {


                $("#groupDelete").click(function(){

                    var dane = $("#groupD").serialize();
                    //alert(dane);

                      $.ajax({
                      url: 'Gdelete.php',
                      method: 'get',
                      dataType: 'html',
                      data: dane,
                        success: function(data){
                          //alert(data);
                        }
                      });
                    });

                 $("#group_send").click(function(){

                    var dane = $("#group_nameL").serialize();
                    //alert(dane);

                      $.ajax({
                      url: 'insertG.php',
                      method: 'get',
                      dataType: 'html',
                      data: dane,
                        success: function(data){
                          //alert(data);
                        }
                      });
                    });


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


                $("#news_sendADD").click(function () {
                    var dane = $("#newsADD").serialize();
                    //alert(dane);
                    $.ajax({
                        url: 'insertNEWS.php',
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
                                    $("#groupADD").prepend("  <option value=\"" + item.gid +
                                        "\">" + item.group_name + "</option>");
                                     $("#groupD").prepend("  <option value=\""+item.gid+"\">"+ item.group_name +"</option>");

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


        <!-- ADD THE USER TO GROUP -->

    <div class="container mregister" style="background-color: #f7e6a6 ;">
<h1 style="background-color: ; " >Dodaj Grupę</h1>

<div >



<form action="admin.php" id="adminform" method="post"name="adminform">



<p><label for="user_pass">Nazwa Grupy<br>
<input class="input" id="group_nameL" name="group_nameL"size="200" type="text" value=""></label></p>




</label></p>







<p style="padding-bottom:20px ;padding-right:110px ;  " ><input class="button" id="group_send" name= "news_send" type="submit" value="Dodaj Grupę" ></p>


<h1>Usuń Grupę</h1>

<select id ="groupD"name="news_group"  style="width: 100%;
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

    <p style="padding-right:110px ; "><input class="button" id="groupDelete" name= "news_send" type="submit" value="Usuń grupę" ></p>
 </form>
</div>
</div>

    <!-- ADD NEWS -->
    <div class="container mregister" style="background-color: #f0c981 ;">
        <h1 style="background-color:#fbe697">Dodaj wiadomości</h1>

        <div id="login">
            <form action="admin.php" id="newsADD" method="post" name="adminform">
                <select id="groupADD" name="groups" style="width: 100%;
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


                <p class="submit"><input style="margin: 0.50em;" class="button" id="news_sendADD" name="news_send"
                        type="submit" value="Dodaj nowosć">
                </p>
                <p class="submit"><input style="margin: 0.50em;" class="button" id="news_catch" name="news_catch"
                        type="submit" value="Pobierz liste"></p>
            </form>
        </div>
    </div>
    <!-- REMOVE NEWS -->
    <div class="container mregister" style="background-color: #ffcb7d ;">
        <h1>Usuń wiadomość</h1>

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
    <button style="cursor: pointer; margin: 15px;" class="button" onclick="window.location.href = 'index.html';">
        <p><i class="fa fa-lock w3-xxlarge w3-text-light-grey"></i></p>
        <p style="font-size: 1.25rem;">Strona główna</p>
    </button>
    <button style="cursor: pointer; margin: 15px;" class="button" onclick="window.location.href = 'admin_mail_panel.html';">
        <p><i class="fa fa-lock w3-xxlarge w3-text-light-grey"></i></p>
        <p style="font-size: 1.25rem;">Poczta</p>
    </button>

</div>




<!-- ADD NEWS QUERY -->


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
</body>
<?php include("includes/footer.php"); ?>
