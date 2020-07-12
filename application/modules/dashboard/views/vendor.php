<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Pengguna</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>ID Vendor</th>
                    <th>Nama Vendor</th>
                    <th>Deskripsi</th>
                    <th>Alamat</th>
                    <th>Logo</th>
                    <!-- <th>Detail</th> -->
                </tr>
                </thead>
                <tbody>
                <?php foreach ($vendor as $p) : ?>
                    <tr>
                        <td><?= $p->id_vendor; ?></td>
                        <td><?= $p->nama_vendor; ?></td>
                        <td><?= $p->deskripsi_vendor; ?></td>
                        <td><?= $p->alamat; ?></td>
                        <td>
                            <center>
                                <img src="<?= base_url('assets/img/vendor_logo/'. $p->foto);?>" alt="" width="100px">
                            </center>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->