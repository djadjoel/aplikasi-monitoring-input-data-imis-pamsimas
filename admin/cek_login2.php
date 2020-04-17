<?php
include "../fungsi/koneksi.php";
include "../fungsi/library.php";
include "statik_variable.php";

$username = $db->real_escape_string(htmlentities($_POST['username']));
$pass     = $db->real_escape_string(htmlentities($_POST['password']));

// pastikan username dan password adalah berupa huruf atau angka.
if(!ctype_alnum($username) OR !ctype_alnum($pass)){
	header('location:login.php?msg=1');
}else{
	$login	= $db->prepare("SELECT username, password, level, blokir, aktivasi, total_login FROM anggota WHERE username=?");
	$login->bind_param("s", $username);
	$login->execute();
	$dapat	= $login->get_result();
	$r		= $dapat->fetch_object();
	$passhash	= $r->password;
	if($r->blokir=='Y'){
		header('location:login.php?msg=3');
	}elseif($r->aktivasi === '0'){
		header('location:login.php?msg=4');
	}elseif(password_verify($pass, $passhash)){
		// Apabila username dan password ditemukan
		if ($dapat->num_rows > 0){
			session_start();
			$time = time();
			$check = isset($_POST['setcookie'])?$_POST['setcookie']:'';
			$_SESSION['logged'] = 1;
			if($check){
				setcookie("cookielogin[user]", $statik_user, $time + 3600);
				setcookie("cookielogin[pass]", $statik_password, $time + 3600);
			}
			include "timeout.php";
			$_SESSION['namauser']     			= $r->username;
			$_SESSION['passuser']     			= $r->password;
			$_SESSION['leveluser']    			= $r->level;
			// session timeout
			$_SESSION['login'] = 1;
			timer();
			$sid_lama = session_id();
			session_regenerate_id();
			$sid_baru = session_id();
			$online = 'Y';
			$total_login = $r->total_login + 1;
			$updateuser = $db->prepare("UPDATE anggota SET
				id_session			=?,
				tgl_login_terakhir	=?,
				jam_login_terakhir	=?,
				online				=?,
				total_login 		=?
				WHERE username		=?");
			$updateuser->bind_param("ssssss", $sid_baru, $tgl_sekarang, $jam_sekarang, $online, $total_login, $username);
			$updateuser->execute();
			//template admin yang aktif
			$template = $db->prepare("SELECT id_t, path FROM templates_admin WHERE aktif='Y'");
			$template->execute();
			$pilih_t = $template->get_result();
			$templateaktif = $pilih_t->fetch_object();
			header('location:'.$templateaktif->path.'/media.php?module=home');
		}
	}else{
		header('location:login.php?msg=2');
	}
}
$db->close();
?>
