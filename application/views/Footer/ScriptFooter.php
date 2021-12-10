
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


      <!-- <script src="<?= base_url().'assets'?>/design/js/bootstrap.js"></script>
      <script src="<?= base_url().'assets'?>/design/js/bootstrap-grid.js"></script>
      <script src="<?= base_url().'assets'?>/design/datatables/datatables.js"></script>
      <script src="<?= base_url().'assets'?>/design/datatables/DataTables-1.11.3/js/jquery.dataTables"></script> -->

     
      

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
      var url = "<?= site_url()?>"
			var kdsatker = "<?= $this->session->userdata("kdsatker") ?>"
			var thang = "<?= $this->session->userdata("thang") ?>"
			var user_id = "<?= $this->session->userdata("user_id") ?>"
			var role_id = "<?= $this->session->userdata("role_id") ?>"
			

    //   function url_base(string){
    //     return url + string;
    //   }


    //   $.ajax({
    //     url : baseurl_menu + "Master",
    //     data: {"role_id": role_id},
    //     type: "post",
    //     dataType: "JSON",
    //     success: function(data)
    //         {
             
    //           for(i=0 ; i< data.length ; i++){

    //             if(data[i]['parent_menu'] == 'menu_0'){

    //               row = '<li class="navigation-header"><a class="navigation-header-text">'+data[i]['nama_menu']+'</a>\
    //                       <i class="navigation-header-icon material-icons">more_horiz</i>\
    //                       </li>';

    //               }else{

    //                   if(data[i]['kode_menu'] == 'menu_03'){
    //                     row = '<li class="bold"><a class="waves-effect waves-cyan" href='+url_base(data[i]['link_menu']+'/'+kdsatker+ '/'+thang+'/'+user_id+'/'+role_id)+'>\
    //                           <i class="material-icons">\
    //                           '+data[i]['icon_menu']+'\
    //                           </i><span class="menu-title" data-i18n="Mail">'+data[i]['nama_menu']+'</span></a>\
    //                           </li>';
    //                   }else if(data[i]['kode_menu'] == 'menu_04'){
    //                     row = '<li class="bold"><a class="waves-effect waves-cyan" href='+url_base(data[i]['link_menu']+'/'+kdsatker+ '/'+user_id+'/'+role_id+'/0')+'>\
    //                           <i class="material-icons">\
    //                           '+data[i]['icon_menu']+'\
    //                           </i><span class="menu-title" data-i18n="Mail">'+data[i]['nama_menu']+'</span></a>\
    //                           </li>';
    //                   }else if(data[i]['kode_menu'] == 'menu_18'){
    //                     row = '<li class="bold"><a class="waves-effect waves-cyan" href='+url_base(data[i]['link_menu']+'/'+kdsatker)+'>\
    //                           <i class="material-icons">\
    //                           '+data[i]['icon_menu']+'\
    //                           </i><span class="menu-title" data-i18n="Mail">'+data[i]['nama_menu']+'</span></a>\
    //                           </li>';
                      
    //                   }else{
    //                     row = '<li class="bold"><a class="waves-effect waves-cyan" href='+url_base(data[i]['link_menu'])+'>\
    //                           <i class="material-icons">\
    //                           '+data[i]['icon_menu']+'\
    //                           </i><span class="menu-title" data-i18n="Mail">'+data[i]['nama_menu']+'</span></a>\
    //                           </li>';
    //                   }
    //               }

                

                

    //             $("#slide-out").append(row);

    //           }
    //         }
    // });

    (function() {
    const idleDurationSecs = 600;
    const redirectUrl = '<?= site_url('Auth/Auth/logout')?>';
    let idleTimeout;

    const resetIdleTimeout = function() {
        if(idleTimeout) clearTimeout(idleTimeout);
        idleTimeout = setTimeout(() => location.href = redirectUrl, idleDurationSecs * 1000);
    };
	
	// Key events for reset time
    resetIdleTimeout();
    window.onmousemove = resetIdleTimeout;
    window.onkeypress = resetIdleTimeout;
    window.click = resetIdleTimeout;
    window.onclick = resetIdleTimeout;
    window.touchstart = resetIdleTimeout;
    window.onfocus = resetIdleTimeout;
    window.onchange = resetIdleTimeout;
    window.onmouseover = resetIdleTimeout;
    window.onmouseout = resetIdleTimeout;
    window.onmousemove = resetIdleTimeout;
    window.onmousedown = resetIdleTimeout;
    window.onmouseup = resetIdleTimeout;
    window.onkeypress = resetIdleTimeout;
    window.onkeydown = resetIdleTimeout;
    window.onkeyup = resetIdleTimeout;
    window.onsubmit = resetIdleTimeout;
    window.onreset = resetIdleTimeout;
    window.onselect = resetIdleTimeout;
    window.onscroll = resetIdleTimeout;

})();
    
      </script>

  </body>
</html>

