<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <h1 class="h3 mb-4 text-gray-800 ml-3">Daftar Item</h1>
        <?php if($this->session->flashdata('error') == TRUE): ?>
        <div class="alert alert-danger alert-dismissible fade show ml-5" role="alert">
            <?= $this->session->flashdata('error'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php endif; ?>
        <a class="btn btn-primary text-white h3 mb-4 ml-auto mr-3" data-toggle="modal" data-target="#addItem">Tambah Item</a>
        
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Biaya</th>
                            <th>Deposit</th>
                            <th>Kategori</th>
                            <th>Merk</th>
                            <th>Kondisi</th>
                            <th>Deskripsi</th>
                            <th>Antar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach ($items as $p) : 
                            switch ($p['antar']) {
                                case '1':
                                    $antar = "Ya";
                                    break;
                                
                                default:
                                    $antar = "Tidak";
                                    break;
                            }
                            
                            switch ($p['kondisi']) {
                                case '1':
                                    $kondisi = "Baru";
                                    break;
                                
                                case '2':
                                    $kondisi = "Sangat Bagus";
                                    break;
                            
                                case '3':
                                    $kondisi = "Bagus";
                                    break;
                        
                                case '5':
                                    $kondisi = "Layak";
                                    break;
                                                    
                                default:
                                    $kondisi = "Rapuh";
                                    break;
                            }
                            
                            ?>
                            <tr>
                                <td>
                                    <center>
                                        <img src="<?= base_url('assets/img/produk/'), $p['foto'] ?>" height="50px">
                                    </center>
                                </td>
                                <td><?= $p['nama'] ?></td>
                                <td><?= $p['harga'] ?></td>
                                <td><?= $p['deposit'] ?></td>
                                <td><?= $p['sub_kat'] ?></td>
                                <td><?= $p['merk'] ?></td>
                                <td><?= $kondisi ?></td>
                                <td><?= $p['deskripsi'] ?></td>
                                <td><?= $antar ?></td>
                                <td>
                                    <center>
                                        <a class="btn btn-primary" href="<?= base_url('products/read/'), $p['id_item'] ?>">Lihat</a>
                                        <!-- <a class="btn btn-success" href="<?= base_url('products/edit/'), $p['id_item'] ?>">Edit</a>
                                        <a class="btn btn-danger" href="<?= base_url('products/delete/'), $p['id_item'] ?>">Hapus</a> -->
                                    <center>
                                </td>
                            </tr>
                        <? endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<div class="modal fade" id="addItem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pilih Kategori</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <center>
                    <?php foreach ($kategori as $p): 
                    $myvalue = $p['kategori'];
                    $kategori = explode(' ',trim($myvalue));?>
                        <a class="btn btn-primary m-2" href="<?= base_url('products/add/'), $kategori[0] ?>"><?= $p['kategori'] ?></a>
                    <? endforeach; ?>
                </center>
            </div>
        </div>
    </div>
</div>