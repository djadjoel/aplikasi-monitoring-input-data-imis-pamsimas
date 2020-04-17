<?php
////////PAGING TERBARU////////

//semuaberita
class PagingKonten{
// Fungsi untuk mencek halaman dan posisi data
	function cariPosisi($batas){
		if(empty($_GET['index-halaman'])){
			$posisi=0;
			$_GET['index-halaman']=1;
		}else{
			$posisi = ($_GET['index-halaman']-1) * $batas;
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
			$link_halaman .= "
			<li class='hidden-xs'><a href=index-halaman-1 class='nextprev'><< First</a></li>
			<li><a href=index-halaman-$prev class='nextprev'>< Prev</a></li>";
		}else{
			$link_halaman .= "<li class='hidden-xs'><a href='#' class='nextprev'><< First</a></li><li><a href='#' class='nextprev'>< Prev </a></li> ";
		}
		// Link halaman 1,2,3, …
		$angka = ($halaman_aktif > 3 ? "<li class='disabled'><a href='#'>...</a></li>" : " ");
		for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
			if ($i < 1)
			continue;
			$angka .= "<li><a href=index-halaman-$i>$i</a></li>  ";
		}
		$angka .= " <li class='active'><a href='#'><b>$halaman_aktif</b></a></li>";
		for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
			if($i > $jmlhalaman)
			break;
			$angka .= "<li><a href=index-halaman-$i>$i</a></li>";
		}
		$angka .= ($halaman_aktif+2<$jmlhalaman ? "
		<li class='disabled'><a href='#'>...</a></li>
		<li><a href=index-halaman-$jmlhalaman>$jmlhalaman</a></li> " : " ");
		$link_halaman .= "$angka";
		// Link ke halaman berikutnya (Next) dan terakhir (Last)
		if($halaman_aktif < $jmlhalaman){
			$next = $halaman_aktif+1;
			$link_halaman .= " 
			<li><a href=index-halaman-$next>Next ></a></li>
			<li class='hidden-xs'><a href=index-halaman-$jmlhalaman>Last >></a></li> ";
		}else{
			$link_halaman .= " <li><a href='#'>Next ></a></li> <li class='hidden-xs'><a href='#'> Last >></a></li>";
		}
		return $link_halaman;
	}
}
//detailkategori
class PagingKategori{
	// Fungsi untuk mencek halaman dan posisi data
	function cariPosisi($batas){
		if(empty($_GET['rubrik-halaman'])){
			$posisi=0;
			$_GET['rubrik-halaman']=1;
		}else{
			$posisi = ($_GET['rubrik-halaman']-1) * $batas;
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
			$link_halaman .= "
			<li class='hidden-xs'><a href=rubrik-halaman-$_GET[id]-1 class='nextprev'><< First</a></li>
			<li><a href=rubrik-halaman-$_GET[id]-$prev class='nextprev'>< Prev</a></li>";
		}else{
			$link_halaman .= "<li class='hidden-xs'><a href='#' class='nextprev'><< First</a></li><li><a href='#' class='nextprev'>< Prev </a></li> ";
		}
		// Link halaman 1,2,3, …
		$angka = ($halaman_aktif > 3 ? "<li class='disabled'><a href='#'>...</a></li>" : " ");
		for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
			if ($i < 1)
			continue;
			$angka .= "<li><a href=rubrik-halaman-$_GET[id]-$i>$i</a></li>  ";
		}
		$angka .= " <li class='active'><a href='#'><b>$halaman_aktif</b></a></li>";
		for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
			if($i > $jmlhalaman)
			break;
			$angka .= "<li><a href=rubrik-halaman-$_GET[id]-$i>$i</a></li>";
		}
		$angka .= ($halaman_aktif+2<$jmlhalaman ? "<li class='disabled'><a href='#'>...</a></li><li><a href=rubrik-halaman-$_GET[id]-$jmlhalaman>$jmlhalaman</a></li> " : " ");
		$link_halaman .= "$angka";
		// Link ke halaman berikutnya (Next) dan terakhir (Last)
		if($halaman_aktif < $jmlhalaman){
			$next = $halaman_aktif+1;
			$link_halaman .= " <li><a href=rubrik-halaman-$_GET[id]-$next>Next ></a></li>
			<li class='hidden-xs'><a href=rubrik-halaman-$_GET[id]-$jmlhalaman>Last >></a></li> ";
		}else{
			$link_halaman .= " <li><a href='#'>Next ></a></li> <li class='hidden-xs'><a href='#'> Last >></a></li>";
		}
		return $link_halaman;
	}
}

////////BATAS PAGING TERBARU////////

// class paging untuk halaman administrator
class Paging{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['halaman'])){
	$posisi=0;
	$_GET['halaman']=1;
}
else{
	$posisi = ($_GET['halaman']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3 (untuk admin)
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link ke halaman pertama (first) dan sebelumnya (prev)
if($halaman_aktif > 1){
	$prev = $halaman_aktif-1;
	$link_halaman .= "<li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=1>&laquo;</a></li>
                      <li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=$prev>Sebelumnya</a></li>";
}
else{ 
	$link_halaman .= "<li class='disabled'><a href='#'>&laquo;</a></li><li class='disabled'><a href='#'>Sebelumnya</a></li>";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 3 ? "<li class='disabled'><a href='#'>...</a></li>" : " "); 
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=$i>$i</a></li>";
  }
	  $angka .= "<li class='active'><span>$halaman_aktif <span class='sr-only'>(current)</span></span></li>";
	  
    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=$i>$i</a></li>";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? "<li class='disabled'><a href='#'>...</a></li><li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=$jmlhalaman>$jmlhalaman</a></li>" : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last) 
if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= "<li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=$next>Selanjutnya</a></li> 
                      <li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=$jmlhalaman>&raquo;</a></li> ";
}
else{
	$link_halaman .= "<li class='disabled'><a href='#'>Selanjutnya</a></li><li class='disabled'><a href='#'>&raquo;</a></li>";
}
return $link_halaman;
}
}


// class paging untuk halaman administrator
class PagingFoto{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['halaman'])){
	$posisi=0;
	$_GET['halaman']=1;
}
else{
	$posisi = ($_GET['halaman']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3 (untuk admin)
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link ke halaman pertama (first) dan sebelumnya (prev)
if($halaman_aktif > 1){
	$prev = $halaman_aktif-1;
	$link_halaman .= "<li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&act=tambahfoto&id=$_GET[id]&halaman=1>&laquo;</a></li>
                      <li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&act=tambahfoto&id=$_GET[id]&halaman=$prev>Sebelumnya</a></li>";
}
else{ 
	$link_halaman .= "<li class='disabled'><a href='#'>&laquo;</a></li><li class='disabled'><a href='#'>Sebelumnya</a></li>";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 3 ? "<li class='disabled'><a href='#'>...</a></li>" : " "); 
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&act=tambahfoto&id=$_GET[id]&halaman=$i>$i</a></li>";
  }
	  $angka .= "<li class='active'><span>$halaman_aktif <span class='sr-only'>(current)</span></span></li>";
	  
    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&act=tambahfoto&id=$_GET[id]&halaman=$i>$i</a></li>";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? "<li class='disabled'><a href='#'>...</a></li><li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&act=tambahfoto&id=$_GET[id]&halaman=$jmlhalaman>$jmlhalaman</a></li>" : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last) 
if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= "<li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&act=tambahfoto&id=$_GET[id]&halaman=$next>Selanjutnya</a></li> 
                      <li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&act=tambahfoto&id=$_GET[id]&halaman=$jmlhalaman>&raquo;</a></li> ";
}
else{
	$link_halaman .= "<li class='disabled'><a href='#'>Selanjutnya</a></li><li class='disabled'><a href='#'>&raquo;</a></li>";
}
return $link_halaman;
}
}


// class paging untuk halaman administrator
class PagingVideo{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['halaman'])){
	$posisi=0;
	$_GET['halaman']=1;
}
else{
	$posisi = ($_GET['halaman']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3 (untuk admin)
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link ke halaman pertama (first) dan sebelumnya (prev)
if($halaman_aktif > 1){
	$prev = $halaman_aktif-1;
	$link_halaman .= "<li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&act=tambahvideo&id=$_GET[id]&halaman=1>&laquo;</a></li>
                      <li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&act=tambahvideo&id=$_GET[id]&halaman=$prev>Sebelumnya</a></li>";
}
else{ 
	$link_halaman .= "<li class='disabled'><a href='#'>&laquo;</a></li><li class='disabled'><a href='#'>Sebelumnya</a></li>";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 3 ? "<li class='disabled'><a href='#'>...</a></li>" : " "); 
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&act=tambahvideo&id=$_GET[id]&halaman=$i>$i</a></li>";
  }
	  $angka .= "<li class='active'><span>$halaman_aktif <span class='sr-only'>(current)</span></span></li>";
	  
    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&act=tambahvideo&id=$_GET[id]&halaman=$i>$i</a></li>";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? "<li class='disabled'><a href='#'>...</a></li><li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&act=tambahvideo&id=$_GET[id]&halaman=$jmlhalaman>$jmlhalaman</a></li>" : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last) 
if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= "<li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&act=tambahvideo&id=$_GET[id]&halaman=$next>Selanjutnya</a></li> 
                      <li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&act=tambahvideo&id=$_GET[id]&halaman=$jmlhalaman>&raquo;</a></li> ";
}
else{
	$link_halaman .= "<li class='disabled'><a href='#'>Selanjutnya</a></li><li class='disabled'><a href='#'>&raquo;</a></li>";
}
return $link_halaman;
}
}


