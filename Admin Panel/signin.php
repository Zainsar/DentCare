<?php
include('../includes/adminheader1.php');
include('../includes/config.php');

if (isset($_POST['Login'])) {
  $Email = $_POST['L_email'];
  $Password = $_POST['L_Pass'];

  $login_query = "SELECT * from `admin` where Aemail = '$Email'";
  $get_from_db = mysqli_query($connection, $login_query);

  if (mysqli_num_rows($get_from_db)) {
    $row = mysqli_fetch_assoc($get_from_db);
    $db_pass = $row['Apassword'];
    $pass_decode = password_verify($Password, $db_pass);
    if ($pass_decode) {
      $_SESSION['admin'] = $row['Aemail'];

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

?>        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 80vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <h3>Sign In</h3>
                        </div>
                        <form action="signin.php" method="post" class="form-group">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" name="L_email" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" name="L_Pass" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <a href="">Forgot Password</a>
                        </div>
                        <button type="submit" name="Login" class="btn btn-primary py-3 w-100">Sign In</button>
                        <p class="text-center mb-0">Don't have an Account? <a href="signup.php">Sign Up</a></p>
</form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign In End -->
    </div>

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