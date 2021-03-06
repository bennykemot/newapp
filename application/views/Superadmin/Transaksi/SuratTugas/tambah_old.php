<?php include(APPPATH . 'views/Header/Aside.php') ?>

<div class="row">

<div class="col s12">
        <div class="card" id="head">
            <div class="card-content" >
                <div class="row">
                    <div class="col s1">
                        <button type="button" class="btn-floating" style=""><i class="material-icons">
                        add</i></button>
                    </div>
                    <div class="col s11">
                        <h6> Input Surat Tugas : </h6>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>

    <div class="col s12">
        <div class="card">
            <div class="card-content">

                <form id="FormST" name="FormST">
                    <div class="row">
                        <div class="input-field col s12">
                            <div class="input-field col s2"><label>Nomor ST</label></div>

                            <div class="input-field col s10 " >
                            <input type="text" id="nost" name="nost">
                            </div>
                        </div>

                        <div class="input-field col s12">
                            <div class="input-field col s2"><label>Tanggal ST</label></div>

                            <div class="input-field col s10 " >
                            <input type="date" id="tglst" name="tglst">
                            </div>
                        </div>

                        <div class="input-field col s12">
                            <div class="input-field col s2"><label>Uraian ST</label></div>

                            <div class="input-field col s10 " >
                            <textarea class="materialize-textarea" id="uraianst" name="uraianst"></textarea>
                            </div>
                        </div>

                        <div class="input-field col s12">
                            <div class="input-field col s2"><label>Tanggal Mulai</label></div>

                            <div class="input-field col s10 " >
                            <input type="date" id="tglst_mulai" name="tglst_mulai" onclick="Min_datemulai()">
                            </div>
                        </div>

                        <div class="input-field col s12">
                            <div class="input-field col s2"><label>Tanggal Selesai</label></div>

                            <div class="input-field col s10 " >
                            <input type="date" id="tglst_selesai" name="tglst_selesai" onclick="Min_dateselesai()">
                            </div>
                        </div>

                        <div class="input-field col s12">
                            <div class="input-field col s2"><label>Komponen/Sub Komp</label></div>

                            <div class="input-field col s8 " >
                                <input type="text"  id="idxskmpnen" name="idxskmpnen" readonly>
                                <!-- <select class="browser-default" id="idxskmpnen" name="idxskmpnen"></select> -->
                            </div>

                            <div class="input-field col s2 " >
                                <button type="button" class="btn gradient-45deg-amber-amber col s12 modal-trigger" href="#modalidx" id ="modalIdx" name="modalIdx"><i class="material-icons left">search</i> Cari</button>
                            </div>
                        </div>

                        <div class="input-field col s12">
                            <div class="input-field col s2"><label>Beban Anggaran</label></div>

                            <div class="input-field col s10 " >
                            <select class="browser-default" id="select-bebananggaran" name="select-bebananggaran"></select>
                            </div>
                        </div>

                        <div class="input-field col s12">
                            <div class="input-field col s2"><label>Penandatangan</label></div>

                            <div class="input-field col s10 " >
                            <select class="browser-default" id="ttd" name="ttd"></select>
                            </div>
                        </div>

                        <div id = "counting" >
                            <div class="multi-field-wrapper">


                                <div class="input-field col s12" >
                                    <div class="input-field col s9">
                                        <a  class="btn warning col s12"><i class="material-icons left">face</i> DAFTAR TIM</a>
                                    </div>

                                    <div class="input-field col s3 ">
                                        <button type="button" class="btn green col s12" id ="add-field" name="add-field"><i class="material-icons left">add</i> Tambah</button>
                                    </div>
                                </div>

                                    <table class="bordered fixed multi-fields" id="tbUser">
                                        <thead><tr>
                                            <td style="width: 5px" >NO</td>
                                            <td style="width: 30px" >NAMA</td>
                                            <td style="min-width: 200px" >NIP</td>
                                            <td style="min-width: 250px" >PERAN/JABATAN</td>
                                            <td>GOL</td>
                                            <td style="min-width: 200px">KOTA ASAL</td>
                                            <td style="min-width: 200px">KOTA TUJUAN</td>
                                            <td>TGL<br>BERANGKAT</td>
                                            <td>TGL<br>KEMBALI</td>
                                            <td>JML<br>HARI</td>
                                            <td>UANG HARIAN</td>
                                            <td>PENGINAPAN</td>
                                            <td>TRANSPORTASI</td>
                                            <td>REPRESENTASI</td>
                                            <td style="min-width: 150px">JUMLAH</td>
                                            <td style="min-width: 250px">JENIS<br>TRANSPORTASI</td>
                                            <td style="min-width: 15px" >AKSI</td>
                                        </tr></thead>
                                        <tbody class="multi-field"></tbody>
                                    </table>
                            </div>
                        </div>

                        <input id="ArrX" name="ArrX" hidden>

                        <div class="col s12" style="padding-top: 10px">
                            <div class="col s9"></div>

                            <div class="col s3">
                                <button id="TambahST" class="btn col s12"><i class="material-icons left">done</i> Simpan</button>
                            </div>
                        </div>
                        
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>



<?php include('modal.php');?>
<?php include(APPPATH . 'views/Footer/Footer.php') ?>
<?php include('script.php');?>
