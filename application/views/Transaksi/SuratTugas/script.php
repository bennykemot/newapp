

<script>


var baseurl 	= "<?= base_url('Transaksi/SuratTugas/')?>";
var baseurl_export 	= "<?= base_url('Transaksi/NotaDinas/')?>";
var dropdown_baseurl 	= "<?= base_url('Master/Dropdown/')?>";
var master_baseurl 	= "<?= base_url('Master/Master/')?>";
var satker_session = "<?= $this->session->userdata("kdsatker")?>"
var user_session = "<?= $this->session->userdata("user_id")?>"
var role_session = "<?= $this->session->userdata("role_id")?>"
var unit_session = "<?= $this->session->userdata("unit_id")?>"
if(role_session == 1){
  unit_session = 0;
}



function Reset(idForm) {
  document.getElementById(idForm).reset();
  $('.browser-default').val(null).trigger('change');
}

function show(Id){
  $('#id_st').val(Id);
}

function kwitansiRampung(url,trigger){
  var id = $('#id_st').val()
  window.open(baseurl_export + url + id, '_blank')

}

function Min_datemulai(){
  var min_date_st = $('#tglst').val()
  document.getElementById("tglst_mulai").setAttribute("min", min_date_st);

}

function Min_dateselesai(){
  var min_date_mulai = $('#tglst_mulai').val()
  document.getElementById("tglst_selesai").setAttribute("min", min_date_mulai);

}

function getRep(keljab, valTrigger){
if(valTrigger == "L"){
      if(keljab == "E.I"){
          res ="200000"
          }else if(keljab == "E.II"){
            res = "150000"
          }else{
            res = "0"
      }
    }else{
      if(keljab == "E.I"){
          res ="100000"
          }else if(keljab == "E.II"){
            res = "75000"
          }else{
            res = "0"
      }

    }
  return res;

}

$(document).ready(function() {
    $('#tb-st').DataTable( {

      lengthMenu: [
            [10, 25, 50, -1],
            [10, 25, 50, "All"],
        ],
        responsive: true,
        scrollX: true,
        info: false
         } );
      } );



function PilihKode(Id, kdindex){

  $.ajax({
        url : master_baseurl + "getKomponenSub",
        data: {kdindex: kdindex},
        type: "post",
        dataType: "JSON",
        success: function(data)
            {    

              $('#idxskmpnenlabel').val(Id);
              $('#idxskmpnen').val(data[0]['kdindex']);
              $('#kdindex').val(data[0]['kdindex']);
              $('#thang').val(data[0]['thang']);
              $('#kdgiat').val(data[0]['kdgiat']);
              $('#kdoutput').val(data[0]['kdoutput']);
              $('#kdsoutput').val(data[0]['kdsoutput']);
              $('#kdkmpnen').val(data[0]['kdkmpnen']);
              $('#kdskmpnen').val(data[0]['kdskmpnen']);
              $('#kdakun').val(data[0]['kdakun']);
              $('#kdbeban').val(data[0]['kdbeban']);

              $('#modalidx').modal('close');
              

            }
    });

  
  
}

$(document).ready(function() {
    // $('#KomponenSub').DataTable( {
    //         //serverSide: true,
    //         //processing: true,
    //         searchDelay: 500,
    //         searching: false,
    //         ordering: false,
    //         bDestroy: true,

    //       ajax: {
    //             url: master_baseurl + 'getKomponenSub',
    //             type: "post",
    //             dataType: 'json',
    //             data : {
    //             kdsatker: "<?= $this->session->userdata("kdsatker")?>",
    //             unitid : <?= $this->session->userdata("unit_id")?>},
    //             dataSrc: "",
                
    //         },
    //         autoWidth: false,
    //         columns: [
             
    //             {
    //                 data: null, class: "text-center",
    //                 render: function (data, type, row, meta) {
    //                     return meta.row + meta.settings._iDisplayStart + 1;
    //                 }
    //             },

    //             {data: "kdindex"}
               
 
    //         ],

    //     lengthMenu: [
    //         [10, 25, 50, -1],
    //         [10, 25, 50, "All"],
    //     ],
    //     responsive: true,
    //     scrollX: true,
    //     info: false
    //      } );
      } );


