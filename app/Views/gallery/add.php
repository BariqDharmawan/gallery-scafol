<div class="modal fade" id="addNewGallery" tabindex="-1"
     aria-labelledby="addNewGalleryLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pb-5">
                <div class="container-fluid">
                    <form action="<?= route_to('gallery.store') ?>" method="post"
                          id="form-add-gallery" class="row">
                        <?= csrf_field(); ?>
                        <div class="col-12 col-md-6 pr-5">
                            <h5 class="modal-title mb-3" id="addNewGalleryLabel">Upload file</h5>
                            <div class="upload-drag-drop">
                                <input type="text" name="cover" placeholder="photo" value="jembatan.jpg" readonly required>
<!--                                <input type="file" class="upload-drag-drop__input"-->
<!--                                       id="uploadCarousel" name="photo" required>-->
<!--                                <label for="uploadCarousel" class="upload-drag-drop__box">-->
<!--                                    <img src="/img/upload.svg" alt="Upload icon" class="upload-drag-drop__icon">-->
<!--                                    <span class="text-muted mb-3 mt-2">Drop file document here</span>-->
<!--                                    <small class="btn upload-drag-drop__btn">Browse</small>-->
<!--                                </label>-->
                            </div>
                        </div>
                        <div class="col-12 col-md-6 border-left pl-5 pt-5">
                            <div class="card__detail-header mb-3">
                                <div class="mb-3">
                                    <input class="form-control <?= $validation->hasError('caption') ? 'is-invalid' : '' ?>"
                                           type="text" name="pemilik" placeholder="Pemilik gallery" autofocus required>
                                </div>
                                <div class="mb-3">
                                    <textarea class="form-control <?= $validation->hasError('caption') ? 'is-invalid' : '' ?>"
                                              rows="5" name="caption" placeholder="Ex: lorem ipsum"
                                              style="max-height: 200px" required autofocus><?= old('caption'); ?></textarea>
                                    <div class="invalid-feedback">
                                        Caption harus diisi dengan maksimal 255 karakter
                                    </div>
                                </div>
                                <div class="mb-5">
                                    <select class="form-select <?= $validation->hasError('caption') ? 'is-invalid' : '' ?>"
                                            name="category" required>
                                        <option disabled selected>Pilih tag</option>
                                        <option value="jalan-tol">Jalan tol</option>
                                        <option value="jembatan">Jembatan</option>
                                        <option value="underpass">Underpass</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Pilih kategori
                                    </div>
                                </div>
                                <div class="mb-3 d-flex justify-content-between">
                                    <button type="button" class="close btn flex-grow-1 text-white mr-3"
                                            data-dismiss="modal" aria-label="Close"
                                            style="background-color: #6c757d">
                                        Batal
                                    </button>
                                    <button type="submit" class="btn btn-warning flex-grow-1 text-white">
                                        Simpan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>