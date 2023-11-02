<?php
include('../includes/adminheader.php');
include('../includes/config.php');
?>
<div class="container-fluid pt-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Doctors</h6>
            <a href="adddoctor.php">Add Doctor</a>
        </div>
        <div class="table-responsive">
            <table id="example"
                class="table mt-3 text-center align-middle table-bordered table-striped table-hover mb-0">
                <thead>
                    <tr class="text-dark">
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Specialization</th>
                        <th scope="col">Cities</th>
                        <th scope="col">Days</th>
                        <th scope="col">Time</th>
                        <th scope="col">Action</th>
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
                                <td>
                                    <a class="btn btn-sm btn-primary"
                                        href="modifydoctor.php?id=<?php echo $row['id'] ?>">Modify</a>
                                    <a class="btn btn-sm btn-danger"
                                        href="trashdoctor.php?id=<?php echo $row['id'] ?>">Trash</a>
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
<?php
include('../includes/adminfooter.php');
?>