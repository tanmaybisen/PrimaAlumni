<?php


session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
  header("location: login.php");
  exit;//to exit php code
}

  
  if(isset($_SESSION['loggedin']) || $_SESSION['loggedin']==true)
  {
    $server = "localhost";
    $user = "root";
    $password = "";
    $database = "users";
    $con = mysqli_connect($server, $user, $password, $database);
    
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      exit();
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $fname    = $_POST['fname'];
        $lname    = $_POST['lname'];
        $email    = $_POST['email'];
        $dob      = $_POST['dob'];
        $pno      = $_POST['pno'];
        $country  = $_POST['country'];
        $state    = $_POST['state'];
        $city     = $_POST['city'];
        $username = $_SESSION['username'];

        $sql = "Update perdata set  
                            fname = '".$fname."',
                            lname = '".$lname."',
                            email = '".$email."',
                            dob = '".$dob."',
                            pno = '".$pno."',
                            country = '".$country."',
                            state = '".$state."',
                            city = '".$city."' 
                  where username = '".$username."' ";
      if ($con->query($sql) === TRUE) {
      } else {
        echo "Error: " . $sql . "<br>" . $con->error;
      }

      }
      // mysqli_close($con);
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PersonalDetails</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>  	
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        #navbar_top {
        padding: 20px;
        font-size: 20px;
        }

        #logo {
        font-weight: 500;
        font-size: 20px;
        letter-spacing: 2px;
        }

        .fixed-top {
        top: -40px;
        transform: translateY(40px);
        transition: transform .3s;
        }
    </style>

    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function () {

        window.addEventListener('scroll', function () {

            if (window.scrollY > 200) {
            document.getElementById('navbar_top').classList.add('fixed-top');
            // add padding top to show content behind navbar
            navbar_height = document.querySelector('.navbar').offsetHeight;
            document.body.style.paddingTop = navbar_height + 'px';
            } else {
            document.getElementById('navbar_top').classList.remove('fixed-top');
            // remove padding top from body
            document.body.style.paddingTop = '0';
            }
        });
        });
    </script>
<link rel="stylesheet" href="style.css">
</head>

<div class="header">
  <a href="#default" class="logo">PrimaAlumni</a>
  <div class="header-right">
    <a id="logout" href="./logout.php">Logout</a>
    <a id="welcome" href="./welcome.php">Home</a>
    <a href="./EventDetails.php">Events</a>
    <a href="./jobsDetails.php">Jobs</a>
    <a href="./personal.php">Profile</a> 
    <a href="./index.php">Contact Us</a>
  </div>
</div>