function formatRupiah(angka){
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split   		= number_string.split(','),
        sisa     		= split[0].length % 3,
        rupiah     		= split[0].substr(0, sisa),
        ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
  
        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if(ribuan){
          separator = sisa ? '.' : '';
          rupiah += separator + ribuan.join('.');
        }
  
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return 'Rp. ' + rupiah;
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
          placeholder: "Pilih",
          dropdownParent: "#modalidx",
         ajax: { 
           url: dropdown_baseurl + 'program_per_satker',
           type: "post",
           dataType: 'json',
           delay: 250,
           data: function (params) {
              return {
                kdsatker: satker_session,
                unitid : unit_session,
                trigger : "program_for_ST",
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
          placeholder: "Pilih",
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
                unitid : unit_session,
                trigger : "kegiatan_for_ST",
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
          placeholder: "Pilih",
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
                unitid : unit_session,
                trigger : "kro_for_ST",
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
          placeholder: "Pilih",
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
                unitid : unit_session,
                trigger : "ro_for_ST",
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
          placeholder: "Pilih",
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
                unitid : unit_session,
                trigger : "komponen_for_ST",
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
          placeholder: "Pilih",
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
                unitid : unit_session,
                trigger : "skomponen_for_ST",
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
          placeholder: "Pilih Penandatangan",
         ajax: { 
           url: dropdown_baseurl + 'ttd',
           type: "post",
           dataType: 'json',
           delay: 250,
           data: function (params) {
              return {
								Trigger: "ttd_forST",
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

// $("#ttd").select2({
//           dropdownAutoWidth: true,
//           width: '100%',
//           placeholder: "Pilih Nama",
//          ajax: { 
//            url: dropdown_baseurl + 'pegawai',
//            type: "post",
//            dataType: 'json',
//            delay: 250,
//            data: function (params) {
//               return {
//                 Trigger : "pegawai_forST",
//                 searchTerm: params.term // search term
//               };
//            },
//            processResults: function (response) {
//               return {
//                  results: response
//               };
//            },
//            cache: true
//          }
//      });

     $("#select-bebananggaran").select2({
          dropdownAutoWidth: true,
          placeholder: "Pilih Beban Anggaran",
         ajax: { 
           url: dropdown_baseurl + 'unitkerja',
           type: "post",
           dataType: 'json',
           delay: 250,
           data: function (params) {
              return {
                Trigger: "SelectForBebanAnggaran_NotaDinas",
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

    //  $("#idxskmpnen").change(function() {
    //   document.getElementById("add-field").style.display = "";
    //  });

     


function selectRefresh(x){

              // M.textareaAutoResize($('#perjab'+x+''));

    
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

        

        $('#nip'+res+'').html(val[0])
        $('#nip'+res+'').val(val[0])

        $('#perjablabel'+res+'').html(val[1])
        $('#perjab'+res+'').val(val[1])

        $('#nama'+res+'').html(val[2])
        $('#nama'+res+'').val(val[2])

        $('#gol'+res+'').html(val[3])
        $('#gol'+res+'').val(val[3])


    });

    var idkota_asal = $('#kotaasal'+x+'').val()
    var idkota_tujuan = $('#kotatujuan'+x+'').val()

      if($('#idxskmpnen').val() != null){

        var id = $('#idxskmpnen').val();
        var split_id = id.split("-")
        var kdakun = split_id[0]

        var trigger = "non-fullboard"
        var jenistarif = "luar"

          if(kdakun.search("524") == 0){
              trigger = "fullboard"
          }

          if(idkota_asal == idkota_tujuan){
              jenistarif = "dalam"
        }

      }
    
      $(".kota").select2({
        dropdownAutoWidth: true,
        width: '100%',
        placeholder: "Pilih Kota",
      ajax: { 
        url: dropdown_baseurl + 'kota',
        type: "post",
        dataType: 'json',
        delay: 250,
        data: function (params) {
            return {
              searchTerm: params.term,
              Trigger : trigger,
              Jenistarif : jenistarif // search term
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

}


$('.multi-field-wrapper').each(function() {
        var max      = 20;
        var $wrapper = $('.multi-fields', this);
        var x = 0;
        var i = 0;
        var head = '<tbody id="Tbody" class="multi-field" style="border-top: 2px dotted #c5c5c4;">';
        var end='</tbody>';
        var arrX = [];
        $("#add-field", $(this)).click(function(e) {
           if(x < max){
              x++;
              i++;
              var minDate = $('#tglst_mulai').val()
              var maxDate = $('#tglst_selesai').val()
              $($wrapper).append( head +'<tr class="tb-tim">\
                            <td><input  type="number" id="urut'+x+'" name="urut'+x+'" min="1" max="20" value="'+x+'"></td>\
                            <td id="Tim" name="Tim" colspan="2">\
                               <select placeholder="Nama.."  class="namaTim browser-default" name="namaDummy'+x+'"></select>\
                               <input name="nama'+x+'" id="nama'+x+'" hidden>\
                            </td>\
                            <td colspan="2">\
                                <input placeholder="NIP" class="nip" id="nip'+x+'" name="nip'+x+'" readonly>\
                            </td>\
                            <td colspan="2">\
                                <textarea placeholder="Peran/Jabatan" class="perjab" id="perjab'+x+'" name="perjab'+x+'"></textarea>\
                            </td>\
                              <td><input type="text" id="gol'+x+'" name="gol'+x+'" readonly><input type="text" id="keljab'+x+'" name="keljab'+x+'" readonly></td>\
                              <td colspan="2"><select class="browser-default kota kotaasal" name="kotaasal'+x+'" id="kotaasal'+x+'" onchange="cityCount('+x+')"></select></td>\
                              <td colspan="2"><select class="browser-default kota kotatujuan"  name="kotatujuan'+x+'" id="kotatujuan'+x+'" onchange="cityCount('+x+')"></select></td>\
                              <td><input type="date" min="'+minDate+'" max="'+maxDate+'" onchange="dayCount(\''+x+'\',\'D\')" id="tglberangkat'+x+'" name="tglberangkat'+x+'"></td>\
                              <td><input type="date" max="'+maxDate+'" min="'+minDate+'" onchange="dayCount('+x+')" id="tglkembali'+x+'" name="tglkembali'+x+'"></td>\
                              <td hidden><input type="text" id="tarifuangpenginapan'+x+'" name="tarifuangpenginapan'+x+'"></td>\
                              <td hidden><input type="text" id="tarifuangharian'+x+'" name="tarifuangharian'+x+'" ></td>\
                            </tr>\
                              <tr>\
                                  <td><input type="text" id="jmlhari'+x+'" name="jmlhari'+x+'" readonly></td>\
                                  <td><input style="min-width: 150px" type="text" id="satuan_uangharian'+x+'" name="satuan_uangharian'+x+'" onkeyup="AllCount(\''+x+'\',\'satuan\')"></td>\
                                  <td><input style="min-width: 150px" type="text" id="uangharian'+x+'" name="uangharian'+x+'" onkeyup="AllCount(\''+x+'\',\'total\')"></td>\
                                  <td><input style="min-width: 150px" type="text" id="satuan_uangpenginapan'+x+'" name="satuan_uangpenginapan'+x+'" onkeyup="AllCount(\''+x+'\',\'satuan\')"></td>\
                                  <td><input style="min-width: 150px" type="text" id="uangpenginapan'+x+'" name="uangpenginapan'+x+'" onkeyup="AllCount(\''+x+'\',\'total\')"></td>\
                                  <td><input style="min-width: 150px" type="text" id="uangtaxi'+x+'" name="uangtaxi'+x+'" onkeyup="AllCount(\''+x+'\',\'all\')"></td>\
                                  <td><input style="min-width: 150px" type="text" id="uanglaut'+x+'" name="uanglaut'+x+'" onkeyup="AllCount(\''+x+'\',\'all\')"></td>\
                                  <td><input style="min-width: 150px" type="text" id="uangudara'+x+'" name="uangudara'+x+'" onkeyup="AllCount(\''+x+'\',\'all\')"></td>\
                                  <td><input style="min-width: 150px" type="text" id="uangdarat'+x+'" name="uangdarat'+x+'" onkeyup="AllCount(\''+x+'\',\'all\')"></td>\
                                  <td><input style="min-width: 150px" type="text" id="uangdll'+x+'" name="uangdll'+x+'" onkeyup="AllCount(\''+x+'\',\'all\')"></td>\
                                  <td><input style="min-width: 150px" type="text" id="uangrep'+x+'" name="uangrep'+x+'" onkeyup="AllCount(\''+x+'\',\'all\')"></td>\
                                  <td><input style="min-width: 150px" type="text" readonly id="total'+x+'"  name="total'+x+'" ></td>\
                                  <td><select class="select2 browser-default" id="jnstransportasi'+x+'" name="jnstransportasi'+x+'">\
                                    <option value="Kendaraan Umum">Kendaraan Umum</option>\
                                    <option value="Kendaraan Dinas">Kendaraan Dinas</option>\
                                  </select</td>\
                                  <td >\
                                      <div class="col s12">\
                                          <a><span class="col s4 table-remove text-center" style="padding: 0px !important" id="'+x+'" ><i class="material-icons">delete</i></span></a>\
                                      </div>\
                                  </td>\
                              </tr>'+end+'');

                        selectRefresh(x);
                        countX = arrX.push(x);
                       

                        $('.table-remove').click(function() {
                            $(this).parents('tbody').detach();
                            x--;
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

function validateNumber(e) {
    const pattern = /^[0-9]$/;

    return pattern.test(e.key )
}


function AllCount(i, Trigger){
    var harian = $("#satuan_uangharian"+i+"").val()
    var inap = $("#satuan_uangpenginapan"+i+"").val()
    var taxi = $("#uangtaxi"+i+"").val()
    var laut = $("#uanglaut"+i+"").val()
    var udara = $("#uangudara"+i+"").val()
    var darat = $("#uangdarat"+i+"").val()
    var dll = $("#uangdll"+i+"").val()
    var rep = $("#uangrep"+i+"").val()

    var T_harian = $("#uangharian"+i+"").val()
    var T_inap = $("#uangpenginapan"+i+"").val()

    var a = harian.replace(/[^0-9\.]+/g, "");
    var b = inap.replace(/[^0-9\.]+/g, "");
    var c = rep.replace(/[^0-9\.]+/g, "");
    var d = taxi.replace(/[^0-9\.]+/g, "");
    var e = laut.replace(/[^0-9\.]+/g, "");
    var f = udara.replace(/[^0-9\.]+/g, "");
    var g = darat.replace(/[^0-9\.]+/g, "");
    var h = dll.replace(/[^0-9\.]+/g, "");

    var T_a = T_harian.replace(/[^0-9\.]+/g, "");
    var T_b = T_inap.replace(/[^0-9\.]+/g, "");

    var uangharian = a.replace(/\./g, "");
    var uangpenginapan = b.replace(/\./g, "");
    var uangrep = c.replace(/\./g, "");

    var uangtaxi = d.replace(/\./g, "");
    var uanglaut = e.replace(/\./g, "");
    var uangudara = f.replace(/\./g, "");
    var uangdarat = g.replace(/\./g, "");
    var uangdll = h.replace(/\./g, "");

    var T_uangharian = T_a.replace(/\./g, "");
    var T_uangpenginapan = T_b.replace(/\./g, "");

    var jmlhari = $('#jmlhari'+i+'').val()

    if(Trigger == "satuan"){
      var total_harian_ = Number(uangharian) * Number(jmlhari)
      var total_harian = ""+total_harian_+""
      $('#uangharian'+i+'').val(formatRupiah(total_harian))


      var total_inap_ = Number(uangpenginapan) * ( Number(jmlhari)-1)
      var total_inap = ""+total_inap_+""
      $('#uangpenginapan'+i+'').val(formatRupiah(total_inap))

      var e = Number(total_harian) + Number(total_inap)  + Number(uangtaxi) + Number(uanglaut) + Number(uangudara) + Number(uangdarat) + Number(uangdll) + Number(uangrep)
    }else if( Trigger == "total"){
      var total_harian_ = Number(T_uangharian) / Number(jmlhari)
      var total_harian = ""+total_harian_+""
      $('#satuan_uangharian'+i+'').val(formatRupiah(total_harian))


      var total_inap_ = Number(T_uangpenginapan) /( Number(jmlhari)-1)
      var total_inap = ""+total_inap_+""
      $('#satuan_uangpenginapan'+i+'').val(formatRupiah(total_inap))

      var e = Number(total_harian) + Number(total_inap)  + Number(uangtaxi) + Number(uanglaut) + Number(uangudara) + Number(uangdarat) + Number(uangdll) + Number(uangrep)

    }else if(Trigger == "all"){
      var e = Number(T_uangharian) + Number(T_uangpenginapan)  + Number(uangtaxi) + Number(uanglaut) + Number(uangudara) + Number(uangdarat) + Number(uangdll) + Number(uangrep)
      
    }
      
    var total = ""+e+""

    $("#total"+i+"").val(formatRupiah(total))
  

}

function cityCount(id){


  if(id == 0 || id == "0"){

var valasal = $("#kotaasal").val()
var Textasal = $( "#kotaasal option:selected" ).text();

var kotaasal_split = valasal.split("-")
var asal = kotaasal_split[1]
var kotaasal_id = kotaasal_split[0]
var nama_kotaasal_id = kotaasal_split[2]
var $asal = $("<option selected='selected'></option>").val(valasal).text(Textasal)
    $(".kotaasal").append($asal).trigger('change');

}else if(id == "011"){
var valtujuan = $("#kotatujuan").val()
var Texttujuan = $( "#kotatujuan option:selected" ).text();

var kotatujuan_split = valtujuan.split("-")
var tujuan = kotatujuan_split[1]
var kotatujuan_id = kotatujuan_split[0]
var nama_kotatujuan_id = kotatujuan_split[2]
var $tujuan = $("<option selected='selected'></option>").val(valtujuan).text(Texttujuan)
    $(".kotatujuan").append($tujuan).trigger('change');

}else{


  if($("#kotaasal"+id+"").val() != null || $("#kotatujuan"+id+"").val() != null){
    var valasal = $("#kotaasal"+id+"").val()
    var kotaasal_split = valasal.split("-")
    var asal = kotaasal_split[1]
    var kotaasal_id = kotaasal_split[0]
    var nama_kotaasal_id = kotaasal_split[2]

    var valtujuan = $("#kotatujuan"+id+"").val()
    var kotatujuan_split = valtujuan.split("-")
    var tujuan = kotatujuan_split[1]
    var kotatujuan_id = kotatujuan_split[0]
    var nama_kotatujuan_id = kotatujuan_split[2]
  }
}

var keljab = $('#keljab'+id+'').val();
var kdakun = $('#kdakun').val();



$.ajax({
    url : master_baseurl + "Master_Uangharian",
    data: {"Tujuan": tujuan, "Trigger": "NotaDinas"},
    type: "post",
    dataType: "JSON",
    success: function(data)
        {    
          

          if(kdakun == "524111"){
            tarif = data[0]['luar_kota']
            rep = getRep(keljab, "L")
            
          }else if(kdakun == "524113"){
            tarif = data[0]['dalam_kota_8_jam']
            rep = getRep(keljab, "D")

          }else if(kdakun == "524119"){
            tarif = data[0]['fb_luarkota']
            rep = getRep(keljab, "L")

          }else if(kdakun == "524114"){
            tarif = data[0]['fb_dalamkota']
            rep = getRep(keljab, "D")

          }

            $("#tarifuangharian"+id+"").val(tarif)
            $("#tarifuangpenginapan"+id+"").val("1200000")

            if ( ($("#tglberangkat"+id+"").val() != "") && ($("#tglkembali"+id+"").val() != "")) {
            var oneDay = 24*60*60*1000; // hours*minutes*seconds*milliseconds
            var firstDate = new Date($("#tglberangkat"+id+"").val());
            var secondDate = new Date($("#tglkembali"+id+"").val());
            var diffDays = ((secondDate.getTime() - firstDate.getTime()) / (oneDay) )+ 1;
            $("#jmlhari"+id+"").val(diffDays);

            var totalUangHarian = ''+(diffDays * tarif)
            $("#satuan_uangharian"+id+"").val(formatRupiah(tarif));
            $("#uangharian"+id+"").val(formatRupiah(totalUangHarian));
            $("#uangharianDum"+id+"").val(totalUangHarian);

            var totalUangPenginapan = ''+((diffDays-1) * 1200000)
            $("#satuan_uangpenginapan"+id+"").val(formatRupiah("1200000"));
            $("#uangpenginapan"+id+"").val(formatRupiah(totalUangPenginapan));
            $("#uangpenginapanDum"+id+"").val(totalUangPenginapan);
            
            var totalUangRep = ''+(diffDays * rep)
            $("#uangrep"+id+"").val(formatRupiah(totalUangRep))

           
            var taxi = $("#uangtaxi"+id+"").val()
            var laut = $("#uanglaut"+id+"").val()
            var udara = $("#uangudara"+id+"").val()
            var darat = $("#uangdarat"+id+"").val()
            var dll = $("#uangdll"+id+"").val()
            var d = taxi.replace(/[^0-9\.]+/g, "");
            var e = laut.replace(/[^0-9\.]+/g, "");
            var f = udara.replace(/[^0-9\.]+/g, "");
            var g = darat.replace(/[^0-9\.]+/g, "");
            var h = dll.replace(/[^0-9\.]+/g, "");
            var uangtaxi = d.replace(/\./g, "");
            var uanglaut = e.replace(/\./g, "");
            var uangudara = f.replace(/\./g, "");
            var uangdarat = g.replace(/\./g, "");
            var uangdll = h.replace(/\./g, "");
            var uangrep = diffDays * rep

            //TOTAL
            var total = ''+(Number(totalUangHarian)+Number(totalUangPenginapan)+Number(uangtaxi)
            +Number(uangrep)
            +Number(uanglaut)+Number(uangudara)+Number(uangdarat)+Number(uangdll))
            $("#total"+id+"").val(formatRupiah(total));

            if(diffDays < 0){
              swal({
                title:"Jumlah Hari Minus !",
                text: "Pastikan tanggal kembali tidak < tanggal berangkat", 
                icon: "warning",
                timer: 2000
                })
                $("#tglkembali"+id+"").val("")
                $("#jmlhari"+id+"").val("");
            }
            }else{
                $("#jmlhari"+id+"").val();
            }

        }
});

}

function dayCount(id, trigger){

  if($("#kotaasal"+id+"").val() != null || $("#kotatujuan"+id+"").val() != null){
    var valasal = $("#kotaasal"+id+"").val()
    var kotaasal_split = valasal.split("-")
    var asal = kotaasal_split[1]
    var kotaasal_id = kotaasal_split[0]
    var nama_kotaasal_id = kotaasal_split[2]

    var valtujuan = $("#kotatujuan"+id+"").val()
    var kotatujuan_split = valtujuan.split("-")
    var tujuan = kotatujuan_split[1]
    var kotatujuan_id = kotatujuan_split[0]
    var nama_kotatujuan_id = kotatujuan_split[2]
  }



  var keljab = $('#keljab'+id+'').val();

  var kdakun = $('#kdakun').val();


    $.ajax({
        url : master_baseurl + "Master_Uangharian",
        data: {"Tujuan": tujuan, "Trigger": "NotaDinas"},
        type: "post",
        dataType: "JSON",
        success: function(data)
            {    
              if(kdakun == "524111"){
                tarif = data[0]['luar_kota']
                rep = getRep(keljab, "L")
                
              }else if(kdakun == "524113"){
                tarif = data[0]['dalam_kota_8_jam']
                rep = getRep(keljab, "D")

              }else if(kdakun == "524119"){
                tarif = data[0]['fb_luarkota']
                rep = getRep(keljab, "L")

              }else if(kdakun == "524114"){
                tarif = data[0]['fb_dalamkota']
                rep = getRep(keljab, "D")

              }

                if ( ($("#tglberangkat"+id+"").val() != "") && ($("#tglkembali"+id+"").val() != "")) {
                var oneDay = 24*60*60*1000; // hours*minutes*seconds*milliseconds
                var firstDate = new Date($("#tglberangkat"+id+"").val());
                var secondDate = new Date($("#tglkembali"+id+"").val());
                var diffDays = ((secondDate.getTime() - firstDate.getTime()) / (oneDay)) + 1;
                $("#jmlhari"+id+"").val(diffDays);
                var totalUangHarian = ''+(diffDays * tarif)
                $("#uangharian"+id+"").val(formatRupiah(totalUangHarian));

                var totalUangPenginapan = ''+((diffDays-1) * 1200000)
                $("#uangpenginapan"+id+"").val(formatRupiah(totalUangPenginapan));


                var totalUangRep = ''+(diffDays * rep)
                $("#uangrep"+id+"").val(formatRupiah(totalUangRep))

               
                var taxi = $("#uangtaxi"+id+"").val()
                var laut = $("#uanglaut"+id+"").val()
                var udara = $("#uangudara"+id+"").val()
                var darat = $("#uangdarat"+id+"").val()
                var dll = $("#uangdll"+id+"").val()
                var d = taxi.replace(/[^0-9\.]+/g, "");
                var e = laut.replace(/[^0-9\.]+/g, "");
                var f = udara.replace(/[^0-9\.]+/g, "");
                var g = darat.replace(/[^0-9\.]+/g, "");
                var h = dll.replace(/[^0-9\.]+/g, "");
                var uangtaxi = d.replace(/\./g, "");
                var uanglaut = e.replace(/\./g, "");
                var uangudara = f.replace(/\./g, "");
                var uangdarat = g.replace(/\./g, "");
                var uangdll = h.replace(/\./g, "");
                var uangrep = diffDays * rep

                //TOTAL
                var total = ''+(Number(totalUangHarian)+Number(totalUangPenginapan)+Number(uangtaxi)
                +Number(uangrep)
                +Number(uanglaut)+Number(uangudara)+Number(uangdarat)+Number(uangdll))
                $("#total"+id+"").val(formatRupiah(total));

                if(diffDays < 0){
                  swal({
                    title:"Jumlah Hari Minus !",
                    text: "Pastikan tanggal kembali tidak < tanggal berangkat", 
                    icon: "warning",
                    timer: 2000
                    })
                    $("#tglkembali"+id+"").val("")
                    $("#jmlhari"+id+"").val("");
                }
                }else{
                    $("#jmlhari"+id+"").val();
                }

            }
    });

}

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
  // var countingDiv = document.getElementById('counting');
  // var countTim = countingDiv.getElementsByClassName('namaTim').length;

  btn
    .addClass("kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light")
    .attr("disabled", false);

  formData.append('Trigger', 'C')
  // formData.append('countTim', countTim)

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
