<?php include(APPPATH . 'views/Header/Aside.php') ?>

<!-- Page Length Options -->
 <div class="row">
   
    <div class="col s12">
      <div class="card">
        <div class="card-content">
          <h4 class="card-title col s10">Mapping APP Satker : <?php echo $this->session->userdata("kdsatker"); ?></h4>
          <a class="btn modal-trigger col s2" href="#modal2">Tambah Data</a>
          <div class="row">
            <div class="col s12">
              <table id="tabel_mapping" class="display" style="width: 100%">
                  <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Uraian</th>
                        <th>Jumlah</th>
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

    <div class="col s12" id="DetailCard">
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
