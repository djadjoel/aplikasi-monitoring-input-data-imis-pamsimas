<?php
//menggunakan mysqli oop
require_once('fungsi_validasi.php');
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "pamsimas_2020";
$db		= new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if($db->connect_errno){
	echo 'Gagal koneksi ke database';
}
if(!$db){
	die ("WEBSITE SEDANG MAINTENANCE");
}

// buat variabel untuk validasi dari file fungsi_validasi.php
$val 	= new Lokovalidasi;

// ambil identitas website menggunakan prepare utk mencegas mysql injection
$aktif_identitas = 'Y';
$identitas = $db->prepare("SELECT id_identitas, nama_website, alamat_website, folder, favicon, logo, username, aktif_identitas, versi FROM identitas WHERE aktif_identitas=?");
$identitas->bind_param("s", $aktif_identitas);
$identitas->execute();
$result	= $identitas->get_result();
$aw		= $result->fetch_object();

//const atau Konstanta seperti variabel. Ia bisa menyimpan nilai. Tapi tidak bisa diubah.
const BASE_URL	= "http://localhost/pamsimas";
const DIST		= "http://localhost/pamsimas/dist";
const FUNGSI	= "http://localhost/pamsimas/fungsi";
const PLUGIN	= "http://localhost/pamsimas/plugins";
const TEMPLATES	= "http://localhost/pamsimas/templates";
?>