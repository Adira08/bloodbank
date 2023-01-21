<?php include ('../config.php');

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


    <!-- ====================== Donation camp info =============================== -->

    <section>
      <div class="donation-table">
        <div class="container">
          <?php

            $exec = mysqli_query($bloodbank,"SELECT * FROM availability") or die(mysqli_error($bloodbank));

            //var_dump($exec);
            $count = mysqli_num_rows($exec);
            // echo $count;

            # to fetch data from db use mysqli_fetch_array($exec)
            if($count>0){
          ?>
          <table class="table">
            <h4 style="color: white; background-color: red; text-align: center;">Stock Avialibility in Hospitals</h4>
            <thead>
              <tr>
                <th scope="col">Hospital Name</th>
                <th scope="col">category</th>
                <th scope="col">Available Samples</th>
                <th scope="col"></th>
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

                <td><button type="button" class="primary_btn"><a href="request.php?request=<?php echo $row['id'] ?>" style="color: white;" onmouseover="this.style.color='red'" onmouseout="this.style.color='white'">Request</a></button></td>
              </tr>
            </tbody>
            <?php } ?>
          </table>


        </div>
      </div>/
    </section>


    <!-- ======================== End Donation camp info================================= -->

    <!-- ======================Modal Request =========================== -->
    <div class="modal fade" id="request" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 100px;">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Request Blood Sample</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="email" name="name" class="form-control" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Email Address</label>
                <input type="email" name="email" class="form-control" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">mobile Number</label>
                <input type="phone" name="phone" class="form-control" placeholder="Mobile Number">
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
                <input type="hidden" name="userid" class="form-control" value="<?php echo $id ?>">
              </div>
              <div class="form-group">
                <input type="" name="hospitalid" class="form-control" value="<?php echo $row['hospitalid'] ?>">
              </div>
              
              <button type="submit" name="abcd" class="btn btn-primary">Request</button>
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


            # prepare sql statement as string
          $sql = "INSERT INTO request VALUES ('0','$name','$email','$phone','$bloodgroup','$location','$userid')";

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
        </div>
      </div>
    </div>
    <?php

              }else {
                echo "No records found";
              }
          



          ?>

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