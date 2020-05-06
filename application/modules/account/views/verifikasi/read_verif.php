<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <?php if($verif != 1): ?>
        <a class="btn btn-primary h3 mb-4 ml-auto mr-3" href="<?= base_url('account/updateVerifikasi'); ?>">Ubah Data</a>
        <? endif; ?>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nomor Identitas</th>
                            <th>Nama</th>
                            <th>Foto 1</th>
                            <th>Foto 2</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($data as $p) : ?>
                            <tr>
                                <td><?= $p['no_identitas'] ?></td>
                                <td><?= $p['nama_identitas'] ?></td>
                                <td>
                                    <center>
                                        <img src="<?= base_url('assets/img/verif/'), $p['foto1'] ?>" height="50px">
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        <img src="<?= base_url('assets/img/verif/'), $p['foto2'] ?>" height="50px">
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