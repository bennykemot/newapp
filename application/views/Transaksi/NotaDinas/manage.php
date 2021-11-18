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
                  <table id="page-length-option" class="display" style="min-width: 105% !important">
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
                                        <a class='<?= getapprove(0)?> tooltipped' style="margin-right: 10px" data-position="bottom" data-tooltip="Eselon 4">Es 4</a>
                                        <a class='<?= getapprove(0)?> tooltipped' style="margin-right: 10px" data-position="bottom" data-tooltip="Eselon 3">Es 3</a>
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
                                        <a href="#" class="btn btn-customizer orange col s12 sidenav-trigger" data-target="theme-cutomizer-out" onclick="show('ST-3456/SU03/3/2021')">VIEW</a><br>
                                        <div style="padding-bottom: 20px"></div>
                                        <a class="btn cyan col s12">UBAH</a><br>
                                        <div style="padding-bottom: 20px"></div>
                                        <a class="btn green col s12">APPROVED</a><br>
                                        <div style="padding-bottom: 20px"></div>
                                        <a class="btn red col s12" onclick="Delete()">HAPUS</a><br>
                                    </div>
                                </td>
                            </tr>
                            
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
      <h5 class="theme-cutomizer-title">Views</h5>
        <input type="text" id="no_st" name="no_st" hidden>
          <div class="menu-options">
            <hr class="customize-devider">
            <div class="menu-options-form row">
                <div class="input-field col s12 menu-bg-color mb-0">
                  <a href="<?= site_url('Transaksi/NotaDinas/Export/costsheet/L') ?>" target="blank"><div class="card-panel green darken-1 btn col s12">
                      <span class="white-text">Costsheet</span>
                    </div></a>

                    <a href="<?= site_url('Transaksi/NotaDinas/Export/spd/P') ?>" target="blank"><div class="card-panel green darken-1 btn col s12">
                      <span class="white-text">SPD</span>
                    </div></a>

                    <a href="<?= site_url('Transaksi/NotaDinas/Export/spd_back/P') ?>" target="blank"><div class="card-panel green darken-1 btn col s12">
                      <span class="white-text">SPD Belakang</span>
                    </div></a>


                    <div class="card-panel blue darken-1 btn col s12">
                      <span class="white-text">Laporan Penugasan</span>
                    </div>
                    <div class="card-panel deep-purple darken-1 btn col s12">
                      <span class="white-text">Kartu Penugasan</span>
                    </div>
                    <div class="card-panel teal darken-1 btn col s12">
                      <span class="white-text">Realisasi Harian</span>
                    </div>
                    <div class="card-panel red darken-1 btn col s12">
                      <span class="white-text">Forum</span>
                    </div>
                </div>
            </div>
          </div>
   </div>
</div>
<!--/ Theme Customizer -->


  <div id="modal1" class="modal">
      <div class="modal-content">
        <!-- <h4>Modal Header</h4> -->
            <div class="row">
              <div class="col s6">
                <a href=""><div class="card-panel green darken-1 btn col s12">
                  <span class="white-text">Costsheet</span>
                </div></a>
                <div class="card-panel teal darken-2 btn col s12">
                  <span class="white-text">Laporan Penugasan</span>
                </div>
                <div class="card-panel teal darken-3 btn col s12">
                  <span class="white-text">Kartu Penugasan</span>
                </div>
              </div>

              <div class="col s6">
                <div class="card-panel teal darken-4 btn col s12">
                  <span class="white-text">Realisasi Harian</span>
                </div>
                <div class="card-panel teal darken-1 btn col s12">
                  <span class="white-text">Forum</span>
                </div>
              </div>
            </div>
      </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close btn-flat ">Tutup</a>
    </div>
  </div>

  <?php include(APPPATH . 'views/Footer/Footer.php') ?>
  <?php include('script.php');?>
