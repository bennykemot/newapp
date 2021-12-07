<script>

var baseurl 	= "<?= base_url('Transaksi/NotaDinas/')?>";
var dropdown_baseurl 	= "<?= base_url('Master/Dropdown/')?>";
var master_baseurl 	= "<?= base_url('Master/Master/')?>";
var satker_session = "<?= $this->session->userdata("kdsatker")?>"


function viewModal(){
  $('#modal1').modal('open');
}

function show(Id){
  $('#id_st').val(Id);
}

function kwitansiRampung(url,trigger){
  var id = $('#id_st').val()
  window.open(baseurl + url + id, '_blank')

}




$("#costsheet").click(function (e) {
  e.preventDefault();

  var btn = $(this);
  var form = $(this).closest("form");
  var formData = new FormData($("#FormView")[0]);

  btn
    .addClass("kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light")
    .attr("disabled", true);

  formData.append('Trigger', 'costsheet')

  $.ajax({
    type: "POST",
    data: formData,
    url: baseurl + "Export",
    processData: false,
    contentType: false,
    success: function (data, textStatus, jqXHR) {

          },
          error: function (jqXHR, textStatus, errorThrown) { },
      });
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


    $("#select-nost").select2({
          dropdownAutoWidth: true,
          width: '100%',
          placeholder: "Pilih No Surat Tugas",
         ajax: { 
           url: dropdown_baseurl + 'nost',
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

     $("#select-bebananggaran").select2({
          dropdownAutoWidth: true,
          placeholder: "Pilih Beban Anggaran",
         ajax: { 
           url: dropdown_baseurl + 'pagu',
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

     $("#select-bebananggaran").change(function() {
      document.getElementById("input_table").style.display = "";
     });

     $("#select-kodeapp").select2({
          dropdownAutoWidth: true,
          placeholder: "Pilih App",
         ajax: { 
           url: dropdown_baseurl + 'app',
           type: "post",
           dataType: 'json',
           delay: 250,
           data: function (params) {
              return {
                Trigger: "SelectForKodeApp_NotaDinas",
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
   
     $("#select-nost").change(function() {
         var nost = $('#select-nost').val();
         $("#tabeltim").empty().append()
         

         $.ajax({
            url : baseurl + "getData",
            data: {"id": nost, "Trigger": "R"},
            type: "post",
            dataType: "JSON",
            success: function(data)
                {    
                    $('#tglst').val(data[0]['tglst']);
                    $('#uraianst').val(data[0]['uraianst']);
                    // $('#bebananggaran').val(data[0]['id_unit']);
                var row = ''
                var td = ''
                var no =1
                  for(i=0 ; i< data.length ; i++){
                      row = '<tr >\
                              <td>'+no+'</td>\
                              <td width="20%">'+data[i]['nama']+'</td>\
                              <td>'+data[i]['nip']+'</td>\
                              <td>'+data[i]['nama_golongan']+'</td>\
                              <td><select class="browser-default kota" id="kotaasal'+i+'" onchange="cityCount('+i+')"></select></td>\
                              <td><select class="browser-default kota"  id="kotatujuan'+i+'" onchange="cityCount('+i+')"></select></td>\
                              <td><input type="date" onchange="dayCount(\''+i+'\',\'D\')" id="tglberangkat'+i+'"></td>\
                              <td><input type="date" onchange="dayCount('+i+')" class="tgl" id="tglkembali'+i+'"></td>\
                              <td><input type="text" id="jmlhari'+i+'" readonly></td>\
                              <td><input type="text" id="uangharian'+i+'" readonly></td>\
                              <td><input type="text" id="uangpenginapan'+i+'" readonly></td>\
                              <td><input type="number" onkeypress="return validateNumber(event)"></td>\
                              <td><input type="text" onkeypress="return validateNumber(event)"></td>\
                              <td><input type="text" id="total'+i+'"></td>\
                              <td><select class="select2 browser-default">\
                                    <option value="Pesawat Udara">Pesawat Udara</option>\
                                    <option value="Kendaraan Umum">Kendaraan Umum</option>\
                                  </select</td>\
                              </tr>'
                      
                      no++
                      $("#tabeltim").append(row);
                      selectRefresh(i)

                  }

                }

                
        });

      });

      function selectRefresh(i){

        

        var idkota_asal = $('#kotaasal'+i+'').val()
        var idkota_tujuan = $('#kotatujuan'+i+'').val()
        
          if($('#select-bebananggaran').val() != null){

            var id = $('#select-bebananggaran').val();
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

      function validateNumber(e) {
            const pattern = /^[0-9]$/;

            return pattern.test(e.key )
        }

      function cityCount(id){
        

        var valasal = $("#kotaasal"+id+"").val()
        var kotaasal_split = valasal.split("-")
        var asal = kotaasal_split[1]
        var kotaasal_id = kotaasal_split[0]

        var valtujuan = $("#kotatujuan"+id+"").val()
        var kotatujuan_split = valtujuan.split("-")
        var tujuan = kotatujuan_split[1]
        var kotatujuan_id = kotatujuan_split[0]

        

        if ( $("#select-bebananggaran").val() != null){
          var valkdakun = $("#select-bebananggaran").val()
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

        var valasal = $("#kotaasal"+id+"").val()
        var kotaasal_split = valasal.split("-")
        var asal = kotaasal_split[1]
        var kotaasal_id = kotaasal_split[0]

        var valtujuan = $("#kotatujuan"+id+"").val()
        var kotatujuan_split = valtujuan.split("-")
        var tujuan = kotatujuan_split[1]
        var kotatujuan_id = kotatujuan_split[0]

        var kdakun = "0"

        if ( $("#select-bebananggaran").val() != null){
          var valkdakun = $("#select-bebananggaran").val()
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


      $("#select-bebananggaran").change(function() {
        
         var id = $('#select-bebananggaran').val();
         var split_id = id.split("-")
         var kodebeban = split_id[1]
   

         $.ajax({
            url : baseurl + "getData",
            data: {"id": kodebeban, "Trigger": "SelectForBebanAnggaran_NotaDinas"},
            type: "post",
            dataType: "JSON",
            success: function(data)
                {    
                     $('#paguanggaran').val(formatRupiah(data[0]['rupiah']));
                }

                
        });

      });

      $(function () {


$("#page-length-option").DataTable({
    responsive: !0,
    lengthMenu: [
        [10, 25, 50, -1],
        [10, 25, 50, "All"],
    ],
    scrollX: true,

}),
    $("#scroll-dynamic").DataTable({ responsive: !0, scrollCollapse: !0, paging: !1,autoWidth: false }),
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

// Hide SubMenus.
$(".subMenu").hide();

// Shows SubMenu when it's parent is hovered.
$(".subMenu").parent("li").hover(function () {
  $(this).find(">.subMenu").not(':animated').slideDown(150);
  $(this).toggleClass("active ");
});

</script>
