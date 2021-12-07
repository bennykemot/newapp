

<script>


var baseurl 	= "<?= base_url('Transaksi/SuratTugas/')?>";
var dropdown_baseurl 	= "<?= base_url('Master/Dropdown/')?>";
var master_baseurl 	= "<?= base_url('Master/Master/')?>";
var satker_session = "<?= $this->session->userdata("kdsatker")?>"


function Reset(idForm) {
  document.getElementById(idForm).reset();
  $('.browser-default').val(null).trigger('change');
}

function show(Id){
  $('#id_st').val(Id);
}

function kwitansiRampung(url,trigger){
  var id = $('#id_st').val()
  window.open(baseurl + url + id, '_blank')

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

    $('#perjab'+res+'').html(val[1])
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
        var head = "";
        var end="";
        var arrX = [];
        $("#add-field", $(this)).click(function(e) {
           if(x < max){
              x++;
              i++;
                
              if(x == 1){
                   head = '<table class="bordered fixed" id="tbUser"><tr>\
                                <td style="width: 5%" >NO</td>\
                                <td style="width: 30%" >NAMA</td>\
                                <td style="width: 15%" >NIP</td>\
                                <td style="width: 30%" >PERAN/JABATAN</td>\
                                <td>GOL</td>\
                                <td style="min-width: 200px">KOTA ASAL</td>\
                                <td style="min-width: 200px">KOTA TUJUAN</td>\
                                <td>TGL<br>BERANGKAT</td>\
                                <td>TGL<br>KEMBALI</td>\
                                <td>JML<br>HARI</td>\
                                <td>UANG HARIAN</td>\
                                <td>PENGINAPAN</td>\
                                <td>TRANSPORTASI</td>\
                                <td>REPRESENTASI</td>\
                                <td style="min-width: 150px">JUMLAH</td>\
                                <td>JENIS<br>TRANSPORTASI</td>\
                                <td style="min-width: 15px" >AKSI</td>\
                            </tr>';
                }else if(x == max){
                  end = '</table>'
              }
              $($wrapper).append( head +'<tr>\
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
                              <td><input type="date" onchange="dayCount(\''+x+'\',\'D\')" id="tglberangkat'+x+'" name="tglberangkat'+x+'"></td>\
                              <td><input type="date" onchange="dayCount('+x+')" class="tgl" id="tglkembali'+x+'" name="tglkembali'+x+'"></td>\
                              <td><input type="text" id="jmlhari'+x+'" name="jmlhari'+x+'" readonly></td>\
                              <td><input type="text" id="uangharian'+x+'" name="uangharian'+x+'" readonly></td>\
                              <td><input type="text" id="uangpenginapan'+x+'" name="uangpenginapan'+x+'" readonly></td>\
                              <td><input type="text" onkeypress="return validateNumber(event)" readonly></td>\
                              <td><input type="text" onkeypress="return validateNumber(event)" readonly></td>\
                              <td><input type="text" id="total'+x+'"  name="total'+x+'" readonly></td>\
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
                              </tr>'+end+'');

                        selectRefresh(x);
                        countX = arrX.push(x);
                       

                        $('.table-remove').click(function() {
                            $(this).parents('table').detach();
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
                var diffDays = (secondDate.getTime() - firstDate.getTime()) / (oneDay);
                $("#jmlhari"+id+"").val(diffDays);

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
                var diffDays = (secondDate.getTime() - firstDate.getTime()) / (oneDay);
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
  var countTim = countingDiv.getElementsByClassName('namaTim').length;

  btn
    .addClass("kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light")
    .attr("disabled", false);

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
             // window.history.back();
              
              
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

// (function(){
// 	$('form > div > input').keyup(function(){
// 		var empty = false;
// 		$('form > div > input').each(function(){
// 			if($(this).val() == ''){
// 				empty = true;
// 			}

// 		});

// 		if(empty){
// 			$('#TambahST').attr('disabled','disabled');
// 		}else{
// 			$('#TambahST').removeAttr('disabled');
// 		}
// 	});
// })()

// $('#nost, #tglst, #uraianst, #tglst_mulai, #tglst_selesai, #idxskmpnen, #modalIdx, #beban_anggaran, #ttd').bind('keyup', function(){
// 	if(allFilled()) $('#TambahST').removeAttr('disabled');
// });
// function allFilled(){
// 	var filled = true;
// 	$('body input').each(function(){
// 		if($(this).val() == '') filled = false;
// 	});
// 	return filled;
// }

</script>
