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


<?php if ($member->aktif=='no'){ ?>
  <div class="alert alert-danger">
    AKUN BELUM AKTIF
  </div>
<?php }else{ ?>
  <div class="alert alert-success">
    SELAMAT DATANG!
  </div>
<?php } ?>
