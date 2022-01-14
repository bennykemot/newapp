
<script>


var baseurl 	= "<?= base_url('Transaksi/SuratTugas/')?>";
var dropdown_baseurl 	= "<?= base_url('Master/Dropdown/')?>";
var master_baseurl 	= "<?= base_url('Master/Master/')?>";
var satker_session = "<?= $this->session->userdata("kdsatker")?>"
var user_session = "<?= $this->session->userdata("user_id")?>"
var role_session = "<?= $this->session->userdata("role_id")?>"
var unit_session = "<?= $this->session->userdata("unit_id")?>"
var id_st_session = "<?=$this->uri->segment('4')?>";
var status_cs = "<?= $ubah[0]['status_cs'] ?>"
var status_penandatangan = "<?= $ubah[0]['status_penandatangan'] ?>"
if(role_session == 1){
  unit_session = 0;
}

var status_st = "<?= $ubah[0]['status_id'] ?>"

if(document.getElementById('counting') != null){
  var countingDiv = document.getElementById('counting');
  var countTimTable = countingDiv.getElementsByClassName('namaTimHardcode').length;
}else{
  
  var countTimTable = 0
}

$( document ).ready(function() {

  if(status_cs == 3){
      document.getElementById('plh_cs').checked = true;
    }

  if(status_penandatangan == 3){
    document.getElementById('plh').checked = true;
  }
  
 
    var relasii = $('#realisasi').val()
    var alokasii = $('#alokasi').val()
    var tahapan = $('#kdtahapan').val()
    var app = $('#kdapp').val()
    var kdindex = $('#kdindex').val()

    $.ajax({
      url : master_baseurl + "getRealisasi",
      data: {kdindex: kdindex, tahapan : tahapan, app: app},
      type: "post",
      dataType: "JSON",
      success: function(data)
          {    
            var sisaan = Number(alokasii) - Number(data[0]['re'])
            $('#sisalabel').val(formatRupiah(""+sisaan+""))
            $('#sisa').val(sisaan)
          }
        });
    
    
    
});

function PilihKode_pagu(Id, kdindex){

$.ajax({
      url : master_baseurl + "getKomponenSub_pagu",
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
            $('#ppk_id').val(data[0]['ppk_id']);
            $('#alokasi').val(data[0]['rupiah']);
            $('#ppk_id').val(data[0]['ppk_id']);
            $('#bebananggaran').val(data[0]['nama_unit']);
            $('#alokasilabel').val(formatRupiah(data[0]['rupiah']));
            var rupiah_tahapan = data[0]['rupiah']

            $.ajax({
                url : master_baseurl + "getRealisasi",
                data: {kdindex: data[0]['kdindex'], Trigger : "Pagu"},
                type: "post",
                dataType: "JSON",
                success: function(data)
                    {    
                      var sisaan = Number(rupiah_tahapan) - Number(data[0]['re'])
                      $('#sisalabel').val(formatRupiah(""+sisaan+""))
                      $('#sisa').val(sisaan)
                    }
                  })

                $('#modalidx').modal('close');
                

              }
  });
}

function PilihKode(Id, kdindex, Tahapan, App){

  var relasii = $('#realisasi').val()
    var alokasii = $('#alokasi').val()

    $.ajax({
          url : master_baseurl + "getKomponenSub",
          data: {kdindex: kdindex, tahapan : Tahapan, app: App, Trigger : ""},
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
                $('#alokasi').val(data[0]['rupiah_tahapan']);
                $('#kdapp').val(data[0]['id_app']);
                $('#kdtahapan').val(data[0]['id_tahapan']);
                $('#bebananggaran').val(data[0]['nama_unit']);
                $('#alokasilabel').val(formatRupiah(data[0]['rupiah_tahapan']));

                var rupiah_tahapan = data[0]['rupiah_tahapan']

                $.ajax({
                url : master_baseurl + "getRealisasi",
                data: {kdindex: data[0]['kdindex'], tahapan : data[0]['id_tahapan'], app: data[0]['id_app']},
                type: "post",
                dataType: "JSON",
                success: function(data)
                    {    
                      var sisaan = Number(rupiah_tahapan) - Number(data[0]['re'])
                      $('#sisalabel').val(formatRupiah(""+sisaan+""))
                      $('#sisa').val(sisaan)
                    }
                  })

                $('#modalidx').modal('close');
                

              }
      });

    
}

