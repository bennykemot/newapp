<?php
	$kdsatker = $this->session->userdata("kdsatker");
?>


<div id="modal2" class="modal">
            <div class="modal-content">
              <h6>Tambah Uraian PPK</h6>
              <div style="padding-top: 10px"></div>
                <div class="row">

										<form class="col s12" id="FormPPK">
										<div class="row">
											<div class="input-field col s12">
												<div class="input-field col s2"><label>Uraian PPK</label></div>

												<div class="input-field col s10" >
													<input type="text" id="uraianppk" name="uraianppk">
													
												</div>
											</div>

											<div class="input-field col s12">
												<div class="input-field col s2"><label>Kode Satker</label></div>

												<div class="input-field col s10 " >
													<input type="text" id="kdsatker" name="kdsatker" value="<?= $kdsatker ?>" readonly>
												</div>
											</div>
                    </div>
                  </form>
                </div>
            </div>
            <div class="modal-footer">
              <button id="TambahPPK" class="waves-effect waves-light btn"><i class="material-icons left">done</i> Simpan</button>
              <a class="modal-action modal-close red btn">Batal</a>
            </div>
          </div>

          <div id="modalEdit" class="modal">
            <div class="modal-content">
              <h6>Ubah Uraian PPK</h6>
              <div style="padding-top: 10px"></div>
                <div class="row">

                  <form class="col s12" id="FormPPK_Edit">
                    <div class="row">

                    <div class="input-field col s12">
                        <div class="input-field col s2"><label>Uraian PPK</label></div>

                        <div class="input-field col s10 " >
													<input type="text" id="uraianppk_Edit" name="uraianppk_Edit" class="validate">
                        </div>
                    </div>

										<div class="input-field col s12">
											<div class="input-field col s2"><label>Kode Satker</label></div>

											<div class="input-field col s10 " >
												<input type="text" id="kdsatker" name="kdsatker" value="<?= $kdsatker ?>" readonly>
											</div>
										</div>

                    <input placeholder="idPPK" id="idPPK" name="idPPK" type="text" hidden>

                    </div>
                  </form>
                </div>
            </div>
            <div class="modal-footer">
              <button id="EditPPK" class="waves-effect waves-light btn"><i class="material-icons left">done</i> Simpan</button>
              <a class="modal-action modal-close red btn">Batal</a>
            </div>
          </div>