// class paging untuk halaman administrator
class PagingAngkatan{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['halaman'])){
	$posisi=0;
	$_GET['halaman']=1;
}
else{
	$posisi = ($_GET['halaman']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3 (untuk admin)
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link ke halaman pertama (first) dan sebelumnya (prev)
if($halaman_aktif > 1){
	$prev = $halaman_aktif-1;
	$link_halaman .= "<li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&act=dataangkatan&halaman=1>&laquo;</a></li>
                      <li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&act=dataangkatan&halaman=$prev>Sebelumnya</a></li>";
}
else{ 
	$link_halaman .= "<li class='disabled'><a href='#'>&laquo;</a></li><li class='disabled'><a href='#'>Sebelumnya</a></li>";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 3 ? "<li class='disabled'><a href='#'>...</a></li>" : " "); 
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&act=dataangkatan&halaman=$i>$i</a></li>";
  }
	  $angka .= "<li class='active'><span>$halaman_aktif <span class='sr-only'>(current)</span></span></li>";
	  
    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&act=dataangkatan&halaman=$i>$i</a></li>";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? "<li class='disabled'><a href='#'>...</a></li><li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&act=dataangkatan&halaman=$jmlhalaman>$jmlhalaman</a></li>" : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last) 
if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= "<li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&act=dataangkatan&halaman=$next>Selanjutnya</a></li> 
                      <li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&act=dataangkatan&halaman=$jmlhalaman>&raquo;</a></li> ";
}
else{
	$link_halaman .= "<li class='disabled'><a href='#'>Selanjutnya</a></li><li class='disabled'><a href='#'>&raquo;</a></li>";
}
return $link_halaman;
}
}

// class paging untuk halaman administrator (pencarian berita)
class Paging9{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['halaman'])){
	$posisi=0;
	$_GET['halaman']=1;
}
else{
	$posisi = ($_GET['halaman']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3 (untuk admin)
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link ke halaman pertama (first) dan sebelumnya (prev)
if($halaman_aktif > 1){
	$prev = $halaman_aktif-1;
	$link_halaman .= "<li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=1&kata=$_GET[kata]>Sebelumnya</a></li>
                      <li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=$prev&kata=$_GET[kata]>Selanjutnya</a></li>";
}
else{ 
	$link_halaman .= "<li class='disabled'><a href='#'>&laquo;</a></li><li class='disabled'><a href='#'>Sebelumnya</a></li>";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 3 ? "<li class='disabled'><a href='#'>...</a></li>" : " "); 
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=$i&kata=$_GET[kata]>$i</a></li>";
  }
	  $angka .= "<li class='active'><span>$halaman_aktif <span class='sr-only'>(current)</span></span></li>";
	  
    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=$i&kata=$_GET[kata]>$i</a></li>";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? "<li class='disabled'><a href='#'>...</a></li><li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=$jmlhalaman&kata=$_GET[kata]>$jmlhalaman</a></li>" : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last) 
if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= "<li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=$next&kata=$_GET[kata]>Selanjutnya</a></li> 
                      <li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=$jmlhalaman&kata=$_GET[kata]>&raquo;</a></li> ";
}
else{
	$link_halaman .= "<li class='disabled'><a href='#'>Selanjutnya</a></li><li class='disabled'><a href='#'>&raquo;</a></li>";
}
return $link_halaman;
}
}

// class paging untuk halaman kategori (menampilkan berita per kategori)
class Paging3{
function cariPosisi($batas){
if(empty($_GET['halkategori'])){
	$posisi=0;
	$_GET['halkategori']=1;
}
else{
	$posisi = ($_GET['halkategori']-1) * $batas;
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
	$link_halaman .= "<a href=halkategori-$_GET[id]-1.html><< First</a> | 
                    <a href=halkategori-$_GET[id]-$prev.html>< Prev</a> | ";
}
else{ 
	$link_halaman .= "<< First | < Prev | ";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 3 ? " ... " : " "); 
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<a href=halkategori-$_GET[id]-$i.html>$i</a> | ";
  }
	  $angka .= " <b>$halaman_aktif</b> | ";
	  
    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<a href=halkategori-$_GET[id]-$i.html>$i</a> | ";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... | <a href=halkategori-$_GET[id]-$jmlhalaman.html>$jmlhalaman</a> | " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last) 
if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= " <a href=halkategori-$_GET[id]-$next.html>Next ></a> | 
                     <a href=halkategori-$_GET[id]-$jmlhalaman.html>Last >></a> ";
}
else{
	$link_halaman .= " Next > | Last >>";
}
return $link_halaman;
}
}


// class paging untuk halaman agenda (menampilkan semua agenda) 
class Paging4{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['halagenda'])){
	$posisi=0;
	$_GET['halagenda']=1;
}
else{
	$posisi = ($_GET['halagenda']-1) * $batas;
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
	$link_halaman .= "<a href=halagenda-1.html><< First</a> | 
                    <a href=halagenda-$prev.html>< Prev</a> | ";
}
else{ 
	$link_halaman .= "<< First | < Prev | ";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 3 ? " ... " : " "); 
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<a href=halagenda-$i.html>$i</a> | ";
  }
	  $angka .= " <b>$halaman_aktif</b> | ";
	  
    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<a href=halagenda-$i.html>$i</a> | ";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... | <a href=halagenda-$jmlhalaman.html>$jmlhalaman</a> | " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last) 
if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= " <a href=halagenda-$next.html>Next ></a> | 
                     <a href=halagenda-$jmlhalaman.html>Last >></a> ";
}
else{
	$link_halaman .= " Next > | Last >>";
}
return $link_halaman;
}
}


// class paging untuk halaman download (menampilkan semua download) 
class Paging5{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['download-halaman'])){
$posisi=0;
$_GET['download-halaman']=1;
}
else{
$posisi = ($_GET['download-halaman']-1) * $batas;
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
$link_halaman .= "<li><a href=download-halaman-1.html class='nextprev'><< First</a></li>
                  <li><a href=download-halaman-$prev.html class='nextprev'>< Prev</a></li>";
}
else{
$link_halaman .= "<li><a href='#' class='nextprev'><< First</a></li><li><a href='#' class='nextprev'>< Prev </a></li> ";
}

// Link halaman 1,2,3, …
$angka = ($halaman_aktif > 3 ? "<li class='disabled'><a href='#'>...</a></li>" : " ");
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
if ($i < 1)
continue;
$angka .= "<li><a href=download-halaman-$i.html>$i</a></li>  ";
}
$angka .= " <li class='active'><a href='#'><b>$halaman_aktif</b></a></li>";

for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
if($i > $jmlhalaman)
break;
$angka .= "<li><a href=download-halaman-$i.html>$i</a></li>  ";
}
$angka .= ($halaman_aktif+2<$jmlhalaman ? "<li class='disabled'><a href='#'>...</a></li><li><a href=download-halaman-$jmlhalaman.html>$jmlhalaman</a></li> " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last)
if($halaman_aktif < $jmlhalaman){
$next = $halaman_aktif+1;
$link_halaman .= " <li><a href=download-halaman-$next.html>Next ></a></li>
<li><a href=download-halaman-$jmlhalaman.html>Last >></a></li> ";
}
else{
$link_halaman .= " <li><a href='#'>Next ></a></li> <li><a href='#'> Last >></a></li>";
}
return $link_halaman;
}
}


// class paging untuk halaman galeri foto
class Paging6{
function cariPosisi($batas){
if(empty($_GET['halgaleri'])){
	$posisi=0;
	$_GET['halgaleri']=1;
}
else{
	$posisi = ($_GET['halgaleri']-1) * $batas;
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
	$link_halaman .= "<a href='halgaleri-$_GET[id]-1.html' class='hidden-xs'><< First</a> | 
                    <a href=halgaleri-$_GET[id]-$prev.html>< Prev</a> | ";
}
else{ 
	$link_halaman .= "<< First | < Prev | ";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 3 ? " ... " : " "); 
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<a href=halgaleri-$_GET[id]-$i.html>$i</a> | ";
  }
	  $angka .= " <b>$halaman_aktif</b> | ";
	  
    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<a href=halgaleri-$_GET[id]-$i.html>$i</a> | ";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... | <a href=halgaleri-$_GET[id]-$jmlhalaman.html>$jmlhalaman</a> | " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last) 
if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= " <a href=halgaleri-$_GET[id]-$next.html>Next ></a> | 
                     <a href='halgaleri-$_GET[id]-$jmlhalaman.html' class='hidden-xs'>Last >></a> ";
}
else{
	$link_halaman .= " Next > | Last >>";
}
return $link_halaman;
}
}


// class paging untuk halaman komentar
class Paging7{
function cariPosisi($batas){
if(empty($_GET['halkomentar'])){
	$posisi=0;
	$_GET['halkomentar']=1;
}
else{
	$posisi = ($_GET['halkomentar']-1) * $batas;
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
	$link_halaman .= "<a href=halkomentar-$_GET[id]-1.html><< First</a> | 
                    <a href=halkomentar-$_GET[id]-$prev.html>< Prev</a> | ";
}
else{ 
	$link_halaman .= "<< First | < Prev | ";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 3 ? " ... " : " "); 
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<a href=halkomentar-$_GET[id]-$i.html>$i</a> | ";
  }
	  $angka .= " <b>$halaman_aktif</b> | ";
	  
    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<a href=halkomentar-$_GET[id]-$i.html>$i</a> | ";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... | <a href=halkomentar-$_GET[id]-$jmlhalaman.html>$jmlhalaman</a> | " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last) 
