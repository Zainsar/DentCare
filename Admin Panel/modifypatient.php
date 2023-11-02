<?php
include('../includes/adminheader.php');
include('../includes/config.php');
$get = $_GET['id'];
$fetch = "SELECT * FROM `patient` WHERE `id` = '$get'";
$cons = mysqli_query($connection, $fetch);
if (mysqli_num_rows($cons) > 0) {
    while ($row = mysqli_fetch_assoc($cons)) {
        ?>
        <div class="container mt-5">
            <h2 class="text-center" style="color:#06A3DA;">Patient Modify</h2>
            <form class="row g-3 form-group mt-2" method="post" action="modifybackp.php">
                <div class="col-md-12">
                    <input type="hidden" name="id" class="form-control" id="validationDefault01"
                        value="<?php echo $row['id'] ?>">
                    <label for="validationDefault01" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="validationDefault01" required
                        value="<?php echo $row['name'] ?>">
                </div>
                <div class="col-md-6">
                    <label for="validationDefault02" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="validationDefault02" required
                        value="<?php echo $row['email'] ?>">
                </div>
                <div class="col-md-6">
                    <label for="validationDefault03" class="form-label">Phone</label>
                    <input type="text" class="form-control" name="phone" id="validationDefault03" required
                        value="<?php echo $row['phone'] ?>">
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