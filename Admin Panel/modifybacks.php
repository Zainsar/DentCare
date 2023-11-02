<?php
include('../includes/config.php');

$cid = $_POST['id'];
$city = $_POST['city'];
$update = "UPDATE `cities` SET
`Cities` = '$city'
WHERE `cid` = '$cid'
";

$result = mysqli_query($connection, $update);

if ($result) {
    echo "<script> alert('Cities Modify Succesfully') </script>";
    echo "<script> window.location.href='addcities.php' </script>";
} else {
    die("Query Failed");
}
?>