if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= " <a href=halkomentar-$_GET[id]-$next.html>Next ></a> | 
                     <a href=halkomentar-$_GET[id]-$jmlhalaman.html>Last >></a> ";
}
else{
	$link_halaman .= " Next > | Last >>";
}
return $link_halaman;
}
}

class Paging11{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['haltag'])){
	$posisi=0;
	$_GET['haltag']=1;
}
else{
	$posisi = ($_GET['haltag']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3 (untuk admin)
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link ke halaman pertama (first) dan sebelumnya (prev)
if($halaman_aktif > 1){
	$prev = $halaman_aktif-1;
	$link_halaman .= "<li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&haltag=1>&laquo;</a></li>
                      <li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&haltag=$prev>Sebelumnya</a></li>";
}
else{ 
	$link_halaman .= "<li class='disabled'><a href='#'>&laquo;</a></li><li class='disabled'><a href='#'>Sebelumnya</a></li>";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 3 ? "<li class='disabled'><a href='#'>...</a></li>" : " "); 
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&haltag=$i>$i</a></li>";
  }
	  $angka .= "<li class='active'><span>$halaman_aktif <span class='sr-only'>(current)</span></span></li>";
	  
    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&haltag=$i>$i</a></li>";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? "<li class='disabled'><a href='#'>...</a></li><li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&haltag=$jmlhalaman>$jmlhalaman</a></li>" : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last) 
if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= "<li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&haltag=$next>Selanjutnya</a></li> 
                      <li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&haltag=$jmlhalaman>&raquo;</a></li> ";
}
else{
	$link_halaman .= "<li class='disabled'><a href='#'>Selanjutnya</a></li><li class='disabled'><a href='#'>&raquo;</a></li>";
}
return $link_halaman;
}
}


// class paging untuk halaman administrator (pencarian berita)
class PagingTag{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['halaman'])){
	$posisi=0;
	$_GET['halaman']=1;
}
else{
	$posisi = ($_GET['halaman']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3 (untuk admin)
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link ke halaman pertama (first) dan sebelumnya (prev)
if($halaman_aktif > 1){
	$prev = $halaman_aktif-1;
	$link_halaman .= "<li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=1>Sebelumnya</a></li>
                      <li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=$prev>Selanjutnya</a></li>";
}
else{ 
	$link_halaman .= "<li class='disabled'><a href='#'>&laquo;</a></li><li class='disabled'><a href='#'>Sebelumnya</a></li>";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 3 ? "<li class='disabled'><a href='#'>...</a></li>" : " "); 
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=$i>$i</a></li>";
  }
	  $angka .= "<li class='active'><span>$halaman_aktif <span class='sr-only'>(current)</span></span></li>";
	  
    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=$i>$i</a></li>";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? "<li class='disabled'><a href='#'>...</a></li><li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=$jmlhalaman>$jmlhalaman</a></li>" : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last) 
if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= "<li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=$next>Selanjutnya</a></li> 
                      <li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=$jmlhalaman>&raquo;</a></li> ";
}
else{
	$link_halaman .= "<li class='disabled'><a href='#'>Selanjutnya</a></li><li class='disabled'><a href='#'>&raquo;</a></li>";
}
return $link_halaman;
}
}


// class paging untuk halaman administrator (pencarian berita)
class PagingKat{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['halaman'])){
	$posisi=0;
	$_GET['halaman']=1;
}
else{
	$posisi = ($_GET['halaman']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3 (untuk admin)
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link ke halaman pertama (first) dan sebelumnya (prev)
if($halaman_aktif > 1){
	$prev = $halaman_aktif-1;
	$link_halaman .= "<li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=1>Sebelumnya</a></li>
                      <li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=$prev>Selanjutnya</a></li>";
}
else{ 
	$link_halaman .= "<li class='disabled'><a href='#'>&laquo;</a></li><li class='disabled'><a href='#'>Sebelumnya</a></li>";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 3 ? "<li class='disabled'><a href='#'>...</a></li>" : " "); 
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=$i>$i</a></li>";
  }
	  $angka .= "<li class='active'><span>$halaman_aktif <span class='sr-only'>(current)</span></span></li>";
	  
    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=$i>$i</a></li>";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? "<li class='disabled'><a href='#'>...</a></li><li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=$jmlhalaman>$jmlhalaman</a></li>" : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last) 
if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= "<li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=$next>Selanjutnya</a></li> 
                      <li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=$jmlhalaman>&raquo;</a></li> ";
}
else{
	$link_halaman .= "<li class='disabled'><a href='#'>Selanjutnya</a></li><li class='disabled'><a href='#'>&raquo;</a></li>";
}
return $link_halaman;
}
}


// class paging untuk halaman administrator
class PagingSubmenu{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['halaman'])){
	$posisi=0;
	$_GET['halaman']=1;
}
else{
	$posisi = ($_GET['halaman']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3 (untuk admin)
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link ke halaman pertama (first) dan sebelumnya (prev)
if($halaman_aktif > 1){
	$prev = $halaman_aktif-1;
	$link_halaman .= "<li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&act=submenu&halaman=1>&laquo;</a></li>
                      <li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&act=submenu&halaman=$prev>Sebelumnya</a></li>";
}
else{ 
	$link_halaman .= "<li class='disabled'><a href='#'>&laquo;</a></li><li class='disabled'><a href='#'>Sebelumnya</a></li>";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 3 ? "<li class='disabled'><a href='#'>...</a></li>" : " "); 
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&act=submenu&halaman=$i>$i</a></li>";
  }
	  $angka .= "<li class='active'><span>$halaman_aktif <span class='sr-only'>(current)</span></span></li>";
	  
    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&act=submenu&halaman=$i>$i</a></li>";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? "<li class='disabled'><a href='#'>...</a></li><li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&act=submenu&halaman=$jmlhalaman>$jmlhalaman</a></li>" : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last) 
if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= "<li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&act=submenu&halaman=$next>Selanjutnya</a></li> 
                      <li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&act=submenu&halaman=$jmlhalaman>&raquo;</a></li> ";
}
else{
	$link_halaman .= "<li class='disabled'><a href='#'>Selanjutnya</a></li><li class='disabled'><a href='#'>&raquo;</a></li>";
}
return $link_halaman;
}
}


// class paging untuk halaman administrator
class PagingSubmenuDua{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['halaman'])){
	$posisi=0;
	$_GET['halaman']=1;
}
else{
	$posisi = ($_GET['halaman']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3 (untuk admin)
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link ke halaman pertama (first) dan sebelumnya (prev)
if($halaman_aktif > 1){
	$prev = $halaman_aktif-1;
	$link_halaman .= "<li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&act=submenudua&halaman=1>&laquo;</a></li>
                      <li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&act=submenudua&halaman=$prev>Sebelumnya</a></li>";
}
else{ 
	$link_halaman .= "<li class='disabled'><a href='#'>&laquo;</a></li><li class='disabled'><a href='#'>Sebelumnya</a></li>";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 3 ? "<li class='disabled'><a href='#'>...</a></li>" : " "); 
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&act=submenudua&halaman=$i>$i</a></li>";
  }
	  $angka .= "<li class='active'><span>$halaman_aktif <span class='sr-only'>(current)</span></span></li>";
	  
    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&act=submenudua&halaman=$i>$i</a></li>";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? "<li class='disabled'><a href='#'>...</a></li><li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&act=submenudua&halaman=$jmlhalaman>$jmlhalaman</a></li>" : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last) 
if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= "<li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&act=submenudua&halaman=$next>Selanjutnya</a></li> 
                      <li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&act=submenudua&halaman=$jmlhalaman>&raquo;</a></li> ";
}
else{
	$link_halaman .= "<li class='disabled'><a href='#'>Selanjutnya</a></li><li class='disabled'><a href='#'>&raquo;</a></li>";
}
return $link_halaman;
}
}


// class paging untuk halaman administrator
class PagingSubmenuTiga{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['halaman'])){
	$posisi=0;
	$_GET['halaman']=1;
}
else{
	$posisi = ($_GET['halaman']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3 (untuk admin)
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link ke halaman pertama (first) dan sebelumnya (prev)
if($halaman_aktif > 1){
	$prev = $halaman_aktif-1;
	$link_halaman .= "<li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&act=submenutiga&halaman=1>&laquo;</a></li>
                      <li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&act=submenutiga&halaman=$prev>Sebelumnya</a></li>";
}
else{ 
	$link_halaman .= "<li class='disabled'><a href='#'>&laquo;</a></li><li class='disabled'><a href='#'>Sebelumnya</a></li>";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 3 ? "<li class='disabled'><a href='#'>...</a></li>" : " "); 
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&act=submenutiga&halaman=$i>$i</a></li>";
  }
	  $angka .= "<li class='active'><span>$halaman_aktif <span class='sr-only'>(current)</span></span></li>";
	  
    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&act=submenutiga&halaman=$i>$i</a></li>";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? "<li class='disabled'><a href='#'>...</a></li><li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&act=submenutiga&halaman=$jmlhalaman>$jmlhalaman</a></li>" : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last) 
if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= "<li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&act=submenutiga&halaman=$next>Selanjutnya</a></li> 
                      <li><a href=$_SERVER[PHP_SELF]?module=$_GET[module]&act=submenutiga&halaman=$jmlhalaman>&raquo;</a></li> ";
}
else{
	$link_halaman .= "<li class='disabled'><a href='#'>Selanjutnya</a></li><li class='disabled'><a href='#'>&raquo;</a></li>";
}
return $link_halaman;
}
}


