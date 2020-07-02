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
                                <input type="text" name="id_kat" value="otomotif" hidden>
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
                                  <input type="text" id="materialContactFormName" class="form-control" name="merk" value="<?= $detail['0']['merk'] ?>">
                                  <label for="materialContactFormName">Merk</label>
                                </div>
                                <?= form_error('merk', '<small class="text-danger">', '<small>'); ?>
                              </div>
                              <div class="col">
                                <div class="md-form m-4 mt-5">
                                  <input type="number" id="materialContactFormName" class="form-control" name="stock" value="<?= $detail['0']['stock'] ?>">
                                  <label for="materialContactFormName">Stok Item</label>
                                </div>
                                <?= form_error('stock', '<small class="text-danger">', '<small>'); ?>
                              </div>
                              <div class="col">
                                <div class="md-form m-4 mt-5">
                                    <input type="text" id="materialContactFormName" class="form-control" name="warna" value="<?= $detail['0']['warna'] ?>">
                                    <label for="materialContactFormName">Warna</label>
                                </div>
                                <?= form_error('warna', '<small class="text-danger">', '<small>'); ?>
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
                          <div class="col">
                            <div class="md-form m-4 mt-5">
                              <select class="custom-select custom-select-sm" id="subkat" name="bahan_bakar">
                                  <option>Bahan Bakar</option>
                                  <option value='Bensin' <?php if($detail['0']['bahan_bakar'] == 'Bensin') {echo "selected";} ?>>Bensin</option>
                                  <option value='Solar' <?php if($detail['0']['bahan_bakar'] == 'Solar') {echo "selected";} ?>>Solar</option>
                                </select>
                            </div>
                            <?= form_error('bahan_bakar', '<small class="text-danger">', '<small>'); ?>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="md-form m-4 mt-5">
                              <input type="text" id="materialContactFormName" class="form-control" name="mesin" value="<?= $detail['0']['mesin']; ?>">
                              <label for="materialContactFormName">Kapasitas Mesin</label>
                            </div>
                            <?= form_error('mesin', '<small class="text-danger">', '<small>'); ?>
                          </div>
                          <div class="col">
                            <div class="md-form m-4 mt-5">
                              <input type="text" id="materialContactFormName" class="form-control" name="km" value="<?= $detail['0']['km']; ?>">
                              <label for="materialContactFormName">Km</label>
                            </div>
                            <?= form_error('km', '<small class="text-danger">', '<small>'); ?>
                          </div>
                          <div class="col">
                            <div class="md-form m-4 mt-5">
                              <input type="text" id="materialContactFormName" class="form-control" name="tahun_terbit" value="<?= $detail['0']['tahun_terbit']; ?>">
                              <label for="materialContactFormName">Tahun Terbit</label>
                            </div>
                            <?= form_error('tahun_terbit', '<small class="text-danger">', '<small>'); ?>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="md-form m-4 mt-5">
                                <select class="custom-select custom-select-sm" id="subkat" name="kapasitas">
                                    <option>Kapasitas Penumpang</option>
                                    <option value='1' <?php if($detail['0']['kapasitas'] == 1) {echo "selected";} ?>>1</option>
                                    <option value='2' <?php if($detail['0']['kapasitas'] == 2) {echo "selected";} ?>>2</option>
                                    <option value='3' <?php if($detail['0']['kapasitas'] == 3) {echo "selected";} ?>>3</option>
                                    <option value='4' <?php if($detail['0']['kapasitas'] == 4) {echo "selected";} ?>>4</option>
                                    <option value='5' <?php if($detail['0']['kapasitas'] == 5) {echo "selected";} ?>>5</option>
                                    <option value='6' <?php if($detail['0']['kapasitas'] == 6) {echo "selected";} ?>>6</option>
                                    <option value='7' <?php if($detail['0']['kapasitas'] == 7) {echo "selected";} ?>>7</option>
                                    <option value='8' <?php if($detail['0']['kapasitas'] == 8) {echo "selected";} ?>>8</option>
                                  </select>
                              </div>
                              <?= form_error('kapasitas', '<small class="text-danger">', '<small>'); ?>
                          </div>
                          <div class="col">
                            <div class="md-form m-4 mt-5">
                                <select class="custom-select custom-select-sm" id="subkat" name="transmisi">
                                    <option>Transmisi</option>
                                    <option value='Matic'  <?php if($detail['0']['transmisi'] == 'Matic') {echo "selected";} ?>>Matic</option>
                                    <option value='Manual' <?php if($detail['0']['transmisi'] == 'Manual') {echo "selected";} ?>>Manual</option>
                                  </select>
                            </div>
                            <?= form_error('transmisi', '<small class="text-danger">', '<small>'); ?>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="md-form m-4 mt-5">
                                <select class="custom-select custom-select-sm" id="subkat" name="ac">
                                    <option>AC</option>
                                    <option value='1' <?php if($detail['0']['ac'] == '1') {echo "selected";} ?>>Ya</option>
                                    <option value='2' <?php if($detail['0']['ac'] == '2') {echo "selected";} ?>>Tidak</option>
                                  </select>
                            </div>
                            <?= form_error('ac', '<small class="text-danger">', '<small>'); ?>
                          </div>
                          <div class="col">
                            <div class="md-form m-4 mt-5">
                                <select class="custom-select custom-select-sm" id="subkat" name="usb">
                                    <option>USB</option>
                                    <option value='1' <?php if($detail['0']['usb'] == '1') {echo "selected";} ?>>1</option>
                                    <option value='2' <?php if($detail['0']['usb'] == '2') {echo "selected";} ?>>2</option>
                                    <option value='3' <?php if($detail['0']['usb'] == '3') {echo "selected";} ?>>3</option>
                                    <option value='4' <?php if($detail['0']['usb'] == '4') {echo "selected";} ?>>4</option>
                                    <option value='5' <?php if($detail['0']['usb'] == '5') {echo "selected";} ?>>5</option>
                                    <option value='6' <?php if($detail['0']['usb'] == '6') {echo "selected";} ?>>Lebih</option>
                                    <option value='7' <?php if($detail['0']['usb'] == '7') {echo "selected";} ?>>Tidak</option>
                                  </select>
                            </div>
                            <?= form_error('usb', '<small class="text-danger">', '<small>'); ?>
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
        </form>
    </div>

  </main>