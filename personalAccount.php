<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>My Account - Shareal - Share what you want and make money</title>

  <!-- Custom fonts for this theme -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Theme CSS -->
  <link href="css/freelancer.css" rel="stylesheet">
</head>

<body id="page-top" onload="initApp();">

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
                        document.getElementById("signin").style.display = "none";
                        document.getElementById("signup").style.display = "none";
                        document.getElementById("logout").style.display = "inherit";
                        document.getElementById("emailAccountSignedIn").style.display = "inherit";
                        document.getElementById("emailAccountSignedIn").innerHTML = "Hi, " + user.email;
                        document.cookie = "email=" + user.email;
                        let urlC = "/services/info.php?email=" + user.email;
                        $.ajax({
                            url : urlC,
                            type: "GET",
                            success: function(data){
                                var json = $.parseJSON(data);

                                document.getElementById("inputFirstName").value = json['first'];
                                document.getElementById("inputLastName").value = json['last'];
                                document.getElementById("inputAddress").value = json['addr'];
                                document.getElementById("inputEmail").value = json['email'];
                                document.getElementById("inputCellNumber").value = json['tel'];
                                document.getElementById("inputCountry").value = json['country'];

                                console.log(json);
                            },
                            error: function(data){
                                console.log(data);
                            }
                        });
                  } else {
                        window.location.href = "index.html";                      
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
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="index.html#portfolio">Explore</a>
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

  <!-- About Section -->
<section class="masthead bg-primary text-white mb-0" id="signin">

    <div class="container">

        <div class="row">
          <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
              <div class="card-body">
                
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">My Account</h2>

                <!-- Icon Divider -->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon">
                    <i class="far fa-address-card"></i>
                    </div>
                    <div class="divider-custom-line"></div>
                </div>


                <form class="form-signin">
                    <div class="form-label-group">
                        <input type="email" id="inputEmail" class="form-control" readonly>
                        <label style="color: black;" for="inputEmail">Email address</label>
                    </div>

                    <div class="form-label-group">
                        <input type="text" id="inputFirstName" class="form-control" readonly>
                        <label style="color: black;" for="inputFirstName">First Name</label>
                    </div>

                    <div class="form-label-group">
                        <input type="text" id="inputLastName" class="form-control"  readonly>
                        <label style="color: black;" for="inputLastName">Last Name</label>
                    </div>

                    <div class="form-label-group">
                        <input type="text" id="inputAddress" class="form-control"  readonly>
                        <label style="color: black;" for="inputAddress">Address</label>
                    </div>

                    <div class="form-label-group">
                        <input type="tel" id="inputCellNumber" class="form-control"  readonly>
                        <label style="color: black;" for="inputCellNumber">Cell Number</label>
                    </div>

                    <div class="form-label-group">
                        <input type="text" id="inputCountry" class="form-control"  readonly>
                        <label style="color: black;" for="inputCountry">Country</label>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
    </div> 
  </section>

  <section class="page-section">
      <a class="btn btn-lg btn-secondary btn-block text-uppercase" href="insert.html">Insert</a>     
  </section>

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
            $get_data = callAPI('GET', 'http://tech-visual.it/services/list.php?view=profile&email='.$_COOKIE['email'], false);
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
          <h4 class="text-uppercase mb-4">About Freelancer</h4>
          <p class="lead mb-0">Freelance is a free to use, MIT licensed Bootstrap theme created by
            <a href="http://startbootstrap.com">Start Bootstrap</a>.</p>
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
                    <input type="hidden" name="val" value="1">
                    <input type="submit" value="CANCEL BOOKING">
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

</body>

</html>
