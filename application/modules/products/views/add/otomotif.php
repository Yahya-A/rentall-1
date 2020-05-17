<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <h1 class="h3 mb-4 text-gray-800 ml-3">Tambah Item</h1>
        <a class="btn btn-primary h3 mb-4 ml-auto mr-3" href="<?= base_url('products'); ?>">Daftar Item</a>
    </div>
    <!-- DataTales Example -->
    <div class="row">
        <div class="col-sm-10 offset-1">
            <form class="user row" method="POST" action="<?= base_url('products/tambah_produk'); ?>" enctype="multipart/form-data">
            
            <div class="col-6">
                    <div class="form-group">
                        <input type="text" name="nama_produk" class="form-control form-control-user" placeholder="Nama Produk">
                        <input type="text" name="id_kat" value="otomotif" hidden>
                        <?= form_error('nama_produk', '<small class="text-danger">', '<small>'); ?>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <input type="text" name="harga" class="form-control form-control-user" placeholder="Biaya perhari">
                        <?= form_error('harga', '<small class="text-danger">', '<small>'); ?>
                    </div>
                </div>
                
                <div class="col-3">
                    <div class="form-group mt-2">
                        <input type="text" name="merk" class="form-control form-control-user" placeholder="Merk Item">
                        <?= form_error('merk', '<small class="text-danger">', '<small>'); ?>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group mt-2">
                        <input type="text" name="stock" class="form-control form-control-user" placeholder="Stock Item">
                        <?= form_error('stock', '<small class="text-danger">', '<small>'); ?>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group mt-2">
                        <input type="text" name="warna" class="form-control form-control-user" placeholder="Warna Item">
                        <?= form_error('warna', '<small class="text-danger">', '<small>'); ?>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <span class="h6 mr-2">Kategori Item</span>
                            <select name="kategori_produk" class="form-control form-control-user">
                            <?php 
                            foreach($kategori as $p):
                                echo "<option value='".$p['id_kategori']."'>".$p['sub_kat']."</option>";
                            endforeach; 
                            ?>        
                            </select>
                        <?= form_error('kategori_produk', '<small class="text-danger">', '<small>'); ?>
                    </div>
                </div>

                <div class="col-3">
                    <div class="form-group">
                        <span class="h6 mr-2">Bahan Bakar</span>
                            <select name="bahan_bakar" class="form-control form-control-user">
                                <option value='Bensin'>Bensin</option>
                                <option value='Solar'>Solar</option>
                            </select>
                        <?= form_error('bahan_bakar', '<small class="text-danger">', '<small>'); ?>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <span class="h6 mr-2">Kondisi Item</span>
                            <select name="kondisi" class="form-control form-control-user">
                                <option value='1'>Baru</option>
                                <option value='2'>Sangat Bagus</option>
                                <option value='3'>Bagus</option>
                                <option value='4'>Layak</option>
                                <option value='5'>Rapuh</option>
                            </select>
                        <?= form_error('kondisi', '<small class="text-danger">', '<small>'); ?>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <span class="h6 mr-2">Antar Item</span>
                            <select name="antar" class="form-control form-control-user">
                                <option value='2'>Tidak</option>
                                <option value='1'>Ya</option>
                            </select>
                        <?= form_error('antar', '<small class="text-danger">', '<small>'); ?>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                            <span class="h6">Gambar Item</span>
                            <input type="file" name="upload_image" id="upload_image" >
                            <?= form_error('upload_image', '<small class="text-danger">', '<small>'); ?>
                    </div>
                </div>

                <!---- INPUT INDIVIDU -->
                <div class="col-3">
                    <div class="form-group">
                        <input type="text" name="deposit" class="form-control form-control-user" placeholder="Deposit">
                        <?= form_error('deposit', '<small class="text-danger">', '<small>'); ?>
                    </div>
                </div>
                 <div class="col-3">
                    <div class="form-group">
                        <input type="text" name="mesin" class="form-control form-control-user" placeholder="Kapasitas Mesin">
                        <?= form_error('mesin', '<small class="text-danger">', '<small>'); ?>
                    </div>
                </div>
                 <div class="col-3">
                    <div class="form-group">
                        <input type="text" name="km" class="form-control form-control-user" placeholder="KM">
                        <?= form_error('km', '<small class="text-danger">', '<small>'); ?>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <input type="text" name="tahun_terbit" class="form-control form-control-user" placeholder="Tahun Terbit">
                        <?= form_error('tahun_terbit', '<small class="text-danger">', '<small>'); ?>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <span class="h6 mr-2">Kapasitas Penumpang</span>
                            <select name="kapasitas" class="form-control form-control-user">
                                <option value='1'>1</option>
                                <option value='2'>2</option>
                                <option value='3'>3</option>
                                <option value='4'>4</option>
                                <option value='5'>5</option>
                                <option value='6'>6</option>
                                <option value='7'>7</option>
                                <option value='8'>8</option>
                            </select>
                        <?= form_error('kapasitas', '<small class="text-danger">', '<small>'); ?>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <span class="h6 mr-2">Transmisi</span>
                            <select name="transmisi" class="form-control form-control-user">
                                <option value='0'>Belum Memilih</option>
                                <option value='Matic'>Matic</option>
                                <option value='Manual'>Manual</option>
                            </select>
                        <?= form_error('transmisi', '<small class="text-danger">', '<small>'); ?>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <span class="h6 mr-2">AC</span>
                            <select name="ac" class="form-control form-control-user">
                                <option value='0'>Belum Memilih</option>
                                <option value='1'>Ya</option>
                                <option value='2'>Tidak</option>
                            </select>
                        <?= form_error('ac', '<small class="text-danger">', '<small>'); ?>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <span class="h6 mr-2">USB</span>
                            <select name="usb" class="form-control form-control-user">
                                <option value='0'>Belum Memilih</option>
                                <option value='1'>1</option>
                                <option value='2'>2</option>
                                <option value='3'>3</option>
                                <option value='4'>4</option>
                                <option value='5'>5</option>
                                <option value='6'>Lebih</option>
                                <option value='7'>Tidak</option>
                            </select>
                        <?= form_error('usb', '<small class="text-danger">', '<small>'); ?>
                    </div>
                </div>
                <!---- END INPUT INDIVIDU -->

                <div class="col-12">
                    <div class="form-group">
                        <input type="text" name="deskripsi" class="form-control form-control-user" placeholder="Deskripsi Item">
                        <?= form_error('deskripsi', '<small class="text-danger">', '<small>'); ?>
                    </div>
                </div>
                <div class="col-12">
                    <center>
                        <input class="btn btn-primary btn-user btn-block mt-4 w-50 center" type="submit" name="btnSubmit" value="Tambah Item" /> 
                    </center>
                </div>
            </form>
        </div>

    </div>
</div>