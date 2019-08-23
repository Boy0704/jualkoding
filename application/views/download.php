<div class="main-container">
		<div class="container">
				<div class="row">
						<!-- this (.mobile-filter-sidebar) part will be position fixed in mobile version -->
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
						<!--/.page-side-bar-->
						<style>
						#box_page{width: 100%;}
						@media (min-width: 768px) {
						  #box_page{width: 166px;}
						}
						</style>
						<div class="col-md-9 page-content col-thin-left">
								<div class="category-list">
										<div class="adds-wrapper">
											<?php
											foreach ($v_data->result() as $key => $baris):
												$link_kat = 'd/'.$baris->url;
												$toko = '';
												$jml_foto = '';?>
												<div id="box_page" style="float:left;border-bottom:1px solid #f1f1f1;">
													<div class="item-list">
														<div class="cornerRibbons topAds">
																<!-- <a href="#"> Top Ads</a> -->
														</div>
														<div class="row">
																<div class="col-md-12 no-padding photobox">
																		<div class="add-image"><span class="photo-count"><i class="fa fa-camera"></i> <?php echo $jml_foto; ?> </span>
																			<a href="<?php echo $link_kat; ?>"><img class="thumbnail no-margin" src="images/app/<?php echo $baris->img; ?>" title="<?php echo ucwords($baris->nama_app); ?>" alt="<?php echo ucwords($baris->nama_app); ?>" width="50" height="100"></a>
																		</div>
																</div>
														<!--/.photobox-->
																<div class="col-sm-12 add-desc-box">
																		<div class="ads-details">
																				<h5 class="add-title" style="height:60px;">
																					<a href="<?php echo $link_kat; ?>"> <?php echo substr($baris->nama_app,0,30); ?> </a>
																				</h5>
																				<span class="info-row">
																					<!-- <span class="add-type business-ads tooltipHere" data-toggle="tooltip" data-placement="right" title="Business Ads"> </span> -->
																					<span class="date"><i class=" icon-clock"> </i> <?php echo date('d/m/Y', strtotime($baris->tanggal)); ?> </span> -
																					<span class="category"><?php echo substr($baris->kode_app,0,46); ?> </span>-
																					<span class="item-location"><i class="fa fa-map-marker"></i> <?php echo substr($toko,0,30); ?> </span> </span></div>
																</div>
														<!--/.add-desc-box-->
																<div class="col-md-12 text-right  price-box">
																		<h2 class="item-price"> Rp. <?php echo number_format($baris->harga,0,",","."); ?> </h2>
																		<!-- <a class="btn btn-danger  btn-sm make-favorite"> <i class="fa fa-certificate"></i> <span>Top Ads</span> </a>  -->
																		<a href="<?php echo $link_kat; ?>" class="btn btn-default  btn-sm make-favorite"> <i class="fa fa-heart"></i> <b>Beli</b> </a>
																</div>
														<!--/.add-desc-box-->
															</div>
													</div>
												</div>
											<?php endforeach; ?>
										</div>
								</div>
								<div class="pagination-bar text-center">
									<?php echo $halaman; ?>
								</div>
								<!--/.pagination-bar -->


						</div>
						<!--/.page-content-->

				</div>
		</div>
</div>
