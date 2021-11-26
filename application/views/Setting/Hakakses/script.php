<script>
    var baseurl 	    = "<?= base_url('Setting/Hakakses/')?>";
    var satker_session  = "<?= $this->session->userdata("kdsatker")?>"
    
    var grid_table = "#multi-select";
    var groupColumn = 2;
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
                    data: "id_user",
                },

                {
                    data: "hak_menu"
                },
                {
                    data: "hak_c", 
                      render: function(data, type, row) {
                          if(data == 0){
                                return '<i class="material-icons red-text">close</i>';
                          }else{
                                return '<i class="material-icons cyan-text">check</i>';
                          }
                        }
                },

                {
                    data: "hak_r", 
                      render: function(data, type, row) {
                          if(data == 0){
                                return '<i class="material-icons red-text">close</i>';
                          }else{
                                return '<i class="material-icons cyan-text">check</i>';
                          }
                        }
                },

                {
                    data: "hak_u", 
                      render: function(data, type, row) {
                          if(data == 0){
                                return '<i class="material-icons red-text">close</i>';
                          }else{
                                return '<i class="material-icons cyan-text">check</i>';
                          }
                        }
                },

                { data: 'hak_d', 
                      render: function(data, type, row) {
                          if(data == 0){
                                return '<i class="material-icons red-text">close</i>';
                          }else{
                                return '<i class="material-icons cyan-text">check</i>';
                          }
                        }
                },

                { data: 'id',
                  render: function(data, type, row) {
                      return '<a href="javascript:;" onclick="Edit(\''+row.id+'\')"><i class="material-icons">edit</i></a>\
                      <a  href="javascript:;" onclick="Delete(\''+row.id+'\')"><i class="material-icons">delete</i></a>';
                  }
                },
               
 
            ],

            select: {
                style: 'os',
                selector: 'td:not(:last-child)' // no row selection on last column
            },


            pageLength: 10,
            lengthChange: false,
            responsive: !0,
            select: true,
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
            drawCallback: function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;
 
            api.column(groupColumn, {page:'current'} ).data().each( function ( group, i ) {
                if ( last !== group ) {
                    $(rows).eq( i ).before(
                        '<tr class="group"><td></td><td colspan="8">'+group+'</td></tr>'
                    );
 
                    last = group;
                }
            } );
        },
            });
    </script>