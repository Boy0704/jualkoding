<script type="text/javascript">
// Load Images
function init() {
var loader_class = 'img-preloader',
  $imgDefer = $('img.' + loader_class);

if ($imgDefer.length == 0)
  return false;

var default_src = "images/ordodev.png",
  load_default;


$imgDefer.each(function()
{
  var $img_loader = $(this),
    src = $img_loader.attr('data-src');

  if (src != '')
  {
    $('<img>').attr('src', src).load(function(data) {
      $img_loader.attr('src', src).removeClass(loader_class).hide().fadeIn('fast');
      $(this).remove();
    }).error(function(e)
    {
      $('<img>').attr('src', default_src).load(function(data) {
        $img_loader.attr('src', default_src).removeClass(loader_class).hide().fadeIn('fast');
        $(this).remove();
      });
    })
  } else {
    $('<img>').attr('src', default_src).load(function(data) {
      $img_loader.attr('src', default_src).removeClass(loader_class).hide().fadeIn('fast');
      $(this).remove();
    });
  }
})
}

// Cross browser for onload event
if (window.addEventListener)
window.addEventListener("load", init);
else if (window.attachEvent)
window.attachEvent("onload", init);
else
window.onload = init;
</script>


<script type="text/javascript">
    (function () {
        var options = {
            facebook: "ordodev", // Facebook page ID
            whatsapp: "+6282377168756", // WhatsApp number
            company_logo_url: "images/carmel-coat-of-arms1.gif", // URL of company logo (png, jpg, gif)
            greeting_message: "Mau cari aplikasi apa gan ??", // Text of greeting message
            call_to_action: "Kirim pesan di sini gan !!!", // Call to action
            button_color: "#FF6550", // Color of button
            position: "left", // Position may be 'right' or 'left'
            order: "facebook,whatsapp" // Order of buttons
        };
        var proto = document.location.protocol, host = "whatshelp.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>
<!-- BEGIN JIVOSITE CODE {literal} -->
<script type='text/javascript'>
(function(){ var widget_id = 'lA8Z9gX2qg';var d=document;var w=window;function l(){var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true;s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();
</script>
<!-- {/literal} END JIVOSITE CODE -->
<!--<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>-->
<!-- dunvo_main_Blog1_1x1_as -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-2787648772467726"
     data-ad-slot="9978719895"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>


      </div>
  </div>

  <?php
  $ceks = $this->session->userdata('ordodev@2017'); ?>

  <footer class="footer">
    <div class="container-fluid" style="background-color:#333;">
      <div class="col-md-3" align="left">
         <h2>Tentang antaradev</h2>
                    <hr>
                    <p>
                        Ordodev Adalah situs komunitas download source code berbasis web, anda cukup menjadi member maka semua source code di akan anda dapatkan secara gratis 100%.
                    </p>
      </div>
      <div class="col-md-3">


           <h2>Informasi Kontak</h2>
                    <hr>
                    TERIMA JASA PEMBUATAN APLIKASI DAN WEBSITE
                    <i class="fa fa-envelope-o"></i> <a href="mailto:#">&nbsp; ordodev@gmail.com</a> <br/>
                    <i class="glyphicon glyphicon-phone-alt"></i> <a href="tel:#"> &nbsp; 0823-7716-8756</a><br/>
                    <a href="https://www.facebook.com/pondoksoftblog/" target="blank">
                            <i class="fa fa-comment"></i> </i> <b>&nbsp; LIVE CHAT</b></a>
                            <br>
                    <b style="color:#009f8b;" >Total Pengunjung Website: 3,627,373 Kali</b>
                     <!-- Histats.com  (div with counter) --><div id="histats_counter"></div>
<!-- Histats.com  START  (aync)-->
<script type="text/javascript">var _Hasync= _Hasync|| [];
_Hasync.push(['Histats.start', '1,3883440,4,408,270,55,00011101']);
_Hasync.push(['Histats.fasi', '1']);
_Hasync.push(['Histats.track_hits', '']);
(function() {
var hs = document.createElement('script'); hs.type = 'text/javascript'; hs.async = true;
hs.src = ('//s10.histats.com/js15_as.js');
(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
})();</script>
<noscript><a href="/" target="_blank"><img class="img-preloader" src="<?php echo $this->Mcrud->imageBase64FromURL("//sstatic1.histats.com/0.gif?3883440&101"); ?>" data-src="//sstatic1.histats.com/0.gif?3883440&101" alt="counter hit make" border="0"></a></noscript>
<!-- Histats.com  END  -->
 <!-- Histats.com  (div with counter) -->
<!-- Histats.com  START  (aync)-->
<!-- Histats.com  END  -->
      </div>
      <div class="col-md-6">
      <h2>Ikuti Sosmed Kami</h2>

                    <hr>
                   <ul class="social-links nav nav-pills">
                        <li><a href="https://facebook.com/pondoksoft" target="blank"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://twitter.com/pondoksoft" target="blank"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="https://instagram.com/pondoksoft" target="blank"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                    </ul><!-- /.header-nav-social -->


 <div class="fb-page" data-href="https://www.facebook.com/id.ordodev/" data-small-header="false" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/id.ordodev/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/id.ordodev/">ORDODEV</a></blockquote></div>

    </div>
<!-- <script type='text/javascript'>
$(document).ready(function() {$(&#39;img#closed&#39;).click(function(){$(&#39;#bl_banner&#39;).hide(90);});});
</script> -->
<div id='fixedban' style='width:100%;margin:auto;text-align:center;float:none;overflow:hidden;display:scroll;position:fixed;bottom:0;z-index:999;-webkit-transform:translateZ(0);'>
<div><a id='close-fixedban' onclick='document.getElementById(&apos;fixedban&apos;).style.display = &apos;none&apos;;' style='cursor:pointer;'><img alt='close' class="img-preloader" src="<?php echo $this->Mcrud->imageBase64FromURL(base_url()."assets/img/btn_close.png"); ?>" data-src='assets/img/btn_close.png' title='close button' style='vertical-align:middle;'/></a></div>
<div style='text-align:center;display:block;max-width:728px;height:auto;overflow:hidden;margin:auto'>
<a href='#' title='Banner iklan disini'><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- responsive -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-2787648772467726"
     data-ad-slot="9924388140"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script></a>
</div>
</div>

</body>

</html>
