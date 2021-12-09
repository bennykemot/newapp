<script>

    var baseurl 	= "<?= base_url('Anggaran/Mappingapp/')?>";
    var baseurl_detail 	= "<?= base_url('Anggaran/Detail_Mappingapp/')?>";
    var dropdown_baseurl 	= "<?= base_url('Master/Dropdown/')?>";
    var baseurl_master 	= "<?= base_url('Master/Master/')?>";
    var satker_session = "<?= $this->session->userdata("kdsatker")?>"
    var role_session = "<?= $this->session->userdata("role_id")?>"
    var user_session = "<?= $this->session->userdata("user_id")?>"
    var Id_Edit_Session = "<?= $this->uri->segment('4')?>"
    var rupiah_session = "<?= $this->uri->segment('5')?>"
    var kdindex_session = "<?= $this->uri->segment('6')?>"
    var cek = "<?= $this->uri->segment('3')?>"
    

    function formatMoney(n) {
        return (Math.round(n * 100) / 100).toLocaleString();
    }


    if(cek == "Ubah"){

        var Id = "<?= $this->uri->segment('4')?>"
        var kdindex = kdindex_session.replace('%20',' ')

        $.ajax({
    url : baseurl_detail + "Action",
    data: {"id": Id, "kdindex": kdindex, "Trigger": "R-Ubah"},
    type: "post",
    dataType: "JSON",
    success: function(data)
        {    
            Jumlah = rupiah_session
            $('#rupiah_tahapan_Edit').val(data['rupiah_tahapan']); //rupiah per Tahapan
            $('#rupiah_tahapan_dummy').val(data['rupiah_tahapan']); //rupiah per Tahapan UNTUK DUMMY TIDAK BERUBAH

            var total_app = Number(data['total_tahapan']); //Total App

            var rupiah_Edit = Number(Jumlah) - total_app //Ini untuk hasil count kotak biru

            $('#sisa_akun').val(rupiah_Edit);
            $('#rupiah_Edit').val(rupiah_Edit);
            $('#rupiah_Edit').val(rupiah_Edit); //hasil kotak biru

            $('#total_akun').val(Number(Jumlah));
            $('#total_app').val(Number(total_app));

            $('#tahapan_Edit').val(data['nama_tahapan']);
            $('#Id_Edit').val(Id);
            $('#th_pkpt_Edit').val(data['th_pkpt']);
            $('#kodeindex_Edit').val(data['kdindex']);

              var app = $("<option selected='selected'></option>").val(data['id_app']).text(data['id_app']+' - '+data['nama_app'])
              $("#app-select2_Edit").append(app).trigger('change');

              if(data['tahapan'] == "All"){
                var element = document.getElementById("divTahapan_Edit");
                          element.classList.add("d-none");
              }

              var element = document.getElementById("rupiah_Edit");
                      element.classList.remove("red");
                    element.classList.add("cyan");

            // $('#modalEdit').modal('open');
        
        
        }
    });

    }
    //var Id = ""




$("#app-select2_Edit").select2({
          dropdownAutoWidth: true,
          width: '100%',
          placeholder: "Pilih App",
         ajax: { 
           url: dropdown_baseurl + 'app',
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

  function Count(){

if($('#rupiah_tahapan_Edit').val() == "0" ||$('#rupiah_tahapan_Edit').val() == 0|| $('#rupiah_tahapan_Edit').val() == "0" || $('#rupiah_tahapan_Edit').val() ==0){
  document.getElementById("EditMapping").disabled = true;
  $('#rupiah_Edit').val($('#sisa_akun').val()); 
}else{



var total_akun_hitung = Number($('#total_akun').val())
var total_app_hitung =  Number($('#total_app').val())

var rupiah_tahapan_hitung =  Number($('#rupiah_tahapan_Edit').val())
var rupiah_tahapan_dummy =  Number($('#rupiah_tahapan_dummy').val())

if(rupiah_tahapan_hitung < rupiah_tahapan_dummy){ //rupiah tahapan berkurang
  selisih_rupiah = rupiah_tahapan_dummy - rupiah_tahapan_hitung
  current_total_app = total_app_hitung - selisih_rupiah

}else if(rupiah_tahapan_hitung > rupiah_tahapan_dummy){ //rupiah tahapan bertambah
  selisih_rupiah = rupiah_tahapan_hitung - rupiah_tahapan_dummy
  current_total_app = total_app_hitung + selisih_rupiah

}else{
  selisih_rupiah = 0
  current_total_app = total_app_hitung
}

current_sisa_akun = total_akun_hitung - current_total_app

$('#rupiah_Edit').val(current_sisa_akun); 


// if($('#rupiah_Edit').val() == 0){
//     document.getElementById("EditMapping").disabled = true;
//   }else{
//     document.getElementById("EditMapping").disabled = false;
//   }
 


  if($('#rupiah_Edit').val() < 0){
      swal({
        title: "JUMLAH AKUN MINUS ! ", 
        icon: "warning",
        timer: 2000
        })

        var button = document.getElementById("EditMapping");
        button.classList.add("disabled");

      

        var element = document.getElementById("rupiah_Edit");
                    element.classList.remove("cyan");
                    element.classList.add("red");
    }else{
      var button = document.getElementById("EditMapping");
        button.classList.remove("disabled");
      var element = document.getElementById("rupiah_Edit");
                    element.classList.remove("red");
                  element.classList.add("cyan");
    }
}
    


}





$("#EditMapping").click(function (e) {
e.preventDefault();

var btn = $(this);
var form = $(this).closest("form");
var formData = new FormData($("#FormMapping_Edit")[0]);
var IdForm =  "FormMapping_Edit";

btn
  .addClass("kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light")
  .attr("disabled", true);

formData.append('Trigger', 'U')
formData.append('Id_Edit', Id_Edit_Session)

$.ajax({
  type: "POST",
  data: formData,
  url: baseurl_detail + "Action",
  processData: false,
  contentType: false,
  success: function (data, textStatus, jqXHR) {
            show_msg(textStatus);
            window.history.go(-1);
            
            
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