<!-- Begin Page Content -->
<main>
    <div class="container z-depth-1-half tabmenu">
    <?php if($this->session->flashdata('error') == TRUE): ?>
        <div class="alert alert-danger alert-dismissible fade show ml-5" role="alert">
            <?= $this->session->flashdata('error'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php endif; ?>
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
                    <th class="th-sm">Foto
                    </th>
                    <th class="th-sm">Nama
                    </th>
                    <th class="th-sm">Biaya
                    </th>
                    <th class="th-sm">Deposit
                    </th>
                    <th class="th-sm">Kategori
                    </th>
                    <th class="th-sm">Merk
                    </th>
                    <th class="th-sm">Kondisi
                    </th>
                    <th class="th-sm">Deskripsi
                    </th>
                    <th class="th-sm">Antar
                    </th>
                    <th class="th-sm">Aksi
                    </th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                foreach ($items as $p) : 
                    switch ($p['antar']) {
                        case '1':
                            $antar = "Ya";
                            break;
                                        
                        default:
                            $antar = "Tidak";
                            break;
                    }
                                    
                    switch ($p['kondisi']) {
                        case '1':
                            $kondisi = "Baru";
                            break;                        
                        case '2':
                            $kondisi = "Sangat Bagus";
                            break;                            
                        case '3':
                            $kondisi = "Bagus";
                            break;                        
                        case '5':
                            $kondisi = "Layak";
                            break;                                                    
                        default:
                            $kondisi = "Rapuh";
                            break;
                    }               
                    ?>
                  <tr>
                    <td>
                      <center>
                        <img src="<?= base_url('assets/img/produk/'), $p['item_img'] ?>" height="50px">
                      </center>
                    </td>
                    <td><?= $p['nama'] ?></td>
                    <td>Rp. <?= number_format($p['harga'],0,",",".");?></td>
                    <td>Rp. <?= number_format($p['deposit'],0,",",".");?></td>
                    <td><?= $p['sub_kat'] ?></td>
                    <td><?= $p['merk'] ?></td>
                    <td><?= $kondisi ?></td>
                    <td><?= $p['deskripsi'] ?></td>
                    <td><?= $antar ?></td>
                    <td>
                    <center>
                      <a href="<?= base_url("products/read/"). $p['id_item']; ?>" class="nav-link btn btn-sm btn-primary text-white" role="button">
                          Ubah
                      </a>
                      <a href="<?= base_url("products/hapus/"). $p['id_item']; ?>" class="nav-link btn btn-sm btn-danger text-white mt-2" role="button">
                          Hapus
                      </a>
                      </center>
                    </td>
                  </tr>
                  <?php endforeach;?>
                </tbody>
                <tfoot>
                  <tr>
                    <th class="th-sm">Foto
                    </th>
                    <th class="th-sm">Nama
                    </th>
                    <th class="th-sm">Biaya
                    </th>
                    <th class="th-sm">Deposit
                    </th>
                    <th class="th-sm">Kategori
                    </th>
                    <th class="th-sm">Merk
                    </th>
                    <th class="th-sm">Kondisi
                    </th>
                    <th class="th-sm">Deskripsi
                    </th>
                    <th class="th-sm">Antar
                    </th>
                    <th class="th-sm">Aksi
                    </th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <div class="tab-pane fade" id="onprocess" role="tabpanel" aria-labelledby="profile-tab">Lorem ipsum dolor sit amet consectetur adipisicing elit. At assumenda totam numquam error. Vero aliquam, illum nisi minima tenetur nemo velit sunt dolor esse aliquid, fugit impedit. Corporis, in aliquam?</div>
          </div>
    </div>

  </main>

  <!-- Modal Pilih Kategori -->
  <div class="modal fade" id="modalConfirmCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-notify modal-warning" role="document">
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
            <a role="button" class="btn btn-indigo" href="<?= base_url('products/add/'), $kategori[0] ?>"><?= $p['kategori'] ?></a>
            
          <? endforeach; ?>
          
          
        </div>

        <!--Footer-->
        <!-- <div class="modal-footer flex-center">
          <a type="button" class="btn btn-sm btn-outline-danger waves-effect" data-dismiss="modal">Batal</a>
          <a href="#" class="btn btn-sm btn-outline-primary">Lanjutkan</a>
        </div> -->
      </div>
      <!--/.Content-->
    </div>
  </div>