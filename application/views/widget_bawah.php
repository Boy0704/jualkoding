<div style="clear: both"></div>
<div class="container-fluid" style="background:#e1e1e1;padding-top:20px;padding-bottom:20px;">

<div class="col-xl-12 ">
    <div class="row row-featured">

                <?php
                $this->db->join('tbl_kat','tbl_kat.id_kat=tbl_app.id_kat');
            		$this->db->order_by('tbl_app.id_app', 'RANDOM');
                $this->db->limit(4);
                $v_data = $this->db->get('tbl_app');
                foreach ($v_data->result() as $key => $baris):
                  $link_kat = 'd/'.$baris->url;
                  $toko = '';
                  $jml_foto = '';?>
                  <div class="col-md-3">
                    <div class="item-list content-box" style="cursor:pointer;padding:0px;">
                      <div class="row">
                          <div class="col-md-12 no-padding photobox">
                              <div class="add-image"><span class="photo-count"><i class="fa fa-camera"></i> <?php echo $jml_foto; ?> </span>
                                <a href="<?php echo $link_kat; ?>"><img class="thumbnail no-margin" src="images/app/<?php echo $baris->img; ?>" title="<?php echo ucwords($baris->nama_app); ?>" alt="<?php echo ucwords($baris->nama_app); ?>" width="50" height="150"></a>
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

</div>
