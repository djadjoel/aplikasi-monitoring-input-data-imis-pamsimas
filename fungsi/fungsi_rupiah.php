<?php
function format_rupiah($angka){
  $rupiah = number_format($angka,0,',','.');
  return $rupiah;
  //jika muncul error karena fungsi ini disebabkan datanya blank coba ganti dengan angka 0
}
?>
