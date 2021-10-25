<?php include(APPPATH . 'views/Header/Aside.php') ?>

<!-- Page Length Options -->
 <div class="row">

 <div class="col s12">
        <div class="card">
          <div class="card-content" style="height: 90px; padding: 0px !important">
            <div class="col s1 display-flex justify-content-end" style="height: 100%;padding: 24px;padding-right: 34px; border-radius: 10px" >
              <button type="button" class="btn-floating" style=""><i class="material-icons">
              import_contacts
                </i></button>
            </div>
            <div class="col s9" style="padding-top: 24px">
              <h6> List User Satker : <?php echo $this->session->userdata("nmsatker"); ?></h6>
            </div>
            <div class="col s2" style="padding-top: 24px">
              <a class="btn modal-trigger" href="#modal2">Tambah Data</a>
            </div>
          </div>
        </div>
  </div>
   
    <div class="col s12">
      <div class="card">
        <div class="card-content">
                <!-- datatable start -->
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
    </div>
  </div>

  <?php include('modal.php');?>
  <?php include(APPPATH . 'views/Footer/Footer.php') ?>
  <?php include('script.php');?>
  
