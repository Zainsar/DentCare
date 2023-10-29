<?php
include('includes/navebar.php');
include('includes/config.php');

if (isset($_POST["submit"])) {
    $name = $_POST["pname"];
    $email = $_POST["pemail"];
    $doctor = $_POST["pdoctor"];
    $specialization = $_POST["pspecialization"];
    $date = $_POST["pdate"];
    $time = $_POST["ptime"];
    // print_r($_POST);
    // die();
    $insert = "INSERT INTO `appointment` (`pname`, `pemail`, `pdoctor`, `pspecialization`, `pdate`, `ptime`) VALUES ('$name', '$email', '$doctor', '$specialization', '$date', '$time')";
    $connection_insert = mysqli_query($connection, $insert);
    if ($connection_insert) {
        echo "
        <script>
        alert('Your Appointment Sent to Hospital. Once its checked your appointment will be set as per date and time.')
</script>";
        echo '<script> window.location.href="appointmentview.php";</script>';
    } else {
        echo "
        <script>
        alert('Your Appointment not set.')
        </script>";


    }
}


?>
<!-- Hero Start -->
<div class="container-fluid bg-primary py-5 hero-header mb-5">
    <div class="row py-3">
        <div class="col-12 text-center">
            <h1 class="display-3 text-white animated zoomIn">Appointment</h1>
            <a href="" class="h4 text-white">Home</a>
            <i class="far fa-circle text-white px-2"></i>
            <a href="" class="h4 text-white">Appointment</a>
        </div>
    </div>
</div>
<!-- Hero End -->


<!-- Appointment Start -->
<div class="container-fluid bg-primary bg-appointment mb-5 wow fadeInUp" data-wow-delay="0.1s"
    style="margin-top: 90px;">
    <div class="container">
        <div class="row gx-5">
            <div class="col-lg-6 py-5">
                <div class="py-5">
                    <h1 class="display-5 text-white mb-4">We Are A Certified and Award Winning Dental Clinic You Can
                        Trust</h1>
                    <p class="text-white mb-0">Eirmod sed tempor lorem ut dolores. Aliquyam sit sadipscing kasd ipsum.
                        Dolor ea et dolore et at sea ea at dolor, justo ipsum duo rebum sea invidunt voluptua. Eos vero
                        eos vero ea et dolore eirmod et. Dolores diam duo invidunt lorem. Elitr ut dolores magna sit.
                        Sea dolore sanctus sed et. Takimata takimata sanctus sed.</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="appointment-form h-100 d-flex flex-column justify-content-center text-center p-5 wow zoomIn"
                    data-wow-delay="0.6s">
                    <h1 class="text-white mb-4">Make Appointment</h1>
                    <form method="post" action="appointment.php" class="form-group">
                        <div class="row g-3">
                            <?php
                            $useremail = $_SESSION['useremail'];
                            $fetch3 = "SELECT * FROM `patient` WHERE `email` = '$useremail'";
                            $query = mysqli_query($connection, $fetch3);
                            if (mysqli_num_rows($query) > 0) {
                                while ($row2 = mysqli_fetch_assoc($query)) {
                                    ?>
                                    <div class="col-12 col-sm-6">
                                        <input type="text" name="pname" class="form-control bg-light border-0"
                                            placeholder="Your Name" value="<?php echo $row2['name'] ?>" style="height: 55px;">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <input type="email" name="pemail" class="form-control bg-light border-0"
                                            placeholder="Your Email" selected value="<?php echo $row2['email'] ?>"
                                            style="height: 55px;">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <select name="pdoctor" class="form-select bg-light border-0" style="height: 55px;">

                                            <option selected>Select A Doctors</option>
                                            <?php
                                            $fetch1 = "SELECT * FROM `doctors` WHERE `dstatus` = '1'";
                                            $conns1 = mysqli_query($connection, $fetch1);
                                            if (mysqli_num_rows($conns1) > 0) {
                                                while ($row1 = mysqli_fetch_assoc($conns1)) {
                                                    ?>
                                                    <option value="<?php echo $row1['id'] ?>">
                                                        <?php echo $row1['Dusername'] ?>
                                                    </option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <select name="pspecialization" class="form-select bg-light border-0"
                                            style="height: 55px;">
                                            <option selected>Select A Service</option>
                                            <?php
                                            $fetch = "SELECT * FROM `doctors` WHERE `dstatus` = '1'";
                                            $conns = mysqli_query($connection, $fetch);
                                            if (mysqli_num_rows($conns) > 0) {
                                                while ($row = mysqli_fetch_assoc($conns)) {
                                                    ?>
                                                    <option value="<?php echo $row['id'] ?>">
                                                        <?php echo $row['specialization'] ?>
                                                    </option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="date">
                                            <input type="date" name="pdate" class="form-control bg-light border-0 "
                                                placeholder="Appointment Date" style="height: 55px;">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="time">
                                            <input type="time" name="ptime" class="form-control bg-light border-0 "
                                                placeholder="Appointment Time" style="height: 55px;">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-dark w-100 py-3" name="submit" type="submit">Make
                                            Appointment</button>
                                    </div>
                                    <?php
                                }
                            } ?>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Appointment End -->

<?php
include('includes/footer.php');
?>
</body>

</html>