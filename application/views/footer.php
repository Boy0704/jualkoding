<?php
$ceks = $this->session->userdata('un_member'); ?>

<?php
$ip      = $_SERVER['REMOTE_ADDR']; // Dapatkan IP user
$tanggal = date("Ymd"); // Dapatkan tanggal sekarang
$waktu   = time(); // Dapatkan nilai waktu

// Cek user yang mengakses berdasarkan IP-nya
$s = $this->db->query("SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal'");
// Kalau belum ada, simpan datanya sebagai user baru
if($s->num_rows() == 0){
	$this->db->query("INSERT INTO statistik(ip, tanggal, hits, online) VALUES('$ip', '$tanggal', '1', '$waktu')");
}
// Kalau sudah ada, update data hits user
else{
	$this->db->query("UPDATE statistik SET hits=hits+1, online='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'");
}

$query1     = $this->db->query("SELECT * FROM statistik WHERE tanggal='$tanggal' GROUP BY ip");
$pengunjung = $query1->num_rows();

$query2        = $this->db->query("SELECT COUNT(hits) as total FROM statistik");
$hasil2        = $query2->row();
$totpengunjung = $hasil2->total;

$query3 = $this->db->query("SELECT SUM(hits) as jumlah FROM statistik WHERE tanggal='$tanggal' GROUP BY tanggal");
$hasil3 = $query3->row();
$hits   = $hasil3->jumlah;

$query4  = $this->db->query("SELECT SUM(hits) as total FROM statistik");
$hasil4  = $query4->row();
$tothits = $hasil4->total;

// Cek berapa pengunjung yang sedang online
$bataswaktu       = time() - 300;
$pengunjungonline = $this->db->query("SELECT * FROM statistik WHERE online > '$bataswaktu'")->num_rows();

// Angka total pengunjung dalam bentuk gambar
$folder = "images/counter"; // nama folder
$ext    = ".png";     // ekstension file gambar

// ubah digit angka menjadi enam digit
$totpengunjunggbr = sprintf("%06d", $totpengunjung);
// ganti angka teks dengan angka gambar
for ($i = 0; $i <= 9; $i++){
 $totpengunjunggbr = str_replace($i, "<img src=\"$folder/$i$ext\" alt=\"$i\">", $totpengunjunggbr);
}
?>

<div class="page-bottom-info">
		<div class="page-bottom-info-inner">

				<div class="page-bottom-info-content text-center">
						<h1>Jika Anda memiliki pertanyaan, komentar atau masalah, silahkan hubungi kami</h1>
						<a class="btn  btn-lg btn-primary-dark" href="tel:<?php echo $this->Mcrud->get_web('no_hp'); ?>">
								<i class="icon-mobile"></i> <span class="hide-xs color50">No. HP/WA:</span> <?php echo $this->Mcrud->get_web('no_hp'); ?> </a>
				</div>

		</div>
</div>

<footer class="main-footer">
  <div class="footer-content">
    <div class="container">
      <div class="row">

        <div class=" col-xl-3  ">
          <div class="footer-col">
            <h4 class="footer-title" style="margin-bottom:-24px;"><?php echo "$totpengunjunggbr"; ?></h4>
						 <hr style="margin-bottom:5px;">
						<?php
						echo "
								<img src=\"$folder/hariini.png\"> Pengunjung hari ini : $pengunjung <br>
								<img src=\"$folder/total.png\"> Total pengunjung    : $totpengunjung <br>

								<img src=\"$folder/hariini.png\"> Hits hari ini  :  $hits <br>
								<img src=\"$folder/total.png\"> Total hits     :  $tothits <br>

								<img src=\"$folder/online.png\"> Pengunjung Online : $pengunjungonline";
						 ?>
          </div>
        </div>

        <div class=" col-xl-3 ">
          <div class="footer-col">
            <h4 class="footer-title" style="margin-bottom:-20px;">Bantuan & Kontak Kami</h4>
						<hr style="margin-bottom:5px;">
            <ul class="list-unstyled footer-nav">
              <li>
                <a href="panduan.html">Panduan</a>
              </li>
							<li>
                <a href="hubungi.html">Kontak</a>
              </li>
            </ul>
          </div>
        </div>

        <div class=" col-xl-3  ">
          <div class="footer-col">
            <h4 class="footer-title" style="margin-bottom:-20px;">Akun</h4>
						<hr style="margin-bottom:5px;">
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
        <div class=" col-xl-3 ">
          <div class="footer-col row">
            <div class="col-sm-12 col-xs-6 col-xxs-12 no-padding-lg">
              <div class="mobile-app-content">
                <h4 class="footer-title" style="margin-bottom:-20px;">Ikuti Kami</h4>
								<hr>
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
            &copy; <?php echo date('Y'); ?> <?php echo $this->Mcrud->nama_app(); ?>. All Rights Reserved.
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
	<script type="text/javascript" src="assets/fancybox/jquery.fancybox.js"></script>
  <script src="assets/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
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

</html>
