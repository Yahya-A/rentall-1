<main>
    <div class="container text-center">
      <div class="row w-75 mx-auto">
        <div class="input-group md-form form-sm form-1 pl-0">
          <!-- <input type="text" name="keyword" class="form-control mt-1 w-50 ml-5" id="keyword"> -->
          <input class="form-control my-0 py-1 amber-border" type="text" placeholder="Cari Barang . ." aria-label="Search" id="keyword" name="keyword" >
          <div class="input-group-append">
          <span class="input-group-text amber white-text" id="basic-text1">
          <input type="button" id="btn-search" class="btn fas fa-search" value="&#xf043; Temukan"></input>
            <!-- <a href="#!"><span class="input-group-text amber white-text" id="basic-text1"></i> </span></a> -->
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
                      <input type="radio" class="form-check-input" id="Kategori" name="groupOfMaterialRadios" value="<?= $p['kategori']?>">
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
          <div class="row"  id="view">
              <?php $this->load->view('indexSearch', array('items'=>$items)); // Load file view.php dan kirim data siswanya ?>
            </div>
            <nav  id="pagination">
              <?= $paging;?>
            </nav>
          </div>
        </div>
        

  </main> 