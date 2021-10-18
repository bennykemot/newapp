<script>

var  baseurl	= "<?= base_url('Anggaran/Transfer/')?>";
var satker_session = "<?= $this->session->userdata("kdsatker")?>";

function Reset(idForm) {
      document.getElementById(idForm).reset();
    }


function Upload(){
        $('#file_').click();
    }

    $('#file_').on('change', function () {
    var file = this.files[0];
    if (file) {
        $('#shad_file').val(file.name);
    }
});

//////////////////UPLOAD/////////////////////////
$('.btn-upload').click(function (e) {
    e.preventDefault();

    var btn = $(this);
    var form = $(this).closest("form");
    var formData = new FormData($("#form-import")[0]);
    var IdForm = "form-import";
    var revisiKe = "";

    $.ajax({
        url : baseurl + 'getPagu_Norevisi',
        type : "POST",
        dataType : "json",
        data : {"kdsatker" : satker_session},
        success : function(data) {
            revisiKe = data.revisike;
        },
        error : function(data) {
            // do something
        }
    });

    var file = $('#shad_file').val();
    var name = file.split(".");
    var ext = name[1];
    var name_file = name[0];
    var no_revisi = "";

    var cek_satker = name_file.substring(19,13);

    if (!file) {
        swal("File Belum di Upload", "Upload File Dengan Benar !", "info")
        return false;
    }else{
         if(cek_satker !=  satker_session){
            swal("Kode Satker Salah", "nama file harus sesuai dgn kdsatker", "warning")
            return false;
         }
         
    }
    

    if(ext.length == 3){
        formData.append("no_revisi", "00");
         no_revisi = "00";
    }else{
        formData.append("no_revisi", ext.substring(3, 5))
         no_revisi = ext.substring(3, 5);
    }

    if(no_revisi < revisiKe ){
        swal("Warning", "Nomor Revisi Harus >= Data Pagu", "warning")
        return false;
    }
    
    


    $.ajax({
        type: "POST",
        data: formData,
        url: baseurl + 'Upload',
        processData: false,
        contentType: false,
        success: function (data, textStatus, jqXHR) {
            var res = JSON.parse(data)
            show_msg(res.status, res.msg);
            Reset(IdForm)
        },
        error: function (jqXHR, textStatus, errorThrown) {
            show_msg(res.status, res.msg);
        },
    });
})

function show_msg(status,msg){
        swal({
            title:msg, 
            icon:status,
            timer: 2000
            })
    }




</script>