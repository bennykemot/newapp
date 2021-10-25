<?php include(APPPATH . 'views/Header/Aside.php') ?>

<!-- Page Length Options -->
 <div class="row">

 <div class="col s12">
        <div class="card">
          <div class="card-content" style="height: 90px; padding: 0px !important">
            <div class="col s1 display-flex justify-content-end" style="height: 100%;padding: 24px;padding-right: 34px; border-radius: 10px" >
              <button type="button" class="btn-floating" style=""><i class="material-icons">
                turned_in_not
                </i></button>
            </div>
            <div class="col s9" style="padding-top: 24px">
              <h6> Pembagian Pagu Satker : <?php echo $this->session->userdata("nmsatker"); ?></h6>
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
