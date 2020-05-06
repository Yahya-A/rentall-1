<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row mx-1">
        <h1 class="h3 mb-4 text-gray-800">Akun Bank</h1>
        <a class="btn btn-primary h3 mb-4 ml-auto mr-3" href="<?= base_url('account/add_bank'); ?>">Tambah Akun</a>
    </div>
    <div class="row">
        <div class="col-sm">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Bank</th>
                            <th>Atas Nama</th>
                            <th>Nomor Rekening</th>
                            <th width="150px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($bank as $p) : ?>
                            <tr>
                                <td><?= $p['bank'] ?></td>
                                <td><?= $p['an'] ?></td>
                                <td> <?= $p['rekening']; ?> </td>
                                <td>
                                    <center>
                                        <a class="btn btn-success" href="<?= base_url('account/e_bank/'), $p['id'] ?>">Edit</a>
                                        <a class="btn btn-danger" href="<?= base_url('account/d_bank/'), $p['id'] ?>">Delete</a>
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