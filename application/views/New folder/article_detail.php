


				<div class="container">

						<div class="page-header">
								<div class="wrap-title">
										<div class="icon">
												<span class="ico-arrow-right"></span>
										</div>
										<h1>Article <small><a href="<?php echo base_url(); ?>">Home</a> / <a href="article">Article</a> / <?php echo ucwords($article->judul); ?></small></h1>
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

															<div class="panel panel-default">
															  <div class="panel-body">
																			<p>
																				<b style="font-size:20px;"><?php echo ucwords($article->judul); ?></b>
																				<span style="float:right;color:#a1a1a1;"><span class="ico-calendar"></span> <?php echo $article->tgl_article; ?></span>
																				<hr style="margin-bottom:0px;">
																			</p>
																			<center>
																			<img src="<?php echo $this->Mcrud->imageBase64FromURL(base_url()."images/article/".$article->gambar); ?>" data-src="images/article/<?php echo $article->gambar; ?>" class="img-polaroid img-responsive img-preloader" align="center" width="300" height="300" style="margin-right:10px;"/>
																			</center>
																			<br>
																			<p>
																				<?php echo $article->isi; ?>
																			</p>

																</div>
															</div>

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
