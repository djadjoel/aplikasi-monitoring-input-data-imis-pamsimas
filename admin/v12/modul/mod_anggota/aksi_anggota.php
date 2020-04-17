<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
	header('location:../index.php');
}else{
	include "../../../../fungsi/koneksi.php";
	include "../../../../fungsi/library.php";
	include "../../../../fungsi/fungsi_thumb.php";
	include "../../../../fungsi/fungsi_seo.php";
	$module	= $_GET['module'];
	$act	= $_GET['act'];

// Hapus
if ($module=='anggota' AND $act=='hapus'){
	$id1 = $_GET['id'];
	$qry	= $db->query("SELECT gambar FROM user WHERE username='$id1'");
	$data	= $qry->fetch_object();
	if ($data->gambar!=''){
		unlink("../../../../gambar/".$aw->alamat_website."/foto_anggota/".$data->gambar."");
		unlink("../../../../gambar/".$aw->alamat_website."/foto_anggota/medium_".$data->gambar."");
		unlink("../../../../gambar/".$aw->alamat_website."/foto_anggota/small_".$data->gambar."");
	}
	$hapususer = $db->prepare("DELETE FROM user WHERE username=?");
	$hapususer->bind_param("s", $id1);
	$hapususer->execute();
	$hapusakun = $db->prepare("DELETE FROM anggota WHERE username=?");
	$hapusakun->bind_param("s", $id1);
	$hapusakun->execute();
	$hapususer->close();
	$hapusakun->close();
	$qry->close();
	header('location:../../media.php?module='.$module);
}

//hapus foto
elseif ($module=='anggota' AND $act=='hapusfoto'){
	$idf = $_GET['id'];
	$qry2 = $db->query("SELECT gambar FROM user WHERE username='$idf'");
	$data2 = $qry2->fetch_object();
	if ($data2->gambar!=''){
		unlink("../../../../gambar/".$aw->alamat_website."/foto_anggota/".$data2->gambar."");
		unlink("../../../../gambar/".$aw->alamat_website."/foto_anggota/medium_".$data2->gambar."");
		unlink("../../../../gambar/".$aw->alamat_website."/foto_anggota/small_".$data2->gambar."");
	}
	$hapusfoto = $db->prepare("UPDATE user SET gambar = '' WHERE username=?");
	$hapusfoto->bind_param("s", $idf);
	$hapusfoto->execute();
	$hapusfoto->close();
	$qry2->close();
	header('location:../../media.php?module=anggota&act=editData&id='.$_GET['id'].'');
}

// Input
elseif($module=='anggota' AND $act=='input'){
	$aa = $db->query("SELECT username FROM anggota WHERE username=".$_POST['username']."");
	if($aa->num_rows > 0){
		echo "<script>window.alert('Gagal, Username tidak tersedia');window.location=('../../media.php?module=".$module."')</script>";
	}else{
		$data = $db->prepare("INSERT INTO anggota(username, password, level, id_session, tgl_posting, jam_posting, hari_posting)
		VALUES(?, ?, ?, ?, ?, ?, ?)");
		$data->bind_param("sssssss", $_POST['username'], password_hash($_POST['password'], PASSWORD_DEFAULT), $_POST['level'], md5($_POST['kode']),$tgl_sekarang, $jam_sekarang, $hari_ini);
		$data->execute();

		$data2 = $db->prepare("INSERT INTO user(nama_lengkap, nama_lengkap_seo, username, tgl_posting_user, jam_posting_user, hari_posting_user, email)
		VALUES(?, ?, ?, ?, ?, ?, ?)");
		$data2->bind_param("sssssss", $_POST['nama_lengkap'], seo_title($_POST['nama_lengkap']), $_POST['username'], $tgl_sekarang, $jam_sekarang, $hari_ini, $_POST['email']);
		$data2->execute();
		$data->close();
		$data2->close();
		header('location:../../media.php?module='.$module);
	}
}

// Update
elseif ($module=='anggota' AND $act=='update'){
	$id2			= $_POST['id'];
	$acak           = rand(000000,999999);
	$lokasi_file    = $_FILES['fupload']['tmp_name'];
	$tipe_file      = $_FILES['fupload']['type'];
	$nama_file     	= $_FILES['fupload']['name'];
	$nama_file_unik = $acak.'-'.seo_title($_POST['nama_lengkap']).'.jpg';
	// Apabila password dan foto tidak diganti
	if (empty($lokasi_file) AND empty($_POST['password'])){
		$data = $db->prepare("UPDATE anggota SET
			level     	=?,
			blokir     	=?
			WHERE username	=?");
		$data->bind_param("sss", $_POST['level'], $_POST['blokir'], $id2);
		$data->execute();
		$data2 = $db->prepare("UPDATE user SET
			email      			=?,
			nama_lengkap      	=?,
			nama_lengkap_seo	=?,
			tgl_lahir			=?,
			tempat_lahir		=?,
			no_telp     		=?,
			kelamin     		=?,
			alamat     			=?,
			biografi     		=?,
			facebook     		=?,
			twitter     		=?,
			google     			=?,
			website     		=?,
			id_prov     		=?,
			id_kabkota     		=?,
			id_kec     			=?
			WHERE username		=?");
		$data2->bind_param("sssssssssssssssss", $_POST['email'], $_POST['nama_lengkap'], seo_title($_POST['nama_lengkap']), $_POST['tgl_lahir'], $_POST['tempat_lahir'], $_POST['no_telp'], $_POST['kelamin'], $_POST['alamat'], $_POST['biografi'], $_POST['facebook'], $_POST['twitter'], $_POST['google'], $_POST['website'], $_POST['data_provinsi'], $_POST['data_kabkota'], $_POST['data_kecamatan'], $id2);
		$data2->execute();
	}
	// Apabila password dan foto diganti
	elseif(!empty($lokasi_file) AND !empty($_POST['password'])){
		if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg" AND $tipe_file != "image/png"){
			echo "<script>window.alert('Upload Gagal, Gambar harus JPG/JPEG/PNG); window.location=('../../media.php?module=".$module."')</script>";
		}else{
			$id2 = $_POST['id'];
			$qry = $db->query("SELECT gambar FROM user WHERE username='$id2'");
			$d	= $qry->fetch_object();
			if ($d->gambar!=''){
				unlink("../../../../gambar/".$aw->alamat_website."/foto_anggota/".$d->gambar."");
				unlink("../../../../gambar/".$aw->alamat_website."/foto_anggota/medium_".$d->gambar."");
				unlink("../../../../gambar/".$aw->alamat_website."/foto_anggota/small_".$d->gambar."");
			}
			UploadAnggota($nama_file_unik);
			$data = $db->prepare("UPDATE anggota SET
				password	=?,
				level     	=?,
				blokir     	=?
				WHERE username	=?");
			$data->bind_param("ssss", password_hash($_POST['password'], PASSWORD_DEFAULT), $_POST['level'], $_POST['blokir'], $id2);
			$data->execute();
			$data2 = $db->prepare("UPDATE user SET
				email      			=?,
				nama_lengkap      	=?,
				nama_lengkap_seo	=?,
				tgl_lahir			=?,
				tempat_lahir		=?,
				no_telp     		=?,
				kelamin     		=?,
				alamat     			=?,
				biografi     		=?,
				facebook     		=?,
				twitter     		=?,
				google     			=?,
				website     		=?,
				id_prov     		=?,
				id_kabkota     		=?,
				id_kec     			=?,
				gambar				=?
				WHERE username =?");
			$data2->bind_param("ssssssssssssssssss", $_POST['email'], $_POST['nama_lengkap'], seo_title($_POST['nama_lengkap']), $_POST['tgl_lahir'], $_POST['tempat_lahir'], $_POST['no_telp'], $_POST['kelamin'], $_POST['alamat'], $_POST['biografi'], $_POST['facebook'], $_POST['twitter'], $_POST['google'], $_POST['website'], $_POST['data_provinsi'], $_POST['data_kabkota'], $_POST['data_kecamatan'], $nama_file_unik, $id2);
			$data2->execute();
		}
		header('location:../../media.php?module=anggota&act=editData&id='.$_POST['id'].'');
	}
	// Apabila password diganti dan foto tidak diganti
	elseif(empty($lokasi_file) AND !empty($_POST['password'])){
		$data = $db->prepare("UPDATE anggota SET
			password	=?,
			level     	=?,
			blokir     	=?
			WHERE username	=?");
		$data->bind_param("ssss", password_hash($_POST['password'], PASSWORD_DEFAULT), $_POST['level'], $_POST['blokir'], $id2);
		$data->execute();
		$data2 = $db->prepare("UPDATE user SET
			email      			=?,
			nama_lengkap      	=?,
			nama_lengkap_seo	=?,
			tgl_lahir			=?,
			tempat_lahir		=?,
			no_telp     		=?,
			kelamin     		=?,
			alamat     			=?,
			biografi     		=?,
			facebook     		=?,
			twitter     		=?,
			google     			=?,
			website     		=?,
			id_prov     		=?,
			id_kabkota     		=?,
			id_kec     			=?
			WHERE username			=?");
		$data2->bind_param("sssssssssssssssss", $_POST['email'], $_POST['nama_lengkap'], seo_title($_POST['nama_lengkap']), $_POST['tgl_lahir'], $_POST['tempat_lahir'], $_POST['no_telp'], $_POST['kelamin'], $_POST['alamat'], $_POST['biografi'], $_POST['facebook'], $_POST['twitter'], $_POST['google'], $_POST['website'], $_POST['data_provinsi'], $_POST['data_kabkota'], $_POST['data_kecamatan'], $id2);
		$data2->execute();
	}
	// Apabila password tidak diganti dan foto diganti
	elseif(!empty($lokasi_file) AND empty($_POST['password'])){
		if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg" AND $tipe_file != "image/png"){
			echo "<script>window.alert('Upload Gagal, gambar harus JPG/JPEG/PNG); window.location=('../../media.php?module=".$module."')</script>";
		}else{
			$qry	= $db->query("SELECT gambar FROM user WHERE username='$id2'");
			$d	= $qry->fetch_object();
			if ($d->gambar!=''){
				unlink("../../../../gambar/".$aw->alamat_website."/foto_anggota/".$d->gambar."");
				unlink("../../../../gambar/".$aw->alamat_website."/foto_anggota/medium_".$d->gambar."");
				unlink("../../../../gambar/".$aw->alamat_website."/foto_anggota/small_".$d->gambar."");
			}
			UploadAnggota($nama_file_unik);
			$data = $db->prepare("UPDATE anggota SET
				level     	=?,
				blokir     	=?
				WHERE username	=?");
			$data->bind_param("sss", $_POST['level'], $_POST['blokir'], $id2);
			$data->execute();
			$data2 = $db->prepare("UPDATE user SET
				email      			=?,
				nama_lengkap      	=?,
				nama_lengkap_seo	=?,
				tgl_lahir			=?,
				tempat_lahir		=?,
				no_telp     		=?,
				kelamin     		=?,
				alamat     			=?,
				biografi     		=?,
				facebook     		=?,
				twitter     		=?,
				google     			=?,
				website     		=?,
				id_prov     		=?,
				id_kabkota     		=?,
				id_kec     			=?,
				gambar				=?
				WHERE username			=?");
			$data2->bind_param("ssssssssssssssssss", $_POST['email'], $_POST['nama_lengkap'], seo_title($_POST['nama_lengkap']), $_POST['tgl_lahir'], $_POST['tempat_lahir'], $_POST['no_telp'], $_POST['kelamin'], $_POST['alamat'], $_POST['biografi'], $_POST['facebook'], $_POST['twitter'], $_POST['google'], $_POST['website'], $_POST['data_provinsi'], $_POST['data_kabkota'], $_POST['data_kecamatan'], $nama_file_unik, $id2);
			$data2->execute();
		}
	}
	$data->close();
	$data2->close();
	header('location:../../media.php?module=anggota&act=editData&id='.$id2.'');
}

// status anggota aktif
elseif ($module=='anggota' AND $act=='statusaktif'){
	$id3 = $_GET['id'];
	$aktif = $db->prepare("UPDATE anggota SET blokir = 'N' WHERE username =?");
	$aktif->bind_param("s", $id3);
	$aktif->execute();
	$aktif->close();
	header('location:../../media.php?module='.$module);
}

// status anggota blokir
elseif ($module=='anggota' AND $act=='statusblokir'){
	$id4 = $_GET['id'];
	$blokir = $db->prepare("UPDATE anggota SET blokir = 'Y' WHERE username =?");
	$blokir->bind_param("s", $id4);
	$blokir->execute();
	$blokir->close();
	header('location:../../media.php?module='.$module);
}

//export pdf
elseif ($module=='anggota' AND $act=='exportpdf'){
	require_once '../../../../vendor/autoload.php';
	$mpdf = new \Mpdf\Mpdf([
				        'mode' => 'utf-8',
    	    			'format' => [190, 236],
			        	'orientation' => 'L',
						'allow_charset_conversion' => true
					]);
	$today			= date("Y-m-d H:i:s");
	$nama_dokumen	= 'rekap-data-user-'.$tgl_sekarang.'';
	ob_start();
	?>
	<style>
		table {
			width: 100%;
			border: 1px solid black;
			border-collapse: collapse;
		}
		th{
			background:#EAE9E9;
		}
		td {
			padding: 5px;
			border: 1px solid black;
			vertical-align: middle;
		}
	 </style>
	<?php
echo'	<h2>REKAP DATA USER</h2>
		<h3>'.$aw->alamat_website.'</h3>
		<table border="1">
		<thead><tr><th>No</th><th>Username</th><th>Nama</th><th>Peranan</th><th>Pos</th><th>Foto</th><th>Video</th><th>Status</th></tr></thead><tbody>';
		$tampil = $db->query("SELECT id_user, username, nama_lengkap, level, pos, foto, video, blokir FROM anggota_view");
		$no = 1;
		if($tampil->num_rows > 0){
		while($r = $tampil->fetch_assoc()){
echo'	<tr>
			<td>'.$no.'</td>
			<td>'.$r['username'].'</td>
			<td>'.$r['nama_lengkap'].'</td>
			<td>'.$r['level'].'</td>
			<td>'.$r['pos'].'</td>
			<td>'.$r['foto'].'</td>
			<td>'.$r['video'].'</td>
			<td>'.$r['blokir'].'</td></tr>';
		$no++;
		}
		}else{
echo'	<tr><td colspan="8"><center>Tidak kosong</center></td></tr>';
		}
echo'	</tbody></table><br>Download pertanggal '.$today.'';
	$mpdf->setFooter('{PAGENO}');
	$html = ob_get_contents();
	ob_end_clean();
	$mpdf->WriteHTML(utf8_encode($html));
	$mpdf->Output($nama_dokumen.".pdf" ,'I');
	exit;
}

//export excel
elseif ($module=='anggota' AND $act=='exportexcel'){
		$today = date("Y-m-d H:i:s");
		header("Content-type: application/vnd-ms-excel");
		header("Content-Disposition: attachment; filename=rekap-data-user-".$tgl_sekarang."-".$jam_sekarang.".xls");
echo'	<h2>REKAP DATA USER</h2>
		<h3>'.$aw->alamat_website.'</h3>
		<table border="1">
		<thead><tr><th>No</th><th>Username</th><th>Nama</th><th>Peranan</th><th>Pos</th><th>Foto</th><th>Video</th><th>Status</th></tr></thead><tbody>';
		$tampil = $db->query("SELECT id_user, username, nama_lengkap, level, pos, foto, video, blokir FROM anggota_view");
		$no = 1;
		if($tampil->num_rows > 0){
		while($r = $tampil->fetch_assoc()){
echo'	<tr>
			<td>'.$no.'</td>
			<td>'.$r['username'].'</td>
			<td>'.$r['nama_lengkap'].'</td>
			<td>'.$r['level'].'</td>
			<td>'.$r['pos'].'</td>
			<td>'.$r['foto'].'</td>
			<td>'.$r['video'].'</td>
			<td>'.$r['blokir'].'</td></tr>';
		$no++;
		}
		}else{
echo'	<tr><td colspan="8"><center>Tidak kosong</center></td></tr>';
		}
echo'	</tbody></table><br>Download pertanggal '.$today.'';
}
}
$db->close();
?>
