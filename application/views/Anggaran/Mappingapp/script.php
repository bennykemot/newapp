<script>
    var baseurl 	= "<?= base_url('Anggaran/Mappingapp/')?>";
    var baseurl_detail 	= "<?= base_url('Anggaran/detail_Mappingapp/')?>";
    var dropdown_baseurl 	= "<?= base_url('Master/Dropdown/')?>";
    var satker_session = "<?= $this->session->userdata("kdsatker")?>"

    function Reset(idForm) {
      document.getElementById(idForm).reset();
      $('#app-select2').val(null).trigger('change');
    }

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
                url: baseurl + 'getMapp',
                type: "get",
                data : {"kdsatker": satker_session}
            },
                
            autoWidth: false,
            columns: [

              { data: "kdsatker"},

              { data: "kdprogram"},

              { data: "kdgiat"},
               
                
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


                { data: 'kdlevel',className: "text-center",
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
            order: [[3,'asc']],
            bFilter: false,
            scrollCollapse: true,
            columnDefs: [
              { width: '10%', targets: 0 },
              { width: '60%', targets: 1 },
              { width: '10%', targets: 2 },
              { width: '10%', targets: 3 },
              {targets: [ 0,1,2 ],visible: false}],

            initComplete: function (settings, json) {
                    $(grid_detail).wrap('<div class="table-responsive"></div>');
                },

            // rowGroup: {
            //     dataSrc: ['kdsatker', 'kdprogram','kdgiat']
            // },

            //     rowGroup: {
            //     dataSrc: [
            //         'kdsatker'],
            //     startRender: function(rows, group, level) {  
            //             return $('<tr/>')
            //                     .append('<td colspan= "4">' + group +'</td>')
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

     $("#app-select2_Edit").select2({
          dropdownAutoWidth: true,
          width: '100%',
          placeholder: "Pilih App",
          dropdownParent: "#modalEdit",
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
 
     
     


     var grid_detail_app = "#tabel_mapping_detail";
     function showDetailapp(Id){
      $(grid_detail_app).DataTable({
            serverSide: true,
            processing: true,
            searchDelay: 500,
            searching: true,
            ordering: true,
            // scrollY:450,
            // scrollX:!0,
            responsive:!0,
            bDestroy: true,
           
            ajax: {
                url: baseurl_detail + 'getMappingApp_detail',
                type: "post",
                data : {"kdindex": Id}
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
                    data: "rupiah", className: "text-right", render: $.fn.dataTable.render.number( ',', '.', 0 )
                },
                {
                    data: "th_pkpt"
                },

                { data: 'id',
                  render: function(data, type, row) {
                      return '<button type="button" class="btn-floating mb-1 green" onclick="Edit(\''+row.id+'\')"><i class="material-icons">edit</i></button>\
                      <button type="button" class="btn-floating mb-1 red" onclick="Delete(\''+row.id+'\',\''+row.kdindex+'\')"><i class="material-icons">delete</i></button>';
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
    url: baseurl_detail + "Action",
    processData: false,
    contentType: false,
    success: function (data, textStatus, jqXHR) {
              show_msg(textStatus);
              $('#modal2').modal('close');
              set_grid_tabel(false);
              showDetailapp($('#kodeindex').val());
              Reset(IdForm);
              
              
          },
          error: function (jqXHR, textStatus, errorThrown) { },
      });
});

function Edit(Id){

  $.ajax({
      url : baseurl_detail + "Action",
      data: {"id": Id, "Trigger": "R"},
      type: "post",
      dataType: "JSON",
      success: function(data)
          {    
              $('#nilai_app_Edit').val(data['rupiah']);
              $('#Id_Edit').val(Id);
              $('#th_pkpt_Edit').val(data['th_pkpt']);
              $('#kodeindex_Edit').val(data['kdindex']);

                var app = $("<option selected='selected'></option>").val(data['id_app']).text(data['id_app']+' - '+data['nama_app'])
                $("#app-select2_Edit").append(app).trigger('change');

              $('#modalEdit').modal('open');
          
          
          }
  });

}

$("#EditMapping").click(function (e) {
  e.preventDefault();

  var btn = $(this);
  var form = $(this).closest("form");
  var formData = new FormData($("#FormMapping_Edit")[0]);
  var IdForm =  "FormMapping_Edit";

  btn
    .addClass("kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light")
    .attr("disabled", true);

  formData.append('Trigger', 'U')

  $.ajax({
    type: "POST",
    data: formData,
    url: baseurl_detail + "Action",
    processData: false,
    contentType: false,
    success: function (data, textStatus, jqXHR) {
              show_msg(textStatus);
              $('#modalEdit').modal('close');
              set_grid_tabel(false);
              showDetailapp($('#kodeindex_Edit').val());
              Reset(IdForm);
              
              
          },
          error: function (jqXHR, textStatus, errorThrown) { },
      });
});

function Delete(Id,Kdindex) {
    swal({
    title: "Apakah Yakin Ingin Dihapus?",
    text: "Anda tidak bisa mengembalikan data yang telah dihapus!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Ya, Hapus!",
    cancelButtonText: "Batal",
  }).then(function (result) {
    if (result) {
      Execute(Id,Kdindex);
    }
  });
}

function Execute(Id,Kdindex) {
  var formData = new FormData();
  formData.append("Trigger", "D");
  formData.append("id", Id);

  $.ajax({
    type: "POST",
    data: formData,
    url: baseurl_detail + "Action",
    processData: false,
    contentType: false,
    success: function (data, textStatus, jqXHR) {

        show_msg(textStatus)
        set_grid_tabel(true);
        showDetailapp(Kdindex);
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