<?php
require("../Includes/config.php");
session_start();

if (!isset($_SESSION["admin"])) {
    echo '<script> window.location.href="login.php"</script>';
    exit();
}


$user_id = $_POST['id'];
$img = $_FILES['imgs']['name'];
$img_tmp = $_FILES['imgs']['tmp_name'];
$img_size = $_FILES['imgs']['size'];
$user_name = mysqli_real_escape_string($connection, $_POST['name']);
$user_email = mysqli_real_escape_string($connection, $_POST['email']);
$username = $_SESSION["admin"]; // Assuming that "hospital" is the session variable where the username is stored
// Update query with correct column names
$updateQuery = "UPDATE `admin` SET `Aname` = '$user_name', `Aemail` = '$user_email', `AImage` = '$img' WHERE `Aemail` = '$username'";

if (move_uploaded_file($img_tmp, 'adminimg/' . $img)) {
    $res = mysqli_query($connection, $updateQuery);
    if (!$res) {
        die("Query failed");
    } else {
        echo "
        <script>alert('Profile Has Been Updated Successfully')
</script>";
        echo "<script>window.location.href='admin_pro.php'</script>";
    }
} else {
    echo "
    <script>alert('Profile Update failed Successfully')
    </script>";

}
?>