// class paging untuk halaman detail playlist
class PagingDetailAlbumFoto{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['halaman-galeri'])){
$posisi=0;
$_GET['halaman-galeri']=1;
}
else{
$posisi = ($_GET['halaman-galeri']-1) * $batas;
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
$link_halaman .= "<li class='hidden-xs'><a href='halaman-galeri-$_GET[id]-dokumentasi-foto-1' class='nextprev'><< First</a></li>
                  <li><a href=halaman-galeri-$_GET[id]-dokumentasi-foto-$prev class='nextprev'>< Prev</a></li>";
}
else{
$link_halaman .= "<li class='hidden-xs'><a href='#' class='disabled'><< First</a></li><li><a href='#' class='nextprev'>< Prev </a></li> ";
}

// Link halaman 1,2,3, …
$angka = ($halaman_aktif > 3 ? "<li class='disabled'><a href='#'>...</a></li>" : " ");
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
if ($i < 1)
continue;
$angka .= "<li><a href=halaman-galeri-$_GET[id]-dokumentasi-foto-$i>$i</a></li>  ";
}
$angka .= " <li class='active'><a href='#'><b>$halaman_aktif</b></a></li>";

for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
if($i > $jmlhalaman)
break;
$angka .= "<li><a href=halaman-galeri-$_GET[id]-dokumentasi-foto-$i>$i</a></li>  ";
}
$angka .= ($halaman_aktif+2<$jmlhalaman ? "<li class='disabled'><a href='#'>...</a></li><li><a href=halaman-galeri-$_GET[id]-dokumentasi-foto-$jmlhalaman>$jmlhalaman</a></li> " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last)
if($halaman_aktif < $jmlhalaman){
$next = $halaman_aktif+1;
$link_halaman .= " <li><a href=halaman-galeri-$_GET[id]-dokumentasi-foto-$next>Next ></a></li>
<li class='hidden-xs'><a href='halaman-galeri-$_GET[id]-dokumentasi-foto-$jmlhalaman'>Last >></a></li> ";
}
else{
$link_halaman .= " <li><a href='#'>Next ></a></li> <li class='hidden-xs'><a href='#'> Last >></a></li>";
}
return $link_halaman;
}
}


class PagingAlbumFoto{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['dokumentasi-album-foto-halaman'])){
$posisi=0;
$_GET['dokumentasi-album-foto-halaman']=1;
}
else{
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
$link_halaman .= "<li class='hidden-xs'><a href=dokumentasi-album-foto-halaman-1 class='nextprev'><< First</a></li>
                  <li><a href=dokumentasi-album-foto-halaman-$prev class='nextprev'>< Prev</a></li>";
}
else{
$link_halaman .= "<li class='hidden-xs'><a href='#' class='nextprev'><< First</a></li><li><a href='#' class='nextprev'>< Prev </a></li> ";
}

// Link halaman 1,2,3, …
$angka = ($halaman_aktif > 3 ? "<li class='disabled'><a href='#'>...</a></li>" : " ");
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
if ($i < 1)
continue;
$angka .= "<li><a href=dokumentasi-album-foto-halaman-$i>$i</a></li>  ";
}
$angka .= " <li class='active'><a href='#'><b>$halaman_aktif</b></a></li>";

for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
if($i > $jmlhalaman)
break;
$angka .= "<li><a href=dokumentasi-album-foto-halaman-$i>$i</a></li>  ";
}
$angka .= ($halaman_aktif+2<$jmlhalaman ? "<li class='disabled'><a href='#'>...</a></li>
<li><a href=dokumentasi-album-foto-halaman-$jmlhalaman>$jmlhalaman</a></li> " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last)
if($halaman_aktif < $jmlhalaman){
$next = $halaman_aktif+1;
$link_halaman .= " <li><a href=dokumentasi-album-foto-halaman-$next>Next ></a></li>
<li class='hidden-xs'><a href=dokumentasi-album-foto-halaman-$jmlhalaman>Last >></a></li> ";
}
else{
$link_halaman .= " <li><a href='#'>Next ></a></li> <li class='hidden-xs'><a href='#'> Last >></a></li>";
}
return $link_halaman;
}
}


// class paging untuk halaman berita (menampilkan semua berita)
class PagingMapala{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['halaman-mapala'])){
$posisi=0;
$_GET['halaman-mapala']=1;
}
else{
$posisi = ($_GET['halaman-mapala']-1) * $batas;
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
$link_halaman .= "<li><a href=halaman-mapala-1.html class='nextprev'><< First</a></li>
                  <li><a href=halaman-mapala-$prev.html class='nextprev'>< Prev</a></li>";
}
else{
$link_halaman .= "<li><a href='#' class='nextprev'><< First</a></li><li><a href='#' class='nextprev'>< Prev </a></li> ";
}

// Link halaman 1,2,3, …
$angka = ($halaman_aktif > 3 ? "<span class='nextprev'>...</span>" : " ");
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
if ($i < 1)
continue;
$angka .= "<li><a href=halaman-mapala-$i.html>$i</a></li>  ";
}
$angka .= " <li class='active'><a href='#'><b>$halaman_aktif</b></a></li>";

for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
if($i > $jmlhalaman)
break;
$angka .= "<li><a href=halaman-mapala-$i.html>$i</a></li>  ";
}
$angka .= ($halaman_aktif+2<$jmlhalaman ? "<span class='nextprev'>...</span><li><a href=halaman-mapala-$jmlhalaman.html>$jmlhalaman</a></li> " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last)
if($halaman_aktif < $jmlhalaman){
$next = $halaman_aktif+1;
$link_halaman .= " <li><a href=halaman-mapala-$next.html>Next ></a></li>
<li><a href=halaman-mapala-$jmlhalaman.html>Last >></a></li> ";
}
else{
$link_halaman .= " <li><a href='#'>Next ></a></li> <li><a href='#'> Last >></a></li>";
}
return $link_halaman;
}
}


// class paging untuk halaman berita (menampilkan semua berita)
class PagingGunung{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['halaman-gunung'])){
$posisi=0;
$_GET['halaman-gunung']=1;
}
else{
$posisi = ($_GET['halaman-gunung']-1) * $batas;
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
$link_halaman .= "<li><a href=halaman-gunung-1.html class='nextprev'><< First</a></li>
                  <li><a href=halaman-gunung-$prev.html class='nextprev'>< Prev</a></li>";
}
else{
$link_halaman .= "<li><a href='#' class='nextprev'><< First</a></li><li><a href='#' class='nextprev'>< Prev </a></li> ";
}

// Link halaman 1,2,3, …
$angka = ($halaman_aktif > 3 ? "<span class='nextprev'>...</span>" : " ");
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
if ($i < 1)
continue;
$angka .= "<li><a href=halaman-gunung-$i.html>$i</a></li>  ";
}
$angka .= " <li class='active'><a href='#'><b>$halaman_aktif</b></a></li>";

for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
if($i > $jmlhalaman)
break;
$angka .= "<li><a href=halaman-gunung-$i.html>$i</a></li>  ";
}
$angka .= ($halaman_aktif+2<$jmlhalaman ? "<span class='nextprev'>...</span><li><a href=halaman-gunung-$jmlhalaman.html>$jmlhalaman</a></li> " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last)
if($halaman_aktif < $jmlhalaman){
$next = $halaman_aktif+1;
$link_halaman .= " <li><a href=halaman-gunung-$next.html>Next ></a></li>
<li><a href=halaman-gunung-$jmlhalaman.html>Last >></a></li> ";
}
else{
$link_halaman .= " <li><a href='#'>Next ></a></li> <li><a href='#'> Last >></a></li>";
}
return $link_halaman;
}
}


// class paging untuk halaman berita (menampilkan semua berita)
class PagingGua{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['halaman-gua'])){
$posisi=0;
$_GET['halaman-gua']=1;
}
else{
$posisi = ($_GET['halaman-gua']-1) * $batas;
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
$link_halaman .= "<li><a href=halaman-gua-1.html class='nextprev'><< First</a></li>
                  <li><a href=halaman-gua-$prev.html class='nextprev'>< Prev</a></li>";
}
else{
$link_halaman .= "<li><a href='#' class='nextprev'><< First</a></li><li><a href='#' class='nextprev'>< Prev </a></li> ";
}

// Link halaman 1,2,3, …
$angka = ($halaman_aktif > 3 ? "<span class='nextprev'>...</span>" : " ");
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
if ($i < 1)
continue;
$angka .= "<li><a href=halaman-gua-$i.html>$i</a></li>  ";
}
$angka .= " <li class='active'><a href='#'><b>$halaman_aktif</b></a></li>";

for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
if($i > $jmlhalaman)
break;
$angka .= "<li><a href=halaman-gua-$i.html>$i</a></li>  ";
}
$angka .= ($halaman_aktif+2<$jmlhalaman ? "<span class='nextprev'>...</span><li><a href=halaman-gua-$jmlhalaman.html>$jmlhalaman</a></li> " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last)
if($halaman_aktif < $jmlhalaman){
$next = $halaman_aktif+1;
$link_halaman .= " <li><a href=halaman-gua-$next.html>Next ></a></li>
<li><a href=halaman-gua-$jmlhalaman.html>Last >></a></li> ";
}
else{
$link_halaman .= " <li><a href='#'>Next ></a></li> <li><a href='#'> Last >></a></li>";
}
return $link_halaman;
}
}


