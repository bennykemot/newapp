<?php include(APPPATH . 'views/Header/Aside.php') ?>

<!-- Page Length Options -->
 <div class="row">

 <div class="col s12">
        <div class="card">
          <div class="card-content" style="height: 90px">
            <h6 class="col s10">List User Satker : <?php echo $this->session->userdata("nmsatker"); ?></h6>
            <a class="btn modal-trigger col s2" href="#modal2">Tambah Data</a>
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
  
