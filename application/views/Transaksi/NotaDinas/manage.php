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
                  <table id="page-length-option" class="display table-responsive">
                        <thead>
                            <tr>
                              <th>NO URUT</th>
                              <th width="40%">NOMOR SURAT TUGAS/URAIAN/STATUS</th>
                              <th>TUJUAN</th>
                              <th>BIAYA</th>
                              <th>MULAI</th>
                              <th>SELESAI</th>
                              <th>AKSI</th>
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
                                        <a class='<?= getapprove(0)?>' style="margin-right: 10px">Es 4</a>
                                        <a class='<?= getapprove(0)?>' style="margin-right: 10px">Es 3</a>
                                        <a class='<?= getapprove(0)?>' style="margin-right: 10px">Es 2</a>
                                        <a class='<?= getapprove(0)?>'>Es 1</a>
                                    </div>
                                </td>
                                <td>Bandung</td>
                                <td>Rp25.000.000</td>
                                <td>29-11-2021</td>
                                <td>29-11-2021</td>
                                <td>
                                    <div class="col s12">
                                        <a class="btn orange col s12" href="<?= site_url('Transaksi/SuratTugas/Export')?>" target="_blank">VIEW</a><br>
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

  <?php include(APPPATH . 'views/Footer/Footer.php') ?>
  <?php include('script.php');?>
