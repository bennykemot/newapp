<?php include(APPPATH . 'views/Header/Aside.php') ?>


<!-- Page Length Options -->
<div class="row">

<div class="col s12">
        <div class="card">
          <div class="card-content" style="height: 90px; padding: 0px !important">
            <div class="col s1 display-flex justify-content-end" style="height: 100%;padding: 24px;padding-right: 34px; border-radius: 10px" >
              <button type="button" class="btn-floating" style=""><i class="material-icons">
              person_outline
                </i></button>
            </div>
            <div class="col s9" style="padding-top: 24px">
              <h6> Profil User </h6>
            </div>
            <div class="col s2" style="padding-top: 24px">
              <a class="btn modal-trigger" href="#modal2">Ubah Data</a>
            </div>
          </div>
        </div>
  </div>


  <div class="col s12">
    <div class="container">
                <!-- users view start -->
        <div class="section users-view">
            <div class="card">
              <div class="card-content">
                <div class="row">
                  <div class="col s12">
                    <div class="col s8">
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
                    <!-- <div class="col s4">
                      <div class="col s12 quick-action-btns display-flex justify-content-end align-items-center pt-2">
                        <a class="btn-small indigo">Edit</a>
                      </div>
                    </div> -->
                  </div>
                </div>
              </div>
            </div>

        </div>
    </div>
  </div>
</div>

<?php include(APPPATH . 'views/Footer/Footer.php') ?>

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