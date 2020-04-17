<?php
	session_start();
	include "../fungsi/koneksi.php";
	$ses = $_SESSION['namauser'];
	$logout = $db->prepare("UPDATE anggota SET online='N' WHERE username=?");
	$logout->bind_param("s", $ses);
	$logout->execute();
	$db->close();
	session_destroy();
	if(isset($_COOKIE['cookielogin'])){
		$time = time();
		setcookie("cookielogin[user]", $time - 3600);
		setcookie("cookielogin[pass]", $time - 3600);
	}
	header('location:login.php');
?>