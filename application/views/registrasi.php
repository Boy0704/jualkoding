<div class="container">
		<div class="row">
				<div class="col-md-12"> <br>
					<nav aria-label="breadcrumb" role="navigation" class="pull-left">
							<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="icon-home fa"></i></a></li>
									<li class="breadcrumb-item active" aria-current="page">Registrasi</li>
							</ol>
					</nav>
				</div>
		</div>
</div>

<div class="container">
	<?php
	echo $this->session->flashdata('msg_download');?>
	<div class="row">
		<div class="col-md-9 page-content col-thin-right">
				<div class="inner inner-box ads-details-wrapper">
					<?php
					echo $this->session->flashdata('msg');
					?>

																	<br>
																		<form method="post" action="" class="form-horizontal" role="form">
																		  <div class="form-group">
																		    <label for="email" class="col-sm-2 control-label">Email</label>
																		    <div class="col-sm-12">
																		      <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
																		    </div>
																		  </div>
																			<div class="form-group">
																		    <label for="username" class="col-sm-2 control-label">Username</label>
																		    <div class="col-sm-12">
																		      <input type="text" name="username" class="form-control" id="username" placeholder="Username" required>
																		    </div>
																		  </div>
																			<div class="form-group">
																		    <label for="no_hp" class="col-sm-2 control-label">No Hp</label>
																		    <div class="col-sm-12">
																		      <input type="number" name="no_hp" class="form-control" id="no_hp" placeholder="No HP" required>
																		    </div>
																		  </div>
																		  <div class="form-group">
																		    <label for="password" class="col-sm-2 control-label">Password</label>
																		    <div class="col-sm-12">
																		      <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
																		    </div>
																		  </div>
																			<div class="form-group">
																		    <label for="re-password" class="col-sm-2 control-label">Re-Password</label>
																		    <div class="col-sm-12">
																		      <input type="password" name="password2" class="form-control" id="re-password" placeholder="Re-Password" required>
																		    </div>
																		  </div>
																		  <div class="form-group">
																		    <div class="col-sm-offset-2 col-sm-12">
																					<hr>
																		      <button type="submit" name="reg" class="btn btn-primary" style="float:right;">Registrasi</button>
																					<a href="login">Sudah punya akun? silahkan login disini!</a>
																		    </div>
																		  </div>
																		</form>
																		<br><br><br>

						</div>
				</div>

				<?php $this->load->view('widget_jml_member'); ?>

		</div>

</div>
