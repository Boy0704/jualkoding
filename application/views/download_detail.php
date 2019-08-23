<div class="container">
		<div class="row">
				<div class="col-md-12"> <br>
					<nav aria-label="breadcrumb" role="navigation" class="pull-left">
							<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="icon-home fa"></i></a></li>
									<li class="breadcrumb-item"><a href="kategori/p/<?php echo url_title($download->kat); ?>"><?php echo $download->kat; ?></a></li>
									<li class="breadcrumb-item active" aria-current="page"><?php echo $download->nama_app; ?></li>
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
											<h2> <?php echo $download->nama_app; ?>
													<small class="label label-default adlistingtype"><?php echo $download->kode_app; ?></small>
											</h2>
											<span class="info-row">
												<span class="date"><i class=" icon-clock"> </i> <?php echo date('d F Y',strtotime($download->tanggal)); ?> </span>
												- <span class="category">Aplikasi </span>
												- <span class="item-location"><i class="fa fa-map-marker"></i> Jambi, Indonesia </span>
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
													<div class="content-footer text-left">
														<a class="btn  btn-info"><i class=" icon-phone-1"></i> <?php echo $web->no_hp; ?> </a>
														<a href="download/<?php echo $download->id_app; ?>" class="btn  btn-success" target="_blank"><i class=" icon-clipboard"></i> DOWNLOAD </a>
														<a href="<?php echo $download->url_demo; ?>" class="btn  btn-warning" target="_blank"><i class=" icon-desktop"></i> DEMO </a>
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
															<div class="card-body text-center">
																	<!-- <div class="seller-info">
																			<h3 class="no-margin"></h3>
																			<p>Location: <strong>Jambi</strong>
																			</p>
																	</div> -->
																	<div class="user-ads-action">
																		<a href="download/<?php echo $download->id_app; ?>" class="btn   btn-success btn-block" target="_blank">
																			<i class=" icon-clipboard"></i> DOWNLOAD
																		</a>
																		<a href="<?php echo $download->url_demo; ?>" class="btn  btn-warning btn-block" target="_blank">
																			<i class=" icon-desktop"></i> DEMO
																		</a>
																		<hr>
																		<b>Download:</b> <?php echo number_format($download->download,0,",","."); ?>
																		<br>
																		<b>Dilihat:</b> <?php echo number_format($download->view,0,",","."); ?>
																	</div>
															</div>
													</div>
											</div>

											<!--/.categories-list-->
									</aside>
							</div>


						</div>

				</div>


				<?php $this->load->view('widget_bawah'); ?>
