<?php
include('../includes/adminheader.php');
include('../includes/config.php');

if (isset($_POST['submit'])) {
    $name = $_POST['bname'];
    $des = $_POST['bdescription'];
    $time = $_POST['btime'];
    $date = $_POST['bdate'];
    $Image = $_FILES['bimage']['name'];
    $Imagetmp = $_FILES['bimage']['tmp_name'];
    $Imagesize = $_FILES['bimage']['size'];



    $insert = "INSERT INTO `blogs` (`bname`, `bdescription`, `btime`, `bdate`, `bimage`) VALUES ('$name', '$des', '$time', '$date', '$Image')";
    $connect_insert = mysqli_query($connection, $insert);
    move_uploaded_file($Imagetmp, 'blogimg/' . $Image);
    echo "<script> window.location.href='addblog.php'</script>";
}
?>
<div class="container mt-2">
    <h2 class="text-center" style="color:#06A3DA;">Add Blog</h2>
    <form class="row g-3 form-group " method="post" action="addmore.php" enctype="multipart/form-data">
        <div class="col-md-12">
            <label for="validationDefault01" class="form-label">Name</label>
            <input type="text" name="bname" class="form-control" id="validationDefault01" placeholder="Blog Name"
                required>
        </div>
        <div class="col-md-6">
            <label for="validationDefault02" class="form-label">Description</label>
            <input type="text" name="bdescription" class="form-control" id="validationDefault02"
                placeholder="Description" required>
        </div>
        <div class="col-md-6">
            <label for="validationDefaultUsername" class="form-label">Time</label>
            <input type="time" name="btime" class="form-control" id="validationDefault02" placeholder="07:35 pm"
                required>

        </div>
        <div class="col-md-6">
            <label for="validationDefault04" class="form-label">Date</label>
            <input type="date" name="bdate" class="form-control" id="validationDefault02" placeholder="23/07/2033"
                required>
        </div>
        <div class="col-md-6">
            <label for="validationDefault03" class="form-label">Image</label>
            <input type="file" class="form-control" name="bimage" id="validationDefault03" placeholder="user.png"
                required>
        </div>
        <div class="col-12">
            <button class="btn btn-primary" name="submit" type="submit">Add Blog</button>
        </div>
    </form>
</div>


<?php
include('../includes/adminfooter.php');
?>