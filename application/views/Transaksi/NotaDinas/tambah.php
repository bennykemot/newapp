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
                                    <div class="col s4"><select class="browser-default" id="select-bebananggaran" name="select-bebananggaran"></select></div>
                                        <div class="col s1"></div>
                                <div class="input-field col s2"><label>Pengajuan </label></div>
                                    <div class="col s3"><input type="text" name="" id=""></div>

                                <div class="input-field col s2"><label>Kode APP</label></div>
                                    <div class="col s4"><select class="browser-default" id="select-kodeapp" name="select-kodeapp"></select></div>
                                        <div class="col s1"></div>
                                <div class="input-field col s2"><label>Saldo </label></div>
                                    <div class="col s3"><input type="text" name="saldo" id="saldo"></div>
                            </div>
                        </div>

                        
                            <table id="input" class="display bordered" style="display: block;overflow: auto;padding-top: 5%;white-space: nowrap;">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NAMA</th>
                                        <th>NIP</th>
                                        <th>GOL</th>
                                        <th>KOTA ASAL</th>
                                        <th>KOTA TUJUAN</th>
                                        <th>TGL BERANGKAT</th>
                                        <th>TGL KEMBALI</th>
                                        <th>JML HARI</th>
                                        <th>UANG HARIAN</th>
                                        <th>PENGINAPAN</th>
                                        <th>TRANSPORTASI</th>
                                        <th>REPRESENTASI</th>
                                        <th>JUMLAH</th>
                                        <th>JENIS TRANSPORTASI</th>
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

                                
                </form>

            </div>
        </div>
    </div>
    
</div>

<?php include(APPPATH . 'views/Footer/Footer.php') ?>
<?php include('script.php');?>