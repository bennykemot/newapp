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
                            <input type="text" id="nost" name="nost" value="<?= $ubah[0]['nost'] ?>">
                            
                            </div>
                        </div>

                        <div class="input-field col s12">
                            <div class="input-field col s2"><label>Tanggal ST</label></div>

                            <div class="input-field col s10 " >
                            <input type="date" id="tglst" name="tglst" value="<?= $ubah[0]['tglst']; ?>">
                            </div>
                        </div>

                        <div class="input-field col s12">
                            <div class="input-field col s2"><label>Uraian ST</label></div>

                            <div class="input-field col s10 " >
                            <textarea class="materialize-textarea" id="uraianst" name="uraianst" ><?= $ubah[0]['uraianst'] ?></textarea>
                            </div>
                        </div>

                        <div class="input-field col s12">
                            <div class="input-field col s2"><label>Tanggal Mulai</label></div>

                            <div class="input-field col s10 " >
                            <input type="date" id="tglst_mulai" name="tglst_mulai" onclick="Min_datemulai()" value="<?=$ubah[0]['tglmulaist']; ?>">
                            </div>
                        </div>

                        <div class="input-field col s12">
                            <div class="input-field col s2"><label>Tanggal Selesai</label></div>

                            <div class="input-field col s10 " >
                            <input type="date" id="tglst_selesai" name="tglst_selesai" onclick="Min_dateselesai()" value="<?= $ubah[0]['tglselesaist']; ?>">
                            </div>
                        </div>

                        <div class="input-field col s12">
                            <div class="input-field col s2"><label>MAK</label></div>

                            <div class="input-field col s8 " >
                                <input type="text"  id="idxskmpnenlabel" name="idxskmpnenlabel" value="<?= $ubah[0]['idx_temp'] ?>" readonly>
                                <input type="text"  id="idxskmpnen" name="idxskmpnen" value="<?= $ubah[0]['idxskmpnen'] ?>" readonly hidden>
                                
                                <div hidden>
                                    <input type="text"  id="kdindex" name="kdindex" value="<?= $ubah[0]['idxskmpnen'] ?>" readonly>
                                    <input type="text"  id="thang" name="thang" value="<?= $ubah[0]['thang'] ?>" readonly>
                                    <input type="text"  id="kdgiat" name="kdgiat" value="<?= $ubah[0]['kdgiat'] ?>" readonly>
                                    <input type="text"  id="kdoutput" name="kdoutput" value="<?= $ubah[0]['kdoutput'] ?>" readonly>
                                    <input type="text"  id="kdsoutput" name="kdsoutput" value="<?= $ubah[0]['kdsoutput'] ?>" readonly>
                                    <input type="text"  id="kdkmpnen" name="kdkmpnen" value="<?= $ubah[0]['kdkmpnen'] ?>" readonly>
                                    <input type="text"  id="kdskmpnen" name="kdskmpnen" value="<?= $ubah[0]['kdskmpnen'] ?>" readonly>
                                    <input type="text"  id="kdakun" name="kdakun" value="<?= $ubah[0]['kdakun'] ?>" readonly>
                                    <input type="text"  id="kdbeban" name="kdbeban" value="<?= $ubah[0]['kdbeban'] ?>" readonly>
                                    <input type="text"  id="kdapp" name="kdapp" value="<?= $ubah[0]['id_app'] ?>" readonly>
                                    <input type="text"  id="kdtahapan" name="kdtahapan" value="<?= $ubah[0]['id_tahapan'] ?>" readonly>
                                    <input type="text"  id="id_unit" name="id_unit" value="<?=$unit_id?>" readonly>
                                    <input type="text"  id="kdsatker" name="kdsatker" value="<?=$kdsatker?>">
                                </div>
                            </div>

                            <div class="input-field col s2 " >
                                <button type="button" class="btn gradient-45deg-amber-amber col s12 modal-trigger" href="#modalidx" id ="modalIdx" name="modalIdx"><i class="material-icons left">search</i> Cari</button>
                            </div>
                        </div>

                        <div class="input-field col s12">
                            <div class="input-field col s2"><label>Alokasi</label></div>

                            <div class="input-field col s10 " >
                            <input readonly id="alokasilabel" name="alokasilabel" value="<?= rupiah($ubah[0]['jumlah_uang']) ?>">
                            <input readonly id="alokasi" name="alokasi" hidden value="<?= number_format($ubah[0]['jumlah_uang'],0,',','') ?>">
                            </div>
                        </div>

                        <div class="input-field col s12">
                            <div class="input-field col s2"><label>Beban Anggaran</label></div>

                            <div class="input-field col s10 " >
                            <!-- <select class="browser-default" id="select-bebananggaran" name="select-bebananggaran"></select> -->
                            <input id="bebananggaran" name="bebananggaran" readonly>
                            </div>
                        </div>

                        <div class="input-field col s12">
                            <div class="input-field col s2"><label>Penandatangan</label></div>

                            <div class="input-field col s10 " >
                            <select class="browser-default" id="ttd" name="ttd"></select>
                            </div>
                        </div>

                        <div class="input-field col s12">
                            <div class="input-field col s2"><label>Yang Menyetuji</label></div>

                            <div class="input-field col s10 " >
                            <select class="browser-default" name="cs_menyetujui" id="cs_menyetujui"></select>
                            </div>
                        </div>

                        <div class="input-field col s12">
                            <div class="input-field col s2"><label>Yang Mengusulkan</label></div>

                            <div class="input-field col s10 " >
                            <select class="browser-default" name="cs_mengajukan" id="cs_mengajukan"></select>
                            </div>
                        </div>

                        
                        <?php if($ubah[0]['tim']== "WithTim"){include('Tim.php');}?>

                        
                        <div class="col s12" style="padding-top: 10px">
                            <div class="col s9"></div>

                            <div class="col s3">
                                <button id="UbahST" class="btn col s12"><i class="material-icons left">done</i> Simpan</button>
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
  <?php include('scriptedit.php');?>