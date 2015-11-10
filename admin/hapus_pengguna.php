<?php
include "../inc/koneksi.php";
$user_id 	= $_GET['user_id'];

$query = mysql_query("DELETE FROM tb_user WHERE user_id='$user_id'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'setting_user.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'setting_user.php'</script>";	
}
?>