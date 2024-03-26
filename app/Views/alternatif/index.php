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

<?php if (session()->getFlashData('error')): ?>
<div class="alert alert-danger alert-dismissible show fade">
    <i class="bi bi-check-circle me-3"></i>
    <?= session()->getFlashData('error') ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif ?>

<section class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="card-title"><span class="fa-fw select-all fas me-3 "></span><span class="">Data <?= $title; ?></span></h4>
                    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modal-tambah">
                        <span class="fa-fw select-all fas mr-3"></span>
                        Tambah Data
                    </button>
                </div>
                <hr>
            </div>
            
            <div class="card-body">
                <div id="table1_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table dataTable no-footer" id="table1" aria-describedby="table1_info">
                                <thead class="table-primary">
                                    <tr>
                                        <th width="5%">No</th>
                                        <th>Nama</th>
                                        <th width="10%">aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($alternatif as $key => $dt_alternatif): ?>
                                    <tr>
                                        <td><?= ++$key; ?></td>
                                        <td><?= $dt_alternatif->nama_alternatif; ?></td>
                                        <td>
                                            <a href="<?= site_url('alternatif/edit/') ?><?= $dt_alternatif->id_alternatif; ?>" class="btn btn-sm btn-outline-warning">
                                                <span class="fa-fw select-all fas"></span>
                                            </a>
                                            <form action="<?= site_url('alternatif/delete/'); ?><?= $dt_alternatif->id_alternatif; ?>" class="d-inline" method="post">
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
                    Tambah data alternatif 
                </h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <form action="<?= site_url('alternatif/create') ?>" method="post">
                <div class="modal-body">

                    <div class="row">
                        <div class="col-12">

                            <?php $validation = \Config\Services::validation(); ?>

                            <div class="form-group mandatory <?= $validation->hasError('nama_alternatif') ? 'is-invalid' : null ?>" aria-describedby="parsley-id-15">
                                <label for="nama_alternatif" class="form-label">Nama Alternatif</label>
                                <input type="text" id="nama_alternatif" class="form-control" name="nama_alternatif" placeholder="Nama Alternatif" data-parsley-required="true" data-parsley-id="15" value="<?= old('nama_alternatif'); ?>">
                                <div class="parsley-error filled" id="parsley-id-15" aria-hidden="false">
                                    <span class="parsley-required"><?= $validation->getError('nama_alternatif'); ?></span>
                                </div>
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