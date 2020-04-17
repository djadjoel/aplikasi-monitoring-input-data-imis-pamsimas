<?php
//pengumuman
class Pengumuman4{
	function cariPosisi($batas){
		if(empty($_GET['index-pengumuman-halaman'])){
			$posisi=0;
			$_GET['index-pengumuman-halaman']=1;
		}else{
			$posisi = ($_GET['index-pengumuman-halaman']-1) * $batas;
		}
		return $posisi;
	}
	function jumlahHalaman($jmldata, $batas){
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
	}
	function navHalaman($halaman_aktif, $jmlhalaman){
		$link_halaman = "";
		if($halaman_aktif > 1){
			$prev = $halaman_aktif-1;
			$link_halaman .= "
			<li class='page-item hidden-xs'><a href=index-pengumuman-halaman-1 class='page-link'><i class='fa fa-angle-double-left' aria-hidden='true'></i></a></li>
			<li class='page-item'><a href=index-pengumuman-halaman-$prev class='page-link'><i class='fa fa-angle-left' aria-hidden='true'></i></a></li>";
		}else{
			$link_halaman .= "<li class='page-item hidden-xs'><a href='#' class='page-link'><i class='fa fa-angle-double-left' aria-hidden='true'></i></a></li>
			<li class='page-item'><a href='#' class='page-link'><i class='fa fa-angle-left' aria-hidden='true'></i></a></li> ";
		}
		// Link halaman 1,2,3, …
		$angka = ($halaman_aktif > 3 ? "<li class='page-item disabled'><a class='page-link' href='#'>...</a></li>" : " ");
		for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
			if ($i < 1)
			continue;
			$angka .= "<li class='page-item'><a class='page-link' href=index-pengumuman-halaman-$i>$i</a></li>  ";
		}
		$angka .= " <li class='page-item active'><a class='page-link' href='#'><b>$halaman_aktif</b></a></li>";
		for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
			if($i > $jmlhalaman)
			break;
			$angka .= "<li class='page-item'><a class='page-link' href=index-pengumuman-halaman-$i>$i</a></li>";
		}
		$angka .= ($halaman_aktif+2<$jmlhalaman ? "
		<li class='page-item disabled'><a class='page-link' href='#'>...</a></li>
		<li class='page-item'><a class='page-link' href=index-pengumuman-halaman-$jmlhalaman>$jmlhalaman</a></li> " : " ");
		$link_halaman .= "$angka";
		if($halaman_aktif < $jmlhalaman){
			$next = $halaman_aktif+1;
			$link_halaman .= " 
			<li class='page-item'><a class='page-link' href=index-pengumuman-halaman-$next><i class='fa fa-angle-right' aria-hidden='true'></i></a></li>
			<li class='page-item hidden-xs'><a class='page-link' href=index-pengumuman-halaman-$jmlhalaman><i class='fa fa-angle-double-right' aria-hidden='true'></i></a></li> ";
		}else{
			$link_halaman .= " <li class='page-item'><a class='page-link' href='#'><i class='fa fa-angle-right' aria-hidden='true'></i></a></li> 
			<li class='page-item hidden-xs'><a class='page-link' href='#'> <i class='fa fa-angle-double-right' aria-hidden='true'></i></a></li>";
		}
		return $link_halaman;
	}
}

