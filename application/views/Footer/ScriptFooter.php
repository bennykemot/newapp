
    <script src="<?= base_url().'assets'?>/app-assets/js/vendors.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script src="<?= base_url().'assets'?>/app-assets/vendors/data-tables/js/jquery.dataTables.min.js"></script>
    <!-- <script src="<?= base_url().'assets'?>/app-assets/vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js"></script> -->
    <script src="<?= base_url().'assets'?>/app-assets/vendors/data-tables/js/dataTables.select.min.js"></script>

    
    <!-- <script src="<?= base_url().'assets'?>/app-assets/js/scripts/data-tables.min.js"></script>
    <script src="<?= base_url().'assets'?>/app-assets/vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url().'assets'?>/app-assets/vendors/data-tables/js/dataTables.select.min.js"></script> -->

    <script src="<?= base_url().'assets'?>/app-assets/js/plugins.min.js"></script>
    <script src="<?= base_url().'assets'?>/app-assets/js/search.min.js"></script>
    <script src="<?= base_url().'assets'?>/app-assets/js/scripts/customizer.min.js"></script>


    <!-- <script src="<?= base_url().'assets'?>/app-assets/vendors/select2/select2.full.min.js"></script> -->

    <script src="<?= base_url().'assets'?>/app-assets/css/custom/select2.min.js"></script>

    <script src="<?= base_url().'assets'?>/app-assets/js/scripts/advance-ui-modals.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->


      <script src="<?= base_url().'assets'?>/app-assets/vendors/sweetalert/sweetalert.min.js"></script>
  

      <script src="<?= base_url().'assets'?>/app-assets/js/scripts/extra-components-sweetalert.min.js"></script>

      <script src="https://cdn.datatables.net/rowgroup/1.1.3/js/dataTables.rowGroup.min.js"></script>

      <script type="text/javascript" src="<?= base_url().'assets'?>/app-assets/js/jquery.idle.js"></script>

      <script src="<?= base_url().'assets'?>/app-assets/vendors/formatter/jquery.formatter.min.js"></script>

      <script src="<?= base_url().'assets'?>/app-assets/js/jszip.js"></script>

      <script src="<?= base_url().'assets'?>/app-assets/js/FileSaver.js"></script>

      <script src="<?= base_url().'assets'?>/app-assets/vendors/select2/select2.full.min.js"></script>

     
      

      <script>
        
        function validateNumber(e) {
            const pattern = /^[0-9]$/;

            return pattern.test(e.key )
        }

        

      function cek_tgl($tanggal){
      // $bulan = array (
      //   1 =>   'Januari',
      //   2 =>  'Februari',
      //   3 =>  'Maret',
      //   4 =>  'April',
      //   5 =>  'Mei',
      //   6 =>  'Juni',
      //   7 =>  'Juli',
      //   8 =>  'Agustus',
      //   9 =>  'September',
      //   10 =>  'Oktober',
      //   11 =>  'November',
      //   12 =>  'Desember'
      // );
      // $pecahkan = explode('-', $tanggal);
      
      // // variabel pecahkan 0 = tanggal
      // // variabel pecahkan 1 = bulan
      // // variabel pecahkan 2 = tahun
    
      // return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
    }

    function goBack() {
        window.history.back();
    }

      var baseurl_menu 	= "<?= base_url('Master/Menu/')?>";
      var username     	= "<?= $this->session->userdata("username")?>"
      var url           = "<?= site_url()?>"
      var b_parent = "";

      function url_base(string){
        return url + string;
      }


      $.ajax({
        url : baseurl_menu + "Master",
        data: {"username": username},
        type: "post",
        dataType: "JSON",
        success: function(data)
            {
             
              for(i=0 ; i< data.length ; i++){

                // if(b_parent != data[i]['parent_menu']){

                row = '<li class="bold"><a class="waves-effect waves-cyan" href='+url_base(data[i]['link_menu'])+'>\
                        <i class="material-icons">\
                        '+data[i]['icon_menu']+'\
                        </i><span class="menu-title" data-i18n="Mail">'+data[i]['nama_menu']+'</span></a>\
                        </li>';
                
                b_parent = data[i]['parent_menu'] 

                $("#slide-out").append(row);

              }
            }
    });
    
      </script>

  </body>
</html>

