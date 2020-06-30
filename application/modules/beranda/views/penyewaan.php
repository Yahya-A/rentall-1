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
                <a class="nav-link" id="home-tab" data-toggle="tab" href="#onprocess" role="tab" aria-controls="home" aria-selected="true">Sewa</a>
            </li>
            <li class="nav-item mt-4 text-center tabmenu-item">
                <a class="nav-link" id="home-tab" data-toggle="tab" href="#history" role="tab" aria-controls="home" aria-selected="true">Riwayat</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="waiting" role="tabpanel" aria-labelledby="home-tab">
                <div class="row mt-4">
                        <div class="container">
                            <!-- About Section Heading -->
                            <?php
                            foreach ($product as $p):
                                $this->db->where('cart.id_item', $p['id_item']);
                                $this->db->where('items.id_item', $p['id_item']);
                                $this->db->from('items');
                                $this->db->from('cart');
                                $produk = $this->db->get()->result_array();
                                foreach ($produk as $q):
                            ?>
                            <div class="card mb-3 mx-2">
                                <div class="row no-gutters">
                                    <div class="col-md-3">
                                        <img src="<?=base_url('assets/img/produk/'), $q['foto']?>" class="card-img p-3"  style="max-width: 200px;">
                                    </div>
                                    <div class="col-md-9">
                                        <form action="<?= base_url('beranda/editatc'); ?>" method="POST">
                                            <div class="row container">
                                                <div class="col-md-6"> 
                                                    <div class="card-body">
                                                        <a class="card-title text-dark h3" href="<?=base_url('beranda/product/'), $q['id_item'];?>"><?=$q['nama']?></a>
                                                        <h4 class="card-text text-dark mt-1 mb-4"> Rp. <?=number_format($q['harga'], 0, ",", ".");?></h4>
                                                        <!-- <h5>Tanggal Sewa</h5> -->
                                                        <?php
                                                            $datetime1 = date_create($q['tgl_sewa']);
                                                            $datetime2 = date_create($q['tgl_kembali']);
                                                            $durasi = date_diff($datetime1, $datetime2)->format('%a');
                                                            $totalHarga = $q['harga'] * $durasi;
                                                        ?>
                                                        <div class="form-group">
                                                            <label>Tanggal Awal</label>
                                                            <div class="input-group date">
                                                                <div class="input-group-addon">
                                                                    <span class="glyphicon glyphicon-th"></span>
                                                                </div>
                                                                <input type="text" name="id" class="form-control" placeholder="Durasi" hidden value="<?=$p['id_cart']?>">
                                                                <input placeholder="Tanggal Sewa" type="date" class="form-control datepicker" id="from" name="tgl_awal" value="<?= $q['tgl_sewa']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Tanggal Akhir</label>
                                                            <div class="input-group date">
                                                                <div class="input-group-addon">
                                                                    <span class="glyphicon glyphicon-th"></span>
                                                                </div>
                                                                <input placeholder="Tanggal Kembali" type="date" class="form-control datepicker" id="to"  name="tgl_akhir" value="<?= $q['tgl_kembali']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="card-body mt-2">
                                                        <center>
                                                            <h5>Durasi <?=$durasi?> Hari</h5>
                                                            <h5>Rp. <?= number_format($totalHarga, 0, ",", ".") ?></h5>
                                                            <h5 class="mb-5">Total barang <?= $q['qty']; ?></h5>
                                                            <input class="btn btn-info btn-user btn-block center" type="submit" name="btnSubmit" value="Ubah" />
                                                            <a class="btn btn-danger h3" href="<?=base_url('beranda/hapusatc/'), $p['id_cart'];?>">Hapus</a>
                                                        </center>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                                <?
                                    endforeach;
                                    endforeach;
                                ?>
                            <div class="row">
                            <?php
                                if (!$product) {?>
                                    <div class="col-12 mt-5">
                                        <center>
                                            <h4>Keranjang belanja masih kosong, silahkan memilih produk</h4>
                                            <a href="<?=base_url('');?>" class="h4 text-white mt-4">Kembali ke Beranda</a>
                                        </center>
                                    </div>
                                <?} else {?>
                                    <div class="col-md-4 offset-md-6 my-4">
                                        <h4 class="mt-2">Total Belanja : Rp. <?=number_format($price, 0, ",", ".");?>  </h4>
                                    </div>
                                    <div class="col-md-2 mt-3">
                                        <a href="#" class="btn btn-light h2 float-right mr-5" role="button" data-toggle="modal" data-target="#modalKonfirmasi" >Checkout</a>
                                    </div>
                                <?}
                            ?>
                            </div>
                        </div>
                </div>
            </div>
            <div class="tab-pane fade" id="onprocess" role="tabpanel" aria-labelledby="profile-tab">
                <?php
                foreach ($order as $p):
                    $id_user = $this->session->userdata('id');
                    $order_id = $p['id_order']; // Mendapatkan id_order
                    $this->db->where('order_item.id_user', $id_user);
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

                    $bank = $this->db->query("SELECT * FROM bank_profile bp, vendor_profile vp where bp.id_user = $id_vendor")->result_array();
                    $hitungTotal = $this->db->query("SELECT sum(harga * durasi_sewa * qty) as total from items i, order_detail od where od.id_order = $order_id and i.id_item = od.id_item")->result_array();
                    $buktiTF = $this->db->query("SELECT * from items i, order_detail od, pembayaran p where od.id_order = $order_id and i.id_item = od.id_item and p.id_order = $order_id")->result_array();
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
                                                    <h4> <?= $produk['0']['tanggal_order'] ?></h4>
                                                    <h4 class="mt-4">    
                                                        <?php 
                                                            if($id_pembayaran != 2 && $id_pembayaran != 3){
                                                                if($status == 0){
                                                                    echo 'Diproses';
                                                                } else if ($status == 1) {
                                                                    echo 'Barang Siap';
                                                                } else if ($status == 2) {
                                                                    echo 'Pengantaran';
                                                                } else if ($status == 3) {
                                                                    echo 'Disewa';
                                                                } else if ($status == 4){
                                                                    if ($antar == 0) {
                                                                        echo 'Barang Harus Diambil';
                                                                    } else {
                                                                        echo 'Barang Akan Diantar';
                                                                    }
                                                                } else if ($status == 6){
                                                                    echo 'Barang Harus Dikembalikan';
                                                                }
                                                            }
                                                        ?> 
                                                    </h4>
                                                    <h4>
                                                        <?php 
                                                            if( $id_pembayaran == 1){ 
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
                                                        <?php if($id_pembayaran == 2){ ?>
                                                            <a href="#" class="col-md-12 btn btn-light h2 float-right mr-5" role="button" data-toggle="modal" data-target="#modalKonfirmasi<?= $produk['0']['id_order'] ?>" >Upload bukti Transfer</a>
                                                        <?php } else if($id_pembayaran == 3 ) { ?>
                                                            <a href="#" class="col-md-12 btn btn-light h2 float-right mr-5" role="button" data-toggle="modal" data-target="#modalBuktiTF<?= $produk['0']['id_order'] ?>" >Bukti Transfer</a>
                                                        <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- START MODAL DETAIL ORDER -->
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
                                </div>
                                <!--/.Content-->
                            </div>
                        </div>
                        <!-- END MODAL DETAIL ORDER -->

                        <!-- START MODAL UPLOAD BUKTI PEMBAYARAN -->
                        <div class="modal fade" id="modalKonfirmasi<?= $produk['0']['id_order'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-notify modal-warning" role="document">
                                <!--Content-->
                                <div class="modal-content">
                                    <form action="<?= base_url('beranda/konfirmasiPembayaran'); ?>" method="POST"  enctype="multipart/form-data">
                                        <div class="modal-header">
                                            <p class="heading lead">Konfirmasi Pembayaran</p>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true" class="white-text">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <?php foreach($produk as $q): ?>
                                                <center>
                                                    <h5>
                                                        <?= $bank['0']['bank'] .' '.  $bank['0']['rekening'] .' Atas Nama '. $bank['0']['an']?>
                                                    </h5>
                                                    <h5>
                                                        Total Bayar Rp. <?=number_format($hitungTotal['0']['total'], 0, ",", ".");?>
                                                    </h5>
                                                </center>
                                                    <div class="md-form m-4">
                                                        <input type="text" name="id_order" value="<?= $q['id_order']; ?>" hidden>
                                                        <input type="text" id="materialContactFormName" class="form-control" name="nama">
                                                        <label for="materialContactFormName">Nama</label>
                                                    </div>
                                                    <div class="md-form m-4">
                                                        <input type="text" id="materialContactFormName" class="form-control" name="bank">
                                                        <label for="materialContactFormName">Bank</label>
                                                    </div>
                                                    <div class="md-form m-4">
                                                        <input type="text" id="materialContactFormName" class="form-control" name="nomor_rekening">
                                                        <label for="materialContactFormName">Nomor Rekening</label>
                                                    </div>
                                                    <div class="md-form m-4">
                                                        <input type="text" id="materialContactFormName" class="form-control" name="jumlah_bayar">
                                                        <label for="materialContactFormName">Jumlah Pembayaran</label>
                                                    </div>
                                                    <div class="md-form m-4">
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" name="upload_image" id="upload_image" aria-describedby="inputGroupFileAddon01">
                                                                <label class="custom-file-label" for="inputGroupFile01">Upload Bukti Pembayaran</label>
                                                            </div>
                                                        </div>
                                                    </div>   
                                            <? endforeach; ?>
                                        </div>
                                        <div class="modal-footer d-flex justify-content-center">
                                            <button class="btn btn-outline-info btn-rounded z-depth-0 my-4 waves-effect" type="submit" name="btnSubmit">Upload</button>
                                        </div>
                                    </form>
                                </div>
                                <!--/.Content-->
                            </div>
                        </div>
                        <!-- END MODAL UPLOAD BUKTI PEMBAYARAN -->

                        <!-- START MODAL DETAIL PEMBAYARAN -->
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
                                            <h5> Sumber Rekening <?= $buktiTF['0']['rekening']?> </h5>
                                            <h5> Bank <?= $buktiTF['0']['bank']?> </h5>
                                            <h5> Jumlah Bayar <?= $buktiTF['0']['jumlah_bayar']?> </h5>
                                            <img src="<?=base_url('assets/img/pembayaran/'), $buktiTF['0']['foto']?>" class="card-img p-3"  style="max-width: 300px;">
                                        </center>
                                    </div>
                                <!--/.Content-->
                            </div>
                        </div>
                        <!-- END MODAL DETAIL PEMBAYARAN -->
                    </div>
                <? endforeach; ?>
                <div class="row">
                    <?php if (!$order) {?>
                        <div class="col-12 mt-5">
                            <center>
                                <h4>Tidak ada barang yang sedang disewa</h4>
                                <a href="<?=base_url('');?>" class="h4 text-white mt-4">Kembali ke Beranda</a>
                            </center>
                        </div>
                    <? } ?>
                </div>
            </div>
            <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="contact-tab">
                <?php
                foreach ($riwayat as $p):
                    $id_user = $this->session->userdata('id');
                    $order_id = $p['id_order']; // Mendapatkan id_order
                    $this->db->where('order_item.id_user', $id_user);
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

                    $bank = $this->db->query("SELECT * FROM bank_profile bp, vendor_profile vp where bp.id_user = $id_vendor")->result_array();
                    $hitungTotal = $this->db->query("SELECT sum(harga * durasi_sewa * qty) as total from items i, order_detail od where od.id_order = $order_id and i.id_item = od.id_item")->result_array();
                    $buktiTF = $this->db->query("SELECT * from items i, order_detail od, pembayaran p where od.id_order = $order_id and i.id_item = od.id_item and p.id_order = $order_id")->result_array();
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
                                                    <h4> <?= $produk['0']['tanggal_order'] ?></h4>
                                                    <h4 class="mt-4">    
                                                        <?php 
                                                            if($id_pembayaran != 2 && $id_pembayaran != 3){
                                                                if($status == 0){
                                                                    echo 'Diproses';
                                                                } else if ($status == 1) {
                                                                    echo 'Barang Siap';
                                                                } else if ($status == 2) {
                                                                    echo 'Pengantaran';
                                                                } else if ($status == 3) {
                                                                    echo 'Disewa';
                                                                } else if ($status == 4){
                                                                    if ($antar == 0) {
                                                                        echo 'Barang Harus Diambil';
                                                                    } else {
                                                                        echo 'Barang Akan Diantar';
                                                                    }
                                                                } else if ($status == 6){
                                                                    echo 'Barang Harus Dikembalikan';
                                                                }
                                                            }
                                                        ?> 
                                                    </h4>
                                                    <h4>
                                                        <?php 
                                                            if( $id_pembayaran == 1){ 
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
                        
                        <!-- START MODAL DETAIL ORDER -->
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
                                </div>
                                <!--/.Content-->
                            </div>
                        </div>
                        <!-- END MODAL DETAIL ORDER -->
                    </div>
                <? endforeach; ?>
                <div class="row">
                    <?php if (!$riwayat) {?>
                        <div class="col-12 mt-5">
                            <center>
                                <h4>Tidak ada riwayat sewa barang</h4>
                                <a href="<?=base_url('');?>" class="h4 text-white mt-4">Kembali ke Beranda</a>
                            </center>
                        </div>
                    <? } ?>
                </div>
            </div>
        </div>
    </div>
</main>

  <!-- Modal Konfirmasi Checkout Akun -->
<div class="modal fade" id="modalKonfirmasi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-notify modal-warning" role="document">
     <!--Content-->
     <div class="modal-content">
        <div class="modal-header">
            <p class="heading lead">Silahkan pilih metode pembayaran & pengiriman</p>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="white-text">&times;</span>
            </button>
        </div>
        <form class="user" method="POST" action="<?= base_url('beranda/co'); ?>">
            <div class="modal-body">
                <h5>Pembayaran</h5>
                <div class="row">
                    <div class="col-md-6">
                        <label><input type="radio" name="pembayaran" value="ditempat"> Pembayaran ditempat</label>
                    </div>
                    <div class="col-md-6">
                        <label><input type="radio" name="pembayaran" value="transfer"> Transfer</label>
                    </div>
                </div>

                <h5 class="mt-4">Pengiriman</h5>
                <div class="row">
                    <div class="col-md-6">
                        <label><input type="radio" name="antar" value="antar"> Antar</label>
                    </div>
                    <div class="col-md-6">
                        <label><input type="radio" name="antar" value="ambil"> Ambil</label>
                    </div>
                </div>
            </div>
            <!--Footer-->
            <div class="modal-footer d-flex justify-content-center">
                <button type="submit" name="btnSubmit" class="btn btn-unique">Proses pesanan <i class="fas fa-paper-plane-o ml-1"></i></button>
            </div>
        </form>
     </div>
     <!--/.Content-->
   </div>
</div>
