
<script>


var baseurl 	= "<?= base_url('Transaksi/SuratTugas/')?>";
var dropdown_baseurl 	= "<?= base_url('Master/Dropdown/')?>";
var master_baseurl 	= "<?= base_url('Master/Master/')?>";
var satker_session = "<?= $this->session->userdata("kdsatker")?>"
var countingDiv = document.getElementById('counting');
var countTimTable = countingDiv.getElementsByTagName('select').length;
// var countTimTable = "<?= count($ubah)?>"

//VARIABLE UPDATE//
var BAvalue = "<?= $ubah[0]['id_unit'] ?>"
var VAtext = "<?= $ubah[0]['nama_unit'] ?>"

var TTDvalue = "<?= $ubah[0]['id_unit'] ?>"
var TTDtext = "<?= $ubah[0]['nama_unit'] ?>"

var idxskmpnen = "<?= $ubah[0]['idxskmpnen'] ?>"

var PROvalue = idxskmpnen.substring(17,15)
var PROtext = idxskmpnen.substring(17,15)

var GIATvalue = idxskmpnen.substring(21,17)
var GIATtext = idxskmpnen.substring(21,17)

var KROvalue = idxskmpnen.substring(24,21)
var KROtext = idxskmpnen.substring(24,21)

var ROvalue = idxskmpnen.substring(27,24)
var ROtext = idxskmpnen.substring(27,24)

var KOMvalue = idxskmpnen.substring(30,27)
var KOMtext = idxskmpnen.substring(30,27)

var SKOMvalue = idxskmpnen.substring(32,30)
var SKOMtext = idxskmpnen.substring(32,30)

var $beban_anggaran = $("<option selected='selected'></option>").val(BAvalue).text(VAtext)
$("#beban_anggaran").append($beban_anggaran).trigger('change');

var $pro = $("<option selected='selected'></option>").val(PROvalue).text(PROtext)
$("#program-select2").append($pro).trigger('change');
var $giat = $("<option selected='selected'></option>").val(GIATvalue).text(GIATtext)
$("#kegiatan-select2").append($giat).trigger('change');
var $kro = $("<option selected='selected'></option>").val(KROvalue).text(KROtext)
$("#kro-select2").append($kro).trigger('change');
var $ro = $("<option selected='selected'></option>").val(ROvalue).text(ROtext)
$("#ro-select2").append($ro).trigger('change');
var $kom = $("<option selected='selected'></option>").val(KOMvalue).text(KOMtext)
$("#komponen-select2").append($kom).trigger('change');
var $skom = $("<option selected='selected'></option>").val(SKOMvalue).text(SKOMtext)
$("#sub_komponen-select2").append($skom).trigger('change');

$('#kdindex').val(idxskmpnen)

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

   $(".namaTimHardcode").select2({
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

$('.namaTimHardcode').on('change', function() {

var id =  $(this).attr("name")
var res = id[9]

var nip = this.value

var val = nip.split("-")



$('#niplabel'+res+'').html(val[0])
$('#nip'+res+'').val(val[0])

$('#perjablabel'+res+'').html(val[1])
$('#perjab'+res+'').val(val[1])

$('#nama'+res+'').html(val[2])
$('#nama'+res+'').val(val[2])


});

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
       $('#kdindex').val('2021'+Satker+'08901'+Program+''+Kegiatan+''+KRO+''+RO+''+Komponen+''+Sub_Komponen+'')
       $('#kdindex').html('2021'+Satker+'08901'+Program+''+Kegiatan+''+KRO+''+RO+''+Komponen+''+Sub_Komponen+'')

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

    

    $('#niplabel'+res+'').html(val[0])
    $('#nip'+res+'').val(val[0])

    $('#perjablabel'+res+'').html(val[1])
    $('#perjab'+res+'').val(val[1])

    $('#nama'+res+'').html(val[2])
    $('#nama'+res+'').val(val[2])


});
  
}

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


$('.multi-field-wrapper').each(function() {
        var max      = 20;
        var $wrapper = $('.table-tim', this);
        var x = countTimTable;
        var i = countTimTable;
        var a = countTimTable;
        var head = "";
        var end="";
        var arrX = [];

        for(test = 1 ; test <= countTimTable ; test++){
            countX = arrX.push(test);
         }
         $('#ArrX').val(arrX)


        $("#add-field", $(this)).click(function(e) {
           if(x < max){
              x++;
              i++;
                
              if(x == a){
                   head = '<table class="bordered wrap" style="width: 100%" id="tbUser">';
                }else if(x == max){
                  end = '</table>'
              }
              $($wrapper).append('<tr>\
                           <td style="width: 5%" hidden>'+x+'</td>\
                            <td style="width: 5%" >'+x+'</td>\
                            <td style="width: 30%" id="Tim" name="Tim">\
                               <select placeholder="Nama.." class="namaTim browser-default" name="namaDummy'+x+'"></select>\
                               <input name="nama'+x+'" id="nama'+x+'" hidden>\
                            </td>\
                            <td style="width: 15%" id="niplabel'+x+'">\
                                <input placeholder="NIP" class="nip" id="nip'+x+'" name="nip'+x+'" readonly hidden>\
                            </td>\
                            <td style="width: 30%" id="perjablabel'+x+'">\
                                <textarea placeholder="Peran/Jabatan" class="perjab" id="perjab'+x+'" name="perjab'+x+'" readonly hidden></textarea>\
                            </td>\
                            <td>\
                                 <div class="col s12">\
                                    <div class="col s2" style="padding-left: 2px; padding-right: 2px"></div>\
                                    <span class="btn red col s5 table-remove" style="padding: 0px !important" id="'+x+'" ><i class="material-icons">delete</i></span>\
                                 </div>\
                           </td>\
                        </tr>');

                        selectRefresh(x);
                        
                        countX = arrX.push(x);
                        
                       

                        $('.table-remove').click(function() {
                            $(this).parents('tr').detach();
                            x--;
                                if(x <=a ){
                                    x=countTimTable;
                                
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


$("#UbahST").click(function (e) {
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

  formData.append('Trigger', 'U')
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


function show_msg(textStatus){
        swal({
            title:textStatus, 
            icon:textStatus,
            timer: 2000
            })
    }



function Tim(){
  $('#modalTim').modal('open');

  $("#multi-select").DataTable({ 
      responsive: !0, 
      ajax: {
                url: master_baseurl + 'Master_Pegawai',
                type: "post",
                data : {"kdsatker": satker_session}
            },
                
            autoWidth: false,
            columns: [
             
                {
                    data: null, class: "text-center"
                   
                },
               
                
                { data: "nip",
                render: function (data, type, row, meta) {
                        return data;
                    } 
                  },

                { data: "nama",
              render: function (data, type, row, meta) {
                      return data;
                  } 
                },

                { data: "jabatan",
              render: function (data, type, row, meta) {
                      return data;
                  } 
                },
 
            ],
            pageLength: 10,
            lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
            bFilter: false,
            ordering: false,
            scrollCollapse: true,
    
    });
}





</script>