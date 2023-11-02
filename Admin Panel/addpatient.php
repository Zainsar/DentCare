<?php
include('../includes/adminheader.php');
include('../includes/config.php');
?>
<div class="container-fluid pt-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Patient</h6>
            <a href="addpatients.php">Add Patient</a>
        </div>
        <div class="table-responsive">
            <table id="example"
                class="table mt-3 text-center align-middle table-bordered table-striped table-hover mb-0">
                <thead>
                    <tr class="text-dark">
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $fetch = "SELECT * FROM `patient` WHERE `pstatus` = '1'";
                    $fetch2 = mysqli_query($connection, $fetch);
                    if (mysqli_num_rows($fetch2) > 0) {
                        while ($row = mysqli_fetch_assoc($fetch2)) {
                            ?>
                            <tr>
                                <td>
                                    <?php echo $row['id'] ?>
                                </td>
                                <td>
                                    <?php echo $row['name'] ?>
                                </td>
                                <td>
                                    <?php echo $row['email'] ?>
                                </td>
                                <td>
                                    <?php echo $row['phone'] ?>
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-primary"
                                        href="modifypatient.php?id=<?php echo $row['id'] ?>">Modify</a>
                                    <a class="btn btn-sm btn-danger"
                                        href="trashpatient.php?id=<?php echo $row['id'] ?>">Trash</a>
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