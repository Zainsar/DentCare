<?php
include('../includes/adminheader.php');
include('../includes/config.php');

require '../vendor/autoload.php'; // Composer se install kiya hua ho to yeh line add karein
// PHPMailer Integration
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['submit'])) {
  $name = $_POST['Dusername'];
  $email = $_POST['Demail'];
  $Password = $_POST['Dpassword'];
  $special = $_POST['specialization'];
  $city = $_POST['Dcity'];
  $days = $_POST['Ddays'];
  $time = $_POST['Dtime'];

  $hashPass = password_hash($Password, PASSWORD_BCRYPT);

  $check_email = "SELECT * from `doctors` where Demail = '$email' ";
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
    $insert = "INSERT INTO `doctors` (`Dusername`, `Demail`, `Dpassword`, `specialization`, `Dcity`, `Days`, `Dtime`) VALUES ('$name', '$email', '$hashPass', '$special', '$city', '$days', '$time')";
    $connect_insert = mysqli_query($connection, $insert);
    echo "<script> window.location.href='add.php'</script>";
  }

}
?>
<div class="container mt-2">
  <h2 class="text-center" style="color:#06A3DA;">Add Doctors</h2>
  <form class="row g-3 form-group " method="post" action="adddoctor.php">
    <div class="col-md-12">
      <label for="validationDefault01" class="form-label">Name</label>
      <input type="text" name="Dusername" class="form-control" id="validationDefault01" placeholder="Zain" required>
    </div>
    <div class="col-md-6">
      <label for="validationDefault02" class="form-label">Email</label>
      <input type="email" name="Demail" class="form-control" id="validationDefault02" placeholder="abc@gmail.com"
        required>
    </div>
    <div class="col-md-6">
      <label for="validationDefaultUsername" class="form-label">Password</label>
      <input type="password" name="Dpassword" class="form-control" id="validationDefault02" placeholder="********"
        required>

    </div>
    <div class="col-md-6">
      <label for="validationDefault04" class="form-label">Specialization</label>
      <select class="form-select" name="specialization" id="validationDefault04" required>
        <option selected>Specialization</option>
        <option>Neuro Sergon</option>
        <option>Gynecologist</option>
        <option>General physician</option>
        <option>Dermatologist</option>
        <option>Pediatrician</option>
        <option>Radiologist</option>
        <option>Dentist</option>
        <option>Cardiologist</option>
      </select>
    </div>
    <div class="col-md-6">
      <label for="validationDefault03" class="form-label">City</label>
      <select class="form-select" name="Dcity" id="validationDefault04" required>
        <option selected>Cities</option>
        <?php
        $fetchcity = "SELECT * FROM `cities`";
        $fetchcities = mysqli_query($connection, $fetchcity);
        if (mysqli_num_rows($fetchcities) > 0) {
          while ($row = mysqli_fetch_assoc($fetchcities)) {
            ?>
            <option value="<?php echo $row['cid'] ?>">
              <?php echo $row['Cities'] ?>
            </option>
            <?php
          }
        }
        ?>
      </select>
    </div>
    <div class="col-md-6">
      <label for="validationDefault03" class="form-label">Days</label>
      <input type="text" class="form-control" name="Ddays" id="validationDefault03" placeholder="Mon,Tues,Wed,..."
        required>
    </div>
    <div class="col-md-6">
      <label for="validationDefault03" class="form-label">Timing</label>
      <input type="text" class="form-control" name="Dtime" id="validationDefault03" placeholder="12am to 12pm" required>
    </div>
    <div class="col-12">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
        <label class="form-check-label" for="invalidCheck2">
          Agree to terms and conditions
        </label>
      </div>
    </div>
    <div class="col-12">
      <button class="btn btn-primary" name="submit" type="submit">Add Doctors</button>
    </div>
  </form>
</div>


<?php
include('../includes/adminfooter.php');
?>