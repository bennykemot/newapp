<?php include(APPPATH . 'views/Header/Aside.php') ?>

<!-- Page Length Options -->
 <div class="row">

  <div class="col s12">
        <div class="card" id="head">
            <div class="card-content" >
                <div class="row">
                    <div class="col s1">
                        <button type="button" class="btn-floating" style=""><i class="material-icons">
                        face</i></button>
                    </div>
                    <div class="col s9">
                        <h6>Data Jabatan</h6>
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
                    <table id="tb-jabatan" class="display">
                        <thead>
                            <tr>
								<th>No</th>
								<th>Jabatan</th>
								<!-- <th>Aksi</th> -->
                          	</tr>
                        </thead>
                        <tbody>
							<?php
							$no=1;
								foreach($jabatan as $jbtn){
							?>
								<tr style="white-space: normal; overflow: hidden;">
								<td style="width: 5%;"><?php echo $no ?></td>
								<td style="width: 60%;"><?php echo $jbtn->jabatan ?></td>
								<!-- <td>
									<a href="<?= site_url('Master/Pegawai/ubah/'.$jbtn->id) ?>"><i class="material-icons green-text">edit</i></a>
								</td>  -->
							<?php
								$no++;
								}
							?>
							
                      </tbody>
                    </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>


  <?php include(APPPATH . 'views/Footer/Footer.php') ?>
  <?php include('script.php');?>
	
