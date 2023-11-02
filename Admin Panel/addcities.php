<?php
include('../includes/adminheader.php');
include('../includes/config.php');
?>
<div class="container-fluid pt-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Cities</h6>
            <a href="addcity.php">Add Cities</a>
        </div>
        <div class="table-responsive">
            <table id="example"
                class="table mt-3 text-center align-middle table-bordered table-striped table-hover mb-0">
                <thead>
                    <tr class="text-dark">
                        <th scope="col">Id</th>
                        <th scope="col">Cities</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $fetch = "SELECT * FROM `cities` WHERE `Cstatus` = '1'";
                    $fetch2 = mysqli_query($connection, $fetch);
                    if (mysqli_num_rows($fetch2) > 0) {
                        while ($row = mysqli_fetch_assoc($fetch2)) {
                            ?>
                            <tr>
                                <td>
                                    <?php echo $row['cid'] ?>
                                </td>
                                <td>
                                    <?php echo $row['Cities'] ?>
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-primary"
                                        href="modifycity.php?cid=<?php echo $row['cid'] ?>">Modify</a>
                                    <a class="btn btn-sm btn-danger"
                                        href="trashcity.php?cid=<?php echo $row['cid'] ?>">Trash</a>
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