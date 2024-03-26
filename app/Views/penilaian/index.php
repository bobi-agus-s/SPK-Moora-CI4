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

<section class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="card-title"><span class="fa-fw select-all fas me-3 "></span><span class="">Data <?= $title; ?></span></h4>
                    
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
                                        <th>Nama Alternatif</th>
                                        <th width="15%">aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($alternatif as $key => $dt_alternatif): ?>
                                    <?php $cek_alt = is_object($model_penilaian->where('id_alternatif', $dt_alternatif->id_alternatif)->first());?>
                                    <tr>
                                        <td><?= ++$key; ?></td>
                                        <td><?= $dt_alternatif->nama_alternatif; ?></td>
                                        <td>
                                            <?php if ($cek_alt): ?>
                                            <a href="<?= site_url('penilaian/edit/') ?><?= $dt_alternatif->id_alternatif; ?>" class="btn btn-sm btn-outline-warning">
                                                <span class="fa-fw select-all fas"></span> Edit Penilaian
                                            </a>
                                            <?php else: ?>
                                            <a href="<?= site_url('penilaian/input/') ?><?= $dt_alternatif->id_alternatif; ?>" class="btn btn-sm btn-outline-info">
                                                <span class="fa-fw select-all fas"></span> Input Penilaian
                                            </a>
                                            <?php endif ?>
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

<?= $this->endSection() ?>