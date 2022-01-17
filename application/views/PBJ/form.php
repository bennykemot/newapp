<?php include(APPPATH . 'views/Header/Aside.php') ?>

<div class="row">
	<div class="col s12">
		<div class="card" id="head">
			<div class="card-content" >
				<div class="row">
					<div class="col s1">
						<button type="button" class="btn-floating" style=""><i class="material-icons">add</i></button>
					</div>
					<div class="col s11">
						<h6><?= $form ?></h6>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col s12">
		<div class="card">
			<div class="card-content">
				<form id="tb-pbj" name="tb-pbj" action="<?= base_url('PBJ/Pbj/simpan_update') ?>" method="post" enctype="multipart/form-data">
					<input type="hidden" name="id" value="<?= $id ?>">
					<div class="row">
						<div class="input-field col s12">
							<div class="input-field col s2"><label>Nomor PBJ</label></div>
							<div class="input-field col s10">
								<input type="text" id="nomor_ppbj" name="nomor_ppbj" value="<?= $nomor_ppbj ?>">
								<?php echo '<font style="color: red"><b>'.form_error('nomor_ppbj').'</b></font>'; ?>
							</div>
						</div>
						<div class="input-field col s12">
							<div class="input-field col s2"><label>Nama PBJ</label></div>
							<div class="input-field col s10">
								<input type="text" id="nama_pbj" name="nama_pbj" value="<?= $nama_pbj ?>">
								<?php echo '<font style="color: red"><b>'.form_error('nama_pbj').'</b></font>'; ?>
							</div>
						</div>
						<div class="input-field col s12">
							<div class="input-field col s2"><label>Nomor Dokumen Sumber</label></div>
							<div class="input-field col s10">
								<input type="text" id="nomor_dok_sumber" name="nomor_dok_sumber" value="<?= $nomor_dok_sumber ?>">
								<?php echo '<font style="color: red"><b>'.form_error('nomor_dok_sumber').'</b></font>'; ?>
							</div>
						</div>
						<div class="input-field col s12">
							<div class="input-field col s2"><label>Tanggal Dokumen Sumber</label></div>
							<div class="input-field col s10">
								<input type="date" id="tanggal_dok_sumber" name="tanggal_dok_sumber" value="<?= $tanggal_dok_sumber ?>">
								<?php echo '<font style="color: red"><b>'.form_error('tanggal_dok_sumber').'</b></font>'; ?>
							</div>
						</div>
						<div class="input-field col s12">
							<div class="input-field col s2"><label>Jenis Bayar</label></div>
							<div class="input-field col s10">
								<!--<select  id="jb-select2" name="jb" class="browser-default"></select>-->
								<select class="browser-default select2" name="kas" id="kas" style="width:300px">
									<option value="">- Pilih Jenis Bayar -</option>
									<option value="1" <?php if($kas == 1){echo "selected='selected'";} ?>>Tunai</option>
									<option value="0" <?php if($kas == 0){echo "selected='selected'";} ?>>Kredit</option>
								</select>
								<?php echo '<font style="color: red"><b>'.form_error('kas').'</b></font>'; ?>
							</div>
						</div>
						<div class="input-field col s12">
							<div class="input-field col s2"><label>SPK</label></div>
							<div class="input-field col s10">
								<select class="browser-default select2" name="spk" id="spk" style="width:300px">
									<option value="1" <?php if($spk == 1){echo "selected='selected'";} ?>>YA</option>
									<option value="0" <?php if($spk == 1){echo "selected='selected'";} ?>>TIDAK</option>
								</select>
								<?php echo '<font style="color: red"><b>'.form_error('spk').'</b></font>'; ?>
							</div>
						</div>
						<div class="input-field col s12">
							<div class="input-field col s2"><label>LS</label></div>
							<div class="input-field col s10">
								<select class="browser-default select2" name="langsung" id="langsung" style="width:300px">
									<option value="1" <?php if($langsung == 1){echo "selected='selected'";} ?>>YA</option>
									<option value="0" <?php if($langsung == 0){echo "selected='selected'";} ?>>TIDAK</option>
								</select>
								<?php echo '<font style="color: red"><b>'.form_error('langsung').'</b></font>'; ?>
							</div>
						</div>
						<div class="input-field col s12">
							<div class="input-field col s2"><label>MAK</label></div>
							<div class="input-field col s10">
								<select class="browser-default select2" name="kdindex" id="kdindex" style="width:300px">
									<?php foreach($mak as $mk){ ?>
										<option <?php if($kdindex == $mk->kd_index_bagipagu){echo "selected='selected'";} ?> value="<?php echo $mk->kd_index_bagipagu ?>">
											<?php echo $mk->mak; ?></option>
									<?php } ?>
									<!--<option value="1">WA.3701.FAG.005.052.A.521811.000</option>
									<option value="2">WA.3701.FAG.005.052.A.521812.000</option>-->
								</select>
							</div>
						</div>
						<div class="input-field col s12">
							<div class="input-field col s2"><label>Penanggung Jawab</label></div>
							<div class="input-field col s10">
								<select class="browser-default select2" name="penangungjawab_id" id="penangungjawab_id" style="width:300px">
									<option value="">- Pilih Penanggung Jawab -</option>
									<?php foreach($penanggungjawab as $pj){ ?>
										<option <?php if($penangungjawab_id == $pj->id){echo "selected='selected'";} ?> value="<?php echo $pj->id ?>"><?php echo $pj->nama; ?></option>
									<?php } ?>
								</select>
								<?php echo '<font style="color: red"><b>'.form_error('penangungjawab_id').'</b></font>'; ?>
							</div>
						</div>
						<div class="input-field col s12">
							<div class="input-field col s2"><label>PPK</label></div>
							<div class="input-field col s10">
								<select class="browser-default select2" name="ppk" id="ppk" style="width:300px">
									<option value="">- Pilih PPK -</option>
									<?php foreach($lppk as $pk){ ?>
										<option <?php if($ppk == $pk->id){echo "selected='selected'";} ?> value="<?php echo $pk->id ?>"><?php echo $pk->nama; ?></option>
									<?php } ?>
								</select>
								<?php echo '<font style="color: red"><b>'.form_error('ppk').'</b></font>'; ?>
							</div>
						</div>
						<div class="col s12" style="padding-top: 60px">
							<button type="submit" class="btn btn-success" onclick="save_data()"><i class="fa fa-floppy-o"></i><b>Simpan</b></button>
							<a href="<?= base_url('PBJ/Pbj/page') ?>" class="btn btn-danger"><i class="fa fa-sign-out"></i><b>Kembali</b></a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php include(APPPATH . 'views/Footer/Footer.php') ?>
<?php include('script_form.php');?>
