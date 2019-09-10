<br><br>
<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-md-3 page-sidebar">
                <aside>
                    <div class="inner-box">
                        <div class="user-panel-sidebar">
                            <div class="collapse-box">
                                <div class="panel-collapse collapse show" id="MyClassified">
                                    <ul class="acc-list">
                                        <li>
                                          <a class="active" href="account-home.html">
                                            <i class="icon-home"></i> Personal Home </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="panel-collapse collapse show" id="MyAds">
                                    <ul class="acc-list">
                                        <li>
                                          <a href="member/app">
                                            <i class="icon-docs"></i> Aplikasi <span class="badge"><?php echo $jml_app; ?></span>
                                          </a>
                                        </li>
                                        <li>
                                          <a href="kategori/p" target="_blank">
                                            <i class="icon-picture"></i> Kategori <span class="badge"><?php echo $jml_kat; ?></span>
                                          </a>
                                        </li>
                                        <li>
                                          <a href="member/konfirmasi">
                                            <i class="icon-users"></i> Konfirmasi Member
                                          </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /.collapse-box  -->

                            <div class="collapse-box">
                                <hr style="margin:0px;padding:0px;">
                                <div class="panel-collapse collapse show" id="TerminateAccount">
                                    <ul class="acc-list">
                                        <li>
                                          <a href="member/profile">
                                            <i class="icon-user"></i> Profile
                                          </a>
                                        </li>
                                        <li>
                                          <a href="member/pengaturan">
                                            <i class="icon-cog"></i> Pengaturan
                                          </a>
                                        </li>
                                        <li>
                                          <a href="logout"><i class="icon-cancel-circled "></i>
                                            Logout
                                          </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /.collapse-box  -->
                        </div>
                    </div>
                    <!-- /.inner-box  -->

                </aside>
            </div>
            <!--/.page-sidebar-->

            <div class="col-md-9 page-content">
                <?php $this->load->view("member/$v_page"); ?>
            </div>
            <!--/.page-content-->
        </div>
        <!--/.row-->
    </div>
    <!--/.container-->
</div>
