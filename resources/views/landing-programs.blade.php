<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Virginia - English Course</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="landing-agency/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="landing-agency/lib/animate/animate.min.css" rel="stylesheet">
    <link href="landing-agency/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="landing-agency/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="landing-agency/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="landing-agency/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        @include('navbar-land')


        <!-- Full Screen Search Start -->
        {{-- <div class="modal fade" id="searchModal" tabindex="-1">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content" style="background: rgba(29, 29, 39, 0.7);">
                    <div class="modal-header border-0">
                        <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex align-items-center justify-content-center">
                        <div class="input-group" style="max-width: 600px;">
                            <input type="text" class="form-control bg-transparent border-light p-3" placeholder="Type search keyword">
                            <button class="btn btn-light px-4"><i class="bi bi-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- Full Screen Search End -->

        <!-- Service Start -->
        @include('program-land')
        <!-- Service End -->


        <!-- Testimonial Start -->
        @include('testimoni-land')
        <!-- Testimonial End -->
        

        {{-- <!-- Newsletter Start -->
        <div class="container-xxl bg-primary newsletter my-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container px-lg-5">
                <div class="row align-items-center" style="height: 250px;">
                    <div class="col-12 col-md-6">
                        <h3 class="text-white">Masih bingung?</h3>
                        <small class="text-white">Jangan malu, tanyakan langsung pada kami</small>
                        <div class="position-relative w-100 mt-3">
                            <a target="_blank" href="https://api.whatsapp.com/send?phone=6281337553455" class="btn btn-outline-light py-sm-3 px-sm-5 rounded-pill animated slideInRight">Kontak Kami</a>
                        </div>
                    </div>
                    <div class="col-md-6 text-center mb-n5 d-none d-md-block">
                        <img class="img-fluid mt-5" style="height: 250px;" src="img/newsletter.png">
                    </div>
                </div>
            </div>
        </div>
        <!-- Newsletter End --> --}}


        <!-- Footer Start -->
        @include('footer-land')
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top pt-2"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="landing-agency/lib/wow/wow.min.js"></script>
    <script src="landing-agency/lib/easing/easing.min.js"></script>
    <script src="landing-agency/lib/waypoints/waypoints.min.js"></script>
    <script src="landing-agency/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="landing-agency/lib/isotope/isotope.pkgd.min.js"></script>
    <script src="landing-agency/lib/lightbox/js/lightbox.min.js"></script>

    <!-- Template Javascript -->
    <script src="landing-agency/js/main.js"></script>
</body>

</html>