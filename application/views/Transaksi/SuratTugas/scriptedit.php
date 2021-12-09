
<script>


var baseurl 	= "<?= base_url('Transaksi/SuratTugas/')?>";
var dropdown_baseurl 	= "<?= base_url('Master/Dropdown/')?>";
var master_baseurl 	= "<?= base_url('Master/Master/')?>";
var satker_session = "<?= $this->session->userdata("kdsatker")?>"
var user_session = "<?= $this->session->userdata("user_id")?>"
var role_session = "<?= $this->session->userdata("role_id")?>"
var unit_session = "<?= $this->session->userdata("unit_id")?>"
if(role_session == 1){
  unit_session = 0;
}

var countingDiv = document.getElementById('counting');
var countTimTable = countingDiv.getElementsByClassName('namaTim').length;
// var countTimTable = "<?= count($ubah)?>"

//VARIABLE UPDATE//
var BAvalue = "<?= $ubah[0]['id_unit'] ?>"
var VAtext = "<?= $ubah[0]['nama_unit'] ?>"

var TTDvalue = "<?= $ubah[0]['id_ttd'] ?>"
var TTDtext = "<?= $ubah[0]['nama_ttd'] ?>"

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
$("#select-bebananggaran").append($beban_anggaran).trigger('change');

var $ttd = $("<option selected='selected'></option>").val(TTDvalue).text(TTDtext)
$("#ttd").append($ttd).trigger('change');



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

function Min_datemulai(){
  var min_date_st = $('#tglst').val()
  document.getElementById("tglst_mulai").setAttribute("min", min_date_st);

}

function Min_dateselesai(){
  var min_date_mulai = $('#tglst_mulai').val()
  document.getElementById("tglst_selesai").setAttribute("min", min_date_mulai);

}


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

$('#gol'+res+'').html(val[3])
$('#gol'+res+'').val(val[3])


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

