<div id="modal2" class="modal">
    <div class="modal-content">
      <h4>Tambah Detail App Pagu</h4>
      <div style="padding-top: 10px"></div>
        <div class="row">

          <form class="col s12" id="FormApp">
            <div class="row">

            

            <div class="input-field col s12">
                <div class="input-field col s2">Nama App</div>

                <div class="input-field col s10 " >
                  <select  id="app-select2" name="app" class="browser-default"></select>
                  </div>
            </div>

            <div class="input-field col s12">
                <div class="input-field col s2">Nilai App</div>

                <div class="input-field col s10 " >
                  <input placeholder="00.000.000" id="nilai_app" name="nilai_app" type="number">
                </div>
            </div>

            <div class="input-field col s12">
                <div class="input-field col s2">PKPT</div>

                <div class="input-field col s10 " >
                  <input placeholder="Nilai App" id="pkpt" name="pkpt" type="text" value="2021">
                </div>
            </div>

            <div class="input-field col s12">
                <div class="input-field col s2">kodeindex</div>

                <div class="input-field col s10 " >
                  <input placeholder="Nilai App" id="kodeindex" name="kodeindex" type="text" >
                </div>
            </div>



            </div>
          </form>
        </div>
    </div>
    <div class="modal-footer">
      <button id="TambahApp" class="waves-effect waves-light btn"><i class="material-icons left">done</i> Simpan</button>
      <a class="modal-action modal-close  red btn">Batal</a>
    </div>
</div>

<div id="modalEdit" class="modal">
    <div class="modal-content">
      <h4>Edit Pagu</h4>
      <div style="padding-top: 10px"></div>
        <div class="row">

          <form class="col s12" id="FormPagu_Edit">
            <div class="row">

            <div class="input-field col s12">
                <div class="input-field col s2">Nama User</div>

                <div class="input-field col s10 " >
                  <input placeholder="Nama User" id="nama_user_Edit" name="nama_user_Edit" type="text" value="<?=$this->session->userdata("user_id")?>">
                </div>
            </div>

            <div class="input-field col s12">
                <div class="input-field col s2">Satker</div>

                <div class="input-field col s10 " >
                  <input placeholder="Kode Satker" id="kdsatker_Edit" name="kdsatker_Edit" type="text" value="<?=$this->session->userdata("kdsatker")?>">
                </div>
            </div>

              <div class="input-field col s12">
                <div class="input-field col s2" >Program</div>

                <div class="input-field col s10 " >
                  <select  id="program-select2_Edit" name="kdprogram_Edit" class="browser-default"></select>
                  </div>
              </div>

              <div class="input-field col s12">
                <div class="input-field col s2" >Kegiatan</div>

                <div class="input-field col s10 " >
                  <select  id="kegiatan-select2_Edit" name="kdgiat_Edit" class="browser-default"></select>
                  </div>
              </div>

              <div class="input-field col s12">
                <div class="input-field col s2" >KRO</div>

                <div class="input-field col s10 " >
                  <select  id="kro-select2_Edit" name="kdoutput_Edit" class="browser-default"></select>
                  </div>
              </div>

              <div class="input-field col s12">
                <div class="input-field col s2" >RO</div>

                <div class="input-field col s10 " >
                  <select  id="ro-select2_Edit" name="kdsoutput_Edit" class="browser-default"></select>
                  </div>
              </div>

              <div class="input-field col s12">
                <div class="input-field col s2" >Komponen</div>

                <div class="input-field col s10 " >
                  <select  id="komponen-select2_Edit" name="kdkomponen_Edit" class="browser-default"></select>
                  </div>
              </div>


            </div>
          </form>
        </div>
    </div>
    <div class="modal-footer">
      <button id="EditPagu" class="waves-effect waves-light btn"><i class="material-icons left">done</i> Simpan</button>
      <a class="modal-action modal-close  red btn">Batal</a>
    </div>
</div>