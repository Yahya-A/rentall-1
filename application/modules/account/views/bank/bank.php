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
                <a href="#" class="btn btn-sm btn-amber text-white" role="button" data-toggle="modal" data-target="#infoBank">Tambah</a>
            </div>
            <div class="col-md-3 mb-5">
                <p class="h3-responsive">Identitas Diri</p>
                <?php if (!$data) { ?>
                  <a href="#" class="btn btn-sm btn-amber text-white" role="button" data-toggle="modal" data-target="#verifIdentitas">Mulai</a> 
                <?php } else { ?>
                  <a href="#" class="btn btn-sm btn-amber text-white" role="button" data-toggle="modal" data-target="#lihatIdentitas">Lihat Identitas</a> 
                <?php } ?>
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
                    <a href="<?= base_url('account')?>" class="list-group-item list-group-item-action"><i class="fas fa-user mr-3"></i>Profil</a>
                    <a href="<?= base_url('account/renter')?>" class="list-group-item list-group-item-action"><i class="fas fa-question-circle mr-3"></i>Ganti Password</a>
                    <a href="<?= base_url('account/bank'); ?>" class="list-group-item list-group-item-action"><i class="far fa-credit-alt mr-3"></i>Informasi Bank</a>
                    <a href="#!" class="list-group-item list-group-item-action" data-toggle="modal" data-target="#modalHapus"><i class="far fa-unlock-card mr-3"></i>Nonaktifkan Akun</a>
                  </div>
            </div>
            <div class="col-md-8">
                <div class="card renter-info">
                    <div class="card-header">
                      <h4 class="p2">Detail Bank 
                    </h4> 
                    </div>
                    <div class="row">
                        <div class="col-10 offset-1">
                            <table class="table table-bordered mt-2" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Bank</th>
                                        <th>Atas Nama</th>
                                        <th>Nomor Rekening</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($bank as $p) : ?>
                                        <tr>
                                            <td><?= $p['bank'] ?></td>
                                            <td><?= $p['an'] ?></td>
                                            <td> <?= $p['rekening']; ?> </td>
                                            <td>
                                                    <a href="#" class="btn btn-outline-danger waves-effect btn-sm text-white float-right btn-edit mx-1" role="button" data-toggle="modal" data-target="#modalHapus<?= $p['id'] ?>">
                                                        <i class="fas fa-trash"></i>
                                                        Hapus
                                                    </a>
                                                    <a href="#" class="btn btn-outline-warning waves-effect btn-sm text-white float-right btn-edit mx-1" role="button" data-toggle="modal" data-target="#modalEdit<?= $p['id'] ?>">
                                                        <i class="fas fa-user-edit"></i>
                                                        Ubah
                                                    </a>
                                            </td>
                                        </tr>

                                        <!-- Modal Ubah Bank -->
                                        <div class="modal fade" id="modalEdit<?= $p['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                        aria-hidden="true">
                                            <div class="modal-dialog modal-notify modal-warning" role="document">
                                                <!--Content-->
                                                <div class="modal-content">
                                                <!--Header-->
                                                <div class="modal-header">
                                                    <p class="heading lead">Update Bank</p>

                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true" class="white-text">&times;</span>
                                                    </button>
                                                </div>
                                                <!--Body-->
                                                <form class="user" method="POST" action="<?= base_url("account/e_bank/" . $p['id']); ?>">
                                                    <div class="modal-body">
                                                        <div class="md-form mb-5">
                                                            <i class="fas fa-user prefix grey-text"></i>
                                                            <input type="text" name="id" value="<?= $p['id']; ?>" hidden>
                                                            <input type="text" name="nama" id="form34" class="form-control validate" placeholder="Bank" value="<?= $p['bank']; ?>">
                                                            <label data-error="wrong" data-success="right" for="form34">Nama</label>
                                                        </div>
                                                        <?= form_error('nama', '<small class="text-danger">', '<small>'); ?>

                                                        <div class="md-form mb-5">
                                                            <i class="fas fa-envelope prefix grey-text"></i>
                                                            <input type="text" name="an" id="form34" class="form-control validate"  placeholder="Atas Nama" value="<?= $p['an']; ?>">
                                                            <label data-error="wrong" data-success="right" for="form29">Atas Nama</label>
                                                        </div>
                                                        <?= form_error('an', '<small class="text-danger">', '<small>'); ?>
                                                        
                                                        <div class="md-form mb-5">
                                                            <i class="fas fa-envelope prefix grey-text"></i>
                                                            <input type="text" name="nomor" id="form34" class="form-control validate"  placeholder="Atas Nama" value="<?= $p['rekening']; ?>">
                                                            <label data-error="wrong" data-success="right" for="form29">Nomor Rekening</label>
                                                        </div>
                                                        <?= form_error('nomor', '<small class="text-danger">', '<small>'); ?>
                                                    </div>

                                                    <!--Footer-->
                                                    <div class="modal-footer d-flex justify-content-center">
                                                        <button type="submit" name="btnSubmit" class="btn btn-unique">Update Informasi Bank <i class="fas fa-paper-plane-o ml-1"></i></button>
                                                    </div>
                                                </form>
                                                </div>
                                                <!--/.Content-->
                                            </div>
                                        </div>

                                        <!-- Modal Hapus Bank -->
                                        <div class="modal fade" id="modalHapus<?= $p['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                        aria-hidden="true">
                                            <div class="modal-dialog modal-notify modal-warning" role="document">
                                                <!--Content-->
                                                <div class="modal-content">
                                                <!--Header-->
                                                <div class="modal-header">
                                                    <p class="heading lead">Hapus Bank</p>

                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true" class="white-text">&times;</span>
                                                    </button>
                                                </div>
                                                <!--Body-->
                                                <form class="user" method="POST" action="<?= base_url("account/e_bank/" . $p['id']); ?>">
                                                    <div class="modal-body">
                                                        <center>
                                                            <h5>Yakin hapus akun bank ini?</h5>
                                                            <h5><?= $p['bank']; ?> <?= $p['rekening']; ?></h5>
                                                            <h5><?= $p['an']; ?></h5>
                                                        </center>
                                                    </div>

                                                    <!--Footer-->
                                                    <div class="modal-footer d-flex justify-content-center">
                                                        <a href="<?= base_url("account/d_bank/" . $p['id']); ?>" class="btn btn-outline-danger waves-effect btn-sm text-black float-right btn-edit mx-1" role="button">
                                                            Hapus
                                                        </a>
                                                    </div>
                                                </form>
                                                </div>
                                                <!--/.Content-->
                                            </div>
                                        </div>
                                    <? endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                      </div>
                  </div>
            </div>
        </div>
    </div>

  </main>

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
              <input type="email" id="form29" class="form-control validate mt-1" name="email" value="<?= $daftar['0']['email']; ?>">
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


