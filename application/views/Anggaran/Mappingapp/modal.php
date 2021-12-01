<div id="modal2" class="modal modal-fixed-footer" >
    <div class="modal-content">
      <h4>Tambah Detail App Pagu</h4>
      <div style="padding-top: 10px"></div>
        <div class="row">

          <form class="col s12" id="FormApp">
            <div class="row">

            

            <div class="input-field col s12">
                <div class="input-field col s2"><label>Nama App</label></div>

                <div class="input-field col s10 " >
                  <select  id="app-select2" name="app" class="browser-default app"></select>
                  </div>
            </div>

            <div class="input-field col s12 d-none" id="divRupiah">
                <div class="input-field col s2"><label>Rupiah</label></div>

                <div class="input-field col s10 " >
                <input placeholder="00.000.000" class="rupiah" id="rupiahAll" name="rupiahAll"  onkeyup="AllCount()" onkeypress="return validateNumber(event)">
                  </div>
            </div>

              <div id = "counting" class="d-none">
                <div class="multi-field-wrapper">
                  <div class="multi-fields" id="multi-fields">
                    <div class="multi-field">
                      <div class="input-field col s12">
                          <div class="input-field col s2 "></div>
                          <input id="tahapan1" name="tahapan1" value="1" hidden>

                          <div class="input-field col s10 " >
                            <input placeholder="00.000.000" class="rupiah" id="rupiah1" name="rupiah1"  onkeyup="AllCount()" onkeypress="return validateNumber(event)">
                            <label class="active tahapan_id_label" for="rupiah1" >Pengumpulan Data</label></div>
                      </div>
                    </div>
                  </div>

                  <div class="input-field col s12">
                      <div class="input-field col s2"></div>

                        <div class="input-field col s2 ">
                            <button type="button" class="btn green " id ="add-field"><i class="material-icons left">add</i></button>
                        </div>

                        <div class="input-field col s2 ">
                            <button type="button" class="btn red " id ="remove-field"><i class="material-icons left">delete</i></button>
                        </div>
                    </div>

                </div>
              </div>

              

            <div class="input-field col s12">
                <div class="input-field col s2"><label>Jumlah</label></div>

                <div class="input-field col s10 " >
                <a class="btn cyan col s12" style="text-align: left;font-weight: bold;cursor: default;" id ="jumlah" name="jumlah"></a>
               
                </div>
            </div>

            <input placeholder="00.000.000" id="nilai_app" name="nilai_app" type="number" readonly hidden>
            <input placeholder="00.000.000" id="dummy" name="dummy" type="number" readonly  hidden>

            <div class="input-field col s12">
                <div class="input-field col s2"><label>PKPT</label></div>

                <div class="input-field col s10 " >
                  <input placeholder="Nilai App" id="th_pkpt" name="th_pkpt" type="text" readonly value="<?= $this->session->userdata("thang")?>">
                </div>
            </div>

            <div class="input-field col s12" hidden>
                <div class="input-field col s2">kodeindex</div>

                <div class="input-field col s10 " >
                  <input placeholder="Nilai App" id="kodeindex" name="kodeindex" type="text" >
                  <input placeholder="Nilai App" id="kdkmpnen" name="kdkmpnen" type="text" >
                </div>
            </div>

            



            </div>
          </form>
        </div>
    </div>
    <div class="modal-footer">
      <button id="TambahApp" class="btn disabled"><i class="material-icons left">done</i> Simpan</button>
      <a class="modal-action modal-close  red btn">Batal</a>
    </div>
</div>

<div id="modalEdit" class="modal">
    <div class="modal-content">
      <h4>Edit Mapping</h4>
      <div style="padding-top: 10px"></div>
        <div class="row">

          <form class="col s12" id="FormMapping_Edit">
            <div class="row">

            <div class="input-field col s12">
                <div class="input-field col s2"><label>Nama App</label></div>

                <div class="input-field col s10 " >
                  <select  id="app-select2_Edit" name="app_Edit" class="browser-default" readonly></select>
                  </div>
            </div>

            <div class="input-field col s12" id="divTahapan_Edit">
                <div class="input-field col s2"><label>Tahapan</label></div>

                <div class="input-field col s10 " >
                  <input id="tahapan_Edit" name="tahapan_Edit" type="text" readonly>
                </div>
            </div>

            <div class="input-field col s12">
                <div class="input-field col s2"><label>Rupiah Tahapan</label></div>

                <div class="input-field col s10 " >
                  <input placeholder="00.000.000" id="rupiah_tahapan_Edit" name="rupiah_tahapan_Edit" onkeypress="return validateNumber(event)" onkeyup="Count()">
                </div>
            </div>

            <input id="rupiah_tahapan_dummy" name="rupiah_tahapan_dummy" hidden>
            <input id="total_app" name="total_app" hidden>
            <input id="total_akun" name="total_akun" hidden>

            <div class="input-field col s12">
                <div class="input-field col s2"><label>Nilai App</label></div>

                <div class="input-field col s10 " >
                <button class="btn cyan col s12" style="text-align: left;font-weight: bold;cursor: default;" id ="rupiah_Edit" name="rupiah_Edit"></button>
                  <!-- <input placeholder="00.000.000" id="rupiah_Edit" name="rupiah_Edit" type="number"> -->
                </div>
            </div>

            <div class="input-field col s12">
                <div class="input-field col s2"><label>PKPT</label></div>

                <div class="input-field col s10 " >
                  <input placeholder="Nilai App" id="th_pkpt_Edit" name="th_pkpt_Edit" type="text" value="<?= $this->session->userdata("thang")?>" readonly>
                </div>
            </div>

            <div class="input-field col s12" hidden>
                <div class="input-field col s2"><label>kodeindex</label></div>

                <div class="input-field col s10 " >
                  <input placeholder="Nilai App" id="kodeindex_Edit" name="kodeindex_Edit" type="text" >
                </div>
            </div>

            <div class="input-field col s12" hidden>
                <div class="input-field col s2">Id</div>

                <div class="input-field col s10 " >
                  <input placeholder="Nilai App" id="Id_Edit" name="Id_Edit" type="text" >
                </div>
            </div>


            </div>
          </form>
        </div>
    </div>
    <div class="modal-footer">
      <button id="EditMapping" class="btn"><i class="material-icons left">done</i> Simpan</button>
      <a class="modal-action modal-close  red btn">Batal</a>
    </div>
</div>