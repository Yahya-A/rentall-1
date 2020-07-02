<main>

    <div class="container">
        <div class="row">
            <div class="col-md-4 ">
                <div class="list-group z-depth-1-half ">
                    <a href="#!" class="list-group-item list-group-item-action t_acc_setting">
                        <i class="fas fa-cogs mr-3"></i>Pengaturan Akun
                    </a>
                    <a href="#!" class="list-group-item list-group-item-action active"><i class="fas fa-user mr-3"></i>Profil</a>
                    <a href="#!" class="list-group-item list-group-item-action"  data-toggle="modal" data-target="#modalPassword"><i class="fas fa-unlock-alt mr-3"></i>Ganti Password</a>
                    <a href="<?= base_url('account/bank'); ?>" class="list-group-item list-group-item-action"><i class="far fa-credit-alt mr-3"></i>Informasi Bank</a>
                    <a href="#!" class="list-group-item list-group-item-action" data-toggle="modal" data-target="#modalHapus"><i class="far fa-unlock-card mr-3"></i>Nonaktifkan Akun</a>
                  </div>
            </div>
            <div class="col-md-8">
                <div class="card renter-info">
                    <div class="card-header">
                      <h4 class="p2">Detail Profil</h4> 
                    </div>
                        <?php 
                            if ($vendor != null):
                                foreach ($vendor as $p) : ?>
                                <form class="user" method="POST" action="<?= base_url("account/update_vendor/").$vendor['0']['id_user']?>" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="card-body text-center">
                                                <h5 class="card-title">Foto Profil</h5>
                                                <img src="<?php echo base_url('assets/img/foto_profile/default.png')?>" class="ml- rounded-circle p-photo">
                                            
                                                <p class="card-text mt-3"><?= $p['nama_vendor'] ?></p>
                                            </div>
                                        </div>
                                        <div class="col-md-8 p-5">
                                            <span class="badge badge-primary">Belum Verifikasi</span>
                                            <div class="md-form active-amber-input amber-input mt-3">
                                                <i class="fas fa-envelope prefix"></i>
                                                <input type="text" name="id" id="id" value="<?= $p['id_user']; ?>" hidden>
                                                <input type="text" id="inputIconEx1" class="md-input form-control" name="nama" value="<?= $p['nama_vendor'] ?>">
                                                <label for="inputIconEx1">Nama Vendor</label>
                                            </div>
                                            <div class="md-form active-amber-input amber-input mt-3">
                                                <i class="fas fa-envelope prefix"></i>
                                                <input type="text" id="inputIconEx1" class="md-input form-control" name="alamat" value="<?= $p['alamat'] ?>">
                                                <label for="inputIconEx1">Alamat</label>
                                            </div>
                                            <div class="md-form amber-textarea active-amber-textarea mt-3">
                                                <i class="fas fa-pencil-alt prefix"></i>
                                                <textarea id="form22" class="md-textarea form-control" rows="3" name="deskripsi"><?= $p['deskripsi_vendor'] ?></textarea>
                                                <label for="form22">Deskripsi</label>
                                            </div>

                                            <button class="btn btn-outline-warning waves-effect btn-sm text-white ml-4 btn-edit" type="submit" name="btnSubmit">
                                                    <i class="fas fa-user-edit"></i>
                                                    Update
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <? endforeach; ?>
                            <? else: ?>
                                <form class="user" method="POST" action="<?= base_url("account/update_vendor/").$this->session->userdata('id'); ?>" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="card-body text-center">
                                                <h5 class="card-title">Foto Profil</h5>
                                                <img src="<?php echo base_url('assets/img/foto_profile/default.png')?>" class="ml- rounded-circle p-photo">
                                                <p class="card-text mt-3">Nama Vendor</p>
                                            </div>
                                        </div>
                                        <div class="col-md-8 p-5">
                                            <span class="badge badge-primary">Belum Verifikasi</span>
                                            <div class="md-form active-amber-input amber-input mt-3">
                                                <i class="fas fa-envelope prefix"></i>
                                                <input type="text" id="inputIconEx1" class="md-input form-control" name="nama">
                                                <label for="inputIconEx1">Nama Vendor</label>
                                            </div>
                                            <div class="md-form active-amber-input amber-input mt-3">
                                                <i class="fas fa-envelope prefix"></i>
                                                <input type="text" id="inputIconEx1" class="md-input form-control" name="alamat">
                                                <label for="inputIconEx1">Alamat</label>
                                            </div>
                                            <div class="md-form amber-textarea active-amber-textarea mt-3">
                                                <i class="fas fa-pencil-alt prefix"></i>
                                                <textarea id="form22" class="md-textarea form-control" rows="3" name="deskripsi"></textarea>
                                                <label for="form22">Deskripsi</label>
                                            </div>
                                            <button class="btn btn-outline-warning waves-effect btn-sm text-white ml-4 btn-edit" type="submit" name="btnSubmit">
                                                <i class="fas fa-user-edit"></i>
                                                Update
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            <? endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Nonaktifkan Akun -->
    <div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-notify modal-warning" role="document">
            <!--Content-->
                <div class="modal-content">
                <!--Header-->
                    <div class="modal-header">
                    <p class="heading lead">Yakin nonaktifkan akun?</p>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">Menonaktifkan akun maka anda perlu untuk mengaktifkan ulang untuk menggunakan jasa Rentall.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="<?= base_url('account/nonaktifkan') ?>">Nonaktifkan</a>
                    </div>
                </div>
            <!--/.Content-->
        </div>
    </div>
    
    <!-- Modal Password Akun -->
    <div class="modal fade" id="modalPassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-notify modal-warning" role="document">
        <!--Content-->
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header">
                <p class="heading lead">Ubah Password</p>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
                </div>
                    <form class="user" method="POST" action="<?= base_url('account/change_password'); ?>">
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="password" name="password_lama" class="form-control form-control-user" placeholder="Password Lama">
                                <?= form_error('nama', '<small class="text-danger">', '<small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password_baru" class="form-control form-control-user" placeholder="Password Baru">
                                <?= form_error('an', '<small class="text-danger">', '<small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password_baru2" class="form-control form-control-user" placeholder="Ulangi Password Baru">
                                <?= form_error('nomor', '<small class="text-danger">', '<small>'); ?>
                            </div>
                        </div>
                        <div class="modal-footer">
                        <button type="submit" name="btnSubmit" class="btn btn-primary">Ganti Password</button>
                        </div>
                    </form>
            </div>
        <!--/.Content-->
        </div>
    </div>
</main>