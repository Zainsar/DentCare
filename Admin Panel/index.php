<?php
include('../includes/adminheader.php');
include('../includes/config.php');

$fetch = "SELECT * FROM `patient`";
$cos = mysqli_query($connection, $fetch);
$num = mysqli_num_rows($cos);

$fetch1 = "SELECT * FROM `doctors`";
$cos1 = mysqli_query($connection, $fetch1);
$num1 = mysqli_num_rows($cos1);

$fetch2 = "SELECT * FROM `cities`";
$cos2 = mysqli_query($connection, $fetch2);
$num2 = mysqli_num_rows($cos2);

$fetch3 = "SELECT * FROM `appointment`";
$cos3 = mysqli_query($connection, $fetch3);
$num3 = mysqli_num_rows($cos3);
?>

            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Patients</p>
                                <h6 class="mb-0"><?php echo $num ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-bar fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Doctors</p>
                                <h6 class="mb-0"><?php echo $num1 ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-area fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Cities</p>
                                <h6 class="mb-0"><?php echo $num2 ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-pie fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Appointments</p>
                                <h6 class="mb-0"><?php echo $num3 ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sale & Revenue End -->


            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Doctors</h6>
                        <a href="add.php">Show All</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Specialization</th>
                        <th scope="col">Cities</th>
                        <th scope="col">Days</th>
                        <th scope="col">Time</th>
                                    </tr>
                            </thead>
                            <tbody>
                            <?php
                    $fetch = "SELECT * FROM `doctors` AS d INNER JOIN `cities` AS c ON d.`Dcity` = c.`cid` WHERE d.`dstatus` = '1'";
                    $fetch2 = mysqli_query($connection, $fetch);
                    if (mysqli_num_rows($fetch2) > 0) {
                        while ($row = mysqli_fetch_assoc($fetch2)) {
                            ?>
                                <tr>
                                <td>
                                    <?php echo $row['id'] ?>
                                </td>
                                <td>
                                    <?php echo $row['Dusername'] ?>
                                </td>
                                <td>
                                    <?php echo $row['Demail'] ?>
                                </td>
                                <td>
                                    <?php echo $row['specialization'] ?>
                                </td>
                                <td>
                                    <?php echo $row['Cities'] ?>
                                </td>
                                <td>
                                    <?php echo $row['Days'] ?>
                                </td>
                                <td>
                                    <?php echo $row['Dtime'] ?>
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
            <!-- Recent Sales End -->
            <?php
include('../includes/adminfooter.php');
?>