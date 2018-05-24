<?php
    session_start();
    if (!empty($_SESSION['username']) AND !empty($_SESSION['password']))
    {
    include "lib/koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Garuda Indonesia</title>
  <link rel="icon" href="src/img/icon_dasar.ico" type="image/x-icon">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- daterange picker -->
  <link rel="stylesheet" href="src/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="src/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="src/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="src/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="src/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="src/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="src/bower_components/Ionicons/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="src/bower_components/jvectormap/jquery-jvectormap.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="src/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="src/dist/css/skins/_all-skins.min.css">

  <script type="text/javascript" src="src/bower_components/jquery/dist/jquery.min.js"></script>
  <script type="text/javascript" src="src/bower_components/jquery/dist/jquery.min.js"></script>
  <script src="src/bower_components/jquery/src/ajax/script.js"></script>

    <script>
      $(document).ready(function(){
        $("#kontrak").change(function(){
          var kontrak  = $("#kontrak").val();
            $.ajax({
              url:"page/report_vendor/proses_report.php",
              data:"kontrak=" + kontrak,
              success:function(data){
                $("#varian").html(data);
              }
            })
        })
      })

      $(document).ready(function(){
        $("#kontrak2").change(function(){
          var kontrak  = $("#kontrak2").val();
            $.ajax({
              url:"page/report_vendor/proses_report.php",
              data:"kontrak2=" + kontrak,
              success:function(data){
                $("#varian2").html(data);
              }
            })
        })
      })
    </script>


  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><i class="fa fa-plane"></i></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><i class="fa fa-plane"></i> Garuda <b>Indonesia</b></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>


      <!-- Navbar User -->
      <div class="navbar-custom-menu">
        <?php 
          include "navbar.php"; 
        ?>
      </div>
      <!-- Navbar User -->

    </nav>
  </header>

  <!-- Sidebar WEB -->
  <aside class="main-sidebar">
    <section class="sidebar">

      <?php
        include "sidebar.php";
       ?>

    </section>
  </aside>
  <!-- Sidebar WEB -->

  <!-- Isi Web -->
  <div class="content-wrapper">

    <?php
    include "konten.php";
    ?>

  </div>
  <!-- Isi Web -->

  <footer class="main-footer">
    <strong>Copyright &copy; <a href="https://adminlte.io">Admin LTE</a>.</strong>Fitri Luthfiana Sari
  </footer>

  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->
<!-- jQuery 3 -->
<script src="src/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="src/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="src/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="src/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- FastClick -->
<script src="src/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="src/dist/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="src/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="src/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="src/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll -->
<script src="src/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- bootstrap datepicker -->
<script src="src/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- ChartJS -->
<script src="src/bower_components/chart.js/Chart.js"></script>
<!-- Select2 -->
<script src="src/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="src/plugins/input-mask/jquery.inputmask.js"></script>
<script src="src/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="src/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="src/bower_components/moment/min/moment.min.js"></script>
<script src="src/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="src/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="src/dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="src/dist/js/demo.js"></script>

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })
</script>

<script>
  $('[data-mask]').inputmask()
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'YYYY/MM/DD h:mm A' })

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true,
      format: "MM-yyyy",
      startView: "months", 
      minViewMode: "months"
    })
    $('#datepicker1').datepicker({
      autoclose: true,
      format: "MM-yyyy",
      startView: "months", 
      minViewMode: "months"
    })

  })
</script>



</body>
</html>
<?php
}
else { ?>
<div class="col-md-12" align="center">
  <button type="button" name="button" class="btn btn-primary">Login Terlebih dahulu</button>
</div>


<?php echo"<meta http-equiv='refresh' content='1;
url=login.php'>";
} ?>