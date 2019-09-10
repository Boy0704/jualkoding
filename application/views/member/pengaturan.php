<?php
echo $this->session->flashdata('msg');
?>
<div class="inner-box">
    <h5><i class="icon-cog"></i> Pengaturan</h5>
    <hr style="margin:0px;padding:0px;">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6"><br>
        <form method="post" action="" class="form-horizontal" role="form">
          <div class="form-group">
            <label for="nama" class="col-sm-12 control-label">Nama Lengkap</label>
            <div class="col-sm-12">
              <input type="text" name="nama" class="form-control" id="nama" value="<?php echo $member->nama; ?>" placeholder="Nama Lengkap" required autofocus>
            </div>
          </div>
          <div class="form-group">
            <label for="email" class="col-sm-12 control-label">Email</label>
            <div class="col-sm-12">
              <input type="email" name="email" class="form-control" id="email" value="<?php echo $member->email; ?>" placeholder="Email" required>
            </div>
          </div>
          <div class="form-group">
            <label for="no_hp" class="col-sm-12 control-label">No. HP</label>
            <div class="col-sm-12">
              <input type="number" name="no_hp" class="form-control" id="no_hp" value="<?php echo $member->no_hp; ?>" placeholder="No. HP" required>
            </div>
          </div>
          <hr>
          <div class="form-group">
            <label for="username" class="col-sm-12 control-label">Username</label>
            <div class="col-sm-12">
              <input type="text" name="username" class="form-control" id="username" value="<?php echo $member->username; ?>" placeholder="Username" required>
            </div>
          </div>
          <div class="form-group">
            <label for="password" class="col-sm-12 control-label">Password</label>
            <div class="col-sm-12">
              <input type="password" name="password" class="form-control" id="password" placeholder="Password">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-12">
              <hr>
              <button type="submit" name="btnsimpan" class="btn btn-primary" style="float:right;">Simpan</button>
            </div>
          </div>
        </form>
      </div>
    </div>
</div>
