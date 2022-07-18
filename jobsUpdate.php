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
      $CompanyName  = $_POST['CompanyName'];
      $Description  = $_POST['Description'];
      $StartingDate = $_POST['StartingDate'];
      $EndingDate   = $_POST['EndingDate'];
      $Details      = $_POST['Details'];
      $sql = "UPDATE jobdata SET Description='".$Description."',StartingDate='".$StartingDate."',EndingDate='".$EndingDate."',Details='".$Details."' where CompanyName='$CompanyName'";

    $con->query($sql);
  }
    mysqli_close($con);
  }
?> 

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Jobs</title>
    <link rel="stylesheet" href="style1.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
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


</div>
  <div>
    <main>
      <br>
      <br>
    <form  Method= "post" action="./jobsUpdate.php">    
      <div class="row">
        <div class="col-sm-3">
          Company Name
        </div>
        <div class="col">
          <input type="text" id="CompanyName" name="CompanyName" placeholder="Enter original Company Name" style="width: 400px;">
        </div>
      </div>

      <br>

      <div class="row">
        <div class="col-md-3">
          Description
        </div>
        <div class="col">
          <textarea id="Description" name="Description" placeholder="Enter New Description" rows="4" cols="80"></textarea>
        </div>
      </div>

      <br>

      <div class="row">
        <div class="col-md-3">
          Starting Date: 
        </div>
        <div class="col">
          <input type="text" id="StartingDate" name="StartingDate" placeholder="Enter New StartingDate in dd-mm-yyyy format" style="width: 400px;">
        </div>
      </div>

      <br>

      <div class="row">
        <div class="col-md-3">
          Ending Date:
        </div>
        <div class="col">
          <input type="text" id="EndingDate" name="EndingDate" placeholder="Enter New EndingDate in dd-mm-yyyy format" style="width: 400px;">
        </div>
      </div>

      <br>

      <div class="row">
        <div class="col-md-3">
          Details
        </div>
        <div class="col">
          <textarea id="Details" name="Details" placeholder="Enter New Details" rows="4" cols="80"></textarea>
        </div>
      </div>

      <br>

      <div class="row" style="justify-content: center;">
      <button class="btn btn-success">UPDATE</button>
      </div>        
    </form>
    <br>
    <br>
</main>
  </div>
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
</html>