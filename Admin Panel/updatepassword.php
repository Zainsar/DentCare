<?php
include('../includes/adminheader.php');
include('../includes/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $currentPassword = $_POST["current_password"];
    $newPassword = $_POST["new_password"];
    $confirmPassword = $_POST["confirm_password"];
    $username = $_SESSION["admin"];

    $query = "SELECT `Apassword` FROM `admin` WHERE `Aemail` = '$username'";
    $result = $connection->query($query);
    if (mysqli_num_rows($result) > 0) {
        $row = $result->fetch_assoc();
        $dbPassword = $row["Apassword"];

        if (password_verify($currentPassword, $dbPassword)) {
            if ($newPassword == $confirmPassword) {
                $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                $updateQuery = "UPDATE `admin` SET `Apassword` = '$hashedPassword' WHERE `Aemail` = '$username'";
                if ($connection->query($updateQuery) === TRUE) {
                    echo ' <script>
                    document.getElementById("dose1Alert").style.display = "block";
                    </script>';

                } else {
                    echo ' <script>
                    document.getElementById("dose2Alert").style.display = "block";
                    </script>';
                }
            } else {
                echo ' <script>
                    document.getElementById("dose3Alert").style.display = "block";
                    </script>';
            }
        } else {
            echo ' <script>
                    document.getElementById("dose4Alert").style.display = "block";
                    </script>';
        }
    } else {
        echo ' <script>
                    document.getElementById("dose5Alert").style.display = "block";
                    </script>';
    }
}

?>
<!-- Appointment Start -->
<div class="container-fluid bg-primary bg-appointment wow fadeInUp" data-wow-delay="0.1s"
    style="margin-top: 20px;">
    <div class="container">
        <div class="row gx-5">
            <div class="alert alert-success" id="dose1Alert" style="display: none">
                Password Update Successfull
            </div>
            <div class="alert alert-danger" id="dose2Alert" style="display: none">
                Error updating password
            </div>
            <div class="alert alert-danger" id="dose3Alert" style="display: none">
                New password and confirm password do not match.
            </div>
            <div class="alert alert-danger" id="dose4Alert" style="display: none">
                Current password is incorrect.
            </div>
            <div class="alert alert-danger" id="dose5Alert" style="display: none">
                User not found.
            </div>
            <div class="col-lg-12">
                <div class="appointment-form h-100 d-flex flex-column justify-content-center text-center p-5 wow zoomIn"
                    data-wow-delay="0.6s">
                    <h1 class="text-white mb-4">Change Password</h1>
                    <form method="post" action="updatepassword.php" class="form-group">
                        <div class="row g-3">
                            <div class="col-12 col-sm-12">
                                <input type="password" name="current_password" class="form-control bg-light border-0"
                                    placeholder="Current Password" style="height: 55px;">
                            </div>

                            <div class="col-12 col-sm-12">
                                <input type="password" name="new_password" class="form-control bg-light border-0"
                                    placeholder="New Password" style="height: 55px;">
                            </div>

                            <div class="col-12 col-sm-12">
                                <input type="password" name="confirm_password" class="form-control bg-light border-0 "
                                    placeholder="Confirm Password" style="height: 55px;">
                            </div>
                            <div class="col-12">
                                <button class="btn btn-dark w-100 py-3" name="submit" type="submit">Change
                                    Password</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Appointment End -->

<?php
include('../includes/adminfooter.php');
?>
</body>

</html>