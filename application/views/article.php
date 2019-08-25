<div class="main-container">
		<div class="container">
				<div class="row">

						<div class="col-md-9">
							<div class="row">
											<?php
											foreach ($v_data as $key => $baris):
												$link_kat = 'article_detail/'.$baris->url.".html";
												$toko = '';
												$jml_foto = '';?>
												<div class="col-md-12">
													<div class="item-list content-box" style="cursor:pointer;padding:0px;">
														<div class="row">
																<div class="col-md-3 no-padding photobox">
																		<div class="add-image"><span class="photo-count"><i class="fa fa-camera"></i> <?php echo $jml_foto; ?> </span>
																			<a href="<?php echo $link_kat; ?>"><img class="thumbnail no-margin" src="images/app/<?php echo $baris->gambar; ?>" title="<?php echo ucwords($baris->judul); ?>" alt="<?php echo ucwords($baris->judul); ?>" width="50" height="150"></a>
																		</div>
																</div>
														<!--/.photobox-->
																<div class="col-sm-9 add-desc-box">
																		<div class="ads-details">
																				<h5 class="add-title" style="height:20px;margin-top:10px;">
																					<a href="<?php echo $link_kat; ?>" title="<?php echo ucwords($baris->judul); ?>">  <?php echo substr($baris->judul,0,150); ?>... </a>
																				</h5>
																				<span class="info-row">
																					<span class="date"><i class=" icon-clock"> </i> <?php echo date('d F Y', strtotime($baris->tgl_article)); ?> </span>
																				</span>
																				<p>
																					<?php echo substr(htmlentities(strip_tags($baris->isi)), 0, 150); ?> . . .
																				</p>
																				<a href="<?php echo $link_kat; ?>" class="btn btn-primary  make-favorite " style="border-radius:0px;" title="<?php echo ucwords($baris->judul); ?>"> <i class="fa fa-list"></i> <b>Baca Selengkapnya</b> </a>
																		</div>
																</div>
														<!--/.add-desc-box-->
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

						<div class="col-md-3 page-sidebar mobile-filter-sidebar">

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

				</div>
		</div>
</div>
