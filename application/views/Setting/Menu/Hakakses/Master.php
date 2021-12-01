<?php include(APPPATH . 'views/Header/Aside.php') ?>


<!-- Page Length Options -->
<div class="row">

<div class="col s12">
      <div class="card" id="head">
          <div class="card-content" >
              <div class="row">
                  <div class="col s1">
                      <button type="button" class="btn-floating" style=""><i class="material-icons">
                      accessibility</i></button>
                  </div>
                  <div class="col s9">
                      <h6> Setting Hak Akses </h6>
                  </div>
                  <div class="col s2">
                  <a class="btn modal-trigger" href="#modal2">Tambah Data</a>
                  </div>
              </div>
          </div>
      </div>
  </div>
   <!-- Page Length Options -->
   
</div>


<div class="section section-data-tables">
      <div class="row">
        <div class="col s12">
          <div class="card">
            <div class="card-content">
              <div class="row">
                <div class="col s12">
                        <table class="display" id="table">
                          <thead>
                                <tr>
                                  <td>No</td>
                                  <!-- <td>Id</td> -->
                                  <!-- <td>Username</td> -->
                                  <td>Menu</td>
                                  <td>C</td>
                                  <td>R</td>
                                  <td>U</td>
                                  <td>D</td>
                                  <td>Aksi</td>
                                </tr>
                          </thead>
                          
                          <tbody>
													<?php 
														foreach($hakakses as $ha){
													?>
														<tr style="white-space: nowrap !important;overflow: hidden;">
														<td><?php echo $ha->id_hakakses ?></td>
														<td><?php echo $ha->nama_menu ?></td>
														<td><?php echo hakAkses($ha->C)?></td>
														<td><?php echo hakAkses($ha->R)?></td>
														<td><?php echo hakAkses($ha->U)?></td>
														<td><?php echo hakAkses($ha->D)?></td>
														<td>
                                  <a href="javascript:;" onclick="Edit('<?= $ha->id_hakakses ?>')"><i class="material-icons green-text">edit</i></a>
                                  <a href="javascript:;" onclick="Delete('<?= $ha->id_hakakses ?>')"><i class="material-icons red-text">delete</i></a>
                                </td>
													<?php
														}
													?>
                          </tbody>
                        </table>
											<div id="page-length-option_paginate" class="dataTables_paginate paging_simple_numbers">
                			<?= $this->pagination->create_links(); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>

<?php include(APPPATH . 'views/Footer/Footer.php') ?>
<?php include('script.php');?>
