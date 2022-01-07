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
                        <h6>Data Pegawai</h6>
                    </div>
                    <div class="col s2">
                    <a class="btn modal-trigger" href="<?= site_url('Master/Pegawai/Tambah') ?>">Tambah Data</a>
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
                    <table id="tb-pegawai" class="display" style="width:100%;white-space: nowrap !important;overflow: hidden;">
                        <thead>
                            <tr>
															<th>No</th>
															<th>NIP Lama</th>
															<th>NIP Baru</th>
															<th>Nama Lengkap</th>
															<th>Pangkat</th>
															<th>Jabatan</th>
															<th>Unit</th>
															<th>Aksi</th>
                          	</tr>
                        </thead>
                        <tbody>
						<?php
						$no=1;
							foreach($pegawai as $p){
						?>
							<tr style="white-space: normal; overflow: hidden;">
								<td><?php echo $no ?></td>
								<td style="width: 10%;"><?php echo $p->niplama ?></td>
								<td style="width: 20%;"><?php echo $p->nip ?></td>
								<td style="width: 30%;"><?php echo $p->nama_lengkap ?></td>
								<td><?php echo $p->nama_pangkat ?></td>
								<td style="width: 20%;"><?php echo $p->jabatan ?></td>
								<td style="width: 20%;"><?php echo $p->namaunit_lengkap ?></td>
								<td>
									<a href="<?= site_url('Master/Pegawai/ubah/'.$p->id) ?>"><i class="material-icons green-text">edit</i></a>
								</td> 
							
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
  <!-- </div> -->

  <?php include(APPPATH . 'views/Footer/Footer.php') ?>
  <?php include('script.php');?>
	
