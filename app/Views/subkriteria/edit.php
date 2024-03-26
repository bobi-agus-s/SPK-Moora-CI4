<?php $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<div class="d-flex align-items-center">
    <a href="<?= site_url('subkriteria'); ?>">
        <span class="fa-fw select-all fas me-4 "></span>
    </a>
    <h3 class=""><?= $title; ?></h3>
</div>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="card-title"><span class="fa-fw select-all fas me-3 "></span>
                        <span class="">
                            <?= $title; ?> ( <?= $kriteria->nama_kriteria; ?> )</h4>
                        </span>
                </div>
                <hr>
            </div>
            
            <div class="card-body">
                <form class="form form-vertical" action="<?= site_url('subkriteria/update/') ?><?= $subkriteria->id_sub_kriteria; ?>" method="post">
                    <input type="hidden" name="id_kriteria" value="<?= $subkriteria->id_kriteria ?>">
                    <div class="form-body">
                        <div class="row">

                            <div class="col-12">
                                <div class="form-group">
                                    <label><h6>Nama Sub Kriteria</h6></label>
                                    <input name="deskripsi" type="text" class="form-control" value="<?= $subkriteria->deskripsi; ?>">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label><h6>Nilai</h6></label>
                                    <input name="nilai" type="text" class="form-control" value="<?= $subkriteria->nilai; ?>">
                                </div>
                            </div>

                            <div class="col-12 mt-3 d-flex justify-content-end">
                                <button type="reset" class="btn btn-light-secondary me-2 mb-1">Reset</button>
                                <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                                
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>

<!-- modal tambah -->
<div class="modal fade text-left" id="modal-tambah" tabindex="-1" aria-labelledby="myModalLabel33" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33"> 
                    <span class="fa-fw select-all fas mr-3"></span>
                    Login Form 
                </h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <form action="<?= site_url('kriteria/create') ?>" method="post">
                <div class="modal-body">

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label><h6>Kode Kriteria</h6></label>
                                <input name="kode_kriteria" type="text" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label><h6>Nama Kriteria</h6></label>
                                <input name="nama_kriteria" type="text" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <h6>Jenis Kriteria</h6>
                            <fieldset class="form-group">
                                <select name="jenis_kriteria" class="form-select" id="basicSelect">
                                    <option value="benefit">benefit</option>
                                    <option value="cost">cost</option>
                                </select>
                            </fieldset>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label><h6>Bobot (%)</h6></label>
                                <input name="bobot" type="number" class="form-control">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Tutup</span>
                    </button>

                    <button type="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Simpan</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>