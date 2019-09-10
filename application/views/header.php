<!DOCTYPE html>
<?php
$ceks = $this->session->userdata('un_member');
$url_1 = $this->uri->segment(1);
$url_2 = $this->uri->segment(2);
$url_3 = $this->uri->segment(3);
?>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-146413049-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-146413049-1');
  </script>

   <meta name="description" content="<?php if(!empty($meta_description)){echo $meta_description;}else{echo $this->Mcrud->get_web('meta_description');} ?>, <?php echo $judul; ?>, <?php echo $this->Mcrud->get_web('nama_web'); ?>">
   <meta name="keywords" content="<?php if(!empty($meta_keyword)){echo $meta_keyword;}else{echo $this->Mcrud->get_web('meta_keyword');} ?>, <?php echo $judul; ?>, <?php echo $this->Mcrud->get_web('nama_web'); ?>">
   <meta name="author" content="Admin <?php echo $this->Mcrud->get_web('nama_web'); ?>">
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
   <meta name="google-site-verification" content="cEzuxFqyaRTvnOyWq5sGq_Mm72YNgfmkHkwi6Vw6x2w" />
   <base href="<?php echo base_url();?>"/>
   <title><?php echo $judul; ?></title>
   <link rel="icon" type="image/ico" href="images/<?php echo $web->favicon; ?>"/>
   <!-- Bootstrap core CSS -->
   <link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet">
   <link href="assets/css/style.css" rel="stylesheet">
   <!-- styles needed for carousel slider -->
   <link href="assets/plugins/owl-carousel/owl.carousel.css" rel="stylesheet">
   <link href="assets/plugins/owl-carousel/owl.theme.css" rel="stylesheet">
   <!-- bxSlider CSS file -->
   <link href="assets/plugins/bxslider/jquery.bxslider.css" rel="stylesheet"/>

   <link rel="stylesheet" type="text/css" href="assets/fancybox/jquery.fancybox.css">
   <link rel="stylesheet" href="assets/css/jquery.dataTables.min.css">

    <!-- Just for debugging purposes. -->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

        <!-- include pace script for automatic web page progress bar  -->
        <script>
            paceOptions = {
                elements: true
            };
        </script>
        <script src="assets/js/pace.min.js"></script>
        <script type="text/javascript">
    		function googleTranslateElementInit() {
    			new google.translate.TranslateElement({pageLanguage: 'id', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
    		}
    		</script>
    		<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

</head>
<body>
  <div id="wrapper">
      <div class="header">
      	<nav class="navbar  fixed-top navbar-site navbar-light bg-light navbar-expand-md"
      		 role="navigation">
      		<div class="container">
              <div class="navbar-identity">
          			<a href="" class="navbar-brand logo logo-title">
            			<img src="images/<?php echo $this->Mcrud->get_web('logo'); ?>" alt="" width="50" style="margin-top:-10px;">
            			</span><?php echo $this->Mcrud->nama_app('1'); ?><span><?php echo $this->Mcrud->nama_app('2'); ?> </span>
                </a>
                <button data-target="#menu1" data-toggle="collapse" class="navbar-toggler pull-right" type="button">
			    				<svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 30 30" width="30" height="30" focusable="false"><title>Menu</title><path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-miterlimit="10" d="M4 7h22M4 15h22M4 23h22"/></svg>
			    			</button>
              </div>

      			<div class="navbar-collapse collapse" id="menu1">
              <ul class="nav navbar-nav navbar-left">
      					<li class="flag-menu country-flag tooltipHere nav-item" data-toggle="tooltip"
      						data-placement="bottom" title="Pilih Bahasa">
  								<div id="google_translate_element"></div>
  							</li>
      				</ul>
      				<ul class="nav navbar-nav ml-auto navbar-right">
      					<li class="nav-item">
                  <a href="kategori/p" class="nav-link"><i class="icon-th-thumb"></i> Semua Kategori</a>
      					</li>
                <li class="postadd"></li>
                <?php if (isset($ceks)){
                        $cek_akun = $this->db->get_where('tbl_user', "username='$ceks'")->row();?>
              					<li>
                          <a href="member" class="nav-link" style="color:#222;">
                            <span><?php echo ucwords($cek_akun->nama); ?></span>
                            <i class="icon-user fa"></i>
                          </a>
              					</li>
                        <li class="postadd"></li>
                        <li class="lang-menu nav-item">
              						<a class="btn btn-block btn-border btn-post btn-danger nav-link" href="logout" style="color:#f1f1f1;">
              							Logout
              						</a>
              					</li>
                <?php }else{?>
              					<li class="no-arrow nav-item">
          								<a class="btn btn-block btn-border btn-post btn-secondary nav-link" href="login" style="color:#222;">Login</a>
              					</li>
                        <li class="lang-menu nav-item">
              						<a class="btn btn-block btn-border btn-post btn-danger nav-link" href="registrasi" style="color:#f1f1f1;">
              							Pendaftaran
              						</a>
              					</li>
                <?php } ?>
      				</ul>
      			</div>
      			<!--/.nav-collapse -->
      		</div>
      		<!-- /.container-fluid -->
      	</nav>
        <nav class="navbar-site2">
          <div class="container topnav" id="myTopnav">
            <a<?php if($url_1=='' || $url_1=='web' && $url_2==''){echo ' class="active"';} ?> href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> HOME <span class="sr-only">(current)</span></a>
            <a<?php if($url_1=='download' || $url_1=='d'){echo ' class="active"';} ?> href="download"><i class="fa fa-code"></i> DOWNLOAD SOURCE CODE</a>
            <a<?php if($url_1=='app' || $url_1=='app_d'){echo ' class="active"';} ?> href="app"><i class="fa fa-inbox"></i> APLIKASI</a>
            <a<?php if($url_1=='judul_ta'){echo ' class="active"';} ?> href="judul_ta"><i class="fa fa-desktop"></i> JUDUL TA</a>
            <a<?php if($url_1=='panduan'){echo ' class="active"';} ?> href="panduan"><i class="fa fa-briefcase"></i> PANDUAN</a>
            <a<?php if($url_1=='article' || $url_1=='article_detail'){echo ' class="active"';} ?> href="article"><i class="fa fa-globe"></i> ARTIKEL</a>
            <a<?php if($url_1=='hubungi'){echo ' class="active"';} ?> href="hubungi"><i class="fa fa-envelope"></i> KONTAK</a>
            <!-- <div class="dropdown">
              <button class="dropbtn">Dropdown
                <i class="fa fa-caret-down"></i>
              </button>
              <div class="dropdown-content">
                <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a>
              </div>
            </div> -->
            <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
          </div>
          <?php if (!empty($cek_akun)): ?>
            <?php if ($cek_akun->aktif=='no'): ?>
              <div class="alert alert-danger" style="margin:0px;border-radius:0px;">
                  <strong>Akun Member Belum Aktif!</strong> Silahkan hubungi kami, terimakasih.
              </div>
            <?php endif; ?>
          <?php endif; ?>
        </nav>
        <?php if (!empty($cek_akun)): ?>
          <?php if ($cek_akun->aktif=='no'): ?>
            <div style="padding-bottom:50px;"></div>
          <?php endif; ?>
        <?php endif; ?>
        <script>
        function myFunction() {
          var x = document.getElementById("myTopnav");
          if (x.className === "container topnav") {
            x.className += " responsive";
          } else {
            x.className = "container topnav";
          }
        }
        </script>
      </div>
      <!-- /.header -->

      <?php
      $menu_bc = array('d','download','app','app_d','judul_ta','panduan','article','article_detail','kategori');
      if (in_array($url_1,$menu_bc)): ?>
        <div class="container" style="margin-top:60px;margin-bottom:-20px;">
          <div class="row">
            <div class="col-md-12">
              <nav aria-label="breadcrumb" role="navigation" class="pull-left">
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="icon-home fa"></i></a></li>
                      <?php if(!empty($breadcrumb)){echo $breadcrumb;} ?>
                  </ol>
              </nav>
            </div>
          </div>
        </div>
      <?php endif; ?>
