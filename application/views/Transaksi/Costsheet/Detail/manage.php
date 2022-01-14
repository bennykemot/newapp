<?php include(APPPATH . 'views/Header/Aside.php');

$menyetujui   = explode("-",$costsheet[0]->cs_menyetujui);
$mengajukan = explode("-",$costsheet[0]->cs_mengajukan); ?>

<div class="row">

<div class="col s12">
        <div class="card" id="head">
            <div class="card-content" >
                <div class="row">
                    <div class="col s1">
                        <button type="button" class="btn-floating" datayle=""><i class="material-icons">
                        add</i></button>
                    </div>
                    <div class="col s11">
                        <h6> Detail Costsheet : </h6>
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
                            <input type="text" id="nost" name="nost" value="<?= $costsheet[0]->nost ?>" readonly>
                            </div>
                        </div>

                        <div class="input-field col s12">
                            <div class="input-field col s2"><label>Uraian Penugasan</label></div>

                            <div class="input-field col s10 " >
                            <textarea id="uraianst" name="uraianst" class="materialize-textarea" readonly><?= $costsheet[0]->uraianst ?></textarea>
                            </div>
                        </div>

                        <div class="input-field col s12">
                            <div class="input-field col s2"><label>Tanggal ST</label></div>

                            <div class="input-field col s10 " >
                            <input type="date" id="tglst" name="tglst" value="<?= $costsheet[0]->tglst ?>" readonly>
                            </div>
                        </div>

                        <div class="input-field col s12">
                            <div class="input-field col s2"><label>Tanggal Mulai ST</label></div>

                            <div class="input-field col s10 " >
                            <input type="date" id="tglst_mulai" name="tglst_mulai" value="<?= $costsheet[0]->tglmulaist ?>" readonly>
                            </div>
                        </div>

                        <div class="input-field col s12">
                            <div class="input-field col s2"><label>Tanggal Selesai ST</label></div>

                            <div class="input-field col s10 " >
                            <input type="date" id="tglst_selesai" name="tglst_selesai" value="<?= $costsheet[0]->tglselesaist ?>" readonly>
                            </div>
                        </div>

                        <div class="input-field col s12">
                            <div class="input-field col s2"><label>RO</label></div>

                            <div class="input-field col s10 " >
                            <input id="ro_kode" name="ro_kode" value="<?= $costsheet[0]->idx_temp ?>" readonly></textarea>
                            </div>
                        </div>

                        <div class="input-field col s12">
                            <div class="input-field col s2"><label>MAK</label></div>

                            <div class="input-field col s10 " >
                                <input type="text"  id="idxskmpnenlabel" name="idxskmpnenlabel" value="<?= $costsheet[0]->idx_temp ?>" readonly>
                                <!-- <select class="browser-default" id="idxskmpnen" name="idxskmpnen"></select> -->
                            </div>
                        </div>

                        <div class="input-field col s12">
                            <div class="input-field col s2"><label>Alokasi</label></div>

                            <div class="input-field col s10 " >
                            <input readonly id="alokasilabel" name="alokasilabel">
                            <input readonly id="alokasi" name="alokasi" hidden>
                            </div>
                        </div>

                        <div class="input-field col s12">
                            <div class="input-field col s2"><label>Beban Anggaran</label></div>

                            <div class="input-field col s10 " >
                            <!-- <select class="browser-default" id="select-bebananggaran" name="select-bebananggaran"></select> -->
                            <input id="bebananggaran" name="bebananggaran" value="<?= $costsheet[0]->nama_unit ?>" readonly>
                            </div>
                        </div>

                        <div class="input-field col s12">
                            <div class="input-field col s2"><label>Penandatangan</label></div>

                            <div class="input-field col s10 " >
                                <input type="text"  id="ttd" name="ttd" hidden value="<?= $costsheet[0]->id_ttd ?>">
                                <input type="text"  id="ttd-nama" name="ttd-nama" value="<?= $costsheet[0]->id_ttd ?>" readonly>
                            </div>
                        </div>

                        <div class="input-field col s12">
                            <div class="input-field col s2"><label>Yang Menyetujui</label></div>

                            <div class="input-field col s10 " >
                            <input class="browser-default" name="cs_menyetujui" id="cs_menyetujui" value="<?= $menyetujui[2] ?>">
                            </div>
                        </div>

                        <div class="input-field col s12">
                            <div class="input-field col s2"><label>Yang Mengajukan</label></div>

                            <div class="input-field col s10 " >
                            <input class="browser-default" name="cs_mengajukan" id="cs_mengajukan" value="<?= $mengajukan[2] ?>">
                            </div>
                        </div>

                        
                        

                       

        <div id = "counting">
                <div class="multi-field-wrapper">

                    <div class="input-field col s12" >
                        <div class="input-field col s12">
                            <button type="button" class="btn warning col s12"><i class="material-icons left">face</i> DAFTAR TIM</button>
                        </div>
                    </div>


         <div class="multi-field-wrapper" >
            <table class="bordered striped fixed fixed multi-fields" id="tbUser">
                <thead>
                    <tr style="background-color: rgba(242,242,242,.5)">
                        <td  class="text-center" style="min-width: 90px" >NO</td>
                        <td class="text-center">TGL<br>BERANGKAT</td>
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
                        <td class="text-center" style="min-width: 50px">No SPD</td>
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
                    </tr>
                </thead>
                    <?php   $j=1;$no =1;
                            $total=0;
                            for($i = 0 ; $i < count($costsheet); $i++){
                                $kotaasal   = explode("-",$costsheet[$i]->kotaasal);
                                $kotatujuan = explode("-",$costsheet[$i]->kotatujuan); 
                                
                    ?>
                    <tbody id="Tbody" class="multi-field" style="border-top: 2px dotted #c5c5c4;">
                    <tr class="tb-tim" id="tb-tim<?=$j?>">
                        <td><input  class="nourut" type="number" id="urut<?=$j?>" name="urut<?=$j?>" min="1" max="20" value="<?=$j?>" readonly></td>
                        <td><input type="date" class="tglberangkat" id="tglberangkat<?=$j?>" name="tglberangkat<?=$j?>" value="<?= $costsheet[$i]->tglberangkat ?>" readonly></td>
                        <td><input type="date" class="tglkembali" id="tglkembali<?=$j?>" name="tglkembali<?=$j?>" value="<?= $costsheet[$i]->tglkembali ?>" readonly></td>
                        <td style="text-align: center"><input type="text" id="jmlhari<?=$j?>" name="jmlhari<?=$j?>" value="<?= $costsheet[$i]->jmlhari ?>" readonly></td>
                        <td colspan="2" id="Tim">
                        <input class="nama namaTim" name="nama<?=$j?>" id="nama<?=$j?>" value="<?= $costsheet[$i]->nama ?>" readonly>
                        <input name="idtim<?=$j?>" id="idtim<?=$j?>" value="<?= $costsheet[$i]->id_tim ?>"hidden>
                        </td>
                        <td colspan="2">
                            <input placeholder="NIP" class="nip" id="nip<?=$j?>" name="nip<?=$j?>"  value="<?= $costsheet[$i]->nip ?>" readonly>
                        </td>
                        <td colspan="2">
                            <textarea placeholder="Peran/Jabatan" class="perjab" id="perjab<?=$j?>" name="perjab<?=$j?>" ><?= $costsheet[$i]->jabatan ?></textarea>
                        </td>
                        <td><input type="text" id="gol<?=$j?>" name="gol<?=$j?>" value="<?= $costsheet[$i]->golongan ?>" readonly></td>
                        <td colspan="2">
                            <input class="browser-default kota kotaasal kotaselect" name="kotaasal<?=$j?>" id="kotaasal<?=$j?>" value="<?= $kotaasal[2] ?>" readonly>

                        </td>
                        <td colspan="3">
                            <input class="browser-default kota kotatujuan kotaselect"  name="kotatujuan<?=$j?>" id="kotatujuan<?=$j?>" value="<?= $kotatujuan[2] ?>" readonly>

                        </td>                                   
                        <td hidden><input type="text" id="tarifuangpenginapan<?=$j?>" name="tarifuangpenginapan<?=$j?>"></td>
                        <td hidden><input type="text" id="tarifuangharian<?=$j?>" name="tarifuangharian<?=$j?>" ></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="text" style='width:7em' id="nospd<?=$j?>" name="nospd<?=$j?>" value="SPD - " readonly>
                            <input type="text" style='width:8em' id="nospdST<?=$j?>" name="nospdST<?=$j?>">
                        </td>
                        <td><input style="min-width: 150px" type="text" id="satuan_uangharian<?=$j?>" name="satuan_uangharian<?=$j?>"  readonly value="<?= rupiah($costsheet[$i]->tarifuangharian) ?>"></td>
                        <td><input style="min-width: 150px" type="text" id="uangharian<?=$j?>" name="uangharian<?=$j?>" readonly value="<?= rupiah($costsheet[$i]->totaluangharian) ?>"></td>
                        <td><input style="min-width: 150px" type="text" id="satuan_uangpenginapan<?=$j?>" name="satuan_uangpenginapan<?=$j?>" readonly value="<?= rupiah($costsheet[$i]->tarifinap) ?>"></td>
                        <td><input style="min-width: 150px" type="text" id="uangpenginapan<?=$j?>" name="uangpenginapan<?=$j?>" readonly value="<?= rupiah($costsheet[$i]->totalinap) ?>"></td>
                        <td><input style="min-width: 150px" type="text" id="uangtaxi<?=$j?>" name="uangtaxi<?=$j?>" readonly value="<?= rupiah($costsheet[$i]->tariftaxi) ?>"></td>
                        <td><input style="min-width: 150px" type="text" id="uanglaut<?=$j?>" name="uanglaut<?=$j?>" readonly value="<?= rupiah($costsheet[$i]->tariflaut) ?>"></td>
                        <td><input style="min-width: 150px" type="text" id="uangudara<?=$j?>" name="uangudara<?=$j?>" readonly value="<?= rupiah($costsheet[$i]->tarifudara) ?>"></td>
                        <td><input style="min-width: 150px" type="text" id="uangdarat<?=$j?>" name="uangdarat<?=$j?>" readonly value="<?= rupiah($costsheet[$i]->tarifdarat) ?>"></td>
                        <td><input style="min-width: 150px" type="text" id="uangdll<?=$j?>" name="uangdll<?=$j?>" readonly value="<?= rupiah($costsheet[$i]->lain) ?>"></td>
                        <td><input style="min-width: 150px" type="text" id="uangrep<?=$j?>" name="uangrep<?=$j?>" readonly value="<?= rupiah($costsheet[$i]->totalrep) ?>"></td>
                        <td><input style="min-width: 150px" type="text" readonly id="total<?=$j?>"  name="total<?=$j?>" readonly value="<?= rupiah($costsheet[$i]->jumlah) ?>"></td>
                        <td><input class="select2 browser-default" id="jnstransportasi<?=$j?>" name="jnstransportasi<?=$j?>" readonly value="<?= $costsheet[$i]->jnstransportasi ?>"></td>
                        <td><input placeholder="Pilih Penandatangan SPD"  class="ttd_spd browser-default" id="ttd_spd<?=$j?>" readonly name="ttd_spd<?=$j?>" value="<?=$costsheet[0]->nama_ttd_spd?>"></td>
                    </tr>
                            </tbody>
                <?php   $j++;
            
                    $total += $costsheet[$i]->jumlah;}
            ?>
            </table>
            <div class="Sumtotal">
                <div class="input-field col s12">
                        <div class="input-field col s2"><label>Realisasi</label></div>
                            <div class="input-field col s4 " >
                                <input readonly id="realisasilabel" name="realisasilabel" value="<?=rupiah($total)?>">
                                <input readonly id="realisasi" name="realisasi" hidden>
                            </div>
                        <div class="input-field col s2"><label>Sisa</label></div>
                            <div class="input-field col s4 " >
                                <input readonly id="sisalabel" name="sisalabel" >
                                <input readonly id="sisa" name="sisa" hidden >
                            </div>
                </div>
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
