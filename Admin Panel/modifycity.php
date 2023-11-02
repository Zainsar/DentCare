<?php
include('../includes/adminheader.php');
include('../includes/config.php');
$get = $_GET['cid'];
$fetch = "SELECT * FROM `cities` WHERE `cid` = '$get'";
$cons = mysqli_query($connection, $fetch);
if (mysqli_num_rows($cons) > 0) {
    while ($row = mysqli_fetch_assoc($cons)) {
        ?>
        <div class="container mt-5">
            <h2 class="text-center" style="color:#06A3DA;">Cities Modify</h2>
            <form class="row g-3 form-group mt-2" method="post" action="modifybacks.php">
                <div class="col-md-12">
                    <input type="hidden" name="id" class="form-control" id="validationDefault01"
                        value="<?php echo $row['cid'] ?>">
                    <label for="validationDefault01" class="form-label">Cities</label>
                    <input type="text" name="city" class="form-control" id="validationDefault01" required
                        value="<?php echo $row['Cities'] ?>">
                </div>
                <div class="col-12">
                    <button class="btn btn-primary" name="submit" type="submit">Modify form</button>
                </div>
            </form>
        </div>
        <?php
    }
}
include('../includes/adminfooter.php');
?>