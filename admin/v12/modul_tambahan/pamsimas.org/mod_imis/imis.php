<?php
$qry	= $db->query("SELECT id_modul, nama_modul, link, dilihat, aktif_submodul FROM modul WHERE link='$module'");
$u		= $qry->fetch_object();
if($u->aktif_submodul == 'Y'){
	$lihat = $u->dilihat + 1;
	$dilihat = $db->prepare("UPDATE modul SET dilihat='$lihat' WHERE id_modul='$u->id_modul'");
	$dilihat->execute();
	$aksi	= "modul_tambahan/".$aw->alamat_website."/mod_".$u->link."/aksi_".$u->link.".php";
	echo'
	<div class="card">
		<div class="card-header">
			<div class="input-group" style="width:20%;">
				<div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-database"></i></span></div>
				<select class="custom-select custom-select-sm btn" id="dinamis_select" data-toggle="tooltip" data-placement="bottom" title="Pilih Data IMIS">
				<option>- Pilih Data IMIS -</option>';
				$p=$db->query("SELECT nama_imis, link FROM modul_imis WHERE aktif='Y' ORDER BY urutan ASC");
				while($w=$p->fetch_object()){
					echo'<option value="?module='.$w->link.'">'.$w->nama_imis.'</option>';
				}
				echo'</select>
			</div>
		</div>
	</div>';
}else{
	echo'
	<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h4><i class="icon fa fa-bullhorn"></i> Info!</h4>
		<p>Maaf menu ini sementara tidak diaktifkan.</p>
	</div>';
}
$db->close();
?>