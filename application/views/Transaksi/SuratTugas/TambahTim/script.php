

<script>


var baseurl 	= "<?= base_url('Transaksi/TambahTim/')?>";
var dropdown_baseurl 	= "<?= base_url('Master/Dropdown/')?>";
var master_baseurl 	= "<?= base_url('Master/Master/')?>";
var satker_session = "<?= $this->session->userdata("kdsatker")?>"
var user_session = "<?= $this->session->userdata("user_id")?>"
var role_session = "<?= $this->session->userdata("role_id")?>"
var unit_session = "<?= $this->session->userdata("unit_id")?>"
var status_cs = "<?= $ST[0]['status_cs'] ?>"
var count_tim = "<?= count($countST) ?>"
$sumtotal = 0;

if(role_session == 1){
  unit_session = 0;
}

var TTDmenyetujuivalue = "<?= $ST[0]['cs_menyetujui'] ?>"
var textmenyetujui = "<?= $ST[0]['cs_menyetujui'] ?>"

var TTDmenyetujuitext = textmenyetujui.split("-")

var TTDmengajukanvalue = "<?= $ST[0]['cs_mengajukan'] ?>"
var textmengajukan = "<?= $ST[0]['cs_mengajukan'] ?>"

var TTDmengajukantext = textmengajukan.split("-")

var $menyetujui = $("<option selected='selected'></option>").val(TTDmenyetujuivalue).text(TTDmenyetujuitext[2])
$("#cs_menyetujui").append($menyetujui).trigger('change');

var $mengajukan = $("<option selected='selected'></option>").val(TTDmengajukanvalue).text(TTDmengajukantext[2])
$("#cs_mengajukan").append($mengajukan).trigger('change');

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

function Template(){

  $.ajax({
    url : master_baseurl + "getKota",
    data: {"kdkabkota": $('#kdkabkota').val(),"kdlokasi": $('#kdlokasi').val(), Trigger :"default"},
    type: "post",
    dataType: "JSON",
    success: function(data)
        { 
          var kdakun = $('#kdakun').val()

          var $asal = $("<option selected='selected'></option>").val(data[0]['idkota']).text(data[0]['valkota'])
              $("#kotaasaTemplate").append($asal).trigger('change');

              if(kdakun == "524113" || kdakun == "524114"){
          var $tujuan = $("<option selected='selected'></option>").val(data[0]['idkota']).text(data[0]['valkota'])
              $("#KotatujuanTemplate").append($tujuan).trigger('change');

              }

          document.getElementById("FormTemplate").style.display = "";
        }
      });


}

