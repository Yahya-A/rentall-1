<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <h1 class="h3 mb-4 text-gray-800 ml-3">Tambah Akun Bank</h1>
        <a class="btn btn-primary h3 mb-4 ml-auto mr-3" href="<?= base_url('account/bank'); ?>">Daftar Akun Bank</a>
    </div>
    <!-- DataTales Example -->
    <div class="row">
        <div class="col-sm-8 offset-2">
            <?php foreach($bank as $p): ?>
                <form class="user" method="POST" action="<?= base_url("account/e_bank/$id"); ?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" name="nama" class="form-control form-control-user" placeholder="Bank" value="<?= $p['bank']; ?>">
                        <input type="text" name="id" value="<?= $p['id']; ?>" hidden>
                        <?= form_error('nama', '<small class="text-danger">', '<small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" name="an" class="form-control form-control-user" placeholder="Atas Nama" value="<?= $p['an']; ?>">
                        <?= form_error('an', '<small class="text-danger">', '<small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" name="nomor" class="form-control form-control-user" placeholder="Nomor Rekening" value="<?= $p['rekening']; ?>">
                        <?= form_error('nomor', '<small class="text-danger">', '<small>'); ?>
                    </div>
                        <center>
                            <input class="btn btn-primary btn-user btn-block mt-4 w-50 center" type="submit" name="btnSubmit" value="Edit Akun Bank" /> 
                        </center>
                </form>
            <? endforeach; ?>
        </div>

    </div>
</div>