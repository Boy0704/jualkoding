


				<div class="container">

						<div class="page-header">
								<div class="wrap-title">
										<div class="icon">
												<span class="ico-arrow-right"></span>
										</div>
										<h1>Profile <small><a href="<?php echo base_url(); ?>">Home</a> / Profile</small></h1>
								</div>
								<!--
								<ul class="breadcrumb">
										<li class="active">Home</li>
								</ul>-->
								<div class="clear"></div>
						</div>

						<div class="row">
							<div class="row-fluid">
									<div class="span12">
											<div class="block">
													<article class="container_12">

														<div class="col-md-8">
															<?php
															echo $this->session->flashdata('msg');
															?>
															<div class="panel panel-default">
																<div class="panel-body">
																	<br>
																		<form method="post" action="" class="form-horizontal" role="form">
																			<div class="form-group">
																		    <label for="username" class="col-sm-2 control-label">Username</label>
																		    <div class="col-sm-10">
																		      <input type="text" name="username" class="form-control" id="username" placeholder="Username" value="<?php echo $member->username; ?>" required readonly>
																		    </div>
																		  </div>
																			<div class="form-group">
																		    <label for="nama" class="col-sm-2 control-label">Nama Lengkap</label>
																		    <div class="col-sm-10">
																		      <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Lengkap" value="<?php echo $member->nama; ?>" required>
																		    </div>
																		  </div>
																		  <div class="form-group">
																		    <label for="email" class="col-sm-2 control-label">Email</label>
																		    <div class="col-sm-10">
																		      <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="<?php echo $member->email; ?>" required>
																		    </div>
																		  </div>
																			<div class="form-group">
																		    <label for="no_hp" class="col-sm-2 control-label">No Hp</label>
																		    <div class="col-sm-10">
																		      <input type="number" name="no_hp" class="form-control" id="no_hp" placeholder="No HP" value="<?php echo $member->no_hp; ?>" required>
																		    </div>
																		  </div>
																		  <div class="form-group">
																		    <label for="password" class="col-sm-2 control-label">Password</label>
																		    <div class="col-sm-10">
																		      <input type="password" name="password" class="form-control" id="password" placeholder="Password">
																					<i class="bottom" style="color:gray;">*kosongkan password jika tidak diubah*</i>
																		    </div>
																		  </div>
																			<div class="form-group">
																		    <label for="re-password" class="col-sm-2 control-label">Re-Password</label>
																		    <div class="col-sm-10">
																		      <input type="password" name="password2" class="form-control" id="re-password" placeholder="Re-Password">
																					<i class="bottom" style="color:gray;">*kosongkan re-password jika tidak diubah*</i>
																		    </div>
																		  </div>
																		  <div class="form-group">
																		    <div class="col-sm-offset-2 col-sm-10">
																		      <button type="submit" name="btnsimpan" class="btn btn-default" style="float:right;">Simpan</button>
																		    </div>
																		  </div>
																		</form>
															  </div>
															</div>
														</div>
														<div class="col-md-4">
															<a href="#" class="swidget blue">
																<?php
																if ($jml_member > 999 & $jml_member <= 9999) {
																	$font = "font-size:50px;";
																}elseif ($jml_member > 99999) {
																	$font = "font-size:20px;";
																}else{
																	$font = "";
																} ?>
																	<div class="value" style="<?php echo $font; ?>">
																			<?php echo number_format($jml_member, 0, ",","."); ?>
																	</div>
																	<div class="bottom">
																			<div class="text">Member</div>
																			<div class="value"><span class="ico-user"></span></div>
																	</div>
															</a>

															<a href="#" class="swidget green">
																<?php
																if ($jml_app > 999 & $jml_app <= 9999) {
																	$font2 = "font-size:50px;";
																}elseif ($jml_app > 99999) {
																	$font2 = "font-size:20px;";
																}else{
																	$font2 = "";
																} ?>
																	<div class="value" style="<?php echo $font2; ?>">
																			<?php echo number_format($jml_app, 0, ",","."); ?>
																	</div>
																	<div class="bottom">
																			<div class="text">Aplikasi</div>
																			<div class="value"><span class="ico-box"></span></div>
																	</div>
															</a>

															<hr>

															<p>
															IKLAN</p>

														</div>

													</article>
											</div>
									</div>
							</div>

						</div>

				</div>
