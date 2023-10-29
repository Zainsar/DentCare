<?php

include('includes/config.php');
include('includes/navebar1.php');
// include('header.php');

if (isset($_POST['Login'])) {
  $Email = $_POST['L_email'];
  $Password = $_POST['L_Pass'];

  $login_query = "SELECT * from `patient` where email = '$Email'";
  $get_from_db = mysqli_query($connection, $login_query);

  if (mysqli_num_rows($get_from_db)) {
    $row = mysqli_fetch_assoc($get_from_db);
    $db_pass = $row['password'];
    $pass_decode = password_verify($Password, $db_pass);
    if ($pass_decode) {
      $_SESSION['useremail'] = $row['email'];
      $_SESSION['username'] = $row['name'];

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




<body>

  <section class="home-slider owl-carousel">

    <div class="slider-item" style="background-image: url(images/bg_1.jpg);" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text justify-content-center align-items-center">

          <div class="col-md-7 col-sm-12 text-center ftco-animate">
            <h1 class="mb-3 mt-5 bread">Login</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Login</span></p>
          </div>

        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section">
    <div class="container">
      <div class="row">
        <div class="col-md-12 ftco-animate mb-5 py-5">
          <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" class="billing-form ftco-bg-dark p-3 p-md-5"
            id="form">
            <h3 class="mb-4 billing-heading">Login</h3>
            <div class="row align-items-end">
              <div class="col-md-12 py-4">
                <div class="form-group">
                  <label for="Email">Email</label>
                  <input type="text" class="form-control" name="L_email" placeholder="Email">
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group">
                  <label for="Password">Password</label>
                  <input type="password" class="form-control" name="L_Pass" placeholder="Password">
                </div>

              </div>
              <div class="col-md-12">
                <div class="form-group mt-4">
                  <div class="radio">
                    <button name="Login" class="btn btn-primary py-3 px-4">Login</button>
                  </div>
                </div>
              </div>


          </form><!-- END -->
        </div> <!-- .col-md-8 -->
      </div>
    </div>
    </div>
  </section>
  <?php

  include('includes/footer.php');

  ?>
</body>

</html>