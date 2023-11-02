<?php
include('../includes/config.php');

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$update = "UPDATE `patient` SET
`name` = '$name',
`email` = '$email',
`phone` = '$phone'
WHERE `id` = '$id'
";

$result = mysqli_query($connection, $update);

if ($result) {
    echo "<script> alert('Patient Profile Modify Succesfully') </script>";
    echo "<script> window.location.href='addpatient.php' </script>";
} else {
    die("Query Failed");
}
?>