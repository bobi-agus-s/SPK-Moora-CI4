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
    <?php $error = session()->getFlashData('error') ?>

    <?php foreach ($error as $err): ?>
        <div class="alert alert-danger alert-dismissible show fade">
            <i class="bi bi-check-circle me-3"></i>
            Gagal menambah data
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php break; ?>
    <?php endforeach ?>
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
                                        <th>Kode Kriteria</th>
                                        <th>Nama Kriteria</th>
                                        <th>Jenis Kriteria</th>
                                        <th>Bobot (%)</th>
                                        <th width="10%">aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $bobot_total = 0; ?>
                                    <?php foreach ($kriteria as $key => $dt_kriteria): ?>
                                    <tr>
                                        <td><?= ++$key; ?></td>
                                        <td><?= $dt_kriteria->kode_kriteria; ?></td>
                                        <td><?= $dt_kriteria->nama_kriteria; ?></td>
                                        <td>
                                            <span class="badge bg-<?= $dt_kriteria->jenis_kriteria == 'benefit' ? 'success' : 'warning' ?>"><?= $dt_kriteria->jenis_kriteria; ?></span>
                                        </td>
                                        <td><?= $dt_kriteria->bobot; ?></td>
                                        <td>
                                            <a href="<?= site_url('kriteria/edit/') ?><?= $dt_kriteria->id_kriteria; ?>" class="btn btn-sm btn-outline-warning">
                                                <span class="fa-fw select-all fas"></span>
                                            </a>
                                            <form action="<?= site_url('kriteria/delete/'); ?><?= $dt_kriteria->id_kriteria; ?>" class="d-inline" method="post">
                                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                                    <span class="fa-fw select-all fas"></span>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php $bobot_total += $dt_kriteria->bobot; ?>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                            <div>
                                Total Bobot : <span class=""><?= $bobot_total; ?> %</span>
                            </div>
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
                    Tambah data kriteria 
                </h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <form action="<?= site_url('kriteria/create') ?>" method="post">
            <?php $validation = \Config\Services::validation(); ?>
                <div class="modal-body">

                    <div class="row">

                        <div class="col-12">
                            <div class="form-group mandatory <?= isset($error['kode_kriteria']) ? 'is-invalid' : null; ?>" aria-describedby="parsley-id-15">
                                <label for="kode_kriteria" class="form-label">Kode Kriteria</label>
                                <input type="text" id="kode_kriteria" class="form-control" name="kode_kriteria" data-parsley-required="true" data-parsley-id="15" value="<?= old('kode_kriteria'); ?>">
                                <div class="parsley-error filled" id="parsley-id-15" aria-hidden="false">
                                    <span class="parsley-required"><?= isset($error['kode_kriteria']) ? $error['nama_kriteria'] : null; ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group mandatory <?= isset($error['nama_kriteria']) ? 'is-invalid' : null; ?>" aria-describedby="parsley-id-15">
                                <label for="nama_kriteria" class="form-label">Nama Kriteria</label>
                                <input type="text" id="nama_kriteria" class="form-control" name="nama_kriteria" data-parsley-required="true" data-parsley-id="15" value="<?= old('nama_kriteria'); ?>">
                                <div class="parsley-error filled" id="parsley-id-15" aria-hidden="false">
                                    <span class="parsley-required"><?= isset($error['nama_kriteria']) ? $error['nama_kriteria'] : null; ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <h6>Jenis Kriteria</h6>
                            <fieldset class="form-group">
                                <select name="jenis_kriteria" class="form-select" id="basicSelect">
                                    <option value="benefit">benefit</option>
                                    <option value="cost">cost</option>
                                </select>
                            </fieldset>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label><h6>Bobot (%)</h6></label>
                                <input name="bobot" type="text" class="form-control">
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