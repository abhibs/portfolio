<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Porfolio Website</title>
    <link rel="stylesheet" href="{{ asset('user/assets/css/bootstrap.min.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="{{ asset('user/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('user/assets/fontawesome/css/all.min.css') }}">
    <link href="{{ asset('user/assets/css/font.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container-fluid icon-top py-2 px-3">
        <div class="row">
            <div class="col d-flex justify-content-between align-items-baseline">
                <div class="top-icons">
                    <a href="{{ $socialmedia->facebook }}" target="_blank" class="mx-2"><i class="fab fa-facebook"></i></a>
                    <a href="{{ $socialmedia->twitter }}" target="_blank" class="mx-2"><i class="fab fa-twitter"></i></a>
                    <a href="{{ $socialmedia->instagram }}" target="_blank" class="mx-2"><i class="fab fa-instagram"></i></a>
                    <a href="{{ $socialmedia->linkedin }}" target="_blank" class="mx-2"><i class="fab fa-linkedin"></i></a>
                    <a href="{{ $socialmedia->youtube }}" target="_blank" class="mx-2"><i class="fab fa-youtube"></i></a>
                    <a href="{{ $socialmedia->github }}" target="_blank" class="mx-2"><i class="fab fa-github"></i></a>
                </div>
                <h5 class="text-capitalize">all rights reserved</h5>
            </div>
        </div>
    </div>

    <header id="header">
        <nav id="navbar" class="navbar navbar-expand-lg">
            <a class="navbar-brand px-2 py-0 " href="#">Coder</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </button>

            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link m-2 text-capitalize nav-active" href="#header">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link m-2 text-capitalize" href="#skills">Skills</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link m-2 text-capitalize" href="#about">about</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link m-2 text-capitalize" href="#projects">projects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link m-2 text-capitalize" href="#posts">posts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link m-2 text-capitalize" href="#reviews">reviews</a>
                    </li>
                </ul>
                <form>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search Here.....">
                        <div class="input-group-append">
                            <button class="btn search-btn" type="button"><i class="fas fa-search"></i></button>

                        </div>
                    </div>

                </form>

            </div>
        </nav>
    </header>




    <script src="{{ asset('user/assets/js/jquery.js') }}"></script>
    <script src="{{ asset('user/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('user/assets/fontawesome/js/all.min.js') }}"></script>
</body>

</html>