//blog
class PagingBlog4{
	function cariPosisi($batas){
		if(empty($_GET['index-blog-halaman'])){
			$posisi=0;
			$_GET['index-blog-halaman']=1;
		}else{
			$posisi = ($_GET['index-blog-halaman']-1) * $batas;
		}
		return $posisi;
	}
	function jumlahHalaman($jmldata, $batas){
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
	}
	function navHalaman($halaman_aktif, $jmlhalaman){
		$link_halaman = "";
		if($halaman_aktif > 1){
			$prev = $halaman_aktif-1;
			$link_halaman .= "
			<li class='page-item hidden-xs'><a href=index-blog-halaman-1 class='page-link'><i class='fa fa-angle-double-left' aria-hidden='true'></i></a></li>
			<li class='page-item'><a href=index-blog-halaman-$prev class='page-link'><i class='fa fa-angle-left' aria-hidden='true'></i></a></li>";
		}else{
			$link_halaman .= "<li class='page-item hidden-xs'><a href='#' class='page-link'><i class='fa fa-angle-double-left' aria-hidden='true'></i></a></li>
			<li class='page-item'><a href='#' class='page-link'><i class='fa fa-angle-left' aria-hidden='true'></i></a></li> ";
		}
		$angka = ($halaman_aktif > 3 ? "<li class='page-item disabled'><a class='page-link' href='#'>...</a></li>" : " ");
		for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
			if ($i < 1)
			continue;
			$angka .= "<li class='page-item'><a class='page-link' href=index-blog-halaman-$i>$i</a></li>  ";
		}
		$angka .= " <li class='page-item active'><a class='page-link' href='#'><b>$halaman_aktif</b></a></li>";
		for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
			if($i > $jmlhalaman)
			break;
			$angka .= "<li class='page-item'><a class='page-link' href=index-blog-halaman-$i>$i</a></li>";
		}
		$angka .= ($halaman_aktif+2<$jmlhalaman ? "
		<li class='page-item disabled'><a class='page-link' href='#'>...</a></li>
		<li class='page-item'><a class='page-link' href=index-blog-halaman-$jmlhalaman>$jmlhalaman</a></li> " : " ");
		$link_halaman .= "$angka";
		if($halaman_aktif < $jmlhalaman){
			$next = $halaman_aktif+1;
			$link_halaman .= " 
			<li class='page-item'><a class='page-link' href=index-blog-halaman-$next><i class='fa fa-angle-right' aria-hidden='true'></i></a></li>
			<li class='page-item hidden-xs'><a class='page-link' href=index-blog-halaman-$jmlhalaman><i class='fa fa-angle-double-right' aria-hidden='true'></i></a></li> ";
		}else{
			$link_halaman .= " <li class='page-item'><a class='page-link' href='#'><i class='fa fa-angle-right' aria-hidden='true'></i></a></li> 
			<li class='page-item hidden-xs'><a class='page-link' href='#'> <i class='fa fa-angle-double-right' aria-hidden='true'></i></a></li>";
		}
		return $link_halaman;
	}
}

//detailkategori
class PagingKategori4{
	function cariPosisi($batas){
		if(empty($_GET['rubrik-halaman'])){
			$posisi=0;
			$_GET['rubrik-halaman']=1;
		}else{
			$posisi = ($_GET['rubrik-halaman']-1) * $batas;
		}
		return $posisi;
	}
	function jumlahHalaman($jmldata, $batas){
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
	}
	function navHalaman($halaman_aktif, $jmlhalaman){
		$link_halaman = "";
		if($halaman_aktif > 1){
			$prev = $halaman_aktif-1;
			$link_halaman .= "
			<li class='page-item hidden-xs'><a href=rubrik-halaman-$_GET[id]-1 class='page-link'><i class='fa fa-angle-double-left' aria-hidden='true'></i></a></li>
			<li class='page-item'><a href=rubrik-halaman-$_GET[id]-$prev class='page-link'><i class='fa fa-angle-left' aria-hidden='true'></i></a></li>";
		}else{
			$link_halaman .= "
			<li class='page-item hidden-xs'><a href='#' class='page-link'><i class='fa fa-angle-double-left' aria-hidden='true'></i></a></li>
			<li class='page-item'><a href='#' class='page-link'><i class='fa fa-angle-left' aria-hidden='true'></i> </a></li> ";
		}
		$angka = ($halaman_aktif > 3 ? "<li class='page-item disabled'><a class='page-link' href='#'>...</a></li>" : " ");
		for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
			if ($i < 1)
			continue;
			$angka .= "<li class='page-item'><a class='page-link' href=rubrik-halaman-$_GET[id]-$i>$i</a></li>  ";
		}
		$angka .= " <li class='page-item active'><a class='page-link' href='#'><b>$halaman_aktif</b></a></li>";
		for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
			if($i > $jmlhalaman)
			break;
			$angka .= "<li class='page-item'><a class='page-link' href=rubrik-halaman-$_GET[id]-$i>$i</a></li>";
		}
		$angka .= ($halaman_aktif+2<$jmlhalaman ? "<li class='page-item disabled'><a class='page-link' href='#'>...</a></li>
		<li class='page-item'><a class='page-link' href=rubrik-halaman-$_GET[id]-$jmlhalaman>$jmlhalaman</a></li> " : " ");
		$link_halaman .= "$angka";
		if($halaman_aktif < $jmlhalaman){
			$next = $halaman_aktif+1;
			$link_halaman .= " <li class='page-item'><a class='page-link' href=rubrik-halaman-$_GET[id]-$next><i class='fa fa-angle-right' aria-hidden='true'></i></a></li>
			<li class='page-item hidden-xs'><a class='page-link' href=rubrik-halaman-$_GET[id]-$jmlhalaman><i class='fa fa-angle-double-right' aria-hidden='true'></i></a></li> ";
		}else{
			$link_halaman .= " <li class='page-item'><a class='page-link' href='#'><i class='fa fa-angle-right' aria-hidden='true'></i></a></li> 
			<li class='page-item hidden-xs'><a class='page-link' href='#'><i class='fa fa-angle-double-right' aria-hidden='true'></i></a></li>";
		}
		return $link_halaman;
	}
}

