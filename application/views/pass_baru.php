


				<div class="container">

						<div class="page-header">
								<div class="wrap-title">
										<div class="icon">
												<span class="ico-arrow-right"></span>
										</div>
										<h1>Lupa Password <small><a href="<?php echo base_url(); ?>">Home</a> / Lupa Password</small></h1>
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

															<?php
															echo $this->session->flashdata('msg');
															?>
														<div class="col-md-8">

															<div class="panel panel-default">
																<div class="panel-body">
																	<br>
																		<form method="post" action="" class="form-horizontal" role="form">
																			<div class="form-group">
																		    <label for="password" class="col-sm-3 control-label">Password Baru</label>
																		    <div class="col-sm-9">
																		      <input type="password" name="password" class="form-control" id="password" placeholder="Password Baru" required>
																		    </div>
																		  </div>
																			<div class="form-group">
																		    <label for="re-password" class="col-sm-3 control-label">Re-Password Baru</label>
																		    <div class="col-sm-9">
																		      <input type="password" name="password2" class="form-control" id="re-password" placeholder="Re-Password Baru" required>
																		    </div>
																		  </div>
																		  <div class="form-group">
																		    <div class="col-sm-offset-2 col-sm-10">
																		      <button type="submit" name="kirim" class="btn btn-default" style="float:right;">Simpan</button>
																		    </div>
																		  </div>
																		</form>
															  </div>
															</div>
														</div>
														<div class="col-md-4">
															<a class="swidget blue">
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

															<a class="swidget green">
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

														<div class="col-md-12">
															<div class="panel panel-default">
															  <div class="panel-body">
															    Keterangan
															  </div>
															</div>
														</div>
													</article>
											</div>
									</div>
							</div>

						</div>

				</div>
