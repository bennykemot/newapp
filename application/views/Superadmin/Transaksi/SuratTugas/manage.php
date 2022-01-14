<?php include(APPPATH . 'views/Header/Aside.php') ?>


 <div class="row">

  <div class="col s12">
        <div class="card" id="head">
            <div class="card-content" >
                <div class="row">
                    <div class="col s1">
                        <button type="button" class="btn-floating" style=""><i class="material-icons">
                        email</i></button>
                    </div>
                    <div class="col s9">
                        <h6> Daftar Surat Tugas Per Satuan Kerja</h6>
                    </div>
                    
                    <!-- <div class="col s2">
                        <a class="btn modal-trigger" href="<?= site_url('Transaksi/SuratTugas/Tambah/'.$kdsatker.'/'.$unit_id.'/'.$role_id) ?>">Tambah Data</a>
                    </div> -->
                    
                </div>
            </div>
        </div>
    </div>
 </div>
		<div class="row">
    <div class="col s12">
      <div class="card">
        <div class="card-content">
          <h4 class="card-title col s10"></h4>
          <!-- <a class="btn modal-trigger col s2" href="#modal2">Tambah Data</a> -->
          <div class="row">
            <div class="col s12">
              <table id="tb-st" class="display" style="white-space: normal;width: 100%;">
                  <thead>
                    <tr>
                        <th style="min-width: 5px" >NO</th>
                        <th>KODE SATKER</th>
                        <th>NAMA SATKER</th>
												<th>JUMLAH ST</th>
												<th>AKSI</th>
                        
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                           // $no = $this->uri->segment('4') + 1;
                           $no = 1;
                            foreach($satker as $u){ 
                              ?>
                        <tr>
                            <td class="text-center"><?php echo $no ?></td>
                            <td><?php echo $u->kdsatker ?></td>
														<td><?php echo $u->nmsatker ?></td>
                            <td class="text-center">
															<?php 
																if($u->count_id != "NULL" && $u->count_id != NULL && $u->count_id != 0){
															?>
																<span class="users-view-status chip blue lighten-5 blue-text"><?php echo $u->count_id ?></span>
															<?php
																}else{
															?>
																<span></span>
															<?php
																}
															?>
															
														</td>
														<td class="text-center"><a href="<?= site_url('Superadmin/Transaksi/SuratTugas/detail/'.$u->kdsatker)?>" class="waves-effect waves-light btn-small">Detail</a></td>
                        </tr>
                        <?php $no++;} ?>
                        
                  </tbody>
                </table>
                <?php echo $this->pagination->create_links(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
	</div>


    <div id="theme-cutomizer-out" class="theme-cutomizer sidenav row">
   <div class="col s12">
      <a class="sidenav-close" href="#!"><i class="material-icons">close</i></a>
      <h5 class="theme-cutomizer-title">Cetak Kwitansi</h5>
        <input type="text" id="id_st" name="id_st" hidden>
          <div class="menu-options">
            <hr class="customize-devider">
            <div class="menu-options-form row">
                <div class="input-field col s12 menu-bg-color mb-0">
                  
                  <a onclick="kwitansiRampung('Export/kwitansi/P/','kwitansi')" href="javascript:;" ><div class="card-panel green darken-1 btn col s12">
                      <span class="white-text">Kwitansi</span>
                    </div></a>

                    <a onclick="kwitansiRampung('Export/rincian_biaya/P/','rincian_biaya')" href="javascript:;"><div class="card-panel orange darken-1 btn col s12">
                      <span class="white-text">Rincian Biaya</span>
                    </div></a>

                    <a  onclick="kwitansiRampung('Export/pengeluaran_rill/P/','pengeluaran_rill')" href="javascript:;"><div class="card-panel red darken-1 btn col s12">
                      <span class="white-text">Daftar Pengeluaran Rill</span>
                    </div></a>

                    <a onclick="kwitansiRampung('Export/nominatif/L/','nominatif')" href="javascript:;"><div class="card-panel blue darken-1 btn col s12">
                      <span class="white-text">Daftar Nominatif</span>
                    </div></a>

                    <a onclick="kwitansiRampung('Export/perhitungan_rampung/P/','perhitungan_rampung')" href="javascript:;"><div class="card-panel deep-purple darken-1 btn col s12">
                      <span class="white-text">Perhitungan Rampung</span>
                    </div></a>

                </div>
            </div>
          </div>
   </div>
</div>
  <?php include('modal.php');?>
  <?php include(APPPATH . 'views/Footer/Footer.php') ?>
  <?php include('script.php');?>

