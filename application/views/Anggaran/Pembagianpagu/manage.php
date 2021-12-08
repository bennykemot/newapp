<?php include(APPPATH . 'views/Header/Aside.php') ?>

<!-- Page Length Options -->
 <div class="row">

  <div class="col s12">
        <div class="card" id="head">
            <div class="card-content" >
                <div class="row">
                    <div class="col s1">
                        <button type="button" class="btn-floating" style=""><i class="material-icons">
                        turned_in_not</i></button>
                    </div>
                    <div class="col s9">
                        <h6> Pembagian Pagu Anggaran </h6>
                    </div>
                    <!-- <div class="col s2">
                    <a class="btn modal-trigger" href="#modal2">Tambah Data</a>
                    </div> -->
                </div>
								<div class="row">
										<div class="col s1">
                    </div>
                    <div class="col s9">
                        <!-- <div class="col s4">
													<p>DIPA-089.01.2.418119/2021 Revisi ke 0</p>
												</div>
												<div class="col s4">
													<h6>Tanggal: 20 November 2021</h6>
												</div>
												<div class="col s4">
													<h6>Rp 1.625.000.000,-</h6>
												</div> -->
												<table class="mt-1">
													<thead></thead>
													<tbody>
														<tr>
															<td>DIPA-089.01.2.418119/2021 Revisi ke 0</td>
															<td>Tanggal: 20 November 2021</td>
															<td>Rp 1.625.000.000,-</td>
														</tr>
													</tbody>
												</table>
                    </div>
										</div>
            </div>
        </div>
    </div>
     <!-- Page Length Options -->
     
  </div>

  <!-- <div class="section section-data-tables"> -->
      <div class="row">
        <div class="col s12">
          <div class="card">
            <div class="card-content">
              <div class="row">
                <div class="col s12">
                  
                    <table id="tb-pembagianpagu" class="display" style="width:100%">
                        <thead>
                            <tr>
                              <th>Kegiatan</th>
                              <th>Output</th>
                              <th>Sub<br>Output</th>
                              <th>Komponen</th>
                              <th style="width: 30%;">Uraian</th>
                              <th>Sub<br>Komponen</th>
                              <th style="width: 20%;">Uraian</th>
                              <th>Akun</th>
                              <th style="width: 20%;">Uraian</th>
                              <th style="width: 15%;">Jumlah (Rp)</th>
                              <th>Alokasi</th>
                          </tr>
                        </thead>
                        <tbody>
												
														<tr style="white-space: nowrap !important;overflow: hidden;">
														<td>3667</td>
														<td>AEA</td>
														<td>960</td>
														<td>001</td>
														<td>Pembayaran Gaji dan Tunjangan</td>
														<td>SU3</td>
														<td>Biro Keuangan</td>
														<td>511111</td>
														<td>Belanja Gaji Pokok PNS</td>
														<td>100.000.000</td>
														<td>
														<a href="<?= site_url() ?>Anggaran/Pembagianpagu/Tambah"><i class="material-icons green-text">edit</i></a>
														
                            
                                
                              
                      </tbody>
                    </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  <!-- </div> -->

  <?php include('modal.php');?>
  <?php include(APPPATH . 'views/Footer/Footer.php') ?>
  <?php include('script.php');?>
