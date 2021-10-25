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
            <!-- users view media object start -->
            <!-- <div class="card-panel">
              <div class="row">
                <div class="col s12 m7">
                  <div class="display-flex media">
                    <div class="media-body">
                      <h6 class="media-heading">
                        <span class="users-view-name"><?php echo $this->session->userdata("username"); ?></span>
                      </h6>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
            <!-- users view media object ends -->
            <!-- users view card data start -->
            <div class="card">
              <div class="card-content">
                <div class="row">
                  <div class="col s12">
                    <div class="col s8">
                      <table class="striped">
                        <tbody>
                          <tr>
                            <td>Username:</td>
                            <td><?php echo $this->session->userdata("username"); ?></td>
                          </tr>
                          <tr>
                            <td>Password:</td>
                            <td class="users-view-latest-activity"><?php echo $this->session->userdata("password"); ?></td>
                          </tr>
                          <tr>
                            <td>Role:</td>
                            <td class="users-view-verified"><?php echo $this->session->userdata("username"); ?></td>
                          </tr>
                          <tr>
                            <td>Kode Satker:</td>
                            <td class="users-view-role"><?php echo $this->session->userdata("kdsatker"); ?></td>
                          </tr>
                          <tr>
                            <td>Nama Satker:</td>
                            <td class="users-view-role"><?php echo $this->session->userdata("nmsatker"); ?></td>
                          </tr>
                          <tr>
                            <td>Status:</td>
                            <td><span class=" users-view-status chip green lighten-5 green-text">Aktif</span></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="col s4">
                      <div class="col s12 quick-action-btns display-flex justify-content-end align-items-center pt-2">
                        <a href="page-users-edit.html" class="btn-small indigo">Edit</a>
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