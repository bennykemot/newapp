<script>
  var baseurl 	= "<?= base_url('Master/PPK/')?>";
	var satker_session = "<?= $this->session->userdata("kdsatker")?>";
	//var nip = document.getElementById("nip").value(nip.options[nip.selectedIndex].value);
    

$(document).ready(function() {
    $('#tb-ppk').DataTable( {

      lengthMenu: [
            [10, 25, 50, -1],
            [10, 25, 50, "All"],
        ],
        responsive: true,
        scrollX: true,
        info: false
         } );
      } );

function show_msg(status,message){
        swal({
            title:message, 
            icon:status,
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
		  paging: !0,
		  scrollX: !0,
		  info: false,
    }),
        $("#scroll-dynamic").DataTable({ responsive: !0, scrollX: "50vh", scrollCollapse: !0, paging: !1 }),
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

$("#TambahPPK").click(function (e) {
  e.preventDefault();

  var btn = $(this);
  var form = $(this).closest("form");
  var formData = new FormData($("#FormPPK")[0]);
  var IdForm =  "FormPPK";

  btn
    .addClass("kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light")
    .attr("disabled", true);

  formData.append('Trigger', 'C')
  //formData.append('getPejabat', $("#pejabat-select2 option:selected").text())

    $.ajax({
      type: "POST",
      data: formData,
      url: baseurl + "Action",
      processData: false,
      contentType: false,
      success: function (data, textStatus, jqXHR) {
        var res = JSON.parse(data)
              show_msg(res.status, res.msg);
              $('#modal2').modal('close');
              setTimeout(function() {
                  location.reload();
               }, 2000);
              Reset(IdForm);
              document.getElementById("TambahPPK").disabled = false; 
              
              
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

              var res = JSON.parse(data)
              show_msg(res.status, res.msg);
        setTimeout(function() {
                  location.reload();
               }, 2000);
    },
    error: function (jqXHR, textStatus, errorThrown) { },
  });
}

function Edit(Id){

$.ajax({
      url : baseurl + "Action",
      data: {"id": Id, "Trigger": "R"},
      type: "post",
      dataType: "JSON",
      success: function(data)
          {    
              
              $('#uraianppk_Edit').val(data['uraianppk']);

              $('#idPPK').val(Id);

              $('#modalEdit').modal('open');
          
          
          }
  });

}

$("#EditPejabat").click(function (e) {
  e.preventDefault();

  var btn = $(this);
  var form = $(this).closest("form");
  var formData = new FormData($("#FormPejabat_Edit")[0]);
  var IdForm =  "FormPejabat_Edit";

  btn
    .addClass("kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light")
    .attr("disabled", true);

  formData.append('Trigger', 'U')
  formData.append('nama_pejabat', $("#pejabat-select2_Edit option:selected").text())

  $.ajax({
    type: "POST",
    data: formData,
    url: baseurl + "Action",
    processData: false,
    contentType: false,
    success: function (data, textStatus, jqXHR) {
              var res = JSON.parse(data)
              show_msg(res.status, res.msg);
              $('#modalEdit').modal('close');
              setTimeout(function() {
                  location.reload();
               }, 2000);
              Reset(IdForm);
              document.getElementById("EditPejabat").disabled = false; 
              
              
          },
          error: function (jqXHR, textStatus, errorThrown) { },
      });
});




  


</script>
