<!-- Begin Page Content -->
<main>
    <div class="container z-depth-1-half tabmenu">
        <ul class="nav nav-tabs w-100">
            <li class="nav-item mt-4 text-center tabmenu-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#waiting" role="tab" aria-controls="home" aria-selected="true">Item List</a>
            </li>
            <li class="nav-item mt-4 text-center tabmenu-item">
              <a class="nav-link" id="home-tab" data-toggle="tab" href="#onprocess" role="tab" aria-controls="home" aria-selected="true">Top Item</a>
            </li>
            <li class="nav-item mt-4 ml-5 tabmenu-item-right">
                <a href="#" class="nav-link btn btn-sm btn-primary text-white" role="button" data-toggle="modal" data-target="#modalConfirmCategory">
                    <i class="fas fa-plus-circle mr-2"></i>Tambah Item
                </a>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="waiting" role="tabpanel" aria-labelledby="home-tab">
              <table id="dt-vertical-scroll" class="table" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th class="th-sm">Position
                    </th>
                    <th class="th-sm">Office
                    </th>
                    <th class="th-sm">Age
                    </th>
                    <th class="th-sm">Start date
                    </th>
                    <th class="th-sm">Salary
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011/04/25</td>
                    <td>$320,800</td>
                  </tr>
                  <tr>
                    <td>Accountant</td>
                    <td>Tokyo</td>
                    <td>63</td>
                    <td>2011/07/25</td>
                    <td>$170,750</td>
                  </tr>
                  <tr>
                    <td>Junior Technical Author</td>
                    <td>San Francisco</td>
                    <td>66</td>
                    <td>2009/01/12</td>
                    <td>$86,000</td>
                  </tr>
                  <tr>
                    <td>Senior Javascript Developer</td>
                    <td>Edinburgh</td>
                    <td>22</td>
                    <td>2012/03/29</td>
                    <td>$433,060</td>
                  </tr>
                  <tr>
                    <td>Accountant</td>
                    <td>Tokyo</td>
                    <td>33</td>
                    <td>2008/11/28</td>
                    <td>$162,700</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="tab-pane fade" id="onprocess" role="tabpanel" aria-labelledby="profile-tab">Lorem ipsum dolor sit amet consectetur adipisicing elit. At assumenda totam numquam error. Vero aliquam, illum nisi minima tenetur nemo velit sunt dolor esse aliquid, fugit impedit. Corporis, in aliquam?</div>
          </div>
    </div>

  </main>

  <!-- Modal Pilih Kategori -->
  <div class="modal fade" id="modalConfirmCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm modal-notify modal-warning" role="document">
      <!--Content-->
      <div class="modal-content text-center">
        <!--Header-->
        <div class="modal-header d-flex justify-content-center">
          <p class="heading">Pilih Kategori Item</p>
        </div>

        <!--Body-->
        <div class="modal-body">
          <i class="fas fa-filter fa-3x animated rotateIn"></i>
          <?php foreach ($kategori as $p): 
            $myvalue = $p['kategori'];
            $kategori = explode(' ',trim($myvalue));?>
            <a role="button" class="btn btn-indigo" href="<?= base_url('products/add/'), $kategori[0] ?>"><?= $p['kategori'] ?></button>
            <a class="btn btn-primary m-2" href="<?= base_url('products/add/'), $kategori[0] ?>"><?= $p['kategori'] ?></a>
          <? endforeach; ?>
          
          
        </div>

        <!--Footer-->
        <div class="modal-footer flex-center">
          <a type="button" class="btn btn-sm btn-outline-danger waves-effect" data-dismiss="modal">Batal</a>
          <a href="<?= base_url('account/additem')?>" class="btn btn-sm btn-outline-primary">Lanjutkan</a>
        </div>
      </div>
      <!--/.Content-->
    </div>
  </div>