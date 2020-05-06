<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <h1 class="h3 mb-4 text-gray-800 ml-3">Verifikasi Diri</h1>
        <?php if($this->session->flashdata('error') == TRUE): ?>
        <div class="alert alert-danger alert-dismissible fade show ml-5" role="alert">
            <?= $this->session->flashdata('error'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php endif; ?>
    </div>

    <div class="row">
        <div class="col-sm-10 offset-1">
            <form class="user" method="POST" action="<?= base_url('account/verif_akun'); ?>" enctype="multipart/form-data">
                <div class="row">
                    <?php 
                        if ($data != null):
                            foreach ($data as $p) : ?>
                                <div class="col-sm-5 offset-1">
                                    <div class="form-group">
                                        <input type="text" name="no_identitas" class="form-control form-control-user" placeholder="Nomor Identitas"
                                        <?php if($p['no_identitas'] != null): ?>
                                        value = "<?= $p['no_identitas'] ?>"
                                        <? endif; ?>
                                        >
                                        <input type="text" name="id" id="id" value="<?= $p['id_user']; ?>" hidden>
                                        <?= form_error('no_identitas', '<small class="text-danger">', '<small>'); ?>
                                    </div>
                                    <div class="col-sm-8 mt-3">
                                        <span class="h6">Foto 1</span>
                                        <input type="file" name="upload_image" id="upload_image" >
                                        <?= form_error('upload_image', '<small class="text-danger">', '<small>'); ?>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <input type="text" name="nama_identitas" class="form-control form-control-user" placeholder="Nama" 
                                        <?php if($p['nama_identitas'] != null): ?>
                                        value = "<?= $p['nama_identitas'] ?>"
                                        <? endif; ?>
                                        >
                                        <?= form_error('nama_identitas', '<small class="text-danger">', '<small>'); ?>
                                    </div>
                                    <div class="col-sm-8 mt-3">
                                        <span class="h6">Foto 2</span>
                                        <input type="file" name="upload_image2" id="upload_image2" >
                                        <?= form_error('upload_image2', '<small class="text-danger">', '<small>'); ?>
                                    </div>
                                </div>                    
                            <? endforeach; ?>
                        <? else: ?>
                                <div class="col-sm-5 offset-1">
                                    <div class="form-group">
                                        <input type="text" name="no_identitas" class="form-control form-control-user" placeholder="Nomor Identitas">
                                        <?= form_error('no_identitas', '<small class="text-danger">', '<small>'); ?>
                                    </div>
                                    <div class="col-sm-8 mt-3">
                                        <span class="h6">Foto 1</span>
                                        <input type="file" name="upload_image" id="upload_image" >
                                        <?= form_error('upload_image', '<small class="text-danger">', '<small>'); ?>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <input type="text" name="nama_identitas" class="form-control form-control-user" placeholder="Nama" >
                                        <?= form_error('nama_identitas', '<small class="text-danger">', '<small>'); ?>
                                    </div>
                                    <div class="col-sm-8 mt-3">
                                        <span class="h6">Foto 2</span>
                                        <input type="file" name="upload_image2" id="upload_image2" >
                                        <?= form_error('upload_image2', '<small class="text-danger">', '<small>'); ?>
                                    </div>
                                </div>       
                    <? endif; ?>
                </div>
                <center>
                    <input class="btn btn-primary btn-user btn-block mt-4 w-50 center" type="submit" name="btnSubmit" value="Verifikasi Akun" /> 
                </center>
            </form>
        </div>

    </div>
</div>