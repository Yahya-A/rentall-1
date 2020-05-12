<nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
  <div class="container">
    <!-- Brand -->
    <a class="navbar-brand" href="#">
      <strong>Rent All</strong>
    </a>

    <!-- Collapse -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Links -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <!-- Right -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item mr-3">
          <a class="nav-link <?= $active['1']?>" href="<?= base_url('account/vendorBoard')?>">Item Saya</a>
        </li>
        <li class="nav-item mr-2">
            <a class="nav-link <?= $active['2']?>" href="<?= base_url('account/penyewaanVendor')?>">Penyewaan</a>
        </li>
        <li class="nav-item mr-2">
            <a class="nav-link <?= $active['3']?>" href="#">Aktivitas</a>
        </li>
        <li class="nav-item dropdown ml-2 mr-2">
            <a href="#" class="nav-link d-flex align-items-center" d="userMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
              <span class="h6 mr-1 pt-1 text-capitalize"><?= $username?></span> 
              <i class="far fa-user-circle fa-2x"></i>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userMenu">
              
                <a href="<?= base_url('account/vendorProfile/')?>" class="dropdown-item">Profile</a>
                <a href="#" class="dropdown-item">Transaksi</a>
                <a href="<?= base_url('account')?>" class="dropdown-item peach-gradient text-center text-white highlight">Etalase</a>
                <div class="dropdown-divider"></div>
                <a href="<?= base_url('account/logout')?>" class="dropdown-item">Logout</a>
              </div>
        </li>
        <li class="nav-item ml-4">
          <a href="#" class="nav-link" data-toggle="modal" data-target="#SideMenuModal"><i class="fas fa-align-right fa-2x"></i></a>
        </li>
      </ul>

    </div>

  </div>
</nav>