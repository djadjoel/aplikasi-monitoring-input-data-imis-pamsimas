<?php 
	ob_start();	
	session_start();
	//error_reporting(0);
	// Mengambil waktu awal proses
	$mtime = microtime();
	$mtime = explode (" ", $mtime);
	$mtime = $mtime[1] + $mtime[0];
	$tstart = $mtime;
	include "fungsi/koneksi.php";
	include "fungsi/class_paging_bootstrap4.php";
	include "fungsi/class_paging_bootstrap4_tambahan.php";
	include "fungsi/library.php";
	include "fungsi/fungsi_indotgl.php";
	include "fungsi/fungsi_combobox.php";
	include "fungsi/fungsi_autolink.php";
	include "fungsi/fungsi_kalender.php";
	include "fungsi/fungsi_rupiah.php";
	include "fungsi/fungsi_seo.php";
	include "fungsi/fungsi_thumb.php";
	// $qry = $db->prepare("SELECT templates_folder, aktif_templates FROM templates WHERE aktif_templates='Y'");
	// $qry->execute();
	// $adatemplate = $qry->get_result();
	// $pilihtemplate = $adatemplate->fetch_object();
    // if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
	// 	include "templates/".$pilihtemplate->templates_folder."/template.php";
	// }else{
	// 	include "templates/".$pilihtemplate->templates_folder."/media.php";
	// }

	$ip      = $_SERVER['REMOTE_ADDR']; 
	$tanggal = date("Ymd"); 
	$waktu   = time();
	$browser = $_SERVER['HTTP_USER_AGENT'];
	$s 		 = $db->query("SELECT ip, tanggal FROM statistik WHERE ip='$ip' AND tanggal='$tanggal'");
	if($s->num_rows == 0){
		$db->query("INSERT INTO statistik(ip, tanggal, hits, online, browser) VALUES('$ip','$tanggal','1','$waktu','$browser')");
	}else{
		$db->query("UPDATE statistik SET hits=hits+1, online='$waktu', browser='$browser' WHERE ip='$ip' AND tanggal='$tanggal'");
	}
?>