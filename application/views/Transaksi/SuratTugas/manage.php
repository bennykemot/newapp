<?php include(APPPATH . 'views/Header/Aside.php') ?>


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
                        <h6> Daftar Surat Tugas </h6>
                    </div>
                    <?php 
                     //if($role_id == 2 || $role_id == 4 || $role_id == 9 || $role_id == 10){ 
                      ?>
                    <div class="col s2">
                        <a class="btn modal-trigger" href="<?= site_url('Transaksi/SuratTugas/Tambah/'.$kdsatker.'/'.$unit_id.'/'.$role_id) ?>">Tambah Data</a>
                    </div>
                    <?php 
                   //}
                  ?>
                </div>
            </div>
        </div>
    </div>

		<div class="row">
    <div class="col s12">
      <div class="card">
        <div class="card-content">
          <h4 class="card-title col s10"></h4>
          <!-- <a class="btn modal-trigger col s2" href="#modal2">Tambah Data</a> -->
          <div class="row">
            <div class="col s12">
              <table id="tb-st-" class="bordered striped fixed fixed" style="white-space: normal;overflow-x : auto">
                  <thead>
                    <tr>
                        <th style="min-width: 5px" >NO</th>
                        <th>STATUS</th>
                        <th>PEREKAM</th>
												<th>TANGGAL PEMBUATAN</th>
                        <th style="min-width: 300px" >NOMOR, TANGGAL, URAIAN SURAT TUGAS</th>
                        <th style="min-width: 150px" >MULAI</th>
                        <th style="min-width: 150px" >SELESAI</th>
                        <th style="min-width: 200px" class="text-center">AKSI</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                           // $no = $this->uri->segment('4') + 1;
                           $no = 1;
                            foreach($SuratTugas as $u){ 
                              ?>
                        <tr>
                            <td><?php echo $no ?></td>
                            <td class="text-center">
                              <a href="<?= site_url('Transaksi/SuratTugas/approve/'.$u->id.'/'.$kdsatker.'/'.$unit_id.'/'.$role_id.'/'.$u->kdindex.'/'.$u->status_id)?>"
                              class="tooltipped <?=disableApprove($u->status_id,$role_id)?>" data-position="bottom" data-tooltip="Approve">
                                <?= getStatusId($u->status_id)?>
                              </a>

                              <!-- <?= getStatusId($u->status_id)?> -->
                            
                            </td>
                            <td><?php echo $u->username ?></td>
														<td><?php echo cek_tgl_st(date("Y-m-d",strtotime($u->created_at))) ?></td>
                            <td><b><?php echo $u->nost ?>   <?php echo cek_tgl_st($u->tglst) ?></b>
                                <br>
                                <?php echo $u->uraianst ?>
                            </td>
                            <td><?php echo cek_tgl_st($u->tglmulaist) ?></td>
                            <td><?php echo cek_tgl_st($u->tglselesaist) ?></td>
                            <td class="text-center">
                                <div class="col s12">

                                    <div class="row">

                                        <div class="col s4">
                                          <a href="<?= site_url('Transaksi/TambahTim/TambahTim/'.$u->id.'/'.$u->kdindex)?>" 
                                            class="tooltipped <?=getForAdminOpr($role_id)?> <?=getComplete($u->status_id, 'N')?>" 
                                              data-position="top" data-tooltip="Anggota" >
                                              
                                              <i class="material-icons cyan-text">people</i></a>
                                        </div>
                                        <div class="col s4">
                                          <a href="#" class="dropdown-trigger tooltipped" data-position="top" data-tooltip="Printout" href="#" data-target="dropdown'<?=$u->id?>'" ><i class="material-icons orange-text">remove_red_eye</i></a>
                                                <ul id="dropdown'<?=$u->id?>'" class='dropdown-content' style="min-width: 170px !important;">
                                                <li><a style="font-size: 14px;" href="javascript:;" onclick="exportST('<?=$u->id?>','<?=$u->kdindex?>','<?=$unit_id?>')">Surat Tugas</a></li>
                                                  <!-- <li><a style="font-size: 14px;" href="<?= site_url('Transaksi/SuratTugas/Export/'.$u->id.'/'.$u->kdindex.'/'.$unit_id) ?>" target="blank">Surat Tugas</a></li> -->
                                                  <li><a style="font-size: 14px;" href="<?= site_url('Transaksi/NotaDinas/Export/costsheet/L/'.$u->id.'/'.$u->kdindex) ?>" target="blank">Costsheet</a></li>
                                                  <li><a style="font-size: 14px;" href="<?= site_url('Transaksi/NotaDinas/Export/spd/P/'.$u->id.'/'.$u->kdindex) ?>" target="blank">SPD</a></li>
                                                  <li><a style="font-size: 14px;" href="<?= site_url('Transaksi/NotaDinas/Export/spd_back/P/'.$u->id.'/'.$u->kdindex) ?>" target="blank">SPD Belakang</a></li>
                                                  <li><a style="font-size: 14px;" href="#" class="sidenav-trigger" data-target="theme-cutomizer-out" onclick="show('<?=$u->id?>')">Kwitansi Rampung</a>
                                                  </li>
                                                </ul>
                                        </div>
                                        <div class="col s4">
																					<a href="<?= site_url('Transaksi/SuratTugas/ubah/'.$u->id.'/'.$kdsatker.'/'.$unit_id.'/'.$role_id.'/'.$u->kdindex)?>" 
                                            class="tooltipped <?=getForAdminOpr($role_id)?> <?=getComplete($u->status_id, 'Y')?>" 
                                            data-position="bottom" data-tooltip="Ubah ST" ><i class="material-icons green-text">edit</i></a>
                                        </div>  
                                    </div>

                                <li class="divider"></li>

                                <div class="row" style="padding-top: 10px">
                                  <div class="col s4">
                                    
																		<a href="<?= site_url('Transaksi/SuratTugas/approve/'.$u->id.'/'.$kdsatker.'/'.$unit_id.'/'.$role_id.'/'.$u->kdindex.'/2')?>" 
                                      class="tooltipped" style="<?=getDisablePPK($u->status_id)?> <?=getDisableforKPA($role_id)?>" 
                                      data-position="bottom" data-tooltip="Approve PPK" ><i class="material-icons <?=ApprovePPK($u->status_id)?>">check_box</i></a>
                                  </div>

                                  <div class="col s4">
																	<a href="<?= site_url('Transaksi/SuratTugas/approve/'.$u->id.'/'.$kdsatker.'/'.$unit_id.'/'.$role_id.'/'.$u->kdindex.'/3')?>" 
                                    class="tooltipped"  style="<?=getDisableforPPK($role_id)?>" data-position="bottom" 
                                    data-tooltip="Approve KPA/Es II" ><i class="material-icons <?=ApproveKPA($u->status_id)?>">check_box</i></a>
                                  </div>

																	<div class="col s4">
                                    <a href="javascript:;" onclick="Delete('<?= $u->id ?>')" 
                                    class="tooltipped <?=getForAdminOpr($role_id)?> <?=getComplete($u->status_id, 'N')?>" 
                                    data-position="bottom" data-tooltip="Hapus ST" ><i class="material-icons red-text">delete</i></a>
                                  </div>
                                </div>
                            </div>
                            </td>
                        </tr>
                        <?php $no++;} ?>
                        
                  </tbody>
                </table>
                <?php echo $this->pagination->create_links(); ?>
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
  <?php include('modal.php');?>
  <?php include(APPPATH . 'views/Footer/Footer.php') ?>
  <?php include('script.php');?>

