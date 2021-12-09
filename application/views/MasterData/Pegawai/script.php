<script>
    var baseurl 	= "<?= base_url('Master/Pegawai/')?>";
    var dropdown_baseurl 	= "<?= base_url('Master/Dropdown/')?>";
	//var satker_session = "<?= $this->session->userdata("kdsatker")?>"
    

$('select').select2().on('select2:open', function() {
      var container = $('.select2-container').last();
  /*Add some css-class to container or reposition it*/
});

function Reset(idForm) {
  document.getElementById(idForm).reset();
  $('.browser-default').val(null).trigger('change');
}

$(document).ready(function() {
    $('#tb-pegawai').DataTable( {

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

</script>
