<!-- Navbar & Hero Start -->
<div class="container-xxl position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
        <a href="" class="navbar-brand p-0">
            <h1 class="m-0"><i class="fa fa-search me-2"></i>Virginia<span class="fs-5">course</span></h1>
            <!-- <img src="landing-agency/img/logo.png" alt="Logo"> -->
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="/" class="nav-item nav-link {{ request()->is('/') ? 'active' : ''}}">Home</a>
                <a href="/programs" class="nav-item nav-link {{ request()->is('programs') ? 'active' : ''}}">Programs</a>
                <a href="/about-us" class="nav-item nav-link {{ request()->is('about-us') ? 'active' : ''}}">About</a>
                <a  target="_blank" href="https://api.whatsapp.com/send?phone=6281337553455" class="nav-item nav-link ms-4">Contact</a>
                
            </div>
            <a href="/login" class="btn btn-secondary text-light rounded-pill py-2 px-4 ms-3">Login</a>
            <a href="/register" class="btn btn-secondary text-light rounded-pill py-2 px-4 ms-3">Daftar</a>
        </div>
    </nav>

    {{-- HOME HERO --}}
    @if(request()->is('about-us'))
    <div class="container-xxl py-5 bg-primary hero-header mb-5">
        <div class="container my-5 py-5 px-lg-5">
            <div class="row g-5 py-5">
                <div class="col-12 text-center">
                    <h1 class="text-white animated zoomIn">About Us</h1>
                    <hr class="bg-white mx-auto mt-0" style="width: 90px;">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="/programs">Programs</a></li>
                            <a class="breadcrumb-item text-white active" aria-current="page" target="_blank" href="https://api.whatsapp.com/send?phone=6281337553455">Contact</a>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>


    @elseif(request()->is('programs'))
    <div class="container-xxl py-5 bg-primary hero-header mb-5">
        <div class="container my-5 py-5 px-lg-5">
            <div class="row g-5 py-5">
                <div class="col-12 text-center">
                    <h1 class="text-white animated zoomIn">Programs</h1>
                    <hr class="bg-white mx-auto mt-0" style="width: 90px;">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="/about-us">About Us</a></li>
                            <a class="breadcrumb-item text-white active" aria-current="page" target="_blank" href="https://api.whatsapp.com/send?phone=6281337553455">Contact</a>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    @else
    <div class="container-xxl py-5 bg-primary hero-header mb-5">
        <div class="container my-5 py-5 px-lg-5">
            <div class="row g-5 py-5">
                <div class="col-lg-6 text-center text-lg-start">
                    <h1 class="text-white mb-4 animated zoomIn">Tingkatkan Kemampuan Bahasa Inggris Anda Bersama Virginia English Course</h1>
                    <p class="text-white pb-3 animated zoomIn">Tempat kursus bahasa Inggris terpercaya yang tidak hanya berfokus pada tata bahasa tapi juga pada kemampuan berbicara. Daftar sekarang dan jangan lewatkan kesempatan belajar bersama guru berpengalaman kami</p>
                    <a href="/register" class="btn btn-light py-sm-3 px-sm-5 rounded-pill me-3 animated slideInLeft">Daftar Sekarang</a>
                    <a target="_blank" href="https://api.whatsapp.com/send?phone=6281337553455" class="btn btn-outline-light py-sm-3 px-sm-5 rounded-pill animated slideInRight">Kontak Kami</a>
                </div>
                <div class="col-lg-6 text-center text-lg-start">
                    <img class="img-fluid" src="landing-agency/img/hero.png" alt="">
                </div>
            </div>
        </div>
    </div>
    @endif




</div>
<!-- Navbar & Hero End -->