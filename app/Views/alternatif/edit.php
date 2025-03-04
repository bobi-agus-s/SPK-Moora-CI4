<?php $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<div class="d-flex align-items-center ">
    <a href="<?= site_url('alternatif'); ?>">
        <span class="fa-fw select-all fas me-4 "></span>
    </a>
    <h3 class=""><?= $title; ?></h3>
</div>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<?php if (session()->getFlashData('error')): ?>
<div class="alert alert-danger alert-dismissible show fade">
    <i class="bi bi-check-circle me-3"></i>
    <?= session()->getFlashData('error') ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif ?>

<section class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="card-title"><span class="fa-fw select-all fas me-3 "></span><span class=""><?= $title; ?></span></h4>
                </div>
                <hr>
            </div>
            
            <div class="card-body">
                <form class="form form-vertical" action="<?= site_url('alternatif/update/') ?><?= $alternatif->id_alternatif; ?>" method="post">
                    <input type="hidden" name="id_alternatif" value="<?= $alternatif->id_alternatif ?>">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">

                                <?php $validation = \Config\Services::validation(); ?>

                                <div class="form-group mandatory <?= $validation->hasError('nama_alternatif') ? 'is-invalid' : null ?>" aria-describedby="parsley-id-15">
                                    <label for="nama_alternatif" class="form-label">Nama Alternatif</label>
                                    <input type="text" id="nama_alternatif" class="form-control" name="nama_alternatif" placeholder="Nama Alternatif" data-parsley-required="true" data-parsley-id="15" value="<?= old('nama_alternatif', $alternatif->nama_alternatif); ?>">
                                    <div class="parsley-error filled" id="parsley-id-15" aria-hidden="false">
                                        <span class="parsley-required"><?= $validation->getError('nama_alternatif'); ?></span>
                                    </div>
                                </div>

                            </div>
                            <div class="col-12 mt-3 d-flex justify-content-end">
                                <button type="reset" class="btn btn-light-secondary me-2 mb-1">Reset</button>
                                <button type="submit" class="btn btn-primary me-1 mb-1">Simpan Perubahan</button>
                                
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>
<?= $this->endSection() ?>