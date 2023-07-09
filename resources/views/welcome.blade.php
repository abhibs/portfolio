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




    <script src="{{ asset('user/assets/js/jquery.js') }}"></script>
    <script src="{{ asset('user/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('user/assets/fontawesome/js/all.min.js') }}"></script>
</body>

</html>
