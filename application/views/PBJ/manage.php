<?php include(APPPATH . 'views/Header/Aside.php') ?>

<!-- Page Length Options -->
<div class="row">

	<div class="col s12">
		<div class="card" id="head">
			<div class="card-content" >
				<div class="row">
					<div class="col s1">
						<button type="button" class="btn-floating" style=""><i class="material-icons">turned_in_not</i></button>
					</div>
					<div class="col s9">
						<h6><?= $title ?></h6>
					</div>
					<div class="col s2">
						<a class="btn modal-trigger green" href="<?= site_url('PBJ/Pbj/tambah/') ?>">Tambah Data</a>
					</div>
				</div>
				<div class="row">
					<div class="col s1"></div>
					<div class="col s11"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- Page Length Options -->
</div>

<!-- <div class="section section-data-tables"> -->
<div class="row">
	<div class="col s12">
		<div class="card">
			<div class="card-content">
				<div class="row">
					<div class="col s12">
						<table id="tb-pbj" class="display" style="width:100%;white-space: nowrap !important;overflow: hidden;">
							<thead>
							<tr>
								<th></th>
								<th>Nomor PBJ</th>
								<th>Nama PBJ</th>
								<th>Nomor Dokumen Sumber</th>
								<th>Tanggal Dokumen Sumber</th>
								<th>Jenis</th>
								<th>SPK</th>
								<th>LS</th>
								<th>MAK</th>
								<th>Pagu</th>
								<th>Pengajuan</th>
								<th>Penanggung Jawab</th>
								<th>PPK</th>
								<th style="width: 5%">AKSI</th>
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
</div>
<!-- </div> -->

<?php include('modal.php');?>
<?php include(APPPATH . 'views/Footer/Footer.php') ?>
<?php include('script.php');?>

