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

              <div id = "counting">
                <div class="multi-field-wrapper">
                  <div class="multi-fields">
                    <div class="multi-field">
                      <div class="input-field col s12">
                          <div class="input-field col s2">Pengumpulan Data</div>

                          <div class="input-field col s10 " >
                            <input placeholder="00.000.000" id="rupiah1" name="rupiah1" type="number" min="1000" onkeyup="AllCount()">
                            <!-- <input placeholder="00.000.000" id="nilai_app2" name="nilai_app[]" type="number" min="1000" > -->
                          </div>
                      </div>
                    </div>
                  </div>

                  <div class="input-field col s12">
                      <div class="input-field col s2"></div>

                        <div class="input-field col s3 ">
                            <button type="button" class="btn green " id ="add-field"><i class="material-icons left">add</i> Tambah Tahapan</button>
                        </div>

                        <div class="input-field col s3 ">
                            <button type="button" class="btn red " id ="remove-field"><i class="material-icons left">delete</i> Hapus Tahapan</button>
                        </div>
                    </div>

                </div>
              </div>

              

            <div class="input-field col s12">
                <div class="input-field col s2">Jumlah</div>

                <div class="input-field col s10 " >
                <button class="btn cyan col s12" style="text-align: left;font-weight: bold;cursor: default;" id ="jumlah" name="jumlah"></button>
               
                </div>
            </div>

            <input placeholder="00.000.000" id="nilai_app" name="nilai_app" type="number" readonly hidden>
            <input placeholder="00.000.000" id="dummy" name="dummy" type="number" readonly hidden>

            <div class="input-field col s12">
                <div class="input-field col s2">PKPT</div>

                <div class="input-field col s10 " >
                  <input placeholder="Nilai App" id="th_pkpt" name="th_pkpt" type="text" value="2021">
                </div>
            </div>

            <div class="input-field col s12" hidden>
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
      <button id="TambahApp" class="btn"><i class="material-icons left">done</i> Simpan</button>
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
                <div class="input-field col s2">Nama App</div>

                <div class="input-field col s10 " >
                  <select  id="app-select2_Edit" name="app_Edit" class="browser-default" readonly></select>
                  </div>
            </div>

            <div class="input-field col s12">
                <div class="input-field col s2">Nilai App</div>

                <div class="input-field col s10 " >
                  <input placeholder="00.000.000" id="rupiah_tahapan_Edit" name="rupiah_tahapan_Edit" type="number">
                </div>
            </div>

            <div class="input-field col s12">
                <div class="input-field col s2">PKPT</div>

                <div class="input-field col s10 " >
                  <input placeholder="Nilai App" id="th_pkpt_Edit" name="th_pkpt_Edit" type="text" value="2021">
                </div>
            </div>

            <div class="input-field col s12" hidden>
                <div class="input-field col s2">kodeindex</div>

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