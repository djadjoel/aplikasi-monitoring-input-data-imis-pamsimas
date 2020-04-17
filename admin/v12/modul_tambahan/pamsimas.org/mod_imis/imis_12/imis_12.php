<?php
include_once("modul_tambahan/".$aw->alamat_website."/mod_imis/card-header.php");
echo'
<div class="float-sm-right" style="padding-left:5px;">';
	if(isset($_GET['id_kabkota']) AND isset($_GET['tahun']) AND isset($_GET['id_pamsimas'])){
		echo'
		<div class="btn-group">
			<a href="'.$aksi.'?module='.$u->link.'&act=exportpdf&id_kabkota='.$d->id_kabkota.'&tahun='.$d2->tahun.'&id_pamsimas='.$d3->id_pamsimas.'" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="bottom" title="Export laporan format pdf" target="_blank"><i class="fa fa-file-pdf"></i></a>
			<a href="'.$aksi.'?module='.$u->link.'&act=exportexcel&id_kabkota='.$d->id_kabkota.'&tahun='.$d2->tahun.'&id_pamsimas='.$d3->id_pamsimas.'" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="bottom" title="Export laporan format excel"><i class="fa fa-file-excel"></i></a>
		</div>';
	}elseif(isset($_GET['id_kabkota']) AND isset($_GET['tahun'])){
		echo'
		<div class="btn-group">
			<a href="'.$aksi.'?module='.$u->link.'&act=exportpdf&id_kabkota='.$d->id_kabkota.'&tahun='.$d2->tahun.'" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="bottom" title="Export laporan format pdf" target="_blank"><i class="fa fa-file-pdf"></i></a>
			<a href="'.$aksi.'?module='.$u->link.'&act=exportexcel&id_kabkota='.$d->id_kabkota.'&tahun='.$d2->tahun.'" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="bottom" title="Export laporan format excel"><i class="fa fa-file-excel"></i></a>
		</div>';
	}elseif(isset($_GET['tahun'])){
		echo'
		<div class="btn-group">
			<a href="'.$aksi.'?module='.$u->link.'&act=exportpdf&tahun='.$d2->tahun.'" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="bottom" title="Export laporan format pdf" target="_blank"><i class="fa fa-file-pdf"></i></a>
			<a href="'.$aksi.'?module='.$u->link.'&act=exportexcel&tahun='.$d2->tahun.'" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="bottom" title="Export laporan format excel"><i class="fa fa-file-excel"></i></a>
		</div>';
	}
	echo'
