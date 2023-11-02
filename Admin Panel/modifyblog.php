<?php
include('../includes/adminheader.php');
include('../includes/config.php');
$get = $_GET['bid'];
$fetch = "SELECT * FROM `blogs` WHERE `bid` = '$get'";
$cons = mysqli_query($connection, $fetch);
if (mysqli_num_rows($cons) > 0) {
    while ($row = mysqli_fetch_assoc($cons)) {
        ?>
        <div class="container mt-2">
            <h2 class="text-center" style="color:#06A3DA;">Modify Blog</h2>
            <form class="row g-3 form-group " method="post" action="modifybackps.php" enctype="multipart/form-data">
                <input type="hidden" name="bid" class="form-control" id="validationDefault01" 
                value="<?php echo $row['bid'] ?>">
                <div class="col-md-12">
                    <label for="validationDefault01" class="form-label">Name</label>
                    <input type="text" name="bname" class="form-control" id="validationDefault01" placeholder="Blog Name"
                        value="<?php echo $row['bname'] ?>" required>
                </div>
                <div class="col-md-6">
                    <label for="validationDefault02" class="form-label">Description</label>
                    <input type="text" name="bdescription" class="form-control" id="validationDefault02"
                        placeholder="Description" value="<?php echo $row['bdescription'] ?>" required>
                </div>
                <div class="col-md-6">
                    <label for="validationDefaultUsername" class="form-label">Time</label>
                    <input type="time" name="btime" class="form-control" id="validationDefault02" placeholder="07:35 pm"
                        value="<?php echo $row['btime'] ?>" required>

                </div>
                <div class="col-md-6">
                    <label for="validationDefault04" class="form-label">Date</label>
                    <input type="date" name="bdate" class="form-control" id="validationDefault02" placeholder="23/07/2033"
                        value="<?php echo $row['bdate'] ?>" required>
                </div>
                <div class="col-md-6">
                    <label for="validationDefault03" class="form-label">Image</label>
                    <input type="file" class="form-control" name="bimage" id="validationDefault03" value="<?php echo $row['bimage'] ?>" required>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary" name="submit" type="submit">Modify Blog</button>
                </div>
            </form>
        </div>


        <?php
    }
}
include('../includes/adminfooter.php');
?>