


				<div class="container">

						<div class="page-header">
								<div class="wrap-title">
										<div class="icon">
												<span class="ico-arrow-right"></span>
										</div>
										<h1>Download <small><a href="<?php echo base_url(); ?>">Home</a> / Download</small></h1>
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
						                echo $this->session->flashdata('msg_download');?>
														<div class="block">
																<div class="head dblue">
																		<div class="icon"><span class="ico-layout-9"></span></div>
																		<h2>Download Aplikasi</h2>
																		<ul class="buttons">
																				<li>
																						<div class="icon"><span class="ico-download-3"></span></div>
																				</li>
																		</ul>
																</div>
																<div class="data-fluid">
																		<table id="tablex" class="table fpTable lcnp display" cellpadding="0" cellspacing="0" width="100%">
																				<thead>
																						<tr>
																								<!--<th><input type="checkbox" class="checkall"/></th>-->
																								<th width="50">#No.</th>
																								<th width="50">Foto</th>
																								<th width="300">Nama APP</th>
																								<th width="100" style="text-align:center;">Hits</th>
																								<th width="160" class="TAC" style="text-align:center;">Pilihan</th>
																						</tr>
																				</thead>
																				<tbody>
																					<?php
																					$no=1;
																					foreach ($app as $baris) {
																					?>
																						<tr>
																								<!--<td><input type="checkbox" name="order[]" value="528"/></td>-->
																								<td><?php echo $no; ?></td>
																								<td><img class="img-preloader" src="<?php echo $this->Mcrud->imageBase64FromURL(base_url()."images/app/thumbnails/$baris->img"); ?>" data-src="<?php echo "images/app/$baris->img"; ?>" alt="<?php echo $baris->img; ?>" width="100" height="60"></td>
																								<td><?php echo strtoupper($baris->nama_app); ?></td>
																								<td style="text-align:center;"><span class="label label-important">1<?php echo $baris->view; ?></span></td>
																								<td>
																										<a href="d/<?php echo $baris->url; ?>" class="btn tip" data-original-title="Detail <?php echo $baris->nama_app; ?>">
																											<span class="ico-eye-open"></span> Detail
																										</a>
																										<a href="download/<?php echo $baris->id_app; ?>" class="btn btn-success tip" data-original-title="Download <?php echo $baris->nama_app; ?>">
																											<span class="ico-download-4"></span> Download
																										</a>
																								</td>
																						</tr>
																					<?php
																					$no++;
																					} ?>
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

<div class="dialog" id="source" style="display: none;" title="Source"></div>
