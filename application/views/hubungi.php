<div class="intro-inner" style="margin-top:49px;">
		<div class="contact-intro">
				<div class="w100 map">
						<iframe src="<?php echo $web->map; ?>" width="100%" height="350" frameborder="0" style="border:0"></iframe>
				</div>
		</div>
		<!--/.contact-intro || map end-->
</div>
<!-- /.intro-inner -->

<div class="main-container">
		<div class="container">
				<div class="row clearfix">
						<div class="col-md-4">
								<div class="contact_info">
										<h5 class="list-title gray"><strong>Kontak Kami</strong></h5>

										<div class="contact-info ">
												<div class="address">
														<p class="p1"><?php echo $web->alamat; ?></p>
														<br>
														<p>Email: <?php echo $web->email; ?></p>
														<p>No.HP/WA: <?php echo $web->no_hp; ?></p>

														<p>&nbsp;</p>

												</div>
										</div>

										<div class="social-list"><a target="_blank" href="https://twitter.com/"><i
														class="fa fa-twitter fa-lg "></i></a>
												<a target="_blank" href="https://www.facebook.com/"><i
																class="fa fa-facebook fa-lg "></i></a>
												<a target="_blank" href="https://plus.google.com/"><i
																class="fa fa-google-plus fa-lg "></i></a>
												<a target="_blank" href="https://www.pinterest.com/"><i class="fa fa-pinterest fa-lg "></i></a>
										</div>
								</div>
						</div>
						<div class="col-md-8">
								<div class="contact-form">
										<h5 class="list-title gray"><strong>Kontak Kami</strong></h5>
										<div class="err" id="add_err"></div>

										<form class="form-horizontal" method="post" action="javascript:void(0);" id="form-kontak">
												<fieldset>
														<div class="row">
																<div class="col-sm-12">
																		<div class="form-group">
																				<input id="firstname" name="nama" type="text" placeholder="Nama Lengkap" class="form-control">
																		</div>
																</div>

																<div class="col-sm-6">
																		<div class="form-group">
																						<input id="companyname" name="no_hp" type="text" placeholder="No. HP" class="form-control">
																		</div>
																</div>

																<div class="col-sm-6">
																		<div class="form-group">
																						<input id="email" name="email" type="text" placeholder="Email" class="form-control">
																		</div>
																</div>


																<div class="col-xl-12">
																		<div class="form-group">
																						<textarea class="form-control" id="message" name="pesan" placeholder="Masukkan saran/keluhan Anda untuk kami di sini. Kami akan menghubungi Anda dalam 2 hari kerja, jika diperlukan." rows="7"></textarea>
																		</div>
																</div>
																<div class="col-xl-12">
																	<div class="row">
																		<div class="col-md-10">
																			<div class="form-group">
																				 <div id="captcha_hitung" style="font:200% georgia; background:#333; color:#f1f1f1; padding:12px; display:inline-block;cursor:pointer;float:left"></div>
																				 <input type="number" class="form-control form-validation-inside" id="contact-me-captcha" placeholder="Masukan Hasil" name="captcha_hasil" data-constraints="@Required" style="max-width:150px;height:56px;border-top-left-radius:0px;border-bottom-left-radius:0px;">
																				 <div class="captcha_pesan"></div>
																				 <div id="cek_captcha_hasil"></div>
																			</div>
																		</div>
																		<div class="col-md-2">
																			<div class="form-group">
																							<button type="submit" class="btn btn-primary btn-lg btn-block" id="kirim"><i class="fa fa-send"></i> Kirim</button>
																			</div>
																		</div>
																	</div>
																</div>

														</div>


												</fieldset>
										</form>
								</div>
						</div>
				</div>
		</div>
</div>


<style>
  .closebtn{
    cursor: pointer;
  }
</style>
<script type="text/javascript" src="assets/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script type="text/javascript">

// var v_sending = '<div class="snackbars active" id="form-output-global"><p><span class="icon text-middle fa fa-circle-o-notch fa-spin icon-xxs"></span><span>Mengirim...</span></p></div>';
// var v_sukses  = '<div class="snackbars active" id="form-output-global"><p><span class="icon text-middle mdi mdi-check icon-xxs"></span><span>Successfully sent!</span></p></div>';

function number(evt)
{
  var theEvent = evt || window.event;
  var key = theEvent.keyCode || theEvent.which;
  key = String.fromCharCode( key );
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}

function reset(){
	$("#form-kontak")[0].reset();
  $('#kirim').val('Kirim');
	// $('#kirim').attr('disabled',false);
  var f = document.forms['form-kontak'];
  for(var i=0,fLen=f.length;i<fLen;i++){
    f.elements[i].disabled  = false;
  }
	tutup_err();
	$('[name="nama"]').focus(); // Focus to the username field on body loads
}

function tutup_err(){
	$("#add_err").css('display', 'none', 'important');
	$(".err").html('');
}

