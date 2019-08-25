
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

    <div class="widget-box">
      <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        <h5>Input Aplikasi</h5>
        <a href="kategori" style="float:right" class="btn btn-warning">+ Input Kategori</a>
      </div>
      <div class="widget-content nopadding">
        <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
          <div class="control-group">
            <label class="control-label">Kode APP :</label>
            <div class="controls">
              <input type="text" class="span11" name="kode" placeholder="Kode Aplikasi" value="<?php echo $kode_app; ?>" maxlength="8" required readonly/>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Nama APP :</label>
            <div class="controls">
              <input type="text" class="span11" name="nama" placeholder="Nama Aplikasi" required/>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Kategori :</label>
            <div class="controls">
              <select class="span11" name="id_kat" required>
                <option value="">- Pilih Kategori -</option>
                <?php foreach ($this->Mcrud->get_kat()->result() as $key => $value): ?>
                  <option value="<?php echo $value->id_kat; ?>"><?php echo $value->kat; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="control-group">
              <label class="control-label">Meta Description :</label>
              <div class="controls">
                <textarea class="span11" name="meta_description" rows="6" placeholder="Meta Description ..." required></textarea>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Meta Keyword :</label>
              <div class="controls">
                <textarea class="span11" name="meta_keyword" rows="5" placeholder="Meta Keyword ..." required></textarea>
              </div>
            </div>
          <div class="control-group">
            <label class="control-label">Developer :</label>
            <div class="controls">
              <input type="text" class="span11" name="developer" value="" placeholder="Developer" required/>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Harga :</label>
            <div class="controls">
              <input type="number" class="span11" name="harga" value="0" placeholder="Harga" required/>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">URL Download:</label>
            <div class="controls">
              <input type="text" class="span11" name="url_download" placeholder="URL Download..." required/>
              <!--<span class="help-block">URL Article</span>-->
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">URL Demo:</label>
            <div class="controls">
              <input type="text" class="span11" name="url_demo" placeholder="URL Demo..." required/>
              <!--<span class="help-block">URL Article</span>-->
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Gambar :</label>
            <div class="controls">
              <input type="file" name="gambar" class="span11" placeholder="Gambar" required/>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Keterangan :</label>
            <div class="controls">
              <textarea class="textarea_editor span11" name="ket" rows="6" value="" placeholder="Keterangan ..." required></textarea>
            </div>
          </div>
          <div class="form-actions">
            <button type="submit" name="btnsave" class="btn btn-success" style="float:right;">Save</button>
          </div>
        </form>
      </div>
    </div>
    <?php
    echo $this->session->flashdata('msg');
    ?>
  </div>
</div>


  <div class="container-fluid" id="tabel">
    <div class="widget-box">
      <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
        <h5>Tabel Data Aplikasi</h5>
      </div>
      <div class="widget-content nopadding">
        <table class="table table-bordered data-table">
          <thead>
            <tr>
              <th width="10">No</th>
              <th width="100">Gambar</th>
              <th>Nama Aplikasi</th>

              <th width="150">Tanggal</th>
              <th width="50">View</th>
              <th width="50">Download</th>
              <th width="150">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $i = 1;
            foreach ($app as $baris) {?>
              <tr class="gradeX">
                <td><?php echo $i++; ?></td>
                <td><img src="images/app/<?php echo $baris->img; ?>" alt="<?php echo $baris->img; ?>" width="100"></td>
                <td><?php echo $baris->nama_app; ?></td>

                <td><?php echo $baris->tanggal; ?></td>
                <td style="text-align:center;"><span class="label label-info"><?php echo $baris->view; ?></span></td>
                <td style="text-align:center;"><span class="label label-info"><?php echo $baris->download; ?></span></td>
                <td>
                  <a href="admin/edit_app/<?php echo $baris->id_app; ?>" class="btn btn-success">Edit</a>
                  <a href="admin/hapus_app/<?php echo $baris->id_app; ?>" class="btn btn-danger" onclick="return confirm('Anda Yakin?');">Hapus</a>
                </td>
              </tr>
            <?php
            } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
<!--End-Action boxes-->
</div>


<!--end-main-container-part-->