$('#gol'+res+'').html(val[3])
$('#gol'+res+'').val(val[3])


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
                   head = '<table class="bordered table-tim fixed"id="tbUser">';
                }else if(x == max){
                  end = '</table>'
              }
              var minDate = $('#tglst_mulai').val()
              var maxDate = $('#tglst_selesai').val()
              $($wrapper).append('<tr>\
              <td><input  type="number" id="urut'+x+'" name="urut'+x+'" min="1" max="20" value="'+x+'"></td>\
                            <td id="Tim" name="Tim">\
                               <select placeholder="Nama.." class="namaTim browser-default" name="namaDummy'+x+'"></select>\
                               <input name="nama'+x+'" id="nama'+x+'" hidden>\
                            </td>\
                            <td>\
                                <input placeholder="NIP" class="nip" id="nip'+x+'" name="nip'+x+'" readonly>\
                            </td>\
                            <td>\
                                <textarea placeholder="Peran/Jabatan" class="perjab" id="perjab'+x+'" name="perjab'+x+'" readonly></textarea>\
                            </td>\
                            <td><input type="text" id="gol'+x+'" name="gol'+x+'" readonly></td>\
                            <td><select class="browser-default kota" name="kotaasal'+x+'" id="kotaasal'+x+'" onchange="cityCount('+x+')"></select></td>\
                              <td><select class="browser-default kota"  name="kotatujuan'+x+'" id="kotatujuan'+x+'" onchange="cityCount('+x+')"></select></td>\
                              <td><input type="date" min="'+minDate+'" max="'+maxDate+'" onchange="dayCount(\''+x+'\',\'D\')" id="tglberangkat'+x+'" name="tglberangkat'+x+'"></td>\
                              <td><input type="date" max="'+maxDate+'" min="'+minDate+'" onchange="dayCount('+x+')" id="tglkembali'+x+'" name="tglkembali'+x+'"></td>\
                              <td><input type="text" id="jmlhari'+x+'" name="jmlhari'+x+'" readonly></td>\
                              <td><input type="text" id="uangharian'+x+'" name="uangharian'+x+'" ></td>\
                              <td><input type="text" id="uangpenginapan'+x+'" name="uangpenginapan'+x+'" ></td>\
                              <td><input type="text" onkeypress="return validateNumber(event)" ></td>\
                              <td><input type="text" onkeypress="return validateNumber(event)" ></td>\
                              <td><input type="text" id="total'+x+'"  name="total'+x+'" ></td>\
                              <td><select class="select2 browser-default" id="jnstransportasi'+x+'" name="jnstransportasi'+x+'">\
                                    <option value="Pesawat Udara">Pesawat Udara</option>\
                                    <option value="Kendaraan Umum">Kendaraan Umum</option>\
                                  </select</td>\
                              <td>\
                                  <div class="col s12">\
                                      <a><span class="col s4 table-remove" style="padding: 0px !important" id="'+x+'" ><i class="material-icons">delete</i></span></a>\
                                  </div>\
                              </td>\
                              <td hidden><input type="text" id="tarifuangpenginapan'+x+'" name="tarifuangpenginapan'+x+'"></td>\
                              <td hidden><input type="text" id="tarifuangharian'+x+'" name="tarifuangharian'+x+'" ></td>\
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

function validateNumber(e) {
    const pattern = /^[0-9]$/;

    return pattern.test(e.key )
}


function cityCount(id){


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





if ( $("#idxskmpnen").val() != null){
  var valkdakun = $("#idxskmpnen").val()
  var kdakun_split = valkdakun.split("-")
  var kdakun = kdakun_split[0]

}


$.ajax({
        url : master_baseurl + "Master_Uangharian",
        data: {"Tujuan": tujuan, "Trigger": "NotaDinas"},
        type: "post",
        dataType: "JSON",
        success: function(data)
            {    
                
                if(kotaasal_id == kotatujuan_id){
                  tarif = data[0]['dalam_kota_8_jam']

                  if(kdakun.search("524") == 0){
                    tarif = data[0]['fb_dalamkota']
                  }

                }else{
                  tarif = data[0]['luar_kota']
                  if(kdakun.search("524") == 0){
                    tarif = data[0]['fb_luarkota']
                  }
                }

                $("#tarifuangharian"+id+"").val(tarif)
                $("#tarifuangpenginapan"+id+"").val("1200000")

                if ( ($("#tglberangkat"+id+"").val() != "") && ($("#tglkembali"+id+"").val() != "")) {
                var oneDay = 24*60*60*1000; // hours*minutes*seconds*milliseconds
                var firstDate = new Date($("#tglberangkat"+id+"").val());
                var secondDate = new Date($("#tglkembali"+id+"").val());
                var diffDays = ((secondDate.getTime() - firstDate.getTime()) / (oneDay) )+ 1;
                $("#jmlhari"+id+"").val(diffDays);

                var totalUangHarian = ''+((diffDays) * tarif)
                $("#uangharian"+id+"").val(formatRupiah(totalUangHarian));

                var totalUangPenginapan = ''+((diffDays-1) * 1200000)
                $("#uangpenginapan"+id+"").val(formatRupiah(totalUangPenginapan));


                //TOTAL
                var total = ''+(Number(totalUangHarian)+Number(totalUangPenginapan))
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



var kdakun = "0"

if ( $("#idxskmpnen").val() != null){
  var valkdakun = $("#idxskmpnen").val()
  var kdakun_split = valkdakun.split("-")
  var kdakun = kdakun_split[0]

}


    $.ajax({
        url : master_baseurl + "Master_Uangharian",
        data: {"Tujuan": tujuan, "Trigger": "NotaDinas"},
        type: "post",
        dataType: "JSON",
        success: function(data)
            {    
              if(kotaasal_id == kotatujuan_id){
                  tarif = data[0]['dalam_kota_8_jam']

                  if(kdakun.search("524") == 0){
                    tarif = data[0]['fb_dalamkota']
                  }

                }else{
                  tarif = data[0]['luar_kota']
                  if(kdakun.search("524") == 0){
                    tarif = data[0]['fb_luarkota']
                  }
                }

                if ( ($("#tglberangkat"+id+"").val() != "") && ($("#tglkembali"+id+"").val() != "")) {
                var oneDay = 24*60*60*1000; // hours*minutes*seconds*milliseconds
                var firstDate = new Date($("#tglberangkat"+id+"").val());
                var secondDate = new Date($("#tglkembali"+id+"").val());
                var diffDays = ((secondDate.getTime() - firstDate.getTime()) / (oneDay)) + 1;
                $("#jmlhari"+id+"").val(diffDays);

                // var kotatujuan = $("#kotatujuan"+id+"").val()
                // var kotatujuan_split = kotatujuan.split("-")

                // var tarif = kotatujuan_split[0]

                var totalUangHarian = ''+(diffDays * tarif)
                $("#uangharian"+id+"").val(formatRupiah(totalUangHarian));

                var totalUangPenginapan = ''+((diffDays-1) * 1200000)
                $("#uangpenginapan"+id+"").val(formatRupiah(totalUangPenginapan));


                //TOTAL
                var total = ''+(Number(totalUangHarian)+Number(totalUangPenginapan))
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