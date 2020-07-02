<div class="row"> 
<?php foreach ($items as $p) :?>
    <?php if($p['kategori']== 'Otomotif') :?>
    <div class="col-md-3 text-center">
        <i class="fas fa-gas-pump fa-2x text-primary"></i>
        <p class="amber-text text-spesifik">
        Bahan Bakar
        </p>
        <p class="font-weight-bolder text-spesifik-info"><?= $p['bahan_bakar']?></p>
    </div>
    <div class="col-md-3 text-center">
        <i class="fas fa-calendar-check fa-2x text-primary"></i>
        <p class="amber-text text-spesifik">
        Tahun Terbit
        </p>
        <p class="font-weight-bolder text-spesifik-info"><?= $p['tahun_terbit']?></p>
    </div>
    <div class="col-md-3 text-center">
        <i class="fas fa-wheelchair fa-2x text-primary"></i>
        <p class="amber-text text-spesifik">
        Kapasitas
        </p>
        <p class="font-weight-bolder text-spesifik-info"><?= $p['kapasitas']?></p>
    </div>
    <div class="col-md-3 text-center">
        <i class="fas fa-palette fa-2x text-primary"></i>
        <p class="amber-text text-spesifik">
        Warna
        </p>
        <p class="font-weight-bolder text-spesifik-info"><?= $p['warna']?></p>
    </div>
    <div class="col-md-3 text-center">
        <i class="fas fa-grip-vertical fa-2x text-primary"></i>
        <p class="amber-text text-spesifik">
        Transmisi
        </p>
        <p class="font-weight-bolder text-spesifik-info"><?= $p['transmisi']?></p>
    </div>
    <div class="col-md-3 text-center">
        <i class="fab fa-whmcs fa-2x text-primary"></i>
        <p class="amber-text text-spesifik">
        Mesin
        </p>
        <p class="font-weight-bolder text-spesifik-info"><?= $p['mesin']?></p>
    </div>
    <div class="col-md-3 text-center">
        <i class="fas fa-road fa-2x text-primary"></i>
        <p class="amber-text text-spesifik">
        KM
        </p>
        <p class="font-weight-bolder text-spesifik-info"><?= $p['km']?></p>
    </div>
    <div class="col-md-3 text-center">
        <i class="fas fa-snowflake fa-2x text-primary"></i>
        <p class="amber-text text-spesifik">
        AC
        </p>
        <p class="font-weight-bolder text-spesifik-info"><?= $p['ac']?></p>
    </div>
    <div class="col-md-3 text-center">
        <i class="fab fa-usb fa-2x text-primary"></i>
        <p class="amber-text text-spesifik">
        USB
        </p>
        <p class="font-weight-bolder text-spesifik-info"><?= $p['usb']?></p>
    </div>
    <div class="col-md-3 text-center">
        <i class="fas fa-shipping-fast fa-2x text-primary"></i>
        <p class="amber-text text-spesifik">
        Pesan Antar
        </p>
        <p class="font-weight-bolder text-spesifik-info">
        <?php if($p['antar']=='1'){
            echo "Ya";
        }elseif($p['antar']=='0'){
            echo "Tidak";
        }else{
            echo "-";
        }
        ?>
        </p>
    </div>
    <? elseif ($p['kategori']== 'Photography & Videography') :?>
        <div class="col-md-3 text-center">
            <i class="fas fa-layer-group fa-2x text-primary"></i>
            <p class="amber-text text-spesifik">
            Material
            </p>
            <p class="font-weight-bolder text-spesifik-info"><?= $p['material']?></p>
        </div>
        <div class="col-md-3 text-center">
            <i class="fas fa-weight fa-2x text-primary"></i>
            <p class="amber-text text-spesifik">
            Berat
            </p>
            <p class="font-weight-bolder text-spesifik-info"><?= $p['berat']?></p>
        </div>
        <div class="col-md-3 text-center">
            <i class="fas fa-ruler-combined fa-2x text-primary"></i>
            <p class="amber-text text-spesifik">
            Ukuran
            </p>
            <p class="font-weight-bolder text-spesifik-info"><?= $p['ukuran']?></p>
        </div>
        <div class="col-md-3 text-center">
            <i class="fas fa-shipping-fast fa-2x text-primary"></i>
            <p class="amber-text text-spesifik">
            Pesan Antar
            </p>
            <p class="font-weight-bolder text-spesifik-info">
            <?php if($p['antar']=='1'){
            echo "Ya";
            }elseif($p['antar']=='0'){
                echo "Tidak";
            }else{
                echo "-";
            }
            ?>
            </p>
        </div>
    <? elseif ($p['kategori']== 'Elektronik & Gadgets') :?>
        <div class="col-md-3 text-center">
            <i class="fab fa-windows fa-2x text-primary"></i>
            <p class="amber-text text-spesifik">
            OS
            </p>
            <p class="font-weight-bolder text-spesifik-info"><?= $p['os']?></p>
        </div>
        <div class="col-md-3 text-center">
            <i class="fas fa-desktop fa-2x text-primary"></i>
            <p class="amber-text text-spesifik">
            Layar
            </p>
            <p class="font-weight-bolder text-spesifik-info"><?= $p['layar']?></p>
        </div>
        <div class="col-md-3 text-center">
            <i class="fas fa-expand fa-2x text-primary"></i>
            <p class="amber-text text-spesifik">
            Resolusi
            </p>
            <p class="font-weight-bolder text-spesifik-info"><?= $p['resolusi']?></p>
        </div>
        <div class="col-md-3 text-center">
            <i class="fas fa-memory fa-2x text-primary"></i>
            <p class="amber-text text-spesifik">
            Memori
            </p>
            <p class="font-weight-bolder text-spesifik-info"><?= $p['memori']?></p>
        </div>
        <div class="col-md-3 text-center">
            <i class="far fa-hdd fa-2x text-primary "></i>
            <p class="amber-text text-spesifik">
            HDD
            </p>
            <p class="font-weight-bolder text-spesifik-info"><?= $p['harddisk']?></p>
        </div>
        <div class="col-md-3 text-center">
            <i class="fas fa-shipping-fast fa-2x text-primary"></i>
            <p class="amber-text text-spesifik">
            Pesan Antar
            </p>
            <p class="font-weight-bolder text-spesifik-info">
            <?php if($p['antar']=='1'){
            echo "Ya";
            }elseif($p['antar']=='0'){
                echo "Tidak";
            }else{
                echo "-";
            }
            ?>
            </p>
        </div>
    <? elseif ($p['kategori']== 'Games & Toys') :?>
        <div class="col-md-3 text-center">
            <i class="fas fa-weight fa-2x text-primary"></i>
            <p class="amber-text text-spesifik">
            Berat
            </p>
            <p class="font-weight-bolder text-spesifik-info"><?= $p['berat']?></p>
        </div>
        <div class="col-md-3 text-center">
            <i class="fas fa-ruler-combined fa-2x text-primary"></i>
            <p class="amber-text text-spesifik">
            Ukuran
            </p>
            <p class="font-weight-bolder text-spesifik-info"><?= $p['ukuran']?></p>
        </div>
        <div class="col-md-3 text-center">
            <i class="fas fa-transgender fa-2x text-primary"></i>
            <p class="amber-text text-spesifik">
            Gender
            </p>
            <p class="font-weight-bolder text-spesifik-info"><?= $p['gender']?></p>
        </div>
        <div class="col-md-3 text-center">
            <i class="fas fa-shipping-fast fa-2x text-primary"></i>
            <p class="amber-text text-spesifik">
            Pesan Antar
            </p>
            <p class="font-weight-bolder text-spesifik-info">
            <?php if($p['antar']=='1'){
            echo "Ya";
            }elseif($p['antar']=='0'){
                echo "Tidak";
            }else{
                echo "-";
            }
            ?>
            </p>
        </div>
    <?endif?>
<?php endforeach ?>
</div>