<?php
include('../Includes/config.php');
$user_id = $_GET['id'];

$delete = "UPDATE `patient` SET `pstatus` = '0' where `id` = $user_id";

$result = mysqli_query($connection, $delete);

if (!$delete) {
    die("Query Failed");
} else {
    echo '<script> alert("Your data has been move to Trash") </script>';
    echo '<script> window.location.href="trashpat.php" </script>';
}
?>