<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="<?php echo base_url() ?>panel_ordodev" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
<!--End-breadcrumbs-->

<!--Action boxes-->

  <div class="container-fluid">
    <div class="row-fluid">

      <?php
      echo $this->session->flashdata('msg');
      ?>
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Profile</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
            <div class="control-group">
              <label class="control-label">Username :</label>
              <div class="controls">
                <input type="text" class="span11" name="username" placeholder="Nama WEB" value="<?php echo $profile->username; ?>" required/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Password :</label>
              <div class="controls">
                <input type="password" class="span11" name="password" placeholder="Password"/>
                <span class="help-block"><i>*kosongkan password jika tidak diubah*</i></span>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Nama Lengkap :</label>
              <div class="controls">
                <input type="text" class="span11" name="nama" placeholder="Nama WEB" value="<?php echo $profile->nama; ?>" required/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">No HP :</label>
              <div class="controls">
                <input type="text" class="span11" name="no_hp" placeholder="No HP" value="<?php echo $profile->no_hp; ?>" required/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Email :</label>
              <div class="controls">
                <input type="text" class="span11" name="email" placeholder="Email" value="<?php echo $profile->email; ?>" required/>
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
