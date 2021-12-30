<script>

    var baseurl 	= "<?= base_url('Anggaran/Mappingapp/')?>";
    var baseurl_detail 	= "<?= base_url('Anggaran/Detail_Mappingapp/')?>";
    var dropdown_baseurl 	= "<?= base_url('Master/Dropdown/')?>";
    var baseurl_master 	= "<?= base_url('Master/Master/')?>";
    var satker_session = "<?= $this->session->userdata("kdsatker")?>"
    var role_session = "<?= $this->session->userdata("role_id")?>"
    var user_session = "<?= $this->session->userdata("user_id")?>"
    var kdindex_session = "<?= $this->uri->segment('5')?>"
    var Id_session = "<?= $this->uri->segment('4')?>"

    var Tahapan = "<?= $ubah[0]->nama_tahapan?>"

    var AppText = "<?= $ubah[0]->nama_app?>"
	  var AppValue = "<?= $ubah[0]->id_app?>"
    
	var $app = $("<option selected='selected'></option>").val(AppValue).text(AppText)
	$("#app-select2").append($app).trigger('change');
    

    function formatMoney(n) {
        return (Math.round(n * 100) / 100).toLocaleString();
    }

    $(document).ready(function() { 

      $('.tahapan_id_label').html(Tahapan);

      $.ajax({
      url : baseurl_detail + "Ubah",
      data: {"id": Id_session,
            "kdindex": kdindex_session, 
            "Trigger": "Edit"},
      type: "post",
      dataType: "JSON",
      success: function(data)
          { 
            var kdkmpnen = data[0]['kdkmpnen'] 
            $('#kdkmpnen').val(data[0]['kdkmpnen'])
            $('#kdsoutput').val(data[0]['kdsoutput'])
            $('#kdindex').val(data[0]['kdindex'])
              //IF ALOKASI 
                  $('#alokasi').val(data[0]['alokasi'])
                  $('#nilaiakun').val(data[0]['rupiah'])
                  $('#dummy_rupiah').val(data[0]['rupiah_tahapan'])
                  var Alokasi = $('#alokasi').val()
                  var Sisa = Number(data[0]['rupiah']) - Number(data[0]['alokasi'])
                  $('#jumlah').val(Sisa)
                  $('#sisa').val(Sisa)
                  $('#rupiah1').val(data[0]['rupiah_tahapan'])
                  var selisih_ = Number(Sisa) + Number(data[0]['alokasi']);
                  $('#selisih_').val(selisih_)

                if(data['tahapan'] == 11){
                var element = document.getElementById("divTahapan");
                          element.classList.add("d-none");
                var element2 = document.getElementById("divRupiah");
                          element2.classList.remove("d-none");
              }else{
                var element3 = document.getElementById("counting");
                          element3.classList.remove("d-none");
                
              }

                

                //IF JUMLAH 0

                    if( $('#jumlah').val() <= 0){
                      $(".rupiah").attr('max',data[0]['rupiah_tahapan']);

                      var button = document.getElementById("add-field");
                        button.classList.add("disabled");

                        var element = document.getElementById("jumlah");
                                element.classList.add("red");
                              element.classList.remove("cyan");
                    }else{

                    var element = document.getElementById("jumlah");
                                element.classList.remove("red");
                              element.classList.add("cyan");
                    }
          
                var button = document.getElementById("TambahApp");
                button.classList.add("disabled");
            
          }

      });

    });

    function AllCount(){
var button = document.getElementById("TambahApp");
      button.classList.remove("disabled");
var rupiah = document.getElementsByClassName("rupiah");
//rupiah.value = formatRupiah(this.value);
var nilai_app1 = Number(document.getElementById('rupiah1').value)
var nilai_app_All = Number(document.getElementById('rupiahAll').value)
var nilai_app = [];
var total_nilaiapp = 0;
for(i = 2 ; i < 8 ; i++){
  if(document.getElementById('rupiah'+i+'') == null){
    nilai_app[i] = 0
  }else{
    nilai_app[i] = Number(document.getElementById('rupiah'+i+'').value)
  }

  total_nilaiapp += nilai_app[i]
      
}

var sisa = $('#sisa').val()
var getAlokasi = $('#alokasi').val()

var nilai_app = Number(sisa - getAlokasi)
var total  = Number($('#jumlah').val());
var sisa  = Number($('#sisa').val());
var rupiah_dummy  = Number($('#dummy_rupiah').val());
var selisih_ = Number(rupiah_dummy) + Number(sisa);

if(nilai_app1 > selisih_){
  var selisih_tahapan = selisih_ - nilai_app1
  swal({
      title: "JUMLAH AKUN MINUS ! ", 
      icon: "warning",
      timer: 2000
      })
      $('#jumlah').val(selisih_tahapan)

      var button = document.getElementById("UbahApp");
      button.classList.add("disabled");
      var element = document.getElementById("jumlah");
                  element.classList.remove("cyan");
                  element.classList.add("red");


      return false;
}else if( nilai_app_All > selisih_){
  var selisih_tahapan = selisih_ - nilai_app_All
  swal({
      title: "JUMLAH AKUN MINUS ! ", 
      icon: "warning",
      timer: 2000
      })
      $('#jumlah').val(selisih_tahapan)
      return false;
}else{

    if(selisih_ > nilai_app1  && nilai_app1 != 0){
      var selisih_tahapan = selisih_ -nilai_app1

    }else if(selisih_ > nilai_app_All && nilai_app_All != 0){
      var selisih_tahapan = selisih_ -nilai_app_All

    }else if(selisih_ < nilai_app1 && nilai_app1 != 0){
      var selisih_tahapan = nilai_app1 - selisih_

    }else if(selisih_ < nilai_app_All && nilai_app_All != 0){
      var selisih_tahapan = nilai_app_All -selisih_
    }else{
      var selisih_tahapan = 0
    }
}


if(nilai_app1 == selisih_ || selisih_ == nilai_app_All){
  $('#jumlah').val(selisih_tahapan)
}else if(selisih_tahapan != 0){
  $('#jumlah').val(sisa + selisih_tahapan)
}else if(nilai_app1 == 0 || nilai_app_All == 0){

  $('#jumlah').val(sisa + rupiah_dummy)
}else {
  $('#jumlah').val(sisa - (nilai_app1 + nilai_app_All + total_nilaiapp))
}



// if(total < sisa){
//   $('#jumlah').val(sisa - ((nilai_app1 + nilai_app_All ) + total_nilaiapp)); 
// }else{
//   $('#jumlah').val(nilai_app - ((nilai_app1 + nilai_app_All) + total_nilaiapp)); 
// }

// if($('#jumlah').html() <= 0){
//   document.getElementById("TambahApp").disabled = true;
// }else{
//   document.getElementById("TambahApp").disabled = false;
// }

var buttonadd = document.getElementById("add-field");
buttonadd.classList.remove("disabled");

// if($('#jumlah').val() == 0){
//   var buttonadd = document.getElementById("add-field");
//       buttonadd.classList.add("disabled");
// }
  

if($('#jumlah').val() < 0){
    swal({
      title: "JUMLAH AKUN MINUS ! ", 
      icon: "warning",
      timer: 2000
      })

      
      var button = document.getElementById("UbahApp");
      button.classList.add("disabled");

      var buttonadd = document.getElementById("add-field");
      buttonadd.classList.add("disabled");

      


      var element = document.getElementById("jumlah");
                  element.classList.remove("cyan");
                  element.classList.add("red");
  }else{
    var button = document.getElementById("UbahApp");
      button.classList.remove("disabled");
    var element = document.getElementById("jumlah");
                  element.classList.remove("red");
                  element.classList.add("cyan");
  }

// }
}




    $("#app-select2").select2({
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
                kdindex : $('#kodeindex').val(),
                kdsoutput : $('#kdsoutput').val(),
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

        var button = document.getElementById("UbahApp");
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





$("#UbahApp").click(function (e) {
e.preventDefault();

var btn = $(this);
var form = $(this).closest("form");
var formData = new FormData($("#FormApp")[0]);
var IdForm =  "FormApp";

if($('#jumlah').val() < 0){
          swal({
            title: "JUMLAH AKUN MINUS ! ", 
            icon: "warning",
            timer: 2000
            })
            return false;

          }

btn
  .addClass("kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light")
  .attr("disabled", true);

formData.append('Trigger', 'U')
formData.append('Id_Edit', Id_session)

$.ajax({
  type: "POST",
  data: formData,
  url: baseurl_detail + "Action",
  processData: false,
  contentType: false,
  success: function (data, textStatus, jqXHR) {
            show_msg(textStatus);
           // window.history.go(-1);
            
            
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