<div id="modal2" class="modal">
    <div class="modal-content">
      <h4>Tambah Hak Akses</h4>
      <div style="padding-top: 10px"></div>
        <div class="row">

          <form class="col s12" id="FormHakAkses">
            <div class="row">

            <div class="input-field col s12">
                <div class="input-field col s2"><label>Role</label></div>

                <div class="input-field col s10 ">
                  <select  id="role-select2" name="kdrole" class="select2-data-ajax select2-hidden-accessible browser-default" required></select>
                  </div>
              </div>

              <div class="input-field col s12">
                <div class="input-field col s2" ><label>Menu</label></div>

                <div class="input-field col s10 " >
                  <select  id="menu-select2" name="menu" class="browser-default" disabled></select>
                  </div>
              </div>

              <div class="input-field col s12">
                <div class="input-field col s2" ><label>Create</label></div>

                <div class="input-field col s10 " >
                  <select  id="kegiatan-select2" name="kdgiat" class="browser-default" disabled></select>
                  </div>
              </div>

              <div class="input-field col s12">
                <div class="input-field col s2" ><label>Read</label></div>

                <div class="input-field col s10 " >
                  <select  id="kro-select2" name="kdoutput" class="browser-default" disabled></select>
                  </div>
              </div>

              <div class="input-field col s12">
                <div class="input-field col s2" ><label>Update</label></div>

                <div class="input-field col s10 " >
                  <select  id="ro-select2" name="kdsoutput" class="browser-default" disabled></select>
                  </div>
              </div>

              <div class="input-field col s12">
                <div class="input-field col s2" ><label>Delete</label></div>

                <div class="input-field col s10 " >
                  <select  id="komponen-select2" name="kdkomponen" class="browser-default" disabled></select>
                  </div>
              </div>
            </div>
          </form>
        </div>
    </div>
    <div class="modal-footer">
      <button id="TambahHakAkses" disabled class="waves-effect waves-light btn"><i class="material-icons left">done</i> Simpan</button>
      <a class="modal-action modal-close  red btn">Batal</a>
    </div>
</div>
