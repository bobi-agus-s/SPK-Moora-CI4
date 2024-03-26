<?php $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<div class="d-flex align-items-center">
    <a href="<?= site_url('kriteria'); ?>">
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
                    <h4 class="card-title"><span class="fa-fw select-all fas me-3 "></span><span class=""><?= $title; ?></span></h4>
                </div>
                <hr>
            </div>
            
            <div class="card-body">
                <form class="form form-vertical" action="<?= site_url('kriteria/update/') ?><?= $kriteria->id_kriteria; ?>" method="post">
                    <input type="hidden" name="id_kriteria" value="<?= $kriteria->id_kriteria ?>">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label><h6>Kode Kriteria</h6></label>
                                    <input name="kode_kriteria" value="<?= $kriteria->kode_kriteria ?>" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label><h6>Nama Kriteria</h6></label>
                                    <input name="nama_kriteria" value="<?= $kriteria->nama_kriteria ?>" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-12">
                                <h6>Jenis Kriteria</h6>
                                <fieldset class="form-group">
                                    <select name="jenis_kriteria" class="form-select" id="basicSelect">
                                        <option value="benefit" <?= $kriteria->jenis_kriteria == 'benefit' ? 'selected' : null ?>>benefit</option>
                                        <option value="cost" <?= $kriteria->jenis_kriteria == 'cost' ? 'selected' : null ?>>cost</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label><h6>Bobot (%)</h6></label>
                                    <input name="bobot" value="<?= $kriteria->bobot ?>" type="text" class="form-control">
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