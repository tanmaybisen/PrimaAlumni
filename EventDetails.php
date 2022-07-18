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
 
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
   
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <title>EventDetails</title>
</head>





<style>
  @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap');
body {
  margin: 0;
  min-width: 250px;
}

/* Include the padding and border in an element's total width and height */
* {
  box-sizing: border-box;
}
/* Style the header */
.headerr {
  background-color: #f44336;
  padding: 30px 40px;
  color: white;
  text-align: center;
}

/* Clear floats after the header */
.headerr:after {
  content: "";
  display: table;
  clear: both;
}
/* Style the input */
input {
  margin: 0;
  border: none;
  border-radius: 0;
  width: 75%;
  padding: 10px;
  float: left;
  font-size: 16px;
}

/* Style the "Add" button */
.addBtn {
  padding: 10px;
  width: 25%;
  background: #d9d9d9;
  color: #555;
  float: left;
  text-align: center;
  font-size: 16px;
  cursor: pointer;
  transition: 0.3s;
  border-radius: 0;
}

.addBtn:hover {
  background-color: #bbb;
}
.contact-footer{
    padding: 2rem 0;
    background: #000;
}
.contact-footer h3{
    font-size: 1.3rem;
    color: #fff;
    margin-bottom: 1rem;
    text-align: center;
}
</style>


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

<div id="myDIV" class="headerr">
  <h2 style="margin:5px">Upcoming Events</h2>
  <input type="text" id="myInput" placeholder="Title">
  <span onclick="window.location.href='eventadd.php'" class="addBtn">Add</span>
  <input type="text" id="myInput" placeholder="">
  <span onclick="window.location.href='eventupdate.php'" class="addBtn">Update</span>
</div> 
    <table class="table table-striped" >
        <thead>
          <tr>
            <th scope="col">EName</th>
            <th scope="col">Organiser</th>
            <th scope="col">Venue</th>
            <th scope="col">Date</th>
            <th scope="col">Time</th>
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

              $sql = "SELECT * FROM events ";
              $result = $con->query($sql);
              if ($result->num_rows > 0) 
              {
                while($row = $result->fetch_assoc()) 
                {
                  echo '
                        <tr>
                            <td>'.$row['Ename'].'</td>
                            <td>'.$row['Organiser'].'</td>
                            <td>'.$row['Venue'].'</td>
                            <td>'.$row['Date'].'</td>
                            <td>'.$row['Time'].'</td>
                        </tr>
                  ';    
                }
              }
              $con->close();
            }
            ?>          
        </tbody>
    </table>
       


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
