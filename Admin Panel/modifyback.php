<?php
include('../includes/config.php');

$id = $_POST['id'];
$name = $_POST['Dusername'];
$email = $_POST['Demail'];
$specialization = $_POST['specialization'];
$city = $_POST['Dcity'];
$day = $_POST['Ddays'];
$time = $_POST['Dtime'];
// print_r($_POST);
// die();
$update = "UPDATE `doctors` SET
`Dusername` = '$name',
`Demail` = '$email',
`specialization` = '$specialization',
`Dcity` = '$city',
`Days` = '$day',
`Dtime` = '$time'
WHERE `id` = '$id'
";

$result = mysqli_query($connection, $update);

if ($result) {
    echo "<script> alert('Doctor Profile Modify Succesfully') </script>";
    echo "<script> window.location.href='add.php' </script>";
} else {
    die("Query Failed");
}
?>