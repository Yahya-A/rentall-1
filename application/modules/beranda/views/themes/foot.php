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
      <!-- MDB eCommerce core JavaScript -->
      <script type="text/javascript" src="<?php echo base_url('assets/v.0.1/js/mdb-ecommerce.min.js')?>"></script>
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
          new WOW().init();
    </script>
  
  </body>
  </html>