// class paging untuk halaman berita (menampilkan semua berita)
class PagingPendakian{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['halaman-pendakian'])){
$posisi=0;
$_GET['halaman-pendakian']=1;
}
else{
$posisi = ($_GET['halaman-pendakian']-1) * $batas;
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
$link_halaman .= "<li><a href=halaman-pendakian-1.html class='nextprev'><< First</a></li>
                  <li><a href=halaman-pendakian-$prev.html class='nextprev'>< Prev</a></li>";
}
else{
$link_halaman .= "<li><a href='#' class='nextprev'><< First</a></li><li><a href='#' class='nextprev'>< Prev </a></li> ";
}

// Link halaman 1,2,3, …
$angka = ($halaman_aktif > 3 ? "<span class='nextprev'>...</span>" : " ");
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
if ($i < 1)
continue;
$angka .= "<li><a href=halaman-pendakian-$i.html>$i</a></li>  ";
}
$angka .= " <li class='active'><a href='#'><b>$halaman_aktif</b></a></li>";

for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
if($i > $jmlhalaman)
break;
$angka .= "<li><a href=halaman-pendakian-$i.html>$i</a></li>  ";
}
$angka .= ($halaman_aktif+2<$jmlhalaman ? "<span class='nextprev'>...</span><li><a href=halaman-pendakian-$jmlhalaman.html>$jmlhalaman</a></li> " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last)
if($halaman_aktif < $jmlhalaman){
$next = $halaman_aktif+1;
$link_halaman .= " <li><a href=halaman-pendakian-$next.html>Next ></a></li>
<li><a href=halaman-pendakian-$jmlhalaman.html>Last >></a></li> ";
}
else{
$link_halaman .= " <li><a href='#'>Next ></a></li> <li><a href='#'> Last >></a></li>";
}
return $link_halaman;
}
}

// class paging untuk halaman berita (menampilkan semua berita)
class PagingPemanjatan{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['halaman-pemanjatan'])){
$posisi=0;
$_GET['halaman-pemanjatan']=1;
}
else{
$posisi = ($_GET['halaman-pemanjatan']-1) * $batas;
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
$link_halaman .= "<li><a href=halaman-pemanjatan-1.html class='nextprev'><< First</a></li>
                  <li><a href=halaman-pemanjatan-$prev.html class='nextprev'>< Prev</a></li>";
}
else{
$link_halaman .= "<li><a href='#' class='nextprev'><< First</a></li><li><a href='#' class='nextprev'>< Prev </a></li> ";
}

// Link halaman 1,2,3, …
$angka = ($halaman_aktif > 3 ? "<span class='nextprev'>...</span>" : " ");
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
if ($i < 1)
continue;
$angka .= "<li><a href=halaman-pemanjatan-$i.html>$i</a></li>  ";
}
$angka .= " <li class='active'><a href='#'><b>$halaman_aktif</b></a></li>";

for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
if($i > $jmlhalaman)
break;
$angka .= "<li><a href=halaman-pemanjatan-$i.html>$i</a></li>  ";
}
$angka .= ($halaman_aktif+2<$jmlhalaman ? "<span class='nextprev'>...</span><li><a href=halaman-pemanjatan-$jmlhalaman.html>$jmlhalaman</a></li> " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last)
if($halaman_aktif < $jmlhalaman){
$next = $halaman_aktif+1;
$link_halaman .= " <li><a href=halaman-pemanjatan-$next.html>Next ></a></li>
<li><a href=halaman-pemanjatan-$jmlhalaman.html>Last >></a></li> ";
}
else{
$link_halaman .= " <li><a href='#'>Next ></a></li> <li><a href='#'> Last >></a></li>";
}
return $link_halaman;
}
}


// class paging untuk halaman berita (menampilkan semua berita)
class PagingRafting{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['halaman-rafting'])){
$posisi=0;
$_GET['halaman-rafting']=1;
}
else{
$posisi = ($_GET['halaman-rafting']-1) * $batas;
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
$link_halaman .= "<li><a href=halaman-rafting-1.html class='nextprev'><< First</a></li>
                  <li><a href=halaman-rafting-$prev.html class='nextprev'>< Prev</a></li>";
}
else{
$link_halaman .= "<li><a href='#' class='nextprev'><< First</a></li><li><a href='#' class='nextprev'>< Prev </a></li> ";
}

// Link halaman 1,2,3, …
$angka = ($halaman_aktif > 3 ? "<span class='nextprev'>...</span>" : " ");
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
if ($i < 1)
continue;
$angka .= "<li><a href=halaman-rafting-$i.html>$i</a></li>  ";
}
$angka .= " <li class='active'><a href='#'><b>$halaman_aktif</b></a></li>";

for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
if($i > $jmlhalaman)
break;
$angka .= "<li><a href=halaman-rafting-$i.html>$i</a></li>  ";
}
$angka .= ($halaman_aktif+2<$jmlhalaman ? "<span class='nextprev'>...</span><li><a href=halaman-rafting-$jmlhalaman.html>$jmlhalaman</a></li> " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last)
if($halaman_aktif < $jmlhalaman){
$next = $halaman_aktif+1;
$link_halaman .= " <li><a href=halaman-rafting-$next.html>Next ></a></li>
<li><a href=halaman-rafting-$jmlhalaman.html>Last >></a></li> ";
}
else{
$link_halaman .= " <li><a href='#'>Next ></a></li> <li><a href='#'> Last >></a></li>";
}
return $link_halaman;
}
}

// class paging untuk halaman berita (menampilkan semua berita)
class PagingKegiatan{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['arsip-kegiatan-mahapeka'])){
$posisi=0;
$_GET['arsip-kegiatan-mahapeka']=1;
}
else{
$posisi = ($_GET['arsip-kegiatan-mahapeka']-1) * $batas;
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
$link_halaman .= "<li><a href=arsip-kegiatan-mahapeka-1.html class='nextprev'><< First</a></li>
                  <li><a href=arsip-kegiatan-mahapeka-$prev.html class='nextprev'>< Prev</a></li>";
}
else{
$link_halaman .= "<li><a href='#' class='nextprev'><< First</a></li><li><a href='#' class='nextprev'>< Prev </a></li> ";
}

// Link halaman 1,2,3, …
$angka = ($halaman_aktif > 3 ? "<span class='nextprev'>...</span>" : " ");
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
if ($i < 1)
continue;
$angka .= "<li><a href=arsip-kegiatan-mahapeka-$i.html>$i</a></li>  ";
}
$angka .= " <li class='active'><a href='#'><b>$halaman_aktif</b></a></li>";

for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
if($i > $jmlhalaman)
break;
$angka .= "<li><a href=arsip-kegiatan-mahapeka-$i.html>$i</a></li>  ";
}
$angka .= ($halaman_aktif+2<$jmlhalaman ? "<span class='nextprev'>...</span><li><a href=arsip-kegiatan-mahapeka-$jmlhalaman.html>$jmlhalaman</a></li> " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last)
if($halaman_aktif < $jmlhalaman){
$next = $halaman_aktif+1;
$link_halaman .= " <li><a href=arsip-kegiatan-mahapeka-$next.html>Next ></a></li>
<li><a href=arsip-kegiatan-mahapeka-$jmlhalaman.html>Last >></a></li> ";
}
else{
$link_halaman .= " <li><a href='#'>Next ></a></li> <li><a href='#'> Last >></a></li>";
}
return $link_halaman;
}
}


// class paging untuk halaman berita (menampilkan semua berita)
class PagingPengumuman{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['arsip-pengumuman-mahapeka'])){
$posisi=0;
$_GET['arsip-pengumuman-mahapeka']=1;
}
else{
$posisi = ($_GET['arsip-pengumuman-mahapeka']-1) * $batas;
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
$link_halaman .= "<li><a href=arsip-pengumuman-mahapeka-1.html class='nextprev'><< First</a></li>
                  <li><a href=arsip-pengumuman-mahapeka-$prev.html class='nextprev'>< Prev</a></li>";
}
else{
$link_halaman .= "<li><a href='#' class='nextprev'><< First</a></li><li><a href='#' class='nextprev'>< Prev </a></li> ";
}

// Link halaman 1,2,3, …
$angka = ($halaman_aktif > 3 ? "<span class='nextprev'>...</span>" : " ");
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
if ($i < 1)
continue;
$angka .= "<li><a href=arsip-pengumuman-mahapeka-$i.html>$i</a></li>  ";
}
$angka .= " <li class='active'><a href='#'><b>$halaman_aktif</b></a></li>";

for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
if($i > $jmlhalaman)
break;
$angka .= "<li><a href=arsip-pengumuman-mahapeka-$i.html>$i</a></li>  ";
}
$angka .= ($halaman_aktif+2<$jmlhalaman ? "<span class='nextprev'>...</span><li><a href=arsip-pengumuman-mahapeka-$jmlhalaman.html>$jmlhalaman</a></li> " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last)
if($halaman_aktif < $jmlhalaman){
$next = $halaman_aktif+1;
$link_halaman .= " <li><a href=arsip-pengumuman-mahapeka-$next.html>Next ></a></li>
<li><a href=arsip-pengumuman-mahapeka-$jmlhalaman.html>Last >></a></li> ";
}
else{
$link_halaman .= " <li><a href='#'>Next ></a></li> <li><a href='#'> Last >></a></li>";
}
return $link_halaman;
}
}


