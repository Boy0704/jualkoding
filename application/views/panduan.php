<div class="main-container">
<div class="container">
	<?php
	echo $this->session->flashdata('msg_download');?>
		<div class="row">
			<div class="col-md-12 page-content col-thin-right">
					<div class="inner inner-box ads-details-wrapper">
							<h2>PANDUAN</h2>
							<span class="info-row"></span>
							<div class="Ads-Details">

								Isi Panduan . . .

									<hr>
									<b>Keyword:</b> <i>Panduan</i>
									<hr>
									<div class="content-footer text-left">
										<a href="tel:<?php echo $web->no_hp; ?>" class="btn  btn-info"><i class=" icon-phone-1"></i> <?php echo $web->no_hp; ?> </a>
									</div>
							</div>
					</div>
					<!--/.ads-details-wrapper-->

			</div>

		</div>

</div>
</div>

<?php $this->load->view('widget_bawah'); ?>
