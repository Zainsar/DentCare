<?php
include('../includes/config.php');

$id = $_POST['bid'];
$name = $_POST['bname'];
$des = $_POST['bdescription'];
$time = $_POST['btime'];
$date = $_POST['bdate'];
$image = $_FILES['bimage']['name'];
$image_tmp = $_FILES['bimage']['tmp_name'];
$image_size = $_FILES['bimage']['size'];
$update = "UPDATE `blogs` SET
`bname` = '$name',
`bdescription` = '$des',
`btime` = '$time',
`bdate` = '$date',
`bimage` = '$image'
WHERE `bid` = '$id'
";

$result = mysqli_query($connection, $update);
move_uploaded_file($image_tmp, 'blogimg/' . $image);
if ($result) {
    echo "<script> alert('Blog Modify Succesfully') </script>";
    echo "<script> window.location.href='addblog.php' </script>";
} else {
    die("Query Failed");
}
?>