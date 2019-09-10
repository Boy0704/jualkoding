<?php $this->load->view('intro'); ?>
<div class="main-container">
		<div class="container">

				<div class="col-xl-12 ">
						<div class="row row-featured">
								<div class="col-xl-12  box-title " style="margin-bottom:10px;">
										<div class="inner">
											<h2><span>Aplikasi Terbaru </span>
												<?php echo $this->Mcrud->nama_app(); ?>
											</h2>
										</div>
								</div>

								<div style="clear: both"></div>

												<?php
												foreach ($v_data->result() as $key => $baris):
													$link_kat = 'd/'.$baris->url.".html";
													$toko = '';
													$jml_foto = '';?>
													<div class="col-md-3">
														<div class="item-list content-box" style="cursor:pointer;padding:0px;">
															<div class="row">
													        <div class="col-md-12 no-padding photobox">
													            <div class="add-image"><span class="photo-count"><i class="fa fa-camera"></i> <?php echo $jml_foto; ?> </span>
													              <a href="<?php echo $link_kat; ?>"><img class="thumbnail no-margin" src="<?php echo $this->Mcrud->cek_filename("app/thumb/",$baris->img); ?>" title="<?php echo ucwords($baris->nama_app); ?>" alt="<?php echo ucwords($baris->nama_app); ?>" width="50" height="200"></a>
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
				</div>

				<?php echo $halaman; ?>

		</div>
</div>
<!-- /.main-container -->
