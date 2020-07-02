<main>
    <div class="container z-depth-1-half tabmenu">
        <h4 class="text-center pt-4"><?= $detail['0']['nama'];?></h4>
        <div class="row">
            <div class="col-md-12">
          
              <!-- Stepers Wrapper -->
              <ul class="stepper stepper-horizontal nav nav-tabs ">
          
                <!-- First Step -->
                <li class="nav-item stepmenu-item">
                  <a class="" id="home-tab" data-toggle="tab" href="#waiting" role="tab" aria-controls="home" aria-selected="true">
                    <span class="circle"><i class="fas fa-dolly"></i></span>
                    <span class="label">Item</span>
                  </a>
                </li>
          
                <!-- Second Step -->
                <li class="nav-item stepmenu-item">
                  <a class="" id="home-tab" data-toggle="tab" href="#onprocess" role="tab" aria-controls="home" aria-selected="true">
                    <span class="circle"><i class="fas fa-tags"></i></span>
                    <span class="label">Detail & Harga</span>
                  </a>
                </li>
          
                <!-- Third Step -->
                <li class="nav-item stepmenu-item">
                  <a id="home-tab" data-toggle="tab" href="#history" role="tab" aria-controls="home" aria-selected="true">
                    <span class="circle"><i class="far fa-file-image"></i></span>
                    <span class="label">Foto</span>
                  </a>
                </li>
          
              </ul>
              <!-- /.Stepers Wrapper -->
          
            </div>
          </div>
          <div class="tab-content" id="myTabContent">
             <!-- panel pertama -->
            <div class="tab-pane fade" id="waiting" role="tabpanel" aria-labelledby="home-tab">
                <form method="POST" action="<?= base_url('products/edit_produk/') . $detail['0']['id_item'] ?>" enctype="multipart/form-data">
                <div class="card" style="box-shadow: none;">
                    <div class="card-body pt-0">
                        <!-- Form -->
                            <!-- Name -->
                            <div class="md-form m-4 mt-5">
                                <input type="text" name="id_kat" value="photography" hidden>
                                <input type="text" id="materialContactFormName" class="form-control" name="nama_produk" value="<?= $detail['0']['nama']; ?>">
                                <label for="materialContactFormName">Nama Item</label>
                            </div>
                            <?= form_error('nama_produk', '<small class="text-danger">', '<small>'); ?>
                
                            <!--Message-->
                            <div class="md-form m-4 mt-5">
                                <textarea id="materialContactFormMessage" class="form-control md-textarea" rows="3" name="deskripsi"><?= $detail['0']['deskripsi']; ?></textarea>
                                <label for="materialContactFormMessage">Deskripsi</label>
                            </div>
                            <?= form_error('deskripsi', '<small class="text-danger">', '<small>'); ?>

                            <div class="row">
                              <div class="col">
                                <div class="md-form m-4 mt-5">
                                  <input type="text" id="materialContactFormName" class="form-control" name="merk" value="<?= $detail['0']['merk']; ?>">
                                  <label for="materialContactFormName">Merk</label>
                                </div>
                                <?= form_error('merk', '<small class="text-danger">', '<small>'); ?>
                              </div>
                              <div class="col">
                                <div class="md-form m-4 mt-5">
                                  <input type="number" id="materialContactFormName" class="form-control" name="stock" value="<?= $detail['0']['stock']; ?>">
                                  <label for="materialContactFormName">Stok Item</label>
                                </div>
                                <?= form_error('stock', '<small class="text-danger">', '<small>'); ?>
                              </div>
                            </div>

                            <div class="md-form mt-3 ml-5">
                              <div class="custom-control custom-switch ml-3 mt-5">
                                <input type="hidden" name="antar" value="0">
                                <input type="checkbox" class="custom-control-input" id="Antar" name="antar" onclick="this.previousSibling.value=1-this.previousSibling.value">
                                <label class="custom-control-label" for="Antar">Bersedia Mengantar</label>
                              </div>
                            </div>
                
                            <!-- Send button -->
                            <a class="btn btn-outline-info btn-rounded z-depth-0 my-4 waves-effect" data-toggle="tab" href="#onprocess">Lanjut</a>
                
                        
                        <!-- Form -->     
                    </div>
                </div>

            </div>
             <!-- panel kedua -->
            <div class="tab-pane fade" id="onprocess" role="tabpanel" aria-labelledby="profile-tab">
                <div class="card" style="box-shadow: none;">
                    <h5 class="card-header info-color white-text text-center py-4">
                        <strong>Detail Item</strong>
                    </h5>
                    <div class="card-body pt-0">
                        <div class="row">
                          <div class="col">
                            <div class="md-form m-4 mt-5">
                              <select class="custom-select custom-select-sm" id="subkat" name="kategori_produk">
                                  <option selected>Pilih Kategori</option>
                                  <?php 
                                    foreach($kategori as $p):
                                        if ($detail['0']['id_kategori'] == $p['id_kategori']){
                                          echo "<option value='".$p['id_kategori']."' selected>".$p['sub_kat']."</option>";
                                        } else {
                                          echo "<option value='".$p['id_kategori']."'>".$p['sub_kat']."</option>";
                                        }
                                    endforeach; 
                                    ?>  
                                </select>
                            </div>
                            <?= form_error('kategori_produk', '<small class="text-danger">', '<small>'); ?>
                          </div>
                          <div class="col">
                            <div class="md-form m-4 mt-5">
                              <select class="custom-select custom-select-sm" id="subkat" name="kondisi">
                                  <option>Kondisi Items</option>
                                  <option value='1' <?php if($detail['0']['kondisi'] == 1) {echo "selected";} ?>>Baru</option>
                                  <option value='2' <?php if($detail['0']['kondisi'] == 2) {echo "selected";} ?>>Sangat Bagus</option>
                                  <option value='3' <?php if($detail['0']['kondisi'] == 3) {echo "selected";} ?>>Bagus</option>
                                  <option value='4' <?php if($detail['0']['kondisi'] == 4) {echo "selected";} ?>>Layak</option>
                                  <option value='5' <?php if($detail['0']['kondisi'] == 5) {echo "selected";} ?>>Rapuh</option>
                              </select>
                            </div>
                            <?= form_error('kondisi', '<small class="text-danger">', '<small>'); ?>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="md-form m-4 mt-5">
                              <input type="text" id="materialContactFormName" class="form-control" name="berat" value="<?= $detail['0']['berat'] ?>">
                              <label for="materialContactFormName">Berat</label>
                            </div>
                            <?= form_error('berat', '<small class="text-danger">', '<small>'); ?>
                          </div>
                          <div class="col">
                            <div class="md-form m-4 mt-5">
                              <input type="text" id="materialContactFormName" class="form-control" name="material" value="<?= $detail['0']['material'] ?>">
                              <label for="materialContactFormName">Material</label>
                            </div>
                            <?= form_error('material', '<small class="text-danger">', '<small>'); ?>
                          </div>
                          <div class="col">
                            <div class="md-form m-4 mt-5">
                                <input type="text" id="materialContactFormName" class="form-control" name="ukuran" value="<?= $detail['0']['ukuran'] ?>">
                                <label for="materialContactFormName">Ukuran</label>
                            </div>
                            <?= form_error('ukuran', '<small class="text-danger">', '<small>'); ?>
                          </div>
                        </div>
                      </div>
                  </div>
                  <div class="card" style="box-shadow: none;">
                    <h5 class="card-header info-color white-text text-center py-4">
                        <strong>Harga Item</strong>
                    </h5>
                    <div class="card-body pt-0">
                      <div class="row">
                        <div class="col">
                          <div class="md-form m-4 mt-5">
                            <input type="text" id="materialContactFormName" class="form-control" name="harga" value="<?= $detail['0']['harga'] ?>">
                            <label for="materialContactFormName">Biaya perhari</label>
                          </div>
                          <?= form_error('harga', '<small class="text-danger">', '<small>'); ?>
                        </div>
                        <div class="col">
                          <div class="md-form m-4 mt-5">
                            <input type="text" id="materialContactFormName" class="form-control" name="deposit" value="<?= $detail['0']['deposit'] ?>">
                            <label for="materialContactFormName">Deposito</label>
                          </div>
                          <?= form_error('deposit', '<small class="text-danger">', '<small>'); ?>
                        </div>
                      </div>

                            
                            <!-- Send button -->
                            <a class="btn btn-outline-info btn-rounded z-depth-0 my-4 waves-effect" data-toggle="tab" href="#waiting">Kembali</a>
                            <a class="btn btn-outline-info btn-rounded z-depth-0 my-4 waves-effect" data-toggle="tab" href="#history">Lanjut</a>
                    </div>
                </div>

            </div>
            <!-- panel ketiga -->
            <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="contact-tab">
                <div class="card" style="box-shadow: none;">
                    <div class="card-body pt-0">
                      <img id="blah" src="<?= base_url('assets/img/produk/'), $detail['0']['foto'] ?>" alt="your image" style="width: 300px; max-height: 500px;"/>
                        <div class="md-form m-4 mt-5">
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" name="upload_image" id="upload_image" aria-describedby="inputGroupFileAddon01">
                              <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                          </div>
                        </div>   
                        <button class="btn btn-outline-info btn-rounded z-depth-0 my-4 waves-effect" type="submit" name="btnSubmit">Simpan</button>
                    </div>
                </div>
            </div>
          </div>
    </div>

  </main>