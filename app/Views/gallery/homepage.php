<?= $this->extend('layout/master'); ?>

<?= $this->section('content'); ?>
<div class="container" id="gallery-homepage">
    <?php if (session()->getFlashdata('message')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('message'); ?>
        </div>
    <?php endif; ?>
    <ul class="nav justify-content-center mb-5">
        <li class="nav-item mr-3">
            <a class="nav-link px-3 btn btn-light active" aria-current="page" href="#">All</a>
        </li>
        <li class="nav-item mr-3">
            <a class="nav-link px-4 btn btn-light" href="#">Jalan tol</a>
        </li>
        <li class="nav-item mr-3">
            <a class="nav-link px-4 btn btn-light" href="#">Jembatan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link px-4 btn btn-light" href="#">Underpass</a>
        </li>
    </ul>
    <div class="row">
        <?php foreach ($galleries as $gallery): ?>
            <div class="col-12 col-md-3 mb-3">
                <div class="card mb-3 gallery-item">
                    <img src="<?= $gallery['photo'] ?>" class="card-img-top" data-toggle="modal"
                         data-target="#galleryDetail<?= $gallery['id'] ?>" alt="preview gallery" style="cursor: pointer">
                    <div class="card-body d-flex justify-content-between">
                        <p class="card-text"><?= $gallery['pemilik'] ?></p>
                        <time><?= $gallery['created_at'] ?></time>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="galleryDetail<?= $gallery['id'] ?>" tabindex="-1"
                 aria-labelledby="galleryDetail<?= $gallery['id'] ?>Label" aria-hidden="true">
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
                                            <div>
                                                <img src="/img/jembatan.jpg" alt="..." width="100%">
                                            </div>
                                            <div>
                                                <img src="https://cdn.pixabay.com/photo/2014/01/02/15/30/tunnel-237656_1280.jpg"
                                                     alt="..." width="100%">
                                            </div>
                                            <div>
                                                <img src="/img/tol1.jpg" alt="..." width="100%">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="card__detail-header mb-3">
                                            <h3><?= $gallery['pemilik'] ?></h3>
                                            <h5 class="text-warning">Kontraktor</h5>
                                            <div class="btn-group" role="group">
                                                <button id="gallery-detail__action" type="button"
                                                        class="btn btn-link text-dark dropdown-toggle"
                                                        data-toggle="dropdown" aria-expanded="false">
                                                    <img src="/img/three-dots-horizontal.svg"
                                                         alt="More option">
                                                </button>
                                                <ul class="dropdown-menu"
                                                    aria-labelledby="gallery-detail__action">
                                                    <li>
                                                        <a class="dropdown-item editable-btn" href="#"

                                                           data-box-to-edit="#galleryCaption">
                                                            <img src="/img/pencil.svg" alt="Edit gallery">
                                                            Edit
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <form action="/gallery/delete/<?= $gallery['id'] ?>"
                                                              class="d-inline" method="post">
                                                            <?= csrf_field(); ?>
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <button type="submit" class="dropdown-item">
                                                                <img src="/img/trash.svg" alt="Delete gallery">
                                                                Hapus
                                                            </button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div id="galleryCaption">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                            Mauris leo elit, sodales eu purus vitae, lobortis porta felis.
                                            Maecenas sagittis velit lorem, in gravida diam feugiat non.
                                            Cras faucibus posuere scelerisque. Vivamus vitae elit nec augue
                                            feugiat pellentesque eget sit amet purus. Phasellus vestibulum porta
                                            metus, id malesuada lorem pharetra sed. Fusce purus dolor,
                                            lacinia sit amet placerat vel, varius convallis lacus.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?= $this->endSection(); ?>
<?= $this->section('component'); ?>
    <?= $this->include('gallery/add.php') ?>
<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
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
<?= $this->endSection(); ?>