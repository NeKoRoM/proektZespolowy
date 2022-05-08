<?php include("includes/header.php"); ?>
<?php require_once("includes/connection.php"); ?>
<div style="display: flex; flex-direction: row; flex-wrap: nowrap; justify-content: space-between;" >
<div class="container mregister" style="background-color: #f7e6a6 ;" >

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<h1 style="background-color:#fbe697 ">Add user to group</h1>
  <script type="text/javascript">

  $("document").ready(function(){

       $("#send").click(function(){

        var dane = $("#userGroup").serialize();
        //alert(dane);

          $.ajax({
          url: 'insertUG.php',
          method: 'get',
          dataType: 'html',
          data: dane,
            success: function(data){
              //alert(data);
            }
          });
        });


       $("#delete").click(function(){

        var dane = $("#userGroup").serialize();
        //alert(dane);

          $.ajax({
          url: 'UGdelete.php',
          method: 'get',
          dataType: 'html',
          data: dane,
            success: function(data){
              //alert(data);
            }
          });
        });

              var ids = [];
              var idsg = [];
              var idug = [];




             getNews();



              setInterval(function(){
                getNews();
              },10000)


              function getNews(){


                $.ajax({
                url: 'getUser.php',         /* Куда отправить запрос */
                method: 'get',             /* Метод запроса (post или get) */
                dataType: 'html',          /* Тип данных в ответе (xml, json, script, html). */
                  success: function(data){   /* функция которая будет выполнена после успешного запроса.  */
                  data = jQuery.parseJSON (data);



                  $.each(data, function(i, item){


                      if(jQuery.inArray(item.id, ids ) == -1 && typeof item.id !== 'undefined'){
                        ids.push(item.id);

                        $("#suser").prepend("  <option value=\""+item.id+"\">"+ item.username +"</option>");

                      }
                      if(jQuery.inArray(item.gid, idsg) == -1 && typeof item.gid !== 'undefined'){
                        idsg.push(item.gid);

                        $("#sgroup").prepend("  <option value=\""+item.gid+"\">"+ item.group_name +"</option>");




                      }
                      if(jQuery.inArray(item.ugid, idug) == -1 && typeof item.ugid !== 'undefined'){
                        idug.push(item.ugid);

                          $("#container").prepend("<p>"+ item.group_nameL + "|"+ item.usernameL +" <br> ------------------------------------------------------------------------------------------      </p>");





                      }




                      });
                  }
                })


              }
      });


  </script>
<div id="container" class="w3-row-padding" style="text-align:center; font-size: 12px;   "  ></div>

<!-- ADD THE USER TO GROUP -->

<div id="login">
<form action="admin.php" id="userGroup" method="post"name="adminform">
<select id ="suser"name="news_user"  style="width: 100%;
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


<select id ="sgroup"name="news_group"  style="width: 100%;
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




<p class="submit"><input class="button" id="send" name= "news_send" type="submit" value="Wpish nowosć" ></p>
<p class="submit"><input class="button" id="delete" name= "news_send" type="submit" value="Usuń" ></p>




 </form>
</div>
</div>

<!-- ADD USER TO GROUPS -->
<div class="container mregister" style="background-color: #f7e6a6 ;" >
<h1 style="background-color:#fbe697">Add news</h1>

<div id="login">



<form action="admin.php" id="adminform" method="post"name="adminform" >
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

<!-- REMOVE THE NEWS -->
<div class="container mregister" style="background-color: #f7e6a6; text-align: center;  ">
<h1 style="background-color:#fbe697">Remove news</h1>

<div id="login" style="font-size:30px">


<form action="admin.php" id="adminform" method="post"name="adminform"  >

  <?php

      $conn = new mysqli('remotemysql.com', 'TRlgHsgbF7', 'vaGK9Qe8mC', 'TRlgHsgbF7')
      or die ('Cannot connect to db');
          $result = $conn->query("select id, news_name from news");

          echo "<select name='id'>";
          while ($row = $result->fetch_assoc()) {

                        unset($id, $name);
                        $id = $row['id'];
                        $name = $row['news_name'];
                        echo '<option value="'.$id.'">'.$name.'</option>';}
          echo "</select>";

      ?>
</div>

  </label></p>
  <p class="submit"><input class="button" id="news_delete" name="news_delete" type="submit"
          value="Usuń nowosć"></p>

 </form>
</div>
</div>
</div>
<!-- END OF FORMS -->
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

<?php if (!empty($message)) {echo "<p class='error'>" . "MESSAGE: ". $message . "</p>";} ?>