$("#SubmitTemplate").click(function (e) {
  e.preventDefault();

  var btn = $(this);
  var form = $(this).closest("form");
  var formData = new FormData($("#FormTemplate")[0]);
  var IdForm =  "FormTemplate";
  btn
    .addClass("kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light")
    .attr("disabled", false);

  formData.append('user_id', user_session)
  // formData.append('countTim', countTim)

  $.ajax({
    type: "POST",
    data: formData,
    url: baseurl + "Template",
    processData: false,
    contentType: false,
    success: function (data, textStatus, jqXHR) {              
              
          },
          error: function (jqXHR, textStatus, errorThrown) { },
      });
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
  function Upload(){
        $('#file_').click();
    }

    $('#file_').on('change', function () {
    var file = this.files[0];
    if (file) {
        $('#shad_file').val(file.name);
    }
});


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

  $(document).ready(function() { 
    
    if(status_cs == 3){
      document.getElementById('plh').checked = true;
    }

    tglmulai = $('#tglst_mulai').val()
    tglselesai = $('#tglst_selesai').val()

    $(".tglberangkat").val(tglmulai)
    $(".tglkembali").val(tglselesai)


    $.ajax({
    url : master_baseurl + "getKota",
    data: {"kdkabkota": $('#kdkabkota').val(),"kdlokasi": $('#kdlokasi').val(), Trigger :"default"},
    type: "post",
    dataType: "JSON",
    success: function(data)
        { 
          var kdakun = $('#kdakun').val()
          var $asal = $("<option selected='selected'></option>").val(data[0]['idkota']).text(data[0]['valkota'])
	            $("#kotaasal").append($asal).trigger('change');

          if(kdakun == "524113" || kdakun == "524114"){
            var $tujuan = $("<option selected='selected'></option>").val(data[0]['idkota']).text(data[0]['valkota'])
	            $("#kotatujuan").append($tujuan).trigger('change');

          }
        }
      });

  });



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

$( "#plh" ).change(function() {

$('#cs_menyetujui').val(null).trigger('change');

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
                searchTerm: params.term,
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

function selectRefresh(x){


              $.ajax({
              url : master_baseurl + "getKota",
              data: {"kdkabkota": $('#kdkabkota').val(),"kdlokasi": $('#kdlokasi').val(), Trigger :"default"},
              type: "post",
              dataType: "JSON",
              success: function(data)
                  { 
                    var kdakun = $('#kdakun').val()

                    var $asal = $("<option selected='selected'></option>").val(data[0]['idkota']).text(data[0]['valkota'])
                        $("#kotaasal"+x+"").append($asal).trigger('change');

                        if(kdakun == "524113" || kdakun == "524114"){
                    var $tujuan = $("<option selected='selected'></option>").val(data[0]['idkota']).text(data[0]['valkota'])
                        $(".kotatujuan").append($tujuan).trigger('change');

                        }
                  }
                });

                $("#ttd_spd"+x+"").select2({
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
                searchTerm: params.term,
                session_satker: satker_session,
                // Trigger: "select_forTim",
                // tglberangkat: $('#tglberangkat'+x+'').val(),
                // tglkembali: $('#tglkembali'+x+'').val() // search term
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


    $('#namaDummy'+x+'').on('change', function() {
      tglberangkat = $('#tglberangkat'+x+'').val()
      tglkembali = $('#tglkembali'+x+'').val()

        //var id =  $(this).attr("name")
        var res = x

        var nip = this.value

        var val = nip.split(";")
        

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

                      document.getElementById("TambahTim").disabled  =true;
                      tr = document.getElementById("tb-tim"+x+"")
                      tr.style.backgroundColor = "yellow";
                      $('#nama'+res+'').val("BENTROK") 
                      return false;
                }else{
                      document.getElementById("TambahTim").disabled  =false;
                      $('#nama'+res+'').val(val[2]) 
                      tr = document.getElementById("tb-tim"+x+"")
                      tr.style.backgroundColor = "rgba(242,242,242,.5)"; 

                      

                    }

                  }
                });


    });

    var idkota_asal = $('#kotaasal'+x+'').val()
    var idkota_tujuan = $('#kotatujuan'+x+'').val()

     
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

}


$('.multi-field-wrapper').each(function() {
        var max      = 20;
        var $wrapper = $('.multi-fields', this);
        var x = 0;
        if(count_tim > 0){
          var x = count_tim;
        }
        
        var i = 0;
        var head = '<tbody id="Tbody" class="multi-field" style="border-top: 2px dotted #c5c5c4;">';
        var end='</tbody>';
        var arrX = [];
        var realisasi = 0;
        tglmulai = $('#tglst_mulai').val()
          tglselesai = $('#tglst_selesai').val()

        
        $("#add-field", $(this)).click(function(e) {   

          document.getElementById("divTable").style.display = "";      

          
           if(x < max){
              x++;
              i++;
              var minDate = $('#tglst_mulai').val()
              var maxDate = $('#tglst_selesai').val()
              $($wrapper).append( head +'<tr class="tb-tim" id="tb-tim'+x+'">\
                            <td style="min-width: 15px" ><input  class="urut" type="number" id="urut'+x+'" name="urut'+x+'" min="1" max="20" value="'+x+'"></td>\
                            <td><input type="date" class="tglberangkat" value="'+tglmulai+'" min="'+minDate+'" max="'+maxDate+'" onchange="dayCount(\''+x+'\',\'D\')" id="tglberangkat'+x+'" name="tglberangkat'+x+'"></td>\
                              <td><input type="date" class="tglkembali" value="'+tglselesai+'" max="'+maxDate+'" min="'+minDate+'" onchange="dayCount('+x+')" id="tglkembali'+x+'" name="tglkembali'+x+'"></td>\
                              <td><input type="text" id="jmlhari'+x+'" name="jmlhari'+x+'" readonly></td>\
                               <td id="Tim" name="Tim" colspan="2">\
                               <select placeholder="Nama.."  class="namaTim browser-default" id="namaDummy'+x+'" name="namaDummy'+x+'"></select>\
                               <input name="nama'+x+'" id="nama'+x+'" hidden>\
                            </td>\
                            <td colspan="2">\
                                <input placeholder="NIP" class="nip" id="nip'+x+'" name="nip'+x+'" readonly>\
                            </td>\
                            <td colspan="2">\
                                <textarea placeholder="Peran/Jabatan" class="perjab" id="perjab'+x+'" name="perjab'+x+'"></textarea>\
                            </td>\
                              <td><input type="text" id="gol'+x+'" name="gol'+x+'" readonly><input type="text" id="keljab'+x+'" name="keljab'+x+'" readonly hidden></td>\
                              <td colspan="2"><select class="browser-default kota kotaasal" name="kotaasal'+x+'" id="kotaasal'+x+'" onchange="cityCount('+x+')"></select></td>\
                              <td colspan="3"><select class="browser-default kota kotatujuan"  name="kotatujuan'+x+'" id="kotatujuan'+x+'" onchange="cityCount('+x+')"></select></td>\
                              <td hidden><input type="text" id="tarifuangpenginapan'+x+'" name="tarifuangpenginapan'+x+'"></td>\
                              <td hidden><input type="text" id="tarifuangharian'+x+'" name="tarifuangharian'+x+'" ></td>\
                            </tr>\
                              <tr>\
                                   <td></td>\
                                   <td><input type="text" id="nospd'+x+'" name="nospd'+x+'" value="SPD - 0000" readonly></td>\
                                  <td><input style="min-width: 150px" type="text" id="satuan_uangharian'+x+'" name="satuan_uangharian'+x+'" onkeyup="AllCount(\''+x+'\',\'satuan\')"></td>\
                                  <td><input style="min-width: 150px" type="text" id="uangharian'+x+'" name="uangharian'+x+'" onkeyup="AllCount(\''+x+'\',\'total\')"></td>\
                                  <td><input style="min-width: 150px" type="text" id="satuan_uangpenginapan'+x+'" name="satuan_uangpenginapan'+x+'" onkeyup="AllCount(\''+x+'\',\'satuan\')"></td>\
                                  <td><input style="min-width: 150px" type="text" id="uangpenginapan'+x+'" name="uangpenginapan'+x+'" readonly></td>\
                                  <td><input style="min-width: 150px" type="text" id="uangtaxi'+x+'" name="uangtaxi'+x+'" onkeyup="AllCount(\''+x+'\',\'all\')"></td>\
                                  <td><input style="min-width: 150px" type="text" id="uanglaut'+x+'" name="uanglaut'+x+'" onkeyup="AllCount(\''+x+'\',\'all\')"></td>\
                                  <td><input style="min-width: 150px" type="text" id="uangudara'+x+'" name="uangudara'+x+'" onkeyup="AllCount(\''+x+'\',\'all\')"></td>\
                                  <td><input style="min-width: 150px" type="text" id="uangdarat'+x+'" name="uangdarat'+x+'" onkeyup="AllCount(\''+x+'\',\'all\')"></td>\
                                  <td><input style="min-width: 150px" type="text" id="uangdll'+x+'" name="uangdll'+x+'" onkeyup="AllCount(\''+x+'\',\'all\')"></td>\
                                  <td><input style="min-width: 150px" type="text" id="uangrep'+x+'" name="uangrep'+x+'" onkeyup="AllCount(\''+x+'\',\'all\')"></td>\
                                  <td><input style="min-width: 150px" type="text" class="total" readonly id="total'+x+'"  name="total'+x+'" ></td>\
                                  <td ><select class="select2 browser-default" id="jnstransportasi'+x+'" name="jnstransportasi'+x+'">\
                                    <option value="Kendaraan Umum">Kendaraan Umum</option>\
                                    <option value="Kendaraan Dinas">Kendaraan Dinas</option>\
                                  </select</td>\
                                  <td><select class="select2 browser-default" id="ttd_spd'+x+'" name="ttd_spd'+x+'">\
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
                                  if(count_tim > 0){
                                    x = count_tim;
                                  }

                                  }else if(count_tim == x){
                                    x = x
                                
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
                maxinap = data[0][''+getInap(gol,keljab,kdakun)+''];
                
              }else if(kdakun == "524113"){
                tarif = data[0]['dalam_kota_8_jam']
                // maxinap = data[0][''+getInap(gol,keljab,kdakun)+''];
                

              }else if(kdakun == "524119"){
                tarif = data[0]['fb_luarkota']
                // maxinap = data[0][''+getInap(gol,keljab,kdakun)+''];

              }else if(kdakun == "524114"){
                tarif = data[0]['fb_dalamkota']
                // maxinap = data[0][''+getInap(gol,keljab,kdakun)+''];

              }

              if(Number(uangharian) > Number(tarif)){
                  swal({
                        title:"Uang Harian Melebihi Batas Maksimal", 
                        icon:"warning",
                        timer: 2000
                        })
                    document.getElementById("TambahTim").disabled  =true;
                }else{
                    document.getElementById("TambahTim").disabled  =false;
                }
                return false;
            }
          });

    

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
    $sumtotal += Number(total);
                $('#realisasi').val($sumtotal);
    alokasi = $('#alokasi').val()
    sisa = Number(alokasi) - Number($sumtotal)
                $('#sisa').val(sisa);
  

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

  }else if(id == "99999"){
    var valtujuan = $("#kotatujuan").val()
    var Texttujuan = $( "#kotatujuan option:selected" ).text();

    var kotatujuan_split = valtujuan.split("-")
    var tujuan = kotatujuan_split[1]
    var kotatujuan_id = kotatujuan_split[0]
    var nama_kotatujuan_id = kotatujuan_split[2]
    var $tujuan = $("<option selected='selected'></option>").val(valtujuan).text(Texttujuan)
	      $(".kotatujuan").append($tujuan).trigger('change');

  }else{


    if($("#kotatujuan"+id+"").val() != null){
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
        }else{
        return false;
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
                maxinap = data[0][''+getInap(gol,keljab,kdakun)+''];
                
              }else if(kdakun == "524113"){
                tarif = data[0]['dalam_kota_8_jam']
                rep = getRep(keljab, "D")
                maxinap = "0"

              }else if(kdakun == "524119"){
                tarif = data[0]['fb_luarkota']
                rep = getRep(keljab, "L")
                maxinap = "0"

              }else if(kdakun == "524114"){
                tarif = data[0]['fb_dalamkota']
                rep = getRep(keljab, "D")
                maxinap = "0"

              }

                $("#tarifuangharian"+id+"").val(tarif)
                // $("#tarifuangpenginapan"+id+"").val(maxinap)

                if ( ($("#tglberangkat"+id+"").val() != "") && ($("#tglkembali"+id+"").val() != "")) {
                var oneDay = 24*60*60*1000; // hours*minutes*seconds*milliseconds
                var firstDate = new Date($("#tglberangkat"+id+"").val());
                var secondDate = new Date($("#tglkembali"+id+"").val());
                var diffDays = ((secondDate.getTime() - firstDate.getTime()) / (oneDay) )+ 1;
                $("#jmlhari"+id+"").val(diffDays);

                if(kdakun == "523113"){
                  
                DefaultTransport = Number(diffDays) * Number(150000)
                
                $('#uangdarat'+id+'').val(formatRupiah(''+DefaultTransport))
                }

                var totalUangHarian = ''+(diffDays * tarif)
                $("#satuan_uangharian"+id+"").val(formatRupiah(tarif));
                $("#uangharian"+id+"").val(formatRupiah(totalUangHarian));
                $("#uangharianDum"+id+"").val(totalUangHarian);

                var totalUangPenginapan = ''+((diffDays-1) * maxinap)
                $("#satuan_uangpenginapan"+id+"").val(formatRupiah(maxinap));
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
                $sumtotal += Number(total);
                $('#realisasi').val($sumtotal);

                alokasi = $('#alokasi').val()
                sisa = Number(alokasi) - Number($sumtotal)
                $('#sisa').val(sisa);

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
                maxinap = data[0][''+getInap(gol,keljab,kdakun)+''];
                
              }else if(kdakun == "524113"){
                tarif = data[0]['dalam_kota_8_jam']
                rep = getRep(keljab, "D")
                maxinap = "0"

              }else if(kdakun == "524119"){
                tarif = data[0]['fb_luarkota']
                rep = getRep(keljab, "L")
                maxinap = "0"

              }else if(kdakun == "524114"){
                tarif = data[0]['fb_dalamkota']
                rep = getRep(keljab, "D")
                maxinap = "0"

              }

              

                if ( ($("#tglberangkat"+id+"").val() != "") && ($("#tglkembali"+id+"").val() != "")) {
                var oneDay = 24*60*60*1000; // hours*minutes*seconds*milliseconds
                var firstDate = new Date($("#tglberangkat"+id+"").val());
                var secondDate = new Date($("#tglkembali"+id+"").val());
                var diffDays = ((secondDate.getTime() - firstDate.getTime()) / (oneDay)) + 1;
                $("#jmlhari"+id+"").val(diffDays);

                if(kdakun == "523113"){
                  
                  DefaultTransport = Number(diffDays) * Number(150000)
                  
                  $('#uangdarat'+id+'').val(formatRupiah(''+DefaultTransport))
                  }

                // var kotatujuan = $("#kotatujuan"+id+"").val()
                // var kotatujuan_split = kotatujuan.split("-")

                // var tarif = kotatujuan_split[0]

                var totalUangHarian = ''+(diffDays * tarif)
                $("#satuan_uangharian"+id+"").val(formatRupiah(tarif));
                $("#uangharian"+id+"").val(formatRupiah(totalUangHarian));
                $("#uangharianDum"+id+"").val(totalUangHarian);

                var totalUangPenginapan = ''+((diffDays-1) * maxinap)
                $("#satuan_uangpenginapan"+id+"").val(formatRupiah(maxinap));
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
                $sumtotal += Number(total);
                $('#realisasi').val($sumtotal);

                alokasi = $('#alokasi').val()
                sisa = Number(alokasi) - Number($sumtotal)
                $('#sisa').val(sisa);

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


$("#TambahTim").click(function (e) {
  e.preventDefault();

  if($('.namaTim').val() == null){

    swal({
                title:"Tim belum ada!",
                icon: "warning",
                timer: 2000
                })
                return false;

  }



  var btn = $(this);
  var form = $(this).closest("form");
  var formData = new FormData($("#FormTim")[0]);
  //var IdForm =  "FormTim";
  var countingDiv = document.getElementById('counting');
  var countTim = countingDiv.getElementsByClassName('namaTim').length;

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

  btn
    .addClass("kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light")
    .attr("disabled", false);

  formData.append('Trigger', 'C')
  formData.append('countTim', countTim)
  // formData.append('jumlah_realisasi', sumRealisasi)

  $.ajax({
    type: "POST",
    data: formData,
    url: baseurl + "Action",
    processData: false,
    contentType: false,
    success: function (data, textStatus, jqXHR) {
              show_msg(textStatus);
              //Reset(IdForm);
              if(satker_session != "a"){
              window.history.back();
              }
              
              
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
