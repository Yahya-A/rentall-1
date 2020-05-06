<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <h1 class="h3 mb-4 text-gray-800 ml-3">Tambah Akun Bank</h1>
        <a class="btn btn-primary h3 mb-4 ml-auto mr-3" href="<?= base_url('account/bank'); ?>">Daftar Akun Bank</a>
    </div>
    <!-- DataTales Example -->
    <div class="row">
        <div class="col-sm-8 offset-2">
            <form class="user" method="POST" action="<?= base_url('account/add_bank'); ?>" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="text" name="nama" class="form-control form-control-user" placeholder="Bank">
                    <?= form_error('nama', '<small class="text-danger">', '<small>'); ?>
                </div>
                <div class="form-group">
                    <input type="text" name="an" class="form-control form-control-user" placeholder="Atas Nama">
                    <?= form_error('an', '<small class="text-danger">', '<small>'); ?>
                </div>
                <div class="form-group">
                    <input type="text" name="nomor" class="form-control form-control-user" placeholder="Nomor Rekening">
                    <?= form_error('nomor', '<small class="text-danger">', '<small>'); ?>
                </div>
                    <center>
                        <input class="btn btn-primary btn-user btn-block mt-4 w-50 center" type="submit" name="btnSubmit" value="Tambah Akun Bank" /> 
                    </center>
            </form>
        </div>

    </div>
</div>