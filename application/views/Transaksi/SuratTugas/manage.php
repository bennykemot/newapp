<?php include(APPPATH . 'views/Header/Aside.php') ?>


<!-- Page Length Options -->
 <div class="row">

 <!-- <div class="col s12">
        <div class="card" id="head">
          <div class="card-content" style="height: 120px; padding: 0px !important">
            <div class="col s1 display-flex justify-content-end" style="height: 100%;padding: 24px;padding-right: 34px; border-radius: 10px" >
              <button type="button" class="btn-floating" style=""><i class="material-icons">
              email
                </i></button>
            </div>
            <div class="col s9" style="padding-top: 24px">
              <h6> Daftar Surat Tugas</h6>
                  <div class="col s1" style="padding-left: 0px ! important">Bulan : </div>
                  <div class="col s11"><select class="browser-default" id="bulan-Array"><option selected><?php echo currentMonth(date("m")) ?></option></select>
                  </div>
            </div>
            <div class="col s2" style="padding-top: 24px">
              <a class="btn modal-trigger" href="<?= site_url('Transaksi/SuratTugas/Tambah') ?>">Tambah Data</a>
            </div>
          </div>
        </div>
  </div> -->

  <div class="col s12">
        <div class="card" id="head">
            <div class="card-content" >
                <div class="row">
                    <div class="col s1">
                        <button type="button" class="btn-floating" style=""><i class="material-icons">
                        email</i></button>
                    </div>
                    <div class="col s9">
                        <h6> Daftar Surat Tugas </h6>
                    </div>
                    <div class="col s2">
                        <a class="btn modal-trigger" href="<?= site_url('Transaksi/SuratTugas/Tambah') ?>">Tambah Data</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col s12">
      <div class="card">
        <div class="card-content">
          <h4 class="card-title col s10"></h4>
          <!-- <a class="btn modal-trigger col s2" href="#modal2">Tambah Data</a> -->
          <div class="row">
            <div class="col s12">
              <table id="tabel" class="bordered striped responsive-table" style="width: 100%">
                  <thead>
                    <tr>
                        <th style="width: 5%" >NO URUT</th>
                        <th style="width: 50%" >NOMOR SURAT TUGAS/URAIAN/STATUS</th>
                        <th style="width: 15%" >MULAI</th>
                        <th style="width: 15%" >SELESAI</th>
                        <th style="width: 15%" >AKSI</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                            $no = $this->uri->segment('4') + 1;
                            foreach($SuratTugas as $u){ 
                              ?>
                        <tr>
                            <td><?php echo $no ?></td>
                            <td><b><?php echo $u->nost ?>   <?php echo $u->tglst ?></b>
                                <br>
                                <?php echo $u->uraianst ?>
                                <br>
                                    <div class="col s12" style="padding-top: 10px">
                                        <a class='<?= getapprove($u->is_approved1)?> tooltipped' style="margin-right: 10px" data-position="bottom" data-tooltip="Eselon 4">Es 4</a>
                                        <a class='<?= getapprove($u->is_approved2)?> tooltipped' style="margin-right: 10px" data-position="bottom" data-tooltip="Eselon 3">Es 3</a>
                                    </div>

                                    <div class="col s12" style="padding-top: 10px">
                                        <a class='<?= getapprove($u->is_approved3)?> tooltipped' style="margin-right: 10px" data-position="bottom" data-tooltip="Eselon 2">Es 2</a>
                                        <a class='<?= getapprove($u->is_approved4)?> tooltipped' data-position="bottom" data-tooltip="Eselon 1">Es 1</a>
                                    </div>
                            </td>
                            <td><?php echo $u->tglmulaist ?></td>
                            <td><?php echo $u->tglselesaist ?></td>
                            <td>
                                <div class="col s12">

                                <a href="#" class="btn dropdown-trigger orange col s12" href="#" data-target="dropdown1">VIEW</a><br>
                                          <ul id='dropdown1' class='dropdown-content' style="min-width: 170px !important;">
                                            <li><a style="font-size: 14px;" href="<?= site_url('Transaksi/SuratTugas/Export/'.$u->id) ?>" target="blank">Surat Tugas</a></li>
                                            <li><a style="font-size: 14px;" href="<?= site_url('Transaksi/NotaDinas/Export/costsheet/L/'.$u->id) ?>" target="blank">Costsheet</a></li>
                                            <li><a style="font-size: 14px;" href="<?= site_url('Transaksi/NotaDinas/Export/spd/P/'.$u->id) ?>" target="blank">SPD</a></li>
                                            <li><a style="font-size: 14px;" href="<?= site_url('Transaksi/NotaDinas/Export/spd_back/P/'.$u->id) ?>" target="blank">SPD Belakang</a></li>
                                            <li><a style="font-size: 14px;" href="#" class="sidenav-trigger" data-target="theme-cutomizer-out" onclick="show('<?=$u->id?>')">Kwitansi Rampung</a>
																							<!-- <ul class="subMenu">
																								<li><a href="#">Kwitansi</a></li>
																							</ul> -->
																						</li>
                                          </ul>


                                    <!-- <a class="btn orange col s12" href="<?= site_url('Transaksi/SuratTugas/Export/'.$u->id)?>" target="_blank">VIEW</a><br> -->
                                    <div style="padding-bottom: 20px"></div>
                                    <a class="btn cyan col s12" href="<?= site_url('Transaksi/SuratTugas/ubah/'.$u->id)?>">UBAH</a><br>
                                    <div style="padding-bottom: 20px"></div>
                                    <button class="btn green col s12">APPROVED</button><br>
                                    <div style="padding-bottom: 20px"></div>
                                    <button class="btn red col s12" onclick="Delete('<?= $u->id ?>')">HAPUS</button><br>
                                </div>
                            </td>
                        </tr>
                        <?php $no++;} ?>
                        
                  </tbody>
                </table>
                <?php 
                echo $this->pagination->create_links(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div id="theme-cutomizer-out" class="theme-cutomizer sidenav row">
   <div class="col s12">
      <a class="sidenav-close" href="#!"><i class="material-icons">close</i></a>
      <h5 class="theme-cutomizer-title">Cetak Kwitansi</h5>
        <input type="text" id="id_st" name="id_st" >
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

