<?php
include('includes/navebar.php');
include('includes/config.php');

$email = $_SESSION['useremail'];
$fetch = "SELECT * FROM `Patient` WHERE `email` = '$email'";
$query = mysqli_query($connection, $fetch);
if (mysqli_num_rows($query) > 0) {
    ?>
    <!-- Hero Start -->
    <div class="container-fluid bg-primary py-5 hero-header mb-5">
        <div class="row py-3">
            <div class="col-12 text-center">
                <h1 class="display-3 text-white animated zoomIn">Profile</h1>
                <a href="" class="h4 text-white">Home</a>
                <i class="far fa-circle text-white px-2"></i>
                <a href="" class="h4 text-white">Profile</a>
            </div>
        </div>
    </div>
    <!-- Hero End -->


    <!-- Team Start -->
    <div class="container-fluid mb-5 wow fadeInUp" data-wow-delay="0.1s" style="margin-top: 90px;">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-12">
                    <div class="appointment-form h-100 d-flex flex-column justify-content-center text-center p-5 wow zoomIn"
                        data-wow-delay="0.6s">
                        <h1 class="text-white mb-4">Profile</h1>
                        <form method="post" action="updateprofile.php" class="form-group" enctype="multipart/form-data">
                            <div class="row g-3">
                                <?php
                                while ($row = mysqli_fetch_assoc($query)) {
                                    ?>
                                    <div class="col-12 col-sm-12">
                                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>" class="form-control">
                                        <div id="image-container">
                                            <img id="selected-image" src="<?php echo 'userimg/' . $row['PImage'] ?>"
                                                alt="Selected Image" height="200px" width="200px"
                                                style="border-radius: 200px; border:2px groove black;">
                                            <button id="change-image" style="display: none;">Change Image</button>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12">
                                        <!-- <label for="text">Image</label> -->
                                        <input type="file" id="image-input" name="imgs" class="form-control"
                                            style="display: none;">
                                        <label for="image-input" class="custom-file-upload" name="imgs">
                                            Upload Image
                                        </label>
                                    </div>
                                    <div class="col-12 col-sm-12">
                                        <input type="text" name="name" class="form-control bg-light border-0 "
                                            value="<?php echo $row['name'] ?>" style="height: 55px;">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <input type="email" name="email" class="form-control bg-light border-0 "
                                            value="<?php echo $row['email'] ?>" style="height: 55px;">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <input type="phone" name="phone" class="form-control bg-light border-0 "
                                            value="<?php echo $row['phone'] ?>" style="height: 55px;">
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-dark w-100 py-3" name="submit" type="submit">Edit
                                            Profile</button>
                                    </div>
                                    <?php
                                }
} ?>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Team End -->
<script>
    const imageInput = document.getElementById("image-input");
    const selectedImage = document.getElementById("selected-image");
    const changeImageBtn = document.getElementById("change-image");

    changeImageBtn.addEventListener("click", function () {
        // Trigger the file input click event
        imageInput.click();
    });

    imageInput.addEventListener("change", function (event) {
        const file = event.target.files[0];

        if (file) {
            const imageUrl = URL.createObjectURL(file);
            selectedImage.src = imageUrl;
        }
    });


</script>
<?php
include('includes/footer.php');
?>