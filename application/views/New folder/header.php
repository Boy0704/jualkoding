<!DOCTYPE html>
<?php
$ceks = $this->session->userdata('ordodev@2017'); ?>
<html lang="en">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<head>
         <meta name="description" content=" Download source cede php gratis, Download aplikasi berbasis web gratis, Download Aplikasi Script PHP gratis, Download Sistem Pakar gratis, Download Sistem Pendukung Keputusan gratis, Download web Portal Berita gratis ,Download Source code Data Mining,Download Source Code  E-Learning, E-Discussion, Toko Online, Website, Bootstrap, Aplikasi Minimarket, Absensi, Aplikasi Penggajian, Jasa Pembuatan Program Aplikasi PHP">
       <meta name="keywords" content="Download source code php free, download aplikasi berbassi web free, PHP,Download,Program,Script,Aplikasi, Jasa, Skripsi, Website,download code php, script php, belajar php, tutorial php,Download script php, Sistem Pakar, Sistem Pendukung Keputusan, Jasa Website, Bootstrap, Portal Berita, Data Mining, E-Learning, E-Discussion, Toko Online, Minimarket, Absensi, Aplikasi Penggajian, Sistem Informasi Akademik, Jasa Pembuatan Website ">
             <meta name="author" content="Admin Ordodev">


        <base href="<?php echo base_url();?>"/>

        <title><?php echo $judul; ?></title>

        <link rel="icon" type="image/ico" href="images/<?php echo $web->favicon; ?>"/>

        <link href="assets/css/stylesheets.css" rel="stylesheet" type="text/css" />

        <link href="assets/css/sticky-footer-navbar.css" rel="stylesheet">

        <script type='text/javascript' src='assets/js/plugins/jquery/jquery-1.10.2.min.js'></script>
        <script type='text/javascript' src='assets/js/plugins/jquery/jquery-ui-1.10.3.custom.min.js'></script>
        <script type='text/javascript' src='assets/js/plugins/jquery/jquery-migrate-1.2.1.min.js'></script>

        <!-- <script type='text/javascript' src='assets/js/plugins/other/jquery.mousewheel.min.js'></script> -->

        <script type='text/javascript' src='assets/js/plugins/bootstrap/bootstrap.min.js'></script>

        <!-- <script type='text/javascript' src='assets/js/plugins/cookies/jquery.cookies.2.2.0.min.js'></script> -->

        <!-- <script type='text/javascript' src='assets/js/plugins/jflot/jquery.flot.js'></script>
        <script type='text/javascript' src='assets/js/plugins/jflot/jquery.flot.stack.js'></script>
        <script type='text/javascript' src='assets/js/plugins/jflot/jquery.flot.pie.js'></script>
        <script type='text/javascript' src='assets/js/plugins/jflot/jquery.flot.resize.js'></script> -->

        <!-- <script type='text/javascript' src='assets/js/plugins/epiechart/jquery.easy-pie-chart.js'></script>
        <script type='text/javascript' src='assets/js/plugins/sparklines/jquery.sparkline.min.js'></script> -->

        <!-- <script type='text/javascript' src='assets/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js'></script> -->

        <script type='text/javascript' src="assets/js/plugins/uniform/jquery.uniform.min.js"></script>

        <script type='text/javascript' src='assets/js/plugins/datatables/jquery.dataTables.min.js'></script>

        <!-- <script type='text/javascript' src="assets/js/plugins/fullcalendar/fullcalendar.min.js"></script> -->

        <!-- <script type='text/javascript' src='assets/js/plugins/shbrush/XRegExp.js'></script>
        <script type='text/javascript' src='assets/js/plugins/shbrush/shCore.js'></script>
        <script type='text/javascript' src='assets/js/plugins/shbrush/shBrushXml.js'></script>
        <script type='text/javascript' src='assets/js/plugins/shbrush/shBrushJScript.js'></script>
        <script type='text/javascript' src='assets/js/plugins/shbrush/shBrushCss.js'></script>

        <script type='text/javascript' src='assets/js/plugins.js'></script> -->
        <!-- <script type='text/javascript' src='assets/js/charts.js'></script> -->

        <!-- <script type='text/javascript' src='assets/js/actions.js'></script> -->
        <!-- /sliderman.js -->
        <script src="assets/js/jquery.easy-ticker.js"></script>

        <script type="text/javascript">
        $(document).ready( function() {
          $( '#tablex' ).dataTable( {
            "bDestroy": true,
            "aLengthMenu": [[30, 50, 75, -1], [30, 50, 75, "All"]],
            "iDisplayLength": 30
          } );
         } );
        </script>
       <?php
 $this->db->query("update tbl_statistik set view=view+1 where id_statistik='1'");

 ?>
