<?php include(APPPATH . 'views/Header/Aside.php');

function hideNoStHead($dat){
  if($dat == "Detail"){
    $res = "";
  }else{
    $res = "hidden";
  }
  return $res;
  }

function hideNoSt($dat){
  if($dat == "All"){
    $res = "";
  }else{
    $res = "hidden";
  }
  return $res;
  }


?>



 <div class="row">

  <div class="col s12">
        <div class="card" id="head">
            <div class="card-content" >
                <div class="row">
                    <div class="col s1">
                        <button type="button" class="btn-floating" style=""><i class="material-icons">
                        email</i></button>
                    </div>
                    <div class="col s9">
                        <h6> Daftar Costsheet <p <?=hideNoStHead($result)?>><?=$costsheet[0]->nost?></p></h6>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

		<div class="row">
    <div class="col s12">
      <div class="card">
        <div class="card-content">
            <form method="post" action ="<?= site_url('Transaksi/Apisima/filterrAPI')?>">
                <div class="input-field col s12">
                    <div class="input-field col s2"><label>Nomor ST</label></div>

                    <div class="input-field col s10 " >
                    <select class="browser-default" id="nost" name="nost"></select>
                    </div>
                </div>
                <button type="submit" class="btn cyan col s12" name="tombol" >FILTER</button>
            </form>
            <div style="padding-top : 20%"></div>
          <div class="row">
            <div class="col s12">
            <table id="tb-st-" class="bordered striped responsive" style="white-space: normal;overflow-x : auto">
                  <thead>
                    <tr>
                        <th style="min-width: 5px" >NO</th>
                        <th style="min-width: 5px" >STATUS</th>
						            <th style="min-width: 370px">
                        <div <?=hideNoSt($result)?>>NO ST</div>
                                COSTSHEET
                            <br>URAIAN
                        </th>
                        <th style="min-width: 150px" >BIAYA</th>
                        <th style="min-width: 200px" class="text-center">AKSI</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php $no=1;for($i=0; $i < count($costsheet); $i++){?>
                        <tr>
                            <td><?=$no++?></td>
                            <td class="text-center">
                              <?php if($costsheet[$i]->from_data == "lcl"){$controller = "SuratTugas";$segment8 = $costsheet[$i]->kdindex;}else{$controller = "Apisima";$segment8 = $costsheet[$i]->id_cs;}?>
                              <a href="<?= site_url('Transaksi/'.$controller.'/approve/'.$costsheet[$i]->id_st.'/'.$kdsatker.'/'.$unit_id.'/'.$role_id.'/'.$segment8.'/'.$costsheet[$i]->status_id.'/'.$costsheet[$i]->from_data)?>"
                              class="tooltipped <?=disableApprove($costsheet[$i]->status_id,$role_id)?>" data-position="bottom" data-tooltip="Approve">
                                <?= getStatusId($costsheet[$i]->status_cs)?>
                              </a>
                            <td><div <?=hideNoSt($result)?>><?=$costsheet[$i]->nost?></div><?=$costsheet[$i]->id_cs?><br><?=$costsheet[$i]->uraianst?></td>
                            <td><?=rupiah($costsheet[$i]->biaya)?></td>
                            <!-- <td class="text-center">
                              <a href="<?= site_url('Transaksi/Apisima/Getcostsheetdetail/'.$costsheet[$i]->id_cs.'/Detail')?>" 
                                class="tooltipped" data-position="top" data-tooltip="Detail Costsheet" >
                                  <button class="btn cyan"> Detail Costsheet </button></a>
                            </td> -->
                            <td class="text-center">
                              <div class="col s12">
                                <div class="row">
                                  <div class="col s4">
                                    <a href="<?= site_url('Transaksi/Apisima/Getcostsheetdetail/'.$costsheet[$i]->id_cs.'/Detail')?>" 
                                      class="tooltipped" data-position="top" data-tooltip="Detail Costsheet" >
                                      <i class="material-icons cyan-text">people</i></a>
                                  </div>
                                  <div class="col s4">
                                    <a href="#" class="dropdown-trigger tooltipped" data-position="top" data-tooltip="Printout" href="#" data-target="dropdown'<?=$costsheet[$i]->id?>'" ><i class="material-icons orange-text">remove_red_eye</i></a>
                                      <ul id="dropdown'<?=$costsheet[$i]->id?>'" class='dropdown-content' style="min-width: 170px !important;">
                                        <!-- <li><a style="font-size: 14px;" href="javascript:;" onclick="exportST('<?=$costsheet[$i]->id?>','<?=$costsheet[$i]->kdindex?>','<?=$unit_id?>')">Surat Tugas</a></li> -->
                                          <!-- <li><a style="font-size: 14px;" href="<?= site_url('Transaksi/SuratTugas/Export/'.$costsheet[$i]->id.'/'.$costsheet[$i]->kdindex.'/'.$unit_id) ?>" target="blank">Surat Tugas</a></li> -->

                                          <li><a style="font-size: 14px;" href="<?= site_url('Transaksi/Apisima/Export/costsheet/L/'.$costsheet[$i]->id_cs.'/'.$costsheet[$i]->id_st.'/'.$costsheet[$i]->kdindex) ?>" target="blank">Costsheet</a></li>
                                          <li><a style="font-size: 14px;" href="<?= site_url('Transaksi/Apisima/Export/spd/P/'.$costsheet[$i]->id_cs.'/'.$costsheet[$i]->id_st.'/'.$costsheet[$i]->kdindex) ?>" target="blank">SPD</a></li>
                                          <li><a style="font-size: 14px;" href="<?= site_url('Transaksi/Apisima/Export/spd_back/P/'.$costsheet[$i]->id_cs.'/'.$costsheet[$i]->id_st.'/'.$costsheet[$i]->kdindex) ?>" target="blank">SPD Belakang</a></li>
                                          <li class="d-none"><a style="font-size: 14px;" href="#" class="sidenav-trigger" data-target="theme-cutomizer-out" onclick="show('<?=$costsheet[$i]->id?>')">Kwitansi Rampung</a>
                                          </li>
                                      </ul>
                                  </div>
                                  <?php if($costsheet[$i]->status_id ==3){?>
                                  <div class="col s4">
                                    <a href="<?= site_url('Transaksi/Apisima/ubah/'.$costsheet[$i]->id_cs.'/'.$kdsatker.'/'.$unit_id.'/'.$role_id.'/'.$costsheet[$i]->kdindex)?>" 
                                      class="tooltipped <?=getForAdminOpr($role_id)?> <?=getComplete($costsheet[$i]->status_id, 'Y')?>" 
                                      data-position="bottom" data-tooltip="Ubah CS" ><i class="material-icons green-text">edit</i></a>
                                  </div>
                                  <?php }?>
                                </div>
                              </div>

                            </td>
                        </tr>
                        <?php }?>
                  </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>


    <div id="theme-cutomizer-out" class="theme-cutomizer sidenav row">
   <div class="col s12">
      <a class="sidenav-close" href="#!"><i class="material-icons">close</i></a>
      <h5 class="theme-cutomizer-title">Cetak Kwitansi</h5>
        <input type="text" id="id_st" name="id_st" hidden>
          <div class="menu-options">
            <hr class="customize-devider">
            <div class="menu-options-form row">
                <div class="input-field col s12 menu-bg-color mb-0">
                  
                  <a onclick="kwitansiRampung('Export/kwitansi/P/','kwitansi')" href="javascript:;" ><div class="card-panel green darken-1 btn col s12">
                      <span class="white-text">Kwitansi</span>
                    </div></a>

                    <a onclick="kwitansiRampung('Export/rincian_biaya/P/','rincian_biaya')" href="javascript:;"><div class="card-panel orange darken-1 btn col s12">
                      <span class="white-text">Rincian Biaya</span>
                    </div></a>

                    <a  onclick="kwitansiRampung('Export/pengeluaran_rill/P/','pengeluaran_rill')" href="javascript:;"><div class="card-panel red darken-1 btn col s12">
                      <span class="white-text">Daftar Pengeluaran Rill</span>
                    </div></a>

                    <a onclick="kwitansiRampung('Export/nominatif/L/','nominatif')" href="javascript:;"><div class="card-panel blue darken-1 btn col s12">
                      <span class="white-text">Daftar Nominatif</span>
                    </div></a>

                    <a onclick="kwitansiRampung('Export/perhitungan_rampung/P/','perhitungan_rampung')" href="javascript:;"><div class="card-panel deep-purple darken-1 btn col s12">
                      <span class="white-text">Perhitungan Rampung</span>
                    </div></a>

                </div>
            </div>
          </div>
   </div>
</div>
  <!-- <?php include('modal.php');?> -->
  <?php include(APPPATH . 'views/Footer/Footer.php') ?>
  <?php include('script.php');?>

