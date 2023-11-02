<?php
include('../Includes/config.php');
$user_id = $_GET['cid'];

$delete = "DELETE from `cities` where `cid` = '$user_id'";

$result = mysqli_query($connection, $delete);

if (!$result) {
    die("Query Failed");
} else {
    echo '<script> alert("Your Data Has been Deleted") </script>';
    echo '<script> window.location.href="trashcit.php" </script>';
}
?>