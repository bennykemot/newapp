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
                            <div class="input-field col s2"><label>MAK</label></div>

                            <div class="input-field col s8 " >
                                <input type="text"  id="idxskmpnenlabel" name="idxskmpnenlabel" readonly>
                                <div hidden>
                                    <input type="text"  id="idxskmpnen" name="idxskmpnen" readonly>
                                    <input type="text"  id="kdindex" name="kdindex" readonly>
                                    <input type="text"  id="thang" name="thang" readonly>
                                    <input type="text"  id="kdgiat" name="kdgiat" readonly>
                                    <input type="text"  id="kdoutput" name="kdoutput" readonly>
                                    <input type="text"  id="kdsoutput" name="kdsoutput" readonly>
                                    <input type="text"  id="kdkmpnen" name="kdkmpnen" readonly>
                                    <input type="text"  id="kdskmpnen" name="kdskmpnen" readonly>
                                    <input type="text"  id="kdakun" name="kdakun" readonly>
                                    <input type="text"  id="kdbeban" name="kdbeban" readonly>
                                    <input type="text"  id="ppk_id" name="ppk_id" readonly>

                                    <input type="text"  id="kdsatker" name="kdsatker" value="<?=$kdsatker?>">
                                </div>
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
                            <div class="input-field col s2"><label>Penandatangan ST</label></div>

                            <div class="input-field col s10 " >
                            <select class="browser-default" id="ttd" name="ttd"></select>
                            </div>
                        </div>

                        <div class="input-field col s12">
                            <div class="input-field col s2"><label>Penandatangan SPD</label></div>

                            <div class="input-field col s10 " >
                            <select class="browser-default" id="ttd_spd" name="ttd_spd"></select>
                            </div>
                        </div>
                        
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
