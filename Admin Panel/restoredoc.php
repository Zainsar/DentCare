<?php
include('../Includes/config.php');
$user_id = $_GET['id'];

$delete = "UPDATE `doctors` SET `dstatus` = '1' where `id` = $user_id";

$result = mysqli_query($connection, $delete);

if (!$delete) {
    die("Query Failed");
} else {
    echo '<script> alert("Your data has been Restore") </script>';
    echo '<script> window.location.href="trashdoc.php" </script>';
}
?>