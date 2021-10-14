<div id="modal2" class="modal">
            <div class="modal-content">
              <h4>Tambah Pagu</h4>
              <div style="padding-top: 10px"></div>
                <div class="row">

                  <form class="col s12" id="FormPagu">
                    <div class="row">

                    <div class="input-field col s12">
                        <div class="input-field col s2">Nama User</div>

                        <div class="input-field col s10 " >
                          <input placeholder="Nama User" id="nama_user" name="nama_user" type="text" value="<?=$this->session->userdata("user_id")?>">
                        </div>
                    </div>

                    <div class="input-field col s12">
                        <div class="input-field col s2">Satker</div>

                        <div class="input-field col s10 " >
                          <input placeholder="Kode Satker" id="kdsatker" name="kdsatker" type="text" value="<?=$this->session->userdata("kdsatker")?>">
                        </div>
                    </div>

                      <div class="input-field col s12">
                        <div class="input-field col s2" >Program</div>

                        <div class="input-field col s10 " >
                          <select  id="program-select2" name="kdprogram" class="browser-default"></select>
                          </div>
                      </div>

                      <div class="input-field col s12">
                        <div class="input-field col s2" >Kegiatan</div>

                        <div class="input-field col s10 " >
                          <select  id="kegiatan-select2" name="kdgiat" class="browser-default"></select>
                          </div>
                      </div>

                      <div class="input-field col s12">
                        <div class="input-field col s2" >KRO</div>

                        <div class="input-field col s10 " >
                          <select  id="kro-select2" name="kdoutput" class="browser-default"></select>
                          </div>
                      </div>

                      <div class="input-field col s12">
                        <div class="input-field col s2" >RO</div>

                        <div class="input-field col s10 " >
                          <select  id="ro-select2" name="kdsoutput" class="browser-default"></select>
                          </div>
                      </div>

                      <div class="input-field col s12">
                        <div class="input-field col s2" >Komponen</div>

                        <div class="input-field col s10 " >
                          <select  id="komponen-select2" name="kdkomponen" class="browser-default"></select>
                          </div>
                      </div>


                    </div>
                  </form>
                </div>
            </div>
            <div class="modal-footer">
              <button id="TambahPagu" class="waves-effect waves-light btn"><i class="material-icons left">done</i> Simpan</button>
              <a class="modal-action modal-close  red btn">Batal</a>
            </div>
        </div>