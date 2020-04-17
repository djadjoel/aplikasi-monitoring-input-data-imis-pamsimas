<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
	header('location:../index.php');
}else{
	include "../../../../../../asset/fungsi/koneksi.php";
	include "../../../../../../asset/fungsi/library.php";
	include "../../../../../../asset/fungsi/fungsi_indotgl.php";
	include "../../../../../../asset/fungsi/fungsi_rupiah.php";
	$module	= $_GET['module'];
	$act	= $_GET['act'];

	if(isset($_GET['id_kabkota'])){
		$kab = abs((int)$_GET['id_kabkota']);
		$add = $db->query("SELECT id_kabkota, nama_kabkota FROM data_kabkota WHERE id_kabkota='$kab'");
		$d = $add->fetch_object();
	}
	if(isset($_GET['tahun'])){
		$tahun = abs((int)$_GET['tahun']);
		$add2 = $db->query("SELECT tahun FROM imis_progres_pemilihan WHERE tahun='$tahun' GROUP BY tahun");
		$d2 = $add2->fetch_object();
	}
	if(isset($_GET['id_pamsimas'])){
		$id_pamsimas = abs((int)$_GET['id_pamsimas']);
		$add3 = $db->query("SELECT id_pamsimas, kabupaten, kecamatan, desa FROM imis_progres_pemilihan WHERE id_pamsimas='$id_pamsimas'");
		$d3 = $add3->fetch_object();
	}

	if ($module=='imis_12' AND $act=='updatetahapan'){
		$id_pamsimas = abs((int)$_POST['id_pamsimas']);
		$tahun = abs((int)$_POST['tahun']);
		if (isset($_POST['persiapan_1'])){
			$persiapan_1 = "1";
		}else{
			$persiapan_1 = "";
		}
		if (isset($_POST['persiapan_2'])){
			$persiapan_2 = "1";
		}else{
			$persiapan_2 = "";
		}
		if (isset($_POST['persiapan_3'])){
			$persiapan_3 = "1";
		}else{
			$persiapan_3 = "";
		}
		if (isset($_POST['persiapan_4'])){
			$persiapan_4 = "1";
		}else{
			$persiapan_4 = "";
		}
		if (isset($_POST['persiapan_5'])){
			$persiapan_5 = "1";
		}else{
			$persiapan_5 = "";
		}
		if (isset($_POST['persiapan_6'])){
			$persiapan_6 = "1";
		}else{
			$persiapan_6 = "";
		}
		if (isset($_POST['persiapan_7'])){
			$persiapan_7 = "1";
		}else{
			$persiapan_7 = "";
		}
		if (isset($_POST['persiapan_8'])){
			$persiapan_8 = "1";
		}else{
			$persiapan_8 = "";
		}
		if (isset($_POST['persiapan_9'])){
			$persiapan_9 = "1";
		}else{
			$persiapan_9 = "";
		}
		if (isset($_POST['persiapan_10'])){
			$persiapan_10 = "1";
		}else{
			$persiapan_10 = "";
		}
		if (isset($_POST['persiapan_11'])){
			$persiapan_11 = "1";
		}else{
			$persiapan_11 = "";
		}
		if (isset($_POST['persiapan_12'])){
			$persiapan_12 = "1";
		}else{
			$persiapan_12 = "";
		}
		if (isset($_POST['persiapan_13'])){
			$persiapan_13 = "1";
		}else{
			$persiapan_13 = "";
		}
		if (isset($_POST['persiapan_14'])){
			$persiapan_14 = "1";
		}else{
			$persiapan_14 = "";
		}
		if (isset($_POST['persiapan_15'])){
			$persiapan_15 = "1";
		}else{
			$persiapan_15 = "";
		}
		if (isset($_POST['perencanaan_1'])){
			$perencanaan_1 = "1";
		}else{
			$perencanaan_1 = "";
		}
		if (isset($_POST['perencanaan_2'])){
			$perencanaan_2 = "1";
		}else{
			$perencanaan_2 = "";
		}
		if (isset($_POST['perencanaan_3'])){
			$perencanaan_3 = "1";
		}else{
			$perencanaan_3 = "";
		}
		if (isset($_POST['perencanaan_4'])){
			$perencanaan_4 = "1";
		}else{
			$perencanaan_4 = "";
		}
		if (isset($_POST['perencanaan_5'])){
			$perencanaan_5 = "1";
		}else{
			$perencanaan_5 = "";
		}
		if (isset($_POST['perencanaan_6'])){
			$perencanaan_6 = "1";
		}else{
			$perencanaan_6 = "";
		}
		if (isset($_POST['perencanaan_7'])){
			$perencanaan_7 = "1";
		}else{
			$perencanaan_7 = "";
		}
		if (isset($_POST['perencanaan_8'])){
			$perencanaan_8 = "1";
		}else{
			$perencanaan_8 = "";
		}
		if (isset($_POST['perencanaan_9'])){
			$perencanaan_9 = "1";
		}else{
			$perencanaan_9 = "";
		}
		if (isset($_POST['perencanaan_10'])){
			$perencanaan_10 = "1";
		}else{
			$perencanaan_10 = "";
		}
		if (isset($_POST['perencanaan_11'])){
			$perencanaan_11 = "1";
		}else{
			$perencanaan_11 = "";
		}
		if (isset($_POST['perencanaan_12'])){
			$perencanaan_12 = "1";
		}else{
			$perencanaan_12 = "";
		}
		if (isset($_POST['perencanaan_13'])){
			$perencanaan_13 = "1";
		}else{
			$perencanaan_13 = "";
		}
		if (isset($_POST['perencanaan_14'])){
			$perencanaan_14 = "1";
		}else{
			$perencanaan_14 = "";
		}
		if (isset($_POST['perencanaan_15'])){
			$perencanaan_15 = "1";
		}else{
			$perencanaan_15 = "";
		}
		if (isset($_POST['perencanaan_16'])){
			$perencanaan_16 = "1";
		}else{
			$perencanaan_16 = "";
		}
		if (isset($_POST['perencanaan_17'])){
			$perencanaan_17 = "1";
		}else{
			$perencanaan_17 = "";
		}
		if (isset($_POST['perencanaan_18'])){
			$perencanaan_18 = "1";
		}else{
			$perencanaan_18 = "";
		}
		if (isset($_POST['perencanaan_19'])){
			$perencanaan_19 = "1";
		}else{
			$perencanaan_19 = "";
		}
		if (isset($_POST['perencanaan_20'])){
			$perencanaan_20 = "1";
		}else{
			$perencanaan_20 = "";
		}
		if (isset($_POST['perencanaan_21'])){
			$perencanaan_21 = "1";
		}else{
			$perencanaan_21 = "";
		}
		if (isset($_POST['perencanaan_22'])){
			$perencanaan_22 = "1";
		}else{
			$perencanaan_22 = "";
		}
		if (isset($_POST['perencanaan_23'])){
			$perencanaan_23 = "1";
		}else{
			$perencanaan_23 = "";
		}
		if (isset($_POST['perencanaan_24'])){
			$perencanaan_24 = "1";
		}else{
			$perencanaan_24 = "";
		}
		if (isset($_POST['perencanaan_25'])){
			$perencanaan_25 = "1";
		}else{
			$perencanaan_25 = "";
		}
		if (isset($_POST['perencanaan_26'])){
			$perencanaan_26 = "1";
		}else{
			$perencanaan_26 = "";
		}
		if (isset($_POST['perencanaan_27'])){
			$perencanaan_27 = "1";
		}else{
			$perencanaan_27 = "";
		}
		if (isset($_POST['perencanaan_28'])){
			$perencanaan_28 = "1";
		}else{
			$perencanaan_28 = "";
		}
		if (isset($_POST['perencanaan_29'])){
			$perencanaan_29 = "1";
		}else{
			$perencanaan_29 = "";
		}
		if (isset($_POST['perencanaan_30'])){
			$perencanaan_30 = "1";
		}else{
			$perencanaan_30 = "";
		}
		if (isset($_POST['perencanaan_31'])){
			$perencanaan_31 = "1";
		}else{
			$perencanaan_31 = "";
		}
		if (isset($_POST['perencanaan_32'])){
			$perencanaan_32 = "1";
		}else{
			$perencanaan_32 = "";
		}
		if (isset($_POST['perencanaan_33'])){
			$perencanaan_33 = "1";
		}else{
			$perencanaan_33 = "";
		}
		if (isset($_POST['perencanaan_34'])){
			$perencanaan_34 = "1";
		}else{
			$perencanaan_34 = "";
		}
		if (isset($_POST['perencanaan_35'])){
			$perencanaan_35 = "1";
		}else{
			$perencanaan_35 = "";
		}
		if (isset($_POST['perencanaan_36'])){
			$perencanaan_36 = "1";
		}else{
			$perencanaan_36 = "";
		}
		if (isset($_POST['perencanaan_37'])){
			$perencanaan_37 = "1";
		}else{
			$perencanaan_37 = "";
		}
		if (isset($_POST['perencanaan_38'])){
			$perencanaan_38 = "1";
		}else{
			$perencanaan_38 = "";
		}		
		$update = $db->prepare("UPDATE imis_progres_pemilihan SET 
			persiapan_1 = ?, persiapan_2 = ?, persiapan_3 = ?, persiapan_4 = ?, persiapan_5 = ?, persiapan_6 = ?, persiapan_7 = ?, persiapan_8 = ?, persiapan_9 = ?, persiapan_10 = ?, persiapan_11 = ?, persiapan_12 = ?, persiapan_13 = ?, persiapan_14 = ?, persiapan_15 = ?, perencanaan_1 = ?, perencanaan_2 = ?, perencanaan_3 = ?, perencanaan_4 = ?, perencanaan_5 = ?, perencanaan_6 = ?, perencanaan_7 = ?, perencanaan_8 = ?, perencanaan_9 = ?, perencanaan_10 = ?, perencanaan_11 = ?, perencanaan_12 = ?, perencanaan_13 = ?, perencanaan_14 = ?, perencanaan_15 = ?, perencanaan_16 = ?, perencanaan_17 = ?, perencanaan_18 = ?, perencanaan_19 = ?, perencanaan_20 = ?, perencanaan_21 = ?, perencanaan_22 = ?, perencanaan_23 = ?, perencanaan_24 = ?, perencanaan_25 = ?, perencanaan_26 = ?, perencanaan_27 = ?, perencanaan_28 = ?, perencanaan_29 = ?, perencanaan_30 = ?, perencanaan_31 = ?, perencanaan_32 = ?, perencanaan_33 = ?, perencanaan_34 = ?, perencanaan_35 = ?, perencanaan_36 = ?, perencanaan_37 = ?, perencanaan_38 = ?, tgl_update = ?
			WHERE tahun=? AND id_pamsimas =?");
		$update->bind_param("ssssssssssssssssssssssssssssssssssssssssssssssssssssssss", $persiapan_1, $persiapan_2, $persiapan_3, $persiapan_4, $persiapan_5, $persiapan_6, $persiapan_7, $persiapan_8, $persiapan_9, $persiapan_10, $persiapan_11, $persiapan_12, $persiapan_13, $persiapan_14, $persiapan_15, $perencanaan_1, $perencanaan_2, $perencanaan_3, $perencanaan_4, $perencanaan_5, $perencanaan_6, $perencanaan_7, $perencanaan_8, $perencanaan_9, $perencanaan_10, $perencanaan_11, $perencanaan_12, $perencanaan_13, $perencanaan_14, $perencanaan_15, $perencanaan_16, $perencanaan_17, $perencanaan_18, $perencanaan_19, $perencanaan_20, $perencanaan_21, $perencanaan_22, $perencanaan_23, $perencanaan_24, $perencanaan_25, $perencanaan_26, $perencanaan_27, $perencanaan_28, $perencanaan_29, $perencanaan_30, $perencanaan_31, $perencanaan_32, $perencanaan_33, $perencanaan_34, $perencanaan_35, $perencanaan_36, $perencanaan_37, $perencanaan_38, $tgl_sekarang, $tahun, $id_pamsimas);
		$update->execute();
		$update->close();
		header('location:../../../../media.php?module=imis_12&id_kabkota='.abs((int)$_POST['id_kabkota']).'&tahun='.abs((int)$_POST['tahun']).'&id_pamsimas='.abs((int)$_POST['id_pamsimas']).'');
	}elseif ($module=='imis_12' AND $act=='exportpdf'){
		require_once '../../../../../../asset/vendor/autoload.php';
		$mpdf = new \Mpdf\Mpdf([
							'mode' => 'utf-8',
							'format' => [190, 236],
							'orientation' => 'L',
							'allow_charset_conversion' => true
						]);
		$today			= date("Y-m-d H:i:s");
		if(isset($_GET['id_kabkota']) AND isset($_GET['tahun']) AND isset($_GET['id_pamsimas'])){
			$nama_dokumen	= 'kelengkapan-data-imis-modul-1-2-tahun-'.$d2->tahun.'-kab-'.$d->nama_kabkota.'-kec-'.$d3->kecamatan.'-desa-'.$d3->desa.'';
		}elseif(isset($_GET['id_kabkota']) AND isset($_GET['tahun'])){
			$nama_dokumen	= 'kelengkapan-data-imis-modul-1-2-tahun-'.$d2->tahun.'-kab-'.$d->nama_kabkota.'';
		}else{
			$nama_dokumen	= 'kelengkapan-data-imis-modul-1-2-tahun-'.$d2->tahun.'-provinsi-banten';
		}
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
		if(isset($_GET['id_kabkota']) AND isset($_GET['tahun']) AND isset($_GET['id_pamsimas'])){
			echo'<h2>KELENGKAPAN IMIS MODUL 1 & 2 TAHUN '.$d2->tahun.' KAB. '.$d->nama_kabkota.' KEC. '.$d3->kecamatan.' DESA '.$d3->desa.'</h2>';
		}elseif(isset($_GET['id_kabkota']) AND isset($_GET['tahun'])){
			echo'<h2>KELENGKAPAN IMIS MODUL 1 & 2 TAHUN '.$d2->tahun.' KAB. '.$d->nama_kabkota.'</h2>';
		}else{
			echo'<h2>KELENGKAPAN IMIS MODUL 1 & 2 TAHUN '.$d2->tahun.' PROVINSI BANTEN</h2>';
		}
		if(isset($_GET['tahun']) AND isset($_GET['id_kabkota']) AND isset($_GET['id_pamsimas'])){
			echo'
			<table border="1">
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
		}elseif(isset($_GET['tahun']) AND isset($_GET['id_kabkota'])){
			echo'
			<table border="1">
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
					</tr>
				</thead>
				<tbody>';
				$no = 1;
				$qry = $db->prepare("SELECT id_pamsimas, tahun, id_kabkota, kabupaten, kecamatan, desa, persiapan_1, persiapan_2, persiapan_3, persiapan_4, persiapan_5, persiapan_6, persiapan_7, persiapan_8, persiapan_9, persiapan_10, persiapan_11, persiapan_12, persiapan_13, persiapan_14, persiapan_15, perencanaan_1, perencanaan_2, perencanaan_3, perencanaan_4, perencanaan_5, perencanaan_6, perencanaan_7, perencanaan_8, perencanaan_9, perencanaan_10, perencanaan_11, perencanaan_12, perencanaan_13, perencanaan_14, perencanaan_15, perencanaan_16, perencanaan_17, perencanaan_18, perencanaan_19, perencanaan_20, perencanaan_21, perencanaan_22, perencanaan_23, perencanaan_24, perencanaan_25, perencanaan_26, perencanaan_27, perencanaan_28, perencanaan_29, perencanaan_30, perencanaan_31, perencanaan_32, perencanaan_33, perencanaan_34, perencanaan_35, perencanaan_36, perencanaan_37, perencanaan_38 FROM imis_progres_pemilihan WHERE tahun='$d2->tahun' AND id_kabkota='$d->id_kabkota' ORDER BY desa ASC");
				$qry->execute();
				$ada = $qry->get_result();
				while($r = $ada->fetch_object()){
					echo'
					<tr>
						<td>'.$no.'</td>
						<td>'.$r->kabupaten.'</td>
						<td>'.$r->kecamatan.'</td>
						<td>'.$r->desa.'</td>';
						$qr = $db->query("SELECT jenis_dana, bobot FROM imis_progres_pemilihan_view WHERE id_pamsimas='$r->id_pamsimas' AND tahun='$r->tahun'");
						while($dd = $qr->fetch_object()){
							echo'
							<td>'.$dd->jenis_dana.'</td>';
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
					</tr>';
					$no++;
				}
				echo'
				</tbody>
			</table>';
		}elseif(isset($_GET['tahun'])){
			echo'
			<table border="1">
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
					</tr>
				</thead>
				<tbody>';
				$no = 1;
				$qry = $db->prepare("SELECT id_pamsimas, tahun, id_kabkota, kabupaten, kecamatan, desa, persiapan_1, persiapan_2, persiapan_3, persiapan_4, persiapan_5, persiapan_6, persiapan_7, persiapan_8, persiapan_9, persiapan_10, persiapan_11, persiapan_12, persiapan_13, persiapan_14, persiapan_15, perencanaan_1, perencanaan_2, perencanaan_3, perencanaan_4, perencanaan_5, perencanaan_6, perencanaan_7, perencanaan_8, perencanaan_9, perencanaan_10, perencanaan_11, perencanaan_12, perencanaan_13, perencanaan_14, perencanaan_15, perencanaan_16, perencanaan_17, perencanaan_18, perencanaan_19, perencanaan_20, perencanaan_21, perencanaan_22, perencanaan_23, perencanaan_24, perencanaan_25, perencanaan_26, perencanaan_27, perencanaan_28, perencanaan_29, perencanaan_30, perencanaan_31, perencanaan_32, perencanaan_33, perencanaan_34, perencanaan_35, perencanaan_36, perencanaan_37, perencanaan_38 FROM imis_progres_pemilihan WHERE tahun='$d2->tahun' ORDER BY id_kabkota, desa ASC");
				$qry->execute();
				$ada = $qry->get_result();
				while($r = $ada->fetch_object()){
					echo'
					<tr>
						<td>'.$no.'</td>
						<td>'.$r->kabupaten.'</td>
						<td>'.$r->kecamatan.'</td>
						<td>'.$r->desa.'</td>';
						$qr = $db->query("SELECT jenis_dana, bobot FROM imis_progres_pemilihan_view WHERE id_pamsimas='$r->id_pamsimas' AND tahun='$r->tahun'");
						while($dd = $qr->fetch_object()){
							echo'
							<td>'.$dd->jenis_dana.'</td>';
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
					</tr>';
					$no++;
				}
				echo'
				</tbody>
			</table>';
		}
		echo'
		<br>Download pertanggal '.$today.'';
		$mpdf->setFooter('{PAGENO}');
		$html = ob_get_contents();
		ob_end_clean();
		$mpdf->WriteHTML(utf8_encode($html));
		$mpdf->Output($nama_dokumen.".pdf" ,'I');
		exit;
	}elseif ($module=='imis_12' AND $act=='exportexcel'){
		$today = date("Y-m-d H:i:s");
		header("Content-type: application/vnd-ms-excel");
		if(isset($_GET['id_kabkota']) AND isset($_GET['tahun']) AND isset($_GET['id_pamsimas'])){
			header("Content-Disposition: attachment; filename=kelengkapan-data-imis-modul-1-2-tahun-".$d2->tahun."-kab-".$d->nama_kabkota."-kec-".$d3->kecamatan."-desa-".$d3->id_pamsimas.".xls");
		}elseif(isset($_GET['id_kabkota']) AND isset($_GET['tahun'])){
			header("Content-Disposition: attachment; filename=kelengkapan-data-imis-modul-1-2-tahun-".$d2->tahun."-kab-".$d->nama_kabkota.".xls");
		}else{
			header("Content-Disposition: attachment; filename=kelengkapan-data-imis-modul-1-2-tahun-".$d2->tahun."-provinsi-banten.xls");
		}

		if(isset($_GET['id_kabkota']) AND isset($_GET['tahun']) AND isset($_GET['id_pamsimas'])){
			echo'<h2>KELENGKAPAN IMIS MODUL 1 & 2 TAHUN '.$d2->tahun.' KAB. '.$d->nama_kabkota.' KEC. '.$d3->kecamatan.' DESA '.$d3->desa.'</h2>';
		}elseif(isset($_GET['id_kabkota']) AND isset($_GET['tahun'])){
			echo'<h2>KELENGKAPAN IMIS MODUL 1 & 2 TAHUN '.$d2->tahun.' KAB. '.$d->nama_kabkota.'</h2>';
		}else{
			echo'<h2>KELENGKAPAN IMIS MODUL 1 & 2 TAHUN '.$d2->tahun.' PROVINSI BANTEN</h2>';
		}
		if(isset($_GET['tahun']) AND isset($_GET['id_kabkota']) AND isset($_GET['id_pamsimas'])){
			echo'
			<table border="1">
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
		}elseif(isset($_GET['tahun']) AND isset($_GET['id_kabkota'])){
			echo'
			<table border="1">
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
					</tr>
				</thead>
				<tbody>';
				$no = 1;
				$qry = $db->prepare("SELECT id_pamsimas, tahun, id_kabkota, kabupaten, kecamatan, desa, persiapan_1, persiapan_2, persiapan_3, persiapan_4, persiapan_5, persiapan_6, persiapan_7, persiapan_8, persiapan_9, persiapan_10, persiapan_11, persiapan_12, persiapan_13, persiapan_14, persiapan_15, perencanaan_1, perencanaan_2, perencanaan_3, perencanaan_4, perencanaan_5, perencanaan_6, perencanaan_7, perencanaan_8, perencanaan_9, perencanaan_10, perencanaan_11, perencanaan_12, perencanaan_13, perencanaan_14, perencanaan_15, perencanaan_16, perencanaan_17, perencanaan_18, perencanaan_19, perencanaan_20, perencanaan_21, perencanaan_22, perencanaan_23, perencanaan_24, perencanaan_25, perencanaan_26, perencanaan_27, perencanaan_28, perencanaan_29, perencanaan_30, perencanaan_31, perencanaan_32, perencanaan_33, perencanaan_34, perencanaan_35, perencanaan_36, perencanaan_37, perencanaan_38 FROM imis_progres_pemilihan WHERE tahun='$d2->tahun' AND id_kabkota='$d->id_kabkota' ORDER BY desa ASC");
				$qry->execute();
				$ada = $qry->get_result();
				while($r = $ada->fetch_object()){
					echo'
					<tr>
						<td>'.$no.'</td>
						<td>'.$r->kabupaten.'</td>
						<td>'.$r->kecamatan.'</td>
						<td>'.$r->desa.'</td>';
						$qr = $db->query("SELECT jenis_dana, bobot FROM imis_progres_pemilihan_view WHERE id_pamsimas='$r->id_pamsimas' AND tahun='$r->tahun'");
						while($dd = $qr->fetch_object()){
							echo'
							<td>'.$dd->jenis_dana.'</td>';
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
					</tr>';
					$no++;
				}
				echo'
				</tbody>
			</table>';
		}elseif(isset($_GET['tahun'])){
			echo'
			<table border="1">
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
					</tr>
				</thead>
				<tbody>';
				$no = 1;
				$qry = $db->prepare("SELECT id_pamsimas, tahun, id_kabkota, kabupaten, kecamatan, desa, persiapan_1, persiapan_2, persiapan_3, persiapan_4, persiapan_5, persiapan_6, persiapan_7, persiapan_8, persiapan_9, persiapan_10, persiapan_11, persiapan_12, persiapan_13, persiapan_14, persiapan_15, perencanaan_1, perencanaan_2, perencanaan_3, perencanaan_4, perencanaan_5, perencanaan_6, perencanaan_7, perencanaan_8, perencanaan_9, perencanaan_10, perencanaan_11, perencanaan_12, perencanaan_13, perencanaan_14, perencanaan_15, perencanaan_16, perencanaan_17, perencanaan_18, perencanaan_19, perencanaan_20, perencanaan_21, perencanaan_22, perencanaan_23, perencanaan_24, perencanaan_25, perencanaan_26, perencanaan_27, perencanaan_28, perencanaan_29, perencanaan_30, perencanaan_31, perencanaan_32, perencanaan_33, perencanaan_34, perencanaan_35, perencanaan_36, perencanaan_37, perencanaan_38 FROM imis_progres_pemilihan WHERE tahun='$d2->tahun' ORDER BY id_kabkota, desa ASC");
				$qry->execute();
				$ada = $qry->get_result();
				while($r = $ada->fetch_object()){
					echo'
					<tr>
						<td>'.$no.'</td>
						<td>'.$r->kabupaten.'</td>
						<td>'.$r->kecamatan.'</td>
						<td>'.$r->desa.'</td>';
						$qr = $db->query("SELECT jenis_dana, bobot FROM imis_progres_pemilihan_view WHERE id_pamsimas='$r->id_pamsimas' AND tahun='$r->tahun'");
						while($dd = $qr->fetch_object()){
							echo'
							<td>'.$dd->jenis_dana.'</td>';
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
					</tr>';
					$no++;
				}
				echo'
				</tbody>
			</table>';
		}
		echo'<br>Download pertanggal '.$today.'';

	}
}
$db->close();
?>