<div id="modalidx" class="modal">
    <div class="modal-content">
      <h4>Komponen/Sub Komponen</h4>
      <div style="padding-top: 10px"></div>
        <div class="row">

          <form class="col s12" id="Form">
            <div class="row">

            <div class="input-field col s12" hidden>
                <div class="input-field col s2"><label>Satker</label></div>

                <div class="input-field col s10 " >
                  <input placeholder="Kode Satker" id="kdsatker" name="kdsatker" type="text" value="<?=$this->session->userdata("kdsatker")?>">
                </div>
            </div>

              <div class="input-field col s12">
                <div class="input-field col s2"><label>Program</label></div>

                <div class="input-field col s10 " >
                  <select  id="program-select2" name="kdprogram" class="browser-default"></select>
                  </div>
              </div>

              <div class="input-field col s12">
                <div class="input-field col s2"><label>Kegiatan</label></div>

                <div class="input-field col s10 " >
                  <select  id="kegiatan-select2" name="kdgiat" class="browser-default"></select>
                  </div>
              </div>

              <div class="input-field col s12">
                <div class="input-field col s2"><label>KRO</label></div>

                <div class="input-field col s10 " >
                  <select  id="kro-select2" name="kdoutput" class="browser-default"></select>
                  </div>
              </div>

              <div class="input-field col s12">
                <div class="input-field col s2"><label>RO</label></div>

                <div class="input-field col s10 " >
                  <select  id="ro-select2" name="kdsoutput" class="browser-default"></select>
                  </div>
              </div>

              <div class="input-field col s12">
                <div class="input-field col s2"><label>Komponen</label></div>

                <div class="input-field col s10 " >
                  <select  id="komponen-select2" name="kdkomponen" class="browser-default"></select>
                  </div>
              </div>

              <div class="input-field col s12">
                <div class="input-field col s2"><label>Sub Komponen</label></div>

                <div class="input-field col s10 " >
                  <select  id="sub_komponen-select2" name="kdskomponen" class="browser-default"></select>
                  </div>
              </div>

             <input type="text" name="kdindex" id="kdindex" hidden>
            </div>
          </form>
        </div>
    </div>
    <div class="modal-footer">
      <button id="Tambah" class="btn disabled"><i class="material-icons left">done</i> Simpan</button>
      <a class="modal-action modal-close  red btn">Batal</a>
    </div>
</div>

<div id="modalTim" class="modal" style="max-height: 500px">
    <div class="modal-content">
      <h4>Komponen/Sub Komponen</h4>
      <div style="padding-top: 10px"></div>
        <div class="row">
              <table id="multi-select" class="display">
                <thead>
                  <tr>
                    <th>
                      <label>
                        <input type="checkbox" class="select-all">
                        <span></span>
                      </label>
                    </th>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Peran</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
        </div>
    </div>
    <div class="modal-footer">
      <button id="Tambah" class="btn disabled"><i class="material-icons left">done</i> Simpan</button>
      <a class="modal-action modal-close  red btn">Batal</a>
    </div>
</div>
