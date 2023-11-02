<?php
include('../Includes/config.php');
$user_id = $_GET['cid'];

$delete = "UPDATE `cities` SET `Cstatus` = '1' where `cid` = $user_id";

$result = mysqli_query($connection, $delete);

if (!$delete) {
    die("Query Failed");
} else {
    echo '<script> alert("Your data has been Restore") </script>';
    echo '<script> window.location.href="trashcit.php" </script>';
}
?>