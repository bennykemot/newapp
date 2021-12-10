<?php include(APPPATH . 'views/Header/Aside.php') ?>


					<!-- card stats start -->
					<!-- <div class="card">

					</div>
					<div id="card-stats" class="pt-0">
						<div class="row">
						<?php echo $this->session->userdata("last_visited"); ?>
							<div class="col s12 m8 l4">
								<div class="card animate fadeLeft">
									<div class="card-content cyan white-text">
										<p class="card-stats-title"><i class="material-icons">person_outline</i></p>
										<h4 class="card-stats-number white-text">Anggaran</h4>
										<p class="card-stats-compare"><span class="cyan text text-lighten-5"></span>
										</p>
									</div>
									<div class="card-action cyan darken-1">
										<div id="clients-bar" class="center-align"></div>
									</div>
								</div>
							</div>
							<div class="col s12 m8 l4">
								<div class="card animate fadeLeft">
									<div class="card-content red accent-2 white-text">
										<p class="card-stats-title"><i class="material-icons">attach_money</i></p>
										<h4 class="card-stats-number white-text">Transaksi</h4>
										<p class="card-stats-compare"><span class="red-text text-lighten-5">
										</p>
									</div>
									<div class="card-action red">
										<div id="sales-compositebar" class="center-align"></div>
									</div>
								</div>
							</div>
							<div class="col s12 m8 l4">
								<div class="card animate fadeRight">
									<div class="card-content orange lighten-1 white-text">
										<p class="card-stats-title"><i class="material-icons">trending_up</i></p>
										<h4 class="card-stats-number white-text">Laporan</h4>
										<p class="card-stats-compare">
										</p>
									</div>
									<div class="card-action orange">
										<div id="profit-tristate" class="center-align"></div>
									</div>
								</div>
							</div>
						</div>
					</div> -->
					<!--card stats end-->
          
				
<?php include(APPPATH . 'views/Footer/Footer.php') ?>
<script src="<?= base_url().'assets'?>/app-assets/js/scripts/dashboard-analytics.min.js"></script>
<script src="<?= base_url().'assets'?>/app-assets/vendors/sparkline/jquery.sparkline.min.js"></script>
<script src="<?= base_url().'assets'?>/app-assets/vendors/chartjs/chart.min.js"></script>
