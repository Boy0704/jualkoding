<br>
<div class="container">
	<?php
	echo $this->session->flashdata('msg_download');?>
	<div class="row">
    <div class="col-xl-12 content-box ">
        <div class="row row-featured row-featured-category">
            <div class="col-xl-12  box-title no-border">
                <div class="inner"><h2>Kategori</h2></div>
                <hr style="margin:0px;padding:0px;">
            </div>
            <?php foreach ($v_kat->result() as $key => $value):
              $img=$this->Mcrud->cek_filename("kategori/thumb/",$value->gambar); ?>
              <div class="col-xl-2 col-md-3 col-sm-3 col-xs-4 f-category" style="height:200px;width:200px;">
                  <a href="kategori/p/<?php echo url_title($value->kat); ?>">
                    <img src="<?php echo $img; ?>" class="img-responsive" alt="img">
                    <h6> <?php echo $value->kat; ?> </h6>
                  </a>
              </div>
            <?php endforeach; ?>
        </div>
    </div>
	</div>
</div>