// class paging untuk halaman berita (menampilkan semua berita)
class PagingNews{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['arsip-berita-halaman'])){
$posisi=0;
$_GET['arsip-berita-halaman']=1;
}
else{
$posisi = ($_GET['arsip-berita-halaman']-1) * $batas;
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
$link_halaman .= "<li><a href=arsip-berita-halaman-1.html class='nextprev'><< First</a></li>
                  <li><a href=arsip-berita-halaman-$prev.html class='nextprev'>< Prev</a></li>";
}
else{
$link_halaman .= "<li><a href='#' class='nextprev'><< First</a></li><li><a href='#' class='nextprev'>< Prev </a></li> ";
}

// Link halaman 1,2,3, …
$angka = ($halaman_aktif > 3 ? "<li class='disabled'><a href='#'>...</a></li>" : " ");
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
if ($i < 1)
continue;
$angka .= "<li><a href=arsip-berita-halaman-$i.html>$i</a></li>  ";
}
$angka .= " <li class='active'><a href='#'><b>$halaman_aktif</b></a></li>";

for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
if($i > $jmlhalaman)
break;
$angka .= "<li><a href=arsip-berita-halaman-$i.html>$i</a></li>  ";
}
$angka .= ($halaman_aktif+2<$jmlhalaman ? "<li class='disabled'><a href='#'>...</a></li><li><a href=arsip-berita-halaman-$jmlhalaman.html>$jmlhalaman</a></li> " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last)
if($halaman_aktif < $jmlhalaman){
$next = $halaman_aktif+1;
$link_halaman .= " <li><a href=arsip-berita-halaman-$next.html>Next ></a></li>
<li><a href=arsip-berita-halaman-$jmlhalaman.html>Last >></a></li> ";
}
else{
$link_halaman .= " <li><a href='#'>Next ></a></li> <li><a href='#'> Last >></a></li>";
}
return $link_halaman;
}
}


// class paging untuk halaman berita (menampilkan semua berita)
class PagingArsip{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['halarsip'])){
$posisi=0;
$_GET['halarsip']=1;
}
else{
$posisi = ($_GET['halarsip']-1) * $batas;
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
$link_halaman .= "<li><a href=halarsip-1.html class='nextprev'><< First</a></li>
                  <li><a href=halarsip-$prev.html class='nextprev'>< Prev</a></li>";
}
else{
$link_halaman .= "<li><a href='#' class='nextprev'><< First</a></li><li><a href='#' class='nextprev'>< Prev </a></li> ";
}

// Link halaman 1,2,3, …
$angka = ($halaman_aktif > 3 ? "<li class='disabled'><a href='#'>...</a></li>" : " ");
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
if ($i < 1)
continue;
$angka .= "<li><a href=halarsip-$i.html>$i</a></li>  ";
}
$angka .= " <li class='active'><a href='#'><b>$halaman_aktif</b></a></li>";

for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
if($i > $jmlhalaman)
break;
$angka .= "<li><a href=halarsip-$i.html>$i</a></li>  ";
}
$angka .= ($halaman_aktif+2<$jmlhalaman ? "<li class='disabled'><a href='#'>...</a></li><li><a href=halarsip-$jmlhalaman.html>$jmlhalaman</a></li> " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last)
if($halaman_aktif < $jmlhalaman){
$next = $halaman_aktif+1;
$link_halaman .= " <li><a href=halarsip-$next.html>Next ></a></li>
<li><a href=halarsip-$jmlhalaman.html>Last >></a></li> ";
}
else{
$link_halaman .= " <li><a href='#'>Next ></a></li> <li><a href='#'> Last >></a></li>";
}
return $link_halaman;
}
}

// class paging untuk halaman berita (menampilkan semua berita)
class PagingBlog{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['arsip-blog-halaman'])){
$posisi=0;
$_GET['arsip-blog-halaman']=1;
}
else{
$posisi = ($_GET['arsip-blog-halaman']-1) * $batas;
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
$link_halaman .= "<li><a href=arsip-blog-halaman-1.html class='nextprev'><< First</a></li>
                  <li><a href=arsip-blog-halaman-$prev.html class='nextprev'>< Prev</a></li>";
}
else{
$link_halaman .= "<li><a href='#' class='nextprev'><< First</a></li><li><a href='#' class='nextprev'>< Prev </a></li> ";
}

// Link halaman 1,2,3, …
$angka = ($halaman_aktif > 3 ? "<li class='disabled'><a href='#'>...</a></li>" : " ");
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
if ($i < 1)
continue;
$angka .= "<li><a href=arsip-blog-halaman-$i.html>$i</a></li>  ";
}
$angka .= " <li class='active'><a href='#'><b>$halaman_aktif</b></a></li>";

for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
if($i > $jmlhalaman)
break;
$angka .= "<li><a href=arsip-blog-halaman-$i.html>$i</a></li>  ";
}
$angka .= ($halaman_aktif+2<$jmlhalaman ? "<li class='disabled'><a href='#'>...</a></li><li><a href=arsip-blog-halaman-$jmlhalaman.html>$jmlhalaman</a></li> " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last)
if($halaman_aktif < $jmlhalaman){
$next = $halaman_aktif+1;
$link_halaman .= " <li><a href=arsip-blog-halaman-$next.html>Next ></a></li>
<li><a href=arsip-blog-halaman-$jmlhalaman.html>Last >></a></li> ";
}
else{
$link_halaman .= " <li><a href='#'>Next ></a></li> <li><a href='#'> Last >></a></li>";
}
return $link_halaman;
}
}

// class paging untuk halaman semua playlist
class PagingFilm{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['dokumentasi-album-video-halaman'])){
$posisi=0;
$_GET['dokumentasi-album-video-halaman']=1;
}
else{
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
$link_halaman .= "<li class='hidden-xs'><a href=dokumentasi-album-video-halaman-1.html class='nextprev'><< First</a></li>
                  <li><a href=dokumentasi-album-video-halaman-$prev.html class='nextprev'>< Prev</a></li>";
}
else{
$link_halaman .= "<li class='hidden-xs'><a href='#' class='nextprev'><< First</a></li><li><a href='#' class='nextprev'>< Prev </a></li> ";
}

// Link halaman 1,2,3, …
$angka = ($halaman_aktif > 3 ? "<li class='disabled'><a href='#'>...</a></li>" : " ");
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
if ($i < 1)
continue;
$angka .= "<li><a href=dokumentasi-album-video-halaman-$i.html>$i</a></li>  ";
}
$angka .= " <li class='active'><a href='#'><b>$halaman_aktif</b></a></li>";

for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
if($i > $jmlhalaman)
break;
$angka .= "<li><a href=dokumentasi-album-video-halaman-$i.html>$i</a></li>  ";
}
$angka .= ($halaman_aktif+2<$jmlhalaman ? "<li class='disabled'><a href='#'>...</a></li><li><a href=dokumentasi-album-video-halaman-$jmlhalaman.html>$jmlhalaman</a></li> " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last)
if($halaman_aktif < $jmlhalaman){
$next = $halaman_aktif+1;
$link_halaman .= " <li><a href=dokumentasi-album-video-halaman-$next.html>Next ></a></li>
<li class='hidden-xs'><a href=dokumentasi-album-video-halaman-$jmlhalaman.html>Last >></a></li> ";
}
else{
$link_halaman .= " <li><a href='#'>Next ></a></li> <li class='hidden-xs'><a href='#'> Last >></a></li>";
}
return $link_halaman;
}
}


// class paging untuk halaman detail playlist
class PagingDetailFilm{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['playlist-halaman'])){
$posisi=0;
$_GET['playlist-halaman']=1;
}
else{
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
$link_halaman .= "<li class='hidden-xs'><a href=playlist-halaman-$_GET[id]-1.html class='nextprev'><< First</a></li>
                  <li><a href=playlist-halaman-$_GET[id]-$prev.html class='nextprev'>< Prev</a></li>";
}
else{
$link_halaman .= "<li class='hidden-xs'><a href='#' class='nextprev'><< First</a></li><li><a href='#' class='nextprev'>< Prev </a></li> ";
}

// Link halaman 1,2,3, …
$angka = ($halaman_aktif > 3 ? "<span class='nextprev'>...</span>" : " ");
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
if ($i < 1)
continue;
$angka .= "<li><a href=playlist-halaman-$_GET[id]-$i.html>$i</a></li>  ";
}
$angka .= " <li class='active'><a href='#'><b>$halaman_aktif</b></a></li>";

for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
if($i > $jmlhalaman)
break;
$angka .= "<li><a href=playlist-halaman-$_GET[id]-$i.html>$i</a></li>  ";
}
$angka .= ($halaman_aktif+2<$jmlhalaman ? "<li class='nextprev'>...</li><li><a href=playlist-halaman-$_GET[id]-$jmlhalaman.html>$jmlhalaman</a></li> " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last)
if($halaman_aktif < $jmlhalaman){
$next = $halaman_aktif+1;
$link_halaman .= " <li><a href=playlist-halaman-$_GET[id]-$next.html>Next ></a></li>
<li class='hidden-xs'><a href=playlist-halaman-$_GET[id]-$jmlhalaman.html>Last >></a></li> ";
}
else{
$link_halaman .= " <li><a href='#'>Next ></a></li> <li class='hidden-xs'><a href='#'> Last >></a></li>";
}
return $link_halaman;
}
}

