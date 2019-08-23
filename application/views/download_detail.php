
				<div class="container" style="margin-top:60px;">
					<?php
					echo $this->session->flashdata('msg_download');?>
						<div class="row">
							<div class="col-md-9 page-content col-thin-right">
									<div class="content-footer text-left">
										<div class="row">
											<div class="col-md-3">
												<a href="tel:<?php echo $web->no_hp; ?>" class="btn  btn-info btn-block"><i class=" fa fa-phone"></i> <?php echo $web->no_hp; ?> </a>
											</div>
											<div class="col-md-3"></div>
											<div class="col-md-3">
												<a href="download/<?php echo $download->id_app; ?>" class="btn  btn-danger btn-block" target="_blank"><i class=" fa fa-cloud-download"></i> DOWNLOAD </a>
											</div>
											<div class="col-md-3">
												<a href="<?php echo $download->url_demo; ?>" class="btn  btn-primary btn-block" target="_blank"><i class=" fa fa-desktop"></i> DEMO </a>
											</div>
										</div>
									</div>
									<div class="inner inner-box ads-details-wrapper">
											<h2> <?php echo $download->nama_app; ?>
													<!-- <small class="label label-default adlistingtype"><?php echo $download->kode_app; ?></small> -->
											</h2>
											<span class="info-row">
												<span class="date"><i class=" icon-clock"> </i> <?php echo date('d F Y',strtotime($download->tanggal)); ?> </span>
												- <span class="category"><?php echo $download->kat; ?> </span>
											</span>

											<div class="ads-image">
												<h1 class="pricetag">
												<?php if ($download->harga=='0'){ ?>
													Free
												<?php }else{ ?>
													Rp.&nbsp;<?php echo number_format($download->harga,0,",","."); ?>
												<?php }
												$get_img = $this->db->get_where('tbl_img_multi', array('id_app'=>$download->id_app));
												?>
												</h1>
													<ul class="bxslider">
															<li><img src="images/app/<?php echo $download->img; ?>" alt="img" width="100%"/></li>
															<?php foreach ($get_img->result() as $key => $value): ?>
																<li><img src="images/app_multi/<?php echo $value->img_file; ?>" alt="img" width="100%"/></li>
															<?php endforeach; ?>
													</ul>
													<div id="bx-pager">
														<?php if ($get_img->num_rows()!=0): ?>
															<a class="thumb-item-link" data-slide-index="0" href="#">
																<img src="images/app/<?php echo $download->img; ?>" alt="img"/>
															</a>
														<?php endif; ?>
															<?php $i=1; foreach ($get_img->result() as $key => $value): ?>
															<a class="thumb-item-link" data-slide-index="<?php echo $i; ?>" href="#">
																	<img src="images/app_multi/<?php echo $value->img_file; ?>" alt="img"/>
															</a>
															<?php $i++; endforeach; ?>
													</div>
											</div>
											<!--ads-image-->

											<div class="Ads-Details">
													<h5 class="list-title"><strong>Keterangan</strong></h5>

													<div class="row">
															<div class="ads-details-info col-md-12">
																	<p>
																		<?php echo $download->keterangan; ?>
																	</p>
															</div>
													</div>
													<hr>
													<b>Keyword:</b> <i><?php echo $download->url; ?></i>
													<hr>
													<div class="content-footer text-left" style="overflow:hidden">
														<div class="row">
															<div class="col-md-3">
																<a href="tel:<?php echo $web->no_hp; ?>" class="btn  btn-info btn-block"><i class=" fa fa-phone"></i> <?php echo $web->no_hp; ?> </a>
															</div>
															<div class="col-md-3"></div>
															<div class="col-md-3">
																<a href="download/<?php echo $download->id_app; ?>" class="btn  btn-danger btn-block" target="_blank"><i class=" fa fa-cloud-download"></i> DOWNLOAD </a>
															</div>
															<div class="col-md-3">
																<a href="<?php echo $download->url_demo; ?>" class="btn  btn-primary btn-block" target="_blank"><i class=" fa fa-desktop"></i> DEMO </a>
															</div>
														</div>
													</div>
											</div>
									</div>
									<!--/.ads-details-wrapper-->

							</div>


							<div class="col-md-3  page-sidebar-right">
									<aside>
											<div class="card sidebar-card  bg-contact-seller">
													<!-- <div class="card-header"></div> -->
													<div class="card-content user-info">
															<div class="card-body text-left">
																<b>Download:</b> <label style="float:right"><?php echo number_format($download->download,0,",","."); ?>x</label>
																<hr>
																<b>Dilihat:</b> <label style="float:right"><?php echo number_format($download->view,0,",","."); ?>x</label>
															</div>
													</div>
											</div>

											<!--/.categories-list-->
									</aside>

									<aside>
											<div class="inner-box" style="padding-top:0px;">
													<div class="locations-list  list-filter">
															<h5 class="list-title"><strong><a href="javascript:void(0);">Aplikasi Terbaru</a></strong></h5>
															<ul class="browse-list list-unstyled long-list">
																	<?php
																	$this->db->order_by('id_app', 'DESC');
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

									<aside>
											<div class="inner-box" style="padding-top:0px;">
													<div class="locations-list  list-filter">
															<h5 class="list-title"><strong><a href="javascript:void(0);">Artikel Terbaru</a></strong></h5>
															<ul class="browse-list list-unstyled long-list">
																	<?php
																	$this->db->order_by('id_article', 'DESC');
									                $this->db->limit(5);
									                $v_list = $this->db->get('tbl_article');
																	foreach ($v_list->result() as $key => $value): ?>
																		<li>
																			<a href="article_detail/<?php echo $value->url; ?>"><strong><?php echo $value->judul; ?></strong>
																				(<span class="count"><?php echo $value->dibaca; ?></span>)
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


						</div>

				</div>


				<?php $this->load->view('widget_bawah'); ?>
