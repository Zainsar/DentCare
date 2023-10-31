<?php
include('../includes/config.php');
include('../includes/navbar.php');

?>
<div class="container-fluid bg-primary bg-appointment mb-5 wow fadeInUp" data-wow-delay="0.1s"
    style="margin-top: 90px;">
    <div class="container">
        <div class="row gx-5">
            <div class="col-lg-12">
                <div class="appointment-form h-100 d-flex flex-column justify-content-center text-center p-5 wow zoomIn"
                    data-wow-delay="0.6s">
                    <h1 class="text-white mb-4">Appointment View</h1>
                    <?php
                    $doctor_name = $_SESSION['doctor'];


                    $sql = "SELECT * FROM appointment as a INNER JOIN doctors as d on a.pdoctor = d.id WHERE d.demail = '$doctor_name'";
                    $result = $connection->query($sql);

                    if ($result->num_rows > 0) {

                        ?>
                        <table class="table table-bordered table-dark table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Patient Name</th>
                                    <th>Doctor</th>
                                    <th>Specialization</th>
                                    <th>Day</th>
                                    <th>Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = $result->fetch_assoc()) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $row['pid'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['pname'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['Dusername'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['specialization'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['pday'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['ptime'] ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                    } else {
                        echo "<h3> No appointments found for this doctor.</h3>";
                    }
                    ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include('../includes/footer2.php');
?>