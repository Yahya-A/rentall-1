<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row mx-1">
        <h1 class="h3 mb-4 text-gray-800">Data Vendor</h1>
        <a class="btn btn-primary h3 mb-4 ml-auto mr-3" href="<?php echo base_url("account/dataVendor/"). $this->session->userdata('id');; ?>">Ubah Data</a>
    </div>
    <div class="row">
        <div class="col-sm">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Deskripsi</th>
                            <th>Foto</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($vendor as $p) : ?>
                            <tr>
                                <td><?= $p['nama_vendor'] ?></td>
                                <td><?= $p['alamat'] ?></td>
                                <td><?= $p['deskripsi_vendor'] ?></td>
                                <td>
                                    <center>
                                        <img src="<?= base_url('assets/img/vendor_logo/'), $p['foto'] ?>" height="50px">
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