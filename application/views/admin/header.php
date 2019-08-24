<?php
$ceks = $this->session->userdata('un_admin');
$menu = strtolower($this->uri->segment(1));
$sub_menu = strtolower($this->uri->segment(2));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $judul ?></title>
    <link rel="icon" type="image/ico" href="images/<?php echo $web->favicon; ?>"/>
    <meta charset="UTF-8" />
    <base href="<?php echo base_url();?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/admin/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/admin/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="assets/admin/css/uniform.css" />
    <link rel="stylesheet" href="assets/admin/css/select2.css" />
    <link rel="stylesheet" href="assets/admin/css/fullcalendar.css" />
    <link rel="stylesheet" href="assets/admin/css/matrix-style.css" />
    <link rel="stylesheet" href="assets/admin/css/matrix-media.css" />
    <link href="assets/admin/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/admin/css/jquery.gritter.css" />
    <link rel="stylesheet" href="assets/admin/css/bootstrap-wysihtml5.css" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="panel_ordodev">Panel Admin</a></h1>
</div>
<!--close-Header-part-->


<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" >
      <a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle">
        <i class="icon icon-user"></i>
        <span class="text">Welcome <?php echo $ceks; ?></span><b class="caret"></b>
      </a>
      <ul class="dropdown-menu">
        <li><a href="profile"><i class="icon-user"></i> My Profile</a></li>
        <li class="divider"></li>
        <li><a href="admin_logout"><i class="icon-key"></i> Log Out</a></li>
      </ul>
    </li>
    <li class=""><a title="" href="<?php echo base_url(); ?>" target="_blank"><i class="icon icon-eye-open"></i> <span class="text">WEB</span></a></li>
    <li class=""><a title="" href="admin_logout"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
  </ul>
</div>
<!--close-top-Header-menu-->

<!--sidebar-menu-->
<div id="sidebar"><a href="panel_jualkoding" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li class="<?php if ($menu == "panel_jualkoding") { echo "active";} ?>"><a href="panel_jualkoding"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li class="<?php if ($menu == "aplikasi" || $sub_menu == "edit_app" || $menu == "kategori") { echo "active";} ?>"> <a href="aplikasi"><i class="icon icon-inbox"></i> <span>Aplikasi</span></a> </li>
    <li class="<?php if ($menu == "data_member") { echo "active";} ?>"> <a href="data_member"><i class="icon icon-group"></i> <span>Data Member</span></a> </li>
    <li class="<?php if ($menu == "transaksi") { echo "active";} ?>"> <a href="transaksi"><i class="icon icon-credit-card"></i> <span>Transaksi</span></a></li>
    <li class="<?php if ($menu == "data_article" or $sub_menu == "edit_article") { echo "active";} ?>"> <a href="data_article"><i class="icon icon-globe"></i> <span>Article</span></a></li>
    <li class="<?php if ($menu == "kontak") { echo "active";} ?>"> <a href="kontak"><i class="icon icon-phone"></i> <span>Kontak</span></a></li>
    <li> <a href="admin_logout"><i class="icon icon-off"></i> <span>Logout</span></a></li>

    <li class="content"> <span>Member</span>
      <!--
      <div class="progress progress-mini progress-danger active progress-striped">
        <div style="width: 50%;" class="bar"></div>
      </div>-->
      <div class="progress progress-mini progress-success active progress-striped">
        <div style="width: 100%;" class="bar"></div>
      </div>
      <span class="percent"></span>
      <div class="stat"><i class="icon icon-group"></i> <?php echo number_format($jml_member, 0,",","."); ?></div>


    </li>

    <li class="content"> <span>Aplikasi</span>
      <!--
      <div class="progress progress-mini active progress-striped">
        <div style="width: 87%;" class="bar"></div>
      </div>-->
      <div class="progress progress-mini active progress-striped">
        <div style="width: 100%;" class="bar"></div>
      </div>
      <span class="percent"></span>
      <div class="stat"><i class="icon icon-inbox"></i> <?php echo number_format($jml_app, 0,",","."); ?></div>

      <div class="progress progress-mini progress-info active progress-striped">
        <div style="width: 100%;" class="bar"></div>
      </div>
      <span class="percent"></span>
      <div class="stat"><i class="icon icon-download-alt"></i> <?php echo number_format($jml_app_view->view, 0,",",".")?></div>

      <div class="progress progress-mini progress-info active progress-striped">
        <div style="width: 100%;" class="bar"></div>
      </div>
      <span class="percent"></span>
      <div class="stat"><i class="icon icon-eye-open"></i> <?php echo number_format($jml_app_download->download, 0,",",".")?></div>
    </li>
  </ul>
</div>
<!--sidebar-menu-->
