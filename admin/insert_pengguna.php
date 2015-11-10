<?php
include "../inc/koneksi.php"
?>
<?php
$user_id            = $_POST['user_id'];
$username           = $_POST['username'];
$fullname		    = $_POST['fullname'];
$password	 	    = $_POST['password'];


$query = mysql_query("INSERT INTO tb_user (user_id, username, fullname, password) VALUES ('$user_id', '$username', '$fullname', '".md5( $password )."')");
if ($query){
	echo "<script>alert('Data Karyawan Berhasil dimasukan!'); window.location = 'setting_user.php'</script>";	
} else {
	echo "<script>alert('Data Karyawan Gagal dimasukan!'); window.location = 'setting_user.php'</script>";	
}
?>