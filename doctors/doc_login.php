<?php
include('../includes/config.php');
include('../includes/navbar1.php');

if (isset($_POST['submit'])) {
  $Email = $_POST['email'];
  $Password = $_POST['password'];

  $login_query = "SELECT * from `doctors` where Demail = '$Email'";
  $get_from_db = mysqli_query($connection, $login_query);

  if (mysqli_num_rows($get_from_db)) {
    $row = mysqli_fetch_assoc($get_from_db);
    $db_pass = $row['Dpassword'];
    $pass_decode = password_verify($Password, $db_pass);
    if ($pass_decode) {
      $_SESSION['doctor'] = $row['Demail'];
      // $_SESSION['doctor'] = $row['Dusername'];

      echo "<script> alert('login secsesfully')
        window.location.href='index.php'
        </script>";

    } else {
      echo "<script> alert('Invalid Password')</script>";
    }
  } else {
    echo "<script> alert('Invalid Email')</script>";

  }

}
?>
<div class="container mt-5">
  <h2 class="text-center" style="color:#06A3DA;">Doctors Login</h2>
  <form action="doc_login.php" method="post" class="row gap-3 form-group mt-3">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email address</label>
      <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input type="password" name="password" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="mb-3 form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </form>
</div>