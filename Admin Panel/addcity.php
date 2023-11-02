<?php
include('../includes/adminheader.php');
include('../includes/config.php');

if (isset($_POST['submits'])) {
  $city = $_POST['city'];

  $check_city = "SELECT * from `cities` where Cities = '$city' ";
  $run_city = mysqli_query($connection, $check_city);
  if (mysqli_num_rows($run_city) > 0) {
    echo "<script> alert('City already exist') </script>";
  } else {
    $insert_city = "INSERT INTO `cities` (`Cities`) VALUES ('$city')";
    $connect_inserts = mysqli_query($connection, $insert_city);
    echo "<script> window.location.href='addcities.php'</script>";
  }
}
?>
<div class="row">
  <div class="col-md-12">
    <form action="addcity.php" method="post" class="billing-form ftco-bg-dark p-md-5" id="form">
      <h3 class="mb-4 billing-heading"> Add City</h3>
      <div class="row align-items-end">
        <div class="col-md-12 py-2 ">
          <div class="form-group">
            <label for="Username">Name</label>
            <input type="text" class="form-control" name="city" placeholder="City">
          </div>
        </div>
        <div class="col-md-12 py-2">
          <div class="radio">
            <button name="submits" class="btn btn-primary py-3 px-4">Add City</button>
          </div>
        </div>
    </form><!-- END -->
  </div> <!-- .col-md-8 -->
</div>
</div>

<?php

include('../includes/adminfooter.php');


?>