<?php
include('includes/navebar.php');
include('includes/config.php');
?>
<!-- Hero Start -->
<div class="container-fluid bg-primary py-5 hero-header mb-5">
    <div class="row py-3">
        <div class="col-12 text-center">
            <h1 class="display-3 text-white animated zoomIn">Appointment View</h1>
            <a href="" class="h4 text-white">Home</a>
            <i class="far fa-circle text-white px-2"></i>
            <a href="" class="h4 text-white">Appointment View</a>
        </div>
    </div>
</div>
<!-- Hero End -->


<!-- Appointment Start -->
<div class="container-fluid bg-primary bg-appointment mb-5 wow fadeInUp" data-wow-delay="0.1s"
    style="margin-top: 90px;">
    <div class="container">
        <div class="row gx-5">
            <!-- <div class="col-lg-6 py-5">
                <div class="py-5">
                    <h1 class="display-5 text-white mb-4">We Are A Certified and Award Winning Dental Clinic You Can
                        Trust</h1>
                    <p class="text-white mb-0">Eirmod sed tempor lorem ut dolores. Aliquyam sit sadipscing kasd ipsum.
                        Dolor ea et dolore et at sea ea at dolor, justo ipsum duo rebum sea invidunt voluptua. Eos vero
                        eos vero ea et dolore eirmod et. Dolores diam duo invidunt lorem. Elitr ut dolores magna sit.
                        Sea dolore sanctus sed et. Takimata takimata sanctus sed.</p>
                </div>
            </div> -->
            <div class="col-lg-12">
                <div class="appointment-form h-100 d-flex flex-column justify-content-center text-center p-5 wow zoomIn"
                    data-wow-delay="0.6s">
                    <h1 class="text-white mb-4">Appointment View</h1>
                    <?php
                    $username = $_SESSION['useremail'];
                    $fetch = "SELECT * 
                        FROM `appointment` AS a 
                        INNER JOIN `doctors` AS d 
                        ON a.`pdoctor` = d.`id` 
                        WHERE `pemail` = '$username'
                        ";
                    $querry = mysqli_query($connection, $fetch);
                    if (mysqli_num_rows($querry) > 0) {
                        ?>
                        <table class="table table-bordered table-dark table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Patient Name</th>
                                    <th>Patient Email</th>
                                    <th>Doctor</th>
                                    <th>Specialization</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_assoc($querry)) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $row['pid'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['pname'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['pemail'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['Dusername'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['specialization'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['pdate'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['ptime'] ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                    }
                    ?>
                        </tbody>
                    </table>
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