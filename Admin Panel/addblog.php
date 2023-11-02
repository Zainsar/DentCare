<?php
include('../includes/adminheader.php');
include('../includes/config.php');
?>
<div class="container-fluid pt-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Blog</h6>
            <a href="addmore.php">Add Blog</a>
        </div>
        <div class="table-responsive">
            <table id="example"
                class="table mt-3 text-center align-middle table-bordered table-striped table-hover mb-0">
                <thead>
                    <tr class="text-dark">
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Time</th>
                        <th scope="col">Date</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $fetch = "SELECT * FROM `Blogs` WHERE `bstatus` = '1'";
                    $fetch2 = mysqli_query($connection, $fetch);
                    if (mysqli_num_rows($fetch2) > 0) {
                        while ($row = mysqli_fetch_assoc($fetch2)) {
                            ?>
                            <tr>
                                <td>
                                    <?php echo $row['bid'] ?>
                                </td>
                                <td>
                                    <?php echo $row['bname'] ?>
                                </td>
                                <td>
                                    <?php echo $row['bdescription'] ?>
                                </td>
                                <td>
                                    <?php echo $row['btime'] ?>
                                </td>
                                <td>
                                    <?php echo $row['bdate'] ?>
                                </td>
                                <td>
                                    <img src="<?php echo 'blogimg/' . $row['bimage'] ?>" alt="blog Image" height="40px"
                                        width="40px">
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-primary"
                                        href="modifyblog.php?bid=<?php echo $row['bid'] ?>">Modify</a>
                                    <a class="btn btn-sm btn-danger"
                                        href="trashblog.php?bid=<?php echo $row['bid'] ?>">Trash</a>
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