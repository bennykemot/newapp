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

    $(document).ready(function() {
    $('#tb-pembagianpagu').DataTable( {

      lengthMenu: [
            [10, 25, 50, -1],
            [10, 25, 50, "All"],
        ],
        responsive: true,
        scrollX: true,
        info: false
         } );
      } );



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

     $("#user-select2").change(function() {
        if($("#user-select2").val() != null){
         document.getElementById("program-select2").disabled = false;
        }
      });


     $("#program-select2").change(function() {
      $('#kegiatan-select2').val(null).trigger('change');
        if($("#program-select2").val() != null){
         document.getElementById("kegiatan-select2").disabled = false;
        }
      });

      $("#kegiatan-select2").change(function() {
         $('#kro-select2').val(null).trigger('change');
        if($("#kegiatan-select2").val() != null){
         document.getElementById("kro-select2").disabled = false;
        }
      });
      

      $("#kro-select2").change(function() {
         $('#ro-select2').val(null).trigger('change');
        if($("#kro-select2").val() != null){
         document.getElementById("ro-select2").disabled = false;
        }
      });

      $("#ro-select2").change(function() {
         $('#komponen-select2').val(null).trigger('change');
        if($("#ro-select2").val() != null){
         document.getElementById("komponen-select2").disabled = false;
        }
      });
      

      $("#komponen-select2").change(function() {
        if($("#ro-select2").val() != null){
         document.getElementById("TambahPagu").disabled = false;
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

   if($("#komponen-select2").val() == null){

      swal({
            title:"Komponen Masih Kosong", 
            icon:"warning",
            timer: 2000
            })
    
    return false;


   }
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
               res = JSON.parse(data)
              show_msg(res.status, res.message);
              $('#modal2').modal('close');
              //set_grid_tabel(false);
              setTimeout(function() {
                  location.reload();
               }, 2000);
              Reset(IdForm);
              document.getElementById("TambahPagu").disabled = false; 
              document.getElementById("program-select2").disabled = true;
              document.getElementById("kegiatan-select2").disabled = true;
              document.getElementById("kro-select2").disabled = true;
              document.getElementById("ro-select2").disabled = true;
              document.getElementById("komponen-select2").disabled = true;
              
              
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
               res = JSON.parse(data)
               show_msg(res.status, res.message);
               $('#modalEdit').modal('close');
               setTimeout(function() {
                  location.reload();
               }, 2000);
               Reset(IdForm);
               document.getElementById("TambahPagu").disabled = false; 
              document.getElementById("program-select2").disabled = true;
              document.getElementById("kegiatan-select2").disabled = true;
              document.getElementById("kro-select2").disabled = true;
              document.getElementById("ro-select2").disabled = true;
              document.getElementById("komponen-select2").disabled = true;
              
              
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

      res = JSON.parse(data)
      show_msg(res.status, res.message);
       // set_grid_tabel(true);
       setTimeout(function() {
                  location.reload();
               }, 2000);
               document.getElementById("TambahPagu").disabled = false; 
              document.getElementById("program-select2").disabled = true;
              document.getElementById("kegiatan-select2").disabled = true;
              document.getElementById("kro-select2").disabled = true;
              document.getElementById("ro-select2").disabled = true;
              document.getElementById("komponen-select2").disabled = true;
    },
    error: function (jqXHR, textStatus, errorThrown) { },
  });
}

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