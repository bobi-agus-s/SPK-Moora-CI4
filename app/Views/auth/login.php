<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Mazer Admin Dashboard</title>
    <link rel="stylesheet" href="<?= base_url('') ?>/template/assets/css/main/app.css">
    <link rel="stylesheet" href="<?= base_url('') ?>/template/assets/css/pages/auth.css">
    <link rel="shortcut icon" href="<?= base_url('') ?>/template/assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="<?= base_url('') ?>/template/assets/images/logo/favicon.png" type="image/png">

    <!-- font awsome -->
<link rel="stylesheet" href="<?= base_url() ?>/template/assets/extensions/@fortawesome/fontawesome-free/css/all.min.css">

<!-- sweet alert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body>
    <div id="auth">
        
<div class="row h-100">
    <div class="col-lg-5 col-12">
        <div id="auth-left">
            <div class="auth-logo">
                <a href="<?= site_url('/'); ?>" class="d-flex align-items-center">
                    <span class="fa-fw select-all fas me-3" style="transform: rotate(-25deg); font-size: 3rem;"></span>
                    <span style="font-size: 2rem; font-weight: 700;" class="">SPK Moora</span>
                </a>
            </div>
            <h1 class="auth-title">Log in.</h1>
            <p class="auth-subtitle mb-5">Silakan masukan username dan passsword untuk masuk ke aplikasi</p>

            <form action="<?= site_url('ceklogin'); ?>" method="post">
                <div class="form-group position-relative has-icon-left mb-4">
                    <input name="username" type="text" class="form-control form-control-xl" placeholder="Username">
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input name="password" type="password" class="form-control form-control-xl" placeholder="Password">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Masuk</button>
            </form>
        </div>
    </div>
    <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right">

        </div>
    </div>
</div>

    </div>


        <?php if (session()->getFlashData('error')): ?>
            <script>
                swal("Login Gagal", "<?= session()->getFlashData('error'); ?>", "error");
            </script>
        <?php endif ?>
    
</body>

</html>
