<script>
    var re_direct 	= "<?= base_url('Anggaran/Mappingapp/Tambah/')?>";
    var baseurl 	= "<?= base_url('Anggaran/Mappingapp/')?>";
    var baseurl_detail 	= "<?= base_url('Anggaran/Detail_Mappingapp/')?>";
    var dropdown_baseurl 	= "<?= base_url('Master/Dropdown/')?>";
    var baseurl_master 	= "<?= base_url('Master/Master/')?>";
    var satker_session = "<?= $this->session->userdata("kdsatker")?>"
    var role_session = "<?= $this->session->userdata("role_id")?>"
    var user_session = "<?= $this->session->userdata("user_id")?>"
    var kdindex_session = "<?= $this->uri->segment('4')?>"

    function Reset(idForm) {
      document.getElementById(idForm).reset();
      $('#app-select2').val(null).trigger('change');
      document.getElementById("TambahApp").disabled = false; 
     
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

        $("#tahapan-select2").select2({
          dropdownAutoWidth: true,
          width: '100%',
          placeholder: "Pilih Tahapan",
         ajax: { 
          url : dropdown_baseurl + "tahapan",
          type: "post",
          dataType: "JSON",
           data: function (params) {
              return {
                kdkmpnen: $('#kdkmpnen').val(),
                kdskmpnen : $('#kdskmpnen').val().replace('%20', ''),
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

    $(function() {
    $('#tb-mappingapp').DataTable( {

      lengthMenu: [
            [10, 25, 50, -1],
            [10, 25, 50, "All"],
        ],
        responsive: true,
        scrollX: true,
        info: false,
         } );

         $('#tb-app').DataTable( {

        lengthMenu: [
              [10, 25, 50, -1],
              [10, 25, 50, "All"],
          ],
          responsive: true,
          scrollX: true,
          info: false,
          } );
              } );

    $(document).ready(function() { 

      

      // var Kdkmpnen = $('#kdkmpnen').val()
      // var kodesbkmpnen =$('#kdskmpnen').val().replace('%20', '')
      // var Id = $('#kdindex').val().replace('%20', ' ');

        $.ajax({
        url : baseurl_detail + "Alokasi",
        data: {"kdindex": kdindex_session},
        type: "post",
        dataType: "JSON",
        success: function(data)
            { 
              var kdkmpnen = data[0]['kdkmpnen'] 
              var kdskmpnen = data[0]['kdskmpnen'] 
              $('#kdkmpnen').val(data[0]['kdkmpnen'])
              $('#kdskmpnen').val(data[0]['kdskmpnen'])
              $('#kdsoutput').val(data[0]['kdsoutput'])
                //IF ALOKASI 
                  if(data[0]['alokasi'] == null){
                    $('#jumlah').val(data[0]['rupiah'])
                    $('#alokasi').val(0)
                    $('#nilaiakun').val(data[0]['rupiah'])
                    $('#sisa').val(data[0]['rupiah'])
                  }else{
                    $('#alokasi').val(data[0]['alokasi'])
                    $('#nilaiakun').val(data[0]['rupiah'])
                    var Alokasi = $('#alokasi').val()
                    var Sisa = Number(data[0]['rupiah']) - Number(data[0]['alokasi'])
                    $('#jumlah').val(Sisa)
                    $('#sisa').val(Sisa)
                  }

                  

                  //IF KDKMPNEN

                    if(kdkmpnen == "052"){
                      //IF KDSKMPNEN
                        if(kdskmpnen == " A"){
                          var element = document.getElementById("counting");
                                      element.classList.remove("d-none");
                          $(".tahapan_id_label").html("Tahapan Diseminasi Pedoman")

                        }else if(kdskmpnen == " C"){
                        var element = document.getElementById("counting");
                                      element.classList.remove("d-none");
                                      $(".tahapan_id_label").html("Tahapan Penyusunan Laporan Hasil Penugasan")


                        }else{
                          var element2 = document.getElementById("divRupiah");
                                        element2.classList.remove("d-none");
                        }

                  }else if(kdkmpnen == "051"){

                    //IF KDSKMPNEN

                      if(kdskmpnen == " A"){
                        var element = document.getElementById("counting");
                                    element.classList.remove("d-none");
                      }else{
                        var element2 = document.getElementById("divRupiah");
                                      element2.classList.remove("d-none");
                      }

                  }else{

                    var element2 = document.getElementById("divRupiah");
                                  element2.classList.remove("d-none");
                    var element3 = document.getElementById("divTahapan");
                                  element3.classList.add("d-none");

                  }

                  //IF JUMLAH 0

                      if( $('#jumlah').val() <= 0){
                        $(".rupiah").attr('disabled','disabled');

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



            ////////TABLE BAWAH

      var grid_detail_app = "#tb-app";
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
                data : {"kdindex": kdindex_session}
            },

                
            autoWidth: false,

        //     drawCallback: function ( settings ) {
        //     var api = this.api();
        //     var rows = api.rows( {page:'current'} ).nodes();
        //     var last=null;
        //     var subTotal = new Array();
        //     var groupID = -1;
        //     var aData = new Array();
        //     var index = 0;
            
        //     api.column(0, {page:'current'} ).data().each( function ( group, i ) {
            
        //       var vals = api.row(api.row($(rows).eq(i)).index()).data();
        //       var salary = vals['rupiah_tahapan'] ? parseFloat(vals['rupiah_tahapan']) : 0;
               
        //       if (typeof aData[group] == 'undefined') {
        //          aData[group] = new Array();
        //          aData[group].rows = [];
        //          aData[group].salary = [];
        //       }
          
        //    		aData[group].rows.push(i); 
        // 			aData[group].salary.push(salary); 
                
        //     } );
    

        //     var idx= 0;

      
        //   	for(var office in aData){
       
				// 					 idx =  Math.max.apply(Math,aData[office].rows);
      
        //            var sum = 0; 
        //            $.each(aData[office].salary,function(k,v){
        //                 sum = sum + v;
        //            });
  			// 						// console.log(aData[office].salary);
        //            $(rows).eq( idx ).after(
        //                 '<tr class="group" style="background-color: #b9f6d8 !important; color: #000"><td>'+office+'</td>'+
        //                 '<td style="text-align: right" >'+formatMoney(sum)+'</td><td></td></tr>'
                        
        //             );
                    
                    
        //     };

        // },

        "drawCallback": function ( settings ) {
	var api = this.api(),data;
	var rows = api.rows( {page:'current'} ).nodes();
	var last=null;
	
	// Remove the formatting to get integer data for summation
	var intVal = function ( i ) {
		return typeof i === 'string' ?
			i.replace(/[\$,]/g, '')*1 :
			typeof i === 'number' ?
				i : 0;
	};

	total=new Array();
	api.column(0, {page:'current'} ).data().each( function ( group, i ) {
	    group_assoc=group.replace(' ',"_");
        if(typeof total[group_assoc] != 'undefined'){
            total[group_assoc]=total[group_assoc]+intVal(api.column(2).data()[i]);
        }else{
            total[group_assoc]=intVal(api.column(2).data()[i]);
        }
		if ( last !== group ) {
			$(rows).eq( i ).before(
				'<tr class="group"><td colspan="4">'+group+'</td><td class="'+i+'"></td></tr>'
			);
			
			last = group;
		}
	} );
    for(var key in total) {
        $("."+key).html("$"+total[key]);
    }
},

            // drawCallback: function(settings) {
            //   var api = this.api();
            //   var rows = api.rows({page: 'current'}).nodes();
            //   var last = null;

            //   api.column(0, {page: 'current'}).data().each(function(group, i) {
            //                     if (last !== group) {
            //                       $(rows).eq(i).before(
            //                           '<tr class="group" style="background-color: #b9f6d8 !important; color: #000"><td>'+group+'</td></tr>',
            //                               );
                                  
            //                               }
            //       last = group;
            //   });
            // },
            columns: [
             
              

                {
                    data: "nama_app"
                },
                {
                    data: "nama_tahapan",
                    render: function (data, type, row, meta) {
                        if(data == "All"){
                          return row.nama_app
                        }else{
                          return data
                        }
                    }
                },

                {
                    data: "rupiah_tahapan", className: "text-right", render: $.fn.dataTable.render.number( ',', '.', 0 )
                },

                { data: 'id', class:"text-center",
                  render: function(data, type, row) {
                      return '<a href="javascript:;" onclick="Edit(\''+row.id+'\',\''+row.kdindex+'\')"><i class="material-icons green-text">edit</i></a>\
                      <a  href="javascript:;" onclick="Delete(\''+row.id+'\',\''+row.kdindex+'\')"><i class="material-icons red-text">delete</i></a>';
                  }
                },
               
 
            ],
            pageLength: -1,
            lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
            responsive: !0,
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, "All"],
            ],
            //scrollX: true,
            bFilter: false,
            scrollCollapse: true,
            columnDefs: [{ visible: false, targets: 0 }, { width: "50%", targets: 2 }],


        footerCallback: function ( row, data, start, end, display ) {
				var api = this.api();
				nb_cols = api.columns().nodes().length;
				var j = 2;
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

    });

    function formatMoney(n) {
        return (Math.round(n * 100) / 100).toLocaleString();
    }

    function Add(Id,Jumlah,Kdkmpnen,Kdskmpnen){

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

          kodesbkmpnen = Kdskmpnen.replace(/\s/g, '');
          $('#dummy').val(jum);
          $('#nilai_app').val(Jumlah);
          $('#kdkmpnen').val(Kdkmpnen);
          $('#kdskmpnen').val(kodesbkmpnen);

          if(Kdkmpnen == "052"){
            if(kodesbkmpnen == "A"){
              var element = document.getElementById("counting");
                          element.classList.remove("d-none");
              $(".tahapan_id_label").html("Tahapan Diseminasi Pedoman")

            }else if(kodesbkmpnen == "C"){
            var element = document.getElementById("counting");
                          element.classList.remove("d-none");
                          $(".tahapan_id_label").html("Tahapan Penyusunan Laporan Hasil Penugasan")


            }else{
              var element2 = document.getElementById("divRupiah");
                            element2.classList.remove("d-none");
            }

          }else if(Kdkmpnen == "051"){

            if(kodesbkmpnen == "A"){
              var element = document.getElementById("counting");
                          element.classList.remove("d-none");
            }else{
              var element2 = document.getElementById("divRupiah");
                            element2.classList.remove("d-none");
            }

          }else{

            var element2 = document.getElementById("divRupiah");
                          element2.classList.remove("d-none");

          }


          if( $('#jumlah').html() <= 0){
            $(".rupiah").attr('disabled','disabled');

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
          $('#modal2').modal('open', { dismissible: false, complete: function() { console.log('Close modal'); } });   
          
        }
    });
  
  }

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

  $('#jumlah').val(sisa - (nilai_app1 + nilai_app_All + total_nilaiapp))

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

  if($('#jumlah').val() == 0){
    var buttonadd = document.getElementById("add-field");
        buttonadd.classList.add("disabled");
  }
    

if($('#jumlah').val() < 0){
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
          data: {"kdkmpnen": $('#kdkmpnen').val(),
          "kdskmpnen": $('#kdskmpnen').val().replace(/\s+/g, ''),
          "Trigger": "getForMappingApp"},
          type: "post",
          dataType: "JSON",
          success: function(data)
              { 
              max = data.length
              
              if(x < max){
                  x++;
                  j++;
                  $($wrapper).append('<div class="multi-field">\
                          <div class="input-field">\
                          <div class="input-field"></div>\
                              <input id="tahapan'+x+'" name="tahapan'+x+'" value="'+data[j]['id']+'" hidden>\
                              <div class="input-field" >\
                                <input placeholder="00.000.000"  autocomplete="off" class="rupiah validate" id="rupiah'+x+'" name="rupiah'+x+'" type="text" min="1000" onkeyup=AllCount() onkeypress="return validateNumber(event)">\
                                <label style="font-size: 13px !Important" class="active" for="rupiah'+x+'">Tahapan '+data[j]['nama_tahapan']+'</label></div>\
                          </div>\
                        </div>');

                        if( $('#jumlah').val() == 0){
                          $(".rupiah").attr('disabled','disabled');
                        }
                        
                }
              }
          });

          
            
        });

        $("#remove-field").on("click", function() {  
            if ($('.multi-field', $wrapper).length > 1){
              $(".multi-fields").children().last().remove();  x--; j--;
                if(j <= 0){
                  j = 0;
                }
            }else{
              x = x
            }
        }); 
    });


  



$("#TambahApp").click(function (e) {

  if($('#app-select2').val() == null || $('#app-select2').val() == "" || $('#app-select2').val() == "null"){
    swal({
            title:"APP Masih Kosong", 
            icon:"warning",
            timer: 2000
            })
    
    return false;
  }

  if($('#jumlah').val() < 0){
          swal({
            title: "JUMLAH AKUN MINUS ! ", 
            icon: "warning",
            timer: 2000
            })
            return false;

          }
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
  
  
  var Kdkmpnen = $('#kdkmpnen').val()
  var kodesbkmpnen =$('#kdskmpnen').val().replace(/\s+/g, '')

  if(Kdkmpnen == "052"){
              if(kodesbkmpnen == "A"){
                formData.append('tahapan1', 5)
              }else if(kodesbkmpnen == "C"){
                formData.append('tahapan1', 9)
              }else{
                formData.append('tahapan1', "All")
              }

            }else if(Kdkmpnen == "051"){

              if(kodesbkmpnen == "A"){
                formData.append('tahapan1', 1)
              }else{
                formData.append('tahapan1', "All")
              }

            }else{

              formData.append('tahapan1', "All")

            }

  

  $.ajax({
    type: "POST",
    data: formData,
    url: baseurl_detail + "Action",
    processData: false,
    contentType: false,
    success: function (data, textStatus, jqXHR) {
              show_msg(textStatus);

              // var alokasi_now = (Number(alokasi_session) - Number(Rupiah))
              // window.location.href = re_direct + kdindex_session+'/'+kdkmpnen_session+'/'+kdskmpnen_session+'/'+rupiah_session+'/'+kdsoutput_session+'/'+alokasi_now
        
              location.reload();
              Reset(IdForm);
              
              
          },
          error: function (jqXHR, textStatus, errorThrown) { },
      });
});

function Edit(Id,Kdindex) {

  window.location.href = baseurl_detail + "Ubah/"+Id+"/"+Kdindex+""

  
  
}



function Delete(Id,Rupiah) {
    swal({
    title: "Apakah Yakin Ingin Dihapus?",
    text: "Anda tidak bisa mengembalikan data yang telah dihapus!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Ya, Hapus!",
    cancelButtonText: "Batal",
  }).then(function (result) {
    if (result) {
      Execute(Id,Rupiah);
    }
  });
}

function Execute(Id,Rupiah) {
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
        window.location.href = re_direct + kdindex_session
        //location.reload();
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