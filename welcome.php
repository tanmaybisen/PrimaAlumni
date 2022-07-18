<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;//to exit php code
}

//edit profile php code
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/_dbconnect.php';

    //get edited details from filled form in modal
    $username = $_POST["username"];
    $email = $_POST["email"];
    $fname = $_POST["fname"];
    $quali = $_POST["quali"];
    $yop = $_POST["yop"];
    $dob = $_POST["dob"];
    
    //hash before storing password
    $password = $_POST["password"];
    $hash=password_hash($password,PASSWORD_DEFAULT); 

    //wrtie update query
    // $sql = "Select * from alumni where username='$username'";

    $sql = "update alumni set 
    password='$hash', email='$email', fullname='$fname', qualification='$quali', yop='$yop', dob='$dob' 
    where username='$username'";

    $result = mysqli_query($conn, $sql);
    if($result==true){
        echo ' <div class="alert alert-success alert-dismissible fade show my-4" role="alert">
        <strong>Success!</strong> Profile updated successfully!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        </div> ';
    }else{
        echo ' <div class="alert alert-danger alert-dismissible fade show my-4" role="alert">
        <strong>Oops!</strong> Profile update was unsuccessful! 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        </div> ';   
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- this above meta tag allows us to make our web page responsive by looking at the view port character -->
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS, so below two comments surrounding the links group 'build:css ..' and 'endbuild' are not just comments but they are
        syntax used by "usemin" module, this goup will now be treated as a unit -->
    
    <!-- build:css css/main.css -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap-social/bootstrap-social.css"> 
    <link rel="stylesheet" href="./welcome_styles.css">
    <!-- endbuild -->
    
    
    
    <title>Welcome - <?php echo $_SESSION['username']?></title>
</head>

<body>
    <!-- mr-auto = means right margin should to set as much as possible , contents will be pushed as left as possible -->
    <!-- nav-item = display horizontally as links in nav  bar , nav-link in anchor tag to goto link -->    
    <!-- active = we can explicitly identify one of these links as the activelink -->
    <!-- active class is added to line of the list members, here added to Home -->

    <nav class="navbar navbar-dark navbar-expand-sm fixed-top" >
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a  class="navbar-brand mr-auto" href="#"><img src="img/logo.png" height="30" width="41"></a>
            <div class="collapse navbar-collapse" id="Navbar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active"><a class="nav-link" href="#"> Welcome <?php echo $_SESSION['username']?>!</a></li>
                </ul>
                <span class="navbar-text">
                    <a id="logout" href="./logout.php">         <!-- triggering login modal data-toggle="modal" data-target="#loginModal"-->
                    &nbsp;&nbsp;<span class="fa fa-sign-out"></span> Logout
                    </a>
                </span>
                <span class="navbar-text">
                    <a id="per" href="./personal.php">         <!-- triggering login modal data-toggle="modal" data-target="#loginModal"-->
                    &nbsp;&nbsp;<span class="fa fa-sign-out"></span> User Profile
                    </a>
                </span>
                <span class="navbar-text">
                    <a id="jobs" href="./jobsDetails.php">         <!-- triggering login modal data-toggle="modal" data-target="#loginModal"-->
                    &nbsp;&nbsp;<span class="fa fa-sign-out"></span> Jobs
                    </a>
                </span>
                <span class="navbar-text">
                    <a id="ContactUs" href="./index.php">         <!-- triggering login modal data-toggle="modal" data-target="#loginModal"-->
                    &nbsp;&nbsp;<span class="fa fa-phone"></span> Contact Us
                    </a>
                </span>
                <span class="navbar-text">
                    <a id="events" href="./EventDetails.php">         <!-- triggering login modal data-toggle="modal" data-target="#loginModal"-->
                    &nbsp;&nbsp;<span class="fa fa-sign-out"></span> Events
                    </a>
                </span>
                <span class="navbar-text">
                    <a id="editprofile" data-toggle="modal" data-target="#editprofileModal">&nbsp;
                   <button class="btn btn-warning"><span class="fa fa-edit"></span>Edit profile.</button>
                    </a>
                </span>
            </div>
        </div>
    </nav>

    <!-- editprofile modal -->
    <div id="editprofileModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg" role="content">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Profile!</h4>
                        <button id="cancelB1" type="button" class="close" data-dismiss="modal">
                            &times;   <!-- &times; means a multiplication sign (here used a cross sign to dismiss modal)-->
                        </button>
                </div>
                <div class="modal-body">
                    <center><form action="/root/welcome.php" method="post">
                        <div class="form-col">
                            <div class="form-group col-6">
                                    <label for="username">Username is uneditable:</label>
                                    <input type="text" 
                                    class="form-control form-control-sm mr-1" 
                                    id="username" name="username" placeholder="Username"
                                    value= <?php echo $_SESSION['username']?>
                                    readonly
                                    >
                            </div>

                            <!-- fetch current data from database and display in input fields by default using vaule attribute of input tag , so that user knows what data he had entered earlier -->
                            <?php
                            include 'partials/_dbconnect.php';
                            $user_name=$_SESSION['username'];
                             $sql = "Select * from alumni where username='$user_name'";
                             $result = mysqli_query($conn, $sql);
                             $num = mysqli_num_rows($result);
                             if ($num == 1){
                                 //traversing over the result of  mysqli_query
                                 while($row=mysqli_fetch_assoc($result)){
                                     $f_yop=$row['yop'];
                                     $f_dob=$row['dob'];
                                     $f_qualification=$row['qualification'];
                                     $f_email=$row['email'];
                                     $f_fullname=$row['fullname'];
                                    }
                                }
                            ?>

                            <?php echo '
                            <div class="form-group col-6">
                                    <label  for="email">Email Id</label>
                                    <input type="text" class="form-control form-control-sm mr-1" id="email" name="email" placeholder="Email Id" value="'.$f_email.'">
                            </div>'?>

                            <?php echo '
                            <div class="form-group col-6">
                                <label  for="fname">Full Name</label>
                                <input type="text" class="form-control form-control-sm mr-1" id="fname" name="fname" placeholder="Full Name" value="'.$f_fullname.'">
                            </div>'?>

                            <?php echo '
                            <div class="form-group col-6">
                                    <label  for="quali">Qualification</label>
                                    <input type="text" class="form-control form-control-sm mr-1" id="quali" name="quali" placeholder="Qualification" value="'.$f_qualification.'">
                            </div>'?>
                            
                            <?php echo '
                            <div class="form-group col-6">
                                <label  for="yop">YOP (of latest enrollments)</label>
                                <input type="text" class="form-control form-control-sm mr-1" id="yop" name="yop" placeholder="YOP (YYYY)" value="'.$f_yop.'">
                            </div>
                            '?>

                            <?php echo '
                            <div class="form-group col-6">
                                    <label  for="dob">Date of Birth</label>
                                    <input type="text" class="form-control form-control-sm mr-1" id="dob" name="dob" placeholder="DOB (yyyy-mm-dd)" value="'.$f_dob.'">
                            </div>'?>

                            <div class="form-group col-6">
                                <label  for="password">Edit password (or Enter current password)</label>
                                <input type="password" class="form-control form-control-sm mr-1" id="password" name="password" placeholder="Password" required>
                            </div>

                        </div>
                        <div class="form-row">
                            <button id="cancelB2" type="button" class="btn btn-secondary btn-sm ml-auto" data-dismiss="modal" >Cancel</button>   <!--data-dismiss="modal"-->
                            <button type="submit" class="btn btn-success btn-sm ml-1">Update</button>        
                        </div>
                    </form></center>
                </div>
            </div>
        </div>
    </div>

    <header class="jumbotron">
        <div class ="container">
            <div class="row row-header">
                <div class="col-12 col-sm-6">
                    <h1>Prima Think Web Developement Company</h1>
                    <p>We take inspiration from the World's best designers, and create a unique experience.Design and deliver new digital experiences, revenue streams and business models to meet rising customer expectations and accelerate your growth.</p>
                </div>
                <div class="col-12 col-sm-3 align-self-center">
                    <img src="img/logo.png" class="fluid">
                </div>
            </div>
        </div>
    </header>

    <!-- After login user will reach here, having bypassed athuntication system, here user gets all admin previleges-->
    <!-- your code does here -->

    <div class="container">

        <!-- content 00 -->
        <div class="row row-content align-items-center">
            <a href="./personal.php"><h3><button type="button" class="btn btn-outline-danger" data-mdb-ripple-color="dark">
                Tell us more about you!
            </button></h3></a>
            &nbsp;
            <a href="./EventDetails.php"><h3><button type="button" class="btn btn-outline-primary" data-mdb-ripple-color="dark">
                Add Event details
            </button></h3></a>
            &nbsp;
            <a href="./jobsDetails.php"><h3><button type="button" class="btn btn-outline-warning" data-mdb-ripple-color="dark">
                Add Job details
            </button></h3></a>
            &nbsp;
            <a href="./index.php"><h3><button type="button" class="btn btn-outline-secondary" data-mdb-ripple-color="dark">
            <i class="fa fa-phone fa-lg text-dark"></i>Contact Us
            </button></h3></a>
        </div>

        <!-- content 01 -->
        <div class="row row-content align-items-center">
            <div class="col-12 col-sm-4 order-sm-last col-md-3">
                <a href="https://www.thinkalumni.com/alumni"><h3><button type="button" class="btn btn-outline-dark" data-mdb-ripple-color="dark">
                Find out more.
            </button></h3></a>
            </div>
            <div class="col col-sm order-sm-first col-md">
                <div class="media">
                    <img width="300" hieght="250" class="d-flex mr-3 img-thumbnail align-self-center" src="img/ph_1.png" alt="uf"> <!--mr-3 leave margin to right-->
                    <div class="media-body">
                        <h2 class="mt-0">ALUMNI SERVICES</h2>
                        <p class="d-none d-sm-block">
                        We create and manage alumni networks for Colleges. We provide re-enrolment strategies, alumni engagement and more, in a range of tailorable packages to suit your college’s goals. Find out how our services have helped colleges increase re-enrolments, create banks of testimonials and alumni volunteers.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- content 02 -->
        <div class="row row-content align-items-center">
        <div class="col-12 col-sm-4 order-sm-first col-md-3">
                <a href="https://www.thinkalumni.com/alumni"><h3><button type="button" class="btn btn-outline-dark" data-mdb-ripple-color="dark">
                Find out more.
            </button></h3></a>
            </div>
            <div class="col col-sm col-md">
                <div class="media">
                <div class="media-body">
                    <h2 class="mt-0">DESTINATION SURVEYS</h2>
                    <p class="d-none d-sm-block">
                    Think Alumni provides destination surveys for Further Education Colleges. Our telephone surveys gather destination data to comply with the requirements of the ILR. What’s more, our benchmark data of around 50,000 destinations from across the UK allows your College to demonstrate the efficacy of its courses.
                    </p>
                </div>
                <img width="300" hieght="250"class="d-flex mr-3 img-thumbnail align-self-center" src="img/ph_2.png" alt="pf">
            </div>
            </div>
        </div>

        <!-- content 03 -->
        <div class="row row-content align-items-center">
        <div class="col-12 col-sm-4 order-sm-last col-md-3">
                <a href="https://www.thinkalumni.com/alumni"><h3><button type="button" class="btn btn-outline-dark" data-mdb-ripple-color="dark">
                Find out more.
            </button></h3></a>
            </div>
            <div class="col col-sm order-sm-first col-md">
                <div class="media">
                    <img width="300" hieght="250"class="d-flex mr-3 alignself-center img-thumbnail" src="img/ph_3.png" alt="sf">
                    <div class="mediabody">
                        <h2>ALUMNI CONVERSION APP</h2>
                        <p class="d-none d-sm-block">
                        We source and display multiple, course-specific testimonials directly to visitors browsing your website. Delivered via a pop-up that requires no changes to your page design and guarantees to get noticed. Providing social proof right on your website course pages
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <div class="row ">             
                <div class="col-4 col-sm-2">
                    <h5 class="text-light">Links</h5>
                    <ul class="list-unstyled">
                        <li><a class="text-light" href="#">Home</a></li>
                        <li><a class="text-light" href="./aboutus.php">About</a></li>
                        <li><a class="text-light" href="#">Menu</a></li>
                        <li><a class="text-light" href="#">Contact</a></li>
                    </ul>
                </div>
                <div class="col-7 col-sm-5">
                    <h5 class="text-light">Our Address</h5>
                    <p class="text-light">
		              121, Helaneok Road<br>
		              Clear Water street, main way<br>
		              Delhi<br>
		              <i class="fa fa-phone fa-lg text-light"></i>: +852 1234 5678<br>
                      <i class="fa fa-fax fa-lg"></i>: +852 8765 4321<br>
		              <i class="fa fa-envelope fa-lg"></i>: <a class="text-light" href="mailto:primathink@official.net">primathink@official.net</a>
                    </p>
                </div>
                <div class="col-12 col-sm-4 align-self-center">
                    <!-- align-self-center brings content to center of the row -->
                    <!-- this col 12 above means that it will occupy seperate set of 12 columns stcked below the previous content for extr small screen sizes -->
                    <!-- but for small to extra large  screen sizes it will occupy 4 cols (4+5+2=11) 1 col is left (unoccupied) -->
                    <div class="text-center">
                        <a class="btn btn-social-icon btn-google" href="http://google.com/+"><i class="fa fa-google-plus fa-lg"></i></a>
                        <a class="btn btn-social-icon btn-facebook" href="http://www.facebook.com/profile.php?id="><i class="fa fa-facebook fa-lg"></i></a>
                        <a class="btn btn-social-icon btn-linkedin" href="http://www.linkedin.com/in/"><i class="fa fa-linkedin fa-lg"></i></a>
                        <a class="btn btn-social-icon btn-twitter" href="http://twitter.com/"><i class="fa fa-twitter fa-lg"></i></a>
                        <a class="btn btn-social-icon btn-youtube" href="http://youtube.com/"><i class="fa fa-youtube fa-lg"></i></a>
                        <a class="btn btn-social-icon" href="mailto:"><i class="fa fa-envelope-o fa-lg"></i></a>
                    </div>
                </div>
           </div>
           <div class="row justify-content-center">             
                <div class ="col-auto">
                    <p class="text-light">© Copyright 2021 Prima Think Pvt. Ltd.</p>
                </div>
           </div>
        </div>
    </footer>

    <!-- jQuery first, then Popper.js, then Bootstrap JS. -->

    <!-- build:js js/main.js -->
    <script src="node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
    <!-- endbuild -->

</body>

</html>