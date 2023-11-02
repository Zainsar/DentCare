<?php
include('includes/navebar1.php');
include('includes/config.php');

require 'vendor/autoload.php'; // Composer se install kiya hua ho to yeh line add karein
// PHPMailer Integration
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


if (isset($_POST['register'])) {
  $name = $_POST['username'];
  $email = $_POST['email'];
  $Password = $_POST['password'];

  $hashPass = password_hash($Password, PASSWORD_BCRYPT);

  $check_email = "SELECT * from `patient` where email = '$email' ";
  $run_email = mysqli_query($connection, $check_email);
  if (mysqli_num_rows($run_email) > 0) {
    echo "</script> alert('Email already exist') </script>";
  } else {
    // User ka email address $user_email variable mein store karein
    $user_email = $email;

    // PHPMailer configuration
    $mail = new PHPMailer(true);
    try {
      // Server settings
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com'; // SMTP server
      $mail->SMTPAuth = true;
      $mail->Username = 'ifrakhan2804@gmail.com'; // Sender's email address
      $mail->Password = 'wwuq dupp rnbo tcww';
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // TLS encryption
      $mail->Port = 587; // Port for TLS

      // Recipient settings
      $mail->setFrom('ifrakhan2804@gmail.com', 'Ifra');
      $mail->addAddress($user_email, $name); // User ka email address

      // Email content
      $mail->isHTML(true);
      $mail->Subject = 'Welcome to Our Website';
      $mail->Body = 'Thank you for registering on our website.';

      $mail->send();
    } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    $insert = "INSERT INTO `patient` (`name`, `email`, `password`) VALUES ('$name', '$email','$hashPass')";
    $connect_insert = mysqli_query($connection, $insert);
  }
  header("location:login.php");
}
?>
<style>
  #form {
    margin-bottom: 10%
  }
</style>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SignUP</title>
  <!-- Favicon -->
  <link href="img/favicon.ico" rel="icon">

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">

  <!-- Icon Font Stylesheet -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Libraries Stylesheet -->
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
  <link href="lib/twentytwenty/twentytwenty.css" rel="stylesheet" />

  <!-- Customized Bootstrap Stylesheet -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Template Stylesheet -->
  <link href="css/style.css" rel="stylesheet">
</head>

<body>
  <section class="ftco-section">
    <div class="container">
      <div class="row">
        <div class="col-md-12 ftco-animate">
          <form action="signup.php" method="POST" class="billing-form ftco-bg-dark p-3 p-md-5" id="form">
            <h3 class="mb-4 billing-heading"> Please register Yourself</h3>
            <div class="row align-items-end">
              <div class="col-md-12 py-2 ">
                <div class="form-group">
                  <label for="Username">Username</label>
                  <input type="text" class="form-control" name="username" placeholder="Username">
                </div>
              </div>
              <div class="col-md-12 py-2">
                <div class="form-group">
                  <label for="Email">Email</label>
                  <input type="text" class="form-control" name="email" placeholder="Email" required>
                </div>
              </div>

              <div class="col-md-12 py-3">
                <div class="form-group">
                  <label for="Password">Password</label>
                  <input type="password" class="form-control" name="password" placeholder="Password">
                </div>

              </div>
              <div class="col-md-12 py-2">
                <div class="form-group mt-4">
                  <div class="radio">
                    <button name="register" class="btn btn-primary py-3 px-4">Register</button>

                  </div>
                </div>
              </div>


          </form><!-- END -->
        </div> <!-- .col-md-8 -->
      </div>
    </div>
    </div>
  </section> <!-- .section -->

  <?php

  include('includes/footer.php');


  ?>



</body>

</html>