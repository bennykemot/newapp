<?php include(APPPATH . 'views/Header/Aside.php') ?>


<!-- Page Length Options -->
<div class="row">

<div class="col s12">
    <div class="card" id="head">
        <div class="card-content" >
            <div class="row">
                <div class="col s1">
                    <button type="button" class="btn-floating" style=""><i class="material-icons">
                    settings</i></button>
                </div>
                <div class="col s11">
                    <h6>Setting Menu</h6>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="section section-data-tables">
      <div class="row">
        <div class="col s12">
          <div class="card">
            <div class="card-content">
              <div class="row">
                <div class="col s12">
                        <table class="display" id="page-length-option">
                          <thead>
                                <tr>
                                  <td>No</td>
                                  <td>Id</td>
                                  <td>Kode</td>
                                  <td>Nama</td>
                                  <td>Icon</td>
                                  <td>Link</td>
                                  <td>Parent</td>
                                  <td>Status</td>
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
