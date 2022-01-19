<script>

var  baseurl	= "<?= base_url('Anggaran/Transfer/')?>";
var satker_session = "<?= $this->session->userdata("kdsatker")?>";
var thang_session = "<?= $this->session->userdata("thang")?>";

var test = "<?= base_url("test")?>"




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
    var file = $('#shad_file').val();
    if (!file) {
            swal("File Belum di Upload", "Upload File Dengan Benar !", "info")
            return false;
        }else{
            var name = file.split(".");
            var ext = name[1];
            var name_file = name[0];

            var cek_satker = name_file.substring(19,13);
            if(cek_satker !=  satker_session){
                swal("Kode Satker Salah", "nama file harus sesuai dgn kdsatker", "warning")
                return false;
            }
            
        }

        swal({
            title:"Upload Loading ...", 
            icon: "info",
            timer: 2000,
            buttonsStyling: false,
            // className: {
            //     confirmButton: 'd-none' //insert class here
            // }

            })

        
     $.ajax({
        url : baseurl + 'getPagu_Norevisi',
        type : "POST",
        dataType : "json",
        async: false,
        data : {"kdsatker" : satker_session},
        success : function(data) {

            if(data.length == 0){
                revisiKe = 0
            }else{
                var revisiKe = data[0].revisike;
            }

             

             if(revisiKe == ""){
                revisiKe = 0
             }

            var file = $('#shad_file').val();
            var name = file.split(".");
            var ext = name[1];
            var name_file = name[0];


             if(ext.length == 3){
                    formData.append("no_revisi", "00");
                    no_revisi = 0;
                    sbstring = 4
            }else{
                    formData.append("no_revisi", ext.substring(4, 5))
                    no_revisi = ext.substring(4, 5);
                    sbstring = 3
            }

             if(ext.substring(1, sbstring)!= thang_session.substring(2, 4)){
                swal("Warning", "Tahun Anggaran Tidak Sesuai!", "warning")
                return false;
                }

            if(no_revisi < revisiKe){
                swal("Warning", "Nomor Revisi Harus >= Data Pagu", "warning")
                return false;
                }
            
            
            
            formData.append("revisike", revisiKe);
            formData.append("dumNamaFile", name_file);

            var file = $('#shad_file').val();
            var name = file.split(".");
            var ext = name[1];
            var name_file = name[0];

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



        $.ajax({
            type: "POST",
            data: formData,
            url: baseurl + 'upload',
            processData: false,
            contentType: false,
            success: function (data, textStatus, jqXHR) {
                console.log(response);
                show_msg("success", "Berhasil Upload File");
                $('#alert-Pagu').fadeIn()
                $('#alert-Item').fadeIn()
                $('#alert-SubOutput').fadeIn()
                $('#alert-Komponen').fadeIn()
                $('#alert-SubKomponen').fadeIn()

                $('#alert-Pagu').addClass('animated fadeOutUp delay-1s');
                $('#alert-Item').addClass('animated fadeOutUp delay-2s');
                $('#alert-SubOutput').addClass('animated fadeOutUp delay-3s');
                $('#alert-Komponen').addClass('animated fadeOutUp delay-4s');
                $('#alert-SubKomponen').addClass('animated fadeOutUp delay-5s');
                Reset(IdForm)

            //     setTimeout(function() {
            //       location.reload();
            //    }, 5000);
            },
            error: function (jqXHR, textStatus, errorThrown) { },
        });

        


        },

        
        
    });
    

   
})

// $('.btn-upload').click(function (e) {
//     e.preventDefault();
//     var zip = new JSZip();
//     zip.file($('#file_').val());
//     zip.generateAsync({type:"blob"})
//     .then(function(content) {

//         //var files = new File([content], "test.zip");
//         // see FileSaver.js
//         saveAs(content, "example.zip");
//     });
// });



function show_msg(status,msg){
        swal({
            title:msg, 
            icon:status,
            timer: 2000
            })
    }




</script>