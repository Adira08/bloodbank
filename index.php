<?php 
include ('config.php'); 
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Need of Blood</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- main css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  </head>
  <body>
    <!-- ================ Header ====================== -->

    <header class="header_area" style="background-color: red;">
      <div class="main_menu">
        <div class="container">
          <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
              <!-- Brand and toggle get grouped for better mobile display -->
              <a class="navbar-brand logo_h" href="index.php"><img src="images/logo.jpg" alt="" height="50" width="100"></a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                <ul class="nav navbar-nav menu_nav ml-auto">
                  <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li> 
                  <li class="nav-item"><a class="nav-link" href="availability.php">Blood Stock</a></li>
                  <li class="nav-item"><a class="nav-link" href="donation.php">Donation Camps</a></li>
                  <li class="nav-item submenu dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Login</a>
                    <ul class="dropdown-menu">
                      <li class="nav-item"><a class="nav-link" data-toggle="modal" href="#receiver">Receiver</a></li>
                      <li class="nav-item"><a class="nav-link" data-toggle="modal" href="#hospital">Hospitals</a></li>
                    </ul>
                  </li>  
                </ul>
              </div> 
            </div>
          </nav>
        </div>
      </div>
    </header>

    <!-- Modal Receiver login -->
    <div class="modal fade" id="receiver" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 100px;">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Receiver Login</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post">
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" name="em" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="pass" class="form-control" id="exampleInputPassword1" placeholder="Password">
                <small id="emailHelp" class="form-text text-muted">Never share your password with anyone else.</small>
              </div>
              <button type="submit" name="abcd" class="btn btn-primary">Submit</button>
            </form>
          </div>
          <div class="modal-footer">
            <p>If you don't have an account</p><button type="button" class="primary_btn" onclick="window.location.href='userreg.php'">Register Here</button>
          </div>
          <?php

          if(isset($_POST['abcd'])){
            $uadmin = $_POST['em'];
            $upass =($_POST['pass']);


            $v = mysqli_query($bloodbank,"SELECT * FROM users WHERE email = '$uadmin' AND password ='$upass'") or die(mysqli_error($bloodbank));

            if(mysqli_num_rows($v)==1){


              $_SESSION['user'] = mysqli_fetch_array($v);

            ?>  
              <script>
                window.location = 'user/afteruserlogin.php';
              </script>

            <?php
            }else {
              ?>
              <script>
              alert("Invalid User");
              </script>
              <?php
            }


          }


          ?>
        </div>
      </div>
    </div>



    <!-- Modal hospital login -->
    <div class="modal fade" id="hospital" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 100px;">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Hospital Login</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post">
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" name="em" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="pass" class="form-control" id="exampleInputPassword1" placeholder="Password">
                <small id="emailHelp" class="form-text text-muted">Never share your password with anyone else.</small>
              </div>
              <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
          <div class="modal-footer">
            <p>If you don't have  accout</p><button type="button" class="primary_btn" onclick="window.location.href='hospitalreg.php'">Register Here</button>
          </div>
          <?php

          if(isset($_POST['submit'])){
            $uadmin = $_POST['em'];
            $upass =($_POST['pass']);


            $v = mysqli_query($bloodbank,"SELECT * FROM hospital WHERE email = '$uadmin' AND password ='$upass'") or die(mysqli_error($bloodbank));

            if(mysqli_num_rows($v)==1){

              $_SESSION['hospital'] = mysqli_fetch_array($v);
            ?>  
              <script>
                location.replace("hospital/afterhospitallogin.php")
              </script>

            <?php
            }else {
              ?>
              <script>
              alert("Invalid User");
              </script>
              <?php
            }


          }


          ?>
        </div>
      </div>
    </div>


    <!-- ================ End Header ===================== -->

    <!--================ Home Banner Area =================-->
    <section class="home_banner_area">
      <div class="banner_inner">
        <div class="container">
          <div class="banner_content">
            
            <h2>Donate your blood for a reason,<br> let the reason be life</h2>
            
            <button type="button" class="primary_btn mr-20" onclick="window.location.href='donation.php'">
              Donate
            </button>
            <button type="button" class="primary_btn yellow_btn text-white" onclick="window.location.href='availability.php'">
              Get Blood
            </button>
          </div>
        </div>
      </div>
    </section>
    <!--================ End Home Banner Area =================-->

    <!--================ Start Our Services =================-->
    <section class="causes_area">
      <div class="container">
        <div class="main_title">
          <h2>Our Services</h2>
          <p>Our main aim is to connect, digitize and streamline the work flow of blood banks across the nation.</p>
        </div>
        <div class="row">
          <div class="col-lg-6 col-md-6">
            <div class="single_causes">
              <h4>Blood Availability</h4>
              <img src="images/img1.jpg" alt="" class="col-lg-12 col-md-12">
              <button type="button" class="primary_btn mr-20" onclick="window.location.href='availability.php'">
                Check Availability
              </button>
            </div>
          </div>
          <div class="col-lg-6 col-md-6">
            <div class="single_causes">
              <h4>Blood Donation Camps</h4>
              <img src="images/blooddonation.jpg" alt="" class="col-lg-12 col-md-12">
              <button type="button" class="primary_btn mr-20" onclick="window.location.href='donation.php'">
                Register for Donation
              </button>
            </div>
          </div>
        
        </div>
      </div>
    </section>
    <!--================ End Department Area =================-->


    <!-- =============== Facts Area ========================== -->
    <section>
      <div class="facts">
        <div class="main_title">
          <h2 style="background-color: red; color: white;">LEARN ABOUT DONATION</h2>
        </div>
        <div class="col-lg-6 col-md-6 float-left">
            <br>
            <img src="images/donationfact.webp" alt="" class="col-lg-12 col-md-12">
            <br><br><br>
            <p>After donating blood, the body works to replenish the blood loss. This stimulates the production of new blood cells and in turn, helps in maintaining good health.</p>
            <br>
            <button type="button" class="primary_btn mr-20" onclick="window.location.href='donation.php'">
              Register for Donation
            </button>
        </div>

        <div class="col-lg-6 col-md-6 float-right">
          <table class="table">
            <h3 style="background-color: red; text-align: center; color: white;">Compatible Blood Type Donors</h3>
            <thead>
              <tr>
                <th scope="col"> Blood Type </th>
                <th scope="col"> Donate Blood To </th>
                <th scope="col"> Receive Blood From </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td> A+</td>
                <td> A+, AB+</td>
                <td>  A+, A-, O+, O-</td>
              </tr>
              <tr>
                <td>O+</td>
                <td>O+, A+, B+, AB+</td>
                <td>O+, O-</td>
              </tr>
              <tr>
                <td>B+</td>
                <td>  B+, AB+</td>
                <td>  B+, B-, O+, O-</td>
              </tr>
              <tr>
                <td>AB+</td>
                <td>  AB+</td>
                <td>  Everyone</td>
              </tr>
              <tr>
                <td>A-</td>
                <td>  A+, A-, AB+, AB-</td>
                <td>  A-, O- </td>
              </tr>
              <tr>
                <td> O- </td>
                <td>  Everyone </td>
                <td> O- </td>
              </tr>
              <tr>
                <td> B- </td>
                <td>  B+, B-, AB+, AB- </td>
                <td>  B-, O- </td>
              </tr>
              <tr>
                <td> AB- </td>
                <td> AB+, AB- </td>
                <td>  AB-, A-, B-, O- </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </section>
    <hr>



    <!-- =============== End Facts Area ====================== -->
    <!--================ Start CTA Area =================-->
  <div class="cta-area section_gap overlay">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-7">
          
        </div>
      </div>
    </div>
  </div>
  <!--================ End CTA Area =================-->

    <!-- ================ Footer ====================== -->

    <div class="footer-clean">
        <footer>
            <div class="container">
                <div class="row justify-content-center" style="color: white;">
                    <div class="col-sm-4 col-md-3 item">
                        <h3>Services</h3>
                        <ul>
                            <li><a href="availability.php">Online Blood Request</a></li>
                            <li><a href="availability.php">Check Blood Availability</a></li>
                            <li><a href="donation.php">Donation Camps</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-4 col-md-3 item">
                        <h3>Login</h3>
                        <ul>
                            <li><a href="#">Hospital</a></li>
                            <li><a href="#">User Login</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-4 col-md-3 item">
                        <h3>Contact Us</h3>
                        <ul>
                            <li><i class="ion-ios-telephone"> </i> : <a href="#"> 999XXXX9X9X</a></li>
                            <li><i class="ion-ios-location"> </i> : <a href="#"> Blood Bank, Sector 5, Kolkata, West-Bengal 700102</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-instagram"></i></a>
                    </div>

                    <div>
                      <br>
                      <p class="" style="color: white;">Made to gift life | All copyright Company Name © 2021</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- =================End Footer ==================== -->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>