<?php 
session_start();
include("../middleware/adminMiddleware.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    DARKDO-STORE
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/material-dashboard.min.css" rel="stylesheet" />
  <link id="pagestyle" href="assets/css/form.css" rel="stylesheet" />
  <link rel="shortcut icon" type="image/icon" href="logof/favicon.ico"/>

  <!-- Alertify JS -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

</head>   

<body class="g-sidenav-show  bg-gray-200">

    <?php include("sidebar.php");?>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <?php include("navbar.php"); ?> 
    
    <div class="container-fluid py-4">
        <div class="row  h-100">
          <div class="col-12">
          </div>
      </div>
</body>