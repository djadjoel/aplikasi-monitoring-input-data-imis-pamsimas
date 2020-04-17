<?php
$qry	= $db->query("SELECT id_modul, nama_modul, link, dilihat FROM modul WHERE link='$module'");
$u		= $qry->fetch_object();
$lihat = $u->dilihat + 1;
$dilihat = $db->prepare("UPDATE modul SET dilihat='$lihat' WHERE id_modul='$u->id_modul'");
$dilihat->execute();
$aksi	= "modul/mod_".$u->link."/aksi_".$u->link.".php";
?>
<script language="JavaScript" type="text/JavaScript">
	function showKab(){
		<?php
		$query = $db->query("SELECT id_prov FROM data_provinsi");
		while ($data = $query->fetch_object()){
			$id_prov = $data->id_prov;
			echo "if (document.inputuser.data_provinsi.value == \"".$id_prov."\")";
			echo "{";
			$query2 = $db->query("SELECT id_prov, id_kabkota, nama_kabkota FROM data_kabkota WHERE id_prov = $id_prov ORDER BY nama_kabkota ASC");
			$content = "document.getElementById('kabupaten').innerHTML = \"";
			$content .= "<option>-Pilih Kabupaten-</option>";
			while ($data2 = $query2->fetch_object()){
				$content .= "<option value='".$data2->id_kabkota."'>".$data2->nama_kabkota."</option>";
			}
			$content .= "\"";
			echo $content;
			echo "}\n";
		}
		?>
	}
	function showKec(){
		<?php
		$query3 = $db->query("SELECT id_kabkota FROM data_kabkota");
		while($data3 = $query3->fetch_object()){
			$id_kabkota = $data3->id_kabkota;
			echo "if (document.inputuser.data_kabkota.value == \"".$id_kabkota."\")";
			echo "{";
			$query4 = $db->query("SELECT id_kec, id_kabkota, nama_kecamatan FROM data_kecamatan WHERE id_kabkota = $id_kabkota ORDER BY nama_kecamatan ASC");
			$content = "document.getElementById('kecamatan').innerHTML = \"";
			$content .= "<option>-Pilih Kecamatan-</option>";
			while ($data4 = $query4->fetch_object()){
				$content .= "<option value='".$data4->id_kec."'>".$data4->nama_kecamatan."</option>";
			}
			$content .= "\"";
			echo $content;
			echo "}\n";
		}
		?>
	}
