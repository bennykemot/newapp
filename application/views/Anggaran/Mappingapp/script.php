<script>
    var baseurl 	= "<?= base_url('Anggaran/Mappingapp/')?>";
    var baseurl_detail 	= "<?= base_url('Anggaran/Detail_Mappingapp/')?>";
    var dropdown_baseurl 	= "<?= base_url('Master/Dropdown/')?>";
    var baseurl_master 	= "<?= base_url('Master/Master/')?>";
    var satker_session = "<?= $this->session->userdata("kdsatker")?>"

    function Reset(idForm) {
      document.getElementById(idForm).reset();
      $('#app-select2').val(null).trigger('change');
      document.getElementById("TambahApp").disabled = false; 
     
    }

      $(".app").change(function() {
        var button = document.getElementById("TambahApp");
        button.classList.remove("disabled");

        if($(".rupiah").val() == null || $(".rupiah").val() == 0 || $(".rupiah").val() == "0"){
          button.classList.add("disabled");
        }
      });

      // if($(".app").val() == null){

      //   var button = document.getElementById("TambahApp");
      //   button.classList.add("disabled");

      // }

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

      $('html,body').animate({
        scrollTop: $("#DetailCard").offset().top},
        'slow');
      $(grid_detail_app).DataTable({
            serverSide: true,
            processing: true,
            searchDelay: 500,
            searching: false,
            ordering: false,
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
                    data: "nama_tahapan",
                    render: function (data, type, row, meta) {
                        if(data == "All"){
                          return "-"
                        }else{
                          return data
                        }
                    }
                },

                {
                    data: "rupiah_tahapan", className: "text-right", render: $.fn.dataTable.render.number( ',', '.', 0 )
                },
                {
                    data: "th_pkpt"
                },

                { data: 'id',
                  render: function(data, type, row) {
                      return '<a href="javascript:;" onclick="Edit(\''+row.id+'\',\''+row.jumlah+'\')"><i class="material-icons">edit</i></a>\
                      <a  href="javascript:;" onclick="Delete(\''+row.id+'\',\''+row.kdindex+'\')"><i class="material-icons">delete</i></a>';
                  }
                },
               
 
            ],
            pageLength: 10,
            lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
            responsive: !0,
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, "All"],
            ],
            //scrollX: true,
            bFilter: false,
            scrollCollapse: true,
            columnDefs: [{ visible: false, targets: 1 }, { width: "50%", targets: 2 }],

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
                        '<td style="text-align: right" >'+formatMoney(sum)+'</td><td></td><td></td></tr>'
                        
                    );
                    
                    
            };

        },

        footerCallback: function ( row, data, start, end, display ) {
				var api = this.api();
				nb_cols = api.columns().nodes().length;
				var j = 3;
              var pageTotal = api
                    .column( j, { page: 'current'} )
                    .data()
                    .reduce( function (a, b) {
                        return Number(a) + Number(b);
                    }, 0 );
              // Update footer
              $( api.column( j ).footer() ).html(formatMoney(pageTotal));
              $('#total_app').val(pageTotal);
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

     function Add(Id,Jumlah,Kdkmpnen){

      $.ajax({
      url : baseurl_detail + "Action",
      data: {"kdindex": Id, "Trigger": "getRupiahTahapan"},
      type: "post",
      dataType: "JSON",
      success: function(data)
          { 
            var jum = Jumlah;
            $('#kodeindex').val(Id);
            if(data['rupiah_tahapan'] == null || data['rupiah_tahapan'] == 0 || data['rupiah_tahapan'] == "0" || data['rupiah_tahapan'] == "null"){
              $('#jumlah').html(Jumlah);
            }else{
              var jum = Jumlah - data['rupiah_tahapan'];
              $('#jumlah').html(jum);
            }
            $('#dummy').val(jum);
            $('#nilai_app').val(Jumlah);
            $('#kdkmpnen').val(Kdkmpnen);

            if(Kdkmpnen == "051" || Kdkmpnen == "052" || Kdkmpnen == "053"){
              if(Kdkmpnen == "052"){
                $(".tahapan_id_label").html("Tahapan Diseminasi Pedoman")
              }else if(Kdkmpnen == "053"){
                $(".tahapan_id_label").html("Tahapan Penyusunan Laporan Hasil Penugasan")
              }else if(Kdkmpnen == "051"){
                $(".tahapan_id_label").html("Tahapan Pengumpulan Data")
              }
              var element = document.getElementById("counting");
                        element.classList.remove("d-none");
            }else{
              var element2 = document.getElementById("divRupiah");
                        element2.classList.remove("d-none");

            }

            if( $('#jumlah').html() == 0){
              $(".rupiah").attr('disabled','disabled');

              var button = document.getElementById("add-field");
                button.classList.add("disabled");
            }

            var element = document.getElementById("jumlah");
                        element.classList.remove("red");
                      element.classList.add("cyan");
       
            var button = document.getElementById("TambahApp");
            button.classList.add("disabled");
            $('#modal2').modal('open');   
            
          }
      });
        
     }

     

     $('.modal-close').on("click", function() {
        location.reload(); 
     });


     $('.multi-field-wrapper').each(function() {
       

        var $wrapper = $('.multi-fields', this);

        j = 0
        x = 1
        $("#add-field", $(this)).click(function(e) {

          

          $.ajax({
          url : baseurl_master + "Tahapan",
          data: {"kdkmpnen": $('#kdkmpnen').val(),"Trigger": "getForMappingApp"},
          type: "post",
          dataType: "JSON",
          success: function(data)
              { 
              max = data.length
              
              if(x < max){
                  x++;
                  j++;
                  $($wrapper).append('<div class="multi-field">\
                          <div class="input-field col s12">\
                          <div class="input-field col s2"></div>\
                              <input id="tahapan'+x+'" name="tahapan'+x+'" value="'+data[j]['id']+'" hidden>\
                              <div class="input-field col s10 " >\
                                <input placeholder="00.000.000" class="rupiah validate" id="rupiah'+x+'" name="rupiah'+x+'" type="text" min="1000" onkeyup=AllCount() onkeypress="return validateNumber(event)">\
                                <label class="active" for="rupiah'+x+'">Tahapan '+data[j]['nama_tahapan']+'</label></div>\
                          </div>\
                        </div>');

                        if( $('#jumlah').html() == 0){
                          $(".rupiah").attr('disabled','disabled');
                        }
                        
                }
              }
          });

          
            
        });

        $("#remove-field").on("click", function() {  
            if ($('.multi-field', $wrapper).length > 1){
              $(".multi-fields").children().last().remove();  x--; j--;
                if(j == 0){
                  j = 0;
                }
            }else{
              x = x
            }
        }); 
    });


  function Count(){

    if($('#rupiah_tahapan_Edit').val() == "0" ||$('#rupiah_tahapan_Edit').val() == 0|| $('#rupiah_tahapan_Edit').val() == "0" || $('#rupiah_tahapan_Edit').val() ==0){
      document.getElementById("EditMapping").disabled = true;
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

    $('#rupiah_Edit').html(current_sisa_akun); 


    // if($('#rupiah_Edit').html() == 0){
    //     document.getElementById("EditMapping").disabled = true;
    //   }else{
    //     document.getElementById("EditMapping").disabled = false;
    //   }
     
    

      if($('#rupiah_Edit').html() < 0){
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
  function AllCount(){

    // if($('#jumlah').html() == "0" ||$('#jumlah').html() == 0){
    //   var button = document.getElementById("TambahApp");
    //         button.classList.add("disabled");
    // }else{
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

      var nilai_app = Number($('#nilai_app').val())
      var total  = Number($('#jumlah').val());
      var dummy  = Number($('#dummy').val());

      if(total < dummy){
        $('#jumlah').html(dummy - ((nilai_app1 + nilai_app_All ) + total_nilaiapp)); 
      }else{
        $('#jumlah').html(nilai_app - ((nilai_app1 + nilai_app_All) + total_nilaiapp)); 
      }

      // if($('#jumlah').html() <= 0){
      //   document.getElementById("TambahApp").disabled = true;
      // }else{
      //   document.getElementById("TambahApp").disabled = false;
      // }

      var buttonadd = document.getElementById("add-field");
      buttonadd.classList.remove("disabled");

      if($('#jumlah').html() == 0){
        var buttonadd = document.getElementById("add-field");
            buttonadd.classList.add("disabled");
      }
        

    if($('#jumlah').html() < 0){
          swal({
            title: "JUMLAH AKUN MINUS ! ", 
            icon: "warning",
            timer: 2000
            })

            
            var button = document.getElementById("TambahApp");
            button.classList.add("disabled");

            var buttonadd = document.getElementById("add-field");
            buttonadd.classList.add("disabled");

            


            var element = document.getElementById("jumlah");
                        element.classList.remove("cyan");
                        element.classList.add("red");
        }else{
          var button = document.getElementById("TambahApp");
            button.classList.remove("disabled");
          var element = document.getElementById("jumlah");
                        element.classList.remove("red");
                        element.classList.add("cyan");
        }

    // }
  }



$("#TambahApp").click(function (e) {
  e.preventDefault();


  var btn = $(this);
  var form = $(this).closest("form");
  var formData = new FormData($("#FormApp")[0]);
  var IdForm =  "FormApp";
  var countingDiv = document.getElementById('counting');
  var countRupiah = countingDiv.getElementsByClassName('rupiah').length;

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

function Edit(Id,Jumlah){

  $.ajax({
      url : baseurl_detail + "Action",
      data: {"id": Id, "Trigger": "R"},
      type: "post",
      dataType: "JSON",
      success: function(data)
          {    
              $('#rupiah_tahapan_Edit').val(data['rupiah_tahapan']); //rupiah per Tahapan
              $('#rupiah_tahapan_dummy').val(data['rupiah_tahapan']); //rupiah per Tahapan UNTUK DUMMY TIDAK BERUBAH

              var total_app = Number($('#total_app').val()); //Total App

              var rupiah_Edit = Number(Jumlah) - total_app //Ini untuk hasil count kotak biru

              $('#rupiah_Edit').val(rupiah_Edit);
              $('#rupiah_Edit').html(rupiah_Edit); //hasil kotak biru

              $('#total_akun').val(Number(Jumlah));

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

    $(function () {


$("#page-length-option").DataTable({
    responsive: !0,
    lengthMenu: [
        [10, 25, 50, -1],
        [10, 25, 50, "All"],
    ],
    order: [[ 'kdindex']],
    scrollX: true
}),
    $("#scroll-dynamic").DataTable({ responsive: !0, scrollY: "50vh", scrollCollapse: !0, paging: !1 }),
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