// class paging untuk halaman berita (menampilkan semua berita)
class PagingTestimoni{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['testimoni-halaman'])){
$posisi=0;
$_GET['testimoni-halaman']=1;
}
else{
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
$link_halaman .= "<li><a href=testimoni-halaman-1.html class='nextprev'><< First</a></li>
                  <li><a href=testimoni-halaman-$prev.html class='nextprev'>< Prev</a></li>";
}
else{
$link_halaman .= "<li><a href='#' class='nextprev'><< First</a></li><li><a href='#' class='nextprev'>< Prev </a></li> ";
}

// Link halaman 1,2,3, …
$angka = ($halaman_aktif > 3 ? "<li class='disabled'><a href='#'>...</a></li>" : " ");
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
if ($i < 1)
continue;
$angka .= "<li><a href=testimoni-halaman-$i.html>$i</a></li>  ";
}
$angka .= " <li class='active'><a href='#'><b>$halaman_aktif</b></a></li>";

for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
if($i > $jmlhalaman)
break;
$angka .= "<li><a href=testimoni-halaman-$i.html>$i</a></li>  ";
}
$angka .= ($halaman_aktif+2<$jmlhalaman ? "<li class='disabled'><a href='#'>...</a></li><li><a href=testimoni-halaman-$jmlhalaman.html>$jmlhalaman</a></li> " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last)
if($halaman_aktif < $jmlhalaman){
$next = $halaman_aktif+1;
$link_halaman .= " <li><a href=testimoni-halaman-$next.html>Next ></a></li>
<li><a href=testimoni-halaman-$jmlhalaman.html>Last >></a></li> ";
}
else{
$link_halaman .= " <li><a href='#'>Next ></a></li> <li><a href='#'> Last >></a></li>";
}
return $link_halaman;
}
}

// class paging untuk halaman berita (menampilkan semua berita)
class PagingTag2{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['haltag'])){
$posisi=0;
$_GET['haltag']=1;
}
else{
$posisi = ($_GET['haltag']-1) * $batas;
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
$link_halaman .= "<li><a href=haltag-$_GET[id]-1.html class='nextprev'><< First</a></li>
                  <li><a href=haltag-$_GET[id]-$prev.html class='nextprev'>< Prev</a></li>";
}
else{
$link_halaman .= "<li><a href='#' class='nextprev'><< First</a></li><li><a href='#' class='nextprev'>< Prev </a></li> ";
}

// Link halaman 1,2,3, …
$angka = ($halaman_aktif > 3 ? "<li class='disabled'><a href='#'>...</a></li>" : " ");
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
if ($i < 1)
continue;
$angka .= "<li><a href=haltag-$_GET[id]-$i.html>$i</a></li>  ";
}
$angka .= " <li class='active'><a href='#'><b>$halaman_aktif</b></a></li>";

for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
if($i > $jmlhalaman)
break;
$angka .= "<li><a href=haltag-$_GET[id]-$i.html>$i</a></li>  ";
}
$angka .= ($halaman_aktif+2<$jmlhalaman ? "<li class='disabled'><a href='#'>...</a></li><li><a href=haltag-$_GET[id]-$jmlhalaman.html>$jmlhalaman</a></li> " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last)
if($halaman_aktif < $jmlhalaman){
$next = $halaman_aktif+1;
$link_halaman .= " <li><a href=haltag-$_GET[id]-$next.html>Next ></a></li>
<li><a href=haltag-$_GET[id]-$jmlhalaman.html>Last >></a></li> ";
}
else{
$link_halaman .= " <li><a href='#'>Next ></a></li> <li><a href='#'> Last >></a></li>";
}
return $link_halaman;
}
}


// class paging untuk bukutamu
class PagingBukutamu{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['buku-tamu-halaman'])){
$posisi=0;
$_GET['buku-tamu-halaman']=1;
}
else{
$posisi = ($_GET['buku-tamu-halaman']-1) * $batas;
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
$link_halaman .= "<li class='hidden-xs'><a href=buku-tamu-halaman-1.html class='nextprev'><< First</a></li>
                  <li><a href=buku-tamu-halaman-$prev.html class='nextprev'>< Prev</a></li>";
}
else{
$link_halaman .= "<li class='hidden-xs'><a href='#' class='nextprev'><< First</a></li><li><a href='#' class='nextprev'>< Prev </a></li> ";
}

// Link halaman 1,2,3, …
$angka = ($halaman_aktif > 3 ? "<li class='disabled'><a href='#'>...</a></li>" : " ");
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
if ($i < 1)
continue;
$angka .= "<li><a href=buku-tamu-halaman-$i.html>$i</a></li>  ";
}
$angka .= " <li class='active'><a href='#'><b>$halaman_aktif</b></a></li>";

for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
if($i > $jmlhalaman)
break;
$angka .= "<li><a href=buku-tamu-halaman-$i.html>$i</a></li>  ";
}
$angka .= ($halaman_aktif+2<$jmlhalaman ? "<li class='disabled'><a href='#'>...</a></li><li><a href=buku-tamu-halaman-$jmlhalaman.html>$jmlhalaman</a></li> " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last)
if($halaman_aktif < $jmlhalaman){
$next = $halaman_aktif+1;
$link_halaman .= " <li><a href=buku-tamu-halaman-$next.html>Next ></a></li>
<li class='hidden-xs'><a href=buku-tamu-halaman-$jmlhalaman.html>Last >></a></li> ";
}
else{
$link_halaman .= " <li><a href='#'>Next ></a></li> <li class='hidden-xs'><a href='#'> Last >></a></li>";
}
return $link_halaman;
}
}

// class paging untuk halaman detail playlist
class PagingAlbumFotoDetasemen{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['dokumentasi-album-foto-halaman'])){
$posisi=0;
$_GET['dokumentasi-album-foto-halaman']=1;
}
else{
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
$link_halaman .= "<li><a href=dokumentasi-album-foto-halaman-$_GET[id]-1.html class='nextprev'><< First</a></li>
                  <li><a href=dokumentasi-album-foto-halaman-$_GET[id]-$prev.html class='nextprev'>< Prev</a></li>";
}
else{
$link_halaman .= "<li><a href='#' class='nextprev'><< First</a></li><li><a href='#' class='nextprev'>< Prev </a></li> ";
}

// Link halaman 1,2,3, …
$angka = ($halaman_aktif > 3 ? "<li class='disabled'><a href='#'>...</a></li>" : " ");
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
if ($i < 1)
continue;
$angka .= "<li><a href=dokumentasi-album-foto-halaman-$_GET[id]-$i.html>$i</a></li>  ";
}
$angka .= " <li class='active'><a href='#'><b>$halaman_aktif</b></a></li>";

for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
if($i > $jmlhalaman)
break;
$angka .= "<li><a href=dokumentasi-album-foto-halaman-$_GET[id]-$i.html>$i</a></li>  ";
}
$angka .= ($halaman_aktif+2<$jmlhalaman ? "<li class='disabled'><a href='#'>...</a></li><li><a href=dokumentasi-album-foto-halaman-$_GET[id]-$jmlhalaman.html>$jmlhalaman</a></li> " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last)
if($halaman_aktif < $jmlhalaman){
$next = $halaman_aktif+1;
$link_halaman .= " <li><a href=dokumentasi-album-foto-halaman-$_GET[id]-$next.html>Next ></a></li>
<li><a href=dokumentasi-album-foto-halaman-$_GET[id]-$jmlhalaman.html>Last >></a></li> ";
}
else{
$link_halaman .= " <li><a href='#'>Next ></a></li> <li><a href='#'> Last >></a></li>";
}
return $link_halaman;
}
}


// class paging untuk halaman detail playlist
class PagingAlbumVideoDetasemen{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['dokumentasi-album-video-halaman'])){
$posisi=0;
$_GET['dokumentasi-album-video-halaman']=1;
}
else{
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
$link_halaman .= "<li><a href=dokumentasi-album-video-halaman-$_GET[id]-1.html class='nextprev'><< First</a></li>
                  <li><a href=dokumentasi-album-video-halaman-$_GET[id]-$prev.html class='nextprev'>< Prev</a></li>";
}
else{
$link_halaman .= "<li><a href='#' class='nextprev'><< First</a></li><li><a href='#' class='nextprev'>< Prev </a></li> ";
}

// Link halaman 1,2,3, …
$angka = ($halaman_aktif > 3 ? "<li class='disabled'><a href='#'>...</a></li>" : " ");
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
if ($i < 1)
continue;
$angka .= "<li><a href=dokumentasi-album-video-halaman-$_GET[id]-$i.html>$i</a></li>  ";
}
$angka .= " <li class='active'><a href='#'><b>$halaman_aktif</b></a></li>";

for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
if($i > $jmlhalaman)
break;
$angka .= "<li><a href=dokumentasi-album-video-halaman-$_GET[id]-$i.html>$i</a></li>  ";
}
$angka .= ($halaman_aktif+2<$jmlhalaman ? "<li class='disabled'><a href='#'>...</a></li><li><a href=dokumentasi-album-video-halaman-$_GET[id]-$jmlhalaman.html>$jmlhalaman</a></li> " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last)
if($halaman_aktif < $jmlhalaman){
$next = $halaman_aktif+1;
$link_halaman .= " <li><a href=dokumentasi-album-video-halaman-$_GET[id]-$next.html>Next ></a></li>
<li><a href=dokumentasi-album-video-halaman-$_GET[id]-$jmlhalaman.html>Last >></a></li> ";
}
else{
$link_halaman .= " <li><a href='#'>Next ></a></li> <li><a href='#'> Last >></a></li>";
}
return $link_halaman;
}
}

