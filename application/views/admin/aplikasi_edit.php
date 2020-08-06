<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="<?php echo base_url() ?>panel_jualkoding" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
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
        <h5>Input Aplikasi</h5>
      </div>
      <div class="widget-content nopadding">
        <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
          <div class="control-group">
            <label class="control-label">Kode APP :</label>
            <div class="controls">
              <input type="text" class="span11" name="kode" placeholder="Kode Aplikasi" maxlength="8" value="<?php echo $app->kode_app; ?>" required readonly/>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Nama APP :</label>
            <div class="controls">
              <input type="text" class="span11" name="nama" placeholder="Nama Aplikasi" value="<?php echo $app->nama_app; ?>" required/>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Kategori :</label>
            <div class="controls">
              <select class="span11" name="id_kat" required>
                <option value="">- Pilih Kategori -</option>
                <?php foreach ($this->Mcrud->get_kat()->result() as $key => $value): ?>
                  <option value="<?php echo $value->id_kat; ?>" <?php if($value->id_kat==$app->id_kat){echo "selected";} ?>><?php echo $value->kat; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="control-group">
              <label class="control-label">Meta Description :</label>
              <div class="controls">
                <textarea class="span11" name="meta_description" rows="6" placeholder="Meta Description ..." required><?php echo $app->meta_description; ?></textarea>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Meta Keyword :</label>
              <div class="controls">
                <textarea class="span11" name="meta_keyword" rows="5" placeholder="Meta Keyword ..." required><?php echo $app->meta_keyword; ?></textarea>
              </div>
            </div>
          <div class="control-group">
            <label class="control-label">Developer :</label>
            <div class="controls">
              <input type="text" class="span11" name="developer" placeholder="Developer" value="<?php echo $app->developer; ?>" required/>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Harga :</label>
            <div class="controls">
              <input type="number" class="span11" name="harga" placeholder="Harga" value="<?php echo $app->harga; ?>" required/>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">URL Download:</label>
            <div class="controls">
              <input type="text" class="span11" name="url_download" placeholder="URL Download..." value="<?php echo $app->url_download; ?>" required/>
              <!--<span class="help-block">URL Article</span>-->
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">URL Demo:</label>
            <div class="controls">
              <input type="text" class="span11" name="url_demo" placeholder="URL Demo..." value="<?php echo $app->url_demo; ?>" required/>
              <!--<span class="help-block">URL Article</span>-->
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Gambar :</label>
            <div class="controls">
              <input type="file" name="gambar" class="span11" placeholder="Gambar"/>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Keterangan :</label>
            <div class="controls">
              <textarea class="textarea_editor span11" name="ket" rows="6" placeholder="Keterangan ..." required><?php echo $app->keterangan; ?></textarea>
            </div>
          </div>
          <div class="form-actions">
            <a href="aplikasi" class="btn btn-default">Kembali</a>
            <button type="submit" name="btnsave" class="btn btn-success" style="float:right;">Update</button>
          </div>
        </form>
      </div>
    </div>

  </div>
</div>

<!--End-Action boxes-->


<!--end-main-container-part-->
<script type="text/javascript" src="assets/tinymce/tinymce.min.js"></script>
    <script type="text/javascript">
     tinymce.init({
          selector: ".textarea_editor",
          plugins: [
               "advlist autolink link image lists charmap print preview hr anchor pagebreak",
               "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
               "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
         ],
         toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
         toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
         image_advtab: true ,
         
         external_filemanager_path:"assets/filemanager/",
         filemanager_title:"Responsive Filemanager" ,
         external_plugins: { "filemanager" : "<?php echo base_url() ?>assets/filemanager/plugin.min.js"}
     });

</script>