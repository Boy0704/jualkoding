
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.12';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

				<div class="container">

						<div class="page-header">
								<div class="wrap-title">
										<div class="icon">
												<span class="ico-arrow-right"></span>
										</div>
										<h1><?php echo ucwords($download->nama_app); ?> <small><a href="<?php echo base_url(); ?>">Home</a> / <a href="download">Detail Aplikasi</a> / <?php echo ucwords($download->url); ?></small></h1>
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
														<?php
						                echo $this->session->flashdata('msg_download');?>
														<div class="col-md-8">

															<div class="panel panel-default">
																<div class="panel-body">
																		<img src="<?php echo $this->Mcrud->imageBase64FromURL(base_url()."images/app/".$download->img);?>" data-src="images/app/<?php echo $download->img; ?>" class="img-polaroid img-responsive img-preloader" align="left" style="margin-right:10px;width:700px;height:400px;"/>
																			<p>

																				<hr style="margin-bottom:0px;">
																			</p>
																			<p>
																				<!--<pre>-->
																				<table class="table">
																					<tr>
																						<td>Nama Apliaksi</td>
																						<td>:</td>
																						<td><?php echo strtoupper($download->nama_app); ?></td>
																					</tr>
																					<tr>
																						<td>Hits</td>
																						<td>:</td>
																						<td><?php echo number_format($download->view); ?> Kali di lihat</td>
																					</tr>
																					<tr>
																						<td>Download</td>
																						<td>:</td>
																						<td><?php echo number_format($download->download); ?> Di download</td>
																					</tr>
																					<tr>
																						<td>Upload</td>
																						<td>:</td>
																						<td><?php echo $download->tanggal; ?></td>

																					</tr>
																						<td>Jenis</td>
																						<td>:</td>
																						<td>
																							 <span class="btn btn-warning">APLIKASI INI KUSUS UNTUK MEMBER AKTIF</span>
																						</td>

																					</tr>
																				</table>
																														<!--</pre>-->
																				<br>
																				<br>
                                                       <a href="https://goo.gl/BGo3uS" target="_blank" class="btn btn-primary btn-block" >LIVE DEMO</a>
																				<a href="download/<?php echo $download->id_app; ?>/d" class="btn btn-success btn-block" data-original-title="Download <?php echo $download->nama_app; ?>">
																				<span class="ico-download-4"></span> DOWNLOAD
																			</a>



																				<hr>
																				<b>Keterangan :</b>
																				<br>
																				<?php echo $download->keterangan; ?>
																			</p>
																			<br>
																			 <span class="btn btn-warning">
																			 	Silahkan menjadi member jika ingin mendapatkan aplikasi, cara mejadi member silahkan klik di <a href="panduan" target="_blank">sini</a>
																			 </span>

																</div>
															</div>
<div class="follow-wrapper">
                     <div class="fb-share-button" data-href="https://www.ordodev.com/d/<?php echo $download->url?>" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fordodev.com%2F&amp;src=sdkpreparse">Bagikan</a></div>

                </div><!-- /.follow-wrapper -->
														</div>


														<div class="col-md-4">
															<a class="swidget blue">
																<?php
																if ($jml_member > 999 & $jml_member <= 9999) {
																	$font = "font-size:30px;";
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
																	$font2 = "font-size:30px;";
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
															</div>
															<div class="col-md-4">
															<img src="assets/rek.jpeg" width="100%">
															</div>
															<br>
															<div class="col-md-4">
															<img src="assets/info.png" width="100%">
															</div>
															<br>
															<br>
															<br>

<div class="col-md-4">
															<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- 300x250 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:250px"
     data-ad-client="ca-pub-2787648772467726"
     data-ad-slot="4051199892"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>


	</div>

													</article>

											</div>
									</div>
							</div>

						</div>





<div class="center_column col-xs-12 col-sm-12" id="center_column">
<div id="view-product-list" class="view-product-list">
                    <h2 class="page-heading">
                        <span class="page-heading-title"><center>SELURUH SOURCE CODE APLIKASI KAMI</center></span>
                    </h2>
										<hr>

                    <!-- PRODUCT LIST -->
                    <ul class="row product-list grid">
                     <?php

														$sql=$this->db->query("select * from tbl_app  ORDER BY rand() limit 12");							foreach ($sql->result() as $row) { ?>
                          <li class="col-sx-12 col-sm-3" style="list-style:none;height:260px;">
                            <div class="product-container" style="min-width:100%;position:relative;">
                               <div class="left-block">
                                    <a href="d/<?php echo $row->url; ?>">
                                    <img src="<?php echo $this->Mcrud->imageBase64FromURL(base_url()."images/app/$row->img"); ?>" data-src="images/app/<?php echo $row->img; ?>" class="img-responsive img-preloader"  alt="<?php echo $row->img; ?>" width="100%" style="height:100px;">
                                    </a>
                                </div>
                                <div class="right-block" style="height:130px;">
                                    <h5 class="product-name"><a href="d/<?php echo $row->url; ?>"><b><?php echo strtoupper($row->nama_app); ?></b></a></h5>
                                   <div class="content_price">
                                    </div>

                                   <div class="content_price" style="position:absolute;bottom:0px;">
                                    <a href="d/<?php echo $row->url; ?>" class="btn btn-success" target="_blank"><span>DETAIL</span></a>
                                    <a href="download/<?php echo $row->id_app; ?>" class="btn btn-primary" ><span>DOWNLOAD</span></a>
                                    </div>
                                </div>
													</div>
                        </li>
<?php	}										?>
 <a href="download" target="_blank" class="btn btn-primary" >Tampil Lebih Banyak -> </a>
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
<br>
<br>
<br>
<br>
<br>
                    </ul>
                    <!-- ./PRODUCT LIST -->

</div>
</div>

				</div>
				<br>
				<br>
				<br>
				<br>
				<br>
