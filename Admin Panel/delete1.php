<?php
include('../Includes/config.php');
$user_id = $_GET['id'];

$delete = "DELETE from `patient` where `id` = '$user_id'";

$result = mysqli_query($connection, $delete);

if (!$result) {
    die("Query Failed");
} else {
    echo '<script> alert("Your Data Has been Deleted") </script>';
    echo '<script> window.location.href="trashpat.php" </script>';
}
?>