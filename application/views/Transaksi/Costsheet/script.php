<script>

var baseurl 	= "<?= base_url('Transaksi/TambahTim/')?>";
var baseurl_export 	= "<?= base_url('Transaksi/NotaDinas/')?>";
var dropdown_baseurl 	= "<?= base_url('Master/Dropdown/')?>";
var master_baseurl 	= "<?= base_url('Master/Master/')?>";
var satker_session = "<?= $this->session->userdata("kdsatker")?>"
var user_session = "<?= $this->session->userdata("user_id")?>"
var role_session = "<?= $this->session->userdata("role_id")?>"
var unit_session = "<?= $this->session->userdata("unit_id")?>"
var count_tim = "<?= count($countST) ?>"
var countJSON = "<?= $countdata ?>"
var valTujuan = "<?= $countdata ?>"
if(role_session == 1){
  unit_session = 0;
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
        return 'Rp. ' + rupiah;
      }

      $(document).ready(function() { 

        var min_date = $('#tglst_mulai').val()
        var max_date = $('#tglst_selesai').val()
        $(".tglberangkat").val(min_date)
        $(".tglkembali").val(max_date)

        document.getElementsByClassName('tglberangkat')[0].setAttribute("min", min_date)
        document.getElementsByClassName('tglberangkat')[0].setAttribute("max", max_date)

        document.getElementsByClassName('tglkembali')[0].setAttribute("min", min_date)
        document.getElementsByClassName('tglkembali')[0].setAttribute("max", max_date)
        var b= 1

        for(a = 0; a < countJSON; a++){
            Kotatujuan(b)
            b++
          }

      $.ajax({
      url : master_baseurl + "getKota",
      data: {"kdkabkota": $('#kdkabkota').val(),"kdlokasi": $('#kdlokasi').val(), Trigger :"default"},
      type: "post",
      dataType: "JSON",
      success: function(data)
          { 
            var kdakun = $('#kdakun').val()
            var $asal = $("<option selected='selected'></option>").val(data[0]['idkota']).text(data[0]['valkota'])
                  $(".kotaasal").append($asal).trigger('change');
          }
        });

        
});

function Kotatujuan(b){
          var prov  = $("#provinsi"+b+"").val()
          var kota  = $("#kota"+b+"").val()

            $.ajax({
            url : master_baseurl + "getKota",
            data: {"kdlokasi": prov,"kdkabkota": kota, Trigger :"tujuan"},
            type: "post",
            dataType: "JSON",
            success: function(data)
                { 
                  var $tujuan = $("<option selected='selected'></option>").val(data[0]['idkota']).text(data[0]['valkota'])
                        $("#kotatujuan"+b+"").append($tujuan).trigger('change');
                }
              });

              var oneDay = 24*60*60*1000; // hours*minutes*seconds*milliseconds
              var firstDate = new Date($("#tglberangkat"+b+"").val());
              var secondDate = new Date($("#tglkembali"+b+"").val());
              var diffDays = ((secondDate.getTime() - firstDate.getTime()) / (oneDay))+1;

              $("#jmlhari"+b+"").val(diffDays);

              cityCount(b,'default')
}



function PilihKode(Id, kdindex, Tahapan, App){

var relasii = $('#realisasi').val()
  var alokasii = $('#alokasi').val()
  var tahapan = $('#kdtahapan').val()
  var app = $('#kdapp').val()

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
              $('#ppk_id').val(data[0]['ppk_id']);
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

              var idxskmpnenlabel = $('#idxskmpnenlabel').val();

              if(idxskmpnenlabel != ""){
                tb = document.getElementById("tbUser")
                tb.style.display = ""; 
              }

              b=1;
              for(a=0; a < countJSON; a++){
                
                cityCount(b,'default')
                b++;
              }
              

            }
    });

  
}

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





function cityCount(id, trigger){

  $sumtotal = 0;

  var keljab = $('#keljab'+id+'').val();
  var kdakun = $('#kdakun').val();
  var gol = $('#gol'+id+'').val();
  if(kdakun == "" || kdakun == null){
    return false
  }

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

                    var oneDay = 24*60*60*1000; // hours*minutes*seconds*milliseconds
                    var firstDate = new Date($("#tglberangkat"+id+"").val());
                    var secondDate = new Date($("#tglkembali"+id+"").val());
                    var diffDays = ((secondDate.getTime() - firstDate.getTime()) / (oneDay) )+ 1;

                $("#tarifuangharian"+id+"").val(tarif)
                if ( ($("#tglberangkat"+id+"").val() != "") && ($("#tglkembali"+id+"").val() != "")) {
                  if(trigger == "default"){

                   
                    $("#jmlhari"+id+"").val(diffDays);

                  }else if(trigger == "edit"){
                    beforediffDays = diffDays;
                    diffDays = $("#jmlhari"+id+"").val();

                    if(diffDays > beforediffDays){

                      swal({
                          title:"Jumlah Hari Melebihi Maksimal",
                          text: "Pastikan Jumlah Hari Tidak Melebihi "+beforediffDays+" Hari", 
                          icon: "warning",
                          timer: 2000
                          })
                          return false

                    }

                  }
                

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
                $('#realisasilabel').val(formatRupiah(''+$sumtotal));


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

                var oneDay = 24*60*60*1000; // hours*minutes*seconds*milliseconds
                var firstDate = new Date($("#tglberangkat"+id+"").val());
                var secondDate = new Date($("#tglkembali"+id+"").val());
                var diffDays = ((secondDate.getTime() - firstDate.getTime()) / (oneDay)) + 1;

                if(diffDays < 0){
                  swal({
                    title:"Jumlah Hari Minus !",
                    text: "Pastikan tanggal kembali tidak < tanggal berangkat", 
                    icon: "warning",
                    timer: 2000
                    })
                    $("#tglkembali"+id+"").val("")
                    $("#jmlhari"+id+"").val("");
                    return false;
                }

                var diffDays = ((secondDate.getTime() - firstDate.getTime()) / (oneDay)) + 1;


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

  var btn = $(this);
  var form = $(this).closest("form");
  var formData = new FormData($("#FormTim")[0]);
  var countingDiv = document.getElementById('counting');
  var countTim = countingDiv.getElementsByClassName('namaTim').length;

  j = 1
  for($loop = 0 ; $loop < countTim; $loop++){
    cekBentrok    = $('#nama'+j+'').val()
    tglberangkat  = $('#tglberangkat'+j+'').val()
    tglkembali    = $('#tglkembali'+j+'').val()
    nipVal        = $('#nip'+j+'').val()
    namaVal       = $('#nama'+j+'').val()

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
                      return false;
                    }

                  }
    });
    j++;


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
    url: baseurl + "ActionAPI",
    processData: false,
    contentType: false,
    success: function (data, textStatus, jqXHR) {
              show_msg(textStatus);
              //Reset(IdForm);
              if(satker_session != 450491){
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