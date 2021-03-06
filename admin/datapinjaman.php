<?php 
session_start();
if (empty($_SESSION['username'])){
	echo "<script>alert('Anda belum mempunyai hak akses.'); window.location = '../index.html'</script>";	
} else {
	include "../inc/koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistem Penggajian Wawasan">
    <meta name="author" content="Mohammad Yasin S">

    <title>Welcome to Sistem Penggajian Wawasan</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
    
    <script type="text/javascript">
// 1 detik = 1000
window.setTimeout("waktu()",1000);  
function waktu() {   
	var tanggal = new Date();  
	setTimeout("waktu()",1000);  
	document.getElementById("output").innerHTML = tanggal.getHours()+":"+tanggal.getMinutes()+":"+tanggal.getSeconds();
}
</script>
<script language="JavaScript">
var tanggallengkap = new String();
var namahari = ("Minggu Senin Selasa Rabu Kamis Jumat Sabtu");
namahari = namahari.split(" ");
var namabulan = ("Januari Februari Maret April Mei Juni Juli Agustus September Oktober November Desember");
namabulan = namabulan.split(" ");
var tgl = new Date();
var hari = tgl.getDay();
var tanggal = tgl.getDate();
var bulan = tgl.getMonth();
var tahun = tgl.getFullYear();
tanggallengkap = namahari[hari] + ", " +tanggal + " " + namabulan[bulan] + " " + tahun;

	var popupWindow = null;
	function centeredPopup(url,winName,w,h,scroll){
	LeftPosition = (screen.width) ? (screen.width-w)/2 : 0;
	TopPosition = (screen.height) ? (screen.height-h)/2 : 0;
	settings ='height='+h+',width='+w+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',resizable'
	popupWindow = window.open(url,winName,settings)
}
</script>
    
  </head>
  <body>
    <div id="wrapper">

      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Sistem Penggajian Wawasan</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="data_karyawan.php"><i class="fa fa-user"></i> Data Karyawan</a></li>
            <li><a href="tampilgajiaja.php"><i class="fa fa-bar-chart-o"></i> Data Gaji Karyawan</a></li>
            <li class="active"><a href="datapinjaman.php"><i class="fa fa-table"></i> Data Pinjaman</a></li>
            <li><a href="tampilgaji.php"><i class="fa fa-desktop"></i> Cetak Slip Gaji Karyawan</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Laporan <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Laporan Gaji Perbulan</a></li>
                <li><a href="#">Laporan Tahunan</a></li>
                <li><a href="#">Laporan Pembayaran Gaji</a></li>
              </ul>
            </li>
          </ul>

          <ul class="nav navbar-nav navbar-right navbar-user">
            
            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Hallo,
              <?php
              echo $_SESSION['username'];
               ?>
              <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#"><i class="fa fa-user"></i> Profil</a></li>
                <li><a href="#"><i class="fa fa-envelope"></i> Pesan Masuk <span class="badge">7</span></a></li>
                <li><a href="../admin/setting_user.php"><i class="fa fa-gear"></i> Pengaturan </a></li>
                <li class="divider"></li>
                <li><a href="../logout.php" onClick="return confirm('Apakah anda akan keluar?');"><i class="fa fa-power-off"></i> Keluar</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>
      <?php
//session_start();
$timeout = 10; // Set timeout minutes
$logout_redirect_url = "../index.html"; // Set logout URL

$timeout = $timeout * 60; // Converts minutes to seconds
if (isset($_SESSION['start_time'])) {
    $elapsed_time = time() - $_SESSION['start_time'];
    if ($elapsed_time >= $timeout) {
        session_destroy();
        echo "<script>alert('Session Anda Telah Habis!'); window.location = '$logout_redirect_url'</script>";
    }
}
$_SESSION['start_time'] = time();
?>
<?php } ?>
      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Data <small> Pinjaman</small></h1>
            <table width="900">
            <tr>
            <td width="250"><div class="Tanggal"><h4><script language="JavaScript">document.write(tanggallengkap);</script></div></h4></td> 
            <td align="left" width="30"> - </td>
            <td align="left" width="620"> <h4><div id="output" class="jam" ></div></h4></td>
            </tr>
            </table>
            <br />
            <!--<div class="alert alert-success alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>-->
        </div>
        <div class="col-lg-12">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-user"></i> Data Pinjaman </h3> 
              </div>
              <div class="panel-body">
                 <div class="table-responsive">
                    
                  <table class="table table-bordered table-hover table-striped tablesorter">
                  
                      <tr>
                        <th width="11%">Kode<i class="fa fa-sort"></i></th>
                        <th width="15%">Nama<i class="fa fa-sort"></i></th>
                        <th width="17%">Alamat <i class="fa fa-sort"></i></th>
                        <th width="16%">Pinjaman<i class="fa fa-sort"></i></th>
<!--                        <th>Gaji <i class="fa fa-sort"></i></th>		-->
                        <th width="17%">Status<i class="fa fa-sort"></i></th>
                        <th width="15%">Aksi <i class="fa fa-sort"></i></th>
                    </tr>
                     <?php 
                    { ?>
                     <tr>
                       <td>A11</td>
                       <td><i class="fa fa-user"></i> Si A</a></td>
                       <td>Jl. Terserah</td>
                       <td>Rp. 50.000</td>
                       <!--                    <td>Rp.<?php echo number_format($data['gaji_utama'],2,",",".");?></td>		-->
                       <td>Belum Lunas</td>
                       <td><a class="btn btn-sm btn-primary" href="?hal=edit&kd=<?php echo $data['kary_id'];?>"><i class="fa fa-edit"></i> Edit</a> 
					   <a class="btn btn-sm btn-danger" href="?hal=hapus&kd=<?php echo $data['kary_id'];?>" onClick="return confirm('Apakah anda yakin?');"><i class="fa fa-wrench"></i> Hapus</a></td>
                     </tr>
                     <tr>
                       <td>A12</td>
                       <td><i class="fa fa-user"></i> Si B</a></td>
                       <td>Jl. Apa aja</td>
                       <td>Rp. 100.000</td>
                       <!--                    <td>Rp.<?php echo number_format($data['gaji_utama'],2,",",".");?></td>		-->
                       <td>Belum Lunas</td>
                       <td><a class="btn btn-sm btn-primary" href="?hal=edit&kd=<?php echo $data['kary_id'];?>"><i class="fa fa-edit"></i> Edit</a> 
					   <a class="btn btn-sm btn-danger" href="?hal=hapus&kd=<?php echo $data['kary_id'];?>" onClick="return confirm('Apakah anda yakin?');"><i class="fa fa-wrench"></i> Hapus</a></td>
                     </tr>
                    
                 <?php   
              }
              ?>
                   </tbody>
                   </table>
                </div>
                <div class="text-right">
                  <a href="tambahpinjaman.php" class="btn btn-sm btn-warning">Tambah Data Pinjaman <i class="fa fa-arrow-circle-right"></i></a>
              
                </div>
              </div> 
            </div>
          </div>
        </div><!-- /.row --> 

      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

    <!-- Page Specific Plugins -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
    <script src="js/morris/chart-data-morris.js"></script>
    <script src="js/tablesorter/jquery.tablesorter.js"></script>
    <script src="js/tablesorter/tables.js"></script>

  </body>
</html>
