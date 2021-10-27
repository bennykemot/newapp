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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  
    <link rel="stylesheet" type="text/css" href="<?= base_url().'assets'?>/app-assets/css/pages/login.css">

    <link rel="stylesheet" type="text/css" href="<?= base_url().'assets'?>/app-assets/vendors/vendors.min.css">

    <link rel="stylesheet" type="text/css" href="<?= base_url().'assets'?>/app-assets/vendors/flag-icon/css/flag-icon.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url().'assets'?>/app-assets/vendors/data-tables/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url().'assets'?>/app-assets/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url().'assets'?>/app-assets/vendors/data-tables/css/select.dataTables.min.css">


    <link rel="stylesheet" type="text/css" href="<?= base_url().'assets'?>/app-assets/vendors/flag-icon/css/flag-icon.min.css">

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> -->
    <link rel="stylesheet" type="text/css" href="<?= base_url().'assets'?>/app-assets/css/themes/vertical-dark-menu-template/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url().'assets'?>/app-assets/css/themes/vertical-dark-menu-template/style.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url().'assets'?>/app-assets/css/pages/data-tables.min.css">

    <!-- <link rel="stylesheet" href="<?= base_url().'assets'?>/app-assets/vendors/select2/select2.min.css" type="text/css"> -->
    <!-- <link rel="stylesheet" href="<?= base_url().'assets'?>/app-assets/vendors/select2/select2-materialize.css" type="text/css"> -->

    <link rel="stylesheet" type="text/css" href="<?= base_url().'assets'?>/app-assets/css/pages/dashboard.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url().'assets'?>/app-assets/css/custom/custom.css">

    <link rel="stylesheet" type="text/css" href="<?= base_url().'assets'?>/app-assets/css/custom/select2.css">

    <link rel="stylesheet" type="text/css" href="<?= base_url().'assets'?>/app-assets/vendors/sweetalert/sweetalert.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowgroup/1.1.3/css/rowGroup.dataTables.min.css">

    <link rel="stylesheet" type="text/css" href="<?= base_url().'assets'?>/app-assets/vendors/animate-css/animate.css">
  </head>

  <style>
/* .select-wrapper{
  display: none !important;
} */

.input-field{
  position: relative;
  margin-top: 0 !important;
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
  text-align: right
}

.pagination li {
  display: inline;
  padding-left : 10px;
}

.pagination li a {
  display: inline-block;
  text-decoration: none;
  padding: 5px 10px;
  color: #000
}

.pagination a.active {
  background-color: #03a9f4;
  color: #fff
}

.pagination a:hover:not(.active) {
  background-color: #03a9f4;
}

.pagination li a {
  border-radius: 5px;
  -webkit-transition: background-color 0.3s;
  transition: background-color 0.3s;
 
    
}

.d-none{
  display: none
}

/* border-pagination */
.b-pagination-outer {
  width: 100%;
  margin: 0 auto;
  text-align: center;
  overflow: hidden;
  display: flex
}
#border-pagination {
  margin: 0 auto;
  padding: 0;
  text-align: center
}
#border-pagination li {
  display: inline;

}
#border-pagination li a {
  display: block;
  text-decoration: none;
  color: #000;
  padding: 5px 10px;
  border: 1px solid #ddd;
  float: left;

}
#border-pagination li a {
  -webkit-transition: background-color 0.4s;
  transition: background-color 0.4s
}
#border-pagination li a.active {
  background-color: #4caf50;
  color: #fff;
}
#border-pagination li a:hover:not(.active) {
  background: #ddd;
}


  </style>

  <!-- END: Head-->
  <body class="vertical-layout page-header-light vertical-menu-collapsible vertical-dark-menu preload-transitions 2-columns   " data-open="click" data-menu="vertical-dark-menu" data-col="2-columns">

    <!-- BEGIN: Header-->