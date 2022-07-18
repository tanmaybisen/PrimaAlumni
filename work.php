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

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $title   = $_POST['title'];
        $comname = $_POST['comname'];
        $d       = $_POST['desc'];
        $syear   = $_POST['syear'];
        $eyear   = $_POST['eyear'];
        $username= $_SESSION['username'];

        $sql = "INSERT INTO workdata VALUES ('$title','$comname','$d','$syear','$eyear','$username')";
        if ($con->query($sql) === TRUE) {
        } else {
          echo "Error: " . $sql . "<br>" . $con->error;
        }

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
    <title>WorkDetails</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>  	
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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

                  <div>
                    <li class="nav-item"> 
                      <a href="edu.php" style="text-decoration:none; color:black;"> 
                        &emsp;&emsp;&emsp;&emsp;Educational Details
                      </a>
                    </li> 
                  </div>

                  <br>

                  <div style="background-color: white; border-radius: 50px 0px 0px 50px ">
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

          <div class="col" style=" padding: 50px;">    
          <form method="post" action="./work.php">
            <div class="row">
              <div class="col-md-3">
                Job Title:
              </div>
              <div class="col">
                <input type="text" id="Job" name="title" placeholder="Ex Data Scientist" style="width: 600px;">
              </div>
            </div>

            <br>

            <div class="row">
              <div class="col-md-3">
                Company Name:
              </div>
              <div class="col">
                <input type="text" id="Company" name="comname" placeholder="Ex. PrimaThink" style="width: 600px;">
              </div>
            </div>

            <br>

            <div class="row">
              <div class="col-md-3">
                Description
              </div>
              <div class="col">
                <textarea id="Desc" name="desc" placeholder="Ex. xyz" rows="4" cols="80"></textarea>
              </div>
            </div>

            <br>

            <div class="row">
              <div class="col-md-3">
                Working from:
              </div>
              <div class="col">
                <input type="number" id="SYear"  name="syear"  placeholder="2023" style="width: 100px;">
              </div>
            </div>

            <br>

            <div class="row">
              <div class="col-md-3">
                Worked till:
              </div>
              <div class="col">
                <input type="number" id="TYear" name="eyear" placeholder="2023" style="width: 100px;">
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

                $sql = "SELECT * FROM workdata where username='".$username."'";
                $result = $con->query($sql);
                if ($result->num_rows > 0) 
                {
                  while($row = $result->fetch_assoc()) 
                  {
                    echo '
                        <div class="card text-white bg-danger mb-3" style="max-width:85%;">
                        <div class="card-header" style="font-size:110%">'.$row['comname'].'</div>
                        <div class="card-body">
                          <h5 class="card-title">Job Title: '.$row['title'].'</h5>
                          <p class="card-text">
                            Experience: '.$row['description'].' <br><br>
                            working years: '.$row['syear'].' - '.$row['eyear'].'
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