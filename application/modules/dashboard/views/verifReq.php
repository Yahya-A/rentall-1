<!-- Begin Page Content -->
<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">Verification</h1>
          <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Daftar Data Diri Untuk di Verifikasi</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Username</th>
                      <th>NIK</th>
                      <th>Nama Lengkap</th>
                      <th>Scan KTP</th>
                      <th>Foto Diri & KTP</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Username</th>
                      <th>NIK</th>
                      <th>Nama Lengkap</th>
                      <th>Scan KTP</th>
                      <th>Foto Diri & KTP</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach ($verifReq as $p) : ?>
                        <tr>
                        <td><?= $p['username'];?></td>
                        <td><?= $p['no_identitas'];?></td>
                        <td><?= $p['nama_identitas'];?></td>
                        <td><img src="<?= base_url('assets/img/verif/').$p['foto1'];?>" width="100px"></td>
                        <td><img src="<?= base_url('assets/img/verif/').$p['foto2'];?>" width="100px"></td>
                        <td width="150px;">
                            <a href="<?= base_url('dashboard/ConfirmRequest/').$p['id_user']?>" class="btn btn-success btn-icon-split btn-md">
                                <span class="icon text-white-50">
                                <i class="fas fa-check"></i>
                                </span>
                                <span class="text">Konfirmasi</span>
                            </a>
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