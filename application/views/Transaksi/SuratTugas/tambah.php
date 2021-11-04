<?php include(APPPATH . 'views/Header/Aside.php') ?>

<div class="row">

    <div class="col s12">
        <div class="card">
            <div class="card-content" style="height: 90px; padding: 0px !important">
                <div class="col s1 display-flex justify-content-end" style="height: 100%;padding: 24px;padding-right: 34px; border-radius: 10px" >
                    <button type="button" class="btn-floating" style=""><i class="material-icons">
                    add
                    </i></button>
                </div>
                <div class="col s9" style="padding-top: 24px">
                    <h6> Input Surat Tugas : </h6>
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

                            <div class="input-field col s8 " >
                                <input type="text"  id="idxskmpnen" name="idxskmpnen" readonly>
                                <!-- <select class="browser-default" id="idxskmpnen" name="idxskmpnen"></select> -->
                            </div>

                            <div class="input-field col s2 " >
                                <button type="button" class="btn gradient-45deg-amber-amber col s12 modal-trigger" href="#modalidx" id ="modalIdx" name="modalIdx"><i class="material-icons left">search</i> Cari</button>
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
                                        <button type="button" class="btn warning col s12"><i class="material-icons left">face</i> DAFTAR TIM</button>
                                    </div>

                                    <div class="input-field col s3 ">
                                        <button type="button" class="btn green col s12" id ="add-field" name="add-field"><i class="material-icons left">add</i> Tambah</button>
                                    </div>
                                </div>


                                <div class="multi-fields">
                                    <div class="multi-field">
                                    </div>
                                </div>
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