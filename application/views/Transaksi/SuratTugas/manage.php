<?php include(APPPATH . 'views/Header/Aside.php') ?>


<!-- Page Length Options -->
 <div class="row">

 <!-- <div class="col s12">
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
  </div> -->

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
                    <div class="col s2">
                        <a class="btn modal-trigger" href="<?= site_url('Transaksi/SuratTugas/Tambah/'.$kdsatker.'/'.$unit_id.'/'.$role_id) ?>">Tambah Data</a>
                    </div>
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
              <table id="tb-st-" class="display bordered" style="width:100%;white-space: normal !important;overflow: hidden;">
                  <thead>
                    <tr>
                        <th style="width: 5%" >NO</th>
                        <th>STATUS</th>
												<th>PENGGUNA</th>
												<th>PPK</th>
                        <th style="width: 30%" >NOMOR, TANGGAL, URAIAN SURAT TUGAS</th>
                        <th style="width: 15%" >MULAI</th>
                        <th style="width: 15%" >SELESAI</th>
                        <th style="width: 20%" class="text-center">AKSI</th>
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
                            <td></td>
														<td><?php echo $this->session->userdata('username') ?></td>
														<td></td>
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
                                          <a href="<?= site_url('Transaksi/TambahTim/TambahTim/'.$u->id.'/'.$u->kdindex)?>" class="tooltipped" data-position="top" data-tooltip="Anggota" ><i class="material-icons cyan-text">people</i></a>
                                        </div>
                                        <div class="col s4">
                                          <a href="#" class="dropdown-trigger tooltipped" data-position="top" data-tooltip="Printout" href="#" data-target="dropdown'<?=$u->id?>'" ><i class="material-icons orange-text">remove_red_eye</i></a>
                                                <ul id="dropdown'<?=$u->id?>'" class='dropdown-content' style="min-width: 170px !important;">
                                                  <li><a style="font-size: 14px;" href="<?= site_url('Transaksi/SuratTugas/Export/'.$u->id.'/'.$u->kdindex.'/'.$unit_id) ?>" target="blank">Surat Tugas</a></li>
                                                  <li><a style="font-size: 14px;" href="<?= site_url('Transaksi/NotaDinas/Export/costsheet/L/'.$u->id.'/'.$u->kdindex) ?>" target="blank">Costsheet</a></li>
                                                  <li><a style="font-size: 14px;" href="<?= site_url('Transaksi/NotaDinas/Export/spd/P/'.$u->id.'/'.$u->kdindex) ?>" target="blank">SPD</a></li>
                                                  <li><a style="font-size: 14px;" href="<?= site_url('Transaksi/NotaDinas/Export/spd_back/P/'.$u->id.'/'.$u->kdindex) ?>" target="blank">SPD Belakang</a></li>
                                                  <li><a style="font-size: 14px;" href="#" class="sidenav-trigger" data-target="theme-cutomizer-out" onclick="show('<?=$u->id?>')">Kwitansi Rampung</a>
                                                  </li>
                                                </ul>
                                        </div>
                                        <div class="col s4">
																					<a href="<?= site_url('Transaksi/SuratTugas/ubah/'.$u->id.'/'.$kdsatker.'/'.$unit_id.'/'.$role_id.'/'.$u->kdindex)?>" class="tooltipped" data-position="bottom" data-tooltip="Ubah ST" ><i class="material-icons green-text">edit</i></a>
                                        </div>  
                                    </div>

                                <li class="divider"></li>

                                <div class="row" style="padding-top: 10px">
                                  <div class="col s4">
                                    
																		<a href="#" class="tooltipped" data-position="bottom" data-tooltip="Approve PPK" ><i class="material-icons teal-text">check_box</i></a>
                                  </div>

                                  <div class="col s4">
																	<a href="#" class="tooltipped" data-position="bottom" data-tooltip="Approve KPA/Es II" ><i class="material-icons grey-text">check_box</i></a>
                                  </div>

																	<div class="col s4">
                                    <a href="javascript:;" onclick="Delete('<?= $u->id ?>')" class="tooltipped" data-position="bottom" data-tooltip="Hapus ST" ><i class="material-icons red-text">delete</i></a>
                                  </div>
                                </div>
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

