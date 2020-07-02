<main>
    <div class="container">
    <div class="container" id="notif">
</div>
    <!-- <?= var_dump($items);?>
    <?= var_dump($id_user);?> -->
        <div class="row">
            <?php foreach($items as $p) :?>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-5">
                        <div class="view overlay zoom zm" style="width: 100%; height: auto; min-height: 350px;">
                        <input type="hidden" class="user_id" value="<?= $id_user?>">
                        <input type="hidden" class="item_id" value="<?= $p['id_item']?>">
                            <img src="<?= base_url('assets/img/produk/').$p['item_img']?>" class="card-img-top mx-auto imgd" alt="Responsive image">
                            <div class="mask flex-center waves-effect waves-light rgba-grey-strong">
                                <p class="white-text"><?= $p['nama'];?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <p class="h5-responsive amber-text"><?= $p['kategori'];?></p>
                        <p class="h1-responsive font-weight-bolder"><?= $p['nama'];?></p>
                        <div class="rent-info">
                            <div class="text-center status">
                                <span class="badge badge-pill badge-primary">0</span><br>
                                <i class="far fa-handshake fa-2x"></i><br>
                                Disewa
                            </div>
                        </div>
                        <hr>
                        <p class="h4-responsive font-weight-bolder amber-text">Spesifikasi</p>
                        <?php $this->load->view('spesifikasi');?>
                    </div>
                </div>
                <hr>
                <p class="h4-responsive font-weight-bolder amber-text">Deskripsi</p>
                <div class="row">
                    <p class="ml-3"><?= $p['deskripsi'];?></p>
                </div>
                <hr>
                <p class="h4-responsive font-weight-bolder amber-text">Ulasan</p>
                <div class="row">
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-cascade wider mb-4 ">
                    <h4 class="card-header amber darken-1 white-text">
                        Informasi Vendor
                        <i class="fas fa-comment-dots white-text float-right"></i>
                    </h4>
                    <div class="card-body card-body-cascade">
                      <div class="row">
                        <div class="col-4">
                        <input type="hidden" class="vendor_id" value="<?= $p['id_vendor']?>">
                          <img src="<?= base_url('assets/img/vendor_logo/').$p['foto']?>" alt="..." class="rounded-circle v-photo">
                        </div>
                        <div class="col-8">
                          <h5><strong><?= $p['nama_vendor']?></strong></h5>
                          <p class="h6-responsive text-justify text-muted"><?= $p['deskripsi_vendor']?></p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card card-cascade wider mb-1 z-depth-0">
            <div class="accordion md-accordion accordion-blocks" id="accordionEx78" role="tablist"
              aria-multiselectable="true">
              <div class="card amber darken-1">

                <div class="card-body" role="tab" id="headingUnfiled">
                  <p class="h6-responsive text-white ml-4">
                    Harga/hari
                    <span class="float-right mr-4"><?= 'Rp. '.number_format($p['harga'],0,",",".");?></span><br>
                    <input type="hidden" id="harga" value="<?= $p['harga'];?>">
                    <span class="hide" id="show_sewa">
                      Lama Sewa
                      <span class="float-right mr-4" id="sewa"></span>
                    </span>
                  </p>
                  <hr>
                  <p class="h6-responsive text-white ml-4 hide" id="show_total">
                    Total
                    <span>
                      <span class="float-right mr-4" id="total"></span>
                    </span>
                  </p>
                </div>
                <div class=" form-card white">
                  <a data-toggle="collapse" data-parent="#accordionEx78" href="#collapseUnfiled" aria-expanded="true"
                    aria-controls="collapseUnfiled">
                    <p class="h5-responsive text-center pt-2 my-auto head-sewa">
                      Mulai Menyewa
                      <i class="fab fa-get-pocket ml-1"></i>
                      <!-- <i class=" fas fa-shipping-fast fa-2x float-right"></i> -->
                    </p>
                    <div class="divider-small mb-3 mx-auto"></div>

                    </span>
                  </a>
                </div>

                <!-- Form Sewa -->
                <div id="collapseUnfiled" class="collapse" role="tabpanel" aria-labelledby="headingUnfiled"
                  data-parent="#accordionEx78">
                  <div class="card-body white text-center">
                    <!-- <div class=" form-row align-items-center ">
                      <div class=" col-auto"> -->
                    <!-- Material input -->
                    <label class="sr-only disabled" for="daterange">Pilih Tanggal</label>
                    <div class="md-form input-group">
                      <input type="text" class="form-control pl-2 ml-2 mr-2 rounded-0" id="daterange"
                        placeholder="Pilih Tanggal" data-range="true" data-multiple-dates-separator=" - "
                        data-language="in" disabled>
                      <!-- <input type="text" class="form-control pl-2 ml-2 mr-2 rounded-0" id="date_arr"
                        placeholder="Pilih Tanggal" data-range="true" data-multiple-dates-separator=" - "
                        data-language="in" data-date-format="dd mm yyyy" disabled>
                      <input type="text" class="form-control pl-2 ml-2 mr-2 rounded-0" id="date_dep"
                        placeholder="Pilih Tanggal" data-range="true" data-multiple-dates-separator=" - "
                        data-language="in" data-date-format="dd mm yyyy" disabled>
                      <input type="text" class="form-control pl-2 ml-2 mr-2 rounded-0" id="date_dif"
                        placeholder="Lama Sewa" disabled> -->
                      <div class="input-group-append">
                        <span class="input-group-text md-addon pickdate" id="pick">
                          <i class="far fa-calendar-plus fa-2x"></i>
                        </span>
                      </div>
                      <input type="hidden" id="total_hrg">
                    </div>
                    <div class="md-form input-group" style="display:none;">
                      <input type="text" class="form-control pl-2 ml-2 mr-2 rounded-0" id="date_arr"
                        placeholder="Pilih Tanggal" data-range="true" data-multiple-dates-separator=" - "
                        data-language="in" data-date-format="DD/MM/yyyy" disabled>
                      <input type="text" class="form-control pl-2 ml-2 mr-2 rounded-0" id="date_dep"
                        placeholder="Pilih Tanggal" data-range="true" data-multiple-dates-separator=" - "
                        data-language="in" data-date-format="dd mm yyyy" disabled>
                    </div>
                    <div class="input-group mb-3">
                    <p class="text-muted ml-3">Jumlah</p>
                    <div class=" def-number-input number-input safari_only mx-auto" id="qty">
                      <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                        class="minus"></button>
                      <input class="quantity" min="1" max="<?= $p['stock']?>" name="quantity" value="1" type="number">
                      <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                        class="plus"></button>
                    </div>
                    </div>
                    <div class="input-group mb-2 hide" id="payment">
                    <select class="custom-select custom-select-sm bayar">
                                    <option selected>Pilih Pembayaran</option>
                                    <option value="1">COD</option>
                                    <option value="2">Transfer</option>
                                  </select>
                    </div>
                    <div class="input-group">
                    <button type="button" class="btn btn-block btn-amber mulai_sewa" data-antar="<?= $p['antar']?>" disabled>Sewa</button>
                    </div>
                    <div class="input-group" style="display:none;">
                      <input type="text" class="form-control pl-2 ml-2 mr-2 rounded-0" id="date_dif"
                        placeholder="Lama Sewa" style="width: 100px" disabled>
                    </div>
                    <!-- </div>
                    </div> -->
                    
                  </div>
                </div>
              </div>
            </div>
            <?endforeach;?>
        </div>
    </div>
</main>