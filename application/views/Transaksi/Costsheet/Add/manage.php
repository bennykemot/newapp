<?php include(APPPATH . 'views/Header/Aside.php') ?>

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
                        <h6> Input Costsheet : </h6>
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
                            <input type="text" id="nost" name="nost" value="<?= $data[0]['no_surat_tugas'] ?>" readonly>
                            </div>
                        </div>

                        <div class="input-field col s12">
                            <div class="input-field col s2"><label>Uraian Penugasan</label></div>

                            <div class="input-field col s10 " >
                            <textarea id="uraianst" name="uraianst" class="materialize-textarea" readonly><?= $data[0]['nama_penugasan'] ?></textarea>
                            </div>
                        </div>

                        <div class="input-field col s12">
                            <div class="input-field col s2"><label>Tanggal ST</label></div>

                            <div class="input-field col s10 " >
                            <input type="date" id="tglst" name="tglst" value="<?= $data[0]['tanggal_surat_tugas'] ?>" readonly>
                            </div>
                        </div>

                        <div class="input-field col s12">
                            <div class="input-field col s2"><label>Tanggal Mulai ST</label></div>

                            <div class="input-field col s10 " >
                            <input type="date" id="tglst_mulai" name="tglst_mulai" value="<?= $data[0]['tanggal_mulai'] ?>" readonly>
                            </div>
                        </div>

                        <div class="input-field col s12">
                            <div class="input-field col s2"><label>Tanggal Selesai ST</label></div>

                            <div class="input-field col s10 " >
                            <input type="date" id="tglst_selesai" name="tglst_selesai" value="<?= $data[0]['tanggal_selesai'] ?>" readonly>
                            </div>
                        </div>

                        <div class="input-field col s12">
                            <div class="input-field col s2"><label>RO</label></div>

                            <div class="input-field col s10 " >
                            <input id="ro_kode" name="ro_kode" value="<?= $data[0]['ro_kode'] ?>" readonly></textarea>
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
                                    <input type="text"  id="kdapp" name="kdapp" readonly>
                                    <input type="text"  id="kdtahapan" name="kdtahapan" readonly>
                                    <input type="text"  id="ppk_id" name="ppk_id" readonly>
                                    <input type="text"  id="id_unit" name="id_unit" value="<?=$unit_id?>" readonly>
                                    <input type="text"  id="kdkabkota" name="kdkabkota"  value="<?= $lok[0]->kdkabkota ?>" hidden>
                                    <input type="text"  id="kdlokasi" name="kdlokasi"  value="<?= $lok[0]->kdlokasi ?>" hidden>
                                    <input type="text"  id="kdsatker" name="kdsatker" value="<?=$kdsatker?>">
                                </div>
                                <!-- <select class="browser-default" id="idxskmpnen" name="idxskmpnen"></select> -->
                            </div>

                            <div class="input-field col s2 " >
                                <button type="button" class="btn gradient-45deg-amber-amber col s12 modal-trigger" href="#modalidx" id ="modalIdx" name="modalIdx"><i class="material-icons left">search</i> Cari</button>
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
                            <input id="bebananggaran" name="bebananggaran" readonly>
                            </div>
                        </div>

                        <div class="input-field col s12">
                            <div class="input-field col s2"><label>Penandatangan</label></div>

                            <div class="input-field col s10 " >
                                <input type="text"  id="ttd" name="ttd" hidden value="<?= $data[0]['ttd_nip'] ?>">
                                <input type="text"  id="ttd-nama" name="ttd-nama" value="<?= $data[0]['ttd_nama'] ?>" readonly>
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

                        
                        

                       

        <div id = "counting">
                <div class="multi-field-wrapper">

                    <div class="input-field col s12" >
                        <div class="input-field col s12">
                            <button type="button" class="btn warning col s12"><i class="material-icons left">face</i> DAFTAR TIM</button>
                        </div>
                    </div>


         <div class="multi-field-wrapper" >
            <table class="bordered striped fixed fixed multi-fields" id="tbUser" style="display: none">
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
                            for($i = 0 ; $i < $countdata; $i++){ 
                                
                    ?>
                    <tbody id="Tbody" class="multi-field" style="border-top: 2px dotted #c5c5c4;">
                    <tr class="tb-tim" id="tb-tim<?=$j?>">
                        <td><input  class="nourut" type="number" id="urut<?=$j?>" name="urut<?=$j?>" min="1" max="20" value="<?=$j?>" readonly></td>
                        <td><input type="date" class="tglberangkat" onchange="dayCount('<?=$j?>','D')" id="tglberangkat<?=$j?>" name="tglberangkat<?=$j?>" value=""></td>
                        <td><input type="date" class="tglkembali" onchange="dayCount(<?=$j?>)" id="tglkembali<?=$j?>" name="tglkembali<?=$j?>" value="" ></td>
                        <td style="text-align: center"><input type="text" id="jmlhari<?=$j?>" name="jmlhari<?=$j?>" onkeyup="cityCount('<?=$j?>','edit')"></td>
                        <td colspan="2" id="Tim">
                        <input class="nama namaTim" name="nama<?=$j?>" id="nama<?=$j?>" value="<?= $data[$i]['nama'] ?>" readonly>
                        <input name="idtim<?=$j?>" id="idtim<?=$j?>" value="<?= $data[$i]['id_tim'] ?>"hidden>
                        </td>
                        <td colspan="2">
                            <input placeholder="NIP" class="nip" id="nip<?=$j?>" name="nip<?=$j?>"  value="<?= $data[$i]['nip'] ?>" readonly>
                        </td>
                        <td colspan="2">
                            <textarea placeholder="Peran/Jabatan" class="perjab" id="perjab<?=$j?>" name="perjab<?=$j?>" ><?= $data[$i]['peran'] ?></textarea>
                        </td>
                        <td><input type="text" id="gol<?=$j?>" name="gol<?=$j?>" value="<?= $data[$i]['golongan'] ?>" readonly></td>
                        <td colspan="2">
                            <select class="browser-default kota kotaasal kotaselect" name="kotaasal<?=$j?>" id="kotaasal<?=$j?>" onchange="cityCount('<?=$j?>','default')" >
                            </select>
                        </td>
                        <td colspan="3">
                            <select class="browser-default kota kotatujuan kotaselect"  name="kotatujuan<?=$j?>" id="kotatujuan<?=$j?>" onchange="cityCount('<?=$j?>','default')" >
                            </select>
                            <input hidden id="provinsi<?=$j?>" value="<?= $data[$i]['lokasi_provinsi_kode'] ?>">
                            <input hidden id="kota<?=$j?>" value="<?= $data[$i]['lokasi_kabupaten_kode'] ?>">
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
                        <td><input style="min-width: 150px" type="text" id="satuan_uangharian<?=$j?>" name="satuan_uangharian<?=$j?>" onkeyup="AllCount('<?=$j?>','satuan')" value=""></td>
                        <td><input style="min-width: 150px" type="text" id="uangharian<?=$j?>" name="uangharian<?=$j?>" onkeyup="AllCount('<?=$j?>','total')" value=""></td>
                        <td><input style="min-width: 150px" type="text" id="satuan_uangpenginapan<?=$j?>" name="satuan_uangpenginapan<?=$j?>" onkeyup="AllCount('<?=$j?>','satuan')" value=""></td>
                        <td><input style="min-width: 150px" type="text" id="uangpenginapan<?=$j?>" name="uangpenginapan<?=$j?>" readonly value=""></td>
                        <td><input style="min-width: 150px" type="text" id="uangtaxi<?=$j?>" name="uangtaxi<?=$j?>" onkeyup="AllCount('<?=$j?>','all')" value=""></td>
                        <td><input style="min-width: 150px" type="text" id="uanglaut<?=$j?>" name="uanglaut<?=$j?>" onkeyup="AllCount('<?=$j?>','all')" value=""></td>
                        <td><input style="min-width: 150px" type="text" id="uangudara<?=$j?>" name="uangudara<?=$j?>" onkeyup="AllCount('<?=$j?>','all')" value=""></td>
                        <td><input style="min-width: 150px" type="text" id="uangdarat<?=$j?>" name="uangdarat<?=$j?>" onkeyup="AllCount('<?=$j?>','all')" value=""></td>
                        <td><input style="min-width: 150px" type="text" id="uangdll<?=$j?>" name="uangdll<?=$j?>" onkeyup="AllCount('<?=$j?>','all')" value=""></td>
                        <td><input style="min-width: 150px" type="text" id="uangrep<?=$j?>" name="uangrep<?=$j?>" onkeyup="AllCount('<?=$j?>','all')" value=""></td>
                        <td><input style="min-width: 150px" type="text" readonly id="total<?=$j?>"  name="total<?=$j?>" value=""></td>
                        <td><select class="select2 browser-default" id="jnstransportasi<?=$j?>" name="jnstransportasi<?=$j?>">
                            <option value="Kendaraan Umum">Kendaraan Umum</option>
                            <option value="Kendaraan Dinas">Kendaraan Dinas</option>
                        </select</td>
                        <td><select placeholder="Pilih Penandatangan SPD"  class="ttd_spd browser-default" id="ttd_spd<?=$j?>" name="ttd_spd<?=$j?>" >
                        </select></td>
                    </tr>
                            </tbody>
                <?php   $j++;
            
                     }
            ?>
            </table>
            <div class="Sumtotal">
                <div class="input-field col s12">
                        <div class="input-field col s2"><label>Realisasi</label></div>
                            <div class="input-field col s4 " >
                                <input readonly id="realisasilabel" name="realisasilabel">
                                <input readonly id="realisasi" name="realisasi" hidden>
                            </div>
                        <div class="input-field col s2"><label>Sisa</label></div>
                            <div class="input-field col s4 " >
                                <input readonly id="sisalabel" name="sisalabel" >
                                <input readonly id="sisa" name="sisa" hidden >
                            </div>
                </div>
            </div>
            <input id="id_st" name="id_st" value="<?= $data[0]['id_st'] ?>" hidden>
        </div>
    </div>
                    

                        <div class="col s12" datayle="padding-top: 10px">
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
<?php include('modal.php');?>
<?php include(APPPATH . 'views/Footer/Footer.php') ?>
<?php include('script.php');?>
