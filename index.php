<!DOCTYPE html>

<html>

<?php include("includes/header.php"); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<head>
  <title>Site</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="ajax/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    body,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
      font-family: "Raleway", sans-serif
    }
  </style>
</head>

<body class="w3-light-grey w3-content" style="max-width:1600px">

  <!-- Sidebar/menu -->
  <nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
    <div class="w3-container">
      <a href="#" onclick="w3_open()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey"
        title="open menu">
        <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey"
          title="close menu">
          <i class="fa fa-remove"></i>
        </a>
        <img src="images/logo.png" style="width:100%;" class="w3-round"><br><br>
        <h4><b>Strona Glówna</b></h4>
    </div>
    <div class="w3-bar-block">
      <a href="#Wiadomosci" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-text-teal"><i
          class="fa fa-th-large fa-fw w3-margin-right"></i>ZALOGUJ!</a>
      <a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i
          class="fa fa-envelope fa-fw w3-margin-right"></i>CONTACT</a>
    </div>
    <div class="w3-panel w3-large">
      <i class="fa fa-facebook-official w3-hover-opacity"></i>
      <i class="fa fa-instagram w3-hover-opacity"></i>
      <i class="fa fa-snapchat w3-hover-opacity"></i>
      <i class="fa fa-linkedin w3-hover-opacity"></i>

    </div>
  </nav>

  <!-- Overlay effect when opening sidebar on small screens -->
  <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer"
    title="close side menu" id="myOverlay"></div>

  <!-- !PAGE CONTENT! -->
  <div class="w3-main" style="margin-left:300px">

    <!-- Header -->
    <header id="Wiadomosci">
      <a href="#"><img src="images/logo.jpg" style="width:65px;"
          class="w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity"></a>
      <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i
          class="fa fa-bars"></i></span>
      <div class="w3-container">
        <h1 style="text-align: center;font-size: 50px;color: #d6a738;background-color: #ffdd99;  "><b>Portal ODR</b>
        </h1>
        <h1 style="text-align: center;font-size: 30px;color: #black;  "><b>Zaloguj się i dowiedz się wszystkiego, czego
            potrzebujesz w swojej dziedzinie</b></h1>
        <h1 style="text-align: center;font-size: 30px;color: #black;background-color: #ffeecc;  "><b>I nawet więcej!
          </b></h1>



        <div class="w3-container w3-padding-large w3-grey">

          <h4 id="login" style="text-align:center;font-size: 40px;color: #d6a738;background-color: #ffdd99;          ">
            <b>Zaloguj się na swoje konto</b></h4>

          <div class="w3-row-padding w3-center w3-padding-24" style="margin:0 -16px">
            <button  style="cursor: pointer" style="cursor: pointer" class="w3-third w3-dark-grey"
              onclick="window.location.href = 'register.php';">

              <p><i class="fa fa-address-card w3-xxlarge w3-text-light-grey"></i></p>
              <p>Zarejestruj się</p>

            </button>
            <button  style="cursor: pointer" class="w3-third w3-dark-grey" onclick="window.location.href = 'login.php';">

              <p><i class="fa fa-sign-in w3-xxlarge w3-text-light-grey"></i></p>
              <p>Zaloguj</p>


            </button>
            <button  style="cursor: pointer" class="w3-third w3-dark-grey" onclick="window.location.href = 'login/index.html';">

              <p><i class="fa fa-lock w3-xxlarge w3-text-light-grey"></i></p>
              <p>Dla administratora</p>

            </button>
          </div>
















        </div>
        <div class="w3-third w3-container w3-margin-bottom">
          <div class="w3-container w3-white">
            <p><b style="font-size:40px">Oleg</b></p>
            <p style="font-size:30px">Nasza firma istnieje od 10 lat, podejmujemy się
              najtrudniejszych zadań w możliwie najkrótszym czasie,
              razem przeszliśmy przez wszystkie trudności i udało nam
              się stać jedną z wiodących firm na rynku.Każdy z naszych
              pracowników to skarb i wszyscy jesteśmy jak wielka przyjazna rodzina</p>
          </div>
        </div>
        <div class="w3-third w3-container w3-margin-bottom">
          <div class="w3-container w3-white">
            <p><b style="font-size:40px">Roman</b></p>
            <p style="font-size:30px">
              Bycie informatykiem jest w dzisiejszych czasach
              bardzo trudną i odpowiedzialną pracą i bardzo potrzebną,
              dlatego programiści znajdują się obecnie w pierwszej dziesiątce najbardziej potrzebnych pracowników na
              świecie.
              I my jesteśmy bardzo wdzięczni za wybór naszej firmy</p>
          </div>
        </div>
        <div class="w3-third w3-container w3-margin-bottom">
          <div class="w3-container w3-white">
            <p><b style="font-size:40px">Danylo </b></p>
            <p style="font-size:26px">
              Nasza firma zatrudnia również specjalistów w zakresie obslugi sprzętu i wszelkich urządzeńperyferyjnych
              wykorzystywanych w naszej firmie i wszyscy doskonale wykonująswoją pracę oraz że jesteśmy nieskończenie
              wdzięczni każdemu z pracowników za ich wysiłek i za to, że stale jesteście coraz lepsi i bardziej
              doświadczony, dziękujemy za zdobycie doświadczenia u nas</p>
          </div>
        </div>

    </header>
    <!-- First Photo Grid-->
    <div id="container" class="w3-row-padding"></div>





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
     <form action="index.php" id="adminform" method="post"name="adminform">
      <div class="w3-section">
        <label>Name</label>
        <input class="w3-input w3-border" name="Name" id="Name" type="text" name="Name" required>
      </div>

      <div class="w3-section">
        <label>Email</label>
        <input class="w3-input w3-border" name="Email" id="Email" type="text" name="Email" required>
      </div>
      <div class="w3-section">
        <label>Message</label>
        <input class="w3-input w3-border" name="Message" id="Message" type="text" name="Message" required>
      </div>
      <button type="submit" id="mail_send" name="mail_send" class="w3-button w3-black w3-margin-bottom"><i class="fa fa-paper-plane w3-margin-right"></i>Send Message</button>

    </form>
     <?php

        if(isset($_POST["mail_send"])){
      if(!empty($_POST['Message']) && !empty($_POST['Name'])&& !empty($_POST['Email'])) {
      $mail_message= htmlspecialchars($_POST['Message']);
      $mail_name=htmlspecialchars($_POST['Name']);
        $mail_email=htmlspecialchars($_POST['Email']);

      $n1=mysqli_connect("remotemysql.com","TRlgHsgbF7","vaGK9Qe8mC","TRlgHsgbF7");
      $query=mysqli_query($n1,"SELECT * FROM mail WHERE mail_name='".$mail_name."'");
      $numrows=mysqli_num_rows($query);
      if($numrows==0)
      {
      $sql="INSERT INTO mail
      (mail_message, mail_name,mail_email)
      VALUES('".$mail_message."','".$mail_name."','".$mail_email."')";
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
              <img src="images/cover.jpg" class="w3-left w3-margin-right" style="width:250px">
              <span class="w3-large" style="color:black">Innowacje</span><br>
              <span style="color:black">Mamy wszystko</span>
            </li>
            <li class="w3-padding-16">
              <img src="images/1.jpg" class="w3-left w3-margin-right" style="width:250px">
              <span class="w3-large" style="color:black">Umiejętnosci</span><br>
              <span style="color:black">Możemy wszystko</span>
            </li>
          </ul>
        </div>

        <div class="w3-third">
          <h3>Tematy</h3>
          <p>
            <span class="w3-tag w3-black w3-margin-bottom">IT</span> <span
              class="w3-tag w3-grey w3-small w3-margin-bottom">Polska</span> <span
              class="w3-tag w3-grey w3-small w3-margin-bottom">Praca</span>
            <span class="w3-tag w3-grey w3-small w3-margin-bottom"></span> <span
              class="w3-tag w3-grey w3-small w3-margin-bottom">Jaroslaw</span> <span
              class="w3-tag w3-grey w3-small w3-margin-bottom">Możliwości</span>
            <span class="w3-tag w3-grey w3-small w3-margin-bottom">Pomysły</span> <span
              class="w3-tag w3-grey w3-small w3-margin-bottom">Rynek technologii</span> <span
              class="w3-tag w3-grey w3-small w3-margin-bottom">Nawyki</span>
            <span class="w3-tag w3-grey w3-small w3-margin-bottom">Wiadomość</span> <span
              class="w3-tag w3-grey w3-small w3-margin-bottom">Trendy IT</span> <span
              class="w3-tag w3-grey w3-small w3-margin-bottom">Wynalazki</span>
            <span class="w3-tag w3-grey w3-small w3-margin-bottom">Rozrywka</span> <span
              class="w3-tag w3-grey w3-small w3-margin-bottom">Gry</span>
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