</head>
<body>

  <div class="wrapper">

      <div class="sidebar">

          <div class="top" style="margin-top:10px;margin-left:10px;">
            <img class="img-preloader" src="<?php echo $this->Mcrud->imageBase64FromURL(base_url()."images/ordodev.png"); ?>" data-src="images/ordodev.png" width="80%">
                <br><br>
                <hr style="margin-left:-20px;">
          </div>

          <div class="nContainer">

              <script>
              $(document).ready(function()
              {
                  $('.mod-ticker').easyTicker({
                    direction: 'up',
                          speed: 'slow',
                        interval: 4000,
                        height: 'auto',
                        visible: 1,
                          mousePause: 0
                  });
              });
              </script>

              <div class="panel panel-primary" style="width:220px">
                <div class="panel-heading">
                  <h2 class="panel-title">Informasi</h2>
                </div>



                         <img class="img-preloader" src="<?php echo $this->Mcrud->imageBase64FromURL(base_url()."assets/info.png"); ?>" data-src="assets/info.png" width="100%" height="400px">



              </div>
              <br>

        <div class="clear"></div>

            <?php
            if (!isset($ceks)) { ?>
              <form action="login" method="post">
            <?php
            }?>
                <div class="page-header">
                    <div class="icon">
                        <span class="ico-arrow-right"></span>
                    </div>
                    <h1 style="color:gray;"><?php if (!isset($ceks)) { echo "Login";}else{  echo "Member";}?> <small><?php echo $web->nama_web; ?></small></h1>
                </div>
                <?php
                echo $this->session->flashdata('msg_login');

            if (!isset($ceks)) {
                ?>
                <div style="float: left;">
                  <input type="hidden" name="menu_log" value="nav">

                          <input class="form-control" type="text" name="username" placeholder="Username" required style="background-color:#f1f1f1;"/>

                          <input class="form-control" type="password" name="password" placeholder="Password" required style="background-color:#f1f1f1;"/>
                    <!--
                    <div class="row-form">
                        <div class="col-md-12">
                            <input type="checkbox"/> Keep me signed in
                        </div>
                    </div>-->
                      <div class="row-form">
                          <div class="col-md-12">
                              <a href="lp">Lupa Password?</a>
                              <button type="submit" name="btnlogin" class="btn" style="float:right;">Sign in <span class="icon-arrow-next icon-white"></span></button>
                              <br/>
                              <a href="registrasi">Registrasi di sini</a>
                          </div>
                      </div>
                    <hr>
                    <br><br>
                </div>
              </form>
            <?php
          }else{ ?>

            <ul class="navigation" style="margin-top:0px;margin-bottom:30px;">
                <li class="active"><a href="<?php echo base_url(); ?>" class="blblue">Home</a></li>
                <li><a href="user_profile" class="blyellow">Profile</a></li>
                <li><a href="logout" class="blgreen" onclick="return confirm('Anda Yakin?');">Logout</a></li>
            </ul>

          <?php
          } ?>
              <a class="close">
                  <span class="ico-remove"></span>
              </a>

          </div>


          <div class="widget">

              <!--<div class="panel panel-default">-->
              <!--    <div class="panel-body" style="background-color:#f1f1f1;">-->

