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
        <h5>Edit Kategori Aplikasi</h5>
      </div>
      <div class="widget-content nopadding">
        <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
          <div class="control-group">
            <label class="control-label">Nama Kategori :</label>
            <div class="controls">
              <input type="text" class="span11" name="kat" placeholder="Nama Kategori Aplikasi" value="<?php echo $app->kat; ?>" required/>
            </div>
          </div>
          <div class="form-actions">
            <a href="kategori" class="btn btn-default">Kembali</a>
            <button type="submit" name="btnsave" class="btn btn-success" style="float:right;">Update</button>
          </div>
        </form>
      </div>
    </div>

  </div>
</div>

<!--End-Action boxes-->


<!--end-main-container-part-->
