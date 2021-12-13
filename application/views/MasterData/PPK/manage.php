<?php include(APPPATH . 'views/Header/Aside.php') ?>

<!-- Page Length Options -->
 <div class="row">

  <div class="col s12">
        <div class="card" id="head">
            <div class="card-content" >
                <div class="row">
                    <div class="col s1">
                        <button type="button" class="btn-floating" style=""><i class="material-icons">
                        confirmation_number</i></button>
                    </div>
                    <div class="col s9">
                        <h6>Data PPK</h6>
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

  <!-- <div class="section section-data-tables"> -->
      <div class="row">
        <div class="col s12">
          <div class="card">
            <div class="card-content">
              <div class="row">
                <div class="col s12">
                    <table id="tb-ppk" class="display" style="width: 100%;">
                        <thead>
                            <tr>
								<th>No</th>
								<th>Nama PPK</th>
								<th>Aksi</th>
                          	</tr>
                        </thead>
                        <tbody>
						<?php
						$no=1;
							foreach($ppk as $p){
						?>
							<tr style="white-space: normal; overflow: hidden;">
								<td style="width: 5%;"><?php echo $no ?></td>
								<td style="width: 25%;"><?php echo $p->uraian_ppk ?></td>
								<td style="width: 10%;">
									<a href="javascript:;" onclick="Edit('<?= $p->id ?>')"><i class="material-icons green-text">edit</i></a>
									<a href="javascript:;" onclick="Delete('<?= $p->id ?>')"><i class="material-icons red-text">delete</i></a>
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

	<?php include('modal.php');?>
  <?php include(APPPATH . 'views/Footer/Footer.php') ?>
  <?php include('script.php');?>
	
