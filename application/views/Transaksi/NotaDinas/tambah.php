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
                        <h6> Input Nota Dinas : </h6>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>

    <div class="col s12">
        <div class="card">
            <div class="card-content">

                <form id="FormND" name="FormND">
                    <div class="row">
                        <div class="col s12">
                                <div class="input-field col s2"><label>Nomor Surat Tugas</label></div>
                                    <div class="col s4"><select class="browser-default" id="select-nost" name="select-nost"></select></div>
                                        <div class="col s1"></div>
                                <div class="input-field col s2"><label>Pagu Anggaran</label></div>
                                    <div class="col s3"><input type="text" name="paguanggaran" id="paguanggaran" style="text-align: right"></div>

                                <div class="input-field col s2"><label>Tanggal</label></div>
                                    <div class="col s4"><input type="date" name="tglst" id="tglst"></div>
                                        <div class="col s1"></div>
                                <div class="input-field col s2"><label>Realisasi s.d Lalu </label></div>
                                    <div class="col s3"><input type="text" name="" id=""></div>

                                <div class="input-field col s2"><label>Uraian Penugasan</label></div>
                                    <div class="col s4"><input type="text" name="uraianst" id="uraianst"></div>
                                        <div class="col s1"></div>
                                <div class="input-field col s2"><label>Saldo s.d Lalu </label></div>
                                    <div class="col s3"><input type="text" name="" id=""></div>

                                <div class="input-field col s2"><label>Beban Anggaran</label></div>
                                    <div class="col s4"><select class="browser-default" required id="select-bebananggaran" name="select-bebananggaran"></select></div>
                                        <div class="col s1"></div>
                                <div class="input-field col s2"><label>Pengajuan </label></div>
                                    <div class="col s3"><input type="text" name="" id=""></div>

                                <div class="input-field col s2"><label>Kode APP</label></div>
                                    <div class="col s4"><select class="browser-default" id="select-kodeapp" name="select-kodeapp"></select></div>
                                        <div class="col s1"></div>
                                <div class="input-field col s2"><label>Saldo </label></div>
                                    <div class="col s3"><input type="text" name="saldo" id="saldo"></div>
                            

                        
                            <table id="input_table" class="bordered fixed" style="display: none">
                                <thead>
                                    <tr>
                                        <td>NO</td>
                                        <td>NAMA</td>
                                        <td>NIP</td>
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
                                        <td>JENIS<br>TRANSPORTASI</td>
                                    </tr>
                                </thead>
                                <tbody id="tabeltim">
                                </tbody>
                            </table>

                                <div style="padding-top: 5%"></div>
                                <table>
                                    <tr style="border-bottom: none;">
                                        <td width="10%"></td>
                                            <td>Yang menyetujui:</td>
                                        <td width="10%"></td>
                                            <td>Pejabat Pembuat Komitmen:</td>
                                        <td width="10%"></td>
                                            <td>Yang mengajukan:</td>
                                        <td width="10%"></td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                            <td><select class="browser-default"></select></td>
                                        <td></td>
                                            <td><select class="browser-default"></select></td>
                                        <td></td>
                                            <td><select class="browser-default"></select></td>
                                        <td></td>
                                    </tr>
                                </table>

                                <div class="col s12" style="padding-top: 10px">
                                    <div class="col s9"></div>

                                    <div class="col s3">
                                        <button id="TambahND" class="btn col s12"><i class="material-icons left">done</i> Simpan</button>
                                    </div>
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