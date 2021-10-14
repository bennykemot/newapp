<?php include(APPPATH . 'views/Header/Aside.php') ?>

<!-- Page Length Options -->
 <div class="row">
   
    <div class="col s12">
      <div class="card">
        <div class="card-content">
          <h4 class="card-title col s10">Mapping APP Satker : <?php echo $this->session->userdata("kdsatker"); ?></h4>
          <a class="btn modal-trigger" href="#modal2">Tambah Data</a>
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
  </div>

  <?php include('modal.php');?>
  <?php include(APPPATH . 'views/Footer/Footer.php') ?>
  <?php include('script.php');?>
