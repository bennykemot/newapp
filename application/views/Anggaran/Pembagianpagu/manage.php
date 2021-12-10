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
                    <div class="col s11">
                        <!-- <div class="col s4">
													<p>DIPA-089.01.2.418119/2021 Revisi ke 0</p>
												</div>
												<div class="col s4">
													<h6>Tanggal: 20 November 2021</h6>
												</div>
												<div class="col s4">
													<h6>Rp 1.625.000.000,-</h6>
												</div> -->
												<table class="mt-1" width="100%">
													<thead></thead>
													<tbody>
														<tr>
															<td width="300px"><?=$head[0]->norevisi?></td>
															<td width="300px" class="text-right"><?=cek_tgl($head[0]->tgrevisi)?></td>
															<td width="300px" class="text-right"><?=rupiah($head[0]->jumlah)?></td>
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
                  
                    <table id="tb-pembagianpagu" class="display" style="width:100%;white-space: nowrap !important;overflow: hidden;">
                        <thead>
                            <tr>
                              <th></th>
                              <th>Program</th>
                              <th>Kegiatan</th>
                              <th>KRO</th>
                              <th>RO</th>
                              <th>Komp</th>
                              <th>Sub<br>Komp</th>
                              <th>Akun</th>
                              <th style="width: 20%;">Uraian</th>
                              <th style="width: 15%;">Anggaran</th>
                              <th>Alokasi</th>
                          </tr>
                        </thead>
                        <tbody>

                        <?php foreach($pp as $p){?>
												
														<tr>
                              <td><?=getBagipagu($p->unit_id)?></td>
                              <td><?=$p->kdprogram?></td>
                              <td><?=$p->kdgiat?></td>
                              <td><?=$p->kdoutput?></td>
                              <td><?=$p->kdsoutput?></td>
                              <td><?=$p->kdkmpnen?></td>
                              <td><?=$p->kdskmpnen?></td>
                              <td><?=$p->kdakun?></td>
                              <td><?=$p->nmakun?></td>
                              <td class="text-right"><?=rupiah($p->rupiah)?></td>
                              <td class="text-center">
                                <a href="<?= site_url('Anggaran/Pembagianpagu/Tambah/'.$p->kdindex) ?>"><i class="material-icons green-text">edit</i></a>
                              </td>
                            </tr>
                        
                        <?php } ?>
                                
                              
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
