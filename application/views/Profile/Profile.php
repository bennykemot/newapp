<?php include(APPPATH . 'views/Header/Aside.php') ?>

<!-- Page Length Options -->
 <div class="row">
   
    <div class="col s12">
      <div class="card">
        <div class="card-content">
          <h4 class="card-title col s10">List User : <?php echo $this->session->userdata("kdsatker"); ?></h4>
          <a class="waves-effect waves-light btn modal-trigger" href="#modal2">Tambah Data</a>
                <!-- datatable start -->
                <div class="responsive-table">
                    <table id="tabel_user" class="display">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama User</th>
                                <th>Nama Satker</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                            <tbody>
                            </tbody>
                    </table>
                </div>     
        </div>
      </div>
    </div>
  </div>

        <div id="modal2" class="modal">
            <div class="modal-content">
              <h4>Tambah User</h4>
                <div class="row">

                  <form class="col s12" id="FormUser">
                    <div class="row">

                    <div class="input-field col s12">
                        <div class="input-field col s2">Nama User</div>

                        <div class="input-field col s10 " >
                          <input placeholder="Nama User" id="nama_user" type="text" class="validate">
                        </div>
                    </div>

                    <div class="input-field col s12">
                        <div class="input-field col s2" >Satker</div>

                        <div class="input-field col s10 " >
                          <select  id="satker-select2" name="kdsatker"></select>
                          </div>
                      </div>

                      <div class="input-field col s12">
                        <div class="input-field col s2" >Role</div>

                        <div class="input-field col s10 " >
                          <select  id="role-select2" name="kdrole"></select>
                          </div>
                      </div>

                      <div class="input-field col s12">
                        <div class="input-field col s2" >Status</div>

                        <div class="input-field col s10 " >
                          <select  id="status-select2" name="kdstatus"></select>
                          </div>
                      </div>

                      <div class="input-field col s12">
                        <div class="input-field col s2">Password User</div>

                        <div class="input-field col s10 " >
                          <input placeholder="Password User" id="password" name="password" type="text" class="validate">
                        </div>
                    </div>

                    <div class="input-field col s12">
                        <div class="input-field col s2">Keterangan User</div>

                        <div class="input-field col s10 " >
                          <input placeholder="Keterangan User" id="keterangan" name="keterangan" type="text" class="validate">
                        </div>
                    </div>




                    </div>
                  </form>
                </div>
            </div>
            <div class="modal-footer">
              <button id="TambahUser" class="waves-effect waves-light btn"><i class="material-icons left">done</i> Simpan</button>
              <a href="#!" class="modal-action modal-close  waves-effect waves-light red btn">Batal</a>
            </div>
          </div>


  <?php include(APPPATH . 'views/Footer/Footer.php') ?>
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
                data : {"kdsatker": "450491"}
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
                    return '<button type="button" class="btn-floating mb-1 waves-effect waves-light green" onclick="show_doc_pendidikan(\''+row.kdsatker+'\')"><i class="material-icons">check</i></button>'
                    }else{
                        return '<button type="button" class="btn-floating mb-1 waves-effect waves-light red" onclick="show_doc_pendidikan(\''+row.kdsatker+'\')"><i class="material-icons">do_not_disturb</i></button>';
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
                      return '<button type="button" class="btn-floating mb-1 waves-effect waves-light green" onclick="Edit(\''+row.kdsatker+'\')"><i class="material-icons">edit</i></button>\
                      <button type="button" class="btn-floating mb-1 waves-effect waves-light red" onclick="Delete(\''+data+'\')"><i class="material-icons">delete</i></button>';
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
          dropdownAutoWidth: true,
          width: '100%',
          placeholder: "Pilih Satker",
          theme: "classic",
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
 
     $("#role-select2").select2({
          dropdownAutoWidth: true,
          width: '100%',
          placeholder: "Pilih Role",
          theme: "classic",
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
          placeholder: "Pilih Role",
          theme: "classic",
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
