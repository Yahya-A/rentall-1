<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- <h1 class="h3 mb-2 text-gray-800">Transaksi</h1> -->
          <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Daftar Transaksi</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID Order</th>
                      <th>Penyewa</th>
                      <th>Item</th>
                      <th>QTY</th>
                      <th>Total Harga</th>
                      <th>Vendor</th>
                      <!-- <th>Detail</th> -->
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($order as $p) : ?>
                        <tr>
                            <td><?= $p->id_order; ?></td>
                            <td><?= $p->penyewa; ?></td>
                            <td><?= $p->item; ?></td>
                            <td><?= $p->qty; ?></td>
                            <td>Rp. <?= number_format($p->total_harga,0,",",".");?></td>
                            <td><?= $p->nama_vendor; ?></td>
                        </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

</div>
<!-- /.container-fluid -->