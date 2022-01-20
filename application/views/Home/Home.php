<?php include(APPPATH . 'views/Header/Aside.php') ?>

	<!--LOGO-->
	<!-- <div id="sales-chart">
            <div class="row">
				<div class="col s6 m4 l4">
                  <div id="weekly-earning" class="card animate fadeUp">
                     <div class="card-content">
                                 <img class="responsive-img border-radius-8 z-depth-4" src="<?= base_url().'assets'?>/app-assets/images/logo/LOGO-BISMA.png" alt="images">
                     </div>
                  </div>
               </div>
               <div class="col s6 m8 l8">
                  <div id="revenue-chart" class="card animate fadeUp">
                     <div class="card-content center-align">
                                 
                                    <h4 class="m-0"><b>BISMA</b></h4>
                                    <h5>Bijak Innovative Spending Management</h5>
                                    <h6 class="amber-text mt-2">
                                       Mohon bersabar ya
                                       </h6>
                                       <i class="material-icons amber-text small-ico-bg mb-5">tag_faces</i>
                     </div>
                  </div>
               </div>
            </div>
         </div> -->
   <!-- LOGO -->
						<div class="row">
                    <!-- <div class="col s12">
                      <div class="card card-border z-depth-2">
                        <div class="card-content">
                          <div class="row">
                            <div class="col s4 pr-0 circle center">
                              <a href="#"><img class="responsive-img circle" style="width: 60%" src="<?= base_url().'assets'?>/app-assets/images/logo/LOGO-BISMA.png" alt=""></a>
                            </div>
                            <div class="col s8">
                              <a href="#">
											<h4 class="font-weight-900 text-uppercase"><a href="#">BISMA</a></h4>
                              </a>
										  <h5>Bijak Innovative Spending Management</h5>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div> -->
						  <div class="col s12 m12">
								<div class="card gradient-shadow grey lighten-3 border-radius-3 animate fadeUp">
									<div class="card-content center">
										<img src="<?= base_url().'assets'?>/app-assets/images/logo/LOGO-BISMA.png" class="width-10" alt="BISMA">
										<h4 class="font-weight-900 text-uppercase"><a href="#">BISMA</a></h4>
										<h5>Bijak Innovative Spending Management</h5>
									</div>
								</div>
            </div>
                  </div>

   <!-- PERJADIN INFO -->
   <div id="ecommerce-offer">
         <div class="row">
            <div class="col s12 m3">
               <div class="card gradient-shadow grey lighten-3 border-radius-3 animate fadeUp">
                  <div class="card-content center">
                     <img src="<?= base_url().'assets'?>/app-assets/images/icon/letter.png" class="width-40" alt="Pengajuan oleh Operator">
                     <h5 class="black-text lighten-4"><?=$status1[0]->status_count?></h5>
                     <p class="black-text lighten-4"><?=$status1[0]->status_nama?></p>
                  </div>
               </div>
            </div>
            <div class="col s12 m3">
               <div class="card gradient-shadow teal lighten-3 border-radius-3 animate fadeUp">
                  <div class="card-content center">
                     <img src="<?= base_url().'assets'?>/app-assets/images/icon/file.png" class="width-40" alt="Persetujuan PPK">
                     <h5 class="black-text lighten-4"><?=$status2[0]->status_count?></h5>
                     <p class="black-text lighten-4"><?=$status2[0]->status_nama?></p>
                  </div>
               </div>
            </div>
            <div class="col s12 m3">
               <div class="card gradient-shadow yellow lighten-3 border-radius-3 animate fadeUp">
                  <div class="card-content center">
                     <img src="<?= base_url().'assets'?>/app-assets/images/icon/done.png" class="width-40" alt="Persetujuan Eselon 2/KPA">
                     <h5 class="black-text lighten-4"><?=$status3[0]->status_count?></h5>
                     <p class="black-text lighten-4"><?=$status3[0]->status_nama?></p>
                  </div>
               </div>
            </div>
            <div class="col s12 m3">
               <div class="card gradient-shadow red lighten-3 border-radius-3 animate fadeUp">
                  <div class="card-content center">
                     <img src="<?= base_url().'assets'?>/app-assets/images/icon/transaction.png" class="width-40" alt="Persetujuan Eselon 2/KPA">
                     <h5 class="black-text lighten-4"><?=$status4[0]->status_count?></h5>
                     <p class="black-text lighten-4"><?=$status4[0]->status_nama?></p>
                  </div>
               </div>
            </div>

            <!-- BAWAH -->
            <div class="col s12 m3">
               <div class="card gradient-shadow brown lighten-3 border-radius-3 animate fadeUp">
                  <div class="card-content center">
                     <img src="<?= base_url().'assets'?>/app-assets/images/icon/signature.png" class="width-40" alt="Pengajuan oleh Operator">
                     <h5 class="black-text lighten-4"><?=$status5[0]->status_count?></h5>
                     <p class="black-text lighten-4"><?=$status5[0]->status_nama?></p>
                  </div>
               </div>
            </div>
            <div class="col s12 m3">
               <div class="card gradient-shadow deep-purple lighten-3 border-radius-3 animate fadeUp">
                  <div class="card-content center">
                     <img src="<?= base_url().'assets'?>/app-assets/images/icon/search.png" class="width-40" alt="Persetujuan PPK">
                     <h5 class="black-text lighten-4"><?=$status6[0]->status_count?></h5>
                     <p class="black-text lighten-4"><?=$status6[0]->status_nama?></p>
                  </div>
               </div>
            </div>
            <div class="col s12 m3">
               <div class="card gradient-shadow pink lighten-3 border-radius-3 animate fadeUp">
                  <div class="card-content center">
                     <img src="<?= base_url().'assets'?>/app-assets/images/icon/time-is-money.png" class="width-40" alt="Persetujuan Eselon 2/KPA">
                     <h5 class="black-text lighten-4"><?=$status7[0]->status_count?></h5>
                     <p class="black-text lighten-4"><?=$status7[0]->status_nama?></p>
                  </div>
               </div>
            </div>
            <div class="col s12 m3">
               <div class="card gradient-shadow light-blue lighten-3 border-radius-3 animate fadeUp">
                  <div class="card-content center">
                     <img src="<?= base_url().'assets'?>/app-assets/images/icon/folder.png" class="width-40" alt="Persetujuan Eselon 2/KPA">
                     <h5 class="black-text lighten-4"><?=$status8[0]->status_count?></h5>
                     <p class="black-text lighten-4"><?=$status8[0]->status_nama?></p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- PERJADIN INFO -->

		
	<div id="card-stats" class="pt-0">
      <div class="row">
         <div class="col s12 m6 l6 xl3">
            <div class="card gradient-45deg-light-blue-cyan gradient-shadow min-height-100 white-text animate fadeLeft">
               <div class="padding-4">
                  <div class="row">
                     <div class="col s4 m2">
                        <i class="material-icons background-round mt-5">timeline</i>
                        <p></p>
                     </div>
                     <div class="col s8 m10 center-align">
                        <h5 class="mb-0 white-text">Dashboard</h5>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col s12 m6 l6 xl3">
            <div class="card gradient-45deg-red-pink gradient-shadow min-height-100 white-text animate fadeLeft">
               <div class="padding-4">
                  <div class="row">
                     <div class="col s4 m2">
                        <i class="material-icons background-round mt-5">attach_money</i>
                        <p></p>
                     </div>
                     <div class="col s8 m10 center-align">
                        <h5 class="mb-0 white-text">Anggaran</h5>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col s12 m6 l6 xl3">
            <div class="card gradient-45deg-amber-amber gradient-shadow min-height-100 white-text animate fadeRight">
               <div class="padding-4">
                  <div class="row">
                     <div class="col s4 m2">
                        <i class="material-icons background-round mt-5">domain</i>
                        <p></p>
                     </div>
                     <div class="col s8 m10 center-align">
                        <h5 class="mb-0 white-text">Rencana Kegiatan</h5>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col s12 m6 l6 xl3">
            <div class="card gradient-45deg-green-teal gradient-shadow min-height-100 white-text animate fadeRight">
               <div class="padding-4">
                  <div class="row">
                     <div class="col s4 m2">
                        <i class="material-icons background-round mt-5">people</i>
                        <p></p>
                     </div>
                     <div class="col s8 m10 center-align">
                        <h5 class="mb-0 white-text">Pengaturan</h5>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!--card stats end-->
          
				
<?php include(APPPATH . 'views/Footer/Footer.php') ?>
<!-- <script src="<?= base_url().'assets'?>/app-assets/js/scripts/dashboard-analytics.min.js"></script>
<script src="<?= base_url().'assets'?>/app-assets/vendors/sparkline/jquery.sparkline.min.js"></script>
<script src="<?= base_url().'assets'?>/app-assets/vendors/chartjs/chart.min.js"></script> -->
