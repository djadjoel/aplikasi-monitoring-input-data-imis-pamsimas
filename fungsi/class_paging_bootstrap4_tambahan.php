<?php
//mobil grid
class Mobil4{
	function cariPosisi($batas){
		if(empty($_GET['cari-mobil-suzuki-halaman'])){
			$posisi=0;
			$_GET['cari-mobil-suzuki-halaman']=1;
		}else{
			$posisi = ($_GET['cari-mobil-suzuki-halaman']-1) * $batas;
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
			<li class='page-item hidden-xs'><a href=cari-mobil-suzuki-halaman-1 class='page-link'><i class='fas fa-chevron-left' aria-hidden='true'></i></a></li>
			<li class='page-item'><a href=cari-mobil-suzuki-halaman-$prev class='page-link'><i class='fa fa-angle-left' aria-hidden='true'></i></a></li>";
		}else{
			$link_halaman .= "<li class='page-item hidden-xs'><a href='#' class='page-link'><i class='fas fa-chevron-left' aria-hidden='true'></i></a></li>
			<li class='page-item'><a href='#' class='page-link'><i class='fa fa-angle-left' aria-hidden='true'></i></a></li> ";
		}
		// Link halaman 1,2,3, �
		$angka = ($halaman_aktif > 3 ? "<li class='page-item disabled'><a class='page-link' href='#'>...</a></li>" : " ");
		for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
			if ($i < 1)
			continue;
			$angka .= "<li class='page-item'><a class='page-link' href=cari-mobil-suzuki-halaman-$i>$i</a></li>  ";
		}
		$angka .= " <li class='page-item active'><a class='page-link' href='#'><b>$halaman_aktif</b></a></li>";
		for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
			if($i > $jmlhalaman)
			break;
			$angka .= "<li class='page-item'><a class='page-link' href=cari-mobil-suzuki-halaman-$i>$i</a></li>";
		}
		$angka .= ($halaman_aktif+2<$jmlhalaman ? "
		<li class='page-item disabled'><a class='page-link' href='#'>...</a></li>
		<li class='page-item'><a class='page-link' href=cari-mobil-suzuki-halaman-$jmlhalaman>$jmlhalaman</a></li> " : " ");
		$link_halaman .= "$angka";
		if($halaman_aktif < $jmlhalaman){
			$next = $halaman_aktif+1;
			$link_halaman .= " 
			<li class='page-item'><a class='page-link' href=cari-mobil-suzuki-halaman-$next><i class='fas fa-chevron-right' aria-hidden='true'></i></a></li>
			<li class='page-item hidden-xs'><a class='page-link' href=cari-mobil-suzuki-halaman-$jmlhalaman><i class='fa fa-angle-double-right' aria-hidden='true'></i></a></li> ";
		}else{
			$link_halaman .= " <li class='page-item'><a class='page-link' href='#'><i class='fas fa-chevron-right' aria-hidden='true'></i></a></li> 
			<li class='page-item hidden-xs'><a class='page-link' href='#'> <i class='fa fa-angle-double-right' aria-hidden='true'></i></a></li>";
		}
		return $link_halaman;
	}
}

//mobil berita
class MobilArtikel{
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
			<li class='page-item hidden-xs'><a href=index-berita-halaman-1 class='page-link'><i class='fas fa-chevron-left' aria-hidden='true'></i></a></li>
			<li class='page-item'><a href=index-berita-halaman-$prev class='page-link'><i class='fa fa-angle-left' aria-hidden='true'></i></a></li>";
		}else{
			$link_halaman .= "<li class='page-item hidden-xs'><a href='#' class='page-link'><i class='fas fa-chevron-left' aria-hidden='true'></i></a></li>
			<li class='page-item'><a href='#' class='page-link'><i class='fa fa-angle-left' aria-hidden='true'></i></a></li> ";
		}
		// Link halaman 1,2,3, �
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
			<li class='page-item'><a class='page-link' href=index-berita-halaman-$next><i class='fas fa-chevron-right' aria-hidden='true'></i></a></li>
			<li class='page-item hidden-xs'><a class='page-link' href=index-berita-halaman-$jmlhalaman><i class='fa fa-angle-double-right' aria-hidden='true'></i></a></li> ";
		}else{
			$link_halaman .= " <li class='page-item'><a class='page-link' href='#'><i class='fas fa-chevron-right' aria-hidden='true'></i></a></li> 
			<li class='page-item hidden-xs'><a class='page-link' href='#'> <i class='fa fa-angle-double-right' aria-hidden='true'></i></a></li>";
		}
		return $link_halaman;
	}
}

//katalog tokoonline
class KatalogTokolonline{
	function cariPosisi($batas){
		if(empty($_GET['katalog-halaman'])){
			$posisi=0;
			$_GET['katalog-halaman']=1;
		}else{
			$posisi = ($_GET['katalog-halaman']-1) * $batas;
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
			<a href=katalog-halaman-1 class='prev-arrow hidden-xs'><i class='fa fa-angle-double-left' aria-hidden='true'></i></a>
			<a href=katalog-halaman-$prev class='next-arrow'><i class='fa fa-long-arrow-right' aria-hidden='true'></i></a>";
		}else{
			$link_halaman .= "<a href='#' class='prev-arrow hidden-xs'><i class='fa fa-angle-double-left' aria-hidden='true'></i></a>
			<a href='#' class='prev-arrow'><i class='fa fa-long-arrow-left' aria-hidden='true'></i></a> ";
		}
		// Link halaman 1,2,3
		$angka = ($halaman_aktif > 3 ? "<a class='dot-dot' href='#'><i class='fa fa-ellipsis-h' aria-hidden='true'></i></a>" : " ");
		for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
			if ($i < 1)
			continue;
			$angka .= "<a href=katalog-halaman-$i>$i</a>  ";
		}
		$angka .= " <a class='active' href='#'>$halaman_aktif</a>";
		for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
			if($i > $jmlhalaman)
			break;
			$angka .= "<a href=katalog-halaman-$i>$i</a>";
		}
		$angka .= ($halaman_aktif+2<$jmlhalaman ? "
		<a class='dot-dot' href='#'><i class='fa fa-ellipsis-h' aria-hidden='true'></i></a>
		<a href=katalog-halaman-$jmlhalaman>$jmlhalaman</a> " : " ");
		$link_halaman .= "$angka";
		if($halaman_aktif < $jmlhalaman){
			$next = $halaman_aktif+1;
			$link_halaman .= " 
			<a class='next-arrow' href=katalog-halaman-$next><i class='fa fa-long-arrow-right' aria-hidden='true'></i></a>
			<a class='next-arrow hidden-xs' href=katalog-halaman-$jmlhalaman><i class='fa fa-angle-double-right' aria-hidden='true'></i></a> ";
		}else{
			$link_halaman .= " <a class='next-arrow' href='#'><i class='fa fa-long-arrow-right' aria-hidden='true'></i></a> 
			<a class='next-arrow hidden-xs' href='#'><i class='fa fa-angle-double-right' aria-hidden='true'></i></a>";
		}
		return $link_halaman;
	}
}
?>