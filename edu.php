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
      $cname = $_POST['Course'];
      $sname = $_POST['School'];
      $grade = $_POST['Grade'];
      $y  = $_POST['Year'];
      $d  = $_POST['Desc'];
      $username = $_SESSION['username'];

      $sql = "INSERT INTO `edudata` VALUES ('$cname','$sname','$grade','$y','$d','$username')";
      $con->query($sql);

    }
    mysqli_close($con);
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EducationalDetails</title>
    <link rel="stylesheet" href="style.css">
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

                  <div>
                    <li class="nav-item"> 
                      <a href="personal.php" style="text-decoration:none; color:black;"> 
                        &emsp;&emsp;&emsp;&emsp;Personal Details
                      </a>
                    </li> 
                  </div>
                  
                  <br>

                  <div style="background-color: white; border-radius: 50px 0px 0px 50px ">
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

          
            <div class="col" style="padding: 50px;">
            
            <form  Method= "post" action="./edu.php">    
              <div class="row">
                <div class="col-md-3">
                  Course
                </div>
                <div class="col">
                  <input type="text" id="Course" name="Course" placeholder="Course" style="width: 600px;">
                </div>
              </div>

              <br>

              <div class="row">
                <div class="col-md-3">
                  School/University Name:
                </div>
                <div class="col">
                  <input type="text" id="School" name="School" placeholder="Ex. K V Bhandara" style="width: 600px;">
                </div>
              </div>

              <br>

              <div class="row">
                <div class="col-md-3">
                  Grade / Score
                </div>
                <div class="col">
                  <input type="text" id="Grade" name="Grade" placeholder="Ex. 8.9 CGPA or 80%" style="width: 100px;">
                </div>
              </div>

              <br>

              <div class="row">
                <div class="col-md-3">
                  Pass out Year:
                </div>
                <div class="col">
                  <input type="text" id="Year" name="Year" placeholder="2023" style="width: 100px;">
                </div>
              </div>

              <br>

              <div class="row">
                <div class="col-md-3">
                  Any incident you want to mention:
                </div>
                <div class="col">
                  <input type="text" id="Desc" name="Desc" placeholder="Ex. xyz" style="width: 600px;">
                </div>
              </div>

              <br>

              <div class="row" style="justify-content: center;">
              <button class="btn btn-success">ADD</button>
              </div>              
              <hr>
              
            </form>
            
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

              $sql = "SELECT * FROM edudata where username='".$username."'";
              $result = $con->query($sql);
              if ($result->num_rows > 0) 
              {
                while($row = $result->fetch_assoc()) 
                {
                  echo '
                      <div class="card text-white bg-danger mb-3" style="max-width:85%;">
                      <div class="card-header" style="font-size:110%">'.$row['cname'].'</div>
                      <div class="card-body">
                        <h5 class="card-title">School/College: '.$row['sname'].'</h5>
                        <p class="card-text">
                          Grade:  '.$row['score'].' <br>
                          Year:    '.$row['year'].'  <br>
                          Details: '.$row['detail'].'
                        </p>
                      </div>
                      </div>

                      <br><br>
                  ';    
                }
              }
              $con->close();
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