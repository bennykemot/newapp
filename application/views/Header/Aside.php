<?php include 'AssetsHeader.php';?>
<?php include 'Upside.php';?>
    <!-- BEGIN: SideNav-->
    <aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-dark sidenav-active-rounded">
      <div class="brand-sidebar">
        <h1 class="logo-wrapper"><a class="brand-logo darken-1" href="index.html"><img class="hide-on-med-and-down " src="<?= base_url().'assets'?>/app-assets/images/logo/materialize-logo.png" alt="materialize logo"><img class="show-on-medium-and-down hide-on-med-and-up" src="<?= base_url().'assets'?>/app-assets/images/logo/materialize-logo-color.png" alt="materialize logo"><span class="logo-text hide-on-med-and-down">Materialize</span></a></h1>
      </div>
      <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out" data-menu="menu-navigation" data-collapsible="accordion">
        <li class="bold"><a class="waves-effect waves-cyan " href="app-email.html">
          <i class="material-icons">
          home
          </i><span class="menu-title" data-i18n="Mail">Dashboard</span></a>
          </li>

        <li class="navigation-header"><a class="navigation-header-text">Anggaran</a>
          <i class="navigation-header-icon material-icons">more_horiz</i>
          </li>

        <li class="bold"><a class="waves-effect waves-cyan " href="<?= site_url('Anggaran/Pembagianpagu')?>">
          <i class="material-icons">
          turned_in_not
          </i><span class="menu-title" data-i18n="Mail">Pembagian Pagu</span></a>
          </li>

        <li class="bold"><a class="waves-effect waves-cyan " href="<?= site_url('Anggaran/Mappingapp')?>">
          <i class="material-icons">
          view_comfy
          </i><span class="menu-title" data-i18n="Chat">Mapping App</span></a>
          </li>

        
        <li class="navigation-header"><a class="navigation-header-text">Transaksi </a>
          <i class="navigation-header-icon material-icons">more_horiz</i>
        </li>

        <li class="bold"><a class="waves-effect waves-cyan " href="user-profile-page.html">
          <i class="material-icons">
          email
          </i><span class="menu-title" data-i18n="User Profile">Surat Tugas</span></a>
        </li>

        <li class="bold"><a class="waves-effect waves-cyan " href="user-profile-page.html">
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
        
        <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">chrome_reader_mode</i><span class="menu-title" data-i18n="Forms">Forms</span></a>
          <div class="collapsible-body">
            <ul class="collapsible collapsible-sub" data-collapsible="accordion">
              <li><a href="form-elements.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Form Elements">Form Elements</span></a>
              </li>
              <li><a href="form-select2.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Form Select2">Form Select2</span></a>
              </li>
              <li><a href="form-validation.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Form Validation">Form Validation</span></a>
              </li>
              <li><a href="form-masks.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Form Masks">Form Masks</span></a>
              </li>
              <li><a href="form-editor.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Form Editor">Form Editor</span></a>
              </li>
              <li><a href="form-file-uploads.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="File Uploads">File Uploads</span></a>
              </li>
            </ul>
          </div>
        </li>
        
        <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">chrome_reader_mode</i><span class="menu-title" data-i18n="Forms">Forms</span></a>
          <div class="collapsible-body">
            <ul class="collapsible collapsible-sub" data-collapsible="accordion">
              <li><a href="form-elements.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Form Elements">Form Elements</span></a>
              </li>
              <li><a href="form-select2.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Form Select2">Form Select2</span></a>
              </li>
              <li><a href="form-validation.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Form Validation">Form Validation</span></a>
              </li>
              <li><a href="form-masks.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Form Masks">Form Masks</span></a>
              </li>
              <li><a href="form-editor.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Form Editor">Form Editor</span></a>
              </li>
              <li><a href="form-file-uploads.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="File Uploads">File Uploads</span></a>
              </li>
            </ul>
          </div>
        </li>

        <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">chrome_reader_mode</i><span class="menu-title" data-i18n="Forms">Forms</span></a>
          <div class="collapsible-body">
            <ul class="collapsible collapsible-sub" data-collapsible="accordion">
              <li><a href="form-elements.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Form Elements">Form Elements</span></a>
              </li>
              <li><a href="form-select2.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Form Select2">Form Select2</span></a>
              </li>
              <li><a href="form-validation.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Form Validation">Form Validation</span></a>
              </li>
              <li><a href="form-masks.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Form Masks">Form Masks</span></a>
              </li>
              <li><a href="form-editor.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Form Editor">Form Editor</span></a>
              </li>
              <li><a href="form-file-uploads.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="File Uploads">File Uploads</span></a>
              </li>
            </ul>
          </div>
        </li>

        <li class="navigation-header"><a class="navigation-header-text">Pengaturan </a><i class="navigation-header-icon material-icons">more_horiz</i>
        </li>
        
        <li class="bold"><a class="waves-effect waves-cyan " href="<?= site_url('Profile/Profile')?>"><i class="material-icons">import_contacts</i><span class="menu-title" data-i18n="Documentation">Penggunan</span></a>
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
        </li>

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