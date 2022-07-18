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
    mysqli_close($con);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style1.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <title>jobsDetails</title>
</head>
<body>
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
<br>
<br>

    <table class="table table-striped" >
        <thead>
          <tr>
            <th scope="col">Company Name</th>
            <th scope="col">Description</th>
            <th scope="col">Starting_year</th>
            <th scope="col">Ending_year</th>
            <th scope="col">Details</th>
          </tr>
        </thead>

        <tbody>
            <?php
            if(isset($_SESSION['loggedin']) || $_SESSION['loggedin']==true)
            {
              //$username = $_SESSION['username'];
              $server = "localhost";
              $user = "root";
              $password = "";
              $database = "users";
              $con = mysqli_connect($server, $user, $password, $database);

              if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                exit();
              }

              $sql = "SELECT * FROM jobdata ";
              $result = $con->query($sql);
              if ($result->num_rows > 0) 
              {
                while($row = $result->fetch_assoc()) 
                {
                  echo '
                        <tr>
                            <td>'.$row['CompanyName'].'</td>
                            <td>'.$row['Description'].'</td>
                            <td>'.$row['StartingDate'].'</td>
                            <td>'.$row['EndingDate'].'</td>
                            <td><a href="'.$row['Details'].'">Apply here!</a></td>
                        </tr>
                  ';    
                }
              }
              $con->close();
            }
            ?>          
        </tbody>
    </table>
    <br>
    <br>

   <center> <button id="jad" onclick="window.location.href='jobsadd.php'" class="btn btn-success">ADD JOB</button>
    <button id="jup" onclick="window.location.href='jobsUpdate.php'" class="btn btn-success">UPDATE JOB</button></center>
    <br>
    <br>
    
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
    </section>

    <script type="text/javascript">
    if(window.history.replaceState){
      window.history.replaceState(null, null, window.location.href);
    }
    </script>
</body>
</html>