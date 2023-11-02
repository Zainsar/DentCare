<?php
include('../Includes/config.php');

$user_id = $_GET['cid'];

$delete = "UPDATE `cities` SET `Cstatus` = '0' where `cid` = '$user_id'";

$result = mysqli_query($connection, $delete);

if (!$delete) {
    die("Query Failed");
} else {
    echo '<script> alert("Your data has been move to Trash") </script>';
    echo '<script> window.location.href="trashcit.php" </script>';
}
?>