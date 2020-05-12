<main>
    <div class="container z-depth-1-half tabmenu">
        <h4 class="text-center">Tambah Item</h4>
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
                    <span class="label">Alamat & Harga</span>
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

            <div class="tab-pane fade" id="waiting" role="tabpanel" aria-labelledby="home-tab">

                <div class="card" style="box-shadow: none;">
                    <!-- <h5 class="card-header info-color white-text text-center py-4">
                        <strong>Detail Barang</strong>
                    </h5> -->
                    <!--Card content-->
                    <div class="card-body pt-0">
                        <!-- Form -->
                        
                            <!-- Name -->
                            <div class="md-form m-4 mt-5">
                                <input type="text" id="materialContactFormName" class="form-control">
                                <label for="materialContactFormName">Nama Item</label>
                            </div>
                
                            <!--Message-->
                            <div class="md-form m-4 mt-5">
                                <textarea id="materialContactFormMessage" class="form-control md-textarea" rows="3"></textarea>
                                <label for="materialContactFormMessage">Deskripsi</label>
                            </div>

                            <div class="md-form m-4 mt-5">
                              <input type="text" id="materialContactFormName" class="form-control">
                              <label for="materialContactFormName">Merk</label>
                            </div>

                            <div class="md-form m-4 mt-5">
                                <input type="number" id="materialContactFormName" class="form-control">
                                <label for="materialContactFormName">Jumlah Item Tersedia</label>
                            </div>

                            <div class="md-form mt-3 ml-5">
                              <div class="custom-control custom-switch ml-3 mt-5">
                                <input type="checkbox" class="custom-control-input" id="customSwitches">
                                <label class="custom-control-label" for="customSwitches">Bersedia Mengantar</label>
                              </div>
                            </div>
                
                            <!-- Send button -->
                            <a class="btn btn-outline-info btn-rounded z-depth-0 my-4 waves-effect" data-toggle="tab" href="#onprocess">Lanjut</a>
                
                        
                        <!-- Form -->     
                    </div>
                </div>

            </div>
            <div class="tab-pane fade" id="onprocess" role="tabpanel" aria-labelledby="profile-tab">
                <div class="card" style="box-shadow: none;">
                    <!-- <h5 class="card-header info-color white-text text-center py-4">
                        <strong>Detail Barang</strong>
                    </h5> -->
                    <!--Card content-->
                    <div class="card-body pt-0">
                        <!-- Form -->
                            <div class="md-form m-4 mt-5">
                                <textarea id="materialContactFormMessage" class="form-control md-textarea" rows="3"></textarea>
                                <label for="materialContactFormMessage">Detail Alamat</label>
                            </div>

                            <div class="md-form m-4 mt-5">
                                <select class="custom-select custom-select-sm">
                                    <option selected>Pilih Kota</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                  </select>
                            </div>

                            <div class="md-form m-4 mt-5">
                                <input type="text" id="materialContactFormName" class="form-control">
                                <label for="materialContactFormName">Harga/hari</label>
                            </div>

                            <div class="md-form mt-3 ml-5">
                              <div class="custom-control custom-switch ml-3 mt-5">
                                <input type="checkbox" class="custom-control-input" id="depositToggle" checked>
                                <label class="custom-control-label" for="customSwitches">Deposito</label>
                              </div>
                            </div>

                            <div class="md-form m-4 mt-5">
                              <input type="text" id="materialContactFormName" class="form-control" disabled>
                              <label for="materialContactFormName">Despacito</label>
                            </div>
                            <!-- Send button -->
                            <a class="btn btn-outline-info btn-rounded z-depth-0 my-4 waves-effect" data-toggle="tab" href="#waiting">Kembali</a>
                            <a class="btn btn-outline-info btn-rounded z-depth-0 my-4 waves-effect" data-toggle="tab" href="#history">Lanjut</a>
                            <!-- <a class="btn btn-outline-info btn-rounded z-depth-0 my-4 waves-effect" data-toggle="tab" href="#onprocess">Lanjut</a> -->
                
                        
                        <!-- Form -->     
                    </div>
                </div>

            </div>
            <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="contact-tab">
                <div class="card" style="box-shadow: none;">
                    <div class="card-body pt-0">
                      <img id="blah" src="#" alt="your image" style="width: 300px; max-height: 500px;"/>
                        <div class="md-form m-4 mt-5">
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="imgInp"
                                aria-describedby="inputGroupFileAddon01">
                              <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                          </div>
                        </div>   
                        <a class="btn btn-outline-info btn-rounded z-depth-0 my-4 waves-effect" href="#!">Simpan</a>
                    </div>
                </div>
            </div>
          </div>
    </div>

  </main>