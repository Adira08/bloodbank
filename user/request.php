 <?php include ('../config.php');
$hosid=$_GET['request'];

 if (! $_SESSION['user']) {
  header( 'Location: ../index.php' );
  die();
}
    $name=$_SESSION['user']['name'];
    $id=$_SESSION['user']['id'];
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
    <link rel="stylesheet" type="text/css" href="../css/regstyle.css">
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
                  <li class="nav-item"><a class="nav-link" href="afteruserlogin.php">Home</a></li>
                  <li class="nav-item"><a class="nav-link" href="availability.php">Blood Stock</a></li> 
                  <li class="nav-item"><a class="nav-link" href="donation.php">Donation Camps</a></li>
                  <li class="nav-item"><a class="nav-link" href="myrequest.php">My Requests</a></li> 
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


    <!-- ================ End Header ===================== -->


    <!-- ====================Form ==================== -->
  
    <div class="formbody">
      <form method="post">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="name" name="name" class="form-control" value="<?php echo $_SESSION['user']['name']; ?>">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Email Address</label>
          <input type="email" name="email" class="form-control" value="<?php echo $_SESSION['user']['email']; ?>">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">mobile Number</label>
          <input type="phone" name="phone" class="form-control" value="<?php echo $_SESSION['user']['phone']; ?>">
        </div>
        <div class="form-group">
          <label for="blood-group" class=" col-form-label">Request For Blood Group</label>
          <div class="">
            <select class="form-control" name="group" id="exampleFormControlSelect1">
              <option></option>
              <option>A+</option>
              <option>O+</option>
              <option>B+</option>
              <option>AB+</option>
              <option>A-</option>
              <option>O-</option>
              <option>B-</option>
              <option>AB-</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Location</label>
          <textarea type="phone" name="location" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Address where you want blood"></textarea>

        </div>
        <div class="form-group">
          <input type="hidden" name="userid" class="form-control" value="<?php echo $id; ?>">
        </div>
        <div class="form-group">
          <input type="hidden" name="hospitalid" class="form-control" value="<?php echo $hosid; ?>">
        </div>
        <div class="form-group">
          <input type="hidden" name="status" class="form-control" value="Requested">
        </div>

        <button type="submit" name="abcd" class="primary_btn">Request</button>
      </form>
    </div>
    <?php

    if(isset($_POST['abcd'])){
      $name = $_POST['name'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $bloodgroup =$_POST['group'];
      $location = $_POST['location'];
      $userid = $_POST['userid'];
      $hospitalid = $_POST['hospitalid'];
      $status = $_POST['status'];


            # prepare sql statement as string
      $sql = "INSERT INTO request VALUES ('0','$name','$email','$phone','$bloodgroup','$location','$userid','$hospitalid','$status')";

        # now execute the above string
      $exec = mysqli_query($bloodbank,$sql) or die(mysqli_error($bloodbank));


      if($exec){
        echo "<script>alert('Request Successfully sent.');window.location.href='availability.php';</script>";

        exit;

      }else {
        echo "<script>alert('We are unable to sent requent. Please try again after some time');window.location.href='afteruserlogin.php';</script>";
      }


    }


    ?>

    



    <!-- ==================== End Form ==================== -->

    <!--================ Start CTA Area =================-->
  <div class="cta-area">
    <div class="container">
          
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
                        <p class="copyright">Company Name © 2021</p>
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