<?php $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<h3 class=""><?= $title; ?></h3>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<?php if (session()->getFlashData('success')): ?>
<div class="alert alert-success alert-dismissible show fade">
    <i class="bi bi-check-circle me-3"></i>
    <?= session()->getFlashData('success') ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif ?>

<?php foreach ($kriteria as $dt_kriteria): ?>
<section class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="card-title"><span class="fa-fw select-all fas me-3 "></span><span class="">Data <?= $title; ?></span></h4>
                    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modal-tambah-<?= $dt_kriteria->id_kriteria; ?>">
                        <span class="fa-fw select-all fas mr-3"></span>
                        Tambah Data
                    </button>
                </div>
                <hr>
            </div>
            
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table">
                        <thead class="table-primary">
                            <tr>
                                <th width="5%">No</th>
                                <th>Nama Sub Kriteria</th>
                                <th>Nilai</th>
                                <th width="10%">aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $subkriteria = $model_subkriteria->getDataByKriteria($dt_kriteria->id_kriteria) ?>
                            <?php foreach ($subkriteria as $key => $dt_subkriteria): ?>
                            <tr>
                                <td><?= ++$key; ?></td>
                                <td><?= $dt_subkriteria->deskripsi; ?></td>
                                <td><?= $dt_subkriteria->nilai; ?></td>
                                <td>
                                    <a href="<?= site_url('subkriteria/edit/') ?><?= $dt_subkriteria->id_sub_kriteria; ?>" class="btn btn-sm btn-outline-warning">
                                        <span class="fa-fw select-all fas"></span>
                                    </a>
                                    <form action="<?= site_url('subkriteria/delete/'); ?><?= $dt_subkriteria->id_sub_kriteria; ?>" class="d-inline" method="post">
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            <span class="fa-fw select-all fas"></span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</section>



<!-- modal tambah -->
<div class="modal fade text-left" id="modal-tambah-<?= $dt_kriteria->id_kriteria; ?>" tabindex="-1" aria-labelledby="myModalLabel33" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33"> 
                    <span class="fa-fw select-all fas mr-3 "></span>
                    <span>
                        Tambah Sub kriteria <?= $dt_kriteria->nama_kriteria; ?>
                    </span>
                </h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <form action="<?= site_url('subkriteria/create') ?>" method="post">
                <input type="hidden" name="id_kriteria" value="<?= $dt_kriteria->id_kriteria; ?>">
                <div class="modal-body">

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label><h6>Nama Sub Kriteria</h6></label>
                                <input name="deskripsi" type="text" class="form-control">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label><h6>Nilai</h6></label>
                                <input name="nilai" type="text" class="form-control">
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
<?php endforeach ?>


<?= $this->endSection() ?>