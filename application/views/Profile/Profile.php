<?php include(APPPATH . 'views/Header/Aside.php') ?>

<!-- Page Length Options -->
 <div class="row">

 <div class="col s12">
        <div class="card" id="head">
            <div class="card-content" >
                <div class="row">
                    <div class="col s1">
                        <button type="button" class="btn-floating" style=""><i class="material-icons">
                        import_contacts</i></button>
                    </div>
                    <div class="col s9">
                        <h6> List User Satker : <?php echo $this->session->userdata("nmsatker"); ?> </h6>
                    </div>
                    <div class="col s2">
                    <a class="btn modal-trigger" href="#modal2">Tambah Data</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <!-- <div class="col s12">
      <div class="card">
        <div class="card-content">
                <div class="responsive-table">
                    <table id="tabel_user" class="display">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama User</th>
                                <th>Nama Satker</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                            <tbody>
                            </tbody>
                    </table>
                </div>     
        </div>
      </div>
    </div> -->
  </div>

  <div class="section section-data-tables">
      <div class="row">
        <div class="col s12">
          <div class="card">
            <div class="card-content">
              <div class="row">
                <div class="col s12">
                  <table id="tb-user" class="display" style="width:100%;white-space: nowrap !important;overflow: hidden;">
                        <thead>
                            <tr>
                                <th style="width: 5%;">No</th>
                                <th style="width: 15%;">Nama User</th>
                                <th style="width: 30%;">Nama Satker</th>
                                <th style="width: 15%;">Role</th>
                                <th style="text-align: center; width: 15%">Status</th>
                                <th style="width: 10%;">Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                      <tbody>
                              <?php 
                              $no= 1;
                                foreach($user as $u){ 
                              ?>
                              <tr>
                              <td><?php echo $no ?></td>
                              <td><?php echo $u->username ?></td>
                              <td><?php echo $u->nmsatker ?></td>
                              <td><?php echo $u->rolename ?></td>
                                  <?php if($u->status == 1){
                                    echo '<td style="text-align: center"><i class="material-icons cyan-text">check</i></td>';
                                  }else{
                                    echo '<td style="text-align: center"><i class="material-icons orange-text">clear</i></td>';
                                  } ?>
                              
                              <td><?php echo $u->keterangan ?></td>
                              <td>
                                <a href="javascript:;" onclick="Edit('<?= $u->id ?>', '<?= $u->pejabat_id?>')"><i class="material-icons green-text">edit</i></a>
                                <a href="javascript:;" onclick="Delete('<?= $u->id ?>')"><i class="material-icons red-text">delete</i></a>
                              </td>
                          </tr>
                             <?php $no++;} ?>
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
  
