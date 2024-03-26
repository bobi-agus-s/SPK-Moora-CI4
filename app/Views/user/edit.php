<?php $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<div class="d-flex align-items-center ">
    <a href="<?= site_url('user'); ?>">
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
                <form class="form form-vertical" action="<?= site_url('user/update/') ?><?= $user->id_user; ?>" method="post">
                    <input type="hidden" name="id_user" value="<?= $user->id_user ?>">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label><h6>Nama user</h6></label>
                                    <input name="nama_lengkap" type="text" class="form-control" value="<?= $user->nama_lengkap; ?>">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label><h6>Username</h6></label>
                                    <input name="username" type="text" class="form-control" value="<?= $user->username; ?>">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label><h6>Password</h6></label>
                                    <input name="password" type="text" class="form-control" value="<?= $user->password; ?>">
                                </div>
                            </div>

                            <div class="col-12">
                                <h6>Level User</h6>
                                <fieldset class="form-group">
                                    <select name="level" class="form-select" id="basicSelect">
                                        <option value="admin" <?= $user->level == "admin" ? 'selected' : null ?>>admin</option>
                                        <option value="user" <?= $user->level == "user" ? 'selected' : null ?>>user</option>
                                    </select>
                                </fieldset>
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