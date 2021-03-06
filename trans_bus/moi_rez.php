<?php
  session_start();
  ?>
<!DOCTYPE html>
<html lang="en">
    
  <head>
      <meta charset="utf-8">
    <title>ТрансБус</title>
    <meta charset="utf-8">
      <link rel="shortcut icon" href="/images/icon.ico.png" type="image/x-icon">
<link rel="icon" href="images/icon.ico.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
      

  </head>
  <body>
    
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
            <span class="create"><img src="images/icon.ico.png" width="100" height="100"/></span>
	      <a class="navbar-brand" href="index.html"> <font size="20" color="white">ТрансБус</font></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Почетна
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a href="home.php" class="nav-link">Почетна</a></li>
              <li class="nav-item"><a href="about.php" class="nav-link">За нас</a></li>
              <li class="nav-item"><a href="avtobuskiStanici.php" class="nav-link">Автобуски станици</a></li>
       <li class="nav-item active"><a href="moi_rez.php" class="nav-link">Мои резервации</a></li>
              <li class="nav-item"><a href="contact_h.php" class="nav-link">Контакт</a></li>	    
                    <li class="nav-item"><a href="index.html" class="nav-link">Одјави се</a></li>
                    <li class="nav-item"><a href="home.php" class="nav-link"> <?php echo $_SESSION["username"]; ?>  </a></li>
            
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    
    <div class="hero-wrap js-fullheight" width="1024" style="background-image: url('images/5.gif');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-md-9 ftco-animate mb-5 pb-5 text-center text-md-left" data-scrollax=" properties: { translateY: '70%' }">
            <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Мои резервации</h1>
            <h3 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"> <?php echo $_SESSION["username"]; ?> </h1>
          </div>
        </div>
      </div>
    </div>
          

    <section class="ftco-section">
            <div class='container col-lg-7 col-md-9 col-sm-12'>
            <table border=2 class="bordered">
                                <thead>
                                <tr>
                                <th>Корисник</th>   
                                    <th>Име    </th>
                                    <th>Презиме  </th>
                                    <th>Поаѓање</th>
                                    <th>Дестинација</th>
                                    <th>Тргнува</th>
                                    <th>Датум</th>
                                    <th>Цена</th>
                                    <th>Компанија</th>
                                </tr>
                                </thead> 
                        <?php
        $db = mysqli_connect('localhost', 'root', '', 'trans');
        if (mysqli_connect_errno()) {
         echo "Грешка: Не може да се воспостави конекција со базата.";
         exit;
      }
      $username=$_SESSION["username"];
       mysqli_set_charset($db,'utf8');
       $korisnik_pregled = ( "SELECT * FROM `korisnik_rez` WHERE Корисник='$username' ORDER BY `korisnik_rez`.`Датум` ASC ");
      $result = $db->query($korisnik_pregled);
       $num_results = $result->num_rows;
       ?> <h3> <?php echo "Број на пронајдени резервации:".$num_results; ?> </h3>
       <?php
 
       $result = $db->query($korisnik_pregled);
       if($result->num_rows > 0){
        while($row= $result->fetch_assoc()){
    ?>
    <tr>
    <td><?php print $row['Корисник']; ?></td>
        <td width="100"><?php print $row['Име']; ?></td>
        <td width="120"><?php echo $row['Презиме']; ?></td>
        <td><?php echo $row['Поаѓање']; ?></td>
        <td><?php echo $row['Дестинација']; ?></td>
        <td><?php echo $row['Тргнува']; ?></td>
        <td width="150"><?php echo $row['Датум']; ?></td>
        <td><?php echo $row['Цена']; ?></td>
        <td><?php echo $row['Компанија']; ?></td><br>
        
    </tr>
    <?php } } else {
         echo "Error: ". $db->error;
     }
    
     $db->close();
    ?>
                    </table>
                     </form>
                </section>
    
   
  
    	
   

    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
           
            <p>
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> Сите права се задржани</p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>