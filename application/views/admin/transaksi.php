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
        <h5>Input Transaksi</h5>
      </div>
      <div class="widget-content nopadding">
        <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
          <div class="control-group">
            <label class="control-label">Member :</label>
            <div class="controls">
              <select name="id_user" required>
                <option value="">-- Pilih --</option>
                <?php foreach ($user as $baris): ?>
                  <option value="<?php echo $baris->id_user; ?>"><?php echo ucwords($baris->nama); ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">BANK :</label>
            <div class="controls">
              <input type="text" class="span11" name="bank" placeholder="BANK" maxlength="50" required/>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Jumlah :</label>
            <div class="controls">
              <input type="number" name="jumlah" class="span11" placeholder="Jumlah" maxlength="10" required/>
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
        <h5>Tabel Data Transaksi</h5>

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
              <th width="10">No</th>
              <th width="100">Member</th>
              <th>BANK</th>
              <th>Jumlah</th>
              <th width="150">Tgl Transaksi</th>
              <th width="10%">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $i = 1;
            foreach ($transaksi as $baris) {?>
              <tr class="gradeX">
                <td><?php echo $i; ?></td>
                <td><?php echo ucwords($baris->nama); ?></td>
                <td><?php echo $baris->bank; ?></td>
                <td><?php echo $baris->jumlah; ?></td>
                <td><?php echo $baris->tgl_transaksi; ?></td>
                <td style="text-align:center">
                  <a href="admin/hapus_transaksi/<?php echo $baris->id_transaksi; ?>" class="btn btn-danger" onclick="return confirm('Anda Yakin?');">Hapus</a>
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
<script type="text/javascript">
function bln_thn()
{
  window.location.href = 'transaksi/tgl/'+$('[name="bln"]').val()+$('[name="thn"]').val();
}
</script>
