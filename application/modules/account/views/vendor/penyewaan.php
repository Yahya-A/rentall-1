<main>
    <div class="container">
        <?php if($this->session->flashdata('error') == TRUE): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('error'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php endif; ?>
        <?php if($this->session->flashdata('success') == TRUE): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('success'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php endif; ?>
    </div>
    <div class="container z-depth-1-half tabmenu">
        <ul class="nav nav-tabs w-100">
            <li class="nav-item mt-4 text-center tabmenu-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#waiting" role="tab" aria-controls="home" aria-selected="true">Menunggu</a>
            </li>
            <li class="nav-item mt-4 text-center tabmenu-item">
              <a class="nav-link" id="home-tab" data-toggle="tab" href="#siap" role="tab" aria-controls="home" aria-selected="true">Siap</a>
            </li>
            <li class="nav-item mt-4 text-center tabmenu-item">
              <a class="nav-link" id="home-tab" data-toggle="tab" href="#onprocess" role="tab" aria-controls="home" aria-selected="true">Sewa</a>
            </li>
            <li class="nav-item mt-4 text-center tabmenu-item">
              <a class="nav-link" id="home-tab" data-toggle="tab" href="#history" role="tab" aria-controls="home" aria-selected="true">Riwayat</a>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="waiting" role="tabpanel" aria-labelledby="home-tab">
                <?php
                if ($menunggu) {
                    foreach ($menunggu as $p):
                        $id_vendor = $this->session->userdata('id');
                        $status = 0;
                        $order_id = $p['id_order']; // Mendapatkan id_order
                        $this->db->where('order_item.id_vendor', $id_vendor);
                        $this->db->where('order_item.id_order', $order_id);
                        $this->db->from('items');
                        $this->db->join('order_detail', 'items.id_item = order_detail.id_item');
                        $this->db->join('order_item',  'order_item.id_order = order_detail.id_order');
                        $produk = $this->db->get()->result_array();
                        $total_produk = count($produk);  //Penghitungan jumlah total barang
                        $id_pembayaran = $produk['0']['id_pembayaran'];
                        $status = $produk['0']['status'];
                        $antar = $produk['0']['antar'];
                        $id_vendor = $produk['0']['id_vendor'];
                        $this->db->where('bank_profile.id_user', $id_vendor);
                        $this->db->from('bank_profile');
                        $this->db->from('vendor_profile');
                        $bank = $this->db->get()->result_array();
                        $hitungTotal = $this->db->query("SELECT sum(harga * durasi_sewa * qty) as total from items i, order_detail od where od.id_order = $order_id and i.id_item = od.id_item")->result_array();
                        $buktiTF = $this->db->query("SELECT * from items i, order_detail od, pembayaran p where od.id_order = $order_id and i.id_item = od.id_item and p.id_order = $order_id")->result_array();
                        $id_user = $produk['0']['id_user'];

                        if ($antar == 1) {
                            $this->db->where('id_user', $id_user);
                            $bank = $this->db->get('renter_profile')->result_array();
                            $alamat = $bank['0']['alamat'];
                            $no_hp = $bank['0']['no_hp'];
                            $nama = $bank['0']['nama'];
                        }
                    ?>
                        <div class="row mt-4">
                            <div class="container">
                                <!-- About Section Heading -->
                                <div class="card mb-3 mx-2">
                                    <div class="row no-gutters">
                                        <div class="col-md-3">
                                            <img src="<?=base_url('assets/img/produk/'), $produk['0']['foto']?>" class="card-img p-3"  style="max-width: 200px;">
                                        </div>
                                        <div class="col-md-9">
                                            <div class="row container">
                                                <div class="col-md-8"> 
                                                    <div class="card-body">
                                                        <a class="card-title text-dark h3"><?=$produk['0']['nama']?></a>
                                                        <h4> <?= $produk['0']['tgl_sewa'] ?> - <?= $produk['0']['tgl_kembali'] ?></h4>
                                                        <h4 class="mt-4">    
                                                            <?php 
                                                                if($id_pembayaran != 2 && $id_pembayaran != 3){
                                                                    if ($antar == 1) {
                                                                        echo 'Diantar | Diproses';
                                                                    } else {
                                                                        echo 'Ambil Toko | Diproses';
                                                                    }
                                                                }
                                                            ?> 
                                                        </h4>
                                                        <h4>
                                                            <?php 
                                                                if($id_pembayaran == 1){
                                                                    echo 'Pembayaran ditempat';
                                                                } else if($id_pembayaran == 2) {
                                                                    echo 'Belum Bayar';
                                                                } else if ($id_pembayaran == 3) {
                                                                    echo 'Proses Verifikasi Pembayaran';
                                                                } else if ($id_pembayaran == 4){
                                                                    echo 'Pembayaran Berhasil';
                                                                }
                                                            ?> 
                                                        </h4>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="card-body mt-2 row ">
                                                        <h5 class="col-md-12">Total barang <?= $total_produk ?></h5>
                                                            <a href="#" class="col-md-12 btn btn-light h2 float-right mr-5" role="button" data-toggle="modal" data-target="#modalBarang<?= $produk['0']['id_order'] ?>" >Detail pesanan</a>
                                                            <?php if($id_pembayaran == 3){ ?>
                                                                <a href="#" class="col-md-12 btn btn-light h2 float-right mr-5" role="button" data-toggle="modal" data-target="#modalBuktiTF<?= $produk['0']['id_order'] ?>" >Cek Bukti Transfer</a>
                                                            <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal Daftar Barang -->
                            <div class="modal fade" id="modalBarang<?= $produk['0']['id_order'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-notify modal-warning" role="document">
                                    <!--Content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <p class="heading lead">Daftar Pesanan</p>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true" class="white-text">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <?php if($antar == 1){ ?>
                                                <div class="card mb-3 p-2">
                                                    <h5> <?= $nama; ?></h5>
                                                    <h5> Alamat : <?= $alamat; ?></h5>
                                                    <h5> Nomor HP : <?= $no_hp; ?></h5>
                                                </div>
                                            <?php } ?>
                                            <?php foreach($produk as $q): ?>
                                                <div class="card mb-3">
                                                    <div class="row no-gutters">
                                                        <div class="col-md-3">
                                                            <img src="<?=base_url('assets/img/produk/'), $q['foto']?>" class="card-img p-3"  style="max-width: 200px;">
                                                        </div>
                                                        <div class="col-md-9">
                                                            <form action="<?= base_url('beranda/editatc'); ?>" method="POST">
                                                                <div class="row container">
                                                                    <div class="col-md-12"> 
                                                                        <div class="card-body">
                                                                            <h3 class="card-title text-dark"><?=$q['nama']?></h3>
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <h4 class="card-text text-dark mt-1 mb-4"> Rp. <?=number_format($q['harga'], 0, ",", ".");?></h4>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <h4 class="card-text text-dark mt-1 mb-4"> Jumlah <?= $q['qty'] ?></h4>
                                                                                </div>
                                                                            </div>
                                                                            <?php
                                                                                $datetime1 = date_create($q['tgl_sewa']);
                                                                                $datetime2 = date_create($q['tgl_kembali']);
                                                                                $durasi = date_diff($datetime1, $datetime2)->format('%a');
                                                                                $totalHarga = $q['harga'] * $durasi;
                                                                            ?>
                                                                            <h4 class="card-text text-dark"><?= $q['tgl_sewa'] ?> - <?= $q['tgl_kembali'] ?></h4>
                                                                            <h4 class="card-text text-dark">Durasi Penyewaan <?= $durasi ?> Hari</h4>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            <? endforeach; ?>
                                        </div>
                                        <?php
                                            if($status == 0) { 
                                                    if($id_pembayaran == 4 || $id_pembayaran == 1) { ?>
                                                <div class="modal-footer d-flex justify-content-center">
                                                    <a href="<?= base_url('account/verifPersiapan/') . $produk['0']['id_order'] ?>/1" class="btn btn-light" role="button">Barang Siap</a>
                                                    <a href="<?= base_url('account/verifPersiapan/') . $produk['0']['id_order'] ?>/2" class="btn btn-light" role="button">Barang Belum Siap</a>
                                                </div>
                                        <?php        } 
                                            } ?>
                                    </div>
                                    <!--/.Content-->
                                </div>
                            </div>
                            
                            <div class="modal fade" id="modalBuktiTF<?= $produk['0']['id_order'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-notify modal-warning" role="document">
                                    <!--Content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <p class="heading lead">Bukti Pembayaran</p>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true" class="white-text">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <center>
                                                <h5> Atas Nama <?= $buktiTF['0']['an']?> </h5>
                                                <h5> Sumber Rekening <?= $buktiTF['0']['bank']?> <?= $buktiTF['0']['rekening']?> </h5>
                                                <h5> Jumlah Bayar <?= $buktiTF['0']['jumlah_bayar']?> </h5>
                                                <img src="<?=base_url('assets/img/pembayaran/'), $buktiTF['0']['foto']?>" class="card-img p-3"  style="max-width: 300px;">
                                            </center>
                                        </div>
                                        <div class="modal-footer d-flex justify-content-center">
                                            <a href="<?= base_url('account/verifPembayaran/') . $produk['0']['id_order'] ?>/1" class="btn btn-light" role="button">Transfer Sesuai</a>
                                            <a href="<?= base_url('account/verifPembayaran/') . $produk['0']['id_order'] ?>/2" class="btn btn-light" role="button">Transfer Tidak Sesuai</a>
                                        </div>
                                    <!--/.Content-->
                                </div>
                            </div>
                        </div>
                    <?php endforeach;
                } else { ?>
                    <div class="col-12 mt-5">
                        <center>
                            <h4>Tidak ada barang yang sedang disewa</h4>
                            <a href="<?=base_url('');?>" class="h4 text-white mt-4">Kembali ke Beranda</a>
                        </center>
                    </div>
                <?php }?>
            </div>
            <div class="tab-pane fade" id="siap" role="tabpanel" aria-labelledby="siap-tab">
                <?php 
                if ($siap) { 
                foreach ($siap as $p):
                    $id_vendor = $this->session->userdata('id');
                    $status = 0;
                    $order_id = $p['id_order']; // Mendapatkan id_order
                    $this->db->where('order_item.id_vendor', $id_vendor);
                    $this->db->where('order_item.id_order', $order_id);
                    $this->db->from('items');
                    $this->db->join('order_detail', 'items.id_item = order_detail.id_item');
                    $this->db->join('order_item',  'order_item.id_order = order_detail.id_order');
                    $produk = $this->db->get()->result_array();

                    $total_produk = count($produk);  //Penghitungan jumlah total barang
                    $id_pembayaran = $produk['0']['id_pembayaran'];
                    $status = $produk['0']['status'];
                    $antar = $produk['0']['antar'];
                    $id_user = $produk['0']['id_user'];

                    $this->db->where('bank_profile.id_user', $id_user);
                    $this->db->from('bank_profile');
                    $this->db->from('vendor_profile');
                    $bank = $this->db->get()->result_array();
                    $hitungTotal = $this->db->query("SELECT sum(harga * durasi_sewa * qty) as total from items i, order_detail od where od.id_order = $order_id and i.id_item = od.id_item")->result_array();
                    $buktiTF = $this->db->query("SELECT * from items i, order_detail od, pembayaran p where od.id_order = $order_id and i.id_item = od.id_item and p.id_order = $order_id")->result_array();

                    if ($antar == 1) {
                        $this->db->where('id_user', $id_user);
                        $bank = $this->db->get('renter_profile')->result_array();
                        $alamat = $bank['0']['alamat'];
                        $no_hp = $bank['0']['no_hp'];
                        $nama = $bank['0']['nama'];
                    }
                ?>
                    <!-- START TAB SIAP -->
                    <div class="row mt-4">

                        <!-- START BODY TAB SIAP -->
                        <div class="container">
                            <!-- About Section Heading -->
                            <div class="card mb-3 mx-2">
                                <div class="row no-gutters">
                                    <div class="col-md-3">
                                        <img src="<?=base_url('assets/img/produk/'), $produk['0']['foto']?>" class="card-img p-3"  style="max-width: 200px;">
                                    </div>
                                    <div class="col-md-9">
                                        <div class="row container">
                                            <div class="col-md-8"> 
                                                <div class="card-body">
                                                    <a class="card-title text-dark h3"><?=$produk['0']['nama']?></a>
                                                    <h4> <?= $produk['0']['tgl_sewa'] ?> - <?= $produk['0']['tgl_kembali'] ?></h4>
                                                    <h4 class="mt-4">    
                                                        <?php 
                                                            if($id_pembayaran != 2 && $id_pembayaran != 3){
                                                                if ($antar == 1) {
                                                                    echo 'Diantar | Barang Siap';
                                                                } else {
                                                                    echo 'Ambil Toko | Barang Siap';
                                                                }
                                                            }
                                                        ?> 
                                                    </h4>
                                                    <h4>
                                                        <?php 
                                                            if($id_pembayaran == 1){
                                                                echo 'Pembayaran ditempat';
                                                            } else if($id_pembayaran == 2) {
                                                                echo 'Belum Bayar';
                                                            } else if ($id_pembayaran == 3) {
                                                                echo 'Proses Verifikasi Pembayaran';
                                                            } else if ($id_pembayaran == 4){
                                                                echo 'Pembayaran Berhasil';
                                                            }
                                                        ?> 
                                                    </h4>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="card-body mt-2 row ">
                                                    <h5 class="col-md-12">Total barang <?= $total_produk ?></h5>
                                                        <a href="#" class="col-md-12 btn btn-light h2 float-right mr-5" role="button" data-toggle="modal" data-target="#modalBarang<?= $produk['0']['id_order'] ?>" >Detail pesanan</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END BODY TAB SIAP -->

                        <!-- Start Modal Daftar Barang -->
                        <div class="modal fade" id="modalBarang<?= $produk['0']['id_order'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-notify modal-warning" role="document">
                                <!--Content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <p class="heading lead">Daftar Pesanan</p>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true" class="white-text">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <?php if($antar == 1){ ?>
                                            <div class="card mb-3 p-2">
                                                <h5> <?= $nama; ?></h5>
                                                <h5> Alamat : <?= $alamat; ?></h5>
                                                <h5> Nomor HP : <?= $no_hp; ?></h5>
                                            </div>
                                        <?php } ?>
                                        <?php foreach($produk as $q): ?>
                                            <div class="card mb-3">
                                                <div class="row no-gutters">
                                                    <div class="col-md-3">
                                                        <img src="<?=base_url('assets/img/produk/'), $q['foto']?>" class="card-img p-3"  style="max-width: 200px;">
                                                    </div>
                                                    <div class="col-md-9">
                                                        <form action="<?= base_url('beranda/editatc'); ?>" method="POST">
                                                            <div class="row container">
                                                                <div class="col-md-12"> 
                                                                    <div class="card-body">
                                                                        <h3 class="card-title text-dark"><?=$q['nama']?></h3>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <h4 class="card-text text-dark mt-1 mb-4"> Rp. <?=number_format($q['harga'], 0, ",", ".");?></h4>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <h4 class="card-text text-dark mt-1 mb-4"> Jumlah <?= $q['qty'] ?></h4>
                                                                            </div>
                                                                        </div>
                                                                        <?php
                                                                            $datetime1 = date_create($q['tgl_sewa']);
                                                                            $datetime2 = date_create($q['tgl_kembali']);
                                                                            $durasi = date_diff($datetime1, $datetime2)->format('%a');
                                                                            $totalHarga = $q['harga'] * $durasi;
                                                                        ?>
                                                                        <h4 class="card-text text-dark"><?= $q['tgl_sewa'] ?> - <?= $q['tgl_kembali'] ?></h4>
                                                                        <h4 class="card-text text-dark">Durasi Penyewaan <?= $durasi ?> Hari</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        <? endforeach; ?>
                                    </div>
                                    <?php
                                        if($status == 0) { 
                                                if($id_pembayaran == 4 || $id_pembayaran == 1) { ?>
                                            <div class="modal-footer d-flex justify-content-center">
                                                <a href="<?= base_url('account/verifPersiapan/') . $produk['0']['id_order'] ?>/1" class="btn btn-light" role="button">Barang Siap</a>
                                                <a href="<?= base_url('account/verifPersiapan/') . $produk['0']['id_order'] ?>/2" class="btn btn-light" role="button">Barang Belum Siap</a>
                                            </div>
                                    <?php        } 
                                        } ?>
                                </div>
                                <!--/.Content-->
                            </div>
                        </div>
                        <!-- End Modal Daftar Barang -->
                        
                    </div>
                    <!-- END TAB SIAP -->
                <? endforeach;
                } else { ?>
                    <div class="col-12 mt-5">
                        <center>
                            <h4>Tidak ada barang yang sedang disewa</h4>
                            <a href="<?=base_url('');?>" class="h4 text-white mt-4">Kembali ke Beranda</a>
                        </center>
                    </div>
                <?php } ?>
            </div>
            <div class="tab-pane fade" id="onprocess" role="tabpanel" aria-labelledby="process-tab">
                <?php 
                if ($sewa) { 
                foreach ($sewa as $p):
                    $id_vendor = $this->session->userdata('id');
                    $status = 0;
                    $order_id = $p['id_order']; // Mendapatkan id_order
                    $this->db->where('order_item.id_vendor', $id_vendor);
                    $this->db->where('order_item.id_order', $order_id);
                    $this->db->from('items');
                    $this->db->join('order_detail', 'items.id_item = order_detail.id_item');
                    $this->db->join('order_item',  'order_item.id_order = order_detail.id_order');
                    $produk = $this->db->get()->result_array();

                    $total_produk = count($produk);  //Penghitungan jumlah total barang
                    $id_pembayaran = $produk['0']['id_pembayaran'];
                    $status = $produk['0']['status'];
                    $antar = $produk['0']['antar'];
                    $id_user = $produk['0']['id_user'];

                    $this->db->where('bank_profile.id_user', $id_user);
                    $this->db->from('bank_profile');
                    $this->db->from('vendor_profile');
                    $bank = $this->db->get()->result_array();
                    $hitungTotal = $this->db->query("SELECT sum(harga * durasi_sewa * qty) as total from items i, order_detail od where od.id_order = $order_id and i.id_item = od.id_item")->result_array();
                    $buktiTF = $this->db->query("SELECT * from items i, order_detail od, pembayaran p where od.id_order = $order_id and i.id_item = od.id_item and p.id_order = $order_id")->result_array();

                    if ($antar == 1) {
                        $this->db->where('id_user', $id_user);
                        $bank = $this->db->get('renter_profile')->result_array();
                        $alamat = $bank['0']['alamat'];
                        $no_hp = $bank['0']['no_hp'];
                        $nama = $bank['0']['nama'];
                    }
                ?>
                    <!-- START TAB SEWA -->
                    <div class="row mt-4">

                        <!-- START TAB BODY SEWA --> 
                        <div class="container">
                            <!-- About Section Heading -->
                            <div class="card mb-3 mx-2">
                                <div class="row no-gutters">
                                    <div class="col-md-3">
                                        <img src="<?=base_url('assets/img/produk/'), $produk['0']['foto']?>" class="card-img p-3"  style="max-width: 200px;">
                                    </div>
                                    <div class="col-md-9">
                                        <div class="row container">
                                            <div class="col-md-8"> 
                                                <div class="card-body">
                                                    <a class="card-title text-dark h3"><?=$produk['0']['nama']?></a>
                                                    <h4> <?= $produk['0']['tgl_sewa'] ?> - <?= $produk['0']['tgl_kembali'] ?></h4>
                                                    <h4 class="mt-4">    
                                                        <?php 
                                                            if ($status == 3) {
                                                                echo 'Disewa';
                                                            } else if ($status == 4) {
                                                                if ($antar == 1) {
                                                                    echo 'Barang harus diantar';
                                                                } else {
                                                                    echo 'Barang Akan Diambil';
                                                                }
                                                            } else if ($status == 6) {
                                                                echo 'Masa sewa selesai. Barang belum kembali';
                                                            }
                                                        ?> 
                                                    </h4>
                                                    <h4>
                                                        <?php 
                                                            if($id_pembayaran == 1){
                                                                echo 'Pembayaran ditempat';
                                                            } else if ($id_pembayaran == 4){
                                                                echo 'Pembayaran Berhasil';
                                                            }
                                                        ?> 
                                                    </h4>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="card-body mt-2 row ">
                                                    <h5 class="col-md-12">Total barang <?= $total_produk ?></h5>
                                                        <a href="#" class="col-md-12 btn btn-light h2 float-right mr-5" role="button" data-toggle="modal" data-target="#modalBarang<?= $produk['0']['id_order'] ?>" >Detail pesanan</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END TAB BODY SEWA --> 

                        <!-- START MODAL DAFTAR BARANG -->
                        <div class="modal fade" id="modalBarang<?= $produk['0']['id_order'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-notify modal-warning" role="document">
                                <!--Content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <p class="heading lead">Daftar Pesanan</p>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true" class="white-text">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <?php if($antar == 1){ ?>
                                            <div class="card mb-3 p-2">
                                                <h5> <?= $nama; ?></h5>
                                                <h5> Alamat : <?= $alamat; ?></h5>
                                                <h5> Nomor HP : <?= $no_hp; ?></h5>
                                            </div>
                                        <?php } 
                                        foreach($produk as $q): ?>
                                            <div class="card mb-3">
                                                <div class="row no-gutters">
                                                    <div class="col-md-3">
                                                        <img src="<?=base_url('assets/img/produk/'), $q['foto']?>" class="card-img p-3"  style="max-width: 200px;">
                                                    </div>
                                                    <div class="col-md-9">
                                                        <form action="<?= base_url('beranda/editatc'); ?>" method="POST">
                                                            <div class="row container">
                                                                <div class="col-md-12"> 
                                                                    <div class="card-body">
                                                                        <h3 class="card-title text-dark"><?=$q['nama']?></h3>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <h4 class="card-text text-dark mt-1 mb-4"> Rp. <?=number_format($q['harga'], 0, ",", ".");?></h4>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <h4 class="card-text text-dark mt-1 mb-4"> Jumlah <?= $q['qty'] ?></h4>
                                                                            </div>
                                                                        </div>
                                                                        <?php
                                                                            $datetime1 = date_create($q['tgl_sewa']);
                                                                            $datetime2 = date_create($q['tgl_kembali']);
                                                                            $durasi = date_diff($datetime1, $datetime2)->format('%a');
                                                                            $totalHarga = $q['harga'] * $durasi;
                                                                        ?>
                                                                        <h4 class="card-text text-dark"><?= $q['tgl_sewa'] ?> - <?= $q['tgl_kembali'] ?></h4>
                                                                        <h4 class="card-text text-dark">Durasi Penyewaan <?= $durasi ?> Hari</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        <? endforeach; ?>
                                    </div>
                                    <?php
                                        if($status == 4) { 
                                            if($antar == 0) { ?>
                                                <div class="modal-footer d-flex justify-content-center">
                                                    <a href="<?= base_url('account/verifPersiapan/') . $produk['0']['id_order'] ?>/3" class="btn btn-light" role="button">Barang sudah diambil</a>
                                                </div>
                                    <?php   } else if ($antar == 1) { ?>
                                                <div class="modal-footer d-flex justify-content-center">
                                                    <a href="<?= base_url('account/verifPersiapan/') . $produk['0']['id_order'] ?>/4" class="btn btn-light" role="button">Barang sudah diantar</a>
                                                </div>
                                    <?php   }
                                        } else if($status == 6) { ?>
                                                <div class="modal-footer d-flex justify-content-center">
                                                    <a href="<?= base_url('account/verifPersiapan/') . $produk['0']['id_order'] ?>/5" class="btn btn-light" role="button">Barang sudah diterima</a>
                                                </div>
                                    <?php } ?>
                                </div>
                                <!--/.Content-->
                            </div>
                        </div>
                        <!-- END MODAL DAFTAR BARANG -->

                    </div>
                    <!-- END TAB SEWA -->

                <? endforeach; } else { ?>
                        <div class="col-12 mt-5">
                            <center>
                                <h4>Tidak ada barang yang sedang disewa</h4>
                                <a href="<?=base_url('');?>" class="h4 text-white mt-4">Kembali ke Beranda</a>
                            </center>
                        </div>
                <?php } ?>
            </div>  
            <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="history-tab">
                <?php 
                if ($history) { 
                foreach ($history as $p):
                    $id_vendor = $this->session->userdata('id');
                    $status = 0;
                    $order_id = $p['id_order']; // Mendapatkan id_order
                    $this->db->where('order_item.id_vendor', $id_vendor);
                    $this->db->where('order_item.id_order', $order_id);
                    $this->db->from('items');
                    $this->db->join('order_detail', 'items.id_item = order_detail.id_item');
                    $this->db->join('order_item',  'order_item.id_order = order_detail.id_order');
                    $produk = $this->db->get()->result_array();

                    $total_produk = count($produk);  //Penghitungan jumlah total barang
                    $id_pembayaran = $produk['0']['id_pembayaran'];
                    $status = $produk['0']['status'];
                    $antar = $produk['0']['antar'];
                    $id_user = $produk['0']['id_user'];

                    $this->db->where('bank_profile.id_user', $id_user);
                    $this->db->from('bank_profile');
                    $this->db->from('vendor_profile');
                    $bank = $this->db->get()->result_array();
                    $hitungTotal = $this->db->query("SELECT sum(harga * durasi_sewa * qty) as total from items i, order_detail od where od.id_order = $order_id and i.id_item = od.id_item")->result_array();
                    $buktiTF = $this->db->query("SELECT * from items i, order_detail od, pembayaran p where od.id_order = $order_id and i.id_item = od.id_item and p.id_order = $order_id")->result_array();

                    if ($antar == 1) {
                        $this->db->where('id_user', $id_user);
                        $bank = $this->db->get('renter_profile')->result_array();
                        $alamat = $bank['0']['alamat'];
                        $no_hp = $bank['0']['no_hp'];
                        $nama = $bank['0']['nama'];
                    }
                ?>
                    <!-- START TAB SEWA -->
                    <div class="row mt-4">

                        <!-- START TAB BODY SEWA --> 
                        <div class="container">
                            <!-- About Section Heading -->
                            <div class="card mb-3 mx-2">
                                <div class="row no-gutters">
                                    <div class="col-md-3">
                                        <img src="<?=base_url('assets/img/produk/'), $produk['0']['foto']?>" class="card-img p-3"  style="max-width: 200px;">
                                    </div>
                                    <div class="col-md-9">
                                        <div class="row container">
                                            <div class="col-md-8"> 
                                                <div class="card-body">
                                                    <a class="card-title text-dark h3"><?=$produk['0']['nama']?></a>
                                                    <h4> <?= $produk['0']['tgl_sewa'] ?> - <?= $produk['0']['tgl_kembali'] ?></h4>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="card-body mt-2 row ">
                                                    <h5 class="col-md-12">Total barang <?= $total_produk ?></h5>
                                                        <a href="#" class="col-md-12 btn btn-light h2 float-right mr-5" role="button" data-toggle="modal" data-target="#modalBarang<?= $produk['0']['id_order'] ?>" >Detail pesanan</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END TAB BODY SEWA --> 

                        <!-- START MODAL DAFTAR BARANG -->
                        <div class="modal fade" id="modalBarang<?= $produk['0']['id_order'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-notify modal-warning" role="document">
                                <!--Content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <p class="heading lead">Daftar Pesanan</p>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true" class="white-text">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <?php if($antar == 1){ ?>
                                            <div class="card mb-3 p-2">
                                                <h5> <?= $nama; ?></h5>
                                                <h5> Alamat : <?= $alamat; ?></h5>
                                                <h5> Nomor HP : <?= $no_hp; ?></h5>
                                            </div>
                                        <?php } 
                                        foreach($produk as $q): ?>
                                            <div class="card mb-3">
                                                <div class="row no-gutters">
                                                    <div class="col-md-3">
                                                        <img src="<?=base_url('assets/img/produk/'), $q['foto']?>" class="card-img p-3"  style="max-width: 200px;">
                                                    </div>
                                                    <div class="col-md-9">
                                                        <form action="<?= base_url('beranda/editatc'); ?>" method="POST">
                                                            <div class="row container">
                                                                <div class="col-md-12"> 
                                                                    <div class="card-body">
                                                                        <h3 class="card-title text-dark"><?=$q['nama']?></h3>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <h4 class="card-text text-dark mt-1 mb-4"> Rp. <?=number_format($q['harga'], 0, ",", ".");?></h4>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <h4 class="card-text text-dark mt-1 mb-4"> Jumlah <?= $q['qty'] ?></h4>
                                                                            </div>
                                                                        </div>
                                                                        <?php
                                                                            $datetime1 = date_create($q['tgl_sewa']);
                                                                            $datetime2 = date_create($q['tgl_kembali']);
                                                                            $durasi = date_diff($datetime1, $datetime2)->format('%a');
                                                                            $totalHarga = $q['harga'] * $durasi;
                                                                        ?>
                                                                        <h4 class="card-text text-dark"><?= $q['tgl_sewa'] ?> - <?= $q['tgl_kembali'] ?></h4>
                                                                        <h4 class="card-text text-dark">Durasi Penyewaan <?= $durasi ?> Hari</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        <? endforeach; ?>
                                    </div>
                                    <?php
                                        if($status == 4) { 
                                            if($id_pembayaran == 1) { ?>
                                                <div class="modal-footer d-flex justify-content-center">
                                                    <a href="<?= base_url('account/verifPersiapan/') . $produk['0']['id_order'] ?>/3" class="btn btn-light" role="button">Barang sudah diambil</a>
                                                </div>
                                    <?php   } else if ($id_pembayaran == 4) { ?>
                                                <div class="modal-footer d-flex justify-content-center">
                                                    <a href="<?= base_url('account/verifPersiapan/') . $produk['0']['id_order'] ?>/4" class="btn btn-light" role="button">Barang sudah diantar</a>
                                                </div>
                                    <?php   }
                                        } else if($status == 6) { ?>
                                                <div class="modal-footer d-flex justify-content-center">
                                                    <a href="<?= base_url('account/verifPersiapan/') . $produk['0']['id_order'] ?>/5" class="btn btn-light" role="button">Barang sudah diterima</a>
                                                </div>
                                    <?php } ?>
                                </div>
                                <!--/.Content-->
                            </div>
                        </div>
                        <!-- END MODAL DAFTAR BARANG -->

                    </div>
                    <!-- END TAB SEWA -->

                <? endforeach; } else { ?>
                        <div class="col-12 mt-5">
                            <center>
                                <h4>Tidak ada barang yang sedang disewa</h4>
                                <a href="<?=base_url('');?>" class="h4 text-white mt-4">Kembali ke Beranda</a>
                            </center>
                        </div>
                <?php } ?>
            </div>
        </div>
    </div>

  </main>