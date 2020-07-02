<main>
    <div class="container">
        <?php if($this->session->flashdata('error') == TRUE): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('error'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php endif; ?>
        <?php if($this->session->flashdata('success') == TRUE): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('success'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php endif; ?>
    </div>
    <div class="container z-depth-1-half tabmenu">
        <ul class="nav nav-tabs w-100">
            <li class="nav-item mt-4 text-center tabmenu-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#waiting" role="tab" aria-controls="home" aria-selected="true">Menunggu</a>
            </li>
            <li class="nav-item mt-4 text-center tabmenu-item">
              <a class="nav-link" id="home-tab" data-toggle="tab" href="#onprocess" role="tab" aria-controls="home" aria-selected="true">Siap Sewa</a>
            </li>
            <li class="nav-item mt-4 text-center tabmenu-item">
              <a class="nav-link" id="home-tab" data-toggle="tab" href="#history" role="tab" aria-controls="home" aria-selected="true">Disewa</a>
            </li>
            <li class="nav-item mt-4 text-center tabmenu-item">
              <a class="nav-link" id="home-tab" data-toggle="tab" href="#finish" role="tab" aria-controls="home" aria-selected="true">Kembali</a>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="waiting" role="tabpanel" aria-labelledby="home-tab">
            <section class="mt-3">

            <!-- Grid row -->
            <div class="row">
              <?php foreach( $tunggu as $p) :?>
              <!-- Grid column -->
              <div class="col-md-6 mb-4">

                <!-- Card -->
                <div class="card card-ecommerce">

                  <!-- Grid row -->
                  <div class="row">

                    <!-- Grid column -->
                    <div class="col-12 col-sm-4 col-md-12 col-lg-4 d-flex align-items-center my-auto">

                      <div class="view overlay zoom">
                        <img src="<?= base_url('assets/img/produk/').$p['item_img']?>"
                          class="img-fluid" alt="Sample image">
                        <a>
                          <div class="mask rgba-white-slight"></div>
                        </a>
                      </div>

                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-12 col-sm-8 col-md-12 col-lg-8 pl-sm-0 px-md-3 pl-lg-0">

                      <div class="card z-depth-0">
                        <div class="card-body">
                          <a data-toggle="tooltip" data-html="true"
                            title="Pesanan anda sedang menunggu konfirmasi dari Vendor"><span
                              class="h6-responsive badge badge-pill badge-info float-right p-2 ml-2">Barang dipesan</span></a>
                          <h5 class="card-title mb-1"><strong><a href="" class="dark-grey-text"><?= $p['nama']?></a></strong></h5>
                          <h6 class="mb-1 dark-grey-text"><strong>Rp. <?= number_format($p['harga'],0,",",".");?>/ hari</strong></h6>
                          <table class="text-left mt-4">
                            <tr>
                              <td><span class="text-small">Jumlah Item</span></td>
                              <td><span class="p-2">:</span></td>
                              <td><strong><?= $p['qty'];?></strong></td>
                            </tr>
                            <tr>
                              <td>
                                <span class="text-small">Total Bayar</span>
                              </td>
                              <td><span class="p-2">:</span></td>
                              <td><strong>Rp. <?= number_format($p['total_harga'],0,",",".");?></strong></td>
                            </tr>
                          </table>
                          <a href="<?= base_url('products/detail/').$p['id_item']?>" type="button" class="btn btn-sm btn-outline-info waves-effect">Detail</a>
                          <a href="" type="button" class="btn btn-sm btn-success waves-effect" data-toggle="modal" data-target="#modalConfirmDelete">Konfimasi</a>
                          <div class="card-footer pb-0 bg-white">
                            <div class="row mb-0">
                              <table class="w-100 text-center">
                                <tr>
                                  <td><span class="badge badge-danger mb-2 p-2 dtlsewa">Mulai Sewa</span></td>
                                  <td><span class="badge badge-success mb-2 p-2 dtlsewa">Selesai Sewa</span></td>
                                  <td><span class="badge badge-info mb-2 p-2 dtlsewa">Lama Sewa</span></td>
                                </tr>
                                <tr>
                                  <td><span><strong><?= $p['tgl_sewa'];?></strong></span></td>
                                  <td><span><strong><?= $p['tgl_kembali'];?></strong></span></td>
                                  <td><span><strong><?= $p['durasi_sewa'];?> hari</strong></span></td>
                                </tr>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>
                    <!-- Grid column -->

                  </div>
                  <!-- Grid row -->

                </div>
                <!-- Card -->

              </div>
              <!-- Grid column -->

              <!--Modal: modalConfirmDelete-->
                <div class="modal fade" id="modalConfirmDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-sm modal-notify modal-success" role="document">
                  <!--Content-->
                  <div class="modal-content text-center">
                    <!--Header-->
                    <div class="modal-header d-flex justify-content-center">
                      <p class="heading">Konfirmasi Pemesanan </p>
                    </div>

                    <!--Body-->
                    <div class="modal-body">

                      <i class="fas fa-check fa-4x animated rotateIn"></i>
                      <p>Pastikan barang yang akan disewa dalam kondisi siap sebelum melakukan Konfimasi ini</p>
                    </div>

                    <!--Footer-->
                    <div class="modal-footer flex-center">
                      <a href="<?= base_url('order/Ready/').$p['id_order']?>" class="btn  btn-outline-success">Konfirmasi</a>
                      <a type="button" class="btn  btn-success waves-effect" data-dismiss="modal">No</a>
                    </div>
                  </div>
                  <!--/.Content-->
                </div>
              </div>
              <!--Modal: modalConfirmDelete-->


              <?php endforeach; ?>
            </div>
            <!-- Grid row -->

            </section>
            <!-- Section: Block Content -->
            </div>
            <div class="tab-pane fade" id="onprocess" role="tabpanel" aria-labelledby="profile-tab">
            <section class="mt-3">

            <!-- Grid row -->
            <div class="row">
              <?php foreach( $siap as $p) :?>
              <!-- Grid column -->
              <div class="col-md-6 mb-4">

                <!-- Card -->
                <div class="card card-ecommerce">

                  <!-- Grid row -->
                  <div class="row">

                    <!-- Grid column -->
                    <div class="col-12 col-sm-4 col-md-12 col-lg-4 d-flex align-items-center my-auto">

                      <div class="view overlay zoom">
                        <img src="<?= base_url('assets/img/produk/').$p['item_img']?>"
                          class="img-fluid" alt="Sample image">
                        <a>
                          <div class="mask rgba-white-slight"></div>
                        </a>
                      </div>

                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-12 col-sm-8 col-md-12 col-lg-8 pl-sm-0 px-md-3 pl-lg-0">

                      <div class="card z-depth-0">
                        <div class="card-body">
                          <a data-toggle="tooltip" data-html="true"
                            title="Pesanan anda sedang menunggu konfirmasi dari Vendor"><span
                              class="h6-responsive badge badge-pill badge-success float-right p-2 ml-2">Barang Siap</span></a>
                          <h5 class="card-title mb-1"><strong><a href="" class="dark-grey-text"><?= $p['nama']?></a></strong></h5>
                          <h6 class="mb-1 dark-grey-text"><strong>Rp. <?= number_format($p['harga'],0,",",".");?>/ hari</strong></h6>
                          <table class="text-left mt-4">
                            <tr>
                              <td><span class="text-small">Jumlah Item</span></td>
                              <td><span class="p-2">:</span></td>
                              <td><strong><?= $p['qty'];?></strong></td>
                            </tr>
                            <tr>
                              <td>
                                <span class="text-small">Total Bayar</span>
                              </td>
                              <td><span class="p-2">:</span></td>
                              <td><strong>Rp. <?= number_format($p['total_harga'],0,",",".");?></strong></td>
                            </tr>
                          </table>
                          <!-- <a href="<?= base_url('products/detail/').$p['id_item']?>" type="button" class="btn btn-sm btn-outline-info waves-effect">Detail</a>
                          <a href="" type="button" class="btn btn-sm btn-success waves-effect" data-toggle="modal" data-target="#modalConfirmDelete">Konfimasi</a> -->
                          <div class="card-footer pb-0 bg-white">
                            <div class="row mb-0">
                              <table class="w-100 text-center">
                                <tr>
                                  <td><span class="badge badge-danger mb-2 p-2 dtlsewa">Mulai Sewa</span></td>
                                  <td><span class="badge badge-success mb-2 p-2 dtlsewa">Selesai Sewa</span></td>
                                  <td><span class="badge badge-info mb-2 p-2 dtlsewa">Lama Sewa</span></td>
                                </tr>
                                <tr>
                                  <td><span><strong><?= $p['tgl_sewa'];?></strong></span></td>
                                  <td><span><strong><?= $p['tgl_kembali'];?></strong></span></td>
                                  <td><span><strong><?= $p['durasi_sewa'];?> hari</strong></span></td>
                                </tr>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>
                    <!-- Grid column -->

                  </div>
                  <!-- Grid row -->

                </div>
                <!-- Card -->

              </div>
              <!-- Grid column -->

              <!--Modal: modalConfirmDelete-->
                <div class="modal fade" id="modalConfirmDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-sm modal-notify modal-success" role="document">
                  <!--Content-->
                  <div class="modal-content text-center">
                    <!--Header-->
                    <div class="modal-header d-flex justify-content-center">
                      <p class="heading">Konfirmasi Pemesanan </p>
                    </div>

                    <!--Body-->
                    <div class="modal-body">

                      <i class="fas fa-check fa-4x animated rotateIn"></i>
                      <p>Pastikan barang yang akan disewa dalam kondisi siap sebelum melakukan Konfimasi ini</p>
                    </div>

                    <!--Footer-->
                    <div class="modal-footer flex-center">
                      <a href="<?= base_url('order/Ready/').$p['id_order']?>" class="btn  btn-outline-success">Konfirmasi</a>
                      <a type="button" class="btn  btn-success waves-effect" data-dismiss="modal">No</a>
                    </div>
                  </div>
                  <!--/.Content-->
                </div>
              </div>
              <!--Modal: modalConfirmDelete-->


              <?php endforeach; ?>
            </div>
            <!-- Grid row -->

            </section>
            </div>
            <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="contact-tab">
            <section class="mt-3">

            <!-- Grid row -->
            <div class="row">
              <?php foreach( $sewa as $p) :?>
              <!-- Grid column -->
              <div class="col-md-6 mb-4">

                <!-- Card -->
                <div class="card card-ecommerce">

                  <!-- Grid row -->
                  <div class="row">

                    <!-- Grid column -->
                    <div class="col-12 col-sm-4 col-md-12 col-lg-4 d-flex align-items-center my-auto">

                      <div class="view overlay zoom">
                        <img src="<?= base_url('assets/img/produk/').$p['item_img']?>"
                          class="img-fluid" alt="Sample image">
                        <a>
                          <div class="mask rgba-white-slight"></div>
                        </a>
                      </div>

                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-12 col-sm-8 col-md-12 col-lg-8 pl-sm-0 px-md-3 pl-lg-0">

                      <div class="card z-depth-0">
                        <div class="card-body">
                          <a data-toggle="tooltip" data-html="true"
                            title="Pesanan anda sedang menunggu konfirmasi dari Vendor"><span
                              class="h6-responsive badge badge-pill badge-primary float-right p-2 ml-2">Sedang disewa</span></a>
                          <h5 class="card-title mb-1"><strong><a href="" class="dark-grey-text"><?= $p['nama']?></a></strong></h5>
                          <h6 class="mb-1 dark-grey-text"><strong>Rp. <?= number_format($p['harga'],0,",",".");?>/ hari</strong></h6>
                          <table class="text-left mt-4">
                            <tr>
                              <td><span class="text-small">Jumlah Item</span></td>
                              <td><span class="p-2">:</span></td>
                              <td><strong><?= $p['qty'];?></strong></td>
                            </tr>
                            <tr>
                              <td>
                                <span class="text-small">Total Bayar</span>
                              </td>
                              <td><span class="p-2">:</span></td>
                              <td><strong>Rp. <?= number_format($p['total_harga'],0,",",".");?></strong></td>
                            </tr>
                          </table>
                          <a href="<?= base_url('products/detail/').$p['id_item']?>" type="button" class="btn btn-sm btn-outline-info waves-effect">Detail</a>
                          <a href="" type="button" class="btn btn-sm btn-primary waves-effect" data-toggle="modal" data-target="#modalConfirmReturn">Konfimasi Pengembalian</a>
                          <div class="card-footer pb-0 bg-white">
                            <div class="row mb-0">
                              <table class="w-100 text-center">
                                <tr>
                                  <td><span class="badge badge-danger mb-2 p-2 dtlsewa">Mulai Sewa</span></td>
                                  <td><span class="badge badge-success mb-2 p-2 dtlsewa">Selesai Sewa</span></td>
                                  <td><span class="badge badge-info mb-2 p-2 dtlsewa">Lama Sewa</span></td>
                                </tr>
                                <tr>
                                  <td><span><strong><?= $p['tgl_sewa'];?></strong></span></td>
                                  <td><span><strong><?= $p['tgl_kembali'];?></strong></span></td>
                                  <td><span><strong><?= $p['durasi_sewa'];?> hari</strong></span></td>
                                </tr>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>
                    <!-- Grid column -->

                  </div>
                  <!-- Grid row -->

                </div>
                <!-- Card -->

              </div>
              <!-- Grid column -->

              <!--Modal: modalConfirmDelete-->
                <div class="modal fade" id="modalConfirmReturn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-sm modal-notify modal-primary" role="document">
                  <!--Content-->
                  <div class="modal-content text-center">
                    <!--Header-->
                    <div class="modal-header d-flex justify-content-center">
                      <p class="heading">Konfirmasi Pengembalian Barang </p>
                    </div>

                    <!--Body-->
                    <div class="modal-body">

                      <i class="fas fa-check fa-4x animated rotateIn"></i>
                      <p>Pastikan barang yang disewa sudah dikembalikan sepenuhnya kepada Anda</p>
                    </div>

                    <!--Footer-->
                    <div class="modal-footer flex-center">
                      <a href="<?= base_url('order/Return/').$p['id_order']?>" class="btn  btn-outline-primary">Konfirmasi</a>
                      <a type="button" class="btn  btn-danger waves-effect" data-dismiss="modal">No</a>
                    </div>
                  </div>
                  <!--/.Content-->
                </div>
              </div>
              <!--Modal: modalConfirmDelete-->


              <?php endforeach; ?>
            </div>
            <!-- Grid row -->

            </section>
            <!-- Section: Block Content -->
            </div>
            <div class="tab-pane fade" id="finish" role="tabpanel" aria-labelledby="contact-tab">
            <section class="mt-3">

            <!-- Grid row -->
            <div class="row">
              <?php foreach( $kembali as $p) :?>
              <!-- Grid column -->
              <div class="col-md-6 mb-4">

                <!-- Card -->
                <div class="card card-ecommerce">

                  <!-- Grid row -->
                  <div class="row">

                    <!-- Grid column -->
                    <div class="col-12 col-sm-4 col-md-12 col-lg-4 d-flex align-items-center my-auto">

                      <div class="view overlay zoom">
                        <img src="<?= base_url('assets/img/produk/').$p['item_img']?>"
                          class="img-fluid" alt="Sample image">
                        <a>
                          <div class="mask rgba-white-slight"></div>
                        </a>
                      </div>

                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-12 col-sm-8 col-md-12 col-lg-8 pl-sm-0 px-md-3 pl-lg-0">

                      <div class="card z-depth-0">
                        <div class="card-body">
                          <a data-toggle="tooltip" data-html="true"
                            title="Pesanan anda sedang menunggu konfirmasi dari Vendor"><span
                              class="h6-responsive badge badge-pill badge-success float-right p-2 ml-2">Selesai disewa</span></a>
                          <h5 class="card-title mb-1"><strong><a href="" class="dark-grey-text"><?= $p['nama']?></a></strong></h5>
                          <h6 class="mb-1 dark-grey-text"><strong>Rp. <?= number_format($p['harga'],0,",",".");?>/ hari</strong></h6>
                          <table class="text-left mt-4">
                            <tr>
                              <td><span class="text-small">Jumlah Item</span></td>
                              <td><span class="p-2">:</span></td>
                              <td><strong><?= $p['qty'];?></strong></td>
                            </tr>
                            <tr>
                              <td>
                                <span class="text-small">Total Bayar</span>
                              </td>
                              <td><span class="p-2">:</span></td>
                              <td><strong>Rp. <?= number_format($p['total_harga'],0,",",".");?></strong></td>
                            </tr>
                          </table>
                          <a href="<?= base_url('products/detail/').$p['id_item']?>" type="button" class="btn btn-sm btn-outline-info waves-effect">Detail</a>
                          <div class="card-footer pb-0 bg-white">
                            <div class="row mb-0">
                              <table class="w-100 text-center">
                                <tr>
                                  <td><span class="badge badge-danger mb-2 p-2 dtlsewa">Mulai Sewa</span></td>
                                  <td><span class="badge badge-success mb-2 p-2 dtlsewa">Selesai Sewa</span></td>
                                  <td><span class="badge badge-info mb-2 p-2 dtlsewa">Lama Sewa</span></td>
                                </tr>
                                <tr>
                                  <td><span><strong><?= $p['tgl_sewa'];?></strong></span></td>
                                  <td><span><strong><?= $p['tgl_kembali'];?></strong></span></td>
                                  <td><span><strong><?= $p['durasi_sewa'];?> hari</strong></span></td>
                                </tr>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>
                    <!-- Grid column -->

                  </div>
                  <!-- Grid row -->

                </div>
                <!-- Card -->

              </div>
              <!-- Grid column -->


              <?php endforeach; ?>
            </div>
            <!-- Grid row -->

            </section>
            <!-- Section: Block Content -->
            </div>
          </div>
    </div>

  </main>