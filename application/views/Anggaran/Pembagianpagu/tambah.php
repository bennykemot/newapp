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
						<!-- <div class="row">
							<div class="col s4">
								<p>Mata Anggaran</p>
							</div>
							<div class="col s4">
								<p>3667.AEA.[IB.00].960.051.A.524111</p>
							</div>
							<div class="col s4">
								<p>Rp 100.000.000,-</p>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">
								<div class="input-field col s4"><label>PPK</label></div>
								<div class="input-field col s8">
									<select class="select2 browser-default">
										<option value="ppk">Rupiah Murni/Gaji dan Tunjangan</option>
									</select>
								</div>

							</div>
						</div> -->
						
							
						
                        <div>
							<table class="mt-0">
								<thead>
									<tr>
										<td>Mata Anggaran</td>
										<td>3667.AEA.[IB.00].960.051.A.524111</td>
										<td>Rp 100.000.000,-</td>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>PPK</td>
										<td>
											<select class="select2 browser-default">
												<option value="ppk">Rupiah Murni/Gaji dan Tunjangan</option>
											</select>
										</td>
										<td></td>
									</tr>
									<tr>
										<td>Unit Kerja</td>
										<td>
											<select class="select2 browser-default">
												<option value="unit">Biro Keuangan</option>
											</select>
										</td>
										<td></td>
									</tr>
									<tr>
										<td>Kewenangan</td>
										<td>
											<select class="select2 browser-default">
												<option value="ppk">Bagian Anggaran</option>
											</select>
										</td>
										<td></td>
									</tr>
								</tbody>
							</table>
							<div class="input-field col s12" >
                                    <div class="input-field col s9">
                                    </div>

                                    <div class="input-field col s3 " style="padding-top: 20px">
                                        <button type="button" class="btn green col s12" id ="add-field" name="add-field"><i class="material-icons left">add</i> Rekam</button>
                                    </div>
                                </div>
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
						<tr>
							<td>Rupiah Murni</td>
							<td>Biro Keuangan</td>
							<td>Bagian Anggaran</td>
							<td>100.000.000</td>
							<td><a href="<?= site_url('Anggaran/Pembagianpagu/Tambah') ?>"><i class="material-icons green-text">edit</i></a></td>
						</tr>
					</tbody>
				</table>
            </div>
        </div>
    </div>
</div>



<?php include('modal.php');?>
<?php include(APPPATH . 'views/Footer/Footer.php') ?>
<?php include('script.php');?>
