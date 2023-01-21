<?php include ('../config.php');

 if (! $_SESSION['hospital']) {
  header( 'Location: ../index.php' );
  die();
}
    $name=$_SESSION['hospital']['name'];
    $id=$_SESSION['hospital']['id'];
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
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/responsive.css">
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
              <a class="navbar-brand logo_h" href="afteruserlogin.php"><img src="../images/logo.jpg" alt="" height="50" width="100"></a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                <ul class="nav navbar-nav menu_nav ml-auto">
                  <li class="nav-item"><a class="nav-link" href="afterhospitallogin.php">Home</a></li> 
                  <li class="nav-item"><a class="nav-link" href="availabilityupdate.php">Availability</a></li>
                  <li class="nav-item"><a class="nav-link" href="request.php">Requests</a></li> 
                  <li class="nav-item submenu dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $name; ?></a>
                    <ul class="dropdown-menu">
                      <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                    </ul>
                  </li>  
                </ul>
              </div> 
            </div>
          </nav>
        </div>
      </div>
    </header>



    <!-- ================ End Header ===================== -->

    <!-- ====================== Donation camp info =============================== -->

    <section>
      <div class="donation-table">
        <div class="container">
          <?php

            $exec = mysqli_query($bloodbank,"SELECT * FROM availability WHERE hospitalid=$id ORDER BY id DESC") or die(mysqli_error($bloodbank));

            //var_dump($exec);
            $count = mysqli_num_rows($exec);
            // echo $count;

            # to fetch data from db use mysqli_fetch_array($exec)
            if($count>0){
          ?>
          <table class="table">
            <h4 style="color: white; background-color: red; text-align: center;">Blood Stock Availability</h4>
            <thead>
              <tr>
                <th scope="col">Hospital</th>
                <th scope="col">Category</th>
                <th scope="col">Avilable Blood</th>
                <th scope="col">Update Avilability</th>
              </tr>
            </thead>
            <?php 
              while($row = mysqli_fetch_array($exec)) {
            ?>
            <tbody>
              <tr>
                <td><?php echo $row['hospital'] ?></td>
                <td><?php echo $row['category'] ?></td>
                <td><?php echo $row['stock'] ?></td>
                <td><button type="button" class="primary_btn"><a href="updateavailability.php?update=<?php echo $row['id']; ?>" style="color: white;" onmouseover="this.style.color='red'" onmouseout="this.style.color='white'">Update</a></button></td>

              </tr>
            </tbody>
            <?php } ?>
          </table>
          <?php


              }else {
                ?>
                <button type="button" class="primary_btn"><a href="addbloodstock.php" style="color: white;" onmouseover="this.style.color='red'" onmouseout="this.style.color='white'">Update</a></button>
                <?php
              }



          ?>

        </div>
      </div>/
    </section>

    <!-- ======================== End Donation camp info================================= -->

    
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
                        <h3>Links</h3>
                        <ul>
                            <li><a href="afterhospitallogin.php">Home</a></li>
                            <li><a href="availabilityupdate.php">Availability</a></li>
                            <li><a href="request.php">Requests</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-4 col-md-3 item">
                        <h3>Login</h3>
                        <ul>
                            <li><a href="logout.php">Logout</a></li>
                            <li><a href="#">Change Password</a></li>
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