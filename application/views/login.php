<div class="container">
		<div class="row">
				<div class="col-md-12"> <br>
					<nav aria-label="breadcrumb" role="navigation" class="pull-left">
							<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="icon-home fa"></i></a></li>
									<li class="breadcrumb-item active" aria-current="page">Form Login</li>
							</ol>
					</nav>
				</div>
		</div>
</div>

<div class="container">
	<?php
	echo $this->session->flashdata('msg_download');?>
	<div class="row">
    <div class="col-md-3 page-sidebar mobile-filter-sidebar">
        <aside>
            <div class="inner-box">
                <div class="categories-list  list-filter">
                    <h5 class="list-title"><strong><a href="kategori/p">Semua Kategori</a></strong></h5>
                    <ul class=" list-unstyled">
                        <?php
                        $this->db->order_by('kat','ASC');
                        $v_kat = $this->db->get('tbl_kat');
                        foreach ($v_kat->result() as $key => $value): ?>
                          <li>
                            <a href="kategori/p/<?php echo url_title($value->kat); ?>">
                              <span class="title"><?php echo $value->kat; ?></span><span class="count">&nbsp; <?php echo $this->db->get_where('tbl_app', array('id_kat'=>$value->id_kat))->num_rows(); ?></span>
                            </a>
                          </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <!--/.categories-list-->

                <div style="clear:both"></div>
            </div>

            <!--/.categories-list-->
        </aside>

        <!-- IKLAN -->

        <aside>
            <div class="inner-box">
                <div class="locations-list  list-filter">
                    <h5 class="list-title"><strong><a href="javascript:void(0);">List Judul Aplikasi</a></strong></h5>
                    <ul class="browse-list list-unstyled long-list">
                        <?php
                        $this->db->order_by('id', 'RANDOM');
                        $this->db->limit(5);
                        $v_list = $this->db->get('tbl_app');
                        foreach ($v_list->result() as $key => $value): ?>
                          <li>
                            <a href="d/<?php echo $value->url; ?>"><strong><?php echo $value->nama_app; ?></strong>
                              (<span class="count"><?php echo $value->view; ?></span>)
                            </a>
                            <hr>
                          </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div style="clear:both"></div>
            </div>

            <!--/.categories-list-->
        </aside>
    </div>

		<div class="col-md-6 page-content col-thin-right">
				<div class="inner inner-box ads-details-wrapper">
					<?php
					echo $this->session->flashdata('msg');
					?>

																	<br>
																		<form method="post" action="" class="form-horizontal" role="form">
																		 	<div class="form-group">
																		    <label for="username" class="col-sm-2 control-label">Username</label>
																		    <div class="col-sm-12">
																		      <input type="text" name="username" class="form-control" id="username" placeholder="Username" required autofocus>
																		    </div>
																		  </div>
																		  <div class="form-group">
																		    <label for="password" class="col-sm-2 control-label">Password</label>
																		    <div class="col-sm-12">
																		      <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
																		    </div>
																		  </div>
																		  <div class="form-group">
																		    <div class="col-sm-offset-2 col-sm-12">
																					<hr>
																		      <button type="submit" name="btnlogin" class="btn btn-primary" style="float:right;">Login</button>
																					<a href="lp">Lupa Password?</a> <br>
																		      <a href="registrasi">Belum punya akun? silahkan daftar disini!</a>
																		    </div>
																		  </div>
																		</form>
																		<br><br><br>

						</div>
				</div>

				<?php $this->load->view('widget_jml_member'); ?>

		</div>

</div>