<body>
        <div class="row">
          <div class="col-md-3" style="background-color: bisque;  font-size: 150%; padding-left: 25px; padding-right: 0px;" >
            <!-- ============= Left Nav Bar Start =============-->
              <nav class="navbar-collapse fixed-left" >                
                <ul class="navbar-nav"> 
                  
                  <br>

                  <div style="background-color: white; border-radius: 50px 0px 0px 50px ">
                    <li class="nav-item"> 
                      <a href="personal.php" style="text-decoration:none; color:black;"> 
                        &emsp;&emsp;&emsp;&emsp;Personal Details
                      </a>
                    </li> 
                  </div>
                  
                  <br>

                  <div>
                    <li class="nav-item"> 
                      <a href="edu.php" style="text-decoration:none; color:black;"> 
                        &emsp;&emsp;&emsp;&emsp;Educational Details
                      </a>
                    </li> 
                  </div>

                  <br>

                  <div>
                    <li class="nav-item"> 
                      <a href="work.php" style="text-decoration:none; color:black;"> 
                        &emsp;&emsp;&emsp;&emsp;Work Details
                      </a>
                    </li> 
                  </div>

                  <br>

                </ul>
              </nav>               
            <!-- ============= Left Nav Bar End =============-->
          </div>

          <div class="col" >
            <?php          
            if(isset($_SESSION['loggedin']) || $_SESSION['loggedin']==true)
            {
              $username = $_SESSION['username'];
              $server = "localhost";
              $user = "root";
              $password = "";
              $database = "users";
              $con = mysqli_connect($server, $user, $password, $database);

              if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                exit();
              }

              $sql = "select * from perdata where username='$username'";
              $result = $con->query($sql);
              if ($result->num_rows >= 0) 
              {
                while($row = $result->fetch_assoc()) 
                {
                    echo "
                    
                          <form action=\"./personal.php\" method=\"post\">
              
                          <div class=\"row\" >

                            <div class=\"col-md-6\" style=\"margin-top:30px; margin-left: 20px; font-size:110%; padding: 10px;\">
                              
                              
                              <div class=\"row\">
                                <div class=\"col-md-3\">
                                  First name: 
                                </div>
                                <div class=\"col\">
                                  <input type=\"text\" id=\"fname\" name=\"fname\" placeholder=\"First Name\" style=\"width: 400px;\" value=".$row['fname']." >   <br><br>
                                </div>
                              </div>

                              <br>

                              <div class=\"row\">
                                <div class=\"col-md-3\">
                                  Last name:
                                </div>
                                <div class=\"col\">
                                  <input type=\"text\" id=\"lname\" name=\"lname\" placeholder=\"Last Name\" style=\"width: 400px;\" value=".$row['lname']." >   <br><br>
                                </div>
                              </div>

                              <br>
                              
                              <div class=\"row\">
                                <div class=\"col-md-3\">
                                  Email:
                                </div>
                                <div class=\"col\">
                                  <input type=\"text\" id=\"email\" name=\"email\" placeholder=\"email@email.email\" style=\"width: 400px;\" value=".$row['email'].">   <br><br>
                                </div>
                              </div>

                              <br>
                              
                              <div class=\"row\">
                                <div class=\"col-md-3\">
                                  DOB 
                                </div>
                                <div class=\"col\">
                                  <input type=\"date\" id=\"dob\" name=\"dob\" style=\"width: 300px;\" value=".$row['dob'].">   <br><br>
                                </div>
                              </div>
                              
                              <br>
                              
                              <div class=\"row\">
                                <div class=\"col-md-3\">
                                  Phone no.:
                                </div>
                                <div class=\"col\">
                                  <input type=\"text\" id=\"pno\" name=\"pno\" placeholder=\"0123456789\" style=\"width: 300px;\" value=".$row['pno'].">   <br><br>
                                </div>
                              </div>

                              <br>
                              
                              <div class=\"row\">
                                <div class=\"col-md-3\">
                                  Country:
                                </div>
                                <div class=\"col\">
                                  <input type=\"text\" id=\"Country\" name=\"country\" placeholder=\"Country\" style=\"width: 300px;\" value=".$row['country'].">   <br><br>
                                </div>
                              </div>

                              <br>
                              
                              <div class=\"row\">
                                <div class=\"col-md-3\">
                                  State:
                                </div>
                                <div class=\"col\">
                                  <input type=\"text\" id=\"state\" name=\"state\" placeholder=\"State\" style=\"width: 300px;\" value=".$row['state'].">   <br><br>
                                </div>
                              </div>

                              <br>
                              
                              <div class=\"row\">
                                <div class=\"col-md-3\">
                                  City: 
                                </div>
                                <div class=\"col\">
                                  <input type=\"text\" id=\"city\" name=\"city\" placeholder=\"City\" style=\"width: 300px;\" value=".$row['city'].">   <br><br>
                                </div>
                              </div>

                              <br>
                                <center>
                                  <button type=\"submit\" class=\"btn btn-success\" value=\"submit\">Save</button>
                                </center>
                            </div>
                          </div>
                    </form>


                    ";
                }
              }
              mysqli_close($con);
            }
            ?>
          </div> 
        </div> 
</body>
<div class = "contact-footer">
        <h3>Follow Us</h3>
        <div class = "social-links">
          <a href = "https://www.facebook.com/PrimaThink" class = "fab fa-facebook-f"></a>
          <a href = "https://twitter.com/primathink" class = "fab fa-twitter"></a>
          <a href = "https://www.instagram.com/primathink/?hl=en" class = "fab fa-instagram"></a>
          <a href = "https://www.linkedin.com/company/primathink/" class = "fab fa-linkedin"></a>
          <a href = "https://www.youtube.com/channel/UCwHxDlYzwlFpl-hZ_WwJ6Vw" class = "fab fa-youtube"></a>
        </div>
      </div>
</html>