<!-- Modal Informasi Bank -->
<div class="modal fade" id="infoBank" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-notify modal-warning" role="document">
     <!--Content-->
    <form class="user" method="POST" action="<?= base_url('account/add_bank'); ?>">
      <div class="modal-content">
        <!--Header-->
          <div class="modal-header">
            <p class="heading lead">Informasi Bank</p>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true" class="white-text">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
                <input type="text" name="nama" class="form-control form-control-user" placeholder="Bank">
                <?= form_error('nama', '<small class="text-danger">', '<small>'); ?>
            </div>
            <div class="form-group">
                <input type="text" name="an" class="form-control form-control-user" placeholder="Atas Nama">
                <?= form_error('an', '<small class="text-danger">', '<small>'); ?>
            </div>
            <div class="form-group">
                <input type="text" name="nomor" class="form-control form-control-user" placeholder="Nomor Rekening">
                <?= form_error('nomor', '<small class="text-danger">', '<small>'); ?>
            </div>
          </div>
          <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
              <button type="submit" name="btnSubmit" class="btn btn-primary">Tambah Akun Bank</button>
          </div>
      </div>
    </form>
     <!--/.Content-->
   </div>
</div>

<!-- Modal Verifikasi Identitas -->
<div class="modal fade" id="verifIdentitas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-notify modal-warning" role="document">
     <!--Content-->
      <div class="modal-content">
        <!--Header-->
          <form class="user" method="POST" action="<?= base_url('account/verif_akun'); ?>" enctype="multipart/form-data">
            <div class="modal-header">
              <p class="heading lead">Verifikasi Email</p>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="white-text">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                  <div class="row">
                      <?php 
                          if ($data != null):
                              foreach ($data as $p) : ?>
                                  <div class="col-sm-5 offset-1">
                                      <div class="form-group">
                                          <input type="text" name="no_identitas" class="form-control form-control-user" placeholder="Nomor Identitas"
                                          <?php if($p['no_identitas'] != null): ?>
                                          value = "<?= $p['no_identitas'] ?>"
                                          <? endif; ?>
                                          >
                                          <input type="text" name="id" id="id" value="<?= $p['id_user']; ?>" hidden>
                                          <?= form_error('no_identitas', '<small class="text-danger">', '<small>'); ?>
                                      </div>
                                      <div class="col-sm-8 mt-3">
                                          <span class="h6">Foto 1</span>
                                          <input type="file" name="upload_image" id="upload_image" >
                                          <?= form_error('upload_image', '<small class="text-danger">', '<small>'); ?>
                                      </div>
                                  </div>
                                  <div class="col-sm-5">
                                      <div class="form-group">
                                          <input type="text" name="nama_identitas" class="form-control form-control-user" placeholder="Nama" 
                                          <?php if($p['nama_identitas'] != null): ?>
                                          value = "<?= $p['nama_identitas'] ?>"
                                          <? endif; ?>
                                          >
                                          <?= form_error('nama_identitas', '<small class="text-danger">', '<small>'); ?>
                                      </div>
                                      <div class="col-sm-8 mt-3">
                                          <span class="h6">Foto 2</span>
                                          <input type="file" name="upload_image2" id="upload_image2" >
                                          <?= form_error('upload_image2', '<small class="text-danger">', '<small>'); ?>
                                      </div>
                                  </div>                    
                              <? endforeach; ?>
                          <? else: ?>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" name="no_identitas" class="form-control form-control-user" placeholder="Nomor Identitas">
                                    <?= form_error('no_identitas', '<small class="text-danger">', '<small>'); ?>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" name="nama_identitas" class="form-control form-control-user" placeholder="Nama" >
                                    <?= form_error('nama_identitas', '<small class="text-danger">', '<small>'); ?>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-5">
                                <h6>Foto Kartu Identitas</h6>
                                  <input name="upload_image" id="upload_image" type="file" />
                                <?= form_error('upload_image', '<small class="text-danger">', '<small>'); ?>
                            </div>       
                            <div class="col-sm-6 mb-5">
                                <h6>Foto selfie Kartu Identitas</h6>
                                  <input type="file" name="upload_image2" id="upload_image2" />
                                <?= form_error('upload_image2', '<small class="text-danger">', '<small>'); ?>
                            </div>
                      <? endif; ?>
                  </div>
            </div>
            <div class="modal-footer">
              <button type="submit" name="btnSubmit" class="btn btn-primary">Verifikasi Identitas</button>
            </div>
          </form>
      </div>
     <!--/.Content-->
   </div>
