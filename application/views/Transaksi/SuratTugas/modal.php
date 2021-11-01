<div id="modal2" class="modal">
    <div class="modal-content">
      <h4>Tambah Surat Tugas</h4>
      <div style="padding-top: 10px"></div>
        <div class="row">

          <form class="col s12" id="FormST">
            <div class="row">

            

            <div class="input-field col s12">
                <div class="input-field col s2">Nomor ST</div>

                <div class="input-field col s10 " >
                 <input type="text" id="nost" name="nost">
                  </div>
            </div>

            <div class="input-field col s12">
                <div class="input-field col s2">Tanggal ST</div>

                <div class="input-field col s10 " >
                 <input class="datepicker" id="tglst" name="tglst">
                  </div>
            </div>

            <div class="input-field col s12">
                <div class="input-field col s2">Uraian ST</div>

                <div class="input-field col s10 " >
                <textarea class="materialize-textarea" id="uraianst" name="uraianst"></textarea>
                  </div>
            </div>

            <div class="input-field col s12">
                <div class="input-field col s2">Tanggal Mulai</div>

                <div class="input-field col s10 " >
                 <input class="datepicker" id="tglst_mulai" name="tglst_mulai">
                  </div>
            </div>

            <div class="input-field col s12">
                <div class="input-field col s2">Tanggal Selesai</div>

                <div class="input-field col s10 " >
                 <input class="datepicker" id="tglst_selesai" name="tglst_selesai">
                  </div>
            </div>

            <div class="input-field col s12">
                <div class="input-field col s2">Komponen/Sub Komp</div>

                <div class="input-field col s10 " >
                  <select class="browser-default" id="idxskmpnen" name="idxskmpnen"></select>
                  </div>
            </div>

            <div class="input-field col s12">
                <div class="input-field col s2">Beban Anggaran</div>

                <div class="input-field col s10 " >
                  <select class="browser-default" id="beban_anggaran" name="beban_anggaran"></select>
                  </div>
            </div>

            <div class="input-field col s12">
                <div class="input-field col s2">Penandatangan</div>

                <div class="input-field col s10 " >
                  <select class="browser-default" id="ttd" name="ttd"></select>
                  </div>
            </div>

              <div id = "counting" >
                <div class="multi-field-wrapper">


                    <div class="input-field col s12" >
                      <div class="input-field col s9">
                      <button type="button" class="btn warning col s12"><i class="material-icons left">face</i> DAFTAR PEGAWAI</button>
                      </div>

                        <div class="input-field col s3 ">
                            <button type="button" class="btn green col s12" id ="add-field" name="add-field"><i class="material-icons left">add</i> Tambah</button>
                            <!-- <button type="button" class="btn green col s12 modal-trigger" href="#modal3"><i class="material-icons left">add</i> Tambah</button> -->
                        </div>
                    </div>


                  <div class="multi-fields">
                    <div class="multi-field">
                    </div>
                  </div>
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

<div id="modal3" class="modal">
    <div class="modal-content">
      <h4>Tambah Tim</h4>
      <div style="padding-top: 10px"></div>
        <div class="row">

          <form class="col s12" id="FormTim">

            <div class="row">
                <div class="input-field col s12">
                    <div class="input-field col s2">Nama</div>

                    <div class="input-field col s10 " >
                        <select class="browser-default" id="nama" name="nama"></select>
                    </div>
                </div>

                <div class="input-field col s12">
                    <div class="input-field col s2">NIP</div>

                    <div class="input-field col s10 " >
                        <input class="browser-default" id="nip" name="nip" readonly>
                    </div>
                </div>

                <div class="input-field col s12">
                    <div class="input-field col s2">Jabatan/Peran</div>

                    <div class="input-field col s10 " >
                        <input class="browser-default" id="jabpen" name="jabpen" readonly>
                    </div>
                </div>
            </div>

          </form>
        </div>
    </div>
    <div class="modal-footer">
      <button id="TambahTim" class="btn"><i class="material-icons left">done</i> Simpan</button>
      <a class="modal-action modal-close  red btn">Batal</a>
    </div>
</div>