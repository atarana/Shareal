<?php
  ini_set('display_errors', 1);
  function callAPI($method, $url, $data){
    $curl = curl_init();
 
    switch ($method){
       case "POST":
          curl_setopt($curl, CURLOPT_POST, 1);
          if ($data)
             curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
          break;
       case "PUT":
          curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
          if ($data)
             curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
          break;
       default:
          if ($data)
             $url = sprintf("%s?%s", $url, http_build_query($data));
    }
 
    // OPTIONS:
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
       'Content-Type: application/json',
    ));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
 
    // EXECUTE:
    $result = curl_exec($curl);
    if(!$result){die("Connection Failure");}
    curl_close($curl);
    return $result;
 }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Shareal - Share what you want and make money</title>

  <!-- Custom fonts for this theme -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Theme CSS -->
  <link href="css/freelancer.css" rel="stylesheet">
  <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-core.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-service.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-ui.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-mapevents.js"></script>
</head>

<body id="page-top">

    <script src="https://www.gstatic.com/firebasejs/6.6.1/firebase-app.js"></script>

    <!-- Add Firebase products that you want to use -->
    <script src="https://www.gstatic.com/firebasejs/6.6.1/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/6.6.1/firebase-firestore.js"></script>
  
    <script>
      // Your web app's Firebase configuration
      var firebaseConfig = {
          apiKey: "AIzaSyD21bashHK0VpIZ07urXvGVVe7KNtzzWDo",
          authDomain: "hackmit-project-de210.firebaseapp.com",
          databaseURL: "https://hackmit-project-de210.firebaseio.com",
          projectId: "hackmit-project-de210",
          storageBucket: "hackmit-project-de210.appspot.com",
          messagingSenderId: "603510882166",
          appId: "1:603510882166:web:9c8eb8427040ab18d70457"
      };
      // Initialize Firebase
      firebase.initializeApp(firebaseConfig);
     // firebase.analytics();
    </script>
  
    <script>
        function initApp() {
          firebase.auth().onAuthStateChanged(function(user) {
              if (user) {     
                    //alert("logged in: " +  user.email);
                    document.getElementById("signin").style.display = "none";
                    document.getElementById("signup").style.display = "none";
                    document.getElementById("logout").style.display = "inherit";
                    document.getElementById("emailAccountSignedIn").style.display = "inherit";
                    document.getElementById("emailAccountSignedIn").innerHTML = "Hi, " + user.email;
                    document.cookie = "email=" + user.email;
                    document.getElementById("slideshowmaster").style.display = "none";
                    document.getElementById("mapContainer").classList.remove("page-section");
                    document.getElementById("mapContainer").classList.add("masthead");
              } else {
                    //alert("not logged in");
                    document.getElementById("logout").style.display = "none";
                    document.getElementById("signin").style.display = "inherit";
                    document.getElementById("signup").style.display = "inherit";
                    document.getElementById("emailAccountSignedIn").style.display = "none";
                    document.getElementById("slideshowmaster").style.display = "inherit";
                    document.getElementById("mapContainer").classList.add("page-section");
                    document.getElementById("mapContainer").classList.remove("masthead");
                    // User is signed out.
              }
          });
        }
      
    </script>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="img/Colour_Lines_No_Sh_logo.png" style="max-height: 70px;"></a>
      <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#portfolio">Explore</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="about.html">About</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="contact.html">Contact</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" id="signin" href="signin.html">Sign In</a>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" id="signup" href="signup.html">Sign Up</a>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" id="emailAccountSignedIn" href="personalAccount.html">Hi, </a>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
                <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" id="logout" href="logout.html">Logout</a>
              </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Masthead -->
  <header class="masthead bg-primary text-white text-center" id="slideshowmaster">
    <div class="container d-flex align-items-center flex-column">

      <!-- Masthead Avatar Image -->
      <img class="masthead-avatar mb-5" src="img/avataaars.svg" alt="">

      <!-- Masthead Heading -->
      <h1 class="masthead-heading text-uppercase mb-0">Wanna lend things you hardly ever use <br> and get paid? <br><br> You're in the right place!</h1>

      <!-- Icon Divider -->
      <div class="divider-custom divider-light">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      <!-- Masthead Subheading -->
      <p class="masthead-subheading font-weight-light mb-0">What do we do? &nbsp;&nbsp;<a class="btn btn-outline-light" href="about.html">Learn more</a></p>

    </div>
  </header>

  <!-- Masthead -->
  <header class="page-section bg-primary text-white text-center" id="mapContainer">
      <div class="container d-flex align-items-center flex-column">
 
        <!-- Masthead Heading -->
        <h1 class="masthead-heading text-uppercase mb-0">Pick up an item</h1>
  
        <!-- Icon Divider -->
        <div class="divider-custom divider-light">
          <div class="divider-custom-line"></div>
          <div class="divider-custom-icon">
            <i class="fas fa-map-signs"></i>
          </div>
          <div class="divider-custom-line"></div>
        </div>
  
        <div style="width: 100%; height: 600px;" id="map"></div>
        <script>
          document.addEventListener('touchstart', this, {passive: true});
          // Initialize the platform object:

          var platform = new H.service.Platform({
          'apikey': 'rUOIl6ej4g6k5DE6vMgscnnXDFWeai-pMYvZmQaqazU'
          });

          function addMarkersToMap(map) {
              var parisMarker = new H.map.Marker({lat:48.8567, lng:2.3508});

              map.addObject(parisMarker);

              var romeMarker = new H.map.Marker({lat:41.9, lng: 12.5});
              map.addObject(romeMarker);

              var berlinMarker = new H.map.Marker({lat:52.5166, lng:13.3833});
              map.addObject(berlinMarker);

              var madridMarker = new H.map.Marker({lat:40.4, lng: -3.6833});
              map.addObject(madridMarker);

              var londonMarker = new H.map.Marker({lat:51.5008, lng:-0.1224});
              map.addObject(londonMarker);
          }
          
          var defaultLayers = platform.createDefaultLayers();

          //Step 2: initialize a map - this map is centered over Europe
          var map = new H.Map(document.getElementById('map'),
            defaultLayers.vector.normal.map,{
            center: {lat:50, lng:5},
            zoom: 4,
            pixelRatio: window.devicePixelRatio || 1
          });
          // add a resize listener to make sure that the map occupies the whole container
          window.addEventListener('resize', () => map.getViewPort().resize());

          //Step 3: make the map interactive
          // MapEvents enables the event system
          // Behavior implements default interactions for pan/zoom (also on mobile touch environments)
          var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));

          // Create the default UI components
          var ui = H.ui.UI.createDefault(map, defaultLayers);

          // Now use the map as required...
          window.onload = function () {
            addMarkersToMap(map);
            initApp();
          } 
          
        </script>
      </div>
    </header>

  <!-- Portfolio Section -->
  <section class="page-section portfolio" id="portfolio">
    <div class="container">

      <!-- Portfolio Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Explore</h2>

      <!-- Icon Divider -->
      <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-shopping-bag"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

     <?php
        $get_data = callAPI('GET', 'http://tech-visual.it/services/list.php?view=all&email='.$_COOKIE['email'], false);
        $response = json_decode($get_data, true);

        $count = 0;
        foreach ($response as $items) {
          if(($count % 3) == 0){
            echo '<div class="row">';
          }

          echo '<div class="col-md-6 col-lg-4">';
          echo '<div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal'.$count.'">';

          echo '<div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">';
            echo '<div class="portfolio-item-caption-content text-center text-white">';
              echo '<i class="fas fa-plus fa-3x"></i>';
            echo '</div>';
          echo '</div>';
          echo '<img class="img-fluid" src="img/portfolio/game.png" alt="">';

          echo '</div>';
          echo '</div>';

          $count++;

          if(($count % 3) == 0){
            echo '</div>';
          }

          
        }
     ?>

    </div>
  </section>  

  <!-- Footer -->
  <footer class="footer text-center">
    <div class="container">
      <div class="row">

        <!-- Footer Location -->
        <div class="col-lg-4 mb-5 mb-lg-0">
          <h4 class="text-uppercase mb-4">Location</h4>
          <p class="lead mb-0">2215 John Daniel Drive
            <br>Clark, MO 65243</p>
        </div>

        <!-- Footer Social Icons -->
        <div class="col-lg-4 mb-5 mb-lg-0">
          <h4 class="text-uppercase mb-4">Around the Web</h4>
          <a class="btn btn-outline-light btn-social mx-1" href="#">
            <i class="fab fa-fw fa-facebook-f"></i>
          </a>
          <a class="btn btn-outline-light btn-social mx-1" href="#">
            <i class="fab fa-fw fa-twitter"></i>
          </a>
          <a class="btn btn-outline-light btn-social mx-1" href="#">
            <i class="fab fa-fw fa-linkedin-in"></i>
          </a>
          <a class="btn btn-outline-light btn-social mx-1" href="#">
            <i class="fab fa-fw fa-dribbble"></i>
          </a>
        </div>

        <!-- Footer About Text -->
        <div class="col-lg-4">
          <h4 class="text-uppercase mb-4">About Us</h4>
          <p class="lead mb-0"> Together we can change the world for better! 
            <a href="about.html">Learn More</a>.</p>
        </div>

      </div>
    </div>
  </footer>

  <!-- Copyright Section -->
  <section class="copyright py-4 text-center text-white">
    <div class="container">
      <small>Copyright &copy; Your Website 2019</small>
    </div>
  </section>

  <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
  <div class="scroll-to-top d-lg-none position-fixed ">
    <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
      <i class="fa fa-chevron-up"></i>
    </a>
  </div>

  <!-- Portfolio Modals -->

  <?php
    $count = 0;
    foreach ($response as $field) {
      
        echo '<div class="portfolio-modal modal fade" id="portfolioModal'.$count.'" tabindex="-1" role="dialog" aria-labelledby="portfolioModal1Label" aria-hidden="true">';
        ?>
        <div class="modal-dialog modal-l" role="document">
        <div class="modal-content">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">
              <i class="fas fa-times"></i>
            </span>
          </button>
          <div class="modal-body text-center">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-lg-8">
                  <!-- Portfolio Modal - Title -->
                  <?php
                  echo '<h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">'.$field['name'].'</h2>';
                  ?>
                  <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon">
                      <i class="fas fa-star"></i>
                    </div>
                    <div class="divider-custom-line"></div>
                  </div>
                  <!-- Portfolio Modal - Image -->
                  <?php
                  echo '<img class="img-fluid rounded mb-5" src="'.$field['src'].'" alt="">';

                  ?>
                  <h4 class="portfolio-modal-text text-primary mb-0">Category </h4>
                  <?php
                  echo '<p class="mb-5">'.$field['category'].'</p>';
                  ?>
                  <br>
                  <h4 class="portfolio-modal-text text-primary mb-0">Owner </h4>
                  <?php
                  echo '<p class="mb-5">'.$field['last'].'</p>';
                  
                  echo '<br>';
                  echo '<h4 class="portfolio-modal-text text-primary mb-0">Daily Price </h4>';

                  echo '<p class="mb-5">'.$field['daily_price'].'</p>';
                  echo '<br>';
                  echo '<h4 class="portfolio-modal-text text-primary mb-0">Worth </h4>';
                  echo '<p class="mb-5">'.$field['worth'].'</p>';

                  echo '<h4 class="portfolio-modal-text text-primary mb-0">Description </h4>';
                  echo '<p class="mb-5">'.$field['description'].'</p>';
                  ?>

                  <form action="services/toggle_valid.php" method="get">
                    <input type="hidden" name="id" value="<?php echo $field['id']; ?>">
                    <input type="hidden" name="val" value="0">
                    <input type="submit" value="BOOK">
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
       <?php

        echo '</div>';
      
      $count++;
    }
  ?>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Contact Form JavaScript -->
  <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/freelancer.min.js"></script>
</body>

</html>

<?php

?>