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
                        <?= form_error('nama_produk', '<small class="text-danger">', '<small>'); ?>
                    </div>
                    <div class="form-group mt-4">
                        <input type="text" name="merk" class="form-control form-control-user" placeholder="Merk Item">
                        <?= form_error('merk', '<small class="text-danger">', '<small>'); ?>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <input type="text" name="harga" class="form-control form-control-user" placeholder="Biaya perhari">
                        <?= form_error('harga', '<small class="text-danger">', '<small>'); ?>
                    </div>
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
                <div class="col-4 mt-2">
                    <div class="form-group">
                        <input type="text" name="kondisi" class="form-control form-control-user" placeholder="Kondisi Item">
                        <?= form_error('kondisi', '<small class="text-danger">', '<small>'); ?>
                    </div>
                </div>
                <div class="col-4 mt-2">
                    <div class="form-group">
                        <input type="text" name="antar" class="form-control form-control-user" placeholder="Antar Item">
                        <?= form_error('antar', '<small class="text-danger">', '<small>'); ?>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                            <span class="h6">Gambar Item</span>
                            <input type="file" name="upload_image" id="upload_image" >
                            <?= form_error('upload_image', '<small class="text-danger">', '<small>'); ?>
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <input type="text" name="berat" class="form-control form-control-user" placeholder="Berat">
                        <?= form_error('berat', '<small class="text-danger">', '<small>'); ?>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <input type="text" name="Ukuran" class="form-control form-control-user" placeholder="Ukuran">
                        <?= form_error('Ukuran', '<small class="text-danger">', '<small>'); ?>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <input type="text" name="gender" class="form-control form-control-user" placeholder="Gender">
                        <?= form_error('gender', '<small class="text-danger">', '<small>'); ?>
                    </div>
                </div>
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