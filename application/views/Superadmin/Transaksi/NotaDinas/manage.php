<?php include(APPPATH . 'views/Header/Aside.php') ?>

<!-- Page Length Options -->
<div class="row">
  <div class="col s12">
      <div class="card" id="head">
          <div class="card-content" >
              <div class="row">
                  <div class="col s1">
                      <button type="button" class="btn-floating" style=""><i class="material-icons">
                      speaker_notes</i></button>
                  </div>
                  <div class="col s9">
                      <h6> Daftar Nota Dinas</h6>
                  </div>
                  <div class="col s2">
                      <a class="btn modal-trigger" href="<?= site_url('Transaksi/NotaDinas/Tambah') ?>">Import Data</a>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <div class="section section-data-tables">
    <div class="row">
      <div class="col s12">
        <div class="card">
          <div class="card-content">
              <div class="row">
                <div class="col s12">
                  <table id="tabel" class="bordered striped responsive-table" style="width: 100%">
                        <thead>
                            <tr>
                              <th style="min-width: 2% !important">NO</th>
                              <th>NOMOR SURAT TUGAS/URAIAN/STATUS</th>
                              <th>TUJUAN</th>
                              <th style="min-width: 15% !important">BIAYA</th>
                              <th style="min-width: 15% !important">MULAI</th>
                              <th style="min-width: 15% !important">SELESAI</th>
                              <th style="min-width: 15% !important">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php 
                            $no = $this->uri->segment('4') + 1;
                            foreach($NotaDinas as $u){ 
                              ?>


                            <tr>
                                <td><?php echo $no ?></td>
                                <td><b><?php echo $u->nost ?>   <?php echo $u->tglst ?></b>
                                    <br>
                                    <?php echo $u->uraianst ?>
                                    <br>
                                    <div class="col s12" style="padding-top: 10px">
                                        <a class='<?= getapprove(0)?> tooltipped' style="margin-right: 10px" data-position="top" data-tooltip="Eselon 4">Es 4</a>
                                        <a class='<?= getapprove(0)?> tooltipped' style="margin-right: 10px" data-position="top" data-tooltip="Eselon 3">Es 3</a>
                                    </div>

                                    <div class="col s12" style="padding-top: 10px">
                                        <a class='<?= getapprove(0)?> tooltipped' style="margin-right: 10px" data-position="bottom" data-tooltip="Eselon 2">Es 2</a>
                                        <a class='<?= getapprove(0)?> tooltipped' data-position="bottom" data-tooltip="Eselon 1">Es 1</a>
                                    </div>
                                </td>
                                <td><?php echo Explodekota($u->tujuanst) ?></td>
                                <td><?php echo rupiah($u->biaya) ?></td>
                                <td><?php echo $u->tglmulaist ?></td>
                                <td><?php echo $u->tglselesaist ?></td>
                                <td>
                                    <div class="col s12">

                                        <a href="#" class="btn dropdown-trigger orange col s12" href="#" data-target="dropdown'<?=$u->idsurattugas?>'">VIEW</a><br>
                                              <ul id="dropdown'<?=$u->idsurattugas?>'" class='dropdown-content' style="min-width: 170px !important;">
                                                <li><a style="font-size: 14px;" href="<?= site_url('Transaksi/SuratTugas/Export/'.$u->idsurattugas) ?>" target="blank">Surat Tugas</a></li>
                                                <li><a style="font-size: 14px;" href="<?= site_url('Transaksi/NotaDinas/Export/costsheet/L/'.$u->idsurattugas) ?>" target="blank">Costsheet</a></li>
                                                <li><a style="font-size: 14px;" href="<?= site_url('Transaksi/NotaDinas/Export/spd/P/'.$u->idsurattugas) ?>" target="blank">SPD</a></li>
                                                <li><a style="font-size: 14px;" href="<?= site_url('Transaksi/NotaDinas/Export/spd_back/P/'.$u->idsurattugas) ?>" target="blank">SPD Belakang</a></li>
                                                <li><a style="font-size: 14px;" href="#" class="sidenav-trigger" data-target="theme-cutomizer-out" onclick="show('<?=$u->idsurattugas?>')">Kwitansi Rampung</a>
                                                  <!-- <ul class="subMenu">
                                                    <li><a href="#">Kwitansi</a></li>
                                                  </ul> -->
                                                </li>
                                              </ul>


                                        <!-- <a class="btn orange col s12" href="<?= site_url('Transaksi/SuratTugas/Export/'.$u->idsurattugas)?>" target="_blank">VIEW</a><br> -->
                                        <div style="padding-bottom: 20px"></div>
                                        <a class="btn cyan col s12" href="<?= site_url('Transaksi/SuratTugas/ubah/'.$u->idsurattugas)?>">UBAH</a><br>
                                        <div style="padding-bottom: 20px"></div>
                                        <button class="btn green col s12">APPROVED</button><br>
                                        <div style="padding-bottom: 20px"></div>
                                        <button class="btn red col s12" onclick="Delete(<?= $u->idsurattugas ?>)">HAPUS</button><br>
                                    </div>
                                </td>
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
<!--/ Theme Customizer -->
  <?php include(APPPATH . 'views/Footer/Footer.php') ?>
  <?php include('script.php');?>
