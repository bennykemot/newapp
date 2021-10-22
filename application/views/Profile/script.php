<script type="text/javascript">


function Reset(idForm) {
  document.getElementById(idForm).reset();
  $('.satker-select2').val(null).trigger('change');
  $('.role-select2').val(null).trigger('change');
  $('.status-select2').val(null).trigger('change');
}


	  var baseurl 	= "<?= base_url('Profile/Profile/')?>";
    var dropdown_baseurl 	= "<?= base_url('Master/Dropdown/')?>";
    var satker_session = "<?= $this->session->userdata("kdsatker")?>"

    var grid_detail = "#tabel_user";
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
                url: baseurl + 'getUser',
                type: "post",
                data : {"kdsatker": satker_session}
            },
                
            autoWidth: false,
            columns: [
             
                {
                    data: null, class: "text-center",
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
               
                
                { data: "username",
                render: function (data, type, row, meta) {
                        return data;
                    } 
                  },

                { data: "nmsatker",
              render: function (data, type, row, meta) {
                      return data;
                  } 
                },

                { data: "rolename",
              render: function (data, type, row, meta) {
                      return data;
                  } 
                },

                { data: "status",
              render: function (data, type, row, meta) {
                  if(data == 1){
                    return '<button type="button" class="btn-floating mb-1 waves-effect waves-light blue"><i class="material-icons">check</i></button>'
                    }else{
                        return '<button type="button" class="btn-floating mb-1 waves-effect waves-light orange"><i class="material-icons">do_not_disturb</i></button>';
                    }
                    
                  }
                },

                { data: "keterangan",
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



        $("#satker-select2").select2({
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
                searchTerm: params.term ,
                session_satker : satker_session,
                Trigger : "user_profile"// search term
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
 
     $("#role-select2").select2({
          dropdownAutoWidth: true,
          width: '100%',
          placeholder: "Pilih Role",
          dropdownParent: "#modal2",
         ajax: { 
           url: dropdown_baseurl + 'role',
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

     $("#status-select2").select2({
        dropdownAutoWidth: true,
          width: '100%',
          dropdownParent: "#modal2",
          placeholder: "Pilih Role",
        data: [{
            id: 0,
            text: "Non - Aktif"
        }, {
            id: 1,
            text: "Aktif"
        }]
    })

    //EDIT

    $("#satker-select2_Edit").select2({
          width: '100%',
          placeholder: "Pilih Satker",
          dropdownParent: "#modalEdit",
          ajax: { 
           url: dropdown_baseurl + 'satker',
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
 
     $("#role-select2_Edit").select2({
          dropdownAutoWidth: true,
          width: '100%',
          placeholder: "Pilih Role",
          dropdownParent: "#modalEdit",
         ajax: { 
           url: dropdown_baseurl + 'role',
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

     $("#status-select2_Edit").select2({
        dropdownAutoWidth: true,
          width: '100%',
          dropdownParent: "#modalEdit",
          placeholder: "Pilih Role",
        data: [{
            id: 0,
            text: "Non - Aktif"
        }, {
            id: 1,
            text: "Aktif"
        }]
    })

     

$("#TambahUser").click(function (e) {
  e.preventDefault();

  var btn = $(this);
  var form = $(this).closest("form");
  var formData = new FormData($("#FormUser")[0]);
  var IdForm =  "FormUser";

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

$.ajax({
      url : baseurl + "Action",
      data: {"id": Id, "Trigger": "R"},
      type: "post",
      dataType: "JSON",
      success: function(data)
          {    
              $('#nama_user_Edit').val(data['username']);
              $('#password_Edit').val(data['password']);
              $('#keterangan_Edit').val(data['keterangan']);

                var satker = $("<option selected='selected'></option>").val(data['kdsatker']).text(data['kdsatker']+' - '+data['nmsatker'])
                $("#satker-select2_Edit").append(satker).trigger('change');

                var role = $("<option selected='selected'></option>").val(data['role_id']).text(data['role_id']+' - '+data['rolename'])
                $("#role-select2_Edit").append(role).trigger('change');

                if(data['status'] == 1){
                  var textt = "Aktif"
                }else{
                  var textt = "Non - Aktif"
                }

                var status = $("<option selected='selected'></option>").val(data['status']).text(textt)
                $("#status-select2_Edit").append(status).trigger('change');

                $('#idUser').val(Id);

              $('#modalEdit').modal('open');
          
          
          }
  });

}

$("#EditUser").click(function (e) {
  e.preventDefault();

  var btn = $(this);
  var form = $(this).closest("form");
  var formData = new FormData($("#FormUser_Edit")[0]);
  var IdForm =  "FormUser_Edit";

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