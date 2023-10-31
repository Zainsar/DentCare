<?php
require("../Includes/config.php");
session_start();

if (!isset($_SESSION["doctor"])) {
    echo '<script> window.location.href="login.php"</script>';
    exit();
}


$user_id = $_POST['id'];
$img = $_FILES['imgs']['name'];
$img_tmp = $_FILES['imgs']['tmp_name'];
$img_size = $_FILES['imgs']['size'];
$user_name = mysqli_real_escape_string($connection, $_POST['dusername']);
$user_email = mysqli_real_escape_string($connection, $_POST['demail']);
$user_sp = mysqli_real_escape_string($connection, $_POST['specialization']);
$user_day = mysqli_real_escape_string($connection, $_POST['Days']);
$user_time = mysqli_real_escape_string($connection, $_POST['dtime']);
$username = $_SESSION["doctor"];
// print_r($_POST);
// print_r($_FILES);
// die();
// Assuming that "hospital" is the session variable where the username is stored
// Update query with correct column names
$updateQuery = "UPDATE `doctors` SET `Dusername`='$user_name',`Demail`='$user_email',`specialization`='$user_sp',`Days`='$user_day',`Dtime`='$user_time',`Dimage`='$img' WHERE `demail` = '$username'
";

if (move_uploaded_file($img_tmp, '../doctors/doctorimg/' . $img)) {
    $res = mysqli_query($connection, $updateQuery);
    if (!$res) {
        die("Query failed");
    } else {
        echo "
        <script>alert('Profile Has Been Updated Successfully')
</script>";
        echo "<script>window.location.href='profile.php'</script>";
    }
} else {
    echo "
    <script>alert('Profile Update failed')
    </script>";

}
?>