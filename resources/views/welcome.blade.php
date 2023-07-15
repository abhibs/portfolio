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
                    <a href="{{ $socialmedia->facebook }}" target="_blank" class="mx-2"><i
                            class="fab fa-facebook"></i></a>
                    <a href="{{ $socialmedia->twitter }}" target="_blank" class="mx-2"><i
                            class="fab fa-twitter"></i></a>
                    <a href="{{ $socialmedia->instagram }}" target="_blank" class="mx-2"><i
                            class="fab fa-instagram"></i></a>
                    <a href="{{ $socialmedia->linkedin }}" target="_blank" class="mx-2"><i
                            class="fab fa-linkedin"></i></a>
                    <a href="{{ $socialmedia->youtube }}" target="_blank" class="mx-2"><i
                            class="fab fa-youtube"></i></a>
                    <a href="{{ $socialmedia->github }}" target="_blank" class="mx-2"><i
                            class="fab fa-github"></i></a>
                </div>
                <h5 class="text-capitalize">{{ $namecontent->content }}</h5>
            </div>
        </div>
    </div>

    <header id="header">
        <nav id="navbar" class="navbar navbar-expand-lg">
            <a class="navbar-brand px-2 py-0 " href="#">{{ $namecontent->name }}</a>
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
        <div class="container-fluid">
            <div class="row">
                <div class="col no-padding">
                    <div id="demo-slider" class="carousel slide" data-ride="carousel">
                        <!-- The slideshow -->
                        <div class="carousel-inner">
                            @foreach ($sliders as $key => $item)
                                <div class="carousel-item {{ $key === 0 ? 'active' : '' }}"
                                    style="background: linear-gradient(to right, rgba(42, 145, 52, 0.9), rgba(42, 145, 52, 0.5)), url( {{ $item->image }}) center/cover fixed no-repeat; min-height: 60vh;
                                clip-path: polygon(0 0, 100% 0, 100% 85%, 0 95%);">
                                    <div class="carousel-caption mb-5 text-right">
                                        <h1 class="display-3 text-capitalize mb-2 text-center">{{ $item->name }}</h1>
                                        <a href="{{ $item->url }}"
                                            class="btn btn-lg mb-5 text-uppercase banner-btn">my work</a>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                        <a class="carousel-control-prev" href="#demo-slider" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#demo-slider" role="button" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                            <span class="sr-only">Next</span>
                        </a>




                    </div>
                </div>
            </div>
        </div>
    </header>

    <!--skills section-->

    <section id="skills" class="pb-5">
        <div class="container">
            <!--     title-->
            <div class="row title mb-5">
                <div class="col text-center">
                    <h1 class="text-uppercase">my skills</h1>
                    <h3 class="text-capitalize">Lorem ipsum dolor sit amet.</h3>
                    <a href="#" class="mb-0">
                        <p>All Skill</p>
                    </a>
                    <div class="title-underline"></div>

                </div>

            </div>
            <!--      end of title-->
            <div class="row">
                <!--item-->
                @foreach ($skills as $item)
                    <div class="col-lg-6 my-5">
                        <div class="row">
                            <div class="col-6 d-flex align-items-center skills-icon">
                                <span><i class="{{ $item->icon }}"></i></span>
                            </div>
                            <div class="col-6">
                                <h3 class="text-uppercase">{{ $item->name }}</h3>
                                <p class="text-muted">{{ $item->content }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach


                <!--item-->
            </div>
        </div>

    </section>
    <!--end of skills section-->

    <section id="about" class="pb-5">
        <!--video filler-->
        <article id="modal-filler" class="d-flex align-items-center justify-content-center"
            style="min-height: 50vh;
        background: linear-gradient(rgba(42, 145, 52, 0.5), rgba(42, 145, 52, 0.5)), url({{ $aboutvideo->image }})center/cover fixed no-repeat;
    ">
            <!-- modal -->
            <a href="#"><i class="fas fa-play-circle" data-toggle="modal" data-target="#myModal"></i></a>
        </article>
        <!-- end of video fliller-->

        <div class="container">
            <!--     title-->
            <div class="row title my-5">
                <div class="col text-center">
                    <h1 class="text-uppercase">about me</h1>


                </div>

            </div>
            <!--      end of title-->
            <div class="row mb-5">
                <div class="col-md-6 mb-5 d-flex flex-column justify-content-center"
                    style="    min-height: 50vh;
                background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url({{ asset('storage/program/' . $program->image) }})center/cover fixed no-repeat;
                outline: 5px solid #2a9134;
                outline-offset: 10px;">
                    <div class="progress-bars">

                        @foreach ($program->multiprogram as $item)
                            <div class="bar my-3">
                                <h5 class="text-light text-uppercase d-flex justify-content-between">
                                    {{ $item->name }}<span>{{ $item->number }}%</span>
                                </h5>
                                <div class="progress bg-light">

                                    <div class="progress-bar" role="progressbar"
                                        style="width: {{ $item->number }}%;" aria-valuenow="{{ $item->number }}"
                                        aria-valuemin="0" aria-valuemax="100">{{ $item->number }}%</div>
                                </div>
                            </div>
                        @endforeach







                    </div>
                </div>
                <div class="col-md-6 py-5 about-text text-center">
                    <h2 class="text-uppercase">my resume</h2>
                    <a href="{{ asset('storage/resume/' . $resume->resume) }}" target="_blank"
                        class="btn btn-lg d-block w-75 mx-auto text-uppercase mb-5">download resume</a>
                </div>
            </div>
        </div>

    </section>

    <section id="posts" class="py-5 px-4">
        <div class="container">
            <!--     title-->
            <div class="row title mb-5">
                <div class="col text-center">
                    <h1 class="text-uppercase">My Project</h1>
                </div>

            </div>
            <!--      end of title-->
        </div>
        <div class="row">

            <!--     post-->
            <div class="col-md-6 col-lg-4 my-3">
                <div class="card">
                    <img src="./user/assets/img/projects-coffee-1.jpeg" class="card-img-top" alt="coffe">
                    <h6 class="corner-text mb-0 px-3">New</h6>
                    <h1 class="my-2 text-capitalize">post name</h1>
                    <hr class="mb-0">
                    <div class="card-footer d-flex justify-content-between px-0">
                        <a href="#" class="text-capitalize post-link h4">read more...</a>
                        <h4>02/22/2018</h4>
                    </div>
                </div>
            </div>
            <!--end of post-->
            <!--     post-->
            <div class="col-md-6 col-lg-4 my-3">
                <div class="card">
                    <img src="./user/assets/img/projects-water-1.jpeg" class="card-img-top" alt="coffe">
                    <h6 class="corner-text mb-0 px-3">New</h6>
                    <h1 class="my-2 text-capitalize">post name</h1>

                    <hr class="mb-0">
                    <div class="card-footer d-flex justify-content-between px-0">
                        <a href="#" class="text-capitalize post-link h4">read more...</a>
                        <h4>02/22/2018</h4>
                    </div>
                </div>
            </div>
            <!--end of post-->
            <!--     post-->
            <div class="col-md-6 col-lg-4 my-3 mx-auto">
                <div class="card">
                    <img src="./user/assets/img/projects-tea-1.jpeg" class="card-img-top" alt="coffe">
                    <h6 class="corner-text mb-0 px-3">New</h6>
                    <h1 class="my-2 text-capitalize">post name</h1>

                    <hr class="mb-0">
                    <div class="card-footer d-flex justify-content-between px-0">
                        <a href="#" class="text-capitalize post-link h4">read more...</a>
                        <h4>02/22/2018</h4>
                    </div>
                </div>
            </div>
            <!--end of post-->

            <div class="col-md-6 col-lg-4 my-3">
                <div class="card">
                    <img src="./user/assets/img/projects-coffee-1.jpeg" class="card-img-top" alt="coffe">
                    <h6 class="corner-text mb-0 px-3">New</h6>
                    <h1 class="my-2 text-capitalize">post name</h1>

                    <hr class="mb-0">
                    <div class="card-footer d-flex justify-content-between px-0">
                        <a href="#" class="text-capitalize post-link h4">read more...</a>
                        <h4>02/22/2018</h4>
                    </div>
                </div>
            </div>
            <!--end of post-->
            <!--     post-->
            <div class="col-md-6 col-lg-4 my-3">
                <div class="card">
                    <img src="./user/assets/img/projects-water-1.jpeg" class="card-img-top" alt="coffe">
                    <h6 class="corner-text mb-0 px-3">New</h6>
                    <h1 class="my-2 text-capitalize">post name</h1>

                    <hr class="mb-0">
                    <div class="card-footer d-flex justify-content-between px-0">
                        <a href="#" class="text-capitalize post-link h4">read more...</a>
                        <h4>02/22/2018</h4>
                    </div>
                </div>
            </div>
            <!--end of post-->
            <!--     post-->
            <div class="col-md-6 col-lg-4 my-3 mx-auto">
                <div class="card">
                    <img src="./user/assets/img/projects-tea-1.jpeg" class="card-img-top" alt="coffe">
                    <h6 class="corner-text mb-0 px-3">New</h6>
                    <h1 class="my-2 text-capitalize">post name</h1>

                    <hr class="mb-0">
                    <div class="card-footer d-flex justify-content-between px-0">
                        <a href="#" class="text-capitalize post-link h4">read more...</a>
                        <h4>02/22/2018</h4>
                    </div>
                </div>
            </div>
            <!--end of post-->





        </div>

    </section>


    <div class="modal fade" id="myModal" tabindex="-1" role="dialog">

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-capitalize">video example</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>


                <div class="modal-body">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="{{ $aboutvideo->video }}"
                            allowfullscreen></iframe>
                    </div>
                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="{{ asset('user/assets/js/script.js') }}"></script>
    <script src="{{ asset('user/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('user/assets/fontawesome/js/all.min.js') }}"></script>
    <!--  isotope-->
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
</body>

</html>
