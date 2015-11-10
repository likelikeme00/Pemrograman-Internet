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

    <title>Welcome to Wawasan ( Sistem Penggajian Wawasan )</title>

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
          <a class="navbar-brand" href="index.html">Sistem Penggajian Wawasan</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
						<li ><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
						<li class="active"><a href="data_karyawan.php"><i class="fa fa-user"></i> Data Karyawan</a></li>
						<li ><a href="tampilgajiaja.php"><i class="fa fa-bar-chart-o"></i> Data Gaji Karyawan</a></li>
						<li><a href="datapinjaman.php"><i class="fa fa-table"></i> Data Pinjaman</a></li>
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
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
              <?php
              echo $_SESSION['username'];
               ?>
              <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
                <li><a href="#"><i class="fa fa-envelope"></i> Inbox <span class="badge">7</span></a></li>
                <li><a href="../admin/setting_user.php"><i class="fa fa-gear"></i> Settings</a></li>
                <li class="divider"></li>
                <li><a href="../logout.php" onclick="return confirm('Apakah anda akan keluar?');"><i class="fa fa-power-off"></i> Log Out</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>
      
<?php } ?>
      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Tambah Data<small> karyawan </small></h1>
            <ol class="breadcrumb">
              <li class="active"><i class="fa fa-dashboard"></i> Halaman Tambah Data karyawan </li>
            </ol>
            <table width="900">
            <tr>
            <td width="250"><div class="Tanggal"><h4><script language="JavaScript">document.write(tanggallengkap);</script></div></h4></td> 
            <td align="left" width="30"> - </td>
            <td align="left" width="620"> <h4><div id="output" class="jam" ></div></h4></td>
            </tr>
            </table>
            <br />
            <div class="alert alert-success alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
             karyawan ID auto number jadi tidak perlu di isi, abaikan saja..
          </div>
        </div><!-- /.row -->

        
        <!-- /.row -->
        <div class="col-lg-12">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-user"></i> Tambah Data karyawan  </h3>
              </div>
              <div class="panel-body">
                 <div class="table-responsive">
                  
    <form action="insert.php" method="post">
    <table class="table table-condensed">
    <tr>
        <td><label for="karyawan_id">karyawan ID</label></td>
        <td><input name="karyawan_id" type="text" class="form-control" id="karyawan_id" placeholder="karyawan ID" readonly/></td>
      </tr>
      <tr>
        <td><label for="kode_karyawan">Kode karyawan </label></td>
        <td><input name="kode_karyawan" type="text" class="form-control" id="kode_karyawan" placeholder="Kode karyawan" required/></td>
      </tr>
      <tr>
        <td><label for="nama_karyawan">Nama karyawan </label></td>
        <td><input name="nama_karyawan" type="text" class="form-control" id="nama_karyawan" placeholder="Nama karyawan" required/></td>
      </tr>
	  <tr>
        <td><label for="alamat_karyawan">Alamat karyawan </label></td>
        <td><input name="alamat_karyawan" type="text" class="form-control" id="alamat_karyawan" placeholder="Alamat karyawan" required/></td>
      </tr>
	   <tr>
        <td><label for="No_rek">No.rekening </label></td>
        <td><input name="No_rek" type="text" class="form-control" id="No_rek" placeholder="No.rekening" required/></td>
      </tr>
      <tr>
        <td><label for="status">Status</label></td>
        <td><select name="status" type="text" class="form-control" id="status" placeholder="Status" required/>
			<option> ==== Status ====</option>
			<option value="Karyawan_Tetap">Karyawan Tetap</option>
			<option value="Karyawan_Tidak_Tetap">Karyawan Tidak Tetap</option>		
			</select>
		</td>
      </tr>
      <tr>
        <td><label for="jabatan">Jabatan</label></td>
        <td><select name="jabatan" type="text" class="form-control" id="jabatan" placeholder="jabatan" required/>
			<option> ==== Jabatan ====</option>
			<option value="reporter">Reporter</option>
			<option value="redaksi">Redaksi</option>
			<option value="korlip">Korlip</option>
			<option value="redpel">Redpel</option>
		
			</select>
		</td>
      </tr>
      <tr>
        <td><input type="submit" value="Simpan Data"  class="btn btn-sm btn-primary"/>&nbsp;<a href="data_karyawan.php" class="btn btn-sm btn-primary">Kembali</a></td>
        </tr>
    </table>
    </form>
                   </div>
                <div class="text-right">
                  <a href="#"  data-toggle="tooltip" class="tip-bottom" data-original-title="Tooltip Dibawah">View All Transactions <i class="fa fa-arrow-circle-right"></i></a>
              
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
