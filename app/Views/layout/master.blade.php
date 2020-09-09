<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" crossorigin="anonymous"
          href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
          integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I">
    <link rel="stylesheet" type="text/css" href="/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="/slick/slick-theme.css"/>
    <link rel="stylesheet" href="/css/native.css">
    <title>Hello, world!</title>
    <style>
        .btn-light.active {
            background-color: #28a745;
            border-color: #28a745;
            color: #fff;
        }
        #gallery-homepage .slick-arrow {
            top: auto;
            bottom: 0;
            z-index: 1;
        }
        #gallery-homepage .slick-prev {
            transform: translateX(-200%);
            left: 50%;
        }
        #gallery-homepage .slick-next {
            transform: translateX(50%);
            right: 50%;
        }
        [id*='galleryDetail'] .dropdown-toggle::after {
            content: none;
        }
        [id*='galleryDetail'] .card__detail-header {
            position: relative;
        }
        [id*='galleryDetail'] .card__detail-header .btn-group {
            position: absolute;
            top: 0;
            right: 0;
        }
    </style>
</head>
<body id="@yield('page-id')">
<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container-fluid">
        <a class="btn btn-warning text-white px-4" data-toggle="modal"
           data-target="#addNewGallery" href="javascript:void(0);">Tambah</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarGallery"
                aria-controls="navbarGallery" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarGallery">
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item mx-3">
                    <a class="nav-link btn px-4 btn-light" aria-current="page"
                       href="{{ route_to('gallery.index') }}">
                        Foto
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn px-4 btn-light" aria-current="page"
                       href="{{ route_to('gallery.type', 'video') }}">
                        Video
                    </a>
                </li>
                <li class="nav-item ml-5">
                    <span class="nav-link btn btn-transparent px-4">Filter by</span>
                </li>
            </ul>
        </div>
    </div>
</nav>
@yield('content')
@yield('component')
<script crossorigin="anonymous"
        src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"></script>
<script crossorigin="anonymous"
        src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
        integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/"></script>
<script src="/js/moment.js"></script>
@yield('script')
<script src="/js/native.js"></script>
</body>
</html>