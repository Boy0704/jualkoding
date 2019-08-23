<?php
$ceks = $this->session->userdata('ordodev@2017'); ?>
<div class="page-bottom-info">
		<div class="page-bottom-info-inner">

				<div class="page-bottom-info-content text-center">
						<h1>Jika Anda memiliki pertanyaan, komentar atau masalah, silahkan hubungi kami</h1>
						<a class="btn  btn-lg btn-primary-dark" href="tel:+000000000">
								<i class="icon-mobile"></i> <span class="hide-xs color50">No. HP/WA:</span> 0812-xxxx-xxxx </a>
				</div>

		</div>
</div>

<footer class="main-footer">
  <div class="footer-content">
    <div class="container">
      <div class="row">

        <div class=" col-xl-1 col-xl-1 col-md-1 col-6  "></div>

        <div class=" col-xl-2 col-xl-2 col-md-2 col-6  ">
          <div class="footer-col">
            <h4 class="footer-title">Tentang Kami</h4>
            <ul class="list-unstyled footer-nav">
              <li><a href="tentang">Tentang Marketplace</a></li>
            </ul>
          </div>
        </div>

        <div class=" col-xl-3 col-xl-3 col-md-3 col-6  ">
          <div class="footer-col">
            <h4 class="footer-title">Bantuan & Kontak Kami</h4>
            <ul class="list-unstyled footer-nav">
              <li>
                <a href="kontak">Kontak Marketplace</a>
              </li>
            </ul>
          </div>
        </div>

        <div class=" col-xl-2 col-xl-2 col-md-2 col-6  ">
          <div class="footer-col">
            <h4 class="footer-title">Akun</h4>
            <ul class="list-unstyled footer-nav">
              <?php if(isset($ceks)){?>
              <li>
                <a href="users"> Panel</a>
              </li>
              <li>
                <a href="data_toko/view"> Toko</a>
              </li>
              <li>
                <a href="logout"> logout</a>
              </li>
            <?php }else{ ?>
              <li>
                <a href="login"> login</a>
              </li>
              <li>
                <a href="pendaftaran"> Pendaftaran</a>
              </li>
            <?php } ?>
            </ul>
          </div>
        </div>
        <div class=" col-xl-4 col-xl-4 col-md-4 col-12">
          <div class="footer-col row">
            <div class="col-sm-12 col-xs-6 col-xxs-12 no-padding-lg">
              <div class="mobile-app-content">
                <h4 class="footer-title">Ikuti Kami</h4>
                <ul class="list-unstyled list-inline footer-nav social-list-footer social-list-color footer-nav-inline">
                  <li><a class="icon-color fb" title="Facebook" data-placement="top" data-toggle="tooltip" href="#"><i class="fa fa-facebook"></i> </a></li>
                  <li><a class="icon-color tw" title="Twitter" data-placement="top" data-toggle="tooltip" href="#"><i class="fa fa-twitter"></i> </a></li>
                  <li><a class="icon-color gp" title="Google+" data-placement="top" data-toggle="tooltip" href="#"><i class="fa fa-google-plus"></i> </a></li>
                  <li><a class="icon-color lin" title="Linkedin" data-placement="top" data-toggle="tooltip" href="#"><i class="fa fa-linkedin"></i> </a></li>
                  <li><a class="icon-color pin" title="Linkedin" data-placement="top" data-toggle="tooltip" href="#"><i class="fa fa-pinterest-p"></i> </a></li>
                </ul>
              </div>

            </div>
          </div>
        </div>
        <div style="clear: both"></div>

        <div class="col-xl-12">
          <div class=" text-center paymanet-method-logo">
            <img src="assets/images/site/payment/master_card.png" alt="img">
            <img alt="img" src="assets/images/site/payment/visa_card.png">
            <img alt="img" src="assets/images/site/payment/paypal.png">
            <img alt="img" src="assets/images/site/payment/american_express_card.png"> <img alt="img" src="assets/images/site/payment/discover_network_card.png">
            <img alt="img" src="assets/images/site/payment/google_wallet.png">
          </div>
          <div class="copy-info text-center">
            &copy; <?php echo date('Y'); ?> Marketplace. All Rights Reserved.
          </div>

        </div>

      </div>
    </div>
  </div>
</footer>

  </div>
  <!-- /.wrapper -->
  <!-- Placed at the end of the document so the pages load faster -->

  <script src="assets/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="assets/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/vendors.min.js"></script>

  <!-- include custom script for site  -->
  <script src="assets/js/script.js"></script>

	<script src="assets/plugins/bxslider/jquery.bxslider.min.js"></script>
	<script>
	    $('.bxslider').bxSlider({
	        pagerCustom: '#bx-pager'
	    });

	</script>

  <!-- include jquery autocomplete plugin  -->
  <script type="text/javascript" src="assets/plugins/autocomplete/jquery.mockjax.js"></script>
  <script type="text/javascript" src="assets/plugins/autocomplete/jquery.autocomplete.js"></script>
  <script type="text/javascript" src="assets/plugins/autocomplete/usastates.js"></script>
  <script type="text/javascript" src="assets/plugins/autocomplete/autocomplete-demo.js"></script>

</html>