// var countTimTable = "<?= count($ubah)?>"

//VARIABLE UPDATE//
var BAvalue = "<?= $ubah[0]['id_unit'] ?>"
var VAtext = "<?= $ubah[0]['nama_unit'] ?>"

var TTDvalue = "<?= $ubah[0]['id_ttd'] ?>"
var TTDtext = "<?= $ubah[0]['nama_ttd'] ?>"

var TTDmenyetujuivalue = "<?= $ubah[0]['cs_menyetujui'] ?>"
var textmenyetujui = "<?= $ubah[0]['cs_menyetujui'] ?>"

var TTDmenyetujuitext = textmenyetujui.split("-")

var TTDmengajukanvalue = "<?= $ubah[0]['cs_mengajukan'] ?>"
var textmengajukan = "<?= $ubah[0]['cs_mengajukan'] ?>"

var TTDmengajukantext = textmengajukan.split("-")



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


var $menyetujui = $("<option selected='selected'></option>").val(TTDmenyetujuivalue).text(TTDmenyetujuitext[2])
$("#cs_menyetujui").append($menyetujui).trigger('change');

var $mengajukan = $("<option selected='selected'></option>").val(TTDmengajukanvalue).text(TTDmengajukantext[2])
$("#cs_mengajukan").append($mengajukan).trigger('change');





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


$( "#plh" ).change(function() {

$('#ttd').val(null).trigger('change');

    // Get the checkbox
var plh = document.getElementById("plh");
// Get the output text
var status_penandatangan = document.getElementById("status_penandatangan");

// If the checkbox is checked, display the output text
if (plh.checked == true){
  $('#status_penandatangan').val(3)
} else {
  $('#status_penandatangan').val(0)
}

});

$( "#plh_cs" ).change(function() {

$('#cs_menyetujui').val(null).trigger('change');

    // Get the checkbox
var plh_cs = document.getElementById("plh_cs");
// Get the output text
var status_cs = document.getElementById("status_penandatangan_cs");

// If the checkbox is checked, display the output text
if (plh_cs.checked == true){
  $('#status_penandatangan_cs').val(3)
} else {
  $('#status_penandatangan_cs').val(0)
}

});


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

