


				<div class="container">

						<div class="page-header">
								<div class="wrap-title">
										<div class="icon">
												<span class="ico-arrow-right"></span>
										</div>
										<h1>Judul TA <small><a href="<?php echo base_url(); ?>">Home</a> / Judul TA</small></h1>
								</div>
								<!--
								<ul class="breadcrumb">
										<li class="active">Home</li>
								</ul>-->
								<div class="clear"></div>
						</div>
<!--
						<div class="row">
							<div class="row-fluid">
									<div class="span12">
											<div class="block">
													<article class="container_12">

														<table class="table fpTable lcnp" width="100%" border="1">
																<tr>
																	<th width="10">No.</th>
																	<th>Judul TA</th>
																	<th width="100" style="text-align:center">Action</th>
																</tr>
																<tr>
																	<td>1.</td>
																	<td></td>
																	<td style="text-align:center">
																		<a href="judul_ta" class="btn btn-primary">Pesan</a>
																	</td>
																</tr>
														</table>

													</article>
											</div>
									</div>
							</div>

						</div>
					-->
					<div class="row">
						<div class="row-fluid">
								<div class="span12">
										<div class="block">
												<article class="container_12">
													<?php
													echo $this->session->flashdata('msg_download');?>
													<div class="block">
															<div class="head dblue">
																	<div class="icon"><span class="ico-layout-9"></span></div>
																	<h2>Judul TA</h2>
																	<ul class="buttons">
																			<li>
																					<div class="icon"><span class="ico-box"></span></div>
																			</li>
																	</ul>
															</div>
															<div class="data-fluid">
																	<table id="tablex" class="table fpTable lcnp display" cellpadding="0" cellspacing="0" width="100%">
																			<thead>
																					<tr>
																						<th width="10">No.</th>
																						<th>Judul TA</th>
																						<th width="100" style="text-align:center">Aksi</th>
																					</tr>
																			</thead>
																			<tbody>
																				<tr>
																					<td>1.</td>
																					<td>-</td>
																					<td style="text-align:center">
																						<a href="pesan" class="btn btn-primary">Pesan</a>
																					</td>
																				</tr>
																			</tbody>
																	</table>
															</div>
													</div>
												</article>
										</div>
								</div>
						</div>

					</div>


				</div>
