<?php include(APPPATH . 'views/Header/Aside.php') ?>


<!-- Page Length Options -->
<div class="row">

<div class="col s12">
      <div class="card" id="head">
          <div class="card-content" >
              <div class="row">
                  <div class="col s1">
                      <button type="button" class="btn-floating" style=""><i class="material-icons">
                      accessibility</i></button>
                  </div>
                  <div class="col s9">
                      <h6> Setting Hak Akses </h6>
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
                        <table class="display" id="multi-select">
                          <thead>
                                <tr>
                                  <td>No</td>
                                  <td>Id</td>
                                  <td>Username</td>
                                  <td>Menu</td>
                                  <td>C</td>
                                  <td>R</td>
                                  <td>U</td>
                                  <td>D</td>
                                  <td>Aksi</td>
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
    </div>

<?php include(APPPATH . 'views/Footer/Footer.php') ?>
<?php include('script.php');?>