</div>

<!-- Modal Lihat Identitas -->
<div class="modal fade" id="lihatIdentitas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-notify modal-warning" role="document">
     <!--Content-->
      <div class="modal-content">
        <!--Header-->
          <form class="user" method="POST" action="<?= base_url('account/verif_akun'); ?>" enctype="multipart/form-data">
            <div class="modal-header">
              <p class="heading lead">Verifikasi Email</p>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" class="white-text">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <?php foreach ($data as $p) : ?>
                  <div class="col-sm-6">
                    <h6>Nama : <?= $p['nama_identitas']?></h6>
                  </div>
                  <div class="col-sm-6">
                    <h6>Nomor : <?= $p['no_identitas']?></h6>
                  </div>                 
                  <div class="col-sm-6 mt-2">
                    <h6>Foto Kartu Identitas</h6>
                    <img src="<?php echo base_url('assets/img/verif/').$p['foto1']?>" height="100px">
                  </div>
                  <div class="col-sm-6 mt-2">
                    <h6>Foto Selfie Kartu Identitas</h6>
                    <img src="<?php echo base_url('assets/img/verif/').$p['foto2']?>" height="100px">
                  </div>                  
                <? endforeach; ?>
              </div>
            </div>
            <div class="modal-footer">
              <?php
                $this->db->select('verif');
                $this->db->where('id_user', $data['0']['id_user']);
                $this->db->from('user');
                $row = $this->db->get()->row();
                if ($row->verif != 1) { ?>
                  <a href="#" class="btn btn-sm btn-amber text-white" role="button" data-toggle="modal" data-dismiss="modal" data-target="#verifIdentitas">Ubah Data</a> 
                <? } ?>
            </div>
          </form>
      </div>
     <!--/.Content-->
   </div>
</div>