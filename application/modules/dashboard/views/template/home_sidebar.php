<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url(''); ?>">
        <div class="sidebar-brand-text ml-2">RentAll</div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('dashboard'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('dashboard/transaksi'); ?>">
            <i class="fas fa-folder"></i>
            <span>Daftar Transaksi</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('dashboard/vendor'); ?>">
            <i class="fas fa-folder"></i>
            <span>Daftar Vendor</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('dashboard/pengguna'); ?>">
            <i class="fas fa-folder"></i>
            <span>Daftar Pengguna</span></a>
    </li>
    
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('dashboard/verifRequest'); ?>">
            <i class="fas fa-folder"></i>
            <span>Request Verifikasi</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->