<?php
	$kdsatker = $this->session->userdata("kdsatker");
	$nmsatker = $this->session->userdata("nmsatker");
?>

<div id="modal2" class="modal" style="min-height: 500px">
            <div class="modal-content">
              <h6>Tambah Pejabat</h6>
              <div style="padding-top: 10px"></div>
                <div class="row">

                  <form class="col s12" id="FormPejabat">
                    <div class="row">
						<div class="input-field col s12">
							<div class="input-field col s2"><label>Satuan Kerja</label></div>

							<div class="input-field col s10" >
								<!-- <select id="satker-select2" name="kdsatker" class="select2-data-ajax select2-hidden-accessible browser-default">
								</select> -->
								<input type="text" id="kdsatker" name="kdsatker" value="<?php echo $kdsatker .' - '. $nmsatker ?>" readonly> 
							</div>
						</div>

						<div class="input-field col s12">
							<div class="input-field col s2"><label>Nama</label></div>

							<div class="input-field col s10 " >
								<select  id="pejabat-select2" name="pejabat" class="select2-data-ajax select2-hidden-accessible browser-default"></select>
							</div>
						</div>

                      <div class="input-field col s12">
                        <div class="input-field col s2"><label>NIP</label></div>

                          <div class="input-field col s10 " >
                            <input type="text" id="nip" name="nip" readonly>
                          </div>
                      </div>

            <div class="input-field col s12">
							<div class="input-field col s2"><label>Jabatan</label></div>

							<div class="input-field col s10 " >
								<select  id="jabatan-select2" name="jabatan_id" class="select2-data-ajax select2-hidden-accessible browser-default"></select>
								<input type="text" id="jabatanText" name="jabatanText" hidden>
							</div>
                    	</div>

						<!-- <div class="input-field col s12">
                        <div class="input-field col s2"><label>Nama Jabatan</label></div>

                          <div class="input-field col s10 " >
                            <input type="text" id="jabatanText" name="jabatanText" readonly>
                          </div>
                      	</div> -->

						<div class="input-field col s12">
							<div class="input-field col s2"><label>Unit</label></div>

							<div class="input-field col s10 " >
								<select  id="unit-select2" name="unit" class="select2-data-ajax select2-hidden-accessible browser-default"></select>
							</div>
                    	</div>

                    </div>
                  </form>
                </div>
            </div>
            <div class="modal-footer">
              <button id="TambahPejabat" class="waves-effect waves-light btn"><i class="material-icons left">done</i> Simpan</button>
              <a class="modal-action modal-close red btn">Batal</a>
            </div>
          </div>

          <div id="modalEdit" class="modal">
            <div class="modal-content">
              <h6>Ubah Pejabat</h6>
              <div style="padding-top: 10px"></div>
                <div class="row">

                  <form class="col s12" id="FormPejabat_Edit">
                    <div class="row">

                    <div class="input-field col s12">
                        <div class="input-field col s2"><label>Satker</label></div>

                        <div class="input-field col s10 " >
						<select  id="satker-select2_Edit" name="kdsatker_Edit" class="browser-default"></select>
                        </div>
                    </div>

                    <div class="input-field col s12">
                        <div class="input-field col s2"><label>Nama</label></div>

                        <div class="input-field col s10" >
                        <select  id="pejabat-select2_Edit" name="pejabat_Edit" class="browser-default"></select>
                          </div>
                    </div>

                      <div class="input-field col s12">
                        <div class="input-field col s2"><label>NIP</label></div>

                        <div class="input-field col s10 " >
							<input placeholder="NIP" id="nip_Edit" name="nip_Edit" type="text" class="validate">
                        </div>
                      </div>

                      <div class="input-field col s12">
                        <div class="input-field col s2"><label>Jabatan</label></div>

                        <div class="input-field col s10 " >
							<select  id="jabatan-select2_Edit" name="jabatan_Edit" class="browser-default"></select>
							<input type="text" id="jabatanEditText" name="jabatanEditText" hidden>
                        </div>
                    </div>

					<!-- <div class="input-field col s12">
                        <div class="input-field col s2"><label>Nama Jabatan</label></div>

                        <div class="input-field col s10 " >
						<input type="text" id="jabatanEditText" name="jabatanEditText" readonly>
                        </div>
                    </div> -->

                    <div class="input-field col s12">
                        <div class="input-field col s2"><label>Unit</label></div>

                        <div class="input-field col s10 " >
						<select  id="unit-select2_Edit" name="unit_Edit" class="browser-default"></select>
                        </div>
                    </div>

                    <input placeholder="idPejabat" id="idPejabat" name="idPejabat" type="text" hidden>




                    </div>
                  </form>
                </div>
            </div>
            <div class="modal-footer">
              <button id="EditPejabat" class="waves-effect waves-light btn"><i class="material-icons left">done</i> Simpan</button>
              <a class="modal-action modal-close red btn">Batal</a>
            </div>
          </div>
