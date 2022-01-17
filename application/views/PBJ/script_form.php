<script>
$(document).ready(function() {
	$('.select2').select2();
});
function save_data() {
	if (confirm('Apakah Anda Yakin Mau Menyimpan Data Ini ?')) {
		document.getElementById('tb-pbj').submit();
	}
}
</script>
