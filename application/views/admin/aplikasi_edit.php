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
          <div class="control-group after-add">
            <label class="control-label">Gambar Multi :</label>
            <div class="controls">
              <input type="file" name="gambar_multi[]" class="span11" placeholder="Gambar"/>
              <button class="btn btn-success add" type="button"><i class="icon icon-plus"></i></button>
              <hr style="padding:0px;margin:10px;">
              <div class="span12">
              <?php
              $where=array('id_app'=>$app->id_app);
          		$cek_multi = $this->db->get_where("tbl_img_multi",$where);
          		foreach ($cek_multi->result() as $key => $value) { ?>
                  <div class="span1">
                    <img src="images/app_multi/<?php echo $value->img_file; ?>" alt="" width="50">
                    <a href="admin/hapus_app1/<?php echo $value->id_img_multi; ?>" onclick="return confirm('Anda yakin?')">[Hapus]</a>
                  </div>
          		<?php
              }?>
              </div>
            </div>
          </div>
          <div class="copy hide">
            <div class="control-group">
              <div class="controls">
                <input type="file" name="gambar_multi[]" class="span11" placeholder="Gambar"/>
                <button class="btn btn-danger remove" type="button"><i class="icon icon-remove"></i></button>
              </div>
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
