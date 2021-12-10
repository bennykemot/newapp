<script>
    var baseurl 	= "<?= base_url('Anggaran/Mappingapp/')?>";
    var baseurl_detail 	= "<?= base_url('Anggaran/Detail_Mappingapp/')?>";
    var dropdown_baseurl 	= "<?= base_url('Master/Dropdown/')?>";
    var baseurl_master 	= "<?= base_url('Master/Master/')?>";
    var satker_session = "<?= $this->session->userdata("kdsatker")?>"
    var role_session = "<?= $this->session->userdata("role_id")?>"
    var user_session = "<?= $this->session->userdata("user_id")?>"
    var rupiah_session = "<?= $this->uri->segment('7')?>"
    var kdsoutput_session = "<?= $this->uri->segment('8')?>"

    function Reset(idForm) {
      document.getElementById(idForm).reset();
      $('#app-select2').val(null).trigger('change');
      document.getElementById("TambahApp").disabled = false; 
     
    }

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

      var Kdkmpnen = $('#kdkmpnen').val()
      var kodesbkmpnen =$('#kdskmpnen').val().replace('%20', '')
      var Id = $('#kdindex').val().replace('%20', ' ');
      var Jumlah =$('#jumlah').val()

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
              $('#jumlah').val(Jumlah);
            }else{
              var jum = rupiah_session - data['rupiah_tahapan'];
              $('#jumlah').val(jum);
            }

            //kodesbkmpnen = Kdskmpnen.replace(/\s/g, '');
            $('#dummy').val(jum);
            $('#nilai_app').val(Jumlah);
            // $('#kdkmpnen').val(Kdkmpnen);
            // $('#kdskmpnen').val(kodesbkmpnen);

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
            //$('#modal2').modal('open', { dismissible: false, complete: function() { console.log('Close modal'); } });   
            
          }
      });
    
    
    });

      // $(".app").change(function() {
      //   var button = document.getElementById("TambahApp");
      //   button.classList.remove("disabled");

      //   // if($(".rupiah").val() == null || $(".rupiah").val() == 0 || $(".rupiah").val() == "0"){
      //   //   button.classList.add("disabled");
      //   // }
      // });
        // SELECT2 INSERT

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
                kdsoutput : kdsoutput_session,
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


     



    //  var grid_table = "#tabel-mapping";
    //  $(grid_table).DataTable({

    //       ajax: {
    //           url: baseurl + 'get_table',
    //           type: "post",
    //           data : {"satker": satker_session}
    //       },
              
    //       autoWidth: false,
    //       columns: [

    //           {data: "kode"},

    //           {data: "uraian"},

    //           {data: "jumlah",className: "text-right", render: $.fn.dataTable.render.number( ',', '.', 0 )},

    //           { data: 'kdindex',
    //               render: function(data, type, row) {
    //                   return '<a href="javascript:;" onclick="Edit(\''+row.kdindex+'\')"><i class="material-icons">edit</i></a>\
    //                   <a  href="javascript:;" onclick="Delete(\''+row.kdindex+'\')"><i class="material-icons">delete</i></a>';
    //               }
    //             },

    //       ],

    //       pageLength: 10,
    //       lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
    //       responsive: !0,
    //       serverSide: true,
    //       processing: true,
    //       bDestroy: true,
    //       bPaginate: true,
    //       bFilter: false,
    //       bInfo: false,
    //       lengthChange: false,

    //       });
     
     


     var grid_detail_app = "#tabel_mapping_detail";
     //function showDetailapp(Id){

        
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
                data : {"kdindex": $('#kdindex').val().replace('%20', ' ')}
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

           // $('#DetailCard').fadeIn();
     //}

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
          "kdskmpnen": $('#kdskmpnen').val().replace('%20', ''),
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
                                <input placeholder="00.000.000" class="rupiah validate" id="rupiah'+x+'" name="rupiah'+x+'" type="text" min="1000" onkeyup=AllCount() onkeypress="return validateNumber(event)">\
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
        $('#jumlah').val(dummy - ((nilai_app1 + nilai_app_All ) + total_nilaiapp)); 
      }else{
        $('#jumlah').val(nilai_app - ((nilai_app1 + nilai_app_All) + total_nilaiapp)); 
      }

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



$("#TambahApp").click(function (e) {

  if($('#app-select2').val() == null || $('#app-select2').val() == "" || $('#app-select2').val() == "null"){
    swal({
            title:"APP Masih Kosong", 
            icon:"warning",
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
  var kodesbkmpnen =$('#kdskmpnen').val().replace('%20', '')

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
              location.reload();
              Reset(IdForm);
              
              
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
        location.reload();
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