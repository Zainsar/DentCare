<?php
include('../includes/adminheader.php');
include('../includes/config.php');

require '../vendor/autoload.php'; // Composer se install kiya hua ho to yeh line add karein
// PHPMailer Integration
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


if (isset($_POST['register'])) {
  $name = $_POST['username'];
  $email = $_POST['email'];
  $Password = $_POST['password'];
  $phone = $_POST['phone'];

  $hashPass = password_hash($Password, PASSWORD_BCRYPT);

  $check_email = "SELECT * from `patient` where email = '$email' ";
  $run_email = mysqli_query($connection, $check_email);
  if (mysqli_num_rows($run_email) > 0) {
    echo "<script> alert('Email already exist') </script>";
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
    $insert = "INSERT INTO `patient` (`name`, `email`, `password`, `phone`) VALUES ('$name', '$email','$hashPass' ,'$phone')";
    $connect_insert = mysqli_query($connection, $insert);
    echo "<script> window.location.href='addpatients.php'</script>";
  }
}
?>
<div class="row">
  <div class="col-md-12">
    <form action="addpatients.php" method="POST" class="billing-form ftco-bg-dark p-md-5" id="form">
      <h3 class="mb-4 billing-heading"> Add patient</h3>
      <div class="row align-items-end">
        <div class="col-md-12 py-2 ">
          <div class="form-group">
            <label for="Username">Name</label>
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
          <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" placeholder="0310-********" name="phone">
          </div>
        </div>
        <div class="col-md-12 py-2">
          <div class="radio">
            <button name="register" class="btn btn-primary py-3 px-4">Add Patient</button>
          </div>
        </div>
    </form><!-- END -->
  </div> <!-- .col-md-8 -->
</div>
</div>

<?php

include('../includes/adminfooter.php');


?>