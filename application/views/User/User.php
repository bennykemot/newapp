<?php include(APPPATH . 'views/Header/Aside.php') ?>


<!-- Page Length Options -->
<div class="row">

<div class="col s12">
      <div class="card" id="head">
          <div class="card-content" >
              <div class="row">
                  <div class="col s1">
                      <button type="button" class="btn-floating" style=""><i class="material-icons">
                      person_outline</i></button>
                  </div>
                  <div class="col s9">
                      <h6> Data User Login </h6>
                  </div>
                  <div class="col s2">
                  <a class="btn" href="javascript:;" onclick="Edit(<?=$this->session->userdata('user_id');?>)">Ubah Data</a>
                  </div>
              </div>
          </div>
      </div>
  </div>
   <!-- Page Length Options -->
   
</div>


  <div class="col s12">
    <div class="container">
                <!-- users view start -->
        <div class="section users-view">
            <div class="card">
              <div class="card-content">
                <div class="row">
                  <div class="col s12">
                    <div class="col s12">
                      <table class="striped">
                        <tbody>
                          <tr>
                            <td>Username:</td>
                            <td><?= $user->username?></td>
                          </tr>
                          <tr>
                            <td>Password:</td>
                                <td class="users-view-latest-activity" ><div class="col s8" id="userPass">******</div>
                                  <div class="col s4 quick-action-btns display-flex justify-content-end align-items-center"> 
                                    <button class="btn-floating mb-1 red" onclick="ShowPass('<?= $user->password?>')"><i class="material-icons">remove_red_eye</i></button> </div>
                              </td>
                          </tr>
                          <tr>
                            <td>Role:</td>
                            <td class="users-view-verified"><?= $user->rolename?></td>
                          </tr>
                          <tr>
                            <td>Kode Satker:</td>
                            <td class="users-view-role"><?= $user->kdsatker?></td>
                          </tr>
                          <tr>
                            <td>Nama Satker:</td>
                            <td class="users-view-role"><?= $user->nmsatker?></td>
                          </tr>
                          <tr>
                            <td>Status User:</td>
                            <?php if($user->status == 1) {?>
                            <td><span class=" users-view-status chip green lighten-5 green-text">Aktif</span></td>

                            <?php }else{ ?>
                              <td><span class=" users-view-status chip red lighten-5 red-text">Non - Aktif</span></td>

                              <?php }?>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>

        </div>
    </div>
  </div>
</div>

<div id="modal2" class="modal">
    <div class="modal-content">
      <h6>Ubah Data</h6>
      <div style="padding-top: 10px"></div>
        <div class="row">

          <form class="col s12" id="FormUser_Edit">
            <div class="row">

            <div class="input-field col s12">
                <div class="input-field col s2"><label>Username</label></div>

                <div class="input-field col s10 " >
                  <input placeholder="Nama User" id="username" name="username" type="text" class="validate">
                </div>
            </div>

            <div class="input-field col s12">
                <div class="input-field col s2"><label>Password</label></div>

                <div class="input-field col s10" >
                <input id="password" name="password">
                  </div>
            </div>

            <input placeholder="idUser" id="idUser" name="idUser" type="text" hidden>

            </div>
          </form>
        </div>
    </div>
  <div class="modal-footer">
    <button id="TambahUser" class="btn"><i class="material-icons left">done</i> Simpan</button>
    <a class="modal-action modal-close red btn">Batal</a>
  </div>
</div>

<?php include(APPPATH . 'views/Footer/Footer.php') ?>
<?php include('script.php');?>

<script>

  var a = 1;

  function ShowPass(Pass){
     var text = userPass.textContent
    if(text == "******"){
      userPass.textContent = Pass
    }else{
      userPass.textContent = "******"
    }
    

  }
</script>