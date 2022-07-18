<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/_dbconnect.php';
    $username = $_POST["username"];
    $email = $_POST["email"];
    $fname = $_POST["fname"];
    $quali = $_POST["quali"];
    $yop = $_POST["yop"];
    $dob = $_POST["dob"];
    
    $password = $_POST["password"];
    $hash=password_hash($password,PASSWORD_DEFAULT);    //PASSWORD_DEFAULT is the default method of hashing

    $exists=false;
    //will check for unique username
    if($exists==false){
        $sql = "INSERT INTO `alumni` ( `username`, `password`, `email`,`fullname`,`qualification`,`yop`,`dob`) VALUES ('$username', '$hash', '$email','$fname','$quali','$yop','$dob')";
        $sql1 = "INSERT INTO `perdata` ( `username`) VALUES ('$username')";
        $result = mysqli_query($conn, $sql);
        if ($result){
            $showAlert = true;
        }else{
            $showError = "Oops! Username already taken.";
        }

        $result2 = mysqli_query($conn, $sql1);
        if ($result2){
            $showAlert = true;
        }else{
            $showError = "Oops! Data not sent to PerData";
        }
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
    <link rel="stylesheet" href="./styles.css">
    <!-- endbuild -->
    
    
    
    <title>Prima Think - signin</title>
</head>

<body>
    <!-- mr-auto = means right margin should to set as much as possible , contents will be pushed as left as possible -->
    <!-- nav-item = display horizontally as links in nav  bar , nav-link in anchor tag to goto link -->    
    <!-- active = we can explicitly identify one of these links as the activelink -->
    <!-- active class is added to line of the list members, here added to Home -->

    <nav class="navbar navbar-dark navbar-expand-sm fixed-top">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a  class="navbar-brand mr-auto" href="#"><img src="img/logo.png" height="30" width="41"></a>
            <div class="collapse navbar-collapse" id="Navbar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active"><a class="nav-link" href="#"><span class="fa fa-home fa-lg"></span> Home</a></li>
                </ul>
                <span class="navbar-text">        <!-- triggering login modal data-toggle="modal" data-target="#loginModal"-->
                    <a class="nav-link" href="./login.php"><span class="fa fa-sign-in"></span> Login</a>
                </span>
                <span class="navbar-text">
                    <a id="signin" data-toggle="modal" data-target="#signinModal">&nbsp;         <!-- triggering login modal data-toggle="modal" data-target="#loginModal"-->
                   <button class="btn btn-warning"><span class="fa fa-sign-in"></span><b> Fill Signup details here!</b></button>
                    </a>
                </span>
                <!-- <span class="navbar-text"> -->
                    <!-- <a id="logout">         triggering login modal data-toggle="modal" data-target="#loginModal" -->
                    <!-- &nbsp;&nbsp;<span class="fa fa-sign-out"></span> Logout -->
                    <!-- </a> -->
                <!-- </span> -->
            </div>
        </div>
    </nav>

    <?php
    if($showAlert){
    echo ' <div class="alert alert-success alert-dismissible fade show my-4" role="alert">
        <strong>Success!</strong> Your account is now created and you can login
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show my-4" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    ?>

    <!-- Sign in modal -->
    <div id="signinModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg" role="content">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Sign Up</h4>
                        <button id="cancelB1" type="button" class="close" data-dismiss="modal">
                            &times;   <!-- &times; means a multiplication sign (here used a cross sign to dismiss modal)-->
                        </button>
                </div>
                <div class="modal-body">
                    <center><form action="/root/signup.php" method="post">
                        <div class="form-col">
                            <div class="form-group col-sm-4">
                                    <label class="sr-only" for="username">Username</label>
                                    <input type="text" class="form-control form-control-sm mr-1" id="username" name="username" placeholder="Username">
                            </div>
                            <div class="form-group col-sm-4">
                                <label class="sr-only" for="password">Password</label>
                                <input type="password" class="form-control form-control-sm mr-1" id="password" name="password" placeholder="Password">
                            </div>
                            <div class="form-group col-sm-4">
                                    <label class="sr-only" for="email">Email Id</label>
                                    <input type="text" class="form-control form-control-sm mr-1" id="email" name="email" placeholder="Email Id">
                            </div>
                            <div class="form-group col-sm-4">
                                <label class="sr-only" for="fname">Full Name</label>
                                <input type="text" class="form-control form-control-sm mr-1" id="fname" name="fname" placeholder="Full Name">
                            </div>
                            <div class="form-group col-sm-4">
                                    <label class="sr-only" for="quali">Qualification</label>
                                    <input type="text" class="form-control form-control-sm mr-1" id="quali" name="quali" placeholder="Qualification">
                            </div>
                            <div class="form-group col-sm-4">
                                <label class="sr-only" for="yop">YOP</label>
                                <input type="text" class="form-control form-control-sm mr-1" id="yop" name="yop" placeholder="YOP (YYYY)">
                            </div>
                            <div class="form-group col-sm-4">
                                    <label class="sr-only" for="dob">Date of Birth</label>
                                    <input type="text" class="form-control form-control-sm mr-1" id="dob" name="dob" placeholder="DOB (yyyy-mm-dd)">
                            </div>
                        </div>
                        <div class="form-row">
                            <button id="cancelB2" type="button" class="btn btn-secondary btn-sm ml-auto" data-dismiss="modal" >Cancel</button>   <!--data-dismiss="modal"-->
                            <button type="submit" class="btn btn-primary btn-sm ml-1">Sign in</button>        
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
                    <h1><b>PrimaAlumni</b></h1>
                    <h4>Prima Think Alumni Assocaiation</h4>
                    <p>We take inspiration from the World's best designers, and create a unique experience.Design and deliver new digital experiences, revenue streams and business models to meet rising customer expectations and accelerate your growth.</p>
                </div>
                <div class="col-12 col-sm-3 align-self-center">
                    <img src="img/logo.png" class="fluid">
                </div>
            </div>
        </div>
    </header>

<!-- this below is carousel code-->
        <div class="row row-content">
            <div class="col">
                <!-- carousel code -->
                <div id="mycarousel" class="carousel slide" data-ride="carousel">
                    <!-- items divs -->
                    <div class="corousal-inner" role="listbox">
                        <!-- item 1 -->
                        <div class="carousel-item active">
                            <img width="200" height="200"class="d-block img-fluid" src="img/pw1.png" alt="uf">
                            <div class="carousel-caption d-none d-md-block">
                                <h2>🎓Suresh Singhania</h2>
                                <p class="d-none d-sm-block">
                                    With businesses across the region looking to capture the economic rebound, Suresh's experience and knowledge in digitally enabling organizations and developing Prima's go-to-market strategies around software and services helped propel us, our customers, and partners to the forefront of the digital economy.
                                </p>
                            </div>
                        </div>
                        <!-- item 2 -->
                        <div class="carousel-item">
                            <img width="200" height="200" class="d-block img-fluid" src="img/pw3.png" alt="pf">
                            <div class="carousel-caption d-none d-md-block">
                                <h2>🎓Maithila Sharma</h2>
                                <p class="d-none d-sm-block">
                                  Delighted to be working with Think Alumni. An alumni solution has been part of our strategic plan for some time so we’re very excited to be using Think Alumni’s expertise to show our alumni that their former tutors still have something to offer them.
                                </p>
                            </div>
                        </div>
                        <!-- item 3 -->
                        <div class="carousel-item">
                            <img width="200" height="200"class="d-block img-fluid" src="img/pw2.png" alt="sf">
                            <div class="carousel-caption d-none d-md-block">
                                <h2>🎓Sanjay Khurana</h2>
                                <p class="d-none d-sm-block">
                                He is the Founder, Chairman and Managing Director of Persistent Systems since its inception and is responsible for the overall leadership, strategy and management of the Company. He had greatly contributed to where the compay stand today, without him this success won't be possible.
                                </p>
                            </div>
                        </div>
                    </div>
                    <ol class="carousel-indicators">
                        <li data-target="#mycarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#mycarousel" data-slide-to="1" ></li>
                        <li data-target="#mycarousel" data-slide-to="2" ></li>
                    </ol>
                    <a class="carousel-control-prev" href="#mycarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#mycarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>

                    <button class="btn btn-danger btn-sm" id="carouselButton">
                        <span id="carousel-button-icon" class="fa fa-pause"></span>
                    </button>

                </div> 
                <!-- carousel code end -->
            </div>
        </div>

        <div class="container">
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
                    <h5>Links</h5>
                    <ul class="list-unstyled">
                        <li><a class="text-light" href="#">Home</a></li>
                        <li><a class="text-light" href="./aboutus.php">About</a></li>
                        <li><a class="text-light" href="#">Menu</a></li>
                        <li><a class="text-light" href="#">Contact</a></li>
                    </ul>
                </div>
                <div class="col-7 col-sm-5">
                    <h5 >Our Address</h5>
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