function getInap(gol,keljab,kdakun){
  if(kdakun == "524111"){
      if(keljab == "E.I"){
            res ="inap_es1"
            }else if(keljab == "E.II"){
              res = "inap_es2"
            }else if(keljab == "E.III"){
              res = "inap_es3_gol4"
            }else{
              res = "inap_es4_gol321"
            }

      }else if(kdakun == "524119" || kdakun == "524114" ){
          if(keljab == "E.I" || keljab == "E.II"){
            res ="fb_es1_es2"
            }else{
              res = "fb_es3_dst"
            }

      }else if(kdakun == "524113"){
        res ="fb_es1_es2"

      }
      return res;
  
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

        if(angka < 0){
          return 'Rp. -' + rupiah;
        }else{
          return 'Rp. ' + rupiah;
        }
        
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

$("#cs_mengajukan").select2({
                    width: '100%',
                    placeholder: "Pilih Penandatangan",
                  ajax: { 
                    url: dropdown_baseurl + 'cs_ttd',
                    type: "post",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                          Trigger: "mengusulkan",
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

$("#cs_menyetujui").select2({
      width: '100%',
      placeholder: "Pilih Penandatangan",
    ajax: { 
      url: dropdown_baseurl + 'cs_ttd',
      type: "post",
      dataType: 'json',
      delay: 250,
      data: function (params) {
          return {
            Trigger: "menyetujui",
            kdsatker: satker_session,
            status_ttd : $('#status_penandatangan_cs').val(),
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

$(".kotaselect").select2({
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
              searchTerm: params.term
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





function ubahNama(id){
  $("#namaDummy"+id+"").select2({
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
                
                searchTerm: params.term,
                Trigger: "select_forTim",
                tglberangkat: $('#tglberangkat'+id+'').val(),
                tglkembali: $('#tglkembali'+id+'').val() // search term
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


$('#namaDummy'+id+'').on('change', function() {

     

        //var id =  $(this).attr("name")
        var res = id

        var nip = this.value

        var val = nip.split(";")
        tglberangkat = $('#tglberangkat'+res+'').val()
        tglkembali = $('#tglkembali'+res+'').val()
        

        $('#nip'+res+'').html(val[0])
         $('#nip'+res+'').val(val[0])

         

$('#perjablabel'+res+'').html(val[1])
$('#perjab'+res+'').val(val[1])

$('#nama'+res+'').html(val[2])
$('#nama'+res+'').val(val[2])

$('#gol'+res+'').html(val[3])
$('#gol'+res+'').val(val[3])

$('#keljab'+res+'').html(val[4])
$('#keljab'+res+'').val(val[4])

nipVal = $('#nip'+res+'').val()
namaVal = $('#nama'+res+'').val()

$.ajax({
              url : dropdown_baseurl + 'pegawai',
              data: {
                Trigger: "select_forTim_count",
                tglberangkat: tglberangkat,
                tglkembali: tglkembali,
                nip: nipVal,
                nama: namaVal},
              type: "post",
              dataType: "JSON",
              success: function(data)
                  { 
                    if(data.length > 0){
                      swal({
                      title:"Bentrok Tanggal!",
                      text: "Pastikan ST Pegawai Tidak Bentrok !", 
                      icon: "warning",
                      timer: 2000
                      })

                      document.getElementById("UbahST").disabled  =true;
                      tr = document.getElementById("tb-tim"+res+"")
                      tr.style.backgroundColor = "yellow";
                      $('#nama'+res+'').val("BENTROK") 
                      return false;
                }else{
                      document.getElementById("UbahST").disabled  =false;
                      tr = document.getElementById("tb-tim"+res+"")
                      $('#nama'+res+'').val(val[2]) 
                      tr.style.backgroundColor = "rgba(242,242,242,.5)"; 

                      

                    }

                  }
                });


});
}

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
                status_ttd : $('#status_penandatangan').val(),
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


     $(".ttd_spd").select2({
          width: '100%',
          placeholder: "Pilih Penandatangan",
         ajax: { 
           url: dropdown_baseurl + 'ttd',
           type: "post",
           dataType: 'json',
           delay: 250,
           data: function (params) {
              return {
								Trigger: "ttd_spd_forST",
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
                        
                       

                        // $('.table-remove').click(function() {
                        //     $(this).parents('tr').detach();
                        //     x--;
                        //         if(x <=a ){
                        //             x=countTimTable;
                                
                        //         }

                        //         var nm =  $(this).attr("id")
                        //         var d = removeItemAll(arrX, parseInt(nm))
                        //         $('#ArrX').val(d)
                                
                            
                        // });

                        // $('#ArrX').val(arrX)
                        //console.log(arrX)
            }
            
        });

        $('.table-remove').click(function() {
                            $(this).parents('tbody').detach();
                            x--;
                                if(x <=a ){
                                    x=countTimTable;
                                
                                }

                                var nm =  $(this).attr("id")
                                var d = removeItemAll(arrX, parseInt(nm))
                                $('#ArrX').val(d)
                                
                            
                        });

                        $('#ArrX').val(arrX)
        
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

    if($("#kotaasal"+i+"").val() != null || $("#kotatujuan"+i+"").val() != null){
    var valasal = $("#kotaasal"+i+"").val()
    var kotaasal_split = valasal.split("-")
    var asal = kotaasal_split[1]
    var kotaasal_id = kotaasal_split[0]
    var nama_kotaasal_id = kotaasal_split[2]

    var valtujuan = $("#kotatujuan"+i+"").val()
    var kotatujuan_split = valtujuan.split("-")
    var tujuan = kotatujuan_split[1]
    var kotatujuan_id = kotatujuan_split[0]
    var nama_kotatujuan_id = kotatujuan_split[2]
  }
  var kdakun = $('#kdakun').val();
  var gol = $('#gol'+i+'').val();
  var keljab = $('#keljab'+i+'').val();

    $.ajax({
        url : master_baseurl + "Master_Uangharian",
        data: {"Tujuan": tujuan, "Trigger": "NotaDinas"},
        type: "post",
        dataType: "JSON",
        success: function(data)
            {    
              

              if(kdakun == "524111"){
                tarif = data[0]['luar_kota']
                //maxinap = data[0][''+getInap(gol,keljab,kdakun)+''];
                
              }else if(kdakun == "524113"){
                tarif = data[0]['dalam_kota_8_jam']
                //maxinap = data[0][''+getInap(gol,keljab,kdakun)+''];

              }else if(kdakun == "524119"){
                tarif = data[0]['fb_luarkota']
                //maxinap = data[0][''+getInap(gol,keljab,kdakun)+''];

              }else if(kdakun == "524114"){
                tarif = data[0]['fb_dalamkota']
                //maxinap = data[0][''+getInap(gol,keljab,kdakun)+''];

              }

              if(Number(uangharian) > Number(tarif)){
                  swal({
                        title:"Uang Harian  Melebihi Batas Maksimal", 
                        icon:"warning",
                        timer: 2000
                        })
                    document.getElementById("UbahST").disabled  =true;
                }else{
                    document.getElementById("UbahST").disabled  =false;
                }
                return false;
            }
          });
var  jmlhari = $('#jmlhari'+i+'').val()
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
var gol = $('#gol'+id+'').val();



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
                //maxinap = data[0][''+getInap(gol,keljab,kdakun)+''];
                
              }else if(kdakun == "524113"){
                tarif = data[0]['dalam_kota_8_jam']
                rep = getRep(keljab, "D")
                //maxinap = data[0][''+getInap(gol,keljab,kdakun)+''];;

              }else if(kdakun == "524119"){
                tarif = data[0]['fb_luarkota']
                rep = getRep(keljab, "L")
                //maxinap = data[0][''+getInap(gol,keljab,kdakun)+''];

              }else if(kdakun == "524114"){
                tarif = data[0]['fb_dalamkota']
                rep = getRep(keljab, "D")
                //maxinap = data[0][''+getInap(gol,keljab,kdakun)+''];

              }

                $("#tarifuangharian"+id+"").val(tarif)
                //$("#tarifuangpenginapan"+id+"").val(maxinap)

              if ( ($("#tglberangkat"+id+"").val() != "") && ($("#tglkembali"+id+"").val() != "")) {
              var oneDay = 24*60*60*1000; // hours*minutes*seconds*milliseconds
              var firstDate = new Date($("#tglberangkat"+id+"").val());
              var secondDate = new Date($("#tglkembali"+id+"").val());
              var diffDays = ((secondDate.getTime() - firstDate.getTime()) / (oneDay) )+ 1;
              $("#jmlhari"+id+"").val(diffDays);

              var totalUangHarian = ''+((diffDays) * tarif)
              $("#satuan_uangharian"+id+"").val(formatRupiah(tarif));
              $("#uangharian"+id+"").val(formatRupiah(totalUangHarian));
              $("#uangharianDum"+id+"").val(totalUangHarian);

              var totalUangPenginapan = ''+((diffDays-1) * 0)
              $("#satuan_uangpenginapan"+id+"").val(formatRupiah("0"));
              $("#uangpenginapan"+id+"").val(formatRupiah(totalUangPenginapan));
              $("#uangpenginapanDum"+id+"").val(totalUangPenginapan);


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

  var harian = $("#satuan_uangharian"+id+"").val()
    var inap = $("#satuan_uangpenginapan"+id+"").val()
    var taxi = $("#uangtaxi"+id+"").val()
    var laut = $("#uanglaut"+id+"").val()
    var udara = $("#uangudara"+id+"").val()
    var darat = $("#uangdarat"+id+"").val()
    var dll = $("#uangdll"+id+"").val()
    var rep = $("#uangrep"+id+"").val()

    var T_harian = $("#uangharian"+id+"").val()
    var T_inap = $("#uangpenginapan"+id+"").val()

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
var gol = $('#gol'+id+'').val();

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
                //maxinap = data[0][''+getInap(gol,keljab,kdakun)+''];
                
              }else if(kdakun == "524113"){
                tarif = data[0]['dalam_kota_8_jam']
                rep = getRep(keljab, "D")
                //maxinap = data[0][''+getInap(gol,keljab,kdakun)+''];;

              }else if(kdakun == "524119"){
                tarif = data[0]['fb_luarkota']
                rep = getRep(keljab, "L")
                //maxinap = data[0][''+getInap(gol,keljab,kdakun)+''];

              }else if(kdakun == "524114"){
                tarif = data[0]['fb_dalamkota']
                rep = getRep(keljab, "D")
                //maxinap = data[0][''+getInap(gol,keljab,kdakun)+''];

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
                $("#satuan_uangharian"+id+"").val(formatRupiah(tarif));
                $("#uangharian"+id+"").val(formatRupiah(totalUangHarian));
                $("#uangharianDum"+id+"").val(totalUangHarian);

                var totalUangPenginapan = ''+((diffDays-1) * 0)
                $("#satuan_uangpenginapan"+id+"").val(formatRupiah("0"));
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


$("#UbahST").click(function (e) {
  e.preventDefault();

  var btn = $(this);
  var form = $(this).closest("form");
  var formData = new FormData($("#FormST")[0]);
  var IdForm =  "FormST";

  ttdVal = $('#ttd').val()
  cs_menyetujui = $('#cs_menyetujui').val()
  cs_mengajukan = $('#cs_mengajukan').val()
  if(ttdVal == "" || cs_menyetujui == "" || cs_mengajukan == ""){
    swal({
          title:"Penandatangan Masih Kosong",
          text: "Pastikan Field Terisi Semua", 
          icon: "warning",
          timer: 2000
          })
          return false;
  }


  if(document.getElementById('counting') != null){
  var countingDiv = document.getElementById('counting');
  var countTim = countingDiv.getElementsByClassName('namaTimHardcode').length;
  ArrX = $('#ArrX').val()

j = ArrX.split(",")
for($loop = 0 ; $loop < countTim; $loop++){
  cekBentrok = $('#nama'+j[$loop]+'').val()

  if(cekBentrok == "BENTROK"){
    swal({
          title:"Bentrok Tanggal!",
          text: "Pastikan ST Pegawai Tidak Bentrok !", 
          icon: "warning",
          timer: 2000
          })
          return false;

  }
}
}else{
  
  var countTim = 0
}





  btn
    .addClass("kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light")
    .attr("disabled", true);

    if(status_st == 3){
      formData.append('spj_ttd', TTDvalue)
      formData.append('spj_menyetujui', TTDmenyetujuivalue)
      formData.append('spj_mengajukan', TTDmengajukanvalue)
    }
  formData.append('status_id', status_st)
  formData.append('Trigger', 'U')
  formData.append('countTim', countTim)
  formData.append('id_st', id_st_session)

  $.ajax({
    type: "POST",
    data: formData,
    url: baseurl + "Action",
    processData: false,
    contentType: false,
    success: function (data, textStatus, jqXHR) {
              show_msg(textStatus);
              //Reset(IdForm);
              // if(satker_session != "a"){
              // window.history.back();
              // }
              
              
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

</script>
