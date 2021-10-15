<script>
    var baseurl 	= "<?= base_url('Anggaran/Mappingapp/')?>";
    var dropdown_baseurl 	= "<?= base_url('Master/Dropdown/')?>";
    var satker_session = "<?= $this->session->userdata("kdsatker")?>"

var grid_detail = "#tabel_mapping";
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
            searching: false,
            ordering: true,
            scrollY:450,
            scrollX:!0,
            responsive:!0,
           
            ajax: {
                url: baseurl + 'getMappingApp',
                type: "post",
                data : {"kdsatker": satker_session}
            },
                
            autoWidth: false,
            columns: [
             
                // {
                //     data: null, class: "text-center",
                //     render: function (data, type, row, meta) {
                //         return meta.row + meta.settings._iDisplayStart + 1;
                //     }
                // },
               
                
                { data: "kode",
                render: function (data, type, row, meta) {
                        return '<a href="javascript:;" onclick="showDetailapp(\''+row.kdindex+'\')">'+data+'</a>';
                    } 
                  },

                { data: "uraian",
              render: function (data, type, row, meta) {
                      return data;
                  } 
                },

                { data: "jumlah", className: "text-right", render: $.fn.dataTable.render.number( ',', '.', 0 )
                },


                { data: 'kdlevel',
                  render: function(data, type, row) {
                    if(data == 7){
                      return '<button type="button" class="btn-floating mb-1 green" onclick="Edit(\''+row.kdindex+'\')"><i class="material-icons">add</i></button>';
                    }
                    return '';
                      
                  }
                },

  

 
            ],
            pageLength: 10,
            lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
            //order: [[3,'asc']],
            bFilter: false,
            scrollCollapse: true,
            columnDefs: [
              { width: '10%', targets: 0 },
              { width: '60%', targets: 1 },
              { width: '10%', targets: 2 },
              { width: '10%', targets: 3 } ],

            initComplete: function (settings, json) {
                    $(grid_detail).wrap('<div class="table-responsive"></div>');
                },

            //     rowGroup: {
            //     dataSrc: [
            //         'kdprogram' , 
            //         'kdgiat'],
            //     startRender: function(rows, group, level) {  
            //             return $('<tr/>')
            //                     .append('<td colspan= "2">' + group +'</td>')
            //                     .append('<button type="button" class="btn-floating mb-1 green" onclick="Edit(\''+data+'\')"><i class="material-icons">add</i></button>')
            //     }

                
            // },
            

                //BATES
            });
    
            } else {
        $(grid_detail).DataTable().search("");
        $(grid_detail).DataTable().ajax.reload(null, !is_current);
      }
    }


        // SELECT2 INSERT

        $("#app-select2").select2({
          dropdownAutoWidth: true,
          width: '100%',
          placeholder: "Pilih App",
          dropdownParent: "#modal2",
         ajax: { 
           url: dropdown_baseurl + 'app',
           type: "post",
           dataType: 'json',
           delay: 250,
           data: function (params) {
              return {
                kdsatker: satker_session,
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
 
     
     // SELECT2 UPDATE


     $("#program-select2_Edit").select2({
          dropdownAutoWidth: true,
          width: '100%',
          placeholder: "Pilih Program",
          dropdownParent: "#modalEdit",
         ajax: { 
           url: dropdown_baseurl + 'program_per_satker',
           type: "post",
           dataType: 'json',
           delay: 250,
           data: function (params) {
              return {
                kdsatker: satker_session,
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
 
     $("#kegiatan-select2_Edit").select2({
          dropdownAutoWidth: true,
          width: '100%',
          placeholder: "Pilih Kegiatan",
          dropdownParent: "#modalEdit",
         ajax: { 
           url: dropdown_baseurl + 'kegiatan_per_satker',
           type: "post",
           dataType: 'json',
           delay: 250,
           data: function (params) {
              return {
                kdprogram: $('#program-select2_Edit').val(),
                kdsatker: satker_session,
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

     $("#kro-select2_Edit").select2({
          dropdownAutoWidth: true,
          width: '100%',
          placeholder: "Pilih KRO",
          dropdownParent: "#modalEdit",
         ajax: { 
           url: dropdown_baseurl + 'kro_per_satker',
           type: "post",
           dataType: 'json',
           delay: 250,
           data: function (params) {
              return {
                kdprogram: $('#program-select2_Edit').val(),
                kdgiat: $('#kegiatan-select2_Edit').val(),
                kdsatker: satker_session,
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

     $("#ro-select2_Edit").select2({
          dropdownAutoWidth: true,
          width: '100%',
          placeholder: "Pilih RO",
          dropdownParent: "#modalEdit",
         ajax: { 
           url: dropdown_baseurl + 'ro_per_satker',
           type: "post",
           dataType: 'json',
           delay: 250,
           data: function (params) {
              return {
                kdprogram: $('#program-select2_Edit').val(),
                kdgiat: $('#kegiatan-select2_Edit').val(),
                kdoutput: $('#kro-select2_Edit').val(),
                kdsatker: satker_session,
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

     $("#komponen-select2_Edit").select2({
          dropdownAutoWidth: true,
          width: '100%',
          placeholder: "Pilih Komponen",
          dropdownParent: "#modalEdit",
         ajax: { 
           url: dropdown_baseurl + 'komponen_per_satker',
           type: "post",
           dataType: 'json',
           delay: 250,
           data: function (params) {
              return {
                kdprogram: $('#program-select2_Edit').val(),
                kdgiat: $('#kegiatan-select2_Edit').val(),
                kdoutput: $('#kro-select2_Edit').val(),
                kdsoutput: $('#ro-select2_Edit').val(),
                kdsatker: satker_session,
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


     var grid_detail_app = "#tabel_mapping_detail";
     function showDetailapp(Id){
      $(grid_detail_app).DataTable({
            serverSide: true,
            processing: true,
            searchDelay: 500,
            searching: false,
            ordering: true,
            scrollY:450,
            scrollX:!0,
            responsive:!0,
            bDestroy: true,
           
            ajax: {
                url: baseurl + 'getMappingApp_detail',
                type: "post",
                data : {"id_r_mak": Id}
            },
                
            autoWidth: false,
            columns: [
             
                {
                    data: null, class: "text-center",
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },

                {
                    data: "nama_app"
                },

                {
                    data: "jumlah"
                },
                {
                    data: "pkpt",
                    render: function (data, type, row, meta) {
                        return "2021";
                    }
                },
               
 
            ],
            pageLength: 10,
            lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
            //order: [[3,'asc']],
            bFilter: false,
            scrollCollapse: true,
            columnDefs: [ ],

            initComplete: function (settings, json) {
                    $(grid_detail_app).wrap('<div class="table-responsive"></div>');
                },
            });

            //$('#DetailCard').fadeIn();
     }


$("#TambahApp").click(function (e) {
  e.preventDefault();

  var btn = $(this);
  var form = $(this).closest("form");
  var formData = new FormData($("#FormApp")[0]);
  var IdForm =  "FormApp";

  btn
    .addClass("kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light")
    .attr("disabled", true);

  formData.append('Trigger', 'C')

  $.ajax({
    type: "POST",
    data: formData,
    url: baseurl + "Action",
    processData: false,
    contentType: false,
    success: function (data, textStatus, jqXHR) {
              show_msg(textStatus);
              $('#modal2').modal('close');
              set_grid_tabel(false);
              Reset(IdForm);
              
              
          },
          error: function (jqXHR, textStatus, errorThrown) { },
      });
});

function Edit(Id){
  $('#kodeindex').val(Id);
  $('#modal2').modal('open');
}

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
        set_grid_tabel(true);
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

</script>