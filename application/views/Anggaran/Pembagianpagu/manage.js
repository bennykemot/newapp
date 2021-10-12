var grid_detail = "#tabel_anggaran";
var is_set_grid_detail = false;

var all;

function set_grid_detail(is_current) {
  if (!is_set_grid_detail) {
    is_set_grid_detail = true;
    $(grid_detail).DataTables({
            serverSide: true,
            processing: true,
            searchDelay: 500,
            ajax: {
                url: baseurl + 'getPembagianPagu',
                type: "POST",
                data: function (d) {
                    
                    all = JSON.stringify(d)
                },
            },
            autoWidth: false,
            columns: [
             
                {
                    data: null, class: "text-center",
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
               
                
                { data: "Personel_Nama",
                render: function (data, type, row, meta) {
                        return data+'<br>'+row.Personel_TempatLahir+'<br>'+row.Tanggal_Lahir;
                    } 
                  },

 
            ],
            pageLength: 10,
            lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
            order: [],
            bFilter: false,
            ordering: false,
            scrollCollapse: true,
            columnDefs: [ ],

            initComplete: function (settings, json) {
                $(grid_detail).wrap('<div class="table-responsive"></div>');
            },

      
        });

        } else {
    $(grid_detail).DataTable().search("");
    $(grid_detail).DataTable().ajax.reload(null, !is_current);
  }
}

