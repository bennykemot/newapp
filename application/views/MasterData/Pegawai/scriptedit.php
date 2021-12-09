<script>
    var baseurl 	= "<?= base_url('Master/Pegawai/')?>";
    var dropdown_baseurl 	= "<?= base_url('Master/Dropdown/')?>";
	//var satker_session = "<?= $this->session->userdata("kdsatker")?>"

	// variabel update
	var agamaText = "<?= $ubah[0]['agama'] ?>"
	var pangkatText = "<?= $ubah[0]['nama_pangkat'] ?>"
    
	var $agama = $("<option selected='selected'></option>").val(agamaText).text(agamaText)
	$("#agama-select2").append($agama).trigger('change');

	var $pangkat = $("<option selected='selected'></option>").val(pangkatText).text(pangkatText)
	$("#pangkat-select2").append($pangkat).trigger('change');

$('select').select2().on('select2:open', function() {
      var container = $('.select2-container').last();
  /*Add some css-class to container or reposition it*/
});

function Reset(idForm) {
  document.getElementById(idForm).reset();
  $('.browser-default').val(null).trigger('change');
}


$(document).ready(function(){
    $('.datepicker').datepicker();
});


$("#agama-select2").select2({
          dropdownAutoWidth: true,
          width: '100%',
          placeholder: "Pilih Agama",
         ajax: { 
           url: dropdown_baseurl + 'agama',
           type: "post",
           dataType: 'json',
           delay: 250,
           data: function (params) {
              return {
                searchTerm: params.term // search term
              };
           },
           processResults: function (response) {
              return {
                 results: response
              };
           },
           cache: true
         }
     });

$("#pangkat-select2").select2({
          dropdownAutoWidth: true,
          width: '100%',
          placeholder: "Pilih Pangkat",
         ajax: { 
           url: dropdown_baseurl + 'golongan',
           type: "post",
           dataType: 'json',
           delay: 250,
           data: function (params) {
              return {
                searchTerm: params.term // search term
              };
           },
           processResults: function (response) {
              return {
                 results: response
              };
           },
           cache: true
         }
     });

function show_msg(status,message){
        swal({
            title:message, 
            icon:status,
            timer: 2000
            })
}

$(function () {

    $("#page-length-option").DataTable({
        responsive: !0,
        lengthMenu: [
            [10, 25, 50, -1],
            [10, 25, 50, "All"],
        ],
		  paging: !0,
		  scrollX: !0,
		  info: false,
    }),
        $("#scroll-dynamic").DataTable({ responsive: !0, scrollX: "50vh", scrollCollapse: !0, paging: !1 }),
        $("#scroll-vert-hor").DataTable({ scrollY: 200, scrollX: !0 }),
        $("#multi-select").DataTable({ responsive: !0, paging: !0, ordering: !1, info: !1, columnDefs: [{ visible: !1, targets: 2 }] });
}),
    $(window).on("load", function () {
        $(".dropdown-content.select-dropdown li").on("click", function () {
            var e = this;
            setTimeout(function () {
                $(e).parent().parent().find(".select-dropdown").hasClass("active") && ($(e).parent().parent().find(".select-dropdown").removeClass("active"), $(e).parent().hide());
            }, 100);
        });
    });

$("#UbahPegawai").click(function(e){
	e.preventDefault();

	var btn = $(this);
	var form = $(this).closest("form");
	var formData = new FormData($("#FormPegawai")[0]);
	var IdForm = "FormPegawai";
	
	btn
    .addClass("kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light")
    .attr("disabled", true);
	
	formData.append('Trigger', 'U')

	$.ajax({
		type: "POST",
		data: formData,
		url: baseurl + "Action",
		processData: false,
		contentType: false,
		success: function (data, textStatus, jqXHR) {
			res = JSON.parse(data)
              show_msg(res.status, res.message);
              Reset(IdForm);
              window.history.back();      
			  //javascript:window.history.go(-1);
        },

        error: function (jqXHR, textStatus, errorThrown) { },
	});
});

</script>
