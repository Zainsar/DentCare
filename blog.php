<?php
include('includes/navebar.php');
include('includes/config.php');
?>
<!-- Hero Start -->
<div class="container-fluid bg-primary py-5 hero-header mb-5">
    <div class="row py-3">
        <div class="col-12 text-center">
            <h1 class="display-3 text-white animated zoomIn">Blog</h1>
            <a href="" class="h4 text-white">Home</a>
            <i class="far fa-circle text-white px-2"></i>
            <a href="" class="h4 text-white">Blog</a>
        </div>
    </div>
</div>
<!-- Hero End -->
<style>
    .card-wrapper {
  margin-bottom: 30px;
}
.card-image .card .card-img-wrapper {
  height: 100%;
}
.card-image .card .card-body {
  display: none;
}
.card-image-title-description .card .card-img-wrapper {
  max-height: 160px;
}
.card-image-title-description .card {
  position: relative;
  min-height: 300px;
}
.card-image-title-description .card .card-body {
  height: auto;
  position: relative;
  top: 0;
  margin-bottom: -70px;
}
.card-image-title-description .card:hover .card-body {
  top: -70px;
}
.card-image-title-description .card .card-body .card-title {
  margin-bottom: .75rem;
}
.card {
  display: inline-block;
  position: relative;
  overflow: hidden;
  min-height: 400px;
  height: 100%;
}
.card:hover {
  box-shadow: 8px 12px 31px -10px #ab98ab;
}
.card-img-wrapper {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 50%;
  overflow: hidden;
}
.card-img-wrapper img {
  transition: 1.5s ease;
}
.card:hover .card-img-wrapper img {
  transform: scale(1.15);
}
.card-body .card-title {
  margin-bottom: calc(50% + 20px);
  transition: 1.5s ease;
}
.card:hover .card-body .card-title {
  margin-bottom: .75rem;
}

.card-body {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 50%;
  background-color: #fff;
  transition: 1.5s ease;
}
.card-content {
  left: 0;
  right: 0;
  overflow: hidden;
  width: 100%;
  height: auto;
  transition: 1.5s ease;
}
.card:hover .card-body {
  height: 80%;
}
.card:hover .card-content {
  bottom: 0;
}
body {
  margin: 0;
  background-image: linear-gradient(to right, #ECE9E6 , #FFFFFF);
}
</style>
<div class="container">
    <div class="row">
        <?php
        $fetch ="SELECT * FROM `blogs`";
        $conns = mysqli_query($connection, $fetch);
        if(mysqli_num_rows($conns) > 0){
            while($row = mysqli_fetch_assoc($conns)){
        ?>
        <div class="card-wrapper col-lg-4 col-md-6 col-xs-12">
            <div class="card">
                <div class="card-img-wrapper">
                    <img class="card-img-top"
                        src="<?php echo 'Admin Panel/blogimg/' . $row['bimage']?>"
                        alt="Card image cap">
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['bname']?></h5>
                    <br>
                    <p class="card-text"><?php echo $row['bdescription']?></p>
                    <a href="#" class="btn btn-primary"><?php echo $row['bdate'] . ' '. $row['btime']?></a>
                </div>
            </div>
        </div>
        <?php
            }
        }
        ?>
    </div>
</div>

<?php
include('includes/footer.php');
?>