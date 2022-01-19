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
                        <h6> Tambah Data Pegawai : </h6>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>

    <div class="col s12">
        <div class="card">
            <div class="card-content">

                <form id="FormPegawai" name="FormPegawai">
                    <div class="row">
                        <div class="input-field col s12">
                            <div class="input-field col s2"><label>NIP Lama</label></div>

                            <div class="input-field col s10 " >
                            <input type="text" id="niplama" name="niplama">
                            
							<!-- <input type="text" id="id" name="id" value="<?= $ubah[0]['id'] ?>" hidden> -->
                            </div>
                        </div>

                        <div class="input-field col s12">
                            <div class="input-field col s2"><label>NIP Baru</label></div>

                            <div class="input-field col s10 " >
                            <input type="text" id="nipbaru" name="nipbaru">
                            </div>
                        </div>

                        <div class="input-field col s12">
                            <div class="input-field col s2"><label>Nama Lengkap</label></div>

                            <div class="input-field col s10 " >
                            	<input type="text" id="nama_lengkap" name="nama_lengkap">
								
                            </div>
                        </div>

						<div class="input-field col s12">
                            <div class="input-field col s2"><label>Tempat Lahir</label></div>

                            <div class="input-field col s4 " >
                            <input type="text" id="tempat_lahir" name="tempat_lahir">
                            </div>

							<div class="input-field col s2"><label>Tanggal Lahir</label></div>

                            <div class="input-field col s4 " >
                            <input type="date" id="tgl_lahir" name="tgl_lahir">
                            </div>
                        </div>

                        <div class="input-field col s12">
                            <div class="input-field col s2"><label>Jenis Kelamin</label></div>

                            <div class="input-field col s4 " >
								<select  id="jk-select2" name="jk" class="browser-default"></select>
                            </div>

							<div class="input-field col s2"><label>Agama</label></div>

                            <div class="input-field col s4 " >
								<select id="agama-select2" name="agama" class="browser-default">
							</select>
                            </div>
                        </div>

						<div class="input-field col s12">
                            <div class="input-field col s2"><label>Pangkat</label></div>

                            <div class="input-field col s4 " >
								<select id="pangkat-select2" name="pangkat" class="browser-default">
								</select>
                            </div>

							<div class="input-field col s2"><label>TMT Jabatan</label></div>

                            <div class="input-field col s4 " >
                            <input type="date" id="tmt" name="tmt">
                            </div>
                        </div>

						<div class="input-field col s12">
                            <div class="input-field col s2"><label>Satuan Kerja</label></div>

                            <div class="input-field col s10 " >
								<select id="satker-select2" name="satker" class="select2-data-ajax select2-hidden-accessible browser-default"></select>
                            <!-- <input type="text" id="unit" name="unit" value="<?= $ubah[0]['namaunit_lengkap'] ?>"> -->
                            	<!-- <input type="text" id="satker_id" name="satker_id" readonly> -->
								
                            </div>
                        </div>
						
						<div class="input-field col s12">
                            <div class="input-field col s2"><label>Unit Kerja</label></div>

                            <div class="input-field col s10 " >
								<select id="unit-select2" name="unit" class="browser-default"></select>
                            </div>
                        </div>

						<div class="input-field col s12">
                            <div class="input-field col s2"><label>Peran/Jabatan</label></div>

                            <div class="input-field col s10 " >
                            <input type="text" id="jbtn" name="jbtn">
                            </div>
                        </div>

                        <div>
                            <input name="unitkerja_nama" id="unitkerja_nama" >
                            <input name="unitkerja_grup" id="unitkerja_grup" >
                            <input name="unitkerja_id" id="unitkerja_id" >
                        </div>  

						<div class="col s12" style="padding-top: 60px">
                            <div class="col s9"></div>

                            <div class="col s3">
                                <button id="TambahPegawai" class="btn col s12"><i class="material-icons left">done</i> Simpan</button>
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
<?php include('scriptadd.php');?>
