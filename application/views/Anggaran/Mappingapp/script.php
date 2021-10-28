<script>
    var baseurl 	= "<?= base_url('Anggaran/Mappingapp/')?>";
    var baseurl_detail 	= "<?= base_url('Anggaran/detail_Mappingapp/')?>";
    var dropdown_baseurl 	= "<?= base_url('Master/Dropdown/')?>";
    var satker_session = "<?= $this->session->userdata("kdsatker")?>"

    function Reset(idForm) {
      document.getElementById(idForm).reset();
      $('#app-select2').val(null).trigger('change');
      document.getElementById("TambahApp").disabled = false; 
     
    }

        // SELECT2 INSERT

        $("#app-select2").select2({
          dropdownAutoWidth: true,
          width: '100%',
          placeholder: "Pilih App",
          dropdownParent: "#modal2",
         ajax: { 
           url: dropdown_baseurl + 'app',
           type: "post",
           dataType: 'json',
           delay: 250,
           data: function (params) {
              return {
                kdsatker: satker_session,
                kdindex : $('#kodeindex').val(),
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

     $("#app-select2_Edit").select2({
          dropdownAutoWidth: true,
          width: '100%',
          placeholder: "Pilih App",
          dropdownParent: "#modalEdit",
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
 
     
     


     var grid_detail_app = "#tabel_mapping_detail";
     function showDetailapp(Id){
      $(grid_detail_app).DataTable({
            serverSide: true,
            processing: true,
            searchDelay: 500,
            searching: true,
            ordering: true,
            // scrollY:450,
            // scrollX:!0,
            responsive:!0,
            bDestroy: true,
           
            ajax: {
                url: baseurl_detail + 'getMappingApp_detail',
                type: "post",
                data : {"kdindex": Id}
            },
                
            autoWidth: false,
            columns: [
             
                {
                    data: null, class: "text-center",
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },

                {
                    data: "nama_app"
                },
                {
                    data: "tahapan"
                },

                {
                    data: "rupiah_tahapan", className: "text-right", render: $.fn.dataTable.render.number( ',', '.', 0 )
                },
                {
                    data: "th_pkpt"
                },

                { data: 'id',
                  render: function(data, type, row) {
                      return '<button type="button" class="btn-floating mb-1 green" onclick="Edit(\''+row.id+'\')"><i class="material-icons">edit</i></button>\
                      <button type="button" class="btn-floating mb-1 red" onclick="Delete(\''+row.id+'\',\''+row.kdindex+'\')"><i class="material-icons">delete</i></button>';
                  }
                },
               
 
            ],
            pageLength: 10,
            lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
            //order: [[3,'asc']],
            bFilter: false,
            scrollCollapse: true,
            columnDefs: [{ visible: false, targets: 1 } ],

            drawCallback: function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;
            var subTotal = new Array();
            var groupID = -1;
            var aData = new Array();
            var index = 0;
            
            api.column(1, {page:'current'} ).data().each( function ( group, i ) {
            	
              // console.log(group+">>>"+i);
            
              var vals = api.row(api.row($(rows).eq(i)).index()).data();
              var salary = vals['rupiah_tahapan'] ? parseFloat(vals['rupiah_tahapan']) : 0;
               
              if (typeof aData[group] == 'undefined') {
                 aData[group] = new Array();
                 aData[group].rows = [];
                 aData[group].salary = [];
              }
          
           		aData[group].rows.push(i); 
        			aData[group].salary.push(salary); 
                
            } );
    

            var idx= 0;

      
          	for(var office in aData){
       
									 idx =  Math.max.apply(Math,aData[office].rows);
      
                   var sum = 0; 
                   $.each(aData[office].salary,function(k,v){
                        sum = sum + v;
                   });
  									// console.log(aData[office].salary);
                   $(rows).eq( idx ).after(
                        '<tr class="group"><td colspan="2">'+office+'</td>'+
                        '<td style="text-align: right">'+formatMoney(sum)+'</td><td></td><td></td></tr>'
                    );
                    
            };

        },

            initComplete: function (settings, json) {
                    $(grid_detail_app).wrap('<div class="table-responsive"></div>');
                },
            });

            $('#DetailCard').fadeIn();
     }

     function formatMoney(n) {
        return (Math.round(n * 100) / 100).toLocaleString();
    }

     function Add(Id,Jumlah){

      $.ajax({
      url : baseurl_detail + "Action",
      data: {"kdindex": Id, "Trigger": "getRupiahTahapan"},
      type: "post",
      dataType: "JSON",
      success: function(data)
          { 
            var jum = Jumlah;
            $('#kodeindex').val(Id);
            if(data['rupiah_tahapan'] == null || data['rupiah_tahapan'] == 0 || data['rupiah_tahapan'] == "null"){
              $('#jumlah').html(Jumlah);
            }else{
              var jum = Jumlah - data['rupiah_tahapan'];
              $('#jumlah').html(jum);
            }
            $('#dummy').val(jum);
            $('#nilai_app').val(Jumlah);
            $('#modal2').modal('open');   
          }
      });
        
     }

     $('.multi-field-wrapper').each(function() {
        var max      = 9;
        var $wrapper = $('.multi-fields', this);
        var x = 1;
        var i = 0;
        var tahapan = [
          "Pengumpulan Data",
          "Penelitian Awal",
          "Rapat/FGD Penyusunan Draft Pedoman", 
          "Diseminasi Draft Pedoman", 
          "Diseminasi Pedoman",
          "Pemahaman Objek Penugasan Pengawasan serta Identifikasi dan Mitigasi Risiko", 
          "Evaluasi SPI Objek Pengawasan", 
          "Penyusunan Laporan Hasil Penugasan", 
          "Pendistribusian Laporan Hasil Penugasan"];
        console.log(tahapan)
        $("#add-field", $(this)).click(function(e) {
           if(x < max){
              x++;
              i++;
              $($wrapper).append('<div class="multi-field">\
                      <div class="input-field col s12">\
                          <div class="input-field col s2">Tahapan '+tahapan[i]+'</div>\
                          <div class="input-field col s10 " >\
                            <input placeholder="00.000.000" id="rupiah'+x+'" name="rupiah'+x+'" type="number" min="1000" onkeyup=AllCount()>\
                          </div>\
                      </div>\
                    </div>');

            }
            
        });

        $("#remove-field").on("click", function() {  
            if ($('.multi-field', $wrapper).length > 1){
              $(".multi-fields").children().last().remove();  x--;
            }else{
              x = x
            }
        }); 
    });


    // $('input').keyup(function(){ 
  function AllCount(){


      var nilai_app1 = Number(document.getElementById('rupiah1').value)
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

      var nilai_app = Number($('#nilai_app').val())
      var total  = Number($('#jumlah').val());
      var dummy  = Number($('#dummy').val());

      if(total < dummy){
        $('#jumlah').html(dummy - (nilai_app1 + total_nilaiapp)); 
      }else{
        $('#jumlah').html(nilai_app - (nilai_app1 + total_nilaiapp)); 
      }
        

    if($('#jumlah').html() < 0){
          swal({
            title: "JUMLAH AKUN MINUS ! ", 
            icon: "warning",
            timer: 2000
            })

            var element = document.getElementById("jumlah");
                        element.classList.remove("cyan");
                        element.classList.add("red");
        }else{
          var element = document.getElementById("jumlah");
                        element.classList.remove("red");
                        element.classList.add("cyan");
        }
  }



$("#TambahApp").click(function (e) {
  e.preventDefault();

  var btn = $(this);
  var form = $(this).closest("form");
  var formData = new FormData($("#FormApp")[0]);
  var IdForm =  "FormApp";
  var countingDiv = document.getElementById('counting');
  var countRupiah = countingDiv.getElementsByTagName('input').length;

  btn
    .addClass("kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light")
    .attr("disabled", true);

  formData.append('Trigger', 'C')
  formData.append('countRupiah', countRupiah)
  // formData.append('app', $('#app').val())

  $.ajax({
    type: "POST",
    data: formData,
    url: baseurl_detail + "Action",
    processData: false,
    contentType: false,
    success: function (data, textStatus, jqXHR) {
              show_msg(textStatus);
              $('#modal2').modal('close');
              showDetailapp($('#kodeindex').val());
              Reset(IdForm);
              
              
          },
          error: function (jqXHR, textStatus, errorThrown) { },
      });
});

function Edit(Id){

  $.ajax({
      url : baseurl_detail + "Action",
      data: {"id": Id, "Trigger": "R"},
      type: "post",
      dataType: "JSON",
      success: function(data)
          {    
              $('#rupiah_tahapan_Edit').val(data['rupiah_tahapan']);
              $('#Id_Edit').val(Id);
              $('#th_pkpt_Edit').val(data['th_pkpt']);
              $('#kodeindex_Edit').val(data['kdindex']);

                var app = $("<option selected='selected'></option>").val(data['id_app']).text(data['id_app']+' - '+data['nama_app'])
                $("#app-select2_Edit").append(app).trigger('change');

              $('#modalEdit').modal('open');
          
          
          }
  });

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

  $.ajax({
    type: "POST",
    data: formData,
    url: baseurl_detail + "Action",
    processData: false,
    contentType: false,
    success: function (data, textStatus, jqXHR) {
              show_msg(textStatus);
              $('#modalEdit').modal('close');
              // set_grid_tabel(false);
              showDetailapp($('#kodeindex_Edit').val());
              Reset(IdForm);
              document.getElementById("EditMapping").disabled = false; 
              
              
          },
          error: function (jqXHR, textStatus, errorThrown) { },
      });
});

function Delete(Id,Kdindex) {
    swal({
    title: "Apakah Yakin Ingin Dihapus?",
    text: "Anda tidak bisa mengembalikan data yang telah dihapus!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Ya, Hapus!",
    cancelButtonText: "Batal",
  }).then(function (result) {
    if (result) {
      Execute(Id,Kdindex);
    }
  });
}

function Execute(Id,Kdindex) {
  var formData = new FormData();
  formData.append("Trigger", "D");
  formData.append("id", Id);

  $.ajax({
    type: "POST",
    data: formData,
    url: baseurl_detail + "Action",
    processData: false,
    contentType: false,
    success: function (data, textStatus, jqXHR) {

        show_msg(textStatus)
        //set_grid_tabel(true);
        showDetailapp(Kdindex);
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

</script>