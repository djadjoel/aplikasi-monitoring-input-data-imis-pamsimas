<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
	header('location:login.php');
}else{
	include"../asset/fungsi/koneksi.php";
	$aktif = 'Y';
	$sql = $db->prepare("SELECT id_t, path FROM templates_admin WHERE aktif=?");
	$sql->bind_param("s", $aktif);
	$sql->execute();
	$vc = $sql->get_result();
	$r = $vc->fetch_object();
	header('location:'.$r->path.'/media.php?module=home');
}
?>
