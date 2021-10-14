<script>
    var baseurl 	= "<?= base_url('Anggaran/Pembagianpagu/')?>";
    var dropdown_baseurl 	= "<?= base_url('Master/Dropdown/')?>";
    var satker_session = "<?= $this->session->userdata("kdsatker")?>"

var grid_detail = "#tabel_anggaran";
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
           
            ajax: {
                url: baseurl + 'getPembagianPagu',
                type: "post",
                data : {"kdsatker": "450491"}
            },
                
            autoWidth: false,
            columns: [
             
                // {
                //     data: null, class: "text-center",
                //     render: function (data, type, row, meta) {
                //         return meta.row + meta.settings._iDisplayStart + 1;
                //     }
                // },
               
                
                { data: "thang",
                render: function (data, type, row, meta) {
                        return data;
                    } 
                  },

                { data: "kdsatker",
              render: function (data, type, row, meta) {
                      return data;
                  } 
                },

                { data: "kdsatker",
              render: function (data, type, row, meta) {
                      return data;
                  } 
                },

                { data: "kdsatker",
              render: function (data, type, row, meta) {
                      return data;
                  } 
                },

                { data: "kdprogram",
              render: function (data, type, row, meta) {
                      return data;
                  } 
                },

                { data: "kdgiat",
              render: function (data, type, row, meta) {
                      return data;
                  } 
                },

                { data: "kdoutput",
              render: function (data, type, row, meta) {
                      return data;
                  } 
                },

                { data: "kdsoutput",
              render: function (data, type, row, meta) {
                      return data;
                  } 
                },

                { data: "kdkmpnen",
              render: function (data, type, row, meta) {
                      return data;
                  } 
                },

                { data: "username",
              render: function (data, type, row, meta) {
                      return data;
                  } 
                },

                { data: 'id',
                  render: function(data, type, row) {
                      return '<button type="button" class="btn-floating mb-1 green" onclick="Edit(\''+data+'\')"><i class="material-icons">edit</i></button>\
                      <button type="button" class="btn-floating mb-1 red" onclick="Delete(\''+data+'\')"><i class="material-icons">delete</i></button>';
                  }
                },

  

 
            ],
            pageLength: 5,
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



        $("#program-select2").select2({
          dropdownAutoWidth: true,
          width: '100%',
          placeholder: "Pilih Program",
          dropdownParent: "#modal2",
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
 
     $("#kegiatan-select2").select2({
          dropdownAutoWidth: true,
          width: '100%',
          placeholder: "Pilih Kegiatan",
          dropdownParent: "#modal2",
         ajax: { 
           url: dropdown_baseurl + 'kegiatan_per_satker',
           type: "post",
           dataType: 'json',
           delay: 250,
           data: function (params) {
              return {
                kdprogram: $('#program-select2').val(),
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

     $("#kro-select2").select2({
          dropdownAutoWidth: true,
          width: '100%',
          placeholder: "Pilih KRO",
          dropdownParent: "#modal2",
         ajax: { 
           url: dropdown_baseurl + 'kro_per_satker',
           type: "post",
           dataType: 'json',
           delay: 250,
           data: function (params) {
              return {
                kdprogram: $('#program-select2').val(),
                kdgiat: $('#kegiatan-select2').val(),
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

     $("#ro-select2").select2({
          dropdownAutoWidth: true,
          width: '100%',
          placeholder: "Pilih RO",
          dropdownParent: "#modal2",
         ajax: { 
           url: dropdown_baseurl + 'ro_per_satker',
           type: "post",
           dataType: 'json',
           delay: 250,
           data: function (params) {
              return {
                kdprogram: $('#program-select2').val(),
                kdgiat: $('#kegiatan-select2').val(),
                kdoutput: $('#kro-select2').val(),
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

     $("#komponen-select2").select2({
          dropdownAutoWidth: true,
          width: '100%',
          placeholder: "Pilih Komponen",
          dropdownParent: "#modal2",
         ajax: { 
           url: dropdown_baseurl + 'komponen_per_satker',
           type: "post",
           dataType: 'json',
           delay: 250,
           data: function (params) {
              return {
                kdprogram: $('#program-select2').val(),
                kdgiat: $('#kegiatan-select2').val(),
                kdoutput: $('#kro-select2').val(),
                kdsoutput: $('#ro-select2').val(),
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

     $("#TambahPagu").click(function (e) {
  e.preventDefault();

  var btn = $(this);
  var form = $(this).closest("form");
  var formData = new FormData($("#FormPagu")[0]);
  var IdForm =  "FormPagu";

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

function Edit(){

  $('#modalEdit').modal('show');

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