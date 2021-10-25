<?php include(APPPATH . 'views/Header/Aside.php') ?>


<!-- Page Length Options -->
<div class="row">

<div class="col s12">
       <div class="card">
         <div class="card-content" style="height: 90px">
           <h6 class="col s10">PROFILE USER</h6>
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
                            <td class="users-view-latest-activity"><?= $user->password?><td>
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
                    <div class="col s4">
                      <div class="col s12 quick-action-btns display-flex justify-content-end align-items-center pt-2">
                        <a class="btn-small indigo">Edit</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

        </div>
    </div>
  </div>
</div>

<?php include(APPPATH . 'views/Footer/Footer.php') ?>