$(document).ready(function(){
  nama   = $('[name="nama"]');
  email  = $('[name="email"]');
  no_hp  = $('[name="no_hp"]');
  pesan  = $('[name="pesan"]');
  kirim  = $('#kirim').val();

  captcha_hitung = $('#captcha_hitung');
  cek_captcha_hasil = $('#cek_captcha_hasil');
  captcha_hasil  = $('[name="captcha_hasil"]');
  captcha_pesan  = $('.captcha_pesan');
  cek_captcha_hasil.attr('hidden',true);
  function random_captcha()
  {
    acak1=Math.floor(Math.random() * 9) + 1; // 1 - 9
    acak2=Math.floor(Math.random() * 9) + 1; // 1 - 9
    mtk="tambah,kurang,kali";
		mtkex=mtk.split(',');
		nmr= Math.floor(Math.random() * 3); //0 - 2

		if(mtkex[nmr]=="tambah"){
			hasil= acak1 + acak2;
			opr = "+";
		}else if(mtkex[nmr]=="kurang"){
			hasil = acak1 - acak2;
			opr = "-";
		}else if(mtkex[nmr]=="kali"){
			hasil = acak1 * acak2;
			opr = "*";
		}
    hitung = acak1+" "+opr+" "+acak2;
    cek_captcha_hasil.html(hasil);
    captcha_hitung.html(hitung);
  }
  captcha_hasil.keydown(function(){
    captcha_pesan.html('');
  });
  random_captcha();
  $("#captcha_hitung").click(function(){ random_captcha(); });

	reset();

 $("#kirim").click(function(){
    if(nama.val() == ''){ // Check the username values is empty or not
			 nama.focus(); // focus to the filed
			 $("#add_err").css('display', 'inline', 'important');
			 $(".err").html('<div class="alert alert-info"><span class="closebtn" onclick="tutup_err();">&times;</span>  <strong>Info!</strong> Nama wajib diisi.</div>');
			 return false;
		}

    if(no_hp.val() == ''){
			 no_hp.focus();
			 $("#add_err").css('display', 'inline', 'important');
			 $(".err").html('<div class="alert alert-info"><span class="closebtn" onclick="tutup_err();">&times;</span>  <strong>Info!</strong> No. Hp wajib diisi.</div>');
			 return false;
		}

    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if(email.val() == ''){
			 email.focus();
			 $("#add_err").css('display', 'inline', 'important');
			 $(".err").html('<div class="alert alert-info"><span class="closebtn" onclick="tutup_err();">&times;</span>  <strong>Info!</strong> Email wajib diisi.</div>');
			 return false;
		}
    if(!filter.test(email.val())){
			 email.focus();
			 $("#add_err").css('display', 'inline', 'important');
			 $(".err").html('<div class="alert alert-info"><span class="closebtn" onclick="tutup_err();">&times;</span>  <strong>Info!</strong> Email "'+email.val()+'" tidak valid. Sertakan "@" dan "." di alamat email. contoh: nama@domain.com</div>');
			 return false;
		}

    if(pesan.val() == ''){
			 pesan.focus();
			 $("#add_err").css('display', 'inline', 'important');
			 $(".err").html('<div class="alert alert-info"><span class="closebtn" onclick="tutup_err();">&times;</span>  <strong>Info!</strong> Pesan wajib diisi.</div>');
			 return false;
		}

    if(captcha_hasil.val() == ''){
			 captcha_hasil.focus(); // focus to the filed
			 $("#add_err").css('display', 'inline', 'important');
			 $(".err").html('<div class="alert alert-info"><span class="closebtn" onclick="tutup_err();">&times;</span>  <strong>Info!</strong> Captcha wajib diisi.</div>');
			 return false;
		}

    if (captcha_hasil.val() !== cek_captcha_hasil.html()) {
      random_captcha();
      captcha_hasil.focus(); // focus to the filed
      captcha_pesan.html('<p style="color:red;">*Hasil dari Captcha salah!</p>');
      return false;
    }

		$.ajax({
		 type: "POST",
		 data: "nama="+nama.val()+"&email="+email.val()+"&no_hp="+no_hp.val()+"&pesan="+pesan.val()+"&btnkirim="+kirim,
		 url: "hubungi",
		 cache: false,
		 dataType: "JSON",
		 beforeSend:function()
		 {
				$("#add_err").css('display', 'inline', 'important');
				$("#add_err").html("<br><img src='images/ajax-loader.gif' width='15'/> Loading... <a class='label label-warning' onclick='reset();' style='float:right;'>x Reset</a><br><br>");

        var f = document.forms['form-kontak'];
        for(var i=0,fLen=f.length;i<fLen;i++){
          f.elements[i].disabled  = true;
        }
				$('#kirim').val('Mengirim...');
		 },
		 success: function(data){
				$("#add_err").css('display', 'inline', 'important');
				if(data.sukses){
					$(".err").html(data.sukses)
				}
				else if(data.gagal){
					$(".err").html(data.gagal);
				}
				else{
					$(".err").html('<br><div class="alert"><span class="closebtn" onclick="tutup_err();">&times;</span>  <strong>Gagal!</strong><br> Silahkan coba lagi. <br><b><a href="javascript:void(0)" onclick="reset();" style="color:#f2f2f2;"><i class="glyphicon glyphicon-refresh"></i> Refresh Halaman!</a></b>.</div>');
				}
        // reset();
        $("#form-kontak")[0].reset();
        $('[name="nama"]').focus();
        var f = document.forms['form-kontak'];
        for(var i=0,fLen=f.length;i<fLen;i++){
          f.elements[i].disabled  = false;
        }
        $('#kirim').val('Kirim');
        random_captcha();
		 },
     error: function (jqXHR, textStatus, errorThrown)
     {
         $("#add_err").css('display', 'inline', 'important');
         $(".err").html('<br><div class="alert alert-danger"><span class="closebtn" onclick="tutup_err();">&times;</span>  <strong>Error!</strong> Silahkan coba lagi.</div>');
         var f = document.forms['form-kontak'];
         for(var i=0,fLen=f.length;i<fLen;i++){
           f.elements[i].disabled  = false;
         }
         $('#kirim').val('Kirim');
         random_captcha();
     }
		});
	return false;
	});
});
</script>
