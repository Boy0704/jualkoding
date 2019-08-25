<div class="main-container">
<div class="container">
	<?php
	echo $this->session->flashdata('msg_download');?>
		<div class="row">
			<div class="col-md-12 page-content col-thin-right">
					<div class="inner inner-box ads-details-wrapper">
							<h2>JUDUL TA</h2>
							<span class="info-row"></span>
							<div class="Ads-Details">

								<table id="tablex" class="table table-bordered table-striped table-hover" cellpadding="0" cellspacing="0" width="100%">
										<thead>
												<tr>
													<th width="10">#</th>
													<th>Judul TA</th>
													<th width="100" style="text-align:center">Aksi</th>
												</tr>
										</thead>
										<tbody>
											<tr>
												<td>1.</td>
												<td>-</td>
												<td style="text-align:center">
													<a href="pesan" class="btn btn-primary"><i class="fa fa-envelope"></i> Pesan</a>
												</td>
											</tr>
										</tbody>
								</table>

									<hr>
									<b>Keyword:</b> <i>Judul-TA</i>
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
