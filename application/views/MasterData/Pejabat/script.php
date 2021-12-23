<script>
   var baseurl 	= "<?= base_url('Master/Pejabat/')?>";
   var dropdown_baseurl 	= "<?= base_url('Master/Dropdown/')?>";
	var satker_session = "<?= $this->session->userdata("kdsatker")?>";
	//var nip = document.getElementById("nip").value(nip.options[nip.selectedIndex].value);
    

$('select').select2().on('select2:open', function() {
      var container = $('.select2-container').last();
  /*Add some css-class to container or reposition it*/
});

function Reset(idForm) {
  document.getElementById(idForm).reset();
  $('.pejabat-select2').val(null).trigger('change');
  $('.jabatan-select2').val(null).trigger('change');
  $('.unit-select2').val(null).trigger('change');
  
}

$(document).ready(function() {
    $('#tb-pejabat').DataTable( {

      lengthMenu: [
            [10, 25, 50, -1],
            [10, 25, 50, "All"],
        ],
        responsive: true,
        scrollX: true,
        info: false
         } );
      } );

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

	$("#satker-select2").select2({
          dropdownAutoWidth: true,
          width: '100%',
          placeholder: "Pilih Satker",
          dropdownParent: "#modal2",
         ajax: { 
           url: dropdown_baseurl + 'satker',
           type: "post",
           dataType: 'json',
           delay: 250,
           data: function (params) {
              return {
                searchTerm: params.term
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

	$("#pejabat-select2").select2({
          dropdownAutoWidth: true,
          width: '100%',
          placeholder: "Pilih Nama",
          dropdownParent: "#modal2",
         ajax: { 
           url: dropdown_baseurl + 'pejabat',
           type: "post",
           dataType: 'json',
           delay: 250,
           data: function (params) {
              return {
					  //Trigger: pejabat_forSatker,
					  kdsatker: "<?= $this->session->userdata("kdsatker")?>",
					  searchTerm: params.term
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

	 $("#unit-select2").select2({
          dropdownAutoWidth: true,
          width: '100%',
          placeholder: "Pilih Unit Kerja",
          dropdownParent: "#modal2",
         ajax: { 
           url: dropdown_baseurl + 'unitkerja',
           type: "post",
           dataType: 'json',
           delay: 250,
           data: function (params) {
              return {
					Trigger : "unit_forPejabat",
					kdsatker: "<?= $this->session->userdata("kdsatker")?>",
               searchTerm: params.term
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

	 $("#jabatan-select2").select2({
          dropdownAutoWidth: true,
          width: '100%',
          placeholder: "Pilih Jabatan",
          dropdownParent: "#modal2",
         ajax: { 
           url: dropdown_baseurl + 'jabatan',
           type: "post",
           dataType: 'json',
           delay: 250,
           data: function (params) {
              return {
                searchTerm: params.term
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

	 $("#satker-select2").select2({
          dropdownAutoWidth: true,
          width: '100%',
          placeholder: "Pilih Satuan Kerja",
          dropdownParent: "#modal2",
         ajax: { 
           url: dropdown_baseurl + 'satker',
           type: "post",
           dataType: 'json',
           delay: 250,
           data: function (params) {
              return {
                searchTerm: params.term,
				Trigger : "satker_forPPK",
				userId: "<?= $this->session->userdata("user_id")?>"
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

	 $("#satker-select2_Edit").select2({
          dropdownAutoWidth: true,
          width: '100%',
          placeholder: "Pilih Satuan Kerja",
          dropdownParent: "#modalEdit",
         ajax: { 
           url: dropdown_baseurl + 'satker',
           type: "post",
           dataType: 'json',
           delay: 250,
           data: function (params) {
              return {
                searchTerm: params.term,
				Trigger : "satker_forPPK",
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

	 $("#pejabat-select2_Edit").select2({
          dropdownAutoWidth: true,
          width: '100%',
          placeholder: "Pilih Pegawai",
          dropdownParent: "#modalEdit",
         ajax: { 
           url: dropdown_baseurl + 'pejabat',
           type: "post",
           dataType: 'json',
           delay: 250,
           data: function (params) {
              return {
					kdsatker: "<?= $this->session->userdata("kdsatker")?>",
					searchTerm: params.term,
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

	 $("#jabatan-select2_Edit").select2({
          dropdownAutoWidth: true,
          width: '100%',
          placeholder: "Pilih Jabatan",
          dropdownParent: "#modalEdit",
         ajax: { 
           url: dropdown_baseurl + 'jabatan',
           type: "post",
           dataType: 'json',
           delay: 250,
           data: function (params) {
              return {
                searchTerm: params.term
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

	 $("#unit-select2_Edit").select2({
          dropdownAutoWidth: true,
          width: '100%',
          placeholder: "Pilih Unit Kerja",
          dropdownParent: "#modalEdit",
         ajax: { 
           url: dropdown_baseurl + 'unitkerja',
           type: "post",
           dataType: 'json',
           delay: 250,
           data: function (params) {
              return {
					Trigger : "unit_forPejabat",
					kdsatker: "<?= $this->session->userdata("kdsatker")?>",
					searchTerm: params.term
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


// AUTO FILLED TAMBAH 

$('#pejabat-select2').on('change', function() {

	var nip =  $("#pejabat-select2").val()
	$('#nip').val(nip)

});

$('#jabatan-select2').on('change', function() {
	$('#jabatanText').val()
	var jabatanText =  $("#jabatan-select2 option:selected").text()
	$('#jabatanText').val(jabatanText)

});


// AUTO FILLED EDIT

$('#pejabat-select2_Edit').on('change', function() {

var nip =  $("#pejabat-select2_Edit").val()
$('#nip_Edit').val(nip)

});

$('#jabatan-select2_Edit').on('change', function() {
	$('#jabatanEditText').val()
	var jabatanEditText =  $("#jabatan-select2_Edit option:selected").text()
	$('#jabatanEditText').val(jabatanEditText)

});



$("#TambahPejabat").click(function (e) {
  e.preventDefault();

  var btn = $(this);
  var form = $(this).closest("form");
  var formData = new FormData($("#FormPejabat")[0]);
  var IdForm =  "FormPejabat";

  btn
    .addClass("kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light")
    .attr("disabled", true);

  formData.append('Trigger', 'C')
  formData.append('getPejabat', $("#pejabat-select2 option:selected").text())
  formData.append('kdsatker', satker_session)

    $.ajax({
      type: "POST",
      data: formData,
      url: baseurl + "Action",
      processData: false,
      contentType: false,
      success: function (data, textStatus, jqXHR) {
        var res = JSON.parse(data)
              show_msg(res.status, res.msg);
              $('#modal2').modal('close');
              setTimeout(function() {
                  location.reload();
               }, 2000);
              Reset(IdForm);
              document.getElementById("TambahPejabat").disabled = false; 
              
              
          },
          error: function (jqXHR, textStatus, errorThrown) { },
      });
  });

function Delete(Id) {
    swal({
    title: "Apakah Yakin Ingin Dihapus?",
    text: "Anda tidak bisa mengembalikan data yang telah dihapus!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Ya, Hapus!",
    cancelButtonText: "Batal",
  }).then(function (result) {
    if (result) {
      Execute(Id);
    }
  });
}

function Execute(Id) {
  var formData = new FormData();
  formData.append("Trigger", "D");
  formData.append("id", Id);

  $.ajax({
    type: "POST",
    data: formData,
    url: baseurl + "Action",
    processData: false,
    contentType: false,
    success: function (data, textStatus, jqXHR) {

              var res = JSON.parse(data)
              show_msg(res.status, res.msg);
        setTimeout(function() {
                  location.reload();
               }, 2000);
    },
    error: function (jqXHR, textStatus, errorThrown) { },
  });
}

function Edit(Id){

$.ajax({
      url : baseurl + "Action",
      data: {"id": Id, "Trigger": "R"},
      type: "post",
      dataType: "JSON",
      success: function(data)
          {    
              
              	$('#nip_Edit').val(data['nip']);
			  
			  		var kdsatker = $("<option selected='selected'></option>").val(data['kdsatker']).text(data['kdsatker']+' - '+data['nmsatker'])
                $("#satker-select2_Edit").append(kdsatker).trigger('change');

                var pejabat = $("<option selected='selected'></option>").val(data['nip']).text(data['nama'])
                $("#pejabat-select2_Edit").append(pejabat).trigger('change');

                var jabatan = $("<option selected='selected'></option>").val(data['jabatan_id']).text(data['jabatan'])
                $("#jabatan-select2_Edit").append(jabatan).trigger('change');

                var unit = $("<option selected='selected'></option>").val(data['unitkerja_id']).text(data['nama_unit'])
                $("#unit-select2_Edit").append(unit).trigger('change');

                $('#idPejabat').val(Id);

              	$('#modalEdit').modal('open');
          
          
          }
  });

}

$("#EditPejabat").click(function (e) {
  e.preventDefault();

  var btn = $(this);
  var form = $(this).closest("form");
  var formData = new FormData($("#FormPejabat_Edit")[0]);
  var IdForm =  "FormPejabat_Edit";

  btn
    .addClass("kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light")
    .attr("disabled", true);

  formData.append('Trigger', 'U')
  formData.append('nama_pejabat', $("#pejabat-select2_Edit option:selected").text())

  $.ajax({
    type: "POST",
    data: formData,
    url: baseurl + "Action",
    processData: false,
    contentType: false,
    success: function (data, textStatus, jqXHR) {
              var res = JSON.parse(data)
              show_msg(res.status, res.msg);
              $('#modalEdit').modal('close');
              setTimeout(function() {
                  location.reload();
               }, 2000);
              Reset(IdForm);
              document.getElementById("EditPejabat").disabled = false; 
              
              
          },
          error: function (jqXHR, textStatus, errorThrown) { },
      });
});




  


</script>
