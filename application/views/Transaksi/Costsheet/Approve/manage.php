<?php include(APPPATH . 'views/Header/Aside.php');

$redOnly = "";$none="";
if($ubah[0]['status_id'] != 3){
    $redOnly = "readonly";
    $none="d-none";
}

function getUraian($dat){
    $res = "uraian_pusat";
    if($dat != 450491){
        $res = "uraian_perwakilan";
    }
    return $res;

}
?>

<div class="row">

<div class="col s12">
        <div class="card" id="head">
            <div class="card-content" >
                <div class="row">
                    <div class="col s1">
                        <button type="button" class="btn-floating" style=""><i class="material-icons">
                        done</i></button>
                    </div>
                    <div class="col s5">
                        <h6> Form Persetujuan</h6>
                    </div>

                    <div class="col s6 text-right">
                        <h6>
                            <p clas="purple-text"><?= $ubah[0]['status_id'] ?> - <?= $ubah[0][''.getUraian($ubah[0]['kdsatker'].'')] ?></p>
                        </h6>
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
                            <input readonly type="text" id="nost" name="nost" value="<?= $ubah[0]['nost'] ?>">
                            
                            </div>
                        </div>

                        <div class="input-field col s12">
                            <div class="input-field col s2"><label>Tanggal ST</label></div>

                            <div class="input-field col s10 " >
                            <input readonly type="date" id="tglst" name="tglst" value="<?= $ubah[0]['tglst']; ?>">
                            </div>
                        </div>

                        <div class="input-field col s12">
                            <div class="input-field col s2"><label>Uraian ST</label></div>

                            <div class="input-field col s10 " >
                            <textarea readonly class="materialize-textarea" id="uraianst" name="uraianst" ><?= $ubah[0]['uraianst'] ?></textarea>
                            </div>
                        </div>

                        <div class="input-field col s12">
                            <div class="input-field col s2"><label>Tanggal Mulai</label></div>

                            <div class="input-field col s10 " >
                            <input readonly type="date" id="tglst_mulai" name="tglst_mulai" onclick="Min_datemulai()" value="<?=$ubah[0]['tglmulaist']; ?>">
                            </div>
                        </div>

                        <div class="input-field col s12">
                            <div class="input-field col s2"><label>Tanggal Selesai</label></div>

                            <div class="input-field col s10 " >
                            <input readonly type="date" id="tglst_selesai" name="tglst_selesai" onclick="Min_dateselesai()" value="<?= $ubah[0]['tglselesaist']; ?>">
                            </div>
                        </div>

                        <div class="input-field col s12">
                            <div class="input-field col s2"><label>MAK</label></div>

                            <div class="input-field col s10 " >
                                <input <?=$redOnly?> type="text"  id="idxskmpnenlabel" name="idxskmpnenlabel" value="<?= $ubah[0]['idx_temp'] ?>" <?=$redOnly?>>
                                <input <?=$redOnly?> type="text"  id="idxskmpnen" name="idxskmpnen" value="<?= $ubah[0]['idxskmpnen'] ?>" <?=$redOnly?> hidden>
                                
                                <div hidden>
                                    <input <?=$redOnly?> type="text"  id="kdindex" name="kdindex" value="<?= $ubah[0]['idxskmpnen'] ?>" <?=$redOnly?>>
                                    <input <?=$redOnly?> type="text"  id="thang" name="thang" value="<?= $ubah[0]['thang'] ?>" <?=$redOnly?>>
                                    <input <?=$redOnly?> type="text"  id="kdgiat" name="kdgiat" value="<?= $ubah[0]['kdgiat'] ?>" <?=$redOnly?>>
                                    <input <?=$redOnly?> type="text"  id="kdoutput" name="kdoutput" value="<?= $ubah[0]['kdoutput'] ?>" <?=$redOnly?>>
                                    <input <?=$redOnly?> type="text"  id="kdsoutput" name="kdsoutput" value="<?= $ubah[0]['kdsoutput'] ?>" <?=$redOnly?>>
                                    <input <?=$redOnly?> type="text"  id="kdkmpnen" name="kdkmpnen" value="<?= $ubah[0]['kdkmpnen'] ?>" <?=$redOnly?>>
                                    <input <?=$redOnly?> type="text"  id="kdskmpnen" name="kdskmpnen" value="<?= $ubah[0]['kdskmpnen'] ?>" <?=$redOnly?>>
                                    <input <?=$redOnly?> type="text"  id="kdakun" name="kdakun" value="<?= $ubah[0]['kdakun'] ?>" <?=$redOnly?>>
                                    <input <?=$redOnly?> type="text"  id="kdbeban" name="kdbeban" value="<?= $ubah[0]['kdbeban'] ?>" <?=$redOnly?>>
                                    <input <?=$redOnly?> type="text"  id="kdapp" name="kdapp" value="<?= $ubah[0]['id_app'] ?>" <?=$redOnly?>>
                                    <input <?=$redOnly?> type="text"  id="kdtahapan" name="kdtahapan" value="<?= $ubah[0]['id_tahapan'] ?>" <?=$redOnly?>>
                                    <input <?=$redOnly?> type="text"  id="id_unit" name="id_unit" value="<?=$unit_id?>" <?=$redOnly?>>
                                    <input <?=$redOnly?> type="text"  id="kdsatker" name="kdsatker" value="<?=$kdsatker?>">
                                </div>
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
                            <!-- <select <?=$redOnly?> class="browser-default" id="select-bebananggaran" name="select-bebananggaran"></select> -->
                            <input readonly id="bebananggaran" name="bebananggaran" value="<?= $ubah[0]['nama_unit'] ?>" <?=$redOnly?>>
                            </div>
                        </div>

                        <div class="input-field col s12">
                            <div class="input-field col s2"><label>Penandatangan</label></div>

                            <div class="input-field col s10 " >
                            <!-- <select <?=$redOnly?> class="browser-default" id="ttd" name="ttd"></select> -->
                            <input readonly id="bebananggaran" name="bebananggaran" value="<?= $ubah[0]['nama_ttd'] ?>" <?=$redOnly?>>
                            </div>
                        </div>

                        <div class="input-field col s12">
                            <div class="input-field col s2"><label>Yang Menyetujui</label></div>

                            <div class="input-field col s10 " >
                            <!-- <select <?=$redOnly?> class="browser-default" name="cs_menyetujui" id="cs_menyetujui"></select> -->
                            <input readonly id="menyetujui" name="menyetujui">
                            </div>
                        </div>

                        <div class="input-field col s12">
                            <div class="input-field col s2"><label>Yang Mengusulkan</label></div>

                            <div class="input-field col s10 " >
                            <!-- <select <?=$redOnly?> class="browser-default" name="cs_mengajukan" id="cs_mengajukan"></select> -->
                            <input readonly id="mengajukan" name="mengajukan">
                            </div>
                        </div>

                        
                            <div id = "counting">
                <div class="multi-field-wrapper">


         <div class="multi-field-wrapper">
            <table class="bordered striped fixed fixed multi-fields" id="tbUser" >
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
                    <?php   $j=1;$no = []; 
                            $total=0;
                            for($i = 0 ; $i < count($ubah); $i++){ 
                                $kotaasal   = explode("-",$ubah[$i]['kotaasal']);
                                $kotatujuan = explode("-",$ubah[$i]['kotatujuan']);
                                
                    ?>
                    <tbody id="Tbody" class="multi-field" style="border-top: 2px dotted #c5c5c4;">
                    <tr class="tb-tim" id="tb-tim<?=$j?>">
                        <td><input readonly  class="nourut" type="number" id="urut<?=$j?>" name="urut<?=$j?>" min="1" max="20" value="<?=$ubah[$i]['nourut']?>"></td>
                        <td><input readonly type="date" min="<?=$ubah[$i]['tglmulaist']?>" max="<?=$ubah[$i]['tglselesaist']?>" onchange="dayCount('<?=$j?>','D')" id="tglberangkat<?=$j?>" name="tglberangkat<?=$j?>" value="<?=$ubah[$i]['tglberangkat']?>"></td>
                        <td><input readonly type="date" max="<?=$ubah[$i]['tglselesaist']?>" min="<?=$ubah[$i]['tglmulaist']?>" onchange="dayCount(<?=$j?>)" id="tglkembali<?=$j?>" name="tglkembali<?=$j?>" value="<?=$ubah[$i]['tglkembali']?>"></td>
                        <td><input readonly type="text" id="jmlhari<?=$j?>" name="jmlhari<?=$j?>" value="<?=$ubah[$i]['jmlhari']?>"></td>
                        <td colspan="2" id="Tim">
                        <select readonly placeholder="Nama.."  class="namaTimHardcode browser-default namaTim" id="namaDummy<?=$j?>" name="namaDummy<?=$j?>" onclick="ubahNama('<?=$j?>')">
                            <option selected value="<?=$ubah[$i]['nip']?>"><?=$ubah[$i]['nama']?></option>
                        </select>
                        <input readonly class="nama" name="nama<?=$j?>" id="nama<?=$j?>" value="<?=$ubah[$i]['nama']?>" hidden>
                        <input readonly name="idtim<?=$j?>" id="idtim<?=$j?>" value="<?=$ubah[$i]['idtim']?>"hidden>
                        </td>
                        <td colspan="2">
                            <input readonly> placeholder="NIP" class="nip" id="nip<?=$j?>" name="nip<?=$j?>" value="<?=$ubah[$i]['nip']?>" <?=$redOnly?>>
                        </td>
                        <td colspan="2">
                            <textarea readonly placeholder="Peran/Jabatan" class="perjab" id="perjab<?=$j?>" name="perjab<?=$j?>"><?=$ubah[$i]['jabatan']?></textarea>
                        </td>
                        <td><input readonly type="text" id="gol<?=$j?>" name="gol<?=$j?>" value="<?=$ubah[$i]['golongan']?>" <?=$redOnly?>></td>
                        <td colspan="2">
                            <select readonly class="browser-default kota kotaasal kotaselect" name="kotaasal<?=$j?>" id="kotaasal<?=$j?>" onchange="cityCount(<?=$j?>)">
                                <option selected value="<?=$ubah[$i]['kotaasal']?>"><?=$kotaasal[2]?></option>
                            </select>
                        </td>
                        <td colspan="3">
                            <select readonly class="browser-default kota kotatujuan kotaselect"  name="kotatujuan<?=$j?>" id="kotatujuan<?=$j?>" onchange="cityCount(<?=$j?>)">
                                <option selected value="<?=$ubah[$i]['kotatujuan']?>"><?=$kotatujuan[2]?></option>
                            </select>
                        </td>                                   
                        <td hidden><input readonly type="text" id="tarifuangpenginapan<?=$j?>" name="tarifuangpenginapan<?=$j?>"></td>
                        <td hidden><input readonly type="text" id="tarifuangharian<?=$j?>" name="tarifuangharian<?=$j?>" ></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input <?=$redOnly?> type="text" id="nospd<?=$j?>" name="nospd<?=$j?>" value="<?=$ubah[$i]['nospd']?>"></td>
                        <td><input <?=$redOnly?> style="min-width: 150px" type="text" id="satuan_uangharian<?=$j?>" name="satuan_uangharian<?=$j?>" onkeyup="AllCount('<?=$j?>','satuan')" value="<?=rupiah($ubah[$i]['tarifuangharian'])?>"></td>
                        <td><input <?=$redOnly?> style="min-width: 150px" type="text" id="uangharian<?=$j?>" name="uangharian<?=$j?>" onkeyup="AllCount('<?=$j?>','total')" value="<?=rupiah($ubah[$i]['totaluangharian'])?>"></td>
                        <td><input <?=$redOnly?> style="min-width: 150px" type="text" id="satuan_uangpenginapan<?=$j?>" name="satuan_uangpenginapan<?=$j?>" onkeyup="AllCount('<?=$j?>','satuan')" value="<?=rupiah($ubah[$i]['tarifinap'])?>"></td>
                        <td><input <?=$redOnly?> style="min-width: 150px" type="text" id="uangpenginapan<?=$j?>" name="uangpenginapan<?=$j?>" value="<?=rupiah($ubah[$i]['totalinap'])?>"></td>
                        <td><input <?=$redOnly?> style="min-width: 150px" type="text" id="uangtaxi<?=$j?>" name="uangtaxi<?=$j?>" onkeyup="AllCount('<?=$j?>','all')" value="<?=rupiah($ubah[$i]['tariftaxi'])?>"></td>
                        <td><input <?=$redOnly?> style="min-width: 150px" type="text" id="uanglaut<?=$j?>" name="uanglaut<?=$j?>" onkeyup="AllCount('<?=$j?>','all')" value="<?=rupiah($ubah[$i]['tariflaut'])?>"></td>
                        <td><input <?=$redOnly?> style="min-width: 150px" type="text" id="uangudara<?=$j?>" name="uangudara<?=$j?>" onkeyup="AllCount('<?=$j?>','all')" value="<?=rupiah($ubah[$i]['tarifudara'])?>"></td>
                        <td><input <?=$redOnly?> style="min-width: 150px" type="text" id="uangdarat<?=$j?>" name="uangdarat<?=$j?>" onkeyup="AllCount('<?=$j?>','all')" value="<?=rupiah($ubah[$i]['tarifdarat'])?>"></td>
                        <td><input <?=$redOnly?> style="min-width: 150px" type="text" id="uangdll<?=$j?>" name="uangdll<?=$j?>" onkeyup="AllCount('<?=$j?>','all')" value="<?=rupiah($ubah[$i]['lain'])?>"></td>
                        <td><input <?=$redOnly?> style="min-width: 150px" type="text" id="uangrep<?=$j?>" name="uangrep<?=$j?>" onkeyup="AllCount('<?=$j?>','all')" value="<?=rupiah($ubah[$i]['tarifrep'])?>"></td>
                        <td><input <?=$redOnly?> style="min-width: 150px" type="text" id="total<?=$j?>"  name="total<?=$j?>" value="<?=rupiah($ubah[$i]['jumlah'])?>"></td>
                        <td><input <?=$redOnly?> class="select2 browser-default" id="jnstransportasi<?=$j?>" name="jnstransportasi<?=$j?>" value="<?=$ubah[$i]['jnstransportasi']?>"></td>
                        <td><select readonly placeholder="Pilih Penandatangan SPD"  class="ttd_spd browser-default" id="ttd_spd<?=$j?>" name="ttd_spd<?=$j?>" onclick="ubahTtdSpd('<?=$j?>')">
                            <option selected value="<?=$ubah[$i]['id_ttd_spd']?>"> <?=$ubah[$i]['nama_ttd_spd']?> </option>
                        </select></td>
                        <td>
                            <?php $total += $ubah[$i]['jumlah']; if($j != 1){?>
                                <div class="col s12">
                                    <a type="button"><span class="col s4 table-remove" style="padding: 0px !important" id="<?=$j?>" ><i class="material-icons">delete</i></span></a>
                                </div>
                            <?php }?>
                        </td>
                    </tr>
                            </tbody>
                <?php   $j++;}?>
            </table>
            <input readonly id="ArrX" name="ArrX" hidden>
            <div class="Sumtotal">
                <div class="input-field col s12">
                        <div class="input-field col s2"><label>Realisasi</label></div>
                            <div class="input-field col s4 " >
                                <input readonly id="realisasilabel" name="realisasilabel" value="<?=rupiah($total)?>">
                                <input readonly id="realisasi" name="realisasi" hidden value="<?=$total?>">
                            </div>
                        <div class="input-field col s2"><label>Sisa</label></div>
                            <div class="input-field col s4 " >
                                <input readonly id="sisalabel" name="sisalabel" >
                                <input readonly id="sisa" name="sisa" hidden >
                            </div>
                </div>
            </div>
            <input readonly id="id_st" name="id_st" value="<?= $ubah[0]['idst'] ?>" hidden>
            <input readonly id="id_cs" name="id_cs" value="<?= $ubah[0]['id_cs'] ?>" hidden>
        </div>
    </div>

                        

                        
                        <div class="col s12" style="padding-top: 10px">
                        <div class="col s6">
                                <button id="TolakST" class="btn red col s12"><i class="material-icons left">close</i> Tolak</button>
                            </div>
                            
                            <div class="col s6">
                                <button id="ApproveST" class="btn col s12"><i class="material-icons left">done</i> Approve</button>
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