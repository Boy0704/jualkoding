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
      <?php
      echo $this->session->flashdata('msg');
      ?>
      <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
        <h5>Tabel Data Member</h5>

        <div style="float:right;margin-right:20px;margin-top:4px;width:90px;">
          <select class="form-control" name="thn" style="height: 30px;" onchange="bln_thn()">
            <?php for ($i=date('Y'); $i >= 2010; $i--) {?>
              <option value="<?php echo $i; ?>" <?php if($i==$thn){echo "selected";} ?>><?php echo $i; ?></option>
            <?php } ?>
          </select>
        </div>
        <div style="float:right;margin-right:5px;margin-top:4px;width:130px;">
          <select class="from-control" name="bln" onchange="bln_thn()">
            <option value="01" <?php if('01'==$bln){echo "selected";} ?>>Januari</option>
            <option value="02" <?php if('02'==$bln){echo "selected";} ?>>Februari</option>
            <option value="03" <?php if('03'==$bln){echo "selected";} ?>>Maret</option>
            <option value="04" <?php if('04'==$bln){echo "selected";} ?>>April</option>
            <option value="05" <?php if('05'==$bln){echo "selected";} ?>>Mei</option>
            <option value="06" <?php if('06'==$bln){echo "selected";} ?>>Juni</option>
            <option value="07" <?php if('07'==$bln){echo "selected";} ?>>Juli</option>
            <option value="08" <?php if('08'==$bln){echo "selected";} ?>>Agustus</option>
            <option value="09" <?php if('09'==$bln){echo "selected";} ?>>September</option>
            <option value="10" <?php if('10'==$bln){echo "selected";} ?>>Oktober</option>
            <option value="11" <?php if('11'==$bln){echo "selected";} ?>>Nopember</option>
            <option value="12" <?php if('12'==$bln){echo "selected";} ?>>Desember</option>
          </select>
        </div>

      </div>
      <div class="widget-content nopadding">
        <table class="table table-bordered data-table">
          <thead>
            <tr>
              <th>No</th>
              <th>Username</th>
              <th>Nama Lengkap</th>
              <th>Email</th>
              <th>No HP</th>
              <th>Tgl Daftar</th>
              <th>Status</th>
              <th>Izin Download</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $i = 1;
            foreach ($member as $baris) {?>
              <tr class="gradeX">
                <td><?php echo $i++; ?></td>
                <td><?php echo $baris->username; ?></td>
                <td><?php echo $baris->nama; ?></td>
                <td><?php echo $baris->email; ?></td>
                <td><?php echo $baris->no_hp; ?></td>
                <td><?php echo $baris->tgl_daftar; ?></td>
                <td style="text-align:center"><?php if ($baris->aktif == "yes") {echo '<span class="label label-success">Aktif</span>';}else{echo '<span class="label label-warning">Belum Aktif</span>';} ?></td>
                <td style="text-align:center"><a href="admin/member/<?php echo $baris->username; ?>" onclick="return confirm('Anda yakin?')"><?php if ($baris->download == "yes") {echo '<span class="label">Batalkan</span>';}else{echo '<span class="label label-inverse">Konfirmasi?</span>';} ?></a></td>
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

<script type="text/javascript">
function bln_thn()
{
  window.location.href = 'data_member/tgl/'+$('[name="bln"]').val()+$('[name="thn"]').val();
}
</script>
