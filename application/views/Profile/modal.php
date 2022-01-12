<div id="modal2" class="modal">
            <div class="modal-content">
              <h6>Tambah User</h6>
              <div style="padding-top: 10px"></div>
                <div class="row">

                  <form class="col s12" id="FormUser">
                    <div class="row">

                    <div class="input-field col s12">
                        <div class="input-field col s2"><label>Nama User</label></div>

                        <div class="input-field col s10 " >
                          <input placeholder="Nama User" id="nama_user" name="nama_user" type="text" class="validate">
                        </div>
                    </div>

                    <div class="input-field col s12">
                        <div class="input-field col s2"><label>Satker</label></div>

                        <div class="input-field col s10" >
                          <input readonly placeholder="<?php echo $this->session->userdata("nmsatker"); ?>" id="kdsatker" name="kdsatker" value = "<?php echo $this->session->userdata("kdsatker"); ?>">
                          </div>
                      </div>

											<div class="input-field col s12">
                        <div class="input-field col s2"><label>Unit</label></div>

                        <div class="input-field col s10" >
														<select  id="unit-select2" name="unit_id" class="select2-data-ajax select2-hidden-accessible browser-default"></select>
														<input type="text" id="unitText" name="unitText" hidden>
                          </div>
                      </div>

                      <div class="input-field col s12">
                        <div class="input-field col s2"><label>Role</label></div>

                          <div class="input-field col s4 " >
                            <select  id="role-select2" name="kdrole" class="select2-data-ajax select2-hidden-accessible browser-default"></select>
                          </div>

                          <div class="input-field col s2"><label>Status</label></div>

                          <div class="input-field col s4 " >
                            <select  id="status-select2" name="kdstatus" class="browser-default"></select>
                          </div>
                      </div>

											<div class="input-field col s12" id="ppk" style="display: none;">
                        <div class="input-field col s2"><label>Pejabat</label></div>

                          <div class="input-field col s10 " >
                            <select  id="ppk-select2" name="ppk" class="browser-default"></select>
                          </div>
                      </div>

                      <div class="input-field col s12">
                        <div class="input-field col s2"><label>Password User</label></div>

                        <div class="input-field col s10 " >
                          <input placeholder="Password User" id="password" name="password" type="text" class="validate">
                        </div>
                    </div>

                    <div class="input-field col s12">
                        <div class="input-field col s2"><label>Keterangan User</label></div>

                        <div class="input-field col s10 " >
                          <input placeholder="Keterangan User" id="keterangan" name="keterangan" type="text" class="validate">
                        </div>
                    </div>




                    </div>
                  </form>
                </div>
            </div>
            <div class="modal-footer">
              <button id="TambahUser" class="waves-effect waves-light btn"><i class="material-icons left">done</i> Simpan</button>
              <a class="modal-action modal-close red btn">Batal</a>
            </div>
          </div>

          <div id="modalEdit" class="modal">
            <div class="modal-content">
              <h6>Ubah User</h6>
              <div style="padding-top: 10px"></div>
                <div class="row">

                  <form class="col s12" id="FormUser_Edit">
                    <div class="row">

                    <div class="input-field col s12">
                        <div class="input-field col s2"><label>Nama User</label></div>

                        <div class="input-field col s10 " >
                          <input placeholder="Nama User" id="nama_user_Edit" name="nama_user_Edit" type="text" class="validate">
                        </div>
                    </div>

                    <div class="input-field col s12">
                        <div class="input-field col s2"><label>Satker</label></div>

                        <div class="input-field col s10" >
                        <!-- <input readonly placeholder="<?php echo $this->session->userdata("nmsatker"); ?>" id="kdsatker_Edit" name="kdsatker_Edit" value = "<?php echo $this->session->userdata("kdsatker"); ?>"> -->
                          <div class="input-field col s10" >
														<select  id="satker-select2_Edit" name="satker_Edit" class="select2-data-ajax select2-hidden-accessible browser-default"></select>
                          </div>    
                      </div>
                    </div>

										<div class="input-field col s12">
                        <div class="input-field col s2"><label>Unit</label></div>

                        <div class="input-field col s10" >
														<select  id="unit-select2_Edit" name="unit_id_Edit" class="select2-data-ajax select2-hidden-accessible browser-default"></select>
														<input type="text" id="unitText_Edit" name="unitText_Edit" hidden>
                          </div>
                      </div>

                      <div class="input-field col s12">
                        <div class="input-field col s2"><label>Role</label></div>

                        <div class="input-field col s4 " >
                          <select  id="role-select2_Edit" name="kdrole_Edit" class="browser-default"></select>
                          </div>

                          <div class="input-field col s2"><label>Status</label></div>

                        <div class="input-field col s4 " >
                          <select  id="status-select2_Edit" name="kdstatus_Edit" class="browser-default"></select>
                          </div>
                      </div>

											<div class="input-field col s12" id="ppk_Edit" style="display: none;">
                        <div class="input-field col s2"><label>Pejabat</label></div>

                          <div class="input-field col s10 " >
                            <select  id="ppk-select2_Edit" name="ppk_Edit" class="browser-default"></select>
                          </div>
                      </div>

											

                      <!-- <div class="input-field col s12">
                        <div class="input-field col s2"><label>Status</label></div>

                        <div class="input-field col s10 " >
                          <select  id="status-select2_Edit" name="kdstatus_Edit" class="browser-default"></select>
                          </div>
                      </div> -->

                      <div class="input-field col s12">
                        <div class="input-field col s2"><label>Password User</label></div>

                        <div class="input-field col s10 " >
                          <input placeholder="Password User" id="password_Edit" name="password_Edit" type="text" class="validate">
                        </div>
                    </div>

                    <div class="input-field col s12">
                        <div class="input-field col s2"><label>Keterangan User</label></div>

                        <div class="input-field col s10 " >
                          <input placeholder="Keterangan User" id="keterangan_Edit" name="keterangan_Edit" type="text" class="validate">
                        </div>
                    </div>

                    <input placeholder="idUser" id="idUser" name="idUser" type="text" hidden>




                    </div>
                  </form>
                </div>
            </div>
            <div class="modal-footer">
              <button id="EditUser" class="waves-effect waves-light btn"><i class="material-icons left">done</i> Simpan</button>
              <a class="modal-action modal-close red btn">Batal</a>
            </div>
          </div>
