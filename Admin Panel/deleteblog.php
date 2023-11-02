<?php
include('../Includes/config.php');
$user_id = $_GET['bid'];

$delete = "DELETE from `blogs` where `bid` = '$user_id'";

$result = mysqli_query($connection, $delete);

if (!$result) {
    die("Query Failed");
} else {
    echo '<script> alert("Your Data Has been Deleted") </script>';
    echo '<script> window.location.href="trashblogs.php" </script>';
}
?>