//semuaberita
class PagingBerita4{
	function cariPosisi($batas){
		if(empty($_GET['index-berita-halaman'])){
			$posisi=0;
			$_GET['index-berita-halaman']=1;
		}else{
			$posisi = ($_GET['index-berita-halaman']-1) * $batas;
		}
		return $posisi;
	}
	function jumlahHalaman($jmldata, $batas){
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
	}
	function navHalaman($halaman_aktif, $jmlhalaman){
		$link_halaman = "";
		if($halaman_aktif > 1){
			$prev = $halaman_aktif-1;
			$link_halaman .= "
			<li class='page-item hidden-xs'><a href=index-berita-halaman-1 class='page-link'><i class='fa fa-angle-double-left' aria-hidden='true'></i></a></li>
			<li class='page-item'><a href=index-berita-halaman-$prev class='page-link'><i class='fa fa-angle-left' aria-hidden='true'></i></a></li>";
		}else{
			$link_halaman .= "<li class='page-item hidden-xs'><a href='#' class='page-link'><i class='fa fa-angle-double-left' aria-hidden='true'></i></a></li>
			<li class='page-item'><a href='#' class='page-link'><i class='fa fa-angle-left' aria-hidden='true'></i></a></li> ";
		}
		// Link halaman 1,2,3, …
		$angka = ($halaman_aktif > 3 ? "<li class='page-item disabled'><a class='page-link' href='#'>...</a></li>" : " ");
		for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
			if ($i < 1)
			continue;
			$angka .= "<li class='page-item'><a class='page-link' href=index-berita-halaman-$i>$i</a></li>  ";
		}
		$angka .= " <li class='page-item active'><a class='page-link' href='#'><b>$halaman_aktif</b></a></li>";
		for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
			if($i > $jmlhalaman)
			break;
			$angka .= "<li class='page-item'><a class='page-link' href=index-berita-halaman-$i>$i</a></li>";
		}
		$angka .= ($halaman_aktif+2<$jmlhalaman ? "
		<li class='page-item disabled'><a class='page-link' href='#'>...</a></li>
		<li class='page-item'><a class='page-link' href=index-berita-halaman-$jmlhalaman>$jmlhalaman</a></li> " : " ");
		$link_halaman .= "$angka";
		if($halaman_aktif < $jmlhalaman){
			$next = $halaman_aktif+1;
			$link_halaman .= " 
			<li class='page-item'><a class='page-link' href=index-berita-halaman-$next><i class='fa fa-angle-right' aria-hidden='true'></i></a></li>
			<li class='page-item hidden-xs'><a class='page-link' href=index-berita-halaman-$jmlhalaman><i class='fa fa-angle-double-right' aria-hidden='true'></i></a></li> ";
		}else{
			$link_halaman .= " <li class='page-item'><a class='page-link' href='#'><i class='fa fa-angle-right' aria-hidden='true'></i></a></li> 
			<li class='page-item hidden-xs'><a class='page-link' href='#'> <i class='fa fa-angle-double-right' aria-hidden='true'></i></a></li>";
		}
		return $link_halaman;
	}
}

