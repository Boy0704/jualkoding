
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

    <div class="widget-box">
      <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        <h5>Input Kategori Aplikasi</h5>
      </div>
      <div class="widget-content nopadding">
        <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
          <div class="control-group">
            <label class="control-label">Nama Kategori :</label>
            <div class="controls">
              <input type="text" class="span11" name="kat" placeholder="Nama Kategori Aplikasi" required autofocus/>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Gambar :</label>
            <div class="controls">
              <input type="file" class="span11" name="gambar" placeholder="" required/>
            </div>
          </div>
          <div class="form-actions">
            <a href="aplikasi" class="btn btn-primary"><i class="icon icon-inbox"></i> Aplikasi</a>
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
        <h5>Tabel Data Kategori Aplikasi</h5>
      </div>
      <div class="widget-content nopadding">
        <table class="table table-bordered data-table">
          <thead>
            <tr>
              <th width="10">No</th>
              <th width="100">Gambar</th>
              <th>Nama Kategori Aplikasi</th>
              <th width="150">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $i = 1;
            foreach ($app->result() as $baris) {?>
              <tr class="gradeX">
                <td><?php echo $i++; ?></td>
                <td><img src="<?php echo $this->Mcrud->cek_filename("kategori/",$baris->gambar); ?>" alt="<?php echo $baris->gambar; ?>" width="100"></td>
                <td><?php echo $baris->kat; ?></td>
                <td>
                  <a href="kategori/edit/<?php echo $baris->id_kat; ?>" class="btn btn-success">Edit</a>
                  <a href="kategori/hapus/<?php echo $baris->id_kat; ?>" class="btn btn-danger" onclick="return confirm('Anda Yakin?');">Hapus</a>
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
