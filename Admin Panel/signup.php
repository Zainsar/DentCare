<?php
include('../includes/adminheader1.php');
include('../includes/config.php');

require '../vendor/autoload.php'; // Composer se install kiya hua ho to yeh line add karein
// PHPMailer Integration
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


if (isset($_POST['register'])) {
  $name = $_POST['Aname'];
  $email = $_POST['Aemail'];
  $Password = $_POST['Apassword'];
  // print_r($_POST);
// die();
  $hashPass = password_hash($Password, PASSWORD_BCRYPT);

  $check_email = "SELECT * from `admin` where Aemail = '$email' ";
  $run_email = mysqli_query($connection, $check_email);
  if (mysqli_num_rows($run_email) > 0) {
    echo "<script> alert('Email already exist'); </script>";
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
    $insert = "INSERT INTO `admin` (`Aname`, `Aemail`, `Apassword`) VALUES ('$name', '$email','$hashPass')";
    $connect_insert = mysqli_query($connection, $insert);
  }
  header("location:signin.php");
}
?>

<!-- Sign Up Start -->
<div class="container-fluid">
  <div class="row h-100 align-items-center justify-content-center" style="min-height: 60vh; margin-top:10px;">
    <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
      <div class="bg-light rounded p-4 p-sm-5">
        <div class="d-flex align-items-center justify-content-between mb-3">
          <h3>Sign Up</h3>
        </div>
        <form action="signup.php" method="post">
          <div class="form-floating mb-3">
            <input name="Aname" type="text" class="form-control" id="floatingText" placeholder="jhondoe">
            <label for="floatingText">Username</label>
          </div>
          <div class="form-floating mb-3">
            <input type="email" name="Aemail" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
          </div>
          <div class="form-floating mb-4">
            <input type="password" name="Apassword" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
          </div>
          <div class="d-flex align-items-center justify-content-between mb-2">
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <a href="">Forgot Password</a>
          </div>
          <button type="submit" name="register" class="btn btn-primary py-2 w-100">Sign Up</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Sign Up End -->


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="lib/chart/chart.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script src="lib/tempusdominus/js/moment.min.js"></script>
<script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
<script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- Template Javascript -->
<script src="js/main.js"></script>


</body>


</html>