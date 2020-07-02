<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url(''); ?>">
        <div class="sidebar-brand-text ml-2">RentALL</div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('account/read'); ?>">
            <i class="fas fa-folder"></i>
            <span>Biodata Diri</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('account/pesanan'); ?>">
            <i class="fas fa-folder"></i>
            <span>Daftar Pesanan</span></a>
    </li>

    <?php if($this->session->userdata('level') == '2'): ?>
    <hr class="sidebar-divider my-0">
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('account/vendor'); ?>">
                <i class="fas fa-align-justify"></i>
                <span>Vendor</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url(''); ?>">
                <i class="fas fa-align-justify"></i>
                <span>Daftar Produk</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url(''); ?>">
                <i class="fas fa-align-justify"></i>
                <span>Daftar Pesanan Masuk</span></a>
        </li>
    <? endif; ?>

<!--     
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('account/log'); ?>">
            <i class="fas fa-stream"></i>
            <span>Log</span></a>
    </li> -->

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->