</script>
<?php
switch($_GET['act']){
default:
echo'
<div class="card">
	<div class="card-header">';
		if($_SESSION['leveluser']=='superadmin' OR $_SESSION['leveluser']=='admin'){
			echo'
			<a class="mr-2 btn btn-primary btn-sm" href="#" data-toggle="modal" data-target="#tambah" data-original-title><i class="fa fa-plus-circle"></i> Akun Baru</a>
			<a href="'.$aksi.'?module='.$u->link.'&act=exportpdf" class="mr-2 btn btn-sm btn-danger" title="Export laporan format pdf" target="_blank"><i class="fas fa-file-pdf"></i> Export PDF</a>
			<a href="'.$aksi.'?module='.$u->link.'&act=exportexcel" class="mr-2 btn btn-sm btn-success" title="Export laporan format excel"><i class="fas fa-file-excel"></i> Export Excel</a>
			<a href="javascript:history.go(0)" class="mr-2 btn btn-sm btn-info"><i class="fa fa-sync"></i> Refresh</a>
			<!-- .modal-input pengguna -->
			<div class="modal modal-default" id="tambah" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title"><i class="fa fa-user"></i> Akun Baru</h4>
							<button title="Tutup" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>
						<form class="needs-validation" novalidate action="'.$aksi.'?module=anggota&act=input" method="post">
						<div class="modal-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Username</label>
									<div class="input-group">
										<div class="input-group-prepend"><span class="input-group-text">@</span></div>
										<input type="text" class="form-control" name="username" placeholder="Masukkan username" required>
										<div class="invalid-feedback">Wajib diisi.</div>
									</div>
									<small class="form-text text-muted">Username hanya angka dan huruf kecil, tidak boleh ada spasi</small>
								</div>
								<div class="form-group">
									<label class="control-label">Password</label>
									<input data-toggle="password" type="password" class="form-control" name="password" maxlength="10" placeholder="Password" required>
									<div class="invalid-feedback">Wajib diisi.</div>
								</div>
								<div class="form-group">
									<label class="control-label">Peranan</label>
									<select class="form-control" name="level" title="Level Akses" required>
										<option></option>
										<option value="user">User</option>
										<option value="admin">Admin</option>
										<option value="superadmin">Super Admin</option>
									</select>
									<div class="invalid-feedback">Wajib diisi.</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Nama Lengkap</label>
									<div class="input-group">
										<div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user"></i></span></div>
										<input type="text" class="form-control" name="nama_lengkap" placeholder="Masukkan nama lengkap" required>
										<div class="invalid-feedback">Wajib diisi.</div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label">Email</label>
									<div class="input-group">
										<div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-envelope"></i></span></div>
										<input type="email" class="form-control" name="email" placeholder="Masukkan email" required>
										<div class="invalid-feedback">Wajib diisi.</div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label">Kode</label>
									<input type="text" name="kode" class="form-control" title="Masukkan 6 kode dibawah" size="6" maxlength="6" required placeholder="Masukkan 6 kode dibawah">
									<div class="invalid-feedback">Wajib diisi.</div>
								</div>
								<div class="form-group">
									<p class="help-block"><img src="'.BASE_URL.'/captcha.php"></p>
								</div>
							</div>
						</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-primary btn-flat btn-block" onClick="tombolsweet()">Tambah Akun Baru</button>
						</div>
						</form>
					</div>
				</div>
			</div><!-- /.modal-input pengguna -->';
		}else{
			echo'<h3>Profil</h3>';
		}
	echo'
	</div>
	<div class="card-body tabel-responsive">';
		if($_SESSION['leveluser']=='superadmin'){
			echo'
			<table id="tableumum" class="table table-hover table-striped table-bordered table-sm">
				<thead><tr><th>No</th><th>Username</th><th>Nama</th><th>Peranan</th><th>Login</th><th>Status</th><th width="6%">Aksi</th></tr></thead><tbody>';
				$tsuper = $db->query("SELECT id_user, username, nama_lengkap, level, total_login, blokir, gambar FROM anggota_view WHERE username<>'$_SESSION[namauser]'");
				$no = 1;
				while($tsp = $tsuper->fetch_object()){
					echo'
					<tr>
						<td>'.$no.'</td>
						<td>'.$tsp->username.'</td>
						<td>'.$tsp->nama_lengkap.'</td>
						<td>'.$tsp->level.'</td>
						<td>'.$tsp->total_login.'</td>
						<td>';
							if($tsp->blokir == 'Aktif'){
								echo'<a href="'.$aksi.'?module=anggota&act=statusblokir&id='.$tsp->username.'" class="btn-transition btn btn-outline-success btn-sm" onClick="tombolsweet()">Aktif</a>';
							}else{
								echo'<a href="'.$aksi.'?module=anggota&act=statusaktif&id='.$tsp->username.'" class="btn-transition btn btn-outline-danger btn-sm" onClick="tombolsweet()">Diblokir</a>';
							}
						echo'
						</td>
						<td><div class="btn-group">
									<a href="?module=anggota&act=editData&id='.$tsp->username.'" class="btn-transition btn btn-outline-warning btn-sm"><i class="fa fa-pen"></i></a>
									<a class="btn-transition btn btn-outline-danger btn-sm" href="#hapusData'.$tsp->username.'" data-toggle="modal"><i class="fa fa-trash"></i></a>
								</div>
								<div class="modal modal-default" id="hapusData'.$tsp->username.'" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title">Konfirmasi</h5>
											<button title="Tutup" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										</div>
										<div class="modal-body" style="text-align:center;">
											<font color="#FF0000"><i class="fas fa-exclamation-circle fa-3x"></i></font><br><br>Yakin data ini akan dihapus?
										</div>
										<div class="modal-footer">
											<a href="'.$aksi.'?module=anggota&act=hapus&id='.$tsp->username.'&namafile='.$tsp->gambar.'" class="btn btn-block btn-danger btn-flat">Hapus</a>
										</div>
									</div><!-- /.modal-content -->
								</div><!-- /.modal-dialog -->
							</div><!-- /.modal -->
						</td>
					</tr>';
					$no++;
					}
				echo'</tbody>
			</table>';
		}elseif($_SESSION['leveluser']=='admin'){
			echo'
			<table id="tableumum" class="table table-hover table-striped table-bordered table-sm">
				<thead><tr><th>No</th><th>Username</th><th>Nama</th><th>Peranan</th><th>Status</th><th width="6%">Aksi</th></tr></thead><tbody>';
				$tadmin = $db->query("SELECT id_user, username, nama_lengkap, level, blokir, gambar FROM anggota_view WHERE username<>'$_SESSION[namauser]' AND level<>'superadmin'");
				$no = 1;
				while($ta = $tadmin->fetch_object()){
					echo'
					<tr>
						<td>'.$no.'</td>
						<td>'.$ta->username.'</td>
						<td>'.$ta->nama_lengkap.'</td>
						<td>'.$ta->level.'</td>
						<td>';
							if($ta->blokir == 'Aktif'){
								echo'<a href="'.$aksi.'?module=anggota&act=statusblokir&id='.$ta->username.'" class="btn-transition btn btn-outline-success btn-sm" onClick="tombolsweet()">Aktif</a>';
							}else{
								echo'<a href="'.$aksi.'?module=anggota&act=statusaktif&id='.$ta->username.'" class="btn-transition btn btn-outline-danger btn-sm" onClick="tombolsweet()">Diblokir</a>';
							}
						echo'
						</td>
						<td><div class="btn-group">
								<a href="?module=anggota&act=editData&id='.$ta->username.'" class="btn-transition btn btn-outline-warning btn-sm"><i class="fa fa-pen"></i></a>
								<a class="btn-transition btn btn-outline-danger btn-sm" href="#hapusData'.$ta->username.'" data-toggle="modal"><i class="fa fa-trash"></i></a>
							</div>
								<div class="modal modal-default" id="hapusData'.$ta->username.'" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
											<h5 class="modal-title"><i class="fa fa-trash-o"></i> Hapus Data</h5>
											<button data-toggle="tooltip" title="Tutup" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										</div>
										<div class="modal-body" style="text-align:center;">
											<font color="#FF0000"><i class="fa fa-warning fa-5x"></i></font><br><h3>Yakin data ini akan dihapus?</h3>
										</div>
										<div class="modal-footer">
											<a href="'.$aksi.'?module=anggota&act=hapus&id='.$ta->username.'&namafile='.$ta->gambar.'" class="btn btn-block btn-danger btn-flat">Hapus</a>
										</div>
									</div><!-- /.modal-content -->
								</div><!-- /.modal-dialog -->
							</div><!-- /.modal -->
						</td>
					</tr>';
					$no++;
					}
				echo'</tbody>
			</table>';
		}else{
			echo'
			<div class="row">
				<div class="col-md-8">
					<table class="table table-hover table-striped">';
						$tampil = $db->query("SELECT username, nama_lengkap, email, no_telp, level, gambar FROM anggota_view WHERE username = '$_SESSION[namauser]' ");
						$r = $tampil->fetch_object();
						echo'
						<tr><td width="25%">Nama Lengkap</td><td>: '.$r->nama_lengkap.'</td>
						<tr><td>Email</td><td>: '.$r->email.'</td></tr>
					</table>
				</div>
				<div class="col-md-4">';
					if($r->gambar!=''){
						echo'<img src="'.BASE_URL.'/templates/'.$aw->alamat_website.'/uploads/foto_anggota/'.$r->gambar.'" width="100%">';
					}else{
						echo'<img src="'.BASE_URL.'/templates/'.$aw->alamat_website.'/uploads/foto_anggota/avatar3.png" width="100%">';
					}
				echo'
				</div>
			</div>';
		}
	echo'
	</div>';
	if($_SESSION['leveluser']=='user'){
		echo'
		<div class="card-footer">
			<a href="?module=anggota&act=editData&id='.$_SESSION['namauser'].'" class="btn btn-warning btn-md"><i class="fa fa-user"></i> Edit Profil</a>
		</div>';
	}
echo'
</div>';
break;

case "anggotabaru":
echo'
<div class="main-card mb-3 card">
	<div class="card-header">Buat akun baru</div>
	<form class="needs-validation" novalidate action="'.$aksi.'?module=anggota&act=input" method="post">
	<div class="card-body">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="inlineFormInputGroup">Username</label>
					<div class="input-group mb-2">
						<div class="input-group-prepend"><div class="input-group-text">@</div></div>
						<input type="text" name="username" class="form-control" title="Masukkan username" data-toggle="tooltip" data-placement="top" required>
						<div class="invalid-feedback">Wajib diisi.</div>
					</div>
					<small class="text-form text-muted">Username menggunakan angka dan huruf kecil, tidak boleh ada spasi.</small>
				</div>
				<div class="form-group">
					<label class="control-label">Password</label>
					<input type="password" class="form-control" name="password" data-toggle="password" minlength="8" required>
					<small class="text-form text-muted">Minimal 8 digit.</small>
					<div class="invalid-feedback">Wajib diisi.</div>
				</div>
				<div class="form-group">
					<label class="control-label">Peranan</label>
					<select class="form-control" name="level" title="Level Akses" required>
						<option></option>
						<option value="user">User</option>
						<option value="admin">Admin</option>';
						if ($_SESSION['leveluser']=='superadmin'){
							echo'<option value="superadmin">Super Admin</option>';
						}
					echo'
					</select>
					<div class="invalid-feedback">Wajib diisi.</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="inlineFormInputGroup">Nama Lengkap</label>
					<div class="input-group mb-2">
						<div class="input-group-prepend"><div class="input-group-text"><i class="fa fa-user"></i></div></div>
						<input type="text" name="nama_lengkap" class="form-control" title="Masukkan nama lengkap" data-toggle="tooltip" data-placement="top" required>
						<div class="invalid-feedback">Wajib diisi.</div>
					</div>
				</div>
				<div class="form-group">
					<label for="inlineFormInputGroup">Email</label>
					<div class="input-group mb-2">
						<div class="input-group-prepend"><div class="input-group-text"><i class="fa fa-user"></i></div></div>
						<input type="email" name="email" class="form-control" title="Masukkan email" data-toggle="tooltip" data-placement="top" required>
						<div class="invalid-feedback">Wajib diisi.</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label">Kode</label>
					<input type="text" name="kode" class="form-control" title="Masukkan 6 kode dibawah" size="6" maxlength="6" required placeholder="Masukkan 6 kode dibawah">
				</div>
				<div class="form-group">
					<p class="help-block"><img src="'.BASE_URL.'/captcha.php"></p>
				</div>
			</div>
		</div>
	</div>
	<div class="card-footer">
		<button type="submit" class="mr-2 btn btn-primary btn-sm"><i class="fa fa-save"></i> Simpan</button>
		<a href="?module=anggota" class="mr-2 btn btn-danger btn-sm"><i class="fas fa-times-circle"></i> Batal</a>
	</div>
	</form>
</div>';
break;

case "editData":
if($_SESSION['leveluser']=='superadmin' OR $_SESSION['leveluser']=='admin'){
	$edit = $db->query("SELECT * FROM anggota_view WHERE username='$_GET[id]'");
}else{
	$edit = $db->query("SELECT * FROM anggota_view	WHERE username = '$_SESSION[namauser]'");
}
if($edit->num_rows > 0){
	$r = $edit->fetch_object();
	echo'
	<div class="row">
		<div class="col-md-3">
			<div class="main-card mb-3 card">
				<div class="card-body box-profile text-center">';
					if($r->gambar!=''){
						echo'<a href="'.BASE_URL.'/templates/'.$aw->alamat_website.'/uploads/foto_anggota/'.$r->gambar.'" data-title="'.$r->nama_lengkap.'" data-lightbox="'.$r->nama_lengkap_seo.'"><img  class="profile-user-img img-responsive img-circle" src="'.BASE_URL.'/templates/'.$aw->alamat_website.'/uploads/foto_anggota/small_'.$r->gambar.'" width="120"></a><br><br>';
					}else{
						echo'<img class="profile-user-img img-responsive img-circle" src="'.BASE_URL.'/templates/'.$aw->alamat_website.'/uploads/foto_anggota/avatar3.png"><br><br>';
					}
					echo'<h5>'.$r->nama_lengkap.'</h5>
				</div>';
				if($r->gambar!=''){
					echo'
					<div class="card-footer">
						<a href="'.$aksi.'?module=anggota&act=hapusfoto&id='.$r->username.'&namafile='.$r->gambar.'" class="btn-transition btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i> Hapus foto</a>
					</div>';
				}
			echo'
			</div>
		</div>
		<div class="col-md-9">
			<div class="main-card mb-3 card">
				<div class="card-header">
					<i class="header-icon lnr-license icon-gradient bg-plum-plate"></i>Update Profil
					<div class="btn-actions-pane-right">
						<div role="group" class="btn-group-sm nav btn-group">
							<a data-toggle="tab" href="#biodata" class="btn-shadow active btn btn-primary">Biodata</a>
							<a data-toggle="tab" href="#domisili" class="btn-shadow  btn btn-primary">Domisili</a>
							<a data-toggle="tab" href="#sosmed" class="btn-shadow  btn btn-primary">Sosial Media</a>
							<a data-toggle="tab" href="#status" class="btn-shadow  btn btn-primary">Akun</a>
						</div>
					</div>
	    		</div>
				<form class="form-horizontal" name="inputuser" role="form" action="'.$aksi.'?module=anggota&act=update" method="post" enctype="multipart/form-data">
				<input type="hidden" name="id" value="'.$r->username.'">
				<div class="card-body">
					<div class="tab-content">
						<div class="tab-pane active" id="biodata" role="tabpanel">
							<div class="form-group">
								<label class="control-label">Nama Lengkap</label>
								<div class="input-group">
									<div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user"></i></span></div>
									<input type="text" class="form-control" name="nama_lengkap" value="'.$r->nama_lengkap.'" placeholder="Nama Lengkap">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label">Tanggal Lahir</label>
								<div class="input-group date">
									<div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
									<input type="date" class="form-control" id="datepicker" name="tgl_lahir" value="'.$r->tgl_lahir.'">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label">Tempat Lahir</label>
								<input type="text" class="form-control" name="tempat_lahir" value="'.$r->tempat_lahir.'">
							</div>
							<div class="form-group">
								<label class="control-label">Jenis Kelamin</label>
								<select name="kelamin" class="form-control">';
									if($r->kelamin==''){
									echo'<option selected></option>
											<option value="Pria">Pria</option>
											<option value="Wanita">Wanita</option>';
									}elseif($r->kelamin=='Pria'){
										echo'<option value="Pria" selected>Pria</option>
										<option value="Wanita">Wanita</option>';
									}else{
										echo'<option value="Pria">Pria</option>
										<option value="Wanita" selected>Wanita</option>';
									}
									echo'</select>
							</div>
							<div class="form-group">
								<label class="control-label">Handphone</label>
								<div class="input-group date">
									<div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-mobile"></i></span></div>
									<input type="number" class="form-control" name="no_telp" value="'.$r->no_telp.'">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label">Email</label>
								<div class="input-group date">
									<div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-envelope"></i></span></div>
									<input type="email" class="form-control" name="email" value="'.$r->email.'">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label">Biografi Singkat</label>
								<textarea name="biografi" class="textarea form-control" placeholder="Masukkan biografi tentang Anda">'.$r->biografi.'</textarea>
							</div>
							<div class="form-group">
								<label class="control-label">Foto Profil</label>
								<div class="input-group">
									<div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-upload"></i></span></div>
									<div class="custom-file">
										<input type="file" id="fupload" name="fupload" title="Upload foto JPG/JPEG" class="custom-file-input" accept="image/jpeg">
										<label class="custom-file-label">Cari file</label>
									</div>
								</div>';
								if($r->gambar!=''){
									echo'<small class="form-text text-muted">Kosongkan apabila foto tidak diganti.</small>';
								}else{
									echo'<small class="form-text text-muted">Pilih foto format jpg.</small>';
								}
							echo'
							</div>
						</div>
						<div class="tab-pane" id="domisili" role="tabpanel">
							<div class="form-group">
								<label class="control-label">Provinsi</label>
								<select name="data_provinsi" class="form-control" title="Pilih Provinsi" onchange="showKab()">';
									$kat = $db->query("SELECT nama_provinsi, id_prov FROM data_provinsi ORDER BY nama_provinsi ASC");
									if ($r->id_prov==0){
										echo '<option value="0" selected></option>';
									}
									while($w = $kat->fetch_object()){
										if ($r->id_prov == $w->id_prov){
											echo '<option value="'.$w->id_prov.'" selected>'.$w->nama_provinsi.'</option>';
										}else{
											echo '<option value="'.$w->id_prov.'">'.$w->nama_provinsi.'</option>';
										}
									}
								echo'</select>
							</div>
							<div class="form-group">
								<label class="control-label">Kabupaten</label>
								<select name="data_kabkota" class="form-control" id="kabupaten" onchange="showKec()" title="Pilih Kabupaten">';
									$t2 = $db->query("SELECT id_kabkota, nama_kabkota FROM data_kabkota WHERE id_prov = '$r->id_prov' ORDER BY id_kabkota ASC");
									if ($r->id_kabkota==0){
										echo '<option value="0" selected></option>';
									}
									while($w = $t2->fetch_object()){
										if($r->id_kabkota == $w->id_kabkota){
											echo'<option value="'.$w->id_kabkota.'" selected>'.$w->nama_kabkota.'</option>';
										}else{
											echo'<option value="'.$w->id_kabkota.'">'.$w->nama_kabkota.'</option>';
										}
									}
								echo'</select>
							</div>
							<div class="form-group">
								<label class="control-label">Kecamatan</label>
								<select name="data_kecamatan" class="form-control" id="kecamatan" title="Pilih Kecamatan">';
									$t3 = $db->query("SELECT id_kec, nama_kecamatan FROM data_kecamatan WHERE id_kabkota='$r->id_kabkota' ORDER BY nama_kecamatan ASC");
									if ($r->id_kec==0){
										echo'<option value="0" selected></option>';
									}
									while($w = $t3->fetch_object()){
										if($r->id_kec == $w->id_kec){
											echo'<option value="'.$w->id_kec.'" selected>'.$w->nama_kecamatan.'</option>';
										}else{
											echo'<option value="'.$w->id_kec.'">'.$w->nama_kecamatan.'</option>';
										}
									}
								echo'</select>
							</div>
							<div class="form-group">
								<label class="control-label">Alamat</label>
								<textarea class="form-control" name="alamat">'.$r->alamat.'</textarea>
							</div>
						</div>
						<div class="tab-pane" id="sosmed" role="tabpanel">
							<div class="form-group">
								<label class="control-label">URL Akun Facebook</label>
								<input type="url" name="facebook" value="'.$r->facebook.'" class="form-control">
							</div>
							<div class="form-group">
								<label class="control-label">URL Akun Twitter</label>
								<input type="url" name="twitter" value="'.$r->twitter.'" class="form-control">
							</div>
							<div class="form-group">
								<label class="control-label">URL Akun Google+</label>
								<input type="url" name="google" value="'.$r->google.'" class="form-control">
							</div>
							<div class="form-group">
								<label class="control-label">Website</label>
								<input type="url" name="website" value="'.$r->website.'" class="form-control">
							</div>
						</div>
						<div class="tab-pane" id="status" role="tabpanel">
							<div class="form-group">
								<label class="control-label">Password</label>
								<input type="password" class="form-control" name="password" data-toggle="password" minlength="8">
								<span class="form-text text-muted">Password minimal 8 karakter. Apabila password tidak diubah, dikosongkan saja.</span>
							</div>';
							if($_SESSION['leveluser']=='superadmin' OR $_SESSION['leveluser']=='admin'){
								echo'
								<div class="form-group">
									<label class="control-label">Level Akses</label>
									<select class="form-control" name="level" title="Level Akses">';
										if($_SESSION['leveluser']=='superadmin'){
											if($r->level == 'user'){
												echo'
												<option value="user" selected>User</option>
												<option value="admin">Admin</option>
												<option value="superadmin">Super Admin</option>';
											}elseif ($r->level == 'admin'){
												echo'
												<option value="user">User</option>
												<option value="admin" selected>Admin</option>
												<option value="superadmin">Super Admin</option>';
											}elseif ($r->level == 'superadmin') {
												echo'
												<option value="user">User</option>
												<option value="admin">Admin</option>
												<option value="superadmin" selected>Super Admin</option>';
											}
										}elseif ($_SESSION['leveluser']=='admin'){
											if($r->level == 'user'){
												echo'
												<option value="user" selected>User</option>
												<option value="admin">Admin</option>';
											}elseif ($r->level == 'admin'){
												echo'
												<option value="user">User</option>
												<option value="admin" selected>Admin</option>';
											}
										}
									echo'
									</select>
								</div>';
							}else{
								echo'<input type="hidden" name="level" value="'.$r->level.'">';
							}
							if ($_SESSION['leveluser']=='superadmin' OR $_SESSION['leveluser']=='admin' AND $r->username <>$_SESSION['namauser']){
								echo'
								<div class="form-group">
									<label class="control-label">Status Akun</label>
									<select class="form-control" name="blokir" title="Blokir Akun">';
										if($r->blokir == 'Aktif'){
										echo'<option value="Y">Diblokir</option>
												<option value="N" selected>Aktif</option>';
										}else{
										echo'<option value="Y" selected>Diblokir</option>
												<option value="N">Aktif</option>';
										}
									echo'</select>
								</div>';
							}else{
								echo'<input type="hidden" name="blokir" value="'.$r->blokir.'">';
							}
						echo'
						</div>
					</div>
				</div>
				<div class="card-footer">
					<button type="submit" class="mr-2 btn btn-primary"><i class="fa fa-save"></i> Perbarui</button>
					<a href="?module=anggota" class="mr-2 btn btn-danger btn-flat"><i class="fas fa-times-circle"></i> Tutup</a>
				</div>
				</form>
			</div>
		</div>
	</div>';
}else{
?>
<!--jika data yang akan diedit sudah dihapus akan dilakukan perintah dibawah ini-->
<div id="pesannih"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
  var url = "?module=anggota"; // url tujuan
  var count = 0; // dalam detik
  function countDown() {
      if (count > 0) {
          count--;
          var waktu = count + 1;
          $('#pesannih').html('Anda akan di redirect ke ' + url + ' dalam ' + waktu + ' detik.');
          setTimeout("countDown()", 1000);
      } else {
          window.location.href = url;
      }
  }
  countDown();
</script>
<?php
}
$edit->close();
break;
}
?>