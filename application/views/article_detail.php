<div class="main-container">
				<div class="container">

						<div class="row">
							<div class="col-md-9 page-content col-thin-right">
									<div class="content-footer text-left">
										<span class="date"><i class=" icon-clock"> </i> <?php echo date('d F Y',strtotime($article->tgl_article)); ?> </span>
									</div>
									<div class="inner inner-box ads-details-wrapper">
											<h2> <?php echo $article->judul; ?></h2>
											<span class="info-row"></span>

											<div class="ads-image">
												<h1 class="pricetag">
													<i class="fa fa-eye"></i> <?php echo number_format($article->dibaca,0,",","."); ?>
												</h1>
													<ul class="bxslider">
															<li><img src="images/app/<?php echo $article->gambar; ?>" alt="img" width="100%"/></li>
													</ul>
											</div>
											<!--ads-image-->

											<div class="Ads-Details">
													<div class="row">
															<div class="ads-details-info col-md-12">
																	<p>
																		<?php echo $article->isi; ?>
																	</p>
															</div>
													</div>
													<hr>
													<b>Keyword:</b> <i><?php echo $article->url; ?></i>
													<hr>
													<div class="content-footer text-left" style="overflow:hidden">
														<div class="row">
															<div class="col-md-3">
																<a href="tel:<?php echo $web->no_hp; ?>" class="btn  btn-info btn-block"><i class=" fa fa-phone"></i> <?php echo $web->no_hp; ?> </a>
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
																<b>Dilihat:</b> <label style="float:right"><?php echo number_format($article->dibaca,0,",","."); ?>x</label>
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
																			<a href="d/<?php echo $value->url; ?>.html"><strong><?php echo $value->nama_app; ?></strong>
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
																			<a href="article_detail/<?php echo $value->url; ?>.html"><strong><?php echo $value->judul; ?></strong>
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

</div>
				<?php $this->load->view('widget_bawah'); ?>