<br/>
              <!--    </div>-->
              <!--</div>-->
  <!-- Histats.com  (div with counter) -->
              <hr>

                            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- 300x250 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:250px;height:250px"
     data-ad-client="ca-pub-2787648772467726"
     data-ad-slot="4051199892"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
<br/>



      </div>
        </div>


      <div class="body">

          <ul class="navigation">
              <li>
                  <a href="<?php echo base_url(); ?>" class="button">
                      <div class="icon">
                          <span class="ico-home"></span>
                      </div>
                      <div class="name">HOME</div>
                  </a>
              </li>
              <li>
                  <a href="panduan" class="button yellow">
                      <div class="icon">
                          <span class="ico-book"></span>
                      </div>
                      <div class="name">PANDUAN</div>
                  </a>
              </li>

              <li>
                  <a href="download" class="button red">
                      <div class="icon">
                          <span class="ico-download"></span>
                      </div>
                      <div class="name">SOURCE CODE</div>
                  </a>
              </li>
              <li>
                  <a href="judul_ta" class="button dblue">
                      <div class="icon">
                          <span class="ico-bookmark-3"></span>
                      </div>
                      <div class="name">JUDUL TA</div>
                  </a>
              </li>
              <li>
                  <a href="article" class="button purple">
                      <div class="icon">
                          <span class="ico-list-3"></span>
                      </div>
                      <div class="name">ARTIKEL</div>
                  </a>
              </li>
              <li>
                  <a href="download" class="button black">
                      <div class="icon">
                          <span class="ico-download"></span>
                      </div>
                      <div class="name">APLIAKSI</div>
                  </a>
              </li>
              <li>
                  <a href="hubungi" class="button orange">
                      <div class="icon">
                          <span class="ico-phone-4"></span>
                      </div>
                      <div class="name">KONTAK</div>
                  </a>
              </li>
                <li>
                  <a href="<?php if (isset($ceks)) { echo "user_profile";}else{ echo "registrasi";}?>" class="button green">
                      <div class="icon">
                          <span class="ico-user"></span>
                      </div>
                      <div class="name"><?php if (isset($ceks)) { echo "Profile";}else{ echo "REGISTRASI";}?></div>
                  </a>
              </li>
              <?php
              if (isset($ceks)) { ?>
                <li>
                    <a href="logout" class="button black" style="background-color:#222;" onclick="return confirm('Anda yakin?');">
                        <div class="icon">
                            <span class="ico-off"></span>
                        </div>
                        <div class="name">Logout</div>
                    </a>
                </li>
              <?php
              }else{

?>
<li>
                   <a href="login" class="button #e1e1e1" style="background: black">
                       <div class="icon">
                           <span class="ico-download"></span>
                       </div>
                       <div class="name"> LOGIN</div>
                   </a>
               </li>


<?php                } ?>
              <li>

                  <li class="buttons">
                      <div class="sbutton green navButton">
                          <a href="#">
                            <span class="ico-align-justify"></span>
                          </a>
                      </div>
                  </li>

              </li>
          </ul>

          <?php
          if (isset($ceks)) {
              $cek_down = $this->Mcrud->get_user_by_un($ceks)->row();
              if ($cek_down->download == "no") {
          ?>
                <div class="alert alert-info" style="background-color:red;width: 1000px;">
                      <i class="ico-danger"></i> &nbsp;
                      <strong><h4> Maaf, Untuk sementara belum bisa Download Aplikasi, Karena Akun member Anda belum Di aktifkan, silahkan baca info di sini  <a href="panduan">SINI</a> atau info SMS / Whatsapp : <b>0823 77168 756</b></strong>.</h4>
                </div>
          <?php
              }
          } ?>
