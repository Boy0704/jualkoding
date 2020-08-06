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
        <h5>Input Article</h5>
      </div>
      <div class="widget-content nopadding">
        <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
          <div class="control-group">
            <label class="control-label">Judul :</label>
            <div class="controls">
              <input type="text" class="span11" name="judul" placeholder="Judul Article" required/>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Gambar :</label>
            <div class="controls">
              <input type="file" name="gambar" class="span11" placeholder="Gambar" required/>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Isi :</label>
            <div class="controls">
              <textarea class="textarea_editor span11" name="isi" rows="6" placeholder="Isi ..."></textarea>
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
        <h5>Tabel Data Article</h5>
      </div>
      <div class="widget-content nopadding">
        <table class="table table-bordered data-table">
          <thead>
            <tr>
              <th width="10">No</th>
              <th width="100">Gambar</th>
              <th>Judul</th>
              <th>Isi</th>
              <th width="150">Tgl Posting</th>
              <th width="50">dibaca</th>
              <th width="150">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $i = 1;
            foreach ($article as $baris) {?>
              <tr class="gradeX">
                <td><?php echo $i; ?></td>
                <td><img src="<?php echo $this->Mcrud->cek_filename("article/",$baris->gambar); ?>" alt="<?php echo $baris->gambar; ?>" width="100"></td>
                <td><?php echo $baris->judul; ?></td>
                <td><?php echo $baris->isi; ?></td>
                <td><?php echo $baris->tgl_article; ?></td>
                <td style="text-align:center;"><span class="label label-info"><?php echo $baris->dibaca; ?></span></td>
                <td>
                  <a href="admin/edit_article/<?php echo $baris->id_article; ?>" class="btn btn-success">Edit</a>
                  <a href="admin/hapus_article/<?php echo $baris->id_article; ?>" class="btn btn-danger" onclick="return confirm('Anda Yakin?');">Hapus</a>
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

<script type="text/javascript" src="assets/tinymce/tinymce.min.js"></script>
    <script type="text/javascript">
     tinymce.init({
          selector: ".textarea_editor",
          plugins: [
               "advlist autolink link image lists charmap print preview hr anchor pagebreak",
               "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking fullscreen",
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