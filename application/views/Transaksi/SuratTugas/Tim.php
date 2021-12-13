<div id = "counting">
                            <div class="multi-field-wrapper">

                                <div class="input-field col s12" >
                                    <div class="input-field col s12">
                                        <button type="button" class="btn warning col s12"><i class="material-icons left">face</i> DAFTAR TIM</button>
                                    </div>

                                    <!-- <div class="input-field col s3 ">
                                        <button type="button" class="btn green col s12" id ="add-field" name="add-field"><i class="material-icons left">add</i> Tambah</button>
                                    </div> -->
                                </div>


                                <div class="multi-fields">
                                    <div class="multi-field">
                                        <table class="bordered table-tim fixed"id="tbUser">
                                        <thead><tr>
                                            <td style="width: 5px" >NO</td>
                                            <td style="min-width: 200px" >NAMA</td>
                                            <td style="min-width: 200px" >NIP</td>
                                            <td style="min-width: 250px" >PERAN/JABATAN</td>
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
                                            <td style="min-width: 250px">JENIS<br>TRANSPORTASI</td>
                                            <td style="min-width: 15px" >AKSI</td>
                                        </tr></thead>
                                                <?php   $j=1;$no = []; 
                                                        
                                                        for($i = 0 ; $i < count($ubah); $i++){ 
                                                          $kotaasal   = explode("-",$ubah[$i]['kotaasal']);
                                                          $kotatujuan = explode("-",$ubah[$i]['kotatujuan']);
                                                            
                                                ?>
                                            
                                            <tr>
                                                <td><input  type="number" id="urut<?=$j?>" name="urut<?=$j?>" min="1" max="20" value="<?=$ubah[$i]['nourut']?>"></td>
                                                <td id="Tim" name="Tim">
                                                    <select placeholder="Nama.." class="namaTimHardcode browser-default" name="namaDummy<?=$j?>" id="namaDummy<?=$j?>" >
                                                        <option selected value="<?=$ubah[$i]['nip']?>"><?=$ubah[$i]['nama']?></option>
                                                    </select><br>
                                                <input class="namaTim" name="nama<?=$j?>" id="nama<?=$j?>" value="<?=$ubah[$i]['nama']?>" hidden>
                                                <input name="idtim<?=$j?>" id="idtim<?=$j?>" value="<?=$ubah[$i]['idtim']?>"hidden>
                                                </td>
                                                <td>
                                                    <input placeholder="NIP" class="nip" id="niplabel<?=$j?>" name="niplabel<?=$j?>" value="<?=$ubah[$i]['nip']?>" readonly>
                                                    <input class="nip" name="nip<?=$j?>" id="nip<?=$j?>" value="<?=$ubah[$i]['nip']?>" hidden>       
                                                </td>
                                                <td>
                                                    <textarea placeholder="Peran/Jabatan" class="perjab" id="perjab<?=$j?>" name="perjab<?=$j?>" readonly><?=$ubah[$i]['jabatan']?></textarea>
                                                </td>
                                                <td><input type="text" id="gol<?=$j?>" name="gol<?=$j?>" readonly value="<?=$ubah[$i]['golongan']?>"></td>
                                                <td>
                                                    <select class="browser-default kota" name="kotaasal<?=$j?>" id="kotaasal<?=$j?>" onchange="cityCount(<?=$j?>)">
                                                        <option selected value="<?=$ubah[$i]['kotaasal']?>"><?=$kotaasal[2]?></option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="browser-default kota"  name="kotatujuan<?=$j?>" id="kotatujuan<?=$j?>" onchange="cityCount(<?=$j?>)">
                                                        <option selected value="<?=$ubah[$i]['kotatujuan']?>"><?=$kotatujuan[2]?></option>
                                                    </select>
                                                </td>
                                                <td><input type="date" min="<?=$ubah[$i]['tglmulaist']?>" max="<?=$ubah[$i]['tglselesaist']?>" onchange="dayCount('<?=$j?>','D')" id="tglberangkat<?=$j?>" name="tglberangkat<?=$j?>" value="<?=$ubah[$i]['tglberangkat']?>"></td>
                                                <td><input type="date" max="<?=$ubah[$i]['tglselesaist']?>" min="<?=$ubah[$i]['tglmulaist']?>" onchange="dayCount(<?=$j?>)" id="tglkembali<?=$j?>" name="tglkembali<?=$j?>" value="<?=$ubah[$i]['tglkembali']?>"></td>
                                                <td><input type="text" id="jmlhari<?=$j?>" name="jmlhari<?=$j?>" readonly value="<?=$ubah[$i]['jmlhari']?>"></td>
                                                <td><input type="text" id="uangharian<?=$j?>" name="uangharian<?=$j?>" value="<?=rupiah($ubah[$i]['totaluangharian'])?>"></td>
                                                <td><input type="text" id="uangpenginapan<?=$j?>" name="uangpenginapan<?=$j?>" value="<?=rupiah($ubah[$i]['totalinap'])?>"></td>
                                                <td><input type="text" onkeypress="return validateNumber(event)" value="<?=rupiah($ubah[$i]['totaltravel'])?>"></td>
                                                <td><input type="text" onkeypress="return validateNumber(event)" value="<?=rupiah($ubah[$i]['totalrep'])?>"></td>
                                                <td><input type="text" id="total<?=$j?>"  name="total<?=$j?>" value="<?=rupiah($ubah[$i]['jumlah'])?>"></td>
                                                <td><select class="select2 browser-default" id="jnstransportasi<?=$j?>" name="jnstransportasi<?=$j?>">
                                                        <option value="Pesawat Udara">Pesawat Udara</option>
                                                        <option value="Kendaraan Umum">Kendaraan Umum</option>
                                                    </select</td>
                                                <td>
                                                <?php if($j != 1){?>
                                                    <div class="col s12">
                                                        <a type="button"><span class="col s4 table-remove" style="padding: 0px !important" id="<?=$j?>" ><i class="material-icons">delete</i></span></a>
                                                    </div>
                                                <?php }?>
                                                </td>
                                                
                                                <td hidden><input type="text" id="tarifuangpenginapan<?=$j?>" name="tarifuangpenginapan<?=$j?>"></td>
                                                <td hidden><input type="text" id="tarifuangharian<?=$j?>" name="tarifuangharian<?=$j?>" ></td>
                                            </tr>

                                            
                                                

                                                <!-- <tr hidden>
                                                    <td><input type="text" id="idst" name="idst" value="<?= $ubah[0]['idst'] ?>"></td>
                                                    <td><input name="urut<?=$j?>" id="urut<?=$j?>" value="<?=$ubah[$i]['nourut']?>"></td>
                                                    <td><input name="nama<?=$j?>" id="nama<?=$j?>" value="<?=$ubah[$i]['nama']?>"></td>
                                                    <td><input class="nip" id="nip<?=$j?>" name="nip<?=$j?>" value="<?=$ubah[$i]['nip']?>"></td>
                                                    <td><input class="perjab" id="perjab<?=$j?>" name="perjab<?=$j?>" value="<?=$ubah[$i]['jabatan']?>"></td>
                                                </tr> -->
                                            

                                        <?php   $j++;}?>
                                        </table>
                                        <input id="ArrX" name="ArrX" hidden>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        