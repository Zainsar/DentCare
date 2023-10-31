<?php
include('includes/navebar.php');
include('includes/config.php');

if (isset($_POST["submit"])) {
    $name = $_POST["pname"];
    $email = $_POST["pemail"];
    $doctor = $_POST["pdoctor"];
    $specialization = $_POST["pspecialization"];
    $date = $_POST["pday"];
    $time = $_POST["ptime"];
    // print_r($_POST);
    // die();
    $insert = "INSERT INTO `appointment` (`pname`, `pemail`, `pdoctor`, `pspecialization`, `pday`, `ptime`) VALUES ('$name', '$email', '$doctor', '$specialization', '$date', '$time')";
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
                                        <select name="pdoctor" id="doctorSelect" class="form-select bg-light border-0"
                                            style="height: 55px;">

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
                                        <div>
                                            <input type="text" id="specialization" name="pspecialization"
                                                class="form-control bg-light border-0" placeholder="Specialization"
                                                style="height: 55px;">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="date">
                                            <input type="text" id="days" name="pday" class="form-control bg-light border-0"
                                                placeholder="Appointment Date" style="height: 55px;">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="time">
                                            <input type="text" id="timing" name="ptime" class="form-control bg-light border-0"
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $("#doctorSelect").change(function () {
            var doctorId = $(this).val();
            $.ajax({
                type: "POST",
                url: "getDoctorDetails.php",
                data: { doctorId: doctorId },
                dataType: "json",
                success: function (data) {
                    $("#specialization").val(data.specialization);
                    $("#days").val(data.date);
                    $("#timing").val(data.time);
                }
            });
        });
    });
</script>

<?php
include('includes/footer.php');
?>
</body>

</html>