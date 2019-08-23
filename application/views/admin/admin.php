<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="<?php echo base_url() ?>panel_ordodev" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
<!--End-breadcrumbs-->

<!--Action boxes-->
  <div class="container-fluid">
    <div class="quick-actions_homepage">
      <ul class="quick-actions">
        <!--
        <li class="bg_lb"> <a href="panel_ordodev"> <i class="icon-dashboard"></i> <span class="label label-important">7</span> My Dashboard </a> </li>
      -->
        <li class="bg_lg"> <a href="aplikasi"> <i class="icon-inbox"></i><span class="label label-warning"><?php echo $jml_app; ?></span> Aplikasi</a> </li>
        <li class="bg_ly"> <a href="data_member"> <i class="icon-group"></i><span class="label label-success"><?php echo $jml_member; ?></span> Data Member </a> </li>
        <li class="bg_lb"> <a href="transaksi"> <i class="icon-credit-card"></i> Transaksi</a> </li>
        <li class="bg_ls"> <a href="data_article"> <i class="icon-globe"></i> Article</a> </li>
        <li class="bg_lo"> <a href="kontak"> <i class="icon-phone"></i> Kontak</a> </li>
        <li class="bg_lr"> <a href="admin_logout"> <i class="icon-off"></i> Logout</a> </li>

      </ul>
    </div>
  </div>

  <div class="container-fluid">
    <div class="row-fluid">

      <?php
      echo $this->session->flashdata('msg');
      ?>
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Profile WEB</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
            <div class="control-group">
              <label class="control-label">Nama Web :</label>
              <div class="controls">
                <input type="text" class="span11" name="nama" placeholder="Nama WEB" value="<?php echo $web->nama_web; ?>" required/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">No HP :</label>
              <div class="controls">
                <input type="text" class="span11" name="no_hp" placeholder="No HP" value="<?php echo $web->no_hp; ?>" required/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Email :</label>
              <div class="controls">
                <input type="text" class="span11" name="email" placeholder="Email" value="<?php echo $web->email; ?>" required/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">ALamat :</label>
              <div class="controls">
                <textarea class="span11" name="alamat" rows="6" placeholder="ALamat ..." required><?php echo $web->alamat; ?></textarea>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Favicon :</label>
              <div class="controls">
                <input type="file" name="favicon" class="span11" placeholder="Favicon"/>
              </div>
            </div>
            <!--
            <div class="control-group">
              <label class="control-label">Logo :</label>
              <div class="controls">
                <input type="file" name="logo" class="span11" placeholder="Logo"/>
              </div>
            </div>
          -->
            <div class="control-group">
              <label class="control-label">Embed MAP :</label>
              <div class="controls">
                <textarea class="span11" name="map" rows="6" placeholder="MAP ..." required><?php echo $web->map; ?></textarea>
              </div>
            </div>
            <div class="form-actions">
              <button type="submit" name="btnsave" class="btn btn-success" style="float:right;">Update</button>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>

<!--End-Action boxes-->
</div>


<!--end-main-container-part-->
