<?php include 'AssetsHeader.php';?>
<?php include 'Upside.php';?>

<style>
	.table-nav, td{
  	margin-top: -15px;
		padding-left: 8px;
		height: 40px !important;
		vertical-align: center !important;
}
</style>

<?php 
$kdsatker = $this->session->userdata("kdsatker");
$thang = $this->session->userdata("thang");
$user_id = $this->session->userdata("user_id");
$role_id = $this->session->userdata("role_id");
$unit_id = $this->session->userdata("unit_id");

function mappingD_none($data){
  $class="";
  if($data == "604435" || 
  $data == "636702" || 
  $data == "636778" || 
  $data == "450460" || 
  $data == "651994" ){
    $class="d-none";
  }
  return $class;

}
?>
    <!-- BEGIN: SideNav-->
    <aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-dark sidenav-active-rounded">
      <div class="brand-sidebar" style="background: #fff !important;">
				<table class="table-nav">
					<tr>
						<td style="width: 20%;">
								<img class="hide-on-med-and-down" src="<?= base_url().'assets'?>/app-assets/images/logo/logo-bisma_2.png" alt="materialize logo" height="60"></a>
						</td>
						<td style="width: 80%;">
								<span style="color: #000 !important; font-size: 25px !important; margin-left: -5px !important;" >BISMA</span>
						</td>
					</tr>
				</table>
        <!-- <h1 class="logo-wrapper"><a class="brand-logo darken-1" href="<?= site_url('Main/Home')?>"><img class="hide-on-med-and-down " src="<?= base_url().'assets'?>/app-assets/images/logo/logo-bisma_2.png" alt="materialize logo"><img class="show-on-medium-and-down hide-on-med-and-up" src="<?= base_url().'assets'?>/app-assets/images/logo/logo-bisma_2.png" alt="materialize logo">
				<span style="color: #000 !important; font-size: 20px !important; padding-left: 10px;" >BISMA</span>
				</a></h1>
				<div class="col s12">
					<div class="col s4">
							<a class="brand-logo darken-1" href="<?= site_url('Main/Home')?>"><img class="hide-on-med-and-down " src="<?= base_url().'assets'?>/app-assets/images/logo/logo-bisma_2.png" alt="materialize logo"><img class="show-on-medium-and-down hide-on-med-and-up" src="<?= base_url().'assets'?>/app-assets/images/logo/logo-bisma_2.png" alt="materialize logo"></a>
					</div>
					<div class="col s8">
					<span style="color: #000 !important; font-size: 20px !important; padding-left: 10px;" >BISMA</span>
					</div>
				</div> -->
				
      </div>

      <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out" data-menu="menu-navigation" data-collapsible="accordion">
        
      <?php
				if($role_id != 1){
			?>
				<li class="bold"><a class="waves-effect waves-cyan" href="<?= site_url('Main/Home')?>">
          <i class="material-icons">
          home
          </i><span class="menu-title" data-i18n="Mail">Dashboard</span></a>
          </li>

          <li class="navigation-header"><a class="navigation-header-text">Anggaran</a>
          <i class="navigation-header-icon material-icons">more_horiz</i>
          </li>

          <!-- DIGRUP ANGGARAN -->

          <li class="bold <?=mappingD_none($kdsatker)?>"><a class="waves-effect waves-cyan" href="<?= site_url('Anggaran/Mappingapp/Page/'.$kdsatker. '/'.$thang.'/'.$user_id.'/'.$role_id.'/'.$unit_id)?>">
          <i class="material-icons">
          view_comfy
          </i><span class="menu-title" data-i18n="Mail">Mapping App</span></a>
          </li>

          <li class="bold"><a class="waves-effect waves-cyan" href="<?= site_url('pageMissing/pageMissing')?>">
          <i class="material-icons">
          home
          </i><span class="menu-title" data-i18n="Mail">Mapping Lembur</span></a>
          </li>

         

          


          <li class="navigation-header"><a class="navigation-header-text">Rencana Kegiatan</a>
          <i class="navigation-header-icon material-icons">more_horiz</i>
          </li>

          <!-- DIGRUP RENCANA KEGIATAN -->
          <li class="bold"><a class="waves-effect waves-cyan" href="<?= site_url('Transaksi/SuratTugas/Page/'.$kdsatker)?>">
          <i class="material-icons">
          email
          </i><span class="menu-title" data-i18n="Mail">Perjadin Pegawai</span></a>
          </li>

          <li class="bold"><a class="waves-effect waves-cyan" href="<?= site_url('pageMissing/pageMissing')?>">
          <i class="material-icons">
          speaker_notes
          </i><span class="menu-title" data-i18n="Mail">Perjadin Diklat</span></a>
          </li>

          <li class="bold"><a class="waves-effect waves-cyan" href="<?= site_url('pageMissing/pageMissing')?>">
          <i class="material-icons">
          book
          </i><span class="menu-title" data-i18n="Mail">ST Non-Biaya</span></a>
          </li>

          <li class="bold"><a class="waves-effect waves-cyan" href="<?= site_url('pageMissing/pageMissing')?>">
          <i class="material-icons">
          business_center
          </i><span class="menu-title" data-i18n="Mail">Lembur</span></a>
          </li>

          <li class="bold"><a class="waves-effect waves-cyan" href="<?= site_url('pageMissing/pageMissing')?>">
          <i class="material-icons">
          call_to_action
          </i><span class="menu-title" data-i18n="Mail">PBJ</span></a>
          </li>

			<?php
				}else{
			?>
      		<li class="bold"><a class="waves-effect waves-cyan" href="<?= site_url('Main/Home')?>">
          <i class="material-icons">
          home
          </i><span class="menu-title" data-i18n="Mail">Dashboard</span></a>
          </li>

          <li class="navigation-header"><a class="navigation-header-text">Anggaran</a>
          <i class="navigation-header-icon material-icons">more_horiz</i>
          </li>

          <!-- DIGRUP ANGGARAN -->

          <li class="bold"><a class="waves-effect waves-cyan" href="<?= site_url('Anggaran/Transfer')?>">
          <i class="material-icons">
          get_app
          </i><span class="menu-title" data-i18n="Mail">Transfer Pagu</span></a>
          </li>

          
          <li class="bold"><a class="waves-effect waves-cyan" href="<?= site_url('Anggaran/Pembagianpagu/Page/'.$kdsatker. '/'.$thang.'/'.$user_id.'/'.$role_id.'/'.$unit_id)?>">
          <i class="material-icons">
          turned_in_not
          </i><span class="menu-title" data-i18n="Mail">Pembagian Pagu</span></a>
          </li>

          <li class="bold <?=mappingD_none($kdsatker)?>"><a class="waves-effect waves-cyan" href="<?= site_url('Anggaran/Mappingapp/Page/'.$kdsatker. '/'.$thang.'/'.$user_id.'/'.$role_id.'/'.$unit_id)?>">
          <i class="material-icons">
          view_comfy
          </i><span class="menu-title" data-i18n="Mail">Mapping App</span></a>
          </li>


          <li class="bold"><a class="waves-effect waves-cyan" href="<?= site_url('pageMissing')?>">
          <i class="material-icons">
          photo_filter
          </i><span class="menu-title" data-i18n="Mail">Mapping Lembur</span></a>
          </li>


          <li class="navigation-header"><a class="navigation-header-text">Rencana Kegiatan</a>
          <i class="navigation-header-icon material-icons">more_horiz</i>
          </li>

          <!-- DIGRUP RENCANA KEGIATAN -->
          <li class="bold"><a class="waves-effect waves-cyan" href="<?= site_url('Transaksi/SuratTugas/Page/'.$kdsatker)?>">
          <i class="material-icons">
          email
          </i><span class="menu-title" data-i18n="Mail">Perjadin Pegawai</span></a>
          </li>

          <li class="bold"><a class="waves-effect waves-cyan" href="<?= site_url('pageMissing/pageMissing')?>">
          <i class="material-icons">
          speaker_notes
          </i><span class="menu-title" data-i18n="Mail">Perjadin Diklat</span></a>
          </li>

          <li class="bold"><a class="waves-effect waves-cyan" href="<?= site_url('pageMissing/pageMissing')?>">
          <i class="material-icons">
          book
          </i><span class="menu-title" data-i18n="Mail">ST Non-Biaya</span></a>
          </li>

          <li class="bold"><a class="waves-effect waves-cyan" href="<?= site_url('pageMissing/pageMissing')?>">
          <i class="material-icons">
          business_center
          </i><span class="menu-title" data-i18n="Mail">Lembur</span></a>
          </li>

          <li class="bold"><a class="waves-effect waves-cyan" href="<?= site_url('pageMissing/pageMissing')?>f">
          <i class="material-icons">
          call_to_action
          </i><span class="menu-title" data-i18n="Mail">PBJ</span></a>
          </li>

          <li class="navigation-header"><a class="navigation-header-text">Pengaturan</a>
          <i class="navigation-header-icon material-icons">more_horiz</i>
          </li>

          <!-- DIGRUP RENCANA KEGIATAN -->
          <li class="bold"><a class="waves-effect waves-cyan" href="<?= site_url('Profile/Profile/Page/'.$kdsatker)?>">
          <i class="material-icons">
          import_contacts
          </i><span class="menu-title" data-i18n="Mail">Pengguna</span></a>
          </li>

					<li class="bold"><a class="waves-effect waves-cyan" href="<?= site_url('Master/Pegawai/Page/')?>">
          <i class="material-icons">
          face
          </i><span class="menu-title" data-i18n="Mail">Pegawai</span></a>
          </li>

					<li class="bold"><a class="waves-effect waves-cyan" href="<?= site_url('Master/Pejabat/Page/')?>">
          <i class="material-icons">
          grade
          </i><span class="menu-title" data-i18n="Mail">Pejabat</span></a>
          </li>

					<li class="bold"><a class="waves-effect waves-cyan" href="<?= site_url('Master/Jabatan/Page/')?>">
          <i class="material-icons">
          local_library
          </i><span class="menu-title" data-i18n="Mail">Jabatan</span></a>
          </li>

					<!-- <li class="bold"><a class="waves-effect waves-cyan" href="<?= site_url('Master/PPK/Page/')?>">
          <i class="material-icons">
          confirmation_number
          </i><span class="menu-title" data-i18n="Mail">PPK</span></a>
          </li> -->


			<?php		
				}
			?>



        <!-- <li class="navigation-header"><a class="navigation-header-text">Anggaran</a>
          <i class="navigation-header-icon material-icons">more_horiz</i>
          </li>

        <li class="bold"><a class="waves-effect waves-cyan " href="<?= site_url('Anggaran/Pembagianpagu/Page/'.$this->session->userdata("kdsatker").'/'.$this->session->userdata("thang").'/'.$this->session->userdata("user_id"))?>">
          <i class="material-icons">
          turned_in_not
          </i><span class="menu-title" data-i18n="Mail">Pembagian Pagu</span></a>
          </li>

        <li class="bold"><a class="waves-effect waves-cyan " href="<?= site_url('Anggaran/Mappingapp/Page/'.$this->session->userdata("kdsatker").'/'.$this->session->userdata("user_id").'/'.$this->session->userdata("role_id").'/0')?>">
          <i class="material-icons">
          view_comfy
          </i><span class="menu-title" data-i18n="Chat">Mapping App</span></a>
          </li>

        <li class="bold"><a class="waves-effect waves-cyan " href="<?= site_url('Anggaran/Transfer')?>">
          <i class="material-icons">
          get_app
          </i><span class="menu-title" data-i18n="Chat">Transfer Pagu</span></a>
          </li>

        
        <li class="navigation-header"><a class="navigation-header-text">Transaksi </a>
          <i class="navigation-header-icon material-icons">more_horiz</i>
        </li>

        <li class="bold"><a class="waves-effect waves-cyan " href="<?= site_url('Transaksi/SuratTugas/Page')?>">
          <i class="material-icons">
          email
          </i><span class="menu-title" data-i18n="User Profile">Surat Tugas</span></a>
        </li>

        <li class="bold"><a class="waves-effect waves-cyan " href="<?= site_url('Transaksi/NotaDinas')?>">
          <i class="material-icons">
          speaker_notes
          </i><span class="menu-title" data-i18n="User Profile">Nota Dinas</span></a>
        </li>

        <li class="bold"><a class="waves-effect waves-cyan " href="user-profile-page.html">
          <i class="material-icons">
          check
          </i><span class="menu-title" data-i18n="User Profile">Verifikasi</span></a>
        </li>

        <li class="bold"><a class="waves-effect waves-cyan " href="user-profile-page.html">
          <i class="material-icons">
          credit_card
          </i><span class="menu-title" data-i18n="User Profile">Pembayaran</span></a>
        </li>

        <li class="navigation-header"><a class="navigation-header-text">Laporan </a><i class="navigation-header-icon material-icons">more_horiz</i>
        </li>

        <li class="bold"><a class="waves-effect waves-cyan " href="user-profile-page.html">
          <i class="material-icons">
          import_contacts
          </i><span class="menu-title" data-i18n="User Profile">Quick Report</span></a>
        </li>

        
        <li class="navigation-header"><a class="navigation-header-text">Master Data </a><i class="navigation-header-icon material-icons">more_horiz</i>
        </li>
        
        <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">face</i><span class="menu-title" data-i18n="Forms">Data Pegawai</span></a>
          <div class="collapsible-body">
            <ul class="collapsible collapsible-sub" data-collapsible="accordion">
              <li><a href="form-elements.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Form Elements">Form Elements</span></a>
              </li>
              <li><a href="form-select2.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Form Select2">Form Select2</span></a>
              </li>
              <li><a href="form-validation.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Form Validation">Form Validation</span></a>
              </li>
            </ul>
          </div>
        </li>
        
        <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">directions_car</i><span class="menu-title" data-i18n="Forms">Transportasi</span></a>
          <div class="collapsible-body">
            <ul class="collapsible collapsible-sub" data-collapsible="accordion">
              <li><a href="form-elements.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Form Elements">Form Elements</span></a>
              </li>
              <li><a href="form-select2.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Form Select2">Form Select2</span></a>
              </li>
            </ul>
          </div>
        </li>

        <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">hotel</i><span class="menu-title" data-i18n="Forms">Penginapan</span></a>
          <div class="collapsible-body">
            <ul class="collapsible collapsible-sub" data-collapsible="accordion">
              <li><a href="form-elements.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Form Elements">Form Elements</span></a>
              </li>
              <li><a href="form-select2.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Form Select2">Form Select2</span></a>
              </li>
            </ul>
          </div>
        </li>

        <li class="navigation-header"><a class="navigation-header-text">Pengaturan </a><i class="navigation-header-icon material-icons">more_horiz</i>
        </li>
        
        <li class="bold"><a class="waves-effect waves-cyan " href="<?= site_url('Profile/Profile/Page/'.$this->session->userdata("kdsatker"))?>"><i class="material-icons">import_contacts</i><span class="menu-title" data-i18n="Documentation">Pengguna</span></a>
        </li>

        <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">photo_filter</i><span class="menu-title" data-i18n="Menu levels">Utility</span></a>
          <div class="collapsible-body">
            <ul class="collapsible collapsible-sub" data-collapsible="accordion">
              <li><a href="JavaScript:void(0)"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Second level">Second level</span></a>
              </li>
              <li><a class="collapsible-header waves-effect waves-cyan" href="JavaScript:void(0)"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Second level child">Second level child</span></a>
                <div class="collapsible-body">
                  <ul class="collapsible" data-collapsible="accordion">
                    <li><a href="JavaScript:void(0)"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Third level">Third level</span></a>
                    </li>
                  </ul>
                </div>
              </li>
            </ul>
          </div>
        </li> -->

      </ul>
      <div class="navigation-background"></div><a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only" href="#" data-target="slide-out"><i class="material-icons">menu</i></a>
    </aside>
    <!-- END: SideNav-->

<!-- BEGIN: Page Main-->
<div id="main">
	<div class="row">
		<div class="col s12">
			<div class="container">
				<div class="section">

        