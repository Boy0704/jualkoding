<div class="main-container">
		<div class="container" style="margin-top:40px;">
				<div class="row">
						<div class="col-md-3 page-sidebar mobile-filter-sidebar">
								<aside>
										<div class="inner-box" style="padding-top:0px;">
												<div class="categories-list  list-filter">
														<h5 class="list-title"><strong><a href="kategori/p">Semua Kategori</a></strong></h5>
														<ul class=" list-unstyled">
																<?php
																$this->db->order_by('kat','ASC');
																$v_kat = $this->db->get('tbl_kat');
																foreach ($v_kat->result() as $key => $value): ?>
																	<li>
																		<a href="kategori/p/<?php echo url_title($value->kat); ?>">
																			<span class="title"><?php echo $value->kat; ?></span> (<span class="count"><?php echo $this->db->get_where('tbl_app', array('id_kat'=>$value->id_kat))->num_rows(); ?></span>)
																		</a>
																		<hr style="padding:0px;margin:5px;">
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
										<div class="inner-box" style="padding-top:0px;">
												<div class="locations-list  list-filter">
														<h5 class="list-title"><strong><a href="javascript:void(0);">List Aplikasi</a></strong></h5>
														<ul class="browse-list list-unstyled long-list">
																<?php
																$this->db->order_by('id_app', 'RANDOM');
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
						</div>
						<!--/.page-side-bar-->

						<div class="col-md-9">
							<div class="row">
											<?php
											foreach ($v_data->result() as $key => $baris):
												$link_kat = $path.'/'.$baris->url.".html";
												$toko = '';
												$jml_foto = '';?>
												<div class="col-md-4">
													<div class="item-list content-box" style="cursor:pointer;padding:0px;">
														<div class="row">
																<div class="col-md-12 no-padding photobox">
																		<div class="add-image"><span class="photo-count"><i class="fa fa-camera"></i> <?php echo $jml_foto; ?> </span>
																			<a href="<?php echo $link_kat; ?>"><img class="thumbnail no-margin" src="images/app/<?php echo $baris->img; ?>" title="<?php echo ucwords($baris->nama_app); ?>" alt="<?php echo ucwords($baris->nama_app); ?>" width="50" height="150"></a>
																		</div>
																</div>
														<!--/.photobox-->
																<div class="col-sm-12 add-desc-box">
																		<div class="ads-details">
																			<span class="info-row" style="margin-left:-10px;">
																				<span class="date"><i class=" icon-clock"> </i> <?php echo date('d F Y', strtotime($baris->tanggal)); ?> </span> -
																				<span class="category"><?php echo substr($baris->kat,0,18); ?> </span>-
																			</span>
																				<h5 class="add-title" style="height:45px;">
																					<a href="<?php echo $link_kat; ?>" title="<?php echo ucwords($baris->nama_app); ?>">  <?php echo substr($baris->nama_app,0,50); ?>... </a>
																				</h5>
																		</div>
																</div>
														<!--/.add-desc-box-->
																<div class="col-md-12 text-right  price-box">
																		<h4 class="item-price text-center" style="font-weight:bold"> Rp. <?php echo number_format($baris->harga,0,",","."); ?> </h4>
																</div>
																<a href="<?php echo $link_kat; ?>" class="btn btn-danger  btn-block make-favorite " style="border-radius:0px;" title="<?php echo ucwords($baris->nama_app); ?>"> <i class="fa fa-cloud-download"></i> <b>Download</b> </a>
														<!--/.add-desc-box-->
															</div>
													</div>
												</div>
											<?php endforeach; ?>
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
