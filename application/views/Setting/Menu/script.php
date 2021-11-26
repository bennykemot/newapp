<script>
    var baseurl 	    = "<?= base_url('Setting/Menu/')?>";
    var satker_session  = "<?= $this->session->userdata("kdsatker")?>"
    
    var grid_table = "#page-length-option";
    var groupColumn = 6;
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
                    data: "id"
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
                    data: "link_menu"
                },

                {
                    data: "parent_menu"
                },

                { data: 'status_menu'
                //   render: function(data, type, row) {
                //       return '<a href="javascript:;" onclick="Edit(\''+row.id+'\',\''+row.jumlah+'\')"><i class="material-icons">edit</i></a>\
                //       <a  href="javascript:;" onclick="Delete(\''+row.id+'\',\''+row.kdindex+'\')"><i class="material-icons">delete</i></a>';
                //   }
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
            ordering: false,
            bDestroy: true,
            bPaginate: false,
            bFilter: false,
            bInfo: false,
            scrollCollapse: true,
            columnDefs: [{ visible: false, targets: 6 }],
            
            drawCallback: function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;
 
            api.column(groupColumn, {page:'current'} ).data().each( function ( group, i ) {
                if ( last !== group ) {
                    $(rows).eq( i ).before(
                        '<tr class="group"><td colspan="7">'+group+'</td></tr>'
                    );
 
                    last = group;
                }
            } );
        }
            });

    </script>