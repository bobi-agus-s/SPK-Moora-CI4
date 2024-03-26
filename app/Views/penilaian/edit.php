<?php $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<div class="d-flex align-items-center">
    <a href="<?= site_url('penilaian'); ?>">
        <span class="fa-fw select-all fas me-4 "></span>
    </a>
    <h3 class=""><?= $title; ?></h3>
</div>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="row">
    <!-- input penilaian -->
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="card-title "><span class="fa-fw select-all fas me-3"></span><span><?= $title; ?></span></h4>
                </div>
                <hr>
            </div>
            
            <div class="card-body">
                <form class="form form-vertical" action="<?= site_url('penilaian/update') ?>" method="post">
                    <input type="hidden" name="id_alternatif" value="<?= $alternatif->id_alternatif; ?>">
                    <div class="form-body">
                        <div class="row">

                            <?php foreach ($kriteria as $dt_kriteria): ?>
                            <input type="hidden" name="id_kriteria[]" value="<?= $dt_kriteria->id_kriteria; ?>">
                            <?php $subkriteria = $model_subkriteria->getDataByKriteria($dt_kriteria->id_kriteria) ?>

                            <div class="col-12">
                                <h6><?= $dt_kriteria->nama_kriteria; ?></h6>
                                <fieldset class="form-group">
                                    <select name="id_sub_kriteria[]" class="form-select" id="basicSelect">
                                        <?php foreach ($subkriteria as $dt_subkriteria): ?>
                                        <?php $dt_penilaian = $model_penilaian->getPenilaian($alternatif->id_alternatif, $dt_kriteria->id_kriteria) ?>
                                            <option 
                                                <?= $dt_penilaian->id_sub_kriteria == $dt_subkriteria->id_sub_kriteria ? 'selected' : null ?>
                                                value="<?= $dt_subkriteria->id_sub_kriteria; ?>">
                                                <?= $dt_subkriteria->deskripsi; ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                </fieldset>
                            </div>

                            <?php endforeach ?>

                            <div class="col-12 mt-3 d-flex justify-content-end">
                                <button type="reset" class="btn btn-light-secondary me-2 mb-1">Reset</button>
                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <!-- data alternatif -->
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="card-title "><span class="fa-fw select-all fas me-3"></span>Data Alternatif</h4>
                </div>
                <hr>
            </div>
            
            <div class="card-body">
                <table class="table">
                    <tbody>
                        <tr>
                            <td width="15%">Nama</td>
                            <td width="2%">:</td>
                            <td><?= $alternatif->nama_alternatif; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</section>
<?= $this->endSection() ?>