</div>';
if(isset($_GET['tahun']) AND isset($_GET['id_kabkota']) AND isset($_GET['subtim']) AND isset($_GET['id_pribadi'])){
	echo'
	<table class="table table-sm table-bordered table-hover table-striped">';
		$qryp = $db->query("SELECT id_pribadi, nama_lengkap, posisi, subtim FROM imis_progres_pemilihan_view WHERE id_pribadi='$d5->id_pribadi' AND tahun='$d2->tahun'");
		$p = $qryp->fetch_object();
			echo'
			<tr><td width="15%">Nama Fasilitator</td><td>: <b>'.$p->nama_lengkap.'</b></td></tr>
			<tr><td>Posisi</td><td>: <b>'.$p->posisi.'</b></td></tr>
			<tr><td>Subtim</td><td>: <b>'.$p->subtim.'</b></td></tr>';
		echo'
	</table>
	<table class="table table-sm table-bordered table-hover table-striped">
		<thead>
			<tr>
				<th>No</th>
				<th>Kabupaten</th>
				<th>Kecamatan</th>
				<th>Desa</th>
				<th>Progres Input</th>
			</tr>
		</thead>
		<tbody>';
			$no = 1;
			$qry = $db->query("SELECT id_pribadi, id_kabkota, kabupaten, kecamatan, id_pamsimas, desa, bobot FROM imis_progres_pemilihan_view WHERE id_pribadi='$d5->id_pribadi' AND tahun='$d2->tahun' ORDER BY desa ASC");
			while($r = $qry->fetch_object()){
				echo'
				<tr>
					<td>'.$no.'</td>
					<td>'.$r->kabupaten.'</td>
					<td>'.$r->kecamatan.'</td>
					<td><a href="?module='.$u->link.'&id_kabkota='.$d->id_kabkota.'&tahun='.$d2->tahun.'&id_pamsimas='.$r->id_pamsimas.'">'.$r->desa.'</a></td>
					<td>'.$r->bobot.'</td>
				</tr>';
				$no++;
			}
		echo'
		</tbody>
		<tfoot>';
		$qryt = $db->query("SELECT AVG(bobot) total FROM imis_progres_pemilihan_view WHERE id_pribadi='$d5->id_pribadi' AND tahun='$d2->tahun' ORDER BY desa ASC");
		$t = $qryt->fetch_object();
		echo'
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td><b>'.ROUND($t->total, 2).'</b></td>
			</tr>
		</tfoot>
	</table>';
}elseif(isset($_GET['tahun']) AND isset($_GET['id_kabkota']) AND isset($_GET['id_pamsimas'])){
	echo'
	<h5>Kabupaten '.$d->nama_kabkota.' Kecamatan '.$d3->kecamatan.' Desa '.$d3->desa.'</h5>';
	if($_SESSION['namauser'] == 'dma' OR $_SESSION['namauser'] == 'deoapandeglang' OR $_SESSION['namauser'] == 'deaolebak' OR $_SESSION['namauser'] == 'deaotangerang' OR $_SESSION['namauser'] == 'deaoserang'){
		echo'
		<form action="'.$aksi.'?module='.$u->link.'&act=updatetahapan" method="post">';
			$id_kabkota = $d->id_kabkota;
			$tahun = $d2->tahun;
			$id_pamsimas = $d3->id_pamsimas;
			$qry = $db->prepare("SELECT id_pamsimas, tahun, id_kabkota, kabupaten, kecamatan, desa, persiapan_1, persiapan_2, persiapan_3, persiapan_4, persiapan_5, persiapan_6, persiapan_7, persiapan_8, persiapan_9, persiapan_10, persiapan_11, persiapan_12, persiapan_13, persiapan_14, persiapan_15, perencanaan_1, perencanaan_2, perencanaan_3, perencanaan_4, perencanaan_5, perencanaan_6, perencanaan_7, perencanaan_8, perencanaan_9, perencanaan_10, perencanaan_11, perencanaan_12, perencanaan_13, perencanaan_14, perencanaan_15, perencanaan_16, perencanaan_17, perencanaan_18, perencanaan_19, perencanaan_20, perencanaan_21, perencanaan_22, perencanaan_23, perencanaan_24, perencanaan_25, perencanaan_26, perencanaan_27, perencanaan_28, perencanaan_29, perencanaan_30, perencanaan_31, perencanaan_32, perencanaan_33, perencanaan_34, perencanaan_35, perencanaan_36, perencanaan_37, perencanaan_38 FROM imis_progres_pemilihan WHERE tahun =? AND id_kabkota =? AND id_pamsimas=?");
			$qry->bind_param("sss", $tahun, $id_kabkota, $id_pamsimas);
			$qry->execute();
			$ada = $qry->get_result();
			$r = $ada->fetch_object();
			echo'
			<input type="hidden" name="id_pamsimas" value="'.$r->id_pamsimas.'">
			<input type="hidden" name="id_kabkota" value="'.$r->id_kabkota.'">
			<input type="hidden" name="tahun" value="'.$r->tahun.'">
			<table id="tableumum" class="table table-sm table-bordered table-hover">
				<thead>
					<tr>
						<th width="5%" class="align-middle">No</th>
						<th class="align-middle">Kegiatan</th>
						<th width="5%"><button type="button" class="btn-transition btn btn-outline-primary btn-sm checkbox-toggle"><i class="nav-link-icon fa fa-check-square"></i></button></th>
					</tr>
				</thead>
				<tbody>
					<tr class="mailbox-messages">
						<td class="text-center">1</td>
						<td>Sosialisasi Tingkat Kabupaten (Kab)</td>';
							if($r->persiapan_1 == '1'){
								echo'<td class="table-success text-center"><input type="checkbox" name="persiapan_1" value="'.$r->persiapan_1.'" checked></td>';
							}else{
								echo'<td class="table-danger text-center"><input type="checkbox" name="persiapan_1" value="'.$r->persiapan_1.'"></td>';
							}
							echo'
					</tr>
					<tr class="mailbox-messages">
						<td class="text-center">2</td>
						<td>Sosialisasi Tingkat Desa (F)</td>';
							if($r->persiapan_2 == '1'){
								echo'<td class="table-success text-center"><input type="checkbox" name="persiapan_2" value="'.$r->persiapan_2.'" checked></td>';
							}else{
								echo'<td class="table-danger text-center"><input type="checkbox" name="persiapan_2" value="'.$r->persiapan_2.'"></td>';
							}
							echo'
					</tr>
					<tr class="mailbox-messages">
						<td class="text-center">3</td>
						<td>Pembentukan/Revitalisasi Kader AMPL (F)</td>';
							if($r->persiapan_3 == '1'){
								echo'<td class="table-success text-center"><input type="checkbox" name="persiapan_3" value="'.$r->persiapan_3.'" checked></td>';
							}else{
								echo'<td class="table-danger text-center"><input type="checkbox" name="persiapan_3" value="'.$r->persiapan_3.'"></td>';
							}
							echo'
					</tr>
					<tr class="mailbox-messages">
						<td class="text-center">4</td>
						<td>Pembentukan Tim Proposal (F)</td>';
							if($r->persiapan_4 == '1'){
								echo'<td class="table-success text-center"><input type="checkbox" name="persiapan_4" value="'.$r->persiapan_4.'" checked></td>';
							}else{
								echo'<td class="table-danger text-center"><input type="checkbox" name="persiapan_4" value="'.$r->persiapan_4.'"></td>';
							}
							echo'
					</tr>
					<tr class="mailbox-messages">
						<td class="text-center">5</td>
						<td>IMAS I - Informasi Umum (F)</td>';
							if($r->persiapan_5 == '1'){
								echo'<td class="table-success text-center"><input type="checkbox" name="persiapan_5" value="'.$r->persiapan_5.'" checked></td>';
							}else{
								echo'<td class="table-danger text-center"><input type="checkbox" name="persiapan_5" value="'.$r->persiapan_5.'"></td>';
							}
						echo'
					</tr>
					<tr class="mailbox-messages">
						<td class="text-center">6</td>
						<td>IMAS I - Pemetaan Sosial (F)</td>';
							if($r->persiapan_6 == '1'){
								echo'<td class="table-success text-center"><input type="checkbox" name="persiapan_6" value="'.$r->persiapan_6.'" checked></td>';
							}else{
								echo'<td class="table-danger text-center"><input type="checkbox" name="persiapan_6" value="'.$r->persiapan_6.'"></td>';
							}
							echo'
					</tr>
					<tr class="mailbox-messages">
						<td class="text-center">7</td>
						<td>IMAS I - Pemetaan Sosial (FS)</td>';
						if($r->persiapan_7 == '1'){
							echo'<td class="table-success text-center"><input type="checkbox" name="persiapan_7" value="'.$r->persiapan_7.'" checked></td>';
						}else{
							echo'<td class="table-danger text-center"><input type="checkbox" name="persiapan_7" value="'.$r->persiapan_7.'"></td>';
						}
						echo'
					</tr>
					<tr class="mailbox-messages">
						<td class="text-center">8</td>
						<td>IMAS I - Pemetaan Sosial (Kab)</td>';
							if($r->persiapan_8 == '1'){
								echo'<td class="table-success text-center"><input type="checkbox" name="persiapan_8" value="'.$r->persiapan_8.'" checked></td>';
							}else{
								echo'<td class="table-danger text-center"><input type="checkbox" name="persiapan_8" value="'.$r->persiapan_8.'"></td>';
							}
							echo'
					</tr>
					<tr class="mailbox-messages">
						<td class="text-center">9</td>
						<td>Penyusunan Surat Minat dan Proposal (F)</td>';
							if($r->persiapan_9 == '1'){
								echo'<td class="table-success text-center"><input type="checkbox" name="persiapan_9" value="'.$r->persiapan_9.'" checked></td>';
							}else{
								echo'<td class="table-danger text-center"><input type="checkbox" name="persiapan_9" value="'.$r->persiapan_9.'"></td>';
							}
							echo'
					</tr>
					<tr class="mailbox-messages">
						<td class="text-center">10</td>
						<td>Pengajuan Surat Minat dan Proposal (F)</td>';
							if($r->persiapan_10 == '1'){
								echo'<td class="table-success text-center"><input type="checkbox" name="persiapan_10" value="'.$r->persiapan_10.'" checked></td>';
							}else{
								echo'<td class="table-danger text-center"><input type="checkbox" name="persiapan_10" value="'.$r->persiapan_10.'"></td>';
							}
							echo'
					</tr>
					<tr class="mailbox-messages">
						<td class="text-center">11</td>
						<td>Pengajuan Surat Minat dan Proposal (FS)</td>';
							if($r->persiapan_11 == '1'){
								echo'<td class="table-success text-center"><input type="checkbox" name="persiapan_11" value="'.$r->persiapan_11.'" checked></td>';
							}else{
								echo'<td class="table-danger text-center"><input type="checkbox" name="persiapan_11" value="'.$r->persiapan_11.'"></td>';
							}
							echo'
					</tr>
					<tr class="mailbox-messages">
						<td class="text-center">12</td>
						<td>Verifikasi Proposal (Kab)</td>';
						if($r->persiapan_12 == '1'){
							echo'<td class="table-success text-center"><input type="checkbox" name="persiapan_12" value="'.$r->persiapan_12.'" checked></td>';
						}else{
							echo'<td class="table-danger text-center"><input type="checkbox" name="persiapan_12" value="'.$r->persiapan_12.'"></td>';
						}
						echo'
					</tr>
					<tr class="mailbox-messages">
						<td class="text-center">13</td>
						<td>Seleksi Proposal (Kab)</td>';
							if($r->persiapan_13 == '1'){
								echo'<td class="table-success text-center"><input type="checkbox" name="persiapan_13" value="'.$r->persiapan_13.'" checked></td>';
							}else{
								echo'<td class="table-danger text-center"><input type="checkbox" name="persiapan_13" value="'.$r->persiapan_13.'"></td>';
							}
							echo'
					</tr>
					<tr class="mailbox-messages">
						<td class="text-center">14</td>
						<td>Penetapan Calon Desa Sasaran (Kab)</td>';
							if($r->persiapan_14 == '1'){
								echo'<td class="table-success text-center"><input type="checkbox" name="persiapan_14" value="'.$r->persiapan_14.'" checked></td>';
							}else{
								echo'<td class="table-danger text-center"><input type="checkbox" name="persiapan_14" value="'.$r->persiapan_14.'"></td>';
							}
							echo'
					</tr>
					<tr class="mailbox-messages">
						<td class="text-center">15</td>
						<td>Penetapan Calon Desa Sasaran (Prov)</td>';
							if($r->persiapan_15 == '1'){
								echo'<td class="table-success text-center"><input type="checkbox" name="persiapan_15" value="'.$r->persiapan_15.'" checked></td>';
							}else{
								echo'<td class="table-danger text-center"><input type="checkbox" name="persiapan_15" value="'.$r->persiapan_15.'"></td>';
							}
							echo'
					</tr>
					<tr class="mailbox-messages">
						<td class="text-center">16</td>
						<td>Identifikasi KKM Dari Program Sejenis (F)</td>';
							if($r->perencanaan_1 == '1'){
								echo'<td class="table-success text-center"><input type="checkbox" name="perencanaan_1" value="'.$r->perencanaan_1.'" checked></td>';
							}else{
								echo'<td class="table-danger text-center"><input type="checkbox" name="perencanaan_1" value="'.$r->perencanaan_1.'"></td>';
							}
							echo'
					</tr>
					<tr class="mailbox-messages">
						<td class="text-center">17</td>
						<td>Pemilihan Utusan Tingkat RW/Dusun Atau Unit Terkecil Lainnya (F)</td>';
						if($r->perencanaan_2 == '1'){
							echo'<td class="table-success text-center"><input type="checkbox" name="perencanaan_2" value="'.$r->perencanaan_2.'" checked></td>';
						}else{
							echo'<td class="table-danger text-center"><input type="checkbox" name="perencanaan_2" value="'.$r->perencanaan_2.'"></td>';
						}
						echo'
					</tr>
					<tr class="mailbox-messages">
						<td class="text-center">19</td>
						<td>Pleno Pembentukan/Revitalisasi KKM Desa (F)</td>';
						if($r->perencanaan_3 == '1'){
							echo'<td class="table-success text-center"><input type="checkbox" name="perencanaan_3" value="'.$r->perencanaan_3.'" checked></td>';
						}else{
							echo'<td class="table-danger text-center"><input type="checkbox" name="perencanaan_3" value="'.$r->perencanaan_3.'"></td>';
						}
						echo'
					</tr>
					<tr class="mailbox-messages">
						<td class="text-center">20</td>
						<td>Pembentukan/Revitalisasi KKM (F)</td>';
						if($r->perencanaan_4 == '1'){
							echo'<td class="table-success text-center"><input type="checkbox" name="perencanaan_4" value="'.$r->perencanaan_4.'" checked></td>';
						}else{
							echo'<td class="table-danger text-center"><input type="checkbox" name="perencanaan_4" value="'.$r->perencanaan_4.'"></td>';
						}
						echo'
					</tr>
					<tr class="mailbox-messages">
						<td class="text-center">21</td>
						<td>Pembentukan Unit Kerja KKM/Satlak (F)</td>';
						if($r->perencanaan_5 == '1'){
							echo'<td class="table-success text-center"><input type="checkbox" name="perencanaan_5" value="'.$r->perencanaan_5.'" checked></td>';
						}else{
							echo'<td class="table-danger text-center"><input type="checkbox" name="perencanaan_5" value="'.$r->perencanaan_5.'"></td>';
						}
						echo'
					</tr>
					<tr class="mailbox-messages">
						<td class="text-center">22</td>
						<td>Pembentukan Unit Kerja KKM/Satlak (FS)</td>';
						if($r->perencanaan_6 == '1'){
							echo'<td class="table-success text-center"><input type="checkbox" name="perencanaan_6" value="'.$r->perencanaan_6.'" checked></td>';
						}else{
							echo'<td class="table-danger text-center"><input type="checkbox" name="perencanaan_6" value="'.$r->perencanaan_6.'"></td>';
						}
						echo'
					</tr>
					<tr class="mailbox-messages">
						<td class="text-center">23</td>
						<td>IMAS II (F)</td>';
						if($r->perencanaan_7 == '1'){
							echo'<td class="table-success text-center"><input type="checkbox" name="perencanaan_7" value="'.$r->perencanaan_7.'" checked></td>';
						}else{
							echo'<td class="table-danger text-center"><input type="checkbox" name="perencanaan_7" value="'.$r->perencanaan_7.'"></td>';
						}
						echo'
					</tr>
					<tr class="mailbox-messages">
						<td class="text-center">24</td>
						<td>IMAS II (FS)</td>';
						if($r->perencanaan_8 == '1'){
							echo'<td class="table-success text-center"><input type="checkbox" name="perencanaan_8" value="'.$r->perencanaan_8.'" checked></td>';
						}else{
							echo'<td class="table-danger text-center"><input type="checkbox" name="perencanaan_8" value="'.$r->perencanaan_8.'"></td>';
						}
						echo'
					</tr>
					<tr class="mailbox-messages">
						<td class="text-center">25</td>
						<td>IMAS II (Kab)</td>';
						if($r->perencanaan_9 == '1'){
							echo'<td class="table-success text-center"><input type="checkbox" name="perencanaan_9" value="'.$r->perencanaan_9.'" checked></td>';
						}else{
							echo'<td class="table-danger text-center"><input type="checkbox" name="perencanaan_9" value="'.$r->perencanaan_9.'"></td>';
						}
						echo'
					</tr>
					<tr class="mailbox-messages">
						<td class="text-center">26</td>
						<td>Pleno Pembentukan/Revitalisasi KPSPAMS (F)</td>';
						if($r->perencanaan_10 == '1'){
							echo'<td class="table-success text-center"><input type="checkbox" name="perencanaan_10" value="'.$r->perencanaan_10.'" checked></td>';
						}else{
							echo'<td class="table-danger text-center"><input type="checkbox" name="perencanaan_10" value="'.$r->perencanaan_10.'"></td>';
						}
						echo'
					</tr>
					<tr class="mailbox-messages">
						<td class="text-center">27</td>
						<td>Kelompok Pengelola Sistem Penyediaan Air Minum Dan Sanitasi (F)</td>';
						if($r->perencanaan_11 == '1'){
							echo'<td class="table-success text-center"><input type="checkbox" name="perencanaan_11" value="'.$r->perencanaan_11.'" checked></td>';
						}else{
							echo'<td class="table-danger text-center"><input type="checkbox" name="perencanaan_11" value="'.$r->perencanaan_11.'"></td>';
						}
						echo'
					</tr>
					<tr class="mailbox-messages">
						<td class="text-center">28</td>
						<td>Kelompok Pengelola Sistem Penyediaan Air Minum Dan Sanitasi (FS)</td>';
						if($r->perencanaan_12 == '1'){
							echo'<td class="table-success text-center"><input type="checkbox" name="perencanaan_12" value="'.$r->perencanaan_12.'" checked></td>';
						}else{
							echo'<td class="table-danger text-center"><input type="checkbox" name="perencanaan_12" value="'.$r->perencanaan_12.'"></td>';
						}
						echo'
					</tr>
					<tr class="mailbox-messages">
						<td class="text-center">29</td>
						<td>Rencana Pelayanan Air Minum (F)</td>';
						if($r->perencanaan_13 == '1'){
							echo'<td class="table-success text-center"><input type="checkbox" name="perencanaan_13" value="'.$r->perencanaan_13.'" checked></td>';
						}else{
							echo'<td class="table-danger text-center"><input type="checkbox" name="perencanaan_13" value="'.$r->perencanaan_13.'"></td>';
						}
						echo'
					</tr>
					<tr class="mailbox-messages">
						<td class="text-center">30</td>
						<td>Rencana Pencapaian SBS Dan Akses Universal (F)</td>';
						if($r->perencanaan_14 == '1'){
							echo'<td class="table-success text-center"><input type="checkbox" name="perencanaan_14" value="'.$r->perencanaan_14.'" checked></td>';
						}else{
							echo'<td class="table-danger text-center"><input type="checkbox" name="perencanaan_14" value="'.$r->perencanaan_14.'"></td>';
						}
						echo'
					</tr>
					<tr class="mailbox-messages">
						<td class="text-center">31</td>
						<td>Rencana Pendanaan (F)</td>';
						if($r->perencanaan_15 == '1'){
							echo'<td class="table-success text-center"><input type="checkbox" name="perencanaan_15" value="'.$r->perencanaan_15.'" checked></td>';
						}else{
							echo'<td class="table-danger text-center"><input type="checkbox" name="perencanaan_15" value="'.$r->perencanaan_15.'"></td>';
						}
						echo'
					</tr>
					<tr class="mailbox-messages">
						<td class="text-center">32</td>
						<td>Rapat Pleno Tingkat Desa Membahas PJM ProAKSi (F)</td>';
						if($r->perencanaan_16 == '1'){
							echo'<td class="table-success text-center"><input type="checkbox" name="perencanaan_16" value="'.$r->perencanaan_16.'" checked></td>';
						}else{
							echo'<td class="table-danger text-center"><input type="checkbox" name="perencanaan_16" value="'.$r->perencanaan_16.'"></td>';
						}
						echo'
					</tr>
					<tr class="mailbox-messages">
						<td class="text-center">33</td>
						<td>Rapat Pleno Tingkat Desa Membahas PJM ProAKSi (FS)</td>';
						if($r->perencanaan_17 == '1'){
							echo'<td class="table-success text-center"><input type="checkbox" name="perencanaan_17" value="'.$r->perencanaan_17.'" checked></td>';
						}else{
							echo'<td class="table-danger text-center"><input type="checkbox" name="perencanaan_17" value="'.$r->perencanaan_17.'"></td>';
						}
						echo'
					</tr>
					<tr class="mailbox-messages">
						<td class="text-center">34</td>
						<td>Rapat Pleno Tingkat Desa Membahas PJM ProAKSi (Kab)</td>';
						if($r->perencanaan_18 == '1'){
							echo'<td class="table-success text-center"><input type="checkbox" name="perencanaan_18" value="'.$r->perencanaan_18.'" checked></td>';
						}else{
							echo'<td class="table-danger text-center"><input type="checkbox" name="perencanaan_18" value="'.$r->perencanaan_18.'"></td>';
						}
						echo'
					</tr>
					<tr class="mailbox-messages">
						<td class="text-center">35</td>
						<td>Rencana Pembangunan Jangka Menengah Desa (F)</td>';
						if($r->perencanaan_19 == '1'){
							echo'<td class="table-success text-center"><input type="checkbox" name="perencanaan_19" value="'.$r->perencanaan_19.'" checked></td>';
						}else{
							echo'<td class="table-danger text-center"><input type="checkbox" name="perencanaan_19" value="'.$r->perencanaan_19.'"></td>';
						}
						echo'
					</tr>
					<tr class="mailbox-messages">
						<td class="text-center">36</td>
						<td>Rencana Kerja Pemerintah Desa (F)</td>';
						if($r->perencanaan_20 == '1'){
							echo'<td class="table-success text-center"><input type="checkbox" name="perencanaan_20" value="'.$r->perencanaan_20.'" checked></td>';
						}else{
							echo'<td class="table-danger text-center"><input type="checkbox" name="perencanaan_20" value="'.$r->perencanaan_20.'"></td>';
						}
						echo'
					</tr>
					<tr class="mailbox-messages">
						<td class="text-center">37</td>
						<td>Integrasi PJM ProAKSi dan RKM kedalam RPJM Desa dan RKP Desa (F)</td>';
						if($r->perencanaan_21 == '1'){
							echo'<td class="table-success text-center"><input type="checkbox" name="perencanaan_21" value="'.$r->perencanaan_21.'" checked></td>';
						}else{
							echo'<td class="table-danger text-center"><input type="checkbox" name="perencanaan_21" value="'.$r->perencanaan_21.'"></td>';
						}
						echo'
					</tr>
					<tr class="mailbox-messages">
						<td class="text-center">38</td>
						<td>Realisasi APBDes Kegiatan Air Minum, Sanitasi dan Kesehatan (F)</td>';
						if($r->perencanaan_22 == '1'){
							echo'<td class="table-success text-center"><input type="checkbox" name="perencanaan_22" value="'.$r->perencanaan_22.'" checked></td>';
						}else{
							echo'<td class="table-danger text-center"><input type="checkbox" name="perencanaan_22" value="'.$r->perencanaan_22.'"></td>';
						}
						echo'
					</tr>
					<tr class="mailbox-messages">
						<td class="text-center">39</td>
						<td>Realisasi APBDes Kegiatan Air Minum, Sanitasi dan Kesehatan (FS)</td>';
						if($r->perencanaan_23 == '1'){
							echo'<td class="table-success text-center"><input type="checkbox" name="perencanaan_23" value="'.$r->perencanaan_23.'" checked></td>';
						}else{
							echo'<td class="table-danger text-center"><input type="checkbox" name="perencanaan_23" value="'.$r->perencanaan_23.'"></td>';
						}
						echo'
					</tr>
					<tr class="mailbox-messages">
						<td class="text-center">40</td>
						<td>Realisasi APBDes Kegiatan Air Minum, Sanitasi dan Kesehatan (Kab)</td>';
						if($r->perencanaan_24 == '1'){
							echo'<td class="table-success text-center"><input type="checkbox" name="perencanaan_24" value="'.$r->perencanaan_24.'" checked></td>';
						}else{
							echo'<td class="table-danger text-center"><input type="checkbox" name="perencanaan_24" value="'.$r->perencanaan_24.'"></td>';
						}
						echo'
					</tr>
					<tr class="mailbox-messages">
						<td class="text-center">41</td>
						<td>Penyusunan Dokumen RKM - Jumlah Rencana Kegiatan (F)</td>';
						if($r->perencanaan_25 == '1'){
							echo'<td class="table-success text-center"><input type="checkbox" name="perencanaan_25" value="'.$r->perencanaan_25.'" checked></td>';
						}else{
							echo'<td class="table-danger text-center"><input type="checkbox" name="perencanaan_25" value="'.$r->perencanaan_25.'"></td>';
						}
						echo'
					</tr>
					<tr class="mailbox-messages">
						<td class="text-center">42</td>
						<td>Sarana Air Minum Diusulkan Melalui Program PAMSIMAS (F)</td>';
						if($r->perencanaan_26 == '1'){
							echo'<td class="table-success text-center"><input type="checkbox" name="perencanaan_26" value="'.$r->perencanaan_26.'" checked></td>';
						}else{
							echo'<td class="table-danger text-center"><input type="checkbox" name="perencanaan_26" value="'.$r->perencanaan_26.'"></td>';
						}
						echo'
					</tr>
					<tr class="mailbox-messages">
						<td class="text-center">43</td>
						<td>Sarana Air Minum Diusulkan Melalui Pendanaan Lainnya (F)</td>';
						if($r->perencanaan_27 == '1'){
							echo'<td class="table-success text-center"><input type="checkbox" name="perencanaan_27" value="'.$r->perencanaan_27.'" checked></td>';
						}else{
							echo'<td class="table-danger text-center"><input type="checkbox" name="perencanaan_27" value="'.$r->perencanaan_27.'"></td>';
						}
						echo'
					</tr>
					<tr class="mailbox-messages">
						<td class="text-center">44</td>
						<td>Non-SAM Diusulkan Melalui Program PAMSIMAS (F)</td>';
						if($r->perencanaan_28 == '1'){
							echo'<td class="table-success text-center"><input type="checkbox" name="perencanaan_28" value="'.$r->perencanaan_28.'" checked></td>';
						}else{
							echo'<td class="table-danger text-center"><input type="checkbox" name="perencanaan_28" value="'.$r->perencanaan_28.'"></td>';
						}
						echo'
					</tr>
					<tr class="mailbox-messages">
						<td class="text-center">45</td>
						<td>Non-SAM Diusulkan Melalui Pendanaan Lainnya (F)</td>';
						if($r->perencanaan_29 == '1'){
							echo'<td class="table-success text-center"><input type="checkbox" name="perencanaan_29" value="'.$r->perencanaan_29.'" checked></td>';
						}else{
							echo'<td class="table-danger text-center"><input type="checkbox" name="perencanaan_29" value="'.$r->perencanaan_29.'"></td>';
						}
						echo'
					</tr>
					<tr class="mailbox-messages">
						<td class="text-center">46</td>
						<td>Target Penerima Manfaat SAM (F)</td>';
						if($r->perencanaan_30 == '1'){
							echo'<td class="table-success text-center"><input type="checkbox" name="perencanaan_30" value="'.$r->perencanaan_30.'" checked></td>';
						}else{
							echo'<td class="table-danger text-center"><input type="checkbox" name="perencanaan_30" value="'.$r->perencanaan_30.'"></td>';
						}
						echo'
					</tr>
					<tr class="mailbox-messages">
						<td class="text-center">47</td>
						<td>Target Penerima Manfaat Non-SAM Diusulkan Melalui Program PAMSIMAS (F)</td>';
						if($r->perencanaan_31 == '1'){
							echo'<td class="table-success text-center"><input type="checkbox" name="perencanaan_31" value="'.$r->perencanaan_31.'" checked></td>';
						}else{
							echo'<td class="table-danger text-center"><input type="checkbox" name="perencanaan_31" value="'.$r->perencanaan_31.'"></td>';
						}
						echo'
					</tr>
					<tr class="mailbox-messages">
						<td class="text-center">48</td>
						<td>Target Penerima Manfaat Non-SAM Diusulkan Melalui Pendanaan Lainnya (F)</td>';
						if($r->perencanaan_32 == '1'){
							echo'<td class="table-success text-center"><input type="checkbox" name="perencanaan_32" value="'.$r->perencanaan_32.'" checked></td>';
						}else{
							echo'<td class="table-danger text-center"><input type="checkbox" name="perencanaan_32" value="'.$r->perencanaan_32.'"></td>';
						}
						echo'
					</tr>
					<tr class="mailbox-messages">
						<td class="text-center">49</td>
						<td>Rencana Promosi Perubahan Perilaku STBM (F)</td>';
						if($r->perencanaan_33 == '1'){
							echo'<td class="table-success text-center"><input type="checkbox" name="perencanaan_33" value="'.$r->perencanaan_33.'" checked></td>';
						}else{
							echo'<td class="table-danger text-center"><input type="checkbox" name="perencanaan_33" value="'.$r->perencanaan_33.'"></td>';
						}
						echo'
					</tr>
					<tr class="mailbox-messages">
						<td class="text-center">50</td>
						<td>Rencana Pengamanan Lingkungan (F)</td>';
						if($r->perencanaan_34 == '1'){
							echo'<td class="table-success text-center"><input type="checkbox" name="perencanaan_34" value="'.$r->perencanaan_34.'" checked></td>';
						}else{
							echo'<td class="table-danger text-center"><input type="checkbox" name="perencanaan_34" value="'.$r->perencanaan_34.'"></td>';
						}
						echo'
					</tr>
					<tr class="mailbox-messages">
						<td class="text-center">51</td>
						<td>Rencana Pengamanan Lingkungan (FS)</td>';
						if($r->perencanaan_35 == '1'){
							echo'<td class="table-success text-center"><input type="checkbox" name="perencanaan_35" value="'.$r->perencanaan_35.'" checked></td>';
						}else{
							echo'<td class="table-danger text-center"><input type="checkbox" name="perencanaan_35" value="'.$r->perencanaan_35.'"></td>';
						}
						echo'
					</tr>
					<tr class="mailbox-messages">
						<td class="text-center">52</td>
						<td>Rencana Pengamanan Lingkungan (Kab)</td>';
						if($r->perencanaan_36 == '1'){
							echo'<td class="table-success text-center"><input type="checkbox" name="perencanaan_36" value="'.$r->perencanaan_36.'" checked></td>';
						}else{
							echo'<td class="table-danger text-center"><input type="checkbox" name="perencanaan_36" value="'.$r->perencanaan_36.'"></td>';
						}
						echo'
					</tr>
					<tr class="mailbox-messages">
						<td class="text-center">53</td>
						<td>Rencana Pengamanan Lingkungan (Prov)</td>';
						if($r->perencanaan_37 == '1'){
							echo'<td class="table-success text-center"><input type="checkbox" name="perencanaan_37" value="'.$r->perencanaan_37.'" checked></td>';
						}else{
							echo'<td class="table-danger text-center"><input type="checkbox" name="perencanaan_37" value="'.$r->perencanaan_37.'"></td>';
						}
						echo'
					</tr>
					<tr class="mailbox-messages">
						<td class="text-center">54</td>
						<td>EOF Desa Baru Tahap Persiapan - Perencanaan</td>';
						if($r->perencanaan_38 == '1'){
							echo'<td class="table-success text-center"><input type="checkbox" name="perencanaan_38" value="'.$r->perencanaan_38.'" checked></td>';
						}else{
							echo'<td class="table-danger text-center"><input type="checkbox" name="perencanaan_38" value="'.$r->perencanaan_38.'"></td>';
						}
						echo'
					</tr>
				</tbody>
			</table>
			<p class="text-right mt-3"><button type="submit" class="btn-sm btn-primary" onClick="tombolsweet()"><i class="fa fa-save"></i> Simpan Progres</button></p>
		</form';
	}else{
		echo'
		<table id="tableumum" class="table table-sm table-bordered table-hover">
			<thead>
				<tr>
					<th width="5%" class="align-middle">No</th>
					<th class="align-middle">Tahapan</th>
					<th class="align-middle">Kegiatan</th>
					<th width="7%">Status</th>
				</tr>
			</thead>
			<tbody>';
			$no = 1;
			$qry = $db->prepare("SELECT id_pemilihan, tahapan, kegiatan, link FROM imis_tahapan_pemilihan WHERE aktif='Y' ORDER BY urutan ASC");
			$qry->execute();
			$ada = $qry->get_result();
			while($q = $ada->fetch_object()){
				echo'
				<tr>
					<td class="text-center">'.$no.'</td>
					<td>'.$q->tahapan.'</td>
					<td>'.$q->kegiatan.'</td>';
						$field = $q->link;
						$qr = $db->prepare("SELECT tahun, id_pamsimas, id_kabkota, kabupaten, kecamatan, desa, tahun, $field FROM imis_progres_pemilihan WHERE tahun='$d2->tahun' AND id_pamsimas='$d3->id_pamsimas'");
						$qr->execute();
						$ad = $qr->get_result();
						while($t = $ad->fetch_object()){
							if($t->$field == '1'){
								echo'<td class="text-center table-success">Terentry</td>';
							}else{
								echo'<td class="text-center table-danger">Belum</td>';
							}
						}
					echo'
				</tr>';
				$no++;
			}
			echo'
			</tbody>
		</table>';
	}
}elseif(isset($_GET['tahun']) AND isset($_GET['id_kabkota']) AND isset($_GET['subtim'])){
	echo'
	<table id="tableumumtombolleft6" class="table table-hover table-striped table-bordered table-sm display wrap">
		<thead>
			<tr class="text-center">
				<th class="align-middle">No</th>
				<th class="align-middle">Kabupaten</th>
				<th class="align-middle">Kecamatan</th>
				<th class="align-middle">Desa</th>
				<th class="align-middle">Jenis Desa</th>
				<th class="align-middle">Bobot</th>';
				$qrydesa = $db->prepare("SELECT kegiatan, link FROM imis_tahapan_pemilihan WHERE aktif ='Y' ORDER BY urutan ASC");
				$qrydesa->execute();
				$dpt = $qrydesa->get_result();
				while($ds = $dpt->fetch_object()){
					echo'<th class="align-middle">'.$ds->kegiatan.'</th>';
				}
				echo'
				<th class="align-middle">Subtim</th>
				<th class="align-middle">Fasilitator</th>
				<th class="align-middle">Posisi</th>
			</tr>
		</thead>
		<tbody>';
			$no = 1;
			$qry = $db->query("SELECT id_pamsimas, tahun, id_kabkota, kabupaten, kecamatan, desa, persiapan_1, persiapan_2, persiapan_3, persiapan_4, persiapan_5, persiapan_6, persiapan_7, persiapan_8, persiapan_9, persiapan_10, persiapan_11, persiapan_12, persiapan_13, persiapan_14, persiapan_15, perencanaan_1, perencanaan_2, perencanaan_3, perencanaan_4, perencanaan_5, perencanaan_6, perencanaan_7, perencanaan_8, perencanaan_9, perencanaan_10, perencanaan_11, perencanaan_12, perencanaan_13, perencanaan_14, perencanaan_15, perencanaan_16, perencanaan_17, perencanaan_18, perencanaan_19, perencanaan_20, perencanaan_21, perencanaan_22, perencanaan_23, perencanaan_24, perencanaan_25, perencanaan_26, perencanaan_27, perencanaan_28, perencanaan_29, perencanaan_30, perencanaan_31, perencanaan_32, perencanaan_33, perencanaan_34, perencanaan_35, perencanaan_36, perencanaan_37, perencanaan_38, id_pribadi, subtim, nama_lengkap, posisi FROM imis_progres_pemilihan_view WHERE tahun='$d2->tahun' AND subtim='$d4->subtim' AND id_kabkota='$d->id_kabkota' ORDER BY desa ASC");
			while($r = $qry->fetch_object()){
				echo'
				<tr>
					<td>'.$no.'</td>
					<td>'.$r->kabupaten.'</td>
					<td>'.$r->kecamatan.'</td>
					<td><a href="?module='.$u->link.'&tahun='.$r->tahun.'&id_kabkota='.$r->id_kabkota.'&id_pamsimas='.$r->id_pamsimas.'">'.$r->desa.'</a></td>';
					$qr = $db->query("SELECT jenis_dana, bobot FROM imis_progres_pemilihan_view WHERE id_pamsimas='$r->id_pamsimas' AND tahun='$r->tahun'");
					while($dd = $qr->fetch_object()){
						echo'
						<td class="nowrap">'.$dd->jenis_dana.'</td>';
						if($dd->bobot == '100'){
							echo'<td class="table-success text-center"><b>'.$dd->bobot.'</b></td>';
						}else{
							echo'<td class="table-danger text-center"><b>'.$dd->bobot.'</b></td>';
						}
					}
					if($r->persiapan_1 == '1'){
						echo'<td class="table-success text-center">'.$r->persiapan_1.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->persiapan_1.'</td>';
					}
					if($r->persiapan_2 == '1'){
						echo'<td class="table-success text-center">'.$r->persiapan_2.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->persiapan_2.'</td>';
					}
					if($r->persiapan_3 == '1'){
						echo'<td class="table-success text-center">'.$r->persiapan_3.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->persiapan_3.'</td>';
					}
					if($r->persiapan_4 == '1'){
						echo'<td class="table-success text-center">'.$r->persiapan_4.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->persiapan_4.'</td>';
					}
					if($r->persiapan_5 == '1'){
						echo'<td class="table-success text-center">'.$r->persiapan_5.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->persiapan_5.'</td>';
					}
					if($r->persiapan_6 == '1'){
						echo'<td class="table-success text-center">'.$r->persiapan_6.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->persiapan_6.'</td>';
					}
					if($r->persiapan_7 == '1'){
						echo'<td class="table-success text-center">'.$r->persiapan_7.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->persiapan_7.'</td>';
					}
					if($r->persiapan_8 == '1'){
						echo'<td class="table-success text-center">'.$r->persiapan_8.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->persiapan_8.'</td>';
					}
					if($r->persiapan_9 == '1'){
						echo'<td class="table-success text-center">'.$r->persiapan_9.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->persiapan_9.'</td>';
					}
					if($r->persiapan_10 == '1'){
						echo'<td class="table-success text-center">'.$r->persiapan_10.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->persiapan_10.'</td>';
					}
					if($r->persiapan_11 == '1'){
						echo'<td class="table-success text-center">'.$r->persiapan_11.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->persiapan_11.'</td>';
					}
					if($r->persiapan_12 == '1'){
						echo'<td class="table-success text-center">'.$r->persiapan_12.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->persiapan_12.'</td>';
					}
					if($r->persiapan_13 == '1'){
						echo'<td class="table-success text-center">'.$r->persiapan_13.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->persiapan_13.'</td>';
					}
					if($r->persiapan_14 == '1'){
						echo'<td class="table-success text-center">'.$r->persiapan_14.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->persiapan_14.'</td>';
					}
					if($r->persiapan_15 == '1'){
						echo'<td class="table-success text-center">'.$r->persiapan_15.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->persiapan_15.'</td>';
					}
					if($r->perencanaan_1 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_1.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_1.'</td>';
					}
					if($r->perencanaan_2 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_2.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_2.'</td>';
					}
					if($r->perencanaan_3 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_3.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_3.'</td>';
					}
					if($r->perencanaan_4 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_4.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_4.'</td>';
					}
					if($r->perencanaan_5 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_5.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_5.'</td>';
					}
					if($r->perencanaan_6 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_6.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_6.'</td>';
					}
					if($r->perencanaan_7 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_7.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_7.'</td>';
					}
					if($r->perencanaan_8 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_8.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_8.'</td>';
					}
					if($r->perencanaan_9 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_9.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_9.'</td>';
					}
					if($r->perencanaan_10 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_10.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_10.'</td>';
					}
					if($r->perencanaan_11 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_11.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_11.'</td>';
					}
					if($r->perencanaan_12 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_12.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_12.'</td>';
					}
					if($r->perencanaan_13 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_13.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_13.'</td>';
					}
					if($r->perencanaan_14 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_14.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_14.'</td>';
					}
					if($r->perencanaan_15 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_15.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_15.'</td>';
					}
					if($r->perencanaan_16 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_16.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_16.'</td>';
					}
					if($r->perencanaan_17 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_17.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_17.'</td>';
					}
					if($r->perencanaan_18 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_18.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_18.'</td>';
					}
					if($r->perencanaan_19 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_19.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_19.'</td>';
					}
					if($r->perencanaan_20 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_20.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_20.'</td>';
					}
					if($r->perencanaan_21 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_21.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_21.'</td>';
					}
					if($r->perencanaan_22 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_22.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_22.'</td>';
					}
					if($r->perencanaan_23 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_23.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_23.'</td>';
					}
					if($r->perencanaan_24 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_24.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_24.'</td>';
					}
					if($r->perencanaan_25 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_25.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_25.'</td>';
					}
					if($r->perencanaan_26 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_26.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_26.'</td>';
					}
					if($r->perencanaan_27 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_27.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_27.'</td>';
					}
					if($r->perencanaan_28 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_28.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_28.'</td>';
					}
					if($r->perencanaan_29 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_29.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_29.'</td>';
					}
					if($r->perencanaan_30 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_30.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_30.'</td>';
					}
					if($r->perencanaan_31 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_31.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_31.'</td>';
					}
					if($r->perencanaan_32 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_32.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_32.'</td>';
					}
					if($r->perencanaan_33 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_33.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_33.'</td>';
					}
					if($r->perencanaan_34 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_34.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_34.'</td>';
					}
					if($r->perencanaan_35 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_35.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_35.'</td>';
					}
					if($r->perencanaan_36 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_36.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_36.'</td>';
					}
					if($r->perencanaan_37 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_37.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_37.'</td>';
					}
					if($r->perencanaan_38 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_38.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_38.'</td>';
					}
					echo'
					<td>'.$r->subtim.'</td>
					<td><a href="?module='.$u->link.'&tahun='.$r->tahun.'&id_kabkota='.$r->id_kabkota.'&subtim='.$r->subtim.'&id_pribadi='.$r->id_pribadi.'">'.$r->nama_lengkap.'</a></td>
					<td>'.$r->posisi.'</td>
				</tr>';
				$no++;
			}
			echo'
		</tbody>
		<tfoot>';
			$tqry = $db->query("SELECT tahun, bobot, persiapan_1, persiapan_2, persiapan_3, persiapan_4, persiapan_5, persiapan_6, persiapan_7, persiapan_8, persiapan_9, persiapan_10, persiapan_11, persiapan_12, persiapan_13, persiapan_14, persiapan_15, perencanaan_1, perencanaan_2, perencanaan_3, perencanaan_4, perencanaan_5, perencanaan_6, perencanaan_7, perencanaan_8, perencanaan_9, perencanaan_10, perencanaan_11, perencanaan_12, perencanaan_13, perencanaan_14, perencanaan_15, perencanaan_16, perencanaan_17, perencanaan_18, perencanaan_19, perencanaan_20, perencanaan_21, perencanaan_22, perencanaan_23, perencanaan_24, perencanaan_25, perencanaan_26, perencanaan_27, perencanaan_28, perencanaan_29, perencanaan_30, perencanaan_31, perencanaan_32, perencanaan_33, perencanaan_34, perencanaan_35, perencanaan_36, perencanaan_37, perencanaan_38 FROM imis_progres_pemilihan_view_prov WHERE tahun='$d2->tahun'");
			$tr = $tqry->fetch_object();
				echo'
				<tr>
					<td></td>
					<td><b></b></td>
					<td></td>
					<td></td>
					<td></td>
					<td><b>'.$tr->bobot.'</b></td><td><b>'.$tr->persiapan_1.'</b></td><td><b>'.$tr->persiapan_2.'</b></td><td><b>'.$tr->persiapan_3.'</b></td><td><b>'.$tr->persiapan_4.'</b></td><td><b>'.$tr->persiapan_5.'</b></td><td><b>'.$tr->persiapan_6.'</b></td><td><b>'.$tr->persiapan_7.'</b></td><td><b>'.$tr->persiapan_8.'</b></td><td><b>'.$tr->persiapan_9.'</b></td><td><b>'.$tr->persiapan_10.'</b></td><td><b>'.$tr->persiapan_11.'</b></td><td><b>'.$tr->persiapan_12.'</b></td><td><b>'.$tr->persiapan_13.'</b></td><td><b>'.$tr->persiapan_14.'</b></td><td><b>'.$tr->persiapan_15.'</b></td><td><b>'.$tr->perencanaan_1.'</b></td><td><b>'.$tr->perencanaan_2.'</b></td><td><b>'.$tr->perencanaan_3.'</b></td><td><b>'.$tr->perencanaan_4.'</b></td><td><b>'.$tr->perencanaan_5.'</b></td><td><b>'.$tr->perencanaan_6.'</b></td><td><b>'.$tr->perencanaan_7.'</b></td><td><b>'.$tr->perencanaan_8.'</b></td><td><b>'.$tr->perencanaan_9.'</b></td><td><b>'.$tr->perencanaan_10.'</b></td><td><b>'.$tr->perencanaan_11.'</b></td><td><b>'.$tr->perencanaan_12.'</b></td><td><b>'.$tr->perencanaan_13.'</b></td><td><b>'.$tr->perencanaan_14.'</b></td><td><b>'.$tr->perencanaan_15.'</b></td><td><b>'.$tr->perencanaan_16.'</b></td><td><b>'.$tr->perencanaan_17.'</b></td><td><b>'.$tr->perencanaan_18.'</b></td><td><b>'.$tr->perencanaan_19.'</b></td><td><b>'.$tr->perencanaan_20.'</b></td><td><b>'.$tr->perencanaan_21.'</b></td><td><b>'.$tr->perencanaan_22.'</b></td><td><b>'.$tr->perencanaan_23.'</b></td><td><b>'.$tr->perencanaan_24.'</b></td><td><b>'.$tr->perencanaan_25.'</b></td><td><b>'.$tr->perencanaan_26.'</b></td><td><b>'.$tr->perencanaan_27.'</b></td><td><b>'.$tr->perencanaan_28.'</b></td><td><b>'.$tr->perencanaan_29.'</b></td><td><b>'.$tr->perencanaan_30.'</b></td><td><b>'.$tr->perencanaan_31.'</b></td><td><b>'.$tr->perencanaan_32.'</b></td><td><b>'.$tr->perencanaan_33.'</b></td><td><b>'.$tr->perencanaan_34.'</b></td><td><b>'.$tr->perencanaan_35.'</b></td><td><b>'.$tr->perencanaan_36.'</b></td><td><b>'.$tr->perencanaan_37.'</b></td><td><b>'.$tr->perencanaan_38.'</b></td><td></td><td></td><td></td>
				</tr>
				';
			echo'
		</tfoot>
	</table>';
}elseif(isset($_GET['tahun']) AND isset($_GET['id_kabkota'])){
	echo'
	<table id="tableumumtombolleft6" class="table table-hover table-striped table-bordered table-sm display wrap">
		<thead>
			<tr class="text-center">
				<th class="align-middle">No</th>
				<th class="align-middle">Kabupaten</th>
				<th class="align-middle">Kecamatan</th>
				<th class="align-middle">Desa</th>
				<th class="align-middle">Jenis Desa</th>
				<th class="align-middle">Bobot</th>';
				$qrydesa = $db->prepare("SELECT kegiatan, link FROM imis_tahapan_pemilihan WHERE aktif ='Y' ORDER BY urutan ASC");
				$qrydesa->execute();
				$dpt = $qrydesa->get_result();
				while($ds = $dpt->fetch_object()){
					echo'<th class="align-middle">'.$ds->kegiatan.'</th>';
				}
				echo'
				<th class="align-middle">Subtim</th>
				<th class="align-middle">Fasilitator</th>
				<th class="align-middle">Posisi</th>
			</tr>
		</thead>
		<tbody>';
			$no = 1;
			$qry = $db->query("SELECT id_pamsimas, tahun, id_kabkota, kabupaten, kecamatan, desa, persiapan_1, persiapan_2, persiapan_3, persiapan_4, persiapan_5, persiapan_6, persiapan_7, persiapan_8, persiapan_9, persiapan_10, persiapan_11, persiapan_12, persiapan_13, persiapan_14, persiapan_15, perencanaan_1, perencanaan_2, perencanaan_3, perencanaan_4, perencanaan_5, perencanaan_6, perencanaan_7, perencanaan_8, perencanaan_9, perencanaan_10, perencanaan_11, perencanaan_12, perencanaan_13, perencanaan_14, perencanaan_15, perencanaan_16, perencanaan_17, perencanaan_18, perencanaan_19, perencanaan_20, perencanaan_21, perencanaan_22, perencanaan_23, perencanaan_24, perencanaan_25, perencanaan_26, perencanaan_27, perencanaan_28, perencanaan_29, perencanaan_30, perencanaan_31, perencanaan_32, perencanaan_33, perencanaan_34, perencanaan_35, perencanaan_36, perencanaan_37, perencanaan_38, id_pribadi, subtim, nama_lengkap, posisi FROM imis_progres_pemilihan_view WHERE tahun='$d2->tahun' AND id_kabkota='$d->id_kabkota' ORDER BY desa ASC");
			if($qry->num_rows > 0){
				while($r = $qry->fetch_object()){
					echo'
					<tr>
						<td>'.$no.'</td>
						<td>'.$r->kabupaten.'</td>
						<td>'.$r->kecamatan.'</td>
						<td><a href="?module='.$u->link.'&tahun='.$r->tahun.'&id_kabkota='.$r->id_kabkota.'&id_pamsimas='.$r->id_pamsimas.'">'.$r->desa.'</a></td>';
						$qr = $db->query("SELECT jenis_dana, bobot FROM imis_progres_pemilihan_view WHERE id_pamsimas='$r->id_pamsimas' AND tahun='$r->tahun'");
						while($dd = $qr->fetch_object()){
							echo'
							<td class="nowrap">'.$dd->jenis_dana.'</td>';
							if($dd->bobot == '100'){
								echo'<td class="table-success text-center"><b>'.$dd->bobot.'</b></td>';
							}else{
								echo'<td class="table-danger text-center"><b>'.$dd->bobot.'</b></td>';
							}
						}
						if($r->persiapan_1 == '1'){
							echo'<td class="table-success text-center">'.$r->persiapan_1.'</td>';
						}else{
							echo'<td class="table-danger text-center">'.$r->persiapan_1.'</td>';
						}
						if($r->persiapan_2 == '1'){
							echo'<td class="table-success text-center">'.$r->persiapan_2.'</td>';
						}else{
							echo'<td class="table-danger text-center">'.$r->persiapan_2.'</td>';
						}
						if($r->persiapan_3 == '1'){
							echo'<td class="table-success text-center">'.$r->persiapan_3.'</td>';
						}else{
							echo'<td class="table-danger text-center">'.$r->persiapan_3.'</td>';
						}
						if($r->persiapan_4 == '1'){
							echo'<td class="table-success text-center">'.$r->persiapan_4.'</td>';
						}else{
							echo'<td class="table-danger text-center">'.$r->persiapan_4.'</td>';
						}
						if($r->persiapan_5 == '1'){
							echo'<td class="table-success text-center">'.$r->persiapan_5.'</td>';
						}else{
							echo'<td class="table-danger text-center">'.$r->persiapan_5.'</td>';
						}
						if($r->persiapan_6 == '1'){
							echo'<td class="table-success text-center">'.$r->persiapan_6.'</td>';
						}else{
							echo'<td class="table-danger text-center">'.$r->persiapan_6.'</td>';
						}
						if($r->persiapan_7 == '1'){
							echo'<td class="table-success text-center">'.$r->persiapan_7.'</td>';
						}else{
							echo'<td class="table-danger text-center">'.$r->persiapan_7.'</td>';
						}
						if($r->persiapan_8 == '1'){
							echo'<td class="table-success text-center">'.$r->persiapan_8.'</td>';
						}else{
							echo'<td class="table-danger text-center">'.$r->persiapan_8.'</td>';
						}
						if($r->persiapan_9 == '1'){
							echo'<td class="table-success text-center">'.$r->persiapan_9.'</td>';
						}else{
							echo'<td class="table-danger text-center">'.$r->persiapan_9.'</td>';
						}
						if($r->persiapan_10 == '1'){
							echo'<td class="table-success text-center">'.$r->persiapan_10.'</td>';
						}else{
							echo'<td class="table-danger text-center">'.$r->persiapan_10.'</td>';
						}
						if($r->persiapan_11 == '1'){
							echo'<td class="table-success text-center">'.$r->persiapan_11.'</td>';
						}else{
							echo'<td class="table-danger text-center">'.$r->persiapan_11.'</td>';
						}
						if($r->persiapan_12 == '1'){
							echo'<td class="table-success text-center">'.$r->persiapan_12.'</td>';
						}else{
							echo'<td class="table-danger text-center">'.$r->persiapan_12.'</td>';
						}
						if($r->persiapan_13 == '1'){
							echo'<td class="table-success text-center">'.$r->persiapan_13.'</td>';
						}else{
							echo'<td class="table-danger text-center">'.$r->persiapan_13.'</td>';
						}
						if($r->persiapan_14 == '1'){
							echo'<td class="table-success text-center">'.$r->persiapan_14.'</td>';
						}else{
							echo'<td class="table-danger text-center">'.$r->persiapan_14.'</td>';
						}
						if($r->persiapan_15 == '1'){
							echo'<td class="table-success text-center">'.$r->persiapan_15.'</td>';
						}else{
							echo'<td class="table-danger text-center">'.$r->persiapan_15.'</td>';
						}
						if($r->perencanaan_1 == '1'){
							echo'<td class="table-success text-center">'.$r->perencanaan_1.'</td>';
						}else{
							echo'<td class="table-danger text-center">'.$r->perencanaan_1.'</td>';
						}
						if($r->perencanaan_2 == '1'){
							echo'<td class="table-success text-center">'.$r->perencanaan_2.'</td>';
						}else{
							echo'<td class="table-danger text-center">'.$r->perencanaan_2.'</td>';
						}
						if($r->perencanaan_3 == '1'){
							echo'<td class="table-success text-center">'.$r->perencanaan_3.'</td>';
						}else{
							echo'<td class="table-danger text-center">'.$r->perencanaan_3.'</td>';
						}
						if($r->perencanaan_4 == '1'){
							echo'<td class="table-success text-center">'.$r->perencanaan_4.'</td>';
						}else{
							echo'<td class="table-danger text-center">'.$r->perencanaan_4.'</td>';
						}
						if($r->perencanaan_5 == '1'){
							echo'<td class="table-success text-center">'.$r->perencanaan_5.'</td>';
						}else{
							echo'<td class="table-danger text-center">'.$r->perencanaan_5.'</td>';
						}
						if($r->perencanaan_6 == '1'){
							echo'<td class="table-success text-center">'.$r->perencanaan_6.'</td>';
						}else{
							echo'<td class="table-danger text-center">'.$r->perencanaan_6.'</td>';
						}
						if($r->perencanaan_7 == '1'){
							echo'<td class="table-success text-center">'.$r->perencanaan_7.'</td>';
						}else{
							echo'<td class="table-danger text-center">'.$r->perencanaan_7.'</td>';
						}
						if($r->perencanaan_8 == '1'){
							echo'<td class="table-success text-center">'.$r->perencanaan_8.'</td>';
						}else{
							echo'<td class="table-danger text-center">'.$r->perencanaan_8.'</td>';
						}
						if($r->perencanaan_9 == '1'){
							echo'<td class="table-success text-center">'.$r->perencanaan_9.'</td>';
						}else{
							echo'<td class="table-danger text-center">'.$r->perencanaan_9.'</td>';
						}
						if($r->perencanaan_10 == '1'){
							echo'<td class="table-success text-center">'.$r->perencanaan_10.'</td>';
						}else{
							echo'<td class="table-danger text-center">'.$r->perencanaan_10.'</td>';
						}
						if($r->perencanaan_11 == '1'){
							echo'<td class="table-success text-center">'.$r->perencanaan_11.'</td>';
						}else{
							echo'<td class="table-danger text-center">'.$r->perencanaan_11.'</td>';
						}
						if($r->perencanaan_12 == '1'){
							echo'<td class="table-success text-center">'.$r->perencanaan_12.'</td>';
						}else{
							echo'<td class="table-danger text-center">'.$r->perencanaan_12.'</td>';
						}
						if($r->perencanaan_13 == '1'){
							echo'<td class="table-success text-center">'.$r->perencanaan_13.'</td>';
						}else{
							echo'<td class="table-danger text-center">'.$r->perencanaan_13.'</td>';
						}
						if($r->perencanaan_14 == '1'){
							echo'<td class="table-success text-center">'.$r->perencanaan_14.'</td>';
						}else{
							echo'<td class="table-danger text-center">'.$r->perencanaan_14.'</td>';
						}
						if($r->perencanaan_15 == '1'){
							echo'<td class="table-success text-center">'.$r->perencanaan_15.'</td>';
						}else{
							echo'<td class="table-danger text-center">'.$r->perencanaan_15.'</td>';
						}
						if($r->perencanaan_16 == '1'){
							echo'<td class="table-success text-center">'.$r->perencanaan_16.'</td>';
						}else{
							echo'<td class="table-danger text-center">'.$r->perencanaan_16.'</td>';
						}
						if($r->perencanaan_17 == '1'){
							echo'<td class="table-success text-center">'.$r->perencanaan_17.'</td>';
						}else{
							echo'<td class="table-danger text-center">'.$r->perencanaan_17.'</td>';
						}
						if($r->perencanaan_18 == '1'){
							echo'<td class="table-success text-center">'.$r->perencanaan_18.'</td>';
						}else{
							echo'<td class="table-danger text-center">'.$r->perencanaan_18.'</td>';
						}
						if($r->perencanaan_19 == '1'){
							echo'<td class="table-success text-center">'.$r->perencanaan_19.'</td>';
						}else{
							echo'<td class="table-danger text-center">'.$r->perencanaan_19.'</td>';
						}
						if($r->perencanaan_20 == '1'){
							echo'<td class="table-success text-center">'.$r->perencanaan_20.'</td>';
						}else{
							echo'<td class="table-danger text-center">'.$r->perencanaan_20.'</td>';
						}
						if($r->perencanaan_21 == '1'){
							echo'<td class="table-success text-center">'.$r->perencanaan_21.'</td>';
						}else{
							echo'<td class="table-danger text-center">'.$r->perencanaan_21.'</td>';
						}
						if($r->perencanaan_22 == '1'){
							echo'<td class="table-success text-center">'.$r->perencanaan_22.'</td>';
						}else{
							echo'<td class="table-danger text-center">'.$r->perencanaan_22.'</td>';
						}
						if($r->perencanaan_23 == '1'){
							echo'<td class="table-success text-center">'.$r->perencanaan_23.'</td>';
						}else{
							echo'<td class="table-danger text-center">'.$r->perencanaan_23.'</td>';
						}
						if($r->perencanaan_24 == '1'){
							echo'<td class="table-success text-center">'.$r->perencanaan_24.'</td>';
						}else{
							echo'<td class="table-danger text-center">'.$r->perencanaan_24.'</td>';
						}
						if($r->perencanaan_25 == '1'){
							echo'<td class="table-success text-center">'.$r->perencanaan_25.'</td>';
						}else{
							echo'<td class="table-danger text-center">'.$r->perencanaan_25.'</td>';
						}
						if($r->perencanaan_26 == '1'){
							echo'<td class="table-success text-center">'.$r->perencanaan_26.'</td>';
						}else{
							echo'<td class="table-danger text-center">'.$r->perencanaan_26.'</td>';
						}
						if($r->perencanaan_27 == '1'){
							echo'<td class="table-success text-center">'.$r->perencanaan_27.'</td>';
						}else{
							echo'<td class="table-danger text-center">'.$r->perencanaan_27.'</td>';
						}
						if($r->perencanaan_28 == '1'){
							echo'<td class="table-success text-center">'.$r->perencanaan_28.'</td>';
						}else{
							echo'<td class="table-danger text-center">'.$r->perencanaan_28.'</td>';
						}
						if($r->perencanaan_29 == '1'){
							echo'<td class="table-success text-center">'.$r->perencanaan_29.'</td>';
						}else{
							echo'<td class="table-danger text-center">'.$r->perencanaan_29.'</td>';
						}
						if($r->perencanaan_30 == '1'){
							echo'<td class="table-success text-center">'.$r->perencanaan_30.'</td>';
						}else{
							echo'<td class="table-danger text-center">'.$r->perencanaan_30.'</td>';
						}
						if($r->perencanaan_31 == '1'){
							echo'<td class="table-success text-center">'.$r->perencanaan_31.'</td>';
						}else{
							echo'<td class="table-danger text-center">'.$r->perencanaan_31.'</td>';
						}
						if($r->perencanaan_32 == '1'){
							echo'<td class="table-success text-center">'.$r->perencanaan_32.'</td>';
						}else{
							echo'<td class="table-danger text-center">'.$r->perencanaan_32.'</td>';
						}
						if($r->perencanaan_33 == '1'){
							echo'<td class="table-success text-center">'.$r->perencanaan_33.'</td>';
						}else{
							echo'<td class="table-danger text-center">'.$r->perencanaan_33.'</td>';
						}
						if($r->perencanaan_34 == '1'){
							echo'<td class="table-success text-center">'.$r->perencanaan_34.'</td>';
						}else{
							echo'<td class="table-danger text-center">'.$r->perencanaan_34.'</td>';
						}
						if($r->perencanaan_35 == '1'){
							echo'<td class="table-success text-center">'.$r->perencanaan_35.'</td>';
						}else{
							echo'<td class="table-danger text-center">'.$r->perencanaan_35.'</td>';
						}
						if($r->perencanaan_36 == '1'){
							echo'<td class="table-success text-center">'.$r->perencanaan_36.'</td>';
						}else{
							echo'<td class="table-danger text-center">'.$r->perencanaan_36.'</td>';
						}
						if($r->perencanaan_37 == '1'){
							echo'<td class="table-success text-center">'.$r->perencanaan_37.'</td>';
						}else{
							echo'<td class="table-danger text-center">'.$r->perencanaan_37.'</td>';
						}
						if($r->perencanaan_38 == '1'){
							echo'<td class="table-success text-center">'.$r->perencanaan_38.'</td>';
						}else{
							echo'<td class="table-danger text-center">'.$r->perencanaan_38.'</td>';
						}
						echo'
						<td>'.$r->subtim.'</td>
						<td><a href="?module='.$u->link.'&tahun='.$r->tahun.'&id_kabkota='.$r->id_kabkota.'&subtim='.$r->subtim.'&id_pribadi='.$r->id_pribadi.'">'.$r->nama_lengkap.'</a></td>
						<td>'.$r->posisi.'</td>
					</tr>';
					$no++;
				}
			}else{
				echo'<tr><td colspan="62">Data tidak tersedia.</td></tr>';
			}
			echo'
		</tbody>
		<tfoot>';
			$tqry = $db->query("SELECT tahun, id_kabkota, kabupaten, bobot, persiapan_1, persiapan_2, persiapan_3, persiapan_4, persiapan_5, persiapan_6, persiapan_7, persiapan_8, persiapan_9, persiapan_10, persiapan_11, persiapan_12, persiapan_13, persiapan_14, persiapan_15, perencanaan_1, perencanaan_2, perencanaan_3, perencanaan_4, perencanaan_5, perencanaan_6, perencanaan_7, perencanaan_8, perencanaan_9, perencanaan_10, perencanaan_11, perencanaan_12, perencanaan_13, perencanaan_14, perencanaan_15, perencanaan_16, perencanaan_17, perencanaan_18, perencanaan_19, perencanaan_20, perencanaan_21, perencanaan_22, perencanaan_23, perencanaan_24, perencanaan_25, perencanaan_26, perencanaan_27, perencanaan_28, perencanaan_29, perencanaan_30, perencanaan_31, perencanaan_32, perencanaan_33, perencanaan_34, perencanaan_35, perencanaan_36, perencanaan_37, perencanaan_38 FROM imis_progres_pemilihan_view_kab WHERE tahun='$d2->tahun' AND id_kabkota='$d->id_kabkota'");
			if($tqry->num_rows > 0){
				$tr = $tqry->fetch_object();
					echo'
					<tr>
						<td></td>
						<td><b>'.$tr->kabupaten.'</b></td>
						<td></td>
						<td></td>
						<td></td>
						<td><b>'.$tr->bobot.'</b></td><td><b>'.$tr->persiapan_1.'</b></td><td><b>'.$tr->persiapan_2.'</b></td><td><b>'.$tr->persiapan_3.'</b></td><td><b>'.$tr->persiapan_4.'</b></td><td><b>'.$tr->persiapan_5.'</b></td><td><b>'.$tr->persiapan_6.'</b></td><td><b>'.$tr->persiapan_7.'</b></td><td><b>'.$tr->persiapan_8.'</b></td><td><b>'.$tr->persiapan_9.'</b></td><td><b>'.$tr->persiapan_10.'</b></td><td><b>'.$tr->persiapan_11.'</b></td><td><b>'.$tr->persiapan_12.'</b></td><td><b>'.$tr->persiapan_13.'</b></td><td><b>'.$tr->persiapan_14.'</b></td><td><b>'.$tr->persiapan_15.'</b></td><td><b>'.$tr->perencanaan_1.'</b></td><td><b>'.$tr->perencanaan_2.'</b></td><td><b>'.$tr->perencanaan_3.'</b></td><td><b>'.$tr->perencanaan_4.'</b></td><td><b>'.$tr->perencanaan_5.'</b></td><td><b>'.$tr->perencanaan_6.'</b></td><td><b>'.$tr->perencanaan_7.'</b></td><td><b>'.$tr->perencanaan_8.'</b></td><td><b>'.$tr->perencanaan_9.'</b></td><td><b>'.$tr->perencanaan_10.'</b></td><td><b>'.$tr->perencanaan_11.'</b></td><td><b>'.$tr->perencanaan_12.'</b></td><td><b>'.$tr->perencanaan_13.'</b></td><td><b>'.$tr->perencanaan_14.'</b></td><td><b>'.$tr->perencanaan_15.'</b></td><td><b>'.$tr->perencanaan_16.'</b></td><td><b>'.$tr->perencanaan_17.'</b></td><td><b>'.$tr->perencanaan_18.'</b></td><td><b>'.$tr->perencanaan_19.'</b></td><td><b>'.$tr->perencanaan_20.'</b></td><td><b>'.$tr->perencanaan_21.'</b></td><td><b>'.$tr->perencanaan_22.'</b></td><td><b>'.$tr->perencanaan_23.'</b></td><td><b>'.$tr->perencanaan_24.'</b></td><td><b>'.$tr->perencanaan_25.'</b></td><td><b>'.$tr->perencanaan_26.'</b></td><td><b>'.$tr->perencanaan_27.'</b></td><td><b>'.$tr->perencanaan_28.'</b></td><td><b>'.$tr->perencanaan_29.'</b></td><td><b>'.$tr->perencanaan_30.'</b></td><td><b>'.$tr->perencanaan_31.'</b></td><td><b>'.$tr->perencanaan_32.'</b></td><td><b>'.$tr->perencanaan_33.'</b></td><td><b>'.$tr->perencanaan_34.'</b></td><td><b>'.$tr->perencanaan_35.'</b></td><td><b>'.$tr->perencanaan_36.'</b></td><td><b>'.$tr->perencanaan_37.'</b></td><td><b>'.$tr->perencanaan_38.'</b></td><td></td><td></td><td></td>
					</tr>
					';
			}else{
				echo'<tr><td colspan="62"></td></tr>';
			}
				echo'
		</tfoot>
	</table>';
}elseif(isset($_GET['tahun'])){
	echo'
	<table id="tableumumtombolleft6" class="table table-hover table-striped table-bordered table-sm display wrap">
		<thead>
			<tr class="text-center">
				<th class="align-middle">No</th>
				<th class="align-middle">Kabupaten</th>
				<th class="align-middle">Kecamatan</th>
				<th class="align-middle">Desa</th>
				<th class="align-middle">Jenis Desa</th>
				<th class="align-middle">Bobot</th>';
				$qrydesa = $db->prepare("SELECT kegiatan, link FROM imis_tahapan_pemilihan WHERE aktif ='Y' ORDER BY urutan ASC");
				$qrydesa->execute();
				$dpt = $qrydesa->get_result();
				while($ds = $dpt->fetch_object()){
					echo'<th class="align-middle">'.$ds->kegiatan.'</th>';
				}
				echo'
				<th class="align-middle">Subtim</th>
				<th class="align-middle">Fasilitator</th>
				<th class="align-middle">Posisi</th>
			</tr>
		</thead>
		<tbody>';
			$no = 1;
			$qry = $db->query("SELECT id_pamsimas, tahun, id_kabkota, kabupaten, kecamatan, desa, persiapan_1, persiapan_2, persiapan_3, persiapan_4, persiapan_5, persiapan_6, persiapan_7, persiapan_8, persiapan_9, persiapan_10, persiapan_11, persiapan_12, persiapan_13, persiapan_14, persiapan_15, perencanaan_1, perencanaan_2, perencanaan_3, perencanaan_4, perencanaan_5, perencanaan_6, perencanaan_7, perencanaan_8, perencanaan_9, perencanaan_10, perencanaan_11, perencanaan_12, perencanaan_13, perencanaan_14, perencanaan_15, perencanaan_16, perencanaan_17, perencanaan_18, perencanaan_19, perencanaan_20, perencanaan_21, perencanaan_22, perencanaan_23, perencanaan_24, perencanaan_25, perencanaan_26, perencanaan_27, perencanaan_28, perencanaan_29, perencanaan_30, perencanaan_31, perencanaan_32, perencanaan_33, perencanaan_34, perencanaan_35, perencanaan_36, perencanaan_37, perencanaan_38, id_pribadi, subtim, nama_lengkap, posisi FROM imis_progres_pemilihan_view WHERE tahun='$d2->tahun' ORDER BY id_kabkota, desa ASC");
			while($r = $qry->fetch_object()){
				echo'
				<tr>
					<td>'.$no.'</td>
					<td>'.$r->kabupaten.'</td>
					<td>'.$r->kecamatan.'</td>
					<td><a href="?module='.$u->link.'&tahun='.$r->tahun.'&id_kabkota='.$r->id_kabkota.'&id_pamsimas='.$r->id_pamsimas.'">'.$r->desa.'</a></td>';
					$qr = $db->query("SELECT jenis_dana, bobot FROM imis_progres_pemilihan_view WHERE id_pamsimas='$r->id_pamsimas' AND tahun='$r->tahun'");
					while($dd = $qr->fetch_object()){
						echo'
						<td class="nowrap">'.$dd->jenis_dana.'</td>';
						if($dd->bobot == '100'){
							echo'<td class="table-success text-center"><b>'.$dd->bobot.'</b></td>';
						}else{
							echo'<td class="table-danger text-center"><b>'.$dd->bobot.'</b></td>';
						}
					}
					if($r->persiapan_1 == '1'){
						echo'<td class="table-success text-center">'.$r->persiapan_1.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->persiapan_1.'</td>';
					}
					if($r->persiapan_2 == '1'){
						echo'<td class="table-success text-center">'.$r->persiapan_2.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->persiapan_2.'</td>';
					}
					if($r->persiapan_3 == '1'){
						echo'<td class="table-success text-center">'.$r->persiapan_3.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->persiapan_3.'</td>';
					}
					if($r->persiapan_4 == '1'){
						echo'<td class="table-success text-center">'.$r->persiapan_4.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->persiapan_4.'</td>';
					}
					if($r->persiapan_5 == '1'){
						echo'<td class="table-success text-center">'.$r->persiapan_5.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->persiapan_5.'</td>';
					}
					if($r->persiapan_6 == '1'){
						echo'<td class="table-success text-center">'.$r->persiapan_6.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->persiapan_6.'</td>';
					}
					if($r->persiapan_7 == '1'){
						echo'<td class="table-success text-center">'.$r->persiapan_7.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->persiapan_7.'</td>';
					}
					if($r->persiapan_8 == '1'){
						echo'<td class="table-success text-center">'.$r->persiapan_8.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->persiapan_8.'</td>';
					}
					if($r->persiapan_9 == '1'){
						echo'<td class="table-success text-center">'.$r->persiapan_9.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->persiapan_9.'</td>';
					}
					if($r->persiapan_10 == '1'){
						echo'<td class="table-success text-center">'.$r->persiapan_10.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->persiapan_10.'</td>';
					}
					if($r->persiapan_11 == '1'){
						echo'<td class="table-success text-center">'.$r->persiapan_11.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->persiapan_11.'</td>';
					}
					if($r->persiapan_12 == '1'){
						echo'<td class="table-success text-center">'.$r->persiapan_12.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->persiapan_12.'</td>';
					}
					if($r->persiapan_13 == '1'){
						echo'<td class="table-success text-center">'.$r->persiapan_13.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->persiapan_13.'</td>';
					}
					if($r->persiapan_14 == '1'){
						echo'<td class="table-success text-center">'.$r->persiapan_14.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->persiapan_14.'</td>';
					}
					if($r->persiapan_15 == '1'){
						echo'<td class="table-success text-center">'.$r->persiapan_15.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->persiapan_15.'</td>';
					}
					if($r->perencanaan_1 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_1.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_1.'</td>';
					}
					if($r->perencanaan_2 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_2.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_2.'</td>';
					}
					if($r->perencanaan_3 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_3.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_3.'</td>';
					}
					if($r->perencanaan_4 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_4.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_4.'</td>';
					}
					if($r->perencanaan_5 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_5.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_5.'</td>';
					}
					if($r->perencanaan_6 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_6.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_6.'</td>';
					}
					if($r->perencanaan_7 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_7.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_7.'</td>';
					}
					if($r->perencanaan_8 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_8.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_8.'</td>';
					}
					if($r->perencanaan_9 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_9.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_9.'</td>';
					}
					if($r->perencanaan_10 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_10.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_10.'</td>';
					}
					if($r->perencanaan_11 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_11.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_11.'</td>';
					}
					if($r->perencanaan_12 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_12.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_12.'</td>';
					}
					if($r->perencanaan_13 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_13.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_13.'</td>';
					}
					if($r->perencanaan_14 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_14.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_14.'</td>';
					}
					if($r->perencanaan_15 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_15.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_15.'</td>';
					}
					if($r->perencanaan_16 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_16.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_16.'</td>';
					}
					if($r->perencanaan_17 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_17.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_17.'</td>';
					}
					if($r->perencanaan_18 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_18.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_18.'</td>';
					}
					if($r->perencanaan_19 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_19.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_19.'</td>';
					}
					if($r->perencanaan_20 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_20.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_20.'</td>';
					}
					if($r->perencanaan_21 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_21.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_21.'</td>';
					}
					if($r->perencanaan_22 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_22.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_22.'</td>';
					}
					if($r->perencanaan_23 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_23.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_23.'</td>';
					}
					if($r->perencanaan_24 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_24.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_24.'</td>';
					}
					if($r->perencanaan_25 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_25.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_25.'</td>';
					}
					if($r->perencanaan_26 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_26.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_26.'</td>';
					}
					if($r->perencanaan_27 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_27.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_27.'</td>';
					}
					if($r->perencanaan_28 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_28.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_28.'</td>';
					}
					if($r->perencanaan_29 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_29.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_29.'</td>';
					}
					if($r->perencanaan_30 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_30.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_30.'</td>';
					}
					if($r->perencanaan_31 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_31.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_31.'</td>';
					}
					if($r->perencanaan_32 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_32.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_32.'</td>';
					}
					if($r->perencanaan_33 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_33.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_33.'</td>';
					}
					if($r->perencanaan_34 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_34.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_34.'</td>';
					}
					if($r->perencanaan_35 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_35.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_35.'</td>';
					}
					if($r->perencanaan_36 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_36.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_36.'</td>';
					}
					if($r->perencanaan_37 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_37.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_37.'</td>';
					}
					if($r->perencanaan_38 == '1'){
						echo'<td class="table-success text-center">'.$r->perencanaan_38.'</td>';
					}else{
						echo'<td class="table-danger text-center">'.$r->perencanaan_38.'</td>';
					}
					echo'
					<td>'.$r->subtim.'</td>
					<td><a href="?module='.$u->link.'&tahun='.$r->tahun.'&id_kabkota='.$r->id_kabkota.'&subtim='.$r->subtim.'&id_pribadi='.$r->id_pribadi.'">'.$r->nama_lengkap.'</a></td>
					<td>'.$r->posisi.'</td>
				</tr>';
				$no++;
			}
			echo'
		</tbody>
		<tfoot>';
			$tqry = $db->query("SELECT tahun, bobot, persiapan_1, persiapan_2, persiapan_3, persiapan_4, persiapan_5, persiapan_6, persiapan_7, persiapan_8, persiapan_9, persiapan_10, persiapan_11, persiapan_12, persiapan_13, persiapan_14, persiapan_15, perencanaan_1, perencanaan_2, perencanaan_3, perencanaan_4, perencanaan_5, perencanaan_6, perencanaan_7, perencanaan_8, perencanaan_9, perencanaan_10, perencanaan_11, perencanaan_12, perencanaan_13, perencanaan_14, perencanaan_15, perencanaan_16, perencanaan_17, perencanaan_18, perencanaan_19, perencanaan_20, perencanaan_21, perencanaan_22, perencanaan_23, perencanaan_24, perencanaan_25, perencanaan_26, perencanaan_27, perencanaan_28, perencanaan_29, perencanaan_30, perencanaan_31, perencanaan_32, perencanaan_33, perencanaan_34, perencanaan_35, perencanaan_36, perencanaan_37, perencanaan_38 FROM imis_progres_pemilihan_view_prov WHERE tahun='$d2->tahun'");
			$tr = $tqry->fetch_object();
				echo'
				<tr>
					<td></td>
					<td><b></b></td>
					<td></td>
					<td></td>
					<td></td>
					<td><b>'.$tr->bobot.'</b></td><td><b>'.$tr->persiapan_1.'</b></td><td><b>'.$tr->persiapan_2.'</b></td><td><b>'.$tr->persiapan_3.'</b></td><td><b>'.$tr->persiapan_4.'</b></td><td><b>'.$tr->persiapan_5.'</b></td><td><b>'.$tr->persiapan_6.'</b></td><td><b>'.$tr->persiapan_7.'</b></td><td><b>'.$tr->persiapan_8.'</b></td><td><b>'.$tr->persiapan_9.'</b></td><td><b>'.$tr->persiapan_10.'</b></td><td><b>'.$tr->persiapan_11.'</b></td><td><b>'.$tr->persiapan_12.'</b></td><td><b>'.$tr->persiapan_13.'</b></td><td><b>'.$tr->persiapan_14.'</b></td><td><b>'.$tr->persiapan_15.'</b></td><td><b>'.$tr->perencanaan_1.'</b></td><td><b>'.$tr->perencanaan_2.'</b></td><td><b>'.$tr->perencanaan_3.'</b></td><td><b>'.$tr->perencanaan_4.'</b></td><td><b>'.$tr->perencanaan_5.'</b></td><td><b>'.$tr->perencanaan_6.'</b></td><td><b>'.$tr->perencanaan_7.'</b></td><td><b>'.$tr->perencanaan_8.'</b></td><td><b>'.$tr->perencanaan_9.'</b></td><td><b>'.$tr->perencanaan_10.'</b></td><td><b>'.$tr->perencanaan_11.'</b></td><td><b>'.$tr->perencanaan_12.'</b></td><td><b>'.$tr->perencanaan_13.'</b></td><td><b>'.$tr->perencanaan_14.'</b></td><td><b>'.$tr->perencanaan_15.'</b></td><td><b>'.$tr->perencanaan_16.'</b></td><td><b>'.$tr->perencanaan_17.'</b></td><td><b>'.$tr->perencanaan_18.'</b></td><td><b>'.$tr->perencanaan_19.'</b></td><td><b>'.$tr->perencanaan_20.'</b></td><td><b>'.$tr->perencanaan_21.'</b></td><td><b>'.$tr->perencanaan_22.'</b></td><td><b>'.$tr->perencanaan_23.'</b></td><td><b>'.$tr->perencanaan_24.'</b></td><td><b>'.$tr->perencanaan_25.'</b></td><td><b>'.$tr->perencanaan_26.'</b></td><td><b>'.$tr->perencanaan_27.'</b></td><td><b>'.$tr->perencanaan_28.'</b></td><td><b>'.$tr->perencanaan_29.'</b></td><td><b>'.$tr->perencanaan_30.'</b></td><td><b>'.$tr->perencanaan_31.'</b></td><td><b>'.$tr->perencanaan_32.'</b></td><td><b>'.$tr->perencanaan_33.'</b></td><td><b>'.$tr->perencanaan_34.'</b></td><td><b>'.$tr->perencanaan_35.'</b></td><td><b>'.$tr->perencanaan_36.'</b></td><td><b>'.$tr->perencanaan_37.'</b></td><td><b>'.$tr->perencanaan_38.'</b></td><td></td><td></td><td></td>
				</tr>
				';
			echo'
		</tfoot>
	</table>';
}elseif(isset($_GET['id_kabkota'])){
	echo'
	<div class="btn-actions-pane-right">
		<div role="group" class="btn-group-sm nav btn-group">
			<a data-toggle="tab" href="#tab-eg1-0" class="btn-shadow active btn btn-primary">Grafik Fasilitator</a>
			<a data-toggle="tab" href="#tab-eg1-1" class="btn-shadow btn btn-primary">Grafik FS</a>
			<a data-toggle="tab" href="#tab-eg1-2" class="btn-shadow btn btn-primary">Resume Data</a>
		</div>
	</div>
	<div class="tab-content">
		<div class="tab-pane active" id="tab-eg1-0" role="tabpanel">
			<h4 class="text-center mt-3">Grafik Kelengkapan Modul 1 & 2 Kabupaten '.$d->nama_kabkota.'</h4>
			<div id="datagrafikfas" style="min-height:600px;padding:5px;"></div>
			<table id="ratafas" style="display:none">
				<thead>
					<tr>
						<th></th>
						<th>Progres Input</th>
					</tr>
				</thead><tbody>';
					$grafik	= $db->query("SELECT id_pribadi, nama_lengkap, posisi, bobot FROM imis_progres_pemilihan_fasilitator WHERE id_kabkota='$d->id_kabkota' ORDER BY bobot DESC");
					while($p = $grafik->fetch_object()){
						echo'
						<tr>
							<td>'.$p->nama_lengkap.'</td>';
							$grafik2 = $db->query("SELECT bobot FROM imis_progres_pemilihan_fasilitator WHERE id_pribadi='$p->id_pribadi' AND id_kabkota='$d->id_kabkota' ORDER BY bobot DESC");
							while ($row2 = $grafik2->fetch_object()){
								echo'<td>'.$row2->bobot.'</td>';
							}
							echo'
						</tr>';
					}
				echo'
			</table>
		</div>
		<div class="tab-pane" id="tab-eg1-1" role="tabpanel">
			<h4 class="text-center mt-3">Grafik Kelengkapan Modul 1 & 2 Fasilitator Senior</h4>
			<div id="datagrafikfs" style="min-height:200px;padding:5px;"></div>
			<table id="ratafs" style="display:none">
				<thead>
					<tr>
						<th></th>
						<th>Progres Verifikasi</th>
					</tr>
				</thead><tbody>';
					$grafik	= $db->query("SELECT id_pribadi, nama_lengkap, posisi, bobot, kabupaten FROM imis_progres_pemilihan_view_fs_rekap WHERE id_kabkota='$d->id_kabkota' ORDER BY bobot DESC");
					while($p = $grafik->fetch_object()){
						echo'
						<tr>
							<td>'.$p->nama_lengkap.' ('.$p->posisi.')</td>';
							$grafik2 = $db->query("SELECT bobot FROM imis_progres_pemilihan_view_fs_rekap WHERE id_pribadi='$p->id_pribadi' AND id_kabkota='$d->id_kabkota' ORDER BY bobot DESC");
							while ($row2 = $grafik2->fetch_object()){
								echo'<td>'.$row2->bobot.'</td>';
							}
							echo'
						</tr>';
					}
				echo'
			</table>
		</div>
		<div class="tab-pane" id="tab-eg1-2" role="tabpanel">
			<h4 class="mb-3 text-center">Resume Progres Input Data IMIS Modul 1 & 2</h4>
			<table id="tableumum" class="table table-sm table-striped table-hover table-bordered">
				<thead>
					<tr>
						<th width="5%">No</th>
						<th width="10%">Kabupaten</th>
						<th>Fasilitator</th>
						<th width="10%">Posisi</th>
						<th>Subtim</th>
						<th>Total Desa</th>
						<th width="10%">Progres Input</th>
					</tr>
				</thead>
				<tbody>';
				$no = 1;
				$qry = $db->query("SELECT nama_lengkap, posisi, subtim, id_pribadi, id_kabkota, kabupaten, totaldesa, bobot FROM imis_progres_pemilihan_fasilitator WHERE id_kabkota='$d->id_kabkota' ORDER BY id_kabkota, nama_lengkap ASC");
				while($r = $qry->fetch_object()){
					echo'
					<tr>
						<td>'.$no.'</td>
						<td>'.$r->kabupaten.'</td>
						<td>'.strtoupper($r->nama_lengkap).'</td>
						<td>'.$r->posisi.'</td>
						<td>'.$r->subtim.'</td>
						<td>'.$r->totaldesa.'</td>';
						if($r->bobot == '100'){
							echo'<td class="text-center table-success"><b>'.$r->bobot.'</b></td>';
						}elseif($r->bobot == '0'){
							echo'<td class="text-center table-danger"><b>'.$r->bobot.'</b></td>';
						}else{
							echo'<td class="text-center table-warning"><b>'.$r->bobot.'</b></td>';
						}
						echo'
					</tr>';
					$no++;
				}
				echo'
				</tbody>
			</table>
		</div>
	</div>';
}else{
	echo'
	<div class="btn-actions-pane-right">
		<div role="group" class="btn-group-sm nav btn-group">
			<a data-toggle="tab" href="#tab-eg1-0" class="btn-shadow active btn btn-primary">Grafik Kabupaten</a>
			<a data-toggle="tab" href="#tab-eg1-1" class="btn-shadow btn btn-primary">Grafik FS</a>
			<a data-toggle="tab" href="#tab-eg1-2" class="btn-shadow btn btn-primary">Grafik Fasilitator</a>
			<a data-toggle="tab" href="#tab-eg1-3" class="btn-shadow btn btn-primary">Resume Data</a>
		</div>
	</div>
	<div class="tab-content">
		<div class="tab-pane active" id="tab-eg1-0" role="tabpanel">
			<h4 class="text-center mt-3">Grafik Kelengkapan Modul 1 & 2 Kabupaten</h4>
			<div id="datagrafikkab" style="min-height:400px;padding:5px;"></div>
			<table id="ratakab" style="display:none">
				<thead>
					<tr>
						<th></th>
						<th>Progres Input</th>
					</tr>
				</thead><tbody>';
					$grafik	= $db->query("SELECT id_kabkota, kabupaten, bobot FROM imis_progres_pemilihan_view_kab ORDER BY id_kabkota ASC");
					while($p = $grafik->fetch_object()){
						echo'
						<tr>
							<td>'.$p->kabupaten.'</td>';
							$grafik2 = $db->query("SELECT bobot FROM imis_progres_pemilihan_view_kab WHERE id_kabkota='$p->id_kabkota' ORDER BY id_kabkota ASC");
							while ($row2 = $grafik2->fetch_object()){
								echo'<td>'.$row2->bobot.'</td>';
							}
							echo'
						</tr>';
					}
				echo'
			</table>
		</div>
		<div class="tab-pane" id="tab-eg1-1" role="tabpanel">
			<h4 class="text-center mt-3">Grafik Kelengkapan Modul 1 & 2 Fasilitator Senior</h4>
			<div id="datagrafikfs" style="min-height:450px;padding:5px;"></div>
			<table id="ratafs" style="display:none">
				<thead>
					<tr>
						<th></th>
						<th>Progres Verifikasi</th>
					</tr>
				</thead><tbody>';
					$grafik	= $db->query("SELECT id_pribadi, nama_lengkap, posisi, bobot, kabupaten FROM imis_progres_pemilihan_view_fs_rekap ORDER BY bobot DESC");
					while($p = $grafik->fetch_object()){
						echo'
						<tr>
							<td>'.$p->nama_lengkap.' ('.$p->posisi.')</td>';
							$grafik2 = $db->query("SELECT bobot FROM imis_progres_pemilihan_view_fs_rekap WHERE id_pribadi='$p->id_pribadi' ORDER BY bobot DESC");
							while ($row2 = $grafik2->fetch_object()){
								echo'<td>'.$row2->bobot.'</td>';
							}
							echo'
						</tr>';
					}
				echo'
			</table>
		</div>
		<div class="tab-pane" id="tab-eg1-2" role="tabpanel">
			<h4 class="text-center mt-3">Grafik Kelengkapan Modul 1 & 2 Fasilitator</h4>
			<div id="datagrafikfas" style="min-height:1000px;padding:5px;"></div>
			<table id="ratafas" style="display:none">
				<thead>
					<tr>
						<th></th>
						<th>Progres Input</th>
					</tr>
				</thead><tbody>';
					$grafik	= $db->query("SELECT id_pribadi, nama_lengkap, posisi, bobot, kabupaten FROM imis_progres_pemilihan_fasilitator ORDER BY bobot DESC");
					while($p = $grafik->fetch_object()){
						echo'
						<tr>
							<td>'.$p->nama_lengkap.' ('.$p->posisi.')</td>';
							$grafik2 = $db->query("SELECT bobot FROM imis_progres_pemilihan_fasilitator WHERE id_pribadi='$p->id_pribadi' ORDER BY bobot DESC");
							while ($row2 = $grafik2->fetch_object()){
								echo'<td>'.$row2->bobot.'</td>';
							}
							echo'
						</tr>';
					}
				echo'
			</table>
		</div>
		<div class="tab-pane" id="tab-eg1-3" role="tabpanel">
			<h4 class="mb-3 text-center mt-3">Resume Progres Input Data IMIS Modul 1 & 2</h4>
			<table id="tableumum" class="table table-sm table-striped table-hover table-bordered">
				<thead>
					<tr>
						<th width="5%">No</th>
						<th width="10%">Kabupaten</th>
						<th>Fasilitator</th>
						<th width="10%">Posisi</th>
						<th>Subtim</th>
						<th>Total Desa</th>
						<th width="10%">Progres Input</th>
					</tr>
				</thead>
				<tbody>';
				$no = 1;
				$qry = $db->query("SELECT nama_lengkap, posisi, subtim, id_pribadi, id_kabkota, kabupaten, totaldesa, bobot FROM imis_progres_pemilihan_fasilitator ORDER BY id_kabkota, nama_lengkap ASC");
				while($r = $qry->fetch_object()){
					echo'
					<tr>
						<td>'.$no.'</td>
						<td>'.$r->kabupaten.'</td>
						<td>'.strtoupper($r->nama_lengkap).'</td>
						<td>'.$r->posisi.'</td>
						<td>'.$r->subtim.'</td>
						<td>'.$r->totaldesa.'</td>';
						if($r->bobot == '100'){
							echo'<td class="text-center table-success"><b>'.$r->bobot.'</b></td>';
						}elseif($r->bobot == '0'){
							echo'<td class="text-center table-danger"><b>'.$r->bobot.'</b></td>';
						}else{
							echo'<td class="text-center table-warning"><b>'.$r->bobot.'</b></td>';
						}
						echo'
					</tr>';
					$no++;
				}
				echo'
				</tbody>
			</table>
		</div>
	</div>';
}
include_once("modul_tambahan/".$aw->alamat_website."/mod_imis/card-bottom.php");
?>