//Dokumentasi Album Foto
class PagingAlbumFoto4{
	// Fungsi untuk mencek halaman dan posisi data
	function cariPosisi($batas){
		if(empty($_GET['dokumentasi-album-foto-halaman'])){
			$posisi=0;
			$_GET['dokumentasi-album-foto-halaman']=1;
		}else{
			$posisi = ($_GET['dokumentasi-album-foto-halaman']-1) * $batas;
		}
		return $posisi;
	}
	// Fungsi untuk menghitung total halaman
	function jumlahHalaman($jmldata, $batas){
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
	}
	// Fungsi untuk link halaman 1,2,3
	function navHalaman($halaman_aktif, $jmlhalaman){
		$link_halaman = "";
		// Link ke halaman pertama (first) dan sebelumnya (prev)
		if($halaman_aktif > 1){
			$prev = $halaman_aktif-1;
			$link_halaman .= "<li class='page-item hidden-xs'><a class='page-link' href=dokumentasi-album-foto-halaman-1><i class='fa fa-angle-double-left' aria-hidden='true'></i></a></li>
			<li class='page-item'><a class='page-link' href=dokumentasi-album-foto-halaman-$prev><i class='fa fa-angle-left' aria-hidden='true'></i></a></li>";
		}else{
			$link_halaman .= "<li class='page-item hidden-xs'><a class='page-link' href='#'><i class='fa fa-angle-double-left' aria-hidden='true'></i></a></li><li class='page-item'><a class='page-link' href='#'><i class='fa fa-angle-left' aria-hidden='true'></i></a></li> ";
		}
		// Link halaman 1,2,3, …
		$angka = ($halaman_aktif > 3 ? "<li class='page-item disabled'><a class='page-link' href='#'>...</a></li>" : " ");
		for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
			if ($i < 1)
			continue;
			$angka .= "<li class='page-item'><a class='page-link' href=dokumentasi-album-foto-halaman-$i>$i</a></li>  ";
		}
		$angka .= " <li class='page-item active'><a class='page-link' href='#'><b>$halaman_aktif</b></a></li>";
		for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
			if($i > $jmlhalaman)
		break;
		$angka .= "<li class='page-item'><a class='page-link' href=dokumentasi-album-foto-halaman-$i>$i</a></li>  ";
		}
		$angka .= ($halaman_aktif+2<$jmlhalaman ? "<li class='page-item disabled'><a class='page-link' href='#'>...</a></li>
		<li class='page-item'><a class='page-link' href=dokumentasi-album-foto-halaman-$jmlhalaman>$jmlhalaman</a></li> " : " ");
		$link_halaman .= "$angka";
		// Link ke halaman berikutnya (Next) dan terakhir (Last)
		if($halaman_aktif < $jmlhalaman){
			$next = $halaman_aktif+1;
			$link_halaman .= " <li class='page-item'><a class='page-link' href=dokumentasi-album-foto-halaman-$next><i class='fa fa-angle-right' aria-hidden='true'></i></a></li>
			<li class='page-item hidden-xs'><a class='page-link' href=dokumentasi-album-foto-halaman-$jmlhalaman><i class='fa fa-angle-double-right' aria-hidden='true'></i></a></li> ";
		}else{
			$link_halaman .= " <li class='page-item'><a class='page-link' href='#'><i class='fa fa-angle-right' aria-hidden='true'></i></a></li> 
			<li class='page-item hidden-xs'><a class='page-link' href='#'><i class='fa fa-angle-double-right' aria-hidden='true'></i></a></li>";
		}
		return $link_halaman;
	}
}


