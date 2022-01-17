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
				<div class="row">
					<div class="col s12">
						<table id="tb-pbj-detail" class="display" style="width:100%;white-space: nowrap !important;overflow: hidden;">
							<thead>
							<tr>
								<th></th>
								<th>Uraian</th>
								<th>Volume</th>
								<th>Satuan</th>
								<th>Rupiah</th>
								<th>Jumlah</th>
							</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col s12">
		<div class="card">
			<div class="card-content">
				<form id="tb-pbj-detail-multi_form" name="tb-pbj-detail-multi_form" action="<?= base_url('PBJ/Pbj_detail/simpan_update_multi_row') ?>" method="post" enctype="multipart/form-data">
					<div class="row">
						<input type="hidden" name="permintaan_pbj_id" value="<?= dsuEncode($permintaan_pbj_id) ?>">
						<table id="tb-pbj-detail-multi" class="display" style="width:100%;white-space: nowrap !important;overflow: hidden;">
							<thead>
							<tr>
								<th style="text-align: center">No</th>
								<th style="text-align: center">Uraian</th>
								<th style="text-align: center">Volume</th>
								<th style="text-align: center">Satuan</th>
								<th style="text-align: center">Rupiah</th>
								<th style="text-align: center">Jumlah</th>
								<th style="width: 5%;text-align: center">AKSI</th>
							</tr>
							</thead>
							<tbody id="tb-pbj-detail-multi-tbody">
							</tbody>
						</table>
						<hr>
						<button class="btn btn-md btn-primary" id="addBtn" type="button">Tambah Baris Data</button>
						<button type="submit" class="btn btn-success" onclick="save_data_multi()">Simpan Data</button>
						<hr>
						<div class="col s12" style="padding-top: 60px">
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
