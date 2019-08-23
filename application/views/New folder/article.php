


				<div class="container">

						<div class="page-header">
								<div class="wrap-title">
										<div class="icon">
												<span class="ico-arrow-right"></span>
										</div>
										<h1>Article <small><a href="<?php echo base_url(); ?>">Home</a> / Article</small></h1>
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

														<div class="col-md-8">
															<?php
															foreach ($article as $baris) {?>
															<div class="panel panel-default">
															  <div class="panel-body">
																		<img class="img-preloader" src="<?php echo $this->Mcrud->imageBase64FromURL(base_url()."images/article/thumbnails/$baris->gambar"); ?>" data-src="images/article/<?php echo $baris->gambar; ?>" class="img-polaroid img-responsive" align="left" style="margin-right:10px;width:300px;height:300px;"/>
																			<p>
																				<a href="article/<?php echo $baris->url; ?>">
																				<b style="font-size:20px;"><?php echo ucwords($baris->judul); ?></b>
																				</a>
																				<span style="float:right;color:#a1a1a1;"><span class="ico-calendar"></span> <?php echo $baris->tgl_article; ?></span>
																				<hr style="margin-bottom:0px;">
																			</p>
																			<p>
																				<?php echo substr($baris->isi, 0, 100); ?> . . .
																			</p>
																		 <a href="article_detail/<?php echo $baris->url; ?>" type="submit" class="btn btn-default" style="float:right;"><span class="ico-eye-open"></span> Baca Selengkapnya</a>
																</div>
															</div>
															<?php
															} ?>

															 <!--
															<ul class="pagination">
			                            <li class="disabled"><a href="#">&laquo;</a></li>
			                            <li class="active"><a href="#">1</a></li>
			                            <li><a href="#">2</a></li>
			                            <li><a href="#">3</a></li>
			                            <li><a href="#">4</a></li>
			                            <li><a href="#">5</a></li>
			                            <li class="disabled"><span>...</span></li>
			                            <li><a href="#">56</a></li>
			                            <li><a href="#">57</a></li>
			                            <li><a href="#">58</a></li>
			                            <li><a href="#">59</a></li>
			                            <li><a href="#">&raquo;</a></li>
			                        </ul>-->
															<center>
																<?php echo $halaman ?> <!--Memanggil variable pagination-->
															</center>
														</div>


														<div class="col-md-4">
															<a class="swidget blue">
																<?php
																if ($jml_member > 999 & $jml_member <= 9999) {
																	$font = "font-size:50px;";
																}elseif ($jml_member > 99999) {
																	$font = "font-size:20px;";
																}else{
																	$font = "";
																} ?>
																	<div class="value" style="<?php echo $font; ?>">
																			<?php echo number_format($jml_member, 0, ",","."); ?>
																	</div>
																	<div class="bottom">
																			<div class="text">Member</div>
																			<div class="value"><span class="ico-user"></span></div>
																	</div>
															</a>

															<a class="swidget green">
																<?php
																if ($jml_app > 999 & $jml_app <= 9999) {
																	$font2 = "font-size:50px;";
																}elseif ($jml_app > 99999) {
																	$font2 = "font-size:20px;";
																}else{
																	$font2 = "";
																} ?>
																	<div class="value" style="<?php echo $font2; ?>">
																			<?php echo number_format($jml_app, 0, ",","."); ?>
																	</div>
																	<div class="bottom">
																			<div class="text">Aplikasi</div>
																			<div class="value"><span class="ico-box"></span></div>
																	</div>
															</a>

															<hr>

															<p>
															IKLAN</p>
														</div>

													</article>
											</div>
									</div>
							</div>

						</div>

				</div>
