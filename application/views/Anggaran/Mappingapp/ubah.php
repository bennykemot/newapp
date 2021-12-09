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
						
							<form id="FormMapping_Edit">
								<table class="mt-0">
									<tbody>
									<tr>
										<td width="30%">APP</td>
										<td>
											<select class="select2 browser-default" id="app-select2_Edit" name="app_Edit"></select>
										</td>
										<td></td>
									</tr>

									<tr id="divTahapan_Edit">
										<td width="30%">Tahapan</td>
										<td>
											<input id="tahapan_Edit" name="tahapan_Edit" type="text" readonly >
										</td>
										<td></td>
									</tr>

									<tr>
										<td width="30%">Rupiah</td>
											<td>
												<input placeholder="00.000.000" autocomplete="off" class="rupiah" id="rupiah_tahapan_Edit" name="rupiah_tahapan_Edit"  onkeyup="Count()" onkeypress="return validateNumber(event)">
											</td>
										<td></td>
									</tr>

									<tr>
										<td width="30%">Jumlah Saldo App</td>
										<td>
											<input readonly class="btn cyan col s12" style="border-radius: 6px;text-align: left;font-weight: bold;cursor: default;" id ="rupiah_Edit" name="rupiah_Edit">
											 	<input id="rupiah_tahapan_dummy" name="rupiah_tahapan_dummy" hidden>
												 <input id="sisa_akun" name="sisa_akun" hidden>
												<input id="total_app" name="total_app" hidden>
												<input id="total_akun" name="total_akun" hidden>
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
								<input placeholder="Nilai App" id="kdindex" name="kdindex" value="<?=$this->uri->segment('6')?>" >
								
								</div>
							</div>
								<div class="input-field col s12" >
                                    <div class="input-field col s9">
                                    </div>

                                    <div class="input-field col s3 " style="padding-top: 20px">
                                        <button type="button" class="btn green col s12" id ="EditMapping" name="add-field"><i class="material-icons left">edit</i> Ubah App</button>
                                    </div>
                                </div>
							</form>
							
						</div>
                    </div>
				</div>
            </div>
        </div>
    </div>

    
</div>



<?php include('modal.php');?>
<?php include(APPPATH . 'views/Footer/Footer.php') ?>
<?php include('scriptedit.php');?>
