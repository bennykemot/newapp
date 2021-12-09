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
                        <h6> Alokasi : </h6>
                    </div>
                </div>
				<div class="row">
					<div class="col s1">
                    </div>
                    <div class="col s11">
							<form id="FormApp">
								<table class="mt-0">
									<tbody>
									<tr>
										<td width="30%">APP</td>
										<td>
											<select class="select2 browser-default" id="app-select2" name="app"></select>
										</td>
										<td></td>
									</tr>

									<tr class="d-none" id="divRupiah">
										<td width="30%">Rupiah</td>
											<td>
												<input placeholder="00.000.000" class="rupiah" id="rupiahAll" name="rupiahAll"  onkeyup="AllCount()" onkeypress="return validateNumber(event)">
											</td>
										<td></td>
									</tr>

									<tr>
										<td width="30%">Tahapan</td>
										<td>
										<!-- <select class="select2 browser-default" id="tahapan-select2" name="tahapan"></select> -->
										<div id ="counting" class="d-none">
											<div class="multi-field-wrapper">
												<div class="multi-fields" id="multi-fields">
													<div class="multi-field">
														<div class="input-field">
															<div class="input-field"></div>
															<input id="tahapan1" name="tahapan1" value="1" hidden>

															<div class="input-field" >
																<input placeholder="00.000.000" class="rupiah" id="rupiah1" name="rupiah1"  onkeyup="AllCount()" onkeypress="return validateNumber(event)">
																<label style="font-size: 13px !Important" class="active tahapan_id_label" for="rupiah1" >Pengumpulan Data</label></div>
															</div>
														</div>
													</div>

													<div class="input-field col s12">
														<div class="input-field col s2"></div>

														<div class="input-field col s4 ">
															<button type="button" class="btn green col s12" id ="add-field"><i class="material-icons left">add</i>Tambah Tahapan</button>
														</div>

														<div class="input-field col s4 ">
															<button type="button" class="btn red col s12" id ="remove-field"><i class="material-icons left">delete</i>Hapus Tahapan</button>
														</div>
													</div>

												</div>
											</div>
										</div>
										</td>
									<td></td>
									</tr>

									<tr>
										<td width="30%">Jumlah Saldo App</td>
										<td>
											<input readonly class="btn cyan col s12" style="border-radius: 6px;text-align: left;font-weight: bold;cursor: default;" id ="jumlah" name="jumlah" value="<?=$this->uri->segment('7')?>">
											<input hidden placeholder="00.000.000" id="nilai_app" name="nilai_app" type="number" readonly>
            								<input hidden placeholder="00.000.000" id="dummy" name="dummy" type="number" readonly >
											<!-- <input style="border-radius: 6px" placeholder="000.000.00" id="jumlah" name="jumlah" value="<?=$this->uri->segment('7')?>" > -->
										</td>
										<td></td>
									</tr>

									<tr>
										<td width="30%">PKPT</td>
											<td>
												<input placeholder="2022" id="th_pkpt" name="th_pkpt" readonly value="<?= $this->session->userdata("thang")?>" onkeypress="return validateNumber(event)">
											</td>
										<td></td>
									</tr>
									
								</tbody>
							</table>

							<div class="input-field col s12" hidden >
								<div class="input-field col s2">kodeindex</div>
								<div class="input-field col s10 " >
								<input placeholder="Nilai App" id="kdindex" name="kdindex" value="<?=$this->uri->segment('4')?>" >
								<input placeholder="Nilai App" id="kdkmpnen" name="kdkmpnen" value="<?=$this->uri->segment('5')?>" >
								<input placeholder="Nilai App" id="kdskmpnen" name="kdskmpnen" value="<?=$this->uri->segment('6')?>" >
								
								</div>
							</div>
								<div class="input-field col s12" >
                                    <div class="input-field col s9">
                                    </div>

                                    <div class="input-field col s3 " style="padding-top: 20px">
                                        <button type="button" class="btn green col s12" id ="TambahApp" name="add-field"><i class="material-icons left">add</i> Tambah App</button>
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
				<table id="tb-app" class="display" style="width:100%;white-space: nowrap !important;overflow: hidden;">
					<thead>
						<tr>
							<th width="30%">APP</th>
							<th width="30%">Rupiah</th>
							<th>Tahapan</th>
							<th>Rupiah Tahapan</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($readmapp as $read){?>
						<tr>
							<td><?=$read->nama_app?></td>
							<td><?=rupiah($read->rupiah)?></td>
							<td><?=$read->nama_tahapan?></td>
							<td><?=rupiah($read->rupiah_tahapan)?></td>
							<td><a href="javascript:;" onclick="Delete('<?=$read->id?>', '<?=$read->kdindex?>')"><i class="material-icons green-text">delete</i></a></td>
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