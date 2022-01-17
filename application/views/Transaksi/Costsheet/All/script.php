<script type="text/javascript">

var baseurl 	= "<?= base_url('Transaksi/Apisima/')?>";
var satker_session = "<?= $this->session->userdata("kdsatker")?>"
var user_session = "<?= $this->session->userdata("user_id")?>"
var role_session = "<?= $this->session->userdata("role_id")?>"
var unit_session = "<?= $this->session->userdata("unit_id")?>"
if(role_session == 1){
  unit_session = 0;
}

var grid_detail = "#tb-cs";
    var is_set_grid_detail = false;

    var all;

    set_grid_tabel(false);

    function set_grid_tabel(is_current) {
      if (!is_set_grid_detail) {
        is_set_grid_detail = true;
        $(grid_detail).DataTable({
            serverSide: true,
            processing: true,
            searchDelay: 500,
            searching: true,
            ordering: true,
            info: false,
           
            ajax: {
                url: baseurl + 'Getcostsheetjson',
                type: "post",
                data : {
                  kdsatker: satker_session}
            },
                
            autoWidth: false,
            columns: [
             
                {
                    data: null, class: "text-center",
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
               
                
                { data: "id",
                render: function (data, type, row, meta) {
                        return data;
                    } 
                  },

                
            ],
            pageLength: 10,
            lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
            //order: [[1,'asc']],
            bFilter: false,
            ordering: false,
            scrollCollapse: true,
            columnDefs: [ ],

            initComplete: function (settings, json) {
                    $(grid_detail).wrap('<div class="table-responsive"></div>');
                },
            });
    
            } else {
        $(grid_detail).DataTable().search("");
        $(grid_detail).DataTable().ajax.reload(null, !is_current);
      }
    }

    $("#ttd").select2({
          dropdownAutoWidth: true,
          width: '100%',
          placeholder: "Pilih Penandatangan",
         ajax: { 
           url: dropdown_baseurl + 'ttd',
           type: "post",
           dataType: 'json',
           delay: 250,
           data: function (params) {
              return {
								Trigger: "ttd_forST",
								kdsatker: satker_session,
                status_ttd : $('#status_penandatangan').val(),
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

$("#TambahST").click(function (e) {
  e.preventDefault();

  var btn = $(this);
  var form = $(this).closest("form");
  var formData = new FormData($("#FormST")[0]);
  var IdForm =  "FormST";
  // var countingDiv = document.getElementById('counting');
  // var countTim = countingDiv.getElementsByClassName('namaTim').length;
ttdVal = $('#ttd').val()
  if(ttdVal == null || ttdVal == ""){
    swal({
          title:"Penandatangan Masih Kosong",
          text: "Pastikan Field Terisi Semua", 
          icon: "warning",
          timer: 2000
          })
          return false;
  }

  btn
    .addClass("kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light")
    .attr("disabled", false);

  formData.append('Trigger', 'C')
  formData.append('user_id', user_session)
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

        show_msg(textStatus)
        window.location.reload();
    },
    error: function (jqXHR, textStatus, errorThrown) { },
  });
}



function show_msg(textStatus){
        swal({
            title:textStatus, 
            icon:textStatus,
            timer: 2000
            })
    }

$(document).ready(function(){
  $('.tooltipped').tooltip();
});


</script>
