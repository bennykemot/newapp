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
                            <input class="datepicker" id="tglst" name="tglst" value="<?= date("d/m/Y",strtotime($ubah[0]['tglst'])); ?>">
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
                            <input class="datepicker" id="tglst_mulai" name="tglst_mulai" value="<?= date("d/m/Y",strtotime($ubah[0]['tglmulaist'])); ?>">
                            </div>
                        </div>

                        <div class="input-field col s12">
                            <div class="input-field col s2"><label>Tanggal Selesai</label></div>

                            <div class="input-field col s10 " >
                            <input class="datepicker" id="tglst_selesai" name="tglst_selesai" value="<?= date("d/m/Y",strtotime($ubah[0]['tglselesaist'])); ?>">
                            </div>
                        </div>

                        <div class="input-field col s12">
                            <div class="input-field col s2"><label>Komponen/Sub Komp</label></div>

                            <div class="input-field col s8 " >
                                <input type="text"  id="idxskmpnen" name="idxskmpnen" value="<?= $ubah[0]['idxskmpnen'] ?>" readonly>
                                <!-- <select class="browser-default" id="idxskmpnen" name="idxskmpnen"></select> -->
                            </div>

                            <div class="input-field col s2 " >
                                <button type="button" class="btn gradient-45deg-amber-amber col s12 modal-trigger" href="#modalidx" id ="modalIdx" name="modalIdx"><i class="material-icons left">search</i> Cari</button>
                            </div>
                        </div>

                        <div class="input-field col s12">
                            <div class="input-field col s2"><label>Beban Anggaran</label></div>

                            <div class="input-field col s10 " >
                            <select class="browser-default" id="beban_anggaran" name="beban_anggaran"></select>
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
                                        <button type="button" class="btn warning col s12"><i class="material-icons left">face</i> DAFTAR TIM</button>
                                    </div>

                                    <div class="input-field col s3 ">
                                        <button type="button" class="btn green col s12" id ="add-field" name="add-field"><i class="material-icons left">add</i> Tambah</button>
                                        <!-- <button type="button" class="btn green col s12" onclick="Tim()"><i class="material-icons left">add</i> Tambah</button> -->
                                    </div>
                                </div>


                                <div class="multi-fields">
                                    <div class="multi-field">
                                        <table class="bordered wrap table-tim" style="width: 100%" id="tbUser">
                                        <tr>
                                                    <td style="width: 7%" >NO</td>
                                                    <td style="width: 30%" >NAMA</td>
                                                    <td style="width: 15%" >NIP</td>
                                                    <td style="width: 30%" >PERAN/JABATAN</td>
                                                    <td style="width: 15%" >AKSI</td>
                                                </tr>
                                        <?php $j=1; for($i = 0 ; $i < count($ubah); $i++){ ?>
                                            
                                            
                                                <tr>
                                                
                                                <td style="width: 5%" ><?=$ubah[$i]['nourut']?></td>
                                                <td style="width: 30%" id="Tim" name="Tim">
                                                    <select placeholder="Nama.." class="namaTimHardcode browser-default" name="namaDummy<?=$j?>" id="namaDummy<?=$j?>" >
                                                        <option selected value="<?=$ubah[$i]['nip']?>"><?=$ubah[$i]['nama']?></option>
                                                    </select>
                                                    
                                                </td>
                                                <td style="width: 15%" id="niplabel<?=$j?>"><?=$ubah[$i]['nip']?></td>
                                                <td style="width: 30%" id="perjablabel<?=$j?>"><?=$ubah[$i]['peran']?></td>
                                                <td>
                                                    <div class="col s12">
                                                <!-- <span class="btn green col s5 table-edit" style="padding: 0px !important" id="w" ><i class="material-icons">edit</i></span>  -->
                                                <div class="col s2" style="padding-left: 2px; padding-right: 2px"></div>
                                                <span class="btn red col s5 table-remove" style="padding: 0px !important" id="<?=$j?>" ><i class="material-icons">delete</i></span>
                                                    </div>
                                                </td>
                                                </tr>

                                                <tr hidden>
                                                    <td><input type="text" id="idst" name="idst" value="<?= $ubah[0]['idst'] ?>"></td>
                                                    <td><input name="urut<?=$j?>" id="urut<?=$j?>" value="<?=$ubah[$i]['nourut']?>"></td>
                                                    <td><input name="nama<?=$j?>" id="nama<?=$j?>" value="<?=$ubah[$i]['nama']?>"></td>
                                                    <td><input class="nip" id="nip<?=$j?>" name="nip<?=$j?>" value="<?=$ubah[$i]['nip']?>"></td>
                                                    <td><input class="perjab" id="perjab<?=$j?>" name="perjab<?=$j?>" value="<?=$ubah[$i]['peran']?>"></td>
                                                </tr>
                                            

                                        <?php $j++;} ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <input id="ArrX" name="ArrX" hidden>

                                <!-- <div class="input-field col s12" style="padding-top: 10px">
                                    <div class="input-field col s12">
                                        <button type="button" class="btn col s12 grey darken-2"><i class="material-icons left">check</i> FORM PERSETUJUAN</button>
                                    </div>
                                </div>

                                <table class="bordered wrap a" style="width: 100%" id="a">
                                        <tr>
                                            <td style="width: 7%" >Eselon I</td>
                                            <td style="width: 7%" > <button class="<?= getapprove($ubah[0]['approved_eselon1'])?> col s12"></button></td>
                                        </tr>

                                        <tr>
                                            <td style="width: 7%" >Eselon II</td>
                                            <td style="width: 7%" ><?= getapprove($ubah[0]['approved_eselon2'])?></td>
                                        </tr>

                                        <tr>
                                            <td style="width: 7%" >Eselon III</td>
                                            <td style="width: 7%" ><?= getapprove($ubah[0]['approved_eselon3'])?></td>
                                        </tr>

                                        <tr>
                                            <td style="width: 7%" >Eselon IV</td>
                                            <td style="width: 7%" ><?= getapprove($ubah[0]['approved_eselon4'])?></td>
                                        </tr>
                                </table> -->

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