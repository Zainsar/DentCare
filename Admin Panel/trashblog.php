<?php
include('../Includes/config.php');

$user_id = $_GET['bid'];

$delete = "UPDATE `blogs` SET `bstatus` = '0' where `bid` = '$user_id'";

$result = mysqli_query($connection, $delete);

if (!$delete) {
    die("Query Failed");
} else {
    echo '<script> alert("Your data has been move to Trash") </script>';
    echo '<script> window.location.href="trashblogs.php" </script>';
}
?>