// class paging untuk halaman berita (menampilkan semua berita)
class PagingProduk{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['produkhalaman'])){
$posisi=0;
$_GET['produkhalaman']=1;
}
else{
$posisi = ($_GET['produkhalaman']-1) * $batas;
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
$link_halaman .= "<li><a href=produkhalaman-1.html class='nextprev'><< First</a></li>
                  <li><a href=produkhalaman-$prev.html class='nextprev'>< Prev</a></li>";
}
else{
$link_halaman .= "<li><a href='#' class='nextprev'><< First</a></li><li><a href='#' class='nextprev'>< Prev </a></li> ";
}

// Link halaman 1,2,3, …
$angka = ($halaman_aktif > 3 ? "<li class='disabled'><a href='#'>...</a></li>" : " ");
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
if ($i < 1)
continue;
$angka .= "<li><a href=produkhalaman-$i.html>$i</a></li>  ";
}
$angka .= " <li class='active'><a href='#'><b>$halaman_aktif</b></a></li>";

for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
if($i > $jmlhalaman)
break;
$angka .= "<li><a href=produkhalaman-$i.html>$i</a></li>  ";
}
$angka .= ($halaman_aktif+2<$jmlhalaman ? "<li class='disabled'><a href='#'>...</a></li><li><a href=produkhalaman-$jmlhalaman.html>$jmlhalaman</a></li> " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last)
if($halaman_aktif < $jmlhalaman){
$next = $halaman_aktif+1;
$link_halaman .= " <li><a href=produkhalaman-$next.html>Next ></a></li>
<li><a href=produkhalaman-$jmlhalaman.html>Last >></a></li> ";
}
else{
$link_halaman .= " <li><a href='#'>Next ></a></li> <li><a href='#'> Last >></a></li>";
}
return $link_halaman;
}
}

// class paging untuk halaman berita (menampilkan semua berita)
class PagingPsp3{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['halaman-psp3'])){
$posisi=0;
$_GET['halaman-psp3']=1;
}
else{
$posisi = ($_GET['halaman-psp3']-1) * $batas;
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
$link_halaman .= "<li><a href=halaman-psp3-1 class='nextprev'><< First</a></li>
                  <li><a href=halaman-psp3-$prev class='nextprev'>< Prev</a></li>";
}
else{
$link_halaman .= "<li><a href='#' class='nextprev'><< First</a></li><li><a href='#' class='nextprev'>< Prev </a></li> ";
}

// Link halaman 1,2,3, …
$angka = ($halaman_aktif > 3 ? "<span class='nextprev'>...</span>" : " ");
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
if ($i < 1)
continue;
$angka .= "<li><a href=halaman-psp3-$i>$i</a></li>  ";
}
$angka .= " <li class='active'><a href='#'><b>$halaman_aktif</b></a></li>";

for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
if($i > $jmlhalaman)
break;
$angka .= "<li><a href=halaman-psp3-$i>$i</a></li>  ";
}
$angka .= ($halaman_aktif+2<$jmlhalaman ? "<span class='nextprev'>...</span><li><a href=halaman-psp3-$jmlhalaman>$jmlhalaman</a></li> " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last)
if($halaman_aktif < $jmlhalaman){
$next = $halaman_aktif+1;
$link_halaman .= " <li><a href=halaman-psp3-$next>Next ></a></li>
<li><a href=halaman-psp3-$jmlhalaman>Last >></a></li> ";
}
else{
$link_halaman .= " <li><a href='#'>Next ></a></li> <li><a href='#'> Last >></a></li>";
}
return $link_halaman;
}
}


// class paging untuk halaman berita (menampilkan semua berita)
class PagingWirausaha{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['halaman-wirausaha'])){
$posisi=0;
$_GET['halaman-wirausaha']=1;
}
else{
$posisi = ($_GET['halaman-wirausaha']-1) * $batas;
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
$link_halaman .= "<li><a href=halaman-wirausaha-1 class='nextprev'><< First</a></li>
                  <li><a href=halaman-wirausaha-$prev class='nextprev'>< Prev</a></li>";
}
else{
$link_halaman .= "<li><a href='#' class='nextprev'><< First</a></li><li><a href='#' class='nextprev'>< Prev </a></li> ";
}

// Link halaman 1,2,3, …
$angka = ($halaman_aktif > 3 ? "<span class='nextprev'>...</span>" : " ");
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
if ($i < 1)
continue;
$angka .= "<li><a href=halaman-wirausaha-$i>$i</a></li>  ";
}
$angka .= " <li class='active'><a href='#'><b>$halaman_aktif</b></a></li>";

for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
if($i > $jmlhalaman)
break;
$angka .= "<li><a href=halaman-wirausaha-$i>$i</a></li>  ";
}
$angka .= ($halaman_aktif+2<$jmlhalaman ? "<span class='nextprev'>...</span><li><a href=halaman-wirausaha-$jmlhalaman>$jmlhalaman</a></li> " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last)
if($halaman_aktif < $jmlhalaman){
$next = $halaman_aktif+1;
$link_halaman .= " <li><a href=halaman-wirausaha-$next>Next ></a></li>
<li><a href=halaman-wirausaha-$jmlhalaman>Last >></a></li> ";
}
else{
$link_halaman .= " <li><a href='#'>Next ></a></li> <li><a href='#'> Last >></a></li>";
}
return $link_halaman;
}
}


// class paging untuk halaman berita (menampilkan semua berita)
class PagingEtalase{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['halaman-etalase'])){
$posisi=0;
$_GET['halaman-etalase']=1;
}
else{
$posisi = ($_GET['halaman-etalase']-1) * $batas;
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
$link_halaman .= "<li><a href=halaman-etalase-1 class='nextprev'><< First</a></li>
                  <li><a href=halaman-etalase-$prev class='nextprev'>< Prev</a></li>";
}
else{
$link_halaman .= "<li><a href='#' class='nextprev'><< First</a></li><li><a href='#' class='nextprev'>< Prev </a></li> ";
}

// Link halaman 1,2,3, …
$angka = ($halaman_aktif > 3 ? "<span class='nextprev'>...</span>" : " ");
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
if ($i < 1)
continue;
$angka .= "<li><a href=halaman-etalase-$i>$i</a></li>  ";
}
$angka .= " <li class='active'><a href='#'><b>$halaman_aktif</b></a></li>";

for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
if($i > $jmlhalaman)
break;
$angka .= "<li><a href=halaman-etalase-$i>$i</a></li>  ";
}
$angka .= ($halaman_aktif+2<$jmlhalaman ? "<span class='nextprev'>...</span><li><a href=halaman-etalase-$jmlhalaman>$jmlhalaman</a></li> " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last)
if($halaman_aktif < $jmlhalaman){
$next = $halaman_aktif+1;
$link_halaman .= " <li><a href=halaman-etalase-$next>Next ></a></li>
<li><a href=halaman-etalase-$jmlhalaman>Last >></a></li> ";
}
else{
$link_halaman .= " <li><a href='#'>Next ></a></li> <li><a href='#'> Last >></a></li>";
}
return $link_halaman;
}
}


// class paging untuk halaman berita (menampilkan semua berita)
class PagingCerita{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['arsip-cerita-halaman'])){
$posisi=0;
$_GET['arsip-cerita-halaman']=1;
}
else{
$posisi = ($_GET['arsip-cerita-halaman']-1) * $batas;
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
$link_halaman .= "<li><a href=arsip-cerita-halaman-1.html class='nextprev'><< First</a></li>
                  <li><a href=arsip-cerita-halaman-$prev.html class='nextprev'>< Prev</a></li>";
}
else{
$link_halaman .= "<li><a href='#' class='nextprev'><< First</a></li><li><a href='#' class='nextprev'>< Prev </a></li> ";
}

// Link halaman 1,2,3, …
$angka = ($halaman_aktif > 3 ? "<li class='disabled'><a href='#'>...</a></li>" : " ");
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
if ($i < 1)
continue;
$angka .= "<li><a href=arsip-cerita-halaman-$i.html>$i</a></li>  ";
}
$angka .= " <li class='active'><a href='#'><b>$halaman_aktif</b></a></li>";

for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
if($i > $jmlhalaman)
break;
$angka .= "<li><a href=arsip-cerita-halaman-$i.html>$i</a></li>  ";
}
$angka .= ($halaman_aktif+2<$jmlhalaman ? "<li class='disabled'><a href='#'>...</a></li><li><a href=arsip-cerita-halaman-$jmlhalaman.html>$jmlhalaman</a></li> " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last)
if($halaman_aktif < $jmlhalaman){
$next = $halaman_aktif+1;
$link_halaman .= " <li><a href=arsip-cerita-halaman-$next.html>Next ></a></li>
<li><a href=arsip-cerita-halaman-$jmlhalaman.html>Last >></a></li> ";
}
else{
$link_halaman .= " <li><a href='#'>Next ></a></li> <li><a href='#'> Last >></a></li>";
}
return $link_halaman;
}
}

?>