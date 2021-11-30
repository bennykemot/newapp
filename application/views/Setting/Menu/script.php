<script>
    var baseurl 	    = "<?= base_url('Setting/Menu/')?>";
    var satker_session  = "<?= $this->session->userdata("kdsatker")?>"
    
    var grid_table = "#page-length-option";
    var groupColumn = 5;


      $(grid_table).DataTable({

            ajax: {
                url: baseurl + 'Master',
                type: "post",
                //data : {"kdindex": Id}
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
                    data: "kode_menu",
                },

                {
                    data: "nama_menu"
                },
                {
                    data: "icon_menu", 
                      render: function(data, type, row) {
                      return '<i class="material-icons">'+data+'</i>';
                        }
                },

                {
                    data: "link_menu",
                    render: function(data, type, row) {
                        var result = '<i class="material-icons">'+data+'</i>';
                        if(data == "pageMissing/pageMissing"){
                            result ='';

                        }
                      return result;
                        }
                },

                {
                    data: "parent_menu"
                },

                { data: 'status_menu'
                },

                { data: 'id',
                  render: function(data, type, row) {
                      return '<a href="javascript:;" onclick="Edit(\''+row.id+'\')"><i class="material-icons green-text">edit</i></a>\
                      <a  href="javascript:;" onclick="Delete(\''+row.id+'\')"><i class="material-icons red-text">delete</i></a>';
                  }
                },
               
 
            ],
            pageLength: 10,
            lengthChange: false,
            responsive: !0,
            //scrollX: true,
            serverSide: true,
            processing: true,
            searchDelay: 500,
            searching: false,
            ordering: true,
            bDestroy: true,
            bPaginate: false,
            bFilter: false,
            bInfo: false,
            scrollCollapse: true,
            columnDefs: [ { "visible": false, "targets": 5 }],
            
            drawCallback: function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;
            

 
            api.column(groupColumn, {page:'current'} ).data().each( function ( group, i ) {
                var vals = api.column(api.column($(rows).eq(i)).index()).data();
                if ( last !== group ) {
                    $(rows).eq( i ).before(
                        '<tr class="group"><td  style="background-color: #bbdefb"></td><td style="background-color: #bbdefb" colspan="7"><h6>'+group+'</h6></td></tr>'
                    );
 
                    last = group;
                }
            } );
        }
            });

function addMenu(){
	$('#modalAdd').modal('open');
}


$("#TambahMenu").click(function (e){
	e.preventDefault();

	var btn = $(this);
	var form 
});





    </script>
