<script>

var baseurl 	= "<?= base_url('User/User/')?>";

function Edit(Id){

$.ajax({
      url : baseurl + "Action",
      data: {"id": Id, "Trigger": "R"},
      type: "post",
      dataType: "JSON",
      success: function(data)
          {    
              $('#username').val(data['username']);
              $('#password').val(data['password']);

                $('#idUser').val(Id);

              $('#modal2').modal('open');
          
          
          }
  });

}

$("#TambahUser").click(function (e) {
  e.preventDefault();

  var btn = $(this);
  var form = $(this).closest("form");
  var formData = new FormData($("#FormUser_Edit")[0]);
  var IdForm =  "FormUser_Edit";

  btn
    .addClass("kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light")
    .attr("disabled", true);

  formData.append('Trigger', 'U')

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
              document.getElementById("EditUser").disabled = false; 
              
              
          },
          error: function (jqXHR, textStatus, errorThrown) { },
      });
});

    function show_msg(status, msg){
        swal({
            title:msg, 
            icon:status,
            timer: 2000
            })
    }

</script>