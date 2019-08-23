


				<div class="container">

						<div class="page-header">
								<div class="wrap-title">
										<div class="icon">
												<span class="ico-arrow-right"></span>
										</div>
										<h1>Hubungi <small><a href="<?php echo base_url(); ?>">Home</a> / Hubungi</small></h1>
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

														<div class="col-md-6">
															<?php
															echo $this->session->flashdata('msg');
															?>
															<div class="panel panel-default">
																<div class="panel-body">
																	<br>
																		<form action="" method="post" class="form-horizontal" role="form">
																			<div class="form-group">
																				<label for="email" class="col-sm-2 control-label">Email</label>
																				<div class="col-sm-10">
																					<input type="email" name="email" class="form-control" id="email" placeholder="Email" value="<?php if ($ceks != ""){ echo $user->email;} ?>" required>
																				</div>
																			</div>
																			<div class="form-group">
																				<label for="no_hp" class="col-sm-2 control-label">No HP</label>
																				<div class="col-sm-10">
																					<input type="number" name="no_hp" class="form-control" id="no_hp" placeholder="No HP" value="<?php if ($ceks != ""){ echo $user->no_hp;} ?>" required>
																				</div>
																			</div>
																			<div class="form-group">
																				<label for="pesan" class="col-sm-2 control-label">Pesan</label>
																				<div class="col-sm-10">
																					<textarea name="pesan" rows="8" cols="80" class="form-control" id="pesan" placeholder="Pesan" required></textarea>
																				</div>
																			</div>

																			<div class="form-group">
																				<div class="col-sm-offset-2 col-sm-10">
																					<button type="submit" name="btnkirim" class="btn btn-default" style="float:right;"><span class="glyphicon glyphicon-send"></span> Kirim</button>
																				</div>
																			</div>
																		</form>
																</div>
															</div>
														</div>

														<div class="col-md-6">
															<div>
																		<iframe src="<?php echo $web->map; ?>" width="100%" height="270" frameborder="0" style="border:1px solid #e1e1e1;margin-top:0px;"></iframe>
															</div>

															<div class="panel panel-default">
																<div class="panel-body">
																	<b><span class="ico-map-marker"></span> Alamat :</b> <?php echo $web->alamat; ?> <br>
																	<b><span class="ico-phone-4"></span> <?php echo $web->no_hp; ?> </b><br>
																	<b><span class="ico-envelope-alt"></span></b> <?php echo $web->email; ?><br>
																</div>
															</div>
														</div>

													</article>
											</div>
									</div>
							</div>

						</div>

				</div>
