<script>
	$(document).ready(function() {
		t = $('#tb-pbj').DataTable({
			"scrollX": true,
			"scrollCollapse": true,
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": {
				"url": "<?php echo site_url('PBJ/Pbj/grid') ?>",
				"type": "POST",
			},
			columns: [
				{
					"data": "no",
					"className": "text-center",
					"orderable": false,
				},
				{
					"data": "nopbj",
					"className": "text-center",
					"orderable": false,
				},
				{
					"data": "namapbj",
					"className": "text-left",
					"orderable": false,
				},
				{
					"data": "nodoksumber",
					"className": "text-left",
					"orderable": false,
				},
				{
					"data": "tgldoksumber",
					"className": "text-left",
					"orderable": false,
				},
				{
					"data": "jenis",
					"className": "text-left",
					"orderable": false,
				},
				{
					"data": "spk",
					"className": "text-center",
					"orderable": false,
				},
				{
					"data": "ls",
					"className": "text-left",
					"orderable": false,
				},
				{
					"data": "mak",
					"className": "text-left",
					"orderable": false,
				},
				{
					"data": "pagu",
					"className": "text-right",
					"orderable": false,
				},
				{
					"data": "pengajuan",
					"className": "text-right",
					"orderable": false,
				},
				{
					"data": "penanggungjawab",
					"className": "text-left",
					"orderable": false,
				},
				{
					"data": "ppk",
					"className": "text-left",
					"orderable": false,
				},
				{
					"data" : "aksi",
					"orderable": false,
					"className" : "text-center"
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

	function hapus_data(id) {
		if (confirm('Apakah Anda Yakin Mau Menghapus Data Ini ?')) {
			window.location.replace("<?= site_url('PBJ/Pbj/hapus/') ?>" + id);
		}
	}



	<?php
	if($this->session->flashdata('message')) {
	?>
	M.toast({html: '<?= $this->session->flashdata('message') ?>'})
	<?php
	}
	?>
</script>
