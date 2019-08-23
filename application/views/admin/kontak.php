<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="<?php echo base_url() ?>panel_ordodev" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
<!--End-breadcrumbs-->

<!--Action boxes-->
  <div class="container-fluid">
    <div class="widget-box">
      <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
        <h5>Tabel Data Kontak</h5>
      </div>
      <div class="widget-content nopadding">
        <table class="table table-bordered data-table">
          <thead>
            <tr>
              <th width="10">No</th>
              <th width="200">Nama</th>
              <th width="200">Email</th>
              <th width="150">No HP</th>
              <th>Pesan</th>
              <th width="150">Tanggal</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $i = 1;
            foreach ($kontak as $baris) {?>
              <tr class="gradeX">
                <td><?php echo $i++; ?></td>
                <td><?php echo $baris->nama; ?></td>
                <td><?php echo $baris->email; ?></td>
                <td><?php echo $baris->no_hp; ?></td>
                <td><?php echo $baris->pesan; ?></td>
                <td><?php echo $baris->tgl_hubungi; ?></td>
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
