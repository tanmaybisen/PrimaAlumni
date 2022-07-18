<?php include 'sendemail.php'; 

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
  header("location: login.php");
  exit;//to exit php code
}

?>


<!DOCTYPE html>
<html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Contact Form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
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


</div>
    
    <section class = "contact-section">
      <div class = "contact-bg">
        <br>
        
        <h3>Get in Touch with Us</h3>
        <h2>contact us</h2>
        <div class = "line">
          <div></div>
          <div></div>
          <div></div>
        </div>
        <p class = "text">We are Full-Stack Digital Transformation Company. As a Digital Marketing Company, we are offering Digital Marketing, Web Development & Digital Transformation Consulting.Get in touch with our Alumni here.</p>
      </div>


      <div class = "contact-body">
        <div class = "contact-info">
          <div>
            <span><i class = "fas fa-mobile-alt"></i></span>
            <span>Phone No.</span>
            <span class = "text">+91 9890544466</span>
          </div>
          <div>
            <span><i class = "fas fa-envelope-open"></i></span>
            <span>E-mail</span>
            <span class = "text">contact@primathink.com</span>
          </div>
          <div>
            <span><i class = "fas fa-map-marker-alt"></i></span>
            <span>Address</span>
            <span class = "text">C/O: Thakur, Bobade Nagar, Arjun Nagar, Amravati, Maharashtra 444602</span>
          </div>
          <div>
            <span><i class = "fas fa-clock"></i></span>
            <span>Opening Hours</span>
            <span class = "text">Monday - Saturday (9:30 AM to 8:00 PM)</span>
          </div>
        </div>

    <!--alert messages start-->
    <?php echo $alert; ?>
    <!--alert messages end-->

    <h1 style="color:blue;text-align:center;"><b>Leave us a Message!</h1>
    <div class = "contact-form">
    <form class="contact" action="" method="post">
            <div>
              <input type = "text" name ="fname" class = "form-control" placeholder="First Name">
              <input type = "text" name="lname" class = "form-control" placeholder="Last Name">
            </div>
            <div>
              <input type = "email" name="email" class = "form-control" placeholder="E-mail">
              <input type = "text" name="phone" class = "form-control" placeholder="Phone">
            </div>
            <textarea rows = "5" name="message" placeholder="Message" class = "form-control"></textarea>
            <input type="submit" name="submit" class="send-btn" value="Send">
          </form>

          <div>
            <img src = "image.png" alt = "">
          </div>
        </div>
      </div>

      <div class = "map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3721.3738663319496!2d79.12961731398406!3d21.137514785939537!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bd4c75c0779e39b%3A0x6876c48701f0cb0!2sPrimaThink%20Technologies%20Pvt.%20Ltd.%20%7BDigital%20Marketing%20And%20Web%20Development%20Company%7D!5e0!3m2!1sen!2sin!4v1632042169890!5m2!1sen!2sin" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
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

  </body>
</html>
      