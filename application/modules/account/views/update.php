<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <h1 class="h3 mb-4 text-gray-800 ml-3">Biodata Diri</h1>
        <?php if($this->session->flashdata('error') == TRUE): ?>
        <div class="alert alert-danger alert-dismissible fade show ml-5" role="alert">
            <?= $this->session->flashdata('error'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php endif; ?>
    </div>
    <!-- DataTales Example -->
    <div class="row">
        <div class="col-sm-10 offset-1">
            <?php foreach ($daftar as $p) : ?>
            <form class="user" method="POST" action="<?= base_url('account/edit'); ?>" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-sm-5 offset-1">
                        <div class="form-group">
                            <input type="text" name="nama" class="form-control form-control-user" placeholder="Nama" value="<?= $p['nama']; ?>">
                            <input type="text" name="id_user" value="<?= $p['id_user']; ?>" hidden>
                            <?= form_error('nama', '<small class="text-danger">', '<small>'); ?>
                        </div>
                        <div class="form-group">
                            <input type="text" name="alamat" class="form-control form-control-user" placeholder="Alamat" value="<?= $p['alamat']; ?>">
                            <?= form_error('alamat', '<small class="text-danger">', '<small>'); ?>
                        </div>
                        <div class="col-sm-8 mt-3">
                            <span class="h6">Foto</span>
                            <input type="file" name="upload_image" id="upload_image" >
                            <?= form_error('upload_image', '<small class="text-danger">', '<small>'); ?>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <input type="text" name="no_hp" class="form-control form-control-user" placeholder="Nomor Handphone" 
                            <?php if($p['no_hp'] == 0): ?>
                                value=""
                            <? else: ?>
                                value="<?= $p['no_hp']; ?>"
                            <? endif; ?>
                            ">
                            <?= form_error('no_hp', '<small class="text-danger">', '<small>'); ?>
                        </div>
                        <div class="form-group">
                            <input type="text" name="email" class="form-control form-control-user" placeholder="E-mail" value="<?= $p['email']; ?>">
                            <?= form_error('email', '<small class="text-danger">', '<small>'); ?>
                        </div>
                    </div>
                </div>
                <center>
                    <input class="btn btn-primary btn-user btn-block mt-4 w-50 center" type="submit" name="btnSubmit" value="Update Biodata" /> 
                </center>
            </form>
            <? endforeach; ?>
        </div>

    </div>
</div>