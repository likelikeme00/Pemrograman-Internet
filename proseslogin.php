<?php
include "inc/koneksi.php";
$username = $_POST['user'];
$password = $_POST['pass'];

$query = mysql_query("SELECT COUNT(username) AS jumlah FROM tb_user 
					WHERE username='$username' AND password='".md5( $password )."'");
$data = mysql_fetch_array($query);

if ($data['jumlah'] >= 1){
	session_start();
	$_SESSION['username']    = $username;
    $_SESSION['password']    = $password;
    $username = $_SESSION['username'];

	echo '<script language="javascript">alert("Anda berhasil Login Admin!"); document.location="admin/index.php";</script>';
} else {
	
	echo '<script language="javascript">alert("Anda tidak berhasil Login, silahkan ulangi lagi "); document.location="index.html";</script>';
}
?>