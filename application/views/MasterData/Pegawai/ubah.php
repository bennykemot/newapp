<?php include(APPPATH . 'views/Header/Aside.php') ?>

<div class="row">

<div class="col s12">
        <div class="card" id="head">
            <div class="card-content" >
                <div class="row">
                    <div class="col s1">
                        <button type="button" class="btn-floating" style=""><i class="material-icons">
                        face</i></button>
                    </div>
                    <div class="col s11">
                        <h6> Ubah Data Pegawai : </h6>
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
                            <input type="text" id="niplama" name="niplama" value="<?= $ubah[0]['niplama'] ?>">
                            
							<input type="text" id="id" name="id" value="<?= $ubah[0]['id'] ?>" hidden>
                            </div>
                        </div>

                        <div class="input-field col s12">
                            <div class="input-field col s2"><label>NIP Baru</label></div>

                            <div class="input-field col s10 " >
                            <input type="text" id="nipbaru" name="nipbaru" value="<?= $ubah[0]['nip'] ?>">
                            </div>
                        </div>

                        <div class="input-field col s12">
                            <div class="input-field col s2"><label>Nama Lengkap</label></div>

                            <div class="input-field col s10 " >
                            <input type="text" id="nama_lengkap" name="nama_lengkap" value="<?= $ubah[0]['nama_lengkap'] ?>">
                            </div>
                        </div>

						<div class="input-field col s12">
                            <div class="input-field col s2"><label>Tempat Lahir</label></div>

                            <div class="input-field col s4 " >
                            <input type="text" id="tempat_lahir" name="tempat_lahir" value="<?= $ubah[0]['tempat_lahir'] ?>">
                            </div>

							<div class="input-field col s2"><label>Tanggal Lahir</label></div>

                            <div class="input-field col s4 " >
                            <input type="date" id="tgl_lahir" name="tgl_lahir" value="<?= $ubah[0]['tgl_lahir'] ?>">
                            </div>
                        </div>

                        <div class="input-field col s12">
                            <div class="input-field col s2"><label>Jenis Kelamin</label></div>

                            <div class="input-field col s4 " >
                            <select class="select2 browser-default" name="jk">
								<?php
									if($ubah[0]['jenis_kelamin'] == "Laki-laki"){
										echo '
										<option value="Laki-laki" selected>Laki-laki</option>
										<option value="Perempuan">Perempuan</option>';
									}else{
										echo '
										<option value="Laki-laki">Laki-laki</option>
										<option value="Perempuan" selected>Perempuan</option>';
									}

								?>
								
							</select>
                            </div>

							<div class="input-field col s2"><label>Agama</label></div>

                            <div class="input-field col s4 " >
							<select id="agama-select2" name="agama" class="select2-data-ajax select2-hidden-accessible browser-default" value="<?= $ubah[0]['agama'] ?>">
							</select>
                            </div>
                        </div>

						<div class="input-field col s12">
                            <div class="input-field col s2"><label>Pangkat</label></div>

                            <div class="input-field col s4 " >
                            <select id="pangkat-select2" name="pangkat" class="select2-data-ajax select2-hidden-accessible browser-default" value="<?= $ubah[0]['nama_pangkat'] ?>">
							</select>
                            </div>

							<div class="input-field col s2"><label>TMT Jabatan</label></div>

                            <div class="input-field col s4 " >
                            <input type="date" id="tmt" name="tmt" value="<?= $ubah[0]['tmt_jab'] ?>">
                            </div>
                        </div>

						<div class="input-field col s12">
                            <div class="input-field col s2"><label>Jabatan</label></div>

                            <div class="input-field col s10 " >
                            <input type="text" id="jbtn" name="jbtn" value="<?= $ubah[0]['jabatan'] ?>">
                            </div>

							
                        </div>

						<div class="input-field col s12">
                            <div class="input-field col s2"><label>Unit Kerja</label></div>

                            <div class="input-field col s10 " >
                            <input type="text" id="unit" name="unit" value="<?= $ubah[0]['namaunit_lengkap'] ?>">
                            </div>
                        </div>

						<div class="col s12" style="padding-top: 10px">
                            <div class="col s9"></div>

                            <div class="col s3">
                                <button id="UbahPegawai" class="btn col s12"><i class="material-icons left">done</i> Simpan</button>
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
<?php include('scriptedit.php');?>
