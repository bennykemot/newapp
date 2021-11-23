
   <?php include(APPPATH . 'views/Login/Header.php') ?>
    <div class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 login-card">
    <form class="login-form" action="<?php echo base_url('Auth/Auth/act_auth'); ?>" method="post">
      <div class="row">
        <div class="input-field col s12">
          <h5 class="ml-4">Sign in</h5>
        </div>
      </div>
      <div class="row margin">
        <div class="input-field col s12">
          <i class="material-icons prefix pt-2">person_outline</i>
          <input id="username" name ="username" type="text">
          <label for="username"  class="center-align">Username</label>
        </div>
      </div>
      <div class="row margin">
        <div class="input-field col s12">
          <i class="material-icons prefix pt-2">lock_outline</i>
          <input id="password" name ="password" type="password">
          <label for="password">Password</label>
        </div>
      </div>

      <div class="row margin">
        <div class="input-field col s12">
            <i class="material-icons prefix">date_range</i>
            <div class="input-field col s11 " >
              <select  id="thang" name="thang" class="browser-default" placeholder="Tahun Anggaran" require>
                <?php $selectted=""; foreach($thang as $u){ 
                  if(date("Y") == $u->tahun)
                        {$selectted="selected";}
                    else{$selectted="";}?>
                  <option <?=$selectted?> ><?= $u->tahun?></option>
                  <?php }?>
              </select>
            </div>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <button type="submit" class="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s12">Login</button>
        </div>
      </div>
      
    </form>
  </div>
  <?php include(APPPATH . 'views/Login/Footer.php') ?>

  <script>

var dropdown_baseurl 	= "<?= base_url('Master/Dropdown/')?>";

var $option = $("<option selected></option>").val(initial_creditor_id).text("2021");

$("#thang2").select2({
          dropdownAutoWidth: true,
          width: '100%',
          placeholder: "Pilih Tahun Anggaran",
         ajax: { 
           url: dropdown_baseurl + 'thang',
           type: "post",
           dataType: 'json',
           delay: 250,
           data: function (params) {
              return {
                searchTerm: params.term // search term
              };
           },
           processResults: function (response) {
              return {
                 results: response
              };
           },
           cache: true
         }
     });

      
  </script>