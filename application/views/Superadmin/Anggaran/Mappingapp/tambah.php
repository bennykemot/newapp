<?php include(APPPATH . 'views/Header/Aside.php') ?>

<div class="row">

    <div class="col s12">
        <div class="card">
            <div class="card-content">
				<table id="tb-app" class="display" style="width:100%;white-space: normal !important;overflow: hidden;">
						<thead>
							<tr>
								<th width="30%">APP</th>
								<th width="30%">Tahapan</th>
								<th width="10%" class="text-right">Rupiah</th>
								<th width="10%" class="text-right">Realisasi</th>
								<th width="10%" class="text-right">Sisa</th>
								<!-- <th width="10%" class="text-center">Aksi</th> -->
							</tr>
						</thead>
						<tbody>
							
						</tbody>
						<tfoot style="background-color: #faf8a6;">
						
							<tr>
								<td style="text-align: left">TOTAL </td>
								<td style="text-align: right; padding-right: 10px !important"></td>
								<td></td>
								<td></td>
								<td></td>
								<!-- <td></td> -->
							</tr>
						
                  </tfoot>
				</table>
            </div>
        </div>
    </div>
</div>



<?php include('modal.php');?>
<?php include(APPPATH . 'views/Footer/Footer.php') ?>
<?php include('script.php');?>
