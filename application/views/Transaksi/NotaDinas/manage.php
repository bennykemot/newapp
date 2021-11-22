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
                            <tr>
                                <td>1</td>
                                <td><b>ST-3456/SU03/3/2021    22-11-2021</b>
                                    <br>
                                    Perjalanan Dinas dalam rangka penyusunan revisi RKAKL Satker di lingkungan BPKP
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
                                <td>Bandung</td>
                                <td>Rp25.000.000</td>
                                <td>29-11-2021</td>
                                <td>29-11-2021</td>
                                <td>
                                    <div class="col s12">
                                        <!-- <a href="#" class="btn btn-customizer orange col s12 sidenav-trigger" data-target="theme-cutomizer-out" onclick="show('ST-3456/SU03/3/2021')">VIEW</a><br> -->
                                          <a href="#" class="btn dropdown-trigger orange col s12" href="#" data-target="dropdown1">VIEW</a><br>
                                          <ul id='dropdown1' class='dropdown-content' style="min-width: 170px !important;">
                                            <li><a style="font-size: 14px;" href="<?= site_url('Transaksi/NotaDinas/Export/costsheet/L') ?>" target="blank">Costsheet</a></li>
                                            <li><a style="font-size: 14px;" href="<?= site_url('Transaksi/NotaDinas/Export/spd/P') ?>" target="blank">SPD</a></li>
                                            <li><a style="font-size: 14px;" href="<?= site_url('Transaksi/NotaDinas/Export/spd_back/P') ?>" target="blank">SPD Belakang</a></li>
                                            <li><a style="font-size: 14px;" href="#" class="sidenav-trigger" data-target="theme-cutomizer-out" onclick="show('ST-3456/SU03/3/2021')">Kwitansi Rampung</a></li>
                                          </ul>

                                          <div style="padding-bottom: 20px"></div>
                                        <a class="btn cyan col s12">UBAH</a><br>
                                            <div style="padding-bottom: 20px"></div>
                                        <a class="btn green col s12">APPROVED</a><br>
                                            <div style="padding-bottom: 20px"></div>
                                        <a class="btn red col s12" onclick="Delete()">HAPUS</a><br>
                                    </div>
                                </td>
                            </tr>

                            <!-- Dropdown Structure -->
                            
                            
                          </tbody>
                    </table>

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
        <input type="text" id="no_st" name="no_st" hidden>
          <div class="menu-options">
            <hr class="customize-devider">
            <div class="menu-options-form row">
                <div class="input-field col s12 menu-bg-color mb-0">
                  <a href="<?= site_url('Transaksi/NotaDinas/Export/kwitansi/P') ?>" target="blank"><div class="card-panel green darken-1 btn col s12">
                      <span class="white-text">Kwitansi</span>
                    </div></a>

                    <a href="<?= site_url('Transaksi/NotaDinas/Export/rincian_biaya/P') ?>" target="blank"><div class="card-panel orange darken-1 btn col s12">
                      <span class="white-text">Rincian Biaya</span>
                    </div></a>

                    <a href="<?= site_url('Transaksi/NotaDinas/Export/pengeluaran_rill/P') ?>" target="blank"><div class="card-panel red darken-1 btn col s12">
                      <span class="white-text">Daftar Pengeluaran Rill</span>
                    </div></a>

                    <a href="<?= site_url('Transaksi/NotaDinas/Export/nominatif/P') ?>" target="blank"><div class="card-panel blue darken-1 btn col s12">
                      <span class="white-text">Daftar Nominatif</span>
                    </div></a>

                    <a href="<?= site_url('Transaksi/NotaDinas/Export/perhitungan_rampung/P') ?>" target="blank"><div class="card-panel deep-purple darken-1 btn col s12">
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
