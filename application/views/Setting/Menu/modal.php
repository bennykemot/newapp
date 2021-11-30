<div id="modalAdd" class="modal">
	<div class="modal-content">
		<h4>Tambah Menu</h4>
		<div style="padding-top: 10px"></div>
		<div class="row">
			<form class="col s12" id="Form">
				<div class="row">
					<div class="input-field col s12">
						<div class="input-field col s2"><label>Kode Menu</label></div>

						<div class="input-field col s10">
							<input placeholder="Kode Menu" id="kdmenu" name="kdmenu" type="text">
						</div>
					</div>
					<div class="input-field col s12">
						<div class="input-field col s2"><label>Nama Menu</label></div>

						<div class="input-field col s10">
							<input placeholder="Nama Menu" id="nmenu" name="nmenu" type="text">
						</div>
					</div>
					<div class="input-field col s12">
						<div class="input-field col s2"><label>Icon</label></div>

						<div class="input-field col s10">
							<input placeholder="Icon" id="icon" name="icon" type="text">
						</div>
					</div>
					<div class="input-field col s12">
						<div class="input-field col s2"><label>Link</label></div>

						<div class="input-field col s10">
							<input placeholder="Link" id="link" name="link" type="text">
						</div>
					</div>
					<div class="input-field col s12">
                        <div class="input-field col s2"><label>Parent</label></div>

                        <div class="input-field col s10 " >
                            <select class="browser-default" id="parent_menu" name="parent_menu">
								<option value="" disabled selected>Pilih</option>
							</select>
                        </div>
                    </div>
					<div class="input-field col s12">
                        <div class="input-field col s2"><label>Status</label></div>

                        <div class="input-field col s10 " >
                            <select class="browser-default" id="status" name="status">
								<option value="" disabled selected>Pilih</option>
								<option value="Aktif">Aktif</option>
								<option value="Tidak Aktif">Tidak Aktif</option>
							</select>
                        </div>
                    </div>
				</div>
			</form>
		</div>
	</div>

	<div class="modal-footer">
      <button id="Tambah" class="btn disabled"><i class="material-icons left">done</i> Simpan</button>
      <a class="modal-action modal-close  red btn">Batal</a>
    </div>

</div>
