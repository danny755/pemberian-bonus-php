<?php include("lib/database.php");?>
<?php include("proses/ceklogin.php");?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Aplikasi Pemberian Bonus</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-sm-6 text-center">
            <?php 
              if(!empty($_GET['halaman'])){
                if($_GET['halaman']=='kinerja'){
                  $judul = '<b>Form</b> Kinerja Karyawan';
                }
                elseif($_GET['halaman']=='kehadiran'){
                  $judul = '<b>Form</b> Kehadiran Karyawan';
                }
                elseif($_GET['halaman']=='kerajinan'){
                  $judul = '<b>Form</b> Kerajinan Karyawan';
                }
                elseif($_GET['halaman']=='peringkat'){
                  $judul = '<b>Peringkat</b> Penilaian Karyawan';
                }
                elseif($_GET['halaman']=='karyawan'){
                  $judul = '<b>Karyawan</b>';
                }
              }
              else{
                $judul = '<b>Halaman</b> Utama';
              }
            ?>
            <h1 class=""><?php echo $judul; ?></h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-9">
            <div class="card card-primary card-outline">
              <div class="card-body">
                <?php 
                  if(!empty($_GET['halaman'])){
                    if($_GET['halaman']=='kinerja'){
                      include('pages/kepaladivisi.php');
                    }
                    elseif($_GET['halaman']=='kehadiran'){
                      include('pages/kehadiran.php');
                    }
                    elseif($_GET['halaman']=='kerajinan'){
                      include('pages/kerajinan.php');
                    }
                    elseif($_GET['halaman']=='peringkat'){
                      include('pages/tabelperingkat.php');
                    }
                    elseif($_GET['halaman']=='karyawan'){
                      include('pages/karyawan/index.php');
                    }
                  }
                  else{
                    include('pages/halamanutamafinance.php');
                  }
                ?>
              </div>
            </div><!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- SweetAlert2 -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>

