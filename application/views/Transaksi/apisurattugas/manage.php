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
              <form method="post" action ="<?= site_url('Transaksi/SuratTugas/filterrAPI')?>">

                <div class="input-field col s12">
                    <div class="input-field col s2"><label>Tanggal Mulai</label></div>

                    <div class="input-field col s10 " >
                    <input type="date" class="tgl" id="tglst_mulai" name="tglst_mulai">
                    </div>
                </div>

                <div class="input-field col s12">
                    <div class="input-field col s2"><label>Tanggal Selesai</label></div>

                    <div class="input-field col s10 " >
                    <input type="date" class="tgl" id="tglst_selesai" name="tglst_selesai">
                    </div>
                </div>
                <button type="submit" class="btn cyan col s12" name="tombol" >FILTER</button>
            </form>
                <!-- <div class="input-field col s12">
                    <div class="input-field col s2"><label>Bulan</label></div>

                    <div class="input-field col s10 " >
                      <select class="browser-default" name="bulan-Array" id="bulan-Array"></select>
                    </div>
                </div> -->
                <div style="padding-top : 20%"></div>
              <table id="tb-st-" class="bordered striped  responsive" 
                          style="overflow: hidden;
                          overflow-x: auto;
                          clear: both;
                          width: 100%;min-width: rem-calc(640);">
                                          <thead>
                    <tr>
                        <th style="min-width: 5px" >NO</th>
                        <th>STATUS</th>
												<th style="min-width: 370px">NO ST <br>URAIAN</th>
                        <th style="min-width: 150px" >MULAI</th>
                        <th style="min-width: 150px" >SELESAI</th>
                        <th style="min-width: 200px" class="text-center">AKSI</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- <tr><td><?=$data[0]['sumber_data']?></td></tr> -->
                  <?php $no = 1;foreach ($data as $st){ ?>
                    <tr>
                    <td><?php echo $no ?></td>
                      <td><?=$st['status_st']?></td>
                      <td><?=$st['no_surat_tugas']?><br><?=$st['nama_penugasan']?></td>
                      <td><?=cek_tgl_st($st['tanggal_mulai'])?></td>
                      <td><?=cek_tgl_st($st['tanggal_selesai'])?></td>
                      <td class="text-center">
                        <div>

                        <a href="<?= site_url('Transaksi/TambahTim/tambahtimAPI/'.$st['id_st'].'/'.$st['status_st'])?>" 
                                            class="tooltipped" 
                                              data-position="top" data-tooltip="costsheet" >
                                              
                                              <button class="btn cyan"> pilih</button></a>
                          <!-- <a><button class="btn cyan"> pilih</button></a> -->
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
  <!-- <?php include('modal.php');?> -->
  <?php include(APPPATH . 'views/Footer/Footer.php') ?>
  <?php include('script.php');?>

