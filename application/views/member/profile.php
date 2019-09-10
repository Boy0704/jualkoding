<div class="inner-box">
    <div class="row">
        <div class="col-md-5 col-xs-4 col-xxs-12">
            <h3 class="no-padding text-center-480 useradmin">
              <a href="member/profile">
                <img class="userImg" src="images/foto/avatar3.png" alt="user"> <?php echo $member->nama; ?>
              </a>
            </h3>
        </div>
        <div class="col-md-7 col-xs-8 col-xxs-12">
            <div class="header-data text-center-xs">

                <!-- Traffic data -->
                <div class="hdata">
                    <div class="mcol-left">
                        <!-- Icon with red background -->
                        <i class="icon-docs ln-shadow"></i></div>
                    <div class="mcol-right">
                        <!-- Number of visitors -->
                        <p><a href="app"><?php echo number_format($jml_app,0); ?></a> <em>Aplikasi</em></p>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <!-- revenue data -->
                <div class="hdata">
                    <div class="mcol-left">
                        <!-- Icon with green background -->
                        <i class="icon-picture ln-shadow"></i></div>
                    <div class="mcol-right">
                        <!-- Number of visitors -->
                        <p><a href="kategori/p" target="_blank"><?php echo number_format($jml_kat,0); ?></a><em>Kategori</em></p>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <!-- revenue data -->
                <div class="hdata">
                    <div class="mcol-left">
                        <!-- Icon with blue background -->
                        <i class="fa fa-users ln-shadow"></i></div>
                    <div class="mcol-right">
                        <!-- Number of visitors -->
                        <p><a href="member/profile"><?php echo number_format($jml_member,0); ?></a> <em>Member </em></p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
$v = $member;
if ($v->aktif=='no') {
  $stt='Belum Aktif';
}else {
  $stt='Aktif';
}
$data_arr=array(
  'Nama Lengkap' => $v->nama,
  'Username' => $v->username,
  'Email'  => $v->email,
  'No. HP' => $v->no_hp,
  'Status' => "<b>$stt</b>",
  'Tgl Terdaftar' => date('d F Y',strtotime($v->tgl_daftar))
);
?>
<!-- <div class="inner-box"> -->
    <table class="table table-striped table-bordered table-hover" width="100%" style="background:#fff;">
      <tbody>
        <?php foreach ($data_arr as $key => $value): ?>
          <tr>
            <th width="200"><?php echo $key; ?></th>
            <td><?php echo $value; ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
<!-- </div> -->
