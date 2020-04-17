<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <?php
    $qg		= $db->query("SELECT gambar, nama_lengkap, username, level FROM anggota_view WHERE username='$_SESSION[namauser]'");
    $g		= $qg->fetch_object();
  ?>
  <a href="../../index3.html" class="brand-link">
    <?php
      if($g->gambar!=''){
          echo'<img src="'.BASE_URL.'/templates/'.$aw->alamat_website.'/uploads/foto_anggota/'.$g->gambar.'" class="brand-image img-circle elevation-3" width="42" style="opacity: .8">';
      }else{
          echo'<img src="'.BASE_URL.'/templates/'.$aw->alamat_website.'/uploads/foto_anggota/avatar3.png" class="brand-image img-circle elevation-3" width="42" style="opacity: .8">';
      }
    ?>
    <span class="brand-text font-weight-light"><?php echo $g->nama_lengkap ?></span>
  </a>
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-header">Menu Utama</li>
        <?php
          if($_SESSION['leveluser']=='superadmin'){
            $qmain	= $db->query("SELECT id_mainmodul, icon, nama_mainmodul, urutan, link, path, aktif_mainmodul, posisi_mainmodul FROM mainmodul WHERE aktif_mainmodul = 'Y' AND posisi_mainmodul = 'sidebar' ORDER BY urutan ASC");
          }elseif ($_SESSION['leveluser']=='admin'){
            $qmain	= $db->query("SELECT id_mainmodul, icon, nama_mainmodul, urutan, link, path, aktif_mainmodul, posisi_mainmodul FROM mainmodul WHERE aktif_mainmodul = 'Y' AND level_admin='Y' AND posisi_mainmodul = 'sidebar' ORDER BY urutan ASC");
          }elseif ($_SESSION['leveluser']=='user'){
            $qmain	= $db->query("SELECT id_mainmodul, icon, nama_mainmodul, urutan, link, path, aktif_mainmodul, level_user FROM mainmodul WHERE aktif_mainmodul = 'Y' AND level_user='Y' AND posisi_mainmodul = 'sidebar' ORDER BY urutan ASC");
          }
          while($r = $qmain->fetch_object()){
            if($_SESSION['leveluser']=='superadmin'){
              $qsub	= $db->query("SELECT modul.id_modul, modul.id_mainmodul, modul.nama_modul, modul.link, modul.path, modul.urutan_submodul, modul.aktif_submodul, mainmodul.id_mainmodul, mainmodul.posisi_mainmodul FROM modul, mainmodul
              WHERE modul.id_mainmodul = mainmodul.id_mainmodul
              AND modul.id_mainmodul = '$r->id_mainmodul'
              AND modul.aktif_submodul='Y'
              ORDER BY modul.urutan_submodul ASC");
            }elseif ($_SESSION['leveluser']=='admin'){
              $qsub	= $db->query("SELECT modul.id_modul, modul.id_mainmodul, modul.nama_modul, modul.link, modul.path, modul.urutan_submodul, modul.aktif_submodul, mainmodul.id_mainmodul, mainmodul.posisi_mainmodul FROM modul, mainmodul
              WHERE modul.id_mainmodul = mainmodul.id_mainmodul
              AND modul.id_mainmodul = '$r->id_mainmodul'
              AND modul.aktif_submodul='Y'
              AND l_admin = 'Y'
              ORDER BY modul.urutan_submodul ASC");
            }elseif ($_SESSION['leveluser']=='user'){
              $qsub	= $db->query("SELECT modul.id_modul, modul.id_mainmodul, modul.nama_modul, modul.link, modul.path, modul.urutan_submodul, modul.aktif_submodul, mainmodul.id_mainmodul, mainmodul.posisi_mainmodul FROM modul, mainmodul
              WHERE modul.id_mainmodul = mainmodul.id_mainmodul
              AND modul.id_mainmodul = '$r->id_mainmodul'
              AND modul.aktif_submodul='Y'
              AND l_user = 'Y'
              ORDER BY modul.urutan_submodul ASC");
            }    
            if($qsub->num_rows > 0){
              echo'
              <li class="nav-item has-treeview"><a href="#" class="nav-link"><i class="nav-icon fas '.$r->icon.'"></i><p>'.$r->nama_mainmodul.'<i class="right fas fa-angle-left"></i></p></a>
                <ul class="nav nav-treeview">';
                  while($w = $qsub->fetch_object()){
                      echo'<li class="nav-item"><a href="?module='.$w->link.'" class="nav-link"><i class="far fa-circle nav-icon"></i>'.$w->nama_modul.'</a></li>';
                  }
                  echo'
                </ul>
              </li>';
            }else{
              echo'<li class="nav-item"><a href="?module='.$r->link.'" class="nav-link"><i class="nav-icon far '.$r->icon.'"></i><p>'.$r->nama_mainmodul.'</p></a></li>';
            }
          }
          ?>
          <li class="nav-item"><a href="../logout.php" class="nav-link"><i class="nav-icon fa fa-sign-out-alt"></i><p>Keluar</p></a></li>
      </ul>
    </nav>
  </div>
</aside>