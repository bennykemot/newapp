<script>
    var baseurl 	= "<?= base_url('Anggaran/Pembagianpagu/')?>";
    var dropdown_baseurl 	= "<?= base_url('Master/Dropdown/')?>";
    var satker_session = "<?= $this->session->userdata("kdsatker")?>"

    $('select').select2().on('select2:open', function() {
      var container = $('.select2-container').last();
  /*Add some css-class to container or reposition it*/
});

   function Reset(idForm) {
      document.getElementById(idForm).reset();
      $('#app-select2').val(null).trigger('change');
      document.getElementById("TambahPagu").disabled = false; 
     
    }


    //$("#page-length-option").DataTable({responsive:!0,lengthMenu:[[10,25,50,-1],[10,25,50,"All"]]})
// var grid_detail = "#data-table-simple";
//     var is_set_grid_detail = false;

//     var all;
//     set_grid_tabel(false);

//     function set_grid_tabel(is_current) {
//       if (!is_set_grid_detail) {
//         is_set_grid_detail = true;
//         $(grid_detail).DataTable({
//             serverSide: true,
//             processing: true,
//             // searchDelay: 500,
//             searching: true,
//             ordering: true,
//             responsive:!0,
//             lengthMenu:[[10,25,50,-1],[10,25,50,"All"]],
           
//             // ajax: {
//             //     url: baseurl + 'getPembagianPagu',
//             //     type: "post",
//             //     data : {"kdsatker": satker_session}
//             // },
                
//             // autoWidth: false,
//             // columns: [
             
//             //     // {
//             //     //     data: null, class: "text-center",
//             //     //     render: function (data, type, row, meta) {
//             //     //         return meta.row + meta.settings._iDisplayStart + 1;
//             //     //     }
//             //     // },
               
                
//             //     { data: "thang",
//             //     render: function (data, type, row, meta) {
//             //             return data;
//             //         } 
//             //       },

//             //     { data: "kdsatker",
//             //   render: function (data, type, row, meta) {
//             //           return data;
//             //       } 
//             //     },

//             //     { data: "kddept",
//             //   render: function (data, type, row, meta) {
//             //           return data;
//             //       } 
//             //     },

//             //     { data: "kdunit",
//             //   render: function (data, type, row, meta) {
//             //           return data;
//             //       } 
//             //     },

//             //     { data: "kdprogram",
//             //   render: function (data, type, row, meta) {
//             //           return data;
//             //       } 
//             //     },

//             //     { data: "kdgiat",
//             //   render: function (data, type, row, meta) {
//             //           return data;
//             //       } 
//             //     },

//             //     { data: "kdoutput",
//             //   render: function (data, type, row, meta) {
//             //           return data;
//             //       } 
//             //     },

//             //     { data: "kdsoutput",
//             //   render: function (data, type, row, meta) {
//             //           return data;
//             //       } 
//             //     },

//             //     { data: "kdkmpnen",
//             //   render: function (data, type, row, meta) {
//             //           return data;
//             //       } 
//             //     },

//             //     { data: "username",
//             //   render: function (data, type, row, meta) {
//             //           return data;
//             //       } 
//             //     },

//             //     { data: 'id',
//             //       render: function(data, type, row) {
//             //           return '<button type="button" class="btn-floating mb-1 green" onclick="Edit(\''+data+'\')"><i class="material-icons">edit</i></button>\
//             //           <button type="button" class="btn-floating mb-1 red" onclick="Delete(\''+data+'\')"><i class="material-icons">delete</i></button>';
//             //       }
//             //     },

  

 
//             // ],
//             pageLength: 1,
//             // lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
//             //order: [[1,'asc']],
//             bFilter: true,
//             ordering: true,
//             scrollCollapse: true,
//             columnDefs: [ ],

//             // initComplete: function (settings, json) {
//             //         $(grid_detail).wrap('<div class="table-responsive"></div>');
//             //     },
//             });
    
//             } else {
//         $(grid_detail).DataTable().search("");
//         $(grid_detail).DataTable().ajax.reload(null, !is_current);
//       }
//     }


        // SELECT2 INSERT

        $("#user-select2").select2({
          dropdownAutoWidth: true,
          width: '100%',
          placeholder: "Pilih User",
          dropdownParent: "#modal2",
         ajax: { 
           url: dropdown_baseurl + 'user',
           type: "post",
           dataType: 'json',
           delay: 250,
           data: function (params) {
              return {
                session_satker: satker_session,
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



     // SELECT2 UPDATE

     $("#user-select2_Edit").select2({
          dropdownAutoWidth: true,
          width: '100%',
          placeholder: "Pilih User",
          dropdownParent: "#modalEdit",
         ajax: { 
           url: dropdown_baseurl + 'user',
           type: "post",
           dataType: 'json',
           delay: 250,
           data: function (params) {
              return {
                session_satker: satker_session,
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
              //set_grid_tabel(false);
              location.reload(); 
              Reset(IdForm);
              document.getElementById("TambahPagu").disabled = false; 
              
              
          },
          error: function (jqXHR, textStatus, errorThrown) { },
      });
});

function Edit(Id){

  $.ajax({
        url : baseurl + "Action",
        data: {"id": Id, "Trigger": "R"},
        type: "post",
        dataType: "JSON",
        success: function(data)
            {
                var user = $("<option selected='selected'></option>").val(data['user_id']).text(data['username'])
                var program = $("<option selected='selected'></option>").val(data['kdprogram']).text(data['kdprogram'])
                var kegiatan = $("<option selected='selected'></option>").val(data['kdgiat']).text(data['kdgiat'])
                var kro = $("<option selected='selected'></option>").val(data['kdoutput']).text(data['kdoutput'])
                var ro = $("<option selected='selected'></option>").val(data['kdsoutput']).text(data['kdsoutput'])
                var komponen = $("<option selected='selected'></option>").val(data['kdkmpnen']).text(data['kdkmpnen'])

                $("#user-select2_Edit").append(user).trigger('change');
                $("#program-select2_Edit").append(program).trigger('change');
                $("#kegiatan-select2_Edit").append(kegiatan).trigger('change');
                $("#kro-select2_Edit").append(kro).trigger('change');
                $("#ro-select2_Edit").append(ro).trigger('change');
                $("#komponen-select2_Edit").append(komponen).trigger('change');

                $("#idPagu").val(Id);

                $('#modalEdit').modal('open');
            
            
            }
    });

}

$("#EditPagu").click(function (e) {
  e.preventDefault();

  var btn = $(this);
  var form = $(this).closest("form");
  var formData = new FormData($("#FormPagu_Edit")[0]);
  var IdForm =  "FormPagu_Edit";

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
              show_msg(textStatus);
              $('#modalEdit').modal('close');
              set_grid_tabel(false);
              Reset(IdForm);
              
              
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
       // set_grid_tabel(true);
       location.reload(); 
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

    $(function () {


   
    $("#page-length-option").DataTable({
        responsive: !0,
        lengthMenu: [
            [10, 25, 50, -1],
            [10, 25, 50, "All"],
        ],
        scrollX: true
    }),
        $("#scroll-dynamic").DataTable({ responsive: !0, scrollY: "50vh", scrollCollapse: !0, paging: !1 }),
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



</script>