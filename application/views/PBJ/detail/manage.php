<?php include(APPPATH . 'views/Header/Aside.php') ?>

<div class="row">
	<div class="col s12">
		<div class="card" id="head">
			<div class="card-content" >
				<div class="row">
					<div class="col s1">
						<button type="button" class="btn-floating" style=""><i class="material-icons">details</i></button>
					</div>
					<div class="col s9">
						<h6><?= $title ?></h6>
					</div>
					<div class="col s2">
						<!--<a class="btn modal-trigger green" href="<?/*= site_url('PBJ/Pbj_detail/tambah/'.dsuEncode($pbj->id)) */?>">Tambah Data</a>-->
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col s12">
		<div class="card">
			<div class="card-content">
				<div class="row">
					<div class="row">
						<div class="col s12">
							<div class="card">
								<div class="card-content">
									<div class="row">
										<table id="tb-pbj-info" class="display" style="width:100%;white-space: nowrap !important;overflow: hidden;">
											<tr>
												<td style="width: 20%"><strong>Nomor PBJ</strong></td>
												<td style="width: 5%;text-align: center">:</td>
												<td><?= $pbj->nomor_ppbj ?></td>
												<td style="width: 20%"><strong>Nama PBJ</strong></td>
												<td style="width: 5%;text-align: center">:</td>
												<td><?= $pbj->nama_pbj ?></td>
											</tr>
											<tr>
												<td style="width: 20%"><strong>Nomor Dokumen Sumber</strong></td>
												<td style="width: 5%;text-align: center">:</td>
												<td><?= $pbj->nomor_dok_sumber ?></td>
												<td style="width: 20%"><strong>Tanggal Dokumen Sumber</strong></td>
												<td style="width: 5%;text-align: center">:</td>
												<td><?= date("d-m-Y", strtotime($pbj->tanggal_dok_sumber)) ?></td>
											</tr>
											<tr>
												<td style="width: 20%"><strong>Pagu</strong></td>
												<td style="width: 5%;text-align: center">:</td>
												<td><?= 'Rp '.number_format($pbj->pagu,0,",","."); ?></td>
												<td style="width: 20%"><strong>Pengajuan</strong></td>
												<td style="width: 5%;text-align: center">:</td>
												<td><?= 'Rp '.number_format($pbj->pengajuan,0,",","."); ?></td>
											</tr>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col s12">
							<div class="card">
								<div class="card-content">
									<div class="row">
										<div class="col s12">
											<?php
											$this->db->where('permintaan_pbj_id', $pbj->id);
											$data_child = $this->mdata->get_data('t_permintaan_pbj_detail')->result();
											?>
												<a class="btn modal-trigger green" href="<?= site_url('PBJ/Pbj_detail/tambah_multi_row/'.dsuEncode($pbj->id)) ?>">Tambah Data</a>
											<?php
											if($data_child) {
											?>
												<!--<a class="btn modal-trigger green" href="<?/*= site_url('PBJ/Pbj_detail/edit_multi_row/'.dsuEncode($pbj->id)) */?>">Edit Data</a>-->
											<?php
											}
											?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
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
													<th style="width: 5%">AKSI</th>
												</tr>
												</thead>
												<tbody>
												</tbody>
											</table>
											<br><br>
											<form id="tb-pbj-detail-multi-form" name="tb-pbj-detail" action="<?= base_url('PBJ/Pbj_detail/simpan_update_multi') ?>" method="post" enctype="multipart/form-data">
												<input type="hidden" name="permintaan_pbj_id" value="<?= dsuEncode($pbj->id) ?>">
												<table id="tb-pbj-detail-test" class="display" style="width:100%;white-space: nowrap !important;overflow: hidden;">
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
													<tbody id="tb-pbj-detail-test-tbody">
													</tbody>
												</table>
											</form>
											<!--<hr>
											<button class="btn btn-md btn-primary" id="addBtn" type="button">Tambah Baris Data</button>
											<button type="submit" class="btn btn-success" onclick="save_data()">Simpan Data</button>
											<hr>-->
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<a href="<?= base_url('PBJ/Pbj/page') ?>" class="btn btn-danger"><i class="fa fa-sign-out"></i><b>Kembali</b></a>
				</div>
			</div>
		</div>
	</div>
</div>

<?php //include('modal.php');?>
<?php include(APPPATH . 'views/Footer/Footer.php') ?>
<?php include('script.php');?>
