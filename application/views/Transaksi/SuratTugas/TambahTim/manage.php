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
                        <h6> Input Tim : </h6>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>

    <div class="col s12">
        <div class="card">
            <div class="card-content">

                <form id="FormTim" name="FormTim">
                    <div class="row">
                        <div class="input-field col s12">
                            <div class="input-field col s2"><label>Nomor ST</label></div>

                            <div class="input-field col s10 " >
                            <input type="text" id="nost" name="nost" value="<?= $ST[0]['nost'] ?>" readonly>
                            </div>
                        </div>

                        <div class="input-field col s12">
                            <div class="input-field col s2"><label>Tanggal ST</label></div>

                            <div class="input-field col s10 " >
                            <input type="date" id="tglst" name="tglst" value="<?= $ST[0]['tglst'] ?>" readonly>
                            </div>
                        </div>

                        <div class="input-field col s12">
                            <div class="input-field col s2"><label>Uraian ST</label></div>

                            <div class="input-field col s10 " >
                            <textarea class="materialize-textarea" id="uraianst" name="uraianst" value="<?= $ST[0]['uraianst'] ?>" readonly><?= $ST[0]['uraianst'] ?></textarea>
                            </div>
                        </div>

                        <div class="input-field col s12">
                            <div class="input-field col s2"><label>Tanggal Mulai</label></div>

                            <div class="input-field col s10 " >
                            <input type="date" id="tglst_mulai" name="tglst_mulai" onclick="Min_datemulai()" value="<?= $ST[0]['tglmulaist'] ?>" readonly>
                            </div>
                        </div>

                        <div class="input-field col s12">
                            <div class="input-field col s2"><label>Tanggal Selesai</label></div>

                            <div class="input-field col s10 " >
                            <input type="date" id="tglst_selesai" name="tglst_selesai" onclick="Min_dateselesai()" value="<?= $ST[0]['tglselesaist'] ?>" readonly>
                            </div>
                        </div>

                        <div class="input-field col s12">
                            <div class="input-field col s2"><label>MAK</label></div>

                            <div class="input-field col s10 " >
                                <input type="text"  id="idxskmpnen" name="idxskmpnen"  value="<?= $ST[0]['idxskmpnen'] ?>" readonly>
                                <input type="text"  id="kdakun" name="kdakun"  value="<?= $ST[0]['kdakun'] ?>" hidden>
                                <input type="text"  id="kdsatker" name="kdsatker"  value="<?= $ST[0]['kdsatker'] ?>" hidden>
                                <input type="text"  id="kdkabkota" name="kdkabkota"  value="<?= $ST[0]['kdkabkota'] ?>" hidden>
                                <input type="text"  id="kdapp" name="kdapp"  value="<?= $ST[0]['id_app'] ?>" hidden>
                                <input type="text"  id="kdtahapan" name="kdtahapan"  value="<?= $ST[0]['id_tahapan'] ?>" hidden>
                        
                            </div>
                        </div>

                        <div class="input-field col s12">
                            <div class="input-field col s2"><label>Alokasi</label></div>

                            <div class="input-field col s10 " >
                            <input readonly id="alokasilabel" name="alokasilabel" value="<?= rupiah($ST[0]['jumlah_uang']) ?>">
                            <input readonly id="alokasi" name="alokasi" hidden value="<?= number_format($ST[0]['jumlah_uang'],0,',','') ?>">
                            </div>
                        </div>

                        <div class="input-field col s12">
                            <div class="input-field col s2"><label>Beban Anggaran</label></div>

                            <div class="input-field col s10 " >
                                <input type="text"  id="beban_anggaran" name="beban_anggaran"  value="<?= $ST[0]['nama_unit'] ?>" readonly>
                            </div>
                        </div>

                        <div class="input-field col s12">
                            <div class="input-field col s2"><label>Penandatangan</label></div>

                            <div class="input-field col s10 " >
                                <input type="text"  id="ttd" name="ttd"  value="<?= $ST[0]['nama_ttd'] ?>" readonly>
                            </div>
                        </div>

                        <div class="input-field col s12">
                            <div class="input-field col s2"><label>Yang Menyetujui</label></div>

                            <div class="input-field col s10 " >
                            <select class="browser-default" name="cs_menyetujui" id="cs_menyetujui"></select>
                            </div>
                        </div>

                        <div class="input-field col s12">
                            <div class="input-field col s2"><label>Yang Mengajukan</label></div>

                            <div class="input-field col s10 " >
                            <select class="browser-default" name="cs_mengajukan" id="cs_mengajukan"></select>
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
                                <!-- <div class="multi-fields">
                                </div> -->

                                
                                    
                                <div id="divTable" style="display: none">

                                <div class="input-field col s12">
                                    <div class="input-field col s2"><label>Kota Asal</label></div>

                                    <div class="input-field col s4 " >
                                        <select class="browser-default kotaselect" id="kotaasal" name="kotaasal" onchange="cityCount('0')"></select>
                                    </div>

                                    <div class="input-field col s2"><label>Kota Tujuan</label></div>

                                    <div class="input-field col s4 " >
                                        <select class="browser-default kotaselect" id="kotatujuan" name="kotatujuan" onchange="cityCount('011')"></select>
                                    </div>
                                </div>


                                    <table class="bordered striped fixed multi-fields" id="tbUser" >
                                    <thead>
                    <tr style="background-color: rgba(242,242,242,.5)">
                        <td  class="text-center" style="min-width: 90px" >NO</td>
                        <td class="text-center" >TGL<br>BERANGKAT</td>
                        <td class="text-center" >TGL<br>KEMBALI</td>
                        <td class="text-center">JML<br>HARI</td>
                        <td  class="text-center" style="width: 30px" colspan="2">NAMA</td>
                        <td  class="text-center" style="min-width: 200px" colspan="2">NIP</td>
                        <td  class="text-center" style="min-width: 250px" colspan="2">PERAN/JABATAN</td>
                        <td class="text-center" >GOL</td>
                        <td  class="text-center" colspan="2" style="min-width: 200px">KOTA ASAL</td>
                        <td colspan="3" style="min-width: 200px">KOTA TUJUAN</td>
                        <!-- <td style="min-width: 250px">JENIS<br>TRANSPORTASI</td>
                        <td style="min-width: 15px" >AKSI</td> -->
                    </tr>
        
                    <tr >
                        <td style="min-width:90px" ></td>
                        <td class="text-center" style="min-width: 200px" >No SPD</td>
                        <td colspan="2" class="text-center" style="min-width: 300px">UANG HARIAN</td>
                        <td colspan="2" class="text-center" style="min-width: 300px">PENGINAPAN</td>
                        <td class="text-center">Taxi Bandara</td>
                        <td class="text-center">Angkutan<br>Laut</td>
                        <td class="text-center">Transportasi<br>Udara</td>
                        <td class="text-center">Transportasi<br>Darat</td>
                        <td class="text-center">DLL</td>
                        <td class="text-center">REPRESENTASI</td>
                        <td class="text-center" style="min-width: 150px">JUMLAH</td>
                        <td class="text-center" style="min-width: 200px">JENIS<br>TRANSPORTASI</td>
                        <td class="text-center" style="min-width: 200px">PENANDATANGAN SPD</td>
                        <td class="text-center" >Aksi</td>
                    </tr>
                </thead>
                                        <!-- <tbody class="multi-field"></tbody> -->
                                    </table>
                                </div>
                            </div>
                        </div>

                        <input id="ArrX" name="ArrX" hidden>
                        <input id="id_st" name="id_st" value="<?= $ST[0]['idst'] ?>" hidden>

                        <div class="col s12" style="padding-top: 10px">
                            <div class="col s9"></div>

                            <div class="col s3">
                                <button id="TambahTim" class="btn col s12"><i class="material-icons left">done</i> Simpan</button>
                            </div>
                        </div>
                        
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<?php include(APPPATH . 'views/Footer/Footer.php') ?>
<?php include('script.php');?>
