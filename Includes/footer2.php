<!-- Footer Start -->
<div class="container-fluid bg-dark text-light py-5 mt-5 wow fadeInUp" data-wow-delay="0.3s" style="margin-top: -75px;">
    <div class="container pt-5">
        <div class="row g-5 pt-4">
            <div class="col-lg-3 col-md-6">
                <h3 class="text-white mb-4">Quick Links</h3>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-light mb-2" href="index.php"><i
                            class="bi bi-arrow-right text-primary me-2"></i>Home</a>
                    <a class="text-light mb-2" href="about.php"><i class="bi bi-arrow-right text-primary me-2"></i>About
                        Us</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h3 class="text-white mb-4">Popular Links</h3>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-light mb-2" href="profile.php"><i
                            class="bi bi-arrow-right text-primary me-2"></i>Profile</a>
                    <a class="text-light mb-2" href="updatepassword.php"><i
                            class="bi bi-arrow-right text-primary me-2"></i>Change Password</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h3 class="text-white mb-4">Get In Touch</h3>
                <a href="https://www.google.com/maps/place/Aptech+Computer+Education+North+Nazimabad+Center/@24.9273733,67.0304531,17z/data=!3m1!4b1!4m6!3m5!1s0x3eb33f90157042d3:0x93d609e8bec9a880!8m2!3d24.9273733!4d67.0330334!16s%2Fg%2F11xyvbmyb?entry=ttu"
                    target="_blank" style="text-decoration: none; color:white;">
                    <p class="mb-2"><i class="bi bi-geo-alt text-primary me-2"></i>SD-1, Block A North Nazimabad Town,
                        Karachi, 74700</p>
                </a>
                <a href="https://mail.google.com/mail/u/0/#inbox?compose=GTvVlcSKkwpTBQgqmfzRLCwkSkBGpPMfmSxprnRQCJTgZNDLGqQdTKkrTlfnzLZBfGZlvmvvDBDnF"
                    target="_blank" style="text-decoration: none; color:white;">
                    <p class="mb-2"><i class="bi bi-envelope-open text-primary me-2"></i>dentcare@gmail.com</p>
                </a>
                <a href="(021) 234 5678" target="_blank" style="text-decoration: none; color:white;">
                    <p class="mb-0"><i class="bi bi-telephone text-primary me-2"></i>(021) 234 5678</p>
                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <h3 class="text-white mb-4">Follow Us</h3>
                <div class="d-flex">
                    <a class="btn btn-lg btn-primary btn-lg-square rounded me-2" href="https://twitter.com/"
                        target="blank"><i class="fab fa-twitter fw-normal"></i></a>
                    <a class="btn btn-lg btn-primary btn-lg-square rounded me-2" href="https://www.facebook.com/"
                        target="blank"><i class="fab fa-facebook-f fw-normal"></i></a>
                    <a class="btn btn-lg btn-primary btn-lg-square rounded me-2" href="https://www.linkedin.com/"
                        target="blank"><i class="fab fa-linkedin-in fw-normal"></i></a>
                    <a class="btn btn-lg btn-primary btn-lg-square rounded" href="https://www.instagram.com/"
                        target="blank"><i class="fab fa-instagram fw-normal"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid text-light py-4" style="background: #051225;">
    <div class="container">
        <div class="row g-0">
            <div class="col-md-6 text-center text-md-start">
                <p class="mb-md-0">&copy; <a class="text-white border-bottom" href="#">DENTCARE</a>. All Rights
                    Reserved.</p>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <p class="mb-0">Designed by: <a class="text-white border-bottom" href="">HANZALA KHAN</a><br>
                    OWNER: <a class="text-white border-bottom" href="">MOIZ KHAN</a>
                </p>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->
<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/lib/wow/wow.min.js"></script>
<script src="../assets/lib/easing/easing.min.js"></script>
<script src="../assets/lib/waypoints/waypoints.min.js"></script>
<script src="../assets/lib/owlcarousel/owl.carousel.min.js"></script>
<script src="../assets/lib/tempusdominus/js/moment.min.js"></script>
<script src="../assets/lib/tempusdominus/js/moment-timezone.min.js"></script>
<script src="../assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="../assets/lib/twentytwenty/jquery.event.move.js"></script>
<script src="../assets/lib/twentytwenty/jquery.twentytwenty.js"></script>

<!-- Template Javascript -->
<script src="../assets/js/main.js"></script>

<script>
    $(document).ready(function () {
        $('#hospital-search').on('input', function () {
            let query = $(this).val();
            console.log('Query:', query);
            if (query.trim() === '') {
                $('#suggestions-container').empty();
                return;
            }
            $.ajax({
                url: 'search.php',
                method: 'GET',
                data: { query: query },
                success: function (data) {
                    $('#suggestions-container').html(data);
                }
            });
        });

        $(document).on('click', '.suggestion', function () {
            let hospitalId = $(this).data('hospital-id');
            console.log('Hospital ID:', hospitalId);
            let hospitalName = $(this).text();

            $.ajax({
                url: 'fetch_hospital_details.php',
                method: 'GET',
                data: { id: hospitalId },
                success: function (data) {
                    $('#hospital-details').html(data).show();
                    $('#suggestions-container').empty();
                    $('#hospital-search').val(hospitalName);
                }
            });
        });
    });

</script>
</body>

</html>