// class paging untuk halaman detail playlist
class PagingDetailAlbumFoto4{
	function cariPosisi($batas){
		if(empty($_GET['halaman-galeri'])){
			$posisi=0;
			$_GET['halaman-galeri']=1;
		}else{
			$posisi = ($_GET['halaman-galeri']-1) * $batas;
		}
		return $posisi;
	}
	function jumlahHalaman($jmldata, $batas){
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
	}
	function navHalaman($halaman_aktif, $jmlhalaman){
		$link_halaman = "";
		if($halaman_aktif > 1){
			$prev = $halaman_aktif-1;
			$link_halaman .= "
			<li class='page-item hidden-xs'><a href=".BASE_URL."/halaman-galeri-$_GET[id]-1 class='page-link'><i class='fa fa-angle-double-left' aria-hidden='true'></i></a></li>
			<li class='page-item'><a href=".BASE_URL."/halaman-galeri-$_GET[id]-$prev class='page-link'><i class='fa fa-angle-left' aria-hidden='true'></i></a></li>";
		}else{
			$link_halaman .= "
			<li class='page-item hidden-xs'><a href='#' class='page-link'><i class='fa fa-angle-double-left' aria-hidden='true'></i></a></li>
			<li class='page-item'><a href='#' class='page-link'><i class='fa fa-angle-left' aria-hidden='true'></i> </a></li> ";
		}
		$angka = ($halaman_aktif > 3 ? "<li class='page-item disabled'><a class='page-link' href='#'>...</a></li>" : " ");
		for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
			if ($i < 1)
			continue;
			$angka .= "<li class='page-item'><a class='page-link' href=".BASE_URL."/halaman-galeri-$_GET[id]-$i>$i</a></li>  ";
		}
		$angka .= " <li class='page-item active'><a class='page-link' href='#'><b>$halaman_aktif</b></a></li>";
		for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
			if($i > $jmlhalaman)
			break;
			$angka .= "<li class='page-item'><a class='page-link' href=".BASE_URL."/halaman-galeri-$_GET[id]-$i>$i</a></li>";
		}
		$angka .= ($halaman_aktif+2<$jmlhalaman ? "<li class='page-item disabled'><a class='page-link' href='#'>...</a></li>
		<li class='page-item'><a class='page-link' href=".BASE_URL."/halaman-galeri-$_GET[id]-$jmlhalaman>$jmlhalaman</a></li> " : " ");
		$link_halaman .= "$angka";
		if($halaman_aktif < $jmlhalaman){
			$next = $halaman_aktif+1;
			$link_halaman .= " <li class='page-item'><a class='page-link' href=".BASE_URL."/halaman-galeri-$_GET[id]-$next><i class='fa fa-angle-right' aria-hidden='true'></i></a></li>
			<li class='page-item hidden-xs'><a class='page-link' href=".BASE_URL."/halaman-galeri-$_GET[id]-$jmlhalaman><i class='fa fa-angle-double-right' aria-hidden='true'></i></a></li> ";
		}else{
			$link_halaman .= " <li class='page-item'><a class='page-link' href='#'><i class='fa fa-angle-right' aria-hidden='true'></i></a></li> 
			<li class='page-item hidden-xs'><a class='page-link' href='#'><i class='fa fa-angle-double-right' aria-hidden='true'></i></a></li>";
		}
		return $link_halaman;
	}
}

// class paging untuk halaman semua playlist
class PagingFilm4{
	// Fungsi untuk mencek halaman dan posisi data
	function cariPosisi($batas){
		if(empty($_GET['dokumentasi-album-video-halaman'])){
			$posisi=0;
			$_GET['dokumentasi-album-video-halaman']=1;
		}else{
		$posisi = ($_GET['dokumentasi-album-video-halaman']-1) * $batas;
		}
		return $posisi;
	}
	// Fungsi untuk menghitung total halaman
	function jumlahHalaman($jmldata, $batas){
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
	}
	// Fungsi untuk link halaman 1,2,3
	function navHalaman($halaman_aktif, $jmlhalaman){
		$link_halaman = "";
		// Link ke halaman pertama (first) dan sebelumnya (prev)
		if($halaman_aktif > 1){
			$prev = $halaman_aktif-1;
			$link_halaman .= "<li class='page-item hidden-xs'><a href='dokumentasi-album-video-halaman-1' class='page-link'><i class='fa fa-angle-double-left' aria-hidden='true'></i></a></li>
			<li class='page-item'><a href='dokumentasi-album-video-halaman-$prev' class='page-link'><i class='fa fa-angle-left' aria-hidden='true'></i></a></li>";
		}else{
			$link_halaman .= "<li class='page-item hidden-xs'><a href='#' class='page-link'><i class='fa fa-angle-double-left' aria-hidden='true'></i></a></li>
			<li class='page-item'><a href='#' class='page-link'><i class='fa fa-angle-left' aria-hidden='true'></i></a></li> ";
		}
		// Link halaman 1,2,3, …
		$angka = ($halaman_aktif > 3 ? "<li class='page-item disabled'><a class='page-link' href='#'>...</a></li>" : " ");
		for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
			if ($i < 1)
			continue;
			$angka .= "<li class='page-item'><a class='page-link' href='dokumentasi-album-video-halaman-$i'>$i</a></li>  ";
		}
		$angka .= " <li class='page-item active'><a class='page-link' href='#'><b>$halaman_aktif</b></a></li>";
		for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
			if($i > $jmlhalaman)
			break;
			$angka .= "<li class='page-item'><a class='page-link' href='dokumentasi-album-video-halaman-$i'>$i</a></li>  ";
		}
		$angka .= ($halaman_aktif+2<$jmlhalaman ? "<li class='page-item disabled'><a class='page-link' href='#'>...</a></li>
		<li class='page-item'><a class='page-link' href='dokumentasi-album-video-halaman-$jmlhalaman'>$jmlhalaman</a></li> " : " ");
		$link_halaman .= "$angka";
		// Link ke halaman berikutnya (Next) dan terakhir (Last)
		if($halaman_aktif < $jmlhalaman){
			$next = $halaman_aktif+1;
			$link_halaman .= " <li class='page-item'><a class='page-link' href='dokumentasi-album-video-halaman-$next'><i class='fa fa-angle-right' aria-hidden='true'></i></a></li>
			<li class='page-item hidden-xs'><a class='page-link' href='dokumentasi-album-video-halaman-$jmlhalaman'><i class='fa fa-angle-double-right' aria-hidden='true'></i></a></li> ";
		}else{
			$link_halaman .= " <li class='page-item'><a class='page-link' href='#'><i class='fa fa-angle-right' aria-hidden='true'></i></a></li> 
			<li class='page-item hidden-xs'><a class='page-link' href='#'> <i class='fa fa-angle-double-right' aria-hidden='true'></i></a></li>";
		}
		return $link_halaman;
	}
}

