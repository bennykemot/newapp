<?php include(APPPATH . 'views/Header/Aside.php') ?>

<!-- Page Length Options -->
 <div class="row">
   
    <div class="col s12">
      <div class="card">
        <div class="card-content">
          <h4 class="card-title col s10">Pembagian Pagu Satker : <?php echo $this->session->userdata("kdsatker"); ?></h4>
          <a class="waves-effect waves-light btn modal-trigger" href="#modal2">Tambah Data</a>
          <div class="row">
            <div class="col s12">
              <table id="tabel_anggaran" class="display">
                  <thead>
                    <tr>
                        <th>TA</th>
                        <th>Kd Satker</th>
                        <th>Kd Kementrian</th>
                        <th>Kd Unit</th>
                        <th>Kd Program</th>
                        <th>Kd Kegiatan</th>
                        <th>Kd Output</th>
                        <th>Kd Sub Output</th>
                        <th>Kd Komponen</th>
                        <th>User ID</th>
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
  </div>

        <div id="modal2" class="modal">
            <div class="modal-content">
              <h4>Tambah Pagu</h4>
              <div style="padding-top: 10px"></div>
                <div class="row">

                  <form class="col s12" id="FormPagu">
                    <div class="row">

                    <div class="input-field col s12">
                        <div class="input-field col s2">Nama User</div>

                        <div class="input-field col s10 " >
                          <input placeholder="Nama User" id="nama_user" name="nama_user" type="text">
                        </div>
                    </div>

                      <div class="input-field col s12">
                        <div class="input-field col s2" >Program</div>

                        <div class="input-field col s10 " >
                          <select  id="program-select2" name="kdprogram"></select>
                          </div>
                      </div>

                      <div class="input-field col s12">
                        <div class="input-field col s2" >Kegiatan</div>

                        <div class="input-field col s10 " >
                          <select  id="kegiatan-select2" name="kdgiat"></select>
                          </div>
                      </div>

                      <div class="input-field col s12">
                        <div class="input-field col s2" >KRO</div>

                        <div class="input-field col s10 " >
                          <select  id="kro-select2" name="kdoutput"></select>
                          </div>
                      </div>

                      <div class="input-field col s12">
                        <div class="input-field col s2" >RO</div>

                        <div class="input-field col s10 " >
                          <select  id="ro-select2" name="kdsoutput"></select>
                          </div>
                      </div>

                      <div class="input-field col s12">
                        <div class="input-field col s2" >Komponen</div>

                        <div class="input-field col s10 " >
                          <select  id="komponen-select2" name="kdkomponen"></select>
                          </div>
                      </div>


                    </div>
                  </form>
                </div>
            </div>
            <div class="modal-footer">
              <button id="TambahPagu" class="waves-effect waves-light btn"><i class="material-icons left">done</i> Simpan</button>
              <a href="#!" class="modal-action modal-close  waves-effect waves-light red btn">Batal</a>
            </div>
          </div>


  <?php include(APPPATH . 'views/Footer/Footer.php') ?>
  <script type="text/javascript">
		var baseurl 	= "<?= base_url('Anggaran/Pembagianpagu/')?>";
    var dropdown_baseurl 	= "<?= base_url('Master/Dropdown/')?>";
    var satker_session = "<?= $this->session->userdata("kdsatker")?>"

    var grid_detail = "#tabel_anggaran";
    var is_set_grid_detail = false;

    var all;

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

                { data: "kdkmpnen",
              render: function (data, type, row, meta) {
                      return data;
                  } 
                },

                { data: null,
                  render: function(data, type, row) {
                      return '<button type="button" class="btn-floating mb-1 waves-effect waves-light green" onclick="show_doc_pendidikan(\''+row.kdsatker+'\')"><i class="material-icons">edit</i></button>\
                      <button type="button" class="btn-floating mb-1 waves-effect waves-light red" onclick="show_doc_pendidikan(\''+row.kdsatker+'\')"><i class="material-icons">delete</i></button>';
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


        $("#program-select2").select2({
          dropdownAutoWidth: true,
          width: '100%',
          placeholder: "Pilih Program",
          theme: "classic",
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
          theme: "classic",
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
          theme: "classic",
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
          theme: "classic",
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
          theme: "classic",
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
      try {

          // showErrorMsg(form, 'success', 'Insert Success');
          setTimeout(function() {
            $('#modal2').modal('hide');
          }, 1000);
      } catch (e) { }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      //alert(jqXHR.status);
      //showErrorMsg(form, 'danger', data.Message);
      //show_msg(status);
    },
  });
});
 

        
	</script>
