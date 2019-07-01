<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?php echo $titulo ?></title>

  <!-- Bootstrap core CSS-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!-- Custom fonts for this template-->
  <!--<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">-->
  <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap4-sb-admin/vendor/fontawesome-free/css/all.min.css')?>">

  <!-- Page level plugin CSS-->
  <link href="<?php echo base_url("assets/bootstrap4-sb-admin/vendor/datatables/dataTables.bootstrap4.css") ?>" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url("assets/bootstrap4-sb-admin/css/sb-admin.css") ?>" rel="stylesheet">

</head>

<body id="page-top">
  <?php $this->load->view('navbar'); ?>
  <div id="wrapper">
    <!-- Sidebar -->
    <?php //$this->load->view('sidebar'); ?>
    <div id="content-wrapper">
      
    
      <div class="container-fluid">
        <!-- Breadcrumbs-->
        <?php 
        if ($msg = get_msg()):
         ?>
          <div class = "<?php echo @$msg['class'] ?>" role = "alert">
            <?php echo @$msg['aviso']; ?>
          </div>
          <?php
        endif;
        ?>

        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <?php echo $bread1 ?>
          </li>
          <li class="breadcrumb-item active">
            <a href="#" id="btn_graficos"><?php echo $bread2 ?></a>
          </li>
        </ol>

        <?php $this->load->view($page); ?> 
      </div>   

      <div class="row">
       <footer class="sticky-footer">
          <div class="container my-auto">
           <div class="copyright text-center my-auto">
            <span>Copyright © Your Website 2018</span>
           </div>
          </div>
        </footer>
      </div>
    </div>
  </div>

<!-- Bootstrap core JavaScript-->
    <!--
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    
    <!-- Core plugin JavaScript->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Page level plugin JavaScript-->
    <!--
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- -->
    <script src="<?php echo base_url("assets/bootstrap4-sb-admin/vendor/chart.js/Chart.min.js") ?>"></script>
    <script src="<?php echo base_url("assets/bootstrap4-sb-admin/vendor/datatables/jquery.dataTables.js?02072018") ?>"></script>
    <script src="<?php echo base_url("assets/bootstrap4-sb-admin/vendor/datatables/dataTables.bootstrap4.js") ?>"></script>
    
    <!-- Custom scripts for all pages-->
    <!--
    <script src="js/sb-admin.min.js"></script>
    <!-- -->
    <script src="<?php echo base_url("assets/bootstrap4-sb-admin/js/sb-admin.min.js") ?>"></script>

    <!-- Demo scripts for this page-->
    <!--
    <script src="js/demo/datatables-demo.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>
    <!-- -->
    <script src="<?php echo base_url("assets/bootstrap4-sb-admin/js/demo/datatables-demo.js") ?>"></script>
    <script src="<?php echo base_url("assets/bootstrap4-sb-admin/js/demo/chart-area-demo.js") ?>"></script>


    <script src="<?php echo base_url('assets/bootstrap4-sb-admin/vendor/chart.js/Chart.min.js') ?>"></script>

    <script src="<?php echo base_url('assets/bootstrap4-sb-admin/js/demo/chart-pie-demo.js') ?>"></script>
    <script src="<?php echo base_url('assets/bootstrap4-sb-admin/js/js.js') ?>"></script>

    

  </body>

  </html>
