<?php
include('../includes/adminheader.php');
include('../includes/config.php');

$email = $_SESSION['admin'];
$fetch = "SELECT * FROM `admin` WHERE `Aemail` = '$email'";
$query = mysqli_query($connection, $fetch);
if (mysqli_num_rows($query) > 0) {
    ?>
    <!-- Team Start -->
    <div class="container-fluid wow fadeInUp mt-4" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-12">
                    <div class="appointment-form h-100 d-flex flex-column justify-content-center text-center wow zoomIn"
                        data-wow-delay="0.6s">
                        <h1 class="text-dark mb-2">Profile</h1>
                        <form method="post" action="updateprofile.php" class="form-group" enctype="multipart/form-data">
                            <div class="row g-3">
                                <?php
                                while ($row = mysqli_fetch_assoc($query)) {
                                    ?>
                                    <div class="col-12 col-sm-12">
                                        <input type="hidden" name="id" value="<?php echo $row['Aid'] ?>" class="form-control">
                                        <div id="image-container">
                                            <img id="selected-image" src="<?php echo 'adminimg/' . $row['AImage'] ?>"
                                                alt="Selected Image" height="100px" width="100px"
                                                style="border-radius: 400px; border:2px groove black;">
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
                                            value="<?php echo $row['Aname'] ?>" style="height: 55px;">
                                    </div>
                                    <div class="col-12 col-sm-12">
                                        <input type="email" name="email" class="form-control bg-light border-0 "
                                            value="<?php echo $row['Aemail'] ?>" style="height: 55px;">
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
include('../includes/adminfooter.php');
?>