
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

        function formatRupiah(angka){
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split   		= number_string.split(','),
        sisa     		= split[0].length % 3,
        rupiah     		= split[0].substr(0, sisa),
        ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
  
        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if(ribuan){
          separator = sisa ? '.' : '';
          rupiah += separator + ribuan.join('.');
        }
  
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return 'Rp. ' + rupiah;
      }

      function cek_tgl($tanggal){
      $bulan = array (
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
      );
      $pecahkan = explode('-', $tanggal);
      
      // variabel pecahkan 0 = tanggal
      // variabel pecahkan 1 = bulan
      // variabel pecahkan 2 = tahun
    
      return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
    }

        
      
      </script>

  </body>
</html>

