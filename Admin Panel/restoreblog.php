<?php
include('../Includes/config.php');

$user_id = $_GET['bid'];

$delete = "UPDATE `blogs` SET `bstatus` = '1' where `bid` = '$user_id'";

$result = mysqli_query($connection, $delete);

if (!$delete) {
    die("Query Failed");
} else {
    echo '<script> alert("Your data has been Restore") </script>';
    echo '<script> window.location.href="trashblogs.php" </script>';
}
?>