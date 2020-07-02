
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