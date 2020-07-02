<footer class="page-footer font-small mt-5 wow fadeIn indigo accent-4">

    <div class="container">
      <div class="row foot-info">
        <div class="col-lg-6 p-4 ">
          <i class="fas fa-cubes fa-5x amber-text"></i>
          <p class="h4-responsive">
            <strong class="amber-text">RentAll</strong> ~ <i>Sewa Barang Jadi Gampang</i>
          </p>
          <p class="text-left mt-4">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ullam officiis fugiat fuga repellendus debitis minima natus provident commodi omnis impedit similique eum in ipsa, cupiditate aspernatur? Omnis dolorem corporis similique.
          </p>
        </div>
        <div class="col-lg-3 p-4 text-center">
          <h4 class="foot-title-link"><strong>Tentang</strong></h4>
          <ul class="list-unstyled mt-4">
            <li>
              <a href="#!">Vendor</a>
            </li>
            <li>
              <a href="#!">Renter</a>
            </li>
          </ul>
        </div>
        <div class="col-lg-3 p-4 text-center">
          <h4 class="foot-title-link"><strong>Pusat Bantuan</strong></h4>
          <ul class="list-unstyled text-left foot-link">
            <li>
              <a href="#!">Tentang Kami</a>
            </li>
            <li>
              <a href="#!">FAQ</a>
            </li>
            <li>
              <a href="#!">Syarat & Ketentuan</a>
            </li>
            <li>
              <a href="#!">Kebijakan Privasi</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  
    <hr class="my-4">
  
    <!-- Social icons -->
    <div class="pb-4 text-center">
      <a href="#" target="_blank">
        <i class="fab fa-facebook-f fa-2x mr-3"></i>
      </a>
  
      <a href="# " target="_blank">
        <i class="fab fa-whatsapp fa-2x mr-3"></i>
      </a>
      <a href="# " target="_blank">
        <i class="far fa-envelope fa-2x mr-3"></i>
      </a>
    </div>
    <!-- Social icons -->
  
    <!--Copyright-->
    <div class="footer-copyright py-3 text-center ">
      © 2020 Copyright:
      <a href="https://mdbootstrap.com/bootstrap-tutorial/" target="_blank"> RentAll Team </a>
    </div>
    <!--/.Copyright-->
  </footer>
  <!--/.Footer-->
  
    <!-- jQuery -->
    <script type="text/javascript" src="<?php echo base_url('assets/v.0.1/js/jquery.min.js')?>"></script>
    <!-- <script type="text/javascript" src="<?php echo base_url('assets/jquery_ui/jquery-ui.min.js')?>"></script> -->
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="<?php echo base_url('assets/v.0.1/js/popper.min.js')?>"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="<?php echo base_url('assets/v.0.1/js/bootstrap.min.js')?>"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="<?php echo base_url('assets/v.0.1/js/mdb.min.js')?>"></script>
    <!-- MDBootstrap Datatables  -->
    <script type="text/javascript" src="<?php echo base_url('assets/v.0.1/js/addons/datatables2.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/v.0.1/dist/js/datepicker.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/v.0.1/dist/js/i18n/datepicker.in.js')?>"></script>
      <!-- MDB eCommerce core JavaScript -->
      <script type="text/javascript" src="<?php echo base_url('assets/v.0.1/js/mdb-ecommerce.min.js')?>"></script>
  <script src="<?= base_url('assets/'); ?>js/search.js"></script>
    <!-- Your custom scripts (optional) -->
    <script type="text/javascript">
      function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
      }
      
      $("#upload_image").change(function(){
          readURL(this);
      });

      $(document).ready(function () {
        $('#dt-vertical-scroll').dataTable({
          "paging": false,
          "fnInitComplete": function () {
            var myCustomScrollbar = document.querySelector('#dt-vertical-scroll_wrapper .dataTables_scrollBody');
            var ps = new PerfectScrollbar(myCustomScrollbar);
          },
          "scrollY": 450,
        });
      });
      $(document).ready(function () {
        //Pagination First/Last Numbers
        $('#paginationFirstLast').DataTable({
          "pagingType": "first_last_numbers"
        });
      });

    

    //datepicker script
    let $pick = $('#pick'),
        $input = $('#daterange'),
        dp = $input.datepicker({
          changeMonth: true,
          showEvent: 'none'
        }).data('datepicker');

      $pick.on('click', function () {
        dp.show();
        $input.focus();
      });

      function parseDate(str) {
        var dmy = str.split('/');
        return new Date(dmy[1], dmy[0] - 1, dmy[2]);
      }

      function datediff(first, second) {
        return (second - first) / (1000 * 60 * 60 * 24);
      }

      $(function () {
        var myDatepicker = $('#daterange').datepicker({
          onSelect: function onSelect(selectedDates) {
            console.log(selectedDates);
            
            if (selectedDates !== undefined && selectedDates != '' &&
              selectedDates.indexOf('-') > -1) {
                var dmy = selectedDates.split('-');
                  var dif = datediff(parseDate(dmy[0]), parseDate(
                    dmy[1]));
                  var harga = $("#harga").val();
                  var qty = $(".quantity").val();
                  var total = dif * harga * qty;
                  var	number_string = total.toString(),
                      sisa 	= number_string.length % 3,
                      rupiah 	= number_string.substr(0, sisa),
                      ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
                  if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                  }
                  console.log(total);
              $("#date_arr").val(dmy[0]);
              $("#date_dep").val(dmy[1]);
              $("#date_dif").val(dif);
              $("#total_hrg").val(total);
              $("#show_sewa").removeClass("hide");
              $("#show_total").removeClass("hide");
              $("#payment").removeClass("hide");
              $(".mulai_sewa").prop("disabled", false);
              $("#sewa").text(dif);
              $("#total").text("Rp. "+rupiah);

                if ($(".plus").on("click", function(){
                  var dmy = selectedDates.split('-');
                  var dif = datediff(parseDate(dmy[0]), parseDate(
                    dmy[1]));
                  var harga = $("#harga").val();
                  var qty = $(".quantity").val();
                  var total = dif * harga * qty;
                  var	number_string = total.toString(),
                      sisa 	= number_string.length % 3,
                      rupiah 	= number_string.substr(0, sisa),
                      ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
                  if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                  }
                  console.log(total);
              $("#date_arr").val(dmy[0]);
              $("#date_dep").val(dmy[1]);
              $("#date_dif").val(dif);
              $("#total_hrg").val(total);
              $("#show_sewa").removeClass("hide");
              $("#show_total").removeClass("hide");
              $("#payment").removeClass("hide");
              $(".mulai_sewa").prop("disabled", false);
              $("#sewa").text(dif);
              $("#total").text("Rp. "+rupiah);
                }));
                if ($(".minus").on("click", function(){
                  var dmy = selectedDates.split('-');
              var dif = datediff(parseDate(dmy[0]), parseDate(
                dmy[1]));
              var harga = $("#harga").val();
              var qty = $(".quantity").val();
              var total = dif * harga * qty;
              var	number_string = total.toString(),
                  sisa 	= number_string.length % 3,
                  rupiah 	= number_string.substr(0, sisa),
                  ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
                  if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                  }
                  console.log(total);
              $("#date_arr").val(dmy[0]);
              $("#date_dep").val(dmy[1]);
              $("#date_dif").val(dif);
              $("#total_hrg").val(total);
              $("#show_sewa").removeClass("hide");
              $("#show_total").removeClass("hide");
              $("#sewa").text(dif);
              $("#notif").removeClass("hide");
              $("#total").text("Rp. "+rupiah);
                }));
              // var lama = $("date_dif").val();
              // $("lama").text(lama);
              
            }
          },
          onHide: function (dp, animationCompleted) {
            if (animationCompleted) {
              var lama = $("date_dif").val();
              console.log(lama);
              // 
            }
          }
        });
      });
    //datepicker script

    //Ajax Sewa
      $(document).ready(function(){
        $('.mulai_sewa').click(function(){
          var id_user = $('.user_id').val();
          var id_vendor = $('.vendor_id').val();
          var id_item = $('.item_id').val();
          var antar = $(this).data("antar");
          var tgl_sewa = $("#date_arr").val();
          var tgl_kembali = $("#date_dep").val();
          var qty = $('.quantity').val();
          var durasi = $("#date_dif").val();
          var total_harga = $("#total_hrg").val();
          var bayar = $('.bayar').val();
          console.log(id_item);
          $.ajax({
            url : "<?php echo base_url('order/RentNow');?>",
            method : "POST",
            data : {id_user: id_user, id_vendor: id_vendor, id_item: id_item, antar: antar, tgl_sewa: tgl_sewa, tgl_kembali: tgl_kembali, qty: qty, durasi: durasi, total_harga: total_harga, pembayaran: bayar},
            success: function(response){
              if(response){
                console.log(response);
                $("#notif").html(response);
              }
            }
          });
        });
      });
    //Ajax Sewa
    new WOW().init();
    </script>
  
  </body>
  </html>