<?php include(APPPATH . 'views/Header/Aside.php') ?>


<div class="row">

        <div class="col s12">
                <div class="card">
                  <div class="card-content" style="height: 90px">
                    <h6 class="col s10">Transfer Pagu</h6>
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
                                  <div class="input-field col s2">Upload File</div>

                                  <div class="input-field col s2 ">
                                      <a class="gradient-45deg-indigo-light-blue btn-large" onclick="Upload()"><i class="material-icons left">file_download</i>Upload File</a>
                                      <input type="file" id="file_" name="file_" hidden>
                                  </div>
                                  <div class="input-field col s8 ">
                                      <input placeholder="File..." id="shad_file" name="shad_file" type="text"Readonly>
                                  </div>
                            </div>

                            <input value="<?= $this->session->userdata("kdsatker"); ?>" id="kdsatker" name="kdsatker" type="text" hidden>

                            <div class="col s12 display-flex justify-content-end mt-1">
                                <button class="btn indigo btn-upload" id="btn-upload"> Simpan</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
</div>



<?php include(APPPATH . 'views/Footer/Footer.php') ?>
<?php include('script.php');?>