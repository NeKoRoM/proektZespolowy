<?php include("includes/header.php"); ?>
<?php require_once("includes/connection.php"); ?>

<div id="welcome">
 <h2>Hello, <span> User</span></h2>!
	<p><a href="logout.php">Exit</a></p>
</div>
<?php include("includes/footer.php"); ?>
<html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<head>
<title>Site</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
</style>
</head>

<body class="w3-light-grey w3-content" style="max-width:1600px">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container">
    <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey" title="close menu">
      <i class="fa fa-remove"></i>
    </a>
    <img src="../images/logo.png" style="width:100%;" class="w3-round"><br><br>
    <h4><b>News
    </b></h4>
    <p class="w3-text-grey">News</p>
  </div>
  <div class="w3-bar-block">
    <a href="#portfolio" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-text-teal"><i class="fa fa-th-large fa-fw w3-margin-right"></i>PORTFOLIO</a>
    <a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-envelope fa-fw w3-margin-right"></i>CONTACT</a>
  </div>
  <div class="w3-panel w3-large">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
  </div>
</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px">

  <!-- Header -->
  <header id="portfolio">
    <a href="#"><img src="../images/logo.jpg" style="width:65px;" class="w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity"></a>
    <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
    <div class="w3-container">
    <h1><b>My News</b></h1>
    <div class="w3-section w3-bottombar w3-padding-16">

     

    </div>
    </div>
  </header>



  <script type="text/javascript">

  $("document").ready(function(){

        var ids = [];


       getNews();

        setInterval(function(){
          getNews();
        },10000)


        function getNews(){
         // alert("jj");

          $.ajax({
          url: 'get.php',         /* Куда отправить запрос */
          method: 'get',             /* Метод запроса (post или get) */
          dataType: 'html',          /* Тип данных в ответе (xml, json, script, html). */
            success: function(data){   /* функция которая будет выполнена после успешного запроса.  */
            data = jQuery.parseJSON (data);



            $.each(data, function(i, item){


              if(jQuery.inArray(item.id, ids) == -1){
                ids.push(item.id);
                //alert(item.news_name);


                $("#container").prepend("  <div class=\"w3-third w3-container w3-margin-bottom\">  <div class=\"w3-container w3-white\"> <p><b>"+ item.news_name +"</b></p><p>" + item.news_text +"</p></div>");

              }

              });
          }
        });

      }
    });


  </script>
  <!-- First Photo Grid-->

    <div id="container" class="w3-row-padding"></div>


  <!-- Pagination -->
  <div class="w3-center w3-padding-32">
    <div class="w3-bar">
      <a href="#" class="w3-bar-item w3-button w3-hover-black">«</a>
      <a href="#" class="w3-bar-item w3-black w3-button">1</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">2</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">3</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">4</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">»</a>
    </div>
  </div>

  <!-- Contact Section -->
  <div class="w3-container w3-padding-large w3-grey">
    <h4 id="contact"><b>Contact Administration</b></h4>
    <div class="w3-row-padding w3-center w3-padding-24" style="margin:0 -16px">
      <div class="w3-third w3-dark-grey">
        <p><i class="fa fa-envelope w3-xxlarge w3-text-light-grey"></i></p>
        <p>email@email.com</p>
      </div>
      <div class="w3-third w3-teal">
        <p><i class="fa fa-map-marker w3-xxlarge w3-text-light-grey"></i></p>
        <p>Jaroslaw, PL</p>
      </div>
      <div class="w3-third w3-dark-grey">
        <p><i class="fa fa-phone w3-xxlarge w3-text-light-grey"></i></p>
        <p>4834324342</p>
      </div>
    </div>
    <hr class="w3-opacity">
    <form action="/action_page.php" target="_blank">
      <div class="w3-section">
        <label>Name</label>
        <input class="w3-input w3-border" type="text" name="Name" required>
      </div>
      <div class="w3-section">
        <label>Email</label>
        <input class="w3-input w3-border" type="text" name="Email" required>
      </div>
      <div class="w3-section">
        <label>Message</label>
        <input class="w3-input w3-border" type="text" name="Message" required>
      </div>
      <button type="submit" class="w3-button w3-black w3-margin-bottom"><i class="fa fa-paper-plane w3-margin-right"></i>Send Message</button>
    </form>
  </div>

  <!-- Footer -->
  <footer class="w3-container w3-padding-32 w3-dark-grey">
  <div class="w3-row-padding">
    <div class="w3-third">
      <h3>My - siła</h3>
      <p></p>

    </div>

    <div class="w3-third">
      <h3>Firma</h3>
      <ul class="w3-ul w3-hoverable">
        <li class="w3-padding-16">
          <img src="../images/cover.jpg" class="w3-left w3-margin-right" style="width:250px">
          <span class="w3-large">Innowacje</span><br>
          <span>Mamy wszystko</span>
        </li>
        <li class="w3-padding-16">
          <img src="../images/1.jpg" class="w3-left w3-margin-right" style="width:250px">
          <span class="w3-large">Umiejętnosci</span><br>
          <span>Możemy wszystko</span>
        </li>
      </ul>
    </div>

    <div class="w3-third">
      <h3>Tematy</h3>
      <p>
        <span class="w3-tag w3-black w3-margin-bottom">IT</span> <span class="w3-tag w3-grey w3-small w3-margin-bottom">Polska</span> <span class="w3-tag w3-grey w3-small w3-margin-bottom">Praca</span>
        <span class="w3-tag w3-grey w3-small w3-margin-bottom"></span> <span class="w3-tag w3-grey w3-small w3-margin-bottom">Jaroslaw</span> <span class="w3-tag w3-grey w3-small w3-margin-bottom">Możliwości</span>
        <span class="w3-tag w3-grey w3-small w3-margin-bottom">Pomysły</span> <span class="w3-tag w3-grey w3-small w3-margin-bottom">Rynek technologii</span> <span class="w3-tag w3-grey w3-small w3-margin-bottom">Nawyki</span>
        <span class="w3-tag w3-grey w3-small w3-margin-bottom">Wiadomość</span> <span class="w3-tag w3-grey w3-small w3-margin-bottom">Trendy IT</span> <span class="w3-tag w3-grey w3-small w3-margin-bottom">Wynalazki</span>
        <span class="w3-tag w3-grey w3-small w3-margin-bottom">Rozrywka</span> <span class="w3-tag w3-grey w3-small w3-margin-bottom">Gry</span>
      </p>
    </div>

  </div>
  </footer>

  
<!-- End page content -->
</div>

<script>
// Script to open and close sidebar
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}

function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}
</script>

</body>
</html>