// class paging untuk halaman detail playlist
class PagingPlaylist4{
	// Fungsi untuk mencek halaman dan posisi data
	function cariPosisi($batas){
		if(empty($_GET['playlist-halaman'])){
			$posisi=0;
			$_GET['playlist-halaman']=1;
		}else{
			$posisi = ($_GET['playlist-halaman']-1) * $batas;
		}
		return $posisi;
	}
	// Fungsi untuk menghitung total halaman
	function jumlahHalaman($jmldata, $batas){
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
	}
	// Fungsi untuk link halaman 1,2,3
	function navHalaman($halaman_aktif, $jmlhalaman){
		$link_halaman = "";
		// Link ke halaman pertama (first) dan sebelumnya (prev)
		if($halaman_aktif > 1){
			$prev = $halaman_aktif-1;
			$link_halaman .= "<li class='page-item hidden-xs'><a href='playlist-halaman-$_GET[id]-1' class='page-link'><i class='fa fa-angle-double-left' aria-hidden='true'></i></a></li>
			<li class='page-item'><a href='playlist-halaman-$_GET[id]-$prev' class='page-link'><i class='fa fa-angle-left' aria-hidden='true'></i></a></li>";
		}else{
			$link_halaman .= "<li class='page-item hidden-xs'><a href='#' class='page-link'><i class='fa fa-angle-double-left' aria-hidden='true'></i></a></li>
			<li class='page-item'><a href='#' class='page-link'><i class='fa fa-angle-left' aria-hidden='true'></i> </a></li> ";
		}
		// Link halaman 1,2,3, …
		$angka = ($halaman_aktif > 3 ? "<li class='page-item disabled'><a class='page-link' href='#'>...</a></li>" : " ");
		for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
			if ($i < 1)
			continue;
			$angka .= "<li class='page-item'><a class='page-link' href='playlist-halaman-$_GET[id]-$i'>$i</a></li>  ";
		}
		$angka .= " <li class='page-item active'><a class='page-link' href='#'><b>$halaman_aktif</b></a></li>";
		for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
			if($i > $jmlhalaman)
			break;
			$angka .= "<li class='page-item'><a class='page-link' href='playlist-halaman-$_GET[id]-$i'>$i</a></li>  ";
		}
		$angka .= ($halaman_aktif+2<$jmlhalaman ? "<li class='page-link'>...</li>
		<li class='page-item'><a class='page-link' href='playlist-halaman-$_GET[id]-$jmlhalaman'>$jmlhalaman</a></li> " : " ");
		$link_halaman .= "$angka";
		// Link ke halaman berikutnya (Next) dan terakhir (Last)
		if($halaman_aktif < $jmlhalaman){
			$next = $halaman_aktif+1;
			$link_halaman .= " <li class='page-item'><a class='page-link' href='playlist-halaman-$_GET[id]-$next'><i class='fa fa-angle-right' aria-hidden='true'></i></a></li>
			<li class='page-item hidden-xs'><a class='page-link' href='playlist-halaman-$_GET[id]-$jmlhalaman'><i class='fa fa-angle-double-right' aria-hidden='true'></i></a></li> ";
		}else{
			$link_halaman .= " <li class='page-item'><a class='page-link' href='#'><i class='fa fa-angle-right' aria-hidden='true'></i></a></li> 
			<li class='page-item hidden-xs'><a class='page-link' href='#'> <i class='fa fa-angle-double-right' aria-hidden='true'></i></a></li>";
		}
		return $link_halaman;
	}
}


