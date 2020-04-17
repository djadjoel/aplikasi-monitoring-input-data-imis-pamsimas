<?php
function watermark_image($fupload_name){
	include "koneksi.php";
	$image_show = "../../../gambar/$aw[alamat_website]/ico/$aw[logo]";   // watermark image
	$image_path = $image_show; 
	$path = "../../../gambar/$aw[alamat_website]/img_galeri/";   // folder upload gambar setelah proses watermark
	move_uploaded_file($_FILES['fupload']['tmp_name'], $path.$_FILES['fupload']['name']);
	$oldimage_name=$path.$_FILES['fupload']['name'];
	$new_image_name = $fupload_name;
   
    list($owidth,$oheight) = getimagesize($oldimage_name);
    $width = 800;
	$height = ($width/$owidth)*$oheight;    // tentukan ukuran gambar akhir, contoh: 300 x 300
    $im = imagecreatetruecolor($width, $height);
	
    $img_src = imagecreatefromjpeg($oldimage_name);
    imagecopyresampled($im, $img_src, 0, 0, 0, 0, $width, $height, $owidth, $oheight);
    $watermark = imagecreatefrompng($image_path);
	
    list($w_width, $w_height) = getimagesize($image_path);        
    $pos_x = $width - $w_width; 
    $pos_y = $height - $w_height;
    imagecopy($im, $watermark, $pos_x, $pos_y, 0, 0, $w_width, $w_height);
    imagejpeg($im, $new_image_name, 100); 
    imagedestroy($im);
    unlink($oldimage_name);
    return $new_image_name;	
}

?>
