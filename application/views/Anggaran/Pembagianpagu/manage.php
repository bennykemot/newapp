<?php include(APPPATH . 'views/Header/Aside.php') ?>

<!-- Page Length Options -->
 <div class="row">

 <div class="col s12">
        <div class="card" id="head">
            <div class="card-content" >
                <div class="row">
                    <div class="col s1">
                        <button type="button" class="btn-floating" style=""><i class="material-icons">
                        turned_in_not</i></button>
                    </div>
                    <div class="col s9">
                        <h6> Pembagian Pagu Satker : <?php echo $this->session->userdata("nmsatker"); ?> </h6>
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
                              <th>TA</th>
                              <th>Kd<br>Satker</th>
                              <th>Kd<br>Kementrian</th>
                              <th>Kd<br>Unit</th>
                              <th>Kd<br>Program</th>
                              <th>Kd<br>Kegiatan</th>
                              <th>Kd<br>Output</th>
                              <th>Kd<br>Sub Output</th>
                              <th>Kd<br>Komponen</th>
                              <th>User</th>
                              <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                                <?php 
                                  foreach($pp as $u){ 
                                ?>
                                <tr>
                                <td><?php echo $u->thang ?></td>
                                <td><?php echo $u->kdsatker ?></td>
                                <td><?php echo $u->kddept ?></td>
                                <td><?php echo $u->kdunit ?></td>
                                <td><?php echo $u->kdprogram ?></td>
                                <td><?php echo $u->kdgiat ?></td>
                                <td><?php echo $u->kdoutput ?></td>
                                <td><?php echo $u->kdsoutput ?></td>
                                <td><?php echo $u->kdkmpnen ?></td>
                                <td><?php echo $u->username ?></td>
                                <td>
                                  <a href="javascript:;" onclick="Edit('<?= $u->id ?>')"><i class="material-icons">edit</i></a>
                                  <a href="javascript:;" onclick="Delete('<?= $u->id ?>')"><i class="material-icons">delete</i></a>
                                </td>
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
  </div>

  <?php include('modal.php');?>
  <?php include(APPPATH . 'views/Footer/Footer.php') ?>
  <?php include('script.php');?>
