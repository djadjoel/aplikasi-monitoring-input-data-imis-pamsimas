<?php
function UploadImageTambahan($fupload_name){
  include "koneksi.php";
  $vdir_upload	= "../../../../../templates/".$aw->alamat_website."/uploads/foto_berita/";
  $vfile_upload	= $vdir_upload . $fupload_name;
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
  $im_src			= imagecreatefromjpeg($vfile_upload);
  $src_width		= imageSX($im_src);
  $src_height		= imageSY($im_src);
  $dst_width		= 110;
  $dst_height		= ($dst_width/$src_width)*$src_height;
  $im				= imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);
  imagejpeg($im,$vdir_upload . "small_" . $fupload_name);
  $dst_width2		= 390;
  $dst_height2	= ($dst_width2/$src_width)*$src_height;
  $im2			= imagecreatetruecolor($dst_width2,$dst_height2);
  imagecopyresampled($im2, $im_src, 0, 0, 0, 0, $dst_width2, $dst_height2, $src_width, $src_height);
  imagejpeg($im2,$vdir_upload . "medium_" . $fupload_name);
  imagedestroy($im_src);
  imagedestroy($im);
  imagedestroy($im2);
}
function UploadImage($fupload_name){
  include "koneksi.php";
  $vdir_upload	= "../../../../templates/".$aw->alamat_website."/uploads/foto_berita/";
  $vfile_upload	= $vdir_upload . $fupload_name;
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
  $im_src			= imagecreatefromjpeg($vfile_upload);
  $src_width		= imageSX($im_src);
  $src_height		= imageSY($im_src);
  $dst_width		= 110;
  $dst_height		= ($dst_width/$src_width)*$src_height;
  $im				= imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);
  imagejpeg($im,$vdir_upload . "small_" . $fupload_name);
  $dst_width2		= 390;
  $dst_height2	= ($dst_width2/$src_width)*$src_height;
  $im2			= imagecreatetruecolor($dst_width2,$dst_height2);
  imagecopyresampled($im2, $im_src, 0, 0, 0, 0, $dst_width2, $dst_height2, $src_width, $src_height);
  imagejpeg($im2,$vdir_upload . "medium_" . $fupload_name);
  imagedestroy($im_src);
  imagedestroy($im);
  imagedestroy($im2);
}
function UploadPoling($fupload_name){
	include "koneksi.php";
  //direktori gambar/".$aw->alamat_website."
  $vdir_upload = "../../../../templates/".$aw->alamat_website."/uploads/img_poling/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar/".$aw->alamat_website." dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //identitas file asli
  $im_src = imagecreatefromjpeg($vfile_upload);
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Simpan dalam versi small 110 pixel
  //Set ukuran gambar/".$aw->alamat_website." hasil perubahan
  $dst_width = 110;
  $dst_height = ($dst_width/$src_width)*$src_height;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //Simpan gambar/".$aw->alamat_website."
  imagejpeg($im,$vdir_upload . "kecil_" . $fupload_name);
  

  //Simpan dalam versi medium 360 pixel
  //Set ukuran gambar/".$aw->alamat_website." hasil perubahan
  $dst_width2 = 390;
  $dst_height2 = ($dst_width2/$src_width)*$src_height;

  //proses perubahan ukuran
  $im2 = imagecreatetruecolor($dst_width2,$dst_height2);
  imagecopyresampled($im2, $im_src, 0, 0, 0, 0, $dst_width2, $dst_height2, $src_width, $src_height);

  //Simpan gambar/".$aw->alamat_website."
  imagejpeg($im2,$vdir_upload . "medium_" . $fupload_name);
  
  //Hapus gambar/".$aw->alamat_website." di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
  imagedestroy($im2);
}
function UploadBanner($fupload_name){
	include "koneksi.php";
  //direktori gambar/".$aw->alamat_website."
  $vdir_upload = "../../../../templates/".$aw->alamat_website."/uploads/foto_banner/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar/".$aw->alamat_website." dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //identitas file asli
  $im_src = imagecreatefromjpeg($vfile_upload);
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Simpan dalam versi small 110 pixel
  //Set ukuran gambar/".$aw->alamat_website." hasil perubahan
  $dst_width = 110;
  $dst_height = ($dst_width/$src_width)*$src_height;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //Simpan gambar/".$aw->alamat_website."
  imagejpeg($im,$vdir_upload . "small_" . $fupload_name);
  

  //Simpan dalam versi medium 360 pixel
  //Set ukuran gambar/".$aw->alamat_website." hasil perubahan
  $dst_width2 = 390;
  $dst_height2 = ($dst_width2/$src_width)*$src_height;

  //proses perubahan ukuran
  $im2 = imagecreatetruecolor($dst_width2,$dst_height2);
  imagecopyresampled($im2, $im_src, 0, 0, 0, 0, $dst_width2, $dst_height2, $src_width, $src_height);

  //Simpan gambar/".$aw->alamat_website."
  imagejpeg($im2,$vdir_upload . "medium_" . $fupload_name);
  
  //Hapus gambar/".$aw->alamat_website." di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
  imagedestroy($im2);
}
function UploadTestimoni($fupload_name){
	include "koneksi.php";
  //direktori gambar/".$aw->alamat_website."
  $vdir_upload = "../../../../templates/".$aw->alamat_website."/uploads/foto_testimoni/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar/".$aw->alamat_website." dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //identitas file asli
  $im_src = imagecreatefromjpeg($vfile_upload);
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Simpan dalam versi small 110 pixel
  //Set ukuran gambar/".$aw->alamat_website." hasil perubahan
  $dst_width = 110;
  $dst_height = ($dst_width/$src_width)*$src_height;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //Simpan gambar/".$aw->alamat_website."
  imagejpeg($im,$vdir_upload . "small_" . $fupload_name);
  
  //Simpan dalam versi medium 360 pixel
  //Set ukuran gambar/".$aw->alamat_website." hasil perubahan
  $dst_width2 = 390;
  $dst_height2 = ($dst_width2/$src_width)*$src_height;

  //proses perubahan ukuran
  $im2 = imagecreatetruecolor($dst_width2,$dst_height2);
  imagecopyresampled($im2, $im_src, 0, 0, 0, 0, $dst_width2, $dst_height2, $src_width, $src_height);

  //Simpan gambar/".$aw->alamat_website."
  imagejpeg($im2,$vdir_upload . "medium_" . $fupload_name);
  
  //Hapus gambar/".$aw->alamat_website." di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
  imagedestroy($im2);
}
function UploadHeader($fupload_name){
	include "koneksi.php";
  //direktori gambar/".$aw->alamat_website."
  $vdir_upload = "../../../../templates/".$aw->alamat_website."/uploads/foto_header/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar/".$aw->alamat_website." dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //identitas file asli
  $im_src = imagecreatefromjpeg($vfile_upload);
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Simpan dalam versi small 110 pixel
  //Set ukuran gambar/".$aw->alamat_website." hasil perubahan
  $dst_width = 110;
  $dst_height = ($dst_width/$src_width)*$src_height;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //Simpan gambar/".$aw->alamat_website."
  imagejpeg($im,$vdir_upload . "small_" . $fupload_name);
  
  //Simpan dalam versi medium 360 pixel
  //Set ukuran gambar/".$aw->alamat_website." hasil perubahan
  $dst_width2 = 390;
  $dst_height2 = ($dst_width2/$src_width)*$src_height;

  //proses perubahan ukuran
  $im2 = imagecreatetruecolor($dst_width2,$dst_height2);
  imagecopyresampled($im2, $im_src, 0, 0, 0, 0, $dst_width2, $dst_height2, $src_width, $src_height);

  //Simpan gambar/".$aw->alamat_website."
  imagejpeg($im2,$vdir_upload . "medium_" . $fupload_name);
  
  //Hapus gambar/".$aw->alamat_website." di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
  imagedestroy($im2);
}
function UploadAnggota($fupload_name){
	include "koneksi.php";
  //direktori gambar/".$aw->alamat_website."
  $vdir_upload = "../../../../templates/".$aw->alamat_website."/uploads/foto_anggota/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar/".$aw->alamat_website." dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //identitas file asli
  $im_src = imagecreatefromjpeg($vfile_upload);
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Simpan dalam versi small 110 pixel
  //Set ukuran gambar/".$aw->alamat_website." hasil perubahan
  $dst_width = 110;
  $dst_height = ($dst_width/$src_width)*$src_height;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //Simpan gambar/".$aw->alamat_website."
  imagejpeg($im,$vdir_upload . "small_" . $fupload_name);
  
  //Simpan dalam versi medium 360 pixel
  //Set ukuran gambar/".$aw->alamat_website." hasil perubahan
  $dst_width2 = 390;
  $dst_height2 = ($dst_width2/$src_width)*$src_height;

  //proses perubahan ukuran
  $im2 = imagecreatetruecolor($dst_width2,$dst_height2);
  imagecopyresampled($im2, $im_src, 0, 0, 0, 0, $dst_width2, $dst_height2, $src_width, $src_height);

  //Simpan gambar/".$aw->alamat_website."
  imagejpeg($im2,$vdir_upload . "medium_" . $fupload_name);
  
  //Hapus gambar/".$aw->alamat_website." di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
  imagedestroy($im2);
}
function UploadAnggota2($fupload_name){
	include "koneksi.php";
  //direktori banner
  $vdir_upload = "../../../../templates/".$aw->alamat_website."/uploads/foto_anggota/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar/".$aw->alamat_website." dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload2"]["tmp_name"], $vfile_upload);
}
function UploadKetum($fupload_name){
	include "koneksi.php";
  //direktori banner
  $vdir_upload = "../../../../templates/".$aw->alamat_website."/uploads/foto_ketum/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar/".$aw->alamat_website." dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}
function UploadFile($fupload_name){
	include "koneksi.php";
  //direktori file
  $vdir_upload = "../../../../templates/".$aw->alamat_website."/uploads/files/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan file
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}
function UploadAlbum($fupload_name){
	include "koneksi.php";
  //direktori gambar/".$aw->alamat_website."
  $vdir_upload = "../../../../templates/".$aw->alamat_website."/uploads/img_album/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar/".$aw->alamat_website." dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //identitas file asli
  $im_src = imagecreatefromjpeg($vfile_upload);
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Simpan dalam versi small 120 pixel
  //Set ukuran gambar/".$aw->alamat_website." hasil perubahan
  $dst_width = 120;
  $dst_height = ($dst_width/$src_width)*$src_height;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //Simpan gambar/".$aw->alamat_website."
  imagejpeg($im,$vdir_upload . "kecil_" . $fupload_name);

  //Simpan dalam versi medium 360 pixel
  //Set ukuran gambar/".$aw->alamat_website." hasil perubahan
  $dst_width2 = 390;
  $dst_height2 = ($dst_width2/$src_width)*$src_height;

  //proses perubahan ukuran
  $im2 = imagecreatetruecolor($dst_width2,$dst_height2);
  imagecopyresampled($im2, $im_src, 0, 0, 0, 0, $dst_width2, $dst_height2, $src_width, $src_height);

  //Simpan gambar/".$aw->alamat_website."
  imagejpeg($im2,$vdir_upload . "medium_" . $fupload_name);
  
  //Hapus gambar/".$aw->alamat_website." di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
  imagedestroy($im2);
}
function UploadGallery($fupload_name){
	include "koneksi.php";
	//direktori gambar/".$aw->alamat_website."
	$vdir_upload = "../../../../templates/".$aw->alamat_website."/uploads/img_galeri/";
	$vfile_upload = $vdir_upload . $fupload_name;
	
	//Simpan gambar/".$aw->alamat_website." dalam ukuran sebenarnya
	move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
	
	//identitas file asli
	$im_src = imagecreatefromjpeg($vfile_upload);
	$src_width = imageSX($im_src);
	$src_height = imageSY($im_src);

	//Simpan dalam versi small 100 pixel
	//Set ukuran gambar/".$aw->alamat_website." hasil perubahan
	$dst_width = 100;
	$dst_height = ($dst_width/$src_width)*$src_height;
	
	//proses perubahan ukuran
	$im = imagecreatetruecolor($dst_width,$dst_height);
	imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);
	
	//Simpan gambar/".$aw->alamat_website."
	imagejpeg($im,$vdir_upload . "kecil_" . $fupload_name);
	
	//Simpan dalam versi medium 360 pixel
	//Set ukuran gambar/".$aw->alamat_website." hasil perubahan
	$dst_width2 = 390;
	$dst_height2 = ($dst_width2/$src_width)*$src_height;
	
	//proses perubahan ukuran
	$im2 = imagecreatetruecolor($dst_width2,$dst_height2);
	imagecopyresampled($im2, $im_src, 0, 0, 0, 0, $dst_width2, $dst_height2, $src_width, $src_height);
	
	//Simpan gambar/".$aw->alamat_website."
	imagejpeg($im2,$vdir_upload . "medium_" . $fupload_name);
	
	//Hapus gambar/".$aw->alamat_website." di memori komputer
	imagedestroy($im_src);
	imagedestroy($im);
	imagedestroy($im2);
}
function UploadInfo($fupload_name){
	include "koneksi.php";
  //direktori gambar/".$aw->alamat_website."
  $vdir_upload = "../../../../templates/".$aw->alamat_website."/uploads/foto_info/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar/".$aw->alamat_website." dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //identitas file asli
  $im_src = imagecreatefromjpeg($vfile_upload);
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Simpan dalam versi small 54 pixel
  //Set ukuran gambar/".$aw->alamat_website." hasil perubahan
  $dst_width = 54;
  $dst_height = ($dst_width/$src_width)*$src_height;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //Simpan gambar/".$aw->alamat_website."
  imagejpeg($im,$vdir_upload . "kecil_" . $fupload_name);
  
  //Hapus gambar/".$aw->alamat_website." di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
}
function UploadPlaylist($fupload_name){
	include "koneksi.php";
  //direktori gambar/".$aw->alamat_website."
  $vdir_upload = "../../../../templates/".$aw->alamat_website."/uploads/img_playlist/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar/".$aw->alamat_website." dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //identitas file asli
  $im_src = imagecreatefromjpeg($vfile_upload);
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Simpan dalam versi small 120 pixel
  //Set ukuran gambar/".$aw->alamat_website." hasil perubahan
  $dst_width = 120;
  $dst_height = ($dst_width/$src_width)*$src_height;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //Simpan gambar/".$aw->alamat_website."
  imagejpeg($im,$vdir_upload . "kecil_" . $fupload_name);
  
  //Hapus gambar/".$aw->alamat_website." di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
}
function UploadVideo($fupload_name){
	include "koneksi.php";
	//direktori gambar/".$aw->alamat_website."
	$vdir_upload = "../../../../templates/".$aw->alamat_website."/uploads/img_video/";
	$vfile_upload = $vdir_upload . $fupload_name;
	
	//Simpan gambar/".$aw->alamat_website." dalam ukuran sebenarnya
	move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
	
	//identitas file asli
	$im_src = imagecreatefromjpeg($vfile_upload);
	$src_width = imageSX($im_src);
	$src_height = imageSY($im_src);
	
	//Simpan dalam versi small 120 pixel
	//Set ukuran gambar/".$aw->alamat_website." hasil perubahan
	$dst_width = 120;
	$dst_height = ($dst_width/$src_width)*$src_height;
	
	//proses perubahan ukuran
	$im = imagecreatetruecolor($dst_width,$dst_height);
	imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);
	
	//Simpan gambar/".$aw->alamat_website."
	imagejpeg($im,$vdir_upload . "kecil_" . $fupload_name);
	
	//Simpan dalam versi medium 360 pixel
	//Set ukuran gambar/".$aw->alamat_website." hasil perubahan
	$dst_width2 = 390;
	$dst_height2 = ($dst_width2/$src_width)*$src_height;
	
	//proses perubahan ukuran
	$im2 = imagecreatetruecolor($dst_width2,$dst_height2);
	imagecopyresampled($im2, $im_src, 0, 0, 0, 0, $dst_width2, $dst_height2, $src_width, $src_height);
	
	//Simpan gambar/".$aw->alamat_website."
	imagejpeg($im2,$vdir_upload . "medium_" . $fupload_name);
	
	//Hapus gambar/".$aw->alamat_website." di memori komputer
	imagedestroy($im_src);
	imagedestroy($im);
	imagedestroy($im2);
}
function UploadVideo2($fupload_name){
 	include "koneksi.php";
 //direktori gambar/".$aw->alamat_website."
  $vdir_upload = "../../../../templates/".$aw->alamat_website."/uploads/img_video/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar/".$aw->alamat_website." dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload2"]["tmp_name"], $vfile_upload);

  //
}
function UploadPlaylist2($fupload_name){
	include "koneksi.php";
  //direktori gambar/".$aw->alamat_website."
  $vdir_upload = "../../../../templates/".$aw->alamat_website."/uploads/img_playlist2/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar/".$aw->alamat_website." dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //identitas file asli
  $im_src = imagecreatefromjpeg($vfile_upload);
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Simpan dalam versi small 120 pixel
  //Set ukuran gambar/".$aw->alamat_website." hasil perubahan
  //$dst_width = 120;
  //$dst_height = ($dst_width/$src_width)*$src_height;
  $dst_width = 140;
  $dst_height = 200;
  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //Simpan gambar/".$aw->alamat_website."
  imagejpeg($im,$vdir_upload . "kecil_" . $fupload_name);
  
  //Hapus gambar/".$aw->alamat_website." di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
}
function UploadMP3($fupload_name){
	include "koneksi.php";
  //direktori gambar/".$aw->alamat_website."
  $vdir_upload = "../../../../templates/".$aw->alamat_website."/uploads/img_mp3/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar/".$aw->alamat_website." dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //identitas file asli
  $im_src = imagecreatefromjpeg($vfile_upload);
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Simpan dalam versi small 100 pixel
  //Set ukuran gambar/".$aw->alamat_website." hasil perubahan
  $dst_width = 100;
  $dst_height = ($dst_width/$src_width)*$src_height;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //Simpan gambar/".$aw->alamat_website."
  imagejpeg($im,$vdir_upload . "kecil_" . $fupload_name);
  
  //Hapus gambar/".$aw->alamat_website." di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
}
function UploadMP32($fupload_name){
	include "koneksi.php";
  //direktori gambar/".$aw->alamat_website."
  $vdir_upload = "../../../../templates/".$aw->alamat_website."/uploads/img_mp3/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar/".$aw->alamat_website." dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload2"]["tmp_name"], $vfile_upload);

  //
}
function Uploadtipegame($fupload_name){
	include "koneksi.php";
  //direktori gambar/".$aw->alamat_website."
  $vdir_upload = "../../../../templates/".$aw->alamat_website."/uploads/img_tipegame/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar/".$aw->alamat_website." dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //identitas file asli
  $im_src = imagecreatefromjpeg($vfile_upload);
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Simpan dalam versi small 120 pixel
  //Set ukuran gambar/".$aw->alamat_website." hasil perubahan
  $dst_width = 120;
  $dst_height = ($dst_width/$src_width)*$src_height;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //Simpan gambar/".$aw->alamat_website."
  imagejpeg($im,$vdir_upload . "kecil_" . $fupload_name);
  
  //Hapus gambar/".$aw->alamat_website." di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
}
function Uploadgame($fupload_name){
	include "koneksi.php";
  //direktori gambar/".$aw->alamat_website."
  $vdir_upload = "../../../../templates/".$aw->alamat_website."/uploads/img_game/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar/".$aw->alamat_website." dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //identitas file asli
  $im_src = imagecreatefromjpeg($vfile_upload);
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Simpan dalam versi small 100 pixel
  //Set ukuran gambar/".$aw->alamat_website." hasil perubahan
  $dst_width = 100;
  $dst_height = ($dst_width/$src_width)*$src_height;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //Simpan gambar/".$aw->alamat_website."
  imagejpeg($im,$vdir_upload . "kecil_" . $fupload_name);
  
  //Hapus gambar/".$aw->alamat_website." di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
}
function Uploadgame2($fupload_name){
	include "koneksi.php";
  //direktori gambar/".$aw->alamat_website."
  $vdir_upload = "../../../../templates/".$aw->alamat_website."/uploads/img_game/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar/".$aw->alamat_website." dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload2"]["tmp_name"], $vfile_upload);

  //
}
function UploadPhoto($fupload_name){
 	include "koneksi.php";
 //direktori photo
  $vdir_upload = "../../../../templates/".$aw->alamat_website."/uploads/foto_photo/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar/".$aw->alamat_website." dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}
function UploadNews($fupload_name){
 	include "koneksi.php";
 //direktori news
  $vdir_upload = "../../../../templates/".$aw->alamat_website."/uploads/logo_news/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar/".$aw->alamat_website." dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //identitas file asli
  $im_src = imagecreatefromjpeg($vfile_upload);
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Simpan dalam versi small 110 pixel
  //Set ukuran gambar/".$aw->alamat_website." hasil perubahan
  $dst_width = 110;
  $dst_height = ($dst_width/$src_width)*$src_height;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //Simpan gambar/".$aw->alamat_website."
  imagejpeg($im,$vdir_upload . "small_" . $fupload_name);
  
  //Simpan dalam versi medium 360 pixel
  //Set ukuran gambar/".$aw->alamat_website." hasil perubahan
  $dst_width2 = 390;
  $dst_height2 = ($dst_width2/$src_width)*$src_height;

  //proses perubahan ukuran
  $im2 = imagecreatetruecolor($dst_width2,$dst_height2);
  imagecopyresampled($im2, $im_src, 0, 0, 0, 0, $dst_width2, $dst_height2, $src_width, $src_height);

  //Simpan gambar/".$aw->alamat_website."
  imagejpeg($im2,$vdir_upload . "medium_" . $fupload_name);
  
  //Hapus gambar/".$aw->alamat_website." di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
  imagedestroy($im2);
}
function UploadPopup($fupload_name){
	include "koneksi.php";
  //direktori photo
  $vdir_upload = "../../../../templates/".$aw->alamat_website."/uploads/img_popup/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar/".$aw->alamat_website." dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}
function UploadFavicon($fupload_name){
	include "koneksi.php";
	$vdir_upload = "../../../../templates/".$aw->alamat_website."/uploads/ico/";
	$vfile_upload = $vdir_upload . $fupload_name;
	move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
}
function UploadLogo($fupload_name){
	include "koneksi.php";
	$vdir_upload = "../../../../templates/".$aw->alamat_website."/uploads/ico/";
	$vfile_upload = $vdir_upload . $fupload_name;
	move_uploaded_file($_FILES["fupload2"]["tmp_name"], $vfile_upload);
}
function UploadProduk($fupload_name){
	include "koneksi.php";
  $vdir_upload	= "../../../../../../templates/".$aw->alamat_website."/uploads/img_galeri/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar/".$aw->alamat_website." dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //identitas file asli
  $im_src = imagecreatefromjpeg($vfile_upload);
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Simpan dalam versi small 110 pixel
  //Set ukuran gambar/".$aw->alamat_website." hasil perubahan
  $dst_width = 110;
  $dst_height = ($dst_width/$src_width)*$src_height;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //Simpan gambar/".$aw->alamat_website."
  imagejpeg($im,$vdir_upload . "small_" . $fupload_name);
  

  //Simpan dalam versi medium 360 pixel
  //Set ukuran gambar/".$aw->alamat_website." hasil perubahan
  $dst_width2 = 390;
  $dst_height2 = ($dst_width2/$src_width)*$src_height;

  //proses perubahan ukuran
  $im2 = imagecreatetruecolor($dst_width2,$dst_height2);
  imagecopyresampled($im2, $im_src, 0, 0, 0, 0, $dst_width2, $dst_height2, $src_width, $src_height);

  //Simpan gambar/".$aw->alamat_website."
  imagejpeg($im2,$vdir_upload . "medium_" . $fupload_name);
  
  //Hapus gambar/".$aw->alamat_website." di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
  imagedestroy($im2);
}
function UploadUser($fupload_name){
	include "koneksi.php";
  //direktori gambar/".$aw->alamat_website."
  $vdir_upload = "gambar/".$aw->alamat_website."/foto_anggota/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar/".$aw->alamat_website." dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //identitas file asli
  $im_src = imagecreatefromjpeg($vfile_upload);
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Simpan dalam versi small 110 pixel
  //Set ukuran gambar/".$aw->alamat_website." hasil perubahan
  $dst_width = 110;
  $dst_height = ($dst_width/$src_width)*$src_height;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //Simpan gambar/".$aw->alamat_website."
  imagejpeg($im,$vdir_upload . "small_" . $fupload_name);
  
  //Simpan dalam versi medium 360 pixel
  //Set ukuran gambar/".$aw->alamat_website." hasil perubahan
  $dst_width2 = 390;
  $dst_height2 = ($dst_width2/$src_width)*$src_height;

  //proses perubahan ukuran
  $im2 = imagecreatetruecolor($dst_width2,$dst_height2);
  imagecopyresampled($im2, $im_src, 0, 0, 0, 0, $dst_width2, $dst_height2, $src_width, $src_height);

  //Simpan gambar/".$aw->alamat_website."
  imagejpeg($im2,$vdir_upload . "medium_" . $fupload_name);
  
  //Hapus gambar/".$aw->alamat_website." di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
  imagedestroy($im2);
}
function UploadImageUser($fupload_name){
	include "koneksi.php";
  //direktori gambar/".$aw->alamat_website."
  $vdir_upload = "gambar/".$aw->alamat_website."/foto_berita/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar/".$aw->alamat_website." dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //identitas file asli
  $im_src = imagecreatefromjpeg($vfile_upload);
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Simpan dalam versi small 110 pixel
  //Set ukuran gambar/".$aw->alamat_website." hasil perubahan
  $dst_width = 110;
  $dst_height = ($dst_width/$src_width)*$src_height;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //Simpan gambar/".$aw->alamat_website."
  imagejpeg($im,$vdir_upload . "small_" . $fupload_name);
  

  //Simpan dalam versi medium 360 pixel
  //Set ukuran gambar/".$aw->alamat_website." hasil perubahan
  $dst_width2 = 390;
  $dst_height2 = ($dst_width2/$src_width)*$src_height;

  //proses perubahan ukuran
  $im2 = imagecreatetruecolor($dst_width2,$dst_height2);
  imagecopyresampled($im2, $im_src, 0, 0, 0, 0, $dst_width2, $dst_height2, $src_width, $src_height);

  //Simpan gambar/".$aw->alamat_website."
  imagejpeg($im2,$vdir_upload . "medium_" . $fupload_name);
  
  //Hapus gambar/".$aw->alamat_website." di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
  imagedestroy($im2);
}
function UploadGalleryUser($fupload_name){
	include "koneksi.php";
	//direktori gambar/".$aw->alamat_website."
	$vdir_upload = "gambar/".$aw->alamat_website."/img_galeri/";
	$vfile_upload = $vdir_upload . $fupload_name;
	
	//Simpan gambar/".$aw->alamat_website." dalam ukuran sebenarnya
	move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
	
	//identitas file asli
	$im_src = imagecreatefromjpeg($vfile_upload);
	$src_width = imageSX($im_src);
	$src_height = imageSY($im_src);

	//Simpan dalam versi small 100 pixel
	//Set ukuran gambar/".$aw->alamat_website." hasil perubahan
	$dst_width = 100;
	$dst_height = ($dst_width/$src_width)*$src_height;
	
	//proses perubahan ukuran
	$im = imagecreatetruecolor($dst_width,$dst_height);
	imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);
	
	//Simpan gambar/".$aw->alamat_website."
	imagejpeg($im,$vdir_upload . "kecil_" . $fupload_name);
	
	//Simpan dalam versi medium 360 pixel
	//Set ukuran gambar/".$aw->alamat_website." hasil perubahan
	$dst_width2 = 390;
	$dst_height2 = ($dst_width2/$src_width)*$src_height;
	
	//proses perubahan ukuran
	$im2 = imagecreatetruecolor($dst_width2,$dst_height2);
	imagecopyresampled($im2, $im_src, 0, 0, 0, 0, $dst_width2, $dst_height2, $src_width, $src_height);
	
	//Simpan gambar/".$aw->alamat_website."
	imagejpeg($im2,$vdir_upload . "medium_" . $fupload_name);
	
	//Hapus gambar/".$aw->alamat_website." di memori komputer
	imagedestroy($im_src);
	imagedestroy($im);
	imagedestroy($im2);
}
function UploadVideoUser($fupload_name){
	include "koneksi.php";
	//direktori gambar/".$aw->alamat_website."
	$vdir_upload = "gambar/".$aw->alamat_website."/img_video/";
	$vfile_upload = $vdir_upload . $fupload_name;
	
	//Simpan gambar/".$aw->alamat_website." dalam ukuran sebenarnya
	move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
	
	//identitas file asli
	$im_src = imagecreatefromjpeg($vfile_upload);
	$src_width = imageSX($im_src);
	$src_height = imageSY($im_src);
	
	//Simpan dalam versi small 120 pixel
	//Set ukuran gambar/".$aw->alamat_website." hasil perubahan
	$dst_width = 120;
	$dst_height = ($dst_width/$src_width)*$src_height;
	
	//proses perubahan ukuran
	$im = imagecreatetruecolor($dst_width,$dst_height);
	imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);
	
	//Simpan gambar/".$aw->alamat_website."
	imagejpeg($im,$vdir_upload . "kecil_" . $fupload_name);
	
	//Simpan dalam versi medium 360 pixel
	//Set ukuran gambar/".$aw->alamat_website." hasil perubahan
	$dst_width2 = 390;
	$dst_height2 = ($dst_width2/$src_width)*$src_height;
	
	//proses perubahan ukuran
	$im2 = imagecreatetruecolor($dst_width2,$dst_height2);
	imagecopyresampled($im2, $im_src, 0, 0, 0, 0, $dst_width2, $dst_height2, $src_width, $src_height);
	
	//Simpan gambar/".$aw->alamat_website."
	imagejpeg($im2,$vdir_upload . "medium_" . $fupload_name);
	
	//Hapus gambar/".$aw->alamat_website." di memori komputer
	imagedestroy($im_src);
	imagedestroy($im);
	imagedestroy($im2);
}
function UploadAdsense($fupload_name){
	include "koneksi.php";
  //direktori gambar/".$aw->alamat_website."
  $vdir_upload = "../../../../templates/".$aw->alamat_website."/uploads/img_adsense/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar/".$aw->alamat_website." dalam ukuran sebenarnya
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);

  //identitas file asli
  $im_src = imagecreatefromjpeg($vfile_upload);
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Simpan dalam versi small 110 pixel
  //Set ukuran gambar/".$aw->alamat_website." hasil perubahan
  $dst_width = 110;
  $dst_height = ($dst_width/$src_width)*$src_height;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //Simpan gambar/".$aw->alamat_website."
  imagejpeg($im,$vdir_upload . "small_" . $fupload_name);
  

  //Simpan dalam versi medium 360 pixel
  //Set ukuran gambar/".$aw->alamat_website." hasil perubahan
  $dst_width2 = 390;
  $dst_height2 = ($dst_width2/$src_width)*$src_height;

  //proses perubahan ukuran
  $im2 = imagecreatetruecolor($dst_width2,$dst_height2);
  imagecopyresampled($im2, $im_src, 0, 0, 0, 0, $dst_width2, $dst_height2, $src_width, $src_height);

  //Simpan gambar/".$aw->alamat_website."
  imagejpeg($im2,$vdir_upload . "medium_" . $fupload_name);
  
  //Hapus gambar/".$aw->alamat_website." di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
  imagedestroy($im2);
}
function UploadTemplate($fupload_name){
  include "koneksi.php";
  $vdir_upload	= "../../../../templates/".$aw->alamat_website."/uploads/ico/";
  $vfile_upload	= $vdir_upload . $fupload_name;
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
  $im_src			= imagecreatefromjpeg($vfile_upload);
  $src_width		= imageSX($im_src);
  $src_height		= imageSY($im_src);
  $dst_width		= 110;
  $dst_height		= ($dst_width/$src_width)*$src_height;
  $im				= imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);
  imagejpeg($im,$vdir_upload . "small_" . $fupload_name);
  $dst_width2		= 390;
  $dst_height2	= ($dst_width2/$src_width)*$src_height;
  $im2			= imagecreatetruecolor($dst_width2,$dst_height2);
  imagecopyresampled($im2, $im_src, 0, 0, 0, 0, $dst_width2, $dst_height2, $src_width, $src_height);
  imagejpeg($im2,$vdir_upload . "medium_" . $fupload_name);
  imagedestroy($im_src);
  imagedestroy($im);
  imagedestroy($im2);
}
function UploadGambar($fupload_name){
  include "koneksi.php";
  $vdir_upload	= "../../../../../templates/".$aw->alamat_website."/uploads/foto_berita/";
  $vfile_upload	= $vdir_upload . $fupload_name;
  move_uploaded_file($_FILES["fupload"]["tmp_name"], $vfile_upload);
  $im_src			= imagecreatefromjpeg($vfile_upload);
  $src_width		= imageSX($im_src);
  $src_height		= imageSY($im_src);
  $dst_width		= 110;
  $dst_height		= ($dst_width/$src_width)*$src_height;
  $im				= imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);
  imagejpeg($im,$vdir_upload . "small_" . $fupload_name);
  $dst_width2		= 390;
  $dst_height2	= ($dst_width2/$src_width)*$src_height;
  $im2			= imagecreatetruecolor($dst_width2,$dst_height2);
  imagecopyresampled($im2, $im_src, 0, 0, 0, 0, $dst_width2, $dst_height2, $src_width, $src_height);
  imagejpeg($im2,$vdir_upload . "medium_" . $fupload_name);
  imagedestroy($im_src);
  imagedestroy($im);
  imagedestroy($im2);
}
function UploadNol($fupload_name){
  include "koneksi.php";
  $vdir_upload	= "../../../../../templates/".$aw->alamat_website."/uploads/img_galeri/";
  $vfile_upload	= $vdir_upload . $fupload_name;
  move_uploaded_file($_FILES["fupload0"]["tmp_name"], $vfile_upload);
  $im_src			= imagecreatefromjpeg($vfile_upload);
  $src_width		= imageSX($im_src);
  $src_height		= imageSY($im_src);
  $dst_width		= 110;
  $dst_height		= ($dst_width/$src_width)*$src_height;
  $im				= imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);
  imagejpeg($im,$vdir_upload . "kecil_" . $fupload_name);
  $dst_width2		= 390;
  $dst_height2	= ($dst_width2/$src_width)*$src_height;
  $im2			= imagecreatetruecolor($dst_width2,$dst_height2);
  imagecopyresampled($im2, $im_src, 0, 0, 0, 0, $dst_width2, $dst_height2, $src_width, $src_height);
  imagejpeg($im2,$vdir_upload . "medium_" . $fupload_name);
  imagedestroy($im_src);
  imagedestroy($im);
  imagedestroy($im2);
}
function UploadLimaPuluh($fupload_name){
  include "koneksi.php";
  $vdir_upload	= "../../../../../templates/".$aw->alamat_website."/uploads/img_galeri/";
  $vfile_upload	= $vdir_upload . $fupload_name;
  move_uploaded_file($_FILES["fupload50"]["tmp_name"], $vfile_upload);
  $im_src			= imagecreatefromjpeg($vfile_upload);
  $src_width		= imageSX($im_src);
  $src_height		= imageSY($im_src);
  $dst_width		= 110;
  $dst_height		= ($dst_width/$src_width)*$src_height;
  $im				= imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);
  imagejpeg($im,$vdir_upload . "kecil_" . $fupload_name);
  $dst_width2		= 390;
  $dst_height2	= ($dst_width2/$src_width)*$src_height;
  $im2			= imagecreatetruecolor($dst_width2,$dst_height2);
  imagecopyresampled($im2, $im_src, 0, 0, 0, 0, $dst_width2, $dst_height2, $src_width, $src_height);
  imagejpeg($im2,$vdir_upload . "medium_" . $fupload_name);
  imagedestroy($im_src);
  imagedestroy($im);
  imagedestroy($im2);
}
function UploadSeratus($fupload_name){
  include "koneksi.php";
  $vdir_upload	= "../../../../../templates/".$aw->alamat_website."/uploads/img_galeri/";
  $vfile_upload	= $vdir_upload . $fupload_name;
  move_uploaded_file($_FILES["fupload100"]["tmp_name"], $vfile_upload);
  $im_src			= imagecreatefromjpeg($vfile_upload);
  $src_width		= imageSX($im_src);
  $src_height		= imageSY($im_src);
  $dst_width		= 110;
  $dst_height		= ($dst_width/$src_width)*$src_height;
  $im				= imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);
  imagejpeg($im,$vdir_upload . "kecil_" . $fupload_name);
  $dst_width2		= 390;
  $dst_height2	= ($dst_width2/$src_width)*$src_height;
  $im2			= imagecreatetruecolor($dst_width2,$dst_height2);
  imagecopyresampled($im2, $im_src, 0, 0, 0, 0, $dst_width2, $dst_height2, $src_width, $src_height);
  imagejpeg($im2,$vdir_upload . "medium_" . $fupload_name);
  imagedestroy($im_src);
  imagedestroy($im);
  imagedestroy($im2);
}
?>