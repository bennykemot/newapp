<!DOCTYPE html>
<?php 

$baseurl 	= $this->config->item('base_url');
$assets 	= $this->config->item('assets_url');
$url = 'javascript:window.history.go(-1);';

?>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google.">
    <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template, eCommerce dashboard, analytic dashboard">
    <meta name="author" content="ThemeSelect">
    <title>Manajemen Keuangan - 2022</title>
    <link rel="apple-touch-icon" href="<?= base_url().'assets'?>/app-assets/images/logo/BPKP_Logo_2.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url().'assets'?>/app-assets/images/favicon/favicon-32x32.png">
    <link href="../../../../icon.css?family=Material+Icons" rel="stylesheet">
    <!-- BEGIN: VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url().'assets'?>/app-assets/vendors/vendors.min.css">
    <!-- END: VENDOR CSS-->
    <!-- BEGIN: Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url().'assets'?>/app-assets/css/themes/vertical-dark-menu-template/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url().'assets'?>/app-assets/css/themes/vertical-dark-menu-template/style.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url().'assets'?>/app-assets/css/pages/page-404.min.css">
    <!-- END: Page Level CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url().'assets'?>/app-assets/css/custom/custom.css">
    <!-- END: Custom CSS-->
  </head>
  <!-- END: Head-->
  <body class="vertical-layout page-header-light vertical-menu-collapsible vertical-dark-menu preload-transitions 1-column  bg-full-screen-image  blank-page blank-page" data-open="click" data-menu="vertical-dark-menu" data-col="1-column">
    <div class="row">
      <div class="col s12">
        <div class="container"><div class="section section-404 p-0 m-0 height-100vh">
  <div class="row">
    <!-- 404 -->
    <div class="col s12 center-align white">
      <img src="<?= base_url().'assets'?>/app-assets/images/gallery/error.jpg" class="bg-image-404" alt="">
      <h1 class="error-code m-0">404</h1>
      <h6 class="mb-2">BAD REQUEST</h6>
      <a class="btn waves-effect waves-light gradient-45deg-deep-purple-blue gradient-shadow mb-4" href="<?=$url?>">Back
        TO Home</a>
    </div>
  </div>
</div>
        </div>
        <div class="content-overlay"></div>
      </div>
    </div>

    <!-- BEGIN VENDOR JS-->
    <script src="<?= base_url().'assets'?>/app-assets/js/vendors.min.js"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN THEME  JS-->
    <script src="<?= base_url().'assets'?>/app-assets/js/plugins.min.js"></script>
    <script src="<?= base_url().'assets'?>/app-assets/js/search.min.js"></script>
    <script src="<?= base_url().'assets'?>/app-assets/js/custom/custom-script.min.js"></script>
    <!-- END THEME  JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <!-- END PAGE LEVEL JS-->
  </body>
</html>