<!DOCTYPE html>


<?php 

$baseurl 	= $this->config->item('base_url');
$assets 	= $this->config->item('assets_url');

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
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url().'assets'?>/app-assets/images/logo/BPKP_Logo_2.png">
    <link href="<?= base_url().'assets'?>/icon.css?family=Material+Icons" rel="stylesheet">
    <!-- <link rel="stylesheet" type="text/css" href="<?= base_url().'assets'?>/app-assets/css/pages/login.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url().'assets'?>/app-assets/vendors/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url().'assets'?>/app-assets/vendors/flag-icon/css/flag-icon.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url().'assets'?>/app-assets/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url().'assets'?>/app-assets/vendors/data-tables/css/select.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url().'assets'?>/app-assets/vendors/data-tables/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url().'assets'?>/app-assets/css/pages/data-tables.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url().'assets'?>/app-assets/vendors/flag-icon/css/flag-icon.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url().'assets'?>/app-assets/css/themes/vertical-dark-menu-template/materialize.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url().'assets'?>/app-assets/css/themes/vertical-dark-menu-template/style.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url().'assets'?>/app-assets/css/pages/data-tables.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url().'assets'?>/app-assets/css/pages/dashboard.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url().'assets'?>/app-assets/css/custom/custom.css"> -->

    <!-- BEGIN: VENDOR CSS-->
<!-- BEGIN: VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url().'assets'?>/app-assets/vendors/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url().'assets'?>/app-assets/vendors/flag-icon/css/flag-icon.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url().'assets'?>/app-assets/vendors/data-tables/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url().'assets'?>/app-assets/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url().'assets'?>/app-assets/vendors/data-tables/css/select.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url().'assets'?>/app-assets/css/themes/vertical-dark-menu-template/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url().'assets'?>/app-assets/css/themes/vertical-dark-menu-template/style.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url().'assets'?>/app-assets/css/pages/data-tables.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url().'assets'?>/app-assets/css/custom/custom.css">

    <link rel="stylesheet" href="<?= base_url().'assets'?>/app-assets/vendors/select2/select2.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url().'assets'?>/app-assets/vendors/select2/select2-materialize.css" type="text/css">
    <!-- END: Custom CSS-->
  </head>

  <style>
/* .select-wrapper{
  display: none !important;
} */

/* .input-field{
  position: relative;
  margin-top: 0 !important;
} */

.select{
  display: none;
}

#page-length-option tr td {
    height: 5px !important;
}

.text-right{
  text-align: right;
}

.text-left{
  text-align: left;
}

.text-center{
  text-align: center;
}

.pagination {
  padding: 0;
  text-align: right;
  font-size: 15px;
}

.pagination li {
  display: inline;
  padding-left : 10px;
  font-size: 15px;
}

.pagination li a {
  display: inline-block;
  text-decoration: none;
  /* padding: 5px 10px; */
  color: #616161;
  font-size: 15px;
}

.pagination a.active {
  color: #fff !important;
border: 1px solid #2196f3;
border-radius: 6px;
background: #2196f3;
box-shadow: 0 0 8px 0 #2196f3;
font-size: 15px;
}

.pagination a:hover:not(.active) {
  background-color: #03a9f4;
  font-size: 15px;
  color: #FFF;
  box-shadow: 0 0 8px 0 #2196f3;
}

.pagination li a {
  border-radius: 5px;
  -webkit-transition: background-color 0.3s;
  transition: background-color 0.3s;
  font-size: 15px;
 
    
}

.d-none{
  display: none
}

table.dataTable tbody td {
    word-break: break-word;
    vertical-align: top;
}

/* .select2-dropdown--below {
    top: -2.8rem; 
} */

label{
  vertical-align: text-bottom !important;
}


  </style>

  <?php 

function currentMonth($data){
  $bulan = array (
    1 =>   'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );

  return $bulan[$data];
}

function getapprove($data){

  $res = "btn red col s2";
  if($data == 1){
    $res = "btn green col s2";
  }
  return $res;

}
  
  ?>

  <!-- END: Head-->
  <body class="vertical-layout page-header-light vertical-menu-collapsible vertical-dark-menu preload-transitions 2-columns   " data-open="click" data-menu="vertical-dark-menu" data-col="2-columns">

    <!-- BEGIN: Header-->