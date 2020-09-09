@extends('layout.master')

@section('content')
<div class="container" id="gallery-homepage">
    @if (session()->getFlashdata('message'))
        <div class="alert alert-success" role="alert">
            {{ session()->getFlashdata('message') }}
        </div>
    @endif
    <ul class="nav justify-content-center mb-5" id="filter-category">
        <li class="nav-item mr-3">
            <a class="nav-link px-3 btn btn-light" aria-current="page" href="{{ route_to('gallery.index')}}">All</a>
        </li>
        <li class="nav-item mr-3">
            <a class="nav-link px-4 btn btn-light" href="{{ route_to('gallery.filter', 'jalan-tol') }}">
                Jalan tol
            </a>
        </li>
        <li class="nav-item mr-3">
            <a class="nav-link px-4 btn btn-light" href="{{ route_to('gallery.filter', 'jembatan') }}">
                Jembatan
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link px-4 btn btn-light" href="{{ route_to('gallery.filter', 'underpass') }}">
                Underpass
            </a>
        </li>
    </ul>
    <div class="row">
        @foreach($galleries as $gallery)
            <div class="col-12 col-md-3 mb-3">
                <div class="card mb-3 gallery-item">
                    <img src="/img/{{ $gallery['cover'] }}" class="card-img-top" data-toggle="modal"
                         data-target="#galleryDetail{{ $gallery['id'] }}"
                         alt="preview gallery" style="cursor: pointer">
                    <div class="card-body d-flex justify-content-between">
                        <p class="card-text" style="max-width: 50%; word-wrap: break-word;">
                            {{ $gallery['pemilik'] }}
                        </p>
                        <time style="max-width: 50%">{{ $gallery['created_at'] }}</time>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="galleryDetail{{ $gallery['id'] }}" tabindex="-1"
                 aria-labelledby="galleryDetail{{ $gallery['id'] }}Label" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="gallery-carousel">
                                            @if ($gallery['type'] == 'foto')
                                                <div>
                                                    <img src="{{ $gallery['content'] }}" alt="..." width="100%">
                                                </div>
                                            @elseif ($gallery['type'] == 'video')
                                                <div>
                                                    <video width="100%" controls>
                                                        <source type="video/mp4"
                                                                src="/video/{{ $gallery['content'] }}">
                                                    </video>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="card__detail-header mb-3">
                                            <h3>{{ $gallery['pemilik'] }}</h3>
                                            <h5 class="text-warning">Kontraktor</h5>
                                            <div class="btn-group" role="group">
                                                <button id="gallery-detail__action" type="button"
                                                        class="btn btn-link text-dark dropdown-toggle"
                                                        data-toggle="dropdown" aria-expanded="false">
                                                    <img src="{{ '/img/three-dots-horizontal.svg' }}"
                                                         alt="More option">
                                                </button>
                                                <ul class="dropdown-menu"
                                                    aria-labelledby="gallery-detail__action">
                                                    <li>
                                                        <a class="dropdown-item editable-btn" href="#"
                                                           data-box-to-edit="#galleryCaptionn{{ $gallery['id'] }}">
                                                            <img src="{{ '/img/pencil.svg' }}" alt="Edit gallery">
                                                            Edit
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <form class="d-inline" method="post"
                                                              action="{{ route_to('gallery.destroy', $gallery['id']) }}">
                                                            @csrf
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <button type="submit" class="dropdown-item">
                                                                <img src="{{ '/img/pencil.svg' }}" alt="Delete gallery">
                                                                Hapus
                                                            </button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div id="galleryCaption{{ $gallery['id'] }}">
                                            {{ $gallery['caption'] }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
@section('component')
    @include('gallery.add')
@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="/slick/slick.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.gallery-carousel').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                cssEase: 'linear',
                infinite: false,
                useTransform: false,
                autoplay: true,
                autoplaySpeed: 6000,
            });
        });
    </script>
@endsection