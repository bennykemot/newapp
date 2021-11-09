<?php include(APPPATH . 'views/Header/Aside.php') ?>




<div class="row">

            <div class="col s12">
                <div class="card" id="head">
                    <div class="card-content" >
                        <div class="row">
                            <div class="col s1">
                                <button type="button" class="btn-floating" style=""><i class="material-icons">
                                get_app</i></button>
                            </div>
                            <div class="col s11">
                                <h6> Transfer Pagu Satker : <?php echo $this->session->userdata("nmsatker"); ?> </h6>
                            </div>
                          
                        </div>
                    </div>
                </div>
            </div>

              <div class="col s12" id="account">
                <div class="card">
                    <div class="card-content">
                      <div class="row">
                        <div class="col s12">
                          <form method="POST" id="form-import" enctype="multipart/form-data">
                            <div class="input-field col s12">
                                  <!-- <div class="input-field col s2">Upload File</div> -->
                                  <div class="col s3">
                                    <a class="gradient-45deg-indigo-light-blue btn-large col s12" onclick="Upload()"><i class="material-icons left">file_download</i>Upload File</a>
                                  </div>
                                    <div class="input-field col s9 ">
                                      <input placeholder="File..." id="shad_file" name="shad_file" type="text"Readonly>
                                  </div>
                            </div>

                            <input value="<?= $this->session->userdata("kdsatker"); ?>" id="kdsatker" name="kdsatker" type="text" hidden>

                            <div class="input-field col s2 ">
                                      
                                      <input type="file" id="file_" name="file_" hidden>
                                  </div>

                            <div class="col s12 display-flex justify-content-end mt-1">
                                <button class="btn indigo btn-upload" id="btn-upload"> Simpan</button>
                                <!-- <button class="btn indigo" id="btn-upload"> Simpan</button> -->
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>

            

            <div class="card-alert card green" id="alert-Pagu" style="display: none">
                <div class="card-content white-text">
                  <p>
                  <i class="material-icons">check</i> BERHASIL : Transfer Pagu.</p>
                </div>
            </div>

            <div class="card-alert card green" id="alert-Item" style="display: none">
                <div class="card-content white-text">
                  <p>
                    <i class="material-icons">check</i> BERHASIL : Import Item.</p>
                </div>
            </div>

            <div class="card-alert card green" id="alert-SubOutput" style="display: none">
                <div class="card-content white-text">
                  <p>
                    <i class="material-icons">check</i> BERHASIL : Import Sub Output.</p>
                </div>
            </div>

            <div class="card-alert card green" id="alert-Komponen" style="display: none">
                <div class="card-content white-text">
                  <p>
                    <i class="material-icons">check</i> BERHASIL : Import Komponen.</p>
                </div>
            </div>

            <div class="card-alert card green" id="alert-SubKomponen" style="display: none">
                <div class="card-content white-text">
                  <p>
                    <i class="material-icons">check</i> BERHASIL : Import Sub Komponen.</p>
                </div>
            </div>
</div>


<?php include(APPPATH . 'views/Footer/Footer.php') ?>
<?php include('script.php');?>