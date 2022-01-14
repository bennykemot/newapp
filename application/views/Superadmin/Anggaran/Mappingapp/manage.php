<?php include(APPPATH . 'views/Header/Aside.php') ?>

<!-- Page Length Options -->
 <div class="row">

  <div class="col s12">
      <div class="card" id="head">
          <div class="card-content" >
              <div class="row">
                  <div class="col s1">
                      <button type="button" class="btn-floating" style=""><i class="material-icons">
                      view_comfy</i></button>
                  </div>
                  <div class="col s11">
                      <h6> Mapping APP Satker : <?php echo $this->session->userdata("nmsatker"); ?> </h6>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <div class="col s12" hidden>
      <div class="card">
        <div class="card-content">
          <h4 class="card-title col s10"></h4>
            <div class="row">
              <div class="col s12">
                <table id="tabel-mapping" class="bordered striped responsive-table" style="width: 100%">
                  <thead>
                    <tr>
                        <th style="width: 20%" >Kode</th>
                        <th style="width: 50%" >Uraian</th>
                        <th style="width: 20%" >Saldo App</th>
                        <th style="width: 10%" >Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
            </div>
        </div>
      </div>
    </div>

    <div class="row">
        <div class="col s12">
          <div class="card">
            <div class="card-content">
              <div class="row">
                <div class="col s12">
                  
                    <table id="tb-mappingapp" class="display" style="width:100%;white-space: nowrap !important;overflow: hidden;">
                        <thead>
                            <tr>
                              <th>Kegiatan</th>
                              <th>KRO</th>
                              <th>RO</th>
                              <th>Komp</th>
                              <th>Sub<br>Komp</th>
                              <th>Akun</th>
                              <th style="width: 20%;">Uraian</th>
                              <th style="width: 15%;">Anggaran</th>
                              <th style="width: 15%;">Alokasi</th>
                              <th>aksi</th>
                          </tr>
                        </thead>
                        <tbody>

                        <?php foreach($mapp as $p){?>
												
														<tr>
                              <td><?=$p->kdgiat?></td>
                              <td><?=$p->kdoutput?></td>
                              <td><?=$p->kdsoutput?></td>
                              <td><?=$p->kdkmpnen?></td>
                              <td><?=$p->kdskmpnen?></td>
                              <td><?=$p->kdakun?></td>
                              <td><?=$p->nmakun?></td>
                              <td class="text-right"><?=rupiah($p->rupiah)?></td>
                              <td class="text-right"><?=rupiah($p->alokasi)?></td>

                              <?php if ( $p->kdakun != "521811"){ ?>
                                <td class="text-center">
                                <a href="<?= site_url('Anggaran/Mappingapp/Tambah/'.$p->kdindex) ?>"><i class="material-icons green-text">edit</i></a>
                              </td>
                                <?php } else{ 
                                  echo '<td></td>';
                              } ?>
                              
                            </tr>
                        
                        <?php } ?>
                                
                              
                      </tbody>
                    </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    

  <div class="section section-data-tables" id="mydiv">
    <div class="col s12" id="DetailCard" style="display: none">
      <div class="card">
        <div class="card-content">
          <h4 class="card-title col s10">Detail App</h4>
          <div class="row">
            <div class="col s12">
              <table id="tabel_mapping_detail" class="display table-responsive" style="width: 100%; max-height: 50px;">
                  <thead>
                    <tr>
                        <th>No</th>
                        <th>URAIAN AGENDA PRIORITAS PENGAWASAN (APP)</th>
                        <th>Tahapan</th>
                        <th>Rupiah Tahapan</th>
                        <th>PKPT</th>
                        <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody style="height: 0 !important">
                  </tbody>
                    <tfoot style="background-color: #faf8a6;">
                      <tr>
                      <td colspan="3" style="text-align: left">TOTAL </td>
                        <td style="text-align: right; padding-right: 10px !important"></td>
                        <td></td><td></td>
                      </tr>
                  </tfoot>
                </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  </div>

  <?php include('modal.php');?>
  <?php include(APPPATH . 'views/Footer/Footer.php') ?>
  <?php include('script.php');?>
