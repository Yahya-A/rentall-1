<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row mx-1">
        <h1 class="h3 mb-4 text-gray-800">Biodata Diri</h1>
        <a class="btn btn-primary h3 mb-4 ml-auto mr-3" href="<?= base_url('account/update'); ?>">Ubah Biodata</a>
        <a class="btn btn-primary h3 mb-4  mr-3" href="<?= base_url('account/bank'); ?>">Akun Bank</a>
        <?php if($this->session->userdata('level') == 1 && $verif == 1): ?>
            <a class="btn btn-primary h3 mb-4 mr-3" href="<?= base_url('account/vendor'); ?>">Jadi vendor</a>
        <? endif; ?>    
        <a class="btn btn-success h3 mb-4 mr-3" href="<?= base_url('account/verif'); ?>">Verif Data</a>
    </div>
    <div class="row">
        <div class="col-sm">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Nomor Handphone</th>
                            <th>Email</th>
                            <th>Verifikasi</th>
                            <th>Foto</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($daftar as $p) : ?>
                            <tr>
                                <td><?= $p['nama'] ?></td>
                                <td><?= $p['alamat'] ?></td>
                                <td><?= $p['no_hp'] ?></td>
                                <td><?= $p['email'] ?></td>
                                <td>
                                    <?php if($p['verif'] == 0){
                                        echo "Belum Verifikasi";
                                    } else if ($p['verif'] == 1){
                                        echo "Sudah Verifikasi";
                                    } else if ($p['verif'] == 2){
                                        echo "Sedang Ditinjau";
                                    } ?>
                                </td>
                                <td>
                                    <center>
                                        <img src="<?= base_url('assets/img/foto_profile/'), $p['foto'] ?>" height="50px">
                                    </center>
                                </td>
                            </tr>
                        <? endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</div>
<!-- /.container-fluid -->