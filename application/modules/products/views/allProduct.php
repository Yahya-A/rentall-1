<main>
    <div class="container text-center">
      <div class="row w-75 mx-auto">
        <div class="input-group md-form form-sm form-1 pl-0">
          <input class="form-control my-0 py-1 amber-border" type="text" placeholder="Cari Barang . ." aria-label="Search">
          <div class="input-group-append">
            <a href="#!"><span class="input-group-text amber white-text" id="basic-text1"><i class="fas fa-search text-grey" aria-hidden="true"></i> Temukan</span></a>
          </div>
        </div>
      </div>
      <hr>
      
      <div class="row text-left mb-5 new-item">
        <div class="col-3" >
            <!--Section: Content-->
            <section class="">
        
              <p class="text-center font-weight-bold mt-3">Filter panel</p>
        
              <!--Grid row-->
              <div class="row d-flex justify-content-center">
        
                <!--Grid column-->
                <div class="col-lg-12 col-md-12 col-sm-12 border p-4">
        
                  <!-- Filter panel -->
                  <div class="mb-5">
        
                    <h5 class="font-weight-bold mb-3">Category</h5>
        
                    <div class="divider-small mb-3"></div>
                    
                    <div class="form-check pl-0 mb-2 ml-4">
                      <input type="radio" class="form-check-input" id="materialGroupExample1" name="groupOfMaterialRadios" checked>
                      <label class="form-check-label" for="materialGroupExample1">All</label>
                    </div>
                    <?php foreach ($kategori as $p) :?>
                    <div class="form-check pl-0 mb-2 ml-4">
                      <input type="radio" class="form-check-input" id="Kategori" name="groupOfMaterialRadios"
                      >
                      <label class="form-check-label" for="Kategori"><?= $p['kategori']?></label>
                    </div>
                    <? endforeach;?>
                  </div>
                  <!-- Filter panel -->
        
                </div>
                <!--Grid column-->
        
              </div>
              <!--Grid row-->
        
        
            </section>
            <!--Section: Content-->
        </div>
        <div class="col-9">
          <div class="row">
          <?php foreach ($items as $p) :?>
            <div class="col-lg-4 mt-4">
              <div class="card">
                  <div class="view overlay zoom">
                    <img src="<?= base_url('assets/img/produk/').$p['item_img']?>" alt="Item Image" class="card-img-top mx-auto">
                    <div class="card-body">
                      <p class="grey-text"><small><?= $p['kategori'];?></small></p>
                      <h5 class="card-title text-wrap"><strong><?= $p['nama'];?></strong></h5>
                      <p class="text-primary font-weight-semilight primary-lighter-hover">Rp. <?= number_format($p['harga'],0,",",".");?>/hari</p>
                    </div>
                    <a href="<?= base_url('products/detail/').$p['id_item']?>">
                      <div class="mask rgba-white-slight"></div>
                    </a>
                  </div>
                </div>
              </div>
            <? endforeach;?>
            </div>
            <nav>
              <?= $paging;?>
              <!-- <ul class="pagination pg-blue justify-content-center mt-5">
                <li class="page-item">
                  <a class="page-link" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                  </a>
                </li>
                <li class="page-item active"><a class="page-link">1</a></li>
                <li class="page-item"><a class="page-link">2</a></li>
                <li class="page-item"><a class="page-link">3</a></li>
                <li class="page-item"><a class="page-link">4</a></li>
                <li class="page-item"><a class="page-link">5</a></li>
                <li class="page-item">
                  <a class="page-link" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                  </a>
                </li>
              </ul> -->
            </nav>
          </div>
        </div>
        

  </main> 