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
                    <th>ID User</th>
                    <th>Nama Pengguna</th>
                    <th>Email</th>
                    <th>Nomor HP</th>
                    <th>Alamat</th>
                    <th>Foto Profile</th>
                    <!-- <th>Detail</th> -->
                </tr>
                </thead>
                <tbody>
                <?php foreach ($pengguna as $p) : ?>
                    <tr>
                        <td><?= $p->id_user; ?></td>
                        <td><?= $p->nama; ?></td>
                        <td><?= $p->email; ?></td>
                        <td><?= $p->no_hp; ?></td>
                        <td><?= $p->alamat; ?></td>
                        <td>
                            <center>
                                <img src="<?= base_url('assets/img/foto_profile/'. $p->foto);?>" alt="" width="100px">
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