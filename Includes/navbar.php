<?php
session_start();
if (!isset($_SESSION['doctor'])) {
    header("Location:doc_login.php");
    // exit();

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DentCare</title>
    <link rel="icon" type="image/png" href="../img/tt.png">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="../assets/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../assets/lib/animate/animate.min.css" rel="stylesheet">
    <link href="../assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <link href="../assets/lib/twentytwenty/twentytwenty.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <style>
        form {
            width: 100%;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
        }

        #hospital-search {
            flex: 1;
            padding: 10px;
            width: 100%;
            border: 2px solid #007BFF;
            border-radius: 5px;
        }

        #suggestions-container {
            margin-top: 10px;
        }

        #hospital-details {
            display: none;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm px-5 py-3 py-lg-0">
        <a href="index.php" class="navbar-brand p-0">
            <h1 class="m-0 text-primary"><i class="fas fa-hand-holding-heart" style="color: #06A3DA;"></i> Care</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="index.php" class="nav-item nav-link active">Home</a>
                <a href="about.php" class="nav-item nav-link">About</a>
            </div>
        </div>
        <?php
        require("../includes/config.php");
        $username = $_SESSION["doctor"];
        $query = "SELECT * FROM `doctors` WHERE `Demail` = '$username'";
        $result = mysqli_query($connection, $query);
        $result1 = mysqli_fetch_assoc($result);
        ?>
        <div class="navbar-nav">
            <li class="dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                    <span>
                        <?php echo $result1['Dusername']; ?>
                    </span>
                    <img src="<?php echo '../doctors/doctorimg/' . $result1['Dimage'] ?>" alt="profile Image" height="40px"
                        width="40px" style="border-radius: 50%; border: 2px solid black;">
                </a>
                <ul class="dropdown-menu" style="padding: 0%; margin:0%;">
                    <li class="nav-item"><a href="profile.php" class="nav-link"><i class="bx bx-user"></i> My
                            Profile</a></li>
                    <li class="nav-item"><a href="updatepassword.php" class="nav-link"><i class="bx bx-cog"></i> Update
                            Password</a></li>
                    <li class="nav-item"><a href="logout.php" class="nav-link"><i class="bx bx-log-out"></i> Logout</a>
                    </li>
                </ul>
            </li>
        </div>

    </nav>
    <!-- Navbar End -->
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary m-1" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <div class="spinner-grow text-dark m-1" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <div class="spinner-grow text-secondary m-1" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-light ps-5 pe-0 d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-md-6 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center">
                    <small class="py-2"><i class="far fa-clock text-primary me-2"></i>Opening Hours: Mon - Tues : 6.00
                        am - 10.00 pm, Sunday Closed </small>
                </div>
            </div>
            <div class="col-md-6 text-center text-lg-end">
                <div class="position-relative d-inline-flex align-items-center bg-primary text-white top-shape px-5">
                    <div class="me-3 pe-3 border-end py-2">
                        <p class="m-0"><i class="fa fa-envelope-open me-2"></i>dentcare@gmail.com</p>
                    </div>
                    <div class="py-2">
                        <p class="m-0"><i class="fa fa-phone-alt me-2"></i>(021) 234 5678</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->
    <!-- Full Screen Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
                <div class="modal-header border-0">
                    <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <div class="input-group" style="max-width: 600px;">
                        <form>
                            <input type="text" id="hospital-search"
                                class="form-control bg-transparent border-primary p-3"
                                placeholder="Type search keyword">
                            <!-- <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button> -->
                            <div id="suggestions-container"></div>
                        </form>
                        <div id="hospital-details" style="display: none;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Full Screen Search End -->