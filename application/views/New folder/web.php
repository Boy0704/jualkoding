


				<div class="container">
						<?php
						echo $this->session->flashdata('msg');
						?>
						<div class="page-header">
								<div class="wrap-title">
										<div class="icon">
												<span class="ico-arrow-right"></span>
										</div>
										<h1><?php echo $web->nama_web; ?> <small>Home</small></h1>
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
														<center>
														<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="width:90%;background-color:#222;">
														  <!-- Indicators -->
														  <ol class="carousel-indicators">
														    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
														    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
														    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
														  </ol>

														  <!-- Wrapper for slides -->
														  <div class="carousel-inner">
														    <div class="item active">
														      <img class="img-preloader" src="<?php echo $this->Mcrud->imageBase64FromURL(base_url()."images/slide/side-2.jpg"); ?>" data-src="images/slide/side-2.jpg" alt="...">
														      <div class="carousel-caption">
														       	...
														      </div>
														    </div>
														    <div class="item">
														      <img class="img-preloader" src="<?php echo $this->Mcrud->imageBase64FromURL(base_url()."images/slide/side-1.jpg"); ?>" data-src="images/slide/side-1.jpg" alt="...">
														      <div class="carousel-caption">
														        ...
														      </div>
														    </div>
																<div class="item">
														      <img class="img-preloader" src="<?php echo $this->Mcrud->imageBase64FromURL(base_url()."images/slide/side-2.jpg"); ?>" data-src="images/slide/side-2.jpg" alt="...">
														      <div class="carousel-caption">
														        ...
														      </div>
														    </div>
														  </div>

														  <!-- Controls -->
														  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
														    <span class="glyphicon glyphicon-chevron-left"></span>
														  </a>
														  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
														    <span class="glyphicon glyphicon-chevron-right"></span>
														  </a>
														</div>
														</center>
													</article>
											</div>
									</div>
							</div>

						</div>


						<div class="row">
								<div class="col-md-12">
										<div class="widgets" style="margin-left:10px;">
												<div class="widget blue value">
														<?php
														if ($jml_member > 999 & $jml_member <= 99999) {
															$font = "font-size:50px;";
														}elseif ($jml_member > 99999) {
															$font = "font-size:20px;";
														}else{
															$font = "";
														} ?>
														<div class="left" style="<?php echo $font; ?>"><?php echo number_format($jml_member, 0, ",","."); ?></div>
														<div class="right">
																<h3>Member</h3>
														</div>
														<!--
														<div class="bottom">
																<a href="member">Detail</a>
														</div>-->
												</div>
												<div class="widget green value">
														<?php
														if ($jml_app > 999 & $jml_app <= 99999) {
															$font2 = "font-size:50px;";
														}elseif ($jml_app > 99999) {
															$font2 = "font-size:20px;";
														}else{
															$font2 = "";
														} ?>
														<div class="left" style="<?php echo $font; ?>"><?php echo number_format($jml_app, 0, ",","."); ?></div>
														<div class="right">
																<h3>Aplikasi</h3>
														</div>
														<!--
														<div class="bottom">
																<a href="download">Detail</a>
														</div>-->
												</div>
												<div class="widget purple value">
														<?php
														if ($jml_download > 999 & $jml_download <= 99999) {
															$font3 = "font-size:50px;";
														}elseif ($jml_download > 99999) {
															$font3 = "font-size:20px;";
														}else{
															$font3 = "";
														} ?>
														<div class="left" style="<?php echo $font3; ?>"><?php echo number_format($jml_download, 0, ",","."); ?></div>
														<div class="right">
																<h3>Download</h3>
														</div>
														<!--
														<div class="bottom">
																<a href="#">Detail</a>
														</div>-->
												</div>
										</div>
								</div>
						</div>

						<hr>
						<div class="row">

							<div class="row-fluid">
									<div class="span12">
											<div class="block">
													<article class="container_12">
														<?php
						                //echo $this->session->flashdata('msg_download');?>
														<div class="block">
																<div class="head dblue">
																		<div class="icon"><span class="ico-layout-9"></span></div>
																		<h2>Aplikasi</h2>
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
																								<!--<th><input type="checkbox" class="checkall"/></th>-->
																								<th width="50">#No.</th>
																								<th width="50">Foto</th>
																								<th width="300">Nama APP</th>
																								<th width="100" style="text-align:center;">Hits</th>
																								<th width="80" class="TAC" style="text-align:center;"></th>
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
																								<td><img src="<?php echo $this->Mcrud->imageBase64FromURL(base_url()."images/app/thumbnails/$baris->img"); ?>" alt="<?php echo $baris->img; ?>" width="100" height="60"></td>
																								<td><?php echo strtoupper($baris->nama_app); ?></td>
																								<td style="text-align:center;"><span class="label label-important">1<?php echo $baris->view; ?></span></td>
																								<td>
																										<a href="d/<?php echo $baris->url; ?>" class="btn tip" data-original-title="Detail <?php echo $baris->nama_app; ?>">
																											<span class="ico-eye-open"></span> Detail
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
						<hr>

				</div>
				<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- dunvo_main_Blog1_1x1_as -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-2787648772467726"
     data-ad-slot="9978719895"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
