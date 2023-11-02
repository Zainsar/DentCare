<?php
include('../includes/adminheader.php');
include('../includes/config.php');
$get = $_GET['id'];
$fetch = "SELECT * FROM `doctors` AS D INNER JOIN `cities` AS c ON D.`Dcity` = c.`cid` WHERE d.`id` = '$get'";
$cons = mysqli_query($connection, $fetch);
if (mysqli_num_rows($cons) > 0) {
    while ($row = mysqli_fetch_assoc($cons)) {
        ?> 
        <div class="container mt-5">
            <h2 class="text-center" style="color:#06A3DA;">Doctors Modify</h2>
            <form class="row g-3 form-group mt-2" method="post" action="modifyback.php">
                <div class="col-md-12">
                    <input type="hidden" name="id" class="form-control" id="validationDefault01"
                        value="<?php echo $row['id'] ?>">
                    <label for="validationDefault01" class="form-label">Name</label>
                    <input type="text" name="Dusername" class="form-control" id="validationDefault01" required
                        value="<?php echo $row['Dusername'] ?>">
                </div>
                <div class="col-md-12">
                    <label for="validationDefault02" class="form-label">Email</label>
                    <input type="email" name="Demail" class="form-control" id="validationDefault02" required
                        value="<?php echo $row['Demail'] ?>">
                </div>
                <div class="col-md-6">
                    <label for="validationDefault04" class="form-label">Specialization</label>
                    <select class="form-select" name="specialization" id="validationDefault04" required>
                        <option selected value="<?php echo $row['specialization'] ?>">
                            <?php echo $row['specialization'] ?>
                        </option>
                        <option>Neuro Sergon</option>
                        <option>Gynecologist</option>
                        <option>General physician</option>
                        <option>Dermatologist</option>
                        <option>Pediatrician</option>
                        <option>Radiologist</option>
                        <option>Dentist</option>
                        <option>Cardiologist</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="validationDefault03" class="form-label">City</label>
                    <select class="form-select" name="Dcity" id="validationDefault04" required>
                        <option selected value="<?php echo $row['cid'] ?>">
                            <?php echo $row['Cities'] ?>
                        </option>
                        <?php
                        $fetchcity = "SELECT * FROM `cities`";
                        $fetchcities = mysqli_query($connection, $fetchcity);
                        if (mysqli_num_rows($fetchcities) > 0) {
                            while ($rows = mysqli_fetch_assoc($fetchcities)) {
                                ?>
                                <option value="<?php echo $rows['cid'] ?>">
                                    <?php echo $rows['Cities'] ?>
                                </option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="validationDefault03" class="form-label">Days</label>
                    <input type="text" class="form-control" name="Ddays" id="validationDefault03" required
                        value="<?php echo $row['Days'] ?>">
                </div>
                <div class="col-md-6">
                    <label for="validationDefault03" class="form-label">Timimg</label>
                    <input type="text" class="form-control" name="Dtime" id="validationDefault03" required
                        value="<?php echo $row['Dtime'] ?>">
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