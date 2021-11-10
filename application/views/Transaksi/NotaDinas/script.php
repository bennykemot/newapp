<script>

var baseurl 	= "<?= base_url('Transaksi/NotaDinas/')?>";
var dropdown_baseurl 	= "<?= base_url('Master/Dropdown/')?>";
var satker_session = "<?= $this->session->userdata("kdsatker")?>"

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
                    row = '<tr>\
                            <td>'+no+'</td>\
                            <td width="30%">'+data[i]['nama']+'</td>\
                            <td>'+data[i]['nip']+'</td>\
                            <td>'+data[i]['nama_golongan']+'</td>\
                            <td><input type="text"></td>\
                            <td><input type="text"></td>\
                            <td><input type="date"></td>\
                            <td><input type="date"></td>\
                            <td><input type="number" onkeypress="return validateNumber(event)"></td>\
                            <td><input type="number" onkeypress="return validateNumber(event)"></td>\
                            <td><input type="number" onkeypress="return validateNumber(event)"></td>\
                            <td><input type="number" onkeypress="return validateNumber(event)"></td>\
                            <td><input type="number" onkeypress="return validateNumber(event)"></td>\
                            <td><input type="number" onkeypress="return validateNumber(event)"></td>\
                            <td><select></select></td>\
                            </tr>'
                    no++
                    $("#tabeltim").append(row);
                }

                }

                
        });

      });

      $("#select-bebananggaran").change(function() {
         var id = $('#select-bebananggaran').val();
   

         $.ajax({
            url : baseurl + "getData",
            data: {"id": id, "Trigger": "SelectForBebanAnggaran_NotaDinas"},
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
    "scrollX": 10,
    autoWidth: false

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
</script>