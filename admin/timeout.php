<?php
function timer(){
	$time=1000;
	$_SESSION['timeout']=time()+$time;
}
function cek_login(){
	$timeout=$_SESSION['timeout'];
	if(time()<$timeout){
		timer();
		return true;
	}else{
		unset($_SESSION['timeout']);
		include "../../fungsi/koneksi.php";
		$ses = $_SESSION['namauser'];
		$qupdate	= $db->prepare("UPDATE anggota SET online='N' where username=?");
		$qupdate->bind_param("s", $ses);
		$qupdate->execute();
		if(isset($_COOKIE['cookielogin'])){
			$time = time();
			setcookie("cookielogin[user]", $time - 3600);
			setcookie("cookielogin[pass]", $time - 3600);
		}
		return false;
	}
}
?>
