<?php
 session_start();

include ('../../inc/config.php');
if(isset($_POST)){
$username = $_POST['username'];
$password = md5(trim($_POST['password']));


$sql = "select  * from pengelola
  where username='$username'
  and password='$password' ";

$sql_login = mysql_query($sql) or die(mysql_error());
$hasil = mysql_fetch_object($sql_login);

if(mysql_num_rows($sql_login) == 1) {
	$_SESSION['username'] = $username;
echo '<script language="javascript"> alert("Selamat, Login Sukses..."); document.location="../index.php?mod=produk&pg=produk_view";</script>';	

} else {
echo '<script language="javascript"> alert("Maaf, Usename atau Password Anda Salah.!!!"); document.location="../index.php?mod=login&pg=login_form&s=1";</script>';

}
}
?>

