<?php include(APPPATH . 'views/Header/Aside.php') ?>

<!-- Page Length Options -->



 <div class="row">

  <div class="col s12">
        <div class="card">
          <div class="card-content">
            <h6>Mapping APP Satker : <?php echo $this->session->userdata("nmsatker"); ?></h6>
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
                        <th>Kode</th>
                        <th>Uraian</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
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
                                <?php if ($u->kdlevel == "7"){ ?>
                                <td><button type="button" class="btn-floating green text-center" onclick="Add('<?= $u->kdindex ?>')"><i class="material-icons">add</i></button></td>
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
                        <th>Rupiah</th>
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
