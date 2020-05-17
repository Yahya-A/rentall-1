<main>
    <div class="container">
     <?php if($this->session->flashdata('error') == TRUE): ?>
        <div class="alert alert-danger alert-dismissible fade show ml-5" role="alert">
            <?= $this->session->flashdata('error'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
      <?php endif; ?>
     <?php if($this->session->flashdata('sukses') == TRUE): ?>
        <div class="alert alert-primary alert-dismissible fade show ml-5" role="alert">
            <?= $this->session->flashdata('sukses'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
      <?php endif; ?>
    </div>
    <div class="container z-depth-1 mb-3 amber lighten-5 rounded-lg">
        <p class="h1-responsive text-center amber-text darken-3"><strong> Verifikasi Identitasmu </strong></p>
        <div class="row mx-auto text-center">
            <div class="col-md-3 mb-5 border-right">
            <?php if($daftar['0']['token'] == 1){ ?>
                <p class="h3-responsive">Email Terverifikasi</p>
                <a href="#" class="btn btn-sm btn-amber text-white" role="button" data-toggle="modal" data-target="#verifEmail" >Ubah Email</a>
            <? } else { ?>
                <p class="h3-responsive">Verifikasi Email</p>
                <a href="#" class="btn btn-sm btn-amber text-white" role="button" data-toggle="modal" data-target="#verifEmail">Mulai</a>
            <? } ?>
            </div>
            <div class="col-md-3 mb-5 border-right">
                <p class="h3-responsive">Nomor Telepon</p>
                <a href="#" class="btn btn-sm btn-amber text-white" role="button" data-toggle="modal" data-target="!#">Mulai</a>
            </div>
            <div class="col-md-3 mb-5 border-right">
                <p class="h3-responsive">Informasi Bank</p>
                <a href="#" class="btn btn-sm btn-amber text-white" role="button" data-toggle="modal" data-target="!#">Mulai</a>
            </div>
            <div class="col-md-3 mb-5">
                <p class="h3-responsive">Identitas Diri</p>
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
                    <a href="#!" class="list-group-item list-group-item-action active"><i class="fas fa-user mr-3"></i>Profil</a>
                    <a href="#!" class="list-group-item list-group-item-action"><i class="fas fa-unlock-alt mr-3"></i>Ganti Password</a>
                    <a href="#!" class="list-group-item list-group-item-action"><i class="far fa-credit-alt mr-3"></i>Informasi Bank</a>
                    <a href="#!" class="list-group-item list-group-item-action" data-toggle="modal" data-target="#modalHapus"><i class="far fa-unlock-card mr-3"></i>Nonaktifkan Akun</a>
                  </div>
            </div>
            <div class="col-md-8">
                <div class="card renter-info">
                    <div class="card-header">
                      <h4 class="p2">Detail Profil 
                        <a href="#" class="btn btn-outline-warning waves-effect btn-sm text-white float-right btn-edit" role="button" data-toggle="modal" data-target="#modalEdit">
                            <i class="fas fa-user-edit"></i>
                            Ubah
                        </a>
                    </h4> 
                    </div>
                    <div class="row">
                      <?php foreach ($daftar as $p) : ?>
                        <div class="col-md-4">
                            <div class="card-body text-center">
                                <h5 class="card-title">Foto Profil</h5>
                                <img src="<?php echo base_url('assets/img/foto_profile/').$p['foto']?>" class="ml- rounded-circle p-photo">
                              
                              <p class="card-text mt-3"><?= $p['nama']; ?></p>
                            </div>
                        </div>
                        <div class="col-md-8 mt-5">
                                <?php if($p['verif'] == 0){
                                        echo "<span class='badge badge-danger'>Belum Verifikasi</span>";
                                    } else if ($p['verif'] == 1){
                                        echo "<span class='badge badge-primary'>Sudah Verifikasi</span>";
                                    } else if ($p['verif'] == 2){
                                        echo "<span class='badge badge-warning'>Sedang Ditinjau</span>";
                                    } 
                                ?>
                            <dl class="row mt-3 text-left">
                                <dt class="col-sm-4 grey-text font-weight-light mt-2
                                mb-2">
                                    <i class="fas fa-at mr-2"></i>
                                    E-mail
                                </dt>
                                <dd class="col-sm-8"><?= $p['email']; ?></dd>

                                <dt class="col-sm-4 grey-text font-weight-light mt-2
                                mb-2">
                                    <i class="fas fa-mobile-alt mr-2"></i>
                                     Handphone
                                </dt>
                                <dd class="col-sm-8"><?= $p['no_hp']; ?></dd>

                                <dt class="col-sm-4 grey-text font-weight-light mt-2
                                mb-2">
                                    <i class="fas fa-map-marker-alt mr-2"></i>
                                    Alamat
                                </dt>
                                <dd class="col-sm-8"><?= $p['alamat']; ?></dd>

                            </dl>
                        </div>
                        <? endforeach; ?>
                      </div>
                  </div>
            </div>
        </div>
    </div>

  </main>

<!-- Modal Ubah Profil -->
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-notify modal-warning" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <p class="heading lead">Update Data Diri</p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
      </div>

      <!--Body-->
      <?php foreach ($daftar as $p) : ?>
      <form class="user" method="POST" action="<?= base_url('account/edit'); ?>" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="md-form mb-5">
            <div class="upload_image">
              <img id="blah" src="" alt="..."/>
            </div>
            <div class="image-btn">
              <label for="upload_image">
                <img src="<?= base_url('assets/v.0.1/img/addcam.png')?>" style="width: 50px; height: auto;"/>
              </label>
              <input name="upload_image" id="upload_image" type="file" />
            </div> 
          </div>
          <?= form_error('upload_image', '<small class="text-danger">', '<small>'); ?>

          <div class="md-form mb-5">
            <i class="fas fa-user prefix grey-text"></i>
            <input type="text" name="id_user" value="<?= $p['id_user']; ?>" hidden>
            <input type="text" id="form34" class="form-control validate" name="nama" value="<?= $p['nama']; ?>">
            <label data-error="wrong" data-success="right" for="form34">Nama</label>
          </div>
          <?= form_error('nama', '<small class="text-danger">', '<small>'); ?>

          <div class="md-form mb-5">
            <i class="fas fa-envelope prefix grey-text"></i>
            <input type="email" id="form29" class="form-control validate" name="email" value="<?= $p['email']; ?>">
            <label data-error="wrong" data-success="right" for="form29">Email</label>
          </div>
          <?= form_error('email', '<small class="text-danger">', '<small>'); ?>

          <div class="md-form mb-5">
            <i class="fas fa-mobile-alt prefix grey-text"></i>
            <input type="text" id="form32" class="form-control validate" name="no_hp"
            <?php if($p['no_hp'] == 0): ?>
                              value=""
                          <? else: ?>
                              value="<?= $p['no_hp']; ?>"
                          <? endif; ?>>
            <label data-error="wrong" data-success="right" for="form32">No. Handphone</label>
          </div>
          <?= form_error('no_hp', '<small class="text-danger">', '<small>'); ?>

          <div class="md-form">
            <i class="fas fa-map-marker-alt prefix grey-text"></i>
            <textarea type="text" id="form8" class="md-textarea form-control" rows="4" name="alamat"><?= $p['alamat']; ?></textarea>
            <label data-error="wrong" data-success="right" for="form8">Alamat</label>
          </div>
          <?= form_error('alamat', '<small class="text-danger">', '<small>'); ?>

        </div>

        <!--Footer-->
        <div class="modal-footer d-flex justify-content-center">
          <button type="submit" name="btnSubmit" class="btn btn-unique">Update Profil <i class="fas fa-paper-plane-o ml-1"></i></button>
        </div>
      </form>
    <? endforeach; ?>
    </div>
    <!--/.Content-->
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

<!-- Modal Verifikasi Email -->
<div class="modal fade" id="verifEmail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-notify modal-warning" role="document">
     <!--Content-->
    <form class="user" method="POST" action="<?= base_url("account/verifemail"); ?>">
      <div class="modal-content">
        <!--Header-->
          <div class="modal-header">
            <p class="heading lead">Verifikasi Email</p>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true" class="white-text">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Apakah ini alamat email yang aktif digunakan?
              <input type="email" id="form29" class="form-control validate mt-1" name="email" value="<?= $p['email']; ?>">
          </div>
          <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
              <button type="submit" name="btnSubmit" class="btn btn-primary">Kirim Email</button>
          </div>
      </div>
    </form>
     <!--/.Content-->
   </div>
</div>