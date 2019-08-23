


				<div class="container">

						<div class="page-header">
								<div class="wrap-title">
										<div class="icon">
												<span class="ico-arrow-right"></span>
										</div>
										<h1>Login <small><a href="<?php echo base_url(); ?>">Home</a> / Login</small></h1>
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

														<div class="col-md-3">
															

														

														</div>

														<div class="col-md-5">
															<?php
															echo $this->session->flashdata('msg');
															?>
															<div class="panel panel-default">
																<div class="panel-body">
																	<br>
																		<form method="post" action="" class="form-horizontal" role="form">
																			<input type="hidden" name="menu_log" value="halaman">
																			<div class="form-group">
																		    <label for="username" class="col-sm-2 control-label">Username</label>
																		    <div class="col-sm-10">
																		      <input type="text" name="username" class="form-control" id="username" placeholder="Username" required autofocus>
																		    </div>
																		  </div>
																		  <div class="form-group">
																		    <label for="password" class="col-sm-2 control-label">Password</label>
																		    <div class="col-sm-10">
																		      <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
																		    </div>
																		  </div>

																		  <div class="form-group">
																		    <div class="col-sm-offset-2 col-sm-10">
																					<a href="registrasi">Registrasi disini</a> |
																					<a href="lp">Reset Password</a>
																		      <button type="submit" name="btnlogin" class="btn btn-default" style="float:right;">Sign In</button>
																		    </div>
																		  </div>
																		</form>
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
																			1<?php echo number_format($jml_member, 0, ",","."); ?>
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

														</div>

														<div class="col-md-12">
															<div class="panel panel-default">
															  <div class="panel-body">

															     <h1> CARA MENJADI MEMBER PREMIUM</h1>
															<p>
															    Apa itu member premium ? member premium adalah member yang telah kami aktifkan dan resmi menjadi member ordodev selamanya tanpa ada batasan waktu
															    <br/>
															    <br/>
															    Fasilitas apa yang di dapat ?? fasilitas yang di dapat di antarannya
															    <br/>
															    1. Dapat mendownload semua aplikasi di situs ordodev ini tanpa batasan  <br/>
															    2. Bisa konsultasi belajar gratis dari kami melalui grup whatsapp atau chat pribadi <br/>
															    3. Jika ada error aplikasi bisa kami bantu perbaiki dangan bimbingan kami <br/>
															    4. Bisa request aplikasi dengan kebutuhan anda .
															    5. dll
															    <br/>

															    Bagaimana menjadi member premium ???
															    Silahkan registrasi di  <a href="http://ordodev.com/registrasi">sini</a> kemudian cek inbok masuk di email akan ada langkah selanjutnya , kemudian untuk mengaktivasi akun anda silahkan berdonasi Rp. 100.000 ke daftar rekening di bawah ini , setelah itu konfirmasi ke no 082377168756 <br/>
															    Jika ingin bertanya-tanya dulu silahkan !.
															    <br/>



															</p>

  <table width="1300" border="1"  class='table table-bordered table-striped'>
    <tr>
      <td colspan=4><span >

     <b><h3>Setelah melakukan registrasi silahkan anda berdonasi senilai 100.000  ke No Rekening di bawah ini untuk mengaktifkan akun anda dan nikmati download ratusan aplikasi di ordodev hanya 100.000 saja : </h3> </b> </span></td>
    </tr>

    <tr>
      <td>
        <p class="style2"><h2><b>BRI :</b> <br> No Rek : <b>7739-01-004076-53-8</b> <br>a/n : Marsuki</h2></p>
    </td>
    <td>
        <p class="style2"><h2><b>BCA :</b> <br> No Rek : <b>787-045-8783</b> <br>a/n : Marsuki</h2></p>
    </td>

    <td>
        <p class="style2"><h2><b>MANDIRI :</b> <br> No Rek : <b>110-00-09752285</b> <br>a/n : Marsuki</h2></p>
    </td>
<td>
        <p class="style2"><h2><b>BNI :</b> <br> No Rek : <b>0489-120-649</b> <br>a/n : Marsuki</h2></p>
    </td>

    </tr>
    <tr>
      <td colspan=4><span class="style2">
          <h3>Setelah melakukan transfer silahkan konfirmasikan melalui sms /
           whatsapp 0823 77168 756 kami akan mengirim kode aktivasi untuk mengaktifkan akun anda.<br/>


       </h3>
      </span></td>
    </tr>
  </table>

															  </div>
															</div>
														</div>
													</article>
											</div>
									</div>
							</div>

						</div>

				</div>
