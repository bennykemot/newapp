<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>


var baseurl 	= "<?= base_url('Transaksi/SuratTugas/')?>";
var dropdown_baseurl 	= "<?= base_url('Master/Dropdown/')?>";
var satker_session = "<?= $this->session->userdata("kdsatker")?>"


function Reset(idForm) {
  document.getElementById(idForm).reset();
  $('.browser-default').val(null).trigger('change');
}


//SELECT2 VIEW
// Loading array data
var data = [
    { id: 1, text: 'Januari' },
    { id: 2, text: 'Februari' },
    { id: 3, text: 'Maret' },
    { id: 4, text: 'April' },
    { id: 5, text: 'Mei' },
    { id: 6, text: 'Juni' },
    { id: 7, text: 'Juli' },
    { id: 8, text: 'Agustus' },
    { id: 9, text: 'September' },
    { id: 10, text: 'Oktober' },
    { id: 11, text: 'November' },
    { id: 12, text: 'Desember' }
];

$("#bulan-Array").select2({
    dropdownAutoWidth: true,
    width: '100%',
    data: data,
    dropdownParent: "#head",
});
    

// SELECT2 INSERT

$("#user-select2").select2({
          dropdownAutoWidth: true,
          width: '100%',
          placeholder: "Pilih User",
          dropdownParent: "#modalidx",
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
          dropdownParent: "#modalidx",
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
          dropdownParent: "#modalidx",
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
          dropdownParent: "#modalidx",
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
          dropdownParent: "#modalidx",
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
          dropdownParent: "#modalidx",
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

     $("#sub_komponen-select2").select2({
          dropdownAutoWidth: true,
          width: '100%',
          placeholder: "Pilih Sub Komponen",
          dropdownParent: "#modalidx",
         ajax: { 
           url: dropdown_baseurl + 'sub_komponen_per_satker',
           type: "post",
           dataType: 'json',
           delay: 250,
           data: function (params) {
              return {
                kdprogram: $('#program-select2').val(),
                kdgiat: $('#kegiatan-select2').val(),
                kdoutput: $('#kro-select2').val(),
                kdsoutput: $('#ro-select2').val(),
                kdkomponen: $('#komponen-select2').val(),
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

     $( ".browser-default" ).change(function() {
       var  Satker = $('#kdsatker').val()
       var  Program = $('#program-select2').val()
       var  Kegiatan = $('#kegiatan-select2').val()
       var  KRO =  $('#kro-select2').val()
       var  RO =  $('#ro-select2').val()
       var  Komponen = $('#komponen-select2').val()
       var  Sub_Komponen = $('#sub_komponen-select2').val()
      $('#kdindex').val(''+Satker+''+Program+''+Kegiatan+''+KRO+''+RO+''+Komponen+''+Sub_Komponen+'')
      $('#kdindex').html(''+Satker+''+Program+''+Kegiatan+''+KRO+''+RO+''+Komponen+''+Sub_Komponen+'')

      var  kdindex = $('#kdindex').val()
        if(kdindex.includes("null") || kdindex == ""){
          $("#Tambah").addClass("disabled");
        }else{
          $("#Tambah").removeClass("disabled");
        }
    });

    $("#Tambah").click(function (e) {
      var kdindex = $('#kdindex').val()
      $('#idxskmpnen').val(kdindex)
      $('#idxskmpnen').html(kdindex)

      $('#modalidx').modal('close');

    })



$("#ttd").select2({
          dropdownAutoWidth: true,
          width: '100%',
          placeholder: "Pilih Nama",
         ajax: { 
           url: dropdown_baseurl + 'pegawai',
           type: "post",
           dataType: 'json',
           delay: 250,
           data: function (params) {
              return {
                Trigger : "pegawai_forST",
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

    // $("#idxskmpnen").select2({
    //     // dropdownAutoWidth: true,
    //     width: '100%',
    //     placeholder: "Pilih Komponen/Sub Komp",
    //     ajax: { 
    //     url: dropdown_baseurl + 'sub_komponen',
    //     type: "post",
    //     dataType: 'json',
    //     delay: 250,
    //     data: function (params) {
    //         return {
    //         Trigger : "sub_komponen_forST",
    //         searchTerm: params.term // search term
    //         };
    //     },
    //     processResults: function (response) {
    //         return {
    //             results: response
    //         };
    //     },
    //     cache: true
    //     }
    // });

    $("#beban_anggaran").select2({
        dropdownAutoWidth: true,
        width: '100%',
        placeholder: "Pilih Unit",
        ajax: { 
        url: dropdown_baseurl + 'unitkerja',
        type: "post",
        dataType: 'json',
        delay: 250,
        data: function (params) {
            return {
            Trigger : "unitkerja_forST",
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

function selectRefresh(x){
    
        $(".namaTim").select2({
          dropdownAutoWidth: true,
          width: '100%',
          placeholder: "Pilih Nama",
          dropdownParent: "#Tim",
         ajax: { 
           url: dropdown_baseurl + 'pegawai',
           type: "post",
           dataType: 'json',
           delay: 250,
           data: function (params) {
              return {
                Trigger : "pegawai_forST",
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

     $('.namaTim').on('change', function() {

    var id =  $(this).attr("name")
    var res = id[9]

    var nip = this.value

    var val = nip.split("-")

    

    $('#nip'+res+'').html(val[0])
    $('#nip'+res+'').val(val[0])

    $('#perjab'+res+'').html(val[1])
    $('#perjab'+res+'').val(val[1])

    $('#nama'+res+'').html(val[2])
    $('#nama'+res+'').val(val[2])


});
  
}


$('.multi-field-wrapper').each(function() {
        var max      = 20;
        var $wrapper = $('.multi-fields', this);
        var x = 0;
        var i = 0;
        var head = "";
        var end="";
        var arrX = [];
        $("#add-field", $(this)).click(function(e) {
           if(x < max){
              x++;
              i++;
                
              if(x == 1){
                   head = '<table class="bordered wrap" style="width: 100%" id="tbUser"><tr>\
                                <td style="width: 5%" >NO</td>\
                                <td style="width: 30%" >NAMA</td>\
                                <td style="width: 15%" >NIP</td>\
                                <td style="width: 30%" >PERAN/JABATAN</td>\
                                <td style="width: 15%" >AKSI</td>\
                            </tr>';
                }else if(x == max){
                  end = '</table>'
              }
              $($wrapper).append( head +'<tr>\
                            <td style="width: 5%" ><input  type="number" id="urut'+x+'" name="urut'+x+'" min="1" max="20" value="'+x+'"></td>\
                            <td style="width: 30%" id="Tim" name="Tim">\
                               <select placeholder="Nama.." class="namaTim browser-default" name="namaDummy'+x+'"></select>\
                               <input name="nama'+x+'" id="nama'+x+'" hidden>\
                            </td>\
                            <td style="width: 15%">\
                                <input placeholder="NIP" class="nip" id="nip'+x+'" name="nip'+x+'" readonly>\
                            </td>\
                            <td style="width: 30%">\
                                <textarea placeholder="Peran/Jabatan" class="perjab" id="perjab'+x+'" name="perjab'+x+'" readonly></textarea>\
                            </td>\
                            <td style="width: 15%">\
                                <div class="col s12">\
                                    <span class="btn red col s4 table-remove" style="padding: 0px !important" id="'+x+'" ><i class="material-icons">delete</i></span>\
                                </div>\
                            </td>\
                        </tr>'+end+'');

                        selectRefresh(x);
                        countX = arrX.push(x);
                       

                        $('.table-remove').click(function() {
                            $(this).parents('table').detach();
                                if(x <=0 ){
                                    x=0;
                                
                                }

                                var nm =  $(this).attr("id")
                                var d = removeItemAll(arrX, parseInt(nm))
                                $('#ArrX').val(d)
                                
                            
                        });

                        $('#ArrX').val(arrX)
                        //console.log(arrX)
            }
            
        });
        
    });

function removeItemAll(arr, value) {
  var i = 0;
  while (i < arr.length) {
    if (arr[i] === value) {
      arr.splice(i, 1);
    } else {
      ++i;
    }
  }
  return arr;
}


$("#TambahST").click(function (e) {
  e.preventDefault();

  var btn = $(this);
  var form = $(this).closest("form");
  var formData = new FormData($("#FormST")[0]);
  var IdForm =  "FormST";
  var countingDiv = document.getElementById('counting');
  var countTim = countingDiv.getElementsByTagName('select').length;

  btn
    .addClass("kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light")
    .attr("disabled", true);

  formData.append('Trigger', 'C')
  formData.append('countTim', countTim)

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

function Print(Id){
  swal({
    title: "Apakah Yakin Ingin Dihapus?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Ya, Hapus!",
    cancelButtonText: "Batal",
    html:
    '<label class="col-md-2">Kop</label><input id="kop1" name="kop1" class="swal2-input col-md-10" placeholder="TENTARA NASIONAL INDONESIA" value="TENTARA NASIONAL INDONESIA">'+
    '<label class="col-md-2">Sub</label><input id="kop2" name="kop2" class="swal2-input col-md-10" placeholder="Sub Kop">',
  }).then(function (result) {
    if (result) {
      Execute(Id);
    }
  });

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


</script>