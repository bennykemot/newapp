<script>

var baseurl 	= "<?= base_url('Transaksi/SuratTugas/')?>";
var dropdown_baseurl 	= "<?= base_url('Master/Dropdown/')?>";
var master_baseurl 	= "<?= base_url('Master/Master/')?>";
var satker_session = "<?= $this->session->userdata("kdsatker")?>"
var user_session = "<?= $this->session->userdata("user_id")?>"
var role_session = "<?= $this->session->userdata("role_id")?>"
var unit_session = "<?= $this->session->userdata("unit_id")?>"
var id_st_session = "<?=$this->uri->segment('4')?>";
var id_status = "<?=$this->uri->segment('9')?>";
if(role_session == 1){
  unit_session = 0;
}
$(".browser-default").select2({disabled:'readonly'});

var TTDvalue = "<?= $ubah[0]['id_ttd'] ?>"
var TTDtext = "<?= $ubah[0]['nama_ttd'] ?>"

var TTDmenyetujuivalue = "<?= $ubah[0]['cs_menyetujui'] ?>"
var textmenyetujui = "<?= $ubah[0]['cs_menyetujui'] ?>"

var TTDmenyetujuitext = textmenyetujui.split("-")

var TTDmengajukanvalue = "<?= $ubah[0]['cs_mengajukan'] ?>"
var textmengajukan = "<?= $ubah[0]['cs_mengajukan'] ?>"

var TTDmengajukantext = textmengajukan.split("-")

$('#menyetujui').val(TTDmenyetujuitext[2]);
$('#mengajukan').val(TTDmengajukantext[2]);

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
    $(document).ready(function(){

        var TTDvalue = "<?= $ubah[0]['id_ttd'] ?>"
var TTDtext = "<?= $ubah[0]['nama_ttd'] ?>"

var TTDmenyetujuivalue = "<?= $ubah[0]['cs_menyetujui'] ?>"
var textmenyetujui = "<?= $ubah[0]['cs_menyetujui'] ?>"

var TTDmenyetujuitext = textmenyetujui.split("-")

var TTDmengajukanvalue = "<?= $ubah[0]['cs_mengajukan'] ?>"
var textmengajukan = "<?= $ubah[0]['cs_mengajukan'] ?>"

var TTDmengajukantext = textmengajukan.split("-")


var $ttd = $("<option selected='selected'></option>").val(TTDvalue).text(TTDtext)
$("#ttd").append($ttd).trigger('change');

var $menyetujui = $("<option selected='selected'></option>").val(TTDmenyetujuivalue).text(TTDmenyetujuitext[2])
$("#cs_menyetujui").append($menyetujui).trigger('change');

var $mengajukan = $("<option selected='selected'></option>").val(TTDmengajukanvalue).text(TTDmengajukantext[2])
$("#cs_mengajukan").append($mengajukan).trigger('change');

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

$("#ApproveST").click(function (e) {
  e.preventDefault();

  var btn = $(this);
  var form = $(this).closest("form");
  var formData = new FormData($("#FormST")[0]);
  var IdForm =  "FormST";

  btn
    .addClass("kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light")
    .attr("disabled", true);

  formData.append('Trigger', 'Approve')
  formData.append('idst', id_st_session)
    formData.append('id_status', id_status)

  $.ajax({
    type: "POST",
    data: formData,
    url: baseurl + "Action",
    processData: false,
    contentType: false,
    success: function (data, textStatus, jqXHR) {
              show_msg(textStatus);
              window.history.back();
              
              
          },
          error: function (jqXHR, textStatus, errorThrown) { },
      });
});

$("#TolakST").click(function (e) {
  e.preventDefault();

  var btn = $(this);
  var form = $(this).closest("form");
  var formData = new FormData($("#FormST")[0]);
  var IdForm =  "FormST";

  btn
    .addClass("kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light")
    .attr("disabled", true);

  formData.append('Trigger', 'Approve')
  formData.append('idst', id_st_session)
    formData.append('id_status', 1)
    

  $.ajax({
    type: "POST",
    data: formData,
    url: baseurl + "Action",
    processData: false,
    contentType: false,
    success: function (data, textStatus, jqXHR) {
              show_msg(textStatus);
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
</script>