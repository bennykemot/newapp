<?php include(APPPATH . 'views/Header/Aside.php') ?>

<?php 

function getapprove($data){

  $res = "btn red col s2";
  if($data == 1){
    $res = "btn green col s2";
  }
  return $res;

}
?>

<!-- Page Length Options -->
 <div class="row">

 <div class="col s12">
        <div class="card" id="head">
          <div class="card-content" style="height: 120px; padding: 0px !important">
            <div class="col s1 display-flex justify-content-end" style="height: 100%;padding: 24px;padding-right: 34px; border-radius: 10px" >
              <button type="button" class="btn-floating" style=""><i class="material-icons">
              email
                </i></button>
            </div>
            <div class="col s9" style="padding-top: 24px">
              <h6> Daftar Surat Tugas</h6>
                  <div class="col s1" style="padding-left: 0px ! important">Bulan : </div>
                  <div class="col s11"><select class="browser-default" id="bulan-Array"><option selected><?php echo currentMonth(date("m")) ?></option></select>
                  </div>
            </div>
            <div class="col s2" style="padding-top: 24px">
              <a class="btn modal-trigger" href="<?= site_url('Transaksi/SuratTugas/Tambah') ?>">Tambah Data</a>
            </div>
          </div>
        </div>
  </div>

    <div class="col s12">
      <div class="card">
        <div class="card-content">
          <h4 class="card-title col s10"></h4>
          <!-- <a class="btn modal-trigger col s2" href="#modal2">Tambah Data</a> -->
          <div class="row">
            <div class="col s12">
              <table id="tabel" class="bordered striped responsive-table" style="width: 100%">
                  <thead>
                    <tr>
                        <th style="width: 5%" >NO URUT</th>
                        <th style="width: 50%" >NOMOR SURAT TUGAS/URAIAN/STATUS</th>
                        <th style="width: 15%" >MULAI</th>
                        <th style="width: 15%" >SELESAI</th>
                        <th style="width: 15%" >AKSI</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                            $no = $this->uri->segment('4') + 1;
                            foreach($SuratTugas as $u){ 
                              ?>
                        <tr>
                            <td><?php echo $no ?></td>
                            <td><b><?php echo $u->nost ?>   <?php echo $u->tglst ?></b>
                                <br>
                                <?php echo $u->uraianst ?>
                                <br>
                                <div class="col s12" style="padding-top: 10px">
                                    <button class='<?= getapprove($u->is_approved1)?>' style="margin-right: 10px">Es 4</button>
                                    <button class='<?= getapprove($u->is_approved2)?>' style="margin-right: 10px">Es 3</button>
                                    <button class='<?= getapprove($u->is_approved3)?>' style="margin-right: 10px">Es 2</button>
                                    <button class='<?= getapprove($u->is_approved4)?>'>Es 1</button>
                                </div>
                            </td>
                            <td><?php echo $u->tglmulaist ?></td>
                            <td><?php echo $u->tglselesaist ?></td>
                            <td>
                                <div class="col s12">
                                    <button class="btn orange col s12">VIEW</button><br>
                                    <div style="padding-bottom: 20px"></div>
                                    <button class="btn cyan col s12">UBAH</button><br>
                                    <div style="padding-bottom: 20px"></div>
                                    <button class="btn green col s12">APPROVED</button><br>
                                    <div style="padding-bottom: 20px"></div>
                                    <button class="btn red col s12" onclick="Delete('<?= $u->id ?>')">HAPUS</button><br>
                                </div>
                            </td>
                        </tr>
                        <?php $no++;} ?>
                        
                  </tbody>
                </table>
                <?php 
                echo $this->pagination->create_links(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>



  </div>
  <?php include('modal.php');?>
  <?php include(APPPATH . 'views/Footer/Footer.php') ?>
  <?php include('script.php');?>