// Testimoni
class PagingTestimoni4{
	// Fungsi untuk mencek halaman dan posisi data
	function cariPosisi($batas){
		if(empty($_GET['testimoni-halaman'])){
			$posisi=0;
			$_GET['testimoni-halaman']=1;
		}else{
			$posisi = ($_GET['testimoni-halaman']-1) * $batas;
		}
		return $posisi;
	}
	// Fungsi untuk menghitung total halaman
	function jumlahHalaman($jmldata, $batas){
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
	}
	// Fungsi untuk link halaman 1,2,3
	function navHalaman($halaman_aktif, $jmlhalaman){
		$link_halaman = "";
		// Link ke halaman pertama (first) dan sebelumnya (prev)
		if($halaman_aktif > 1){
			$prev = $halaman_aktif-1;
			$link_halaman .= "<li class='page-item hidden-xs'><a href='testimoni-halaman-1' class='page-link'><i class='fa fa-angle-double-left' aria-hidden='true'></i></a></li>
			<li class='page-item'><a href='testimoni-halaman-$prev' class='page-link'><i class='fa fa-angle-left' aria-hidden='true'></i></a></li>";
		}else{
			$link_halaman .= "<li class='page-item hidden-xs'><a href='#' class='page-link'><i class='fa fa-angle-double-left' aria-hidden='true'></i></a></li>
			<li class='page-item'><a href='#' class='page-link'><i class='fa fa-angle-left' aria-hidden='true'></i> </a></li> ";
		}
		// Link halaman 1,2,3, …
		$angka = ($halaman_aktif > 3 ? "<li class='page-item disabled'><a class='page-link' href='#'>...</a></li>" : " ");
		for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
			if ($i < 1)
			continue;
			$angka .= "<li class='page-item'><a class='page-link' href='testimoni-halaman-$i'>$i</a></li>  ";
		}
		$angka .= " <li class='page-item active'><a class='page-link' href='#'><b>$halaman_aktif</b></a></li>";
		for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
			if($i > $jmlhalaman)
			break;
			$angka .= "<li class='page-item'><a class='page-link' href='testimoni-halaman-$i'>$i</a></li>  ";
		}
		$angka .= ($halaman_aktif+2<$jmlhalaman ? "<li class='page-link'>...</li>
		<li class='page-item'><a class='page-link' href='testimoni-halaman-$jmlhalaman'>$jmlhalaman</a></li> " : " ");
		$link_halaman .= "$angka";
		// Link ke halaman berikutnya (Next) dan terakhir (Last)
		if($halaman_aktif < $jmlhalaman){
			$next = $halaman_aktif+1;
			$link_halaman .= " <li class='page-item'><a class='page-link' href='testimoni-halaman-$next'><i class='fa fa-angle-right' aria-hidden='true'></i></a></li>
			<li class='page-item hidden-xs'><a class='page-link' href='testimoni-halaman-$jmlhalaman'><i class='fa fa-angle-double-right' aria-hidden='true'></i></a></li> ";
		}else{
			$link_halaman .= " <li class='page-item'><a class='page-link' href='#'><i class='fa fa-angle-right' aria-hidden='true'></i></a></li> 
			<li class='page-item hidden-xs'><a class='page-link' href='#'> <i class='fa fa-angle-double-right' aria-hidden='true'></i></a></li>";
		}
		return $link_halaman;
	}
}
?>