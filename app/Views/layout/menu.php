<li class="sidebar-title">Menu</li>

<li
    class="sidebar-item <?= $page == "dashboard" ? 'active' : null; ?>">
    <a href="<?= site_url('/') ?>" class='sidebar-link'>
        <span class="fa-fw select-all fas mx-0"></span>
        <span>Dashboard</span>
    </a>
</li>

<li class="sidebar-title">Master Data</li>

<?php if (userLogin()->level == "admin"): ?>
<li
    class="sidebar-item <?= $page == "kriteria" ? 'active' : null; ?>">
    <a href="<?= site_url('kriteria') ?>" class='sidebar-link'>
            <span class="fa-fw select-all fas mx-0"></span>
        <span>Kriteria</span>
    </a>
</li>

<li
    class="sidebar-item <?= $page == "subkriteria" ? 'active' : null; ?>">
    <a href="<?= site_url('subkriteria') ?>" class='sidebar-link'>
        <span class="fa-fw select-all fas mx-0"></span>
        <span>Sub Kriteria</span>
    </a>
</li>

<li
    class="sidebar-item <?= $page == "alternatif" ? 'active' : null; ?>">
    <a href="<?= site_url('alternatif') ?>" class='sidebar-link'>
        <span class="fa-fw select-all fas mx-0"></span>
        <span>Alternatif</span>
    </a>
</li>

<li
    class="sidebar-item <?= $page == "penilaian" ? 'active' : null; ?>">
    <a href="<?= site_url('penilaian') ?>" class='sidebar-link'>
        <span class="fa-fw select-all fas mx-0"></span>
        <span>Penilaian</span>
    </a>
</li>

<li
    class="sidebar-item <?= $page == "perhitungan" ? 'active' : null; ?>">
    <a href="<?= site_url('perhitungan') ?>" class='sidebar-link'>
        <span class="fa-fw select-all fas mx-0"></span>
        <span>Perhitungan</span>
    </a>
</li>
<?php endif ?>

<li
    class="sidebar-item <?= $page == "hasil" ? 'active' : null; ?>">
    <a href="<?= site_url('hasil') ?>" class='sidebar-link'>
        <span class="fa-fw select-all fas mx-0"></span>
        <span>Hasil Akhir</span>
    </a>
</li>

<li class="sidebar-title">Master User</li>

<?php if (userLogin()->level == "admin"): ?>

<li
    class="sidebar-item <?= $page == "user" ? 'active' : null; ?>">
    <a href="<?= site_url('user') ?>" class='sidebar-link'>
        <span class="fa-fw select-all fas mx-0"></span>
        <span>Data User</span>
    </a>
</li>

<?php endif ?>

<li
    class="sidebar-item <?= $page == "profil" ? 'active' : null; ?>">
    <a href="<?= site_url('profil') ?>" class='sidebar-link'>
        <span class="fa-fw select-all fas mx-0"></span>
        <span>Profil</span>
    </a>
</li>

<li
    class="sidebar-item">
    <a href="<?= site_url('logout') ?>" class='sidebar-link'>
        <span class="fa-fw select-all fas mx-0" style="transform: rotate(180deg);"></span>
        <span>Logout</span>
    </a>
</li>