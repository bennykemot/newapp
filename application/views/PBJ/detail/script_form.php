<script>
$(document).ready(function() {
	$('.select2').select2();
});

function save_data() {
	if (confirm('Apakah Anda Yakin Mau Menyimpan Data Ini ?')) {
		document.getElementById('tb-pbj-detail_single').submit();
	}
}

$(document).ready(function() {
	t = $('#tb-pbj-detail').DataTable({
		"scrollX": true,
		"scrollCollapse": true,
		"processing": true,
		"serverSide": true,
		"order": [],
		"ajax": {
			"url": "<?php echo site_url('PBJ/Pbj_detail/grid/'.dsuEncode($permintaan_pbj_id)) ?>",
			"type": "POST",
		},
		columns: [
			{
				"data": "no",
				"className": "text-center",
				"orderable": false,
			},
			{
				"data": "uraian",
				"className": "text-center",
				"orderable": false,
			},
			{
				"data": "volume",
				"className": "text-left",
				"orderable": false,
			},
			{
				"data": "satuan",
				"className": "text-left",
				"orderable": false,
			},
			{
				"data": "rupiah",
				"className": "text-left",
				"orderable": false,
			},
			{
				"data": "jumlah",
				"className": "text-left",
				"orderable": false,
			},
		]
	});
});

$(document).ready(function() {
	$('#tb-pbj').on('click', 'td.details-control', function () {
		var tr = $(this).closest('tr');
		var row = t.row( tr );
		if ( row.child.isShown() ) {
			row.child.hide();
			tr.removeClass('shown');
		} else {
			row.child( format(row.data()) ).show();
			tr.addClass('shown');
		}
	});
});

$(document).ready(function () {
	// Denotes total number of rows
	var rowIdx = 0;
	// jQuery button click event to add a row
	$('#addBtn').on('click', function () {
		// Adding a row inside the tbody.
		$('#tb-pbj-detail-multi').append(`<tr id="R${++rowIdx}">
				<td class="row-index text-center">
             		<b>${rowIdx}</b>
             	</td>
             	<td class="row-index text-center">
             		<input type="text" id="uraian_pbj[]" name="uraian_pbj[]" required value="">
             	</td>
				<td class="row-index text-center">
					<input type="number" id="volume_pbj[]" name="volume_pbj[]" required value="">
				</td>
				<td class="row-index text-center">
					<input type="text" id="satuan[]" name="satuan[]" required value="">
				</td>
				<td class="row-index text-center">
					<input type="number" id="rupiah[]" name="rupiah[]" required value="">
				</td>
				<td class="row-index text-center">
					<input type="number" id="jumlah[]" name="jumlah[]" required value="">
				</td>
              	<td class="text-center">
                	<button class="btn btn-danger remove" type="button">Hapus</button>
                </td>
            </tr>
			<input type="hidden" name="data_count[]">`);
	});

	// jQuery button click event to remove a row.
	$('#tb-pbj-detail-multi').on('click', '.remove', function () {

		// Getting all the rows next to the row
		// containing the clicked button
		var child = $(this).closest('tr').nextAll();

		// Iterating across all the rows
		// obtained to change the index
		child.each(function () {

			// Getting <tr> id.
			var id = $(this).attr('id');

			// Getting the <p> inside the .row-index class.
			var idx = $(this).children('.row-index').children('p');

			// Gets the row number from <tr> id.
			var dig = parseInt(id.substring(1));

			// Modifying row index.
			idx.html(`Row ${dig - 1}`);

			// Modifying row id.
			$(this).attr('id', `R${dig - 1}`);
		});

		// Removing the current row.
		$(this).closest('tr').remove();

		// Decreasing total number of rows by 1.
		rowIdx--;
	});
});

function save_data_multi() {
	if (confirm('Apakah Anda Yakin Mau Menyimpan Data Ini ?')) {
		document.getElementById('tb-pbj-detail-multi_form').submit();
	}
}
</script>
