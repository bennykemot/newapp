<?php include(APPPATH . 'views/Header/Aside.php') ?>

<!-- Page Length Options -->
 <div class="row">

 <div class="col s12">
        <div class="card">
          <div class="card-content" style="height: 90px">
            <h6 class="col s10">Pembagian Pagu Satker : <?php echo $this->session->userdata("nmsatker"); ?></h6>
            <a class="btn modal-trigger col s2" href="#modal2">Tambah Data</a>
          </div>
        </div>
  </div>
   
    <div class="col s12">
      <div class="card">
        <div class="card-content">
          <!-- <a class="btn modal-trigger col s2" href="#modal2">Tambah Data</a> -->
          <div class="row">
            <div class="col s12">
              <table id="tabel_anggaran" class="display">
                  <thead>
                    <tr>
                        <th>TA</th>
                        <th>Kd Satker</th>
                        <th>Kd Kementrian</th>
                        <th>Kd Unit</th>
                        <th>Kd Program</th>
                        <th>Kd Kegiatan</th>
                        <th>Kd Output</th>
                        <th>Kd Sub Output</th>
                        <th>Kd Komponen</th>
                        <th>User</th>
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
