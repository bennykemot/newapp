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
                        <h6> Alokasi Anggaran per Unit : </h6>
                    </div>
                </div>
				<div class="row">
					<div class="col s1">
                    </div>
                    <div class="col s11">
                        <div>
							<form id="FormPagu">
							<table class="mt-0">
								<thead>
									<tr>
										<td>Mata Anggaran</td>
										<td><?=$tambahpp[0]->mata_anggaran?></td>
										<td><?=rupiah($tambahpp[0]->rupiah)?></td>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>PPK</td>
										<td>
											<select class="select2 browser-default" id="ppk-select2" name="ppk"></select>
										</td>
										<td></td>
									</tr>
									<tr>
										<td>Unit Kerja</td>
										<td>
										<select class="browser-default" id="unitkerja-select2" name="unitkerja"></select>
										</td>
										<td></td>
									</tr>
									<tr>
										<td>Kewenangan</td>
										<td>
											<select class="browser-default" id="kewenangan-select2" name="kewenangan"></select>
										</td>
										<td></td>
									</tr>
								</tbody>
							</table>
							<div hidden>
									<input id="kdindex" name="kdindex" value="<?=$tambahpp[0]->kdindex?>">
									<input id="thang" name="thang" value="<?=$tambahpp[0]->thang?>">
									<input id="kdsatker" name="kdsatker" value="<?=$tambahpp[0]->kdsatker?>">
									<input id="kddept" name="kddept" value="<?=$tambahpp[0]->kddept?>">
									<input id="kdunit" name="kdunit" value="<?=$tambahpp[0]->kdunit?>">
									<input id="kdprogram" name="kdprogram" value="<?=$tambahpp[0]->kdprogram?>">
									<input id="kdgiat" name="kdgiat" value="<?=$tambahpp[0]->kdgiat?>">
									<input id="kdoutput" name="kdoutput" value="<?=$tambahpp[0]->kdoutput?>">	
									<input id="kdsoutput" name="kdsoutput" value="<?=$tambahpp[0]->kdsoutput?>">
									<input id="kdkmpnen" name="kdkmpnen" value="<?=$tambahpp[0]->kdkmpnen?>">
							</div>
								<div class="input-field col s12" >
                                    <div class="input-field col s9">
                                    </div>

                                    <div class="input-field col s3 " style="padding-top: 20px">
                                        <button type="button" class="btn green col s12" id ="TambahPagu" name="add-field"><i class="material-icons left">add</i> Rekam</button>
                                    </div>
                                </div>
							</form>
						</div>
                    </div>
				</div>
            </div>
        </div>
    </div>

    <div class="col s12">
        <div class="card">
            <div class="card-content">
				<table id="data-table-simple" class="display">
					<thead>
						<tr>
							<th>Sumber Dana</th>
							<th>Unit Kerja</th>
							<th>Kewenangan</th>
							<th>Rupiah</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($readpp as $read){?>
						<tr>
							<td>Rupiah Murni</td>
							<td><?=$read->nama_unit?></td>
							<td><?=$read->uraian_ppk?></td>
							<td><?=rupiah($read->rupiah)?></td>
							<td><a href="<?= site_url('Anggaran/Pembagianpagu/Tambah') ?>"><i class="material-icons green-text">edit</i></a></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
            </div>
        </div>
    </div>
</div>



<?php include('modal.php');?>
<?php include(APPPATH . 'views/Footer/Footer.php') ?>
<?php include('script.php');?>
