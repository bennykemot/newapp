<?php include(APPPATH . 'views/Header/Aside.php') ?>


<div class="col s12">
          <div class="container">
            <!-- users edit start -->
<div class="section users-edit">
  <div class="card">
    <div class="card-content">
      <!-- <div class="card-body"> -->

      <div class="row">
      <div class="col s12">
        <ul class="tabs">
          <li class="tab col m4"><a class="tab col active" id="account-tab" href="#account">STEP 1</a></li>
          <li class="tab col m4"><a class="tab col " id="information-tab" href="#information">STEP 2</a></li>
          <li class="tab col m4"><a class="tab col " id="information-tab" href="#information">STEP 3</a></li>
        </ul>
      </div>
    </div>
      <div class="divider mb-3"></div>
      <div class="row">
        <div class="col s12" id="account">

       
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


          <!-- users edit account form ends -->
        </div>
        <div class="col s12" id="information">
          <!-- users edit Info form start -->
          <form id="infotabForm">
            <div class="row">
              <div class="col s12 m6">
                <div class="row">
                  <div class="col s12">
                    <h6 class="mb-2"><i class="material-icons mr-1">link</i>Social Links</h6>
                  </div>
                  <div class="col s12 input-field">
                    <input class="validate" type="text" value="https://www.twitter.com/">
                    <label>Twitter</label>
                  </div>
                  <div class="col s12 input-field">
                    <input class="validate" type="text" value="https://www.facebook.com/">
                    <label>Facebook</label>
                  </div>
                  <div class="col s12 input-field">
                    <input class="validate" type="text">
                    <label>Google+</label>
                  </div>
                  <div class="col s12 input-field">
                    <input id="linkedin" name="linkedin" class="validate" type="text">
                    <label for="linkedin">LinkedIn</label>
                  </div>
                  <div class="col s12 input-field">
                    <input class="validate" type="text" value="https://www.instagram.com/">
                    <label>Instagram</label>
                  </div>
                </div>
              </div>
              <div class="col s12 m6">
                <div class="row">
                  <div class="col s12">
                    <h6 class="mb-4"><i class="material-icons mr-1">person_outline</i>Personal Info</h6>
                  </div>
                  <div class="col s12 input-field">
                    <input id="datepicker" name="datepicker" type="text" class="birthdate-picker datepicker" placeholder="Pick a birthday" data-error=".errorTxt4">
                    <label for="datepicker">Birth date</label>
                    <small class="errorTxt4"></small>
                  </div>
                  <div class="col s12 input-field">
                    <select id="accountSelect">
                      <option>USA</option>
                      <option>India</option>
                      <option>Canada</option>
                    </select>
                    <label>Country</label>
                  </div>
                  <div class="col s12">
                    <label>Languages</label>
                    <select class="browser-default" id="users-language-select2" multiple="multiple">
                      <option value="English" selected="">English</option>
                      <option value="Spanish">Spanish</option>
                      <option value="French">French</option>
                      <option value="Russian">Russian</option>
                      <option value="German">German</option>
                      <option value="Arabic" selected="">Arabic</option>
                      <option value="Sanskrit">Sanskrit</option>
                    </select>
                  </div>
                  <div class="col s12 input-field">
                    <input id="phonenumber" type="text" class="validate" value="(+656) 254 2568">
                    <label for="phonenumber">Phone</label>
                  </div>
                  <div class="col s12 input-field">
                    <input id="address" name="address" type="text" class="validate" data-error=".errorTxt5">
                    <label for="address">Address</label>
                    <small class="errorTxt5"></small>
                  </div>
                </div>
              </div>
              <div class="col s12">
                <div class="input-field">
                  <input id="websitelink" name="websitelink" type="text" class="validate">
                  <label for="websitelink">Website</label>
                </div>
                <label>Favourite Music</label>
                <div class="input-field">
                  <select class="browser-default" id="users-music-select2" multiple="multiple">
                    <option value="Rock">Rock</option>
                    <option value="Jazz" selected="">Jazz</option>
                    <option value="Disco">Disco</option>
                    <option value="Pop">Pop</option>
                    <option value="Techno">Techno</option>
                    <option value="Folk" selected="">Folk</option>
                    <option value="Hip hop">Hip hop</option>
                  </select>
                </div>
              </div>
              <div class="col s12">
                <label>Favourite movies</label>
                <div class="input-field">
                  <select class="browser-default" id="users-movies-select2" multiple="multiple">
                    <option value="The Dark Knight" selected="">The Dark Knight
                    </option>
                    <option value="Harry Potter" selected="">Harry Potter</option>
                    <option value="Airplane!">Airplane!</option>
                    <option value="Perl Harbour">Perl Harbour</option>
                    <option value="Spider Man">Spider Man</option>
                    <option value="Iron Man" selected="">Iron Man</option>
                    <option value="Avatar">Avatar</option>
                  </select>
                </div>
              </div>
              <div class="col s12 display-flex justify-content-end mt-1">
                <button type="submit" class="btn indigo">
                  Save changes</button>
                <button type="button" class="btn btn-light">Cancel</button>
              </div>
            </div>
          </form>
          <!-- users edit Info form ends -->
        </div>
      </div>
      <!-- </div> -->
    </div>
  </div>
</div>



<?php include(APPPATH . 'views/Footer/Footer.php') ?>
<?php include('script.php');?>