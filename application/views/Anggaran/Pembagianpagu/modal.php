<div id="modal2" class="modal">
    <div class="modal-content">
      <h4>Tambah Pagu</h4>
      <div style="padding-top: 10px"></div>
        <div class="row">

          <form class="col s12" id="FormPagu">
            <div class="row">

            <!-- <div class="input-field col s12">
                <div class="input-field col s2">Nama User</div>

                <div class="input-field col s10 " >
                  <input placeholder="Nama User" id="nama_user" name="nama_user" type="text" value="<?=$this->session->userdata("user_id")?>">
                </div>
            </div> -->

            <div class="input-field col s12">
                <div class="input-field col s2"><label>Nama User</label></div>

                <div class="input-field col s10 ">
                  <select  id="user-select2" name="nama_user" class="browser-default" required></select>
                  </div>
              </div>

            <div class="input-field col s12" hidden>
                <div class="input-field col s2"><label>Satker</label></div>

                <div class="input-field col s10 ">
                  <input placeholder="Kode Satker" id="kdsatker" name="kdsatker" type="text" value="<?=$this->session->userdata("kdsatker")?>">
                </div>
            </div>

              <div class="input-field col s12">
                <div class="input-field col s2" ><label>Program</label></div>

                <div class="input-field col s10 " >
                  <select  id="program-select2" name="kdprogram" class="browser-default" disabled></select>
                  </div>
              </div>

              <div class="input-field col s12">
                <div class="input-field col s2" ><label>Kegiatan</label></div>

                <div class="input-field col s10 " >
                  <select  id="kegiatan-select2" name="kdgiat" class="browser-default" disabled></select>
                  </div>
              </div>

              <div class="input-field col s12">
                <div class="input-field col s2" ><label>KRO</label></div>

                <div class="input-field col s10 " >
                  <select  id="kro-select2" name="kdoutput" class="browser-default" disabled></select>
                  </div>
              </div>

              <div class="input-field col s12">
                <div class="input-field col s2" ><label>RO</label></div>

                <div class="input-field col s10 " >
                  <select  id="ro-select2" name="kdsoutput" class="browser-default" disabled></select>
                  </div>
              </div>

              <div class="input-field col s12">
                <div class="input-field col s2" ><label>Komponen</label></div>

                <div class="input-field col s10 " >
                  <select  id="komponen-select2" name="kdkomponen" class="browser-default" disabled></select>
                  </div>
              </div>

              <input id="thang" name="thang" hidden value="<?= $this->session->userdata("thang")?>">


            </div>
          </form>
        </div>
    </div>
    <div class="modal-footer">
      <button id="TambahPagu" disabled class="waves-effect waves-light btn"><i class="material-icons left">done</i> Simpan</button>
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
                <div class="input-field col s2" >Nama User</div>

                <div class="input-field col s10 " >
                  <select  id="user-select2_Edit" name="nama_user" class="browser-default"></select>
                  </div>
              </div>

            <div class="input-field col s12" hidden>
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

              <input placeholder="idPagu" id="idPagu" name="idPagu" type="text" hidden>


            </div>
          </form>
        </div>
    </div>
    <div class="modal-footer">
      <button id="EditPagu" class="waves-effect waves-light btn"><i class="material-icons left">done</i> Simpan</button>
      <a class="modal-action modal-close  red btn">Batal</a>
    </div>
</div>