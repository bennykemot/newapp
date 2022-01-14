<?php include(APPPATH . 'views/Header/Aside.php') ?>

<!-- Page Length Options -->
 <div class="row">

  <div class="col s12">
        <div class="card" id="head">
            <div class="card-content" >
                <div class="row">
                    <div class="col s1">
                        <button type="button" class="btn-floating" style=""><i class="material-icons">
                        view_comfy</i></button>
                    </div>
                    <div class="col s9">
                        <h6> Mapping APP </h6>
                    </div>
                    
                </div>
								<div class="row">
										<div class="col s1">
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
                  
                    <table id="tb-mappingapp" class="display" style="width:100%;white-space: nowrap !important;overflow: hidden;">
                        <thead>
                            <tr>
															<th style="min-width: 5px" >NO</th>
															<th>KODE SATKER</th>
															<th>NAMA SATKER</th>
															<th>AKSI</th>
                          </tr>
                        </thead>
                        <tbody>
													<?php 
														$no = 1;
															foreach($mapp as $u){ 
																?>
													<tr>
															<td class="text-center"><?php echo $no ?></td>
															<td><?php echo $u->kdsatker ?></td>
															<td><?php echo $u->nmsatker ?></td>
															
															<td class="text-center"><a href="<?= site_url('Superadmin/Anggaran/Mappingapp/detail/'.$u->kdsatker)?>" class="waves-effect waves-light btn-small">Detail</a></td>
													</tr>
													<?php $no++;} ?>
                                
                              
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
