<?php
$qry		= $db->query("SELECT id_modul, subheading, nama_modul, link, dilihat, aktif_submodul FROM modul WHERE link='$module'");
$u			= $qry->fetch_object();
$lihat		= $u->dilihat + 1;
$dilihat	= $db->prepare("UPDATE modul SET dilihat='$lihat' WHERE id_modul='$u->id_modul'");
$dilihat->execute();
$aksi 		= "modul_tambahan/".$aw->alamat_website."/mod_imis/".$u->link."/aksi_".$u->link.".php";
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
    $add3 = $db->query("SELECT id_pamsimas, kecamatan, desa FROM imis_progres_pemilihan WHERE id_pamsimas='$id_pamsimas'");
    $d3 = $add3->fetch_object();
}
if(isset($_GET['subtim'])){
	$subtim = abs((int)$_GET['subtim']);
	$add4 = $db->query("SELECT subtim FROM imis_progres_pemilihan_view WHERE subtim='$subtim' GROUP BY subtim");
	$d4 = $add4->fetch_object();
}
if(isset($_GET['id_pribadi'])){
	$id_pribadi = abs((int)$_GET['id_pribadi']);
	$add5 = $db->query("SELECT id_pribadi, nama_lengkap, posisi, subtim FROM imis_progres_pemilihan_view WHERE id_pribadi='$id_pribadi'");
	$d5 = $add5->fetch_object();
}
echo'
<div class="main-card mb-3 card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-2">
                <div class="input-group input-group-sm mr-2">
                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-database"></i></span></div>
                    <select type="select" class="custom-select custom-select-sm btn" id="dinamis_select" data-toggle="tooltip" data-placement="bottom" title="Pilih Data IMIS">
                    <option value="?module=imis">Pilih Data IMIS</option>';
                    $a=$db->query("SELECT nama_imis, link FROM modul_imis WHERE aktif='Y' ORDER BY urutan ASC");
                    while($b=$a->fetch_object()){
                        if($u->link == $b->link){
                            echo'<option value="?module='.$b->link.'" selected>'.$b->nama_imis.'</option>';
                        }else{
                            echo'<option value="?module='.$b->link.'">'.$b->nama_imis.'</option>';
                        }
                    }
                    echo'</select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="input-group input-group-sm mr-2">
                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
                    <select type="select" class="custom-select custom-select-sm btn" id="dinamis_select3" data-toggle="tooltip" data-placement="bottom" title="Pilih Tahun Program">';
                    if(isset($_GET['tahun'])){
                        echo'';
                    }else{
                        echo'<option>- Pilih Tahun Program -</option>';
                    }
                    $p=$db->query("SELECT tahun FROM imis_progres_pemilihan GROUP BY tahun ORDER BY tahun ASC");
                    while($t=$p->fetch_object()){
                        if(isset($_GET['id_kabkota'])){
                            if($d2->tahun == $t->tahun){
                                echo'<option value="?module='.$u->link.'&id_kabkota='.$d->id_kabkota.'&tahun='.$t->tahun.'" selected>'.$t->tahun.'</option>';
                            }else{
                                echo'<option value="?module='.$u->link.'&id_kabkota='.$d->id_kabkota.'&tahun='.$t->tahun.'">'.$t->tahun.'</option>';
                            }
                        }else{
                            if($d2->tahun == $t->tahun){
                                echo'<option value="?module='.$u->link.'&tahun='.$t->tahun.'" selected>'.$t->tahun.'</option>';
                            }else{
                                echo'<option value="?module='.$u->link.'&tahun='.$t->tahun.'">'.$t->tahun.'</option>';
                            }
                        }
                    }
                    echo'</select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="input-group input-group-sm mr-2">
                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-map-marker-alt"></i></span></div>
                    <select type="select" class="custom-select custom-select-sm btn" id="dinamis_select2" data-toggle="tooltip" data-placement="bottom" title="Pilih Kabupaten">';
                    if(isset($_GET['tahun'])){
                        echo'<option value="?module='.$u->link.'&tahun='.$d2->tahun.'">- Semua Kabupaten -</option>';
                    }else{
                        echo'<option value="?module='.$u->link.'">- Semua Kabupaten -</option>';
                    }
                    $p=$db->query("SELECT id_kabkota, nama_kabkota FROM data_kabkota GROUP BY id_kabkota ORDER BY id_kabkota ASC");
                    while($w=$p->fetch_object()){
                        if(isset($_GET['tahun'])){
                            if($d->id_kabkota == $w->id_kabkota){
                                echo'<option value="?module='.$u->link.'&id_kabkota='.$w->id_kabkota.'&tahun='.$d2->tahun.'" selected>'.$w->nama_kabkota.'</option>';
                            }else{
                                echo'<option value="?module='.$u->link.'&id_kabkota='.$w->id_kabkota.'&tahun='.$d2->tahun.'">'.$w->nama_kabkota.'</option>';
                            }
                        }else{
                            if($d->id_kabkota == $w->id_kabkota){
                                echo'<option value="?module='.$u->link.'&id_kabkota='.$w->id_kabkota.'" selected>'.$w->nama_kabkota.'</option>';
                            }else{
                                echo'<option value="?module='.$u->link.'&id_kabkota='.$w->id_kabkota.'">'.$w->nama_kabkota.'</option>';
                            }
                        }
                    }
                    echo'</select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="input-group input-group-sm mr-2">
                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-map-marker-alt"></i></span></div>
                    <select type="select" class="custom-select custom-select-sm btn" id="dinamis_select4" data-toggle="tooltip" data-placement="bottom" title="Pilih Desa">';
                    if(isset($_GET['id_pamsimas'])){
                        echo'<option value="?module='.$u->link.'&id_kabkota='.$d->id_kabkota.'&tahun='.$d2->tahun.'">- Semua Desa -</option>';
                    }else{
                        echo'<option value="?module='.$u->link.'&id_kabkota='.$d->id_kabkota.'&tahun='.$d2->tahun.'" selected>- Semua Desa -</option>';
                    }
                    $p=$db->query("SELECT id_pamsimas, kecamatan, desa FROM imis_progres_pemilihan WHERE id_kabkota='$d->id_kabkota' AND tahun='$d2->tahun' ORDER BY desa ASC");
                    while($w=$p->fetch_object()){
                        if($d3->id_pamsimas == $w->id_pamsimas){
                            echo'<option value="?module='.$u->link.'&id_kabkota='.$d->id_kabkota.'&tahun='.$d2->tahun.'&id_pamsimas='.$w->id_pamsimas.'" selected>'.$w->desa.', '.$w->kecamatan.'</option>';
                        }else{
                            echo'<option value="?module='.$u->link.'&id_kabkota='.$d->id_kabkota.'&tahun='.$d2->tahun.'&id_pamsimas='.$w->id_pamsimas.'">'.$w->desa.', '.$w->kecamatan.'</option>';
                        }
                    }
                    echo'</select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="input-group input-group-sm mr-2">
                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-users"></i></span></div>
                    <select type="select" class="custom-select custom-select-sm btn" id="dinamis_select5" data-toggle="tooltip" data-placement="bottom" title="Pilih Subtim">';
                    if(isset($_GET['id_kabkota'])){
                            echo'<option value="?module='.$u->link.'&tahun='.$d2->tahun.'&id_kabkota='.$d->id_kabkota.'">Semua Subtim</option>';
                    }else{
                        echo'<option>Semua Subtim</option>';
                    }
                    if(isset($_GET['id_kabkota'])){
                        $subtim=$db->query("SELECT subtim FROM imis_progres_pemilihan_view WHERE id_kabkota='$d->id_kabkota' AND subtim <> '' GROUP BY subtim ORDER BY subtim ASC");
                        while($e=$subtim->fetch_object()){
                            if($d4->subtim === $e->subtim){
                                echo'<option value="?module='.$u->link.'&tahun='.$d2->tahun.'&id_kabkota='.$d->id_kabkota.'&subtim='.$e->subtim.'" selected>Subtim '.$e->subtim.'</option>';
                            }else{
                                echo'<option value="?module='.$u->link.'&tahun='.$d2->tahun.'&id_kabkota='.$d->id_kabkota.'&subtim='.$e->subtim.'">Subtim '.$e->subtim.'</option>';
                            }
                        }
                    }
                    echo'
                    </select>
                </div>
            </div>';
            if(isset($_GET['subtim']) OR isset($_GET['id_pribadi'])){
                echo'
                <div class="col-md-2">
                    <div class="input-group input-group-sm mr-2">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user"></i></span></div>
                        <select type="select" class="custom-select custom-select-sm btn" id="dinamis_select6" data-toggle="tooltip" data-placement="bottom" title="Pilih Fasilitator">';
                        if(isset($_GET['id_pribadi'])){
                                echo'';
                        }else{
                            echo'<option>Pilih Fasilitator</option>';
                        }
                        if(isset($_GET['id_kabkota'])){
                            $pribadi = $db->query("SELECT id_pribadi, nama_lengkap, posisi, subtim FROM imis_progres_pemilihan_view WHERE id_kabkota='$d->id_kabkota' AND subtim='$d4->subtim' AND tahun='$d2->tahun' GROUP BY id_pribadi ORDER BY nama_lengkap ASC");
                            while($e = $pribadi->fetch_object()){
                                if($d4->id_pribadi === $e->id_pribadi){
                                    echo'<option value="?module='.$u->link.'&tahun='.$d2->tahun.'&id_kabkota='.$d->id_kabkota.'&subtim='.$e->subtim.'&id_pribadi='.$e->id_pribadi.'" selected>'.$e->nama_lengkap.' ('.$e->posisi.')</option>';
                                }else{
                                    echo'<option value="?module='.$u->link.'&tahun='.$d2->tahun.'&id_kabkota='.$d->id_kabkota.'&subtim='.$e->subtim.'&id_pribadi='.$e->id_pribadi.'">'.$e->nama_lengkap.' ('.$e->posisi.')</option>';
                                }
                            }
                        }
                        echo'
                        </select>
                    </div>
                </div>';
            }
            echo'
        </div>                
    </div>
    <div class="card-body">';
?>