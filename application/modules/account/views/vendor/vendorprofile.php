<main>
    <div class="container z-depth-1 mb-3 amber lighten-5 rounded-lg">
        <p class="h1-responsive text-center amber-text darken-3"><strong> Verifikasi Identitasmu </strong></p>
        <div class="row mx-auto text-center">
            <div class="col-md-3 mb-5 border-right">
                <p class="h3-responsive">Verif 1</p>
                <a href="#" class="btn btn-sm btn-amber text-white" role="button" data-toggle="modal" data-target="!#">Mulai</a>
            </div>
            <div class="col-md-3 mb-5 border-right">
                <p class="h3-responsive">Verif 1</p>
                <a href="#" class="btn btn-sm btn-amber text-white" role="button" data-toggle="modal" data-target="!#">Mulai</a>
            </div>
            <div class="col-md-3 mb-5 border-right">
                <p class="h3-responsive">Verif 1</p>
                <a href="#" class="btn btn-sm btn-amber text-white" role="button" data-toggle="modal" data-target="!#">Mulai</a>
            </div>
            <div class="col-md-3 mb-5">
                <p class="h3-responsive">Verif 1</p>
                <a href="#" class="btn btn-sm btn-amber text-white" role="button" data-toggle="modal" data-target="!#">Mulai</a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4 ">
                <div class="list-group z-depth-1-half ">
                    <a href="#!" class="list-group-item list-group-item-action t_acc_setting">
                        <i class="fas fa-cogs mr-3"></i>Pengaturan Akun
                    </a>
                    <a href="<?= base_url('account/renter')?>" class="list-group-item list-group-item-action"><i class="fas fa-user mr-3"></i>Profil</a>
                    <a href="#!" class="list-group-item list-group-item-action"><i class="fas fa-question-circle mr-3"></i>Ganti Password</a>
                    <a href="#!" class="list-group-item list-group-item-action active"><i class="fas fa-store-alt mr-3"></i>Vendor Profile</a>
                    <a href="#!" class="list-group-item list-group-item-action"><i class="fas fa-question-circle mr-3"></i>Informasi Bank</a>
                  </div>
            </div>
            <div class="col-md-8">
                <div class="card renter-info">
                    <div class="card-header">
                      <h4 class="p2">Detail Profil
                    </h4> 
                    </div>
                    <?php foreach ($vendor as $p) :?>
                    <form class="user" method="POST" action="<?= base_url("account/update_vendor/").$p['id_user']?>" enctype="multipart/form-data">
                    <?php endforeach;?>
                        <div class="row">
                        <?php 
                        if ($vendor != null):
                            foreach ($vendor as $p) : ?>
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
                            <? endforeach; ?>
                            <? else: ?>
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
                            <? endif; ?>
                    </form>
                  </div>
            </div>
        </div>
    </div>

  </main>