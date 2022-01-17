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
				<form id="tb-pbj-detail_single" name="tb-pbj-detail_single" action="<?= base_url('PBJ/Pbj_detail/simpan_update') ?>" method="post" enctype="multipart/form-data">
					<input type="hidden" name="id" value="<?= $id ?>">
					<input type="hidden" name="permintaan_pbj_id" value="<?= $permintaan_pbj_id ?>">
					<div class="row">
						<div class="input-field col s12">
							<div class="input-field col s2"><label>Uraian</label></div>
							<div class="input-field col s10">
								<input type="text" id="uraian_pbj" name="uraian_pbj" value="<?= $uraian_pbj ?>">
								<?php echo '<font style="color: red"><b>'.form_error('uraian_pbj').'</b></font>'; ?>
							</div>
						</div>
						<div class="input-field col s12">
							<div class="input-field col s2"><label>Volume</label></div>
							<div class="input-field col s10">
								<input type="text" id="volume_pbj" name="volume_pbj" value="<?= $volume_pbj ?>">
								<?php echo '<font style="color: red"><b>'.form_error('volume_pbj').'</b></font>'; ?>
							</div>
						</div>
						<div class="input-field col s12">
							<div class="input-field col s2"><label>Satuan</label></div>
							<div class="input-field col s10">
								<input type="text" id="satuan" name="satuan" value="<?= $satuan ?>">
								<?php echo '<font style="color: red"><b>'.form_error('satuan').'</b></font>'; ?>
							</div>
						</div>
						<div class="input-field col s12">
							<div class="input-field col s2"><label>Rupiah</label></div>
							<div class="input-field col s10">
								<input type="text" id="rupiah" name="rupiah" value="<?= $rupiah ?>">
								<?php echo '<font style="color: red"><b>'.form_error('rupiah').'</b></font>'; ?>
							</div>
						</div>
						<div class="input-field col s12">
							<div class="input-field col s2"><label>Jumlah</label></div>
							<div class="input-field col s10">
								<input type="text" id="jumlah" name="jumlah" value="<?= $jumlah ?>">
								<?php echo '<font style="color: red"><b>'.form_error('jumlah').'</b></font>'; ?>
							</div>
						</div>
						<div class="col s12" style="padding-top: 60px">
							<button type="submit" class="btn btn-success" onclick="save_data()"><i class="fa fa-floppy-o"></i><b>Simpan</b></button>
							<a href="<?= base_url('PBJ/Pbj/detil/'.dsuEncode($permintaan_pbj_id)) ?>" class="btn btn-danger"><i class="fa fa-sign-out"></i><b>Kembali</b></a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php include(APPPATH . 'views/Footer/Footer.php') ?>
<?php include('script_form.php');?>
