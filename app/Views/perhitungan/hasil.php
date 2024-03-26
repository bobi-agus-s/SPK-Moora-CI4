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

<!-- Hasil Akhir Perankingan-->
<section class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="card-title "><span class="fa-fw select-all fas me-3"></span>Hasil Akhir Perankingan</h4>
                </div>
                <hr>
            </div>
            
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table">
                        <thead class="table-primary">
                            <tr>
                                <th>Altenatif</th>
                                <th>Hasil</th>
                                <th>Ranking</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php $rank = 1 ?>

                        	<?php for ($i = 0; $i < count($dt) ; $i++) : ?>
                        		<tr>
                                    <td><?= $dt[$i]->nama_alternatif; ?></td>
                                    <td><?= $dt[$i]->hasil; ?></td>
                                    <td>
                                    	<?php if ($i > 0): ?>
                                    		<?php if ($dt[$i]->hasil == $dt[$i-1]->hasil): ?>
                                    			<span class="text-warning">
                                    				<?= $rank; ?>
                                    			</span>
                                    		<?php else: ?>
                                    			<?= ++$rank; ?>
                                    		<?php endif ?>
                                    	<?php else: ?>
                                    		<?= $rank; ?>
                                    	<?php endif ?>
                                    </td>
                                </tr>
                        	<?php endfor ?>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</section>

<?= $this->endSection() ?>