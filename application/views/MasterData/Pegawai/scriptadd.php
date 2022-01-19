<script>
    var baseurl 	= "<?= base_url('Master/Pegawai/')?>";
    var dropdown_baseurl 	= "<?= base_url('Master/Dropdown/')?>";
	//var satker_session = "<?= $this->session->userdata("kdsatker")?>"
	

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


$("#jk-select2").select2({
        dropdownAutoWidth: true,
        width: '100%',
        placeholder: "Pilih Jenis Kelamin",
        data: [{
            id: "Laki-laki",
            text: "Laki-laki"
        }, {
            id: "Perempuan",
            text: "Perempuan"
        }]
    })

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

	 $("#satker-select2").select2({
          dropdownAutoWidth: true,
          width: '100%',
          placeholder: "Pilih Satuan Kerja",
         ajax: { 
           url: dropdown_baseurl + 'satker',
           type: "post",
           dataType: 'json',
           delay: 250,
           data: function (params) {
              return {
				Trigger: "satker_forPPK",
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

		$("#unit-select2").select2({
          dropdownAutoWidth: true,
          width: '100%',
          placeholder: "Pilih Unit Kerja",
         	ajax: { 
					url: dropdown_baseurl + 'unitkerja',
					type: "post",
					dataType: 'json',
					delay: 250,
			data: function (params) {
				var satker = $("#satker-select2").val()
              	return {
					Trigger: "unit_forPegawai",
					//kdsatker: "<?= $this->session->userdata("kdsatker")?>",
					searchTerm: params.term,
					satker: satker
					// search term
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

       // AUTO FILLED 
		 	$('#unit-select2').on('change', function() {
				var unitkerja =  $("#unit-select2 option:selected").text()
            var unitkerja_grup =  $("#unit-select2").val()
				$('#unitkerja_nama').val(unitkerja)
            $('#unitkerja_grup').val(unitkerja_grup)

			});

		$('#satker-select2').on('change', function() {
				$('#unit-select2').val(null).trigger('change');
				var satker = $('#satker-select2').val()
				// if(satker == 450491){
				// 	document.getElementById("unit").style.display = "";
				// }else{
				// 	document.getElementById("unit").style.display = "none";
				// }

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

// $("#TambahPegawai").click(function(e){
// 	e.preventDefault();

// 	var btn = $(this);
// 	var form = $(this).closest("form");
// 	var formData = new FormData($("#FormPegawai")[0]);
// 	var IdForm = "FormPegawai";
	
// 	btn
//     .addClass("kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light")
//     .attr("disabled", false);
	
// 	formData.append('Trigger', 'C')

// 	$.ajax({
// 		type: "POST",
// 		data: formData,
// 		url: baseurl + "Action",
// 		processData: false,
// 		contentType: false,
// 		success: function (data, textStatus, jqXHR) {
// 			res = JSON.parse(data)
//             show_msg(res.status, res.message);
//             Reset(IdForm);
//             window.history.back();      
// 			//javascript:window.history.go(-1);
//         },

//         error: function (jqXHR, textStatus, errorThrown) { },
// 	});
// });

$("#TambahPegawai").click(function (e) {
  e.preventDefault();

  var btn = $(this);
  var form = $(this).closest("form");
  var formData = new FormData($("#FormPegawai")[0]);
  var IdForm =  "FormPegawai";
  // var countingDiv = document.getElementById('counting');
  // var countTim = countingDiv.getElementsByClassName('namaTim').length;

  btn
    .addClass("kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light")
    .attr("disabled", false);

  formData.append('Trigger', 'C')
  //formData.append('user_id', user_session)
  // formData.append('countTim', countTim)

  $.ajax({
    type: "POST",
    data: formData,
    url: baseurl + "Action",
    processData: false,
    contentType: false,
    success: function (data, textStatus, jqXHR) {
              show_msg(textStatus);
              Reset(IdForm);
              window.history.back();
              
              
          },
          error: function (jqXHR, textStatus, errorThrown) { },
      });
});
</script>
