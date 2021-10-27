<?php include(APPPATH . 'views/Header/Aside.php') ?>

<!-- Page Length Options -->
 <div class="row">

 <div class="col s12">
        <div class="card">
          <div class="card-content" style="height: 90px; padding: 0px !important">
            <div class="col s1 display-flex justify-content-end" style="height: 100%;padding: 24px;padding-right: 34px; border-radius: 10px" >
              <button type="button" class="btn-floating" style=""><i class="material-icons">
              view_comfy
                </i></button>
            </div>
            <div class="col s9" style="padding-top: 24px">
              <h6> Mapping APP Satker : <?php echo $this->session->userdata("nmsatker"); ?></h6>
                  <p><?php echo $this->session->userdata("keterangan"); ?></p>
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
                        <th style="width: 20%" >Kode</th>
                        <th style="width: 50%" >Uraian</th>
                        <th style="width: 20%" >Jumlah</th>
                        <th style="width: 10%" >Aksi</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php 
                            $no = $this->uri->segment('4') + 1;
                            foreach($mapp as $u){ 
                              ?>
                              <tr>

                                <?php if ($u->kdlevel == "7"){ ?>
                                <td><a href="javascript:;" onclick="showDetailapp('<?= $u->kdindex ?>')"><?php echo $u->kode ?></a></td>
                                <?php } else{ 
                                  echo '<td>'.$u->kode.'</td>';

                                }; ?>

                                <td><?php echo $u->uraian ?></td>
                                <td class="text-right"><?php echo number_format($u->jumlah,0,',','.') ?></td>
                                <?php if ($u->kdlevel == "7" && $u->kode != "521811"){ ?>
                                <td style="text-align: center"><button type="button" class="btn-floating green" onclick="Add('<?= $u->kdindex ?>', '<?= $u->jumlah ?>')"><i class="material-icons">add</i></button></td>
                                <?php } else{ 
                                  echo '<td></td>';

                                }; ?>
                                
                                
                            </tr>
                          
                         <?php } ?>


                  </tbody>
                </table>
               <?php 
                echo $this->pagination->create_links(); ?>


                
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col s12" id="DetailCard" style="display: none">
      <div class="card">
        <div class="card-content">
          <h4 class="card-title col s10">Detail App</h4>
          <div class="row">
            <div class="col s12">
              <table id="tabel_mapping_detail" class="display" style="width: 100%">
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
                  <tbody>
                  </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>
    </div>


  </div>

  <?php include('modal.php');?>
  <?php include(APPPATH . 'views/Footer/Footer.php') ?>
  <?php include('script.php');?>
