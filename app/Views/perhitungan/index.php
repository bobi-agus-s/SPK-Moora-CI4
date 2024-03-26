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

<!-- matrik keputusan -->
<section class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="card-title "><span class="fa-fw select-all fas me-3"></span>Matrix Keputusan (x)</h4>
                </div>
                <hr>
            </div>
            
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table">
                        <thead class="table-primary">
                            <tr>
                                <th width="5%">No</th>
                                <th>Altenatif</th>
                                <?php foreach ($kriteria as $dt_kriteria): ?>
                                    <th><?= $dt_kriteria->kode_kriteria; ?></th>
                                <?php endforeach ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($alternatif as $key => $dt_alternatif): ?>
                                <tr class="<?= $key+1 == (count($alternatif)) ? 'border-danger' : null; ?>">
                                    <td><?= ++$key; ?></td>
                                    <td><?= $dt_alternatif->nama_alternatif; ?></td>
                                    <?php foreach ($kriteria as $dt_kriteria): ?>
                                    <?php $dt = $model_perhitungan->getNilai($dt_alternatif->id_alternatif, $dt_kriteria->id_kriteria) ?>
                                    <td>
                                        <?= $dt->nilai; ?>
                                    </td>
                                    <?php endforeach ?>
                                </tr>
                            <?php endforeach ?>
                            <tr class="border-danger">
                                <td colspan="1"></td>
                                <td>Optimum</td>
                                <?php foreach ($kriteria as $dt_kriteria): ?>
                                    <td>
                                        <?= $dt_kriteria->jenis_kriteria == "benefit" ? '+' : '-' ?>
                                    </td>
                                <?php endforeach ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- bobot kriteria -->
<section class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="card-title "><span class="fa-fw select-all fas me-3"></span>Bobot Preferensi (w)</h4>
                </div>
                <hr>
            </div>
            
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table">
                        <thead class="">
                            <tr>
                                <th>Kriteria</th>
                                <?php foreach ($kriteria as $dt_kriteria): ?>
                                    <th><?= $dt_kriteria->kode_kriteria; ?> (<?= $dt_kriteria->nama_kriteria; ?>)</th>
                                <?php endforeach ?>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Bobot (w)</td>
                                <?php foreach ($kriteria as $dt_kriteria): ?>
                                <td>
                                    <?= $dt_kriteria->bobot; ?> %
                                </td>
                                <?php endforeach ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- normalisasi matrix -->
<section class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="card-title "><span class="fa-fw select-all fas me-3"></span>Normalisasi Matrix Moora (Y)</h4>
                </div>
                <hr>
            </div>
            
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table">
                        <thead class="table-primary">
                            <tr>
                                <th width="5%">No</th>
                                <th>Altenatif</th>
                                <?php foreach ($kriteria as $dt_kriteria): ?>
                                    <th><?= $dt_kriteria->kode_kriteria; ?></th>
                                <?php endforeach ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($alternatif as $key => $dt_alternatif): ?>
                                <tr>
                                    <td><?= ++$key; ?></td>
                                    <td><?= $dt_alternatif->nama_alternatif; ?></td>
                                    <?php foreach ($kriteria as $dt_kriteria): ?>
                                    <?php $x = $model_perhitungan->getNilai($dt_alternatif->id_alternatif, $dt_kriteria->id_kriteria) ?>
                                    <?php $penyebut = $model_perhitungan->getPenyebut($dt_kriteria->id_kriteria) ?>
                                    <td>
                                        <?php $Xij = round($x->nilai / $penyebut->nilai, 6); ?>
                                        <?= $Xij; ?>
                                    </td>
                                    <?php endforeach ?>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Optimasi Yi (Max - Min) -->
<section class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="card-title "><span class="fa-fw select-all fas me-3"></span>Optimasi Yi (Max - Min) (Yi)</h4>
                </div>
                <hr>
            </div>
            
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table">
                        <thead class="table-primary">
                            <tr>
                                <th width="5%">No</th>
                                <th>Altenatif</th>
                                <?php foreach ($kriteria as $dt_kriteria): ?>
                                    <th><?= $dt_kriteria->kode_kriteria; ?></th>
                                <?php endforeach ?>
                                <th>Hasil Yi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($alternatif as $key => $dt_alternatif): ?>
                                <?php $total = 0; ?>
                                <tr>
                                    <td><?= ++$key; ?></td>
                                    <td><?= $dt_alternatif->nama_alternatif; ?></td>
                                    <?php foreach ($kriteria as $dt_kriteria): ?>
                                    <?php $x = $model_perhitungan->getNilai($dt_alternatif->id_alternatif, $dt_kriteria->id_kriteria) ?>
                                    <?php $penyebut = $model_perhitungan->getPenyebut($dt_kriteria->id_kriteria) ?>
                                    <td>
                                        <?php $Xij = round($x->nilai / $penyebut->nilai, 6); ?>
                                        <?php $nilai = $Xij*($dt_kriteria->bobot/100); ?>
                                        <?= $nilai; ?>

                                        <?php if ($dt_kriteria->jenis_kriteria == "benefit"): ?>
                                            <?php $total += $nilai ?>
                                        <?php else: ?>
                                            <?php $total -= $nilai ?>
                                        <?php endif ?>

                                    </td>
                                    <?php endforeach ?>
                                    <td>
                                        <?= $total; ?>
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

<?= $this->endSection() ?>